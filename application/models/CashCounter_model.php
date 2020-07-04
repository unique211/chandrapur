<?php
class CashCounter_model extends CI_Model
{
	function insertdata($data, $table)
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
	function getreceipt($table, $id)
	{
		$this->db->select('marrige_receipt.*');
		$this->db->from('marrige_receipt');
		$this->db->where('ref_id', $id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	function showalldata($table, $today)
	{

		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('receipt_date', $today);
		if ($this->session->role == 'staff') {
			$this->db->where('user_id', $this->session->userid);
		}

		$result = $this->db->get()->result();
		return $result;
	}
	function showdata_filtered($table_name, $from, $to, $user)
	{


		if ($user == "All") {
			$this->db->select('*');
			$this->db->from($table_name);
			$this->db->where('receipt_date >=', $from);
			$this->db->where('receipt_date <=', $to);
			$result = $this->db->get()->result();
			return $result;
		} else {
			$this->db->select('*');
			$this->db->from($table_name);
			$this->db->where('user_id', $user);
			$this->db->where('receipt_date >=', $from);
			$this->db->where('receipt_date <=', $to);
			$result = $this->db->get()->result();
			return $result;
		}
	}
	function showdatawhere($table, $id)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('id', $id);
		$result = $this->db->get()->result();
		return $result;
	}
	function showdatawhere_id($id)
	{
		$this->db->select('*,DATE_FORMAT(receipt_date, "%d/%m/%Y") as n_receipt_date,DATE_FORMAT(chq_date, "%d/%m/%Y") as chq_date,DATE_FORMAT(bill_date, "%d/%m/%Y") as bill_date');
		$this->db->from('cash_counter');
		$this->db->where('id', $id);
		$result = $this->db->get()->result();
		return $result;
	}
	function delete_data($table_name, $id)
	{
		$this->db->where('id', $id);
		// $data = array(
		// 	'status' => 0
		// );
		// $result =	$this->db->update($table_name, $data);
		$result = $this->db->delete($table_name);

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
	function getid($id)
	{
		$this->db->select('max(receipt_num) as last_receipt');
		$this->db->from('cash_counter');
		$this->db->where('receipt_year', $id);
		return $this->db->get()->row();
	}
	function showDatewiseReceipt($date)
	{
		$this->db->select('*');
		$this->db->from('cash_counter');
		$this->db->where("receipt_date ", $date);
		$query = $this->db->get();
		return $query->result();
	}
	function showDatewiseReceiptUser($date, $user_id)
	{

		$this->db->select('*');
		$this->db->from('cash_counter');
		$this->db->where("receipt_date ", $date);
		$this->db->where("zone_id", $this->session->zone);
		$this->db->where("dept_id ", $this->session->deptId);
		$query = $this->db->get();
		return $query->result();
	}

	function getFiscalYear($timestamp)
	{
		$year = (int) date('Y', $timestamp);
		$fiscalYearEndDate = strtotime('31 March ' . $year);
		if ($timestamp < $fiscalYearEndDate) $year--;
		return $year;
	}
	function get_receipt_id($date, $user_id)
	{
		$msr = 0;
		$id = 0;
		$this->db->select("id,challan_no");
		$this->db->from('cash_counter_challan');
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
			$result = $this->db->update('cash_counter_challan', $data);

			date_default_timezone_set('Asia/Kolkata');
			$date = date("Y-m-d H:i:s");
			$user_id = $this->session->userid;
			$table = 'cash_counter_challan';
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
			$date1=strtotime($date);
			$fiscalYear = $this->getFiscalYear($date1);
			$lastyear=intval($fiscalYear)+1;

			$start=$fiscalYear."-04-01";
			$end=$lastyear."-03-31";


			$this->db->select("max(sr) as msr");
			$this->db->from('cash_counter_challan');
			$this->db->where('c_date >=', $start);
			$this->db->where('c_date <=', $end);
			$query = $this->db->get();
			foreach ($query->result() as $row) {
				$msr = $row->msr;
			}
			if ($msr < 0)
				$msr = 0;
			$msr++;
			$sr = $msr;
			while (strlen($msr) < 5) {
				$msr = '0' . $msr;
			}
			$pre = 'CMCC_GAC';
			$challan_no = $pre . '' . $msr;
			$user_id = $this->session->userid;
			//    $challan_no = $msr;
			$data = array(
				'c_date' => $date,
				'pre' => $pre,
				'sr' => $sr,
				'challan_no' => $challan_no,
				'user_id' => $user_id,
				'zone_id' => $this->session->zone,
				'dept_id' => $this->session->deptId,
			);
			$result = $this->db->insert('cash_counter_challan', $data);

			date_default_timezone_set('Asia/Kolkata');
			$date = date("Y-m-d H:i:s");
			$user_id = $this->session->userid;
			$table = 'cash_counter_challan';
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
}
