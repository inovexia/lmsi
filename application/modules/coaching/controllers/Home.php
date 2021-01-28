<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {

	var $theme_path;
	
	public function __construct () {
		$config = ['config_coaching'];
	    $this->common_model->autoload_resources ($config);
	    $this->load->helper ('string');
	}

	public function index () {
	}

	public function dashboard () {
		$data['page_title'] = "Dashboard";

		$this->load->view (INCLUDE_PATH . 'header', $data);
		$this->load->view ('dashboard', $data);		
		$this->load->view (INCLUDE_PATH . 'footer', $data);
	}

}
