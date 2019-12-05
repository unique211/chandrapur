<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fee_str extends CI_Controller
{
     function __construct(){
		parent:: __construct();
		$this->load->model('Fee_str_model');
				
     }

     public function adddata()
    { 
         $table_name= $this->input->post('table_name');
      
		 $id=$this->input->post('id');
	
         $data1="";
         $data="";
         $data2="";
		if($table_name=="fee_structure")
        {
          $today= date('y-m-d');
           $data = array(
                    'service' =>$this->input->post('service'),
                    'amt' =>$this->input->post('amt'),
                    'no_of_copy' =>$this->input->post('no_of_copy'),
                    'add_date' => $today,
              );
              $data2 = array(
                'service' =>$this->input->post('service'),
                'amt' =>$this->input->post('amt'),
                'no_of_copy' =>$this->input->post('no_of_copy'),
               'modify_date' => $today,
         );
           
        }
        if($id==""){
                 $data1=$this->Fee_str_model->insertdata($data,$table_name);
        
        }else
        {
            $data1=$this->Fee_str_model->updatedata($data2,$table_name,$id); 
        }
        echo json_encode($data1);
    }

    public function showdata()
    {   
       $table_name	= $this->input->post('table_name');
            
        $data1=$this->Fee_str_model->showalldata($table_name);
 
         echo json_encode($data1);	

    }
    public function deletedata()
    { 
        $table_name	= $this->input->post('table_name');
        $id=$this->input->post('id');
        
        $data1=$this->Fee_str_model->delete_data($table_name,$id);
        echo json_encode($data1);
    }
    
}