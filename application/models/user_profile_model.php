<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class User_profile_model extends CI_Model
 {

    function __construct()
    {
       parent::__construct();
    }

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

 }
?>
