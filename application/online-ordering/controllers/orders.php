<?php
class Orders extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('orders_model');
	}

	public function index()	{
		$data['orders'] = $this->orders_model->get_orders();
		
		$data['title'] = 'List of Orders';		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/order_list', $data);
		$this->load->view('templates/footer');
	}

	public function view($id)	{
		$data['orders'] = $this->orders_model->get_orders($id);
	}
	
	public function lookup($id = '1') {	
	
		$data['id'] = $id;
		
		$data['orders'] = $this->orders_model->get_orders($id);
	
		$this->load->view('templates/header', $data);
		$this->load->view('pages/order_info', $data);
		$this->load->view('templates/footer', $data);
	}
}

?>