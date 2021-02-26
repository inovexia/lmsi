<?php
if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}
// ? echo $this->db->last_query(); to print query on the output

class Slots_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function get_slots($coaching_id = 0, $date = "")
  {
    $courses = $this->courses_model->courses($coaching_id);
    if ($date == "") {
      $y = date('Y');
      $m = date('m');
      $d = date('d');
      $from = mktime(0, 0, 0, $m, $d, $y);
      $to = mktime(23, 59, 59, $m, $d, $y);
    } else {
      list($y, $m, $d) = explode('-', $date);
      $from = mktime(0, 0, 0, $m, $d, $y);
      // 24 hours from date
      $step = (24 * 60 * 60) - 1;
      $to = $from + $step;
    }
    $where = 'CS.start_time >=' . $from . ' AND CS.end_time <=' . $to;
    $data = [];
    if (!empty($courses)) {
      foreach ($courses as $course) {
        $this->db->select('CS.slot_id, CS.date, CS.start_time, CS.end_time, CS.slot_type, CS.max_appointment');
        $this->db->from('coaching_slots CS');
        //$this->db->join ('coaching_courses CC', 'CS.course_id=CC.course_id', 'right');
        $this->db->where('CS.coaching_id', $coaching_id);
        $this->db->where('CS.course_id', $course['course_id']);
        $this->db->where($where);
        $sql = $this->db->get();
        $slots = $sql->result_array();
        $data[$course['course_id']]['course_title'] = $course['title'];
        $data[$course['course_id']]['slots'] = $slots;
      }
    }
    return $data;
  }

  public function get_slot($coaching_id = 0, $slot_id = 0)
  {
    $this->db->where('coaching_id', $coaching_id);
    $this->db->where('slot_id', $slot_id);
    $sql = $this->db->get('coaching_slots');
    $result = $sql->row_array();
    return $result;
  }

  public function get_all_appointments($coaching_id = 0, $from = "", $to = "")
  {
    // Convert time
    list($sy, $sm, $sd) = explode('-', $from);
    $str_from = mktime(0, 0, 0, $sm, $sd, $sy);
    list($ey, $em, $ed) = explode('-', $to);
    $str_to = mktime(23, 59, 59, $em, $ed, $ey);
    $where = 'CS.start_time >=' . $str_from . ' AND CS.end_time <=' . $str_to . '';
    $this->db->select('M.first_name, M.last_name, CC.title, CS.start_time, CS.end_time, CS.date, CSB.*');
    $this->db->from('coaching_slot_booking CSB');
    $this->db->join('members M', 'CSB.member_id=M.member_id');
    $this->db->join('coaching_courses CC', 'CSB.course_id=CC.course_id');
    $this->db->join('coaching_slots CS', 'CSB.slot_id=CS.slot_id');
    $this->db->where($where);
    $this->db->where('CSB.coaching_id', $coaching_id);
    $sql = $this->db->get();
    $result = [];
    if ($sql->num_rows() > 0) {
      foreach ($sql->result_array() as $row) {
        $member_id = $row['member_id'];
        // get profile image
        $pi = $this->users_model->view_profile_image($member_id);
        $row['pi'] = $pi;
        $result[] = $row;
      }
    }
    return $result;
  }

  public function get_appointments($coaching_id = 0, $slot_id = 0)
  {
    $this->db->select('M.first_name, M.last_name, CC.title, CSB.*');
    $this->db->from('coaching_slot_booking CSB');
    $this->db->join('members M', 'CSB.member_id=M.member_id');
    $this->db->join('coaching_courses CC', 'CSB.course_id=CC.course_id');
    $this->db->where('CSB.coaching_id', $coaching_id);
    $this->db->where('CSB.slot_id', $slot_id);
    $sql = $this->db->get();
    $result = [];
    if ($sql->num_rows() > 0) {
      foreach ($sql->result_array() as $row) {
        $member_id = $row['member_id'];
        // get profile image
        $pi = $this->users_model->view_profile_image($member_id);
        $row['pi'] = $pi;
        $result[] = $row;
      }
    }
    return $result;
  }

  public function create_slot($coaching_id = 0)
  {
    $course_id = $this->input->post('course_id');
    $slot_id = $this->input->post('slot_id');
    $date = $this->input->post('date');
    $start_time = $this->input->post('start_time');
    $end_time = $this->input->post('end_time');
    $appointment_type = $this->input->post('appointment_type');
    $max_appointment = $this->input->post('max_appointment');
    list($y, $m, $d) = explode('-', $date);
    $str_date = mktime(0, 0, 0, $m, $d, $y);
    list($sh, $sm) = explode(':', $start_time);
    $str_start_time = mktime($sh, $sm, 0, $m, $d, $y);
    list($eh, $em) = explode(':', $end_time);
    $str_end_time = mktime($eh, $em, 0, $m, $d, $y);
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
      $slot_id = $this->db->insert_id();
    }
    return $slot_id;
  }
  public function create_common_slot($coaching_id = 0)
  {
    // TODO: All Input values into variable
    $course_id = $this->input->post('course_id');
    $slot_id = $this->input->post('slot_id');
    $max_users = $this->input->post('max_users');
    $start_time = $this->input->post('start_time');
    $end_time = $this->input->post('end_time');
    $slot_date = $this->input->post('slot_date');
    $repeat_slot = $this->input->post('repeat_slot');
    $days = $this->input->post('days');
    $end_date = $this->input->post('end_date');
    $price_all_slots = $this->input->post('price_all_slots');
    $slot_mode = $this->input->post('slot_mode');
    // TODO: init $slot_id with 0 if $slot_id is empty
    $slot_id = $slot_id !== '' ? $slot_id : 0;
    // TODO: Initialize variable $return as empty array
    $return = [];
    // TODO: check if the request is to create repeated slots for certain range
    if ($repeat_slot === "on") {
      // TODO: Start date = time stamp of the beginning of given $slot_date
      $slot_date = intval(DateTime::createFromFormat('Y-m-d H:i:s', "$slot_date 00:00:00")->format('U'));
      // TODO: End date = time stamp of the beginning of given $end_date
      $end_date = intval(DateTime::createFromFormat('Y-m-d H:i:s', "$end_date 00:00:00")->format('U'));
      // TODO: Seconds in a day 60 * 60 * 24
      $oneDay = 86400;
      // TODO: Calculate Number of days between start date and end date
      $numDays = ($end_date - $slot_date) / 86400;
      for ($i = 0; $i < $numDays; $i++) {
        // TODO: Get timestamp of the date within the loop in variable $loop_slot_date
        $loop_slot_date = $slot_date + ($i * $oneDay);
        // TODO: check week number of the timestamp $loop_slot_date exist in the days array
        if (in_array(date('N', $loop_slot_date), $days)) {
          // TODO: create a formatted date of the timestamp $loop_slot_date to use later
          $formatted_date = date('Y-m-d', $loop_slot_date);
          // TODO: create array to push data record into the database
          $data = [
            // TODO: combine formatted date with the given formatted time to calculate correct start_time & end_time of the slot on $loop_slot_date
            'start_time' => intval(DateTime::createFromFormat('Y-m-d H:i:s', "$formatted_date $start_time:00")->format('U')),
            'end_time' => intval(DateTime::createFromFormat('Y-m-d H:i:s', "$formatted_date $end_time:00")->format('U')),
            'slot_date' => $loop_slot_date,
            'course_id' => $course_id === "" ? null : $course_id,
            'max_users' => $max_users,
            'price_all_slots' => $price_all_slots,
            'learning_mode' => $slot_mode,
            'status' => 1,
            'created_on' => time(),
            'created_by' => $this->session->userdata('member_id'),
          ];
          // TODO: push slot record to the database and push return value to the $return array
          array_push($return, $this->push_slot_record($slot_id, $data));
        }
      }
      // TODO: return the whole array
      return $return;
    } else {
      // TODO: Start date = time stamp of the beginning of given $slot_date
      $slot_date = intval(DateTime::createFromFormat('Y-m-d H:i:s', "$slot_date 00:00:00")->format('U'));
      // TODO: create array to push data record into the database
      $data = [
        // TODO: combine given $slot_date with the given start_time & end_time to calculate correct timestamp
        'start_time' => intval(DateTime::createFromFormat('Y-m-d H:i:s', "$slot_date $start_time:00")->format('U')),
        'end_time' => intval(DateTime::createFromFormat('Y-m-d H:i:s', "$slot_date $end_time:00")->format('U')),
        'slot_date' => $slot_date,
        'course_id' => $course_id === "" ? null : $course_id,
        'max_users' => $max_users,
        'price_all_slots' => $price_all_slots,
        'learning_mode' => $slot_mode,
        'status' => 1,
        'created_on' => time(),
        'created_by' => $this->session->userdata('member_id'),
      ];
      // TODO: push slot record to the database and push return value to the $return array
      array_push($return, $this->push_slot_record($slot_id, $data));
      // TODO: return the whole array
      return $return;
    }
  }

  public function create_course_slot($coaching_id = 0)
  {
    // TODO: All Input values into variable
    $course_id = $this->input->post('course_id');
    $name = $this->input->post('slot_name');
    $slot_id = $this->input->post('slot_id');
    $max_users = $this->input->post('max_users');
    $start_time = $this->input->post('start_time');
    $end_time = $this->input->post('end_time');
    $slot_date = $this->input->post('slot_date');
    $repeat_slot = $this->input->post('repeat_slot');
    $days = $this->input->post('days');
    $end_date = $this->input->post('end_date');
    $price_all_slots = $this->input->post('price_all_slots');
    $price_per_slot = $this->input->post('price_per_day');
    $slot_mode = $this->input->post('slot_mode');
    // TODO: init $slot_id with 0 if $slot_id is empty
    $slot_id = $slot_id !== '' ? $slot_id : 0;
    // TODO: Initialize variable $return as empty array
    $return = [];
    // TODO: check if the request is to create repeated slots for certain range
    if ($repeat_slot === "on") {
      // TODO: Start date = time stamp of the beginning of given $slot_date
      $slot_date = intval(DateTime::createFromFormat('Y-m-d H:i:s', "$slot_date 00:00:00")->format('U'));
      // TODO: End date = time stamp of the beginning of given $end_date
      $end_date = intval(DateTime::createFromFormat('Y-m-d H:i:s', "$end_date 00:00:00")->format('U'));
      // TODO: Seconds in a day 60 * 60 * 24
      $oneDay = 86400;
      // TODO: Calculate Number of days between start date and end date
      $numDays = ($end_date - $slot_date) / 86400;
      for ($i = 0; $i < $numDays; $i++) {
        // TODO: Get timestamp of the date within the loop in variable $loop_slot_date
        $loop_slot_date = $slot_date + ($i * $oneDay);
        // TODO: check week number of the timestamp $loop_slot_date exist in the days array
        if (in_array(date('N', $loop_slot_date), $days)) {
          // TODO: create a formatted date of the timestamp $loop_slot_date to use later
          $formatted_date = date('Y-m-d', $loop_slot_date);
          // TODO: create array to push data record into the database
          $data = [
            'name' => $name,
            // TODO: combine formatted date with the given formatted time to calculate correct start_time & end_time of the slot on $loop_slot_date
            'start_time' => intval(DateTime::createFromFormat('Y-m-d H:i:s', "$formatted_date $start_time:00")->format('U')),
            'end_time' => intval(DateTime::createFromFormat('Y-m-d H:i:s', "$formatted_date $end_time:00")->format('U')),
            'slot_date' => $loop_slot_date,
            'course_id' => $course_id === "" ? null : $course_id,
            'max_users' => $max_users,
            'price_all_slots' => $price_all_slots,
            'price_per_slot' => $price_per_slot,
            'learning_mode' => $slot_mode,
            'status' => 1,
            'created_on' => time(),
            'created_by' => $this->session->userdata('member_id'),
          ];
          // TODO: push slot record to the database and push return value to the $return array
          array_push($return, $this->push_slot_record($slot_id, $data));
        }
      }
      // TODO: return the whole array
      return $return;
    } else {
      // TODO: Start date = time stamp of the beginning of given $slot_date
      $slot_date = intval(DateTime::createFromFormat('Y-m-d H:i:s', "$slot_date 00:00:00")->format('U'));
      // TODO: create array to push data record into the database
      $data = [
        'name' => $name,
        // TODO: combine given $slot_date with the given start_time & end_time to calculate correct timestamp
        'start_time' => intval(DateTime::createFromFormat('Y-m-d H:i:s', "$slot_date $start_time:00")->format('U')),
        'end_time' => intval(DateTime::createFromFormat('Y-m-d H:i:s', "$slot_date $end_time:00")->format('U')),
        'slot_date' => $slot_date,
        'course_id' => $course_id === "" ? null : $course_id,
        'max_users' => $max_users,
        'price_all_slots' => $price_all_slots,
        'price_per_slot' => $price_per_slot,
        'learning_mode' => $slot_mode,
        'status' => 1,
        'created_on' => time(),
        'created_by' => $this->session->userdata('member_id'),
      ];
      // TODO: push slot record to the database and push return value to the $return array
      array_push($return, $this->push_slot_record($slot_id, $data));
      // TODO: return the whole array
      return $return;
    }
  }
  public function push_slot_record($slot_id, $data)
  {
    if ($slot_id > 0) {
      $this->db->where('slot_id', $slot_id);
      $this->db->update('coaching_course_slots', $data);
    } else {
      $this->db->insert('coaching_course_slots', $data);
      $slot_id = $this->db->insert_id();
    }
    return $slot_id;
  }

  public function delete_slot($coaching_id = 0, $slot_id = 0)
  {
    $this->db->where('coaching_id', $coaching_id);
    $this->db->where('slot_id', $slot_id);
    $this->db->delete('coaching_slots');
  }
}