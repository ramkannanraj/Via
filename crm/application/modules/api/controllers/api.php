<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class api extends MX_Controller {
		
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');			 
			$this->load->model('user_model');
$this->load->model('recharge_model');
			$this->load->helper('string');
			$this->load->helper('date');
			$this->load->helper(array('form', 'url'));
		}

		public function Login()
		{
			if(!empty($_GET['AuthorisationCode']))
			{
			$authcode=$_GET['AuthorisationCode'];
			
			if($authcode=='aUtH543paYbuKs987')
			{
			if(!empty($_GET['username']) && !empty($_GET['password']))
				{
				$username=$_GET['username'];
				$password=$_GET['password'];
				$result=$this->user_model->login($username,$password);
				if($result!=0)
				{
				$res= $this->user_model->deliver_response(1,"Login Sucessfull",$result);
				echo $res;
				}
				else
				{
				$res= $this->user_model->deliver_response(0,"Invalid Username|Password",NULL);
				echo $res;
				}
				
				}	
				else
				{
				$res= $this->user_model->deliver_response(2,"Either Username|Password is empty",NULL);
				echo $res;
				}
			}
			else
				{
				$res= $this->user_model->deliver_response(3,"Invalid Authorisation Code",NULL);
				echo $res;
				}
			}	
		}
public function Rechargeapi()
		{
		if(!empty($_GET['AuthorisationCode']))
			{
			$authcode=$_GET['AuthorisationCode'];
			
			if($authcode=='aUtH543paYbuKs987')
			{
			
			
				if(!empty($_GET['phonenumber']) && !empty($_GET['amount']) && !empty($_GET['operator'])&& !empty($_GET['uid']))
				{
					$phonenumber=$_GET['phonenumber'];
					$amount=$_GET['amount'];
					$operator=$_GET['operator'];
					$uid=$_GET['uid'];
					$result=$this->recharge_model->rechargeapi($phonenumber,$amount,$operator,$uid);
					if($result==1)
					{
					$res= $this->user_model->deliver_response(1,"Recharge Sucessfull",$result);
					echo $res;
					}
					else if($result==0)
					{
					$res= $this->user_model->deliver_response(0,"Recharge Failed",NULL);
					echo $res;
					}	
					else if($result==2)
					{
					$res= $this->user_model->deliver_response(0,"Recharge Pending",NULL);
					echo $res;
					}	
					else if($result==3)
					{
					$res= $this->user_model->deliver_response(0,"Duplicate Transaction",NULL);
					echo $res;
					}	
					else if($result==4)
					{
					$res= $this->user_model->deliver_response(0,"Error",NULL);
					echo $res;
					}	
				}
				else
				{
				$res= $this->user_model->deliver_response(5,"Either Phonenumber|Amount|Operator|User Id is empty",NULL);
				echo $res;
				}
			
			}
			else
			{
			$res= $this->user_model->deliver_response(6,"Invalid Authorisation Code",NULL);
				echo $res;
			}
			}
		}
		
}