<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class longcoderecharge extends MX_Controller {
		
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');			 
			$this->load->model('longcoderecharge_model');
			$this->load->helper('string');
			$this->load->helper('date');
			$this->load->helper(array('form', 'url'));
		}

		public function index()
		{ 
			$this->recharge();
		}	
		
		public function get_lost($user_mobile, $msg){
			if ( $msg == "" ) $msg =  ' Your Keyword is Invalid ';
			
			$send_success_sms=$this->longcoderecharge_model->send_sms($user_mobile, $msg);  	//($mobilenumber, $msg)	 
			exit(' Your Keyword is Invalid'); 
		}
		public function postpaid($data)
		{
			exit('success');
		}

		public function recharge()
		{
			
	//print_r($_POST)."<br/>";
		  $send= $_POST['Send'];
		  $msg  = $_POST['Rawmessage'];
		  $time = $_POST['Time'];
		  $mid = $_POST['MID'];
		  $vn = $_POST['VN'];
//$this->longcoderecharge_model->add_longcode_call(array('SENDER'=>$send,'RAWMESSAGE'=>$msg,'TIME_IN'=>$time,'MID'=>$mid,'VN'=>$vn ));
		  $data=(explode(' ',$msg)); 
		  
		  $mobile_len = strlen( $send );
		  if (  $mobile_len > 10 ) 
		  {	
			  $len =   ( $mobile_len - 10 );
			   $user_mobile =   substr( $send,$len,strlen($send));
		  }else
		  {
		   $user_mobile =  $send;
		  }
		  
			 if(count($data)  > 0 && count($data) <=4 ) {  
			 
			 
				
				 
				   if ( count( $data ) == 1 ){
					    $segment=  trim($data[0]);
						
						$user = $this->longcoderecharge_model->get_details($user_mobile);
	   					$send_money_bal =( $user->total_balance - $user->used_balance ) ;
						$user_name = $user->name;
					 
						
					   if( $segment == 'BAL' )//BAL      for current user sendmmoney balance 
					  { 
					   $send_success_sms=$this->longcoderecharge_model->send_sms($user_mobile,' Dear '.$user_name.', Your current balance is Rs.'.$send_money_bal."/-.");
			   $this->longcoderecharge_model->update_longcode_call($mid,'success');
						 return;
					  }else{
						  
						 $this->get_lost($user_mobile,"");    
					  }
				   }elseif( count( $data ) == 2 ){
					 $segment=  trim($data[1]);
				
				 	 $user = $this->longcoderecharge_model->get_details($user_mobile);
					 
					 	if( $user ){ 
							$user_balance_request = $user->available_balance;
							$user_name = $user->name;
							$user_id = $user->uid; 
						}else{
						 	$this->get_lost($user_mobile," Your account has been Inactive. ");    
						}
						 
						
				  	  if( $segment == 'BAL' )//PAY BAL
					  {  
	 					//Dear XXXXX, Your current balance is Rs. XXXXX/-.
			 $send_success_sms=$this->longcoderecharge_model->send_sms($user_mobile,' Dear '.$user_name.', Your current balance is Rs.'.$user_balance_request."/-.");
			   $this->longcoderecharge_model->update_longcode_call($mid,'success');
						 return;
						   	//($mobilenumber, $msg)	 
		   
					  }
					  elseif ( $segment == 'HIS' )//PAY HIS
					  {
						 
					echo "<br/>".	 $msg= "Last 3 Transactions 9940513014 SUCCESS, 9791381432 SUCCESS, 8056068221 SUCCESS";//$this->longcoderecharge_model->history($user_id);
						//echo  $user_mobile.",".$msg;
						  $send_success_sms=$this->longcoderecharge_model->send_sms($user_mobile,$msg);
						//  $send_success_sms=$this->longcoderecharge_model->send_sms($user_mobile,' Dear HISCALL, Your current balance is Rs.'.$user_balance_request."/-.");
						 $this->longcoderecharge_model->update_longcode_call($mid,'success');
						 return; 
					  }
					  elseif ( $segment == 'LOGIN' )//PAY LOGIN  Last 3 Transaction XXXXXXXXX SUCCESS,XXXXXXXXX FAIL, XXXXXXXXX PENDING
					  {
						 
						 $distributor = $this->longcoderecharge_model->get_user_with_mobile($user_mobile);
						
						if( $distributor ){
							      
						 $msg = "PAY HIS Dear ".$distributor->name.",Your User ID: ".$distributor->username.", Pass: ".$distributor->password.".Thanks for using PAYBUKS.";
						//echo  $user_mobile.",".$msg;
						  $send_success_sms=$this->longcoderecharge_model->send_sms($user_mobile,$msg);
						//  $send_success_sms=$this->longcoderecharge_model->send_sms($user_mobile,' Dear HISCALL, Your current balance is Rs.'.$user_balance_request."/-.");
						 $this->longcoderecharge_model->update_longcode_call($mid,'success');
						 return; 
						}else{
							  $send_success_sms=$this->longcoderecharge_model->send_sms($user_mobile,'PAY LOGIN Dear Invaliduser,Your User ID: '.$user_mobile.', Pass: XXXXXXXXXX.Thanks for using PAYBUKS. ');  	//($mobilenumber, $msg)	 
						   exit();  
						}
					  }else{ 
						$this->get_lost($user_mobile,"");     
					  }
					  
				}elseif( count( $data ) == 3 ){
					
					  $segment=  trim($data[0]);
					if ( $segment == 'FUND' )  //FUND MOBILE AMOUNT 
					  {
						   $input_data['amount'] = trim($data[2]);
					    
						 
						  
						 $input_data['mobilenumber'] = trim($data[1]);
						
					/*  1. Validate the distributor account exits with us
						2. Check the distributor balance is available for current transaction
						3. Check the Retailer account is valid
						4. Update the retailer available balance & total Balance 
						5. Deduct the distributor available_balance & add the amount in USED BALANCE and update it
						6. 
					
					*/
						$distributor = $this->longcoderecharge_model->get_dis_details($user_mobile);
						
						if( $distributor ){
							  $input_data['distributor'] = $distributor;
							  $input_data['sender'] = $send;
							 $this->fundtransfer($input_data); 
				
						}else{
							  $this->get_lost($user_mobile,"");    
						}
						 
						   $this->longcoderecharge_model->update_longcode_call($mid,'success');
						 return; 
					  }elseif ( $segment == 'SMFUND' )  //SMFUND MOBILE AMOUNT 
					  {
						 $input_data['mobilenumber'] = trim($data[1]);
						 $input_data['amount'] = trim($data[2]);
					 
						 
						$distributor = $this->longcoderecharge_model->get_dis_details($user_mobile);
				 
						if( $distributor ){
							  $input_data['distributor'] = $distributor;
							  $input_data['sender'] = $send;
							 $this->moneytransfer($input_data); 
				
						}else{
							  $this->get_lost($user_mobile,"");    
						}
						 
						   $this->longcoderecharge_model->update_longcode_call($mid,'success');
						 return; 
					  }else{
						  
						$this->get_lost($user_mobile,"");    
					  }
					
				}elseif ( count( $data ) == 4  ){
					$segment=  trim($data[1]);
						 $input_data['amount'] = trim($data[1]);
						 $input_data['mobilenumber'] = trim($data[2]);
						 
						 if(  $input_data['amount']  >= 1000 ){  
						 
						  $user = $this->longcoderecharge_model->get_details($user_mobile);
					 
					 	if( $user ){ 
							$available_balance = $user->available_balance; 
						 
						  $error_status=0;
						  $send_failure_sms =$this->longcoderecharge_model->send_failure_sms( $input_data['mobilenumber'],$available_balance,$error_status, $input_data['amount'],0,$user_mobile); 
						 	exit('failre due to exxcess amount');	
						}else{
						 	$this->get_lost($user_mobile," Your account has been Inactive. ");    
						} 
						  
						}else{
					//	exit('stpped');	
						}
						 	  
						
						  $prcode = trim($data[3]);
						  $input_data['mid'] = $_POST['MID'];
						  
					}	else{
						$this->get_lost($user_mobile,"");   
					}
				  
				  
			 }else
			 {
				 $this->get_lost($user_mobile,"");   
			 }
		
			 
			 $prepaid = array("1"=>"AIRT", "34"=>"IDEA", "2"=>"AIRC", "23"=>"LOOPM","14"=>"MTS","18"=>"RELING","19"=>"RELINC","17"=>"TATTS","15"=>"TADOC","16"=>"TADOCSP","4"=>"BSNL","3"=>"BSNLVAL","12"=>"VODAF","6"=>"UNINO","5"=>"UNINOSP","11"=>"MTNL","44"=>"MTNLVAL","21"=>"VIDEO","22"=>"VIDEOSP" );
			 
	 $postpaid = array("32"=>"AIRTPP","31"=> "BSNLPP", "52"=> "TADOCPP", "33"=>"IDEAPP","50"=>"LOOPMPP","59"=>"RELPP","12"=>"TATTSPP","11"=>"VODAFPP");
				$billpaid = array("AIRTL","RELENG","BSESR","MTNLDEL" );//51=>MTNLDEL,"48"=>AIRTL
			   $dthpaid = array( "10"=>"ADIGT","20"=> "BIGTV", "7"=>"DISHTV","8"=>"SUNTV","13"=>"VID2H","9"=>"TASKY"  );
			   
			//print_r($prepaid);
		 
			
			  $prepaid_pr = array_search( $prcode, $prepaid);
			  $postpaid_pr = array_search($prcode, $postpaid);
			  $billpaid_pr = array_search($prcode, $billpaid);
			  $dthpaid_pr = array_search($prcode, $dthpaid);
			
			 
			  
			     $input_data['sender'] = $user_mobile;
			   
		  if (  $prepaid_pr   !== false )
			 {
			  // get prepaid commission details
			//   echo "Check it out <br/>".$prcode;
			   
			  $input_data['serviceprovider'] = $prepaid_pr;
			
				  $this->prepaid( $input_data );
			 }  else if(  $dthpaid_pr   !== false  )
			 {
				  if(  $input_data['amount']  >= 3000 ){  
						 
						  $user = $this->longcoderecharge_model->get_details($user_mobile);
					 
					 	if( $user ){ 
							$available_balance = $user->available_balance; 
						 
						  $error_status=0;
						  $send_failure_sms =$this->longcoderecharge_model->send_failure_sms( $input_data['mobilenumber'],$available_balance,$error_status, $input_data['amount'],0,$user_mobile); 
						 	exit('failre due to exxcess amount');	
						}else{
						 	$this->get_lost($user_mobile," Your account has been Inactive. ");    
						} 
						  
						} 
				 
				 
			   $input_data['serviceprovider'] = $dthpaid_pr;
			   $this->dthpaid($input_data);
			 } 	
		  else if(  $postpaid_pr  !== false )
			 {
				 if(  $input_data['amount']  >= 300 ){  
						 
						  $user = $this->longcoderecharge_model->get_details($user_mobile);
					 
					 	if( $user ){ 
							$available_balance = $user->available_balance; 
						 
						  $error_status=0;
						  $send_failure_sms =$this->longcoderecharge_model->send_failure_sms( $input_data['mobilenumber'],$available_balance,$error_status, $input_data['amount'],0,$user_mobile); 
						 	exit('failre due to exxcess amount');	
						}else{
						 	$this->get_lost($user_mobile," Your account has been Inactive. ");    
						} 
						  
						} 
				 
				   $input_data['serviceprovider'] = $postpaid_pr;
			   $this->postpaid( $input_data );
			 } 
			 else if(  $billpaid_pr   !== false  )
			 {
			   $input_data['serviceprovider'] = $billpaid_pr;
			   $this->billpaid($input_data);
			 } 	
			else{
				  //  echo  $prepaid_pr ." oooooo t <br/>".$prcode;
				  
				   $send_success_sms=$this->longcoderecharge_model->send_sms($user_mobile,' Recharge transaction failed '.$msg);  	//($mobilenumber, $msg)	  
				return "data is empty" ; 
			 }
			
		}
