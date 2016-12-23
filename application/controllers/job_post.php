<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_post extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->model('Job_post_model');
        $this->load->model('Get_master_data_model','master');
        if(empty($_SESSION['id_user'])) {
            redirect('login');
        }
    }

    public function index()
    {
        $data["msg"] = "";
        if(!empty($this->input->get('id'))) {
            $id = $this->input->get('id');
            $result = $this->Job_post_model->get_jobpost_by_postid_userid($id,$_SESSION['id_user']);
          $data["jobpost_data"]	= $result;
        }
        $this->load_view($data);
    }

    public function save()
    {
        $this->form_validation->set_rules('txt-title', 'Title', 'trim|required|max_length[40]');
        $this->form_validation->set_rules('ddl-location', 'Location', 'trim|required');
        $this->form_validation->set_rules('ddl-industry', 'Industry', 'trim|required');
        $this->form_validation->set_rules('ddl-function', 'Job Function', 'trim|required');
        $this->form_validation->set_rules('txt-responsibilities', 'Responsibilities', 'trim|required|max_length[1000]');
        $this->form_validation->set_rules('txt-requirement', 'Requirement', 'trim|required|max_length[1000]');
        $this->form_validation->set_rules('txt-description', 'Description', 'trim|required|max_length[1000]');
        $this->form_validation->set_rules('txt-apply-method', 'Description', 'trim|required|max_length[400]');

        if($this->form_validation->run() === false) {
            $data['msg'] = validation_errors();
            $this->load_view($data);
        } else {
            $file_name = $this->do_upload();
            $jobpost_data = array(
                'title' => $this->input->post('txt-title'),
                'location' => $this->input->post('ddl-location'),
                'industry' => $this->input->post('ddl-industry'),
                'job_function' => $this->input->post('ddl-function'),
                'responsibilities' => $this->input->post('txt-responsibilities'),
                'requirement' => $this->input->post('txt-requirement'),
                'other_information' => $this->input->post('txt-description'),
                'user_id' => $_SESSION['id_user'],
                'update_date' => date('Y-m-d'),
                'apply_method'=> $this->input->post('txt-apply-method'),
            );
            if($file_name != "") {
                $jobpost_data["img_loc"] = $file_name;
            }
            if(!empty($this->input->post('txt-id'))) {
                $id = $this->input->post('txt-id');
                $data = $this->update($jobpost_data,$id);
            } else {
                $data = $this->insert($jobpost_data);
            }
            $this->load_view($data);
        }
   }

    public function delete()
    {
        $id = $this->input->get('id');
        $this->Job_post_model->delete($id);
        redirect('Job_post_list');
    }

    private function load_view($data)
    {
        $data["location"] = $this->master->get_location();
        $data["industry"] = $this->master->get_industry();
        $data["function"] = $this->master->get_job_function();
        $this->load->view('header');
        $this->load->view('Job_post_view',$data);
        $this->load->view('footer');
    }

    private function insert($jobpost_data)
    {
       try {
           $this->Job_post_model->insert($jobpost_data);
           $data["msg"] = "Save Successfully";
           redirect("Job_post_list");
       } catch (Exception $e) {
           $data["msg"] = "Save Fail!";
       }

       return $data;
    }

   private function update($jobpost_data,$id)
   {
       try {
           $this->Job_post_model->update($jobpost_data,$id);
           $data["msg"] = "Save Successfully";
           redirect("Job_post_list");
       } catch (Exception $e) {
           $data["msg"] = "Update Fail!";
       }

        return $data;
   }

   private function do_upload()
   {
        $config['encrypt_name'] = TRUE;
        $config['upload_path']   = './uploads/';
        $config['overwrite'] = TRUE;
        $config['allowed_types'] = 'gif|jpg|png';
        $this->upload->initialize($config);

        if(!$this->upload->do_upload('userfile')) {
           $data['msg'] = $this->upload->display_errors();
        } else {
           $upload_data = $this->upload->data();
           $data        = array('upload_data' => $this->upload->data());

           $config['source_image']      = $upload_data['full_path'];
           $config['maintain_ratio']    = TRUE;
           $config['width']             = 300;
           $config['height']            = 100;

           $this->load->library('image_lib', $config);

           $this->image_lib->resize();
        }

       return $upload_data['file_name'];
   }
}
