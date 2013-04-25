<?php
class Cart extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('cart');
		$this->load->library('form_validation');
	}
	
	public function index()	{
		
		$data['title'] = 'Your cart';
		
		if($this->cart->total_items() ==0) {
			$data['infoMessage'] = 'Your cart is empty.<a href="/parts">Click Here</a> to browse parts.';
		}		
		
		$this->render_page('pages/cart_display', $data);
	}
	
	
	
	public function update() {
		$data['title'] = 'Cart updated';
		
		
		$cartItems = array();
		
		//TODO: Extend the codeigniter's form_validation library
		//to add a new rule to make sure qty is numeric and write a custom mesage
		if($this->input->post()) {
			if(preg_match('/([^0-9])/i', implode("", $this->input->post('part-qty')))>0) {
				$data['alertMessage'] = 'Quantity can only be numeric';
			} else {
				$existingCart = $this->cart->contents();
				foreach($this->input->post('part-qty') as $rowId => $partQty) {					
					array_push($cartItems , array(
							'rowid'      => $rowId,
							'qty'     => $partQty
					));
				}
		
				$this->cart->update($cartItems);
			}
		}
		
		
		if($this->cart->total_items() ==0) {
			$data['infoMessage'] = 'Your cart is empty.<a href="/parts">Click Here</a> to browse parts.';
		} else if ($this->input->post('submit')==='Update cart'){
			$data['successMessage'] = 'Cart updated.';
		}
		
		if($this->cart->total_items() ==0 || $this->input->post('submit')!='Begin Checkout') {
			$view_name = 'pages/cart_display';
		} else {
			$view_name = 'pages/customer_info';			
		}
		$this->render_page($view_name, $data);
	}
	
	public function submitOrder() {
		$data = array();
		if($this->cart->total_items() ==0) {
			$data['title'] = 'Cart empty';
			$data['infoMessage'] = 'Your cart is empty.<a href="/parts">Click Here</a> to browse parts.';	
			$this->render_page('pages/cart_display', $data);
		} else {
			
			$this->form_validation->set_rules('customer-name', 'Name', 'required|max_length[100]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[200]');
			
			if ($this->form_validation->run() == FALSE) {
				$data['alertMessage'] = 'Please correct the errors below';
				$data['title'] = 'Invalid information';				
				$this->render_page('pages/customer_info', $data);
			} else {
				$this->load->model('orders_model');			
				$data['orderId'] = $this->orders_model->create_order();
				$this->render_page('pages/success', $data);
			}
		}
	}
}