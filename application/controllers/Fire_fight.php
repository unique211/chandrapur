<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fire_fight extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Fire_fight_model');
	}
	public function selectmaxid()
	{
		$table_name     = $this->input->post('table_name');
		$id     = $this->input->post('id');
		$id2     = "sr_no2";

		$data['sr_no'] = $this->Fire_fight_model->get_insertid($table_name, $id);
		$data['sr_no2'] = $this->Fire_fight_model->get_insertid2($table_name, $id2);

		// $data['sr_no']=2;
		// $data['sr_no2']=5;

		echo json_encode($data);
	}

	public function showdata_filtered()
	{
		$table_name   = $this->input->post('table_name');
		$user = $this->input->post('staff_filter');
		$data1 = $this->Fire_fight_model->showdata_filtered($table_name, $user);
		echo json_encode($data1);
	}
	public function adddata()
	{
		$table_name = $this->input->post('table_name');

		$id = $this->input->post('id');

		$data1 = "";
		$data = "";

		if ($table_name == "fire_fighting2") {
			$user_id = $this->session->userid;

			date_default_timezone_set('Asia/Kolkata');
			$date = date("Y-m-d H:i:s");
			if ($this->session->role != "user") {
				$data = array(



					'bussiness_name' => $this->input->post('bussiness_name'),
					'address' => $this->input->post('address'),
					'details_solution' => $this->input->post('details_solution'),
					'testing_agency' => $this->input->post('testing_agency'),
					'agency_license_no' => $this->input->post('agency_license_no'),
					'certificate_date' => $date,
					'language' => $this->input->post('language'),
					'year' => $this->input->post('year'),
					'unique_no' => $this->input->post('unique_no'),
					'sr_no' => $this->input->post('sr_no'),
					'reg_no' => $this->input->post('reg_no'),
					'sr_no2' => $this->input->post('sr_no2'),
					'user_id' => $user_id,
					'add_date' => $date,
					'modigy_date' => $date,
				);
			} else {
				$data = array(



					'bussiness_name' => $this->input->post('bussiness_name'),
					'address' => $this->input->post('address'),
					'details_solution' => $this->input->post('details_solution'),
					'testing_agency' => $this->input->post('testing_agency'),
					'agency_license_no' => $this->input->post('agency_license_no'),
					'certificate_date' => $date,
					'language' => $this->input->post('language'),
					'year' => $this->input->post('year'),
					'unique_no' => $this->input->post('unique_no'),
					'sr_no' => $this->input->post('sr_no'),
					'reg_no' => $this->input->post('reg_no'),
					'sr_no2' => $this->input->post('sr_no2'),
					'user_id' => $user_id,
					'add_date' => $date,
					'modigy_date' => $date,
				);
			}
		}
		if ($id == "") {
			$data1 = $this->Fire_fight_model->insertdata($data, $table_name);
		} else {
			$data1 = $this->Fire_fight_model->updatedata($data, $table_name, $id);
			$this->Fire_fight_model->delete_data2($id);
		}
		echo json_encode($data1);
	}

	public function showdata()
	{
		$table_name     = $this->input->post('table_name');

		$data1 = $this->Fire_fight_model->showalldata($table_name);

		echo json_encode($data1);
	}
	public function deletedata()
	{
		$table_name     = $this->input->post('table_name');
		$id = $this->input->post('id');

		$data1 = $this->Fire_fight_model->delete_data($table_name, $id);
		$this->Fire_fight_model->delete_data2($id);
		echo json_encode($data1);
	}
	public function add_doc()
	{
		$table_name = "doc_upload";

		//$id=$this->input->post('id');

		$data1 = "";
		$data = "";

		if ($table_name == "doc_upload") {
			$data = array(
				'ref_id' => $this->input->post('ref_id'),
				'file' => $this->input->post('file'),
				'description' => $this->input->post('description'),
				'certificate_type' => $this->input->post('certificate_type'),

			);
		}

		$data1 = $this->Fire_fight_model->insertdata2($data, $table_name);


		echo json_encode($data1);
	}
	public function show_doc_id()
	{
		$id     = $this->input->post('id');
		$certificate_type = $this->input->post('certificate_type');
		$data1 = $this->Fire_fight_model->show_doc_id($certificate_type, $id);
		echo json_encode($data1);
	}
	public function doc_image_upload()
	{
		$this->load->helper("file");
		$this->load->helper(array('form', 'url'));
		$this->load->helper('directory');
		$this->load->library("upload");
		//  $id=$this->input->post('id');


		if ($_FILES['attachment']['size'] > 0) {
			$this->upload->initialize(array(
				"upload_path" => './assets/images/fire_fight/',
				"overwrite" => FALSE,
				"max_filename" => 300,
				"remove_spaces" => TRUE,
				"allowed_types" => '*',
				"max_size" => 30000,
			));
			if (!$this->upload->do_upload('attachment')) {
				$error = array('error' => $this->upload->display_errors());
				echo json_encode($error);
			}
			$data = $this->upload->data();
			$path = $data['file_name'];
			echo json_encode($path);
		} else {
			echo "no file";
		}
	}
	public function update_status()
	{
		$table_name = "fire_fighting2";
		$id = $this->input->post('id');
		$data1 = "";
		$data = "";
		$data = array(
			'status' => $this->input->post('status'),
		);
		$data1 = $this->Fire_fight_model->updatedata($data, $table_name, $id);
		echo json_encode($data1);
	}
	public function update_status2()
	{
		$table_name = "fire_fighting2";
		$id = $this->input->post('id');
		$data1 = "";
		$data = "";
		$data = array(
			'status' => $this->input->post('status'),
			'remark' => $this->input->post('remark'),
		);
		$data1 = $this->Fire_fight_model->updatedata($data, $table_name, $id);
		echo json_encode($data1);
	}
	public function update_doc()
	{
		$table_name = "fire_fighting2";
		$id = $this->input->post('id');
		$data1 = "";
		$data = "";
		$data = array(
			'doc_upload' => $this->input->post('upload_doc'),
		);
		$data1 = $this->Fire_fight_model->updatedata($data, $table_name, $id);
		$this->session->unset_userdata('unique_id');
		echo json_encode($data1);
	}
	public function get_unique()
	{
		$table_name     = "fire_fighting";
		$id = $this->input->post('id');
		// $id="2";
		$data1 = $this->Fire_fight_model->get_unique($table_name, $id);
		$this->session->set_userdata('unique_id',  $data1);
		echo json_encode($data1);
	}
	public function doc_image_upload2()
	{
		$this->load->helper("file");
		$this->load->helper(array('form', 'url'));
		$this->load->helper('directory');
		$this->load->library("upload");
		//  $id=$this->input->post('id');
		$id = $this->session->userdata('unique_id');
		if (!file_exists('./assets/images/certificate/fire_fight/' . $id)) {
			//  mkdir('./assets/images/birth_doc/directory2', 0777, true);
			mkdir('./assets/images/certificate/fire_fight/' . $id, 0777, TRUE);
		}
		if ($_FILES['attachment2']['size'] > 0) {
			$this->upload->initialize(array(
				"upload_path" => './assets/images/certificate/fire_fight/' . $id . '/',
				"overwrite" => FALSE,
				"max_filename" => 300,
				"remove_spaces" => TRUE,
				"allowed_types" => '*',
				"max_size" => 30000,
			));
			if (!$this->upload->do_upload('attachment2')) {
				$error = array('error' => $this->upload->display_errors());
				echo json_encode($error);
			}
			$data = $this->upload->data();
			$path = $data['file_name'];
			echo json_encode($path);
		} else {
			echo "no file";
		}
	}
	// public function download($fileName = NULL,$unique_no) {
	public function download($id)
	{
		$this->load->helper('download');
		$fileName = Null;
		$unique_no = "";
		//  $args=expload("####", $string);
		//echo $id;
		$get_file = $this->Fire_fight_model->get_file($id);
		foreach ($get_file as $row) {
			$fileName = $row->doc_upload;
			$unique_no = $row->unique_no;
		}
		//print_r($fileName.'  '.$unique_no);
		if ($fileName) {
			$file = realpath("assets/images/certificate/fire_fight/" . $unique_no . "/" . $fileName);
			// check file exists
			if (file_exists($file)) {
				// get file content
				$data = file_get_contents($file);
				//force download
				force_download($fileName, $data);
			} else {
				// Redirect to base url
				redirect(base_url());
			}
		}
	}
	public function print_fire()
	{
		$where = $this->input->post('btnprint2');
		$data['record'] = $this->Fire_fight_model->print_firefight($where);
		//  print_r($where);
		$this->load->view("fire_certificate", $data);
	}
}