<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class user extends CI_Controller {
		public function __construct()
		{
			 
			parent::__construct();
			$this->load->helper('url');     
			$this->load->library('form_validation');
			$this->load->model('recharge_model'); 
			$this->load->helper('string');
			$this->load->helper('date');
			$this->load->helper(array('form', 'url'));
		}
		public function index()
		{
			 
	
		}
		 
	 	public function background()
		{
			$this->load->model('recharge_model'); 
			if( $this->recharge_model->update_temp_transaction())
			{
				echo "Sucess Code";	
			}else{
				echo "Failed Code";	
			}
			 
		}	
		
	}

