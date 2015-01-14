<?php
include_once APPPATH . 'controllers/prototype.php';
class Ads extends Prototype {
    private $_search = [];
    private $_searchFields = [];
    
    public function __construct(){
        parent::__construct();
        $this->load->model( 'ads_model' );
        $this->load->model( 'news_model' );
        
        $this->_searchFields = [
                        'avail_category' => $this->ads_model->getAvailCategory(0, 'Любая' ),
                        'avail_types' => $this->ads_model->getAvailTypes(0, 'Любой' ), 
        				'avail_country' => $this->ads_model->getAvailCountry(0, 'Любой' ),
        ];
        $this->_search = Ads_model::checkSearchFields( $this->input->get( 'search' ) );
    }
    
    public function view($description = "index"){
        $data = [
                        'ads_item' => $this->ads_model->get_ads( $description ),
                        'search' => $this->_search 
        ];
        if(empty( $data['ads_item'] )){
            show_404();
        }
        
        $data['title'] = $data['ads_item']['title'];
        $this->load->view( 'templates/header', $data );
        $this->load->view( 'ads/view_ads', $data );
        $this->load->view( 'templates/footer' );
    }
    
    public function index($pageIn = 1){
        // TODO Need add search params to pagination
        $this->load->model( 'config_model' );
        $this->load->model( 'banners_model' );
        $this->load->model( 'slides_model' );

        $config = array(
                        'base_url' => '/p/',
                        'per_page' => 18,
                        'uri_segment' => 2,
                        'total_rows' => 0,
                        'first_url' => 'toys/' 
        );

        $page = ($pageIn > 1) ? $pageIn : 0;
        if( isset($_GET['tableview']) )
            $config["total_rows"] = $this->ads_model->fetch_ads( $this->_search, $config["per_page"], $page, true);
        else 
            $config["total_rows"] = $this->ads_model->fetch_ads( $this->_search, $config["per_page"], $page, true, true);
        
        if(count( $_GET ) > 0)
            $config['suffix'] = '?' . http_build_query( $_GET, '', "&" );
        $config['first_url'] = $config['base_url'] . '?' . http_build_query( $_GET );
        
        $this->pagination->initialize( $config );
        
        $this->load->view( 'templates/header', [
            'title' => '',
        	'config' => $this->config_model->getConfig(),
        	'slides' => $this->slides_model->get_slides(),
        	'banners' => $this->banners_model->get_banners(),
        ] );
        $this->load->view( 'ads/search_form_ads', [
            'search' => $this->_search,
            'searchFields' => $this->_searchFields,
        	'news' => $this->news_model->get_news(),
        ] );

        if( isset($_GET['tableview']) ){
	        $this->load->view( 'ads/tableview_ads', [
	            'ads' => $this->ads_model->fetch_ads( $this->_search, $config["per_page"], $page ),
	            'links' => $this->pagination->create_links(),
	        ] );
        }else{
        	$this->load->view( 'ads/jumbo_ads', [
        			'ads' => $this->ads_model->fetch_ads( $this->_search, $config["per_page"], $page, false, true),
        			'links' => $this->pagination->create_links(),
        			] );}
        $this->load->view( 'templates/footer' );
    }
    
    public function object($ads_id = 0){
        $ads = $this->ads_model->fetch_one_ads( $ads_id );
        $this->load->model( 'banners_model' );
        $this->load->model( 'slides_model' );
        
        if(empty( $ads ))
            return $this->output->set_header( 'Location: /' . (! empty( $_GET ) ? '?' . http_build_query( $_GET ) : '') );
        
        $this->load->view( 'templates/header', [
            'title' => $ads->title,
            'description' => $ads->meta_desc,
            'keywords' => $ads->meta_keywords,
        	'config' => $this->config_model->getConfig(),
        	'slides' => $this->slides_model->get_slides(),
        	'banners' => $this->banners_model->get_banners(),
        ]);
        $this->load->view( 'ads/search_form_ads', [
            'search' => $this->_search,
            'searchFields' => $this->_searchFields,
        	'news' => $this->news_model->get_news()
        ] );
        $this->load->view( 'ads/result_ads', [
            'ads_item' => $ads 
        ] );
        $this->load->view( 'templates/footer' );
    }


    public function get_type($category_id){
       $array = $this->ads_model->getAvailTypes( 0, 'Любой', (int)$category_id );
       $a = array();
       if(!empty($array)){
           foreach ($array as $type){
              $a[$type->type_id] = $type->type_title;
           }
       }      
       echo json_encode($a);
       
    }
}

                            