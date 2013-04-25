<?php
class Cart extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('cart');
		$this->load->library('form_validation');
	}
	
	public function index()	{
		$data = array();
		
		$data['title'] = 'Your cart';
		
		if($this->cart->total_items() ==0) {
			$data['infoMessage'] = 'Your cart is empty.<a href="/parts">Click Here</a> to browse parts.';
		}
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/cart_display', $data);
		$this->load->view('templates/footer');
	}
	
	
	
	public function update() {
		$data = array();
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
		
		$this->load->view('templates/header', $data);
		if($this->cart->total_items() ==0 || $this->input->post('submit')!='Begin Checkout') {
			$this->load->view('pages/cart_display', $data);
		} else {
			$this->load->view('pages/customer_info', $data);			
		}
		$this->load->view('templates/footer');
	}
	
	public function submitOrder() {
		$data = array();
		if($this->cart->total_items() ==0) {
			$data['title'] = 'Cart empty';
			$data['infoMessage'] = 'Your cart is empty.<a href="/parts">Click Here</a> to browse parts.';			
			$this->load->view('templates/header', $data);
			$this->load->view('pages/cart_display', $data);
			$this->load->view('templates/footer');
		} else {
			
			$this->form_validation->set_rules('customer-name', 'Name', 'required|max_length[100]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[200]');
			
			if ($this->form_validation->run() == FALSE) {
				$data['alertMessage'] = 'Please correct the errors below';
				$data['title'] = 'Invalid information';
				$this->load->view('templates/header', $data);
				$this->load->view('pages/customer_info', $data);
				$this->load->view('templates/footer');
			} else {
				$this->load->model('orders_model');			
				$data['orderId'] = $this->orders_model->create_order();
				$this->load->view('templates/header', $data);
				$this->load->view('pages/success');
				$this->load->view('templates/footer');
			}
		}
	}
}