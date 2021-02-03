<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vitals extends MX_Controller {


	// Load Theme
	public function load_theme () {

		$this->load->model ('coaching/settings_model');

		// get coaching theme
		if (! $this->session->userdata ('THEME_CSS')) {
			
			$coaching_id = $this->session->userdata ('coaching_id');

			if ($row = $this->settings_model->get_default_theme ($coaching_id, 'theme')) {
				$theme_path = $row['theme_path'];
				$main_css  = $row['main_css'];
				$theme_css = $theme_path . $main_css;
			} else {
				$theme_path = THEME_DIR . DEFAULT_THEME;
				$main_css = 'assets/css/dore.light.blue.min.css';
				$theme_css = $theme_path . $main_css;		
			}

			$this->session->set_userdata ('THEME_PATH', $theme_path);
			$this->session->set_userdata ('THEME_CSS', $theme_css);

		} else {
			$theme_path = $this->session->userdata ('THEME_PATH');
			$theme_css = $this->session->userdata ('THEME_CSS');
		}

		if (! defined ('THEME_PATH')) {
			define ('THEME_PATH', $theme_path);
		}

		if (! defined ('THEME_CSS')) {
			define ('THEME_CSS', $theme_css);
		}
	}


	public function setup_login () {
		/*
		unset ($_SESSION);
		$data['member_id'] = 143;
		$data['coaching_id'] = 0;
		$data['is_logged_in'] = true;
		$this->session->set_userdata ($data);
		$this->common_model->setup_login ();
		*/
		// print_r ($_SESSION);
	}

	public function is_student () {
		if (isset ($_GET['s'])) {
			$slug = $_GET['s'];
			redirect ('login/user/index/'.$slug);
		}
	}

	// Load default settings
	public function load_defaults () {
		if ( ! $this->session->has_userdata('SITE_TITLE')) {			
    		$config = $this->common_model->load_defaults ();
    		$options = array ();
    		foreach ($config as $name=>$value) {
    			$name = strtoupper ($name);
    			if ( ! defined($name)) {
    				define ($name, $value);
    				$options[$name] = $value;
    			} 
    		}
    		$this->session->set_userdata ($options);
		} else {
		    define ('SITE_TITLE', $this->session->userdata ('SITE_TITLE'));
		    define ('CONTACT_EMAIL', $this->session->userdata ('CONTACT_EMAIL'));
		    define ('HOME_URL', $this->session->userdata ('HOME_URL'));
		    define ('MAX_FILE_SIZE', $this->session->userdata ('MAX_FILE_SIZE'));
		    define ('MAX_STORAGE', $this->session->userdata ('MAX_STORAGE'));
		}
	}
	
	public function validate_session () {
		
		$module = $this->uri->segment (1, 0);
		$controller = $this->uri->segment (2, 0);
		$method = $this->uri->segment (3, 0);
		
		/* 
			For PUBLIC module login is not required, user will not be redirected to Dashboard OR Logout page
		*/
		if ($module == 'public' || $module == 'login' || $module == 'api') {
			/*
			if ($this->session->has_userdata ('is_logged_in') && $this->session->userdata ('is_logged_in') == true) {
				$dashboard = $this->session->userdata ('dashboard');
				// $this->message->set ('You must be logged in to access this page', 'danger', true);
				redirect ($dashboard);
			}
			*/
			// Do Nothing
		} else {
			// If session is not set, logout user
			if (! $this->session->has_userdata ('is_logged_in')) {
				$this->message->set ('You must be logged in to access this page', 'danger', true);
				$redirect = site_url ('public/home/index');
				redirect ($redirect);
			}

			if (($module == 'coaching' || $module == 'admin') && $this->session->userdata('role_id') == USER_ROLE_STUDENT) {
				$this->message->set ('You dont have enough privilege to access this page', 'danger', true);
				redirect ('student/home/dashboard');
			}
		}
	}

		
	// Load default settings
	public function load_acl_menu () {
		$role_id = $this->session->userdata ('role_id');
		if ( ! $this->session->has_userdata ('MAIN_MENU')) {
    		$menus = $this->common_model->load_acl_menus ($role_id, 0, MENUTYPE_SIDEMENU);
    		$this->session->set_userdata ('MAIN_MENU', $menus);
		}
		if ( ! $this->session->has_userdata ('DASHBOARD_MENU')) {
    		$menus = $this->common_model->load_acl_menus ($role_id, 0, MENUTYPE_DASHBOARD);
    		$this->session->set_userdata ('DASHBOARD_MENU', $menus);
		}
		if ( ! $this->session->has_userdata ('FOOTER_MENU')) {
    		$menus = $this->common_model->load_acl_menus ($role_id, 0, MENUTYPE_FOOTER);
    		$this->session->set_userdata ('FOOTER_MENU', $menus);
		}
	}
	
	
}