<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Title_menu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Title_menu_model');
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
            'menu' => $this->input->post('menu'),
            'menu_m' => $this->input->post('menu_m'),
            'path' => $this->input->post('path'),
            'sort' => $this->input->post('sort'),
            'menu_parent' => $this->input->post('menu_parent'),
            'dept' => $this->input->post('dept'),
            'user_id' => $user_id,
            'add_date' => $timestamp,
        );
        $data2 = array(
            'menu' => $this->input->post('menu'),
            'menu_m' => $this->input->post('menu_m'),
            'path' => $this->input->post('path'),
            'sort' => $this->input->post('sort'),
            'menu_parent' => $this->input->post('menu_parent'),
            'dept' => $this->input->post('dept'),
            'user_id' => $user_id,
            'modify_date' => $timestamp,
        );

        if ($id == "") {
            $data1 = $this->Title_menu_model->insertdata($data, $table_name);
        } else {
            $data1 = $this->Title_menu_model->updatedata($data2, $table_name, $id);
        }
        echo json_encode($data1);
    }

    public function showdata()
    {
        $table_name    = $this->input->post('table_name');

        $data1 = $this->Title_menu_model->showalldata($table_name);

        echo json_encode($data1);
    }
    public function deletedata()
    {
        $table_name    = $this->input->post('table_name');
        $id = $this->input->post('id');

        $data1 = $this->Title_menu_model->delete_data($table_name, $id);
        echo json_encode($data1);
    }
}
