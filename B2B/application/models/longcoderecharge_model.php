<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class longcoderecharge_model extends CI_Model {
	
		public function get_Prepaid()
		{
			$this->db->select('*');
			$this->db->from('mobileprovider');
			$this->db->where('status', 'Enable');
			$query = $this->db->get();
			return  $query->result(); 
		}
		
		public function get_Provider($tbl, $column, $val)
		{
			$this->db->select('*');
			$this->db->from($tbl);
			$this->db->where( $column,  $val);
			$query = $this->db->get();
			return  $query->result(); 
		}
		
		public function get_dthprovider()
		{
			$this->db->select('*');
			$this->db->from('dthprovider');
			$this->db->where('status', 'Enable');
			$query = $this->db->get();
			return  $query->result(); 
		}
		public function get_electricityprovider()
		{
			$this->db->select('*');
			$this->db->from('electricityprovider');
			$this->db->where('status', 'Enable');
			$query = $this->db->get();
			return  $query->result(); 
		}
		public function get_gasprovider()
		{
			$this->db->select('*');
			$this->db->from('gasprovider');
			$this->db->where('status', 'Enable');
			$query = $this->db->get();
			return  $query->result(); 
		}
		public function get_landlineprovider()
		{
			$this->db->select('*');
			$this->db->from('landlineprovider');
			$this->db->where('status', 'Enable');
			$query = $this->db->get();
			return  $query->result(); 
		}
		
		
		public function get_postpaid()
		{
			$this->db->select('*');
			$this->db->from('mobilepostpaidprovider');
			$this->db->where('status', 'Enable');
			$query = $this->db->get();
			
			return  $query->result(); 
		}
		public function get_details($mobilenumber)
		{
			  
		$query = $this->db->get_where('usermaster', array('isactive'=>'yes','type'=>'retailer','mobile' => $mobilenumber));//->or_where("mobile","0".$mobilenumber);		
			//echo $this->db->last_query();
			if($query)
			{ 
				return $query->row();
			}
			else
			{
			return false;
			}
		
		
		}
		public function get_user_with_mobile($mobilenumber)
		{
			  
		$query = $this->db->get_where('usermaster', array('mobile' => $mobilenumber));//->or_where("mobile","0".$mobilenumber);		
			//echo $this->db->last_query();
			if($query)
			{ 
				return $query->row();
			}
			else
			{
			return false;
			}
		
		
		}
		public function get_dis_details($mobilenumber)
		{
			  
		$query = $this->db->get_where('usermaster', array('type'=>'distributor','mobile' => $mobilenumber));//->or_where("mobile","0".$mobilenumber);		
			echo $this->db->last_query();
			if($query)
			{ 
				return $query->row();
			}
			else
			{
			return false;
			}
		
		
		}
	
	 
		
	
	public function add_ledgerreport($sql,$mobile,$mobile1,$testing)
    {  
     
      $qry= $this-> db-> query($sql);
	   if($qry)
     { 
     
		 $url = "http://alerts.solutionsinfini.com//api/v3/index.php?method=sms&api_key=A96b7866cc3166b24d4c6397ef5d6d436&to=$mobile,$mobile1&sender=PAYBUK&message=$testing&format=json&custom=1,2";

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
					 }


        /* echo "<script type='text/javascript'>alert('Fund transfer Successfully'); window.location.href = 'home';  </script>";  */
	    return true;
         
		 
		 
	 
     }
     return false;
   }
		
		public function get_parent_total_detail($loginuser_parent_id)
		{
			
			$query = $this->db->get_where('usermaster', array('uid' => $loginuser_parent_id));		
			if($query)
			{
				//return $query->result();
				return $query->row();
			}
			else
			{
			return false;
			}
	  
		
		}


