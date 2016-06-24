    <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class icash_model extends CI_Model
	{
		function insert($username,$fname,$lname,$motname,$dateob,$mailss,$mobile_no,$usestate,$usecity,$useaddress,$pinscode,$tran,$created_by,$created_by_name)
		{			
			$data = array(			
			'user_name' => $username,
			'first_name' => $fname,
			'last_name' => $lname,
			'mothers_name' => $motname,
			'dob' => $dateob,
			'mail_id' => $mailss,
			'mobile_number' => $mobile_no,
			'state' => $usestate,
			'city' => $usecity,
			'address' => $useaddress,
			'pin_code' => $pinscode,
			'transaction_code' => $tran,
			'created_by' => $created_by,
			'created_by_name' => $created_by_name

			);
			$query=$this->db->insert('icashcardregistraion',$data);
			return true;
		
		
		}
		
		function get_transaction_code($var)
		{
			$this->db->select('*');
			$this->db->from('icashcardregistraion');
			$this->db->where('transaction_code',$var);
			$query=$this->db->get();
			return  $query->result();  
		}

		function update_cars_details($card,$card_status,$balz,$security_key,$ph_no,$transaction_limit)
		{
			$data = array(			
			'card_no' => $card,
			'card_status' => $card_status,
			'balance' => $balz,
			'security_key' => $security_key,
			'transaction_limit' => $transaction_limit
			);
			$this->db->where('mobile_number', $ph_no);
			$query=$this->db->update('icashcardregistraion', $data);
			return true;
		}
		
		function login($ph_no,$card,$card_status,$balance,$security_key,$transaction_limit,$icash_user)
		{
			
			$userdatas = array(
			//'id'  => $row->id,
			'card_no'  => $card,
			'card_status'  => $card_status,
			'balance'  => $balance,
			'security_key'  => $security_key,
			'transaction_limit' => $transaction_limit,
			//'transaction_code' => $row->transaction_code,
			'mobile_number' => $ph_no,
			'icash_user'=>$icash_user
			);
			$this->session->set_userdata($userdatas);
			return true;
			
			
		}  
		
		function get_card_details($var_code,$mobile_nos)
		{
			$this->db->select('*');
			$this->db->from('icashcardregistraion');
			$this->db->where('security_key',$var_code);
			$this->db->where('mobile_number',$mobile_nos);
			$query=$this->db->get();
			return  $query->result();  
		}
		
		function get_charge_details()
		{
			$this->db->select('*');
			$this->db->from('icash_servicecharges');
			$query=$this->db->get();
			return  $query->result();  
		}
		
		function update_topup_details($topup_tans_id,$expiry_date,$bal,$top_val,$pre_val,$topup_mobile,$region_code)
		{
			$data = array(			
			'topup_transaction_id' => $topup_tans_id,
			'expiry_date' => $expiry_date,
			'balance' => $bal,
			'topup_amount' => $top_val,
			'region' => $region_code,
			'prev_topup_amnt' => $pre_val
			);
			$this->db->where('mobile_number', $topup_mobile);
			$query=$this->db->update('icashcardregistraion', $data);
			return true;
		}
		
		function insert_beneficiary($b_name,$mobile_no,$bank_name,$branch_name,$b_city,$b_state,$b_ifsc,$b_accno,$trans,$mm,$b_card_no,$b_id)
		{			
			$data = array(			
			'user_name' => $b_name,
			'mobile_number' => $mobile_no,
			'bank_name' => $bank_name,
			'branch_name' => $branch_name,
			'city' => $b_city,
			'state' => $b_state,
			'ifsc' => $b_ifsc,
			'acc_no' => $b_accno,
			'transaction_id' => $trans,
			'icash_mmid' => $mm,
			'card_no' => $b_card_no,
			'icash_ref_id' => $b_id,
			);
			$query=$this->db->insert('beneficiary',$data);
			return true;
		}
		
		function update_beneficiary($be,$b_id)
		{
			$data = array('icash_beneficiaryid' => $be);
			$this->db->where('icash_ref_id', $b_id);
			$query=$this->db->update('beneficiary', $data);
			return true;
		}
		
		function get_benficary_details($var_codes)
		{
			$this->db->select('*');
			$this->db->from('beneficiary');
			$this->db->where('icash_ref_id',$var_codes);
			$query=$this->db->get();
			return  $query->result();  
		}
		
		function update_otp($refid,$b_otpno)
		{
			$data = array('otp_no' => $b_otpno);
			$this->db->where('id', $refid);
			$query=$this->db->update('beneficiary', $data);
			return true;
		}
		
		function edita_beneficiary($var_code)
		{
			$this->db->select('*');
			$this->db->from('beneficiary');
			$this->db->where('icash_ref_id',$card_no);
			$query=$this->db->get();
			return  $query->result();  
		}
		
		function get_beneficiary($des)
		{
			$this->db->select('*');
			$this->db->from('beneficiary');
			$this->db->where('icash_ref_id',$des);
			$query=$this->db->get();
			return  $query->result();  
		}
		
		function delete_records($beneid,$table_name){
			$this->db->select('icash_beneficiaryid');
			$this->db->where('icash_beneficiaryid',$beneid);
			$query = $this->db->get($table_name);
			  if($query->num_rows > 0){
				 $this->db->where('icash_beneficiaryid',$beneid);
				 if($this->db->delete($table_name)){
					 
					return true; 
				 }else{
					 
					return false; 
				 }
				  
			  }else{
				  
				return true;   
			  }
		}
		
		function get_cdetails($var_code)
		{
			$this->db->select('*');
			$this->db->from('icashcardregistraion');
			$this->db->where('card_no',$var_code);
			$query=$this->db->get();
			return  $query->result();  
		}
		
		function get_benficaryss_details($var_codes)
		{
			$this->db->select('*');
			$this->db->from('icashcardregistraion');
			$this->db->where('id',$var_codes);
			$query=$this->db->get();
			return  $query->result();  
		}
		
		function get_det($segment)
		{
			$this->db->select('*');
			$this->db->from('icashcardregistraion');
			$this->db->where('id',$segment);
			$query=$this->db->get();
			return  $query->result();  
		}
		
		function get_detacdet($segment_acno,$segment)
		{
			$this->db->select('*');
			$this->db->from('beneficiary');
			$this->db->where('acc_no',$segment_acno);
			$this->db->where('icash_ref_id',$segment);
			$query=$this->db->get();
			return  $query->result();  
		}
		
		function update_transaction_ifsc($ifsc,$segment_acno)
		{
			$data = array('trans_type' => $ifsc);
			$this->db->where('acc_no', $segment_acno);
			$query=$this->db->update('beneficiary', $data);
			return true;
		}
		
		function insert_resend($NAME,$MIDDLENAME,$LASTNAME,$DOB,$EMAILID,$PINCODE,$CITY,$STATE,$MOBILE,$MOTHERMAIDENNAME,$ADDRESS)
		{			
			$data = array(			
			'user_name' => $NAME,
			'first_name' => $MIDDLENAME,
			'last_name' => $LASTNAME,
			'mothers_name' => $MOTHERMAIDENNAME,
			'dob' => "",
			'mail_id' => $EMAILID,
			'mobile_number' => $MOBILE,
			'state' => $STATE,
			'city' => $CITY,
			'address' => $ADDRESS,
			'pin_code' => $PINCODE 
			);
			$query=$this->db->insert('icashcardregistraion', $data);
			return true;
		}
		
		function get_benfi_details($mm)
		{
			$this->db->select('*');
			$this->db->from('beneficiary');
			$this->db->where('icash_mmid',$mm);
			$query=$this->db->get();
			return  $query->result();  
		}	

		function icash_card_register($username,$fname,$lname,$motname,$dateob,$mailss,$mobile_no,$usestate,$usecity,$useaddress,$pinscode,$tran,$created_by,$created_by_name)
		{ 
		$sql=mysql_query("SELECT * FROM tbl_icash_credential   ")or die(mysql_error());
		
		
while($row=mysql_fetch_array($sql))
{
 
			 $terminal_id=$row['terminal_id'];
			 $login_key=$row['login_key'];
			 $merchant_id=$row['merchant_id'];
			 $agent_id=$row['agent_id'];
		}
			$service_url = 'http://202.54.157.77/wsnpci/impsmethods.asmx/REGISTRATION';
			$ch = curl_init($service_url);
			$curl_post_data = array(
			"RequestData" =>"<REGISTRATIONREQUEST><TERMINALID>$terminal_id</TERMINALID>
			<LOGINKEY>$login_key</LOGINKEY><MERCHANTID>$merchant_id</MERCHANTID><AGENTID>$agent_id</AGENTID><TRANSACTIONID>$tran</TRANSACTIONID><KYCFLAG>1</KYCFLAG><USERNAME>$username</USERNAME>
			<USERMIDDLENAME>$fname</USERMIDDLENAME><USERLASTNAME>$lname</USERLASTNAME><USERMOTHERSMAIDENNAME>$motname</USERMOTHERSMAIDENNAME>$dateob<USERDATEOFBIRTH>
			</USERDATEOFBIRTH><USEREMAILID>$mailss</USEREMAILID><USERMOBILENO>$mobile_no</USERMOBILENO><USERSTATE>$usestate</USERSTATE>
			<USERCITY>$usecity</USERCITY><USERADDRESS>$useaddress</USERADDRESS><PINCODE>$pinscode</PINCODE><USERIDPROOFTYPE>
			</USERIDPROOFTYPE><USERIDPROOF></USERIDPROOF><IDPROOFURL></IDPROOFURL><USERADDRESSPROOFTYPE></USERADDRESSPROOFTYPE>
			<USERADDRESSPROOF></USERADDRESSPROOF><ADDRESSPROOFURL></ADDRESSPROOFURL><PARAM1></PARAM1><PARAM2>
			</PARAM2><PARAM3></PARAM3><PARAM4></PARAM4><PARAM5></PARAM5></REGISTRATIONREQUEST>");
			$post_array_string = '';
		 
			foreach($curl_post_data as $key=>$value) 
			{ 
				$post_array_string .= $key.'='.$value.'&'; 
			}
			$post_array_string = rtrim($post_array_string,'&');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post_array_string);
			$output = curl_exec($ch);  
			$xml = simplexml_load_string($output);
			$xml = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $xml);
			$xml = simplexml_load_string($xml);
			$json = json_encode($xml);
			$responseArray = json_decode($json,true);
			$status_code=$responseArray['STATUSCODE'];
			$status=$responseArray['STATUS'];
			
			if($status_code==0)
			{
				$query = $this->icash_model->insert($username,$fname,$lname,$motname,$dateob,$mailss,$mobile_no,$usestate,$usecity,$useaddress,
				$pinscode,$tran,$created_by,$created_by_name);		
				$_SESSION["favcolor"] = $tran;
				$var=$_SESSION["favcolor"]; 
				$data['user_details'] = $this->icash_model->get_transaction_code($var);
				$this->load->view('common/header');
				$this->load->view('common/menu');
				
				$this->load->view('pin_generate',$data);
				$this->load->view('common/footer');
			}
			else if($status_code==1)
			{
				$this->session->set_flashdata('error',$status);
			    redirect('sendmoney/create_card');
			/* echo "<script type='text/javascript'>alert('$status'); window.location.href = '".site_url()."sendmoney/create_card'</script>"; */
			} 
			else if($status_code==20)
			{
				$transaction_cod=$responseArray['STATUS'];
				$_SESSION["tran"] = $transaction_cod;
				$var_trans=$_SESSION["tran"];
				$service_url = 'http://202.54.157.77/wsnpci/impsmethods.asmx/SENDERRESENDOTP';
				$ch = curl_init($service_url);
				$curl_post_data = array(			
				"RequestData" =>"<SENDERRESENDOTPREQUEST>
				<TERMINALID>200291</TERMINALID>
				<LOGINKEY>0211042052</LOGINKEY>
				<MERCHANTID>291</MERCHANTID>
				<TRANSACTIONID>$var_trans</TRANSACTIONID>
				<AGENTID>ViaPaise</AGENTID>
				<PARAM1></PARAM1>
				<PARAM2></PARAM2>
				<PARAM3></PARAM3>
				<PARAM4></PARAM4>
				<PARAM5></PARAM5>
				</SENDERRESENDOTPREQUEST>");
				$post_array_string = '';
				foreach($curl_post_data as $key=>$value) 
				{ 
					$post_array_string .= $key.'='.$value.'&'; 
				}
				$post_array_string = rtrim($post_array_string,'&');
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $post_array_string);
				$output = curl_exec($ch);     
				$xml = simplexml_load_string($output);
				$xml = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $xml);
				$xml = simplexml_load_string($xml);
				$json = json_encode($xml);
				$responseArray = json_decode($json,true);
				$status=$responseArray['STATUS'];
				$status_cod=$responseArray['STATUSCODE'];
				if($status_cod==0)
				{
					$data = array('var_trans' => $var_trans);
					$this->load->view('common/header');
					$this->load->view('common/menu');
					
					$this->load->view('card_regenerate',$data);
					$this->load->view('common/footer');
				}
				else if($status_cod!=0)
				{
					$this->session->set_flashdata('error',$status);
					redirect('sendmoney/create_card');
					/*echo "<script type='text/javascript'>alert('$status'); window.location.href = '".site_url()."sendmoney/create_card'</script>";*/
				}
			}
		}
		
		
		function icash_kyc_card_register($username,$fname,$lname,$motname,$dateob,$mailss,$re,$usestate,$usecity,$useaddress,
			$pinscode,$tran,$created_by,$created_by_name,$idProofUrl,$idProofNum,$idProofType,$addressProofUrl,$addressProofNum,$addressProofType)
		{ 
		$sql=mysql_query("SELECT * FROM tbl_icash_credential   ")or die(mysql_error());
		
		
		while($row=mysql_fetch_array($sql))
		{
 
			 $terminal_id=$row['terminal_id'];
			 $login_key=$row['login_key'];
			 $merchant_id=$row['merchant_id'];
			 $agent_id=$row['agent_id'];
		}
		
		
			$service_url = 'http://202.54.157.77/wsnpci/impsmethods.asmx/REGISTRATION';
			$ch = curl_init($service_url);
			$curl_post_data = array(
			"RequestData" =>"<REGISTRATIONREQUEST>
			<TERMINALID>$terminal_id</TERMINALID>
			<LOGINKEY>$login_key</LOGINKEY>
			<MERCHANTID>$merchant_id</MERCHANTID>
			<AGENTID>$agent_id</AGENTID>
			<TRANSACTIONID>$tran</TRANSACTIONID>
			<KYCFLAG>1</KYCFLAG>
			<USERNAME>$username</USERNAME>
			<USERMIDDLENAME>$fname</USERMIDDLENAME>
			<USERLASTNAME>$lname</USERLASTNAME>
			<USERMOTHERSMAIDENNAME>$motname</USERMOTHERSMAIDENNAME>
			<USERDATEOFBIRTH>$dateob</USERDATEOFBIRTH>
			<USEREMAILID>$mailss</USEREMAILID>
			<USERMOBILENO>$mobile_no</USERMOBILENO>
			<USERSTATE>$usestate</USERSTATE>
			<USERCITY>$usecity</USERCITY>
			<USERADDRESS>$useaddress</USERADDRESS>
			<PINCODE>$pinscode</PINCODE>
			<USERIDPROOFTYPE>$idProofType</USERIDPROOFTYPE>
			<USERIDPROOF>$idProofNum</USERIDPROOF>
			<IDPROOFURL>$idProofUrl</IDPROOFURL>
			<USERADDRESSPROOFTYPE>$addressProofType</USERADDRESSPROOFTYPE>
			<USERADDRESSPROOF>$addressProofNum</USERADDRESSPROOF>
			<ADDRESSPROOFURL>$addressProofUrl</ADDRESSPROOFURL>
			<PARAM1></PARAM1>
			<PARAM2></PARAM2>
			<PARAM3></PARAM3>
			<PARAM4></PARAM4>
			<PARAM5></PARAM5>
			</REGISTRATIONREQUEST>");
			$post_array_string = '';
			
			foreach($curl_post_data as $key=>$value) 
			{ 
				$post_array_string .= $key.'='.$value.'&'; 
			}
			$post_array_string = rtrim($post_array_string,'&');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post_array_string);
			$output = curl_exec($ch);  
			$xml = simplexml_load_string($output);
			$xml = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $xml);
			$xml = simplexml_load_string($xml);
			$json = json_encode($xml);
			$responseArray = json_decode($json,true);
			$status_code=$responseArray['STATUSCODE'];
			$status=$responseArray['STATUS'];
			//print_r(  $json );
			//exit( );
			if($status_code==0)
			{
				$query = $this->icash_model->insert($username,$fname,$lname,$motname,$dateob,$mailss,$mobile_no,$usestate,$usecity,$useaddress,
				$pinscode,$tran,$created_by,$created_by_name);		
				$_SESSION["favcolor"] = $tran;
				$var=$_SESSION["favcolor"]; 
				$data['user_details'] = $this->icash_model->get_transaction_code($var);
				$this->load->view('common/header');
				$this->load->view('common/menu');
				
				$this->load->view('pin_generate',$data);
				$this->load->view('common/footer');
			}
			else if($status_code==1)
			{
				
				 echo "<script type='text/javascript'>alert('$status'); window.location.href = '".site_url()."sendmoney/create_card'</script>"; 
			} 
			else if($status_code==20)
			{
				$transaction_cod=$responseArray['STATUS'];
				$_SESSION["tran"] = $transaction_cod;
				$var_trans=$_SESSION["tran"];
				$service_url = 'http://202.54.157.77/wsnpci/impsmethods.asmx/SENDERRESENDOTP';
				$ch = curl_init($service_url);
				$curl_post_data = array(			
				"RequestData" =>"<SENDERRESENDOTPREQUEST>
				<TERMINALID>200291</TERMINALID>
				<LOGINKEY>0211042052</LOGINKEY>
				<MERCHANTID>291</MERCHANTID>
				<TRANSACTIONID>$var_trans</TRANSACTIONID>
				<AGENTID>ViaPaise</AGENTID>
				<PARAM1></PARAM1>
				<PARAM2></PARAM2>
				<PARAM3></PARAM3>
				<PARAM4></PARAM4>
				<PARAM5></PARAM5>
				</SENDERRESENDOTPREQUEST>");
				$post_array_string = '';
				foreach($curl_post_data as $key=>$value) 
				{ 
					$post_array_string .= $key.'='.$value.'&'; 
				}
				$post_array_string = rtrim($post_array_string,'&');
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $post_array_string);
				$output = curl_exec($ch);     
				$xml = simplexml_load_string($output);
				$xml = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $xml);
				$xml = simplexml_load_string($xml);
				$json = json_encode($xml);
				$responseArray = json_decode($json,true);
				$status=$responseArray['STATUS'];
				$status_cod=$responseArray['STATUSCODE'];
				if($status_cod==0)
				{
					$data = array('var_trans' => $var_trans);
					$this->load->view('common/header');
					$this->load->view('common/menu');
					
					$this->load->view('card_regenerate',$data);
					$this->load->view('common/footer');
				}
				else if($status_cod!=0)
				{
					echo "<script type='text/javascript'>alert('$status'); window.location.href = '".site_url()."sendmoney/create_card'</script>";
				}
			}
		}
		
		
		function icashotp($tran_n,$otp_n)
		{
			$service_url = 'http://202.54.157.77/wsnpci/impsmethods.asmx/SENDERREGISTER';
			$ch = curl_init($service_url);
			$curl_post_data = array(			
			"RequestData" =>"<SENDERREGISTERREQUEST>
			<TERMINALID>200291</TERMINALID>
			<LOGINKEY>0211042052</LOGINKEY>
			<MERCHANTID>291</MERCHANTID>
			<TRANSACTIONID>$tran_n</TRANSACTIONID>
			<OTP>$otp_n</OTP>
			<AGENTID>ViaPaise</AGENTID>
			<PARAM1></PARAM1>
			<PARAM2></PARAM2>
			<PARAM3></PARAM3>
			<PARAM4></PARAM4>
			<PARAM5></PARAM5>
			</SENDERREGISTERREQUEST>");

			$post_array_string = '';
			foreach($curl_post_data as $key=>$value) 
			{ 
				$post_array_string .= $key.'='.$value.'&'; 
			}
			$post_array_string = rtrim($post_array_string,'&');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post_array_string);
			$output = curl_exec($ch);    
			$xml = simplexml_load_string($output);
			$xml = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $xml);
			$xml = simplexml_load_string($xml);
			$json = json_encode($xml); 
			$responseArrays = json_decode($json,true);
			$status=$responseArrays['STATUS'];
			$statu_code=$responseArrays['STATUSCODE'];
			
			if($statu_code==0)
			{
				$NAME =  $responseArrays['NAME'];
				$MIDDLENAME=  $responseArrays['MIDDLENAME'];
				$LASTNAME=  $responseArrays['LASTNAME'];
				$DOB= $responseArrays['DOB'];
				$EMAILID=  $responseArrays['EMAILID'];
				$PINCODE= $responseArrays['PINCODE'];
				$ADDRESS=  $responseArrays['ADDRESS']; 
				$CITY=  $responseArrays['CITY'];
				$STATE=  $responseArrays['STATE'];
				$MOBILE=  $responseArrays['MOBILE'];
				$MOTHERMAIDENNAME=  $responseArrays['MOTHERMAIDENNAME'];
				$query = $this->icash_model->insert_resend($NAME,$MIDDLENAME,$LASTNAME,$DOB,$EMAILID,$PINCODE,$CITY,$STATE,$MOBILE,
				$MOTHERMAIDENNAME,$ADDRESS);
				$this->load->view('common/header');
				$this->load->view('common/menu');
				
				$this->load->view('icash_login');
				$this->load->view('common/footer');
			}
			else if($statu_code!=0)
			{
				echo "<script type='text/javascript'>alert('$status'); window.location.href = '".site_url()."sendmoney/create_card'</script>";
			}	

	}
	
	function icashpin($trans_id,$otp_no)
	{
		$sql=mysql_query("SELECT * FROM tbl_icash_credential   ")or die(mysql_error());

 
while($row=mysql_fetch_array($sql))
{
             $terminal_id=$row['terminal_id'];
			 $login_key=$row['login_key'];
			 $merchant_id=$row['merchant_id'];
			 $agent_id=$row['agent_id'];
		}
		$reg_url = 'http://202.54.157.77/wsnpci/impsmethods.asmx/SENDERREGISTER';
		$ch = curl_init($reg_url);
		$post_data = array(
		"RequestData" =>"<SENDERREGISTERREQUEST>
		<TERMINALID>$terminal_id</TERMINALID>
		<LOGINKEY>$login_key</LOGINKEY>
		<MERCHANTID>$merchant_id</MERCHANTID>
		<TRANSACTIONID>$trans_id</TRANSACTIONID>
		<OTP>$otp_no</OTP>
		<AGENTID>$agent_id</AGENTID>
		<PARAM1></PARAM1>
		<PARAM2></PARAM2>
		<PARAM3></PARAM3>
		<PARAM4></PARAM4>
		<PARAM5></PARAM5>
		</SENDERREGISTERREQUEST>");
		$array_string = '';
       
		foreach($post_data as $key=>$value) 
		{ 
			$array_string .= $key.'='.$value.'&'; 
		}
		$array_string = rtrim($array_string,'&');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $array_string);
		$output_pin = curl_exec($ch);    
		$xml_pin = simplexml_load_string($output_pin);
		$xml_pin = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $xml_pin);
		$xml_pin = simplexml_load_string($xml_pin);
		$json_pin = json_encode($xml_pin);
		$responseArray_pin = json_decode($json_pin,true);
		$status=$responseArray_pin['STATUS'];
		$status_code_pin=$responseArray_pin['STATUSCODE'];
		
		//print_r($responseArray_pin); exit();
		if($status_code_pin==0)
		{
			/*$this->load->view('common/header');
			$this->load->view('common/menu');
			$this->load->view('icash_login');
			$this->load->view('common/footer');*/
			
			$this->session->set_flashdata('message','Login to your account.');
			redirect('sendmoney/log');
			

		}	
		else if($status_code_pin!=0)
		{
			
			$this->session->set_flashdata('error',$status);
			redirect('sendmoney/create_card');
			
			/*echo "<script type='text/javascript'>alert('$status'); window.location.href = '".site_url()."sendmoney/pin_generate';  </script>"; */
		}
	}
		
	function icash_log($mobile,$pin_no)
	{
		$sql=mysql_query("SELECT * FROM tbl_icash_credential   ")or die(mysql_error());
$mobile_no= $this->input->post('mobile_no');
while($row=mysql_fetch_array($sql))
{
	
			 $terminal_id=$row['terminal_id'];
			 $login_key=$row['login_key'];
			 $merchant_id=$row['merchant_id'];
			 $agent_id=$row['agent_id'];
		}
		$service_url = 'http://202.54.157.77/wsnpci/impsmethods.asmx/LOGIN_V2';
		$ch = curl_init($service_url);
		$curl_post_data = array(
		"RequestData" =>"<LOGIN_V2REQUEST>
		<TERMINALID>$terminal_id</TERMINALID>
		<LOGINKEY>$login_key</LOGINKEY>
		<MERCHANTID>$merchant_id</MERCHANTID>
		<USERMOBILENO>$mobile</USERMOBILENO>
		<AGENTID>$agent_id</AGENTID>
		<PARAM1>$pin_no</PARAM1>
		<PARAM2></PARAM2>
		<PARAM3></PARAM3>
		<PARAM4></PARAM4>
		<PARAM5></PARAM5>
		</LOGIN_V2REQUEST>");
       // print_r($curl_post_data);exit();
		$post_array_string = '';
		foreach($curl_post_data as $key=>$value) 
		{ 
			$post_array_string .= $key.'='.$value.'&'; 
		}
		$post_array_string = rtrim($post_array_string,'&');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_array_string);
		$output = curl_exec($ch);   
		$xml = simplexml_load_string($output);
		$xml = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $xml);
		$xml = simplexml_load_string($xml);
		$json = json_encode($xml);
		$responseArray = json_decode($json,true);
      //  print_r($responseArray);exit();
		$response= $responseArray['STATUSCODE'];
		$s_response= $responseArray['STATUS'];
		
		if($response==0)
		{
			$card=$responseArray['CARDNO'];
			$icash_user = $responseArray['NAME'];
			$card_status=$responseArray['CARDSTATUS'];
			$balz=$responseArray['BALANCE'];
			$transaction_limit=$responseArray['TRANSACTIONLIMIT'];
			$ph_no=$responseArray['MOBILE'];
			$security_key = $responseArray['SECURITYKEY'];
			$update = $this->icash_model->update_cars_details($card,$card_status,$balz,$security_key,$ph_no,$transaction_limit);
			$auth=$this->icash_model->login($ph_no,$card,$card_status,$balz,$security_key,$transaction_limit,$icash_user);
			if($auth)
			{
				//print_r($responseArray); exit();
				$this->session->set_flashdata('message',"You are logged in successfully.");
				redirect('sendmoney/card_top');
				
			}
			else
			{
			$this->session->set_flashdata('error',"Invalid username or Pin number");
				redirect('sendmoney/log');
				
						/*echo "<script type='text/javascript'>alert('$s_response'); window.location.href = '".site_url()."sendmoney/card_top';  </script>"; */
		}
		}
	
		else if($response!=0)
		{
			
			$this->session->set_flashdata('error',"Invalid username or Pin number");
			redirect('sendmoney/log');
		}

	}
	
	function icash_log_validates($m_no,$otp_pwd)
	{
		$sql=mysql_query("SELECT * FROM tbl_icash_credential   ")or die(mysql_error());
		
 
while($row=mysql_fetch_array($sql))
{
		
			 $terminal_id=$row['terminal_id'];
			 $login_key=$row['login_key'];
			 $merchant_id=$row['merchant_id'];
			 $agent_id=$row['agent_id'];
		}
		$reg_url = 'http://202.54.157.77/wsnpci/impsmethods.asmx/VALIDATELOGIN_V1';
		$ch = curl_init($reg_url);
		$post_data = array(
		"RequestData" =>"
		<VALIDATELOGIN_V1REQUEST>
		<TERMINALID>$terminal_id</TERMINALID>
		<LOGINKEY>$login_key</LOGINKEY>
		<MERCHANTID>$merchant_id</MERCHANTID>
		<USERMOBILENO>$m_no</USERMOBILENO>
		<AGENTID>$agent_id</AGENTID>
		<OTP>$otp_pwd</OTP>
		<PARAM1></PARAM1>
		<PARAM2></PARAM2>
		<PARAM3></PARAM3>
		<PARAM4></PARAM4>
		<PARAM5></PARAM5>
		</VALIDATELOGIN_V1REQUEST>
		");
		$array_string = '';
		foreach($post_data as $key=>$value) 
		{ 
			$array_string .= $key.'='.$value.'&'; 
		}
		$array_string = rtrim($array_string,'&');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $array_string);
		$output_pin = curl_exec($ch);   
		$xml_pin = simplexml_load_string($output_pin);
		$xml_pin = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $xml_pin);
		$xml_pin = simplexml_load_string($xml_pin);
		$json_pin = json_encode($xml_pin);
		$responseArray_pin = json_decode($json_pin,true);
		$s_response=$responseArray_pin['STATUS'];
		$status_code=$responseArray_pin['STATUSCODE'];
		
		
		if($status_code==0)
		{
			$card=$responseArray_pin['CARDNO'];
			$icash_user = $responseArray_pin['NAME'];
			$card_status=$responseArray_pin['CARDSTATUS'];
			$balz=$responseArray_pin['BALANCE'];
			$transaction_limit=$responseArray_pin['TRANSACTIONLIMIT'];
			$ph_no=$responseArray_pin['MOBILE'];
			$security_key = $responseArray_pin['SECURITYKEY'];
			$update = $this->icash_model->update_cars_details($card,$card_status,$balz,$security_key,$ph_no,$transaction_limit);
			$auth=$this->icash_model->login($ph_no,$card,$card_status,$balz,$security_key,$transaction_limit,$icash_user);
			if($auth)
			{
				/*$this->load->view('common/header');
				$this->load->view('common/menu');
				$this->load->view('icash_home');
				$var_code=$this->session->userdata('security_key');
				$mobile_nos=$this->session->userdata('mobile_number');
				$data['card_details'] = $this->icash_model->get_card_details($var_code,$mobile_nos);
				$data['charge'] = $this->icash_model->get_charge_details();
				$data['message'] = "You are logged in successfully.";
				$this->load->view('view_card_topup',$data);
				$this->load->view('common/footer');*/
				
				$this->session->set_flashdata('message',"You are logged in successfully.");
				redirect('sendmoney/card_top');	
			}
			else
			{
				$this->session->set_flashdata('error',"Invalid username or Pin number");
				redirect('beneficiary');
			
				
				/*echo "<script type='text/javascript'>alert('$s_response'); window.location.href = '".site_url()."sendmoney/create_card';  </script>"; */
			}
		}
		else if($status_code!=0)
		{
			$this->session->set_flashdata('error',"Invalid username or Pin number");
			redirect('beneficiary');
		}

	
	}
 
 function icash_card_topup ($top_amnt,$topup_tran,$region_code,$topup_mobile,$ser_charge,$sec_key,
			$card)
	{
		
		$sendMoneyBal = $this->getSendMoneyBal($this->session->userdata('uid'));
		$sendMoneyUsedBal = $this->getSendMoneyUsedBal($this->session->userdata('uid'));
		$availableBal = $sendMoneyBal - $sendMoneyUsedBal;
		
		
		if($availableBal >= $top_amnt){
		
		
		
		$sql=mysql_query("SELECT * FROM tbl_icash_credential   ")or die(mysql_error());
		
		
while($row=mysql_fetch_array($sql))
{
 
			 $terminal_id=$row['terminal_id'];
			 $login_key=$row['login_key'];
			 $merchant_id=$row['merchant_id'];
			 $agent_id=$row['agent_id'];
		}
		$service_url = 'http://202.54.157.77/wsnpci/impsmethods.asmx/TOPUP_V2';
		$ch = curl_init($service_url);
		$curl_post_data = array(
		"RequestData" =>"<TOPUP_V2REQUEST>
		<TERMINALID>$terminal_id</TERMINALID>
		<LOGINKEY>$login_key</LOGINKEY>
		<MERCHANTID>$merchant_id</MERCHANTID>
		<CARDNO>$card</CARDNO>
		<AGENTID>$agent_id</AGENTID>
		<TOPUPAMOUNT>$top_amnt</TOPUPAMOUNT>
		<TOPUPTRANSID>$topup_tran</TOPUPTRANSID>
		<MOBILE>$topup_mobile</MOBILE>
		<REGIONID>$region_code</REGIONID>
		<SERVICECHARGE>$ser_charge</SERVICECHARGE>
		<PARAM1></PARAM1>
		<PARAM2>$sec_key</PARAM2>
		<PARAM3></PARAM3>
		<PARAM4></PARAM4>
		<PARAM5></PARAM5>
		</TOPUP_V2REQUEST>");	
		$post_array_string = '';
		foreach($curl_post_data as $key=>$value) 
		{ 
		$post_array_string .= $key.'='.$value.'&'; 
		}
		$post_array_string = rtrim($post_array_string,'&');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_array_string);
		$output = curl_exec($ch);   
		$xml = simplexml_load_string($output);
		$xml = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $xml);
		$xml = simplexml_load_string($xml);
		$json = json_encode($xml);
		$responseArray = json_decode($json,true);
		$status=$responseArray['STATUS'];
		$status_code=$responseArray['STATUSCODE'];
		
		if($status_code==0)
		{
			$topup_tans_id=$responseArray['TOPUPTRANSID'];
			$expiry_date=$responseArray['EXPIRYDATE'];
			$bal=$responseArray['CURRENTVALUE'];
			$top_val=$responseArray['TOPUPVALUE'];
			$pre_val=$responseArray['PREVIOUSVALUE'];
	 
			$update_topup = $this->icash_model->update_topup_details($topup_tans_id,$expiry_date,$bal,$top_val,$pre_val,$topup_mobile,$region_code);
			$sendMoneyUsedBal = $sendMoneyUsedBal + $top_amnt;
			$this->deductSendMoneyBal($sendMoneyUsedBal);
			$this->insert_card_topup($top_val,$card);
			$this->updateSendmoneyBal($card);
			
			if($update_topup)
			{
				
				
				$this->session->set_flashdata('message','Your card topup done  successfully.');
				
				redirect('beneficiary/view_balance');
			 }
		}
		else if($status_code==3)                                                                /////////Insufficient balance in channel partner
		{
			$statusInsufficient = "Kindly contact Admin.";
			$this->session->set_flashdata('error',$statusInsufficient);
			
			$this->cardTopupMail($statusInsufficient);
				
				redirect('sendmoney/card_top');
			
		}else if($status_code!=0)
		{
			$this->session->set_flashdata('error',$status);
			
			$this->cardTopupMail($status);
				
				redirect('sendmoney/card_top');
			
		}
		
		
		}else{
			
			
		$this->session->set_flashdata('error','Top amount exceeds your balance. Kindly request payment.');	
		redirect('sendmoney/card_top');	
			
		}


	}
	
	function add_beneficiaryy($b_name,$mobile_no,$bank_name,$branch_name,$b_city,$b_state,$b_ifsc,$b_accno,$trans,$mm,$b_card_no,$b_id)
	{
		$sql=mysql_query("SELECT * FROM tbl_icash_credential   ")or die(mysql_error());
		
 
while($row=mysql_fetch_array($sql))
{
		
			 $terminal_id=$row['terminal_id'];
			 $login_key=$row['login_key'];
			 $merchant_id=$row['merchant_id'];
			 $agent_id=$row['agent_id'];
		}
		$service_url = 'http://202.54.157.77/wsnpci/impsmethods.asmx/ADDBENEFICIARY';
		$ch = curl_init($service_url);
		$curl_post_data = array(
		"RequestData" =>"<ADDBENEFICIARYREQUEST>
		<TERMINALID>$terminal_id</TERMINALID>
		<LOGINKEY>$login_key</LOGINKEY>
		<MERCHANTID>$merchant_id</MERCHANTID>
		<CARDNO>$b_card_no</CARDNO>
		<AGENTID>$agent_id</AGENTID>
		<TRANSACTIONID>$trans</TRANSACTIONID>
		<BENENAME>$b_name</BENENAME>
		<MMID></MMID>
		<BENEMOBILE>$mobile_no</BENEMOBILE>
		<BANKNAME>$bank_name</BANKNAME>
		<BRANCHNAME>$branch_name</BRANCHNAME>
		<CITY>$b_city</CITY>
		<STATE>$b_state</STATE>
		<IFSCCODE>$b_ifsc</IFSCCODE>
		<ACCOUNTNO>$b_accno</ACCOUNTNO>
		<PARAM1></PARAM1>
		<PARAM2></PARAM2>
		<PARAM3></PARAM3><PARAM4></PARAM4>
		<PARAM5></PARAM5>
		</ADDBENEFICIARYREQUEST>");
		$post_array_string = '';
		foreach($curl_post_data as $key=>$value) 
		{ 
			$post_array_string .= $key.'='.$value.'&'; 
		}
		$post_array_string = rtrim($post_array_string,'&');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_array_string);
		$output = curl_exec($ch);   
		$xml = simplexml_load_string($output);
		$xml = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $xml);
		$xml = simplexml_load_string($xml);
		$json = json_encode($xml);
		$responseArray = json_decode($json,true);
		$status=$responseArray['STATUS'];
		$status_code=$responseArray['STATUSCODE'];
		if($status_code==0)
		{
			$be=$responseArray['BENEID'];
			$query = $this->icash_model->insert_beneficiary($b_name,$mobile_no,$bank_name,$branch_name,$b_city,$b_state,$b_ifsc,$b_accno,
			$trans,$mm,$b_card_no,$b_id);	
			if($query)
			{
				$update = $this->icash_model->update_beneficiary($be,$b_id);
				$this->load->view('common/header');
				$this->load->view('common/menu');
				$this->load->view('icash_home');
				$data['message'] = "Enter your OTP sent to your mobile.";
				$var_codes=$this->session->userdata('id');
				$data['card_details'] = $this->icash_model->get_benficary_details($var_codes);
				$data['beni_details'] = $this->icash_model->get_benfi_details($mm);
				$data['carddetails'] = $this->icash_model->get_benficaryss_details($var_codes);
				$this->load->view('beneficiary_otp',$data);
				$this->load->view('common/footer');
			}
		}
		else if($status_code!=0)
		{
		$this->session->set_flashdata('error',$status);	
		
		redirect('beneficiary/add_beneficiary_details');
		/*echo "<script type='text/javascript'>alert('$status'); window.location.href = '".site_url()."beneficiary';  </script>"; */
		}
	}


	function benficiaryotp($b_otpno,$card_no,$ben,$refid)
	{
$sql=mysql_query("SELECT * FROM tbl_icash_credential   ")or die(mysql_error());
while($row=mysql_fetch_array($sql))
{
$terminal_id=$row['terminal_id'];
$login_key=$row['login_key'];
$merchant_id=$row['merchant_id'];
$agent_id=$row['agent_id'];
}

		$service_url = 'http://202.54.157.77/wsnpci/impsmethods.asmx/BENEREGISTER';
		$ch = curl_init($service_url);
		$curl_post_data = array(
		"RequestData" =>"<BENEREGISTERREQUEST>
		<TERMINALID>$terminal_id</TERMINALID>
		<LOGINKEY>$login_key</LOGINKEY>
		<MERCHANTID>$merchant_id</MERCHANTID>
		<CARDNO>$card_no</CARDNO>
		<AGENTID>$agent_id</AGENTID>
		<OTP>$b_otpno</OTP>
		<BENEID>$ben</BENEID>
		<PARAM1></PARAM1>
		<PARAM2></PARAM2>
		<PARAM3></PARAM3>
		<PARAM4></PARAM4>
		<PARAM5></PARAM5>
		</BENEREGISTERREQUEST>");
		$post_array_string = '';
		foreach($curl_post_data as $key=>$value) 
		{ 
			$post_array_string .= $key.'='.$value.'&'; 
		}
		$post_array_string = rtrim($post_array_string,'&');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_array_string);
		$output = curl_exec($ch);    
		$xml = simplexml_load_string($output);
		$xml = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $xml);
		$xml = simplexml_load_string($xml);
		$json = json_encode($xml);
		$responseArray = json_decode($json,true);
		$status_code=$responseArray['STATUSCODE'];
		if($status_code==0)
		{
			$update = $this->icash_model->update_otp($refid,$b_otpno);
			$this->load->view('common/header');
			$this->load->view('common/menu');
			$this->load->view('icash_home');
			$var_code=$this->session->userdata('security_key'); 
			$mobile_nos=$this->session->userdata('mobile_number');
			$data['card_details'] = $this->icash_model->get_card_details($var_code,$mobile_nos);
			$this->load->view('view_beneficiary',$data);
			$this->load->view('common/footer');
		}
	}

	function deletedata_beneficiary()
	{
		$bene_id=$this->uri->segment(3); 
		$bene_card=$this->uri->segment(4); 
		/*$cards = $this->icash_model->get_beneficiary($des);
		foreach($cards as $user)
		{
			$ids=$user->id;
			$bene_id=$user->icash_beneficiaryid;
			$bene_card=$user->card_no;
		}*/
		$sql=mysql_query("SELECT * FROM tbl_icash_credential   ")or die(mysql_error());
while($row=mysql_fetch_array($sql))
{
$terminal_id=$row['terminal_id'];
$login_key=$row['login_key'];
$merchant_id=$row['merchant_id'];
$agent_id=$row['agent_id'];
}
		
		$service_url = 'http://202.54.157.77/wsnpci/impsmethods.asmx/REMOVEBENEFICIARY';
		$ch = curl_init($service_url);
		$curl_post_data = array(
		"RequestData" =>"<REMOVEBENEFICIARYREQUEST>
		<TERMINALID>$terminal_id</TERMINALID>
		<LOGINKEY>$login_key</LOGINKEY>
		<MERCHANTID>$merchant_id</MERCHANTID>
		<CARDNO>$bene_card</CARDNO>
		<AGENTID>$agent_id</AGENTID>
		<BENEID>$bene_id</BENEID>
		<PARAM1></PARAM1>
		<PARAM2></PARAM2>
		<PARAM3></PARAM3>
		<PARAM4></PARAM4>
		<PARAM5></PARAM5>
		</REMOVEBENEFICIARYREQUEST>");
		$post_array_string = '';
		foreach($curl_post_data as $key=>$value) 
		{ 
			$post_array_string .= $key.'='.$value.'&'; 
		}
		$post_array_string = rtrim($post_array_string,'&');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_array_string);
		$output = curl_exec($ch);    
		$xml = simplexml_load_string($output);
		$xml = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $xml);
		$xml = simplexml_load_string($xml);
		$json = json_encode($xml);
		$responseArray = json_decode($json,true);
		$status_code=$responseArray['OTPSTATUS'];
		if($status_code==0)
		{
			echo"error";
		}
		else if($status_code==1)
		{
			$data['message'] = "Enter OTP sent to your mobile.";
			$this->load->view('common/header');
			$this->load->view('common/menu');
			$this->load->view('icash_home');
			$data['bene_id'] = $bene_id;
			$this->load->view('delete_otp',$data);
			$this->load->view('common/footer');
		}
	}

	function icash_bene_otp($card_number,$ben_id,$otp_no,$ben_status)
	{
		$service_url = 'http://202.54.157.77/wsnpci/impsmethods.asmx/REMOVEBENEOTP';
		$ch = curl_init($service_url);
		$curl_post_data = array(
		"RequestData" =>"<REMOVEBENEOTPREQUEST>
		<TERMINALID>200291</TERMINALID>
		<LOGINKEY>0211042052</LOGINKEY>
		<MERCHANTID>291</MERCHANTID>
		<CARDNO>$card_number</CARDNO>
		<AGENTID>ViaPaise</AGENTID>
		<BENEID>$ben_id</BENEID>
		<OTP>$otp_no</OTP>
		<BENESTATUS>$ben_status</BENESTATUS>
		<PARAM1></PARAM1>
		<PARAM2></PARAM2>
		<PARAM3></PARAM3>
		<PARAM4></PARAM4>
		<PARAM5></PARAM5>
		</REMOVEBENEOTPREQUEST>");
		$post_array_string = '';
		foreach($curl_post_data as $key=>$value) 
		{ 
			$post_array_string .= $key.'='.$value.'&'; 
		}
		$post_array_string = rtrim($post_array_string,'&');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_array_string);
		$output = curl_exec($ch);    
		$xml = simplexml_load_string($output);
		$xml = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $xml);
		$xml = simplexml_load_string($xml);
		$json = json_encode($xml);
		$responseArray = json_decode($json,true);
		$status_code=$responseArray['STATUSCODE'];
		$status=$responseArray['STATUS'];
		if($status_code	==0)
		{
			$table_name = 'beneficiary';
			$del=$this->icash_model->delete_records($ben_id,$table_name);
			if($del)
			{
				$this->session->set_flashdata('message','Beneficiary deleted successfully.');
				redirect('beneficiary/view');
				
				/*echo "<script type='text/javascript'>alert('$status'); window.location.href = '".site_url()."beneficiary';  </script>"; 	*/
			}
		}	
		else if($status_code!=0)
		{
			$this->session->set_flashdata('error',$status);
			    redirect('beneficiary/view');
				
			/*echo "<script type='text/javascript'>alert('$status'); window.location.href = '".site_url()."sendmoney/create_card';  </script>"; */
		}
	}


	function get_transactionbeneficary($user_name,$mobile_no,$ifsccode,$acc_no,$trans_type,$u_amount,$u_remarks,$securitykey,$card_no,$bene_bene_id,$rand_id,$servicecharge,$icash_user_id)
	{
		//$sendMoneyBal = $this->session->userdata('balance');
		$sendMoneyBal = $this->getSendMoneyBal($this->session->userdata('uid'));
		$sendMoneyUsedBal = $this->getSendMoneyUsedBal($this->session->userdata('uid'));
		$availableBal = $sendMoneyBal - $sendMoneyUsedBal;
		if($availableBal >= $u_amount){
		
		 
	
	
	
	
	$sql=mysql_query("SELECT * FROM tbl_icash_credential")or die(mysql_error());
		while($row=mysql_fetch_array($sql))
		{
			$terminal_id=$row['terminal_id'];
			$login_key=$row['login_key'];
			$merchant_id=$row['merchant_id'];
			$agent_id=$row['agent_id'];
		}
                
                $rcheck_result = $this->icash_model->get_icash_commission_details('retailer');
		        $rcommission =  ($rcheck_result->commission  / 100) * $u_amount;
		
		
			    $dcheck_result = $this->icash_model->get_icash_commission_details('distributor');
	            $dcommission =  ($dcheck_result->commission  / 100) * $u_amount;
				
				$getMoneyTransferCommision = $this->icash_model->getMoneyTransferCommission('money_transfer',$u_amount);
				$commisionType = $getMoneyTransferCommision->commision_type;
				
				if( $commisionType == 1){
					
				 $moneyTransferCommision =  ($getMoneyTransferCommision->commission  / 100) * $u_amount;
				 $moneyTransferDCommision =  ($getMoneyTransferCommision->dcommission  / 100) * $u_amount;	
				 
				} else if ( $commisionType == 2){
					
				 $moneyTransferCommision =  $getMoneyTransferCommision->commission;	
				 $moneyTransferDCommision = $getMoneyTransferCommision->dcommission;	
				 	
				}
		
				$adminBeforeBal = $this->getAdminBeforBal();
				$retailerBeforeBal = $this->getRetailerBeforBal();
				
			//	$retailerBeforeBal-
				
				

		$service_url = 'http://202.54.157.77/wsnpci/impsmethods.asmx/TRANSACTION_V3';
		$ch = curl_init($service_url);
		$curl_post_data = array(
		"RequestData" =>"<TRANSACTION_V3REQUEST>
        <TERMINALID>200291</TERMINALID>
		<LOGINKEY>0211042052</LOGINKEY>
		<MERCHANTID>291</MERCHANTID>
		<CARDNO>$card_no</CARDNO>
		<TRANSTYPE>$trans_type</TRANSTYPE>
		<TRANSTYPEDESC>$acc_no</TRANSTYPEDESC>
		<BENEMOBILE>$mobile_no</BENEMOBILE>
		<IFSCCODE>$ifsccode</IFSCCODE>
		<OTP></OTP>
		<TRANSAMOUNT>$u_amount</TRANSAMOUNT>
		<SERVICECHARGE>0</SERVICECHARGE>
		<REMARKS>$u_remarks</REMARKS>
		<BENEID>$bene_bene_id</BENEID>
		<MERCHANTTRANSID>$rand_id</MERCHANTTRANSID>
		<AGENTID>$agent_id</AGENTID>
		<PARAM1>0</PARAM1>
		<PARAM2></PARAM2>
		<PARAM3></PARAM3>
		<PARAM4>$securitykey</PARAM4>
		<PARAM5></PARAM5>
		</TRANSACTION_V3REQUEST>");
		$post_array_string = '';
		foreach($curl_post_data as $key=>$value) 
		{ 
		$post_array_string .= $key.'='.$value.'&'; 
		}
		$post_array_string = rtrim($post_array_string,'&');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_array_string);
		$output = curl_exec($ch);      
		$xml = simplexml_load_string($output);
		$xml = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $xml);
		$xml = simplexml_load_string($xml);
		$json = json_encode($xml);
		$response = json_decode($json,true);
		$status_code=$response['STATUSCODE'];
		$status=$response['STATUS'];
		//print_r($response); exit();
		if($status_code	==0)
		{
			$this->updateSendmoneyBal($card_no);
			$icash_sales_id = $this->add_icash_sales( array('retailer_id'=>$this->session->userdata('uid'),'icash_user_id'=>$card_no,'amount'=>$u_amount,'beneficiary_id'=>$bene_bene_id,'payment_status'=>'$status','transaction_date'=>date('y-m-d')) );
				
			$this->icash_model->add_icash_commission( array('icash_sales_id'=>$icash_sales_id,'rcommission'=>$rcommission,'dcommission'=>$dcommission,'created_date'=>date('y-m-d')) );
			
			$adminAfterBal = $this->updateUserMoneyTransfer($moneyTransferCommision,$moneyTransferDCommision);
			$retailerAfterBal = $this->updateRetailerMoneyTransfer($moneyTransferCommision,$moneyTransferDCommision);
			
			
			$this->addMoneyTransferCommission( array('retailer_id'=>$this->session->userdata('uid'),'icash_user_id'=>$card_no,'amount'=>$u_amount,'admin_commission'=>$moneyTransferCommision,'distributor_commission'=>$moneyTransferDCommision,'admin_before_bal'=>$adminBeforeBal,'	retailer_before_bal'=>$retailerBeforeBal,'admin_after_bal'=>$adminAfterBal,'retailer_after_bal'=>$retailerAfterBal,'remarks'=>$u_remarks,'transaction_date'=>date('y-m-d')) );
			
			
			
		$msg="Sucess";
		$data = array('transaction_status' => $msg);
			$this->db->where('card_no', $card_no);
			$query=$this->db->update('icashcardregistraion', $data);
			
			/*print_r( array('retailer_id'=>$this->session->userdata('uid'),'icash_user_id'=>$card_no,'amount'=>$u_amount,'admin_commission'=>$moneyTransferCommision,'distributor_commission'=>$moneyTransferDCommision,'admin_before_bal'=>$adminBeforeBal,'	retailer_before_bal'=>$retailerBeforeBal,'admin_after_bal'=>$adminAfterBal,'retailer_after_bal'=>$retailerAfterBal,'remarks'=>$u_remarks,'transaction_date'=>date('y-m-d')) ); exit();*/
			
			$this->session->set_flashdata('message','Money sent successfully.');
			redirect('beneficiary/view');
			
		}		
		else if($status_code ==1)
		{
			$this->session->set_flashdata('error',$status);
			redirect('beneficiary/view');
	
		}	
else if($status_code ==3)
		{
			$this->session->set_flashdata('error',$status);
			redirect('beneficiary/view');
		
		}		
		else if($status_code ==2)
		{
			$sql=mysql_query("SELECT * FROM tbl_icash_credential   ")or die(mysql_error());
		while($row=mysql_fetch_array($sql))
		{
			$terminal_id=$row['terminal_id'];
			$login_key=$row['login_key'];
			$merchant_id=$row['merchant_id'];
			$agent_id=$row['agent_id'];
		}
			$service_url = 'http://202.54.157.77/wsnpci/impsmethods.asmx/TRANSACTIONREQUERY';
			$ch = curl_init($service_url);
			$curl_post_data = array(
			"RequestData" =>"<TRANSACTIONREQUERYREQUEST>
		<TERMINALID>200291</TERMINALID>
		<LOGINKEY>0211042052</LOGINKEY>
		<MERCHANTID>291</MERCHANTID>
			<TRANSACTIONID>$rand_id</TRANSACTIONID>
			<AGENTID>$agent_id</AGENTID>
			<PARAM1></PARAM1>
			<PARAM2></PARAM2>
			<PARAM3></PARAM3>
			<PARAM4></PARAM4>
			<PARAM5></PARAM5>
			<PARAM5></PARAM5>
			</TRANSACTIONREQUERYREQUEST>");
			$post_array_string = '';
			foreach($curl_post_data as $key=>$value) 
			{ 
			$post_array_string .= $key.'='.$value.'&'; 
			}
			$post_array_string = rtrim($post_array_string,'&');

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post_array_string);
			$outputs = curl_exec($ch);      
			$xml = simplexml_load_string($outputs);
			$xml = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $xml);
			$xml = simplexml_load_string($xml);
			$json = json_encode($xml);
			$responseArray = json_decode($json,true);
			$status=$responseArray['STATUSCODE'];
			$status_response=$responseArray['STATUS'];
			if($status==0)
			{
			$this->updateSendmoneyBal($card_no);
			$icash_sales_id = $this->add_icash_sales( array('retailer_id'=>$this->session->userdata('uid'),'icash_user_id'=>$card_no,'amount'=>$u_amount,'beneficiary_id'=>$bene_bene_id,'payment_status'=>'$status','transaction_date'=>date('y-m-d')) );
				
			$this->icash_model->add_icash_commission( array('icash_sales_id'=>$icash_sales_id,'rcommission'=>$rcommission,'dcommission'=>$dcommission,'created_date'=>date('y-m-d')) );
			
			$adminAfterBal = $this->updateUserMoneyTransfer($moneyTransferCommision,$moneyTransferDCommision);
			$retailerAfterBal = $this->updateRetailerMoneyTransfer($moneyTransferCommision,$moneyTransferDCommision);
			
			
			$this->addMoneyTransferCommission( array('retailer_id'=>$this->session->userdata('uid'),'icash_user_id'=>$card_no,'amount'=>$u_amount,'admin_commission'=>$moneyTransferCommision,'distributor_commission'=>$moneyTransferDCommision,'admin_before_bal'=>$adminBeforeBal,'	retailer_before_bal'=>$retailerBeforeBal,'admin_after_bal'=>$adminAfterBal,'retailer_after_bal'=>$retailerAfterBal,'remarks'=>$u_remarks,'transaction_date'=>date('y-m-d')) );
				
			$msg="Sucess";
			$data = array('transaction_status' => $msg);
			$this->db->where('card_no', $cards_no);
			$query=$this->db->update('icashcardregistraion', $data);
			$this->session->set_flashdata('message','Money sent successfully.');
			redirect('beneficiary/view');
			}	
			else if($status==1)
			{
			$this->session->set_flashdata('error',$status);
			redirect('beneficiary/view');
			}	
			else if($status==3)
			{
			$this->session->set_flashdata('error',$status);
			redirect('beneficiary/view');
			}	
			else if($status==4)
			{
			$this->session->set_flashdata('error',$status);
			redirect('beneficiary/view');
			}
		}
		
	}else{
		
		$this->session->set_flashdata('error',"Send money amount exceeds. Kindly request the payment.");
		        redirect('beneficiary/view');
				
	}
	
	
	
	 }


	function get_benetransactionbeneficary($user_name,$mobile_no,$ifsc_code,$acc_no,$trans_type,$u_amount,$u_remarks,$securitykey,$cards_no,$card_no,$bene_bene_id,$rand_id,$service_charge,$icash_user_id)
	{
		//$sendMoneyBal = $this->session->userdata('balance');
		$sendMoneyBal = $this->getSendMoneyBal($this->session->userdata('uid'));
		$sendMoneyUsedBal = $this->getSendMoneyUsedBal($this->session->userdata('uid'));
		$availableBal = $sendMoneyBal - $sendMoneyUsedBal;
		if($availableBal >= $u_amount){

		
		
		// print_r('test'); exit();
	
	
		$sql=mysql_query("SELECT * FROM tbl_icash_credential")or die(mysql_error());
		while($row=mysql_fetch_array($sql))
		{
			$terminal_id=$row['terminal_id'];
			$login_key=$row['login_key'];
			$merchant_id=$row['merchant_id'];
			$agent_id=$row['agent_id'];
		}
		
                $rcheck_result = $this->icash_model->get_icash_commission_details('retailer');
		$rcommission =  ($rcheck_result->commission  / 100) * $u_amount;
		
		
			$dcheck_result = $this->icash_model->get_icash_commission_details('distributor');
	    $dcommission =  ($dcheck_result->commission  / 100) * $u_amount;
		
		$getMoneyTransferCommision = $this->icash_model->getMoneyTransferCommission('money_transfer',$u_amount);
				$commisionType = $getMoneyTransferCommision->commision_type;
				
				if( $commisionType == 1){
					
				 $moneyTransferCommision =  ($getMoneyTransferCommision->commission  / 100) * $u_amount;
				 $moneyTransferDCommision =  ($getMoneyTransferCommision->dcommission  / 100) * $u_amount;	
				 
				} else if ( $commisionType == 2){
					
				 $moneyTransferCommision =  $getMoneyTransferCommision->commission;	
				 $moneyTransferDCommision = $getMoneyTransferCommision->dcommission;	
				 	
				}
		//exit();
		       
		
		         $adminBeforeBal = $this->getAdminBeforBal();
				 $retailerBeforeBal = $this->getRetailerBeforBal();
				
				
				

		$service_url = 'http://202.54.157.77/wsnpci/impsmethods.asmx/TRANSACTION_V3';
		$ch = curl_init($service_url);
		$curl_post_data = array(
		"RequestData" =>"<TRANSACTION_V3REQUEST>
		<TERMINALID>200291</TERMINALID>
		<LOGINKEY>0211042052</LOGINKEY>
		<MERCHANTID>291</MERCHANTID>
		<CARDNO>$card_no</CARDNO>
		<TRANSTYPE>$trans_type</TRANSTYPE>
		<TRANSTYPEDESC>$acc_no</TRANSTYPEDESC>
		<BENEMOBILE>$mobile_no</BENEMOBILE>
		<IFSCCODE>$ifsc_code</IFSCCODE>
		<OTP></OTP>
		<TRANSAMOUNT>$u_amount</TRANSAMOUNT>
		<SERVICECHARGE>0</SERVICECHARGE>
		<REMARKS>$u_remarks</REMARKS>
		<BENEID>$bene_bene_id</BENEID>
		<MERCHANTTRANSID>$rand_id</MERCHANTTRANSID>
		<AGENTID>$agent_id</AGENTID>
		<PARAM1>0</PARAM1>
		<PARAM2></PARAM2>
		<PARAM3></PARAM3>
		<PARAM4>$securitykey</PARAM4>
		<PARAM5></PARAM5>
		</TRANSACTION_V3REQUEST>");
		
		
		$post_array_string = '';
		foreach($curl_post_data as $key=>$value) 
		{ 
		$post_array_string .= $key.'='.$value.'&'; 
		}
	
		
		$post_array_string = rtrim($post_array_string,'&');
		
		//print_r($post_array_string); exit();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_array_string);
		$output = curl_exec($ch);    
		$xml = simplexml_load_string($output);
		$xml = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $xml);
		$xml = simplexml_load_string($xml);
		$json = json_encode($xml);
		$responseArray = json_decode($json,true);
		$status_code=$responseArray['STATUSCODE'];	
		$status=$responseArray['STATUS'];	
		//print_r($responseArray); exit();	
		//$status_code = 0;
		if($status_code	==0)
		{
			$this->updateSendmoneyBal($card_no);
			$icash_sales_id = $this->add_icash_sales( array('retailer_id'=>$this->session->userdata('uid'),'icash_user_id'=>$card_no,'amount'=>$u_amount,'beneficiary_id'=>$bene_bene_id,'payment_status'=>'$status','transaction_date'=>date('y-m-d')) );	
				
			$this->icash_model->add_icash_commission( array('icash_sales_id'=>$icash_sales_id,'rcommission'=>$rcommission,'dcommission'=>$dcommission,'created_date'=>date('y-m-d')) );
			
			$adminAfterBal = $this->updateUserMoneyTransfer($moneyTransferCommision,$moneyTransferDCommision);
			$retailerAfterBal = $this->updateRetailerMoneyTransfer($moneyTransferCommision,$moneyTransferDCommision);
			
			
			$this->addMoneyTransferCommission( array('retailer_id'=>$this->session->userdata('uid'),
													'icash_user_id'=>$card_no,
													'amount'=>$u_amount,
													'admin_commission'=>$moneyTransferCommision,
													'distributor_commission'=>$moneyTransferDCommision,
													'admin_before_bal'=>$adminBeforeBal,
													'retailer_before_bal'=>$retailerBeforeBal,
													'admin_after_bal'=>$adminAfterBal,
													'retailer_after_bal'=>$retailerAfterBal,
													'remarks'=>$u_remarks,
													'transaction_date'=>date('y-m-d')) );
			
			$msg="Sucess";
			$data = array('transaction_status' => $msg);
			$this->db->where('card_no', $card_no);
			$query=$this->db->update('icashcardregistraion', $data);
			/*print_r( array('retailer_id'=>$this->session->userdata('uid'),'icash_user_id'=>$card_no,'amount'=>$u_amount,'admin_commission'=>$moneyTransferCommision,'distributor_commission'=>$moneyTransferDCommision,'admin_before_bal'=>$adminBeforeBal,'	retailer_before_bal'=>$retailerBeforeBal,'admin_after_bal'=>$adminAfterBal,'retailer_after_bal'=>$retailerAfterBal,'remarks'=>$u_remarks,'transaction_date'=>date('y-m-d')) );*/
			// exit();
			
			$this->session->set_flashdata('message','Money sent successfully.');
			redirect('beneficiary/view');
		}		
		else if($status_code ==1)
		{
			$this->session->set_flashdata('error',$status);
			redirect('beneficiary/view');
		}	
		else if($status_code ==3)
		{
			$this->session->set_flashdata('error',$status);
			redirect('beneficiary/view');

		}
		else if($status_code ==2)
		{  
	$sql=mysql_query("SELECT * FROM tbl_icash_credential   ")or die(mysql_error());
		while($row=mysql_fetch_array($sql))
		{
			$terminal_id=$row['terminal_id'];
			$login_key=$row['login_key'];
			$merchant_id=$row['merchant_id'];
			$agent_id=$row['agent_id'];
		}
			$service_url = 'http://202.54.157.77/wsnpci/impsmethods.asmx/TRANSACTIONREQUERY';
			$ch = curl_init($service_url);
			$curl_post_data = array(
			"RequestData" =>"<TRANSACTIONREQUERYREQUEST>
			<TERMINALID>$terminal_id</TERMINALID>
			<LOGINKEY>$login_key</LOGINKEY>
			<MERCHANTID>$merchant_id</MERCHANTID>
			<TRANSACTIONID>$rand_id</TRANSACTIONID>
			<AGENTID>$agent_id</AGENTID>
			<PARAM1></PARAM1>
			<PARAM2></PARAM2>
			<PARAM3></PARAM3>
			<PARAM4></PARAM4>
			<PARAM5></PARAM5>
			<PARAM5></PARAM5>
			</TRANSACTIONREQUERYREQUEST>");
			$post_array_string = '';
			foreach($curl_post_data as $key=>$value) 
			{ 
			$post_array_string .= $key.'='.$value.'&'; 
			}
			$post_array_string = rtrim($post_array_string,'&');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post_array_string);
			$output = curl_exec($ch);    
			$xml = simplexml_load_string($output);
			$xml = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $xml);
			$xml = simplexml_load_string($xml);
			$json = json_encode($xml);
			$responseArray = json_decode($json,true);
			$status=$responseArray['STATUSCODE'];
			$status_response=$responseArray['STATUS'];
			if($status==0)
			{
			$this->updateSendmoneyBal($card_no);	
			$icash_sales_id = $this->add_icash_sales( array('retailer_id'=>$this->session->userdata('uid'),'icash_user_id'=>$card_no,'amount'=>$u_amount,'beneficiary_id'=>$bene_bene_id,'payment_status'=>'$status','transaction_date'=>date('y-m-d')) );	
				
			$this->icash_model->add_icash_commission( array('icash_sales_id'=>$icash_sales_id,'rcommission'=>$rcommission,'dcommission'=>$dcommission,'created_date'=>date('y-m-d')) );
			
			
			$adminAfterBal = $this->updateUserMoneyTransfer($moneyTransferCommision,$moneyTransferDCommision);
			$retailerAfterBal = $this->updateRetailerMoneyTransfer($moneyTransferCommision,$moneyTransferDCommision);
			
			
			$this->addMoneyTransferCommission( array('retailer_id'=>$this->session->userdata('uid'),'icash_user_id'=>$card_no,'amount'=>$u_amount,'admin_commission'=>$moneyTransferCommision,'distributor_commission'=>$moneyTransferDCommision,'admin_before_bal'=>$adminBeforeBal,'	retailer_before_bal'=>$retailerBeforeBal,'admin_after_bal'=>$adminAfterBal,'retailer_after_bal'=>$retailerAfterBal,'remarks'=>$u_remarks,'transaction_date'=>date('y-m-d')) );
				
				$msg="Sucess";
			$data = array('transaction_status' => $msg);
			$this->db->where('card_no', $card_no);
			$query=$this->db->update('icashcardregistraion', $data);
			$this->session->set_flashdata('message','Money sent successfully.');
			redirect('beneficiary/view');
			}	
			else if($status==1)
			{
				$this->session->set_flashdata('error',$status);
			redirect('beneficiary/view');
			}	
			else if($status==3)
			{
				$this->session->set_flashdata('error',$status);
			redirect('beneficiary/view');
			}	
			else if($status==4)
			{
				$this->session->set_flashdata('error',$status);
			redirect('beneficiary/view');
			}
		}
		


	}else{
		
		$this->session->set_flashdata('error',"Send money amount exceeds. Kindly request the payment.");
		        redirect('beneficiary/view');
				
	}
	
	 }
	


	function get_mmidtransactionbeneficary($user_name,$mobile_no,$icash_mmid,$acc_no,$trans_type,$u_amount,$u_remarks,$securitykey,$cards_no,$card_no,$bene_bene_id,$rand_id,$service_charge)
	{
		//$sendMoneyBal = $this->session->userdata('balance');
		$sendMoneyBal = $this->getSendMoneyBal($this->session->userdata('uid'));
		$sendMoneyUsedBal = $this->getSendMoneyUsedBal($this->session->userdata('uid'));
		$availableBal = $sendMoneyBal - $sendMoneyUsedBal;
		if($availableBal >= $u_amount){

		 
		$sql=mysql_query("SELECT * FROM tbl_icash_credential   ")or die(mysql_error());
		while($row=mysql_fetch_array($sql))
		{
			$terminal_id=$row['terminal_id'];
			$login_key=$row['login_key'];
			$merchant_id=$row['merchant_id'];
			$agent_id=$row['agent_id'];
		}
		 $rcheck_result = $this->icash_model->get_icash_commission_details('retailer');
		$rcommission =  ($rcheck_result->commission  / 100) * $u_amount;
		
		
			$dcheck_result = $this->icash_model->get_icash_commission_details('distributor');
	    $dcommission =  ($dcheck_result->commission  / 100) * $u_amount;
		
		
		$getMoneyTransferCommision = $this->icash_model->getMoneyTransferCommission('money_transfer',$u_amount);
				$commisionType = $getMoneyTransferCommision->commision_type;
				
				if( $commisionType == 1){
					
				 $moneyTransferCommision =  ($getMoneyTransferCommision->commission  / 100) * $u_amount;
				 $moneyTransferDCommision =  ($getMoneyTransferCommision->dcommission  / 100) * $u_amount;	
				 
				} else if ( $commisionType == 2){
					
				 $moneyTransferCommision =  $getMoneyTransferCommision->commission;	
				 $moneyTransferDCommision = $getMoneyTransferCommision->dcommission;	
				 	
				}
				
				$adminBeforeBal = $this->getAdminBeforBal();
				$retailerBeforeBal = $this->getRetailerBeforBal();
		
		$service_url = 'http://202.54.157.77/wsnpci/impsmethods.asmx/TRANSACTION_V3';
		$ch = curl_init($service_url);
		$curl_post_data = array(
		"RequestData" =>"<TRANSACTION_V3REQUEST>
		<TERMINALID>200291</TERMINALID>
		<LOGINKEY>0211042052</LOGINKEY>
		<MERCHANTID>291</MERCHANTID>
		<CARDNO>$card_no</CARDNO>
		<TRANSTYPE>$trans_type</TRANSTYPE>
		<TRANSTYPEDESC>$acc_no</TRANSTYPEDESC>
		<BENEMOBILE>$mobile_no</BENEMOBILE>
		<IFSCCODE>$icash_mmid</IFSCCODE>
		<OTP></OTP>
		<TRANSAMOUNT>$u_amount</TRANSAMOUNT>
		<SERVICECHARGE>0</SERVICECHARGE>
		<REMARKS>$u_remarks</REMARKS>
		<BENEID>$bene_bene_id</BENEID>
		<MERCHANTTRANSID>$rand_id</MERCHANTTRANSID>
		<AGENTID>$agent_id</AGENTID>
		<PARAM1>0</PARAM1>
		<PARAM2></PARAM2>
		<PARAM3></PARAM3>
		<PARAM4>$securitykey</PARAM4>
		<PARAM5></PARAM5>
		</TRANSACTION_V3REQUEST>");
		$post_array_string = '';
		foreach($curl_post_data as $key=>$value) 
		{ 
		$post_array_string .= $key.'='.$value.'&'; 
		}
		$post_array_string = rtrim($post_array_string,'&');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_array_string);
		$output = curl_exec($ch);    
		$xml = simplexml_load_string($output);
		$xml = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $xml);
		$xml = simplexml_load_string($xml);
		$json = json_encode($xml);
		$responseArray = json_decode($json,true);
		$status_code=$responseArray['STATUSCODE'];	
		$status=$responseArray['STATUS'];	
		//print_r($responseArray); exit();		
		if($status_code	==0)
		{   $this->updateSendmoneyBal($card_no);
			$icash_sales_id = $this->add_icash_sales( array('retailer_id'=>$this->session->userdata('uid'),'icash_user_id'=>$card_no,'amount'=>$u_amount,'beneficiary_id'=>$bene_bene_id,'payment_status'=>'$status','transaction_date'=>date('y-m-d')) );
				
			$this->icash_model->add_icash_commission( array('icash_sales_id'=>$icash_sales_id,'rcommission'=>$rcommission,'dcommission'=>$dcommission,'created_date'=>date('y-m-d')) );
			
			$adminAfterBal = $this->updateUserMoneyTransfer($moneyTransferCommision,$moneyTransferDCommision);
			$retailerAfterBal = $this->updateRetailerMoneyTransfer($moneyTransferCommision,$moneyTransferDCommision);
			
			
			$this->addMoneyTransferCommission( array('retailer_id'=>$this->session->userdata('uid'),'icash_user_id'=>$card_no,'amount'=>$u_amount,'admin_commission'=>$moneyTransferCommision,'distributor_commission'=>$moneyTransferDCommision,'admin_before_bal'=>$adminBeforeBal,'	retailer_before_bal'=>$retailerBeforeBal,'admin_after_bal'=>$adminAfterBal,'retailer_after_bal'=>$retailerAfterBal,'remarks'=>$u_remarks,'transaction_date'=>date('y-m-d')) );
			
			$msg="Sucess";
			$data = array('transaction_status' => $msg);
			$this->db->where('card_no', $card_no);
			$query=$this->db->update('icashcardregistraion', $data);
			$this->session->set_flashdata('message','Money sent successfully.');
			redirect('beneficiary/view');
		}		
		else if($status_code ==1)
		{
			$this->session->set_flashdata('error',$status);
			redirect('beneficiary/view');
		}	
		else if($status_code ==3)
		{
			$this->session->set_flashdata('error',$status);
			redirect('beneficiary/view');



		}
		else if($status_code ==2)
		{  
	$sql=mysql_query("SELECT * FROM tbl_icash_credential   ")or die(mysql_error());
		while($row=mysql_fetch_array($sql))
		{
			$terminal_id=$row['terminal_id'];
			$login_key=$row['login_key'];
			$merchant_id=$row['merchant_id'];
			$agent_id=$row['agent_id'];
		}
			$service_url = 'http://202.54.157.77/wsnpci/impsmethods.asmx/TRANSACTIONREQUERY';
			$ch = curl_init($service_url);
			$curl_post_data = array(
			"RequestData" =>"<TRANSACTIONREQUERYREQUEST>
			<TERMINALID>$terminal_id</TERMINALID>
			<LOGINKEY>$login_key</LOGINKEY>
			<MERCHANTID>$merchant_id</MERCHANTID>
			<TRANSACTIONID>$rand_id</TRANSACTIONID>
			<AGENTID>$agent_id</AGENTID>
			<PARAM1></PARAM1>
			<PARAM2></PARAM2>
			<PARAM3></PARAM3>
			<PARAM4></PARAM4>
			<PARAM5></PARAM5>
			<PARAM5></PARAM5>
			</TRANSACTIONREQUERYREQUEST>");
			$post_array_string = '';
			foreach($curl_post_data as $key=>$value) 
			{ 
			$post_array_string .= $key.'='.$value.'&'; 
			}
			$post_array_string = rtrim($post_array_string,'&');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post_array_string);
			$output = curl_exec($ch);    
			$xml = simplexml_load_string($output);
			$xml = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $xml);
			$xml = simplexml_load_string($xml);
			$json = json_encode($xml);
			$responseArray = json_decode($json,true);
			$status=$responseArray['STATUSCODE'];
			$status_response=$responseArray['STATUS'];
			if($status==0)
			{  $this->updateSendmoneyBal($card_no);
				$icash_sales_id = $this->add_icash_sales( array('retailer_id'=>$this->session->userdata('uid'),'icash_user_id'=>$card_no,'amount'=>$u_amount,'beneficiary_id'=>$bene_bene_id,'payment_status'=>'$status','transaction_date'=>date('y-m-d')) );	
				
			$this->icash_model->add_icash_commission( array('icash_sales_id'=>$icash_sales_id,'rcommission'=>$rcommission,'dcommission'=>$dcommission,'created_date'=>date('y-m-d')) );
			
			$adminAfterBal = $this->updateUserMoneyTransfer($moneyTransferCommision,$moneyTransferDCommision);
			$retailerAfterBal = $this->updateRetailerMoneyTransfer($moneyTransferCommision,$moneyTransferDCommision);
			
			
			$this->addMoneyTransferCommission( array('retailer_id'=>$this->session->userdata('uid'),'icash_user_id'=>$card_no,'amount'=>$u_amount,'admin_commission'=>$moneyTransferCommision,'distributor_commission'=>$moneyTransferDCommision,'admin_before_bal'=>$adminBeforeBal,'	retailer_before_bal'=>$retailerBeforeBal,'admin_after_bal'=>$adminAfterBal,'retailer_after_bal'=>$retailerAfterBal,'remarks'=>$u_remarks,'transaction_date'=>date('y-m-d')) );
				
				$msg="Sucess";
			$data = array('transaction_status' => $msg);
			$this->db->where('card_no', $card_no);
			$query=$this->db->update('icashcardregistraion', $data);
				$this->session->set_flashdata('message','Money sent successfully.');
			redirect('beneficiary/view');
			}	
			else if($status==1)
			{
				$this->session->set_flashdata('error',$status);
			redirect('beneficiary/view');
			}	
			else if($status==3)
			{
				$this->session->set_flashdata('error',$status);
			redirect('beneficiary/view');
			}	
			else if($status==4)
			{
				$this->session->set_flashdata('error',$status);
			redirect('beneficiary/view');
			}
		}
		


	}else{
		
		$this->session->set_flashdata('error',"Send money amount exceeds. Kindly request the payment.");
		        redirect('beneficiary/view');
				
	}
	
	
	
	 }
	 
	 
	 
	 function icash_login_otp($mobile)
	{
		$sql=mysql_query("SELECT * FROM tbl_icash_credential   ")or die(mysql_error());

 
while($row=mysql_fetch_array($sql))
{
 
			 $terminal_id=$row['terminal_id'];
			 $login_key=$row['login_key'];
			 $merchant_id=$row['merchant_id'];
			 $agent_id=$row['agent_id'];
		}
		$service_url = 'http://202.54.157.77/wsnpci/impsmethods.asmx/LOGIN_CP';
		$ch = curl_init($service_url);
		$curl_post_data = array(
		"RequestData" =>"<LOGIN_CPREQUEST>
		<TERMINALID>$terminal_id</TERMINALID>
		<LOGINKEY>$login_key</LOGINKEY>
		<MERCHANTID>$merchant_id</MERCHANTID>
		<USERMOBILENO>$mobile</USERMOBILENO>
		<AGENTID>$agent_id</AGENTID>
		<PARAM1></PARAM1>
		<PARAM2></PARAM2>
		<PARAM3></PARAM3>
		<PARAM4></PARAM4>
		<PARAM5></PARAM5>
		</LOGIN_CPREQUEST>");
		$post_array_string = '';
        //print_r($curl_post_data);exit;
		foreach($curl_post_data as $key=>$value) 
		{ 
			$post_array_string .= $key.'='.$value.'&'; 
		}
		$post_array_string = rtrim($post_array_string,'&');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_array_string);
		$output = curl_exec($ch); 
		$xml = simplexml_load_string($output);
		$xml = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $xml);
		$xml = simplexml_load_string($xml);
		$json = json_encode($xml);
		$responseArray = json_decode($json,true);
       // print_r($responseArray);exit();
		$response= $responseArray['STATUSCODE'];
        
		if($response==0)
		{
			$data['mobile'] = $mobile;
			$this->load->view('common/header');
			$this->load->view('common/menu');
			$this->load->view('icash_loginvalidate',$data);
			$this->load->view('common/footer');
		}
		else if($response!=0)
		{
			$this->load->view('common/header');
			$this->load->view('common/menu');
			$this->load->view('icash_login');
			$this->load->view('common/footer');
		}

	}
	 
	 
	 
