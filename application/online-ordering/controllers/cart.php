<?php
class Cart extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('cart');
		$this->load->library('form_validation');
	}
	
	public function index()	{
		$data = array();
		$this->load->view('templates/header', $data);
		$this->load->view('pages/cart_display', $data);
		$this->load->view('templates/footer');
	}
	
	
	
	public function update() {		
		$data = array();
		
		$cartItems = array();
		
		//TODO: Extend the codeigniter's form_validation library
		//to add a new rule to make sure qty is numeric and write a custom mesage
		if($this->input->post()) {
			if(preg_match('/([^0-9])/i', implode("", $this->input->post('part-qty')))>0) {
				$data['alertMessage'] = 'Quantity can only be numeric';
			} else {
				foreach($this->input->post('part-qty') as $rowId => $partQty) {					
					array_push($cartItems , array(
							'rowid'      => $rowId,
							'qty'     => $partQty
					));
				}
		
				$this->cart->update($cartItems);
				$data['successMessage'] = 'Cart updated.';
			}
		}
		
		
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/cart_display', $data);
		$this->load->view('templates/footer');
	}
	
}