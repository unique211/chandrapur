<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{


	public function index()
	{
		if (isset($this->session->userid)) {
			$this->session->unset_userdata('userid');
			//	$this->session->unset_userdata('role');  	
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('id');
		}
		$this->load->view("login");
	}
	public function signup()
	{
		$this->load->view('signup');
	}
	public function forgot()
	{
		$this->load->view('forgot');
	}
	public function dashboard()
	{


		if (isset($this->session->userid)) {
			$this->load->model('Dashboard_model', 'm');
			if ($this->session->role == 'admin') {
				$title['data'] = $this->m->showalldata();
				$title['active_menu'] = "ind";
				//	$this->load->view('index', $title);
				$this->load->view('dashboard', $title);
			} else {
				$title['data'] = $this->m->showalldata();
				$title['active_menu'] = "ind";
				//	$this->load->view('index', $title);
				$this->load->view('dashboard2', $title);
			}
		} else {
			redirect(base_url());
		}
	}

	public function dashboard1()
	{


		if (isset($this->session->userid)) {
			$this->load->model('Dashboard_model', 'm');
			$title['data'] = $this->m->showalldata();
			$title['active_menu'] = "ind";
			$this->load->view('index', $title);
		} else {
			redirect(base_url());
		}
	}
	public function import()
	{
		if (isset($this->session->userid)) {

			$title['active_menu'] = "import";
			$this->load->view('import', $title);
		} else {
			redirect(base_url());
		}
	
	
	}
	public function property_record()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "pro";
			$this->session->department_code = "01";
			$this->load->view('property_record', $title);
		} else {
			redirect(base_url());
		}
	}
	public function inheritance()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "inh";
			$this->session->department_code = "02";
			$this->load->view('inheritance', $title);
		} else {
			redirect(base_url());
		}
	}
	public function firefinal_object()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "fir_o";
			$this->session->department_code = "03";
			$this->load->view('firefinal_object', $title);
		} else {
			redirect(base_url());
		}
	}
	public function occupation()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "occ";
			$this->session->department_code = "04";
			$this->load->view('occupation', $title);
		} else {
			redirect(base_url());
		}
	}

	public function business_type()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "oc_bus";
			$this->session->department_code = "04";
			$this->load->view('business_type', $title);
		} else {
			redirect(base_url());
		}
	}

	public function part()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "part";
			$this->session->department_code = "05";
			$this->load->view('part', $title);
		} else {
			redirect(base_url());
		}
	}
	public function zone()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "zone";
			$this->session->department_code = "06";
			$this->load->view('zone', $title);
		} else {
			redirect(base_url());
		}
	}
	public function construction()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "con";
			$this->session->department_code = "07";
			$this->load->view('construction', $title);
		} else {
			redirect(base_url());
		}
	}
	public function plant()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "plant";
			$this->session->department_code = "08";
			$this->load->view('plant', $title);
		} else {
			redirect(base_url());
		}
	}
	public function fire_fighting()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "fir_f";
			$this->session->department_code = "09";
			$this->load->view('fire_fighting', $title);
		} else {
			redirect(base_url());
		}
	}
	public function outstanding()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "out";
			$this->session->department_code = "10";
			$this->load->view('outstanding', $title);
		} else {
			redirect(base_url());
		}
	}
	public function no_objection()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "no_ob";
			$this->session->department_code = "11";
			$this->load->view('no_objection', $title);
		} else {
			redirect(base_url());
		}
	}
	public function resident()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "res";
			$this->session->department_code = "12";
			$this->load->view('resident', $title);
		} else {
			redirect(base_url());
		}
	}
	public function asset_detail()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "ass";
			$this->session->department_code = "13";
			$this->load->view('asset_detail', $title);
		} else {
			redirect(base_url());
		}
	}
	public function birth_death()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "bir";
			$this->session->department_code = "14";
			$this->load->view('birth_death', $title);
		} else {
			redirect(base_url());
		}
	}
	public function death()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "death";
			$this->session->department_code = "14";
			$this->load->view('death', $title);
		} else {
			redirect(base_url());
		}
	}
	public function marriage_registration()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "mar";
			$this->session->department_code = "15";
			$this->load->view('marriage_registration', $title);
		} else {
			redirect(base_url());
		}
	}

	public function cash_counter_receipt_voucher()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "cash_rv";
			$this->session->department_code = "15";
			$this->load->view('cash_counter_receipt', $title);
		} else {
			redirect(base_url());
		}
	}
	public function cash_counter()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "cash";
			$this->session->department_code = "16";
			$this->load->view('cash_counter', $title);
		} else {
			redirect(base_url());
		}
	}
	public function miscellaneous_cash_counter()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "miscellaneous";
			$this->session->department_code = "16";
			$this->load->view('miscellaneous_cash_counter', $title);
		} else {
			redirect(base_url());
		}
	}
	public function addadmin()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "addadm";
			$this->load->view('addadmin', $title);
		} else {
			redirect(base_url());
		}
	}
	public function addstaff()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "addstf";
			$this->load->view('addstaff', $title);
		} else {
			redirect(base_url());
		}
	}
	public function adddepartment()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "adddep";
			$this->load->view('adddepartment', $title);
		} else {
			redirect(base_url());
		}
	}
	public function fee_structure()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "feestr";
			$this->load->view('fee_structure', $title);
		} else {
			redirect(base_url());
		}
	}
	public function munipal_election()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "muni_ele";
			$this->load->view('munipal_election', $title);
		} else {
			redirect(base_url());
		}
	}
	public function manu_master()
	{
		if (isset($this->session->userid)) {
			$this->load->model('Menu_Master_model', 'm');
			$title['data'] = $this->m->showalldata('menu_master');
			$title['active_menu'] = "menu_mas";

			$this->load->view('menu_master', $title);
		} else {
			redirect(base_url());
		}
	}
	public function heat_action()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "heat_action";
			$this->load->view('heat_action', $title);
		} else {
			redirect(base_url());
		}
	}
	public function annual_account()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "annu_ac";
			$this->load->view('annual_account', $title);
		} else {
			redirect(base_url());
		}
	}
	public function gallery()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "gallery";
			$this->load->view('gallery', $title);
		} else {
			redirect(base_url());
		}
	}
	public function quick_link()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "quick_link";
			$this->load->view('quick_link', $title);
		} else {
			redirect(base_url());
		}
	}
	public function info_city()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "info_city";
			$this->load->view('info_city', $title);
		} else {
			redirect(base_url());
		}
	}
	public function budget()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "budget";
			$this->load->view('budget', $title);
		} else {
			redirect(base_url());
		}
	}
	public function suggestions()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "suggestions";
			$this->load->view('suggestions', $title);
		} else {
			redirect(base_url());
		}
	}
	public function municipal_r_d()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "municipal_r_d";
			$this->load->view('municipal_r_d', $title);
		} else {
			redirect(base_url());
		}
	}
	public function gov_res_report()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "gov_res_report";
			$this->load->view('gov_res_report', $title);
		} else {
			redirect(base_url());
		}
	}
	public function admin_staff_profile()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "admin_staff_profile";
			$this->load->view('admin_staff_profile', $title);
		} else {
			redirect(base_url());
		}
	}
	public function master_edu_service()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "master_edu_service";
			$this->load->view('master_edu_service', $title);
		} else {
			redirect(base_url());
		}
	}
	public function e_link()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "e_link";
			$this->load->view('e_link', $title);
		} else {
			redirect(base_url());
		}
	}
	public function web_edu_master()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "web_edu_master";
			$this->load->view('web_edu_master', $title);
		} else {
			redirect(base_url());
		}
	}
	public function emergency_phone()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "emergency_phone";
			$this->load->view('emergency_phone', $title);
		} else {
			redirect(base_url());
		}
	}
	public function e_tenders()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "e_tenders";
			$this->load->view('e_tenders', $title);
		} else {
			redirect(base_url());
		}
	}
	public function first_page_text()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "first_page_text";
			$this->load->view('first_page_text', $title);
		} else {
			redirect(base_url());
		}
	}
	public function contacts()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "contacts";
			$this->load->view('contacts', $title);
		} else {
			redirect(base_url());
		}
	}
	public function about_muni_corp()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "about_muni_corp";
			$this->load->view('about_muni_corp', $title);
		} else {
			redirect(base_url());
		}
	}
	public function disaster_management()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "disaster_management";
			$this->load->view('disaster_management', $title);
		} else {
			redirect(base_url());
		}
	}
	public function left_menu()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "left_menu";
			$this->load->view('left_menu', $title);
		} else {
			redirect(base_url());
		}
	}
	public function right_menu()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "right_menu";
			$this->load->view('right_menu', $title);
		} else {
			redirect(base_url());
		}
	}
	public function title_menu()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "title_menu";
			$this->load->view('title_menu', $title);
		} else {
			redirect(base_url());
		}
	}
	public function slider_info()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "slider_info";
			$this->load->view('slider_info', $title);
		} else {
			redirect(base_url());
		}
	}
	public function underway_pro()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "underway_pro";
			$this->load->view('underway_pro', $title);
		} else {
			redirect(base_url());
		}
	}
	public function councilor_profile()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "councilor_profile";
			$this->load->view('councilor_profile', $title);
		} else {
			redirect(base_url());
		}
	}
	public function new_developments()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "new_developments";
			$this->load->view('new_developments', $title);
		} else {
			redirect(base_url());
		}
	}
	public function right_to_info()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "right_to_info";
			$this->load->view('right_to_info', $title);
		} else {
			redirect(base_url());
		}
	}
	public function frequiently_ask_questions()
	{
		if (isset($this->session->userid)) {
			$title['active_menu'] = "frequiently_ask_questions";
			$this->load->view('frequiently_ask_questions', $title);
		} else {
			redirect(base_url());
		}
	}
}
