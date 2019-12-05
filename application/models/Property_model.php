<?php
class Property_model extends CI_Model
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
	function insertdata2($data, $table)
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
		$user = $this->session->userid;
		$role = $this->session->role;
		if ($table == "property_transfer_record") {
			if ($role == "admin") {
				$this->db->select('property_transfer_record.*');
				$this->db->from('property_transfer_record');
				$this->db->where('record_status', '1');
				$query = $this->db->get();
			} else if ($role == "staff") {
				$this->db->select('property_transfer_record.*');
				$this->db->from('property_transfer_record');
				$this->db->where('record_status', '1');
				$query = $this->db->get();
			} else {
				$this->db->select('property_transfer_record.*');
				$this->db->from('property_transfer_record');
				$this->db->where('user_id', $user);
				$this->db->where('record_status', '1');
				$query = $this->db->get();
			}
			return $query->result();
		}
	}

	function showdata_filtered($table, $user)
	{
		//$user = $this->session->userid;
		//	$role = $this->session->role;
		if ($table == "property_transfer_record") {
			if ($user == "All") {
				$this->db->select('property_transfer_record.*');
				$this->db->from('property_transfer_record');
				$this->db->where('record_status', '1');
				$query = $this->db->get();
			} else {
				$this->db->select('property_transfer_record.*');
				$this->db->from('property_transfer_record');
				$this->db->where('user_id', $user);
				$this->db->where('record_status', '1');
				$query = $this->db->get();
			}
			return $query->result();
		}
	}

	function get_unique($table_name, $id)
	{
		$this->db->select('property_transfer_record.*');
		$this->db->from('property_transfer_record');
		$this->db->where('id', $id);
		$this->db->where('record_status', '1');
		//$query = $this->db->get();
		return $this->db->get()->row()->unique_no;
		//return $query->result();
	}
	function show_doc_id($certificate_type, $id)
	{
		$this->db->select('doc_upload.*');
		$this->db->from('doc_upload');
		$this->db->where('certificate_type', $certificate_type);
		$this->db->where('ref_id', $id);

		$query = $this->db->get();
		return $query->result();
	}
	function delete_data($table_name, $id)
	{
		$this->db->where('id', $id);
		$data = array(
			'record_status' => 0
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
	function delete_data2($id)
	{
		$this->db->where('ref_id', $id);

		$this->db->where('certificate_type', 'Property_Transfer_Record');
		$result = $this->db->delete('doc_upload');

		$this->db->from('doc_upload');
		$this->db->where('ref_id', $id);
		$query = $this->db->get();

		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d H:i:s");
		$user_id = $this->session->userid;
		$table = 'doc_upload';
		$ref_id = $query->row()->id;
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
	function get_insertid($table, $id)
	{
		$this->db->select_max($id);
		$hasil = $this->db->get($table);
		return $hasil->row()->$id;
	}
	function get_file($id)
	{
		$this->db->select('property_transfer_record.*');
		$this->db->from('property_transfer_record');
		$this->db->where('id', $id);
		$this->db->where('record_status', '1');
		$query = $this->db->get();
		return $query->result();
	}
}