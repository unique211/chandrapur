<?php
class Birth_model extends CI_Model
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
		// echo $result;

	}
	function showalldata($table)
	{
		if ($table == "birth_registration") {
			$this->db->select('birth_registration.*');
			$this->db->from('birth_registration');
			$this->db->where('status', '1');
			$query = $this->db->get();
			return $query->result();
		}
	}
	function showdata_filtered($table, $user, $dob, $name, $reg_no, $from, $to)
	{
		//$user = $this->session->userid;
		//	$role = $this->session->role;
		if ($table == "birth_registration") {
			// if ($user == "All") {
			// 	$this->db->select('birth_registration.*');
			// 	$this->db->from('birth_registration');
			// 	$this->db->where('status', '1');
			// 	$query = $this->db->get();
			// } else {
			// 	$this->db->select('birth_registration.*');
			// 	$this->db->from('birth_registration');
			// 	$this->db->where('user_id', $user);
			// 	$this->db->where('status', '1');
			// 	$query = $this->db->get();
			// }


			$this->db->select('birth_registration.*');
			$this->db->from('birth_registration');
			if ($user != "All") {
				$this->db->where('user_id', $user);
			}
			if ($dob != "") {
				$this->db->where('dob', $dob);
			}
			if ($reg_no != "") {
				$this->db->where('reg_no', $reg_no);
			}
			if ($name != "") {
				$this->db->like('child_name', $name);
			}
			if ($from != "") {
				$this->db->where('reg_date >=', $from);
				$this->db->where('reg_date <=', $to);
			}
			$this->db->where('status', '1');
			$query = $this->db->get();

			return $query->result();
		}
	}
	function showdatawhere($table, $id)
	{
		if ($table == "birth_registration") {
			$this->db->select('birth_registration.*');
			$this->db->from('birth_registration');
			$this->db->where('id', $id);
			$this->db->where('status', '1');
			$query = $this->db->get();
			return $query->result();
		}
	}
	function showdatawhere_register($table, $id)
	{
		if ($table == "birth_registration") {
			$this->db->select('birth_registration.*');
			$this->db->from('birth_registration');
			$this->db->where('id', $id);
			$query = $this->db->get();
			return $query->result();
		}
	}
	function showdatawhere_appointment($table, $id)
	{
		if ($table == "birth_appointment") {
			$this->db->select('birth_appointment.*');
			$this->db->from('birth_appointment');
			$this->db->where('ref_id', $id);

			$query = $this->db->get();
			return $query->result();
		}
	}
	function showdatawhere_document($table, $id)
	{
		if ($table == "birth_documents") {
			$this->db->select('birth_documents.*');
			$this->db->from('birth_documents');
			$this->db->where('ref_id', $id);
			$query = $this->db->get();
			return $query->result();
		}
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
}
