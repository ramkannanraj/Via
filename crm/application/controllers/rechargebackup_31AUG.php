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
		public function showmodal()
		{
			
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
			$this->load->view('recharge_2',$data);
			$this->load->view("common/footer");
		}
		
		/*Ram Function Start*/
		public function index_2()
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
			$this->load->view('recharge_dup',$data);
			$this->load->view("common/footer");
		}
		/*Ram Function End*/
		
		
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
		$by_id=$this->session->userdata('uid');
		$by=$this->session->userdata('username');
		/*$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
			$REMOTE_ADDR=$hostname;
			$ip= $REMOTE_ADDR;
			$ip_address=GetHostByName($ip);*/
			
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
			'by_id' =>$by_id,
			'amount'=>$amount,
			/*'ip' =>$ip_address,*/
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
	$url = "https://103.29.232.110:8089/Ezypaywebservice/PushRequest.aspx?AuthorisationCode=de4527cfd9674f86bc&product=$serviceprovider&MobileNumber=$mobilenumber&Amount=$amount";
		
		
			$ret = file_get_contents($url);
			
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
			//$error_id=100;
			$error_description=$get_trans[4];
		
			 $data=array(
				'trans_id' =>$trans_id,
				'result'=>$error_description,
		);
		
		if($error_id == 1 || $error_id == 100 || $error_id == 200)
		{
			
		$loginuser_parent_id=$this->input->post('user_parent_id');
	$login_user_id= $this->session->userdata('uid');
		
		$commission_tot=$commission*$amount/100;
		$dcommission_tot=$dcommission*$amount/100;
		$scommission_tot=$scommission*$amount/100;
		
			$dataValues=array(
			'commission'=>$commission_tot,
			'dcommission'=>$dcommission_tot,
			'scommission'=>$scommission_tot,
			
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
		
		
		
		$update_trans_id = $this->recharge_model->update_recharge_trans_id($data,$insert);
			
			$login_user_tbalance =$this->input->post('tot_bal');
			$login_user_ubalance =$this->input->post('used_balance');
			
			$balz=$login_user_ubalance+$amount;
			$data=array(
				'used_balance' =>$balz,
		);
			$updat_bal = $this->recharge_model->update_balance($data);
			
		
		/*echo "<script language=\"javascript\">alert('Transaction Successful');</script>";*/
		echo '<div class="alert alert-success">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> Transaction Successful.
</div>';
		
		$this->index();
		}
		
	else if($error_id == 100)
		{
			/*echo "<script language=\"javascript\">alert('Transaction Pending');</script>";*/
			echo '<div class="alert alert-success">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Pending!</strong> Transaction Pending.
</div>';
			$this->index();
		}
		
		else if($error_id == -1611)
		{
			/*echo "<script language=\"javascript\">alert('Duplicate request,please try after 10 minutes');</script>";*/
			echo '<div class="alert alert-success">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Wait!</strong> Duplicate request,please try after 10 minutes.
</div>';
			$this->index();
		}
		
		else 
		{
			/*echo "<script language=\"javascript\">alert('Transaction Failure');</script>";*/
			echo '<div class="alert alert-success">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> Transaction Failure
</div>';
			//return 'Transaction Failure.';
		}
		
		if($error_id ==1)
		{
			$error_status=1;
		}
		 else if($error_id==100)
		{
			$error_status=2;
		}
		else
		{
			$error_status=0;
		}
		
		
		 $error_datas=array(
				'result'=>$error_description,
				'error_status_code'=>$error_status,
		);
		$update_error_status = $this->recharge_model->update_recharge_error_status($error_datas,$insert);
		$this->index();
		
		} /*EZPAY else part close*/
	
			
		}
		}
