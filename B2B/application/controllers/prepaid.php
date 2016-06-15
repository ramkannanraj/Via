<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class prepaid extends CI_Controller
	 {
			public function __construct()
			{
			parent::__construct();
			$this->load->helper('url');     
			$this->load->library('form_validation');
			$this->load->model('prepaid_model');
			$this->load->library('session');
			}
			public function prepaid_service() 
			{
			$this->load->model('prepaid_model');	
			$data['prepaid_serv'] = $this->prepaid_model->show_prepaid();
			$this->load->view("common/header");
			$this->load->view("common/menu");
			$this->load->view('prepaid', $data);
			$this->load->view("common/footer");
			}
			public function display_prepaid()
			{
			$data['prepaid_serv'] = $this->prepaid_model->show_prepaid();
			$this->load->view('v_prepaid',$data);
			}
			public function get_data()
			{
			$mobile_pre_id= $this->input->post('id');
			$mobile_comm=$this->input->post('c_name');
			$this->prepaid_model->update_comm($mobile_pre_id,$mobile_comm);        
			}
			public function get_data_dcomm()
			{
			$mobile_pre_id= $this->input->post('id');
			$mobile_dcomm=$this->input->post('d_name');
			$this->prepaid_model->update_dcomm($mobile_pre_id,$mobile_dcomm);        
			}
			public function get_data_sfcomm()
			{
			$mobile_pre_id= $this->input->post('id');
			$mobile_sfcomm=$this->input->post('sf_name');
			$this->prepaid_model->update_sfcomm($mobile_pre_id,$mobile_sfcomm);        
			}
			public function get_data_sdcomm()
			{
			$mobile_pre_id= $this->input->post('id');
			$mobile_sdcomm=$this->input->post('sd_name');
			$this->prepaid_model->update_sdcomm($mobile_pre_id,$mobile_sdcomm);        
			}
			public function get_data_scomm()
			{
			$mobile_pre_id= $this->input->post('id');
			$mobile_scomm=$this->input->post('s_name');
			$this->prepaid_model->update_scomm($mobile_pre_id,$mobile_scomm);        
			}
			
			public function get_data_sta()
			{
			$mobile_pre_id= $this->input->post('id');
			$mobile_sta=$this->input->post('sta_name');
			$this->prepaid_model->update_sta($mobile_pre_id,$mobile_sta);        
			}
			public function get_data_provider()
			{
			$mobile_pre_id= $this->input->post('id');
			$mobile_provider=$this->input->post('prov_name');
			$this->prepaid_model->update_provider($mobile_pre_id,$mobile_provider);        
			}
			public function update_data()
			{
			$id= $this->input->post('id');
			$column=$this->input->post('column');
			$column_val=$this->input->post('column_val');
			
			$this->prepaid_model->update_provider_tbl($column,$column_val,$id);       
			}			
	
	
	}
	
	
	
