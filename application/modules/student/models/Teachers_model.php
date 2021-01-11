<?php if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Teachers_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    // echo $this->db->last_query();
  }
  public function courses($coaching_id = 0, $cat_id = '-1', $status = CATEGORY_STATUS_ALL)
  {
    $this->db->select('CONCAT(M.first_name, M.last_name) AS user_name, CC.*');
    $this->db->from('coaching_courses CC');
    $this->db->join('members M', 'CC.created_by=M.member_id');
    $this->db->where('CC.coaching_id', $coaching_id);
    if ($cat_id == '-1') {
    } else if ($cat_id == 0) {
      $this->db->where('(CC.cat_id=0 OR CC.cat_id="NULL")');
    } else {
      $this->db->where('CC.cat_id', $cat_id);
    }
    if ($status > CATEGORY_STATUS_ALL) {
      $this->db->where('CC.status', $status);
    }
    $this->db->order_by('CC.created_on', 'DESC');
    $sql = $this->db->get();
    $courses = $sql->result_array();
    $result = [];
    if (!empty($courses)) {
      foreach ($courses as $i => $course) {
        $cat_id = intval($course['cat_id']);
        $cat = $this->get_course_category_by_id($cat_id);
        if ($cat) {
          $course['cat_title'] = $cat['title'];
        }
        $result[] = $course;
      }
    }
    return $result;
  }
  public function get_course_category_by_id($category_id = 0)
  {
    $this->db->where('cat_id', $category_id);
    $sql = $this->db->get('coaching_course_category');
    return $sql->row_array();
  }
  public function get_slots_by_course_id($coaching_id, $course_id)
  {
    $this->db->where('coaching_id', $coaching_id);
    $this->db->where('course_id', $course_id);
    $slots = $this->db->get('coaching_slots')->result_array();
    foreach ($slots as $i => $slot) {
      $slots[$i]["start_time"] = date('H:i', strtotime($slot["start_time"]));
      $slots[$i]["end_time"] = date('H:i', strtotime($slot["end_time"]));
    }
    return $slots;
  }
  public function book_slot($coaching_id)
  {
    $data = [
      'coaching_id' => $coaching_id,
      'course_id' => $this->input->post('course_id'),
      'slot_id' => $this->input->post('slot_id'),
      'member_id' => $this->session->userdata('member_id'),
      'booking_date' => DateTime::createFromFormat('d-m-Y H:i:s', $this->input->post('booking_date') . " 00:00:00")->format('U'),
    ];
    $sql = $this->db->insert('coaching_slot_booking', $data);
    $booking_id = $this->db->insert_id();
    if ($booking_id > 0) {
      return true;
    } else {
      return false;
    }
  }
}