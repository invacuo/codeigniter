<?php
class Orders extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('orders_model');
		$this->load->library('form_validation');
	}
	
	public function index() {	
		if(empty($_GET)) {			
			$data['title'] = 'Lookup Order Information';
			$this->render_page('pages/order_lookup', $data);
		} else {			
			//this is a hack as codeigniter form validation
			//only works with posted form data
			if(empty($_POST)) {
				$_POST = $_GET;
			}
			
			
			$this->form_validation->set_rules('email', 'Email', 'valid_email|max_length[200]');
			$this->form_validation->set_rules('order-number', 'Order Number', 'numeric');
			$email = $this->input->post('email');
			$id = $this->input->post('order-number');
				
			if ($this->form_validation->run() == FALSE || (empty($email) && empty($id))) {
				$data['title'] = 'Lookup Order Information';
				$data['alertMessage'] = 'Please correct the errors below';
				$this->render_page('pages/order_lookup', $data);
			} else {
				$data['id']  = $id;			
				$data['email'] = $email;
				if((empty($id))) {					
					$data['orders'] = $this->orders_model->get_orders_by_email($email);
					
					$data['title'] = 'Orders by <i>'. $email .'</i>: ' . count($data['orders']);
					
					$this->render_page('pages/order_list', $data);
				} else {					
					$data['orders'] = $this->orders_model->get_order_details($id);
					if(count($data['orders']) == 0) {
						$data['title'] = 'No order found';
					} else {
						$data['title'] = 'Order ID: '. $id;
					}
					$this->render_page('pages/order_info', $data);
				}
			}
		}
	}
}

?>