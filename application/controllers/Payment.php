<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Payment_model');
    }
    public function online_payment()
	{
		
        $where=$this->input->post('pay');
        $ref_id=$this->input->post('ref_id');
        $user_id = $this->session->userid;

        $data['name']=$this->Payment_model->get_name($user_id);
        $data['amount']=$this->Payment_model->get_amount($where);
     
       $data['active_menu'] = "";
       $data['ref_id'] = $ref_id;
       $data['service'] = $where;
     //  print_r($ref_id);
		$this->load->view('payment_form',$data);
	
    }
    public function responce()
    {

        $this->load->view('ccavResponseHandler');
    }
    public function transaction()
    {
        $data = "";
        $data = array(
            'merchant_id' => $this->input->post('merchant_id'),
            'order_id' => $this->input->post('order_id'),
            'currency' => $this->input->post('currency'),
            'amount' => $this->input->post('amount'),
            'redirect_url' => $this->input->post('redirect_url'),
            'cancel_url' => $this->input->post('cancel_url'),
            'language' => $this->input->post('language'),
          

        );
        $data2['val'] = $data;

        $this->load->view('ccavRequestHandler', $data2);
    }
    public function adddata()
    { 
         $table_name= $this->input->post('table_name');
      
		
	
         $data1="";
         $data="";
         $user_id = $this->session->userid;
		
          $today= date('y-m-d');
           $data = array(
                    'client_id' =>$user_id,
                    'ref_id' =>$this->input->post('ref_id'),
                    'Services' =>$this->input->post('service'),
                    'no_of_copy' =>$this->input->post('copy'),
                    'amount' =>$this->input->post('amt'),
                    
                 
                   
              );
            
        
      
        $data1=$this->Payment_model->insertdata($data,$table_name);
        
     
        echo json_encode($data1);
    }
    public function tran_data()
    {
        $table_name = "transaction_master";
        $order_status = $this->input->post('order_status');

        $base_url = base_url();
        $data = "";
        $data1 = "";
        $data = array(
            'tracking_id' => $this->input->post('tracking_id'),
            'bank_ref_no' => $this->input->post('bank_ref_no'),
            'order_status' => $this->input->post('order_status'),
            'payment_mode' => $this->input->post('payment_mode'),
            'card_name' => $this->input->post('card_name'),
            'status_message' => $this->input->post('status_message'),
            'status_code' => $this->input->post('status_code'),
            'trans_date' => $this->input->post('trans_date'),
            'order_id' => $this->input->post('order_id'),

        );
        $data1 = array(
            'transaction_id' => $this->input->post('tracking_id'),
            'transaction_date' => $this->input->post('trans_date'),
            'status' => 1,

        );

        $table = "online_payment_master";
        $order_id = $this->input->post('order_id');

        if ($order_status == "Success") {
           // $this->m->insertdata1($data, $table_name);
            $this->Payment_model->updatedata($data1, $table, $order_id);
        }
        echo "<center>";
        if ($order_status === "Success") {
            echo "<br>Thank you for Transaction with us. Your credit card has been charged and your transaction is successful.";
            echo "<br>Please check Your e-mail for transaction-billing information.";
        } else if ($order_status === "Aborted") {
            echo "<br>Thank you for Transaction with us.We will keep you posted regarding the status of your order through e-mail";
        } else if ($order_status === "Failure") {
            echo "<br>Thank you for Transaction with us.However,the transaction has been declined.";
        } else {
            echo "<br>Security Error. Illegal access detected";
        }

        echo "<br><br><a href='$base_url.Welcome/dashboard'><button class='btn-success btn'>Back</button></a>";
        echo "</center>";
        // echo json_encode($data1);

    }
}
