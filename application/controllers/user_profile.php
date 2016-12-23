<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_profile extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('user_model');
	}

	public function index()
	{
		$data["msg"] = "";
		$data["tab"] = 0;
		 if(!empty($_SESSION['id_user'])) {
			$id = $this->input->get('id');
			$result = $this->user_profile_model->get_user_by_userid($_SESSION['id_user']);
		  	$data["user_data"]	= $result;
		}
		$this->load_view($data);
	}

  	public function update_profile()
  	{
    	$this->form_validation->set_rules('txt-first-name', 'First Name', 'trim|required|max_length[40]');
  		$this->form_validation->set_rules('txt-last-name', 'Last Name', 'trim|required|max_length[40]');

		if ($this->form_validation->run() === false) {
		  	$data["tab"] = 0;
		  	$this->load_view($data);
		  } else {
			  try {
				  if(!empty($_SESSION['id_user'])) {
					  $user_data = array(
			         	'first_name' => $this->input->post('txt-first-name'),
			  			'last_name' => $this->input->post('txt-last-name'),
			         	'description' => $this->input->post('txt-description'),
			     	);
		  			$data = $this->user_profile_model->update_profile($user_data,$id);
		  		}
		  		redirect('home');
		   	} catch (Exception $e) {
		   		$data["msg"] = "Error";
		   }
		   $this->load_view($data);
	  	}
  	}

	public function update_password()
	{
		$this->form_validation->set_rules('txt-old-password','Old Password','required|trim|callback_change');
		$this->form_validation->set_rules('txt-password', 'Password', 'trim|required');
		$this->form_validation->set_rules('txt-conf-password', 'Confirm Password', 'trim|required|matches[txt-password]');
		if ($this->form_validation->run() === false) {
			$data["tab"] = 1;
			$this->load_view($data);
		  } else {
			try {
				if(!empty($_SESSION['id_user'])) {
					$id = $_SESSION['id_user'];
					$user_data = array(
				        'password' => $this->input->post('txt-password'),
			     	);
					$data = $this->user_profile_model->update_profile($user_data,$id);
				}
				redirect('home');
			} catch (Exception $e) {
				$data["msg"] = "Error";
		   }
		   $this->load_view($data);
		}
  	}

	public function change($str)
	{
		$pass = $str;
		$result = $this->user_profile_model->check_old_password($pass,$_SESSION['id_user']);
		if(!empty($result)) {
			return true;
		} else {
			$this->form_validation->set_message('change','Wrong Old Password!');

	 		return false;
		}
	}

	private function load_view($data)
	{
		$this->load->view('header');
    	$this->load->view('User_profile_view', $data);
		$this->load->view('footer');
	}

}
