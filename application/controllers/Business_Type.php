<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Business_Type extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Business_Type_model');
	}

	public function adddata()
	{
		$table_name = $this->input->post('table_name');

		$id = $this->input->post('id');

		$data1 = "";
		$data = "";
		$data2 = "";
		if ($table_name == "business_type_master") {
			$today = date("Y-m-d H:i:s");
			$user_id = $this->session->userid;

			$data = array(
				'business_type' => $this->input->post('business_type'),
				'amount' => $this->input->post('amount'),
				'user_id' => $user_id,
				'add_date' => $today,
				'modify_date' => $today,
			);
			$data2 = array(
				'business_type' => $this->input->post('business_type'),
				'amount' => $this->input->post('amount'),
				'user_id' => $user_id,
				'modify_date' => $today,
			);
		}
		if ($id == "") {
			$data1 = $this->Business_Type_model->insertdata($data, $table_name);
		} else {
			$data1 = $this->Business_Type_model->updatedata($data2, $table_name, $id);
		}
		echo json_encode($data1);
	}

	public function showdata()
	{
		$table_name	= $this->input->post('table_name');

		$data1 = $this->Business_Type_model->showalldata($table_name);

		echo json_encode($data1);
	}
	public function deletedata()
	{
		$table_name	= $this->input->post('table_name');
		$id = $this->input->post('id');

		$data1 = $this->Business_Type_model->delete_data($table_name, $id);
		echo json_encode($data1);
	}
	public function check_business_type()
	{
		$table_name	= $this->input->post('table_name');
		$business_type = $this->input->post('business_type');

		$data1 = $this->Business_Type_model->check_business_type($table_name, $business_type);
		echo json_encode($data1);
	}
}
