<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf_print extends CI_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->model('Print_pdf_model');
     }
	public function index()
	{
		$this->load->view('index');
	}
	public function print_property()
	{
		$this->load->library('myfpdf');
		$where=$this->input->post('btnprint');
		$data['record']=$this->Print_pdf_model->print_property($where);
		$this->load->view('pdf/property',$data);
	
	}
	public function print_property_marathi()
	{
		//$this->load->library('myfpdf');
		$where=$this->input->post('btnprint2');
		$data['record']=$this->Print_pdf_model->print_property($where);
		$this->load->view('property_record__marathi',$data);
	
	}
	public function print_inherit()
	{
		$this->load->library('myfpdf');
		$where=$this->input->post('btnprint');
		$data['record']=$this->Print_pdf_model->print_inherit($where);
		$this->load->view('pdf/inherit',$data);
	
	}
	public function print_inherit_marathi()
	{
		//$this->load->library('myfpdf');
		$where=$this->input->post('btnprint2');
		$data['record']=$this->Print_pdf_model->print_inherit($where);
		$this->load->view('Inheritance_certificate__marathi',$data);
	
	}
	public function print_occuption()
	{
		$this->load->library('myfpdf');
		$where=$this->input->post('btnprint');
		$data['record']=$this->Print_pdf_model->print_occuption($where);
		$this->load->view('pdf/occuption',$data);
	
	}
	public function print_occuption_marathi()
	{
		//$this->load->library('myfpdf');
		$where=$this->input->post('btnprint2');
		$data['record']=$this->Print_pdf_model->print_occuption($where);
		$this->load->view('Occupation_certificate__marathi',$data);
	
	}
	
	public function print_part()
	{
		$this->load->library('myfpdf');
		$where=$this->input->post('btnprint');
		$data['record']=$this->Print_pdf_model->print_part($where);
		$this->load->view('pdf/part',$data);
	
	}
	public function print_part_marathi()
	{
		$this->load->library('myfpdf');
		$where=$this->input->post('btnprint2');
		$data['record']=$this->Print_pdf_model->print_part($where);
		$this->load->view('Part_certificate__marathi',$data);
	
	}
	
	public function print_zone()
	{
		$this->load->library('myfpdf');
		$where=$this->input->post('btnprint');
		$data['record']=$this->Print_pdf_model->print_zone($where);
		$this->load->view('pdf/zone',$data);
	
	}
	public function print_zone_marathi()
	{
		$this->load->library('myfpdf');
		$where=$this->input->post('btnprint2');
		$data['record']=$this->Print_pdf_model->print_zone($where);
		$this->load->view('Zone _certificate__marathi',$data);
	
	}
	public function print_construction()
	{
		$this->load->library('myfpdf');
		$where=$this->input->post('btnprint');
		$data['record']=$this->Print_pdf_model->print_construction($where);
		$this->load->view('pdf/construction',$data);
	
	}
	public function print_construction_marathi()
	{
		$this->load->library('myfpdf');
		$where=$this->input->post('btnprint2');
		$data['record']=$this->Print_pdf_model->print_construction($where);
		$this->load->view('Construction _certificate__marathi',$data);
	
	}
	public function print_plant()
	{
		$this->load->library('myfpdf');
		$where=$this->input->post('btnprint');
		$data['record']=$this->Print_pdf_model->print_plant($where);
		$this->load->view('pdf/plant',$data);
	
	}
	public function print_plant_marathi()
	{
		$this->load->library('myfpdf');
		$where=$this->input->post('btnprint2');
		$data['record']=$this->Print_pdf_model->print_plant($where);
		$this->load->view('Plant_certificate__marathi',$data);
	
	}
	public function print_outstanding()
	{
		$this->load->library('myfpdf');
		$where=$this->input->post('btnprint');
		$data['record']=$this->Print_pdf_model->print_outstanding($where);
		$this->load->view('pdf/outstanding',$data);
	
	}
	public function print_outstanding_marathi()
	{
		$this->load->library('myfpdf');
		$where=$this->input->post('btnprint2');
		$data['record']=$this->Print_pdf_model->print_outstanding($where);
		$this->load->view('outstanding_certificatemarathi',$data);
	
	}
	public function print_no_obj()
	{
		$this->load->library('myfpdf');
		$where=$this->input->post('btnprint');
		$data['record']=$this->Print_pdf_model->print_no_obj($where);
		$this->load->view('pdf/no_obj',$data);
	
	}
	public function print_no_obj_marathi()
	{
		$this->load->library('myfpdf');
		$where=$this->input->post('btnprint2');
		$data['record']=$this->Print_pdf_model->print_no_obj($where);
		$this->load->view('No_Objection_certificate__marathi',$data);
	
	}
	public function print_resident()
	{
		$this->load->library('myfpdf');
		$where=$this->input->post('btnprint');
		$data['record']=$this->Print_pdf_model->print_resident($where);
		$this->load->view('pdf/resident',$data);
	
	}
	public function print_resident_marathi()
	{
		$this->load->library('myfpdf');
		$where=$this->input->post('btnprint2');
		$data['record']=$this->Print_pdf_model->print_resident($where);
		$this->load->view('Resident_certificate__marathi',$data);
	
	}
	public function print_asset()
	{
		$this->load->library('myfpdf');
		$where=$this->input->post('btnprint');
		//$data['record']=$this->Print_pdf_model->print_asset($where);
		//$this->load->view('pdf/asset',$data);
		$this->load->view('pdf/asset');
	
	}
	public function print_fire()
	{
		$this->load->library('myfpdf');
		$where=$this->input->post('btnprint');
		$data['record']=$this->Print_pdf_model->print_fire($where);
		$this->load->view('pdf/fire',$data);
	
	}
	public function print_fire_marathi()
	{
		//$this->load->library('myfpdf');
		$where=$this->input->post('btnprint2');
		$data['record']=$this->Print_pdf_model->print_fire($where);
		$this->load->view('fire_final_no_certificate_marathi',$data);
	
	}
	public function print_firefight()
	{
		$this->load->library('myfpdf');
		$where=$this->input->post('btnprint');
		$data['record']=$this->Print_pdf_model->print_firefight($where);
		$this->load->view('pdf/firefight',$data);
	
	}
	public function print_firefight_marathi()
	{
		$this->load->library('myfpdf');
		$where=$this->input->post('btnprint2');
		$data['record']=$this->Print_pdf_model->print_firefight($where);
		$this->load->view('fire_fighting_certificate_marathi',$data);
	
	}
	public function print_receipt()
	{
		//$this->load->library('myfpdf');
		$where=$this->input->post('btnprint2');
		//$where= '4';
		$data['record']=$this->Print_pdf_model->print_receipt($where);
		$this->load->view('marige_receipt',$data);
	//	echo $where;
	
	}
}
