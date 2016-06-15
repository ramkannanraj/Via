<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class sendmoney extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');     
			$this->load->library('form_validation');
			$this->load->model('icash_model');
			$this->load->model('viewuser_model');
			$this->load->helper('string');
			$this->load->helper('date');

		}
		public function index()
		{
			$this->load->view('common/header');
			$this->load->view('common/menu');
			$this->load->view('view_cardgeneration');
			$this->load->view('common/footer');
	 
			 
		}
		
		public function create_card()
		{
			$this->load->view('common/header');
			$this->load->view('common/menu');
			$this->load->view('view_cardgeneration');
			$this->load->view('common/footer');
	 
			 
		}
		
		
		public function create_kyc_card()
		{
			$this->load->view('common/header');
			$this->load->view('common/menu');
			$this->load->view('view_kyc_cardgeneration');
			$this->load->view('common/footer');
	 
			 
		}
		
		public function card_register()
		{
			
		    $username =  $this->input->post('username');
			$fname=  $this->input->post('first_name');
			$lname=  $this->input->post('last_name');
			$motname=  $this->input->post('mothers_name');
			$dateob=  $this->input->post('dob');
			$mailss=  $this->input->post('mail');
			$re=  $this->input->post('fields11'); 
			$usestate=  $this->input->post('state');
			$usecity=  $this->input->post('city');
			$useaddress=  $this->input->post('address');
			$pinscode=  $this->input->post('pin_code');
            $created_by=  $this->input->post('created_by');
            $created_by_name=  $this->input->post('created_by_name');
			$tran=random_string('numeric',15);
			
			
			if($this->input->post('account_type') == 1){
			
			
			$res=$this->icash_model->icash_card_register($username,$fname,$lname,$motname,$dateob,$mailss,$re,$usestate,$usecity,$useaddress,
			$pinscode,$tran,$created_by,$created_by_name);
			
			}else if($this->input->post('account_type') == 2){
				
				
				    print_r($_FILES['kyc_idproof']['name'] );
				    //print_r($_FILES['filename1']['kyc_addproof']);
				  
				   
				 $KYCAddProof = $_FILES['kyc_addproof']['name'];
				 $KYCIdProof  = $_FILES['kyc_idproof']['name']; 
				   
				   if($KYCIdProof !== ""){
			      $config['upload_path'] = FCPATH.'uploads/KYC/IDproof';
				  $config['allowed_types'] = 'jpg|png|jpeg';
					/*$config['max_size']	= '100';
					$config['max_width']  = '1024';
					$config['max_height']  = '768';
			*/
					$this->load->library('upload', $config);
					$field_name = 'kyc_idproof';
					if ( $this->upload->do_upload($field_name))
					{
						 $upload_data	= $this->upload->data();
						 $kyc_idproof	= $upload_data['file_name'];
					}
			
					if($this->upload->display_errors() != '')
					{
						$data['error'] = $this->upload->display_errors();
					}
				   }
				   
				   if($KYCAddProof !== ""){
					
				   $config2['upload_path'] = FCPATH.'uploads/KYC/AddressProof';
				   $config2['allowed_types'] = 'jpg|png|jpeg';
					/*$config['max_size']	= '100';
					$config['max_width']  = '1024';
					$config['max_height']  = '768';
			*/
			$this->upload->initialize($config2);
					//$this->load->library('upload', $config2);
					$field_name = 'kyc_addproof';
					if ( $this->upload->do_upload($field_name))
					{
						 $upload_data	= $this->upload->data();
						 $kyc_addproof	= $upload_data['file_name'];
					}
			
					if($this->upload->display_errors() != '')
					{
						$data['error'] = $this->upload->display_errors();
					}
					
				   }
			$idProofUrl = base_url().'uploads/KYC/IDproof/'.$kyc_idproof;
			$addressProofUrl = base_url().'uploads/KYC/AddressProof/'.$kyc_addproof;
			$addressProofType=  $this->input->post('address_proof_type');
			$addressProofNum=  $this->input->post('address_proof_num');
			$idProofType=  $this->input->post('id_proof_type');
			$idProofNum=  $this->input->post('id_proof_num');

			//print_r($data);
			exit();
			
			$res=$this->icash_model->icash_kyc_card_register($username,$fname,$lname,$motname,$dateob,$mailss,$re,$usestate,$usecity,$useaddress,
			$pinscode,$tran,$created_by,$created_by_name,$idProofUrl,$idProofNum,$idProofType,$addressProofUrl,$addressProofNum,$addressProofType);
			
			}

                }
