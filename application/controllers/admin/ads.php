                                <?php
include APPPATH . '/controllers/admin/user.php';
class Ads extends User {
    public function __construct(){
        parent::__construct();
        $this->load->model( 'ads_model' );
        $this->load->model( 'login_model' );
        
        $this->checkAccess();
    }
    
    public function index($pageIn = 1){
        $this->checkAccess('buildings_show');
        $search = $this->input->get('search');
        $config = array(
            'base_url' => '/admin/p/',
            'per_page' => 20,
            'uri_segment' => 3,
            'total_rows' => 0,
        );
        $page = ($pageIn > 1) ? $pageIn : 0;
        $config["total_rows"] = $this->ads_model->fetch_ads(
                                    $search,
                                    $config["per_page"],
                                    $page,
                                    true );
        
        if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
        $config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
        $this->pagination->initialize($config);
        
        $ads = $this->ads_model->fetch_ads( $search, 20, $page );
        
        $data = [
            'ads_list' => $ads,
            'pagination' => $this->pagination->create_links(),
            'category_list' => $this->ads_model->getCategoryList( 0, 'Категория' ),
            'type_list' => $this->ads_model->getTypeList( 0, 'Раздел' ),
            'country_list' => $this->ads_model->getCountryList( 0, 'Изготовитель' ),
            'search' => Ads_model::checkSearchFields($this->input->get('search')),
            'edit_perms'    => $this->hasAccess('items_god'),
        ];
        $this->load->view( 'admin/dashboard/header' );
        $this->load->view( 'admin/ads/index', $data );
        $this->load->view( 'admin/dashboard/footer' );
    }
    
    public function action(){
        $cid = $this->input->post('cid');

        if( $this->input->post('action') == 'remove' ){
            if( !empty($cid) ){
                foreach ($cid as $id)
                    $this->ads_model->removeAds($id);
            }
        }
        return $this->output->set_header('Location: /admin' . '?' . http_build_query( $_GET ));
    }
    
    public function create(){
        $this->checkAccess('items_god');
        include_once APPPATH . 'models/ad_object.php';
        
        $this->load->view( 'admin/dashboard/header' );
        $this->load->view( 'admin/ads/editor', [
                'ad' => new AdObject(),
                'category_list' => $this->ads_model->getCategoryList( 0, 'Не указано' ),
	            'type_list' => $this->ads_model->getTypeList( 0, 'Не указано' ),
	            'country_list' => $this->ads_model->getCountryList( 0, 'Не указано' ),
                'search_query' => http_build_query( $_GET ),

                ] );
        $this->load->view( 'admin/dashboard/footer' );
    }
    
    public function edit($ad_id = 0, $save = false){
        $this->checkAccess('items_show');
        if(! empty( $save )){
            $params = $this->input->post( 'object' );
            $this->ads_model->storeAds( $params, $ad_id );
            return $this->output->set_header( 'Location: /admin' );
        }
        
        if(empty( $ad_id ))
            return $this->output->set_header( 'Location: /admin?' . http_build_query( $_GET ) );
        
        $ad = $this->ads_model->fetch_one_ads( $ad_id );
        if(empty( $ad ) || $ad->id <= 0)
            return $this->output->set_header( 'Location: /admin?' . http_build_query( $_GET ) );
        
        $this->load->view( 'admin/dashboard/header' );
        $this->load->view( 'admin/ads/editor', [
                        'ad' => $ad,
                        'category_list' => $this->ads_model->getCategoryList( 0, 'Не указано' ),
			            'type_list' => $this->ads_model->getTypeList( 0, 'Не указано' ),
			            'country_list' => $this->ads_model->getCountryList( 0, 'Не указано' ),
                        'search_query' => http_build_query( $_GET ),
                        'edit_perms'    => $this->hasAccess('buildings_god'),
        ] );
        $this->load->view( 'admin/dashboard/footer' );
    }
    
    public function uploadimages($ad_id){
        $this->checkAccess('items_god');
        $res = $this->ads_model->uploadAdsImages($ad_id);
        echo json_encode(['result' => true, 'images' => $res]);
        die();
    }
    
    public function removeimage( $image_id ){
        $this->checkAccess('items_god');
        $res = $this->ads_model->removeAdsImage($image_id);
        echo json_encode(['result' => $res]);
        die();
    }
}
                            