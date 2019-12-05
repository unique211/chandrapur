<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Settings_model');
	}



	public function adddata()
	{
		$table_name = $this->input->post('table_name');

		// $id=$this->input->post('id');

		$data1 = "";
		$data = "";
		$data2 = "";
		if ($table_name == "user_registration") {
			$data = array(
				'name' => $this->input->post('name'),
				'mobile' => $this->input->post('mobile'),
				'email' => $this->input->post('email'),
				'status' => $this->input->post('status'),

			);
		}

		$data1 = $this->Settings_model->insertdata($data, $table_name);


		$today = date('y-m-d');
		$data2 = array(

			'user_id' => $this->input->post('mobile'),
			'status' => $this->input->post('status'),
			'role' => "user",
			'add_date' => $today
		);

		$login = $this->Settings_model->insertdata_login($data2);
		$this->session->set_userdata('login_id',  $login);
		echo json_encode($data1);
	}
	public function adddata_forgot()
	{
		$table_name = $this->input->post('table_name');

		$mobile = $this->input->post('mobile');

		$data1 = "";
		$data = "";
		$data2 = "";
		if ($table_name == "user_registration") {
			$data = array(
				'password' => $this->input->post('password'),
				'status' => $this->input->post('status'),
			);
		}

		$data1 = $this->Settings_model->updatedata_user($data, $table_name, $mobile);

		$today = date('y-m-d');
		$data2 = array(
			'password' => $this->input->post('password'),
			'status' => $this->input->post('status'),
			'modify_date' => $today
		);

		$this->Settings_model->updatedata_login_user($data2, $mobile);

		echo json_encode($data1);
	}
	public function adddata2()
	{
		$table_name = $this->input->post('table_name');

		$id = $this->input->post('id');

		$data1 = "";
		$data = "";
		$data2 = "";
		if ($table_name == "user_registration") {
			$data = array(
				'password' => $this->input->post('password'),
				'status' => $this->input->post('status'),
			);
		}

		$data1 = $this->Settings_model->updatedata($data, $table_name, $id);
		$today = date('y-m-d');
		$data2 = array(
			'password' => $this->input->post('password'),
			'status' => $this->input->post('status'),
			'modify_date' => $today
		);
		$id2 = $this->session->userdata('login_id');
		$this->Settings_model->updatedata_login($data2, $id2);

		echo json_encode($data1);
		$this->session->unset_userdata('login_id');
	}
	public function logincheck()
	{
		// $this->load->model('Loginmodel');
		$data = $this->Settings_model->check_login();
		echo json_encode($data);
	}
	public function add_staff()
	{
		$table_name = "login_master";

		$id = $this->input->post('id');
		$user_id = $this->input->post('user_id');
		$data1 = "";
		$data = "";
		$data2 = "";
		$today = date('y-m-d');
		$data = array(
			'user_id' => $this->input->post('user_id'),
			'password' => $this->input->post('password'),
			'role' => $this->input->post('role'),
			'status' => $this->input->post('status'),
			'add_date' => $today,
		);
		$data2 = array(
			'user_id' => $this->input->post('user_id'),
			'password' => $this->input->post('password'),
			'role' => $this->input->post('role'),
			'status' => $this->input->post('status'),
			'modify_date' => $today,
		);

		if ($id == "") {
			$data1 = $this->Settings_model->insertdata_staff($data, $table_name);
		} else {
			$data1 = $this->Settings_model->updatedata_staff_login($data2, $table_name, $user_id);
		}



		echo json_encode($data1);
	}

	public function add_admin()
	{
		$table_name = "login_master";

		$id = $this->input->post('id');
		$user_id = $this->input->post('user_id');
		$data1 = "";
		$data = "";
		$data2 = "";
		$today = date('y-m-d');
		$data = array(
			'user_id' => $this->input->post('user_id'),
			'password' => $this->input->post('password'),
			'role' => $this->input->post('role'),
			'status' => $this->input->post('status'),
			'add_date' => $today,
		);
		$data2 = array(
			'user_id' => $this->input->post('user_id'),
			'password' => $this->input->post('password'),
			'role' => $this->input->post('role'),
			'status' => $this->input->post('status'),
			'modify_date' => $today,
		);

		if ($id == "") {
			$data1 = $this->Settings_model->insertdata_staff($data, $table_name);
		} else {
			$data1 = $this->Settings_model->updatedata_staff_login($data2, $table_name, $user_id);
		}



		echo json_encode($data1);
	}
	public function add_staff_master()
	{
		$table_name = $this->input->post('table_name');

		$id = $this->input->post('id');

		$data1 = "";
		$data = "";
		$data2 = "";
		$today = date('y-m-d');
		$data = array(
			'department_id' => $this->input->post('department_id'),
			'role' => $this->input->post('role'),
			'zone' => $this->input->post('zone'),
			'name' => $this->input->post('name'),
			'mobile' => $this->input->post('mobile'),
			'email' => $this->input->post('email'),
			'user_id' => $this->input->post('user_id'),
			'status' => $this->input->post('status'),
			'add_date' => $today,
		);
		$data2 = array(
			'department_id' => $this->input->post('department_id'),
			'role' => $this->input->post('role'),
			'zone' => $this->input->post('zone'),
			'name' => $this->input->post('name'),
			'mobile' => $this->input->post('mobile'),
			'email' => $this->input->post('email'),
			'user_id' => $this->input->post('user_id'),
			'status' => $this->input->post('status'),
			'modify_date' => $today,
		);

		if ($id == "") {
			$data1 = $this->Settings_model->insertdata_staff($data, $table_name);
		} else {
			$data1 = $this->Settings_model->updatedata_staff($data2, $table_name, $id);
		}



		echo json_encode($data1);
	}

	public function add_admin_master()
	{
		$table_name = $this->input->post('table_name');

		$id = $this->input->post('id');

		$data1 = "";
		$data = "";
		$data2 = "";
		$today = date('y-m-d');
		$data = array(

			'role' => $this->input->post('role'),
			'name' => $this->input->post('name'),
			'user_id' => $this->input->post('user_id'),
			'status' => $this->input->post('status'),
			'add_date' => $today,
		);
		$data2 = array(

			'role' => $this->input->post('role'),
			'name' => $this->input->post('name'),
			'user_id' => $this->input->post('user_id'),
			'status' => $this->input->post('status'),
			'modify_date' => $today,
		);

		if ($id == "") {
			$data1 = $this->Settings_model->insertdata_staff($data, $table_name);
		} else {
			$data1 = $this->Settings_model->updatedata_staff($data2, $table_name, $id);
		}



		echo json_encode($data1);
	}

	public function showdata()
	{
		$table_name    = $this->input->post('table_name');

		$data1 = $this->Settings_model->showalldata($table_name);

		echo json_encode($data1);
	}
	public function showdata_where()
	{
		$table_name    = $this->input->post('table_name');
		$role    = $this->input->post('role');

		$data1 = $this->Settings_model->showalldata_where($table_name, $role);

		echo json_encode($data1);
	}
	public function deletedata()
	{
		$table_name    = $this->input->post('table_name');
		$id = $this->input->post('id');

		$data1 = $this->Settings_model->delete_data($table_name, $id);
		echo json_encode($data1);
	}
	public function deletedata_staff()
	{
		$table_name    = $this->input->post('table_name');
		$user_id = $this->input->post('id');
		$table_name2    = "login_master";

		$data1 = $this->Settings_model->deletedata_staff($table_name, $user_id);
		$this->Settings_model->deletedata_staff($table_name2, $user_id);
		echo json_encode($data1);
	}
	public function get_master()
	{

		$table_name = $this->input->post('table_name');
		$data = $this->Settings_model->data_get($table_name);
		echo json_encode($data);
	}
	public function chk_user_id()
	{

		$user_id = $this->input->post('user_id');
		$data = $this->Settings_model->chk_user_id($user_id);
		echo json_encode($data);
	}
	public function get_subzone()
	{

		$zoneval = $this->input->post('zoneval');
		$data = $this->Settings_model->getsubzonedata($zoneval);
		echo json_encode($data);
	}

	public function get_staff()
	{

		$zone_subzone = $this->input->post('zone_subzone');
		$data = $this->Settings_model->get_staff($zone_subzone);
		echo json_encode($data);
	}
	public function get_staff_zone()
	{

		$user_id = $this->input->post('user_id');
		$data = $this->Settings_model->get_staff_zone($user_id);
		echo json_encode($data);
	}

	public function deptwise_data()
	{

		$table_name = $this->input->post('table_name');
		$data = $this->Settings_model->deptwise_data($table_name);
		echo json_encode($data);
	}
	public function deptwise_data2()
	{

		$table_name = $this->input->post('table_name');
		$data = $this->Settings_model->deptwise_data2($table_name);
		echo json_encode($data);
	}
	public function deptwise_data3()
	{

		$table_name = $this->input->post('table_name');
		$data = $this->Settings_model->deptwise_data3($table_name);
		echo json_encode($data);
	}

	public function dept_wise_income()
	{

		$func = $this->input->post('func');
		$data = $this->Settings_model->dept_wise_income($func);
		echo json_encode($data);
	}
	public function dept_wise_income2()
	{


		$data = $this->Settings_model->dept_wise_income2();
		echo json_encode($data);
	}
}