public function get_distributor_parent_total_detail($distributor_parent_id)
		{
			$this->db->select('total_balance');
			$this->db->from('usermaster');
			$this->db->where('uid',$distributor_parent_id);
			$query = $this->db->get();
			return  $query->result(); 
		
		}
		
		
		public function insert_recharge_details($dataValues)
		{
			$this->db->insert('recharge_details',$dataValues);
			return $this->db->insert_id();
		}
		public function update_balance($data)
		{
			$id=$this->session->userdata('uid');
			$this->db->where('uid', $id);
			$query=$this->db->update('usermaster', $data);
			return true;
		}
		
		public function update_balance_with_id($data,$id)
		{
			 
			$this->db->where('uid', $id);
			$query=$this->db->update('usermaster', $data);
			echo $this->db->last_query();
			return true;
		}
		
		
		
		
		public function update_recharge_trans_id($data,$insert)
		{
			$this->db->where('id', $insert);
			$query=$this->db->update('recharge_details', $data);
			return true;
		}
		
		public function update_recharge_error_status($error_datas,$insert)
		{
			$this->db->where('id', $insert);
			$query=$this->db->update('recharge_details', $error_datas);
			//echo $this->db->last_query();
			return true;
		}
		
		
		public function update_recharge_retailer_commssion($current_total_balance,$login_user_id)
		{
			$this->db->where('uid', $login_user_id);
			$query=$this->db->update('commission_mgmt', array('total_balance' => $current_total_balance));
			return true;
		}
	
	
		public function update_distributor_commission($current_total_balance_distributor,$loginuser_parent_id)
		{
			$this->db->where('uid', $loginuser_parent_id);
			$query=$this->db->update('usermaster', array('total_balance' => $current_total_balance_distributor));
			return true;
		}
	

	public function update_super_commission($current_total_balance_super,$distributor_parent_id)
		{
			$this->db->where('uid', $distributor_parent_id);
			$query=$this->db->update('usermaster', array('total_balance' => $current_total_balance_super));
			return true;
		}
	
		public function get_commission_by_providers($serviceprovider)
		{
			$query = $this->db->get_where('mobileprovider', array('ezypay_prcode' => $serviceprovider));		
			if($query)
			{
				//return $query->result();
				return $query->row();
			}
			else
			{
			return false;
			}
		}
		
		public function get_commission_by_provider($serviceprovider,$tbl)
		{
			$query = $this->db->get_where($tbl, array('ezypay_prcode' => $serviceprovider));		
			if($query)
			{
				//return $query->result();
				return $query->row();
			}
			else
			{
			return false;
			}
		}
		
		public function get_all_dth_details($serviceprovider)
		{
			$query = $this->db->get_where('dthprovider', array('ezypay_prcode' => $serviceprovider));		
			if($query)
			{
				//return $query->result();
				return $query->row();
			}
			else
			{
			return false;
			}
		}
		
		public function get_all_post_paid_details($serviceprovider)
		{
			$query = $this->db->get_where('mobilepostpaidprovider', array('ezypay_prcode' => $serviceprovider));		
			if($query)
			{
				//return $query->result();
				return $query->row();
			}
			else
			{
			return false;
			}
		}
		
		
		
		public function send_success_sms($mobilenumber,$current_available_bal,$error_id,$amount,$trans_id,$user_mobile)
		{
			
			
			//$testing="RECHARGE SUCCESS. Mobile Number: $mobilenumber, Amount: $amount, Txn ID: $trans_id. Your bal: Rs. $current_available_bal";
			$testing = "RECHARGE SUCCESS. Mobile Number: $mobilenumber, Amount: $amount, Txn ID: $trans_id. Your bal: Rs. $current_available_bal/-";
			 
			
		$url ="http://alerts.solutionsinfini.com//api/v3/index.php?method=sms&api_key=A9d7a78becd6133a3145c8c73a4ad75c6&to=$user_mobile&sender=PAYBUK&message=$testing&format=json&custom=1,2";
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
					 }
					 
				 $sms_outing= array('agentmob'=>$mobilenumber,'msg'=>$testing,'by_uid'=>$this->session->userdata('uid'));
			
				 $this->add_smsoutgoing( $sms_outing );
			
		} 	
		
		public function send_pending_sms($mobilenumber,$current_available_bal,$error_id,$amount,$trans_id,$user_mobile)
		{
			
			$testing="RECHARGE PENDING. Mobile Number: $mobilenumber, Amount: $amount, Txn ID: $trans_id. Your bal: $current_available_bal";
			
			
					$url = "http://alerts.solutionsinfini.com//api/v3/index.php?method=sms&api_key=A9d7a78becd6133a3145c8c73a4ad75c6&to=$user_mobile&sender=PAYBUK&message=$testing&format=json&custom=1,2";
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
					 }
			
				 $sms_outing= array('agentmob'=>$mobilenumber,'msg'=>$testing,'by_uid'=>$this->session->userdata('uid'));
			
				$this->add_smsoutgoing( $sms_outing );
		} 	
		  
		public function send_duplicate_sms($mobilenumber,$avaliable_amount,$error_id,$amount,$trans_id,$user_mobile)
		{
			
			$testing="PAYBUKS -Already this number recharged please try after 10 minutes";
					$url = "http://alerts.solutionsinfini.com//api/v3/index.php?method=sms&api_key=A9d7a78becd6133a3145c8c73a4ad75c6&to=$user_mobile&sender=PAYBUK&message=$testing&format=json&custom=1,2";
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
					 }
			
				 $sms_outing= array('agentmob'=>$mobilenumber,'msg'=>$testing,'by_uid'=>$this->session->userdata('uid'));
			
				$this->add_smsoutgoing( $sms_outing );
		} 	
		
		
		public function send_failure_sms($mobilenumber,$avaliable_amount,$error_id,$amount,$trans_id,$user_mobile)
		{
			
			$testing="RECHARGE FAIL. Mobile Number: $mobilenumber, Amount: $amount. Your bal: Rs. $avaliable_amount";
					$url = "http://alerts.solutionsinfini.com//api/v3/index.php?method=sms&api_key=A9d7a78becd6133a3145c8c73a4ad75c6&to=$user_mobile&sender=PAYBUK&message=$testing&format=json&custom=1,2";
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
					 }
			
				 $sms_outing= array('agentmob'=>$mobilenumber,'msg'=>$testing,'by_uid'=>$this->session->userdata('uid'));
			
				$this->add_smsoutgoing( $sms_outing );
		}
		 
		public function send_insufficient_sms($mobilenumber,$avaliable_amount,$error_id,$amount,$trans_id,$by_id)
		{
			$rd_aval_amount=round($avaliable_amount,2);
		 	$testing="Your balance is not enough for this recharge, Your Balance is RS $rd_aval_amount";
		echo	 $url = "http://alerts.solutionsinfini.com//api/v3/index.php?method=sms&api_key=A9d7a78becd6133a3145c8c73a4ad75c6&to=$user_mobile&sender=PAYBUK&message=$testing&format=json&custom=1,2";
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
					 }
				 $sms_outing= array('agentmob'=>$mobilenumber,'msg'=>$testing,'by_uid'=>$by_id);
			
				$this->add_smsoutgoing( $sms_outing );
			
		} 	
		
	public function send_sms($mobilenumber, $msg)
		{
			
			 
					$url = "http://alerts.solutionsinfini.com//api/v3/index.php?method=sms&api_key=A9d7a78becd6133a3145c8c73a4ad75c6&to=$mobilenumber&sender=PAYBUK&message=$msg&format=json&custom=1,2";
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
					 return $ret[0] ;
					 }
			
			//	 $sms_outing= array('agentmob'=>$mobilenumber,'msg'=>$testing,'by_uid'=>$this->session->userdata('uid'));
			
		//		$this->add_smsoutgoing( $sms_outing );
		} 	
		public function send_mail($email,$sub,$msg){
			  $Name='support@paybuks.com';
				//$Name='Paybuks';
				$to =$email;
				$subject = "ALERT ".$sub;
				$message = '<div style="width: 527px; height: 334px; border:1px solid #39C; background:#39C;" >
				<div style="width:500px; height:300px; border:1px solid #39C; border-radius:20px; margin-left: 11px; margin-top: 16px; background:white;"> 
				<h3 style="float:left; width:350px; text-align: center;color:#39C">PAYBUCKS ALERT,</h3>
				<p style="width:350px; text-align: left; margin-left: 26px;word-wrap: break-word;">
				<br><br> 
				 '.$msg.'
				<br><br>
				</p>
				</div>
				<a style="float:right; margin-right: 48px; text-decoration:none; color:#FFF;" href="http://paybuks.in">© paybuks.in</a>
				</div>';
	
							$headers = 'MIME-Version: 1.0' . "\r\n";
							$headers .= "From:".$Name."\r\nReply-to: no-reply@paybuks.com";
							//$headers .= "From:".$Name."\n";
							$headers .= "To-Sender: \n";
							$headers .= "X-Mailer: PHP\n"; // mailer
							$headers .= "X-Priority: 1\n"; // Urgent message!
							$headers .= "Return-Path: \n"; // Return path for errors	
							$headers .= "Content-Type: text/html; charset=iso-8859-1\n"; // Mime type
				//			$headers .= "bcc:".$fed."\n"; // BCCs to
										
				//header("location:contact.php?phid6=act");
				$flgSend=mail($to,$subject,$message,$headers);  
				if($flgSend)
				{
				 //echo "Email Sent Successfully.";
				
				}
				else
				{
				//echo "Email  Can Not Send.";
				}				
			
		}
