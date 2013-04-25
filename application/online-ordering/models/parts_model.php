<?php
class Parts_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}
	
	public function get_parts_count($category_id = 0) {
		if((int)$category_id === 0) {
			return $this->db->count_all('parts');
		} else {
			$this->db->select('count(parts.*)');
			$this->db->from('parts');
			$this->db->join('categories', 'parts.category_id = categories.id');
			$this->db->where('categories.id', $category_id);
			return $this->db->count_all_results();
			
		}
	}
	
	
	public function get_parts($category_id = 0, $page_number = 1, $order_by = 'parts.name') {		
		$page_size = 10;
		$this->db->select('parts.*, categories.name as part_category');
		$this->db->from('parts');
		$this->db->join('categories', 'parts.category_id = categories.id');
		
		if ((int)$category_id === 0) {			
			$query = $this->db->order_by($order_by)->limit($page_size, ($page_number-1)*$page_size)->get();
		} else {
			$query = $this->db->where('categories.id', $category_id)->order_by($order_by)->limit($page_size, ($page_number-1)*$page_size)->get();
		}
		return $query->result_array();
	}
}