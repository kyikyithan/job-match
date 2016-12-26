<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model
{
    protected $table = 'user';

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

    public function check_valid_usermail($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->count_all_results('user');

        return $query;
    }
}
