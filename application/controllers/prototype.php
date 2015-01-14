<?php
class Prototype extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('config_model');
	}
}