else if($amount > $avaliable_amount)
{
	/* echo "<script type='text/javascript'>$('#myModalx').modal();</script>"; */
	 echo '<div class="alert alert-success">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Insufficient!</strong> Insufficent balance.
</div>'; 
	//$msg="Insufficent balance";
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
		$by_id=$this->session->userdata('uid');
		/*$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
			$REMOTE_ADDR=$hostname;
			$ip= $REMOTE_ADDR;
			$ip_address=GetHostByName($ip);*/
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
			'by_id' =>$by_id,
			'amount'=>$amount,
			/*'ip' =>$ip_address,*/
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
			
		
		
		/*echo "<script language=\"javascript\">alert('Transaction Successful');</script>";*/
		echo '<div class="alert alert-success">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> Transaction Successful.
</div>';
		$this->index();
		}
		
	else if($error_id == 100)
		{
			/*echo "<script language=\"javascript\">alert('Transaction Pending');</script>";*/
			echo '<div class="alert alert-success">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Pending!</strong> Transaction Pending.
</div>';
			$this->index();
		}
		
		else if($error_id == -1611)
		{
			/*echo "<script language=\"javascript\">alert('Duplicate request,please try after 10 minutes');</script>";*/
			echo '<div class="alert alert-success">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Wait!</strong> Duplicate request,please try after 10 minutes.
</div>';
			$this->index();
		}
		
		else 
		{
			/*echo "<script language=\"javascript\">alert('Transaction Failure');</script>";*/
			echo '<div class="alert alert-success">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Failure!</strong> Transaction Failure.
</div>';
		}
		
		if($error_id ==1)
		{
			$error_status=1;
		}
		 else if($error_id==100)
		{
			$error_status=2;
		}
		else
		{
			$error_status=0;
		}
		
		
		 $error_datas=array(
				'result'=>$error_description,
				'error_status_code'=>$error_status,
		);
		$update_error_status = $this->recharge_model->update_recharge_error_status($error_datas,$insert);
		$this->index();

		
			
 	} /*EZPAY else part close*/
		
			
		}
		}
else if($amount > $avaliable_amount)
{
	/*echo "<script type='text/javascript'>alert('Insufficent balance');</script>";*/
	echo '<div class="alert alert-success">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Insufficient!</strong> Insufficent balance.
</div>';
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
		$by_id=$this->session->userdata('uid');
		/*$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
			$REMOTE_ADDR=$hostname;
			$ip= $REMOTE_ADDR;
			$ip_address=GetHostByName($ip);*/
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
			'by_id' =>$by_id,
			'by'=>$by,
			'amount'=>$amount,
			/*'ip' =>$ip_address,*/
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
			$url ="http://103.29.232.110:8089/Ezypaywebservice/postpaidpush.aspx?AuthorisationCode=de4527cfd9674f86bc&product=33&MobileNumber=$mobilenumber&Amount=$amount&RequestId=&Circle=&AcountNo=1400050241&StdCode=091";
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
		
		$update_trans_id = $this->recharge_model->update_recharge_trans_id($data,$insert);
			
			$login_user_tbalance =$this->input->post('tot_bal');
			$login_user_ubalance =$this->input->post('used_balance');
			$balz=$login_user_ubalance+$amount;
			$data=array(
		'used_balance' =>$balz,
		);
			$updat_bal = $this->recharge_model->update_balance($data);
		
		/*echo "<script language=\"javascript\">alert('Transaction Successful');</script>";*/
		echo '<div class="alert alert-success">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> Transaction Successful.
</div>';
		$this->index();
		}
	
		else if($error_id == 100)
		{
			/*echo "<script language=\"javascript\">alert('Transaction Pending');</script>";*/
				echo '<div class="alert alert-success">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Pending!</strong> Transaction Pending.
</div>';
			
			$this->index();
		}
		
		else if($error_id == -1611)
		{
			/*echo "<script language=\"javascript\">alert('Duplicate request,please try after 10 minutes');</script>";*/
			echo '<div class="alert alert-success">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Wait!</strong> Duplicate request,please try after 10 minutes.
</div>';
			$this->index();
		}
		
		else 
		{
			/*echo "<script language=\"javascript\">alert('Transaction Failure');</script>";*/
			echo '<div class="alert alert-success">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Failure!</strong> Transaction Failure.
</div>';
		}
		
		if($error_id ==1)
		{
			$error_status=1;
		}
		 else if($error_id==100)
		{
			$error_status=2;
		}
		else
		{
			$error_status=0;
		}
		
		
		 $error_datas=array(
				'result'=>$error_description,
				'error_status_code'=>$error_status,
		);
		$update_error_status = $this->recharge_model->update_recharge_error_status($error_datas,$insert);
		$this->index();

		

			
			
			} /*EZPAY else part close*/
			
		}
		}
else if($amount > $avaliable_amount)
{
	/*echo "<script type='text/javascript'>alert('Insufficent balance');</script>";*/
	echo '<div class="alert alert-success">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Insufficient!</strong> Insufficent balance.
</div>';
	$this->index();
		
}


else
{
	$this->index();
}
	




		
		
		}
		
		
		
		
	}