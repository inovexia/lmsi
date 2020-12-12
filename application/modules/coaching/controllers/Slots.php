<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slots extends MX_Controller {

	var $theme_path;
	
	public function __construct () {
		$config = ['config_coaching'];
	    $this->common_model->autoload_resources ($config);
	    $this->load->helper ('string');
	}

	public function index () {
        $data['page_title'] = "Slots";

		$this->load->view (TEMPLATE_PATH . 'header', $data);
		$this->load->view ('Slots/index', $data);		
		$this->load->view (TEMPLATE_PATH . 'footer', $data);
	}

	public function create_slot () {
		$data['page_title'] = "Create Slot";

		$this->load->view (TEMPLATE_PATH . 'header', $data);
		$this->load->view ('slots/create_slot', $data);		
		$this->load->view (TEMPLATE_PATH . 'footer', $data);
	}

}
