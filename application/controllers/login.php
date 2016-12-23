<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
       	$this->load->model("login_model", "login");
      	if (!empty($_SESSION['id_user'])) {
            redirect('home');
        }
    }

  	public function index()
    {
        if ($_POST) {
            $check_data = array(
             'email' => $this->input->post('txt-email'),
             'password' => $this->input->post('txt-password'),
            );
            $result = $this->login->validate_user($check_data);
            if(!empty($result)) {
                $data = [
                    'id_user' => $result->id,
                    'username' => $result->first_name." ".$result->last_name,
                ];

                $this->session->set_userdata($data);
                redirect('home');
            } else {
                $data["msg"] = 'Username or password is wrong!';
                $this->_render('login_view', $data);
            }
        } else {
            $data["msg"] = '';
            $this->_render('login_view', $data);
        }
  	}
}
