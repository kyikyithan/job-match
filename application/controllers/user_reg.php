<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_reg extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('user_model');
     	$this->load->database();
	}

	public function index()
	{
		$data["msg"] = "";
		$data = "";
		$this->load_view($data);
	}

  	public function save()
  	{
    	$this->form_validation->set_rules('txt-first-name', 'First Name', 'trim|required|max_length[40]');
		$this->form_validation->set_rules('txt-last-name', 'Last Name', 'trim|required|max_length[40]');
		$this->form_validation->set_rules('txt-email', 'Email', 'required|max_length[40]|valid_email|is_unique[user.email]');
    	$this->form_validation->set_rules('txt-password', 'Password', 'trim|required');
		$this->form_validation->set_rules('txt-conf-password', 'Confirm Password', 'trim|required|matches[txt-password]');

		if ($this->form_validation->run() === false) {
			$data = "";
			$this->load_view($data);
		} else {
			try {

				$user_data = array(
			        'first_name' => $this->input->post('txt-first-name'),
					'last_name' => $this->input->post('txt-last-name'),
			        'email' => $this->input->post('txt-email'),
			        'password' => $this->input->post('txt-password'),
			        'description' => $this->input->post('txt-description'),
		     	);
		 		$this->user_reg_model->insert($user_data);
				$data["msg"] = "Save Successfully";
				redirect('home');

		 	} catch (Exception $e) {
		 		$data["msg"] = "Error";
		 }
		 $this->load_view($data);
	 }
  }

	private function load_view($data)
	{
		$this->load->view('header');
    	$this->load->view('User_reg_view', $data);
		$this->load->view('footer');
	}
}
