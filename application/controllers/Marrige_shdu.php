<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Marrige extends CI_Controller
{
     function __construct(){
		parent:: __construct();
		$this->load->model('Marrige_model','m');
        $this->load->helper('download');		
    }
    public function data()
	{
        //$data = $this->m->getBillno();
        $data=$this->m->getid();
		echo json_encode($data);
    }
    public function getappointment(){
        $table_name= $this->input->post('table_name');
        $id=$this->input->post('id');
        $data=$this->m->getappointment($table_name,$id);
        $this->session->set_userdata('attach_id',  $id);
        echo json_encode($data);
    }
    public function getreceipt(){
      $table_name= $this->input->post('table_name');
$id=$this->input->post('id');
    //  $table_name= "marrige_receipt";
     // $id="1";
       $data=$this->m->getreceipt($table_name,$id);
      echo json_encode($data);
  }
    public function adddata()
    { 
         $table_name= $this->input->post('table_name');
		 $id=$this->input->post('id');
         $data1="";
         $data="";
		if($table_name=="marrige_registration")
        {
          if($id==""){
            $now= date('y-m-d');
            $data = array(
              'child_aadhar_no' =>$this->input->post('child_aadhar_no'),
              'girl_aadhar_no' =>$this->input->post('girl_aadhar_no'),
              'zone' =>$this->input->post('zone'),
              'ward' =>$this->input->post('ward'),
              'g_contact' =>$this->input->post('g_contact'),
              'b_contact' =>$this->input->post('b_contact'),
              'g_name' =>$this->input->post('g_name'),
              'c_name' =>$this->input->post('c_name'),
              'g_address' =>$this->input->post('g_address'),
              'c_address' =>$this->input->post('c_address'),
              'g_tahsil' =>$this->input->post('g_tahsil'),
              'c_tahsil' =>$this->input->post('c_tahsil'),
              'g_dist' =>$this->input->post('g_dist'),
              'c_dist' =>$this->input->post('c_dist'),
              'b_previous_name' =>$this->input->post('b_previous_name'),
              'g_previous_name' =>$this->input->post('g_previous_name'),
              'b_previous_address' =>$this->input->post('b_previous_address'),
              'g_previous_address' =>$this->input->post('g_previous_address'),
              'b_previous_tahsil' =>$this->input->post('b_previous_tahsil'),
              'g_earlier_tahsil' =>$this->input->post('g_earlier_tahsil'),
              'b_previous_dist' =>$this->input->post('b_previous_dist'),
              'g_previous_dist' =>$this->input->post('g_previous_dist'),
              'marrige_address' =>$this->input->post('marrige_address'),
              'wedding_place' =>$this->input->post('wedding_place'),
              'date_of_marrige' =>$this->input->post('date_of_marrige'),
              'c_birth_date' =>$this->input->post('c_birth_date'),
              'g_birth_date' =>$this->input->post('g_birth_date'),
              'c_age' =>$this->input->post('c_age'),
              'g_age' =>$this->input->post('g_age'),
                'regno' =>$this->input->post('regid'),
                'reg_date' => $now,
      );
          } 
      else{
        $data = array(
          'child_aadhar_no' =>$this->input->post('child_aadhar_no'),
          'girl_aadhar_no' =>$this->input->post('girl_aadhar_no'),
          'zone' =>$this->input->post('zone'),
          'ward' =>$this->input->post('ward'),
          'g_contact' =>$this->input->post('g_contact'),
          'b_contact' =>$this->input->post('b_contact'),
          'g_name' =>$this->input->post('g_name'),
          'c_name' =>$this->input->post('c_name'),
          'g_address' =>$this->input->post('g_address'),
          'c_address' =>$this->input->post('c_address'),
          'g_tahsil' =>$this->input->post('g_tahsil'),
          'c_tahsil' =>$this->input->post('c_tahsil'),
          'g_dist' =>$this->input->post('g_dist'),
          'c_dist' =>$this->input->post('c_dist'),
          'b_previous_name' =>$this->input->post('b_previous_name'),
          'g_previous_name' =>$this->input->post('g_previous_name'),
          'b_previous_address' =>$this->input->post('b_previous_address'),
          'g_previous_address' =>$this->input->post('g_previous_address'),
          'b_previous_tahsil' =>$this->input->post('b_previous_tahsil'),
          'g_earlier_tahsil' =>$this->input->post('g_earlier_tahsil'),
          'b_previous_dist' =>$this->input->post('b_previous_dist'),
          'g_previous_dist' =>$this->input->post('g_previous_dist'),
          'marrige_address' =>$this->input->post('marrige_address'),
          'wedding_place' =>$this->input->post('wedding_place'),
          'date_of_marrige' =>$this->input->post('date_of_marrige'),
          'c_birth_date' =>$this->input->post('c_birth_date'),
          'g_birth_date' =>$this->input->post('g_birth_date'),
          'c_age' =>$this->input->post('c_age'),
          'g_age' =>$this->input->post('g_age'),
      //'regno' =>$this->input->post('regid'),
      );
      }
        }
        else if($table_name == 'appointment'){
            $data=array(
                'autono'=>$this->input->post('ano'),
                'regid'=>$this->input->post('regid'),
                'g_mobile'=>$this->input->post('g_mobile'),
                'b_mobile'=>$this->input->post('b_mobile'),
                'a_date'=>$this->input->post('a_date'),
                'time'=>$this->input->post('time'),
                'message'=>$this->input->post('msg'),
            );
        }
        else if($table_name == 'marrige_receipt'){
          if($id==""){
          $data=array(
              'ref_id'=>$this->input->post('ref_id'),
              'receipt_no'=>$this->input->post('receipt_no'),
              'receipt_date'=>$this->input->post('receipt_date'),
              'collection_no'=>$this->input->post('collection_no'),
              'counter_no'=>$this->input->post('counter_no'),
              'receive_from'=>$this->input->post('receive_from'),
              'amt'=>$this->input->post('amt'),
              'amt_words'=>$this->input->post('amt_words'),
              'function'=>$this->input->post('functions'),
              'mode'=>$this->input->post('mode'),
              'amt2'=>$this->input->post('amt2'),
              'chq_no'=>$this->input->post('chq_no'),
              'chq_date'=>$this->input->post('chq_date'),
              'bank'=>$this->input->post('bank'),
              'bill_no'=>$this->input->post('bill_no'),
              'bill_date'=>$this->input->post('bill_date'),
              'details'=>$this->input->post('details'),
              'payble'=>$this->input->post('payble'),
              'receive_amt'=>$this->input->post('receive_amt'),
              'total'=>$this->input->post('total'),
              'receipt_year'=>$this->input->post('receipt_year'),
              'receipt_num'=>$this->input->post('receipt_num'),
          );
        }else{
          $data=array(
            'ref_id'=>$this->input->post('ref_id'),
            'receipt_no'=>$this->input->post('receipt_no'),
            'receipt_date'=>$this->input->post('receipt_date'),
            'collection_no'=>$this->input->post('collection_no'),
            'counter_no'=>$this->input->post('counter_no'),
            'receive_from'=>$this->input->post('receive_from'),
            'amt'=>$this->input->post('amt'),
            'amt_words'=>$this->input->post('amt_words'),
            'function'=>$this->input->post('functions'),
            'mode'=>$this->input->post('mode'),
            'amt2'=>$this->input->post('amt2'),
            'chq_no'=>$this->input->post('chq_no'),
            'chq_date'=>$this->input->post('chq_date'),
            'bank'=>$this->input->post('bank'),
            'bill_no'=>$this->input->post('bill_no'),
            'bill_date'=>$this->input->post('bill_date'),
            'details'=>$this->input->post('details'),
            'payble'=>$this->input->post('payble'),
            'receive_amt'=>$this->input->post('receive_amt'),
            'total'=>$this->input->post('total'),
        );
        }
      }
        else if($table_name == 'formd'){
            $data=array(
                'autono'=>$this->input->post('ano'),
                'w_date'=>$this->input->post('w_date'),
                'w_place'=>$this->input->post('w_place'),
                'laws'=>$this->input->post('laws'),
                'h_name'=>$this->input->post('h_name'),
                'h_religion'=>$this->input->post('h_religion'),
                'h_address'=>$this->input->post('h_address'),
                'h_business'=>$this->input->post('h_business'),
                'h_born'=>$this->input->post('h_born'),
                'h_mstate'=>$this->input->post('h_mstate'),
                'h_aname'=>$this->input->post('h_aname'),
                'h_areligion'=>$this->input->post('h_areligion'),
                'h_age'=>$this->input->post('h_age'),
                'w_name'=>$this->input->post('w_name'),
                'w_aname'=>$this->input->post('w_aname'),
                'w_age'=>$this->input->post('w_age'),
                'w_religion'=>$this->input->post('w_religion'),
                'w_address'=>$this->input->post('w_address'),
                'w_business'=>$this->input->post('w_business'),
                'w_areligion'=>$this->input->post('w_areligion'),
                'w_born'=>$this->input->post('w_born'),
                'w_mstate'=>$this->input->post('w_mstate'),
                'w1_name'=>$this->input->post('w1_name'),
                'w2_name'=>$this->input->post('w2_name'),
                'w3_name'=>$this->input->post('w3_name'),
                'w1_address'=>$this->input->post('w1_address'),
                'w2_address'=>$this->input->post('w2_address'),
                'w3_address'=>$this->input->post('w3_address'),
                'w1_business'=>$this->input->post('w1_business'),
                'w2_business'=>$this->input->post('w2_business'),
                'w3_business'=>$this->input->post('w3_business'),
                'w1_relation'=>$this->input->post('w1_relation'),
                'w2_relation'=>$this->input->post('w2_relation'),
                'w3_relation'=>$this->input->post('w3_relation'),
                'p_name'=>$this->input->post('p_name'),
                'p_address'=>$this->input->post('p_address'),
                'p_religion'=>$this->input->post('p_religion'),
                'p_age'=>$this->input->post('p_age'),
                'p_date'=>$this->input->post('p_date'),
                'h_photo'=>$this->input->post('h_photo'),
                'w_photo'=>$this->input->post('w_photo'),
                'w1_photo'=>$this->input->post('w1_photo'),
                'w2_photo'=>$this->input->post('w2_photo'),
                'w3_photo'=>$this->input->post('w3_photo'),
                'h_thumb'=>$this->input->post('h_thumb'),
                'w_thumb'=>$this->input->post('w_thumb'),
                'w1_thumb'=>$this->input->post('w1_thumb'),
                'w2_thumb'=>$this->input->post('w2_thumb'),
                'w3_thumb'=>$this->input->post('w3_thumb')
            );
        }
        if($id==""){
                 $data1=$this->m->insertdata($data,$table_name);
        }else
        {
            $data1=$this->m->updatedata($data,$table_name,$id); 
        }
        echo json_encode($data1);
    }
    public function add_chklist()
    { 
         $table_name= $this->input->post('table_name');
		 $id=$this->input->post('id');
         $data1="";
         $data="";
		if($table_name=="marrige_documents")
        {
           $data = array(
                    'ref_id' =>$this->input->post('ref_id'),
                    'ch_1' =>$this->input->post('ch_1'),
                    'ch_2' =>$this->input->post('ch_2'),
                    'ch_3_1' =>$this->input->post('ch_3_1'),
                    'ch_3_2' =>$this->input->post('ch_3_2'),
                    'ch_3_3' =>$this->input->post('ch_3_3'),
                    'ch_4_1' =>$this->input->post('ch_4_1'),
                    'ch_4_2' =>$this->input->post('ch_4_2'),
                    'ch_5' =>$this->input->post('ch_5'),
                    'ch_6_1' =>$this->input->post('ch_6_1'),
                    'ch_6_2' =>$this->input->post('ch_6_2'),
                    'ch_6_3' =>$this->input->post('ch_6_3'),
                    'ch_6_4' =>$this->input->post('ch_6_4'),
                    'ch_7_1' =>$this->input->post('ch_7_1'),
                    'ch_7_2' =>$this->input->post('ch_7_2'),
                    'ch_8_1' =>$this->input->post('ch_8_1'),
                    'ch_8_2' =>$this->input->post('ch_8_2'),
                    'ch_9' =>$this->input->post('ch_9'),
                    'ch_10' =>$this->input->post('ch_10'),
                    'ch_11' =>$this->input->post('ch_11'),
                    'ch_12_1' =>$this->input->post('ch_12_1'),
                    'ch_12_2' =>$this->input->post('ch_12_2'),
                    'ch_12_3' =>$this->input->post('ch_12_3'),
                    'ch_12_4' =>$this->input->post('ch_12_4'),
                    'f_1' =>$this->input->post('f_1'),
                    'f_2' =>$this->input->post('f_2'),
                    'f_3_1' =>$this->input->post('f_3_1'),
                    'f_3_2' =>$this->input->post('f_3_2'),
                    'f_3_3' =>$this->input->post('f_3_3'),
                    'f_4_1' =>$this->input->post('f_4_1'),
                    'f_4_2' =>$this->input->post('f_4_2'),
                    'f_5' =>$this->input->post('f_5'),
                    'f_6_1' =>$this->input->post('f_6_1'),
                    'f_6_2' =>$this->input->post('f_6_2'),
                    'f_6_3' =>$this->input->post('f_6_3'),
                    'f_6_4' =>$this->input->post('f_6_4'),
                    'f_7_1' =>$this->input->post('f_7_1'),
                    'f_7_2' =>$this->input->post('f_7_2'),
                    'f_8_1' =>$this->input->post('f_8_1'),
                    'f_8_2' =>$this->input->post('f_8_2'),
                    'f_9' =>$this->input->post('f_9'),
                    'f_10' =>$this->input->post('f_10'),
                    'f_11' =>$this->input->post('f_11'),
                    'f_12_1' =>$this->input->post('f_12_1'),
                    'f_12_2' =>$this->input->post('f_12_2'),
                    'f_12_3' =>$this->input->post('f_12_3'),
                    'f_12_4' =>$this->input->post('f_12_4'),
            );
        }
        if($id==""){
                 $data1=$this->m->insertdata($data,$table_name);
        }else
        {
            $data1=$this->m->updatedata($data,$table_name,$id); 
        }
        echo json_encode($data1);
    }
    public function add_upload()
    { 
         $table_name= $this->input->post('table_name');
		 $id=$this->input->post('id');
         $data1="";
         $data="";
		if($table_name=="marrige_upload")
        {
           $data = array(
                    'ref_id' =>$this->input->post('ref_id'),
                    'f_1' =>$this->input->post('f_1'),
                    'f_2' =>$this->input->post('f_2'),
                    'f_3' =>$this->input->post('f_3'),
                    'f_4' =>$this->input->post('f_4'),
                    'f_5' =>$this->input->post('f_5'),
                    't_1' =>$this->input->post('t_1'),
                    't_2' =>$this->input->post('t_2'),
                    't_3' =>$this->input->post('t_3'),
                    't_4' =>$this->input->post('t_4'),
                    't_5' =>$this->input->post('t_5'),
            );
        }
        if($id==""){
                 $data1=$this->m->insertdata($data,$table_name);
        }else
        {
            $data1=$this->m->updatedata($data,$table_name,$id); 
        }
        echo json_encode($data1);
    }
    public function showdatawhere()
    {   
       $table_name	= $this->input->post('table_name');
       $id=$this->input->post('id');  
        $data1=$this->m->showdatawhere($table_name,$id);
        $this->session->set_userdata('attach_id',  $id);
         echo json_encode($data1);	
    }
    public function showdetailswhere()
    {   
       $table_name	= $this->input->post('table_name');
       $id=$this->input->post('id');  
        $data1=$this->m->showdetailswhere($table_name,$id);
         echo json_encode($data1);	
    }
    public function showreceiptnumwhere()
    {   
      // $table_name	= $this->input->post('table_name');
       $id=$this->input->post('id');  
        $data1=$this->m->getreceiptnumwhere($id);
         echo json_encode($data1);	
    }
    public function showphotoswhere()
    {   
       $table_name	= $this->input->post('table_name');
       $id=$this->input->post('id');  
        $data1=$this->m->showphotoswhere($table_name,$id);
         echo json_encode($data1);	
    }
  public function showdata()
    {   
       $table_name	= $this->input->post('table_name');            
        $data1=$this->m->showalldata($table_name);
        $this->session->unset_userdata('merrige_id'); 
        $this->session->unset_userdata('upload_id'); 
          $this->session->unset_userdata('attach_id'); 
         echo json_encode($data1);	
    }
    public function download($fileName = NULL) {
        if ($fileName) {
            $id= $this->session->userdata('merrige_id');
         //  $fileName= "Front_Page_Roman_Index";
        // $file = realpath ( "assets/img/vedorprofile" ) . "\\" . $fileName;
        $file = realpath ( "assets/images/marrige_doc/".$id."/". $fileName );
        // check file exists
        if (file_exists ( $file )) {
        // get file content
        $data = file_get_contents ( $file );
        //force download
        force_download( $fileName, $data );
        } else {
        // Redirect to base url
        redirect ( base_url () );
        }
        }
        }
        public function download2($fileName = NULL) {
          if ($fileName) {
              $id= $this->session->userdata('upload_id');
           //  $fileName= "Front_Page_Roman_Index";
          // $file = realpath ( "assets/img/vedorprofile" ) . "\\" . $fileName;
          $file = realpath ( "assets/images/marrige_upload/".$id."/". $fileName );
          // check file exists
          if (file_exists ( $file )) {
          // get file content
          $data = file_get_contents ( $file );
          //force download
          force_download( $fileName, $data );
          } else {
          // Redirect to base url
          redirect ( base_url () );
          }
          }
          }
    public function showdatawhere_doc()
    {   
      // $table_name	= $this->input->post('table_name');
       $id=$this->input->post('id');  
        $data1=$this->m->showdatawhere_doc($id);
        $this->session->set_userdata('merrige_id',  $id);
         echo json_encode($data1);	
    }
    public function showdatawhere_upload()
    {   
      // $table_name	= $this->input->post('table_name');
       $id=$this->input->post('id');  
        $data1=$this->m->showdatawhere_upload($id);
        $this->session->set_userdata('upload_id',  $id);
         echo json_encode($data1);	
    }
    public function deletedata()
    { 
        $table_name	= $this->input->post('table_name');
        $id=$this->input->post('id');
        $data1=$this->m->delete_data($table_name,$id);
        echo json_encode($data1);
    }
    public function doc_image_upload1()
    {
         $this->load->helper("file");	
         $this->load->helper(array('form', 'url'));
         $this->load->helper('directory');
         $this->load->library("upload");
       //  $id=$this->input->post('id');
       $id= $this->session->userdata('merrige_id');
         if (!file_exists('./assets/images/marrige_doc/'.$id)) {
         //  mkdir('./assets/images/birth_doc/directory2', 0777, true);
        mkdir('./assets/images/marrige_doc/' . $id, 0777, TRUE);
        }
         if ($_FILES['attachment1']['size'] > 0) {
              $this->upload->initialize(array( 
                "upload_path" => './assets/images/marrige_doc/'.$id.'/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
             ));
            if (!$this->upload->do_upload('attachment1')) {
              $error = array('error' => $this->upload->display_errors());
              echo json_encode($error);
         }
             $data = $this->upload->data();
              $path = $data['file_name'];
              echo json_encode($path);	
         }else{
           echo "no file"; 
       }
    }
    public function doc_image_upload2()
    {
         $this->load->helper("file");	
         $this->load->helper(array('form', 'url'));
         $this->load->helper('directory');
         $this->load->library("upload");
       //  $id=$this->input->post('id');
       $id= $this->session->userdata('merrige_id');
         if (!file_exists('./assets/images/marrige_doc/'.$id)) {
         //  mkdir('./assets/images/birth_doc/directory2', 0777, true);
        mkdir('./assets/images/marrige_doc/' . $id, 0777, TRUE);
        }
         if ($_FILES['attachment2']['size'] > 0) {
              $this->upload->initialize(array( 
                "upload_path" => './assets/images/marrige_doc/'.$id.'/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
             ));
            if (!$this->upload->do_upload('attachment2')) {
              $error = array('error' => $this->upload->display_errors());
              echo json_encode($error);
         }
             $data = $this->upload->data();
              $path = $data['file_name'];
              echo json_encode($path);	
         }else{
           echo "no file"; 
       }
    }
    public function doc_image_upload3_1()
    {
         $this->load->helper("file");	
         $this->load->helper(array('form', 'url'));
         $this->load->helper('directory');
         $this->load->library("upload");
       //  $id=$this->input->post('id');
       $id= $this->session->userdata('merrige_id');
         if (!file_exists('./assets/images/marrige_doc/'.$id)) {
         //  mkdir('./assets/images/birth_doc/directory2', 0777, true);
        mkdir('./assets/images/marrige_doc/' . $id, 0777, TRUE);
        }
         if ($_FILES['attachment3_1']['size'] > 0) {
              $this->upload->initialize(array( 
                "upload_path" => './assets/images/marrige_doc/'.$id.'/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
             ));
            if (!$this->upload->do_upload('attachment3_1')) {
              $error = array('error' => $this->upload->display_errors());
              echo json_encode($error);
         }
             $data = $this->upload->data();
              $path = $data['file_name'];
              echo json_encode($path);	
         }else{
           echo "no file"; 
       }
    }
    public function doc_image_upload3_2()
    {
         $this->load->helper("file");	
         $this->load->helper(array('form', 'url'));
         $this->load->helper('directory');
         $this->load->library("upload");
       //  $id=$this->input->post('id');
       $id= $this->session->userdata('merrige_id');
         if (!file_exists('./assets/images/marrige_doc/'.$id)) {
         //  mkdir('./assets/images/birth_doc/directory2', 0777, true);
        mkdir('./assets/images/marrige_doc/' . $id, 0777, TRUE);
        }
         if ($_FILES['attachment3_2']['size'] > 0) {
              $this->upload->initialize(array( 
                "upload_path" => './assets/images/marrige_doc/'.$id.'/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
             ));
            if (!$this->upload->do_upload('attachment3_2')) {
              $error = array('error' => $this->upload->display_errors());
              echo json_encode($error);
         }
             $data = $this->upload->data();
              $path = $data['file_name'];
              echo json_encode($path);	
         }else{
           echo "no file"; 
       }
    }
    public function doc_image_upload3_3()
    {
         $this->load->helper("file");	
         $this->load->helper(array('form', 'url'));
         $this->load->helper('directory');
         $this->load->library("upload");
       //  $id=$this->input->post('id');
       $id= $this->session->userdata('merrige_id');
         if (!file_exists('./assets/images/marrige_doc/'.$id)) {
         //  mkdir('./assets/images/birth_doc/directory2', 0777, true);
        mkdir('./assets/images/marrige_doc/' . $id, 0777, TRUE);
        }
         if ($_FILES['attachment3_3']['size'] > 0) {
              $this->upload->initialize(array( 
                "upload_path" => './assets/images/marrige_doc/'.$id.'/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
             ));
            if (!$this->upload->do_upload('attachment3_3')) {
              $error = array('error' => $this->upload->display_errors());
              echo json_encode($error);
         }
             $data = $this->upload->data();
              $path = $data['file_name'];
              echo json_encode($path);	
         }else{
           echo "no file"; 
       }
    }
    public function doc_image_upload4_1()
    {
         $this->load->helper("file");	
         $this->load->helper(array('form', 'url'));
         $this->load->helper('directory');
         $this->load->library("upload");
       //  $id=$this->input->post('id');
       $id= $this->session->userdata('merrige_id');
         if (!file_exists('./assets/images/marrige_doc/'.$id)) {
         //  mkdir('./assets/images/birth_doc/directory2', 0777, true);
        mkdir('./assets/images/marrige_doc/' . $id, 0777, TRUE);
        }
         if ($_FILES['attachment4_1']['size'] > 0) {
              $this->upload->initialize(array( 
                "upload_path" => './assets/images/marrige_doc/'.$id.'/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
             ));
            if (!$this->upload->do_upload('attachment4_1')) {
              $error = array('error' => $this->upload->display_errors());
              echo json_encode($error);
         }
             $data = $this->upload->data();
              $path = $data['file_name'];
              echo json_encode($path);	
         }else{
           echo "no file"; 
       }
    }
    public function doc_image_upload4_2()
    {
         $this->load->helper("file");	
         $this->load->helper(array('form', 'url'));
         $this->load->helper('directory');
         $this->load->library("upload");
       //  $id=$this->input->post('id');
       $id= $this->session->userdata('merrige_id');
         if (!file_exists('./assets/images/marrige_doc/'.$id)) {
         //  mkdir('./assets/images/birth_doc/directory2', 0777, true);
        mkdir('./assets/images/marrige_doc/' . $id, 0777, TRUE);
        }
         if ($_FILES['attachment4_2']['size'] > 0) {
              $this->upload->initialize(array( 
                "upload_path" => './assets/images/marrige_doc/'.$id.'/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
             ));
            if (!$this->upload->do_upload('attachment4_2')) {
              $error = array('error' => $this->upload->display_errors());
              echo json_encode($error);
         }
             $data = $this->upload->data();
              $path = $data['file_name'];
              echo json_encode($path);	
         }else{
           echo "no file"; 
       }
    }
    public function doc_image_upload5()
    {
         $this->load->helper("file");	
         $this->load->helper(array('form', 'url'));
         $this->load->helper('directory');
         $this->load->library("upload");
       //  $id=$this->input->post('id');
       $id= $this->session->userdata('merrige_id');
         if (!file_exists('./assets/images/marrige_doc/'.$id)) {
         //  mkdir('./assets/images/birth_doc/directory2', 0777, true);
        mkdir('./assets/images/marrige_doc/' . $id, 0777, TRUE);
        }
         if ($_FILES['attachment5']['size'] > 0) {
              $this->upload->initialize(array( 
                "upload_path" => './assets/images/marrige_doc/'.$id.'/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
             ));
            if (!$this->upload->do_upload('attachment5')) {
              $error = array('error' => $this->upload->display_errors());
              echo json_encode($error);
         }
             $data = $this->upload->data();
              $path = $data['file_name'];
              echo json_encode($path);	
         }else{
           echo "no file"; 
       }
    }
    public function doc_image_upload6_1()
    {
         $this->load->helper("file");	
         $this->load->helper(array('form', 'url'));
         $this->load->helper('directory');
         $this->load->library("upload");
       //  $id=$this->input->post('id');
       $id= $this->session->userdata('merrige_id');
         if (!file_exists('./assets/images/marrige_doc/'.$id)) {
         //  mkdir('./assets/images/birth_doc/directory2', 0777, true);
        mkdir('./assets/images/marrige_doc/' . $id, 0777, TRUE);
        }
         if ($_FILES['attachment6_1']['size'] > 0) {
              $this->upload->initialize(array( 
                "upload_path" => './assets/images/marrige_doc/'.$id.'/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
             ));
            if (!$this->upload->do_upload('attachment6_1')) {
              $error = array('error' => $this->upload->display_errors());
              echo json_encode($error);
         }
             $data = $this->upload->data();
              $path = $data['file_name'];
              echo json_encode($path);	
         }else{
           echo "no file"; 
       }
    }
    public function doc_image_upload6_2()
    {
         $this->load->helper("file");	
         $this->load->helper(array('form', 'url'));
         $this->load->helper('directory');
         $this->load->library("upload");
       //  $id=$this->input->post('id');
       $id= $this->session->userdata('merrige_id');
         if (!file_exists('./assets/images/marrige_doc/'.$id)) {
         //  mkdir('./assets/images/birth_doc/directory2', 0777, true);
        mkdir('./assets/images/marrige_doc/' . $id, 0777, TRUE);
        }
         if ($_FILES['attachment6_2']['size'] > 0) {
              $this->upload->initialize(array( 
                "upload_path" => './assets/images/marrige_doc/'.$id.'/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
             ));
            if (!$this->upload->do_upload('attachment6_2')) {
              $error = array('error' => $this->upload->display_errors());
              echo json_encode($error);
         }
             $data = $this->upload->data();
              $path = $data['file_name'];
              echo json_encode($path);	
         }else{
           echo "no file"; 
       }
    }
    public function doc_image_upload6_3()
    {
         $this->load->helper("file");	
         $this->load->helper(array('form', 'url'));
         $this->load->helper('directory');
         $this->load->library("upload");
       //  $id=$this->input->post('id');
       $id= $this->session->userdata('merrige_id');
         if (!file_exists('./assets/images/marrige_doc/'.$id)) {
         //  mkdir('./assets/images/birth_doc/directory2', 0777, true);
        mkdir('./assets/images/marrige_doc/' . $id, 0777, TRUE);
        }
         if ($_FILES['attachment6_3']['size'] > 0) {
              $this->upload->initialize(array( 
                "upload_path" => './assets/images/marrige_doc/'.$id.'/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
             ));
            if (!$this->upload->do_upload('attachment6_3')) {
              $error = array('error' => $this->upload->display_errors());
              echo json_encode($error);
         }
             $data = $this->upload->data();
              $path = $data['file_name'];
              echo json_encode($path);	
         }else{
           echo "no file"; 
       }
    }
    public function doc_image_upload6_4()
    {
         $this->load->helper("file");	
         $this->load->helper(array('form', 'url'));
         $this->load->helper('directory');
         $this->load->library("upload");
       //  $id=$this->input->post('id');
       $id= $this->session->userdata('merrige_id');
         if (!file_exists('./assets/images/marrige_doc/'.$id)) {
         //  mkdir('./assets/images/birth_doc/directory2', 0777, true);
        mkdir('./assets/images/marrige_doc/' . $id, 0777, TRUE);
        }
         if ($_FILES['attachment6_4']['size'] > 0) {
              $this->upload->initialize(array( 
                "upload_path" => './assets/images/marrige_doc/'.$id.'/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
             ));
            if (!$this->upload->do_upload('attachment6_4')) {
              $error = array('error' => $this->upload->display_errors());
              echo json_encode($error);
         }
             $data = $this->upload->data();
              $path = $data['file_name'];
              echo json_encode($path);	
         }else{
           echo "no file"; 
       }
    }
    public function doc_image_upload7_1()
    {
         $this->load->helper("file");	
         $this->load->helper(array('form', 'url'));
         $this->load->helper('directory');
         $this->load->library("upload");
       //  $id=$this->input->post('id');
       $id= $this->session->userdata('merrige_id');
         if (!file_exists('./assets/images/marrige_doc/'.$id)) {
         //  mkdir('./assets/images/birth_doc/directory2', 0777, true);
        mkdir('./assets/images/marrige_doc/' . $id, 0777, TRUE);
        }
         if ($_FILES['attachment7_1']['size'] > 0) {
              $this->upload->initialize(array( 
                "upload_path" => './assets/images/marrige_doc/'.$id.'/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
             ));
            if (!$this->upload->do_upload('attachment7_1')) {
              $error = array('error' => $this->upload->display_errors());
              echo json_encode($error);
         }
             $data = $this->upload->data();
              $path = $data['file_name'];
              echo json_encode($path);	
         }else{
           echo "no file"; 
       }
    }
    public function doc_image_upload7_2()
    {
         $this->load->helper("file");	
         $this->load->helper(array('form', 'url'));
         $this->load->helper('directory');
         $this->load->library("upload");
       //  $id=$this->input->post('id');
       $id= $this->session->userdata('merrige_id');
         if (!file_exists('./assets/images/marrige_doc/'.$id)) {
         //  mkdir('./assets/images/birth_doc/directory2', 0777, true);
        mkdir('./assets/images/marrige_doc/' . $id, 0777, TRUE);
        }
         if ($_FILES['attachment7_2']['size'] > 0) {
              $this->upload->initialize(array( 
                "upload_path" => './assets/images/marrige_doc/'.$id.'/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
             ));
            if (!$this->upload->do_upload('attachment7_2')) {
              $error = array('error' => $this->upload->display_errors());
              echo json_encode($error);
         }
             $data = $this->upload->data();
              $path = $data['file_name'];
              echo json_encode($path);	
         }else{
           echo "no file"; 
       }
    }
    public function doc_image_upload8_1()
    {
         $this->load->helper("file");	
         $this->load->helper(array('form', 'url'));
         $this->load->helper('directory');
         $this->load->library("upload");
       //  $id=$this->input->post('id');
       $id= $this->session->userdata('merrige_id');
         if (!file_exists('./assets/images/marrige_doc/'.$id)) {
         //  mkdir('./assets/images/birth_doc/directory2', 0777, true);
        mkdir('./assets/images/marrige_doc/' . $id, 0777, TRUE);
        }
         if ($_FILES['attachment8_1']['size'] > 0) {
              $this->upload->initialize(array( 
                "upload_path" => './assets/images/marrige_doc/'.$id.'/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
             ));
            if (!$this->upload->do_upload('attachment8_1')) {
              $error = array('error' => $this->upload->display_errors());
              echo json_encode($error);
         }
             $data = $this->upload->data();
              $path = $data['file_name'];
              echo json_encode($path);	
         }else{
           echo "no file"; 
       }
    }
    public function doc_image_upload8_2()
    {
         $this->load->helper("file");	
         $this->load->helper(array('form', 'url'));
         $this->load->helper('directory');
         $this->load->library("upload");
       //  $id=$this->input->post('id');
       $id= $this->session->userdata('merrige_id');
         if (!file_exists('./assets/images/marrige_doc/'.$id)) {
         //  mkdir('./assets/images/birth_doc/directory2', 0777, true);
        mkdir('./assets/images/marrige_doc/' . $id, 0777, TRUE);
        }
         if ($_FILES['attachment8_2']['size'] > 0) {
              $this->upload->initialize(array( 
                "upload_path" => './assets/images/marrige_doc/'.$id.'/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
             ));
            if (!$this->upload->do_upload('attachment8_2')) {
              $error = array('error' => $this->upload->display_errors());
              echo json_encode($error);
         }
             $data = $this->upload->data();
              $path = $data['file_name'];
              echo json_encode($path);	
         }else{
           echo "no file"; 
       }
    }
    public function doc_image_upload9()
    {
         $this->load->helper("file");	
         $this->load->helper(array('form', 'url'));
         $this->load->helper('directory');
         $this->load->library("upload");
       //  $id=$this->input->post('id');
       $id= $this->session->userdata('merrige_id');
         if (!file_exists('./assets/images/marrige_doc/'.$id)) {
         //  mkdir('./assets/images/birth_doc/directory2', 0777, true);
        mkdir('./assets/images/marrige_doc/' . $id, 0777, TRUE);
        }
         if ($_FILES['attachment9']['size'] > 0) {
              $this->upload->initialize(array( 
                "upload_path" => './assets/images/marrige_doc/'.$id.'/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
             ));
            if (!$this->upload->do_upload('attachment9')) {
              $error = array('error' => $this->upload->display_errors());
              echo json_encode($error);
         }
             $data = $this->upload->data();
              $path = $data['file_name'];
              echo json_encode($path);	
         }else{
           echo "no file"; 
       }
    }
    public function doc_image_upload10()
    {
         $this->load->helper("file");	
         $this->load->helper(array('form', 'url'));
         $this->load->helper('directory');
         $this->load->library("upload");
       //  $id=$this->input->post('id');
       $id= $this->session->userdata('merrige_id');
         if (!file_exists('./assets/images/marrige_doc/'.$id)) {
         //  mkdir('./assets/images/birth_doc/directory2', 0777, true);
        mkdir('./assets/images/marrige_doc/' . $id, 0777, TRUE);
        }
         if ($_FILES['attachment10']['size'] > 0) {
              $this->upload->initialize(array( 
                "upload_path" => './assets/images/marrige_doc/'.$id.'/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
             ));
            if (!$this->upload->do_upload('attachment10')) {
              $error = array('error' => $this->upload->display_errors());
              echo json_encode($error);
         }
             $data = $this->upload->data();
              $path = $data['file_name'];
              echo json_encode($path);	
         }else{
           echo "no file"; 
       }
    }
    public function doc_image_upload11()
    {
         $this->load->helper("file");	
         $this->load->helper(array('form', 'url'));
         $this->load->helper('directory');
         $this->load->library("upload");
       //  $id=$this->input->post('id');
       $id= $this->session->userdata('merrige_id');
         if (!file_exists('./assets/images/marrige_doc/'.$id)) {
         //  mkdir('./assets/images/birth_doc/directory2', 0777, true);
        mkdir('./assets/images/marrige_doc/' . $id, 0777, TRUE);
        }
         if ($_FILES['attachment11']['size'] > 0) {
              $this->upload->initialize(array( 
                "upload_path" => './assets/images/marrige_doc/'.$id.'/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
             ));
            if (!$this->upload->do_upload('attachment11')) {
              $error = array('error' => $this->upload->display_errors());
              echo json_encode($error);
         }
             $data = $this->upload->data();
              $path = $data['file_name'];
              echo json_encode($path);	
         }else{
           echo "no file"; 
       }
    }
    public function doc_image_upload12_1()
    {
         $this->load->helper("file");	
         $this->load->helper(array('form', 'url'));
         $this->load->helper('directory');
         $this->load->library("upload");
       //  $id=$this->input->post('id');
       $id= $this->session->userdata('merrige_id');
         if (!file_exists('./assets/images/marrige_doc/'.$id)) {
         //  mkdir('./assets/images/birth_doc/directory2', 0777, true);
        mkdir('./assets/images/marrige_doc/' . $id, 0777, TRUE);
        }
         if ($_FILES['attachment12_1']['size'] > 0) {
              $this->upload->initialize(array( 
                "upload_path" => './assets/images/marrige_doc/'.$id.'/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
             ));
            if (!$this->upload->do_upload('attachment12_1')) {
              $error = array('error' => $this->upload->display_errors());
              echo json_encode($error);
         }
             $data = $this->upload->data();
              $path = $data['file_name'];
              echo json_encode($path);	
         }else{
           echo "no file"; 
       }
    }
    public function doc_image_upload12_2()
    {
         $this->load->helper("file");	
         $this->load->helper(array('form', 'url'));
         $this->load->helper('directory');
         $this->load->library("upload");
       //  $id=$this->input->post('id');
       $id= $this->session->userdata('merrige_id');
         if (!file_exists('./assets/images/marrige_doc/'.$id)) {
         //  mkdir('./assets/images/birth_doc/directory2', 0777, true);
        mkdir('./assets/images/marrige_doc/' . $id, 0777, TRUE);
        }
         if ($_FILES['attachment12_2']['size'] > 0) {
              $this->upload->initialize(array( 
                "upload_path" => './assets/images/marrige_doc/'.$id.'/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
             ));
            if (!$this->upload->do_upload('attachment12_2')) {
              $error = array('error' => $this->upload->display_errors());
              echo json_encode($error);
         }
             $data = $this->upload->data();
              $path = $data['file_name'];
              echo json_encode($path);	
         }else{
           echo "no file"; 
       }
    }
    public function doc_image_upload12_3()
    {
         $this->load->helper("file");	
         $this->load->helper(array('form', 'url'));
         $this->load->helper('directory');
         $this->load->library("upload");
       //  $id=$this->input->post('id');
       $id= $this->session->userdata('merrige_id');
         if (!file_exists('./assets/images/marrige_doc/'.$id)) {
         //  mkdir('./assets/images/birth_doc/directory2', 0777, true);
        mkdir('./assets/images/marrige_doc/' . $id, 0777, TRUE);
        }
         if ($_FILES['attachment12_3']['size'] > 0) {
              $this->upload->initialize(array( 
                "upload_path" => './assets/images/marrige_doc/'.$id.'/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
             ));
            if (!$this->upload->do_upload('attachment12_3')) {
              $error = array('error' => $this->upload->display_errors());
              echo json_encode($error);
         }
             $data = $this->upload->data();
              $path = $data['file_name'];
              echo json_encode($path);	
         }else{
           echo "no file"; 
       }
    }
    public function doc_image_upload12_4()
    {
         $this->load->helper("file");	
         $this->load->helper(array('form', 'url'));
         $this->load->helper('directory');
         $this->load->library("upload");
       //  $id=$this->input->post('id');
       $id= $this->session->userdata('merrige_id');
         if (!file_exists('./assets/images/marrige_doc/'.$id)) {
         //  mkdir('./assets/images/birth_doc/directory2', 0777, true);
        mkdir('./assets/images/marrige_doc/' . $id, 0777, TRUE);
        }
         if ($_FILES['attachment12_4']['size'] > 0) {
              $this->upload->initialize(array( 
                "upload_path" => './assets/images/marrige_doc/'.$id.'/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
             ));
            if (!$this->upload->do_upload('attachment12_4')) {
              $error = array('error' => $this->upload->display_errors());
              echo json_encode($error);
         }
             $data = $this->upload->data();
              $path = $data['file_name'];
              echo json_encode($path);	
         }else{
           echo "no file"; 
       }
    }
    public function doc_image_upload9_1()
    {
         $this->load->helper("file");	
         $this->load->helper(array('form', 'url'));
         $this->load->helper('directory');
         $this->load->library("upload");
       //  $id=$this->input->post('id');
       $id= $this->session->userdata('upload_id');
         if (!file_exists('./assets/images/marrige_upload/'.$id)) {
         //  mkdir('./assets/images/birth_doc/directory2', 0777, true);
        mkdir('./assets/images/marrige_upload/' . $id, 0777, TRUE);
        }
         if ($_FILES['attachment9_1']['size'] > 0) {
              $this->upload->initialize(array( 
                "upload_path" => './assets/images/marrige_upload/'.$id.'/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
             ));
            if (!$this->upload->do_upload('attachment9_1')) {
              $error = array('error' => $this->upload->display_errors());
              echo json_encode($error);
         }
             $data = $this->upload->data();
              $path = $data['file_name'];
              echo json_encode($path);	
         }else{
           echo "no file"; 
       }
    }
    public function doc_image_upload9_2()
    {
         $this->load->helper("file");	
         $this->load->helper(array('form', 'url'));
         $this->load->helper('directory');
         $this->load->library("upload");
       //  $id=$this->input->post('id');
       $id= $this->session->userdata('upload_id');
         if (!file_exists('./assets/images/marrige_upload/'.$id)) {
         //  mkdir('./assets/images/birth_doc/directory2', 0777, true);
        mkdir('./assets/images/marrige_upload/' . $id, 0777, TRUE);
        }
         if ($_FILES['attachment9_2']['size'] > 0) {
              $this->upload->initialize(array( 
                "upload_path" => './assets/images/marrige_upload/'.$id.'/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
             ));
            if (!$this->upload->do_upload('attachment9_2')) {
              $error = array('error' => $this->upload->display_errors());
              echo json_encode($error);
         }
             $data = $this->upload->data();
              $path = $data['file_name'];
              echo json_encode($path);	
         }else{
           echo "no file"; 
       }
    }
    public function doc_image_upload9_3()
    {
         $this->load->helper("file");	
         $this->load->helper(array('form', 'url'));
         $this->load->helper('directory');
         $this->load->library("upload");
       //  $id=$this->input->post('id');
       $id= $this->session->userdata('upload_id');
         if (!file_exists('./assets/images/marrige_upload/'.$id)) {
         //  mkdir('./assets/images/birth_doc/directory2', 0777, true);
        mkdir('./assets/images/marrige_upload/' . $id, 0777, TRUE);
        }
         if ($_FILES['attachment9_3']['size'] > 0) {
              $this->upload->initialize(array( 
                "upload_path" => './assets/images/marrige_upload/'.$id.'/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
             ));
            if (!$this->upload->do_upload('attachment9_3')) {
              $error = array('error' => $this->upload->display_errors());
              echo json_encode($error);
         }
             $data = $this->upload->data();
              $path = $data['file_name'];
              echo json_encode($path);	
         }else{
           echo "no file"; 
       }
    }
    public function doc_image_upload9_4()
    {
         $this->load->helper("file");	
         $this->load->helper(array('form', 'url'));
         $this->load->helper('directory');
         $this->load->library("upload");
       //  $id=$this->input->post('id');
       $id= $this->session->userdata('upload_id');
         if (!file_exists('./assets/images/marrige_upload/'.$id)) {
         //  mkdir('./assets/images/birth_doc/directory2', 0777, true);
        mkdir('./assets/images/marrige_upload/' . $id, 0777, TRUE);
        }
         if ($_FILES['attachment9_4']['size'] > 0) {
              $this->upload->initialize(array( 
                "upload_path" => './assets/images/marrige_upload/'.$id.'/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
             ));
            if (!$this->upload->do_upload('attachment9_4')) {
              $error = array('error' => $this->upload->display_errors());
              echo json_encode($error);
         }
             $data = $this->upload->data();
              $path = $data['file_name'];
              echo json_encode($path);	
         }else{
           echo "no file"; 
       }
    }
    public function doc_image_upload9_5()
    {
         $this->load->helper("file");	
         $this->load->helper(array('form', 'url'));
         $this->load->helper('directory');
         $this->load->library("upload");
       //  $id=$this->input->post('id');
       $id= $this->session->userdata('upload_id');
         if (!file_exists('./assets/images/marrige_upload/'.$id)) {
         //  mkdir('./assets/images/birth_doc/directory2', 0777, true);
        mkdir('./assets/images/marrige_upload/' . $id, 0777, TRUE);
        }
         if ($_FILES['attachment9_5']['size'] > 0) {
              $this->upload->initialize(array( 
                "upload_path" => './assets/images/marrige_upload/'.$id.'/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
             ));
            if (!$this->upload->do_upload('attachment9_5')) {
              $error = array('error' => $this->upload->display_errors());
              echo json_encode($error);
         }
             $data = $this->upload->data();
              $path = $data['file_name'];
              echo json_encode($path);	
         }else{
           echo "no file"; 
       }
    }
    //--------------------------------------------second form start--------------------------------------------------------------
    public function doc_image_upload51()
    {
         $this->load->helper("file");	
         $this->load->helper(array('form', 'url'));
         $this->load->helper('directory');
         $this->load->library("upload");
       //  $id=$this->input->post('id');
       $id= $this->session->userdata('attach_id');
         if (!file_exists('./assets/images/marrige_attach/husband_photo/'.$id)) {
         //  mkdir('./assets/images/birth_doc/directory2', 0777, true);
        mkdir('./assets/images/marrige_attach/husband_photo/' . $id, 0777, TRUE);
        }
         if ($_FILES['uploadFile51']['size'] > 0) {
              $this->upload->initialize(array( 
                "upload_path" => './assets/images/marrige_attach/husband_photo/'.$id.'/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
             ));
            if (!$this->upload->do_upload('uploadFile51')) {
              $error = array('error' => $this->upload->display_errors());
              echo json_encode($error);
         }
             $data = $this->upload->data();
              $path = $data['file_name'];
              echo json_encode($path);	
         }else{
           echo "no file"; 
       }
    }
    public function doc_image_upload52()
    {
         $this->load->helper("file");	
         $this->load->helper(array('form', 'url'));
         $this->load->helper('directory');
         $this->load->library("upload");
       //  $id=$this->input->post('id');
       $id= $this->session->userdata('attach_id');
         if (!file_exists('./assets/images/marrige_attach/husband_thumb/'.$id)) {
         //  mkdir('./assets/images/birth_doc/directory2', 0777, true);
        mkdir('./assets/images/marrige_attach/husband_thumb/' . $id, 0777, TRUE);
        }
         if ($_FILES['uploadFile52']['size'] > 0) {
              $this->upload->initialize(array( 
                "upload_path" => './assets/images/marrige_attach/husband_thumb/'.$id.'/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
             ));
            if (!$this->upload->do_upload('uploadFile52')) {
              $error = array('error' => $this->upload->display_errors());
              echo json_encode($error);
         }
             $data = $this->upload->data();
              $path = $data['file_name'];
              echo json_encode($path);	
         }else{
           echo "no file"; 
       }
    }
    public function doc_image_upload53()
    {
         $this->load->helper("file");	
         $this->load->helper(array('form', 'url'));
         $this->load->helper('directory');
         $this->load->library("upload");
       //  $id=$this->input->post('id');
       $id= $this->session->userdata('attach_id');
         if (!file_exists('./assets/images/marrige_attach/wife_photo/'.$id)) {
         //  mkdir('./assets/images/birth_doc/directory2', 0777, true);
        mkdir('./assets/images/marrige_attach/wife_photo/' . $id, 0777, TRUE);
        }
         if ($_FILES['uploadFile53']['size'] > 0) {
              $this->upload->initialize(array( 
                "upload_path" => './assets/images/marrige_attach/wife_photo/'.$id.'/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
             ));
            if (!$this->upload->do_upload('uploadFile53')) {
              $error = array('error' => $this->upload->display_errors());
              echo json_encode($error);
         }
             $data = $this->upload->data();
              $path = $data['file_name'];
              echo json_encode($path);	
         }else{
           echo "no file"; 
       }
    }
    public function doc_image_upload54()
    {
         $this->load->helper("file");	
         $this->load->helper(array('form', 'url'));
         $this->load->helper('directory');
         $this->load->library("upload");
       //  $id=$this->input->post('id');
       $id= $this->session->userdata('attach_id');
         if (!file_exists('./assets/images/marrige_attach/wife_thumb/'.$id)) {
         //  mkdir('./assets/images/birth_doc/directory2', 0777, true);
        mkdir('./assets/images/marrige_attach/wife_thumb/' . $id, 0777, TRUE);
        }
         if ($_FILES['uploadFile54']['size'] > 0) {
              $this->upload->initialize(array( 
                "upload_path" => './assets/images/marrige_attach/wife_thumb/'.$id.'/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
             ));
            if (!$this->upload->do_upload('uploadFile54')) {
              $error = array('error' => $this->upload->display_errors());
              echo json_encode($error);
         }
             $data = $this->upload->data();
              $path = $data['file_name'];
              echo json_encode($path);	
         }else{
           echo "no file"; 
       }
    }
    public function doc_image_upload55()
    {
         $this->load->helper("file");	
         $this->load->helper(array('form', 'url'));
         $this->load->helper('directory');
         $this->load->library("upload");
       //  $id=$this->input->post('id');
       $id= $this->session->userdata('attach_id');
         if (!file_exists('./assets/images/marrige_attach/witness_photo1/'.$id)) {
         //  mkdir('./assets/images/birth_doc/directory2', 0777, true);
        mkdir('./assets/images/marrige_attach/witness_photo1/' . $id, 0777, TRUE);
        }
         if ($_FILES['uploadFile55']['size'] > 0) {
              $this->upload->initialize(array( 
                "upload_path" => './assets/images/marrige_attach/witness_photo1/'.$id.'/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
             ));
            if (!$this->upload->do_upload('uploadFile55')) {
              $error = array('error' => $this->upload->display_errors());
              echo json_encode($error);
         }
             $data = $this->upload->data();
              $path = $data['file_name'];
              echo json_encode($path);	
         }else{
           echo "no file"; 
       }
    }
    public function doc_image_upload56()
    {
         $this->load->helper("file");	
         $this->load->helper(array('form', 'url'));
         $this->load->helper('directory');
         $this->load->library("upload");
       //  $id=$this->input->post('id');
       $id= $this->session->userdata('attach_id');
         if (!file_exists('./assets/images/marrige_attach/witness_thumb1/'.$id)) {
         //  mkdir('./assets/images/birth_doc/directory2', 0777, true);
        mkdir('./assets/images/marrige_attach/witness_thumb1/' . $id, 0777, TRUE);
        }
         if ($_FILES['uploadFile56']['size'] > 0) {
              $this->upload->initialize(array( 
                "upload_path" => './assets/images/marrige_attach/witness_thumb1/'.$id.'/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
             ));
            if (!$this->upload->do_upload('uploadFile56')) {
              $error = array('error' => $this->upload->display_errors());
              echo json_encode($error);
         }
             $data = $this->upload->data();
              $path = $data['file_name'];
              echo json_encode($path);	
         }else{
           echo "no file"; 
       }
    }
    public function doc_image_upload57()
    {
         $this->load->helper("file");	
         $this->load->helper(array('form', 'url'));
         $this->load->helper('directory');
         $this->load->library("upload");
       //  $id=$this->input->post('id');
       $id= $this->session->userdata('attach_id');
         if (!file_exists('./assets/images/marrige_attach/witness_photo2/'.$id)) {
         //  mkdir('./assets/images/birth_doc/directory2', 0777, true);
        mkdir('./assets/images/marrige_attach/witness_photo2/' . $id, 0777, TRUE);
        }
         if ($_FILES['uploadFile57']['size'] > 0) {
              $this->upload->initialize(array( 
                "upload_path" => './assets/images/marrige_attach/witness_photo2/'.$id.'/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
             ));
            if (!$this->upload->do_upload('uploadFile57')) {
              $error = array('error' => $this->upload->display_errors());
              echo json_encode($error);
         }
             $data = $this->upload->data();
              $path = $data['file_name'];
              echo json_encode($path);	
         }else{
           echo "no file"; 
       }
    }
    public function print_cash()
    {
      //$this->load->library('myfpdf');
      $where=$this->input->post('btnprint2');
      $data['record']=$this->m->showdatawhere_id($where);
      $this->load->view('receipt_print',$data);
    }
    public function doc_image_upload58()
    {
         $this->load->helper("file");	
         $this->load->helper(array('form', 'url'));
         $this->load->helper('directory');
         $this->load->library("upload");
       //  $id=$this->input->post('id');
       $id= $this->session->userdata('attach_id');
         if (!file_exists('./assets/images/marrige_attach/witness_thumb2/'.$id)) {
         //  mkdir('./assets/images/birth_doc/directory2', 0777, true);
        mkdir('./assets/images/marrige_attach/witness_thumb2/' . $id, 0777, TRUE);
        }
         if ($_FILES['uploadFile58']['size'] > 0) {
              $this->upload->initialize(array( 
                "upload_path" => './assets/images/marrige_attach/witness_thumb2/'.$id.'/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
             ));
            if (!$this->upload->do_upload('uploadFile58')) {
              $error = array('error' => $this->upload->display_errors());
              echo json_encode($error);
         }
             $data = $this->upload->data();
              $path = $data['file_name'];
              echo json_encode($path);	
         }else{
           echo "no file"; 
       }
    }
    public function doc_image_upload59()
    {
         $this->load->helper("file");	
         $this->load->helper(array('form', 'url'));
         $this->load->helper('directory');
         $this->load->library("upload");
       //  $id=$this->input->post('id');
       $id= $this->session->userdata('attach_id');
         if (!file_exists('./assets/images/marrige_attach/witness_photo3/'.$id)) {
         //  mkdir('./assets/images/birth_doc/directory2', 0777, true);
        mkdir('./assets/images/marrige_attach/witness_photo3/' . $id, 0777, TRUE);
        }
         if ($_FILES['uploadFile59']['size'] > 0) {
              $this->upload->initialize(array( 
                "upload_path" => './assets/images/marrige_attach/witness_photo3/'.$id.'/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
             ));
            if (!$this->upload->do_upload('uploadFile59')) {
              $error = array('error' => $this->upload->display_errors());
              echo json_encode($error);
         }
             $data = $this->upload->data();
              $path = $data['file_name'];
              echo json_encode($path);	
         }else{
           echo "no file"; 
       }
    }
    public function doc_image_upload591()
    {
         $this->load->helper("file");	
         $this->load->helper(array('form', 'url'));
         $this->load->helper('directory');
         $this->load->library("upload");
       //  $id=$this->input->post('id');
       $id= $this->session->userdata('attach_id');
         if (!file_exists('./assets/images/marrige_attach/witness_thumb3/'.$id)) {
         //  mkdir('./assets/images/birth_doc/directory2', 0777, true);
        mkdir('./assets/images/marrige_attach/witness_thumb3/' . $id, 0777, TRUE);
        }
         if ($_FILES['uploadFile591']['size'] > 0) {
              $this->upload->initialize(array( 
                "upload_path" => './assets/images/marrige_attach/witness_thumb3/'.$id.'/',
                "overwrite" => FALSE,
                "max_filename" => 300,
                "remove_spaces" => TRUE,
                "allowed_types" => '*',
                "max_size" => 30000,
             ));
            if (!$this->upload->do_upload('uploadFile591')) {
              $error = array('error' => $this->upload->display_errors());
              echo json_encode($error);
         }
             $data = $this->upload->data();
              $path = $data['file_name'];
              echo json_encode($path);	
         }else{
           echo "no file"; 
       }
    }
    public function getdocument(){
      $id  = $this->input->post('id');
      $data = $this->m->getdocument($id);
      echo json_encode($data);
    }
    public function getMaxReceipt(){
      $id = $this->input->post('year');
      //$id = 2019;
      $data = $this->m->getreceiptid($id);
      echo json_encode($data);
    }
    public function getMaxReg(){
      $id = $this->input->post('year');
      //$id = 2019;
      $data = $this->m->getregnum($id);
      echo json_encode($data);
    }
    //-----------------------------------------------------second form end-----------------------------------------------------------
    //get datewise receipt
    public function showDatewiseReceipt(){
      $date = $this->input->post('getDatewiseReceiptbtn');
      $data['record'] = $this->m->showDatewiseReceipt($date);
      $this->load->view('generatechalan',$data);
    }
}