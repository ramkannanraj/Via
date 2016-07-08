<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class postpaid extends CI_Controller
  {
  public function __construct()
  {
   parent::__construct();
   $this->load->helper('url');     
   $this->load->library('form_validation');
   $this->load->model('user_model');
   $this->load->model('postpaid_model');
   $this->load->library('session');
  }
  
  public function index()
	{
		if(($this->session->userdata('uid')!=""))
			{
			
			redirect(site_url('register_view'));
				
			}
			else
				{
					$this->load->view("register_view");
				}
				
	}
  public function postpaid_service() 
  {
   $data['postpaid_serv'] = $this->postpaid_model->show_postpaid_details(); 
   $this->load->view("common/header");
$this->load->view("common/menu");
   $this->load->view('postpaid', $data);
   $this->load->view("common/footer");
  }
  public function display_prepaid()
  {
   $data['postpaid_serv'] = $this->postpaid_model->show_postpaid_details(); 
   $this->load->view('v_postpaid', $data);
  }
  public function getCommission() 
  {
	  $mobile_commssion=$this->input->post('commission');
	  $mobile_post_id= $this->input->post('id');
	 $this->postpaid_model->updatecommission($mobile_post_id,$mobile_commssion); 
	         
  }
  
  
   public function getDCommission()
  {
	  $mobile_d_commssion=$this->input->post('d_commission');
	  $mobile_post_id= $this->input->post('id');
	 $this->postpaid_model->updateDcommission($mobile_post_id,$mobile_d_commssion); 
	         
  }
  
  
   public function getSFCommission()
  {
	  $mobile_sf_name=$this->input->post('sf_commission');
	  $mobile_post_id= $this->input->post('id');
	 $this->postpaid_model->updateSFCommission($mobile_post_id,$mobile_sf_name); 
	         
  }
  
   public function getSDcommission()
  {
	  $mobile_sd_name=$this->input->post('sd_commission');
	  $mobile_post_id= $this->input->post('id');
	 $this->postpaid_model->updateSDCommission($mobile_post_id,$mobile_sd_name); 
	         
  }
 
 
  public function getSCommission()
  {
	  $mobile_s_name=$this->input->post('s_commission');
	  $mobile_post_id= $this->input->post('id');
	 $this->postpaid_model->updateSCommission($mobile_post_id,$mobile_s_name); 
	         
  }
  
  
   public function getStatus()
  {
	  $mobile_sts=$this->input->post('sts');
	  $mobile_post_id= $this->input->post('id');
	 $this->postpaid_model->updateStatus($mobile_post_id,$mobile_sts); 
	         
  }
  
 
 

 
 }
 ?>