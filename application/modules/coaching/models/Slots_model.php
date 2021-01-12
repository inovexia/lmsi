<?php
defined('BASEPATH') or exit('No direct script access allowed');
// ? echo $this->db->last_query(); to print query on the output

class Slots_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_slots ($coaching_id=0, $date="") {
        $courses = $this->courses_model->courses ($coaching_id);
        if ($date == "") {
            $y = date ('Y');
            $m = date ('m');
            $d = date ('d');
            $from = mktime (0, 0, 0, $m, $d, $y);
            $to = mktime (23, 59, 59, $m, $d, $y);
            $where = 'CS.start_time >='.$from. ' AND CS.end_time <='.$to;
        } else {
            $where = 1;
        }
        $data = [];
        if (! empty($courses)) {
            foreach ($courses as $course) {
        		$this->db->select ('CS.slot_id, CS.date, CS.start_time, CS.end_time, CS.slot_type, CS.max_appointment');
                $this->db->from ('coaching_slots CS');
                //$this->db->join ('coaching_courses CC', 'CS.course_id=CC.course_id', 'right');
                $this->db->where ('CS.coaching_id', $coaching_id);
                $this->db->where ('CS.course_id', $course['course_id']);
                $this->db->where ($where);
                $sql = $this->db->get();
        		$slots = $sql->result_array();
                $data[$course['course_id']]['course_title'] = $course['title'];
                $data[$course['course_id']]['slots'] = $slots;
            }
        }
		return $data;
	}

	public function get_slot($coaching_id=0, $slot_id=0){
		$this->db->where ('coaching_id', $coaching_id);
        $this->db->where ('slot_id', $slot_id);
		$sql = $this->db->get('coaching_slots');
		$result = $sql->row_array();
		return $result;
	}

    public function create_slot ($coaching_id=0) {
        $course_id = $this->input->post ('course_id');
        $slot_id = $this->input->post ('slot_id'); 
        $date = $this->input->post ('date');
        $start_time = $this->input->post ('start_time');
        $end_time = $this->input->post ('end_time');
        $appointment_type = $this->input->post ('appointment_type');
        $max_appointment = $this->input->post ('max_appointment');

        list ($y, $m, $d) = explode ('-', $date);
        $str_date = mktime (0, 0, 0, $m, $d, $y);

        list ($sh, $sm) = explode (':', $start_time);
        $str_start_time = mktime ($sh, $sm, 0, $m, $d, $y);

        list ($eh, $em) = explode (':', $end_time);
        $str_end_time = mktime ($eh, $em, 0, $m, $d, $y);


        $data['date'] = $str_date;
        $data['start_time'] = $str_start_time;
        $data['end_time'] = $str_end_time;
        $data['slot_type'] = $appointment_type;
        $data['max_appointment'] = $max_appointment;
        $data['status'] = 1;

        if ($slot_id > 0) {
            $this->db->where('slot_id', $slot_id);
			$this->db->update('coaching_slots', $data);
        } else {
            $data['coaching_id'] = $coaching_id;
            $data['course_id'] = $course_id;
            $data['slot_id'] = $slot_id;
            $data['creation_date'] = time();
            $data['created_by'] = $this->session->userdata('member_id');
			$this->db->insert('coaching_slots', $data);
            $slot_id = $this->db->insert_id ();
        }

        return $slot_id;
    }
}