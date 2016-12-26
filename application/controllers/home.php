<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller
{
	public function __construct()
	{
		 parent::__construct();
		 $this->load->helper(array('form', 'url'));
		 $this->load->library('pagination');
		 $this->load->model('Get_master_data_model','master');
		 $this->load->model('Job_search_model');
	}

	public function index()
	{
		$data['search'] = $this->input->get('search', true);
		$data['location'] = $this->master->get_location();
		$data['industry'] = $this->master->get_industry();
		$data['function'] = $this->master->get_job_function();

		// For pagination configuration
        $pager_config = $this->getPagerConfig(array(
            'base_url' => site_url('home/index'),
            'cur_page' => $this->uri->segment(3) ? $this->uri->segment(3) : 1,
        ));
		$result = $this->Job_search_model->search($data['search'], $pager_config);
		$data['result']             = $result['data'];
		$pager_config['total_rows'] = $result['meta']['total'];
        $this->pagination->initialize($pager_config);
        $data['pagination'] = $this->pagination->create_links();

		$this->_render('home', $data);
	}

	// public function load_data()
	// {
	// 	//for display paging st
	// 	$limit = $this->input->get_post('length', true);
	// 	$start = $this->input->get_post('start', true);
	// 	$draw = $this->input->get_post('draw', true);
	// 	//for display paging ed
	//
	// 	//search data st
	// 	$search['function'] = $this->input->get_post('ddl-function', true);
	// 	$search['industry'] = $this->input->get_post('ddl-industry', true);
	// 	$search['location'] = $this->input->get_post('ddl-location', true);
	// 	$search['jobtitle'] = $this->input->get_post('txt-jobtitle', true);
	//
	// 	//search data ed
	//
	// 	//get data form model st
	// 	$count = $this->Job_search_model->get_jobpost_count($search);
	// 	$data = $this->Job_search_model->get_jobpost($limit, $start,$search);
	// 	//get data from model ed
	//
	// 	/*for display data st
	// 	**data table return format should be like below
	// 	**{"draw":1,"recordsTotal":100,"recordsFiltered":100,"data":[[],[],[]]}
	// 	*/
	// 	$output = "";
	// 	$output .= '{';
	// 	$output .= '"draw": '.$draw.',';
	// 	$output .= '"recordsTotal": '.$count.',';
	// 	$output .= '"recordsFiltered": '.$count.',';
	// 	$output .= '"data": [ ' ;
	// 	foreach ($data as $row) {
	// 		$output .= '["'.$row->title.'","';
	// 		$output .= $row->name.'","';
	// 		$output .= $row->update_date.'","';
	// 		$output .= '<a href=\"'.site_url("detail").'?id='.$row->id.'\">View Detail</a>';
	// 		$output .='"],';
    //     }
	// 	$output = substr_replace($output, "", -1);
	// 	$output .= ']}';
	// 	//for display data ed
	// 	echo $output;
	//
	// }
}
