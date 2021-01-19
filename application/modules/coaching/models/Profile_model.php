<?php
if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Profile_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    // echo $this->db->last_query();
  }
}