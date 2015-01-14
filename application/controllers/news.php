<?php
include_once APPPATH . 'controllers/prototype.php';
class News extends Prototype {
    public function __construct(){
        parent::__construct();
        $this->load->model( 'news_model' );
        $this->load->model( 'config_model' );
        $this->load->model( 'slides_model' );
    }
    
    public function index(){
        $data['news'] = $this->news_model->get_news();
        
        $data['title'] = 'Новости компании';
        
        $this->load->view( 'templates/header', [
			'config' => $this->config_model->getConfig(),
        	'slides' => $this->slides_model->get_slides()
		]);
        
        
        $this->load->view( 'news/index', $data );
        $this->load->view( 'templates/footer' );
    }
    
    public function show($news_id = 0){
        $news = $this->news_model->fetch_one_news( $news_id );
        if( empty($news) || $news->id <= 0 )
            return $this->output->set_header( 'Location: /news' . (! empty( $_GET ) ? '?' . http_build_query( $_GET ) : '') );
        
        $this->load->view('templates/header', [
            'title' => $news->title,
            'description' => $news->meta_desc,
            'keywords' => $news->meta_keywords,
            'config' => $this->config_model->getConfig(),
            'slides' => $this->slides_model->get_slides()
        ]);
        $this->load->view( 'news/news', [
            'item' => $news 
        ] );
        $this->load->view( 'templates/footer' );
    }
}
