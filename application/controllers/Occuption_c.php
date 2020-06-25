<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Occuption_c extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Occuption_c_model');
	}
	public function selectmaxid()
	{
		$table_name	= $this->input->post('table_name');
		$id	= $this->input->post('id');

		$data = $this->Occuption_c_model->get_insertid($table_name, $id);
		echo json_encode($data);
	}


	public function showdata_filtered()
	{
		$table_name   = $this->input->post('table_name');
		$user = $this->input->post('staff_filter');
		$data1 = $this->Occuption_c_model->showdata_filtered($table_name, $user);
		echo json_encode($data1);
	}

	public function showdata_renew()
	{
		$table_name   = $this->input->post('table_name');
	//	$user = $this->input->post('staff_filter');
		$data1 = $this->Occuption_c_model->showdata_renew($table_name);
		echo json_encode($data1);
	}

	public function adddata()
	{
		$table_name = $this->input->post('table_name');

		$id = $this->input->post('id');

		$data1 = "";
		$data = "";

		if ($table_name == "occuption_certificate") {
			$user_id = $this->session->userid;
			if ($this->session->role != "user") {
				$data = array(
					'name' => $this->input->post('name'),
					// 'ward_no' => $this->input->post('ward_no'),
					// 'municipalty_ward_no' => $this->input->post('municipalty_ward_no'),
					// 'year' => $this->input->post('year'),
					'date' => $this->input->post('date'),
					//'language' => $this->input->post('language'),
					'business_name' => $this->input->post('business_name'),
					'business_address' => $this->input->post('business_address'),
					'business_type' => $this->input->post('business_type'),
					'dimension' => $this->input->post('dimension'),
					'charge_type' => $this->input->post('charge_type'),
					'charge' => $this->input->post('charge'),
					'from_date' => $this->input->post('from'),
					'to_date' => $this->input->post('to'),
					'remark2' => $this->input->post('remark2'),
					'cus_photo' => $this->input->post('cus_photo'),
					'year2' => $this->input->post('year2'),
					'unique_no' => $this->input->post('unique_no'),
					'sr_no' => $this->input->post('sr_no'),
					'user_id' => $user_id,
				);
			} else {
				$data = array(
					'name' => $this->input->post('name'),
					// 'ward_no' => $this->input->post('ward_no'),
					// 'municipalty_ward_no' => $this->input->post('municipalty_ward_no'),
					// 'year' => $this->input->post('year'),
					'date' => $this->input->post('date'),
					//'language' => $this->input->post('language'),
					'business_name' => $this->input->post('business_name'),
					'business_address' => $this->input->post('business_address'),
					'business_type' => $this->input->post('business_type'),
					'dimension' => $this->input->post('dimension'),
					'charge_type' => $this->input->post('charge_type'),
					'charge' => $this->input->post('charge'),
					'from_date' => $this->input->post('from'),
					'to_date' => $this->input->post('to'),
					'remark2' => $this->input->post('remark2'),
					'cus_photo' => $this->input->post('cus_photo'),
					'year2' => $this->input->post('year2'),
					'unique_no' => $this->input->post('unique_no'),
					'sr_no' => $this->input->post('sr_no'),
					'user_id' => $user_id,
				);
			}

			if ($id == "") {
				$data1 = $this->Occuption_c_model->insertdata($data, $table_name);
			} else {
				$data1 = $this->Occuption_c_model->updatedata($data, $table_name, $id);
				$this->Occuption_c_model->delete_data2($id);
			}

		} else if ($table_name == 'occuption_receipt') {

			$zone_id=$this->session->zone;
			$deptId=$this->session->deptId;
		if($zone_id==null || $zone_id==""){
			$zone_id="0";
		}
		if($deptId==null || $deptId==""){
			$deptId="0";
		}
		
				$data = array(
					'ref_id' => $this->input->post('ref_id'),
					'receipt_no' => $this->input->post('receipt_no'),
					'receipt_date' => $this->input->post('receipt_date'),
					'collection_no' => $this->input->post('collection_no'),
					'counter_no' => $this->input->post('counter_no'),
					'receive_from' => $this->input->post('receive_from'),
					'amt' => $this->input->post('amt'),
					'amt_words' => $this->input->post('amt_words'),
					'function' => $this->input->post('functions'),
					'mode' => $this->input->post('mode'),
					'amt2' => $this->input->post('amt2'),
					'chq_no' => $this->input->post('chq_no'),
					'chq_date' => $this->input->post('chq_date'),
					'bank' => $this->input->post('bank'),
					'bill_no' => $this->input->post('bill_no'),
				//	'bill_date' => $this->input->post('bill_date'),
					'details' => $this->input->post('details'),
					'payble' => $this->input->post('payble'),
					'receive_amt' => $this->input->post('receive_amt'),
					'total' => $this->input->post('total'),
					'receipt_year' => $this->input->post('receipt_year'),
					'receipt_num' => $this->input->post('receipt_num'),

					'business_type' => $this->input->post('business_type'),
					'penalty' => $this->input->post('penalty'),
					'from_date' => $this->input->post('from'),
					'to_date' => $this->input->post('to'),
					'rcpt_no' => $this->input->post('rcpt_no'),

					'user_id' => $this->session->userid,
					'zone_id' => $zone_id,
					'dept_id' => $deptId,
				);

				$data1 = $this->Occuption_c_model->insertdata($data, $table_name);
				$is_renew= $this->input->post('is_renew');
				$data2=array();
				if($is_renew==1){
					$data2=array(
						'is_rcpt'=>1,
						'from_date' => $this->input->post('from'),
						'to_date' => $this->input->post('to'),
					);
				}else{
					$data2=array(
						'is_rcpt'=>1,
						
					);
				}
				

				$ref_id= $this->input->post('ref_id');
				$data_rec2 = $this->Occuption_c_model->updatedata2($data2, 'occuption_certificate', $ref_id);
		}
	
		echo json_encode($data1);
	}

	public function showdata()
	{
		$table_name	= $this->input->post('table_name');

		$data1 = $this->Occuption_c_model->showalldata($table_name);

		echo json_encode($data1);
	}

	public function show_renew_data()
	{
		$id	= $this->input->post('id');

		$data1 = $this->Occuption_c_model->show_renew_data($id);

		echo json_encode($data1);
	}
	public function deletedata()
	{
		$table_name	= $this->input->post('table_name');
		$id = $this->input->post('id');

		$data1 = $this->Occuption_c_model->delete_data($table_name, $id);
		$this->Occuption_c_model->delete_data2($id);
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

		$data1 = $this->Occuption_c_model->insertdata2($data, $table_name);


		echo json_encode($data1);
	}
	public function show_doc_id()
	{
		$id	= $this->input->post('id');
		$certificate_type = $this->input->post('certificate_type');
		$data1 = $this->Occuption_c_model->show_doc_id($certificate_type, $id);
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
				"upload_path" => './assets/images/occuption/',
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
		$table_name = "occuption_certificate";
		$id = $this->input->post('id');
		$data1 = "";
		$data = "";
		$data = array(
			'status' => $this->input->post('status'),
		);
		$data1 = $this->Occuption_c_model->updatedata($data, $table_name, $id);
		echo json_encode($data1);
	}
	public function update_status2()
	{
		$table_name = "occuption_certificate";
		$id = $this->input->post('id');
		$data1 = "";
		$data = "";
		$data = array(
			'status' => $this->input->post('status'),
			'remark' => $this->input->post('remark'),
		);
		$data1 = $this->Occuption_c_model->updatedata($data, $table_name, $id);
		echo json_encode($data1);
	}
	public function update_doc()
	{
		$table_name = "occuption_certificate";
		$id = $this->input->post('id');
		$data1 = "";
		$data = "";
		$data = array(
			'upload_doc' => $this->input->post('upload_doc'),
		);
		$data1 = $this->Occuption_c_model->updatedata($data, $table_name, $id);
		$this->session->unset_userdata('unique_id');
		echo json_encode($data1);
	}
	public function get_unique()
	{
		$table_name	= "occuption_certificate";
		$id = $this->input->post('id');
		// $id="2";
		$data1 = $this->Occuption_c_model->get_unique($table_name, $id);
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
		if (!file_exists('./assets/images/certificate/occuption/' . $id)) {
			//  mkdir('./assets/images/birth_doc/directory2', 0777, true);
			mkdir('./assets/images/certificate/occuption/' . $id, 0777, TRUE);
		}
		if ($_FILES['attachment2']['size'] > 0) {
			$this->upload->initialize(array(
				"upload_path" => './assets/images/certificate/occuption/' . $id . '/',
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


		if ($_FILES['attachment3']['size'] > 0) {
			$this->upload->initialize(array(
				"upload_path" => './assets/images/occuption/photo/',
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
	// public function download($fileName = NULL,$unique_no) {
	public function download($id)
	{
		$this->load->helper('download');
		$fileName = Null;
		$unique_no = "";
		//  $args=expload("####", $string);
		//echo $id;
		$get_file = $this->Occuption_c_model->get_file($id);
		foreach ($get_file as $row) {
			$fileName = $row->upload_doc;
			$unique_no = $row->unique_no;
		}
		if ($fileName) {
			$file = realpath("assets/images/certificate/occuption/" . $unique_no . "/" . $fileName);
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

	public function get_master()
	{

		$table_name = $this->input->post('table_name');
		$data = $this->Occuption_c_model->data_get($table_name);
		echo json_encode($data);
	}
	public function get_amount()
	{

		$business_type = $this->input->post('business_type');
		$data = $this->Occuption_c_model->get_amount($business_type);
		echo json_encode($data);
	}

	public function showdata_where()
	{
		$id	= $this->input->post('id');

		$data1 = $this->Occuption_c_model->showalldata_where($id);

		echo json_encode($data1);
	}

	public function getreceipt()
	{
		$table_name = $this->input->post('table_name');
		$id = $this->input->post('id');
		//  $table_name= "marrige_receipt";
		// $id="1";
		$data = $this->Occuption_c_model->getreceipt($table_name, $id);
		echo json_encode($data);
	}

	public function print_cash()
	{
		//$this->load->library('myfpdf');
		$where = $this->input->post('btnprint2');
		$data['record'] = $this->Occuption_c_model->showdatawhere_id($where);
		$this->load->view('receipt_print_occuption', $data);
	}
	public function getMaxReceipt()
	{
		$id = $this->input->post('year');
		//$id = 2019;
		$data = $this->Occuption_c_model->getreceiptid($id);
		echo json_encode($data);
	}
	public function letter_approve()
	{
		$id = $this->input->post('id');
		//$id = 2019;
		$data = $this->Occuption_c_model->letter_approve($id);
		echo json_encode($data);
	}

}
