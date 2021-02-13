<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher_actions extends MX_Controller {


	public function __construct () {
		$config = ['config_login'];
	    $models = ['login_model'];

	    $this->common_model->autoload_resources ($config, $models);

	    $this->load->helper ('string');
		$this->load->helper('captcha');
	}

    public function validate_login ($admin_login=false) {
	
		$this->form_validation->set_rules ('username', 'Username', 'required|trim');
		$this->form_validation->set_rules ('password', 'Password', 'required|trim');
		$this->form_validation->set_rules ('captcha', 'Captcha', 'required|trim');
		
		if ($this->form_validation->run () == true) {
			$captcha = $this->input->post('captcha');
			$captcha_key = $this->session->userdata('captcha_key');
			if ($captcha != $captcha_key['word'] && $captcha_key['ip_address'] == $_SERVER['REMOTE_ADDR']) {
				$this->output->set_content_type("application/json");
				$this->output->set_output(json_encode(array('status'=>false, 'error'=>_AT_TEXT ('INVALID_CAPTCHA', 'msg'))));
			} else {

				$response = $this->login_model->validate_login ($admin_login);

				if ($response['status'] == LOGIN_SUCCESSFUL) {
					$redirect = $this->session->userdata ('dashboard');
					$this->output->set_content_type("application/json");
					$this->output->set_output(json_encode(array(
						'status'=>true, 
						'message'=>_AT_TEXT ('LOGIN_SUCCESSFUL', 'msg'), 
						'user_token'=>$this->session->userdata ('user_token'),
						'redirect'=>site_url($redirect),
					)));
				} else if ($response['status'] == INVALID_CREDENTIALS) {
					$this->output->set_content_type("application/json");
					$this->output->set_output(json_encode(array('status'=>false, 'error'=>_AT_TEXT ('INVALID_CREDENTIALS', 'msg'))));
				} else if ($response['status'] == ACCOUNT_DISABLED) {
					$this->output->set_content_type("application/json");
					$this->output->set_output(json_encode(array('status'=>false, 'error'=>_AT_TEXT ('ACCOUNT_DISABLED', 'msg'))));
				} else if ($response['status'] == MAX_ATTEMPTS_REACHED) {
					$this->output->set_content_type("application/json");
					$this->output->set_output(json_encode(array('status'=>false, 'error'=>_AT_TEXT ('MAX_ATTEMPTS_REACHED', 'msg'))));
				} else if ($response['status'] == INVALID_PASSWORD) {
					$this->output->set_content_type("application/json");
					$this->output->set_output(json_encode(array('status'=>false, 'error'=>_AT_TEXT ('INVALID_PASSWORD', 'msg'))));
				} else if ($response['status'] == INVALID_USERNAME) {
					$this->output->set_content_type("application/json");
					$this->output->set_output(json_encode(array('status'=>false, 'error'=>_AT_TEXT ('INVALID_USERNAME', 'msg'))));
				} else {
					unset($_SESSION['captcha_key']);
					unlink(base_url().'contents/captcha/'.$captcha_key['time'].'.jpg');
					$this->output->set_content_type("application/json");
					$this->output->set_output(json_encode(array('status'=>false, 'error'=>_AT_TEXT ('LOGIN_ERROR', 'msg'))));					
				}
			}			
			
		} else {
			$this->output->set_content_type("application/json");
			$this->output->set_output(json_encode(array('status'=>false, 'error'=>_AT_TEXT ('VALIDATION_ERROR', 'msg') )));			
		}
	}	

	
	public function reset_password ($mode='mobile') {
		if ($mode == 'email') {
			$this->form_validation->set_rules('email', 'Email id', 'required|valid_email');

			if ($this->form_validation->run () == true) {
				// check if contact exists
				$email = $this->input->post ('email');
				if ($user_token = $this->login_model->email_exists ($email)) {

					$this->login_model->send_reset_link ($mode, $email, $user_token);					
					// Display Message
					$msg = 'We have sent you a link to create new password. If you do not recieve the email, please try again in 5 minutes';
					
					$this->message->set ($msg, 'success', true);
					
					$this->output->set_content_type("application/json");
					$this->output->set_output(json_encode(array('status'=>true, 'message'=>$msg, 'redirect'=>site_url('login/teacher/index') )));
				} else {
					$this->output->set_content_type("application/json");
					$this->output->set_output(json_encode(array('status'=>false, 'error'=>'This email id is not registered with us')));
				}
			} else {
				$this->output->set_content_type("application/json");
				$this->output->set_output(json_encode(array('status'=>false, 'error'=>validation_errors() )));
			}

		} else {

			$this->form_validation->set_rules('mobile', 'Mobile Number', 'required|is_natural|min_length[10]|max_length[15]');

			if ($this->form_validation->run () == true) {
				// check if contact exists
				$contact = $this->input->post ('mobile');
				if ($user_token = $this->login_model->contact_exists ($contact)) {
					
					$this->login_model->send_reset_link ($mode, $contact, $user_token);				
					
					// Display Message
					$msg = 'We have sent you a link to create new password. If you do not recieve the sms, please try again in 5 minutes';
					
					$this->message->set ($msg, 'success', true);
					
					$this->output->set_content_type("application/json");
					$this->output->set_output(json_encode(array('status'=>true, 'message'=>$msg, 'redirect'=>site_url('login/teacher/index') )));
				} else {
					$this->output->set_content_type("application/json");
					$this->output->set_output(json_encode(array('status'=>false, 'error'=>'This mobile number is not registered with us')));
				}
			} else {
				$this->output->set_content_type("application/json");
				$this->output->set_output(json_encode(array('status'=>false, 'error'=>validation_errors() )));
			}
		}
	}
	

	public function create_password () {
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|trim');
		$this->form_validation->set_rules('repeat_password', 'Repeat Password', 'required|matches[password]|trim');

		if ($this->form_validation->run () == true) {

			$user_token = $this->input->post ('user_token');
		
			$now = time ();
			$time = $now - (30 * 60); // 30 minutes from now
			$request = $this->login_model->is_valid_request ($user_token, $time);
			if ($request) {
				$this->login_model->change_password ();
				// Display Message
				$msg = 'Password changed successfully. Login with your new password';				
				$this->message->set ($msg, 'success', true);
				
				$this->output->set_content_type("application/json");
				$this->output->set_output(json_encode(array('status'=>true, 'message'=>$msg, 'redirect'=>site_url('login/teacher/index') )));
			} else {
				$this->output->set_content_type("application/json");
				$this->output->set_output(json_encode(array('status'=>false, 'error'=>'Invalid request or this link has expired')));
			}
		} else {
			$this->output->set_content_type("application/json");
			$this->output->set_output(json_encode(array('status'=>false, 'error'=>validation_errors ())));
		}
	}

	public function update_session ($user_token='') {

		$data = $this->login_model->get_user_token ($user_token);

		if (! empty ($data)) {
			// Update session
			$member_id = $data['member_id'];
			$role_id = $data['role_id'];
			$user_name = $data['user_name'];
			$coaching_id = $data['coaching_id'];
			$user_token = $data['user_token'];
			$this->login_model->save_login_session ($member_id, $role_id, $user_name, $coaching_id, $user_token);
			
			// Update menu
			$this->login_model->load_menu ($role_id);
			
			$dashboard = $this->session->userdata ('dashboard');
			$this->output->set_content_type("application/json");
			$this->output->set_output(json_encode(array('status'=>true, 'message'=>'Success', 'redirect'=>site_url ($dashboard))));
		} else {
			// Session cannot be updated due to user-token mismatch, so logout
			$logout = site_url ('login/login/logout');
			$this->output->set_content_type("application/json");
			$this->output->set_output(json_encode(array('status'=>false, 'message'=>'Error', 'redirect'=>$logout)));
		}

	}

	/* Refresh captcha image */	
	public function refresh_captcha() {

		$captcha_dir = $this->config->item ('captcha_dir');

		$vals = array (
				'word'          => '',
				'img_path'      => $captcha_dir,
				'img_url'       => base_url ($captcha_dir),
				'img_width'     => '125',
				'img_height'    => 30,
				'word_length'   => 6,
				'font_size'     => 16,
				'img_id'        => 'Imageid',
				'pool'          => '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ',
			);
		

		$cap = create_captcha($vals);
		$ip_address = $_SERVER['REMOTE_ADDR'];
		$captcha_key = array('time' => $cap['time'], 'ip_address' => $ip_address, 'word' => $cap['word']);
		$this->session->unset_userdata('captcha_key');
		$this->session->set_userdata('captcha_key', $captcha_key);

		// Display captcha image
		$data['captcha'] = $cap['image'];
		$this->load->view ('refresh_captcha', $data);
	}

	public function logout ($access_code='') {

		if ($this->session->userdata ('is_admin') == true) {
			$redirect = site_url ('admin/login/index');
		} else {
			$redirect = site_url ('login/user/index');
		}		
		
		$this->session->sess_destroy ();
		setcookie ("user_token", "", time () - 3600);

		$this->output->set_content_type("application/json");
		$this->output->set_output(json_encode(array('status'=>true, 'redirect'=>$redirect)));
	}
}