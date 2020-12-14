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

	
	public function register () {
		$this->form_validation->set_rules('first_name', 'Name', 'required|trim', ['required'=>'Please enter Your Name.']); 
		$this->form_validation->set_rules('primary_contact', 'Primary Contact', 'required|is_natural|trim|max_length[14]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|trim');
		$this->form_validation->set_rules('agree', 'Agree', 'required', ['required'=>'You must agree to the terms and conditions']); 
		$this->form_validation->set_rules ('access_code', 'Access Code', 'required|trim', ['required'=>'Please enter your access code which you recieved from your institution']);
		 
		if ( $this->form_validation->run() == true) {
			
			$ac = $this->input->post ('access_code');
			$coaching = $this->coaching_model->get_coaching_by_slug ($ac);
			$coaching_id = $coaching['id'];
			$email 	= $this->input->post ('email');
			$contact 	= $this->input->post ('primary_contact');

			$coaching_sub = $this->coaching_model->get_coaching_subscription ($coaching_id);			
			$max_users = $coaching_sub['max_users'];
			$num_users = $this->users_model->count_all_users ($coaching_id);
			
			
			if (! $coaching) {
				$this->output->set_content_type("application/json");
				$this->output->set_output(json_encode(array('status'=>false, 'error'=>'You have provided wrong access code' )));
			} else if ( $num_users >= $max_users) {
				$this->output->set_content_type("application/json");
				$this->output->set_output(json_encode(array('status'=>false, 'error'=>'Maximum user account limit for current subscription plan has been reached. Contact your coaching owner to upgrade their subscription plan.' )));
			} else if ($this->users_model->coaching_contact_exists ($contact, $coaching_id) == true) {
				// Check if already exists
				$this->output->set_content_type("application/json");
				$this->output->set_output(json_encode(array('status'=>false, 'error'=>'You already have an account with this mobile number. Try Sign-in instead' )));
			} else {

				$user_role = $this->input->post ('user_role');
				$status = USER_STATUS_UNCONFIRMED;

				// Get coaching settings
				$settings = $this->settings_model->get_settings ($coaching_id);
				if ($user_role == USER_ROLE_STUDENT) {
					$approve = $settings['approve_student'];
					if ($approve == 1) {
						$status = USER_STATUS_ENABLED;
					}
				} else if ($user_role == USER_ROLE_TEACHER) {
					$approve = $settings['approve_teacher'];
					if ($approve == 1) {
						$status = USER_STATUS_ENABLED;
					}
				}

				// Save user details
				$member_id = $this->users_model->save_account ($coaching_id, 0, $status);

				// Get coaching details
				$coaching_name = $coaching['coaching_name'];
				$user_name = $this->input->post ('first_name');
				
				// Notification Email to coaching admin
				if ($coaching['email'] != '') {					
					$to = $coaching['email'];
					$subject = 'New Registration';
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