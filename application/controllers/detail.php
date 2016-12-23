<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('detail_model');
    }

    public function index()
    {
        $this->load->model('detail_model');
        $id = $this->input->get('id');
        $data = array(
            'jobs' => $this->detail_model->jobDetail($id),
        );

        $this->_render('detail_view', $data);
    }
}
