<?php 
class buildings_model extends CI_Model {
 
	public function __construct() {
		$this->load->database();
	}



/*
EMLS methods
*/
	public function get_emls_buildings($id = null){
		$query = $this->db->get('emls_buildings');
		return $query->result_array();
	}

	public function save_emls_building($data) {
		if ($this->emls_item_exists($data['id'])) {
			return $this->update_emls_building($data);
		} else {
			return $this->insert_emls_building($data);
		}
	}

	public function insert_emls_building($data){
		$data['res_id'] = $data['id'];
		unset($data['id']);
		return $this->db->insert('emls_buildings', $data);
	}

	public function update_emls_building($data){
		$this->db->where('res_id', $data['id']);
		unset($data['id']);
		return $this->db->update('emls_buildings', $data);
	}

	public function emls_item_exists($res_id) {
		$this->db->where('res_id', $res_id );
		$this->db->from('emls_buildings');
		return $this->db->count_all_results();
	}


    //// Locality
    public function add_locality($id, $name) {
        $data = array(
            'id' => intval($id),
            'locality_title' => $name,
        );
        if (!$this->locality_exists($id))
            $this->db->insert('buildings_locality', $data);
        return intval($id);
    }

    public function locality_exists($id) {
        $this->db->where('id', $id );
        $this->db->from('buildings_locality');
        return $this->db->count_all_results();
    }



/*****
BN Methods
*/

	public function get_buildings($id = null) {
		$query = $this->db->get('bn_buildings');
		return $query->result_array();
	}


	public function light_add_building($res_id, $link, $category){
		$data = array(
		    'res_id' 	=> $res_id,
		    'link' 		=> $link,
		    'category' 	=> $category,
		    'empty'		=> 1,
		);

		if (!$this->item_exists($res_id)) 
			return $this->db->insert('bn_buildings', $data);
		else
			return false;
	}


	public function item_exists($res_id) {
		$this->db->where('res_id', $res_id );
		$this->db->from('bn_buildings');
		return $this->db->count_all_results();
	}


	public function get_empty_items(){
		$query = $this->db->get_where('bn_buildings', array('empty' => 1 ) );
		return $query->result_array();
	}


	public function update_item(array $data) {
		$this->db->where('id', $data['id']);
		$data['empty'] = 0;
		return $this->db->update('bn_buildings', $data);  
	}



}

