<?php
if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Slots_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    // echo $this->db->last_query();
  }
  public function course_by_id($coaching_id, $course_id)
  {
    $this->db->select('title as course_title', $coaching_id);
    $this->db->where('coaching_id', $coaching_id);
    $this->db->where('course_id', $course_id);
    return $this->db->get('coaching_courses')->row_array();
  }
  public function past_slot_by_id($coaching_id, $course_id, $slot_id)
  {
    $this->db->where('coaching_id', $coaching_id);
    $this->db->where('course_id', $course_id);
    $this->db->where('slot_id', $slot_id);
    $this->db->where('start_time <', time());
    return $this->db->get('coaching_slots')->row_array();
  }
  public function upcoming_slot_by_id($coaching_id, $course_id, $slot_id)
  {
    $this->db->where('coaching_id', $coaching_id);
    $this->db->where('course_id', $course_id);
    $this->db->where('slot_id', $slot_id);
    $this->db->where('start_time >', time());
    return $this->db->get('coaching_slots')->row_array();
  }
  public function all_booked_slots($coaching_id, $member_id)
  {
    $this->db->where('coaching_id', $coaching_id);
    $this->db->where('member_id', $member_id);
    $this->db->order_by('booking_date', 'ASC');
    return $this->db->get('coaching_slot_booking')->result_array();
  }
  public function past_slots($coaching_id, $member_id)
  {
    $all_booked_slots = $this->all_booked_slots($coaching_id, $member_id);
    $returnData = array();
    foreach ($all_booked_slots as $i => $booked_slot) {
      $slot = $this->past_slot_by_id($booked_slot['coaching_id'], $booked_slot['course_id'], $booked_slot['slot_id']);
      if (!empty($slot)) {
        $course = $this->course_by_id($booked_slot['coaching_id'], $booked_slot['course_id']);
        array_push($returnData, array(
          'booking_id' => $booked_slot['booking_id'],
          'coaching_id' => $booked_slot['coaching_id'],
          'member_id' => $booked_slot['member_id'],
          'course_id' => $booked_slot['course_id'],
          'course_title' => $course['course_title'],
          'slot_id' => $slot['slot_id'],
          'booking_date' => $booked_slot['booking_date'],
          'date' => $slot['date'],
          'start_time' => $slot['start_time'],
          'end_time' => $slot['end_time'],
        ));
      }
    }
    return $returnData;
  }
  public function upcoming_slots($coaching_id, $member_id)
  {
    $all_booked_slots = $this->all_booked_slots($coaching_id, $member_id);
    $returnData = array();
    foreach ($all_booked_slots as $i => $booked_slot) {
      $slot = $this->upcoming_slot_by_id($booked_slot['coaching_id'], $booked_slot['course_id'], $booked_slot['slot_id']);
      if (!empty($slot)) {
        $course = $this->course_by_id($booked_slot['coaching_id'], $booked_slot['course_id']);
        array_push($returnData, array(
          'booking_id' => $booked_slot['booking_id'],
          'coaching_id' => $booked_slot['coaching_id'],
          'member_id' => $booked_slot['member_id'],
          'course_id' => $booked_slot['course_id'],
          'course_title' => $course['course_title'],
          'slot_id' => $slot['slot_id'],
          'booking_date' => $booked_slot['booking_date'],
          'date' => $slot['date'],
          'start_time' => $slot['start_time'],
          'end_time' => $slot['end_time'],
        ));
      }
    }
    return $returnData;
  }
}

// coaching_slot_booking