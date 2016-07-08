<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class reversal extends CI_Controller
	 {
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');     
			$this->load->library('form_validation');
			$this->load->model('reversal_model');
			$this->load->library('session');
		}
		 public function index()
		{   
			$this->load->view("common/header");
			$this->load->view("common/menu");
			$this->load->view('reversal');
			$this->load->view("common/footer");
		}
        public function fillgrid()
		{ 	
            $this->reversal_model->fillgrid();
        }
		 public function view()
		 {
            $id =  $this->uri->segment(3);
			$this->db->where('reversal_id',$id);
            $data['query'] = $this->db->get('reversal_request');
            $data['reversal_id'] = $id;
            $this->load->view('view_popup', $data);
         }
			
	}