<?php
if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}
class Slot_actions extends MX_Controller
{

  public function __construct()
  {
    // Load Config and Model files required throughout Users sub-module
    $config = ['config_coaching', 'config_course'];
    $models = ['courses_model', 'slots_model'];
    $this->common_model->autoload_resources($config, $models);
  }

  public function create_slot($coaching_id = 0)
  {
    $this->form_validation->set_rules('start_time', 'Start Time', 'required');
    $this->form_validation->set_rules('end_time', 'End Time', 'required');
    $this->form_validation->set_rules('appointment_type', 'Appointment Type', 'required');
    if ($this->form_validation->run() == true) {
      if ($slot_id = $this->slots_model->create_slot($coaching_id)) {
        if ($slot_id > 0) {
          $message = 'Slot updated successfully';
        } else {
          $message = 'Slot created successfully';
        }
        $redirect = 'coaching/slots/index/' . $coaching_id;
        $this->message->set($message, 'success', true);
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode(['status' => true, 'message' => $message, 'redirect' => site_url($redirect)]));
      } else {
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode(['status' => false, 'error' => 'Something went wrong. Unable to complete the operation.</p>',
        ])
        );
      }
    } else {
      $this->output->set_content_type('application/json');
      $this->output->set_output(json_encode(['status' => false, 'error' => validation_errors()]));
    }
  }

  public function get_slot($coaching_id = 0, $slot_id = 0)
  {
    $data['result'] = $this->slots_model->get_slot($coaching_id, $slot_id);
    $result = $this->load->view('slots/inc/create', $data, true);
    $this->output->set_content_type('application/json');
    $this->output->set_output(json_encode(['status' => true, 'data' => $result]));
  }

  public function delete_slot($coaching_id = 0, $slot_id = 0)
  {
    $this->slots_model->delete_slot($coaching_id, $slot_id);
    $this->message->set('Slot deleted successfully', 'success', true);
    redirect('coaching/slots/index/' . $coaching_id);
  }
  public function create_common_slot($coaching_id = 0)
  {
    $this->form_validation->set_rules('max_users', 'Maximum users', 'required');
    $this->form_validation->set_rules('start_time', 'Start Time', 'required');
    $this->form_validation->set_rules('end_time', 'End Time', 'required');
    $this->form_validation->set_rules('slot_date', 'Start Date', 'required');
    if ($this->form_validation->run() == true) {
      $slots = $this->slots_model->create_common_slot($coaching_id);
      if (!empty($slots)) {
        $count = count($slots);
        $message = "$count slots created successfully";
        $redirect = 'coaching/slots/index/' . $coaching_id;
        $this->message->set($message, 'success', true);
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode(['status' => true, 'message' => $message, 'redirect' => site_url($redirect)]));
      } else {
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode(['status' => false, 'error' => 'Something went wrong. Unable to complete the operation.',
          $_POST])
        );
      }
    } else {
      $this->output->set_content_type('application/json');
      $this->output->set_output(json_encode(['status' => false, 'error' => validation_errors()]));
    }
  }
}