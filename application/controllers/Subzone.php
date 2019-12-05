<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subzone extends CI_Controller
{
     function __construct(){
		parent:: __construct();
		$this->load->model('Subzonemodel');
				
     }

     public function adddata()
    { 
         $table_name= $this->input->post('table_name');
      
		 $id=$this->input->post('id');
	
         $data1="";
         $data="";
         $data2="";
		if($table_name=="subzone_master")
        {
          $today= date('y-m-d');
           $data = array(
                    'zoneid' =>$this->input->post('zone'),
                    'subzonename' =>$this->input->post('subzone'),
                    'add_date' => $today,
              );
              $data2 = array(
               'zoneid' =>$this->input->post('zone'),
               'subzonename' =>$this->input->post('subzone'),
               'modifydate' => $today,
         );
           
        }
        if($id==""){
                 $data1=$this->Subzonemodel->insertdata($data,$table_name);
        
        }else
        {
            $data1=$this->Subzonemodel->updatedata($data2,$table_name,$id); 
        }
        echo json_encode($data1);
    }

    public function showdata()
    {   
        $table_name	= $this->input->post('table_name');
            
        $data1=$this->Subzonemodel->showalldata($table_name);
 
         echo json_encode($data1);	

    }
    public function deletedata()
    { 
        $table_name	= $this->input->post('table_name');
        $id=$this->input->post('id');
        
        $data1=$this->Subzonemodel->delete_data($table_name,$id);
        echo json_encode($data1);
    }
    public function get_dropdowndata(){
        $table_name	= $this->input->post('table_name');
        $where=$this->input->post('where');
        
        $data1=$this->Subzonemodel->getdrop_data($table_name,$where);
        echo json_encode($data1); 
    }
    public function checksubzoneexist(){
        $table_name	= $this->input->post('table_name');
        $subzone=$this->input->post('subzone');
        $zone=$this->input->post('zone');
        
        $data1=$this->Subzonemodel->checksubzone($table_name,$subzone,$zone);
        echo json_encode($data1);  
    }
    
}