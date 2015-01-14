<?php
include APPPATH . '/controllers/admin/user.php';
class Login extends User {

    public function __construct(){
        parent::__construct();
        $this->load->library('session');
    }
	
	public function index()
	{

		
		if( $this->input->post('username') != '' ){
			$login = $this->input->post('username', true);
			$password = $this->input->post('password');
			$this->load->model('login_model');
			if( $this->login_model->login_logic($login, $password) )
				return $this->output->set_header('Location: /admin');
		}
		
		//$this->load->view('admin/dashboard/header');
		$this->load->view('admin/login/index');
	}



    public function out(){
        $this->session->unset_userdata('user');
        redirect('admin'); exit;
    }

    public function users_list(){
        $this->checkAccess('god');

        $this->load->view( 'admin/dashboard/header' );
        $this->load->view( 'admin/login/list', array(
            'users_list' => $this->login_model->get_users_list(),
        ));
        $this->load->view( 'admin/dashboard/footer' );
    }

    public function create(){
        $this->checkAccess('god');
        if ($this->input->post('username')) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $role_id = intval($this->input->post('userrole'));
            $res = $this->login_model->add_user($username, $password, $role_id);
            // return to list
            redirect('admin/login/list');
        }

        $this->load->view( 'admin/dashboard/header' );
        $this->load->view( 'admin/login/form', array(
            'userroles' => $this->login_model->get_roles_list(),
            'userrole' => 4,
            'username' => null,
        ));
        $this->load->view( 'admin/dashboard/footer' );
    }

    public function edit($id) {
        $this->checkAccess('god');
        if ($this->input->post('username')) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $role_id = intval($this->input->post('userrole'));
            $res = $this->login_model->update_user($id, $username, $password, $role_id);
            // return to list
            redirect('admin/login/list');
        }

        $user_info = $this->login_model->get_user_info( $id );
        $this->load->view( 'admin/dashboard/header' );
        $this->load->view( 'admin/login/form', array(
            'userroles' => $this->login_model->get_roles_list(),
            'userrole' => $user_info->role_id,
            'username' => $user_info->username,
        ));
        $this->load->view( 'admin/dashboard/footer' );
    }



    public function  delete($id){
        $this->checkAccess('god');
        $id = intval($id);
        $res = $this->login_model->delete_user($id);
        // return to list
        redirect('admin/login/list');
    }
}