function getAdminBeforBal(){
	
    $getAdminBal  = $this->db->select('send_money_bal')->where('uid','1')->get('usermaster')->row();
	$adminBal = $getAdminBal->send_money_bal;
	
	return $adminBal;	
	
}

function getRetailerBeforBal(){
	
	$getRetailerBal  = $this->db->select('send_money_bal')->where('uid',$this->session->userdata('uid'))->get('usermaster')->row();
	$retailerBal = $getRetailerBal->send_money_bal;
	
	return $retailerBal;
	
}
	 
function updateUserMoneyTransfer($moneyTransferCommision,$moneyTransferDCommision){
	
	//Update Admin balance
	$getAdminBal  = $this->db->select('send_money_bal')->where('uid','1')->get('usermaster')->row();
	$adminBal = $getAdminBal->send_money_bal + $moneyTransferCommision;
	$adminCommission = array('send_money_bal'=>$adminBal);
	$this->db->where('uid','1')->update('usermaster',$adminCommission);
	
	return $adminBal;
	
	
}

function updateRetailerMoneyTransfer($moneyTransferCommision,$moneyTransferDCommision){
	
	
	//Update Distributor balance
	$parentId  = $this->db->select('parent_id')->where('uid',$this->session->userdata('uid'))->get('usermaster')->row();
	$parentId  = $parentId->parent_id;
	$getDistributorBal  = $this->db->select('send_money_bal')->where('uid',$parentId)->get('usermaster')->row();
	$distributorBal = $getDistributorBal->send_money_bal + $moneyTransferDCommision;
	$distributorCommission = array('send_money_bal'=>$distributorBal);
	$this->db->where('uid',$parentId)->update('usermaster',$distributorCommission);
	
	//Detuct Retailer Balance
	$getRetailerBal  = $this->db->select('send_money_bal,sendmoney_used_bal')->where('uid',$this->session->userdata('uid'))->get('usermaster')->row();
	$retailerBal = $getRetailerBal->send_money_bal - $moneyTransferCommision;
	$retailerUsedBal = $getRetailerBal->sendmoney_used_bal + $moneyTransferCommision;
	
	$retailerCommission = array('send_money_bal'=>$retailerBal,'sendmoney_used_bal'=>$retailerUsedBal);
	$this->db->where('uid',$this->session->userdata('uid'))->update('usermaster',$retailerCommission);
	
	
	return $retailerBal;
	
}

