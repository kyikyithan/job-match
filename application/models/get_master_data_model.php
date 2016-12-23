<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class Get_master_data_model extends MY_Model
 {
    public function get_location($unselected = true)
    {
        $query = $this->db->get('location');
        $result = $unselected === true ? array('' => 'Select location') : array();
        foreach ($query->result() as $row) {
            $result[$row->id] = $row->name;
        }

        return $result;
    }

    public function get_job_function($unselected = true)
    {
        $query = $this->db->get('job_function');
        $result = $unselected === true ? array('' => 'Select Job Function') : array();
        foreach ($query->result() as $row) {
            $result[$row->id] = $row->name;
        }

        return $result;
    }

    public function get_industry($unselected = true)
    {
        $query =  $this->db->get('industry');
        $result = $unselected === true ? array('' => 'Select Industry') : array();
        foreach ($query->result() as $row) {
            $result[$row->id] = $row->name;
        }

        return $result;
    }

    function __destruct()
    {
        $this->db->close();
    }
 }
?>
