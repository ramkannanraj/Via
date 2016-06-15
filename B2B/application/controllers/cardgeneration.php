<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class cardgeneration extends CI_Controller
	 {
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');     
			$this->load->library('form_validation');
			$this->load->model('cardgeneration_model');
			$this->load->library('session');
		}
		public function card_details_admin() 
		{
			$this->load->model('cardgeneration_model');	
			$data['heading'] = "Card Generation Report";
			$data['card'] = $this->cardgeneration_model->card_admin(); 
			$this->load->view("common/header");
			$this->load->view("common/menu");
			$this->load->view('cardgeneration', $data);
			$this->load->view("common/footer");
		}
		public function card_details_dist() 
		{
			$this->load->model('cardgeneration_model');	
			$data['card'] = $this->cardgeneration_model->card_dist();
			$this->load->view("common/header");
			$this->load->view("common/menu"); 
			$this->load->view('cardgeneration', $data);
			$this->load->view("common/footer");
		}
		public function card_details_super() 
		{
			$this->load->model('cardgeneration_model');	
			$data['card'] = $this->cardgeneration_model->card_super();
			$this->load->view("common/header");
			$this->load->view("common/menu"); 
			$this->load->view('cardgeneration', $data);
			$this->load->view("common/footer");
		}
	}