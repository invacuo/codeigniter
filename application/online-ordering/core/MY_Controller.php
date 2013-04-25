<?php
class MY_Controller extends CI_Controller {
	
	var $categories;
	
	public function __construct() {
		parent::__construct();
		
		//get all the categories to show in the header
		//this query is cached so there will be minimal performance overhead
		$this->load->model('categories_model');		
		$this->categories = $this->categories_model->get_categories();
	}
	
	public function render_page($viewPath = 'pages/part_list', $data) {
		$data['categories']= $this->categories;
		$this->load->view('templates/header', $data);
		$this->load->view($viewPath, $data);
		$this->load->view('templates/footer', $data);
	}
}
?>