<?php
class Excel_import_model extends CI_Model
{
	function select()
	{
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('user');
		return $query;
	}
	function select2()
	{
		$this->db->order_by('id', 'asc');
		$query = $this->db->get('company_master');
		return $query;
	}

	function insert($data)
	{
		$this->db->insert_batch('birth_registration', $data);
	}
	// function updatedata($data, $id)
	// {
	// 	$this->db->where('cnn_no', $id);
	// 	$result = $this->db->update('import_table', $data);
	// 	return $result;
	// }
	


	function insert2($data)
	{
		$this->db->insert('birth_registration', $data);
	}
	function chk_reg_no($reg_no)
	{
		$this->db->select('reg_no');
		$this->db->from('birth_registration');
		$this->db->where('reg_no', $reg_no);
		$query = $this->db->get();
		return $query->num_rows();
	}

}
