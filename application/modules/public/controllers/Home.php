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

	public function teacher_register () {
		$data['hide_navbar'] = true;
		$data['hide_titlebar'] = true;
		$data['hide_sidemenu'] = true;

		$data['country'] = $this->common_model->get_user_geo_location ();
		$data['country_list'] = $this->common_model->sys_country_list ();
		$data['script'] = $this->load->view ('scripts/register', $data, true); 
		$this->load->view (INCLUDE_PATH . 'header', $data);
		$this->load->view ('teacher_register', $data);		
		$this->load->view (INCLUDE_PATH . 'footer', $data);
	}

	public function login () {
		$data['hide_navbar'] = true;
		$data['hide_titlebar'] = true;
		$data['hide_sidemenu'] = true;

		$data['script'] = $this->load->view ('scripts/register', $data, true); 
		$this->load->view (INCLUDE_PATH . 'header', $data);
		$this->load->view ('login', $data);		
		$this->load->view (INCLUDE_PATH . 'footer', $data);
	}

}
