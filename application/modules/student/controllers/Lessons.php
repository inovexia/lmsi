<?php
if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Lessons extends MX_Controller
{

  public $toolbar_buttons = [];

  public function __construct()
  {
    // Load Config and Model files required throughout Users sub-module
    $config = ['config_coaching', 'config_course'];
    $models = ['coaching_model', 'courses_model', 'lessons_model'];
    $this->common_model->autoload_resources($config, $models);
  }

  public function index($coaching_id = 0, $member_id = 0, $course_id = 0)
  {
    $status = '-1';
    $data['coaching_id'] = $coaching_id;
    $data['course_id'] = $course_id;
    $data['status'] = $status;
    $data['lessons'] = $this->lessons_model->get_lessons($coaching_id, $course_id, $status);
    $data['course'] = $this->courses_model->get_course_by_id($course_id);
    $data['data'] = $data;
    $data['page_title'] = 'Chapters';
    /* --==// Back //==-- */
    $data['bc'] = ['Pages' => 'coaching/courses/manage/' . $coaching_id . '/' . $course_id];
    $data['script'] = $this->load->view('lessons/scripts/index', $data, true);
    $data['right_sidebar'] = $this->load->view('courses/inc/manage_course', $data, true);
    $data['filter_block'] = $this->load->view('lessons/inc/index_filters', $data, true);
    $this->load->view(INCLUDE_PATH . 'header', $data);
    $this->load->view('lessons/index', $data);
    $this->load->view(INCLUDE_PATH . 'footer', $data);
  }

  public function pages($coaching_id = 0, $course_id = 0, $lesson_id = 0)
  {
    $data['page_title'] = 'Pages';
    $data['coaching_id'] = $coaching_id;
    $data['course_id'] = $course_id;
    $data['lesson_id'] = $lesson_id;
    $data['is_admin'] = USER_ROLE_COACHING_ADMIN === intval($this->session->userdata('role_id'));
    /* --==// Back //==-- */
    $data['bc'] = ['Lessons' => 'coaching/lessons/index/' . $coaching_id . '/' . $course_id];
    $data['lesson'] = $this->lessons_model->get_lesson($coaching_id, $course_id, $lesson_id);
    $data['course'] = $this->courses_model->get_course_by_id($course_id);
    $data['pages'] = $this->lessons_model->get_all_pages($coaching_id, $course_id, $lesson_id);
    $data['right_sidebar'] = $this->load->view('courses/inc/manage_course', $data, true);
    $this->load->view(INCLUDE_PATH . 'header', $data);
    $this->load->view("lessons/pages", $data);
    $this->load->view(INCLUDE_PATH . 'footer', $data);
  }

  public function view_page($coaching_id = 0, $course_id = 0, $lesson_id = 0, $page_id = 0)
  {
    $data['page_title'] = 'View Page';
    $data['coaching_id'] = $coaching_id;
    $data['course_id'] = $course_id;
    $data['lesson_id'] = $lesson_id;
    $data['page_id'] = $page_id;
    $data['is_admin'] = USER_ROLE_COACHING_ADMIN === intval($this->session->userdata('role_id'));
    $data['course'] = $this->courses_model->get_course_by_id($course_id);
    $data['page'] = $this->lessons_model->get_page($coaching_id, $course_id, $lesson_id, $page_id);
    $data['attachments'] = $this->lessons_model->get_attachments($coaching_id, $course_id, $lesson_id, $page_id);
    /* --==// Back //==-- */
    $data['bc'] = ['Pages' => 'coaching/lessons/pages/' . $coaching_id . '/' . $course_id . '/' . $lesson_id];
    $data['right_sidebar'] = $this->load->view('courses/inc/home', $data, true);
    $this->load->view(INCLUDE_PATH . 'header', $data);
    $this->load->view("lessons/view_page", $data);
    $this->load->view(INCLUDE_PATH . 'footer', $data);
  }

  public function view($coaching_id = 0, $member_id = 0, $course_id = 0, $lesson_id = 0, $page_id = 0)
  {
    $data['page_title'] = 'Preview';
    $data['coaching_id'] = $coaching_id;
    $data['course_id'] = $course_id;
    $data['lesson_id'] = $lesson_id;
    $data['page_id'] = $page_id;
    $data['is_admin'] = USER_ROLE_COACHING_ADMIN === intval($this->session->userdata('role_id'));
    $data['lessons'] = $this->lessons_model->get_lessons($coaching_id, $course_id);
    $data['pages'] = $this->lessons_model->get_pages($coaching_id, $course_id, $lesson_id);
    $data['page'] = $this->lessons_model->get_page($coaching_id, $course_id, $lesson_id, $page_id);
    $data['attachments'] = $this->lessons_model->get_attachments($coaching_id, $course_id, $lesson_id, $page_id);
    /* --==// Back //==-- */
    $data['bc'] = ['Manage' => 'coaching/courses/manage/' . $coaching_id . '/' . $course_id];
    $data['script'] = $this->load->view("lessons/scripts/add_page", $data, true);
    $data['right_sidebar'] = $this->load->view('courses/inc/manage_course', $data, true);
    $this->load->view(INCLUDE_PATH . 'header', $data);
    $this->load->view("course/preview", $data);
    $this->load->view(INCLUDE_PATH . 'footer', $data);
  }
}