<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Settings extends MX_Controller {

	var $coaching_id = 0;
	
	public function __construct () { 
	    $config = ['config_coaching'];
	    $models = ['coaching_model', 'settings_model'];
	    $this->common_model->autoload_resources ($config, $models);
	    $this->load->helper ('file');

	    if ($this->uri->segment (4)) {
        	$coaching_id = $this->uri->segment (4);
	    } else {
	    	$coaching_id = $this->session->userdata ('coaching_id');
	    }

	   $this->coaching_id = $coaching_id;
        
        // Security step to prevent unauthorized access through url
        if ($this->session->userdata ('is_admin') == TRUE) {
        } else {
            if ($coaching_id == true && $this->session->userdata ('coaching_id') <> $coaching_id) {
                $this->message->set ('Direct url access not allowed', 'danger', true);
                redirect ('coaching/home/dashboard');
            }
        }

	}

	public function index ($coaching_id=0) {
		$coaching_id = $this->coaching_id;
		if ($coaching_id == 0) {
			$this->setup_coaching_account ();
		} else {
			$this->account_info ($coaching_id);
		}
	}

	public function account_info ($coaching_id=0) {

		$coaching_id = $this->coaching_id;

		$data['page_title'] = 'Account Information';
		
		/* Back Link */
		$data['bc'] = array ('Dashboard'=>'coaching/home/dashboard/'.$coaching_id);
		$data['coaching'] = $this->coaching_model->get_coaching ($coaching_id);
		$data['coaching_id'] = $coaching_id;
		
		$this->load->view(INCLUDE_PATH . 'header', $data);
		$this->load->view('settings/account_info', $data);
		$this->load->view(INCLUDE_PATH . 'footer', $data);
	
	}

	public function setup_coaching_account () {

		$coaching_id = $this->coaching_id;

		$data['page_title'] = 'Setup Your Account';
		
		/* Back Link */
		$data['bc'] = array ('Dashboard'=>'coaching/home/dashboard');

		$data['script'] = $this->load->view ('settings/scripts/setup_account', $data, true);
		
		$this->load->view(INCLUDE_PATH . 'header', $data);
		$this->load->view('settings/account_setup', $data);
		$this->load->view(INCLUDE_PATH . 'footer', $data);			
	}

	

	public function account_settings ($coaching_id=0) {

		$coaching_id = $this->coaching_id;

		$data['page_title'] = 'Account Settings';
		
		/* Back Link */
		$data['bc'] = array ('Dashboard'=>'coaching/home/dashboard/'.$coaching_id);
		$data['coaching'] = $this->coaching_model->get_coaching ($coaching_id);
		$data['settings'] = $this->settings_model->get_settings ($coaching_id);
		$data['coaching_id'] = $coaching_id;
		
		$this->load->view(INCLUDE_PATH . 'header', $data);
		$this->load->view('settings/account_settings', $data);
		$this->load->view(INCLUDE_PATH . 'footer', $data);

	}

	public function default_settings ($coaching_id=0) {

		$coaching_id = $this->coaching_id;

		$data['page_title'] = 'Default Settings';
		
		/* Back Link */
		$data['bc'] = array ('Dashboard'=>'coaching/home/dashboard/'.$coaching_id);
		$data['coaching'] = $this->coaching_model->get_coaching ($coaching_id);
		$data['country_list'] = $this->common_model->sys_country_list ();
		$data['theme_list'] = $this->common_model->sys_themes ();
		$data['default'] = $this->settings_model->get_default_settings ($coaching_id);
		$data['settings'] = $this->settings_model->get_settings ($coaching_id);
		$data['coaching_id'] = $coaching_id;
		
		$this->load->view(INCLUDE_PATH . 'header', $data);
		$this->load->view('settings/default_settings', $data);
		$this->load->view(INCLUDE_PATH . 'footer', $data);

	}

	public function user_settings ($coaching_id=0) {

		$coaching_id = $this->coaching_id;
		$member_id = $this->session->userdata ('member_id');

		$data['page_title'] = 'User Settings';
		
		/* Back Link */
		$data['bc'] = array ('Dashboard'=>'coaching/home/dashboard/'.$coaching_id);
		$data['coaching'] = $this->coaching_model->get_coaching ($coaching_id);
		$data['default'] = $this->users_model->get_default_settings ($member_id);
		$data['coaching_id'] = $coaching_id;
		$data['member_id'] = $member_id;
		
		$this->load->view(INCLUDE_PATH . 'header', $data);
		$this->load->view('settings/user_settings', $data);
		$this->load->view(INCLUDE_PATH . 'footer', $data);

	}


	
	/* GENERAL SETTINGS PAGE */
	public function general ($coaching_id=0) {
		$data['page_title'] = 'General Settings';
		/* Back Link */
		
		$data['bc'] = array ('Dashboard'=>'coaching/home/dashboard/'.$coaching_id);
		$coaching = $this->coaching_model->get_coaching ($coaching_id);
		$settings = $this->settings_model->get_settings ($coaching_id);
		$data['classrooms'] = $this->settings_model->get_classrooms ($coaching_id, $limit=3);
		
		$coaching_dir = 'contents/coachings/' . $coaching_id . '/';
		$coaching_logo = $this->config->item ('coaching_logo');
		$logo_path =  $coaching_dir . $coaching_logo;
		$logo = base_url ($logo_path);
		if (read_file ($logo)) {
			$is_logo = true;
		} else {
			$is_logo = false;
		}

		$data['logo'] 	 = $logo;
		$data['is_logo'] 	 = $is_logo;

		$data['rand_str'] = time ();
		$data['coaching'] = $coaching;
		$data['settings'] = $settings;
		$data['coaching_id'] = $coaching_id;
		
		$this->load->view(INCLUDE_PATH . 'header', $data);
		$this->load->view('settings/index', $data);
		$this->load->view(INCLUDE_PATH . 'footer', $data);
	}
	
	// Classrooms
	public function classrooms ($coaching_id=0) {
		/* Breadcrumbs */ 
		$data['bc'] = array ('Settings'=>'coaching/settings/index/'.$coaching_id);

		$data['page_title'] = 'Classrooms';
		$data['coaching_id'] = $coaching_id;		

		$data['classrooms'] = $this->settings_model->get_classrooms ($coaching_id);
		$data['script'] = $this->load->view ('settings/scripts/classrooms', $data, true);
		$this->load->view(INCLUDE_PATH  . 'header', $data);
		$this->load->view('settings/classrooms', $data);
		$this->load->view(INCLUDE_PATH  . 'footer', $data);
	    
	}
	
	
}