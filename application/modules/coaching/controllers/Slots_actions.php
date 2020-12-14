<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Slots_actions extends MX_Controller
{
    public function __construct()
    {
        // Load Config and Model files required throughout Users sub-module
        $config = ['config_course', 'config_slot'];
        $models = ['courses_model', 'slots_model'];
        $this->common_model->autoload_resources($config, $models);
    }
    public function create($slot_id = 0)
    {
        $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('start', 'Start Time', 'required');
        $this->form_validation->set_rules('end', 'End Time', 'required');
        $this->form_validation->set_rules(
            'type',
            'Appointment Type',
            'required'
        );
        if ($this->form_validation->run() == true) {
            if ($this->slots_model->add_slot($slot_id)) {
                if ($slot_id > 0) {
                    $message = 'Slot updated successfully';
                } else {
                    $message = 'Slot created successfully';
                }
                $redirect = 'coaching/slots/index/';
                $this->message->set($message, 'success', true);
                $this->output->set_content_type('application/json');
                $this->output->set_output(
                    json_encode([
                        'status' => true,
                        'message' => $message,
                        'redirect' => site_url($redirect),
                    ])
                );
            } else {
                $this->output->set_content_type('application/json');
                $this->output->set_output(
                    json_encode([
                        'status' => false,
                        'error' =>
                            '<p>Oops!.. Something went wrong.</p><p>Unable to complete the operation.</p>',
                    ])
                );
            }
        } else {
            $this->output->set_content_type('application/json');
            $this->output->set_output(
                json_encode([
                    'status' => false,
                    'error' => validation_errors(),
                ])
            );
        }
    }
}