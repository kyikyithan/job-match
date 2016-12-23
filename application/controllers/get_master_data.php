<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_master_data extends MY_Controller
{
	public function __construct()
	{
		 parent::__construct();
		 $this->load->model('get_master_data_model','get_model');
	}

	public function get_location()
	{
		$result = $this->get_model->get_location();
		echo (json_encode($result));
	}
}
