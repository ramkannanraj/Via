<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class complaints extends CI_Controller
	 {
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');     
			$this->load->library('form_validation');
			$this->load->model('complaints_model');
			$this->load->library('session');
		}
			 public function index()
		{   
			$this->load->view("common/header");
			$this->load->view("common/menu");
			$this->load->view('complaints');
			$this->load->view("common/footer");
		}
        public function fillgrid()
		{ 
            $this->complaints_model->fillgrid();
        }
			public function popup()
		{	
			$id =  $this->uri->segment(3);
			$this->db->where('t_id',$id);
            $data['query'] = $this->db->get('ticket');
            $data['id'] = $id;
			$this->load->view('complaint_status_popup', $data);
		}
		public function update_status() 
		{
			$id= $this->input->post('did');
			$data = array('reply' => $this->input->post('comp_details'),'status'=>2,);
			$this->complaints_model->update_status($id,$data);
			redirect(site_url('complaints')) ;
		}

	}
	