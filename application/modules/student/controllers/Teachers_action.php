<?php if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Teachers_action extends MX_Controller
{
  public function __construct()
  {
    // Load Config and Model files required throughout Users sub-module
    $config = ['config_student', 'config_teachers'];
    $models = ['teachers_model'];
    $this->common_model->autoload_resources($config, $models);
  }

  public function book_slot($coaching_id = 0)
  {
    $this->output->set_content_type("application/json");
    if ($this->teachers_model->book_slot($coaching_id)) {
      $this->output->set_output(
        json_encode(
          [
            'status' => true,
            'message' => "Slot Booked Successfully",
          ]
        )
      );
    } else {
      $this->output->set_output(
        json_encode(
          [
            'status' => false,
            'message' => "Slot Booking Failed",
          ]
        )
      );
    }
  }
}