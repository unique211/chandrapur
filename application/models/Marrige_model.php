<?php
class Marrige_model extends CI_Model
{
	function insertdata($data, $table)
	{
		$result = $this->db->insert($table, $data);

		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d H:i:s");
		$user_id = $this->session->userid;
		$table = $table;
		$ref_id = $this->db->insert_id();
		$operation_details = "Insert";
		$remarks = $table . '-' . $operation_details;

		$logs = array(
			'date_time' => $date,
			'user_id' => $user_id,
			'operation_details' => $operation_details,
			'remarks' => $remarks,
			'ref_id' => $ref_id,
			'table_name' => $table,
		);
		$this->db->insert('db_logs', $logs);


		return $result;
	}
	function insert_data($data, $table)
	{


		$this->db->insert($table, $data);
		$result = $this->db->insert_id();

		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d H:i:s");
		$user_id = $this->session->userid;
		$table = $table;
		$ref_id = $this->db->insert_id();
		$operation_details = "Insert";
		$remarks = $table . '-' . $operation_details;

		$logs = array(
			'date_time' => $date,
			'user_id' => $user_id,
			'operation_details' => $operation_details,
			'remarks' => $remarks,
			'ref_id' => $ref_id,
			'table_name' => $table,
		);
		$this->db->insert('db_logs', $logs);

		return $result;
	}
	function updatedata($data, $table, $id)
	{

		$this->db->where('id', $id);
		$result = $this->db->update($table, $data);

		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d H:i:s");
		$user_id = $this->session->userid;
		$table = $table;
		$ref_id = $id;
		$operation_details = "Update";
		$remarks = $table . '-' . $operation_details;

		$logs = array(
			'date_time' => $date,
			'user_id' => $user_id,
			'operation_details' => $operation_details,
			'remarks' => $remarks,
			'ref_id' => $ref_id,
			'table_name' => $table,
		);
		$this->db->insert('db_logs', $logs);

		return $result;
	}
	function getappointment($table, $id)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('autono', $id);
		$result = $this->db->get()->result();
		return $result;
	}
	function get_voucher($where)
	{
		$this->db->select('*');
		$this->db->from('marrige_voucher');
		$this->db->where('id', $where);
		$result = $this->db->get()->result();
		return $result;
	}
	function getreceipt($table, $id)
	{
		$this->db->select('marrige_receipt.*');
		$this->db->from('marrige_receipt');
		$this->db->where('ref_id', $id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	function showalldata($table, $frm, $to, $user)
	{

		if ($user == "All") {
			$query = $this->db->query("select marrige_registration.* , marrige_receipt.id as mr_id,marrige_receipt.amt as amount,marrige_receipt.receipt_no as receiptno from marrige_registration left join marrige_receipt on marrige_registration.id = marrige_receipt.ref_id where marrige_registration.id in (select mreg.id from marrige_registration mreg where mreg.user_id='" . $this->session->userid . "' and (DATE_FORMAT(mreg.reg_date,'%Y-%m-%d') between '" . $frm . "' and '" . $to . "') or mreg.id not in (select ref_id from marrige_receipt) ) and marrige_registration.user_id = '" . $this->session->userid . "' order by marrige_registration.id DESC");
		} else {
			$query = $this->db->query("select marrige_registration.* , marrige_receipt.id as mr_id,marrige_receipt.amt as amount,marrige_receipt.receipt_no as receiptno from marrige_registration left join marrige_receipt on marrige_registration.id = marrige_receipt.ref_id where marrige_registration.id in (select mreg.id from marrige_registration mreg where mreg.user_id='" . $this->session->userid . "' and (DATE_FORMAT(mreg.reg_date,'%Y-%m-%d') between '" . $frm . "' and '" . $to . "') or mreg.id not in (select ref_id from marrige_receipt) ) and marrige_registration.user_id = '" . $user . "' order by marrige_registration.id DESC");
		}
		//  if ($table == "marrige_registration") {
		// $this->db->select('marrige_registration.* , marrige_receipt.id as mr_id,marrige_receipt.receipt_no as receiptno');
		// $this->db->from('marrige_registration');
		// $this->db->where("DATE_FORMAT(add_date,'%Y-%m-%d') between '".$frm."' and '".$to."'");
		// $this->db->where('user_id',$this->session->userid);
		// $this->db->or_where('marrige_receipt.id','null');
		// $this->db->join('marrige_receipt', 'marrige_registration.id = marrige_receipt.ref_id', 'Left');
		// $this->db->order_by('marrige_registration.id', 'DESC');
		// $query = $this->db->query("select marrige_registration.* , marrige_receipt.id as mr_id,marrige_receipt.receipt_no as receiptno from marrige_registration left join marrige_receipt on marrige_registration.id = marrige_receipt.ref_id where marrige_registration.id in (select mreg.id from marrige_registration mreg where mreg.user_id='admin' and (DATE_FORMAT(mreg.add_date,'%Y-%m-%d') between '2019-07-08' and '2019-07-09') or mreg.id not in (select ref_id from marrige_receipt) )order by marrige_registration.id DESC");



		//$query = $this->db->get();
		return $query->result();
		//}
	}
	function showalldatareceiptdt($table, $frm, $to, $user)
	{

		if ($user == "All") {
			$query = $this->db->query("select marrige_registration.* , marrige_receipt.id as mr_id,marrige_receipt.receipt_no as receiptno from marrige_registration left join marrige_receipt on marrige_registration.id = marrige_receipt.ref_id where marrige_registration.id in (select ref_id from marrige_receipt mreg where mreg.user_id='" . $this->session->userid . "' and (DATE_FORMAT(mreg.receipt_date,'%Y-%m-%d') between '" . $frm . "' and '" . $to . "')) and marrige_registration.user_id = '" . $this->session->userid . "' order by marrige_registration.id DESC");
		} else {
			$query = $this->db->query("select marrige_registration.* , marrige_receipt.id as mr_id,marrige_receipt.amt as amount,marrige_receipt.receipt_no as receiptno from marrige_registration left join marrige_receipt on marrige_registration.id = marrige_receipt.ref_id where marrige_registration.id in (select mreg.id from marrige_registration mreg where mreg.user_id='" . $this->session->userid . "' and (DATE_FORMAT(mreg.reg_date,'%Y-%m-%d') between '" . $frm . "' and '" . $to . "') or mreg.id not in (select ref_id from marrige_receipt) ) and marrige_registration.user_id = '" . $user . "' order by marrige_registration.id DESC");
		}

		//  if ($table == "marrige_registration") {
		// $this->db->select('marrige_registration.* , marrige_receipt.id as mr_id,marrige_receipt.receipt_no as receiptno');
		// $this->db->from('marrige_registration');
		// $this->db->where("DATE_FORMAT(add_date,'%Y-%m-%d') between '".$frm."' and '".$to."'");
		// $this->db->where('user_id',$this->session->userid);
		// $this->db->or_where('marrige_receipt.id','null');
		// $this->db->join('marrige_receipt', 'marrige_registration.id = marrige_receipt.ref_id', 'Left');
		// $this->db->order_by('marrige_registration.id', 'DESC');
		// $query = $this->db->query("select marrige_registration.* , marrige_receipt.id as mr_id,marrige_receipt.receipt_no as receiptno from marrige_registration left join marrige_receipt on marrige_registration.id = marrige_receipt.ref_id where marrige_registration.id in (select mreg.id from marrige_registration mreg where mreg.user_id='admin' and (DATE_FORMAT(mreg.add_date,'%Y-%m-%d') between '2019-07-08' and '2019-07-09') or mreg.id not in (select ref_id from marrige_receipt) )order by marrige_registration.id DESC");



		//$query = $this->db->get();
		return $query->result();
		//}
	}
	function showdatawhere($table, $id)
	{
		if ($table == "marrige_registration") {
			$this->db->select('marrige_registration.*');
			$this->db->from('marrige_registration');
			$this->db->where('id', $id);
			$query = $this->db->get();
			return $query->result();
		}
	}
	function showdatawhere_doc($id)
	{
		$this->db->select('marrige_documents.*');
		$this->db->from('marrige_documents');
		$this->db->where('ref_id', $id);
		$query = $this->db->get();
		return $query->result();
	}
	function showdatawhere_upload($id)
	{
		$this->db->select('marrige_upload.*');
		$this->db->from('marrige_upload');
		$this->db->where('ref_id', $id);
		$query = $this->db->get();
		return $query->result();
	}
	function delete_data($table_name, $id)
	{
		$this->db->where('id', $id);
		$data = array(
			'status' => 0
		);
		$result =	$this->db->update($table_name, $data);
		//	$result = $this->db->delete($table_name);

		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d H:i:s");
		$user_id = $this->session->userid;
		$table = $table_name;
		$ref_id = $id;
		$operation_details = "Delete";
		$remarks = $table . '-' . $operation_details;

		$logs = array(
			'date_time' => $date,
			'user_id' => $user_id,
			'operation_details' => $operation_details,
			'remarks' => $remarks,
			'ref_id' => $ref_id,
			'table_name' => $table,
		);
		$this->db->insert('db_logs', $logs);
		return $result;
	}
	function getid()
	{
		//$this->load->database();
		$last_row = $this->db->order_by('id', "desc")->limit(1)->get('marrige_registration')->row();
		//print_r($last_row);
		/*$query = $this->db->insert_id();
            	//$this->db->query('SELECT `billno` FROM `Bill_Master`');*/
		return $last_row;
	}
	function showphotoswhere($table_name, $id)
	{
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->where('autono', $id);
		$query = $this->db->get();
		return $query->result();
	}
	function showdetailswhere($table_name, $id)
	{
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result();
	}
	function getdocument($id)
	{
		$this->db->select('*');
		$this->db->from('marrige_documents');
		$this->db->where('ref_id', $id);
		$query = $this->db->get();
		return $query->result();
	}
	function getreceiptid($id)
	{
		$this->db->select('max(receipt_num) as last_receipt');
		$this->db->from('marrige_receipt');
		$this->db->where('receipt_year', $id);
		return $this->db->get()->row();
	}
	function getregnum($id)
	{
		$this->db->select('max(regno) as last_reg');
		$this->db->from('marrige_registration');
		$this->db->where("DATE_FORMAT(reg_date,'%Y')", $id);
		return $this->db->get()->row();
	}
	function showDatewiseReceipt($date)
	{
		$this->db->select('*');
		$this->db->from('marrige_receipt');
		$this->db->where("receipt_date ", $date);
		$query = $this->db->get();
		return $query->result();
	}
	function showDatewiseReceiptExtra($date)
	{
		$this->db->select('*');
		$this->db->from('marrige_voucher');
		$this->db->where("DATE(add_date)", $date);
		$query = $this->db->get();
		return $query->result();
	}
	function getreceiptnumwhere($id)
	{
		$this->db->select('*');
		$this->db->from('marrige_receipt');
		$this->db->where("ref_id ", $id);
		$query = $this->db->get();
		return $query->result();
	}
	function showdatawhere_id($id)
	{
		$this->db->select('*,DATE_FORMAT(receipt_date, "%d/%m/%Y") as n_receipt_date,DATE_FORMAT(chq_date, "%d/%m/%Y") as chq_date,DATE_FORMAT(bill_date, "%d/%m/%Y") as bill_date');
		$this->db->from('marrige_receipt');
		$this->db->where('id', $id);
		$result = $this->db->get()->result();
		return $result;
	}
	//insert into challan
	function get_receipt_id($date)
	{
		$msr = 0;
		$id = 0;
		$this->db->select("id,challan_no");
		$this->db->from('marrige_challan');
		$this->db->where('c_date', $date);
		$this->db->where("zone_id", $this->session->zone);
		$this->db->where("dept_id ", $this->session->deptId);
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$id = $row->id;
			$challan_no = $row->challan_no;
		}
		if ($id != 0) {
			$data = array(
				'modify_date' => date("Y-m-d H:i:s"),
			);
			// $this->db->set('modify_date',)
			$this->db->where('id', $id);
			$result = $this->db->update('marrige_challan', $data);

			date_default_timezone_set('Asia/Kolkata');
			$date = date("Y-m-d H:i:s");
			$user_id = $this->session->userid;
			$table = 'marrige_challan';
			$ref_id = $id;
			$operation_details = "Update";
			$remarks = $table . '-' . $operation_details;

			$logs = array(
				'date_time' => $date,
				'user_id' => $user_id,
				'operation_details' => $operation_details,
				'remarks' => $remarks,
				'ref_id' => $ref_id,
				'table_name' => $table,
			);
			$this->db->insert('db_logs', $logs);
		} else {
			$this->db->select("max(sr) as msr");
			$this->db->from('marrige_challan');
			$query = $this->db->get();
			foreach ($query->result() as $row) {
				$msr = $row->msr;
			}
			if ($msr < 366)
				$msr = 366;
			$msr++;
			$sr = $msr;
			while (strlen($msr) < 5) {
				$msr = '0' . $msr;
			}
			$pre = 'CMC_GAC';
			$challan_no = $pre . '' . $msr;
			//    $challan_no = $msr;
			$data = array(
				'c_date' => $date,
				'pre' => $pre,
				'sr' => $sr,
				'challan_no' => $challan_no,
				'user_id' => 1,
			);
			$result = $this->db->insert('marrige_challan', $data);

			date_default_timezone_set('Asia/Kolkata');
			$date = date("Y-m-d H:i:s");
			$user_id = $this->session->userid;
			$table = 'marrige_challan';
			$ref_id = $this->db->insert_id();
			$operation_details = "Insert";
			$remarks = $table . '-' . $operation_details;

			$logs = array(
				'date_time' => $date,
				'user_id' => $user_id,
				'operation_details' => $operation_details,
				'remarks' => $remarks,
				'ref_id' => $ref_id,
				'table_name' => $table,
			);
			$this->db->insert('db_logs', $logs);
		}


		return $challan_no;
	}
	function get_receipt_id2($year)
	{
		//$msr = 0;
		// $this->db->select("max(sequence_no) as last_sr");
		$this->db->select_max('sequence_no');
		$this->db->from('marrige_voucher');
		$this->db->where('year', $year);
		$query = $this->db->get();
		return  $query->result();
	}
	function getAllVoucher()
	{
		$this->db->select("*,DATE_FORMAT(add_date,'%Y-%m-%d') as receipt_date");
		$this->db->from('marrige_voucher');
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}
}