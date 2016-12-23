<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class Detail_model extends MY_Model
 {
     public function jobDetail($id)
     {
         $query = $this->db->query('
             SELECT *, industry.name as indname, location.name as locname
             FROM job_post
             LEFT JOIN location
             ON location.id=job_post.location
             LEFT JOIN industry
             ON industry.id=job_post.industry
             JOIN user
             ON user.id=job_post.user_id
             WHERE job_post.id = ' . $id
        );

         $result = $query->result_array();

         return $result;

     }
 }
