<?php
class Parts_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}
	
	
	public function get_parts($id='') {
		if ($id === '') {
			$query = $this->db->get('parts');
			return $query->result_array();
		}
	
		$query = $this->db->get_where('parts', array('id' => $id));
		return $query->row_array();
	}
}