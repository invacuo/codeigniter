<?php

class Catalog extends CI_Controller {

	public function part_lookup($id = '1') {
		
		
		$data['id'] = $id; // Capitalize the first letter
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/part_list', $data);
		$this->load->view('templates/footer', $data);
	}
}
?>