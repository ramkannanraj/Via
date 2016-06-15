<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class margin extends CI_Controller
	 {
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');     
			$this->load->library('form_validation');
			$this->load->model('margin_model');
			$this->load->library('session');
		}
		public function viewmargin() 
		{

			
			$data['mobile'] = $this->margin_model->mymargin_mobile(); 
			$data['postpaid_mob'] = $this->margin_model->mymargin_postpaid_mob(); 
			$data['dth'] = $this->margin_model->mymargin_dtn(); 
                        $this->load->view("common/header");
			$this->load->view("common/menu");
			$this->load->view('viewmargin',$data);
			$this->load->view("common/footer");
		}
		
	}


