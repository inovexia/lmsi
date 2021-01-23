<?php
if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Profile extends MX_Controller
{
  public function __construct()
  {
    // Load Config and Model files required throughout Users sub-module
    $config = ['config_coaching'];
    $models = ['profile_model'];
    $this->common_model->autoload_resources($config, $models);
  }

  public function index($coaching_id = 0)
  {
    $data['page_title'] = 'My Profile';
    $data['bc'] = [
      'Dashboard' => 'coaching/home/dashboard/' . $coaching_id,
    ];
    $this->load->view(INCLUDE_PATH . 'header', $data);
    $this->load->view('profile/index', $data);
    $this->load->view(INCLUDE_PATH . 'footer', $data);
  }
  public function edit($coaching_id = 0)
  {

  }
  public function detail($coaching_id = 0)
  {

  }
  public function videos($coaching_id = 0)
  {

  }
  public function students($coaching_id = 0)
  {

  }
  public function courses($coaching_id = 0)
  {

  }
}