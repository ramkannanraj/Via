<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class User extends CI_Controller {
		public function __construct()
		{
			 
			parent::__construct();
			$this->load->helper('url');     
			$this->load->library('form_validation');
			$this->load->model('user_model');
			$this->load->model('viewuser_model');
			$this->load->helper('string');
			$this->load->helper('date');
			$this->load->helper(array('form', 'url'));
		}
		public function index()
		{
			
			if(($this->session->userdata('uid')!=""))
			{
				redirect(site_url('user/home'));
			}
			else
			{
				$this->load->view("merchant-login");
			} 
		}
		public function addMoney(){
  
		  
		  
		  $amount=$this->input->post('amount');
		  
		  $uid = $this->session->userdata('uid');
		  
		  
		  
		  $result = $this->user_model->add_money($amount,$uid); 
		  if($result == true){
		   
		   header('Content-Type: application/json');
		   echo json_encode(array('message' => 'Money added successfully.','class' => 'success'));
		   
		   
		  }else{
		   
		   header('Content-Type: application/json');
		   echo json_encode( array('message' => 'There is some problem in adding money.','class' => 'fail'));
		   
		   
		  }
		 
		  
		 }
		 
		 public function addSendMoneyBal(){

		$amount=$this->input->post('amount');
		$uid = $this->session->userdata('uid');
		
		$result = $this->user_model->add_sendmoney_bal($amount,$uid); 
		if($result == true){
			
			header('Content-Type: application/json');
			echo json_encode(array('message' => 'Money added successfully.','class' => 'success'));
		
		}else{
			
			header('Content-Type: application/json');
			echo json_encode( array('message' => 'There is some problem in adding money.','class' => 'fail'));
		}
 
	}
		 
		 
		public function rolekey_exists($key) 
		{
			$check=$this->user_model->mailcheck($key);
			if ($check == 'true')
			{
			return FALSE;
			}
			else
			{
			return TRUE;
			}
		}
		public function rolekey_existed($mob) 
		{
			$check=$this->user_model->mobcheck($mob);
			if ($check == 'true')
			{
				
			return FALSE;
			
			}
			else
			{
				
			return TRUE;
			}
		}
	
		public function login()
		{
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			$auth=$this->user_model->login($username,$password);	
			
			if($auth)
				{ 
				    $ad = $this->user_model->update_user_secure($dates,$status);
					redirect(site_url('user/home'));
					}
					else
					{
					echo "<script type='text/javascript'>alert('Invalid username and password'); window.location.href = 'index'; </script>"; 
					 $this->index();
				}	
		 }
		 public function consumer_login()
		{
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			$auth=$this->user_model->consumerlogin($username,$password);
		 }
		
		public function user_index()
		{
			if(($this->session->userdata('uid')!=""))
			{
				redirect(site_url('user/home'));
			}
			else
			{
				$this->load->view("consumer-login");
			}
	
		}
		
	/*public function resent()
		{

			
			$username=$this->session->userdata('username');
		         $password=$this->session->userdata('password');
			$auth=$this->user_model->login($username,$password);
			if($auth)
			{

				redirect(site_url('user/resentotp'));
			}
			else
			{

				echo "<script type='text/javascript'>alert('Invalid username and password'); window.location.href = 'index';  </script>"; 
				$this->index();
			}
		}*/
		
		public function consumer_signup()
		  {
			$type="consumer";
			$name=$this->input->post('firstname');
			$firmname=$this->input->post('lastname');
			$email=$this->input->post('email');
			$gender="";
			$mobile=$this->input->post('mobile');
			$d="C";
			$usname=$mobile;

			//password	
            //$this->load->helper('string');
            $pass= $this->input->post('password');
             //
            $parent_id="";
			$address="";
			$city="";
			$state="";
			$country="";
			$pincode="";
			$sponserid="";
			$executivename="";
			$limit="";
			$secure_code=random_string('numeric',4);
					$data['type']=$type.'-'.$reg;
					$this->load->view("common/header_securelogin");
					$this->load->view("securelogin",$data);
					$this->load->view("common/footer");
		
		}
		
		
   		public function home()
		{
		
		$dates = date('Y-m-d');
		$mobile_no=$this->session->userdata('mobile');
		$email=$this->input->post('email');
		$current_date= date('Y-m-d H:i:s');
		$login_uid=$this->session->userdata('uid');
		$type=$this->session->userdata('type');
		
		if($type=="consumer")
		{
			$type_var=$type.'_'.$this->session->userdata('uid');
		}
		else
		{
			$type_var=$type;
		}
		
		$var=$this->session->userdata('lastlogin');
		 
		$varr=date('Y-m-d',strtotime($var));   
		$sess_secure_code=$this->session->userdata('secure_code');
		$auto_no=random_string('numeric',4);	
		//echo $varr ." == ".$dates." Auth created ".$auto_no;
		$secure_code_data =  $this->user_model->get_secure_code($login_uid);	
		 $secure_code = $secure_code_data[0]->{'secure_code'};		
		//if($varr == $dates)
	    $str_len = strlen( $mobile_no );
	  
		//if( $secure_code == $sess_secure_code )
		//	{
				/*
				    $data['type']=$type_var;
					$data['mobile_no'] =  substr($mobile_no, $str_len - 4, 4);
					$this->load->view("common/header_securelogin");
					$this->load->view("securelogin",$data);
					$this->load->view("common/footer");
					*/
				$datas = $this->session->userdata('uid');
				$data['user_details'] = $this->user_model->get_user_details($datas);
				$data['total_recharge_details'] = $this->user_model->get_total_user_details();
				$data['service_recharge_details'] = $this->user_model->get_service_recharge_details();
				$data['success_recharge_details'] = $this->user_model->get_total_user_success_details();
				$data['failure_recharge_details'] = $this->user_model->get_total_user_failure_details();
				$data['distributor_details'] = $this->user_model->get_distributors_details();
				$data['franchise_details'] = $this->user_model->get_retailer_details();
				$data['pending_details'] = $this->user_model->get_total_user_pending_details();
				$data['success_transactions_details'] = $this->user_model->get_success_transactions_details($login_uid);
				$data['failiure_transactions_details'] = $this->user_model->get_failiure_transactions_details($login_uid);
				$type='dth';
				$data['count']=$this->user_model->dth($dates,$type);
				$type1='postpaid';
				$data['count1']=$this->user_model->postpaid($dates,$type1);
				$type2='prepaid';
				$data['count2']=$this->user_model->prepaid($dates,$type2);
				$data['distributor_parent_details'] = $this->user_model->get_distributors_parent_details();
				$data['login_franchise_details'] = $this->user_model->get_login_franchise_recharge_details();
				$data['saved_card_details'] = $this->user_model->get_saved_card_details($login_uid);
				$data['saved_address_details'] = $this->user_model->get_saved_address_details($login_uid);
				$data['saved_transaction_details'] = $this->user_model->get_saved_transaction_details($login_uid);
				$data['State'] = $this->user_model->getstate();
				$data['user_available_balance'] = $this->user_model->get_total_user_details();
			
				$this->load->view("common/header");
				$this->load->view("common/menu");
				$this->load->view("home",$data);
				$this->load->view("common/footer");
		//	}
		//	else
		//	{ 
			 
			 
		//		$update = $this->user_model->update_user_code($auto_no,$mobile_no);
			//	if ( $update == false )  echo "SMS SENDING FAILED";
			//	$testing="One Time Password to verify your Mobile $mobile_no on Paybucks is $auto_no.This verification code for safety of your account and must be done before you proceed.";
			
		//	$testing = "One Time Password to verify your Mobile $mobile_no on Paybuks is $auto_no.";
			
           //     $sms_data=array(
		     //   'date' => $current_date,
		    //    'agentmob' => $mobile_no,
		  //      'msg' => $testing,
		  //      'by_uid' =>$login_uid,
		  //            );
		//	   $insert =$this->user_model->insert_sms_details($sms_data);
			//		 $data['type']=$type_var;
			//		
					 $data['mobile_no'] =  substr($mobile_no, $str_len - 4, 4);
			//		$this->load->view("common/header_securelogin");
			//		$this->load->view("securelogin",$data);
			//		$this->load->view("common/footer");
                    
			//	}
			}
		
		
		public function resentotp()
		{
		
		$type=$this->session->userdata('type');
		$current_date= date('Y-m-d H:i:s');
		$login_uid=$this->session->userdata('uid');
		if($type=="consumer")
		{
			$type_var=$type.'_'.$this->session->userdata('uid');
		}
		else
		{
			$type_var=$type;
		}
		    $lastdate=$this->session->userdata('lastlogin');
			$datetime = new DateTime($lastdate);
            $ldate = $datetime->format('Y-m-d');			
			$cdate= date('Y-m-d');
			//print_r($ldate);exit;
			if($ldate==$cdate)
			{
				$auth_code=$this->session->userdata('secure_code');
				
						
			}else {
			$auth_code=random_string('numeric',4);
			$timezone = new DateTimeZone("Asia/Kolkata" );
            $date = new DateTime();
            $date->setTimezone($timezone );
			$ladate = $date->format( 'Y-m-d H:i:s' );
            $update = $this->user_model->resend_secure_code_firsttime_date($auth_code,$login_uid,$ladate);
			}
			$mobile_no=$this->session->userdata('mobile');
			
            $sms =$this->user_model->otpsms($mobile_no,$auth_code);

 $testing="One Time Password to verify your Mobile $mobile_no on ViaPaise is $auth_code.This verification code for safety of your account and must be done before you proceed.";

		    $insetsms_data=array(
		     'date' => $current_date,
		     'agentmob' => $mobile_no,
		     'msg' => $testing,
		     'by_uid' =>$login_uid,
		                   );
					$insert =$this->user_model->otpsmsinsert($insetsms_data);
			
			
					
				 	$data['type']=$type_var;
                    $this->session->set_flashdata('item', array('message'=>"<div style='color:Green;'>OTP is Received to your Registered Mobile Number</div>",'class' => 'success'));
				 	redirect(site_url('user/home')) ;
					

}

		


		public function logout()
		{
			$this->session->sess_destroy();
		 
			redirect(site_url('user/index'));
		}
		public function changepassword()
		{
          $change=$this->input->post('changeusername');
          $temp_pass=random_string('alnum',10);
		  $smsupdatepassword =$this->user_model->smsupdatepassword($change,$temp_pass);
			  $c_uid = $this->user_model->get_uid($change);
			  $cuid=$c_uid[0]->uid;
			  $pass = array('password' => $temp_pass);
			  $update = $this->user_model->update_temppassword($cuid,$pass);
					$this->user_index();
		
		 }
		 
		public function thankyou_contents()
		{
			
			$this->load->view("logout");
		}
		
		public function thankyou_content()
		{
			$this->session->sess_destroy();
			redirect(site_url('user/thankyou_contents'));
			
			/*$this->load->view("common/header_securelogin");
			$this->load->view("thankyou");
			$this->load->view("common/footer");
			*/
		}
		public function dashboard()
		{
			$var=$this->session->userdata('uid');
			$datas = $this->session->userdata('uid');
			$dates = date('Y-m-d');
			$data['user_details'] = $this->user_model->get_user_details($datas);
			$data['total_recharge_details'] = $this->user_model->get_total_user_details();
			$data['service_recharge_details'] = $this->user_model->get_service_recharge_details();
			$data['success_recharge_details'] = $this->user_model->get_total_user_success_details();
			$data['failure_recharge_details'] = $this->user_model->get_total_user_failure_details();
			$data['distributor_details'] = $this->user_model->get_distributors_details();
			$data['franchise_details'] = $this->user_model->get_retailer_details();
			$data['pending_details'] = $this->user_model->get_total_user_pending_details();
		
			
			$type='dth';
			$data['count']=$this->user_model->dth($dates,$type);
			$type1='postpaid';
			$data['count1']=$this->user_model->postpaid($dates,$type1);
			$type2='prepaid';
			$data['count2']=$this->user_model->prepaid($dates,$type2);
			$data['distributor_parent_details'] = $this->user_model->get_distributors_parent_details();
			$data['login_franchise_details'] = $this->user_model->get_login_franchise_recharge_details();
			$this->load->view("common/header");
			$this->load->view("common/menu");
			$this->load->view("home",$data);
			$this->load->view("common/footer");
			
			
		}
		public function secure_login()
		{
			$secure_code=$this->input->post('secure_code');

            $type=$this->session->userdata('type');

			//$type=$this->input->post('type');

			$type_array=explode('_',$type);
			//echo $type_array[0];
			 if($type_array[0]!='consumer')
			{
			$var=$this->session->userdata('uid');
			$security=$this->user_model->secur_log_model($secure_code,$var);
				if($security){    
				 
				$this->session->set_userdata("secure_code", $secure_code);
					
				$timezone = new DateTimeZone("Asia/Kolkata" );
				$date = new DateTime();
				$date->setTimezone($timezone );
				$dates = $date->format( 'Y-m-d H:i:s' );
				//print_r($dates);exit;
				$status="S";
				 
				$ad = $this->user_model->update_user_secure($dates,$status);
				
				$datas = $this->session->userdata('uid');
				$data['user_details'] = $this->user_model->get_user_details($datas);
				$data['total_recharge_details'] = $this->user_model->get_total_user_details();
				$data['service_recharge_details'] = $this->user_model->get_service_recharge_details();
				$data['success_recharge_details'] = $this->user_model->get_total_user_success_details();
				$data['failure_recharge_details'] = $this->user_model->get_total_user_failure_details();
				$data['distributor_details'] = $this->user_model->get_distributors_details();
				$data['franchise_details'] = $this->user_model->get_retailer_details();
				$data['pending_details'] = $this->user_model->get_total_user_pending_details();
				$data['success_transactions_details'] = $this->user_model->get_success_transactions_details($var);
				$data['failiure_transactions_details'] = $this->user_model->get_failiure_transactions_details($var);
				$type='dth';
				$data['count']=$this->user_model->dth($dates,$type);
				$type1='postpaid';
				$data['count1']=$this->user_model->postpaid($dates,$type1);
				$type2='prepaid';
				$data['count2']=$this->user_model->prepaid($dates,$type2);
				$data['distributor_parent_details'] = $this->user_model->get_distributors_parent_details();
				$data['login_franchise_details'] = $this->user_model->get_login_franchise_recharge_details();
				$data['saved_card_details'] = $this->user_model->get_saved_card_details($var);
				$data['saved_address_details'] = $this->user_model->get_saved_address_details($var);
				$data['saved_transaction_details'] = $this->user_model->get_saved_transaction_details($var);
				$this->load->view("common/header");
				$this->load->view("common/menu");
				$this->load->view("home",$data);
				$this->load->view("common/footer");
				
				}
				else
				{
				$this->session->set_flashdata('item', array('message'=>"<div style='color:Red;'>Incorrect OTP</div>",'class' => 'success'));
				redirect(site_url('user/home')) ;
				}
			}
			else if($type_array[0]=='consumer')
			{
             $timezone = new DateTimeZone("Asia/Kolkata" );
            $date = new DateTime();
            $date->setTimezone($timezone );
			$dates = $date->format( 'Y-m-d H:i:s' );
             $datas = $this->session->userdata('uid');
             $data['user_details'] = $this->user_model->get_user_details($datas);
			$data['total_recharge_details'] = $this->user_model->get_total_user_details();
			$data['service_recharge_details'] = $this->user_model->get_service_recharge_details();
			$data['success_recharge_details'] = $this->user_model->get_total_user_success_details();
			$data['failure_recharge_details'] = $this->user_model->get_total_user_failure_details();
			$data['distributor_details'] = $this->user_model->get_distributors_details();
			$data['franchise_details'] = $this->user_model->get_retailer_details();
			$data['pending_details'] = $this->user_model->get_total_user_pending_details();
			$uid=$type_array[1];
			$security=$this->user_model->secur_log_model($secure_code,$uid);
			if($security){
			//$dates = date('Y-m-d');
			$status="S";
			$datas = $uid;
			$data['user_details'] = $this->user_model->get_user_details($datas);
			foreach($data['user_details'] as $user){
				$userdata = array(
		'uid'  => $user->uid,
		'username'  => $user->username,
		'type'  => $user->type,
		'lastlogin'  => $user->lastlogin,
		'secure_code'  => $user->secure_code,
		'status'  => $user->status,
		'mobile'  => $user->mobile,
		'used_balance'  => $user->used_balance,
		'total_balance'    => $user->total_balance,
		'img_name'    => $user->img_name,
		'password'    => $user->password,
		);
			}
		$this->session->set_userdata($userdata);
		    $this->load->view("common/header");
			$this->load->view("common/menu");
			$this->load->view("home",$data);
			$this->load->view("common/footer");
			}
			
			
			else
			{ 
		   $this->session->sess_destroy();
				$this->user_index();
		   } 
			}
		}

 		
		public function createuser()
		{
			$data['Country'] = $this->user_model->getcountry();
			$data['State'] = $this->user_model->getstate();
            $this->load->view("common/header");
		    $this->load->view("common/menu");			
			$this->load->view('v_createuser',$data);
            $this->load->view("common/footer");
		}
		public function register()
		{
		$this->load->library('form_validation');
		$key=$this->form_validation->set_rules('email', 'Email', 'callback_rolekey_exists');
		$mob=$this->form_validation->set_rules('mobile', 'Mobile', 'callback_rolekey_existed');
		if ($this->form_validation->run() == FALSE)
		{
		$value=1;
		}
		else
		{
		$value=2;
		}
		if($value==2)
		{
			
			$type=$this->input->post('type');
			$name=$this->input->post('name');
			$firmname=$this->input->post('firmname');
			$email=$this->input->post('email');
			$gender=$this->input->post('gender');
			$mobile=$this->input->post('mobile');			
			$usname=$mobile;
			$del='no';
			$current_date= date('Y-m-d H:i:s');
            $login_uid=$this->session->userdata('uid');
			//password	
            $this->load->helper('string');
            $pass= random_string('numeric',6);
             //
            $parent_id=$this->input->post('parent_id');
			$address=$this->input->post('address');
			$city=$this->input->post('city');
			$state=$this->input->post('state');
			$country=$this->input->post('country');
			$pincode=$this->input->post('pin');
			$sponserid=$this->input->post('spid');
			$executivename=$this->input->post('executive');
			$limit=$this->input->post('limit');


                        $result = substr($name, 0, 3);
			$result = mb_substr($name, 0, 3);
			$result1 = substr($mobile, -3);
                        $store_id="BLUZ".$result.$result1."EZPY";
			$secure_code = random_string('numeric',4);	
		$register_data=array(
		    'parent_id' => $parent_id,
		    'type' => $type,
		    'name' => $name,
		    'companyname' =>$firmname,
			'executive_name' =>$executivename,
			'mobile' =>$mobile,
			'email' =>$email,
			'gender' =>$gender,
			'address1' =>$address,
			'city' =>$city,
			'state' =>$state,
			'country' =>$country,
			'pincode' =>$pincode,
			'password' =>$pass,
			'joindata' =>$current_date,
			'isdelete' =>$del,
			'username' =>$usname,
			'adduser_limit' =>$limit,
                        'store_id' =>$store_id,
						 'secure_code' =>$secure_code,
			
		      );
			$reg=$this->user_model->register($register_data);
		    $testing="Welcome to ViaPaise,Dear $name,your account has been activated.Your User ID: $usname and Password: $pass";
		    $sms_data=array(
		    'date' => $current_date,
		    'agentmob' => $usname,
		    'msg' => $testing,
		    'by_uid' =>$login_uid,
		      );
			$insert =$this->user_model->insert_sms_details($sms_data,$email,$name,$usname,$pass);	
             $send =$this->user_model->send_sms($email,$name,$usname,$pass,$mobile);
			 
            $Name='support@vaipaise.com';
			//$Name='Paybuks';
			$to =$email;
			$subject = "Welcome to ViaPaise";
			$message = '<div style="width: 527px; height: 334px; border:1px solid #39C; background:#39C;" >
			<div style="width:500px; height:300px; border:1px solid #39C; border-radius:20px; margin-left: 11px; margin-top: 16px; background:white;"> 
			<h3 style="float:left; width:350px; text-align: center;color:#39C">Welcome to ViaPaise,</h3>
			<p style="width:350px; text-align: left; margin-left: 26px;word-wrap: break-word;">
			<br><br>
			Dear '.$name.', 
			<br><br>
			your account has been activated.
			<br><br>
			Your User ID:'.$usname.',
			<br><br>
			Password  :'.$pass.'
			<br><br>
			</p>
			</div>
			<a style="float:right; margin-right: 48px; text-decoration:none; color:#FFF;" href="ViaPaise.com">© ViaPaise.com</a>
			</div>';

						$headers = 'MIME-Version: 1.0' . "\r\n";
						$headers .= "From:".$Name."\r\nReply-to: no-reply@ViaPaise.com";
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
			 echo "Email Sent Successfully.";
			
			}
			else
			{
			echo "Email  Can Not Send.";
			}			
			$this->session->set_flashdata('item', array('message'=>"<div style='color:Green;'>Registered Successfully</div>",'class' => 'success'));
			redirect(site_url('user/createuser')) ;	
			$this->load->view('v_createuser');	
			}
			
			else
			{
				$this->session->set_flashdata('item', array('message'=>"<div style='color:Red;'>Email Id/Mobile Number Already Exists</div>",'class' => 'success'));				
				redirect(site_url('user/createuser')) ;	
				$this->load->view('v_createuser');	
			}
		}
		 public function myprofile()
    	{  
        $data['member'] = $this->user_model->myprofile_details(); 
		$this->load->view("common/header");
		$this->load->view("common/menu");
        $this->load->view('myprofile', $data);
		$this->load->view("common/footer");
		}	
	
		function do_upload()
		{
			
		$config['upload_path'] =FCPATH.'images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']    = '1024';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload())
		{
		$error = array('error' => $this->upload->display_errors());
		$this->load->view('myprofile', $error);
		 
		}
		
		else
		{
		$data=$this->upload->data();
		
		$file=array(
		'img_name'=>$data['raw_name'].$data['file_ext']
		);
		
		$this->user_model->add_image($file);
		$this->session->unset_userdata('img_name');
        $this->user_model->image_update($file);
		$data = array('upload_data' => $this->upload->data());
		$this->session->unset_userdata($userdata); 
		$this->session->set_flashdata('item', array('message' => 'Profile updated successfully','class' => 'success'));
		$this->load->view('common/header', $data);	
		}
		$id= $this->input->post('did');
		if($this->input->post('password'))
		{
		$data = array('password' => $this->input->post('password'),);
		$this->user_model->update_password($id,$data);
		$this->session->set_flashdata('item', array('message' => 'Profile updated successfully','class' => 'success'));
		}
		
		redirect(site_url('user/myprofile')) ;
		
		}
		public function test(){
		$url = $_SERVER['REQUEST_URI'];
		$page = $this->uri->segment(3,0);
		print_r($url); 
		}

		//view viewbalance
		 public function viewbalance()
		{ 
		 $type_id = $this->uri->segment(3);
		 
		 $data['records']=$this->viewuser_model->listbalance( $type_id );
		  
		 
		 
		 $data['type']=$this->session->userdata('type');
		 
		 
		 //   listbalance_ret
		 
		
		 
		 
		 
		 $this->load->view('common/header');
		 $this->load->view('common/menu');
         $this->load->view('v_viewbalance', $data);
		 $this->load->view('common/footer');
		}
		
		 public function viewretailersdetails()
		{ 
		 
		 $data['type']=$this->session->userdata('type');
		 $parent_id = $this->uri->segment(3);
		  if (  $parent_id != '' ){
		  
		   $data['records']=$this->viewuser_model->listbalance_ret( $parent_id );
		   $data['ret_sum_total'] = $this->viewuser_model->ret_total_sum( $parent_id );
		   
		   $this->load->model('reports_model');
		   	$data['distributors']=$this->reports_model->getDistributorList();
		
		   $this->load->view('common/header');
		   $this->load->view('common/menu');
		   $this->load->view('v_ret_viewbalance', $data);
		   $this->load->view('common/footer');
		 }else{
			 
		 }
		
		}		
		
		public function updatestatus()
		{  
		 $user_id=$this->input->post('u_id');
		 $parent_id = $this->input->post('p_id');
		 $value = $this->input->post('value');
		 if ( $user_id =='' ){
			 $data=$this->viewuser_model->update_status($parent_id,'ALL',$value);
		 }else
		 {
			 $data =$this->viewuser_model->update_status($user_id ,'',$value);
		 }
		 	if( $data ) {
				echo "Status update success";
			}else
			{
				echo "Status update failed";	
			}
		}
		
		
		//view viewbalance
		 public function updateactive()
		{ 
		 $use_id=$this->input->post('u_id');
		 $type_id = $this->uri->segment(3);
		 $data['records']=$this->viewuser_model->listbalance($type_id);
         $this->load->view('v_viewbalance', $data);
		}
		
		 public function addcarddetails()
		{ 
		 $bank_name=$this->input->post('bank_name');
		 $card_holder_name=$this->input->post('card_holder_name');
		 $card_no=$this->input->post('card_no');
		 $card_type=$this->input->post('card_type');
		 $valid_month=$this->input->post('valid_month');
		 $valid_year=$this->input->post('valid_year');
		 $csv_no=$this->input->post('csv_no');
		 $current_date= date('Y-m-d H:i:s');
		 $insert_data=array(
		    'usermaster_uid' =>$this->session->userdata('uid'),
			'card_holder_name' => $card_holder_name,
		    'bank_name' => $bank_name,
			'card_number' => $card_no,
			'card_type' => $card_type,		    
		    'valid_month' =>$valid_month,
			'valid_year' =>$valid_year,
			'csv_number' =>$csv_no,
			'card_status' =>"Active",
			'card_created' =>$current_date,
			'card_updated' =>$current_date
					      );
		 $data=$this->user_model->insertcarddetails($insert_data);
		 $this->secure_login();
         //$this->load->view('home',$data);
		}
		
		 public function addaddress()
		{ 
		 $name=$this->input->post('add_name');
		 $mobile_number=$this->input->post('add_mobile');
		 $address=$this->input->post('add_address');
		 $city=$this->input->post('add_city');
		 $state=$this->input->post('add_state');
		 $pincode=$this->input->post('add_pincode');
		 $current_date= date('Y-m-d H:i:s');
		 $insert_data=array(
		    'address_uid' =>$this->session->userdata('uid'),
			'name' => $name,
		    'mobile_number' => $mobile_number,
			'city' => $city,
			'state' => $state,		    
		    'pincode' =>$pincode,
			  'address' =>$address,
			'address_created' =>$current_date,
			'address_modified' =>$current_date
					      );
		 $data=$this->user_model->insertaddressdetails($insert_data);
		 $this->secure_login();
         //$this->load->view('home',$data);
		}
		
	public function countrlist()
    {
       				$country = $_POST["country"];
					$data['state'] = $this->user_model->getstate($country);           
					$this->load->view("get_state",$data); 
		 
    }
	
	 public function ajax_city_list()
    {
        $state = $_POST["state"];	
		$data['city'] = $this->user_model->getcity($state);  
        //return $data;		
		//$this->load->view("get_city",$data); 
		 
    }
  

    public function send_password()
	{
		$mobile_no=$this->input->post('mobile_no');
		$auth = $this->user_model->check_mobile_no($mobile_no); 
 
	}
    function get_city()
	{
	  $state = $this->uri->segment(3);
	 //header('Content-Type: application/json');
	  echo(json_encode($this->user_model->citylist($state)));
	}
  

      
	
		
		
	}