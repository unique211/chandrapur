<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_Master extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_Master_model');
    }

    public function adddata()
    {
        $table_name = $this->input->post('table_name');

        $id = $this->input->post('id');

        $data1 = "";
        $data = "";
        $data2 = "";
        if ($table_name == "menu_master") {
            date_default_timezone_set('Asia/Kolkata');
            $timestamp = date("Y-m-d H:i:s");
            $date = date("Y-m-d");
            $user_id=$this->session->userid;
            $data = array(
                'menu_name' => $this->input->post('menu_name'),
                'parent_id' => $this->input->post('parent_id'),
                'is_child' => $this->input->post('is_child'),
                'menu_order' => $this->input->post('menu_order'),                
                'created_date' => $timestamp,
            );
            $data2 = array(
                'menu_name' => $this->input->post('menu_name'),
                'parent_id' => $this->input->post('parent_id'),
                'is_child' => $this->input->post('is_child'),
                'menu_order' => $this->input->post('menu_order'),
                'modify_date' => $timestamp,
            );
        }
        if ($id == "") {
            $data1 = $this->Menu_Master_model->insertdata($data, $table_name);
        } else {
            $data1 = $this->Menu_Master_model->updatedata($data2, $table_name, $id);
        }
        echo json_encode($data1);
    }

    public function showdata()
    {
        $table_name    = $this->input->post('table_name');

        $data1 = $this->Menu_Master_model->showalldata($table_name);

        echo json_encode($data1);
    }
    public function deletedata()
    {
        $table_name    = $this->input->post('table_name');
        $id = $this->input->post('id');

        $data1 = $this->Menu_Master_model->delete_data($table_name, $id);
        echo json_encode($data1);
    }
}
