<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Web_edu_master extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Web_edu_master_model');
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
        $user_id = $this->session->userid;
    
        $data = array(
            'edu' => $this->input->post('edu'),
            'edu_m' => $this->input->post('edu_m'),
            'parent' => $this->input->post('parent'),
            'students' => $this->input->post('students'),
            'user_id' => $user_id,
            'add_date' => $timestamp,
        );
        $data2 = array(
            'edu' => $this->input->post('edu'),
            'edu_m' => $this->input->post('edu_m'),
            'parent' => $this->input->post('parent'),
            'students' => $this->input->post('students'),
            'user_id' => $user_id,
            'modify_date' => $timestamp,
        );

        if ($id == "") {
            $data1 = $this->Web_edu_master_model->insertdata($data, $table_name);
        } else {
            $data1 = $this->Web_edu_master_model->updatedata($data2, $table_name, $id);
        }
        echo json_encode($data1);
    }

    public function showdata()
    {
        $table_name    = $this->input->post('table_name');

        $data1 = $this->Web_edu_master_model->showalldata($table_name);

        echo json_encode($data1);
    }
    public function deletedata()
    {
        $table_name    = $this->input->post('table_name');
        $id = $this->input->post('id');

        $data1 = $this->Web_edu_master_model->delete_data($table_name, $id);
        echo json_encode($data1);
    }
}
