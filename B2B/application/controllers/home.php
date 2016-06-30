<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {            

public function __construct() {
parent::__construct();
$this->load->model('home_model');
$this->load->library('form_validation');
$this->load->helper('url');     
			$this->load->library('form_validation');
			$this->load->model('user_model');
			$this->load->model('viewuser_model');
			$this->load->helper('string');
			$this->load->helper('date');
			//$this->load->library("pagination");
            $this->load->library('table');
			$this->load->database();
}
public function index()
{
	$data['type']=$this->session->userdata('type');
 	$this->load->view('common/header');
 	$this->load->view('common/menu');
	$this->load->view('user_mgmt',$data);
 	$this->load->view('common/footer');
}

public function display_data(){
  
    $this->load->view('getdata');
}
 public function statusactive()
		{ 
		  $sta_id = $this->uri->segment(3);
		  $up_sta="no";
		  $active=$this->home_model->active($sta_id,$up_sta);
		  if($active){
		  redirect(site_url('home'));	 
         }
		}		
		 public function statusinactive()
		{ 
		  $sta_id = $this->uri->segment(3);
		  $up_sta="yes";
		  $inactive=$this->home_model->inactive($sta_id,$up_sta);
		  if($inactive){
		  redirect(site_url('home'));	 
         }
		}
public function update()
{
	$id = $_POST['id'];
	$fn = $_POST['fn'];
	$ln = $_POST['ln'];
	$mobile = $_POST['age'];
	$ht = $_POST['ht'];
	$job = $_POST['job'];
	$limit = $_POST['limit'];
    $mail= $_POST['mail'];
	$executive_name =  $_POST['executive_name'];
	 
		$key=$this->home_model->checkColumn( 'email', $mail , $id); 
		if ( $key == true )
		{
		 exit("Email Already Exists");
		}
		$key=$this->home_model->checkColumn( 'username', $ht,$id ); 
		if ( $key == true )
		{
		 exit(" Username Already Exists ");
		}
		$key=$this->home_model->checkColumn( 'mobile', $ht,$id ); 
		if ( $key == true )
		{
		 exit(" Mobile Already Exists ");
		}
		
		
		 
	if(isset($fn) && isset($ln) && isset($mobile) && isset($ht) && isset($job) && isset($limit)&& isset($mail))
	{
		// Username or email or phone exists validation included  
		
		$update = $this->home_model->update_users($id,$fn,$ln,$mobile,$ht,$job,$limit,$mail,$executive_name );
		if($update)
		{
			echo "Update Successfully";
		} 
		else
		{
			echo "Fail Update Data";
		}
	}
}


public function locked_balance()
{
	$id = $_POST['id'];
	$lock = $_POST['lock'];
	$locked_buy = $_POST['locked_buy'];
	$locked_to = $_POST['locked_to'];
	$total_balz = $_POST['total_balz'];
	$used_balz = $_POST['used_balz'];
	$transfered_amnt = $_POST['ltransfered_amnt'];
	$locked_balance=$_POST['locked_balance'];
	$avaliable_amount=$total_balz - $used_balz;
	//print_r($transfered_amnt);exit;
	if($transfered_amnt < $avaliable_amount)
{
$tot=$locked_balance + $transfered_amnt;
$update = $this->home_model->update_lock_balanz($tot,$id);
if($update){
$current_user_balance=$used_balz + $transfered_amnt;
$update_val = $this->home_model->update_lockbal_balz($id,$current_user_balance);

		if($update_val)
		{
			echo "Amount Locked Successfully";
		} 
		else
		{
			echo "Fail Update Data";
		}
	}
}
else {
	echo "Insufficent balance";
}
}







public function released_balance()
{
	$id = $_POST['id'];
	$lock = $_POST['lock'];
	$locked_buy = $_POST['locked_buy'];
	 $locked_to = $_POST['locked_to'];
	 $total_balz = $_POST['total_balz'];
	 $used_balz = $_POST['used_balz'];
	$amount = $_POST['amount']; 
	$transfered_amnt = $_POST['transfered_amnt'];
	$locked_balance=$_POST['locked_balance'];
 if($amount <= $locked_balance)
     {
      $tot=$locked_balance - $amount;
      $update = $this->home_model->rel_balanz($tot,$id);
     if($update){
    
     $current_user_balance=$used_balz - $amount;
     $update_val = $this->home_model->relase_balz($id,$current_user_balance);
 
if($update_val)
		{
			echo "Amount Release Successfully";
		} 
		else
		{
			echo "Fail Update Data";
		}


}}else {
	echo "Insufficent balance";
}}





public function update_funds_transfer()
    {
     $type='Balance Transfer';
     /*$timezone = new DateTimeZone("Asia/Kolkata" );
     $date = new DateTime();
     $date->setTimezone($timezone );
     $date = $date->format( 'Y-m-d H:i:s' );
	  */
   $date =  date('Y-m-d H:i:s');



     $total_balance =$_POST['total_balance'];
     $used_balance =$_POST['used_balance'];
	 
     $login_user_tbalance =$_POST['parent_tot'];
     $login_user_ubalance =$_POST['parent_used'];
	 
     $sess_id =$this->session->userdata('uid');
     $user_type =$_POST['type'];
     $sess_type =$this->session->userdata('type');
     $mobile =$_POST['mobile'];
     $mobile1 =$this->session->userdata('mobile');
     $ids=$_POST['id'];
     $amount =$_POST['amt'];
     $sess_name =$this->session->userdata('username');
     $user_name =$_POST['usename'];
	 
     $avaliable_amount=$login_user_tbalance - $login_user_ubalance;
	 $current_user_balance=$login_user_ubalance + $amount;
	 $current_user_avail_balance=$login_user_ubalance - $amount;
	 
	 //print_r($current_user_balance);exit;
     $commentby="Balance transfered by $sess_type($sess_name)";
     $commentto="Balance transfered to $user_type($user_name)";
	 $sname=$_POST['sname'];
     $uname=$_POST['uname'];
     $testing="BALANCE TRANSFER $sname transferred Rs .$amount/- for Member Id: $user_type($uname) On $date";
     $testing1="BALANCE TRANSFER $sess_name transferred Rs .$amount/- to Member Id: $user_name On $date";
	 
     if($amount < $avaliable_amount && $amount >=0  )
     {
		 
	  $user_avali=$total_balance-$used_balance;
	  
      $tot=$total_balance+$amount; // To user available balance
	   
      $total=$avaliable_amount-$amount;
	  
	  $available_balance =  $total;  
      $total1=$user_avali+$amount;
	  
      $update = $this->home_model->update_user_balanz($tot,$ids);
	  
      $update_avail = $this->home_model->update_user_abalanz($total1,$ids);
	  
	  if($update)
     {
		$id_sess=$this->session->userdata('uid');
		$login_user_ubalance =$this->input->post('used_bal');
		
		$update_val = $this->home_model->update_session_balz($id_sess,$current_user_balance);
		  
		$update_avail = $this->home_model->update_session_abalz($id_sess,$current_user_avail_balance);
		
		$transferby=$this->home_model->transferbyview($type,$amount,$total,$commentby,$ids,$sess_id,$date);
	  
		$transferto=$this->home_model->transfertoview($type,$amount,$total1,$commentto,$ids,$sess_id,$date,$testing,$mobile,$mobile1);
    
		  if(  $transferby == false || $transferto== false)
		  {	
			echo " Legder insertion  Failed";
		  }else{
			echo "Fund transfer Successfully";
		  } 
		}
	  }
	  else
	  {
		echo "Insufficent balance";
	  } 
   }

   public function update_sendmoney_transfer()
    {
     $type='SEND MONEY Transfer';
     /*$timezone = new DateTimeZone("Asia/Kolkata" );
     $date = new DateTime();
     $date->setTimezone($timezone );
     $date = $date->format( 'Y-m-d H:i:s' );*/
	 $date =  date('Y-m-d H:i:s');
     $total_balance =$_POST['sendmoney_balance'];
     $used_balance =$_POST['sendmoney_used_balance'];
     $login_user_tbalance =$_POST['parent_tot'];
     $login_user_ubalance =$_POST['parent_used'];
     $sess_id =$this->session->userdata('uid');
     $user_type =$_POST['type'];
     $sess_type =$this->session->userdata('type');
     $mobile =$_POST['mobile'];
     $mobile1 =$this->session->userdata('mobile');
     $ids=$_POST['id'];
     $amount =$_POST['amt'];
     $sess_name =$this->session->userdata('username');
     $user_name =$_POST['usename'];
     $avaliable_amount=$login_user_tbalance - $login_user_ubalance;
	 $current_user_balance=$login_user_ubalance + $amount;
	 //print_r($current_user_balance);exit;
     $commentby="SEND MONEY transfered by $sess_type($sess_name)";
     $commentto="SEND MONEY transfered to $user_type($user_name)";
	 $sname=$_POST['sname'];
     $uname=$_POST['uname'];
     $testing="SEND MONEY TRANSFER $sname transferred Rs .$amount/- for Member Id: $user_type($uname) On $date";
     $testing1="SEND MONEY TRANSFER $sess_name transferred Rs .$amount/- to Member Id: $user_name On $date";
     if($amount < $avaliable_amount)
     {
	  $user_avali=$total_balance-$used_balance;
      $tot=$total_balance+$amount; // To user available balance
      $total=$avaliable_amount-$amount;
	  
	  $available_balance =  $total;
	   
	   
	   
	   
      $total1=$user_avali+$amount; 
      $update = $this->home_model->sendmoney_update_user_balanz($tot,$ids);
      if($update)
     {
      $id_sess=$this->session->userdata('uid');
      $login_user_ubalance =$this->input->post('used_bal');
      
      $update_val = $this->home_model->sendmoney_update_session_balz($id_sess,$current_user_balance);
	  
      $transferby=$this->home_model->sendmoney_transferbyview($type,$amount,$total,$commentby,$ids,$sess_id,$date);
      $transferto=$this->home_model->sendmoney_transfertoview($type,$amount,$total1,$commentto,$ids,$sess_id,$date,$testing,$mobile,$mobile1);
    
  if(  $transferby == false || $transferto== false)
  {	echo " Legder insertion  Failed";
  }else{
			echo "Fund transfer Successfully";
  }
		 

	}
     }
    else
    {
		echo "Insufficent balance";
    }


   }





   public function deltuser()
		{ 
		  $del_id = $this->uri->segment(3);
		  $up_del="yes";
		  $delt=$this->home_model->deltuser($del_id,$up_del);
		  if($delt){
		    redirect(site_url('home'));	 
         }
		}


}