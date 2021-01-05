<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_actions extends MX_Controller {


	public function __construct () {
		$config = ['config_public'];
		$models = ['registration_model', 'coaching/users_model'];
	    $this->common_model->autoload_resources ($config, $models);
	    $this->load->helper ('string');
	}

	/*
	 *
	 Register Page Functions
	 *
	 */

	// Validate User Mobile	
	public function validate_user_mobile () {

		$this->form_validation->set_rules ('first_name', 'Name', 'required|trim|alpha_numeric_spaces|min_length[3]', 
				['min_length'=>'Name is too short. Should be atleast 3 characters']);
		$this->form_validation->set_rules ('primary_contact', 'Mobile Number', 'required|is_natural|min_length[10]|max_length[15]');

		if ($this->form_validation->run () == true) {

			$contact 	= $this->input->post ('primary_contact');

			if ($this->registration_model->teacher_account_exists ($contact) == true) {
				$message = 'This mobile number number is already registered with an account. If this is your number try SignIn or Forgot Password';
				$this->output->set_content_type("application/json");
				$this->output->set_output(json_encode(array('status'=>false, 'error'=>$message)));
			} else {
				$otp = $this->registration_model->send_register_otp ();
				$message = 'An OTP has been sent on your mobile, valid for 30 minutes. ' . $otp;
				$this->output->set_content_type("application/json");
				$this->output->set_output(json_encode(array('status'=>true, 'message'=>$message )));				
			}
		} else {
			$this->output->set_content_type("application/json");
			$this->output->set_output(json_encode(array('status'=>false, 'error'=>validation_errors ())));
		}
	}


	public function validate_otp ($mobile=0, $otp=0) {

		$this->form_validation->set_rules ('otp', 'OTP', 'required|trim|is_natural|exact_length[6]');

		if ($this->form_validation->run () == true) {
			if ($this->registration_model->validate_otp () == true ) {
				$message = 'OTP validated successfully. Now create your password';
				$this->output->set_content_type("application/json");
				$this->output->set_output(json_encode(array('status'=>true, 'message'=>$message )));
			} else {
				$message = 'Invalid OTP or OTP expired. Please try again';
				$this->output->set_content_type("application/json");
				$this->output->set_output(json_encode(array('status'=>false, 'error'=>$message)));
			}
		} else {
			$this->output->set_content_type("application/json");
			$this->output->set_output(json_encode(array('status'=>false, 'error'=>validation_errors ())));
		}
	}

	
	public function register_teacher () {
		$this->form_validation->set_rules ('first_name', 'Name', 'required|trim|alpha_numeric_spaces|min_length[3]', 
				['min_length'=>'Name is too short. Should be atleast 3 characters']);
		$this->form_validation->set_rules ('primary_contact', 'Mobile Number', 'required|is_natural|min_length[10]|max_length[15]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('agree', 'Agree', 'required', ['required'=>'You must agree to the terms and conditions']); 
		 
		if ( $this->form_validation->run() == true) {
			
			$contact 	= $this->input->post ('primary_contact');
			$user_name 	= $this->input->post ('first_name');
			$email 		= $this->input->post ('email');

			// Save user details
			$member_id = $this->registration_model->create_teacher_account ();
				
			// Notification Email to teacher
			if ($email != '') {
				$to = $email;
				$subject = 'Welcome to '.APP_NAME;
				$data['name'] = $user_name;
				$message = $this->load->view (EMAIL_TEMPLATE . 'create_teacher_account', $data, true);
				$this->common_model->send_email ($to, $subject, $message);
			}					
					
			// Send SMS to user
			$data['name'] = $user_name;
			$message = $this->load->view (SMS_TEMPLATE . 'create_teacher_account', $data, true);
			$this->sms_model->send_sms ($contact, $message);
			$this->message->set ($message, 'success', true );
			$this->output->set_content_type("application/json");
			$this->output->set_output(json_encode(array('status'=>true, 'message'=>$message)));
	    } else {
			$this->output->set_content_type("application/json");
			$this->output->set_output(json_encode(array('status'=>false, 'error'=>validation_errors() )));
		}
	}

	
	public function is_unique_url () {

		$this->form_validation->set_rules ('url', 'URL', 'required|trim|valid_url|alpha_numeric|min_length[4]|max_length[20]');

		if ($this->form_validation->run () == true) {
			if ($this->registration_model->is_unique_url () == false) {
				$this->output->set_content_type("application/json");
				$this->output->set_output(json_encode(array('status'=>false, 'error'=>'This url is already taken by someone')));
			}
		} else {
			$this->output->set_content_type("application/json");
			$this->output->set_output(json_encode(array('status'=>false, 'error'=>validation_errors ())));
		}
	}


	public function validate_user_account () {

		$this->form_validation->set_rules ('display_name', 'Display Name', 'required|trim|alpha_numeric_spaces|min_length[3]|max_length[20]');
		$this->form_validation->set_rules ('url', 'URL', 'required|trim|valid_url|alpha_numeric|min_length[4]|max_length[20]');

		if ($this->form_validation->run () == true) {
			if ($this->registration_model->is_unique_url () == true) {
				$this->registration_model->setup_user_account ();
				$this->output->set_content_type("application/json");
				$this->output->set_output(json_encode(array('status'=>true, 'message'=>'Account created successfully.', 'redirect'=>site_url ('coaching/home/dashboard'))));
			} else {
				$this->output->set_content_type("application/json");
				$this->output->set_output(json_encode(array('status'=>false, 'error'=>'This url is already taken by someone')));
			}
		} else {
			$this->output->set_content_type("application/json");
			$this->output->set_output(json_encode(array('status'=>false, 'error'=>validation_errors ())));
		}
	}

}