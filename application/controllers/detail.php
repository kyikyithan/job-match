<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('detail_model');
        $this->load->database();
    }

    public function index()
    {
        $this->load->model('detail_model');
        $id = $this->input->get('id');
        $data = array(
            'jobs' => $this->detail_model->jobDetail($id),
        );

        $this->load->view('header');
        $this->load->view('detail_view', $data);
        $this->load->view('footer');
    }
}
