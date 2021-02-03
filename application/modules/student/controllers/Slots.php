<?php
if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Slots extends MX_Controller
{
  public function __construct()
  {
    $config = ['config_student', 'config_virtual_class', 'config_course'];
    $models = ['virtual_class_model', 'courses_model', 'lessons_model', 'slots_model', 'tests_reports', 'tests_model', 'announcements_model', 'enrolment_model'];
    $this->common_model->autoload_resources($config, $models);
    $cid = $this->uri->segment(4);
    //? Security step to prevent unauthorized access through url
    if ($this->session->userdata('is_admin') == false) {
      if ($cid == true && $this->session->userdata('coaching_id') != $cid) {
        $this->message->set('Direct url access not allowed', 'danger', true);
        redirect('student/home/dashboard');
      }
    }
  }

  public function my_appointments($coaching_id = 0, $member_id = 0)
  {
    $data['page_title'] = 'My Appointments';
    if ($coaching_id == 0) {
      $coaching_id = $this->session->userdata('coaching_id');
    }
    if ($member_id == 0) {
      $member_id = $this->session->userdata('member_id');
    }
    $role_id = $this->session->userdata('role_id');
    $data['coaching_id'] = $coaching_id;
    $data['member_id'] = $member_id;
    $data['role_id'] = $role_id;
    $data['past_slots'] = $past_slots = $this->slots_model->past_slots($coaching_id, $member_id);
    $data['upcoming_slots'] = $upcoming_slots = $this->slots_model->upcoming_slots($coaching_id, $member_id);
    $this->load->view(INCLUDE_PATH . 'header', $data);
    $this->load->view('slots/my_appointments', $data);
    $this->load->view(INCLUDE_PATH . 'footer', $data);
  }
}