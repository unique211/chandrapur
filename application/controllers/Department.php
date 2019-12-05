<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Department extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Department_model');
	}

	public function adddata()
	{
		$table_name = $this->input->post('table_name');

		$id = $this->input->post('id');

		$data1 = "";
		$data = "";
		$data2 = "";
		if ($table_name == "department_master") {
			$today = date('y-m-d');
			$data = array(
				'department' => $this->input->post('department'),
				'code' => $this->input->post('department_code'),
				'status' => $this->input->post('status'),
				'add_date' => $today,
			);
			$data2 = array(
				'department' => $this->input->post('department'),
				'code' => $this->input->post('department_code'),
				'status' => $this->input->post('status'),
				'modify_date' => $today,
			);
		}
		if ($id == "") {
			$data1 = $this->Department_model->insertdata($data, $table_name);
		} else {
			$data1 = $this->Department_model->updatedata($data2, $table_name, $id);
		}
		echo json_encode($data1);
	}

	public function showdata()
	{
		$table_name	= $this->input->post('table_name');

		$data1 = $this->Department_model->showalldata($table_name);

		echo json_encode($data1);
	}
	public function deletedata()
	{
		$table_name	= $this->input->post('table_name');
		$id = $this->input->post('id');

		$data1 = $this->Department_model->delete_data($table_name, $id);
		echo json_encode($data1);
	}
}