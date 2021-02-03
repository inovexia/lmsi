<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MX_Controller {
    
    public function __construct () {
		$config = ['config_login'];
	    $models = ['login_model'];	    
	    $this->common_model->autoload_resources ($config, $models);
		
		$this->load->helper ('file');
		
		$this->load->helper('captcha');
	}
	
 	public function index ($slug='') {

 		$coaching = $this->coaching_model->get_coaching_by_slug ($slug);
 		if ($coaching == false) {

 		} else {
	    	// Load Coaching Settings
			$logo_path = $this->config->item ('system_logo');
			$logo = base_url ($logo_path);
			$page_title = $coaching['coaching_name'];

			$data['page_title'] = $page_title;
			$data['logo'] = $logo;
			$data['slug'] = $slug;
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
			$this->load->view ('student/login', $data);
			$this->load->view (INCLUDE_PATH . 'footer', $data); 		
 		}
	}
	
	
	/* forgot password */
	public function register ($slug='') {

 		$coaching = $this->coaching_model->get_coaching_by_slug ($slug);
 		if ($coaching == false) {

 		} else {
	    	// Load Coaching Settings
			$logo_path = $this->config->item ('system_logo');
			$logo = base_url ($logo_path);
			$page_title = $coaching['coaching_name'];

			$data['page_title'] = $page_title;
			$data['logo'] = $logo;
			$data['slug'] = $slug;
			$data['coaching'] = $coaching;
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
			$this->load->view ('student/register', $data);
			$this->load->view (INCLUDE_PATH . 'footer', $data); 		
 		}	
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
	public function create_password ($user_id='') {


		if (isset ($_GET['sub']) && ! empty ($_GET['sub']) && $_GET['sub'] != 'undefined') {
    		$access_code = $_GET['sub'];
		} else {
			$access_code = ACCESS_CODE;
		}

		$coaching = $this->coachings_model->get_coaching_by_slug ($access_code);
		if ($coaching) {
			$coaching_dir = 'contents/coachings/' . $coaching['id'] . '/';
			$coaching_logo = $this->config->item ('coaching_logo');
			$logo_path =  $coaching_dir . $coaching_logo;
			$logo = base_url ($logo_path);
			$page_title = 'Create Password ' . $coaching['coaching_name'];
		} else {
			$access_code = '';
			$logo = base_url ($this->config->item('system_logo'));
			$page_title = 'Create Password ' . SITE_TITLE;
		}

    	if ( empty ($access_code)) {
			$this->message->set ('Direct registration not allowed', 'danger', true);
			redirect ('login/user/index');    		
    	}

		$result			=	$this->login_model->get_member_by_md5login ($user_id);
		$coaching_id	=	$result['coaching_id'];
		
		$link_send_time	=	$result['link_send_time'];
		$difference		=	time() - $link_send_time;
		if ($difference > 3600*48) {		// Email link is valid only for 48 hours
			echo 'This link has expired. Please '.anchor ('login/user/forgot_password', 'Try again');
		} else {
			$coaching = $this->coachings_model->get_coaching($coaching_id );
			$data['coaching_id'] 		= $coaching_id;
			$data['coaching'] 			= $coaching;
			$data['member_id'] 			= $result['member_id'];
			$data['result'] 			= $result;
			$data['hide_left_sidebar'] 	= true;
			$data['page_title'] = $page_title;
			$data['slug'] = $slug;
			$data['logo'] = $logo;
			$this->load->view ( INCLUDE_PATH . 'header', $data);
			$this->load->view ( 'password', $data);
			$this->load->view ( INCLUDE_PATH . 'footer', $data);
		}
	}
}