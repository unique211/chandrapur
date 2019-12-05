<?php
class Settings_model extends CI_Model
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
	function insertdata_login($data)
	{
		$this->db->insert('login_master', $data);
		$result = $this->db->insert_id();

		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d H:i:s");
		$user_id = $this->session->userid;
		$table = 'login_master';
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
	function updatedata_user($data, $table_name, $mobile)
	{
		$this->db->where('mobile', $mobile);
		$result = $this->db->update($table_name, $data);

		$this->db->from($table_name);
		$this->db->where('mobile', $mobile);
		$query = $this->db->get();

		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d H:i:s");
		$user_id = $this->session->userid;
		$table = $table_name;
		$ref_id = $query->row()->id;
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
	function insertdata_staff($data, $table)
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
	function updatedata_staff($data, $table, $id)
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
	function updatedata_staff_login($data, $table, $user_id)
	{
		$this->db->where('user_id', $user_id);
		$result = $this->db->update($table, $data);

		$this->db->from($table);
		$this->db->where('user_id', $user_id);
		$query = $this->db->get();

		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d H:i:s");
		$user_id = $this->session->userid;
		$table = $table;
		$ref_id = $query->row()->id;
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
	function updatedata_login($data, $id)
	{
		$this->db->where('id', $id);
		$result = $this->db->update('login_master', $data);


		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d H:i:s");
		$user_id = $this->session->userid;
		$table = 'login_master';
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
	function updatedata_login_user($data, $mobile)
	{
		$this->db->where('user_id', $mobile);
		$result = $this->db->update('login_master', $data);

		$this->db->from('login_master');
		$this->db->where('user_id', $mobile);
		$query = $this->db->get();

		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d H:i:s");
		$user_id = $this->session->userid;
		$table = 'login_master';
		$ref_id =  $query->row()->id;
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
	function check_login()
	{
		$user_id = $this->input->post('user_id');
		$password = $this->input->post('password');
		//$user_id ="aagaz";
		//$password ="1234";


		if ($user_id == "admin" &&  $password == "admin") {
			$msg = 0;
			$this->db->select('login_master.*');
			$this->db->from('login_master');
			//   $this->db->join('user_registration','user_registration.mobile=login_master.user_id');
			$this->db->where('user_id', $user_id);
			$this->db->where('password', $password);
			$this->db->where('status', 1);
			$query = $this->db->get();

			if ($query->num_rows() > 0) {

				//  $get_email = $query->row()->useremail;
				$get_password = $query->row()->password;
				// $get_id = $query->row()->id;
				$role = $query->row()->role;
				// $username = $query->row()->username;
				$user_id = $query->row()->user_id;





				if (($user_id == $user_id) && ($get_password == $password)) {
					$msg = 1;

					$this->session->userid = $user_id;
					$this->session->role = $role;
					//   $this->session->username = $username;
					//   $this->session->email = $get_email;
					//  $this->session->id = $get_id;
				}
			}
		} else {

			$msg = 0;
			$this->db->select('login_master.*,user_registration.name as username,user_registration.email as useremail');
			$this->db->from('login_master');
			$this->db->join('user_registration', 'user_registration.mobile=login_master.user_id');
			$this->db->where('user_id', $user_id);
			$this->db->where('login_master.password', $password);
			$this->db->where('login_master.status', 1);
			$query = $this->db->get();

			if ($query->num_rows() > 0) {
				$get_email = $query->row()->useremail;
				$get_password = $query->row()->password;
				// $get_id = $query->row()->id;
				$role = $query->row()->role;
				$username = $query->row()->username;
				$user_id = $query->row()->user_id;





				if (($user_id == $user_id) && ($get_password == $password)) {
					$msg = 1;

					$this->session->userid = $user_id;
					$this->session->role = $role;
					$this->session->username = $username;
					$this->session->email = $get_email;
					//  $this->session->id = $get_id;
				}
			} else {
				$this->db->select('login_master.password,login_master.role,login_master.user_id,staff_master.name as username,staff_master.email as useremail,staff_master.department_id as dept_id,department_master.department,department_master.code,staff_master.zone as staffZone');
				$this->db->from('login_master');
				$this->db->join('staff_master', 'staff_master.user_id=login_master.user_id');
				$this->db->join('department_master', 'department_master.id=staff_master.department_id');
				//   $this->db->join('user_registration','user_registration.mobile=login_master.user_id');
				$this->db->where('login_master.user_id', $user_id);
				$this->db->where('password', $password);
				$this->db->where('login_master.status', 1);
				$query = $this->db->get();

				if ($query->num_rows() > 0) {
					$staffzonedata = array();
					$get_email = $query->row()->useremail;
					$get_password = $query->row()->password;
					// $get_id = $query->row()->id;
					$role = $query->row()->role;
					$username = $query->row()->username;
					$user_id = $query->row()->user_id;
					$department = $query->row()->department;
					$department_code = $query->row()->code;
					$deptId = $query->row()->dept_id;
					$zone = $query->row()->staffZone;
					$staffzoneinfo = $zone;
					$staffzonedata = (explode("_", $staffzoneinfo));
					$zonename = "";
					$subzonename = "";

					if ($staffzonedata[0] > 0) {
						$this->db->select('zonename');
						$this->db->from('zone_master');
						$this->db->where('id', $staffzonedata[0]);
						// $this->db->where('login_master.status', 1);
						$query1 = $this->db->get();
						if ($query1->num_rows() > 0) {
							$zonename = $query1->row()->zonename;
						} else {
							$zonename = "";
						}
					}
					if ($staffzonedata[1] > 0) {
						$this->db->select('subzonename');
						$this->db->from('subzone_master');
						$this->db->where('id', $staffzonedata[1]);
						// $this->db->where('login_master.status', 1);
						$query2 = $this->db->get();
						if ($query2->num_rows() > 0) {
							$subzonename = $query2->row()->subzonename;
						} else {
							$subzonename = "";
						}
					}
					//  echo "zonename".$zonename."<br>".$subzonename;
					if (($user_id == $user_id) && ($get_password == $password)) {
						$msg = 1;


						$this->session->userid = $user_id;
						$this->session->role = $role;
						$this->session->username = $username;
						$this->session->email = $get_email;
						$this->session->department = $department;
						$this->session->department_code = $department_code;
						$this->session->deptId = $deptId;
						$this->session->zone = $zone;
						//  $this->session->id = $get_id;
						$this->session->zonename = $zonename;
						$this->session->subzonename = $subzonename;
					}
				}
			}
		}

		return $msg;
		//echo $this->db->last_query();
	}
	function showalldata($table)
	{
		if ($table == "staff_master") {
			$this->db->select('staff_master.*,login_master.password,department_master.department');
			$this->db->from('staff_master');
			$this->db->join('login_master', 'login_master.user_id=staff_master.user_id');
			$this->db->join('department_master', 'department_master.id=staff_master.department_id');
			$this->db->where('login_master.role', 'staff');
			$this->db->where('staff_master.status', '1');
			$query = $this->db->get();
			return $query->result();
		}
	}
	function showalldata_where($table, $role)
	{
		if ($table == "staff_master") {
			$this->db->select('staff_master.*,login_master.password');
			$this->db->from('staff_master');
			$this->db->join('login_master', 'login_master.user_id=staff_master.user_id');
			$this->db->where('login_master.role', $role);
			$this->db->where('staff_master.status', '1');
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
		//	$result = $this->db->delete($table_name);
		$result =	$this->db->update($table_name, $data);

		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d H:i:s");
		$user_id = $this->session->userid;
		$table = 'login_master';
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
	function deletedata_staff($table_name, $user_id)
	{
		$this->db->where('user_id', $user_id);
		//	$result = $this->db->delete($table_name);
		$data = array(
			'status' => 0
		);
		$result =	$this->db->update($table_name, $data);

		$this->db->from($table_name);
		$this->db->where('user_id', $user_id);
		$query = $this->db->get();

		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d H:i:s");
		$user_id = $this->session->userid;
		$table = $table_name;
		$ref_id =  $query->row()->id;
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
	function data_get($table)
	{
		if ($table == 'department_master') {
			$this->db->order_by('department', 'ASC');
			$this->db->where('status', '1');
		}
		$hasil = $this->db->get($table);
		return $hasil->result();
	}
	function chk_user_id($user_id)
	{
		$this->db->select('login_master.*');
		$this->db->from('login_master');
		//   $this->db->join('user_registration','user_registration.mobile=login_master.user_id');
		$this->db->where('user_id', $user_id);
		$this->db->where('status', '1');
		$query = $this->db->get();
		return $query->num_rows();
	}
	function getsubzonedata($zone)
	{
		$this->db->select('subzone_master.*');
		$this->db->from('subzone_master');
		$this->db->where('zoneid', $zone);
		$this->db->where('status', '1');
		$query = $this->db->get();
		return $query->result();
	}

	function get_staff($zone)
	{
		$department_code = $this->session->department_code;


		$this->db->select('staff_master.*,department_master.department,department_master.code');
		$this->db->from('staff_master');
		$this->db->join('department_master', 'department_master.id=staff_master.department_id');
		$this->db->where('staff_master.zone', $zone);
		$this->db->where('staff_master.status', '1');
		$this->db->where('department_master.code', $department_code);
		$query = $this->db->get();
		return $query->result();
	}

	function get_staff_zone($user_id)
	{



		$this->db->select('staff_master.*');
		$this->db->from('staff_master');

		$this->db->where('staff_master.user_id', $user_id);
		$this->db->where('staff_master.status', '1');

		$query = $this->db->get();
		return $query->result();
	}

	function deptwise_data($table)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->order_by('id', "desc");
		$this->db->limit(10);
		$this->db->where('record_status', '1');
		$hasil = $this->db->get();
		return $hasil->result();
	}
	function deptwise_data2($table)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->order_by('id', "desc");
		$this->db->limit(10);
		$this->db->where('status', '1');
		$hasil = $this->db->get();
		return $hasil->result();
	}
	function deptwise_data3($table)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->order_by('id', "desc");
		$this->db->limit(10);
		$hasil = $this->db->get();
		return $hasil->result();
	}

	function dept_wise_income($func)
	{

		$this->db->order_by('id', "desc");
		$this->db->limit(10);
		$this->db->where('function', $func);
		$hasil = $this->db->get('cash_counter');
		return $hasil->result();
	}
	function dept_wise_income2()
	{

		$this->db->order_by('id', "desc");
		$this->db->limit(10);
		$hasil = $this->db->get('marrige_voucher');
		return $hasil->result();
	}
}