function get_icash_commission_details($type){
	
	return $this->db->select('*')->where('type',$type)->get('icash_commision_master')->row();	
		
		
	}
	
function getMoneyTransferCommission($type,$money){
	
	return $this->db->select('*')->where('type',$type)->where('range_start <= '.$money)->where('range_end >= '.$money)->get('icash_commision_master')->row();	
	 
	 //echo $this->db->last_query();
		
		
	}

  function insert_icash_commision($commissiondata){
	  
	  $this->db->where('id',$commissiondata['id']);
	  
	  if($this->db->update('icash_commision_master',$commissiondata)){
		  
		  return true;
		  
	  }else{
		  
		return false;  
	  }
	  
  }

function add_icash_commission($data){
	
	$this->db->insert('icash_commission_mgmt',$data);
}


function add_icash_sales($data){
	
	$this->db->insert('icash_sales_mgmt',$data);
	return $this->db->insert_id();
}

function insert_card_topup($top_val,$card_no)
		{
			$data = array(			
			'retailer_id' => $this->session->userdata('uid'),
			'topup_amount' => $top_val,
			'topup_date'=>date('Y-m-d h:i:s')
			);
			
			$query=$this->db->insert('icash_card_top_up', $data);
			return true;
		}
		
		function getSendMoneyBal($uid){
		
		$query = $this->db->select('send_money_bal')->where('uid',$uid)->get('usermaster')->row();
		
		return $query->send_money_bal;
		
			
		}

		function getSendMoneyUsedBal($uid){
		
		$query = $this->db->select('sendmoney_used_bal')->where('uid',$uid)->get('usermaster')->row();
		
		return $query->sendmoney_used_bal;
		
			
		}
		
		
		function deductSendMoneyBal($amount){
			
			$data= array('sendmoney_used_bal'=>$amount);
			$uid = $this->session->userdata('uid');
		
		   $query = $this->db->where('uid',$uid)->update('usermaster',$data);
		
			//echo $this->db->last_query();
			//exit();
		}
		
		function cardTopupMail($status){
		
		    $to ='tnav077346@gmail.com,info@paybuks.cok';
			$subject = "Card Topup Failure";
			$Name='support@paybuks.com';
			
			$message = '<div style="width: 527px; height: 334px; border:1px solid #39C; background:#39C;" >
			<div style="width:500px; height:300px; border:1px solid #39C; border-radius:20px; margin-left: 11px; margin-top: 16px; background:white;"> 
			<h3 style="float:left; width:350px; text-align: center;color:#39C">Card Topup Failure,</h3>
			<p style="width:350px; text-align: left; margin-left: 26px;word-wrap: break-word;">
			<br><br>
			Dear Paybuks Team, 
			<br><br>
			<br><br>
			Failure status:'.$status.',
			<br><br>
			Retailer Name:'.$this->session->userdata('name').',
			<br><br>
			Retailer Id:'.$this->session->userdata('uid').',
			<br><br>
			Card No.:'.$this->session->userdata('card_no').',
			<br><br>
			</p>
			</div>
			<a style="float:right; margin-right: 48px; text-decoration:none; color:#FFF;" href="http://paybuks.com">© paybuks.com</a>
			</div>';
		
		  $headers = 'MIME-Version: 1.0' . "\r\n";
						$headers .= "From:".$Name."\r\nReply-to: no-reply@paybuks.com";
						//$headers .= "From:".$Name."\n";
						$headers .= "To-Sender: \n";
						$headers .= "X-Mailer: PHP\n"; // mailer
						$headers .= "X-Priority: 1\n"; // Urgent message!
						$headers .= "Return-Path: \n"; // Return path for errors	
						$headers .= "Content-Type: text/html; charset=iso-8859-1\n"; // Mime type
						
						mail($to,$subject,$message,$headers);
			
			
		}
		
		function updateSendmoneyBal($card){
			
		$service_url = 'http://202.54.157.77/wsnpci/impsmethods.asmx/CHECKCARDBALANCE';
$ch = curl_init($service_url);
$curl_post_data = array(
"RequestData" =>"<CHECKCARDBALANCEREQUEST>
<TERMINALID>200291</TERMINALID>
<LOGINKEY>0211042052</LOGINKEY>
<MERCHANTID>291</MERCHANTID>
<AGENTID>ViaPaise</AGENTID>
<CARDNO>$card</CARDNO>
</CHECKCARDBALANCEREQUEST>");
$post_array_string = '';
foreach($curl_post_data as $key=>$value) 
{ 
$post_array_string .= $key.'='.$value.'&'; 
}
$post_array_string = rtrim($post_array_string,'&');

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_array_string);

$output = curl_exec($ch);    
$xml = simplexml_load_string($output);
$xml = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $xml);
$xml = simplexml_load_string($xml);
$json = json_encode($xml);
$responseArray = json_decode($json,true);
 $status_code=$responseArray['STATUSCODE'];
 $balz=$responseArray['BALANCE'];
 
 //$this->session->set_userdata('balance') = $balz; 	
 
 $session_data = array('balance' => $balz);
$this->session->set_userdata($session_data);
 
			
			
		}
		
 function get_commission_details(){
	
	return $this->db->select('*')->get('icash_commision_master')->result();	
				
	}
	
	
	function addMoneyTransferCommission($data){
		
		
		$this->db->insert('icash_money_transfer_commision',$data);
		
	}
		


}





	 
