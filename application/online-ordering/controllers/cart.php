<?php
class Cart extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('cart');
	}
	
	public function index()	{
		$data = array();
		$this->load->view('templates/header', $data);
		$this->load->view('pages/cart_display', $data);
		$this->load->view('templates/footer');
	}
	
}