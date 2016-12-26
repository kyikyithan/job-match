<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class Job_search_model extends CI_Model
 {

    function __construct()
    {
       parent::__construct();
       $this->load->database();
    }

    public function search ($search = array(), $pagination = null)
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
            $this->db->like('title', $search['jobtitle'], 'both');
        }

        $this->db->limit($pagination['per_page'], $pagination['per_page'] * ($pagination['cur_page'] - 1));
        $result = $this->db->get()->result();
        // Total record count query
        $this->db->select('COUNT(jp.id) as count');
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
            $this->db->like('title', $search['jobtitle'], 'both');
        }

        $count = $this->db->get()->row()->count;

        return array(
            'meta' => array(
                'total' => $count,
                'limit' => $pagination['per_page'],
                'page'  => $pagination['cur_page'],
            ),
            'data' => $result,
        );
    }
 }
?>
