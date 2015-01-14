<?php 
class Pages_model extends CI_Model {
	public function __construct() {
		$this->load->database ();
	}
	
	public function getPage( $pageName = '' ){
		$this->db->from('static_pages');
		$this->db->where('name', $pageName);
		
		$res = $this->db->get();
		if( $res->num_rows() > 0 )
			return $res->result()[0];
		return false;
	}
	
	public function updatePage($pageName, $params){
		if( empty($pageName) || empty($params) )
			return false;
		
		return $this->db->update('static_pages', $params, ['name' => $pageName], 1);
	}
	
}