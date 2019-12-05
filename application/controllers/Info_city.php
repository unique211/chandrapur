<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info_city extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Info_city_model');
    }

    public function adddata()
    {
        $table_name = $this->input->post('table_name');

        $id = $this->input->post('id');

        $data1 = "";
        $data = "";
        $data2 = "";
        if ($table_name == "info_about_city") {
            date_default_timezone_set('Asia/Kolkata');
            $timestamp = date("Y-m-d H:i:s");
            $date = date("Y-m-d");
            $user_id=$this->session->userid;
            $data = array(
                'title' => $this->input->post('title'),
                'title_m' => $this->input->post('title_m'),
                'explaination' => $this->input->post('explaination'),
                'explaination_m' => $this->input->post('explaination_m'),
                'user_id' => $user_id,
                'add_date' => $timestamp,
            );
            $data2 = array(
                'title' => $this->input->post('title'),
                'title_m' => $this->input->post('title_m'),
                'explaination' => $this->input->post('explaination'),
                'explaination_m' => $this->input->post('explaination_m'),
                'user_id' => $user_id,
                'modify_date' => $timestamp,
            );
        }
        if ($id == "") {
            $data1 = $this->Info_city_model->insertdata($data, $table_name);
        } else {
            $data1 = $this->Info_city_model->updatedata($data2, $table_name, $id);
        }
        echo json_encode($data1);
    }

    public function showdata()
    {
        $table_name    = $this->input->post('table_name');

        $data1 = $this->Info_city_model->showalldata($table_name);

        echo json_encode($data1);
    }
    public function deletedata()
    {
        $table_name    = $this->input->post('table_name');
        $id = $this->input->post('id');

        $data1 = $this->Info_city_model->delete_data($table_name, $id);
        echo json_encode($data1);
    }
   
}
