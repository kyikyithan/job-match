<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_post_list extends MY_Controller
{
	public function __construct()
	{
		 parent::__construct();
		 $this->load->model('Job_post_list_model','jobpostlist');
    	if(empty($_SESSION['id_user'])) {
      		redirect('login');
    	}
	}

	public function index()
	{
		$id = $_SESSION['id_user'];
    	$data["msg"] = "";
		$data["result"] = $this->jobpostlist->get_jobpostByUserId($id);
		$this->load_view($data);
	}

	private function load_view($data)
	{
		$this->load->view('header');
		$this->load->view('Job_post_list_view',$data);
		$this->load->view('footer');
	}
}