public function fundtransfer($data)
{
	 $distributor = $data['distributor'];
	
	$mobilenumber = $data['mobilenumber'];
	 $amount= $data['amount'];
	 $retailer = $this->longcoderecharge_model->get_details( $mobilenumber );
	
     $commentby="Balance transfered by ".$distributor->name;
     $commentto="Balance transfered to ".$retailer->name;
	 
	 $timezone = new DateTimeZone("Asia/Kolkata" );

	  $date = new DateTime();
	  $date->setTimezone($timezone );
	  $date = $date->format( 'Y-m-d H:i:s' );
	 
	 
     $dis_msg="BALANCE TRANSFER ".$retailer->name." transferred Rs .$amount/- for Member Id: ".$retailer->username." On $date";
     $ret_msg="BALANCE TRANSFER ".$distributor->name." transferred Rs .$amount/- to Member Id: ".$distributor->username." On $date";
	 
	 $amount = $data['amount'];
	 $avaliable_amount = $distributor->available_balance;
	  
     if($amount < $avaliable_amount && $amount >=0  )
     {
		 
	  $dis_avaiable_bal = $distributor->total_balance -  $distributor->used_balance;
	  //$total_balance = $distributor->total_balance;
	  
      $dis_cur_avaiable_bal = $dis_avaiable_bal - $amount;            // To distributor available balance
	  $dis_used_balance =  $distributor->used_balance + $amount;
			   
      $ret_avaiable_bal=$retailer->available_balance + $amount;
	  
	  $ret_total_balance = $retailer->total_balance+ $amount; 
	  
	  
	  // update_balance_with_id($data,$id)
	  // update retailer accIount 
	  $data = array('total_balance'=>$ret_total_balance,'available_balance'=>$ret_avaiable_bal,);
      $update_avail = $this->longcoderecharge_model->update_balance_with_id($data,$retailer->uid);
	
	  
	  
  
	  if($update_avail)
     {
		// $sql = "insert into ledgerreport  (date,type,comment,amount,by_id,to_id)values('$date','$type','$commentby','$amount','$sess_id','$ids')"; 
		  
		// update distributor accIount 
		$data = array('used_balance'=>$dis_used_balance,'available_balance'=>$dis_cur_avaiable_bal,);
        $update = $this->longcoderecharge_model->update_balance_with_id($data,$distributor->uid);
	    
		$sql = "INSERT INTO  `ledgerreport` (`id`, `date`, `type`, `comment`, `amount`, `by_id`, `to_id`) VALUES (NULL, '".$date."', '".$retailer->type."', '".$commentto."', '".$amount."', '".$distributor->uid."', '".$retailer->uid."'), (NULL, '".$date."', '".$distributor->type."', '".$commentby."', '".$amount."', '".$distributor->uid."', '".$retailer->uid."');";
	 $ins =  $this->longcoderecharge_model->add_ledgerreport($sql,$distributor->mobile,$retailer->mobile,$dis_msg,$ret_msg);//($sql,$mobile,$mobile1,$testing)
	  if(  $ins == false){
		  echo " Legder insertion  Failed";
	  }else{
			echo "Fund transfer Successfully";
		  } 
		}
	  }
	  else
	  {
		$this->longcoderecharge_model->send_insufficient_sms($distributor->mobile,$avaliable_amount,0,$amount,0,$by_id);
		echo "Insufficent balance";
	  } 	
	
}

