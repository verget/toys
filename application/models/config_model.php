<?php 
class Config_model extends CI_Model {
	
	public function __construct() {
		$this->load->database ();
	}
	
	public function getConfig(){
		$this->db->from('config');
		$res = $this->db->get();
		if( $res->num_rows() > 0 ){
			$conf = [];
			foreach ($res->result() as $val)
				$conf[$val->ckey] = $val;
			return $conf;
		}
		return false;
	}
	
	public function updateConfig($params){
		if( empty($params) )
			return false;			
		foreach ($params as $key => $value ){
			$this->db->update('config', ['value' => $value], ['ckey' => $key], 1);
		}
		return true;
	}
	
	
}