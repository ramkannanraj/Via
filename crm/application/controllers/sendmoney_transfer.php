<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Sendmoney_transfer extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');     
			$this->load->library('form_validation');
			$this->load->model('sendmoney_transfer_model');
			$this->load->helper('string');
			$this->load->helper('date');
			$this->load->library('session');
			$this->load->helper('email');
			$this->load->library('table');
			$this->load->database();
			
		}
		
		
		public function requestpayment()
		{
			$leave_id=$this->session->userdata('uid');
			$sessp_id=$this->session->userdata('parent_id');
		    $data['records']=$this->sendmoney_transfer_model->parentrequest($sessp_id);
			$this->load->view('sendmoney_requestpay', $data);
		}
		
		public function paymentregister()
		{
			
			$userid=$this->input->post('userid');
			$mode=$this->input->post('mode');
			$amt=$this->input->post('amt');
			$tdate=$this->input->post('tdate');
			$bank=$this->input->post('bank');
			$branch=$this->input->post('branch');
            $bankdetail=$this->input->post('bankdetail');
			$remark=$this->input->post('remark');
			$reid=$this->input->post('reid');
			$del='no';
			 $paymentregister_data=array(
		            'user_id' => $userid,
		            'payment_mode' => $mode,
		            'amount' => $amt,
		            'transfer_date' =>$tdate,
					'bank'=> $bank,
					'branch' =>$branch,
					'bank_detail'=> $bankdetail,
					'remark'=> $remark,
					'user_name'=> $reid,
					'isdelete1'=> $del,
		                           );
			$reg=$this->sendmoney_transfer_model->payregister($paymentregister_data);
			$this->load->view('v_requestpay');
			
		}
		
		//view request
		public function viewrequestpayment()
		{ 
		 $del='no';
		 $data['records']=$this->sendmoney_transfer_model->viewrequest($del);
         $this->load->view('sendmoney_viewrequest', $data);
		}
		
		
		public function viewrequestpaymentdetail()
		{
			$this->load->view("vrequestpay");
		}
		
		
		
		public function fillgrid()
		{
           $this->sendmoney_transfer_model->fillgrid();
        }
		
		
		
		public function transfer()
		{
            $id =  $this->uri->segment(3);
            $sessid =  $this->uri->segment(4);
			$data['querys1']=$this->sendmoney_transfer_model->idds($sessid);	
			$del='no';
			$data['querys'] =$this->sendmoney_transfer_model->transfer($id,$del);              
            $data['id'] = $id;
            $this->load->view('transfer', $data);
        }
	
		
		public function fund_update()
          {
           $ids=$this->input->post('hidden');
           $del='yes';
           $type='Balance Transfer';
            $timezone = new DateTimeZone("Asia/Kolkata" );
            $date = new DateTime();
            $date->setTimezone($timezone );
			$date = $date->format( 'Y-m-d H:i:s' );
           $current_date= date('Y-m-d H:i:s');
           $mobile =$this->input->post('mobile');
           $mobile1 =$this->session->userdata('mobile');
           $user_type =$this->input->post('type');
           $sess_type =$this->input->post('sesstype');
           $sess_name =$this->input->post('sessname');
           $user_name =$this->input->post('usename');
           $commentby="Balance transfered by $sess_type($sess_name)";
           $commentto="Balance transfered to $user_type($user_name)";
           $amount =$this->input->post('amount');
           $user_id=$this->input->post('userid');
           $sess_id=$this->input->post('parentid');
           $tot_bal=$this->input->post('totalbal');
           $used_bal=$this->input->post('usedbal');
           $sess_totbal=$this->input->post('totalbal1');
           $sess_usedbal=$this->input->post('usedbal1');
		   $sname=$this->input->post('sname');
           $uname=$this->input->post('uname');
           $avaliable_bal=$sess_totbal-$sess_usedbal;
           if($avaliable_bal>$amount)
            {
              $usercurrnt_bal=$tot_bal-$used_bal;
	          $add_usedbal=$sess_usedbal+$amount;
	          $add_totbal=$tot_bal+$amount;
	          $total=$avaliable_bal-$amount;
	          $total1=$usercurrnt_bal+$amount;
	          $update = $this->sendmoney_transfer_model->update_sess_usedblce($sess_id,$add_usedbal);
	          $updatetot = $this->sendmoney_transfer_model->update_user_totblce($user_id,$add_totbal);
	          $update1 = $this->sendmoney_transfer_model->update_isdel($ids,$del);
	          $transferby=$this->sendmoney_transfer_model->transferby($type,$amount,$total,$commentby,$user_id,$sess_id,$date);
	          $transferto=$this->sendmoney_transfer_model->transferto($type,$amount,$total1,$commentto,$user_id,$sess_id,$date,$uname,$sname,$mobile,$mobile1,$sess_type,$user_type,$sname,$uname);
					 $sms_data=array(
		            'date' => $current_date,
		            'agentmob' => $mobile,
		            'msg' => $testing,
		            'by_uid' =>$user_id,
		                           );
			$insert =$this->sendmoney_transfer_model->insert_sms_details($sms_data); 	 
    }
     else{
	echo "<script type='text/javascript'>alert('Insufficent balance');window.location.href = 'viewrequestpaymentdetail';</script>";
         }
	}


	function get_sendmoney_details()
    {           
        //Search Engine
       $start_date = $this->input->post('from_date');
        $end_date = $this->input->post('to_date');
		 $retailer = $this->input->post('retailer');
        $distributor = $this->input->post('distributor');
		//$type=$this->session->userdata('type');
		$this->load->model('reports_model');
		$this->load->model('transfer_model');
			
		if(  $this->session->userdata('type') == 'distributor' ){
		$data['retailers']=$this->transfer_model->getRetailerListByDis( $this->session->userdata('uid') ); 
		
		 
	}else{
		$data['retailers']=$this->transfer_model->getRetailerList();
		$data['distributors']=$this->transfer_model->getDistributorList();
		 
	}
		
		if(  $distributor != '' ){
		$by_id	= $distributor;
		}else
		{
			$by_id	= '';
		}
		
		if(  $retailer != '' ){
		$to_id	= $retailer;
		}else
		{
			$to_id	= '';
		}

		if($start_date!="" && $end_date!="" )
		{
        $data['results'] = $this->sendmoney_transfer_model->getTransferDetail($start_date,$end_date,$by_id,$to_id);
		$this->load->view("common/header");
			$this->load->view("common/menu");
        $this->load->view('get_sendmoney_details',$data);
			$this->load->view("common/footer");
		}
		else
		{
            $date=date("Y-m-d"); 
			$data['results'] = $this->sendmoney_transfer_model->getTransferDetailcurrentdate($date);
				$this->load->view("common/header");
				
			$this->load->view("common/menu");
			$this->load->view('get_sendmoney_details',$data);
			$this->load->view("common/footer");
		}

    }



	}	