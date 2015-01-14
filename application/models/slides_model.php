<?php
class Slides_model extends CI_Model {
	public function __construct() {
		$this->load->database ();
	}
	public function get_slides() {
		$this->db->from ( 'slides' );
		$query = $this->db->get ();
		if ($query->num_rows () > 0) {
			$data = [ ];
			foreach ( $query->result () as $row )
				$data [] = $row;
			return $data;
		}
		return false;
	}
	public function updateSlides($id, $params) {
		if (empty ( $id ) || empty ( $params ))
			return false;
		
		return $this->db->update ( 'slides', $params, [ 
				'id' => $id 
		], 1 );
	}
	public function fetch_one_slide($id) {
		$this->db->limit ( 1 );
		$this->db->select ( [ 
				'slides.*' 
		] );
		$this->db->from ( 'slides' );
		$this->db->where ( 'slides.id = "' . $id . '"' );
		$res = $this->db->get ();
		if ($res->num_rows () > 0)
			return $res->result ()[0];
		return false;
	}
	public function saveSlides($params, $id) {
		if (empty ( $params ))
			return false;
		
		if ($id) {
			return $this->db->update ( 'slides', $params, [ 
					'id' => $id 
			], 1 );
		} else
			return $this->db->insert ( 'slides', $params );
	}
	
	// ////////////////////////////////////////////////////// Загрузка картинки в банер
	public function removeSlideImage($slide_id) {
		$this->db->select ( 'image_url' );
		$this->db->from ( 'slides' );
		$this->db->where ( 'id = ' . $slide_id );
		$res = $this->db->get ();
		if ($res->num_rows () <= 0)
			return false;
		$img = $res->result ();
		$img = $img [0]->image_url;
		@unlink ( APPPATH . '../images/slides/' . $img );
		return $this->db->update ( 'slides', [ 
				'image_url' => '' 
		], [ 
				'id' => $slides_id 
		], 1 );
	}
	public function uploadSlideImage($slide_id) {
		$res = [ ];
		if (! empty ( $_FILES )) {
			// for($i = 0; $i < count( $_FILES['photo']['name'] ); $i ++){
			$fileExt = pathinfo ( $_FILES ['photo'] ['name'], PATHINFO_EXTENSION );
			$fileName = $slide_id . '_' . md5 ( $slide_id . $_FILES ['photo'] ['tmp_name'] ) . '.' . $fileExt;
			if (move_uploaded_file ( $_FILES ['photo'] ['tmp_name'], APPPATH . '../images/slides/' . $fileName )) {
				$this->db->update ( 'slides', [ 
						'image_url' => $fileName 
				], [ 
						'id' => $slide_id 
				], 1 );
			}
		}
		return true;
	}
	public function getSlideImages($slide_id) {
		$this->db->from ( 'slides' );
		$this->db->where ( 'id', $slide_id );
		
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
	public function removeSlides($id) {
		return $this->db->delete ( 'slides', 'id = ' . $id, 1 );
	}
}