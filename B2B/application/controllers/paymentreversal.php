<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class paymentreversal extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');     
			$this->load->library('form_validation');
			$this->load->model('paymentreversal_model');
			$this->load->helper('string');
			$this->load->helper('date');
			$this->load->library('session');
			$this->load->helper('email');
			$this->load->library('table');
			$this->load->database();
			
		}
		
		
		
		public function reversalpayment()
		{

			$type='admin';
		    $data['records']=$this->paymentreversal_model->parentrequest($type);
			$this->load->view('common/header');
			$this->load->view('common/menu');
			$this->load->view("v_reversalpay",$data);
			$this->load->view('common/footer');
		}
		
		
		public function viewreversalpaymentdetail()
		{
			$this->load->view("vreversalpay");
		}
		
		public function fillgrid()
		{
           $this->paymentreversal_model->fillgrid();
        }
		
		

	     public function reversaltransfer()
		 {
            $id =  $this->uri->segment(3);
		    $sessid = $this->session->userdata('uid');
			$data['querys1']=$this->paymentreversal_model->idds($sessid);				
			$del='0';
			$data['querys'] =$this->paymentreversal_model->transfer($id,$del);             
            $data['id'] = $id;
            $this->load->view('reversaltransfer', $data);
	     }
		
			public function reversaltopregister()
		{
			$type=$this->input->post('type');
			$operator=$this->input->post('operator');
			$distributor_code=$this->input->post('distributor_code');
			$distributor_name=$this->input->post('distributor_name');
			$distributor_email=$this->input->post('distributor_email');
			$distributor_number=$this->input->post('distributor_number');
			$smartcard_number=$this->input->post('smartcard_number');
            $smartcard_vc_no=$this->input->post('smartcard_vc_no');
			$transaction_amount=$this->input->post('transaction_amount');
			$transaction_date=$this->input->post('transaction_date');
			$transaction_number=$this->input->post('transaction_number');
			$request_id=$this->input->post('request_id');
			$current_date= date('Y-m-d H:i:s');
			 $paymenttopregister_data=array(
		            'request_type' => $type,
		            'operator' => $operator,
		            'distributor_name' =>$distributor_name,
					'distributor_email'=> $distributor_email,
					'distributor_number' =>$distributor_number,
					'smartcard_number'=> $smartcard_number,
					'smartcard_vc_no'=> $smartcard_vc_no,
					'transaction_amount'=> $transaction_amount,
					'transaction_date'=> $transaction_date,
		        	'transaction_number'=> $transaction_number,
					'requester_id'=> $request_id,
					'requested_date'=> $current_date,

		                           );
			$reg=$this->paymentreversal_model->reversaltopregister($paymenttopregister_data);						
			$this->load->view('v_reversalpay');
			
		}
		
		
		public function reversalamtregister()
		{
			$type=$this->input->post('type');
			$amount_distributor_code=$this->input->post('amount_distributor_code');
			$amount_distributor_name=$this->input->post('amount_distributor_name');
			$amount_distributor_email=$this->input->post('amount_distributor_email');
			$amount_distributor_number=$this->input->post('amount_distributor_number');
			$amount_transaction_amount=$this->input->post('amount_transaction_amount');
			$amount_reversal_remarks=$this->input->post('amount_reversal_remarks');
            $amount_transaction_date=$this->input->post('amount_transaction_date');
			$request_id=$this->input->post('request_id');
			$current_date= date('Y-m-d H:i:s');
			$paymentamtregister_data=array(
		            'request_type' => $type,
		            'distributor_name' =>$amount_distributor_name,
					'distributor_email'=> $amount_distributor_email,
					'distributor_number' =>$amount_distributor_number,
					'transaction_amount'=> $amount_transaction_amount,
					'transaction_date'=> $amount_transaction_date,
		        	'transaction_remarks'=> $amount_reversal_remarks,
					'requester_id'=> $request_id,
					'requested_date'=>$current_date,

		                           );
			$reg=$this->paymentreversal_model->reversalamtregister($paymentamtregister_data);
			$this->load->view('v_reversalpay');
			
		}
		
	
		
		public function fund_update()
         {
         $ids=$this->input->post('hidden');
         $del='1';
         $amount =$this->input->post('amount');
         $type='Reversal Transfer';
          $timezone = new DateTimeZone("Asia/Kolkata" );
            $date = new DateTime();
            $date->setTimezone($timezone );
			$date = $date->format( 'Y-m-d H:i:s' );
         $mobile =$this->input->post('mobile');
         $mobile1 =$this->session->userdata('mobile');
         $user_type =$this->input->post('type');
         $sess_type =$this->input->post('sesstype');
         $sess_name =$this->input->post('sessname');
         $user_name =$this->input->post('usename');
         $commentby="Balance transfered by $sess_type($sess_name)";
         $commentto="Balance transfered to $user_type($user_name)";
         $user_id=$this->input->post('userid');
         $sess_id=$this->session->userdata('uid');
         $tot_bal=$this->input->post('totalbal');
         $used_bal=$this->input->post('usedbal');
         $sess_totbal=$this->input->post('totalbal1');
         $sess_usedbal=$this->input->post('usedbal1');
         $avaliable_bal=$sess_totbal-$sess_usedbal;
		 $sname=$this->input->post('sname');
         $uname=$this->input->post('uname');
         if($avaliable_bal>$amount)
         {
	      $usercurrnt_bal=$tot_bal-$used_bal;
	      $add_usedbal=$sess_usedbal+$amount;	
	      $add_totbal=$tot_bal+$amount;
	      $total=$avaliable_bal-$amount;
	      $total1=$usercurrnt_bal+$amount;
	      $update = $this->paymentreversal_model->update_sess_usedblce($sess_id,$add_usedbal);
	      $updatetot = $this->paymentreversal_model->update_user_totblce($user_id,$add_totbal);
	      $update1 = $this->paymentreversal_model->update_isdel($ids,$del);
	      $transferby=$this->paymentreversal_model->transferby($type,$amount,$total,$commentby,$user_id,$sess_id,$date);
	      $transferto=$this->paymentreversal_model->transferto($type,$amount,$total1,$commentto,$user_id,$sess_id,$date,$sess_name,$user_name,$mobile,$mobile1,$sess_type,$user_type,$sname,$uname);	
	     }
         else{
	     echo "<script type='text/javascript'>alert('Insufficent balance');window.location.href = 'vreversalpayment';</script>";
             }
	}

}	