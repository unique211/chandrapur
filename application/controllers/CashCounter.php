<?php
defined('BASEPATH') or exit('No direct script access allowed');
class CashCounter extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('CashCounter_model', 'm');
		$this->load->helper('download');
	}
	public function getMaxReceipt()
	{
		$id = $this->input->post('year');
		//$id = 2019;
		$data = $this->m->getid($id);
		echo json_encode($data);
	}

	public function adddata()
	{
		$table_name = $this->input->post('table_name');
		$id = $this->input->post('id');
		$user_id = $this->session->userid;
		$data1 = array();
		$data = "";
		$year = $this->input->post('year');
		if ($id == '') {
			$receipt_no = '';
			$receipt_no = $this->input->post('receipt_no');
			if ($receipt_no == '') {
				$ret = $this->m->getid($year);
				$lt =  $ret->last_receipt;
				$lt++;
				$mid = 'CMCCR';
				while (strlen($lt) < 5) {
					$lt = '0' . $lt;
				}
				$receipt_no = $year . $mid . $lt;
			} else {
				$lt = $this->input->post('num');
			}



			$data = array(
				'ref_id' => $this->input->post('ref_id'),
				'receipt_no' => $receipt_no,
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
				'bill_no' => $receipt_no,
				'bill_date' => $this->input->post('bill_date'),
				'details' => $this->input->post('details'),
				'payble' => $this->input->post('payble'),
				'receive_amt' => $this->input->post('receive_amt'),
				'total' => $this->input->post('total'),
				'receipt_year' => $year,
				'receipt_num' => $lt,
				'user_id' => $this->session->userid,
				'zone_id' => $this->session->zone,
				'dept_id' => $this->session->deptId,
			);
			$retid = $this->m->insertdata($data, $table_name);
			if ($retid != 0) {
				$data1['receipt_no'] = $receipt_no;
				$data1['ret_id'] = $retid;
			} else {
				$data1['ret_id'] = '0';
			}
		} else {
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
				'bill_date' => $this->input->post('bill_date'),
				'details' => $this->input->post('details'),
				'payble' => $this->input->post('payble'),
				'receive_amt' => $this->input->post('receive_amt'),
				'total' => $this->input->post('total'),
				'receipt_year' => $this->input->post('year'),
				'receipt_num' => $this->input->post('num'),
				'user_id' => $this->session->userid,
				'zone_id' => $this->session->zone,
				'dept_id' => $this->session->deptId,
			);
			$retid = $this->m->updatedata($data, $table_name, $id);
			if ($retid) {
				// $data1['receipt_no'] = $receipt_no;
				$data1['ret_id'] = $id;
			} else {
				$data1['ret_id'] = '0';
			}
			//$data1['ret_id'] = $retid;
		}
		echo json_encode($data1);
	}
	public function print_cash()
	{
		//$this->load->library('myfpdf');
		$where = $this->input->post('btnprint2');
		$data['record'] = $this->m->showdatawhere_id($where);
		$this->load->view('creceipt_print', $data);
	}

	public function showdata()
	{
		$today = date('y-m-d');
		$table_name  = $this->input->post('table_name');
		$data1 = $this->m->showalldata($table_name, $today);
		echo json_encode($data1);
	}
	public function showdata_filtered()
	{
		$from = $this->input->post('from');
		$to = $this->input->post('to');
		$user = $this->input->post('staff_filter');
		$table_name  = $this->input->post('table_name');
		$data1 = $this->m->showdata_filtered($table_name, $from, $to, $user);
		echo json_encode($data1);
	}
	public function showdatawhere()
	{
		$table_name  = $this->input->post('table_name');
		$id = $this->input->post('id');
		$data1 = $this->m->showdatawhere($table_name, $id);
		echo json_encode($data1);
	}
	public function deletedata()
	{
		$table_name  = $this->input->post('table_name');
		$id = $this->input->post('id');
		$data1 = $this->m->delete_data($table_name, $id);
		echo json_encode($data1);
	}
	public function showDatewiseReceipt()
	{
		$user_id = $this->session->userid;
		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d");
		//$date = $this->input->post('getDatewiseReceiptbtn');
		$get_receipt_id = $this->m->get_receipt_id($date, $user_id);
		// $data['record'] = $this->m->showDatewiseReceipt($date);
		$data['record'] = $this->m->showDatewiseReceiptUser($date, $user_id);
		$data['challanno'] = $get_receipt_id;
		$this->load->view('generatechalan_cash', $data);
	}
}
