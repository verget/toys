<?php 
include APPPATH . '/controllers/admin/user.php';
class Banners extends User {
    public function __construct(){
        parent::__construct();
        $this->load->model( 'banners_model' );
    
        $this->checkAccess();
    }
    
    public function index(){
        $banners = [];    
        $this->load->view( 'admin/dashboard/header' );
        $this->load->view( 'admin/banners/index', [
            'banners' => $this->banners_model->get_banners(),
        ]);
        $this->load->view( 'admin/dashboard/footer' );
    }
    
    public function create(){
    	include_once APPPATH . 'models/banner_object.php';
    
    	$this->load->view( 'admin/dashboard/header' );
    	$this->load->view( 'admin/banners/editor', [
    			'item' => new BannerObject(),
    			]);
    	$this->load->view( 'admin/dashboard/footer' );
    }
    
    public function edit($id = 0, $save = false){
    	if(! empty( $save )){
    		$params = $this->input->post( 'banners' );
    		$this->banners_model->saveBanners( $params, $id );
    		return $this->output->set_header( 'Location: /admin/banners' );
    	}
    	if(empty($id))
    		return $this->output->set_header( 'Location: /admin/banners?' . http_build_query( $_GET ) );
    	$item = $this->banners_model->fetch_one_banner($id);
    	if(empty( $item ) || $item->id <= 0)
    		return $this->output->set_header( 'Location: /admin/banners?' . http_build_query( $_GET ) );
    	$this->load->view( 'admin/dashboard/header' );
    	$this->load->view( 'admin/banners/editor', [
    			'item' => $item,
    			]);
    	$this->load->view( 'admin/dashboard/footer' );
    }
    
    public function action(){
    	$cid = $this->input->post('cid');
    	if( $this->input->post('action') == 'remove' ){
    		if( !empty($cid) ){
    			foreach ($cid as $id)
    				$this->banners_model->removeBanners($id);
    		}
    	}
    	return $this->output->set_header('Location: /admin/banners');
    }
         
    public function upload_image($ban_id){
    	$res = $this->banners_model->uploadBanImages($ban_id);
    	return $this->output->set_header('Location: /admin/banners/edit/'.$ban_id);
    }
    
    public function remove_image( $ban_id ){
    	$res = $this->banners_model->removeBanImage($ban_id);
    	return $this->output->set_header('Location: /admin/banners/edit/'.$ban_id);
    }
}
