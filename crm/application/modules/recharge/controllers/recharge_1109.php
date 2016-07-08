<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class recharge extends MX_Controller {
		
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
				$serviceprovider = $this->input->post('serviceprovider');
				$mobilenumber =  $this->input->post('mobilenumber');
				$amount = $this->input->post('amount');
				$type_ser=$this->input->post('service_type');
				$check_result = $this->recharge_model->get_commission_by_providers($serviceprovider);
				$by_id=$this->session->userdata('uid');
				$by=$this->session->userdata('username');
$airtel_code="BLUZ500021EZPY";
				
				$recharge_date=date('Y-m-d');		
				$dataValues=array(
					'serviceprovider'=>$check_result->provider,
					'mobilenumber'=>$mobilenumber,
					'rdate'=>$recharge_date,
					'service'=>$check_result->name,
					'type'=>$type_ser,			
					'by'=>$by,
					'by_id' =>$by_id,
					'amount'=>$amount,			
				);
				
				$login_user_tbalance =$this->input->post('tot_bal');
				$login_user_ubalance =$this->input->post('used_balance');
				$avaliable_amount=$login_user_tbalance - $login_user_ubalance;
				
				if($amount < $avaliable_amount)
				{
					$insert =$this->recharge_model->insert_recharge_details($dataValues);
					if($insert)
					{				
						if($name=='Airtel')
						{
							 $url = "http://103.29.232.110:8089/Ezypaywebservice/PushRequest.aspx?AuthorisationCode=de4527cfd9674f86bc&product=$serviceprovider&MobileNumber=$mobilenumber&Amount=$amount&StoreID=$airtel_code";			
						}
						else
						{
							 $url = "http://103.29.232.110:8089/Ezypaywebservice/PushRequest.aspx?AuthorisationCode=de4527cfd9674f86bc&product=$serviceprovider&MobileNumber=$mobilenumber&Amount=$amount";
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
			
						$error_datas=array('result'=>$error_description,'error_status_code'=>$error_status,'trans_id'=>$trans_id);
						$update_error_status = $this->recharge_model->update_recharge_error_status($error_datas,$insert);
							
								if($error_id == 1 || $error_id == 200)
								{	
								$this->session->set_flashdata('item', array('message' => 'Transaction Successful','class' => 'success','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$name,'trans_id'=>$trans_id)); 
								redirect(site_url('recharge/index')) ;			
								}		
								else if($error_id == 100)
								{
									$this->session->set_flashdata('item', array('message' => 'Transaction Pending','class' => 'success','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$name,'trans_id'=>$trans_id)); 
		redirect(site_url('recharge/index'));								
								}		
								else if($error_id == -1611)
								{
				$this->session->set_flashdata('item', array('message' => 'Duplicate request,please try after 10 minutes','class' => 'success','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$name,'trans_id'=>$trans_id)); 
		redirect(site_url('recharge/index'));
								}		
								else 
								{							
									$this->session->set_flashdata('item', array('message' => 'Transaction Failure','class' => 'success','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$name,'trans_id'=>$trans_id)); 
		redirect(site_url('recharge/index'));											 
								}						
								
							$this->index();	
					}
				}
					
				else if($amount > $avaliable_amount)
				{
					$this->session->set_flashdata('item', array('message' => 'Insufficient Balance','class' => 'success')); 
					redirect(site_url('recharge/index')) ;	
				}	
				else
				{
					$this->index();
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
		
			$recharge_date=date('Y-m-d');
			$dataValues=array(
				'serviceprovider'=>$check_result->provider,
				'mobilenumber'=>$mobilenumber,
				'rdate'=>$recharge_date,
				'service'=>$check_result->name,
				'type'=>$type_ser,
				'by'=>$by,
				'by_id' =>$by_id,
				'amount'=>$amount,
				
			);
			$login_user_tbalance =$this->input->post('tot_bal');
			$login_user_ubalance =$this->input->post('used_balance');
			$avaliable_amount=$login_user_tbalance - $login_user_ubalance;
			
			if($amount < $avaliable_amount)
			{
				$insert =$this->recharge_model->insert_recharge_details($dataValues);
				if($insert)
				{
				   $url = "http://103.29.232.110:8089/Ezypaywebservice/PushRequest.aspx?AuthorisationCode=de4527cfd9674f86bc&product=$serviceprovider&MobileNumber=$mobilenumber&Amount=$amount";						
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
							'trans_id'=>$trans_id
					);
					$update_error_status = $this->recharge_model->update_recharge_error_status($error_datas,$insert);
		
					if($error_id == 1 || $error_id == 200)
					{
						$this->session->set_flashdata('item', array('message' => 'Transaction Successful','class' => 'success','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$name,'trans_id'=>$trans_id)); 
						redirect(site_url('recharge/index')) ;		
					}		
					else if($error_id == 100)
					{			
						$this->session->set_flashdata('item', array('message' => 'Transaction Pending','class' => 'success','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$name,'trans_id'=>$trans_id)); 
						redirect(site_url('recharge/index')) ;	
					}		
					else if($error_id == -1611)
					{		
						$this->session->set_flashdata('item', array('message' => 'Duplicate request,please try after 10 minutes','class' => 'success','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$name,'trans_id'=>$trans_id)); 
						redirect(site_url('recharge/index')) ;
					}		
					else 
					{
						$this->session->set_flashdata('item', array('message' => 'Transaction Failure','class' => 'success','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$name,'trans_id'=>$trans_id)); 
							redirect(site_url('recharge/index')) ;
					}
					$this->index();
			}
		}
		else if($amount > $avaliable_amount)
		{
			$this->session->set_flashdata('item', array('message' => 'Insufficient Balance','class' => 'success')); 
			redirect(site_url('recharge/index')) ;				
		}
		else
		{
			$this->index();
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
				$serviceprovider = $this->input->post('serviceprovider');
				$mobilenumber =  $this->input->post('mobilenumber');
				$amount = $this->input->post('amount');
				$type_ser=$this->input->post('service_type');
				$check_result = $this->recharge_model->get_all_post_paid_details($serviceprovider);
				$by=$this->session->userdata('username');
				$by_id=$this->session->userdata('uid');
				
				$recharge_date=date('Y-m-d');
				$dataValues=array(
					'serviceprovider'=>$check_result->provider,
					'mobilenumber'=>$mobilenumber,
					'rdate'=>$recharge_date,
					'service'=>$check_result->name,
					'type'=>$type_ser,
					'by_id' =>$by_id,
					'by'=>$by,
					'amount'=>$amount,
					
				);
			
				$login_user_tbalance =$this->input->post('tot_bal');
				$login_user_ubalance =$this->input->post('used_balance');
				$avaliable_amount=$login_user_tbalance - $login_user_ubalance;
				
					if($amount < $avaliable_amount)
					{		
						$insert =$this->recharge_model->insert_recharge_details($dataValues);
						if($insert)
						{	
							 $url = "http://103.29.232.110:8089/Ezypaywebservice/postpaidpush.aspx?AuthorisationCode=de4527cfd9674f86bc&product=$serviceprovider&MobileNumber=$mobilenumber&Amount=$amount&RequestId=&Circle=&AcountNo=1400050241&StdCode=091";
						
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
						'trans_id' =>$trans_id,
					);
				$update_error_status = $this->recharge_model->update_recharge_error_status($error_datas,$insert);
				
				if($error_id == 1 || $error_id == 200)
				{	
					$this->session->set_flashdata('item', array('message' => 'Transaction Successful','class' => 'success','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$name,'trans_id'=>$trans_id)); 
					redirect(site_url('recharge/index')) ;
				}	
				else if($error_id == 100)
				{		
					
					$this->session->set_flashdata('item', array('message' => 'Transaction Pending','class' => 'success','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$name,'trans_id'=>$trans_id)); 
					redirect(site_url('recharge/index')) ;			
				}		
				else if($error_id == -1611)
				{
					$this->session->set_flashdata('item', array('message' => 'Duplicate request,please try after 10 minutes','class' => 'success','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$name,'trans_id'=>$trans_id)); 
					redirect(site_url('recharge/index')) ;
				}		
				else 
				{
					$this->session->set_flashdata('item', array('message' => 'Transaction Failure','class' => 'success','number'=>$mobilenumber,'amount'=>$amount,'serviceprovider'=>$name,'trans_id'=>$trans_id)); 
					redirect(site_url('recharge/index')) ;
				}	
				
				$this->index();
		
			}
		}
				else if($amount > $avaliable_amount)
				{			
					$this->session->set_flashdata('item', array('message' => 'Insufficient Balance','class' => 'success')); 
					redirect(site_url('recharge/index')) ;				
				}
				else
				{
					$this->index();
				}
		
		}
			else
			{
				redirect(site_url('user/index'));
			}			
			
	}		
}