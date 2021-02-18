<?php
if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Teachers extends MX_Controller
{
  public function __construct()
  {
    //? Load Config and Model files required throughout Users sub-module
    $config = ['config_student', 'config_teachers'];
    $models = ['teachers_model'];
    $this->common_model->autoload_resources($config, $models);
  }

  public function index($coaching_id = 0, $date = null)
  {
    $data['page_title'] = 'Teacher A';
    $data['bc'] = [
      'Dashboard' => 'student/home/dashboard/' . $coaching_id,
    ];
    if($coaching_id == 0){
      $coaching_id = $this->session->userdata('coaching_id');
    }
    $oneDay = 86400;
    $today = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
    if ($date == null) {
      //? Today's date
      $date = $today;
      $data['active_tab'] = "courses_tab";
    } else {
      $data['active_tab'] = "slots_tab";
    }
    $data['coaching_id'] = $coaching_id;
    $data['courses'] = $courses = $this->teachers_model->courses($coaching_id);
    $data['booking_date'] = intval($date);
    $data['days'] = [
      $today,
      ($today + $oneDay),
      ($today + ($oneDay * 2)),
      ($today + ($oneDay * 3)),
    ];
    foreach ($courses as $i => $course) {
      $data['courses'][$i]['slots'] = $this->teachers_model->get_slots_by_course_id($coaching_id, $course['course_id'], $date);
    }
    $data['script'] = $this->load->view(
      'teachers/scripts/index',
      $data,
      true
    );
    $this->load->view(INCLUDE_PATH . 'header', $data);
    $this->load->view('teachers/index', $data);
    $this->load->view(INCLUDE_PATH . 'footer', $data);
  }
}