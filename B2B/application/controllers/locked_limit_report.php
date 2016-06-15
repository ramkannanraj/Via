<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class locked_limit_report extends CI_Controller {
	
	
	public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');     
			$this->load->library('form_validation');
			$this->load->model('user_model');
			$this->load->library('session');
		 	//$this->load->database(); // load database
   			$this->load->model('locked_limit_report_model'); // load model
		}
		
		
		
		
	public function index()
	{
		//$this->load->view('transfer');
		//$this->data['posts'] = $this->TransferModel->getPosts(); // calling Post model method getPosts()
   		//$this->load->view('transfer', $this->data);
		
		if(($this->session->userdata('uid')!=""))
			{
				$this->load->view('register_view');
				
			}
			else
				{
					$this->load->view("register_view");
				}
	}
	
	
	function locked_limit_details()
    {           
       
        $data['results'] = $this->locked_limit_report_model->getDistributorAmount();
		$this->load->view("common/header");
			$this->load->view("common/menu");
        $this->load->view('locked_limit_details',$data);
		$this->load->view("common/footer");
		
    }


	

}
?>