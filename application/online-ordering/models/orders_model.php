<?php
class Orders_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}
	
	
	public function get_orders($id='') {
		if ($id === '') {
			$query = $this->db->get('orders');
			return $query->result_array();
		}
	
		$query = $this->db->get_where('orders', array('id' => $id));
		return $query->row_array();
	}
}