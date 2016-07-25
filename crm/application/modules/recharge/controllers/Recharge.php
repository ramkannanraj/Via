<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Recharge extends MX_Controller {
		
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');			 
			$this->load->model('recharge_model');
			$this->load->helper('string');
			$this->load->helper('date');
			$this->load->helper(array('form', 'url'));
		}
 

		public function index()
		{
		   
			if($this->session->userdata('uid')!='')
			{
				
				// Get the available balances from Usermaster for currently logged in user
				// Get the available from ezypay if the value is less than user's available_balance ...show the technical error msg
				
				$user_available_balance = $this->session->userdata('available_balance');
				
				$esay_current_balance = $this->recharge_model->get_ezypay_balance();
			
			$data['Prepaid'] = $this->recharge_model->get_Prepaid();
			$data['dthprovider'] = $this->recharge_model->get_dthprovider();
			$data['Postpaid'] = $this->recharge_model->get_postpaid();
			$data['details'] = $this->recharge_model->get_details();
			$this->load->view("common/header");
		    $this->load->view("common/menu");
			$this->load->view('recharge_2',$data);
			$this->load->view("common/footer");
			}
			else
			{
			redirect(site_url('user/index'));
			}
		}	
		
	 
		
		public function home()
		{
			redirect('user/home');
		} 
