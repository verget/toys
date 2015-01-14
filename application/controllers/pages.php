<?php
include_once APPPATH . 'controllers/prototype.php';
class Pages extends Prototype {
	public function view($pageName = '') {
		if (! file_exists ( 'application/views/pages/' . $pageName . '.php' )) {
			// Упс, у нас нет такой страницы!
			show_404 ();
		}
		
		$this->load->model ('pages_model');
		$this->load->model( 'config_model' );
		$this->load->model( 'slides_model' );
		$this->load->model( 'banners_model' );
		$page = $this->pages_model->getPage($pageName);

		$this->load->view( 'templates/header', [
			'title' => $page->title,
			'description' => $page->meta_desc,
			'keywords' => $page->meta_keywords,
			'config' => $this->config_model->getConfig(),
			'slides' => $this->slides_model->get_slides(),
			'banners' => $this->banners_model->get_banners(),
		]);
		
		$this->load->view ( 'pages/' . $pageName,[
			'page' => $page
		]);
		$this->load->view ( 'templates/footer');
	}
}