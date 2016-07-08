    <?php
	
	//tested
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class beneficiary extends CI_Controller {
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
		if($this->session->userdata('card_no')){
			
			$this->load->view('common/header');
			$this->load->view('common/menu');
			$this->load->view('icash_login');
			$this->load->view('common/footer');
			}else{
				
				
			echo "<script type='text/javascript'>alert('You are already logged in.');</script>"; 	
			redirect('sendmoney/card_top');
			
				
			}
		
		}
		public function add_beneficiary_details()
		{
			$this->load->view('common/header');
			$this->load->view('common/menu');
			$this->load->view('icash_home');
			$var_code=$this->session->userdata('security_key');
			$mobile_nos=$this->session->userdata('mobile_number');
			$data['card_details'] = $this->icash_model->get_card_details($var_code,$mobile_nos);
			$this->load->view('add_beneficiary',$data);
			$this->load->view('common/footer');
		}
		public function addss_beneficiary()
		{
		 
		$b_name=  $this->input->post('name');
		$mobile_no=  $this->input->post('mobile_no');
		$bank_name=  $this->input->post('bank_name');
		$branch_name=  $this->input->post('branch_name');
		$b_city=  $this->input->post('b_city');
		$b_state=  $this->input->post('b_state');
		$b_ifsc=  $this->input->post('ifsc');
		$b_accno=  $this->input->post('accno');
		$b_card_no=  $this->input->post('cardnumber');
	    $b_id=  $this->input->post('icash_user_id');
		$trans=random_string('numeric',5);
		$mm=random_string('numeric',6);
					 
		$query = $this->icash_model->add_beneficiaryy($b_name,$mobile_no,$bank_name,$branch_name,$b_city,$b_state,$b_ifsc,$b_accno,$trans,$mm,$b_card_no,$b_id
		 );
		}
		public function otp_generate()
		{
			$b_otpno=  $this->input->post('otp_no');
			$card_no=  $this->input->post('card_number');
			$ben=  $this->input->post('ben_id');
			$refid=  $this->input->post('ids');
			$query = $this->icash_model->benficiaryotp($b_otpno,$card_no,$ben,$refid);
		}
		
		public function view()
		{
			$this->load->view('common/header');
			$this->load->view('common/menu');
			$this->load->view('icash_home');
			$var_code=$this->session->userdata('security_key'); 
            
		$mobile_nos=$this->session->userdata('mobile_number');
           
			$data['card_details'] = $this->icash_model->get_card_details($var_code,$mobile_nos);
			$this->load->view('view_beneficiary',$data);
			$this->load->view('common/footer');
		}
		public function edit_beneficiary()
		{
			$this->load->view('common/header');
			$this->load->view('common/menu');
			$this->load->view('icash_home');
			$card_no=$this->session->userdata('card_no'); 
			$data['cards_details'] = $this->icash_model->edita_beneficiary($card_no);
			$this->load->view('view_beneficiary',$data);
			$this->load->view('common/footer');
		}
		public function delete()
		{	
			$del_beni=$this->icash_model->deletedata_beneficiary();
		}
		
		public function deleteotp()
		{
			$card_number=  $this->input->post('card_number');
			
			$ben_id=  $this->input->post('ben_id');
			$otp_no=  $this->input->post('otp_no');
			$ben_status=  $this->input->post('ben_status');
			$delete_bene_otp=$this->icash_model->icash_bene_otp($card_number,$ben_id,$otp_no,$ben_status);
		
		}
		public function view_balance()
		{
			$this->load->view('common/header');
			$this->load->view('common/menu');
			$this->load->view('icash_home');
			$var_code=$this->session->userdata('card_no');
			$data['card_details'] = $this->icash_model->get_cdetails($var_code);
			$this->load->view('viewbalance',$data);
			$this->load->view('common/footer');

		}
		
		public function transactions()
		{
			$segment=  $this->input->post('id');
			$segment_acno=  $this->input->post('acc_no'); 
			$ifsc=  $this->input->post('card');
			
			$data['card_no'] = $this->input->post('card_no');
			$data['trans_type'] = $this->input->post('trans_type');
			$data['acc_no'] = $this->input->post('acc_no');
			$data['bene_mobile'] = $this->input->post('bene_mobile');
			$data['ifsc_code'] = $this->input->post('ifsc_code');
			$data['bene_state'] = $this->input->post('bene_state');
			$data['bene_city'] = $this->input->post('bene_city');
			$data['bene_name'] = $this->input->post('bene_name');
			$data['bene_id'] = $this->input->post('bene_id');
			$data['bank_name'] = $this->input->post('bank_name');
			$data['branch_name'] = $this->input->post('branch_name');
			
			
			$data['update_transaction_code'] = $this->icash_model->update_transaction_ifsc($ifsc,$segment_acno);
			$data['charge'] = $this->icash_model->get_charge_details();
			$data['get_details'] = $this->icash_model->get_det($segment);
			$data['get_ac_details'] = $this->icash_model->get_detacdet($segment_acno,$segment);
			$data['icash_user_id'] = $segment;
			$this->load->view('common/header');
			$this->load->view('common/menu');
			$this->load->view('icash_home');
			$this->load->view('transaction',$data);
			$this->load->view('common/footer');
		}
		
		
		public function benetransactions()
		{
			$segment=  $this->input->post('id');
			$segment_acno=  $this->input->post('acc_no');
			$ifsc=  $this->input->post('card');
			
			$data['card_no'] = $this->input->post('card_no');
			$data['trans_type'] = $this->input->post('trans_type');
			$data['acc_no'] = $this->input->post('acc_no');
			$data['bene_mobile'] = $this->input->post('bene_mobile');
			$data['ifsc_code'] = $this->input->post('ifsc_code');
			$data['bene_state'] = $this->input->post('bene_state');
			$data['bene_city'] = $this->input->post('bene_city');
			$data['bene_name'] = $this->input->post('bene_name');
			$data['bene_id'] = $this->input->post('bene_id');
			$data['bank_name'] = $this->input->post('bank_name');
			$data['branch_name'] = $this->input->post('branch_name');
			
			
			
			$data['update_transaction_code'] = $this->icash_model->update_transaction_ifsc($ifsc,$segment_acno);
			$data['charge'] = $this->icash_model->get_charge_details();
			$data['get_details'] = $this->icash_model->get_det($segment);
			$data['get_ac_details'] = $this->icash_model->get_detacdet($segment_acno,$segment);
			$data['icash_user_id'] = $segment;
			$this->load->view('common/header');
			$this->load->view('common/menu');
			$this->load->view('icash_home');
			$this->load->view('benetransaction',$data);
			$this->load->view('common/footer');
		}
		
		public function transaction_process()
		{
			$user_name=  $this->input->post('user_name');
			$mobile_no=  $this->input->post('bene_mobile');
			$ifsccode=  $this->input->post('ifsc_code');
			$acc_no=  $this->input->post('acc_no');
			$trans_type=  $this->input->post('trans_type');
			$u_amount=  $this->input->post('amount');
			$u_remarks=  $this->input->post('remarks');
		    $securitykey=  $this->input->post('sec_k');
			$card_no=  $this->input->post('card_no');
			 $bene_bene_id=$this->input->post('bene_bene_id'); 
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
			$rand_id = substr( str_shuffle( $chars ), 0, 8 ); 
			$servicecharge=$this->input->post('service');
			$terminal_id=$this->input->post('terminal_id');
			$login_key=$this->input->post('login_key');
			$merchant_id=$this->input->post('merchant_id');
			$agent_id=$this->input->post('agent_id');
			$icash_user_id = $this->input->post('icash_user_id');
			$data = $this->icash_model->get_transactionbeneficary($user_name,$mobile_no,$ifsccode,$acc_no,$trans_type,$u_amount,$u_remarks,$securitykey,$card_no,$bene_bene_id,$rand_id,$servicecharge,$icash_user_id);
		}
		
		public function bene_transaction_process()
		{	
			$user_name=  $this->input->post('user_name');
			$mobile_no=  $this->input->post('bene_mobile');
			$ifsc_code=  $this->input->post('ifsc_code');
			$acc_no=  $this->input->post('acc_no');
			$trans_type=  $this->input->post('trans_type');
			$u_amount=  $this->input->post('amount');
			$u_remarks=  $this->input->post('remarks');
			$securitykey=  $this->input->post('sec_k');
			$cards_no=  $this->input->post('card_no');
			$card_no=  $this->input->post('card_no');
			$bene_bene_id=$this->input->post('bene_bene_id');
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
			$rand_id = substr( str_shuffle( $chars ), 0, 8 ); 
			$service_charge=$this->input->post('service');
			$terminal_id=$this->input->post('terminal_id');
			$login_key=$this->input->post('login_key');
			$merchant_id=$this->input->post('merchant_id');
			$agent_id=$this->input->post('agent_id');
			$icash_user_id = $this->input->post('icash_user_id');
			$data = $this->icash_model->get_benetransactionbeneficary($user_name,$mobile_no,$ifsc_code,$acc_no,$trans_type,$u_amount,$u_remarks,$securitykey
			,$cards_no,$card_no,$bene_bene_id,$rand_id,$service_charge,$icash_user_id);
		}
		public function transaction_history()
		{
			$this->load->view('common/header');
			$this->load->view('common/menu');
			$this->load->view('icash_home');
			$var_code=$this->session->userdata('security_key');
			$mobile_nos=$this->session->userdata('mobile_number');
			$data['card_details'] = $this->icash_model->get_card_details($var_code,$mobile_nos);
			$this->load->view('viewtransaction_history',$data);
			$this->load->view('common/footer');
		
		}

