<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class Job_post_list_model extends CI_Model
 {

    function __construct()
    {
       parent::__construct();
       $this->load->database();
    }

    public function get_jobpostByUserId($id)
    {
      $this->db->where('user_id', $id);
      $query = $this->db->get('job_post');

      return $query->result();
    }
 }
?>
