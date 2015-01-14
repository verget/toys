<?php
class Banners_model extends CI_Model {
	public function __construct() {
		$this->load->database ();
	}
	public function get_banners() {
		$this->db->from ( 'banners' );
		$query = $this->db->get ();
		if ($query->num_rows () > 0) {
			$data = [ ];
			foreach ( $query->result () as $row )
				$data [] = $row;
			return $data;
		}
		return false;
	}
	public function updateBanners($id, $params) {
		if (empty ( $id ) || empty ( $params ))
			return false;
		
		return $this->db->update ( 'banners', $params, [ 
				'id' => $id 
		], 1 );
	}
	public function fetch_one_banner($id) {
		$this->db->limit ( 1 );
		$this->db->select ( [ 
				'banners.*' 
		] );
		$this->db->from ( 'banners' );
		$this->db->where ( 'banners.id = "' . $id . '"' );
		$res = $this->db->get ();
		if ($res->num_rows () > 0)
			return $res->result ()[0];
		return false;
	}
	public function saveBanners($params, $id) {
		if (empty ( $params ))
			return false;
		
		if ($id) {
			$params ['use'] = ( int ) ($params ['use']);
			return $this->db->update ( 'banners', $params, [ 
					'id' => $id 
			], 1 );
		} else
			return $this->db->insert ( 'banners', $params );
	}
	
	// ////////////////////////////////////////////////////// Загрузка картинки в банер
	public function removeBanImage($ban_id) {
		$this->db->select ( 'image_url' );
		$this->db->from ( 'banners' );
		$this->db->where ( 'id = ' . $ban_id );
		$res = $this->db->get ();
		if ($res->num_rows () <= 0)
			return false;
		$img = $res->result ();
		$img = $img [0]->image_url;
		@unlink ( APPPATH . '../images/banners/' . $img );
		return $this->db->update ( 'banners', [ 
				'image_url' => '' 
		], [ 
				'id' => $ban_id 
		], 1 );
	}
	public function uploadBanImages($ban_id) {
		$res = [ ];
		if (! empty ( $_FILES )) {
			// for($i = 0; $i < count( $_FILES['photo']['name'] ); $i ++){
			$fileExt = pathinfo ( $_FILES ['photo'] ['name'], PATHINFO_EXTENSION );
			$fileName = $ban_id . '_' . md5 ( $ban_id . $_FILES ['photo'] ['tmp_name'] ) . '.' . $fileExt;
			if (move_uploaded_file ( $_FILES ['photo'] ['tmp_name'], APPPATH . '../images/banners/' . $fileName )) {
				$this->db->update ( 'banners', [ 
						'image_url' => $fileName 
				], [ 
						'id' => $ban_id 
				], 1 );
			}
		}
		return true;
	}
	public function getBanImages($ban_id) {
		$this->db->from ( 'banners' );
		$this->db->where ( 'id', $ban_id );
		
		$query = $this->db->get ();
		if ($query->num_rows () > 0) {
			$data = [ ];
			foreach ( $query->result () as $row )
				$data [] = $row;
			return $data;
		}
		return false;
	}
	// //////////////////////////////////////////////////////
	public function removeBanners($id) {
		return $this->db->delete ( 'banners', 'id = ' . $id, 1 );
	}
}