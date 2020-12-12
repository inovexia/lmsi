<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model {


	// Set config items. This will be a one time process
	public function load_defaults () {
		// get from database
		$this->load->dbutil();
		$dbs = $this->dbutil->list_databases();			
		$config = array ();			
		if ( ! empty($dbs)) {	// To check if a database exists
			$sql = $this->db->get ('sys_config');
			if ( $sql->num_rows() > 0 ) {
				$result = $sql->result_array ();
				foreach ( $result as $row ) {
					$config[$row['name']] = $row['value'];						
				}
			}
		}
		if ( empty ($config)) {
			// get from config file
			$config = $this->config->item ('general');
		}
		return $config;
	} 
	
	
	/*
		ACL MENU
	*/
	public function load_acl_menus ($role_id=0, $parent_id=0, $menu_type=MENUTYPE_SIDEMENU) {
		$this->db->where ('group_id', $role_id);
		$this->db->where ('parent_menu_id', $parent_id);
		$this->db->where ('menu_type', $menu_type);
		$this->db->where ('status', 1);
		$this->db->order_by ('menu_order', 'ASC');
		$sql = $this->db->get ('sys_menus');
		return $sql->result_array ();
	}


    /* Dynamically load default resources */
	public function autoload_resources ($config=[], $models=[]) {
		if ( ! empty ($config)) {
			foreach ($config as $file) {
				// Load Config Files
				$this->load->config ($file);
			}
		}

		if ( ! empty ($models)) {
			foreach ($models as $file) {
				// Load Config Files
				$this->load->model ($file);
			}
		}
	}

	

	/*
		GET SYSTEM PARAMETERS
		-------============-------
	*/
	public function get_sys_parameters ($category='') {
		$result = false;
		if ($category != '') {
			$this->db->where ('category', $category);
			$this->db->where ('status', 1);
			$this->db->order_by ('paramorder', 'ASC');
			$sql = $this->db->get ('sys_parameters');
			if ($sql->num_rows () > 0 ) {
				$result = $sql->result_array ();
			}
		}
		return $result;
	}
	
	public function sys_parameter_name ($category='', $param=0) {
		$result = false;
		$this->db->where ('category', $category);
		$this->db->where ('status', 1);
		$this->db->where ('paramkey', $param);
		$this->db->or_where ('paramval', $param);
		$sql = $this->db->get ('sys_parameters');
		$result = $sql->row_array ();
		return $result; 
	}


	/* USER FUNCTIONS */
	// Generate user token
	public function generate_user_token ($member_id=0) {

		$this->load->library('encryption');

		$this->db->select ('login');
		$this->db->where ('member_id', $member_id);
		$sql = $this->db->get ('members');
		if ($sql->num_rows() > 0 ) {
			$row = $sql->row_array ();
			$login = $row['login']; 
			$cipher_token = $this->encryption->encrypt ($login);
			return $cipher_token; 
		} else {
			return false;
		}
	}
	
	// Get user token
	public function get_user_token ($member_id=0) {
		$this->db->select ('token');
		$this->db->where ('member_id', $member_id);
		$sql = $this->db->get ('members');
		$row = $sql->row_array ();
		$token = $row['token']; 
		return $token; 
	}
	
	

	public function generate_coaching_id ($coaching_id=0) {
		
		$id = 0;
		if ($coaching_id > 0) {
			// This means coaching record is already inserted and the primary key is passed as coaching_id
			$num = $coaching_id;
		} else {
			// Coaching record is not yet inserted, show a 
			$this->db->select_max ('id');
			$sql = $this->db->get ('coachings');
			if ($sql->num_rows () > 0) {
				$row = $sql->row_array ();
				$id = $row['id'];
			} else { 
				$id = 0;
			}
			$num = $id + COACHING_ID_INCREMENT;
		}
		$suffix = str_pad ($num, 5, "0", STR_PAD_LEFT);
		$ref_id = COACHING_ID_PREFIX1 . COACHING_ID_PREFIX2 . $suffix;
		return $ref_id;
	}


}