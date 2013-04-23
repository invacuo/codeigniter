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