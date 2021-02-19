<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends MX_Controller {
    
    public function __construct () {
		$config = ['config_login'];
	    $models = ['login_model'];	    
	    $this->common_model->autoload_resources ($config, $models);
		
		$this->load->helper ('file');
		
		$this->load->helper('captcha');
	}
	
 	public function index () {

    	// Default settings
		$logo_path = $this->config->item ('system_logo');
		$logo = base_url ($logo_path);
		$page_title = APP_NAME;

		$data['page_title'] = $page_title;
		$data['logo'] = $logo;
		$data['hide_navbar'] = true;
		$data['hide_sidemenu'] = true;
		$data['hide_titlebar'] = true;

		$captcha_dir = $this->config->item ('captcha_dir');

		$vals = array(
				'word'          => '',
				'img_path'      => $captcha_dir,
				'img_url'       => base_url ($captcha_dir),
				'img_width'     => '125',
				'img_height'    => 30,
				'word_length'   => 6,
				'font_size'     => 16,
				'img_id'        => 'Imageid',
				'pool'          => '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ',				

				// White background and border, black text and red grid
				'colors'        => array(
						'background' => array(20, 83, 136),
						'border' => array(255, 255, 255),
						'text' => array(255,255,255),
						'grid' => array(20, 83, 136)
				)
		);

		$cap = create_captcha($vals);
		$ip_address = $_SERVER['REMOTE_ADDR'];
		$captcha_key = array('time' => $cap['time'], 'ip_address' => $ip_address, 'word' => $cap['word']);
		$this->session->set_userdata('captcha_key', $captcha_key);
		$data['captcha'] = $cap['image'];		
		
		$data['script'] = $this->load->view ('scripts/login', $data, true); 
		$this->load->view (INCLUDE_PATH . 'header', $data);
		$this->load->view ('teacher/login', $data);
		$this->load->view (INCLUDE_PATH . 'footer', $data);
	}

	
	public function register () {
		$data['hide_navbar'] = true;
		$data['hide_titlebar'] = true;
		$data['hide_sidemenu'] = true;

		$data['country'] = $this->common_model->get_user_geo_location ();
		$data['country_list'] = $this->common_model->sys_country_list ();
		$data['script'] = $this->load->view ('scripts/teacher/register', $data, true); 
		$this->load->view (INCLUDE_PATH . 'header', $data);
		$this->load->view ('teacher/register', $data);		
		$this->load->view (INCLUDE_PATH . 'footer', $data);
	}


	
	/* forgot password */
	public function reset_password () {

		// Default settings
		$logo_path = $this->config->item ('system_logo');
		$logo = base_url ($logo_path);
		$page_title = APP_NAME;
		
		$data['page_title'] = $page_title;
		$data['logo'] 		= $logo;
		$data['hide_navbar'] = true;
		$data['hide_sidemenu'] = true;
		$data['hide_titlebar'] = true;

		
		$this->load->view (INCLUDE_PATH . 'header', $data);
		$this->load->view ('teacher/reset_password');		
		$this->load->view (INCLUDE_PATH . 'footer', $data);
	}
	

	/* create password for new user register */
	public function create_password ($user_token='') {

    	// Default settings
		$logo_path = $this->config->item ('system_logo');
		$logo = base_url ($logo_path);
		$page_title = APP_NAME;

		$data['page_title'] = $page_title;
		$data['logo'] = $logo;
		$data['hide_navbar'] = true;
		$data['hide_sidemenu'] = true;
		$data['hide_titlebar'] = true;
		$data['user_token'] = $user_token;

		$now = time ();
		$time = $now - (30 * 60); // 30 minutes from now
		if ( ! ($user = $this->login_model->is_valid_request ($user_token, $time))) {
			$valid_request = false;
		} else {
			$valid_request = true;
		}

		$data['valid_request'] = $valid_request;
		$data['user'] = $user;
		//$data['script'] = $this->load->view ('scripts/login', $data, true); 
		$this->load->view ( INCLUDE_PATH . 'header', $data);
		$this->load->view ( 'teacher/create_password', $data);
		$this->load->view ( INCLUDE_PATH . 'footer', $data);
	}	

  public function logout () {
		$this->session->sess_destroy ();
		$this->message->set ('You have successfully logged out', 'success', true);
		$redirect = site_url ('public/home/index');
		redirect ($redirect);
	}
}