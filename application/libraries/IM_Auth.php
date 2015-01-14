<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
Необходимо внести изменения в config/autoload.php
$autoload['libraries'] = array('database','session','im_auth');
$autoload['helper'] = array('url','form');
*/
Class IM_Auth
 {	
	function auth_check ()
	 {
		$CI =& get_instance();
					
		$session_id = $CI->session->userdata('session_id');
		$session_logged_in = $CI->session->userdata('logged_in');
		if($session_id && $session_logged_in==true){
			return true;
		}else{
			return false;
		}	
	 }

	function auth_login ()
	 {
		$CI =& get_instance();
					
		if (isset($_POST['password'])){
			$query = $CI->db->get_where('ci_users',array('login'=>$_POST['login'],'password'=>md5($_POST['password'])));
			$auth_result = $query->result_array();
			if($auth_result){
				if (md5($_POST['password'])===$auth_result[0]['password'] && $_POST['login']===$auth_result[0]['login'])
				{
					$newdata = array(
						'logged_in' => true
					);
					$CI->session->set_userdata($newdata);
					return true;
				}else{
					return false;
				}
			}
		}else{
			return false;	
		}

	}
	 
	function auth_logout ()
	 {
		$CI =& get_instance();
		
		$newdata = array(
			'logged_in' => false
		);
		$CI->session->set_userdata($newdata);
		return true;
	 }
	
 }
?>