public function moneytransfer($data)
{
	 $distributor = $data['distributor'];
	$mobilenumber = $data['mobilenumber'];
	 $amount = $data['amount'];
	 $retailer = $this->longcoderecharge_model->get_details_to_dis($mobilenumber,$distributor->uid);
	if( $retailer == false){ 
		 $this->get_lost($distributor->mobile," Invalid Retailer number");    
	}
     $commentby="Balance transfered by ".$distributor->name;
     $commentto="Balance transfered to ".$retailer->name;
	 
	 $timezone = new DateTimeZone("Asia/Kolkata" );

	  $date = new DateTime();
	  $date->setTimezone($timezone );
	  $date = $date->format( 'Y-m-d H:i:s' );
	 
	 
     $dis_msg="BALANCE TRANSFER ".$retailer->name." transferred Rs .$amount/- for Member Id: ".$retailer->username." On $date"; // dis
     $ret_msg="BALANCE TRANSFER ".$distributor->name." transferred Rs .$amount/- to Member Id: ".$distributor->username." On $date"; // ret
	 
	 $amount = $data['amount'];
	  
	 $avaliable_amount = ( $distributor->send_money_bal - $distributor->sendmoney_used_bal ) ;
	  
     if($amount < $avaliable_amount && $amount >=0  )
     { 
	  $dis_avaiable_bal = $distributor->send_money_bal -  $distributor->sendmoney_used_bal;
	  //$total_balance = $distributor->send_money_bal;
	  
    //  $dis_cur_avaiable_bal = $dis_avaiable_bal + $amount;            // To distributor available balance
	  $dis_used_balance =  $distributor->sendmoney_used_bal + $amount;
			   
//      $ret_avaiable_bal=$retailer->available_balance + $amount;
	  
	  $ret_total_balance = $retailer->send_money_bal + $amount;  
	  
	  // update_balance_with_id($data,$id)
	  // update retailer accIount 
	  $data = array('send_money_bal'=>$ret_total_balance,);
      $update_avail = $this->longcoderecharge_model->update_balance_with_id($data,$retailer->uid); 
	  
  
	  if($update_avail)
     {
		// $sql = "insert into ledgerreport  (date,type,comment,amount,by_id,to_id)values('$date','$type','$commentby','$amount','$sess_id','$ids')"; 
		  
		// update distributor accIount 
		$data = array('sendmoney_used_bal'=>$dis_used_balance,);
        $update = $this->longcoderecharge_model->update_balance_with_id($data,$distributor->uid);
	    
		$sql = "INSERT INTO  `ledgerreport` (`id`, `date`, `type`, `comment`, `amount`, `by_id`, `to_id`) VALUES (NULL, '".$date."', '".$retailer->type."', '".$commentto."', '".$amount."', '".$distributor->uid."', '".$retailer->uid."'), (NULL, '".$date."', '".$distributor->type."', '".$commentby."', '".$amount."', '".$distributor->uid."', '".$retailer->uid."');";
	 $ins =  $this->longcoderecharge_model->add_ledgerreport($sql,$distributor->mobile,$retailer->mobile,$dis_msg,$ret_msg);//($sql,$mobile,$mobile1,$testing)
	  if(  $ins == false){
		  echo " Legder insertion  Failed";
	  }else{
			echo "Money transfer Successfully";
		  } 
		}
	  }
	  else
	  {//( $mobilenumber,$avaliable_amount,$error_id,$amount,$trans_id,$user_mobile )
		$this->longcoderecharge_model->send_insufficient_sms($distributor->mobile,$avaliable_amount,9,$amount,3,$distributor->uid);  
		echo "Insufficent balance";
	  } 	
	
}
public function prepaid($data)
{
	/* */
 
	  $serviceprovider = $data['serviceprovider'];
	  $mobilenumber = $data['mobilenumber'];
	  $amount = $data['amount'];
	  $type_ser=  'prepaid';
	  
	  $mid = 	 $data['mid'];		
				
	  $user_mobile =  $data['sender'];//substr( $data['sender'],2,strlen($data['sender']));  		
				
	  $user = $this->longcoderecharge_model->get_details($user_mobile);
	  
	  // Get the retailer logged in details from session
	  if( $user ){
	  $by_id=$user->uid;
	  $by=$user->username;
	  $parent_id=$user->parent_id;
	  }else{
		    $send_success_sms=$this->longcoderecharge_model->send_sms($user_mobile,' Invalid retailer account ');  	//($mobilenumber, $msg)	 
		 exit();  
	  }
	
	
	$avaliable_amount =$user->available_balance;
	
	if( $amount <= $avaliable_amount && $amount != 0 )  
		{
	//  Get the commission details from provider tables
			$provider = $this->longcoderecharge_model->get_commission_by_providers($serviceprovider);
			
			$timezone = new DateTimeZone("Asia/Kolkata");
			$date = new DateTime();
			$date->setTimezone($timezone);
			
			$recharge_date=$date->format('Y-m-d H:i:s');	
							 
			$auto_code=$this->longcoderecharge_model->generateRandomString($length = 6);
			$req_id="BT00".$auto_code;
	
			$rdData=array(
			'serviceprovider'=>$provider->provider,
			'mobilenumber'=>$mobilenumber,
			'rdate'=>$recharge_date,
			'service'=>$provider->name,
			'type'=>$type_ser,			
			'by'=>$by,
			'by_id' =>$by_id,
			'amount'=>$amount,	
			'req_id' =>$req_id,	
			'recharge_type' =>'sms',						
		);

		$recharge_id =$this->longcoderecharge_model->insert_recharge_details($rdData);
		
		if($recharge_id)
		{
			//curl_call( $url,$provider,$user,$recharge_id);
			 if($serviceprovider== 1)
			{ 
			 $store_id="BLUZ500021EZPY";
		$url = "https://api.myezypay.in/Ezypaywebservice/PushRequest.aspx?AuthorisationCode=de4527cfd9674f86bc&product=$serviceprovider&MobileNumber=$mobilenumber&Amount=$amount&StoreID=$store_id&RequestId=$req_id";				
			}
			else
			{
				
		echo		 $url = "https://api.myezypay.in/Ezypaywebservice/PushRequest.aspx?AuthorisationCode=de4527cfd9674f86bc&product=$serviceprovider&MobileNumber=$mobilenumber&Amount=$amount&RequestId=$req_id";
			} 
			
		  $ch = curl_init();
		  curl_setopt($ch, CURLOPT_URL, $url);
		  curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		  curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
		  $data = curl_exec($ch);
		  curl_close($ch);
		  $get_trans=(explode("~",$data));
		  $trans_id=$get_trans[0];
		  $error_id=$get_trans[3];
		  $error_description=$get_trans[4];
		  
		  $trans_date=$date->format('Y-m-d H:i:s');	
		  
		  if($error_id ==1  )
		  {
			  $error_status=1;
			  
			  $retail_commission =  ($provider->commission  / 100) * $amount;
			  $dis_commission =  ($provider->dcommission  / 100) * $amount;
			  
			  $available_totalbalance =  ($user->total_balance - $user->used_balance )- $amount ; 
			  $total_balance = $user->total_balance + $retail_commission ;
			  $used_balance = $user->used_balance + $amount;
			  $before_balance = $user->available_balance; 
			  $after_balance = $available_totalbalance + $retail_commission; 
			  
			  
			  // update user balance 
			  $data=array('total_balance'=>$total_balance,
				'used_balance'=>$used_balance,
				'available_balance'=>$after_balance, 
			);
			 
			$this->longcoderecharge_model->update_balance_with_id($data,$by_id);  
			
			// update dcommission
			$parent=$this->longcoderecharge_model->get_parent_total_detail($parent_id);
			$dis_total_balance = $parent->total_balance + $dis_commission;
			$dis_available_balance =  $parent->available_balance + $dis_commission;
			 $parent_data=array('total_balance'=>$dis_total_balance, 
				'available_balance'=>$dis_available_balance, 
			);
				$this->longcoderecharge_model->update_balance_with_id($parent_data,$parent_id);
			
			 	  $end_trns=$date->format('Y-m-d H:i:s');	
			  //Update the recharge details
			  $error_datas=array('after_balance'=>$after_balance,'before_balance'=>$before_balance,'commission'=>$retail_commission,'dcommission'=>$dis_commission,'result'=>$error_description,'error_status_code'=>$error_status,'trans_id'=>$trans_id,'end_trns'=>$end_trns);
			  $update_RD_error_status = $this->longcoderecharge_model->update_recharge_error_status($error_datas,$recharge_id);
	   
			  // SEND SMS
			  $send_success_sms=$this->longcoderecharge_model->send_success_sms($mobilenumber,$after_balance,$error_id,$amount,$trans_id,$user_mobile);  		 
		  
				   $this->longcoderecharge_model->add_recharge_commission( array('recharge_id'=>$recharge_id,'transaction_status'=>'Success','user_id'=>$by_id,'commission'=>$retail_commission,'created_date'=>$trans_date ) );
								  //Distributor Commission
					$this->longcoderecharge_model->add_recharge_commission( array('recharge_id'=>$recharge_id,'transaction_status'=>'Success','user_id'=>$parent_id,'commission'=>$dis_commission,'created_date'=>$trans_date ) );
		  
		  $this->longcoderecharge_model->update_longcode_call($mid,'success');
		  
		  
			  header('Content-Type: application/json');
			  $response = array('message' => 'Transaction Successful','class' => 'success','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id);
			  echo json_encode($response); 
		 
			  return true;
			  
		  }
		   else if($error_id==100 || $error_id==200)//Transaction Pending
		  {
			  $error_status=2;
			  
			  $available_totalbalance =  ($user->total_balance - $user->used_balance )- $amount ;  
			  $used_balance = $user->used_balance + $amount;
			  $before_balance = $user->available_balance; 
			  $after_balance = $available_totalbalance;
			   
				// update user balance 
			  $data=array( 
				'used_balance'=>$used_balance,
				'available_balance'=>$after_balance, 
			);
			
			   
			  $send_pending_sms =$this->longcoderecharge_model->send_pending_sms($mobilenumber,$available_totalbalance,$error_id,$amount,$trans_id,$user_mobile);							
			   
			   $error_datas=array('after_balance'=>$after_balance,'before_balance'=>$before_balance,'commission'=>0,'dcommission'=>0,'result'=>$error_description,'error_status_code'=>$error_status,'trans_id'=>$trans_id);
			   
			  $reversal_request = $this->longcoderecharge_model->add_reversal_request( array('recharge_id'=>$recharge_id,'requester_id'=>$by_id,'to_id'=>$parent_id,'requested_date'=>$trans_date,'request_status'=>'Pending' ) ); 
			   
			   
			  $response = array('message' => 'Transaction Pending','class' => 'fail','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id); 
			   
			  
			   
		  }else if($error_id == -1611)//Duplicate
		  {
			  $send_duplicate_sms =$this->longcoderecharge_model->send_duplicate_sms($mobilenumber,$avaliable_amount,$error_id,$amount,$trans_id,$user_mobile);			 
				 
			   $response = array('message' => 'Duplicate request,please try after 10 minutes','class' => 'fail','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id);
			   
	   
		  } // -1605 Insufficient Balanc
		  else if($error_id == -1605)//Insufficient Balanc
		  {
			$this->alert($data); 
			
			$response = array('message' => 'Please try after 10 minutes','class' => 'fail','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id); 
		  }
		  else
		  {
			  $error_status=0;
			  $send_failure_sms =$this->longcoderecharge_model->send_failure_sms($mobilenumber,$avaliable_amount,$error_id,$amount,$trans_id,$user_mobile); 
					
			   $response = array('message' => 'Transaction Failure','class' => 'fail','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id,'api'=>$data);
			  
		  }
			header('Content-Type: application/json');
			 echo json_encode($response);
		}
		else // recharge insertion failed
		{
			echo "Insertion is failed";
		} 
			
	}
	else{
		// User insuffient balance	
	
			 $trans_id=0;
			 $error_id=-999999;


		$send_insufficient_sms =$this->longcoderecharge_model->send_insufficient_sms($distributor->mobile,$avaliable_amount,0,$amount,0,$by_id);
		//   header('Content-Type: application/json');
		   $response = array('message' => 'Insufficient Balance','class' => 'fail');
		   echo json_encode($response);		
	
	}	
	  $this->longcoderecharge_model->update_longcode_call($mid,'failure');	 

		
} 

public function dthpaid($data)
{
	/* */
 
	  $serviceprovider = $data['serviceprovider'];
	  $mobilenumber = $data['mobilenumber'];
	  $amount = $data['amount'];
	  $type_ser=  'prepaid';
	  
	  $mid = 	 $data['mid'];		
				
	  $user_mobile =  $data['sender'];//substr( $data['sender'],2,strlen($data['sender']));  		
				
	  $user = $this->longcoderecharge_model->get_details($user_mobile);
	  
	  // Get the retailer logged in details from session
	  if( $user ){
	  $by_id=$user->uid;
	  $by=$user->username;
	  $parent_id=$user->parent_id;
	  }else{
		    $send_success_sms=$this->longcoderecharge_model->send_sms($user_mobile,' Invalid retailer account ');  	//($mobilenumber, $msg)	 
		 exit();  
	  }
	
	
	$avaliable_amount =$user->available_balance;
	
	if( $amount <= $avaliable_amount && $amount != 0 )  
		{
	//  Get the commission details from provider tables
			$provider = $this->longcoderecharge_model->get_all_dth_details($serviceprovider);
			
			$timezone = new DateTimeZone("Asia/Kolkata");
			$date = new DateTime();
			$date->setTimezone($timezone);
			
			$recharge_date=$date->format('Y-m-d H:i:s');	
							 
			$auto_code=$this->longcoderecharge_model->generateRandomString($length = 6);
			$req_id="BT00".$auto_code;
	
			$rdData=array(
			'serviceprovider'=>$provider->provider,
			'mobilenumber'=>$mobilenumber,
			'rdate'=>$recharge_date,
			'service'=>$provider->name,
			'type'=>$type_ser,			
			'by'=>$by,
			'by_id' =>$by_id,
			'amount'=>$amount,	
			'req_id' =>$req_id,	
			'recharge_type' =>'sms',						
		);

		$recharge_id =$this->longcoderecharge_model->insert_recharge_details($rdData);
		
		if($recharge_id)
		{
			//curl_call( $url,$provider,$user,$recharge_id);
			 if($serviceprovider== 10)
			  {
			   $store_id="BLUZ500021EZPY";
		  $url = "https://api.myezypay.in/Ezypaywebservice/PushRequest.aspx?AuthorisationCode=de4527cfd9674f86bc&product=$serviceprovider&MobileNumber=$mobilenumber&Amount=$amount&StoreID=$store_id&RequestId=$req_id";				
			  }
			  else
			  {
				  
				   $url = "https://api.myezypay.in/Ezypaywebservice/PushRequest.aspx?AuthorisationCode=de4527cfd9674f86bc&product=$serviceprovider&MobileNumber=$mobilenumber&Amount=$amount&RequestId=$req_id";
			  } 
			
		  $ch = curl_init();
		  curl_setopt($ch, CURLOPT_URL, $url);
		  curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		  curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
		  $data = curl_exec($ch);
		  curl_close($ch);
		  $get_trans=(explode("~",$data));
		  $trans_id=$get_trans[0];
		  $error_id=$get_trans[3];
		  $error_description=$get_trans[4];
		  
		  $trans_date=$date->format('Y-m-d H:i:s');	
		  
		  if($error_id ==1  )
		  {
			  $error_status=1;
			  
			  $retail_commission =  ($provider->commission  / 100) * $amount;
			  $dis_commission =  ($provider->dcommission  / 100) * $amount;
			  
			  $available_totalbalance =  ($user->total_balance - $user->used_balance )- $amount ; 
			  $total_balance = $user->total_balance + $retail_commission ;
			  $used_balance = $user->used_balance + $amount;
			  $before_balance = $user->available_balance; 
			  $after_balance = $available_totalbalance + $retail_commission; 
			  
			  
			  // update user balance 
			  $data=array('total_balance'=>$total_balance,
				'used_balance'=>$used_balance,
				'available_balance'=>$after_balance, 
			);
			 
			$this->longcoderecharge_model->update_balance_with_id($data,$by_id);  
			
			// update dcommission
			$parent=$this->longcoderecharge_model->get_parent_total_detail($parent_id);
			$dis_total_balance = $parent->total_balance + $dis_commission;
			$dis_available_balance =  $parent->available_balance + $dis_commission;
			 $parent_data=array('total_balance'=>$dis_total_balance, 
				'available_balance'=>$dis_available_balance, 
			);
				$this->longcoderecharge_model->update_balance_with_id($parent_data,$parent_id);
			
			 	  $end_trns=$date->format('Y-m-d H:i:s');	
			  //Update the recharge details
			  $error_datas=array('after_balance'=>$after_balance,'before_balance'=>$before_balance,'commission'=>$retail_commission,'dcommission'=>$dis_commission,'result'=>$error_description,'error_status_code'=>$error_status,'trans_id'=>$trans_id,'end_trns'=>$end_trns);

			  $update_RD_error_status = $this->longcoderecharge_model->update_recharge_error_status($error_datas,$recharge_id);
	   
			  // SEND SMS
			  $send_success_sms=$this->longcoderecharge_model->send_success_sms($mobilenumber,$after_balance,$error_id,$amount,$trans_id,$user_mobile);  		 
		  
				   $this->longcoderecharge_model->add_recharge_commission( array('recharge_id'=>$recharge_id,'transaction_status'=>'Success','user_id'=>$by_id,'commission'=>$retail_commission,'created_date'=>$trans_date ) );
								  //Distributor Commission
					$this->longcoderecharge_model->add_recharge_commission( array('recharge_id'=>$recharge_id,'transaction_status'=>'Success','user_id'=>$parent_id,'commission'=>$dis_commission,'created_date'=>$trans_date ) );
		  
		  $this->longcoderecharge_model->update_longcode_call($mid,'success');
		  
		  
			  header('Content-Type: application/json');
			  $response = array('message' => 'Transaction Successful','class' => 'success','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id);
			  echo json_encode($response); 
		 
			  return true;
			  
		  }
		   else if($error_id==100 || $error_id==200 )//Transaction Pending
		  {
			  $error_status=2;
			  
			  $available_totalbalance =  ($user->total_balance - $user->used_balance )- $amount ;  
			  $used_balance = $user->used_balance + $amount;
			  $before_balance = $user->available_balance; 
			  $after_balance = $available_totalbalance;
			   
				// update user balance 
			  $data=array( 
				'used_balance'=>$used_balance,
				'available_balance'=>$after_balance, 
			);
			
			   
			  $send_pending_sms =$this->longcoderecharge_model->send_pending_sms($mobilenumber,$available_totalbalance,$error_id,$amount,$trans_id,$user_mobile);							
			   
			   $error_datas=array('after_balance'=>$after_balance,'before_balance'=>$before_balance,'commission'=>0,'dcommission'=>0,'result'=>$error_description,'error_status_code'=>$error_status,'trans_id'=>$trans_id);
			   
			  $reversal_request = $this->longcoderecharge_model->add_reversal_request( array('recharge_id'=>$recharge_id,'requester_id'=>$by_id,'to_id'=>$parent_id,'requested_date'=>$trans_date,'request_status'=>'Pending' ) ); 
			   
			   
			  $response = array('message' => 'Transaction Pending','class' => 'fail','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id); 
			   
			  
			   
		  }else if($error_id == -1611)//Duplicate
		  {
			  $send_duplicate_sms =$this->longcoderecharge_model->send_duplicate_sms($mobilenumber,$avaliable_amount,$error_id,$amount,$trans_id,$user_mobile);			 
				 
			   $response = array('message' => 'Duplicate request,please try after 10 minutes','class' => 'fail','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id);
			   
	   
		  } // -1605 Insufficient Balanc
		  else if($error_id == -1605)//Insufficient Balanc
		  {
			$this->alert($data); 
			
			$response = array('message' => 'Please try after 10 minutes','class' => 'fail','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id); 
		  }
		  else
		  {
			  $error_status=0;
			  $send_failure_sms =$this->longcoderecharge_model->send_failure_sms($mobilenumber,$avaliable_amount,$error_id,$amount,$trans_id,$user_mobile); 
					
			   $response = array('message' => 'Transaction Failure','class' => 'fail','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id,'api'=>$data);
			  
		  }
			header('Content-Type: application/json');
			 echo json_encode($response);
		}
		else // recharge insertion failed
		{
			echo "Insertion is failed";
		} 
			
	}
	else{
		// User insuffient balance	
	
			 $trans_id=0;
			 $error_id=-999999;


		$send_insufficient_sms =$this->longcoderecharge_model->send_insufficient_sms($distributor->mobile,$avaliable_amount,0,$amount,0,$by_id);
		//   header('Content-Type: application/json');
		   $response = array('message' => 'Insufficient Balance','class' => 'fail');
		   echo json_encode($response);		
	
	}	
	  $this->longcoderecharge_model->update_longcode_call($mid,'failure');	 

		
} 

// #New Recharge
/*

1. Get the value from the FORM

ubet the commission details from provider

3. Get the user balance from usermaster
 
6. Insert the transaction details in recharge_details table
7. If transaction is sucess
		*) Deduct the Recharge amount  , user available balance - amount , used_balance + amount , total_amount + commission  
     a. calculate the commissions  & stored it in commission managment table & update recharge_details table
	 b. send the sms to retailer and Save the sms in sms_outing
   ELSE transaction is failure 
   		*) Return result is pending should be saved in  stored the values in reversal table
	 b. send the sms to retailer and save data in sms_outing table
	 
	 Update the user balance 
 

*/
 
	
 public function long_code_ad_recharge()
  {  
  	if($this->session->userdata('uid')!='')
	{
		//  Get the value from the FORM
	            $serviceprovider = $this->input->post('serviceprovider');
				$mobilenumber =  $this->input->post('mobilenumber');
				$amount = $this->input->post('amount');
		  		$type_ser=$this->input->post('service_type');
				
				
				// Get the retailer logged in details from session
				$by_id=$this->session->userdata('uid');
				$by=$this->session->userdata('username');
				$parent_id=$this->session->userdata('parent_id');
				$user_mobile=$this->session->userdata('mobile');

		
				//  Get the user balance from usermaster

				$user = $this->recharge_model->get_balance($by_id);
			
				$avaliable_amount = $user->available_balance;
 		        
				if( $amount <= $avaliable_amount && $amount != 0 )  
					{
				//  Get the commission details from provider tables
						$provider = $this->recharge_model->get_provider($serviceprovider); //GET PROVIDER USING SHORT CODES
						
						$timezone = new DateTimeZone("Asia/Kolkata");
						$date = new DateTime();
						$date->setTimezone($timezone);
						
						$recharge_date=$date->format('Y-m-d H:i:s');	
										 
						$auto_code=$this->recharge_model->generateRandomString($length = 6);
						$req_id="BT00".$auto_code;
				
						$rdData=array(
						'serviceprovider'=>$provider->provider,
						'mobilenumber'=>$mobilenumber,
						'rdate'=>$recharge_date,
						'service'=>$provider->name,
						'type'=>$type_ser,			
						'by'=>$by,
						'by_id' =>$by_id,
						'amount'=>$amount,	
						'req_id' =>$req_id,						
					);
		
					$recharge_id =$this->recharge_model->insert_recharge_details($rdData);
					
					if($recharge_id)
					{
						//curl_call( $url,$provider,$user,$recharge_id);
						 if($serviceprovider== 1)
						{ 
						 $store_id="BLUZ500021EZPY";
					$url = "https://api.myezypay.in/Ezypaywebservice/PushRequest.aspx?AuthorisationCode=de4527cfd9674f86bc&product=$serviceprovider&MobileNumber=$mobilenumber&Amount=$amount&StoreID=$store_id&RequestId=$req_id";				
						}
						else
						{
							
							 $url = "https://api.myezypay.in/Ezypaywebservice/PushRequest.aspx?AuthorisationCode=de4527cfd9674f86bc&product=$serviceprovider&MobileNumber=$mobilenumber&Amount=$amount&RequestId=$req_id";
						} 
						
					  $ch = curl_init();
					  curl_setopt($ch, CURLOPT_URL, $url);
					  curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
					  curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
					  $data = curl_exec($ch);
					  curl_close($ch);
					  $get_trans=(explode("~",$data));
					  $trans_id=$get_trans[0];
					  $error_id=$get_trans[3];
					  $error_description=$get_trans[4];
					  
					  $trans_date=$date->format('Y-m-d H:i:s');	
					  
					  if($error_id ==1 )
					  {
						  $error_status=1;
						  
						  $retail_commission =  ($provider->commission  / 100) * $amount;
						  $dis_commission =  ($provider->dcommission  / 100) * $amount;
						  
						  $available_totalbalance =  ($user->total_balance - $user->used_balance )- $amount ; 
						  $total_balance = $user->total_balance + $retail_commission ;
						  $used_balance = $user->used_balance + $amount;
						  $before_balance = $user->available_balance; 
						  $after_balance = $available_totalbalance + $retail_commission; 
						  
						  
						  // update user balance 
						  $data=array('total_balance'=>$total_balance,
							'used_balance'=>$used_balance,
							'available_balance'=>$after_balance, 
						);
						 
						$this->recharge_model->update_balance($data);
						
						// update dcommission
						$parent=$this->recharge_model->get_parent_total_detail($parent_id);
						$dis_total_balance = $parent->total_balance + $dis_commission;
						$dis_available_balance =  $parent->available_balance + $dis_commission;
						 $parent_data=array('total_balance'=>$dis_total_balance, 
							'available_balance'=>$dis_available_balance, 
						);
							$this->recharge_model->update_balance_with_id($parent_data,$parent_id);
						
						 
						  //Update the recharge details
						  $error_datas=array('after_balance'=>$after_balance,'before_balance'=>$before_balance,'commission'=>$retail_commission,'dcommission'=>$dis_commission,'result'=>$error_description,'error_status_code'=>$error_status,'trans_id'=>$trans_id);
						  $update_RD_error_status = $this->recharge_model->update_recharge_error_status($error_datas,$recharge_id);
				   
						  // SEND SMS
						  $send_success_sms=$this->recharge_model->send_success_sms($mobilenumber,$after_balance,$error_id,$amount,$trans_id,$user_mobile);  		 
					  
							   $this->recharge_model->add_recharge_commission( array('recharge_id'=>$recharge_id,'transaction_status'=>'Success','user_id'=>$by_id,'commission'=>$retail_commission,'created_date'=>$trans_date,'transaction_status'=>'Pending' ) );
											  //Distributor Commission
								$this->recharge_model->add_recharge_commission( array('recharge_id'=>$recharge_id,'transaction_status'=>'Success','user_id'=>$parent_id,'commission'=>$dis_commission,'created_date'=>$trans_date ,'transaction_status'=>'Pending') );
					  
					  
					  
						  header('Content-Type: application/json');
						  $response = array('message' => 'Transaction Successful','class' => 'success','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id);
						  echo json_encode($response); 
					 
						  return true;
						  
					  }
					   else if($error_id==100 || $error_id==200)//Transaction Pending
					  {
						  $error_status=2;
						  
						  $available_totalbalance =  ($user->total_balance - $user->used_balance )- $amount ;  
						  $used_balance = $user->used_balance + $amount;
						  $before_balance = $user->available_balance; 
						  $after_balance = $available_totalbalance;
						   
						    // update user balance 
						  $data=array( 
							'used_balance'=>$used_balance,
							'available_balance'=>$after_balance, 
						);
						
						   
						  $send_pending_sms =$this->recharge_model->send_pending_sms($mobilenumber,$available_totalbalance,$error_id,$amount,$trans_id,$user_mobile);							
						   
						   $error_datas=array('after_balance'=>$after_balance,'before_balance'=>$before_balance,'commission'=>0,'dcommission'=>0,'result'=>$error_description,'error_status_code'=>$error_status,'trans_id'=>$trans_id);
						   
						  $reversal_request = $this->recharge_model->add_reversal_request( array('recharge_id'=>$recharge_id,'requester_id'=>$by_id,'to_id'=>$parent_id,'requested_date'=>$trans_date,'request_status'=>'Pending' ) ); 
						   
						   
						  $response = array('message' => 'Transaction Pending','class' => 'fail','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id); 
						   
						  
						   
					  }else if($error_id == -1611)//Duplicate
					  {
						  $send_duplicate_sms =$this->recharge_model->send_duplicate_sms($mobilenumber,$avaliable_amount,$error_id,$amount,$trans_id,$user_mobile);			 
							 
						   $response = array('message' => 'Duplicate request,please try after 10 minutes','class' => 'fail','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id);
						   
				   
					  } // -1605 Insufficient Balanc
					  else if($error_id == -1605)//Insufficient Balanc
					  {
						$this->alert($data); 
						
						$response = array('message' => 'Please try after 10 minutes','class' => 'fail','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id); 
					  }
					  else
					  {
						  $error_status=0;
						  $send_failure_sms =$this->recharge_model->send_failure_sms($mobilenumber,$avaliable_amount,$error_id,$amount,$trans_id,$user_mobile); 
								
						   $response = array('message' => 'Transaction Failure','class' => 'fail','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id,'api'=>$data);
						  
					  }
						header('Content-Type: application/json');
						 echo json_encode($response);
					}
					else // recharge insertion failed
					{
						
					} 
						
			    }
				else{
					// User insuffient balance	
				
				  		 $trans_id=0;
						 $error_id=-999999;
			
			
					$send_insufficient_sms =$this->recharge_model->send_insufficient_sms($distributor->mobile,$avaliable_amount,0,$amount,0,$by_id);
			  	       header('Content-Type: application/json');
					   $response = array('message' => 'Insufficient Balance','class' => 'fail');
					   echo json_encode($response);		
				
				}
	
	
	}
	else
	{
		redirect(site_url('user/index'));
	}
  }
	
	
}

/* 

1. Get the values from IN-COMMING call

2. Check it out what type of transaction 
    a. PreRecharge
	b. PostRecharge
	c. Landline billing
	d. DthRecharge
	e. Fund Transfer between Distributor and Retailers
	f. Check Balance
	
	
3. Call the functions



MONEY FLOW IN PAYBUCKS
 
TRANSFER -> Incommming money   

RECHARGE -> OutGoing money

recharege module -  When it is get Sucess / Pending Need to revise this flow






*/








