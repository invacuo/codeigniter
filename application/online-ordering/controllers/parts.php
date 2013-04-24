<?php
class Parts extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('parts_model');
	}

	public function index()	{		
		$data['title'] = 'Parts Catalog';		
		$data['parts'] = $this->parts_model->get_parts();
		
		$this->load->helper('form');
		
		
		$this->load->library('form_validation');
		
		//TODO: Extend the codeigniter's form_validation library
		//to add a new rule to make sure qty is greater than 0 and write a custom mesage
		if($this->input->post()) {
			if(implode("", $this->input->post('part-qty')) ==='') {
				$data['alertMessage'] = 'Please select at least one part.';
			} else {
				foreach($this->input->post('part-qty') as $part) {
					//add the parts to the cart
					$this->load->library('cart');
					$cartItem = array(
							'id'      => $part,
							'qty'     => 1,
							'price'   => 39.95,
							'name'    => 'T-Shirt'
					);
		
					$this->cart->insert($data);
				}
				
				$data['successMessage'] = 'Item(s) Successfully added to the cart. <a href="/cart/">Click here</a>  to go to your cart.';
			}
		}
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/part_list', $data);
		$this->load->view('templates/footer');
	}

	public function view($id)	{
		$data['parts'] = $this->parts_model->get_parts($id);
	}
	
	public function lookup($id = '1') {	
	
		$data['id'] = $id;
		
		$data['parts'] = $this->parts_model->get_parts($id);
	
		$this->load->view('templates/header', $data);
		$this->load->view('pages/part_info', $data);
		$this->load->view('templates/footer', $data);
	}
}

?>