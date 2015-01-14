<?php 
include APPPATH . '/controllers/admin/user.php';
class Slides extends User {
    public function __construct(){
        parent::__construct();
        $this->load->model( 'slides_model' );
    
        $this->checkAccess();
    }
    
    public function index(){
        $banners = [];    
        $this->load->view( 'admin/dashboard/header' );
        $this->load->view( 'admin/slides/index', [
            'slides' => $this->slides_model->get_slides(),
        ]);
        $this->load->view( 'admin/dashboard/footer' );
    }
    
    public function create(){
    	include_once APPPATH . 'models/slide_object.php';
    
    	$this->load->view( 'admin/dashboard/header' );
    	$this->load->view( 'admin/slides/editor', [
    			'item' => new SlideObject(),
    			]);
    	$this->load->view( 'admin/dashboard/footer' );
    }
    
    public function edit($id = 0, $save = false){
    	if(! empty( $save )){
    		$params = $this->input->post( 'slides' );
    		$this->slides_model->saveSlides( $params, $id );
    		return $this->output->set_header( 'Location: /admin/slides' );
    	}
    	if(empty($id))
    		return $this->output->set_header( 'Location: /admin/slides?' . http_build_query( $_GET ) );
    	$item = $this->slides_model->fetch_one_slide($id);
    	if(empty( $item ) || $item->id <= 0)
    		return $this->output->set_header( 'Location: /admin/slide?' . http_build_query( $_GET ) );
    	$this->load->view( 'admin/dashboard/header' );
    	$this->load->view( 'admin/slides/editor', [
    			'item' => $item,
    			]);
    	$this->load->view( 'admin/dashboard/footer' );
    }
    
    public function action(){
    	$cid = $this->input->post('cid');
    	if( $this->input->post('action') == 'remove' ){
    		if( !empty($cid) ){
    			foreach ($cid as $id)
    				$this->slides_model->removeSlides($id);
    		}
    	}
    	return $this->output->set_header('Location: /admin/slides');
    }
         
    public function upload_image($slide_id){
    	$res = $this->slides_model->uploadSlideImage($slide_id);
    	return $this->output->set_header('Location: /admin/slides/edit/'.$slide_id);
    }
    
    public function remove_image( $slide_id ){
    	$res = $this->slides_model->removeSlideImage($slide_id);
    	return $this->output->set_header('Location: /admin/slides/edit/'.$slide_id);
    }
}
