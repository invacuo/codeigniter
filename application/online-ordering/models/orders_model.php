<?php
class Orders_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}
	
	
	public function get_orders_by_email($email) {
		
		$this->db->select('o.*, cu.name as customer_name, cu.email');
		$this->db->from('orders o');
		$this->db->join('order_details od', 'o.id = od.order_id');
		$this->db->join('customers cu', 'cu.id = od.customer_id');		
		$this->db->where('cu.email',$email);
		
		
	
		$query = $this->db->get();
		return $query->result_array();
	}
	
	
	
	public function get_order_details($id) {
	
		$this->db->select('o.*, cu.name as customer_name, cu.email, od.unit_price, od.quantity, p.name as part_name, c.name as part_category');
		$this->db->from('orders o');
		$this->db->join('order_details od', 'o.id = od.order_id');
		$this->db->join('parts p', 'od.part_id = p.id');
		$this->db->join('categories c', 'p.category_id = c.id');
		$this->db->join('customers cu', 'c.id = od.customer_id');
	
		if ($id!= '' && (int)$id != 0) {
			$this->db->where('o.id', $id);
		}
		$query = $this->db->get();
		return $query->result_array();
	}
	
	
	
	public function create_order() {
		
		$this->db->trans_start();
		$query = $this->db->get_where('customers', array('email' => $this->input->post('email')));
		if($query->num_rows() == 0) {			
			$this->db->insert('customers', array(
						'email'=>$this->input->post('email'), 
						'name'=>$this->input->post('customer-name')
			));
			$custId = $this->db->insert_id();
		} else {
			$custId = $query->row()->id;	
			$customer_data = array(
					'name' => $this->input->post('customer-name')
				);
			$this->db->where('id', $custId);
			$this->db->update('customers', $customer_data);			
		}
		$this->db->insert('orders', array('price' => $this->cart->total()));
		$orderId = $this->db->insert_id();
		
		$orderDetails = array();
		
		foreach ($this->cart->contents() as $item) {
			array_push($orderDetails, array(
								'order_id' => $orderId, 
								'customer_id'=>$custId,
								'part_id'=> $item['id'],
								'quantity' => $item['qty'],
								'unit_price'=> $item['price']
							));
		}
		
		$this->db->insert_batch('order_details', $orderDetails);		
		$this->db->trans_complete();
		
		
		$this->cart->destroy();
		return $orderId;
	}
}