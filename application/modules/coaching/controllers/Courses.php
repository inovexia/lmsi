<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends MX_Controller {

	var $theme_path;
	
	public function __construct () {
		$config = ['config_coaching'];
	    $this->common_model->autoload_resources ($config);
	    $this->load->helper ('string');
	}

	public function index () {
        $data['page_title'] = "Courses";

		$this->load->view (TEMPLATE_PATH . 'header', $data);
		$this->load->view ('Courses/index', $data);		
		$this->load->view (TEMPLATE_PATH . 'footer', $data);
	}

	// public function courses () {
	// 	$data['page_title'] = "Courses";

	// 	$this->load->view (TEMPLATE_PATH . 'header', $data);
	// 	$this->load->view ('courses', $data);		
	// 	$this->load->view (TEMPLATE_PATH . 'footer', $data);
	// }

}
