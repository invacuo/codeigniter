<?php
class Parts extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('parts_model');
		$this->load->library('form_validation');
		$this->load->library('pagination');
	}

	public function index()	{
		$data['title'] ='All parts';
		
		/*TODO: Find a better way of setting the config for pagination
		 * instead of doing it in each function
		 * */
		$config['base_url'] = '/parts/';
		$config['total_rows'] = $this->parts_model->get_parts_count();
		$config['per_page'] = 10;
		$config['num_links'] = 10;
		$config['use_page_numbers'] = TRUE;
		$this->pagination->initialize($config);
		$data['page_links']=$this->pagination->create_links();
		
		$data['parts'] = $this->parts_model->get_parts();
		
		
		if($this->addToCart()) {			
			$data['successMessage'] = 'Item(s) Successfully added to the cart. <a href="/cart/">Click here</a>  to go to your cart.';
		}
		
		$this->render_page('pages/part_list', $data);
	}
	
	public function lookup($id = 0, $page_number = 1) {	
		
		if((int)$id===0) {
			$config['uri_segment'] = 2;
			$config['base_url'] = '/parts/';
		} else {
			$config['uri_segment'] = 5;
			$config['base_url'] = '/parts/category/'.$id.'/page/';
		}
		
		if($this->addToCart()) {
			$data['successMessage'] = 'Item(s) Successfully added to the cart. <a href="/cart/">Click here</a>  to go to your cart.';
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
		
		if(count($data['parts']) == 0) {
			$data['title'] = 'There are no parts in this category.';
		} elseif((int)$id!=0) {
			$data['title'] = $data['parts'][0]['part_category'];
		} else {
			$data['title'] ='All parts';
		}
		
		$this->render_page('pages/part_list', $data);
	}
	
	
	protected function addToCart() {
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
		
				return $this->cart->insert($cartItems);
			}
		}
		return false;
	}
}

?>