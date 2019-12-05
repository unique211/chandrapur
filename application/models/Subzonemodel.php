<?php
class Subzonemodel extends CI_Model
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
		if ($table == "subzone_master") {
			$this->db->select('subzone_master.*,zone_master.zonename as zonename');
			$this->db->from('subzone_master');
			$this->db->join('zone_master', 'zone_master.id=subzone_master.zoneid');
			$this->db->where('subzone_master.status', '1');
			$query = $this->db->get();
			return $query->result();
		}
	}
	function delete_data($table_name, $id)
	{

		$data2 = array(

			'status' => '0',
		);
		$this->db->where('id', $id);
		$result = $this->db->update($table_name, $data2);

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
	function getdrop_data($table, $where)
	{
		$this->db->select('zone_master.*');
		$this->db->from('zone_master');
		$this->db->Where($where);
		$query = $this->db->get();
		return $query->result();
	}
	function checksubzone($table, $subname, $zone)
	{
		$this->db->select('subzone_master.*');
		$this->db->from('subzone_master');
		$this->db->Where('subzonename', $subname);
		$this->db->Where('zoneid', $zone);
		$this->db->Where('status', '1');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return 1;
		} else {
			return 0;
		}
	}
}