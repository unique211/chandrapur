<?php
class Payment_model extends CI_Model
{

	function insertdata($data, $table)
	{
		$this->db->insert($table, $data);
		$insert_id = $this->db->insert_id();

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



		return  $insert_id;
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
		if ($table == "department_master") {
			$this->db->select('department_master.*');
			$this->db->from('department_master');
			$this->db->where('status', '1');
			$query = $this->db->get();
			return $query->result();
		}
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
	function get_name($user_id)
	{
		$this->db->select('name');
		$this->db->from('user_registration');
		$this->db->where('mobile', $user_id);
		$this->db->where('status', '1');
		$query = $this->db->get();

		return  $query->row()->name;
	}
	function get_amount($where)
	{
		$this->db->select('amt');
		$this->db->from('fee_structure');
		$this->db->where('service', $where);
		$this->db->where('status', '1');
		$query = $this->db->get();

		$amt = 0;
		if ($query->num_rows() > 0) {
			$amt = $query->row()->amt;
		} else {
			$amt = 0;
		}
		// if($amt=="" || $amt==null){
		//   $amt=0;
		// }

		return  $amt;
	}
}