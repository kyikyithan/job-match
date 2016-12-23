<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_model extends MY_Model
{
    public function delete($roll_no)
    {
        if ($this->db->delete("user", "roll_no = ".$roll_no)) {
           return true;
        }
    }

    public function update_profile($data,$id)
    {
        $this->db->where("id", $id);
        $this->db->update("user", $data);
    }

    public function check_old_password($password,$id)
    {
         $this->db->where('id', $id);
         $this->db->where('password', $password);

         return $this->db->get('user')->row();
    }

    public function get_user_by_userid($id)
    {
         $this->db->where('id', $id);
         $query = $this->db->get('user')->row();

         return $query;
    }

    public function insert($data)
    {
       if ($this->db->insert("user", $data)) {
          return true;
       }
    }

    public function delete($roll_no)
    {
       if ($this->db->delete("user", "roll_no = ".$roll_no)) {
          return true;
       }
    }

    public function update($id)
    {
       $this->db->set($data);
       $this->db->where("id", $id);
       $this->db->update("user", $data);
    }

    public function get_user_by_userid($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('user');

        return $query;
    }

    public function check_valid_usermail($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->count_all_results('user');

        return $query;
    }
}