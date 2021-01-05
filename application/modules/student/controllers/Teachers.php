<?php if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Teachers extends MX_Controller
{
  public function __construct()
  {
    // Load Config and Model files required throughout Users sub-module
    $config = ['config_student', 'config_teachers'];
    $models = ['teachers_model'];
    $this->common_model->autoload_resources($config, $models);
  }

  public function index($coaching_id = 0, $cat_id = 0)
  {
    $data['page_title'] = 'Teacher A';
    $data['bc'] = [
      'Dashboard' => 'student/home/dashboard/' . $coaching_id,
    ];
    $data['coaching_id'] = $coaching_id;
    $data['cat_id'] = $cat_id;
    $data['script'] = $this->load->view(
      'teachers/scripts/index',
      $data,
      true
    );
    $data['courses'] = $this->teachers_model->courses($coaching_id, $cat_id);

    $this->load->view(INCLUDE_PATH . 'header', $data);
    $this->load->view('teachers/index', $data);
    $this->load->view(INCLUDE_PATH . 'footer', $data);
  }
}