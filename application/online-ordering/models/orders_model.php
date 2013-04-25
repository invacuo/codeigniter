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
	
	public function create_order() {
		
		$this->db->trans_start();
		$query = $this->db->get_where('customers', array('email' => $this->db->escape($this->input->post('email'))));
		if($query->num_rows() == 0) {			
			$this->db->insert('customers', array(
						'email'=>$this->db->escape($this->input->post('email')), 
						'name'=>$this->db->escape($this->input->post('name'))
			));
			$custId = $this->db->insert_id();
		} else {
			$custId = $query->row()->id;				
		}
		$this->db->insert('orders', array('price' => $this->cart->total()));
		$orderId = $this->db->insert_id();
		
		$orderDetails = array();
		
		foreach ($this->cart->contents() as $item) {
			array_push($orderDetails, array(
								'order_id' => $orderId, 
								'customer_id'=>$custId,
								'part_id'=> $item['id'],
								'quantity' => $item['qty']
							));
		}
		
		$this->db->insert_batch('order_details', $orderDetails);		
		$this->db->trans_complete();
		
		
		$this->cart->destroy();
		return $orderId;
	}
}