<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment extends MX_Controller {

	var $theme_path;
	
	public function __construct () {
		$config = ['config_coaching'];
	    $this->common_model->autoload_resources ($config);
	    $this->load->helper ('string');
	}

	public function my_appointments () {
        $data['page_title'] = "My Appointments";

		$this->load->view (TEMPLATE_PATH . 'header', $data);
		$this->load->view ('Appointment/my_appointments', $data);		
		$this->load->view (TEMPLATE_PATH . 'footer', $data);
    }
    
    public function appointment_history () {
        $data['page_title'] = "Appointment History";

		$this->load->view (TEMPLATE_PATH . 'header', $data);
		$this->load->view ('Appointment/appointment_history', $data);		
		$this->load->view (TEMPLATE_PATH . 'footer', $data);
	}

}
