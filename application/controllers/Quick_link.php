<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Quick_link extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Quick_link_model');
    }

    public function adddata()
    {
        $table_name = $this->input->post('table_name');

        $id = $this->input->post('id');

        $data1 = "";
        $data = "";
        $data2 = "";
        if ($table_name == "quick_link") {
            date_default_timezone_set('Asia/Kolkata');
            $timestamp = date("Y-m-d H:i:s");
            $date = date("Y-m-d");
            $user_id=$this->session->userid;
            $data = array(
                'quik_link' => $this->input->post('quik_link'),
                'quik_link_m' => $this->input->post('quik_link_m'),
                'user_id' => $user_id,
                'add_date' => $timestamp,
            );
            $data2 = array(
                'quik_link' => $this->input->post('quik_link'),
                'quik_link_m' => $this->input->post('quik_link_m'),
                'user_id' => $user_id,
                'modify_date' => $timestamp,
            );
        }
        if ($id == "") {
            $data1 = $this->Quick_link_model->insertdata($data, $table_name);
        } else {
            $data1 = $this->Quick_link_model->updatedata($data2, $table_name, $id);
        }
        echo json_encode($data1);
    }

    public function showdata()
    {
        $table_name    = $this->input->post('table_name');

        $data1 = $this->Quick_link_model->showalldata($table_name);

        echo json_encode($data1);
    }
    public function deletedata()
    {
        $table_name    = $this->input->post('table_name');
        $id = $this->input->post('id');

        $data1 = $this->Quick_link_model->delete_data($table_name, $id);
        echo json_encode($data1);
    }
   
}
