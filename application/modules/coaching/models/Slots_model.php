<?php
defined('BASEPATH') or exit('No direct script access allowed');
// ? echo $this->db->last_query(); to print query on the output
class Slots_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_slots($member_id)
    {
		$this->db->where ('created_by', $member_id);
        $sql = $this->db->get('slots');
		$result = $sql->result_array();
		foreach ($result as $i => $slot){
			$this->db->select ('title');
			$this->db->where ('course_id', $slot['subject']);
			$this->db->where ('created_by', $member_id);
			$sql = $this->db->get('coaching_courses');
			$course = $sql->row_array();
			$result[$i]['subject'] = $course['title'];
			
		}
		return $result;
	}
	public function get_slot($slot_id){
		$this->db->where ('slot_id', $slot_id);
		$sql = $this->db->get('slots');
		$result = $sql->row_array();
		return $sql->row_array();
	}
    public function add_slot($slot_id, $status = 1)
    {
		$date = DateTime::createFromFormat('d-m-Y H:i:s', $this->input->post('date') . ' 00:00:00')->getTimestamp();
        $start_time = DateTime::createFromFormat('d-m-Y H:i', '01-01-1970 ' . $this->input->post('start'))->getTimestamp();
        $end_time = DateTime::createFromFormat('d-m-Y H:i', '01-01-1970 ' . $this->input->post('end'))->getTimestamp();
        $data['subject'] = $this->input->post('subject');
        $data['date'] = $date;
        $data['start_time'] = $start_time;
        $data['end_time'] = $end_time;
        $data['slot_type'] = $this->input->post('type');
        $data['status'] = $status;
        if ($slot_id > 0) {
            $this->db->where('slot_id', $slot_id);
			return $this->db->update('slots', $data);
        } else {
            $data['creation_date'] = time();
            $data['created_by'] = $this->session->userdata('member_id');
			return $this->db->insert('slots', $data);
        }
    }
}