<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration_model extends CI_Model {


	public function __construct () {
	}


	public function teacher_account_exists ($contact='') {
		$this->db->select ('member_id');
		$this->db->where ('primary_contact', $contact);
		$this->db->where ('role_id', USER_ROLE_TEACHER);
		$sql = $this->db->get ('members');
		if ($sql->num_rows () > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function send_register_otp () {
		$dialing_code = $this->input->post ('dialing_code');
		$mobile = $this->input->post ('primary_contact');
		$contact = $dialing_code . $mobile;
		$now = time();
		$expiry = $now + 300; // 5 minutes
		$ip = $_SERVER['REMOTE_ADDR'];
		$otp = random_string ('numeric', 6);
		$data['register_otp'] = ['mobile'=>$mobile, 'otp'=>$otp, 'expiry'=>$expiry, 'ip'=>$ip];	// 30 minutes
		$this->session->set_userdata ($data);	// Valid for 30 minutes
		$message = $otp . ' is the OTP for your account registration on '. APP_NAME . ' valid for 30 minutes';
		//$this->sms_model->send_sms ($contact, $message);
		return $message;
	}

	public function validate_otp () {
		$now = time();
		$get_otp = $this->session->userdata ('register_otp');
		$expiry = $get_otp['expiry'];
		$ip = $get_otp['ip'];
		$otp = $get_otp['otp'];
		$mobile = $get_otp['mobile'];

		$primary_contact = $this->input->post ('primary_contact');
		$user_otp = $this->input->post ('otp');
		$user_ip = $_SERVER['REMOTE_ADDR'];

		if ($user_otp == $otp && $primary_contact == $mobile && $user_ip == $ip && $now < $expiry) { 
			return true;
		} else {
			return false;
		}
	}

	public function create_teacher_account () {
		$name = explode (" ", $this->input->post ('first_name'));
		$first_name = $name[0];
		if (isset ($name[1])) {
			$last_name = $name[1];
		} else {
			$last_name = '';
		}
		$data['first_name'] = $first_name;
		$data['last_name'] = $last_name;
		$password = $this->input->post ('password');
		$data['role_id'] = USER_ROLE_TEACHER;
		$data['password'] = password_hash ($password, PASSWORD_DEFAULT);
		$data['primary_contact'] =  $this->input->post ('primary_contact');
		$data['user_token'] =  '';
		$data['creation_date'] = time ();
		$data['created_by'] = 0;
		$sql = $this->db->insert ('members', $data);
		$member_id = $this->db->insert_id ();

		// User Id
		$user_id = $this->users_model->generate_reference_id ($member_id);

		// User Token
		$salt = random_string ('alnum', 4);
		$str = $user_id . $member_id . $salt;
		$user_token = md5($str);

		// Update User-id, User-token and Login
		$this->db->set ('user_token', $user_token);
		$this->db->set ('login', $user_id);
		$this->db->set ('adm_no', $user_id);
		$this->db->where ('member_id', $member_id);
		$this->db->update ('members');

		$sl['is_logged_in'] = true;
		$sl['member_id'] = $member_id;
		$sl['coaching_id'] = 0;
		$this->common_model->setup_login ($sl);

		return $member_id;

	}

	public function is_unique_url () {
		return true;
	}

	public function setup_user_account ($member_id=0) {
	}

}