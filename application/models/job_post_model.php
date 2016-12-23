<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class Job_post_model extends CI_Model
 {

    function __construct()
    {
       parent::__construct();
       $this->load->database();
    }

    public function insert($data)
    {
       if ($this->db->insert("Job_post", $data)) {

          return true;
       }
    }

    public function delete($id)
    {
       if ($this->db->delete("Job_post", "id = ".$id)) {

          return true;
       }
   }

    public function update($data,$id)
    {
        $this->db->set($data);
        $this->db->where("id", $id);
        $this->db->update("Job_post", $data);
    }
    public function get_jobpost_by_postid_userid($id,$userid)
    {
      $this->db->where('id', $id);
      $this->db->where('user_id', $userid);
      $query = $this->db->get('job_post')->row();

      return $query;
    }
 }
?>
