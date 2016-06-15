<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class sendmoneyreport extends CI_Controller
	 {
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');     
			$this->load->library('form_validation');
			$this->load->model('icash_report_model');
			$this->load->library('session');
		}
		public function sendmoney_admin() 
		{
			$this->load->model('cardgeneration_model');	
			$data['heading'] = "Card Topup Report";
			$data['card'] = $this->icash_report_model->icash_admin(); 
			$this->load->view("common/header");
			$this->load->view("common/menu");
			$this->load->view('icash_report', $data);
			$this->load->view("common/footer");
		}
		public function sendmoney_dist() 
		{
			$this->load->model('cardgeneration_model');	
			$data['heading'] = "Card Topup Report";
			$data['card'] = $this->icash_report_model->icash_dist();
			$this->load->view("common/header");
			$this->load->view("common/menu"); 
			$this->load->view('icash_report', $data);
			$this->load->view("common/footer");
		}
		public function sendmoney_super() 
		{
			$this->load->model('cardgeneration_model');	
			$data['heading'] = "Card Topup Report";
			$data['card'] = $this->icash_report_model->icash_super();
			$this->load->view("common/header");
			$this->load->view("common/menu"); 
			$this->load->view('icash_report', $data);
			$this->load->view("common/footer");
		}
		public function sendmoney_fran() 
		{
			$this->load->model('cardgeneration_model');	
			$data['heading'] = "Card Topup Report";
			$data['card'] = $this->icash_report_model->icash_fran();
			$this->load->view("common/header");
			$this->load->view("common/menu"); 
			$this->load->view('icash_report', $data);
			$this->load->view("common/footer");
		}
		
		public function sendmoney_sales() 
		{
			$this->load->model('cardgeneration_model');	
			$data['card'] = $this->icash_report_model->icash_sales();
			$this->load->view("common/header");
			$this->load->view("common/menu"); 
			$this->load->view('icash_sales_report', $data);
			$this->load->view("common/footer");
		}
	}