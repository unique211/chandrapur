<?php
class Business_Type_model extends CI_Model
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
	function showalldata($table)
	{
		if ($table == "business_type_master") {
			$this->db->select('business_type_master.*');
			$this->db->from('business_type_master');
			$this->db->where('status', 1);
			$query = $this->db->get();
			return $query->result();
		}
	}
	function delete_data($table_name, $id)
	{
		// $this->db->where('id', $id);
		// $result = $this->db->delete($table_name);
		$data=array(
			'status'=>0,
		);

		$this->db->where('id', $id);
		$result = $this->db->update($table_name, $data);

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
	function check_business_type($table_name, $business_type)
	{
		$this->db->select('business_type_master.*');
		$this->db->from('business_type_master');
		$this->db->Where('business_type', $business_type);
		$this->db->Where('status', '1');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return 1;
		} else {
			return 0;
		}
	}
}
