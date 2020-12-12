<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_actions extends MX_Controller {


	public function __construct () {
		$config = ['config_public'];
		$models = ['registration_model'];
	    $this->common_model->autoload_resources ($config, $models);
	    $this->load->helper ('string');
	}

	/*
	 *
	 Register Page Functions
	 *
	 */

	// Validate User Mobile	
	public function validate_user_mobile ($name='', $mobile='') {
		$status = false;

		// $name = $this->input->post ('first_name');
		if ( !isset ($name) || empty ($name) || $name == "") {
			$message = 'Name is required';
			$this->output->set_content_type("application/json");
			$this->output->set_output(json_encode(array('status'=>$status, 'error'=>$message)));
		} else if ( empty ($mobile) || $mobile == "") {
			$message = 'Mobile number is required';
			$this->output->set_content_type("application/json");
			$this->output->set_output(json_encode(array('status'=>$status, 'error'=>$message)));
		} else if (filter_var( $mobile, FILTER_VALIDATE_INT) == false) {
			$message = 'Check mobile number and try again';
			$this->output->set_content_type("application/json");
			$this->output->set_output(json_encode(array('status'=>$status, 'error'=>$message)));
		} else if (strlen ($mobile) <> 10) {
			$message = 'Mobile number must contain 10 digits';
			$this->output->set_content_type("application/json");
			$this->output->set_output(json_encode(array('status'=>$status, 'error'=>$message)));
		} else {
			
			$otp = $this->registration_model->send_register_otp ($mobile);
			$status = true;
			$message = 'An OTP has been sent on your mobile, valid for 30 minutes. ' . $otp;
			$this->output->set_content_type("application/json");
			$this->output->set_output(json_encode(array('status'=>$status, 'message'=>$message )));
		}
	}


	public function validate_otp ($mobile=0, $otp=0) {
		$status = false;
		$get_otp = $this->session->userdata ('register_otp');
		if ($get_otp['valid'] < time ()) {
			$message = 'This OTP has expired. Please try again';
			$this->output->set_content_type("application/json");
			$this->output->set_output(json_encode(array('status'=>$status, 'error'=>$message )));
		} else if ($get_otp['mobile'] == $mobile && $get_otp['otp'] == $otp) {
			$status = true;
			$message = 'OTP validated successfully';
			$this->output->set_content_type("application/json");
			$this->output->set_output(json_encode(array('status'=>$status, 'message'=>$message )));
		} else {
			$status = false;
			$message = 'Invalid OTP';
			$this->output->set_content_type("application/json");
			$this->output->set_output(json_encode(array('status'=>$status, 'error'=>$message )));
		}
	}

}