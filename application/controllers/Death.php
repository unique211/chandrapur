<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Death extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Death_model');
		$this->load->library('session');
		$this->load->helper('download');
	}

	public function showdata_filtered()
	{
		$table_name   = $this->input->post('table_name');
		$user = $this->input->post('staff_filter');
		$data1 = $this->Death_model->showdata_filtered($table_name, $user);
		echo json_encode($data1);
	}
	public function adddata()
	{
		$table_name = $this->input->post('table_name');
		$id = $this->input->post('id');


		$user = $this->session->userid;
		$data1 = "";
		$data = "";

		if ($table_name == "death_registration") {
			$data = array(
				'applicant' => $this->input->post('applicant'),
				'relation_applicant' => $this->input->post('relation_applicant'),
				'address' => $this->input->post('address'),
				'reg_no' => $this->input->post('reg_no'),
				'reg_date' => $this->input->post('reg_date'),
				'gender' => $this->input->post('gender'),
				'gender_m' => $this->input->post('gender_m'),
				'deceased_name_m' => $this->input->post('deceased_name_m'),
				'deceased_name' => $this->input->post('deceased_name'),
				'deceased_father_name_m' => $this->input->post('deceased_father_name_m'),
				'deceased_father_name' => $this->input->post('deceased_father_name'),
				'deceased_mother_name_m' => $this->input->post('deceased_mother_name_m'),
				'deceased_mother_name' => $this->input->post('deceased_mother_name'),
				'dod' => $this->input->post('dod'),
				'death_place_m' => $this->input->post('death_place_m'),
				'death_place' => $this->input->post('death_place'),
				'deceased_perminant_address' => $this->input->post('deceased_perminant_address'),
				'deceased_death_time_address' => $this->input->post('deceased_death_time_address'),
				'remarks' => $this->input->post('remarks'),
				'deceased_perminant_address_m' => $this->input->post('deceased_perminant_address_m'),
				'deceased_death_time_address_m' => $this->input->post('deceased_death_time_address_m'),
				'place_funeral_m' => $this->input->post('place_funeral_m'),
				'user_id' => $user,

			);
		}
		if ($id == "") {
			$data1 = $this->Death_model->insertdata($data, $table_name);
		} else {
			$data1 = $this->Death_model->updatedata($data, $table_name, $id);
		}
		echo json_encode($data1);
	}

	public function showdata()
	{
		$table_name  = $this->input->post('table_name');

		$data1 = $this->Death_model->showalldata($table_name);
		$this->session->unset_userdata('check_id');
		echo json_encode($data1);
	}
	public function showdatawhere()
	{
		$table_name  = $this->input->post('table_name');
		$id = $this->input->post('id');
		$data1 = $this->Death_model->showdatawhere($table_name, $id);

		echo json_encode($data1);
	}
	public function showdatawhere_register()
	{
		$table_name  = $this->input->post('table_name');
		$id = $this->input->post('id');
		$data1 = $this->Death_model->showdatawhere_register($table_name, $id);

		echo json_encode($data1);
	}
	public function showdatawhere_appointment()
	{
		$table_name  = "birth_appointment";
		$id = $this->input->post('id');
		$data1 = $this->Birth_model->showdatawhere_appointment($table_name, $id);

		echo json_encode($data1);
	}
	public function showdatawhere_document()
	{
		$table_name  = "birth_documents";
		$id = $this->input->post('id');
		$data1 = $this->Birth_model->showdatawhere_document($table_name, $id);
		$this->session->set_userdata('check_id',  $id);
		echo json_encode($data1);
	}
	public function deletedata()
	{
		$table_name  = $this->input->post('table_name');
		$id = $this->input->post('id');

		$data1 = $this->Death_model->delete_data($table_name, $id);
		echo json_encode($data1);
	}
	public function add_appointment()
	{
		$table_name = $this->input->post('table_name');

		$id = $this->input->post('id');

		$data1 = "";
		$data = "";

		if ($table_name == "birth_appointment") {
			$data = array(
				'reg_no' => $this->input->post('reg_no'),
				'app_mobile' => $this->input->post('app_mobile'),
				'date' => $this->input->post('date'),
				'time' => $this->input->post('time'),
				'message' => $this->input->post('message'),
				'ref_id' => $this->input->post('ref_id'),
			);
		}
		if ($id == "") {
			$data1 = $this->Birth_model->insertdata($data, $table_name);
		} else {
			$data1 = $this->Birth_model->updatedata($data, $table_name, $id);
		}
		echo json_encode($data1);
	}
	public function add_chklist()
	{
		$table_name = $this->input->post('table_name');

		$id = $this->input->post('id');

		$data1 = "";
		$data = "";

		if ($table_name == "birth_documents") {
			$data = array(
				'ref_id' => $this->input->post('ref_id'),
				'chk_id_proof' => $this->input->post('chk_id_proof'),
				'chk_cer_delivery' => $this->input->post('chk_cer_delivery'),
				'chk_affidavit' => $this->input->post('chk_affidavit'),
				'chk_noc' => $this->input->post('chk_noc'),
				'chk_court_reg' => $this->input->post('chk_court_reg'),
				'chk_order' => $this->input->post('chk_order'),
				'file_id_proof' => $this->input->post('file_id_proof'),
				'file_cer_delivery' => $this->input->post('file_cer_delivery'),
				'file_affidavit' => $this->input->post('file_affidavit'),
				'file_noc' => $this->input->post('file_noc'),
				'file_court_reg' => $this->input->post('file_court_reg'),
				'file_order' => $this->input->post('file_order'),

			);
		}
		if ($id == "") {
			$data1 = $this->Death_model->insertdata($data, $table_name);
		} else {
			$data1 = $this->Death_model->updatedata($data, $table_name, $id);
		}
		echo json_encode($data1);
	}

	public function add_application()
	{
		$table_name = $this->input->post('table_name');

		$id = $this->input->post('id');

		$data1 = "";
		$data = "";

		if ($table_name == "death_registration") {
			$data = array(
				'child_name' => $this->input->post('child_name'),
				'child_name_m' => $this->input->post('child_name_m'),
				'gender' => $this->input->post('gender'),
				'parent_perminent_address' => $this->input->post('parent_perminent_address'),
				'parent_perminent_address_m' => $this->input->post('parent_perminent_address_m'),
			);
		}

		$data1 = $this->Death_model->updatedata($data, $table_name, $id);

		echo json_encode($data1);
	}
	public function download($fileName = NULL)
	{
		if ($fileName) {
			$id = $this->session->userdata('check_id');
			//  $fileName= "Front_Page_Roman_Index";
			// $file = realpath ( "assets/img/vedorprofile" ) . "\\" . $fileName;
			$file = realpath("assets/images/birth_doc/" . $id . "/" . $fileName);
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
	public function doc_image_upload1()
	{
		$this->load->helper("file");
		$this->load->helper(array('form', 'url'));
		$this->load->helper('directory');
		$this->load->library("upload");
		//  $id=$this->input->post('id');
		$id = $this->session->userdata('check_id');

		if (!file_exists('./assets/images/birth_doc/' . $id)) {
			//  mkdir('./assets/images/birth_doc/directory2', 0777, true);
			mkdir('./assets/images/birth_doc/' . $id, 0777, TRUE);
		}
		if ($_FILES['attachment1']['size'] > 0) {
			$this->upload->initialize(array(
				"upload_path" => './assets/images/birth_doc/' . $id . '/',
				"overwrite" => FALSE,
				"max_filename" => 300,
				"remove_spaces" => TRUE,
				"allowed_types" => '*',
				"max_size" => 30000,
			));



			if (!$this->upload->do_upload('attachment1')) {
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
	public function doc_image_upload2()
	{
		$this->load->helper("file");
		$this->load->helper(array('form', 'url'));
		$this->load->helper('directory');
		$this->load->library("upload");
		//  $id=$this->input->post('id');
		$id = $this->session->userdata('check_id');

		if (!file_exists('./assets/images/birth_doc/' . $id)) {
			//  mkdir('./assets/images/birth_doc/directory2', 0777, true);
			mkdir('./assets/images/birth_doc/' . $id, 0777, TRUE);
		}
		if ($_FILES['attachment2']['size'] > 0) {
			$this->upload->initialize(array(
				"upload_path" => './assets/images/birth_doc/' . $id . '/',
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
	public function doc_image_upload3()
	{
		$this->load->helper("file");
		$this->load->helper(array('form', 'url'));
		$this->load->helper('directory');
		$this->load->library("upload");
		//  $id=$this->input->post('id');
		$id = $this->session->userdata('check_id');

		if (!file_exists('./assets/images/birth_doc/' . $id)) {
			//  mkdir('./assets/images/birth_doc/directory2', 0777, true);
			mkdir('./assets/images/birth_doc/' . $id, 0777, TRUE);
		}
		if ($_FILES['attachment3']['size'] > 0) {
			$this->upload->initialize(array(
				"upload_path" => './assets/images/birth_doc/' . $id . '/',
				"overwrite" => FALSE,
				"max_filename" => 300,
				"remove_spaces" => TRUE,
				"allowed_types" => '*',
				"max_size" => 30000,
			));



			if (!$this->upload->do_upload('attachment3')) {
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
	public function doc_image_upload4()
	{
		$this->load->helper("file");
		$this->load->helper(array('form', 'url'));
		$this->load->helper('directory');
		$this->load->library("upload");
		//  $id=$this->input->post('id');
		$id = $this->session->userdata('check_id');

		if (!file_exists('./assets/images/birth_doc/' . $id)) {
			//  mkdir('./assets/images/birth_doc/directory2', 0777, true);
			mkdir('./assets/images/birth_doc/' . $id, 0777, TRUE);
		}
		if ($_FILES['attachment4']['size'] > 0) {
			$this->upload->initialize(array(
				"upload_path" => './assets/images/birth_doc/' . $id . '/',
				"overwrite" => FALSE,
				"max_filename" => 300,
				"remove_spaces" => TRUE,
				"allowed_types" => '*',
				"max_size" => 30000,
			));



			if (!$this->upload->do_upload('attachment4')) {
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
	public function doc_image_upload5()
	{
		$this->load->helper("file");
		$this->load->helper(array('form', 'url'));
		$this->load->helper('directory');
		$this->load->library("upload");
		//  $id=$this->input->post('id');
		$id = $this->session->userdata('check_id');

		if (!file_exists('./assets/images/birth_doc/' . $id)) {
			//  mkdir('./assets/images/birth_doc/directory2', 0777, true);
			mkdir('./assets/images/birth_doc/' . $id, 0777, TRUE);
		}
		if ($_FILES['attachment5']['size'] > 0) {
			$this->upload->initialize(array(
				"upload_path" => './assets/images/birth_doc/' . $id . '/',
				"overwrite" => FALSE,
				"max_filename" => 300,
				"remove_spaces" => TRUE,
				"allowed_types" => '*',
				"max_size" => 30000,
			));



			if (!$this->upload->do_upload('attachment5')) {
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
	public function doc_image_upload6()
	{
		$this->load->helper("file");
		$this->load->helper(array('form', 'url'));
		$this->load->helper('directory');
		$this->load->library("upload");
		//  $id=$this->input->post('id');
		$id = $this->session->userdata('check_id');

		if (!file_exists('./assets/images/birth_doc/' . $id)) {
			//  mkdir('./assets/images/birth_doc/directory2', 0777, true);
			mkdir('./assets/images/birth_doc/' . $id, 0777, TRUE);
		}
		if ($_FILES['attachment6']['size'] > 0) {
			$this->upload->initialize(array(
				"upload_path" => './assets/images/birth_doc/' . $id . '/',
				"overwrite" => FALSE,
				"max_filename" => 300,
				"remove_spaces" => TRUE,
				"allowed_types" => '*',
				"max_size" => 30000,
			));



			if (!$this->upload->do_upload('attachment6')) {
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
}