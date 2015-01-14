<?php
include APPPATH . '/controllers/admin/user.php';
class Dashboard extends User {

    public function index() {
        $this->checkAccess('items_show');
        $this->load->view( 'admin/dashboard/header' );
        $this->load->view( 'admin/dashboard/index' );
        $this->load->view( 'admin/dashboard/footer' );
    }
    
    public function ipoteka($params = ''){
        $this->checkAccess('god');
        $this->load->model( 'pages_model' );
        if($params == 'save'){
            $page = $this->input->post( 'page' );
            $this->pages_model->updatePage( 'ipoteka', $page );
            return $this->output->set_header( 'Location: /admin/ipoteka' );
        }
        
        $this->load->view( 'admin/dashboard/header');
        $this->load->view( 'admin/dashboard/ipoteka', [
            'page' => $this->pages_model->getPage( 'ipoteka' )
        ] );
        $this->load->view( 'admin/dashboard/footer' );
    }
    
    public function education($params = ''){
        $this->checkAccess('god');
        $this->load->model( 'pages_model' );
        if($params == 'save'){
            $page = $this->input->post( 'page' );
            $this->pages_model->updatePage( 'education', $page );
            return $this->output->set_header( 'Location: /admin/education' );
        }
        
        $this->load->view( 'admin/dashboard/header' );
        $this->load->view( 'admin/dashboard/education', [
                        'page' => $this->pages_model->getPage( 'education' ) 
        ] );
        $this->load->view( 'admin/dashboard/footer' );
    }
    
    public function contact($params = ''){
        $this->checkAccess('god');
        $this->load->model( 'pages_model' );
        if($params == 'save'){
            $page = $this->input->post( 'page' );
            $this->pages_model->updatePage( 'contact', $page );
            return $this->output->set_header( 'Location: /admin/contact' );
        }
        
        $this->load->view( 'admin/dashboard/header' );
        $this->load->view( 'admin/dashboard/contact', [
            'page' => $this->pages_model->getPage( 'contact' )
        ] );
        $this->load->view( 'admin/dashboard/footer' );
    }
    
    public function services($params = ''){
    	$this->checkAccess('god');
    	$this->load->model( 'pages_model' );
    	if($params == 'save'){
    		$page = $this->input->post( 'page' );
    		$this->pages_model->updatePage( 'services', $page );
    		return $this->output->set_header( 'Location: /admin/services' );
    	}
    
    	$this->load->view( 'admin/dashboard/header' );
    	$this->load->view( 'admin/dashboard/services', [
    			'page' => $this->pages_model->getPage( 'services' )
    	] );
    	$this->load->view( 'admin/dashboard/footer' );
    }
    
    public function actions($params = ''){
    	$this->checkAccess('god');
    	$this->load->model( 'pages_model' );
    	if($params == 'save'){
    		$page = $this->input->post( 'page' );
    		$this->pages_model->updatePage( 'actions', $page );
    		return $this->output->set_header( 'Location: /admin/actions' );
    	}
    
    	$this->load->view( 'admin/dashboard/header' );
    	$this->load->view( 'admin/dashboard/actions', [
    			'page' => $this->pages_model->getPage( 'actions' )
    	] );
    	$this->load->view( 'admin/dashboard/footer' );
    }
    
    public function about($params = ''){
        $this->checkAccess('god');
        $this->load->model( 'pages_model' );
        if($params == 'save'){
            $page = $this->input->post( 'page' );
            $this->pages_model->updatePage( 'about', $page );
            return $this->output->set_header( 'Location: /admin/about' );
        }
        
        $this->load->view( 'admin/dashboard/header' );
        $this->load->view( 'admin/dashboard/about', [
                        'page' => $this->pages_model->getPage( 'about' ) 
        ] );
        $this->load->view( 'admin/dashboard/footer' );
    }


    
    public function config_page($params = ''){
    	$this->checkAccess();
    	$this->load->model( 'config_model' );
    	if($params == 'save'){
    		$config = $this->input->post('config');
    		$this->config_model->updateConfig($config);
    		return $this->output->set_header( 'Location: /admin/config_page' );
    	}
    
    	$this->load->view( 'admin/dashboard/header' );
    	$this->load->view( 'admin/dashboard/config_page', [
    			'config' => $this->config_model->getConfig()
    			] );
    	$this->load->view( 'admin/dashboard/footer' );
    }
}

