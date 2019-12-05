<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Emergency_phone extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Emergency_phone_model');
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
            'title' => $this->input->post('title'),
            'title_m' => $this->input->post('title_m'),
            'phone' => $this->input->post('phone'),
            'user_id' => $user_id,
            'add_date' => $timestamp,
        );
        $data2 = array(
            'title' => $this->input->post('title'),
            'title_m' => $this->input->post('title_m'),
            'phone' => $this->input->post('phone'),
            'user_id' => $user_id,
            'modify_date' => $timestamp,
        );

        if ($id == "") {
            $data1 = $this->Emergency_phone_model->insertdata($data, $table_name);
        } else {
            $data1 = $this->Emergency_phone_model->updatedata($data2, $table_name, $id);
        }
        echo json_encode($data1);
    }

    public function showdata()
    {
        $table_name    = $this->input->post('table_name');

        $data1 = $this->Emergency_phone_model->showalldata($table_name);

        echo json_encode($data1);
    }
    public function deletedata()
    {
        $table_name    = $this->input->post('table_name');
        $id = $this->input->post('id');

        $data1 = $this->Emergency_phone_model->delete_data($table_name, $id);
        echo json_encode($data1);
    }
}
