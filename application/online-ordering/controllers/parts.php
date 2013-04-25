<?php
class Parts extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('parts_model');
		$this->load->library('form_validation');
		$this->load->library('pagination');
	}

	public function index()	{
		$data['title'] = 'Parts Catalog';
		
		$config['base_url'] = '/parts/';
		$config['total_rows'] = $this->parts_model->get_parts_count();
		$config['per_page'] = 10;
		$config['num_links'] = 10;
		$config['use_page_numbers'] = TRUE;
		$this->pagination->initialize($config);
		$data['page_links']=$this->pagination->create_links();
		
		$data['parts'] = $this->parts_model->get_parts();
		
		
		//TODO: Extend the codeigniter's form_validation library
		//to add a new rule to make sure qty is greater than 0 and write a custom mesage
		if($this->input->post()) {
			if(implode("", $this->input->post('part-qty')) ==='') {
				$data['alertMessage'] = 'Please select at least one part.';
			} elseif(preg_match('/([^0-9])/i', implode("", $this->input->post('part-qty')))>0) {
					$data['alertMessage'] = 'Quantity can only be numeric';
			} else {
				$this->load->library('cart');
				
				$cartItems = array();
				
				foreach($this->input->post('part-qty') as $partId => $partQty) {
					//add the parts to the cart
					if($partQty > 0) {
						array_push($cartItems , array(
								'id'      => ''.$partId,
								'qty'     => $partQty,
								'price'   => $this->input->post('part-price-'.$partId),
								'name'    => $this->input->post('part-name-'.$partId),
								'options' => array('Category' =>  $this->input->post('part-category-name-'.$partId))
						));
					}
				}
				
				$this->cart->insert($cartItems);
				$data['successMessage'] = 'Item(s) Successfully added to the cart. <a href="/cart/">Click here</a>  to go to your cart.';
			}
		}
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/part_list', $data);
		$this->load->view('templates/footer');
	}

	/*public function view($id)	{
		$data['parts'] = $this->parts_model->get_parts($id);
	}*/
	
	public function lookup($id = 0, $page_number = 1) {	
		
		
		$data['title'] = 'Parts By Category';
		if((int)$id===0) {
			$config['uri_segment'] = 2;
			$config['base_url'] = '/parts/';
		} else {
			$config['uri_segment'] = 5;
			$config['base_url'] = '/parts/category/'.$id.'/page/';
		}
		
		$config['total_rows'] = $this->parts_model->get_parts_count($id);
		$config['per_page'] = 10;
		$config['num_links'] = 10;
		$config['use_page_numbers'] = TRUE;
		$this->pagination->initialize($config);
		$data['page_links']=$this->pagination->create_links();
		
		$data['page_links']=$this->pagination->create_links();
		$data['id'] = $id;
		
		$data['parts'] = $this->parts_model->get_parts($id, $page_number);
	
		$this->load->view('templates/header', $data);
		$this->load->view('pages/part_list', $data);
		$this->load->view('templates/footer', $data);
	}
}

?>