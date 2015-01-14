<?php
include APPPATH . '/controllers/admin/user.php';
class Page403 extends User {

    public function index() {
        $this->checkAccess();
        $this->load->view( 'admin/dashboard/header' );
        $this->load->view( 'admin/403' );
        $this->load->view( 'admin/dashboard/footer' );
    }


}