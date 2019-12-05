<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Frequintly_ask_questions extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Frequintly_ask_questions_model');
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
            'question' => $this->input->post('question'),
            'question_m' => $this->input->post('question_m'),
            'ans' => $this->input->post('ans'),
            'ans_m' => $this->input->post('ans_m'),
            'user_id' => $user_id,
            'add_date' => $timestamp,
        );
        $data2 = array(
            'question' => $this->input->post('question'),
            'question_m' => $this->input->post('question_m'),
            'ans' => $this->input->post('ans'),
            'ans_m' => $this->input->post('ans_m'),
            'user_id' => $user_id,
            'modify_date' => $timestamp,
        );

        if ($id == "") {
            $data1 = $this->Frequintly_ask_questions_model->insertdata($data, $table_name);
        } else {
            $data1 = $this->Frequintly_ask_questions_model->updatedata($data2, $table_name, $id);
        }
        echo json_encode($data1);
    }

    public function showdata()
    {
        $table_name    = $this->input->post('table_name');

        $data1 = $this->Frequintly_ask_questions_model->showalldata($table_name);

        echo json_encode($data1);
    }
    public function deletedata()
    {
        $table_name    = $this->input->post('table_name');
        $id = $this->input->post('id');

        $data1 = $this->Frequintly_ask_questions_model->delete_data($table_name, $id);
        echo json_encode($data1);
    }
}
