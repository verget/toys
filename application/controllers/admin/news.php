<?php 
include APPPATH . '/controllers/admin/user.php';
class News extends User {
    public function __construct(){
        parent::__construct();
        $this->load->model( 'news_model' );
    
        $this->checkAccess('news_access');
    }
    
    public function index($pageIn = 1){
        $config = [
            'base_url' => '/admin/p/',
            'per_page' => 20,
            'uri_segment' => 3,
            'total_rows' => 0,
        ];
        $page = ($pageIn > 1) ? $pageIn : 0;
        $config["total_rows"] = $this->news_model->get_news(
                $this->input->get('slug'),
                $config["per_page"],
                $page,
                true );
        
        if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
        $config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
        $this->pagination->initialize($config);
        
        $this->load->view( 'admin/dashboard/header' );
        $this->load->view( 'admin/news/index', [
            'news' => $this->news_model->get_news(
                $this->input->get('slug'),
                $config["per_page"],
                $page),
            'pagination' => $this->pagination->create_links(),
        ]);
        $this->load->view( 'admin/dashboard/footer' );
    }
    
    public function create(){
        include_once APPPATH . 'models/news_object.php';
    
        $this->load->view( 'admin/dashboard/header' );
        $this->load->view( 'admin/news/editor', [
            'item' => new NewsObject(),
        ]);
        $this->load->view( 'admin/dashboard/footer' );
    }
    
    public function editor($item_id = 0, $save = false){
        if(! empty( $save )){
            $params = $this->input->post( 'news' );
            $this->news_model->storeNews( $params, $item_id );
            return $this->output->set_header( 'Location: /admin/news' );
        }
        
        if(empty( $item_id ))
            return $this->output->set_header( 'Location: /admin/news?' . http_build_query( $_GET ) );
        
        $item = $this->news_model->fetch_one_news( $item_id );
        if(empty( $item ) || $item->id <= 0)
            return $this->output->set_header( 'Location: /admin/news?' . http_build_query( $_GET ) );
        
        $this->load->view( 'admin/dashboard/header' );
        $this->load->view( 'admin/news/editor', [
                'item' => $item,
        ]);
        $this->load->view( 'admin/dashboard/footer' );
    }
    
    public function action(){
        $cid = $this->input->post('cid');
    
        if( $this->input->post('action') == 'remove' ){
            if( !empty($cid) ){
                foreach ($cid as $id)
                    $this->news_model->removeNews($id);
            }
        }
        return $this->output->set_header('Location: /admin/news' . '?' . http_build_query( $_GET ));
    }
}