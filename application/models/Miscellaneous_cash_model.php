<?php
class Miscellaneous_cash_model extends CI_Model
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
	function insert_data($data, $table)
	{


		$this->db->insert($table, $data);
		$result = $this->db->insert_id();
		return $result;
	}
	function get_receipt_id2($year)
	{
		//$msr = 0;
		// $this->db->select("max(sequence_no) as last_sr");
		$this->db->select_max('sequence_no');
		$this->db->from('miscellaneous_cash_counter');
		$this->db->where('year', $year);
		$query = $this->db->get();
		return  $query->result();
	}
	function getAllVoucher()
	{
		$this->db->select("*");
		$this->db->from('miscellaneous_cash_counter');
		if ($this->session->role == 'staff') {
			$this->db->where('user_id', $this->session->userid);
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get();
		}

		return $query->result();
	}


	function delete_data($table_name, $id)
	{
		$this->db->where('id', $id);
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
	function get_voucher($where)
	{
		$this->db->select('*');
		$this->db->from('miscellaneous_cash_counter');
		$this->db->where('id', $where);
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
			$this->db->where('user_id', $this->session->userid);
			$this->db->where('receipt_date >=', $from);
			$this->db->where('receipt_date <=', $to);
			$result = $this->db->get()->result();
			return $result;
		}


		return $result;
	}
	function showDatewiseReceiptUser($date, $user_id)
	{

		$this->db->select("*");
		$this->db->from('miscellaneous_cash_counter');
		$this->db->where("receipt_date", $date);
		$this->db->where("zone_id", $this->session->zone);
		$this->db->where("dept_id ", $this->session->deptId);
		$query = $this->db->get();
		return $query->result();
	}
	function get_receipt_id($date, $user_id)
	{
		$msr = 0;
		$id = 0;
		$this->db->select("id,challan_no");
		$this->db->from('miscellaneous_cash_counter_challan');
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
			$result = $this->db->update('miscellaneous_cash_counter_challan', $data);

			date_default_timezone_set('Asia/Kolkata');
			$date = date("Y-m-d H:i:s");
			$user_id = $this->session->userid;
			$table = 'miscellaneous_cash_counter_challan';
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
			$this->db->from('miscellaneous_cash_counter_challan');
			$query = $this->db->get();
			foreach ($query->result() as $row) {
				$msr = $row->msr;
			}
			if ($msr < 380)
				$msr = 380;
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
			$result = $this->db->insert('miscellaneous_cash_counter_challan', $data);
		}

		return $challan_no;
	}
}