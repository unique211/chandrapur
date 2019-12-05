<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slider_info extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Slider_info_model');
    }

    public function adddata()
    {
        $table_name = $this->input->post('table_name');

        $id = $this->input->post('id');

        $data1 = "";
        $data = "";
        $data2 = "";
      
            date_default_timezone_set('Asia/Kolkata');
            $timestamp = date("Y-m-d H:i:s");
            $date = date("Y-m-d");
            $user_id=$this->session->userid;
            $data = array(
                'desc' => $this->input->post('desc'),
                'info' => $this->input->post('info'),
                'file' => $this->input->post('file'),
                'sort' => $this->input->post('sort'),
              
                'user_id' => $user_id,
                'add_date' => $timestamp,
            );
            $data2 = array(
                'desc' => $this->input->post('desc'),
                'info' => $this->input->post('info'),
                'file' => $this->input->post('file'),
                'sort' => $this->input->post('sort'),
                'user_id' => $user_id,
                'modify_date' => $timestamp,
            );
        
        if ($id == "") {
            $data1 = $this->Slider_info_model->insertdata($data, $table_name);
        } else {
            $data1 = $this->Slider_info_model->updatedata($data2, $table_name, $id);
        }
        echo json_encode($data1);
    }

    public function showdata()
    {
        $table_name    = $this->input->post('table_name');

        $data1 = $this->Slider_info_model->showalldata($table_name);

        echo json_encode($data1);
    }
    public function deletedata()
    {
        $table_name    = $this->input->post('table_name');
        $id = $this->input->post('id');

        $data1 = $this->Slider_info_model->delete_data($table_name, $id);
        echo json_encode($data1);
    }
    public function doc_image_upload()
    {
        $this->load->helper("file");
        $this->load->helper(array('form', 'url'));
        $this->load->helper('directory');
        $this->load->library("upload");
        //  $id=$this->input->post('id');

        if ($_FILES['attachment']['size'] > 0) {
            $this->upload->initialize(array(
                "upload_path" => './assets/images/slider_info/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
            ));
            if (!$this->upload->do_upload('attachment')) {
                $error = array('error' => $this->upload->display_errors());
                echo json_encode($error);
            }
            $data = $this->upload->data();
            $path = $data['file_name'];
            echo json_encode($path);
        } else {
            echo "no file";
        }
    }
}