public function test()
		{
			$tran_n=  $this->input->post('tran');
			$otp_n=  $this->input->post('otp_no');
			$otp=$this->icash_model->icashotp($tran_n,$otp_n);
		}
		
		public function beni_otp()
		{
			$tran_n=  $this->input->post('tran');
			$otp_n=  $this->input->post('otp_no');
			$otp=$this->icash_model->icashotp($tran_n,$otp_n);
		}
		public function pin_generate()
		{
			 
			$trans_id =  $this->input->post('trans_id');
			$otp_no=  $this->input->post('otp_no');
			$icashpin_generate=$this->icash_model->icashpin($trans_id,$otp_no);
		}
		public function log()
		{
			
			if($this->session->userdata('card_no')){
			echo "<script type='text/javascript'>alert('You are already logged in.');</script>"; 	
			redirect('sendmoney/card_top');
			
			}else{
				$this->load->view('common/header');
			$this->load->view('common/menu');
			$this->load->view('icash_login');
			$this->load->view('common/footer');
				
			}
			
			
		}	
		
		
		public function log_check()
		{
			
			if($this->session->userdata('card_no')){
			echo "<script type='text/javascript'>alert('You are already logged in.');</script>"; 	
			redirect('sendmoney/card_top');
			
			}else{
			$this->load->view('common/header');
			$this->load->view('common/menu');
			$this->load->view('icash_login-check');
		    $this->load->view('common/footer');
				
			}
			
			
		}	
		
		public function login()
		{
			$mobile =  $this->input->post('mobile');
			$pin_no =  $this->input->post('pin_no');
			$login_icash=$this->icash_model->icash_log($mobile,$pin_no);
		}
		public function ihome()
		{
			$this->load->view('common/header');
			$this->load->view('common/menu');
			$this->load->view('icash_home');
			$this->load->view('common/footer');
		}
		public function card_top()
		{
			$this->load->view('common/header');
			$this->load->view('common/menu');
			$this->load->view('icash_home');
			$var_code=$this->session->userdata('security_key');
			$mobile_nos=$this->session->userdata('mobile_number');
			$data['card_details'] = $this->icash_model->get_card_details($var_code,$mobile_nos);
			//$data['charge'] = $this->icash_model->get_charge_details();
			$this->load->view('view_card_topup',$data);
			$this->load->view('common/footer');
		}
		public function loginvalidate()
		{
			$m_no=  $this->input->post('mobile_no');
			$otp_pwd=  $this->input->post('otp_pass'); 
			$logivalidate_icash=$this->icash_model->icash_log_validates($m_no,$otp_pwd);
		}
	 
		public function card_topup()
		{
			$top_amnt=$this->input->post('amnt');
			$topup_tran=random_string('numeric',15);
			$region_code=$this->input->post('region');
			$topup_mobile=$this->input->post('top_mobile');
			$ser_charge=$this->input->post('service');
			$sec_key=$this->input->post('seckey');
			$card=$this->input->post('card_no');
			
			
 
			$cardtop_icash=$this->icash_model->icash_card_topup($top_amnt,$topup_tran,$region_code,$topup_mobile,$ser_charge,$sec_key,
			$card );
		}
		
		public function login_otp()
		{
			$mobile =  $this->input->post('mobile');
			$login_icash=$this->icash_model->icash_login_otp($mobile);
		}
		
		public function forget()
		{
			$this->load->view('common/header');
			$this->load->view('common/menu');
			$this->load->view('icash_forget_pin');
			$this->load->view('common/footer');
		}
		function add_commission(){
			
		    $data['commission'] = $this->icash_model->get_commission_details();
		    $this->load->view('common/header');
			$this->load->view('common/menu');
			$this->load->view('icash_add_commission',$data);
			$this->load->view('common/footer');
			
		}
	
		
		function add_icash_commission(){
			
			$data['commission'] = $this->icash_model->get_commission_details();
			
			if($this->input->post('type') == "money_transfer"){
				
				$result = $this->icash_model->insert_icash_commision(array('id'=>$this->input->post('id'),'type'=>$this->input->post('type'),'range_start'=>$this->input->post('range_start'),'range_end'=>$this->input->post('range_end'),'commission'=>$this->input->post('commission')));
				
			}else{
			
			$result = $this->icash_model->insert_icash_commision(array('id'=>$this->input->post('id'),'type'=>$this->input->post('type'),'commission'=>$this->input->post('commission')));
			
			}
			if($result){
				
				$this->session->set_flashdata('message',''.$this->input->post('type').' commission changed successfully.');
				
			}else{
				
				$this->session->set_flashdata('message',''.$this->input->post('type').' commission not changed.');
			}
		    
			
			redirect('sendmoney/add_commission');
		
		}
		
		function resendotp(){
			
		       
				
				$var_trans=$_POST["tran"];
				$service_url = 'http://api.icashcard.in/impsmethods.asmx/SENDERRESENDOTP';
				$ch = curl_init($service_url);
				$curl_post_data = array(			
				"RequestData" =>"<SENDERRESENDOTPREQUEST>
				<TERMINALID>100024</TERMINALID>
				<LOGINKEY>1982032620</LOGINKEY>
				<MERCHANTID>24</MERCHANTID>
				<TRANSACTIONID>$var_trans</TRANSACTIONID>
				<AGENTID>WallTech</AGENTID>
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
					echo "Enter the OTP";
					
				}
				else if($status_cod!=0)
				{
					echo $status;
				}

		}
		
		function forget_pin(){
			

                $mobile=$_POST["mobile"];
				$service_url = 'http://api.icashcard.in/impsmethods.asmx/FORGOTPIN';
				$ch = curl_init($service_url);
				$curl_post_data = array(			
				"RequestData" =>"<FORGOTPINREQUEST>
							<TERMINALID>100024</TERMINALID>
							<LOGINKEY>1982032620</LOGINKEY>
							<MERCHANTID>24</MERCHANTID>
							<USERMOBILENO>$mobile</USERMOBILENO>
							</FORGOTPINREQUEST>");
							
				
							
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
					echo $status;
					
				}
				else if($status_cod!=0)
				{
					echo $status;
				}
		}
		
		
		
		
		function all_session(){
			
			echo "<pre>";print_r($this->session->all_userdata());echo "</pre>";
			
			
		}
		
		function sendmoney_test(){
			
		$security_key = $this->session->userdata('security_key');	
			
		$service_url = 'http://202.54.157.20/wsNPCI/IMPSMethods.asmx/TRANSACTION_V3';
		$ch = curl_init($service_url);
		$curl_post_data = array(
		"RequestData" =>"<TRANSACTION_V3REQUEST>
		<TERMINALID>100024</TERMINALID>
		<LOGINKEY>1982032620</LOGINKEY>
		<MERCHANTID>24</MERCHANTID>
		<CARDNO>3333001052003477</CARDNO>
		<TRANSTYPE>8</TRANSTYPE>
		<TRANSTYPEDESC>32627693542</TRANSTYPEDESC>
		<BENEMOBILE>9677120370</BENEMOBILE>
		<IFSCCODE>SBIN0011720</IFSCCODE>
		<OTP></OTP>
		<TRANSAMOUNT>100</TRANSAMOUNT>
		<SERVICECHARGE>0</SERVICECHARGE>
		<REMARKS>purush transfer</REMARKS>
		<BENEID>17336663</BENEID>
		<MERCHANTTRANSID>5647892</MERCHANTTRANSID>
		<AGENTID>WallTech</AGENTID>
		<PARAM1>0</PARAM1>
		<PARAM2></PARAM2>
		<PARAM3></PARAM3>
		<PARAM4>$security_key</PARAM4>
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
		print_r($responseArray); exit();	
			
			
		}
		
		
		
	}	
	
	
	
		
		