public function generateRandomString($length = 6) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
	}
	public function get_admin_detail(){
		$query = $this->db->get_where('usermaster', array('uid' => '1'));		
			if($query)
			{
				//return $query->result();
				return $query->row();
			}
			else
			{
			return false;
			}
	}
public function get_Retdetails($mobilenumber)
		{		
			$query = $this->db->get_where('usermaster', array('mobile' => $mobilenumber,'type' =>'retailer'));		
			if($query)
			{
				//return $query->result();
				return $query->row();
			}
			else
			{
			return false;
			}
		}
		public function get_PrepaidOperator($msg_operator)
		{			
			$query = $this->db->get_where('mobileprovider', array('smscode' => $msg_operator));		
			if($query)
			{
				//return $query->result();
				return $query->row();
			}
			else
			{
			return false;
			}
		}
		public function get_PostpaidOperator($msg_operator)
		{			
			$query = $this->db->get_where('mobilepostpaidprovider', array('smscode' => $msg_operator));		
			if($query)
			{
				//return $query->result();
				return $query->row();
			}
			else
			{
			return false;
			}
		}
		public function get_dthOperator($msg_operator)
		{			
			$query = $this->db->get_where('dthprovider', array('smscode' => $msg_operator));		
			if($query)
			{				
				return $query->row();
			}
			else
			{
			return false;
			}
		}	
		

