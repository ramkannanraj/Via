<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class DTH_provider extends CI_Controller
  {
  public function __construct()
  {
   parent::__construct();
   $this->load->helper('url');     
   $this->load->library('form_validation');
   $this->load->model('user_model');
   $this->load->model('dth_provider_model');
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
  public function DTH_service() 
  {
   $this->load->model('dth_provider_model'); 
   $data['dth_serv'] = $this->dth_provider_model->show_dth_details(); 
   $this->load->view("common/header");
			$this->load->view("common/menu");
   $this->load->view('DTH_provider', $data);
   $this->load->view("common/footer");
  }
  
  public function display_DTH_provider()
  {
	$data['dth_serv'] = $this->dth_provider_model->show_dth_details(); 
	$this->load->view('v_DTH_provider', $data);
  }
  public function getDTH_Commission() 
  {
	  $dth_commssion=$this->input->post('commission');
	  $dth_post_id= $this->input->post('id');
	 $this->dth_provider_model->updatedth_commission($dth_post_id,$dth_commssion); 
	         
  }
  
  
   public function getDTH_DCommission()
  {
	  $dth_d_commssion=$this->input->post('d_commission');
	  $dth_post_id= $this->input->post('id');
	 $this->dth_provider_model->updatedth_Dcommission($dth_post_id,$dth_d_commssion); 
	         
  }
  
  
   public function getDTH_SFCommission()
  {
	  $dth_sf_name=$this->input->post('sf_commission');
	  $dth_post_id= $this->input->post('id');
	 $this->dth_provider_model->updatedth_SFCommission($dth_post_id,$dth_sf_name); 
	         
  }
  
   public function getDTH_SDcommission()
  {
	  $dth_sd_name=$this->input->post('sd_commission');
	  $dth_post_id= $this->input->post('id');
	 $this->dth_provider_model->updatedth_SDCommission($dth_post_id,$dth_sd_name); 
	         
  }
 
 
  public function getDTH_SCommission()
  {
	  $dth_s_name=$this->input->post('s_commission');
	  $dth_post_id= $this->input->post('id');
	 $this->dth_provider_model->updatedth_SCommission($dth_post_id,$dth_s_name); 
	         
  }
  
  
   public function getDTH_Status()
  {
	  $dth_sts=$this->input->post('sts');
	  $dth_post_id= $this->input->post('id');
	 $this->dth_provider_model->updatedth_Status($dth_post_id,$dth_sts); 
	         
  }
  
 
 

 
 }
 ?>