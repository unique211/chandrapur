<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Miscellaneous_cash_counter extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Miscellaneous_cash_model');
	}
	public function add_vouchar()
	{
		$table_name = $this->input->post('table_name');
		$id = $this->input->post('id');
		$data1 = "";
		$data = "";
		date_default_timezone_set('Asia/Kolkata');
		$timestamp = date("Y-m-d H:i:s");
		$date = date("Y-m-d");
		$data = array(
			'name' => $this->input->post('name'),
			'mobile' => $this->input->post('mobile'),
			'reason' => $this->input->post('reason'),
			'no_of_copy' => $this->input->post('no_of_copy'),
			'remark' => $this->input->post('remark'),
			'payble_amt' => $this->input->post('payble_amt'),
			'year' => $this->input->post('year'),
			'receipt_no' => $this->input->post('receipt_no'),
			'sequence_no' => $this->input->post('sequence_no'),
			'receipt_date' => $date,
			'user_id' => $this->session->userid,
			'zone_id' => $this->session->zone,
			'dept_id' => $this->session->deptId,
		);
		if ($id == "") {
			$data1 = $this->Miscellaneous_cash_model->insert_data($data, $table_name);
		} else {
			$data1 = $this->Miscellaneous_cash_model->updatedata($data, $table_name, $id);
		}
		echo json_encode($data1);
	}
	public function showDatewiseReceipt2()
	{
		$year = $this->input->post('year');
		$data = $this->Miscellaneous_cash_model->get_receipt_id2($year);
		echo json_encode($data);
	}
	public function showdatavoucher()
	{
		$data = $this->Miscellaneous_cash_model->getAllVoucher();
		echo json_encode($data);
	}
	public function miscellaneous_cash_receipt()
	{

		$where = $this->input->post('print_vouchar');
		//$where=1;
		$data['record'] = $this->Miscellaneous_cash_model->get_voucher($where);
		$this->load->view('miscellaneous_cash_receipt', $data);
	}
	public function showdata_filtered()
	{
		$from = $this->input->post('from');
		$to = $this->input->post('to');
		$user = $this->input->post('staff_filter');
		$table_name  = $this->input->post('table_name');
		$data1 = $this->Miscellaneous_cash_model->showdata_filtered($table_name, $from, $to, $user);
		echo json_encode($data1);
	}
	public function showDatewiseReceipt()
	{
		$user_id = $this->session->userid;
		$date = $this->input->post('getDatewiseReceiptbtn');
		$get_receipt_id = $this->Miscellaneous_cash_model->get_receipt_id($date, $user_id);
		$data['record'] = $this->Miscellaneous_cash_model->showDatewiseReceiptUser($date, $user_id);
		$data['challanno'] = $get_receipt_id;
		$this->load->view('generate_miscellaneous_chalan', $data);
	}
}