public function balance_sms($mobilenumber_sender,$user_name,$availablebal)
		{			
		
$testing="Dear $user_name, Your current balance is Rs. $availablebal/-";
					$url = "http://alerts.solutionsinfini.com//api/v3/index.php?method=sms&api_key=A9d7a78becd6133a3145c8c73a4ad75c6&to=$mobilenumber_sender&sender=PAYBUK&message=$testing&format=json&custom=1,2";
  
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
					 }
			//echo $ret[0];

	
		}	
		

public function hist_sms($mobilenumber_sender,$user_name,$availablebal)
		{			
		

$testing="Dear $user_name, Your current balance is Rs. $availablebal/-";
					$url = "http://alerts.solutionsinfini.com//api/v3/index.php?method=sms&api_key=A9d7a78becd6133a3145c8c73a4ad75c6&to=$mobilenumber_sender&sender=PAYBUK&message=$testing&format=json&custom=1,2";
  
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
					 }
			//echo $ret[0];

	
		}	

  public function get_planDetails($operator_id,$circle_id,$plan_id)
  {
  
  $this->db->select("plan_name,plan_desc,amount,talktime,validity");
  $this->db->from('plan_details');    
  $this->db->where(array('operator_id' => $operator_id, 'circle_id' => $circle_id,'plan_id'=>$plan_id));    
  $query = $this->db->get();
  return $query->result();
  }
  
  public function get_rechargestatus($type,$number)
  {
  if($type==1)
  {
   $this->db->select("*");
   $this->db->from('recharge_details_buffer');    
   $this->db->where(array('trans_id' => $number));    
   $query = $this->db->get();
  }
  else if($type==2)
  {
   $this->db->select("*");
   $this->db->from('recharge_details_buffer');    
   $this->db->where(array('mobilenumber' => $number));    
   $query = $this->db->get();
  }
return $query->result();
  }
  
  public function get_balance($user_id){
	  
	 return $this->db->select('total_balance,used_balance,available_balance')->where('uid',$user_id)->get('usermaster')->row();
	  
	  
  }
   public function update_user_balanz($tot,$ids)
   {
		 
			$data = array(			
				'total_balance' => $tot
			);
			$this->db->where('uid', $ids);
			$query=$this->db->update('usermaster', $data);
			return true;
   
   }
   
   public function update_session_balz($id_sess,$current_user_balance)
   {
		
			$data = array(			
				'used_balance' =>$current_user_balance,
				
			);
			$this->db->where('uid', $id_sess);
			$query=$this->db->update('usermaster', $data);
			
			return true;
   
   }
    public function update_longcode_call($MID,$status)
   {
		
			$data = array(			
				'status' =>$status,
				
			);
			$this->db->where('MID', $MID);
			$query=$this->db->update('longcode_call', $data);
			
			return true;
   
   }
   function add_longcode_call($data)
  {
	  $this->db->insert('longcode_call',$data);
		$qry= $this->db->insert_id();
	 
		if($qry) 
		{		 
	
		return true;		
	
		}
	
		return false;
  }
  function add_temp_transaction($data)
  {
	  $this->db->insert('temp_recharge_transaction',$data);
		$qry= $this->db->insert_id();
	 
		if($qry) 
		{		 
	
		return true;		
	
		}
	
		return false;
  }
 
  function add_recharge_commission($data)
  {
	  $this->db->insert('commission_mgmt',$data);
		$qry= $this->db->insert_id();
	
		if($qry)
	
		{		 
	
		return true;		
	
		}
	
		return false;
  }
	function add_smsoutgoing($register_data)
	
	{
		$this->db->insert('smsoutgoing',$register_data);
		$qry= $this->db->insert_id();
	
		if($qry)
	
		{		 
	
		return true;		
	
		}
	
		return false;
	
	}	 	
	function add_reversal_request($register_data)
	
	{
		$this->db->insert('reversal_request',$register_data);
		$qry= $this->db->insert_id();
	
		if($qry)
	
		{		 
	
		return true;		
	
		}
	
		return false;
	
	}	 	
	
	public function get_ezypay_balance(){
	
	
	$url = "http://103.29.232.110:8089/Ezypaywebservice/GetBalance.aspx?AuthorisationCode=de4527cfd9674f86bc";

$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
					curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
					$data = curl_exec($ch);
					curl_close($ch);
					$get_trans=(explode("~",$data));
					  	
						 if($get_trans[0] > 0 )
						 {
							 return $get_trans[0];								
						 }else{
							 
							 return "-1";
						 } 
					
					
		
	}
  public function get_user($user_id){
	  
	 return $this->db->select('*')->where('uid',$user_id)->get('usermaster')->row();
	  
	  
  }

		public function update_confirm_temp_transaction($data,$id)
		{
			$this->db->where('temp_id', $id);
			$query=$this->db->update('temp_recharge_transaction', $data);
			 
			return true;
		}
		
