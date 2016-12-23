<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @name: Login model
 */
class Login_model extends MY_Model
{
    public function validate_user($data)
    {
        $this->db->where('email', $data['email']);
        $this->db->where('password', $data['password']);

        return $this->db->get('user')->row();
    }

    function __destruct()
    {
        $this->db->close();
    }
}
