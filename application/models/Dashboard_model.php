<?php

class Dashboard_model extends CI_Model
{
	function showalldata()
	{
		$data = array();
		//property_transfer_record
		$this->db->select("count(*) as cnt");
		$this->db->from('property_transfer_record');
		$this->db->where("DATE(date) = CURRENT_DATE()");
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$data['property_today_cnt'] = $row->cnt;
		}
		$this->db->select("count(*) as cnt");
		$this->db->from('property_transfer_record');
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$data['property_overall_cnt'] = $row->cnt;
		}

		//inheritance_certificate
		$this->db->select("count(*) as cnt");
		$this->db->from('inheritance_certificate');
		$this->db->where("DATE(date) = CURRENT_DATE()");
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$data['inher_today_cnt'] = $row->cnt;
		}
		$this->db->select("count(*) as cnt");
		$this->db->from('inheritance_certificate');
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$data['inher__overall_cnt'] = $row->cnt;
		}
		//fire_fighting_noc
		$this->db->select("count(*) as cnt");
		$this->db->from('fire_fighting_noc');
		$this->db->where("DATE(certificate_date) = CURRENT_DATE()");
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$data['ffn_today_cnt'] = $row->cnt;
		}
		$this->db->select("count(*) as cnt");
		$this->db->from('fire_fighting_noc');
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$data['ffn__overall_cnt'] = $row->cnt;
		}
		//occuption_certificate
		$this->db->select("count(*) as cnt");
		$this->db->from('occuption_certificate');
		$this->db->where("DATE(date) = CURRENT_DATE()");
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$data['occ_today_cnt'] = $row->cnt;
		}
		$this->db->select("count(*) as cnt");
		$this->db->from('occuption_certificate');
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$data['occ__overall_cnt'] = $row->cnt;
		}
		//part_certificate
		$this->db->select("count(*) as cnt");
		$this->db->from('part_certificate');
		$this->db->where("DATE(date) = CURRENT_DATE()");
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$data['part_today_cnt'] = $row->cnt;
		}
		$this->db->select("count(*) as cnt");
		$this->db->from('part_certificate');
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$data['part__overall_cnt'] = $row->cnt;
		}
		//zone_certificate
		$this->db->select("count(*) as cnt");
		$this->db->from('zone_certificate');
		$this->db->where("DATE(date) = CURRENT_DATE()");
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$data['zone_today_cnt'] = $row->cnt;
		}
		$this->db->select("count(*) as cnt");
		$this->db->from('zone_certificate');
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$data['zone__overall_cnt'] = $row->cnt;
		}
		//construction_certificate
		$this->db->select("count(*) as cnt");
		$this->db->from('construction_certificate');
		$this->db->where("DATE(date) = CURRENT_DATE()");
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$data['construction_today_cnt'] = $row->cnt;
		}
		$this->db->select("count(*) as cnt");
		$this->db->from('construction_certificate');
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$data['construction__overall_cnt'] = $row->cnt;
		}
		//plant_certificate
		$this->db->select("count(*) as cnt");
		$this->db->from('plant_certificate');
		$this->db->where("DATE(date) = CURRENT_DATE()");
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$data['plant_today_cnt'] = $row->cnt;
		}
		$this->db->select("count(*) as cnt");
		$this->db->from('plant_certificate');
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$data['plant__overall_cnt'] = $row->cnt;
		}
		//fire_fighting
		$this->db->select("count(*) as cnt");
		$this->db->from('fire_fighting');
		$this->db->where("DATE(certificate_date) = CURRENT_DATE()");
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$data['ff_today_cnt'] = $row->cnt;
		}
		$this->db->select("count(*) as cnt");
		$this->db->from('fire_fighting');
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$data['ff__overall_cnt'] = $row->cnt;
		}
		//outstanding_certificate
		$this->db->select("count(*) as cnt");
		$this->db->from('outstanding_certificate');
		$this->db->where("DATE(app_date) = CURRENT_DATE()");
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$data['outstanding_today_cnt'] = $row->cnt;
		}
		$this->db->select("count(*) as cnt");
		$this->db->from('outstanding_certificate');
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$data['outstanding__overall_cnt'] = $row->cnt;
		}
		//noc_certificate
		$this->db->select("count(*) as cnt");
		$this->db->from('noc_certificate');
		$this->db->where("DATE(addDate) = CURRENT_DATE()");
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$data['noc_today_cnt'] = $row->cnt;
		}
		$this->db->select("count(*) as cnt");
		$this->db->from('noc_certificate');
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$data['noc__overall_cnt'] = $row->cnt;
		}
		//resident_certificate
		$this->db->select("count(*) as cnt");
		$this->db->from('resident_certificate');
		$this->db->where("DATE(date) = CURRENT_DATE()");
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$data['res_today_cnt'] = $row->cnt;
		}
		$this->db->select("count(*) as cnt");
		$this->db->from('resident_certificate');
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$data['res__overall_cnt'] = $row->cnt;
		}

		//birth_registration

		$bd_today_cnt = 0;
		$bd_overall_cnt = 0;
		$this->db->select("count(*) as cnt");
		$this->db->from('birth_registration');
		$this->db->where("DATE(reg_date) = CURRENT_DATE()");
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			//	$data['birth_today_cnt'] = $row->cnt;
			$bd_today_cnt = $bd_today_cnt + $row->cnt;
		}
		$this->db->select("count(*) as cnt");
		$this->db->from('birth_registration');
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			//	$data['birth__overall_cnt'] = $row->cnt;
			$bd_overall_cnt = $bd_overall_cnt + $row->cnt;
		}

		//death_registration
		$this->db->select("count(*) as cnt");
		$this->db->from('death_registration');
		$this->db->where("DATE(reg_date) = CURRENT_DATE()");
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			//	$data['birth_today_cnt'] = $row->cnt;
			$bd_today_cnt = $bd_today_cnt + $row->cnt;
		}
		$this->db->select("count(*) as cnt");
		$this->db->from('death_registration');
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			//	$data['birth__overall_cnt'] = $row->cnt;
			$bd_overall_cnt = $bd_overall_cnt + $row->cnt;
		}



		$data['birth_today_cnt'] = $bd_today_cnt;
		$data['birth__overall_cnt'] = $bd_overall_cnt;

		//marrige_registration
		$this->db->select("count(*) as cnt");
		$this->db->from('marrige_registration');
		$this->db->where("DATE(reg_date) = CURRENT_DATE()");
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$data['marr_today_cnt'] = $row->cnt;
		}

		$this->db->select("count(*) as cnt");
		$this->db->from('marrige_registration');
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$data['marr__overall_cnt'] = $row->cnt;
		}

		//amounts
		$data['pro_today_amt'] = 0;
		$data['inh_today_amt'] = 0;
		$data['ffn_today_amt'] = 0;
		$data['occ_today_amt'] = 0;
		$data['part_today_amt'] = 0;
		$data['zone_today_amt'] = 0;
		$data['const_today_amt'] = 0;
		$data['plant_today_amt'] = 0;
		$data['ff_today_amt'] = 0;
		$data['out_today_amt'] = 0;
		$data['noc_today_amt'] = 0;
		$data['res_today_amt'] = 0;
		$data['birth_today_amt'] = 0;
		$data['marr_today_amt'] = 0;

		$data['pro_overall_amt'] = 0;
		$data['inh_overall_amt'] = 0;
		$data['ffn_overall_amt'] = 0;
		$data['occ_overall_amt'] = 0;
		$data['part_overall_amt'] = 0;
		$data['zone_overall_amt'] = 0;
		$data['const_overall_amt'] = 0;
		$data['plant_overall_amt'] = 0;
		$data['ff_overall_amt'] = 0;
		$data['out_overall_amt'] = 0;
		$data['noc_overall_amt'] = 0;
		$data['res_overall_amt'] = 0;
		$data['birth_overall_amt'] = 0;
		$data['marr_overall_amt'] = 0;



		$bd_overall_amt = 0;
		$bd_today_amt = 0;
		$this->db->select("sum(amt) as amt, function");
		$this->db->from('cash_counter');
		$this->db->group_by('function');
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			switch ($row->function) {
				case 'Property Transfer Record':
					$data['pro_overall_amt'] = $row->amt;
					break;
				case 'Inheritance Certificate':
					$data['inh_overall_amt'] = $row->amt;
					break;
				case 'Fire_Fighting_No_Objection_Certificate':
					$data['ffn_overall_amt'] = $row->amt;
					break;
				case 'Occupation_Certificate':
					$data['occ_overall_amt'] = $row->amt;
					break;
				case 'Part_Certificate':
					$data['part_overall_amt'] = $row->amt;
					break;
				case 'Zone_Certificate':
					$data['zone_overall_amt'] = $row->amt;
					break;
				case 'Construction_Certificate':
					$data['const_overall_amt'] = $row->amt;
					break;
				case 'Plant_Certificate':
					$data['plant_overall_amt'] = $row->amt;
					break;
				case 'Fire_Fighting':
					$data['ff_overall_amt'] = $row->amt;
					break;
				case 'Outstanding_Certificate':
					$data['out_overall_amt'] = $row->amt;
					break;
				case 'No Objection_Certificate':
					$data['noc_overall_amt'] = $row->amt;
					break;
				case 'Resident_Certificate':
					$data['res_overall_amt'] = $row->amt;
					break;
				case 'Birth_Registration':
					$bd_overall_amt = $bd_overall_amt + $row->amt;
					break;
				case 'Death_Registration':
					$bd_overall_amt = $bd_overall_amt + $row->amt;
					break;
			}
		}
		$data['birth_overall_amt'] = $bd_overall_amt;

		$this->db->select("sum(amt) as amt, function");
		$this->db->from('cash_counter');
		$this->db->where('DATE(receipt_date) = CURRENT_DATE()');
		$this->db->group_by('function');
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			switch ($row->function) {
				case 'Property Transfer Record':
					$data['pro_today_amt'] = $row->amt;
					break;
				case 'Inheritance Certificate':
					$data['inh_today_amt'] = $row->amt;
					break;
				case 'Fire_Fighting_No_Objection_Certificate':
					$data['ffn_today_amt'] = $row->amt;
					break;
				case 'Occupation_Certificate':
					$data['occ_today_amt'] = $row->amt;
					break;
				case 'Part_Certificate':
					$data['part_today_amt'] = $row->amt;
					break;
				case 'Zone_Certificate':
					$data['zone_today_amt'] = $row->amt;
					break;
				case 'Construction_Certificate':
					$data['const_today_amt'] = $row->amt;
					break;
				case 'Plant_Certificate':
					$data['plant_today_amt'] = $row->amt;
					break;
				case 'Fire_Fighting':
					$data['ff_today_amt'] = $row->amt;
					break;
				case 'Outstanding_Certificate':
					$data['out_today_amt'] = $row->amt;
					break;
				case 'No Objection_Certificate':
					$data['noc_today_amt'] = $row->amt;
					break;
				case 'Resident_Certificate':
					$data['res_today_amt'] = $row->amt;
					break;
				case 'Birth_Registration':
					$bd_today_amt = $bd_today_amt + $row->amt;
					break;
				case 'Death_Registration':
					$bd_today_amt = $bd_today_amt + $row->amt;
					break;
			}
		}
		$data['birth_today_amt'] = $bd_today_amt;

		$this->db->select("sum(amt) as amt, function");
		$this->db->from('marrige_receipt');
		$this->db->where('DATE(receipt_date) = CURRENT_DATE()');
		$this->db->group_by('function');
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$data['marr_today_amt'] = $row->amt;
		}
		$this->db->select("sum(amt) as amt, function");
		$this->db->from('marrige_receipt');
		$this->db->group_by('function');
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$data['marr_overall_amt'] = $row->amt;
		}



		$data['cash_counter_today_amt'] = 0;
		$data['cash_counter_overall_amt'] = 0;
		$data['mis_cash_counter_today_amt'] = 0;
		$data['mis_counter_overall_amt'] = 0;
		$data['staff_cnt'] = 0;
		$cnt = 0;
		$cnt2 = 0;
		$cnt3 = 0;
		$cnt4 = 0;

		$this->db->select("sum(amt) as amt");
		$this->db->from('cash_counter');
		$this->db->where('DATE(receipt_date) = CURRENT_DATE()');

		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$cnt = $row->amt;
		}
		if ($cnt > 0) {
			$data['cash_counter_today_amt'] = $cnt;
		}

		$this->db->select("sum(amt) as amt");
		$this->db->from('cash_counter');
		$query = $this->db->get();
		foreach ($query->result() as $row) {

			$cnt2 = $row->amt;
		}
		if ($cnt2 > 0) {

			$data['cash_counter_overall_amt'] = $cnt2;
		}


		$this->db->select("sum(payble_amt) as amt");
		$this->db->from('miscellaneous_cash_counter');
		$this->db->where('DATE(receipt_date) = CURRENT_DATE()');

		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$cnt3 = $row->amt;
		}
		if ($cnt3 > 0) {
			$data['mis_cash_counter_today_amt'] = $cnt3;
		}

		$this->db->select("sum(payble_amt) as amt");
		$this->db->from('miscellaneous_cash_counter');
		$query = $this->db->get();
		foreach ($query->result() as $row) {

			$cnt4 = $row->amt;
		}
		if ($cnt4 > 0) {

			$data['mis_counter_overall_amt'] = $cnt4;
		}

		$this->db->select("count(*) as cnt");
		$this->db->from('staff_master');
		$this->db->where('role', 'staff');
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$data['staff_cnt'] = $row->cnt;
		}
		return $data;
	}
}