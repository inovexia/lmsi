<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slots extends MX_Controller {

    public function __construct() {
        // Load Config and Model files required throughout Users sub-module
        $config = ['config_course'];
        $models = ['courses_model', 'slots_model'];
        $this->common_model->autoload_resources($config, $models);
    }

    public function index ($coaching_id=0, $slot_id=0) {

        $data['page_title'] = 'Slots';
        $data['bc'] = ['Dashboard' => 'coaching/home/dashboard/'];
        $data['toolbar_buttons'] = [
            '<i class="fa fa-plus-circle"></i> New Slot' =>
                'coaching/slots/create/',
            '<i class="fa fa-user"></i> My Appointments' =>
                'coaching/slots/my_appointments/',
            '<i class="fa fa-history"></i> History' =>
                'coaching/slots/history/',
        ];
        $data['coaching_id'] = $coaching_id;
        $data['slot_id'] = $slot_id;
        $member_id = $this->session->userdata('member_id');
        $data['slots'] = $this->slots_model->get_slots ($coaching_id);
        $this->load->view(INCLUDE_PATH . 'header', $data);
        $this->load->view('slots/index', $data);
        $this->load->view(INCLUDE_PATH . 'footer', $data);
    }

    public function create ($slot_id = 0) {
        $coaching_id = $this->session->userdata('coaching_id');
        $data['slot_id'] = $slot_id;
        $data['page_title'] = 'Create Slots';
        $data['bc'] = ['View Slots' => 'coaching/slots/index/'];
        $data['courses'] = $this->courses_model->courses($coaching_id);
        $data['member_id'] = $this->session->userdata('member_id');
        $data['slot'] =
            $slot_id > 0 ? $this->slots_model->get_slot($slot_id) : [];
        $this->load->view(INCLUDE_PATH . 'header', $data);
        $this->load->view('slots/create', $data);
        $this->load->view(INCLUDE_PATH . 'footer', $data);
    }


    public function my_appointments() {
        $data['page_title'] = 'My Appointments';
        $data['bc'] = ['View Slots' => 'coaching/slots/index/'];
        $data['appointments'] = array_fill(0, 10, null);
        $data['actions'] = [
            ['icon' => 'check', 'label' => 'Approve', 'class' => 'primary'],
            ['icon' => 'times', 'label' => 'Reject', 'class' => 'secondary'],
            ['icon' => 'trash', 'label' => 'Delete', 'class' => 'danger'],
        ];
        $data['acted'] = [
            ['label' => 'Rejected', 'class' => 'secondary'],
            ['label' => 'Approved', 'class' => 'primary'],
        ];

        $this->load->view(INCLUDE_PATH . 'header', $data);
        $this->load->view('slots/my_appointments', $data);
        $this->load->view(INCLUDE_PATH . 'footer', $data);
    }


    public function history() {
        $data['page_title'] = 'Appointment History';
        $data['bc'] = ['View Slots' => 'coaching/slots/index/'];
        $this->load->view(INCLUDE_PATH . 'header', $data);
        $this->load->view('slots/history', $data);
        $this->load->view(INCLUDE_PATH . 'footer', $data);
    }
}