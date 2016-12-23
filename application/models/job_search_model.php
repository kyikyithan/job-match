<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class Job_search_model extends CI_Model
 {

    function __construct()
    {
       parent::__construct();
       $this->load->database();
    }

    public function get_jobpost_count($search)
    {
        if($search['function']!=0) {
            $this->db->where('job_function',$search['function']);
        }
        if($search['industry']!=0) {
            $this->db->where('industry',$search['industry']);
        }
        if($search['location']!=0) {
            $this->db->where('location',$search['location']);
        }

        if($search['jobtitle']!= "") {
            /*
            // Produces: WHERE `title` LIKE '%match' ESCAPE '!'
            $this->db->like('title', $search['jobtitle'], 'before');
            // Produces: WHERE `title` LIKE 'match%' ESCAPE '!'
            $this->db->like('title', $search['jobtitle'], 'after');
            */
            // Produces: WHERE `title` LIKE '%match%' ESCAPE '!'
            $this->db->like('title', $search['jobtitle'], 'both');
        }
        $query = $this->db->count_all_results('job_post');

        return $query;
    }
    public function get_jobpost($limit, $start,$search)
    {
        $this->db->select('jp.id,jp.title,ind.name,jp.update_date');
        $this->db->from('job_post jp');
        $this->db->join('industry ind', 'jp.industry=ind.id', 'left');


        if($search['function']!=0) {
            $this->db->where('job_function',$search['function']);
        }
        if($search['industry']!=0) {
            $this->db->where('industry',$search['industry']);
        }
        if($search['location']!=0) {
            $this->db->where('location',$search['location']);
        }

        if($search['jobtitle']!= "") {
            /*
            // Produces: WHERE `title` LIKE '%match' ESCAPE '!'
            $this->db->like('title', $search['jobtitle'], 'before');
            // Produces: WHERE `title` LIKE 'match%' ESCAPE '!'
            $this->db->like('title', $search['jobtitle'], 'after');
            */
            // Produces: WHERE `title` LIKE '%match%' ESCAPE '!'
            $this->db->like('title', $search['jobtitle'], 'both');
        }

        $this->db->limit($limit, $start);
        $query = $this->db->get();

        return $query->result();
    }
 }
?>
