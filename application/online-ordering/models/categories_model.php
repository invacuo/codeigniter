<?php
class Categories_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}
	
	public function get_categories() {
		$this->db->cache_on();
		$query = $this->db->query("SELECT * FROM categories");		
		$this->db->cache_off();
		return $query->result_array();
	}
}