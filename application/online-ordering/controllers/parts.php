<?php
class Parts extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('parts_model');
	}

	public function index()	{
		$data['parts'] = $this->parts_model->get_parts();
		
		$data['title'] = 'Parts Catalog';		
		$this->load->view('templates/header', $data);
		
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		
		//Default form validation provided by codeigniter does not work for checkboxes
		//as nothing is submitted unless a checkbox is checked		
		//TODO: Extend the form validation library and add a new checked validation to it
		//$this->form_validation->set_rules('part-id[]', 'Part', 'required'); 
		
		if(!empty($_POST)) {
			if(empty($_POST['part-id'])) {	
				$data['message'] = 'Please select at least one part.';
				$this->load->view('pages/flash_message', $data);
			} else {
				//add the parts to the cart
			}
		}
		
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