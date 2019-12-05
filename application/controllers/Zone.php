<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zone extends CI_Controller
{
     function __construct(){
		parent:: __construct();
		$this->load->model('Zone_model');
				
     }

     public function adddata()
    { 
         $table_name= $this->input->post('table_name');
      
		 $id=$this->input->post('id');
	
         $data1="";
         $data="";
         $data2="";
		if($table_name=="zone_master")
        {
          $today= date('y-m-d');
           $data = array(
                    'zonename' =>$this->input->post('zone'),
                    'status' =>$this->input->post('status'),
                    'add_date' => $today,
              );
              $data2 = array(
               'zonename' =>$this->input->post('zone'),
               'status' =>$this->input->post('status'),
               'modify_date' => $today,
         );
           
        }
        if($id==""){
                 $data1=$this->Zone_model->insertdata($data,$table_name);
        
        }else
        {
            $data1=$this->Zone_model->updatedata($data2,$table_name,$id); 
        }
        echo json_encode($data1);
    }

    public function showdata()
    {   
       $table_name	= $this->input->post('table_name');
            
        $data1=$this->Zone_model->showalldata($table_name);
 
         echo json_encode($data1);	

    }
    public function deletedata()
    { 
        $table_name	= $this->input->post('table_name');
        $id=$this->input->post('id');
        
        $data1=$this->Zone_model->delete_data($table_name,$id);
        echo json_encode($data1);
    }
    public function checksubzoneexist(){
        $table_name	= $this->input->post('table_name');
        $zone=$this->input->post('zone');
        
        $data1=$this->Zone_model->checksubzone($table_name,$zone);
        echo json_encode($data1);  
    }
    
}