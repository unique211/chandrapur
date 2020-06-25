<?php
class Occuption_c_model extends CI_Model
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

	function updatedata2($data, $table, $id)
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
		if ($table == "occuption_certificate") {

			$user = $this->session->userid;
			$role = $this->session->role;
			if ($role == "admin" || $role == "staff") {
				$this->db->select('occuption_certificate.*');
				$this->db->from('occuption_certificate');
				$this->db->where('record_status', '1');
				$query = $this->db->get();
			} else {
				$this->db->select('occuption_certificate.*');
				$this->db->from('occuption_certificate');
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
		if ($table == "occuption_certificate") {
			$today= date('y-m-d');
			if ($user == "All") {
				$this->db->select('occuption_certificate.*');
				$this->db->from('occuption_certificate');
				$this->db->where('record_status', '1');
				$this->db->where('to_date >=', $today);
			
				$query = $this->db->get();
			} else {
				$this->db->select('occuption_certificate.*');
				$this->db->from('occuption_certificate');
				$this->db->where('user_id', $user);
				$this->db->where('record_status', '1');
				$this->db->where('to_date >=', $today);
				$query = $this->db->get();
			}
			return $query->result();
		}
	}

	function showdata_renew($table)
	{
		//$user = $this->session->userid;
		//	$role = $this->session->role;
		if ($table == "occuption_certificate") {
				$today= date('y-m-d');
		
				$this->db->select('occuption_certificate.*');
				$this->db->from('occuption_certificate');
				$this->db->where('record_status', '1');
				$this->db->where('to_date <', $today);
				$query = $this->db->get();
			
			
			return $query->result();
		}
	}

	function show_renew_data($id)
	{
		//$user = $this->session->userid;
		//	$role = $this->session->role;
		
				$today= date('y-m-d');
		
				$this->db->select('occuption_receipt.*');
				$this->db->from('occuption_receipt');
			
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
		//$result = $this->db->delete($table_name);
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
	function get_insertid($table, $id)
	{
		$this->db->select_max($id);
		$hasil = $this->db->get($table);
		return $hasil->row()->$id;
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
	function show_doc_id($certificate_type, $id)
	{


		$this->db->select('doc_upload.*');
		$this->db->from('doc_upload');
		$this->db->where('certificate_type', $certificate_type);
		$this->db->where('ref_id', $id);
		$query = $this->db->get();
		return $query->result();
	}
	function delete_data2($id)
	{
		$this->db->where('ref_id', $id);
		$this->db->where('certificate_type', 'Occupation');
		$result = $this->db->delete('doc_upload');

		$this->db->select('*');
		$this->db->from('doc_upload');
		$this->db->where('ref_id', $id);
		$query = $this->db->get();

	
		return $result;
	}
	function get_unique($table_name, $id)
	{
		$this->db->select('occuption_certificate.*');
		$this->db->from('occuption_certificate');
		$this->db->where('record_status', '1');
		$this->db->where('id', $id);
		//$query = $this->db->get();
		return $this->db->get()->row()->unique_no;
		//return $query->result();
	}
	function get_file($id)
	{
		$this->db->select('occuption_certificate.*');
		$this->db->from('occuption_certificate');
		$this->db->where('record_status', '1');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result();
	}
	function data_get($table)
	{
		$this->db->select('*');
			///$this->db->order_by('department', 'ASC');
			$this->db->where('status', '1');
	
		$hasil = $this->db->get($table);
		return $hasil->result();
	}

	function get_amount($business_type)
	{
		$this->db->select('amount');
		$this->db->from('business_type_master');
			///$this->db->order_by('department', 'ASC');
			$this->db->where('id', $business_type);
	
			$query = $this->db->get();

			$amt=0;
			if($query->num_rows() >0){
				$amt=$query->row()->amount;
			}
		return $amt;
	}

	function showalldata_where($id)
	{
		

			$user = $this->session->userid;
			$role = $this->session->role;
			if ($role == "admin" || $role == "staff") {
				$this->db->select('occuption_certificate.*,business_type_master.business_type as business_type_name');
				$this->db->from('occuption_certificate');
				$this->db->join('business_type_master','occuption_certificate.business_type=business_type_master.id');
				$this->db->where('occuption_certificate.record_status', '1');
				$this->db->where('occuption_certificate.id', $id);
				$query = $this->db->get();
			} else {
				$this->db->select('occuption_certificate.*,business_type_master.business_type as business_type_name');
				$this->db->from('occuption_certificate');
				$this->db->join('business_type_master','occuption_certificate.business_type=business_type_master.id');
				$this->db->where('occuption_certificate.user_id', $user);
				$this->db->where('occuption_certificate.record_status', '1');
				$this->db->where('occuption_certificate.id', $id);
				$query = $this->db->get();
			}

			return $query->result();
		
	}

	function getreceipt($table, $id)
	{
		$this->db->select('occuption_receipt.*');
		$this->db->from('occuption_receipt');
		$this->db->where('ref_id', $id);
		$this->db->order_by("rcpt_no", "desc");
		$this->db->limit(1);  
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	function showdatawhere_id($id)
	{
		$this->db->select('*,DATE_FORMAT(receipt_date, "%d/%m/%Y") as n_receipt_date,DATE_FORMAT(chq_date, "%d/%m/%Y") as chq_date,DATE_FORMAT(from_date, "%d/%m/%Y") as from_date,DATE_FORMAT(to_date, "%d/%m/%Y") as to_date');
		$this->db->from('occuption_receipt');
		$this->db->where('id', $id);
		$result = $this->db->get()->result();
		return $result;
	}

	function getreceiptid($id)
	{
		$this->db->select('max(receipt_num) as last_receipt');
		$this->db->from('occuption_receipt');
		$this->db->where('receipt_year', $id);
		return $this->db->get()->row();
	}
	function letter_approve($id)
	{
		$this->db->where('id', $id);
		$data = array(
			'is_letter' => 1
		);
		$result =	$this->db->update('occuption_certificate', $data);

		return $result;
	}
}
