<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Constrct extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Constrct_model');
	}
	public function selectmaxid()
	{
		$table_name	= $this->input->post('table_name');
		$id	= $this->input->post('id');

		$data = $this->Constrct_model->get_insertid($table_name, $id);
		echo json_encode($data);
	}
	public function showdata_filtered()
	{
		$table_name   = $this->input->post('table_name');
		$user = $this->input->post('staff_filter');
		$data1 = $this->Constrct_model->showdata_filtered($table_name, $user);
		echo json_encode($data1);
	}

	public function adddata()
	{
		$table_name = $this->input->post('table_name');

		$id = $this->input->post('id');

		$data1 = "";
		$data = "";

		if ($table_name == "construction_certificate") {
			$user_id = $this->session->userid;
			if ($this->session->role != "user") {
				$data = array(
					'name' => $this->input->post('name'),
					'ward_no' => $this->input->post('ward_no'),
					'municipality_ward_no' => $this->input->post('municipality_ward_no'),
					'date' => $this->input->post('date'),
					'language' => $this->input->post('language'),
					'year' => $this->input->post('year'),
					'unique_no' => $this->input->post('unique_no'),
					'sr_no' => $this->input->post('sr_no'),
					'user_id' => $user_id,
				);
			} else {
				$data = array(
					'name' => $this->input->post('name'),
					'ward_no' => $this->input->post('ward_no'),
					'municipality_ward_no' => $this->input->post('municipality_ward_no'),
					'date' => $this->input->post('date'),
					'language' => $this->input->post('language'),
					'year' => $this->input->post('year'),
					'unique_no' => $this->input->post('unique_no'),
					'sr_no' => $this->input->post('sr_no'),
					'user_id' => $user_id,
				);
			}
		}
		if ($id == "") {
			$data1 = $this->Constrct_model->insertdata($data, $table_name);
		} else {
			$data1 = $this->Constrct_model->updatedata($data, $table_name, $id);
			$this->Constrct_model->delete_data2($id);
		}
		echo json_encode($data1);
	}

	public function showdata()
	{
		$table_name	= $this->input->post('table_name');

		$data1 = $this->Constrct_model->showalldata($table_name);

		echo json_encode($data1);
	}
	public function deletedata()
	{
		$table_name	= $this->input->post('table_name');
		$id = $this->input->post('id');

		$data1 = $this->Constrct_model->delete_data($table_name, $id);
		$this->Constrct_model->delete_data2($id);
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

		$data1 = $this->Constrct_model->insertdata2($data, $table_name);


		echo json_encode($data1);
	}
	public function show_doc_id()
	{
		$id	= $this->input->post('id');
		$certificate_type = $this->input->post('certificate_type');
		$data1 = $this->Constrct_model->show_doc_id($certificate_type, $id);
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
				"upload_path" => './assets/images/constrct/',
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
		$table_name = "construction_certificate";
		$id = $this->input->post('id');
		$data1 = "";
		$data = "";
		$data = array(
			'status' => $this->input->post('status'),
		);
		$data1 = $this->Constrct_model->updatedata($data, $table_name, $id);
		echo json_encode($data1);
	}
	public function update_status2()
	{
		$table_name = "construction_certificate";
		$id = $this->input->post('id');
		$data1 = "";
		$data = "";
		$data = array(
			'status' => $this->input->post('status'),
			'remark' => $this->input->post('remark'),
		);
		$data1 = $this->Constrct_model->updatedata($data, $table_name, $id);
		echo json_encode($data1);
	}
	public function update_doc()
	{
		$table_name = "construction_certificate";
		$id = $this->input->post('id');
		$data1 = "";
		$data = "";
		$data = array(
			'upload_doc' => $this->input->post('upload_doc'),
		);
		$data1 = $this->Constrct_model->updatedata($data, $table_name, $id);
		$this->session->unset_userdata('unique_id');
		echo json_encode($data1);
	}
	public function get_unique()
	{
		$table_name	= "construction_certificate";
		$id = $this->input->post('id');
		// $id="2";
		$data1 = $this->Constrct_model->get_unique($table_name, $id);
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
		if (!file_exists('./assets/images/certificate/constrct/' . $id)) {
			//  mkdir('./assets/images/birth_doc/directory2', 0777, true);
			mkdir('./assets/images/certificate/constrct/' . $id, 0777, TRUE);
		}
		if ($_FILES['attachment2']['size'] > 0) {
			$this->upload->initialize(array(
				"upload_path" => './assets/images/certificate/constrct/' . $id . '/',
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
		$get_file = $this->Constrct_model->get_file($id);
		foreach ($get_file as $row) {
			$fileName = $row->upload_doc;
			$unique_no = $row->unique_no;
		}
		if ($fileName) {
			$file = realpath("assets/images/certificate/constrct/" . $unique_no . "/" . $fileName);
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
}