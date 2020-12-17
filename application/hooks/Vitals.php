<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vitals extends MX_Controller {


	// Load Theme
	public function load_theme () {
		$theme_dir = THEME_DIR;
		$template_dir = TEMPLATE_DIR;

		$theme = DEFAULT_THEME;
		$theme_path = $theme_dir . $theme;
		$template_path = $template_dir . $theme;
		if (! defined ('THEME_PATH')) {
			define ('THEME_PATH', $theme_path);
		}
		if (! defined ('TEMPLATE_PATH')) {
			define ('TEMPLATE_PATH', $template_path);
			define ('INCLUDE_PATH', TEMPLATE_PATH);
		}

		$this->session->set_userdata ('member_id', 1);
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
		if ($module == 'public' || $module == 'login' || ($module == 'admin' && $controller == 'login') || ($module == 'admin' && $controller == 'login_actions')) {
			// Do Nothing
		} else {
			// If session is not set, logout user
			if (! $this->session->has_userdata ('is_logged_in')) {
				$redirect = site_url ('login/login/index');
				redirect ($redirect);
			}

			if ($module == 'coaching' && $this->session->userdata('role_id') == USER_ROLE_STUDENT) {
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