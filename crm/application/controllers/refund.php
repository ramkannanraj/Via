<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class refund extends CI_Controller
	 {
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');     
			$this->load->library('form_validation');
			$this->load->model('refund_model');
			$this->load->library('session');
		}
		public function refund_details_admin() 
		{
			$this->load->model('refund_model');	
			$data['refund'] = $this->refund_model->refund_admin(); 
			$this->load->view("common/header");
			$this->load->view("common/menu");
			$this->load->view('refund', $data);
			$this->load->view("common/footer");
		}
		public function refund_details_dist() 
		{
			$this->load->model('refund_model');	
			$data['refund'] = $this->refund_model->refund_dist(); 
			$this->load->view("common/header");
			$this->load->view("common/menu");
			$this->load->view('refund', $data);
			$this->load->view("common/footer");
		}	
		public function refund_details_super() 
		{
			$this->load->model('refund_model');	
			$data['refund'] = $this->refund_model->refund_super(); 
			$this->load->view("common/header");
			$this->load->view("common/menu");
			$this->load->view('refund', $data);
			$this->load->view("common/footer");
		}
	}