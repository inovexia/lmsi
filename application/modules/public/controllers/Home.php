<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {

	var $theme_path;
	
	public function __construct () {
		$config = ['config_public'];
	    $this->common_model->autoload_resources ($config);
	    $this->load->helper ('string');
	}

	public function index () {
		$data['hide_navbar'] = true;
		$data['hide_titlebar'] = true;
		$data['hide_sidemenu'] = true;

		$this->load->view (INCLUDE_PATH . 'header', $data);
		$this->load->view ('index', $data);		
		$this->load->view (INCLUDE_PATH . 'footer', $data);
	}

}
