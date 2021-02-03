<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Slots extends MX_Controller {

    var $toolbar_buttons = [];
    var $coaching_id;

  

    public function __construct() {
        // Load Config and Model files required throughout Users sub-module
        $config = ['config_coaching', 'config_course'];
        $models = ['courses_model', 'slots_model', 'users_model'];
        $this->common_model->autoload_resources ($config, $models);

        if ($this->uri->segment (4)) {
            $coaching_id = $this->uri->segment (4);
        } else {
            $coaching_id = $this->session->userdata ('coaching_id');
        }

        $this->coaching_id = $coaching_id;

        // Toolbar buttons
        if ($this->coaching_model->is_coaching_setup () == false) {
            $this->message->set ('Your account information is incomplete. You should complete your account information before using this module', 'warning', true);
            redirect ('coaching/settings/setup_coaching_account');
        }

        $this->toolbar_buttons['actions'] = [
            '<i class="simple-icon-list"></i> All Slots'=>'coaching/slots/index/'.$coaching_id,
            '<i class="iconsminds-check"></i> My Appointments'=>'coaching/slots/my_appointments/'.$coaching_id,
            //'<i class="fa fa-history"></i> History'=>'coaching/slots/history/'.$coaching_id,
        ];
    }

    public function index ($coaching_id=0, $date="") {

        $coaching_id = $this->coaching_id;
        $data['page_title'] = 'Slots';
        $data['bc'] = ['Dashboard' => 'coaching/home/dashboard/'];
        $data['toolbar_buttons'] = $this->toolbar_buttons;

        if ($date == "") {
            $date = date('Y-m-d');
        }
        $data['coaching_id'] = $coaching_id;
        $data['date'] = $date;
        $data['script_css'] = ['assets/css/vendor/bootstrap-datepicker3.min.css'];
        $data['script_footer'] = ['assets/js/vendor/bootstrap-datepicker.js'];

        $data['courses'] = $this->slots_model->get_slots ($coaching_id, $date);
        $data['script'] = $this->load->view('slots/scripts/index', $data, true);
        $this->load->view(INCLUDE_PATH . 'header', $data);
        $this->load->view('slots/index', $data);
        $this->load->view(INCLUDE_PATH . 'footer', $data);
    }

    public function create ($coaching_id=0, $slot_id=0) {

        $data['page_title'] = 'Create Slot';
        $data['bc'] = ['Dashboard' => 'coaching/home/dashboard/'];
        $data['toolbar_buttons'] = $this->toolbar_buttons;

        if ($date == "") {
            $date = mktime (0, 0, 0, date ('m'), date('d'), date('Y'));
        }
        $data['coaching_id'] = $coaching_id;
        $data['date'] = $date;
        $data['script_css'] = ['assets/css/vendor/bootstrap-datepicker3.min.css'];
        $data['script_footer'] = ['assets/js/vendor/bootstrap-datepicker.js'];

        $data['courses'] = $this->slots_model->get_slots ($coaching_id, $date);
        $data['script'] = $this->load->view('slots/scripts/index', $data, true);
        $this->load->view(INCLUDE_PATH . 'header', $data);
        $this->load->view('slots/create', $data);
        $this->load->view(INCLUDE_PATH . 'footer', $data);
    }


    public function my_appointments ($coaching_id=0, $slot_id=0, $from="", $to="") {

        $data['page_title'] = 'My Appointments';
        $data['bc'] = ['Slots' => 'coaching/slots/index/'.$coaching_id];
        $data['toolbar_buttons'] = $this->toolbar_buttons;

        if ($from == "") {
            $from = date ('Y-m-d');
        }
        if ($to == "") {
            $to = date ('Y-m-d');
        }
        $data['coaching_id'] = $coaching_id;
        $data['slot_id'] = $slot_id;
        $data['from'] = $from;
        $data['to'] = $to;

        if ($slot_id > 0) {
            $data['slot'] = $this->slots_model->get_slot ($coaching_id, $slot_id);
            $data['appointments'] = $this->slots_model->get_appointments ($coaching_id, $slot_id);            
        } else {
            $data['appointments'] = $this->slots_model->get_all_appointments ($coaching_id, $from, $to);
        }
        $data['script'] = $this->load->view('slots/scripts/my_appointments', $data, true);

        $this->load->view(INCLUDE_PATH . 'header', $data);
        $this->load->view('slots/my_appointments', $data);
        $this->load->view(INCLUDE_PATH . 'footer', $data);
    }


    public function history ($coaching_id=0, $date="") {
        $data['page_title'] = 'Appointment History';
        $data['bc'] = ['Dashboard' => 'coaching/home/dashboard/'];
        $data['toolbar_buttons'] = $this->toolbar_buttons;

        if ($date == "") {
            $date = mktime (0, 0, 0, date ('m'), date('d'), date('Y'));
        }
        $data['coaching_id'] = $coaching_id;
        $data['date'] = $date;
        $data['script_css'] = ['assets/css/vendor/bootstrap-datepicker3.min.css'];
        $data['script_footer'] = ['assets/js/vendor/bootstrap-datepicker.js'];

        $data['courses'] = $this->slots_model->get_slots ($coaching_id, $date);
        $data['script'] = $this->load->view('slots/scripts/history', $data, true);
        $this->load->view(INCLUDE_PATH . 'header', $data);
        $this->load->view('slots/history', $data);
        $this->load->view(INCLUDE_PATH . 'footer', $data);
    }
}