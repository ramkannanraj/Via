<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class recharge extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');     
			$this->load->library('form_validation');
			$this->load->model('recharge_model');
			$this->load->helper('string');
			$this->load->helper('date');
		}
		public function index()
		{
			$data['Prepaid'] = $this->recharge_model->get_Prepaid();
			$data['dthprovider'] = $this->recharge_model->get_dthprovider();
			$data['electricityprovider'] = $this->recharge_model->get_electricityprovider();
			$data['gasprovider'] = $this->recharge_model->get_gasprovider();
			$data['landlineprovider'] = $this->recharge_model->get_landlineprovider();
			$data['Postpaid'] = $this->recharge_model->get_postpaid();
			$data['details'] = $this->recharge_model->get_details();
			$this->load->view("common/header");
		    $this->load->view("common/menu");
			$this->load->view('recharge',$data);
			$this->load->view("common/footer");
		}
		public function home()
		{
			redirect('user/home');
		}
			public function ad_recharge()
		{
		$serviceprovider = $this->input->post('serviceprovider');
		$mobilenumber =  $this->input->post('mobilenumber');
		$amount = $this->input->post('amount');
		$type_ser=$this->input->post('service_type');
		$check_result = $this->recharge_model->get_all_details($serviceprovider);
		$by=$this->session->userdata('username');
		foreach($check_result as $result_data)
		{
			$name = $result_data->name;
			$provider = $result_data->provider;
			$commission = $result_data->commission;
			$dcommission = $result_data->dcommission;
			$scommission = $result_data->scommission;
		}
		$da=date('Y-m-d');
		/*$commission_tot=$commission*$amount;
		$dcommission_tot=$dcommission*$amount;
		$scommission_tot=$scommission*$amount;*/
		$dataValues=array(
			'serviceprovider'=>$provider,
			'mobilenumber'=>$mobilenumber,
			'rdate'=>$da,
			'service'=>$name,
			'type'=>$type_ser,
			/*'commission'=>$commission_tot,
			'dcommission'=>$dcommission_tot,
			'scommission'=>$scommission_tot,*/
			'by'=>$by,
			'amount'=>$amount
		);
		$login_user_tbalance =$this->input->post('tot_bal');
			$login_user_ubalance =$this->input->post('used_balance');
			
			
			$avaliable_amount=$login_user_tbalance - $login_user_ubalance;
			//echo $avaliable_amount;
			//exit;
			//$tot=$total_balance-$amount;
			if($amount < $avaliable_amount)
{
		$insert =$this->recharge_model->insert_recharge_details($dataValues);
		if($insert)
		{
			//EZYPAY CODE
			$url = "http://103.29.232.110:8089/Ezypaywebservice/PushRequest.aspx?AuthorisationCode=de4527cfd9674f86bc&product=$serviceprovider&MobileNumber=$mobilenumber&Amount=$amount";
			$ret = file($url);
			$sess = explode(":",$ret[0]);
			if ($sess[0] == "OK") {
			$sess_id = trim($sess[1]); 
			//$url = "http://103.29.232.110:8089/Ezypaywebservice/PushRequest.aspx?AuthorisationCode=de4527cfd9674f86bc&product=$serviceprovider&MobileNumber=$mobilenumber&Amount=$amount";
			$ret = file($url);
			 $send = explode(":",$ret[0]);
			 if ($send[0] == "ID") {
			 echo "successnmessage ID: ". $send[1];
			 } else {
			 echo "send message failed";
			 }
			 } else {
		 $ret[0] ;
		
			 $get_trans=(explode("~",$ret[0]));
			 $trans_id=$get_trans[0];
			$error_id=$get_trans[3];
			$error_description=$get_trans[4];
			 $data=array(
				'trans_id' =>$trans_id,
				'result'=>$error_description,
		);
		//echo $error_id."<br/>"; 
		//exit;
		if($error_id == 1)
		{
			
		$loginuser_parent_id=$this->input->post('user_parent_id');
	$login_user_id= $this->session->userdata('uid');
		
		
		//echo $commission;
		
			
	$commission_tot=$commission*$amount/100;
			//exit;
		$dcommission_tot=$dcommission*$amount/100;
		$scommission_tot=$scommission*$amount/100;
		
			$dataValues=array(
			
			'commission'=>$commission_tot,
			'dcommission'=>$dcommission_tot,
			'scommission'=>$scommission_tot
			
		);
		$update_trans_id = $this->recharge_model->update_recharge_trans_id($dataValues,$insert);
		$login_user_tbalance =$this->input->post('tot_bal');
			$login_user_ubalance =$this->input->post('used_balance');
			$current_total_balance=$login_user_tbalance+$commission_tot;
						
		$update_total_balance = $this->recharge_model->update_recharge_retailer_commssion($current_total_balance,$login_user_id);
		$get_distributor_total = $this->recharge_model->get_parent_total_detail($loginuser_parent_id);
		foreach($get_distributor_total as $get_result_data)
		{
			$distributor_total_balance = $get_result_data->total_balance;
			$distributor_parent_id = $get_result_data->parent_id;
			
		}
		$current_total_balance_distributor=$distributor_total_balance + $dcommission_tot;
		
		$update_commission_for_distributor = $this->recharge_model->update_distributor_commission($current_total_balance_distributor,$loginuser_parent_id);
		
		$get_superstocktist_total = $this->recharge_model->get_distributor_parent_total_detail($distributor_parent_id);
		foreach($get_superstocktist_total as $get_result_data_super)
		{
			$super_total_balance = $get_result_data_super->total_balance;
			
			
		}
		$current_total_balance_super=$super_total_balance + $scommission_tot;

		$update_commission_for_distributor = $this->recharge_model->update_super_commission($current_total_balance_super,$distributor_parent_id);
		
		
		echo "<script language=\"javascript\">alert('Transaction Successful');</script>";
		
		$this->index();
		}
		
	if($error_id == 100)
		{
			echo "<script language=\"javascript\">alert('Transaction Pending');</script>";
			$this->index();
		}
		
		if($error_id == -130)
		{
			echo "<script language=\"javascript\">alert('Technical Failure');</script>";
			$this->index();
		}
	
	if($error_id == -131)
		{
			echo "<script language=\"javascript\">alert('Invalid Mobile Number');</script>";
			$this->index();
		}
		
		if($error_id == -137)
		{
			echo "<script language=\"javascript\">alert('Operator Internal Error');</script>";
			$this->index();
		}
		
		if($error_id == -138)
		{
			echo "<script language=\"javascript\">alert('Invalid Account Number');</script>";
			$this->index();
		}
		
		if($error_id == -140)
		{
			echo "<script language=\"javascript\">alert('Operator System General Failure');</script>";
			$this->index();
		}
	
		if($error_id == -141)
		{
			echo "<script language=\"javascript\">alert('Invalid Input details');</script>";
			$this->index();
		}
		
		if($error_id == 200)
		{
			echo "<script language=\"javascript\">alert('Timeout');</script>";
			$this->index();
		}
		if($error_id == -1600)
		{
			echo "<script language=\"javascript\">alert('Invalid Product ID');</script>";
			$this->index();
		}
	
	if($error_id == -1601)
		{
			echo "<script language=\"javascript\">alert('Operator not match');</script>";
			$this->index();
		}
	
	if($error_id == -1602)
		{
			echo "<script language=\"javascript\">alert('Invalid Authorisation code');</script>";
			$this->index();
		}
		
		if($error_id == -1603)
		{
			echo "<script language=\"javascript\">alert('Invalid Operator');</script>";
			$this->index();
		}
		
		if($error_id == -1604)
		{
			echo "<script language=\"javascript\">alert('Invalid Amount');</script>";
			$this->index();
		}
	
	if($error_id == -1605)
		{
			echo "<script language=\"javascript\">alert('Insufficient balance');</script>";
			$this->index();
		}
		
		if($error_id == -1608)
		{
			echo "<script language=\"javascript\">alert('Internal Error');</script>";
			$this->index();
		}
		
		if($error_id == -1609)
		{
			echo "<script language=\"javascript\">alert('Unknown Error');</script>";
			$this->index();
		}
	
	if($error_id == -1610)
		{
			echo "<script language=\"javascript\">alert('Invalid IP address');</script>";
			$this->index();
		}
	
	if($error_id == -1611)
		{
			echo "<script language=\"javascript\">alert('Duplicate request,please try after 10 minutes');</script>";
			$this->index();
		}
		
		if($error_id == -1612)
		{
			echo "<script language=\"javascript\">alert('Currently operator is down,please try after sometime');</script>";
			$this->index();
		}
		
		if($error_id == -1613)
		{
			echo "<script language=\"javascript\">alert('Operator is not available for this Circle');</script>";
			$this->index();
		}
		
		if($error_id == -1614)
		{
			echo "<script language=\"javascript\">alert('Invalid Denomination');</script>";
			$this->index();
		}

		if($error_id == -1615)
		{
			echo "<script language=\"javascript\">alert('Requested ID is not Unique');</script>";
			$this->index();
		}
		if($error_id == -1616)
		{
			echo "<script language=\"javascript\">alert('Invalid Customer VC Number');</script>";
			$this->index();
		}
		if($error_id == -1617)
		{
			echo "<script language=\"javascript\">alert('Inactive VC not allowed below 250');</script>";
			$this->index();
		}
	
		$update_trans_id = $this->recharge_model->update_recharge_trans_id($data,$insert);
			
			$login_user_tbalance =$this->input->post('tot_bal');
			$login_user_ubalance =$this->input->post('used_balance');
			
			$balz=$login_user_ubalance+$amount;
			$data=array(
		//'total_balance' =>$tot,
		'used_balance' =>$balz,
		);
			$updat_bal = $this->recharge_model->update_balance($data);
			if($updat_bal)
			{
				
				/*$testing="RECHARGE SUCCESS. Mobile Number:9962938239, Amount: $amount, Txn ID:
$trans_id";
				//SMS CODE	
				$url = "http://alerts.solutionsinfini.com//api/v3/index.php?method=sms&api_key=A23dd3fcabdc00f4b99682583786d23b6&to=9962938239&sender=IRUPAY&message=$testing
&format=json&custom=1,2";
					$url = str_replace(" ", "%20", $url);
					$ret = file($url);
					$sess = explode(":",$ret[0]);
					 if ($sess[0] == "OK") 
					 {
					$sess_id = trim($sess[1]); // remove any whitespace 
					
					 $ret = file($url);
					 $send = explode(":",$ret[0]);
					 if ($send[0] == "ID") 
					 {
					 echo "successnmessage ID: ". $send[1];
					 } 
					 else
					 {
					 echo "send message failed";
					 }
					 } 
					 else
					 {
					 $ret[0] ;
					 }*/
				/*echo "<script language=\"javascript\">alert('Recharged successfully');</script>";*/
				//$this->index();
			}
	
	
	
		
		
		} /*EZPAY else part close*/
	
			
		}
		}
else if($amount > $avaliable_amount)
{
	echo "<script type='text/javascript'>alert('Insufficent balance');</script>";
	
	$this->index();
		
}
else
{
	$this->index();
}
		
		}
		
		public function ad_dth_recharge()
		{
		$serviceprovider = $this->input->post('serviceprovider');
		
		if($serviceprovider==10)
		{
		$mobilenumber =  $this->input->post('mobilenumber');
		}
		if($serviceprovider==9)
		{
		$mobilenumber =  $this->input->post('mobilenumber1');
		}
		if($serviceprovider==20)
		{
		$mobilenumber =  $this->input->post('mobilenumber2');
		}
		if($serviceprovider==7)
		{
		$mobilenumber =  $this->input->post('mobilenumber3');
		}
		if($serviceprovider==13)
		{
		$mobilenumber =  $this->input->post('mobilenumber4');
		}
		if($serviceprovider==8)
		{
		$mobilenumber =  $this->input->post('mobilenumber5');
		}
		$amount = $this->input->post('amount');
		$type_ser="dth";
		$check_result = $this->recharge_model->get_all_dth_details($serviceprovider);
		$by=$this->session->userdata('username');
		foreach($check_result as $result_data)
		{
			$name = $result_data->name;
			$provider = $result_data->provider;
			$commission = $result_data->commission;
			$dcommission = $result_data->dcommission;
			$scommission = $result_data->scommission;
		}
		//$da=date('m-d-Y H:i:s');
		$da=date('Y-m-d');
		/*$commission_tot=$commission*$amount;
		$dcommission_tot=$dcommission*$amount;
		$scommission_tot=$scommission*$amount;*/
		$dataValues=array(
			'serviceprovider'=>$provider,
			'mobilenumber'=>$mobilenumber,
			'rdate'=>$da,
			'service'=>$name,
			'type'=>$type_ser,
			/*'commission'=>$commission_tot,
			'dcommission'=>$dcommission_tot,
			'scommission'=>$scommission_tot,*/
			'by'=>$by,
			'amount'=>$amount
		);
			$login_user_tbalance =$this->input->post('tot_bal');
			$login_user_ubalance =$this->input->post('used_balance');
			$avaliable_amount=$login_user_tbalance - $login_user_ubalance;
			//$tot=$total_balance-$amount;
			if($amount < $avaliable_amount)
{
		$insert =$this->recharge_model->insert_recharge_details($dataValues);
		if($insert)
		{
			//EZYPAY CODE
			
			 $url = "http://103.29.232.110:8089/Ezypaywebservice/PushRequest.aspx?AuthorisationCode=de4527cfd9674f86bc&product=$serviceprovider&MobileNumber=$mobilenumber&Amount=$amount";
			$ret = file($url);
			$sess = explode(":",$ret[0]);
			if ($sess[0] == "OK") {
			$sess_id = trim($sess[1]); 
			// $url = "http://103.29.232.110:8089/Ezypaywebservice/PushRequest.aspx?AuthorisationCode=de4527cfd9674f86bc&product=$serviceprovider&MobileNumber=$mobilenumber&Amount=$amount";
			$ret = file($url);
			$send = explode(":",$ret[0]);
			if ($send[0] == "ID") {
			echo "successnmessage ID: ". $send[1];
			 } else {
			 echo "send message failed";
			}
			 } else {
			 $ret[0] ;
			 	 $get_trans=(explode("~",$ret[0]));
			 $trans_id=$get_trans[0];
			$error_id=$get_trans[3];
			$error_description=$get_trans[4];
			 $data=array(
				'trans_id' =>$trans_id,
				'result'=>$error_description,
		);
		//echo $error_id;
		//exit;
		if($error_id == 1)
		{
			
		$loginuser_parent_id=$this->input->post('user_parent_id');
	$login_user_id= $this->session->userdata('uid');
		
		
		
			
			$commission_tot=$commission*$amount/100;
		$dcommission_tot=$dcommission*$amount/100;
		$scommission_tot=$scommission*$amount/100;
		
			$dataValues=array(
			
			'commission'=>$commission_tot,
			'dcommission'=>$dcommission_tot,
			'scommission'=>$scommission_tot
			
		);
		$update_trans_id = $this->recharge_model->update_recharge_trans_id($dataValues,$insert);
		$login_user_tbalance =$this->input->post('tot_bal');
			$login_user_ubalance =$this->input->post('used_balance');
			$current_total_balance=$login_user_tbalance+$commission_tot;
						
		$update_total_balance = $this->recharge_model->update_recharge_retailer_commssion($current_total_balance,$login_user_id);
		$get_distributor_total = $this->recharge_model->get_parent_total_detail($loginuser_parent_id);
		foreach($get_distributor_total as $get_result_data)
		{
			$distributor_total_balance = $get_result_data->total_balance;
			$distributor_parent_id = $get_result_data->parent_id;
			
		}
		$current_total_balance_distributor=$distributor_total_balance + $dcommission_tot;
		
		$update_commission_for_distributor = $this->recharge_model->update_distributor_commission($current_total_balance_distributor,$loginuser_parent_id);
		
		$get_superstocktist_total = $this->recharge_model->get_distributor_parent_total_detail($distributor_parent_id);
		foreach($get_superstocktist_total as $get_result_data_super)
		{
			$super_total_balance = $get_result_data_super->total_balance;
			
			
		}
		$current_total_balance_super=$super_total_balance + $scommission_tot;

		$update_commission_for_distributor = $this->recharge_model->update_super_commission($current_total_balance_super,$distributor_parent_id);
		
		
		echo "<script language=\"javascript\">alert('Recharged Successful');</script>";
		$this->index();
		}
		
	if($error_id == 100)
		{
			echo "<script language=\"javascript\">alert('Transaction Pending');</script>";
			$this->index();
		}
		
		if($error_id == -130)
		{
			echo "<script language=\"javascript\">alert('Technical Failure');</script>";
			$this->index();
		}
	
	if($error_id == -131)
		{
			echo "<script language=\"javascript\">alert('Invalid Mobile Number');</script>";
			$this->index();
		}
		
		if($error_id == -137)
		{
			echo "<script language=\"javascript\">alert('Operator Internal Error');</script>";
			$this->index();
		}
		
		if($error_id == -138)
		{
			echo "<script language=\"javascript\">alert('Invalid Account Number');</script>";
			$this->index();
		}
		
		if($error_id == -140)
		{
			echo "<script language=\"javascript\">alert('Operator System General Failure');</script>";
			$this->index();
		}
	
		if($error_id == -141)
		{
			echo "<script language=\"javascript\">alert('Invalid Input details');</script>";
			$this->index();
		}
		
		if($error_id == 200)
		{
			echo "<script language=\"javascript\">alert('Timeout');</script>";
			$this->index();
		}
		if($error_id == -1600)
		{
			echo "<script language=\"javascript\">alert('Invalid Product ID');</script>";
			$this->index();
		}
	
	if($error_id == -1601)
		{
			echo "<script language=\"javascript\">alert('Operator not match');</script>";
			$this->index();
		}
	
	if($error_id == -1602)
		{
			echo "<script language=\"javascript\">alert('Invalid Authorisation code');</script>";
			$this->index();
		}
		
		if($error_id == -1603)
		{
			echo "<script language=\"javascript\">alert('Invalid Operator');</script>";
			$this->index();
		}
		
		if($error_id == -1604)
		{
			echo "<script language=\"javascript\">alert('Invalid Amount');</script>";
			$this->index();
		}
	
	if($error_id == -1605)
		{
			echo "<script language=\"javascript\">alert('Insufficient balance');</script>";
			$this->index();
		}
		
		if($error_id == -1608)
		{
			echo "<script language=\"javascript\">alert('Internal Error');</script>";
			$this->index();
		}
		
		if($error_id == -1609)
		{
			echo "<script language=\"javascript\">alert('Unknown Error');</script>";
			$this->index();
		}
	
	if($error_id == -1610)
		{
			echo "<script language=\"javascript\">alert('Invalid IP address');</script>";
			$this->index();
		}
	
	if($error_id == -1611)
		{
			echo "<script language=\"javascript\">alert('Duplicate request,please try after 10 minutes');</script>";
			$this->index();
		}
		
		if($error_id == -1612)
		{
			echo "<script language=\"javascript\">alert('Currently operator is down,please try after sometime');</script>";
			$this->index();
		}
		
		if($error_id == -1613)
		{
			echo "<script language=\"javascript\">alert('Operator is not available for this Circle');</script>";
			$this->index();
		}
		
		if($error_id == -1614)
		{
			echo "<script language=\"javascript\">alert('Invalid Denomination');</script>";
			$this->index();
		}

		if($error_id == -1615)
		{
			echo "<script language=\"javascript\">alert('Requested ID is not Unique');</script>";
			$this->index();
		}
		if($error_id == -1616)
		{
			echo "<script language=\"javascript\">alert('Invalid Customer VC Number');</script>";
			$this->index();
		}
		if($error_id == -1617)
		{
			echo "<script language=\"javascript\">alert('Inactive VC not allowed below 250');</script>";
			$this->index();
		}
	
		$update_trans_id = $this->recharge_model->update_recharge_trans_id($data,$insert);

			
			
			$login_user_tbalance =$this->input->post('tot_bal');
			$login_user_ubalance =$this->input->post('used_balance');
			
			//$tot=$total_balance-$amount;
			$balz=$login_user_ubalance+$amount;
			$data=array(
		//'total_balance' =>$tot,
		'used_balance' =>$balz,
		);
			$updat_bal = $this->recharge_model->update_balance($data);
			if($updat_bal)
			{
				//SMS CODE
				/*$testing="RECHARGE SUCCESS. Mobile Number: 9962938239, Amount: XXXX, Txn ID:
XXXXX. Your bal: Rs. XXXXX/-";
				//SMS CODE	
				$url = "http://alerts.solutionsinfini.com//api/v3/index.php?method=sms&api_key=A23dd3fcabdc00f4b99682583786d23b6&to=9962938239&sender=IRUPAY&message=$testing
&format=json&custom=1,2";
					$url = str_replace(" ", "%20", $url);
					$ret = file($url);
					$sess = explode(":",$ret[0]);
					 if ($sess[0] == "OK") 
					 {
					$sess_id = trim($sess[1]); // remove any whitespace 
					
					 $ret = file($url);
					 $send = explode(":",$ret[0]);
					 if ($send[0] == "ID") 
					 {
					 echo "successnmessage ID: ". $send[1];
					 } 
					 else
					 {
					 echo "send message failed";
					 }
					 } 
					 else
					 {
					 $ret[0] ;
					 }*/
				
				/*echo "<script language=\"javascript\">alert('Recharged successfully');</script>";*/
				//$this->index();
			}
			
 	} /*EZPAY else part close*/
		
			
		}
		}
else if($amount > $avaliable_amount)
{
	echo "<script type='text/javascript'>alert('Insufficent balance');</script>";
	$this->index();
		
}
else
{
	$this->index();
}
		}
		
		
			public function ad_postpaid_recharge()
		{
		$serviceprovider = $this->input->post('serviceprovider');
		$mobilenumber =  $this->input->post('mobilenumber');
		$amount = $this->input->post('amount');
		$type_ser=$this->input->post('service_type');
		$check_result = $this->recharge_model->get_all_post_paid_details($serviceprovider);
		$by=$this->session->userdata('username');
		foreach($check_result as $result_data)
		{
			$name = $result_data->name;
			$provider = $result_data->provider;
			$commission = $result_data->commission;
			$dcommission = $result_data->dcommission;
			$scommission = $result_data->scommission;
		}
		//$da=date('m-d-Y H:i:s');
		$da=date('Y-m-d');
		/*$commission_tot=$commission*$amount;
		$dcommission_tot=$dcommission*$amount;
		$scommission_tot=$scommission*$amount;*/
		$dataValues=array(
			'serviceprovider'=>$provider,
			'mobilenumber'=>$mobilenumber,
			'rdate'=>$da,
			'service'=>$name,
			'type'=>$type_ser,
			/*'commission'=>$commission_tot,
			'dcommission'=>$dcommission_tot,
			'scommission'=>$scommission_tot,*/
			'by'=>$by,
			'amount'=>$amount
		);
		
		$login_user_tbalance =$this->input->post('tot_bal');
			$login_user_ubalance =$this->input->post('used_balance');
			$avaliable_amount=$login_user_tbalance - $login_user_ubalance;
			//$tot=$total_balance-$amount;
			if($amount < $avaliable_amount)
{
		
		$insert =$this->recharge_model->insert_recharge_details($dataValues);
		if($insert)
		{
			//EZYPAY CODE
			$url ="http://103.29.232.110:8089/Ezypaywebservice/postpaidpush.aspx?AuthorisationCode=de4527cfd9674f86bc&product=33&MobileNumber=9566806928&Amount=10&RequestId=&Circle=&AcountNo=1400050241&StdCode=091";
			 $ret = file($url);
			 $sess = explode(":",$ret[0]);
			if ($sess[0] == "OK") {
			 $sess_id = trim($sess[1]); 
			$ret = file($url);
			 $send = explode(":",$ret[0]);
			if ($send[0] == "ID") {
			 echo "successnmessage ID: ". $send[1];
			 } else {
			 echo "send message failed";
			 }
			 } else {
			 $ret[0] ;
			 $get_trans=(explode("~",$ret[0]));
			 $trans_id=$get_trans[0];
			$error_id=$get_trans[3];
			$error_description=$get_trans[4];
			 $data=array(
				'trans_id' =>$trans_id,
				'result'=>$error_description,
		);
		
		if($error_id == 1)
		{
			
		$loginuser_parent_id=$this->input->post('user_parent_id');
	$login_user_id= $this->session->userdata('uid');
		
			
			$commission_tot=$commission*$amount/100;
		$dcommission_tot=$dcommission*$amount/100;
		$scommission_tot=$scommission*$amount/100;
		
			$dataValues=array(
			'commission'=>$commission_tot,
			'dcommission'=>$dcommission_tot,
			'scommission'=>$scommission_tot
			
		);
		$update_trans_id = $this->recharge_model->update_recharge_trans_id($dataValues,$insert);
		$login_user_tbalance =$this->input->post('tot_bal');
			$login_user_ubalance =$this->input->post('used_balance');
			$current_total_balance=$login_user_tbalance+$commission_tot;
						
		$update_total_balance = $this->recharge_model->update_recharge_retailer_commssion($current_total_balance,$login_user_id);
		$get_distributor_total = $this->recharge_model->get_parent_total_detail($loginuser_parent_id);
		foreach($get_distributor_total as $get_result_data)
		{
			$distributor_total_balance = $get_result_data->total_balance;
			$distributor_parent_id = $get_result_data->parent_id;
			
		}
		$current_total_balance_distributor=$distributor_total_balance + $dcommission_tot;
		
		$update_commission_for_distributor = $this->recharge_model->update_distributor_commission($current_total_balance_distributor,$loginuser_parent_id);
		
		$get_superstocktist_total = $this->recharge_model->get_distributor_parent_total_detail($distributor_parent_id);
		foreach($get_superstocktist_total as $get_result_data_super)
		{
			$super_total_balance = $get_result_data_super->total_balance;
			
			
		}
		$current_total_balance_super=$super_total_balance + $scommission_tot;

		$update_commission_for_distributor = $this->recharge_model->update_super_commission($current_total_balance_super,$distributor_parent_id);
		
		
		echo "<script language=\"javascript\">alert('Transaction Successful');</script>";
		$this->index();
		}
	
	if($error_id == 100)
		{
			echo "<script language=\"javascript\">alert('Transaction Pending');</script>";
			$this->index();
		}
		
		if($error_id == -130)
		{
			echo "<script language=\"javascript\">alert('Technical Failure');</script>";
			$this->index();
		}
	
	if($error_id == -131)
		{
			echo "<script language=\"javascript\">alert('Invalid Mobile Number');</script>";
			$this->index();
		}
		
		if($error_id == -137)
		{
			echo "<script language=\"javascript\">alert('Operator Internal Error');</script>";
			$this->index();
		}
		
		if($error_id == -138)
		{
			echo "<script language=\"javascript\">alert('Invalid Account Number');</script>";
			$this->index();
		}
		
		if($error_id == -140)
		{
			echo "<script language=\"javascript\">alert('Operator System General Failure');</script>";
			$this->index();
		}
	
		if($error_id == -141)
		{
			echo "<script language=\"javascript\">alert('Invalid Input details');</script>";
			$this->index();
		}
		
		if($error_id == 200)
		{
			echo "<script language=\"javascript\">alert('Timeout');</script>";
			$this->index();
		}
		if($error_id == -1600)
		{
			echo "<script language=\"javascript\">alert('Invalid Product ID');</script>";
			$this->index();
		}
	
	if($error_id == -1601)
		{
			echo "<script language=\"javascript\">alert('Operator not match');</script>";
			$this->index();
		}
	
	if($error_id == -1602)
		{
			echo "<script language=\"javascript\">alert('Invalid Authorisation code');</script>";
			$this->index();
		}
		
		if($error_id == -1603)
		{
			echo "<script language=\"javascript\">alert('Invalid Operator');</script>";
			$this->index();
		}
		
		if($error_id == -1604)
		{
			echo "<script language=\"javascript\">alert('Invalid Amount');</script>";
			$this->index();
		}
	
	if($error_id == -1605)
		{
			echo "<script language=\"javascript\">alert('Insufficient balance');</script>";
			$this->index();
		}
		
		if($error_id == -1608)
		{
			echo "<script language=\"javascript\">alert('Internal Error');</script>";
			$this->index();
		}
		
		if($error_id == -1609)
		{
			echo "<script language=\"javascript\">alert('Unknown Error');</script>";
			$this->index();
		}
	
	if($error_id == -1610)
		{
			echo "<script language=\"javascript\">alert('Invalid IP address');</script>";
			$this->index();
		}
	
	if($error_id == -1611)
		{
			echo "<script language=\"javascript\">alert('Duplicate request,please try after 10 minutes');</script>";
			$this->index();
		}
		
		if($error_id == -1612)
		{
			echo "<script language=\"javascript\">alert('Currently operator is down,please try after sometime');</script>";
			$this->index();
		}
		
		if($error_id == -1613)
		{
			echo "<script language=\"javascript\">alert('Operator is not available for this Circle');</script>";
			$this->index();
		}
		
		if($error_id == -1614)
		{
			echo "<script language=\"javascript\">alert('Invalid Denomination');</script>";
			$this->index();
		}

		if($error_id == -1615)
		{
			echo "<script language=\"javascript\">alert('Requested ID is not Unique');</script>";
			$this->index();
		}
		if($error_id == -1616)
		{
			echo "<script language=\"javascript\">alert('Invalid Customer VC Number');</script>";
			$this->index();
		}
		if($error_id == -1617)
		{
			echo "<script language=\"javascript\">alert('Inactive VC not allowed below 250');</script>";
			$this->index();
		}
	
		
		$update_trans_id = $this->recharge_model->update_recharge_trans_id($data,$insert);
			
			$login_user_tbalance =$this->input->post('tot_bal');
			$login_user_ubalance =$this->input->post('used_balance');
			$balz=$login_user_ubalance+$amount;
			$data=array(
		'used_balance' =>$balz,
		);
			$updat_bal = $this->recharge_model->update_balance($data);
			if($updat_bal)
			{
				//SMS CODE
				/*$testing="RECHARGE SUCCESS. Mobile Number:9962938239, Amount: XXXX, Txn ID:
$trans_id. Your bal: Rs. XXXXX/-";
				//SMS CODE	
				$url = "http://alerts.solutionsinfini.com//api/v3/index.php?method=sms&api_key=A23dd3fcabdc00f4b99682583786d23b6&to=9962938239&sender=IRUPAY&message=$testing
&format=json&custom=1,2";
					$url = str_replace(" ", "%20", $url);
					$ret = file($url);
					$sess = explode(":",$ret[0]);
					 if ($sess[0] == "OK") 
					 {
					$sess_id = trim($sess[1]); // remove any whitespace 
					
					 $ret = file($url);
					 $send = explode(":",$ret[0]);
					 if ($send[0] == "ID") 
					 {
					 echo "successnmessage ID: ". $send[1];
					 } 
					 else
					 {
					 echo "send message failed";
					 }
					 } 
					 else
					 {
					 $ret[0] ;
					 }*/

				
				/*echo "<script language=\"javascript\">alert('Recharged successfully');</script>";*/
				//$this->index();
			}
			
			} /*EZPAY else part close*/
			
		}
		}
else if($amount > $avaliable_amount)
{
	echo "<script type='text/javascript'>alert('Insufficent balance');</script>";
	$this->index();
		
}
else
{
	$this->index();
}
		
		}
		
		
		
		
	}