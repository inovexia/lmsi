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
						$email_message = 'A new user <strong>'.$user_name.'</strong> has registered in your coaching <strong>'.$coaching_name. '</strong>. ';
					if ($status == USER_STATUS_UNCONFIRMED) {
						$email_message .= 'Account is pending for approval. Click here for details ' . anchor ('coaching/users/index/'.$coaching_id.'/'.$user_role.'/'.USER_STATUS_UNCONFIRMED);
					} 
					$this->common_model->send_email ($to, $subject, $email_message);
				}
			
				// Notification email to user
				if ($status == USER_STATUS_UNCONFIRMED) {
					// Email message for user
					$email_message = '<strong> Hi '.$user_name.',</strong><br>
					<p>You have created an account in <strong>'.$coaching_name.'</strong>. You can login with your registered email and password once your account is approved. You will receive another email regarding account approval.</p>';
					// Display message for user
					$message = 'Your account in '.$coaching_name.' has been created but pending for admin approval. You will be notified once your account is approved by your coaching admin';
					$this->message->set ($message, 'warning', true );
					// Send SMS to user
					$this->sms_model->send_sms ($contact, $message);
				} else {
					
					// Email message for user
					$email_message = '<strong> Hi '.$user_name.',</strong><br>
					<p>You have created an account in <strong>'.$coaching_name.'</strong>. Your account is active now. You can login with your registered email and password.</p>';
					
					// Display message for user
					$message = 'Your account has been created. You can log-in to your account';
					
					// Send SMS to user
					$data['name'] = $user_name;
					$data['coaching_name'] = $coaching['coaching_name'];
					$data['access_code'] = $coaching['reg_no'];
					$data['url'] = site_url ('login/login/index/?sub='.$data['access_code']);
					$data['login'] = $contact;
					$data['password'] = $this->input->post ('password');
					$message = $this->load->view (SMS_TEMPLATE . 'user_acc_created', $data, true);
					$this->sms_model->send_sms ($contact, $message);
					$this->message->set ($message, 'success', true );
				}
				if ($this->input->post ('email')) {
					$to = $this->input->post('email');
					$subject = 'Account Created';
					$this->common_model->send_email ($to, $subject, $email_message);				
				}

				$this->output->set_content_type("application/json");
				$this->output->set_output(json_encode(array('status'=>true, 'message'=>$message, 'redirect'=>site_url('login/user/index?sub='.$ac)) ));
			}
	    } else {
			$this->output->set_content_type("application/json");
			$this->output->set_output(json_encode(array('status'=>false, 'error'=>validation_errors() )));
		}
	}
}