public function update_temp_transaction()
  { 
  //$this->db->where("uid",$var);
			 
			 
			$sql="SELECT * FROM recharge_details
			 join temp_recharge_transaction on temp_recharge_transaction.recharge_id=recharge_details.id where temp_recharge_transaction.status='Pending'";
			 $qry= $this-> db-> query($sql);
		 
			if($qry->num_rows()>0)
			{	
		   		$records = $qry->result();
			 foreach($records as $querys){   	
				$recharge_id = $querys->recharge_id;
				$by_id =  $querys->by_id;
				$trans_date = $querys->rdate;
				$mobilenumber=$querys->mobilenumber;
				
            	$user = $this->get_user($by_id );
				$parent_id = $user->parent_id;
				$amount =  $querys->amount;
				$used_balance = $user->used_balance + $amount;
				
				$avaliable_amount = $querys->after_balance;
				$serviceprovider =  $querys->serviceprovider_code;
				
				$check_result = $this->get_commission_by_providers($serviceprovider);
				
			
				  $available_totalbalance =  ($user->total_balance - $user->used_balance )- $amount ; 
				  
				  
				  $total_balance = $user->total_balance;	
					
				  $before_balance = $user->available_balance; 
				  $after_balance = $available_totalbalance; 		
			
						
			
				/* */
				$data_result =  $querys->api_result;
				if ( $data_result != "" ) {
				 	$get_trans=(explode("~",$data_result));
						 $trans_id=$get_trans[0];
						 $error_id=$get_trans[3];
						 $error_description=$get_trans[4];	
				}else{
					 $trans_id=-1;
						 $error_id=-1;
						 $error_description="Result empty ";
				}

				
						 if($error_id ==1 || $error_id==200) //Success
						 {
							$error_status=1; 
							$sms_msg = "RECHARGE SUCCESS. Mobile Number: $mobilenumber, Amount: $amount, Txn ID: $trans_id.";// Your bal: Rs. $current_available_bal/-";
						 $retail_commission =  ($check_result->commission  / 100) * $amount;
						  $d_commission =  ($check_result->dcommission  / 100) * $amount;
						  
						  $before_balance = $user->available_balance; 
						  $after_balance = $available_totalbalance + $retail_commission; 
							
						  $total_balance = $user->total_balance + $retail_commission ;	
							
								$this->add_recharge_commission( array('recharge_id'=>$recharge_id,'transaction_status'=>'Success','user_id'=>$by_id,'commission'=>$retail_commission,'created_date'=>$trans_date,'transaction_status'=>'Pending' ) );
								//Distributor Commission
						$this->add_recharge_commission( array('recharge_id'=>$recharge_id,'transaction_status'=>'Success','user_id'=>$parent_id,'commission'=>$d_commission,'created_date'=>$trans_date,'transaction_status'=>'Pending' ) );
						
						
										
				// Update Commission Recharge Table  
$error_datas=array('after_balance'=>$after_balance,'before_balance'=>$before_balance,'commission'=>$retail_commission,'dcommission'=>$d_commission,'result'=>$error_description,'error_status_code'=>$error_status,'trans_id'=>$trans_id);
						 				
						 }
						 else if($error_id==100) //Pending
						 {
							$sms_msg = "RECHARGE PENDING. Mobile Number: $mobilenumber, Amount: $amount, Txn ID: $trans_id. Your bal: $current_available_bal";
							$error_status=2;
							$revesal_data =  array('recharge_id'=>$recharge_id,'requester_id'=>$by_id,'to_id'=>$parent_id,'requested_date'=>$trans_date,'request_status'=>'Pending'  );
								$reversal_request = $this->add_reversal_request( $revesal_data  );	
												
							  
							  // Update Commission Recharge Table  
			  $error_datas=array('after_balance'=>$after_balance,'before_balance'=>$before_balance,'commission'=>0,'dcommission'=>0,'result'=>$error_description,'error_status_code'=>$error_status,'trans_id'=>$trans_id);	
			  							
						 }else if($error_id == -1611) //Duplicate transaction
						{     
							  $error_status= -1611;
							  $sms_msg = "PAYBUKS -Already this number recharged please try after 10 minutes";
						  
							 $revesal_data =  array('recharge_id'=>$recharge_id,'requester_id'=>$by_id,'to_id'=> $user->parent_id,'requested_date'=>$trans_date,'request_status'=>'Pending'  );
							 $reversal_request = $this->add_reversal_request( $revesal_data  );	
							 
							 				
				// Update Commission Recharge Table  
				  $error_datas=array('after_balance'=>$after_balance,'before_balance'=>$before_balance,'commission'=>0,'dcommission'=>0,'result'=>$error_description,'error_status_code'=>$error_status,'trans_id'=>$trans_id);
									
						}else if($error_id == -130) //Failure transaction
						{
							$error_status=0;
							$sms_msg = "RECHARGE FAIL. Mobile Number: $mobilenumber, Amount: $amount. Your bal: Rs. $avaliable_amount";	
							// REVESAL DATA	
							$revesal_data =  array('recharge_id'=>$recharge_id,'requester_id'=>$by_id,'to_id'=> $user->parent_id,'requested_date'=>$trans_date,'request_status'=>'Pending' );
							$reversal_request = $this->recharge_model->add_reversal_request( $revesal_data  );	
		
						
				// Update Commission Recharge Table  
$error_datas=array('after_balance'=>$after_balance,'before_balance'=>$before_balance,'commission'=>0,'dcommission'=>0,'result'=>$error_description,'error_status_code'=>$error_status,'trans_id'=>$trans_id);					
						}
						 else
						 {
							$error_status=0;
						    $sms_msg = "RECHARGE FAIL. Mobile Number: $mobilenumber, Amount: $amount. Your bal: Rs. $avaliable_amount";	
							$revesal_data =  array('recharge_id'=>$recharge_id,'requester_id'=>$by_id,'to_id'=> $user->parent_id,'requested_date'=>$trans_date,'request_status'=>'Pending' );
							$reversal_request = $this->add_reversal_request( $revesal_data  );	
							
											
				// Update Commission Recharge Table  
$error_datas=array('after_balance'=>$after_balance,'before_balance'=>$before_balance,'commission'=>0,'dcommission'=>0,'result'=>$error_description,'error_status_code'=>$error_status,'trans_id'=>$trans_id);
							
						 }	
						
				
				$update_error_status = $this->update_recharge_error_status($error_datas,$recharge_id);
						
			 					
				  
				
				// SMS  message save in table
				$mobilenumber= $querys->mobilenumber;
				
				$sms_outing= array('agentmob'=>$mobilenumber,'msg'=>$sms_msg,'by_uid'=>$by_id );
			
		   		$this->add_smsoutgoing( $sms_outing );
				
				    
					$data=array('total_balance'=>$total_balance,
					'used_balance'=>$used_balance,
					'available_balance'=>$after_balance, 
				);
				 
				$this->update_balance($data); 
				$timezone = new DateTimeZone("Asia/Kolkata");
				$date = new DateTime();
				$date->setTimezone($timezone);
                  

				$updated_at=$date->format('Y-m-d H:i:s');
				 
				$this->update_confirm_temp_transaction(array('status'=>'Completed','updated_at'=>$updated_at),$querys->temp_id);
				
			 }return true;
			} 
			else 
			{
				return false;
			}
		  
  }
  
  public function history($by_id){
	 /* XXXXXXXXX SUCCESS,XXXXXXXXX FAIL, XXXXXXXXX PENDING */
		 $sql="SELECT * FROM recharge_details
			   where  recharge_details.by_id='".$by_id."' ORDER BY `id` DESC LIMIT 3";
			 $qry= $this-> db-> query($sql);
		 	//echo $this->db->last_query();
			if($qry->num_rows()>0)
			{	
		   		$records = $qry->result();
				 $msg = "";
			 foreach($records as $querys){   	
			 		
				
				
				if ($querys->error_status_code == 1 ){
					$status =  'SUCCESS'; 
				}elseif ($querys->error_status_code == 2 ){
						$status =  'PENDING'; 
				}else{
					$status =  'FAIL'; 
				} 
				 
				$msg = $msg."".$querys->mobilenumber." ".$querys->amount." ".$status.", " ; 
				/*$recharge_id = $querys->id;
				$by_id =  $querys->by_id;
				
				$trans_date = $querys->rdate*/;
			 }
		 			
			 return "Last 3 Transactions ".$msg;
			}else{
			 return "";	
			}
	  //Last 3 Transactions <xxxxxxx> <xxxx> <status>,<xxxxxxx> <xxxx> <status>,<xxxxxxx> <xxxx> <status>
	  
  }
	
	public function revoke ()
	{
		 $sql="SELECT * FROM recharge_details
			   where  recharge_details.error_status_code='0'";
			 $qry= $this-> db-> query($sql);
		 
			if($qry->num_rows()>0)
			{	
		   		$records = $qry->result();
			 foreach($records as $querys){   	
			 
				$recharge_id = $querys->id;
				$by_id =  $querys->by_id;
				
				$trans_date = $querys->rdate;
				$mobilenumber=$querys->mobilenumber;
				
            	$user = $this->get_user($by_id ); 
				
				$amount =  $querys->amount;
						
				  $after_balance = 0; 
				  $before_balance =0; 		
	 		      $commission=0;
				  $dcommission=0;
				  $rd_datas=array('dcommission'=>$dcommission,
					'commission'=>$commission,
					'after_balance'=>$after_balance, 
					'before_balance'=>$before_balance,'result'=>'',
				);
				  $update_error_status = $this->update_recharge_error_status($rd_datas,$recharge_id);
						
			 					
				  
			 	  $used_balance = $user->used_balance - $amount; 
			
				 $available_totalbalance =  ($user->total_balance - $user->used_balance )+ $amount ;   
			
				
				    
					$data=array(
					'used_balance'=>$used_balance,
					'available_balance'=>$available_totalbalance, 
				);
				 
				$this->update_balance_with_id($data,$by_id); 
			  
				
			 }return true;
			} 
			else 
			{
				return false;
			}
	}
	
	
	
}
