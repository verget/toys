<?php
class User extends CI_Controller
{
	var $perm_flags = array();

    function __construct(){
        parent::__construct();
        $this->load->model( 'login_model' );
        $this->gen_perm_flags();
    }

    protected function checkAccess( $flag = 'items_show' ){
	$this->load->library('session');
        $this->load->helper('url');

		if( !$this->session->userdata('user') ){
  
			$this->output->set_header( 'Location: /admin/login' );
			$this->output->_display();
		} elseif (!$this->hasAccess($flag) && uri_string() != 'admin/403'){
            redirect( 'admin/403' ); exit;
        }

	}


    protected function hasAccess($flag = 'items_show') {
        $this->load->library('session');
        $userdata = $this->session->userdata('user');
        $role = intval($userdata['role']);
        return $this->login_model->check_perm($role, $flag);
    }

    protected function gen_perm_flags() {
        foreach ($this->login_model->get_perms_list() as $perm) {
            $this->perm_flags[$perm] = $this->hasAccess( $perm );
        }
    }

}
                            