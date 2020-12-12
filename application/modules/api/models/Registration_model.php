<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration_model extends CI_Model {


	public function __construct () {
	}


	public function send_register_otp ($mobile=0) {
		$otp = random_string ('numeric', 6);
		$data['register_otp'] = ['mobile'=>$mobile, 'otp'=>$otp, 'valid'=>time ()+1800];	// 30 minutes
		$this->session->set_userdata ($data);	// Valid for 30 minutes
		$message = $otp . ' is the OTP for your account registration on '. APP_NAME . ' valid for 30 minutes';
		$this->sms_model->send_sms ($mobile, $message);
		return $message;
	}

}