public function mmid_transaction()
		{
			$segment=  $this->input->post('id');
			$segment_acno=  $this->input->post('acc_no');
			$ifsc=  $this->input->post('card');
			
			$data['card_no'] = $this->input->post('card_no');
			$data['trans_type'] = $this->input->post('trans_type');
			$data['acc_no'] = $this->input->post('acc_no');
			$data['bene_mobile'] = $this->input->post('bene_mobile');
			$data['ifsc_code'] = $this->input->post('ifsc_code');
			$data['bene_state'] = $this->input->post('bene_state');
			$data['bene_city'] = $this->input->post('bene_city');
			$data['bene_name'] = $this->input->post('bene_name');
			$data['bene_id'] = $this->input->post('bene_id');
			$data['bank_name'] = $this->input->post('bank_name');
			$data['branch_name'] = $this->input->post('branch_name');
			
			
			
			$data['update_transaction_code'] = $this->icash_model->update_transaction_ifsc($ifsc,$segment_acno);
			$data['charge'] = $this->icash_model->get_charge_details();
			$data['get_details'] = $this->icash_model->get_det($segment);
			$data['get_ac_details'] = $this->icash_model->get_detacdet($segment_acno,$segment);
			$data['icash_user_id'] = $segment;
			$this->load->view('common/header');
			$this->load->view('common/menu');
			$this->load->view('icash_home');
			$this->load->view('mmidtransaction',$data);
			$this->load->view('common/footer');
		}
		
		public function mmid_transaction_process()
		{	
			$user_name=  $this->input->post('user_name');
			$mobile_no=  $this->input->post('bene_mobile');
			$icash_mmid=  $this->input->post('icash_mmid');
			$acc_no=  $this->input->post('acc_no');
			$trans_type=  $this->input->post('trans_type');
			$u_amount=  $this->input->post('amount');
			$u_remarks=  $this->input->post('remarks');
			$securitykey=  $this->input->post('sec_k');
			$cards_no=  $this->input->post('card_no');
			$card_no=  $this->input->post('card_no');
			$bene_bene_id=$this->input->post('bene_bene_id');
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
			$rand_id = substr( str_shuffle( $chars ), 0, 8 ); 
			$service_charge=$this->input->post('service');
			$terminal_id=$this->input->post('terminal_id');
			$login_key=$this->input->post('login_key');
			$merchant_id=$this->input->post('merchant_id');
			$agent_id=$this->input->post('agent_id');
			$icash_user_id ="";
			$data = $this->icash_model->get_mmidtransactionbeneficary($user_name,$mobile_no,$icash_mmid,$acc_no,$trans_type,$u_amount,$u_remarks,$securitykey
			,$cards_no,$card_no,$bene_bene_id,$rand_id,$service_charge,$icash_user_id);
		}
		
		function logout(){
			
			
			$array_items = array('card_no' => '', 'card_status' => '', 'balance' => '', 'security_key' => '', 'transaction_limit' => '', 'transaction_code' => '','mobile_number'=>'');

            $this->session->unset_userdata($array_items);
		redirect('sendmoney/log');
			
		}
		

		}
		