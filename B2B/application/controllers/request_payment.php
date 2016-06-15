<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class request_payment extends CI_Controller
	 {
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');     
			$this->load->library('form_validation');
			$this->load->model('request_payment_model');
			$this->load->library('session');
		}
	 
	}