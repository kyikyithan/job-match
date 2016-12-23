<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class logout extends MY_Controller
{
	public function __construct()
	{
		 parent::__construct();
	}

	public function index()
	{
		$this->session->sess_destroy();
		redirect("home");
	}
}
