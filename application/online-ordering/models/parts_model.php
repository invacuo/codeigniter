<?php
class Parts_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}
	
	
	public function get_parts($id='') {
		if ($id === '') {
			
			$this->db->select('parts.*, categories.name as part_category');
			$this->db->from('parts');
			$this->db->join('categories', 'parts.category_id = categories.id');
			
			$query = $this->db->get();
			return $query->result_array();
		}
	
		$query = $this->db->where('parts.id', $id);
		return $query->row_array();
	}
}