public function ad_recharge()
  {  
     
  	if($this->session->userdata('uid')!='')
	{
		//  Get the value from the FORM
                
	            $serviceprovider = $this->input->post('serviceprovider');
              	$mobilenumber =  $this->input->post('mobilenumber');
				$amount = $this->input->post('amount');
		  		$type_ser=$this->input->post('service_type');
									 $con = " mobilenumber :".$mobilenumber." amount :". $amount." type :".$type_ser;

				 if(!isset($serviceprovider) || !isset($amount) || !isset($type_ser) ){
					 header('Content-Type: application/json');
					   $response = array('message' => 'Insufficient Form Data '.$con,'class' => 'fail');
					   echo json_encode($response);	
					   exit();	
				} 
								 
			
				
				// Get the retailer logged in details from session
				$by_id=$this->session->userdata('uid');
				$by=$this->session->userdata('username');
				$parent_id=$this->session->userdata('parent_id');
				$user_mobile=$this->session->userdata('mobile');
	
				//  Get the user balance from usermaster

				$user = $this->recharge_model->get_balance($by_id);
			    
				$avaliable_amount =$user->available_balance;
				
				
 		        //$response = array('message' => 'data :  '.$amount,'class' => 'fail', $user);
					  // echo json_encode($response);	
				  // exit();	
					   
					   
				if ( $amount >= 1000 ){
					$trans_id=0;
					$error_id=-999999; 
					$send_insufficient_sms =$this->recharge_model->send_failure_sms($mobilenumber,$avaliable_amount,$error_id,$amount,$trans_id,$user_mobile);
			  	       header('Content-Type: application/json');
					   $response = array('message' => 'Failure due to exceed the recharge limit amount','class' => 'fail');
					   echo json_encode($response);	
					   exit();	
				}
				
				if($amount <= $avaliable_amount && $amount != 0  )  
					{
						
				//  Get the commission details from provider tables
						$provider = $this->recharge_model->get_commission_by_providers($serviceprovider);
						
						$timezone = new DateTimeZone("Asia/Kolkata");
						$date = new DateTime();
						$date->setTimezone($timezone);
						
						$recharge_date=$date->format('Y-m-d H:i:s');	
										 
						$auto_code=$this->recharge_model->generateRandomString($length = 30);
						$req_id=time().$auto_code;
				        $op_code=$provider->OperatorCode;
						$rdData=array(
						'serviceprovider'=>$provider->provider,
						'mobilenumber'=>$mobilenumber,
						'rdate'=>$recharge_date,
						'service'=>$provider->name,
						'type'=>$type_ser,			
						'by'=>$by,
						'by_id' =>$by_id,
						'amount'=>$amount,	
						'req_id' =>$req_id,'recharge_type' =>'web',						
					);
		
					$recharge_id =$this->recharge_model->insert_recharge_details($rdData);
                   
					
					if($recharge_id)
					{
						
						//curl_call( $url,$provider,$user,$recharge_id);
						// if($serviceprovider== 1)
                        if($serviceprovider)
						{ 
						  	$auto_code=$this->recharge_model->generateRandomString($length = 30);
						$req_id=time().$auto_code;
						 // $url = "http://115.248.39.80/HermesMobAPI/HermesMobile.svc/JSONService/GetRechargeDone";
						  $url="http://api.hermes-it.in/mobile/hermesmobile.svc/JSONService/GetRechargeDone";
$mySOAP = <<<EOD
{
"Authentication": {
"LoginId": "Viapaise",
"Password": "apiViapaise"
},
"UserTrackId": "$req_id",
"RechargeInput": {
"OperatorCode": "$op_code",
"MobileNumber": "$mobilenumber",
"Amount": $amount
}
}
EOD;
// The HTTP headers for the request (based on image above)
$headers = array(
'Content-Type: application/json',
);
// Build the cURL session
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, $mySOAP);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
// Send the request and check the response
if (($result = curl_exec($ch)) === FALSE) {
die('cURL error: '.curl_error($ch)."<br />\n");
} else {
$recharge_test=json_decode($result);

$resultval=$recharge_test->ResponseStatus;
 $trans_id=$recharge_test->UserTrackId;
 $error_id=$resultval;
$error_description='test';
					  
$trans_date=$date->format('Y-m-d H:i:s');	

}

curl_close($ch);
if($resultval==1)
{
   $error_status=1;
   $error_description='success';
						  
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
						 // $send_success_sms=$this->recharge_model->send_success_sms($mobilenumber,$after_balance,$error_id,$amount,$trans_id,$user_mobile);  		 
					  
							   $this->recharge_model->add_recharge_commission( array('recharge_id'=>$recharge_id,'transaction_status'=>'Success','user_id'=>$by_id,'commission'=>$retail_commission,'created_date'=>$trans_date,  ) );
											  //Distributor Commission
								$this->recharge_model->add_recharge_commission( array('recharge_id'=>$recharge_id,'transaction_status'=>'Success','user_id'=>$parent_id,'commission'=>$dis_commission,'created_date'=>$trans_date , ) );
					  
					  
					  
						  header('Content-Type: application/json');
						  $response = array('message' => 'Transaction Successful','class' => 'success','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id);
						  echo json_encode($response); 
					      
						  return true; 
    
}
else if($resultval==0)
{
    $error_description='Pending';
	$error_status=0;
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
						   
						   
						  $response = array('message' => 'Transaction Pending','class' => 'pending','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id);  
    
                       	header('Content-Type: application/json');
						 echo json_encode($response);
    
    
}
else if($resultval==2)
{
    $error_description='Unknown';
	$error_status=2;
  $send_duplicate_sms =$this->recharge_model->send_duplicate_sms($mobilenumber,$avaliable_amount,$error_id,$amount,$trans_id,$user_mobile);			 
							 
						   $response = array('message' => 'Duplicate request,please try after 10 minutes','class' => 'pending','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id);  
  
    
}
else if($resultval==3)
{
    
    
   $error_description='Failure/Refund'; 
    $error_status=3;
     $send_failure_sms =$this->recharge_model->send_failure_sms($mobilenumber,$avaliable_amount,$error_id,$amount,$trans_id,$user_mobile); 
								
						   $response = array('message' => 'Transaction Failure','class' => 'fail','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id,'api'=>$data);
  
    
}


    
	
  }
  }
  } 
  else {
	   $response = array('message' => 'Your account balance is insufficient ','class' => 'fail');
					   echo json_encode($response);	
				   exit();	
  }
  /** past */
  }
  else
	{
		 
		
		redirect(site_url('user/index'));
	}
  }
  public function ad_bill()
{		 
			
			if($this->session->userdata('uid')!='')
			{   
		
			//  Get the value from the FORM 
				$serviceprovider = $this->input->post('serviceprovider');
				$mobilenumber =  $this->input->post('telephone');
				$amount = $this->input->post('amount');
				$type_ser=$this->input->post('bill_service_type');
				$std_code =$this->input->post('std_code');
				
				
				
							 
				// Get the retailer logged in details from session
				$by_id=$this->session->userdata('uid');
				$by=$this->session->userdata('username');
				$parent_id=$this->session->userdata('parent_id');
				$user_mobile=$this->session->userdata('mobile');

		
				//  Get the user balance from usermaster

				$user = $this->recharge_model->get_balance($by_id);
			
				$avaliable_amount =$user->available_balance;
				
				if ( $amount >= 1000 ){
					$trans_id=0;
					$error_id=-999999; 
					$send_insufficient_sms =$this->recharge_model->send_failure_sms($mobilenumber,$avaliable_amount,$error_id,$amount,$trans_id,$user_mobile);
			  	       header('Content-Type: application/json');
					   $response = array('message' => 'Failure due to exceed the recharge limit amount','class' => 'fail');
					   echo json_encode($response);	
					   exit();	
				}
				 		        
				if($amount <= $avaliable_amount && $amount != 0 )  
					{
				//  Get the commission details from provider tables
						$provider = $this->recharge_model->get_commission_by_provider($serviceprovider,'landlineprovider');
						
						$timezone = new DateTimeZone("Asia/Kolkata");
						$date = new DateTime();
						$date->setTimezone($timezone);
						
						$recharge_date=$date->format('Y-m-d H:i:s');	
										 
						$auto_code=$this->recharge_model->generateRandomString($length = 30);
						$req_id=time().$auto_code;
				          $op_code=$provider->OperatorCode;
						$rdData=array(
						'serviceprovider'=>$provider->provider,
						'mobilenumber'=>$mobilenumber,
						'rdate'=>$recharge_date,
						'service'=>$provider->name,
						'type'=>$type_ser,			
						'by'=>$by,
						'by_id' =>$by_id,
						'amount'=>$amount,	
						'req_id' =>$req_id,'recharge_type' =>'web',						
					);
		
					$recharge_id =$this->recharge_model->insert_recharge_details($rdData);
					
					if($recharge_id)
					{
					 
						  	$auto_code=$this->recharge_model->generateRandomString($length = 30);
						$req_id=time().$auto_code;
						 // $url = "http://115.248.39.80/HermesMobAPI/HermesMobile.svc/JSONService/GetRechargeDone";
						  $url="http://api.hermes-it.in/mobile/hermesmobile.svc/JSONService/GetRechargeDone";
$mySOAP = <<<EOD
{
"Authentication": {
"LoginId": "Viapaise",
"Password": "apiViapaise"
},
"UserTrackId": "$req_id",
"RechargeInput": {
"OperatorCode": "$op_code",
"MobileNumber": "$mobilenumber",
"Amount": $amount
}
}
EOD;
// The HTTP headers for the request (based on image above)
$headers = array(
'Content-Type: application/json',
);
// Build the cURL session
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, $mySOAP);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
// Send the request and check the response
if (($result = curl_exec($ch)) === FALSE) {
die('cURL error: '.curl_error($ch)."<br />\n");
} else {
$recharge_test=json_decode($result);
$resultval=$recharge_test->ResponseStatus;
 $trans_id=$recharge_test->UserTrackId;
 $error_id=$resultval;
$error_description='test';
					  
$trans_date=$date->format('Y-m-d H:i:s');	

}

curl_close($ch);
if($resultval==1)
{
   $error_status=1;
   $error_description='success';
						  
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
					  
							   $this->recharge_model->add_recharge_commission( array('recharge_id'=>$recharge_id,'transaction_status'=>'Success','user_id'=>$by_id,'commission'=>$retail_commission,'created_date'=>$trans_date,  ) );
											  //Distributor Commission
								$this->recharge_model->add_recharge_commission( array('recharge_id'=>$recharge_id,'transaction_status'=>'Success','user_id'=>$parent_id,'commission'=>$dis_commission,'created_date'=>$trans_date , ) );
					  
					  
					  
						  header('Content-Type: application/json');
						  $response = array('message' => 'Transaction Successful','class' => 'success','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id);
						  echo json_encode($response); 
					 
						  return true; 
    
    
    
    
}
else if($resultval==0)
{
    $error_description='Pending';
	$error_status=0;
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
						   
						   
						  $response = array('message' => 'Transaction Pending','class' => 'pending','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id);  
    
                       	header('Content-Type: application/json');
						 echo json_encode($response);
    
    
    
    
    
    
    
}
else if($resultval==2)
{
    $error_description='Unknown';
	$error_status=2;
  $send_duplicate_sms =$this->recharge_model->send_duplicate_sms($mobilenumber,$avaliable_amount,$error_id,$amount,$trans_id,$user_mobile);			 
							 
						   $response = array('message' => 'Duplicate request,please try after 10 minutes','class' => 'pending','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id);  
    
    
  
}
else if($resultval==3)
{
    
    
   $error_description='Failure/Refund'; 
   $error_status=3;
    
     $send_failure_sms =$this->recharge_model->send_failure_sms($mobilenumber,$avaliable_amount,$error_id,$amount,$trans_id,$user_mobile); 
								
						   $response = array('message' => 'Transaction Failure','class' => 'fail','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id,'api'=>$data);
    
    
    
}


				
    
	
  }
					else // recharge insertion failed
					{
						
					} 
						
			    }
				else{
					// User insuffient balance	
				
				  		 $trans_id=0;
						 $error_id=-999999;

			
			
					$send_insufficient_sms =$this->recharge_model->send_insufficient_sms($mobilenumber,$avaliable_amount,$error_id,$amount,$trans_id,$user_mobile);
			  	       header('Content-Type: application/json');
					   $response = array('message' => 'Insufficient Balance '.$amount ,'class' => 'fail');
					   echo json_encode($response);		
				
				}
	
	
		}
			else
			{
				redirect(site_url('user/index'));
			}
	}
public function ad_predata()
{
	
			 
			
			if($this->session->userdata('uid')!='')
			{   
		
			//  Get the value from the FORM 
				$serviceprovider = $this->input->post('serviceprovider');
				$mobilenumber =  $this->input->post('mobile');
				$amount = $this->input->post('amount');
				$type_ser=$this->input->post('bill_service_type');
				//$std_code =$this->input->post('std_code');
				
				
				
							 
				// Get the retailer logged in details from session
				$by_id=$this->session->userdata('uid');
				$by=$this->session->userdata('username');
				$parent_id=$this->session->userdata('parent_id');
				$user_mobile=$this->session->userdata('mobile');

		
				//  Get the user balance from usermaster

				$user = $this->recharge_model->get_balance($by_id);
			
				$avaliable_amount =$user->available_balance;
				
				if ( $amount >= 1000 ){
					$trans_id=0;
					$error_id=-999999; 
					$send_insufficient_sms =$this->recharge_model->send_failure_sms($mobilenumber,$avaliable_amount,$error_id,$amount,$trans_id,$user_mobile);
			  	       header('Content-Type: application/json');
					   $response = array('message' => 'Failure due to exceed the recharge limit amount','class' => 'fail');
					   echo json_encode($response);	
					   exit();	
				}
				 		        
				if($amount <= $avaliable_amount && $amount != 0 )  
					{
				//  Get the commission details from provider tables
						$provider = $this->recharge_model->get_commission_by_provider($serviceprovider,'dataprovider');
						
						$timezone = new DateTimeZone("Asia/Kolkata");
						$date = new DateTime();
						$date->setTimezone($timezone);
						
						$recharge_date=$date->format('Y-m-d H:i:s');	
										 
						$auto_code=$this->recharge_model->generateRandomString($length = 30);
						$req_id=time().$auto_code;
				          $op_code=$provider->OperatorCode;
						$rdData=array(
						'serviceprovider'=>$provider->provider,
						'mobilenumber'=>$mobilenumber,
						'rdate'=>$recharge_date,
						'service'=>$provider->name,
						'type'=>$type_ser,			
						'by'=>$by,
						'by_id' =>$by_id,
						'amount'=>$amount,	
						'req_id' =>$req_id,'recharge_type' =>'web',						
					);
		
					$recharge_id =$this->recharge_model->insert_recharge_details($rdData);
					
					if($recharge_id)
					{
					 
						  	$auto_code=$this->recharge_model->generateRandomString($length = 30);
						$req_id=time().$auto_code;
						 // $url = "http://115.248.39.80/HermesMobAPI/HermesMobile.svc/JSONService/GetRechargeDone";
						  $url="http://api.hermes-it.in/mobile/hermesmobile.svc/JSONService/GetRechargeDone";
$mySOAP = <<<EOD
{
"Authentication": {
"LoginId": "Viapaise",
"Password": "apiViapaise"
},
"UserTrackId": "$req_id",
"RechargeInput": {
"OperatorCode": "$op_code",
"MobileNumber": "$mobilenumber",
"Amount": $amount
}
}
EOD;
// The HTTP headers for the request (based on image above)
$headers = array(
'Content-Type: application/json',
);
// Build the cURL session
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, $mySOAP);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
// Send the request and check the response
if (($result = curl_exec($ch)) === FALSE) {
die('cURL error: '.curl_error($ch)."<br />\n");
} else {
$recharge_test=json_decode($result);
$resultval=$recharge_test->ResponseStatus;
 $trans_id=$recharge_test->UserTrackId;
 $error_id=$resultval;
$error_description='test';
					  
$trans_date=$date->format('Y-m-d H:i:s');	

}

curl_close($ch);
if($resultval==1)
{
   $error_status=1;
   $error_description='success';
						  
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
					  
							   $this->recharge_model->add_recharge_commission( array('recharge_id'=>$recharge_id,'transaction_status'=>'Success','user_id'=>$by_id,'commission'=>$retail_commission,'created_date'=>$trans_date,  ) );
											  //Distributor Commission
								$this->recharge_model->add_recharge_commission( array('recharge_id'=>$recharge_id,'transaction_status'=>'Success','user_id'=>$parent_id,'commission'=>$dis_commission,'created_date'=>$trans_date , ) );
					  
					  
					  
						  header('Content-Type: application/json');
						  $response = array('message' => 'Transaction Successful','class' => 'success','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id);
						  echo json_encode($response); 
					 
						  return true; 
    
    
    
    
}
else if($resultval==0)
{
    $error_description='Pending';
	$error_status=0;
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
						   
						   
						  $response = array('message' => 'Transaction Pending','class' => 'pending','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id);  
    
                       	header('Content-Type: application/json');
						 echo json_encode($response);
    
    
    
    
    
    
    
}
else if($resultval==2)
{
    $error_description='Unknown';
	$error_status=2;
  $send_duplicate_sms =$this->recharge_model->send_duplicate_sms($mobilenumber,$avaliable_amount,$error_id,$amount,$trans_id,$user_mobile);			 
							 
						   $response = array('message' => 'Duplicate request,please try after 10 minutes','class' => 'pending','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id);  
    
    
  
}
else if($resultval==3)
{
    
    
   $error_description='Failure/Refund'; 
   $error_status=3;
    
     $send_failure_sms =$this->recharge_model->send_failure_sms($mobilenumber,$avaliable_amount,$error_id,$amount,$trans_id,$user_mobile); 
								
						   $response = array('message' => 'Transaction Failure','class' => 'fail','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id,'api'=>$data);
    
    
    
}


				
    
	
  }
					else // recharge insertion failed
					{
						
					} 
						
			    }
				else{
					// User insuffient balance	
				
				  		 $trans_id=0;
						 $error_id=-999999;

			
			
					$send_insufficient_sms =$this->recharge_model->send_insufficient_sms($mobilenumber,$avaliable_amount,$error_id,$amount,$trans_id,$user_mobile);
			  	       header('Content-Type: application/json');
					   $response = array('message' => 'Insufficient Balance '.$amount ,'class' => 'fail');
					   echo json_encode($response);		
				
				}
	
	
		}
			else
			{
				redirect(site_url('user/index'));
			}
	}
	
public function ad_postdata()
{
	
			 
			
			if($this->session->userdata('uid')!='')
			{   
		
			//  Get the value from the FORM 
				$serviceprovider = $this->input->post('serviceprovider');
				$mobilenumber =  $this->input->post('mobile');
				$amount = $this->input->post('amount');
				$type_ser=$this->input->post('bill_service_type');
				//$std_code =$this->input->post('std_code');
				
				
				
							 
				// Get the retailer logged in details from session
				$by_id=$this->session->userdata('uid');
				$by=$this->session->userdata('username');
				$parent_id=$this->session->userdata('parent_id');
				$user_mobile=$this->session->userdata('mobile');

		
				//  Get the user balance from usermaster

				$user = $this->recharge_model->get_balance($by_id);
			
				$avaliable_amount =$user->available_balance;
				
				if ( $amount >= 1000 ){
					$trans_id=0;
					$error_id=-999999; 
					$send_insufficient_sms =$this->recharge_model->send_failure_sms($mobilenumber,$avaliable_amount,$error_id,$amount,$trans_id,$user_mobile);
			  	       header('Content-Type: application/json');
					   $response = array('message' => 'Failure due to exceed the recharge limit amount','class' => 'fail');
					   echo json_encode($response);	
					   exit();	
				}
				 		        
				if($amount <= $avaliable_amount && $amount != 0 )  
					{
				//  Get the commission details from provider tables
						$provider = $this->recharge_model->get_commission_by_provider($serviceprovider,'dataprovider');
						
						$timezone = new DateTimeZone("Asia/Kolkata");
						$date = new DateTime();
						$date->setTimezone($timezone);
						
						$recharge_date=$date->format('Y-m-d H:i:s');	
										 
						$auto_code=$this->recharge_model->generateRandomString($length = 30);
						$req_id=time().$auto_code;
				          $op_code=$provider->OperatorCode;
						$rdData=array(
						'serviceprovider'=>$provider->provider,
						'mobilenumber'=>$mobilenumber,
						'rdate'=>$recharge_date,
						'service'=>$provider->name,
						'type'=>$type_ser,			
						'by'=>$by,
						'by_id' =>$by_id,
						'amount'=>$amount,	
						'req_id' =>$req_id,'recharge_type' =>'web',						
					);
		
					$recharge_id =$this->recharge_model->insert_recharge_details($rdData);
					
					if($recharge_id)
					{
					 
						  	$auto_code=$this->recharge_model->generateRandomString($length = 30);
						$req_id=time().$auto_code;
						 // $url = "http://115.248.39.80/HermesMobAPI/HermesMobile.svc/JSONService/GetRechargeDone";
						  $url="http://api.hermes-it.in/mobile/hermesmobile.svc/JSONService/GetRechargeDone";
$mySOAP = <<<EOD
{
"Authentication": {
"LoginId": "Viapaise",
"Password": "apiViapaise"
},
"UserTrackId": "$req_id",
"RechargeInput": {
"OperatorCode": "$op_code",
"MobileNumber": "$mobilenumber",
"Amount": $amount
}
}
EOD;
// The HTTP headers for the request (based on image above)
$headers = array(
'Content-Type: application/json',
);
// Build the cURL session
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, $mySOAP);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
// Send the request and check the response
if (($result = curl_exec($ch)) === FALSE) {
die('cURL error: '.curl_error($ch)."<br />\n");
} else {
$recharge_test=json_decode($result);
$resultval=$recharge_test->ResponseStatus;
 $trans_id=$recharge_test->UserTrackId;
 $error_id=$resultval;
$error_description='test';
					  
$trans_date=$date->format('Y-m-d H:i:s');	

}

curl_close($ch);
if($resultval==1)
{
   $error_status=1;
   $error_description='success';
						  
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
					  
							   $this->recharge_model->add_recharge_commission( array('recharge_id'=>$recharge_id,'transaction_status'=>'Success','user_id'=>$by_id,'commission'=>$retail_commission,'created_date'=>$trans_date,  ) );
											  //Distributor Commission
								$this->recharge_model->add_recharge_commission( array('recharge_id'=>$recharge_id,'transaction_status'=>'Success','user_id'=>$parent_id,'commission'=>$dis_commission,'created_date'=>$trans_date , ) );
					  
					  
					  
						  header('Content-Type: application/json');
						  $response = array('message' => 'Transaction Successful','class' => 'success','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id);
						  echo json_encode($response); 
					 
						  return true; 
    
    
    
    
}
else if($resultval==0)
{
    $error_description='Pending';
	$error_status=0;
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
						   
						   
						  $response = array('message' => 'Transaction Pending','class' => 'pending','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id);  
    
                       	header('Content-Type: application/json');
						 echo json_encode($response);
    
    
    
    
    
    
    
}
else if($resultval==2)
{
    $error_description='Unknown';
	$error_status=2;
  $send_duplicate_sms =$this->recharge_model->send_duplicate_sms($mobilenumber,$avaliable_amount,$error_id,$amount,$trans_id,$user_mobile);			 
							 
						   $response = array('message' => 'Duplicate request,please try after 10 minutes','class' => 'pending','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id);  
    
    
  
}
else if($resultval==3)
{
    
    
   $error_description='Failure/Refund'; 
   $error_status=3;
    
     $send_failure_sms =$this->recharge_model->send_failure_sms($mobilenumber,$avaliable_amount,$error_id,$amount,$trans_id,$user_mobile); 
								
						   $response = array('message' => 'Transaction Failure','class' => 'fail','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id,'api'=>$data);
    
    
    
}


				
    
	
  }
					else // recharge insertion failed
					{
						
					} 
						
			    }
				else{
					// User insuffient balance	
				
				  		 $trans_id=0;
						 $error_id=-999999;

			
			
					$send_insufficient_sms =$this->recharge_model->send_insufficient_sms($mobilenumber,$avaliable_amount,$error_id,$amount,$trans_id,$user_mobile);
			  	       header('Content-Type: application/json');
					   $response = array('message' => 'Insufficient Balance '.$amount ,'class' => 'fail');
					   echo json_encode($response);		
				
				}
	
	
		}
			else
			{
				redirect(site_url('user/index'));
			}
	}	
public function ad_dth_recharge()
{
   	if($this->session->userdata('uid')!='')
	{
		//  Get the value from the FORM
			
		 $serviceprovider = $this->input->post('serviceprovider');
         
		 if($serviceprovider==10)
			{
				$mobilenumber =  $this->input->post('mobilenumber');
			}
			elseif($serviceprovider==9)
			{
				$mobilenumber =  $this->input->post('mobilenumber1');
			}
			elseif($serviceprovider==20)
			{
				$mobilenumber =  $this->input->post('mobilenumber2');
			}
			elseif($serviceprovider==7)
			{
				$mobilenumber =  $this->input->post('mobilenumber3');
			}
			elseif($serviceprovider==13)
			{
				$mobilenumber =  $this->input->post('mobilenumber4');
			}
			elseif($serviceprovider==8)
			{
				$mobilenumber =  $this->input->post('mobilenumber5');
			}
		
			
			
			$amount = $this->input->post('amount');
			$type_ser="dth";
			    
				
				
				// Get the retailer logged in details from session
				$by_id=$this->session->userdata('uid');
				$by=$this->session->userdata('username');
				$parent_id=$this->session->userdata('parent_id');
				$user_mobile=$this->session->userdata('mobile');

		
				//  Get the user balance from usermaster

				$user = $this->recharge_model->get_balance($by_id);
			
				$avaliable_amount =$user->available_balance;
 		        
				if ( $amount >= 3000 ){
					$trans_id=0;
					$error_id=-999999; 
					$send_insufficient_sms =$this->recharge_model->send_failure_sms($mobilenumber,$avaliable_amount,$error_id,$amount,$trans_id,$user_mobile);
			  	       header('Content-Type: application/json');
					   $response = array('message' => 'Failure due to exceed the recharge limit amount','class' => 'fail');
					   echo json_encode($response);	
					   exit();	
				}
				
				
				if($amount <= $avaliable_amount && $amount != 0 )  
					{
				//  Get the commission details from provider tables
						$provider = $this->recharge_model->get_all_dth_details($serviceprovider);
						
						$timezone = new DateTimeZone("Asia/Kolkata");
						$date = new DateTime();
						$date->setTimezone($timezone);
						
						$recharge_date=$date->format('Y-m-d H:i:s');	
										 
						$auto_code=$this->recharge_model->generateRandomString($length = 30);
						$req_id=time().$auto_code;
				        $op_code=$provider->OperatorCode;
						$rdData=array(
						'serviceprovider'=>$provider->provider,
						'mobilenumber'=>$mobilenumber,
						'rdate'=>$recharge_date,
						'service'=>$provider->name,
						'type'=>$type_ser,			
						'by'=>$by,
						'by_id' =>$by_id,
						'amount'=>$amount,	
						'req_id' =>$req_id,'recharge_type' =>'web',						
					);
		
					$recharge_id =$this->recharge_model->insert_recharge_details($rdData);
					
					if($recharge_id)
                    {
					 
						  	$auto_code=$this->recharge_model->generateRandomString($length = 30);
						$req_id=time().$auto_code;
						 // $url = "http://115.248.39.80/HermesMobAPI/HermesMobile.svc/JSONService/GetRechargeDone";
						 $url="http://api.hermes-it.in/mobile/hermesmobile.svc/JSONService/GetRechargeDone";
$mySOAP = <<<EOD
{
"Authentication": {
"LoginId": "Viapaise",
"Password": "apiViapaise"
},
"UserTrackId": "$req_id",
"RechargeInput": {
"OperatorCode": "$op_code",
"MobileNumber": "$mobilenumber",
"Amount": $amount
}
}
EOD;
// The HTTP headers for the request (based on image above)
$headers = array(
'Content-Type: application/json',
);
// Build the cURL session
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, $mySOAP);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
// Send the request and check the response
if (($result = curl_exec($ch)) === FALSE) {
die('cURL error: '.curl_error($ch)."<br />\n");
} else {
$recharge_test=json_decode($result);
$resultval=$recharge_test->ResponseStatus;
 $trans_id=$recharge_test->UserTrackId;
 $error_id=$resultval;
$error_description='test';
					  
$trans_date=$date->format('Y-m-d H:i:s');	

}

curl_close($ch);
if($resultval==1)
{
   $error_status=1;
   $error_description='success';
						  
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
					  
							   $this->recharge_model->add_recharge_commission( array('recharge_id'=>$recharge_id,'transaction_status'=>'Success','user_id'=>$by_id,'commission'=>$retail_commission,'created_date'=>$trans_date,  ) );
											  //Distributor Commission
								$this->recharge_model->add_recharge_commission( array('recharge_id'=>$recharge_id,'transaction_status'=>'Success','user_id'=>$parent_id,'commission'=>$dis_commission,'created_date'=>$trans_date , ) );
					  
					  
					  
						  header('Content-Type: application/json');
						  $response = array('message' => 'Transaction Successful','class' => 'success','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id);
						  echo json_encode($response); 
					 
						  return true; 
    
    
    
    
}
else if($resultval==0)
{   $error_status=0;
    $error_description='Pending';
   
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
						   
						   
						  $response = array('message' => 'Transaction Pending','class' => 'pending','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id);  
    
                       	header('Content-Type: application/json');
						 echo json_encode($response);
    
    
    
    
    
    
    
}
else if($resultval==2)
{
    $error_description='Unknown';
	$error_status=2;
  $send_duplicate_sms =$this->recharge_model->send_duplicate_sms($mobilenumber,$avaliable_amount,$error_id,$amount,$trans_id,$user_mobile);			 
							 
						   $response = array('message' => 'Duplicate request,please try after 10 minutes','class' => 'pending','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id);  
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
else if($resultval==3)
{
    
    
   $error_description='Failure/Refund'; 
   $error_status=3;
    
     $send_failure_sms =$this->recharge_model->send_failure_sms($mobilenumber,$avaliable_amount,$error_id,$amount,$trans_id,$user_mobile); 
								
						   $response = array('message' => 'Transaction Failure','class' => 'fail','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id,'api'=>$data);
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}


				
    
	
  }
					/*{
						//curl_call( $url,$provider,$user,$recharge_id);
						if($serviceprovider)
						{
						 $store_id="BLUZ500021EZPY";
 		$url = "https://api.myezypay.in/Ezypaywebservice/PushRequest.aspx?AuthorisationCode=de4527cfd9674f86bc&product=$serviceprovider&MobileNumber=$mobilenumber&Amount=$amount&StoreID=$store_id&RequestId=$req_id";	
					
		
			//		$url = "http://103.29.232.110:8089/Ezypaywebservice/PushRequest.aspx?AuthorisationCode=de4527cfd9674f86bc&product=$serviceprovider&MobileNumber=$mobilenumber&Amount=$amount&StoreID=$store_id&RequestId=$req_id";	
					
								
						}
						else
						{
							
							
							 $url = "https://api.myezypay.in/Ezypaywebservice/PushRequest.aspx?AuthorisationCode=de4527cfd9674f86bc&product=$serviceprovider&MobileNumber=$mobilenumber&Amount=$amount&RequestId=$req_id";
							// $url = "http://103.29.232.110:8089/Ezypaywebservice/PushRequest.aspx?AuthorisationCode=de4527cfd9674f86bc&product=$serviceprovider&MobileNumber=$mobilenumber&Amount=$amount&RequestId=$req_id";
						// https://api.myezypay.in/Ezypaywebservice/PushRequest.aspx?AuthorisationCode=xxxxxx&product=xx&MobileNumber=xxxxxxxx&Amount=xxx&RequestId=xxxxx	 
							 
						}
				 
						
					  $ch = curl_init();
					  curl_setopt($ch, CURLOPT_URL, $url);
					  curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
					  curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
					  $data = curl_exec($ch);
					  $reply_data = $data;
					  curl_close($ch);
					   
					  $get_trans=(explode("~",$data));
					   
					 if(count($get_trans)  < 2  ) {  
					  $response = array('message' => 'Please service provider not available','class' => 'fail','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id ,'reply'=>$reply_data );
						  
					 
						header('Content-Type: application/json');
						 echo json_encode($response); 	
					 	 exit();
					   } 
					  $trans_id=$get_trans[0];
					  $error_id=$get_trans[3];
					  $error_description=$get_trans[4];
					  
					  $trans_date=$date->format('Y-m-d H:i:s');	
					  
					  if($error_id ==1)
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
					  
							   $this->recharge_model->add_recharge_commission( array('recharge_id'=>$recharge_id,'transaction_status'=>'Success','user_id'=>$by_id,'commission'=>$retail_commission,'created_date'=>$trans_date,  ) );
											  //Distributor Commission
								$this->recharge_model->add_recharge_commission( array('recharge_id'=>$recharge_id,'transaction_status'=>'Success','user_id'=>$parent_id,'commission'=>$dis_commission,'created_date'=>$trans_date , ) );
					  
					  
					  
						  header('Content-Type: application/json');
						  $response = array('message' => 'Transaction Successful','class' => 'success','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id);
						  echo json_encode($response); 
					  
						  return true;
						  
					  }
					   else if($error_id==100  || $error_id==200)//Transaction Pending
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
						   
						   
						  $response = array('message' => 'Transaction Pending','class' => 'pending','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id); 
						   
						  
						   
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
								
						   $response = array('message' => 'Transaction Failure','class' => 'fail','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id);//,'reply'=>$reply_data );
						  
					  }
						header('Content-Type: application/json');
						 echo json_encode($response);
					}
                    */
					else // recharge insertion failed
					{
						
					} 
						
			    }
				else{
					// User insuffient balance	
				
				  		 $trans_id=0;
						 $error_id=-999999;

			
			
					$send_insufficient_sms =$this->recharge_model->send_insufficient_sms($mobilenumber,$avaliable_amount,$error_id,$amount,$trans_id,$user_mobile);
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
public function ad_postpaid_recharge()
{	
	
	
   	if($this->session->userdata('uid')!='')
	{
		//  Get the value from the FORM
			
	 
		 $serviceprovider = $this->input->post('serviceprovider');
		$mobilenumber =  $this->input->post('post-mobilenumber');
		$amount = $this->input->post('post-amount');
		$type_ser=$this->input->post('post-service_type'); 
			 
				// Get the retailer logged in details from session
				$by_id=$this->session->userdata('uid');
				$by=$this->session->userdata('username');
				$parent_id=$this->session->userdata('parent_id');
				$user_mobile=$this->session->userdata('mobile');

		
				//  Get the user balance from usermaster

				$user = $this->recharge_model->get_balance($by_id);
			
				$avaliable_amount =$user->available_balance;
 		      	if ( $amount >= 5000 ){
					$trans_id=0;
					$error_id=-999999; 
					$send_insufficient_sms =$this->recharge_model->send_failure_sms($mobilenumber,$avaliable_amount,$error_id,$amount,$trans_id,$user_mobile);
			  	       header('Content-Type: application/json');
					   $response = array('message' => 'Failure due to exceed the recharge limit amount','class' => 'fail');
					   echo json_encode($response);	
					   exit();	
				}  
				
				
				if($amount <= $avaliable_amount && $amount != 0 )  
					{
				//  Get the commission details from provider tables
						$provider = $this->recharge_model->get_all_post_paid_details($serviceprovider);
						
						$timezone = new DateTimeZone("Asia/Kolkata");
						$date = new DateTime();
						$date->setTimezone($timezone);
						
						$recharge_date=$date->format('Y-m-d H:i:s');	
										 
						$auto_code=$this->recharge_model->generateRandomString($length = 30);
						$req_id=time().$auto_code;
				        $op_code=$provider->OperatorCode;
				
						$rdData=array(
						'serviceprovider'=>$provider->provider,
						'mobilenumber'=>$mobilenumber,
						'rdate'=>$recharge_date,
						'service'=>$provider->name,
						'type'=>$type_ser,			
						'by'=>$by,
						'by_id' =>$by_id,
						'amount'=>$amount,	
						'req_id' =>$req_id,'recharge_type' =>'web',						
					);
		
					$recharge_id =$this->recharge_model->insert_recharge_details($rdData);
					
					if($recharge_id)
					{
					 
						  	$auto_code=$this->recharge_model->generateRandomString($length = 30);
						$req_id=time().$auto_code;
						//  $url = "http://115.248.39.80/HermesMobAPI/HermesMobile.svc/JSONService/GetRechargeDone";
						$url="http://api.hermes-it.in/mobile/hermesmobile.svc/JSONService/GetRechargeDone";
$mySOAP = <<<EOD
{
"Authentication": {
"LoginId": "Viapaise",
"Password": "apiViapaise"
},
"UserTrackId": "$req_id",
"RechargeInput": {
"OperatorCode": "$op_code",
"MobileNumber": "$mobilenumber",
"Amount": $amount
}
}
EOD;
// The HTTP headers for the request (based on image above)
$headers = array(
'Content-Type: application/json',
);
// Build the cURL session
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, $mySOAP);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
// Send the request and check the response
if (($result = curl_exec($ch)) === FALSE) {
die('cURL error: '.curl_error($ch)."<br />\n");
} else {
$recharge_test=json_decode($result);
$resultval=$recharge_test->ResponseStatus;
 $trans_id=$recharge_test->UserTrackId;
 $error_id=$resultval;
$error_description='test';
					  
$trans_date=$date->format('Y-m-d H:i:s');	

}

curl_close($ch);
if($resultval==1)
{
   $error_status=1;
   $error_description='success';
						  
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
					  
							   $this->recharge_model->add_recharge_commission( array('recharge_id'=>$recharge_id,'transaction_status'=>'Success','user_id'=>$by_id,'commission'=>$retail_commission,'created_date'=>$trans_date,  ) );
											  //Distributor Commission
								$this->recharge_model->add_recharge_commission( array('recharge_id'=>$recharge_id,'transaction_status'=>'Success','user_id'=>$parent_id,'commission'=>$dis_commission,'created_date'=>$trans_date , ) );
					  
					  
					  
						  header('Content-Type: application/json');
						  $response = array('message' => 'Transaction Successful','class' => 'success','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id);
						  echo json_encode($response); 
					 
						  return true; 
    
    
    
    
}
else if($resultval==0)
{
    $error_description='Pending';
	$error_status=0;
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
						   
						   
						  $response = array('message' => 'Transaction Pending','class' => 'pending','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id);  
    
                       	header('Content-Type: application/json');
						 echo json_encode($response);
    
    
    
    
    
    
    
}
else if($resultval==2)
{
    $error_description='Unknown';
	$error_status=2;
  $send_duplicate_sms =$this->recharge_model->send_duplicate_sms($mobilenumber,$avaliable_amount,$error_id,$amount,$trans_id,$user_mobile);			 
							 
						   $response = array('message' => 'Duplicate request,please try after 10 minutes','class' => 'pending','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id);  
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
else if($resultval==3)
{
    
    
   $error_description='Failure/Refund'; 
   $error_status=3;
    
     $send_failure_sms =$this->recharge_model->send_failure_sms($mobilenumber,$avaliable_amount,$error_id,$amount,$trans_id,$user_mobile); 
								
						   $response = array('message' => 'Transaction Failure','class' => 'fail','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$provider->name,'trans_id'=>$trans_id,'api'=>$data);
    
    
}


				
    
	
  }	
	
					else // recharge insertion failed
					{
						
					} 
						
			    }
				else{
					// User insuffient balance	
				
				  		 $trans_id=0;
						 $error_id=-999999;

			
			
					$send_insufficient_sms =$this->recharge_model->send_insufficient_sms($mobilenumber,$avaliable_amount,$error_id,$amount,$trans_id,$user_mobile);
			  	       header('Content-Type: application/json');
					   $response = array('message' => 'Insufficient Balance '.$amount ,'class' => 'fail');
					   echo json_encode($response);		
				
				}
			}
	else
	{
		redirect(site_url('user/index'));
	}
  	
	
  	

		
	
}				


// #New Recharge
/*

1. Get the value from the FORM

2. Get the commission details from provider

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
  

	public function rechargeplan()
  { 
   $data['Prepaid'] = $this->recharge_model->get_Prepaid();
   $data['Circle'] = $this->recharge_model->get_circle();
   $data['OperatorPlan'] = $this->recharge_model->get_plan();  
   $operator_id = $this->input->post('serviceprovider');
   $circle_id = $this->input->post('circle');
   $plan_id = $this->input->post('plan');
   if($operator_id =='' && $circle_id=='' && $plan_id=='')
   {
   $operator_id = 1;
   $circle_id = 1;
   $plan_id = 1;
   }
   $data['plandetails']=$this->recharge_model->get_planDetails($operator_id,$circle_id,$plan_id);
   $this->load->view("common/header");
      $this->load->view("common/menu");
   $this->load->view('rechargeplan',$data);
   $this->load->view("common/footer");
  }
  
  public function recharge_status()
  { 
   $type = 2;
   $number=1;
   $data['rechargestatus']=$this->recharge_model->get_rechargestatus($type,$number);   
   $this->load->view("common/header");
      $this->load->view("common/menu");
   $this->load->view('rechargestatus',$data);
   $this->load->view("common/footer");
  }

  public function recharge_statuscheck()
  { 
   $type = $this->input->post('radio');
   $number=$this->input->post('txtnumber');
   $data['rechargestatus']=$this->recharge_model->get_rechargestatus($type,$number); 
   $this->load->view("common/header");
   $this->load->view("common/menu");
   $this->load->view('rechargestatus',$data);
   $this->load->view("common/footer");
  }

  	 
	 	public function background()
		{
			$this->load->model('recharge_model'); 
			$code = $this->recharge_model->update_temp_transaction();
			if($code == true)
			{
				echo "Sucess Code";	
			}else{
				echo "Failed Code";	
			}
			 
		}	
		
		public function revoke()
		{
			$this->load->model('recharge_model'); 
			$code = $this->recharge_model->revoke();
			if($code == true)
			{
				echo "Sucess Code";	
			}else{
				echo "Failed Code";	
			}
			 
		}
	public function alert( $data  ){
		//$data = "Test";
	 $admin = $this->recharge_model->get_admin_detail();
						
						
	  $mail = $admin->alert_mail;
	  $mobilenumber = $admin->alert_sms1;
	  if($mobilenumber !=""){
		  $alert =$this->recharge_model->send_sms($mobilenumber,"TEST Insufficient Balance in your HermesMobAPI/HermesMobile account");
	  }
	  $mobilenumber = $admin->alert_sms2;
	  if($mobilenumber !=""){
		  $alert =$this->recharge_model->send_sms($mobilenumber,"TEST Insufficient Balance in your ermesMobAPI/HermesMobile account");
	  }
	  if($mail !=""){
		 $alert =$this->recharge_model->send_mail( $mail,'TEST Insufficient Balance in your ermesMobAPI/HermesMobile account','Alert from Prepaid Recharge .., '.$data);
	  }  		 	
	}
	
	public function test()
	{
		$this->alert("test call");
		echo "done";
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







