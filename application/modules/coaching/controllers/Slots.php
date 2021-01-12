<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slots extends MX_Controller {

    public function __construct() {
        // Load Config and Model files required throughout Users sub-module
        $config = ['config_coaching', 'config_course'];
        $models = ['courses_model', 'slots_model'];
        $this->common_model->autoload_resources($config, $models);
    }

    public function index ($coaching_id=0, $date="") { 

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
        $this->load->view('slots/index', $data);
        $this->load->view(INCLUDE_PATH . 'footer', $data);
    }


    public function my_appointments($coaching_id=0) {
        $data['page_title'] = 'My Appointments';
        $data['bc'] = ['Slots' => 'coaching/slots/index/'.$coaching_id];

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