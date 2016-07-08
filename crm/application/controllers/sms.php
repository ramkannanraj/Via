<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class sms extends CI_Controller {
	
	
	public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');     
			$this->load->library('form_validation');
			$this->load->model('user_model');
			$this->load->library('session');
		 	//$this->load->database(); // load database
   			$this->load->model('sms_model'); // load model
		}
		
		
		
		
	public function index()
	{
		//$this->load->view('transfer');
		//$this->data['posts'] = $this->TransferModel->getPosts(); // calling Post model method getPosts()
   		//$this->load->view('transfer', $this->data);
		
		if(($this->session->userdata('uid')!=""))
			{
				$this->load->view("common/header");
			$this->load->view("common/menu");
				$this->load->view('get_incoming_details');
				$this->load->view("common/footer");
				
			}
			else
				{
					$this->load->view("register_view");
				}
	}
	
	
	function get_incoming_details()
    {           
       
        $data['results'] = $this->sms_model->getIncomingDetail();
		$this->load->view("common/header");
			$this->load->view("common/menu");
        $this->load->view('get_incoming_details',$data);
		$this->load->view("common/footer");
		

    }



function get_outgoing_details()
    {       


$start_date = $this->input->post('from_date');
$end_date = $this->input->post('to_date');
if($start_date!="" && $end_date!="")
{
$data['results'] = $this->sms_model->getOutgoingDetail($start_date,$end_date);
$this->load->view("common/header");
$this->load->view("common/menu");
$this->load->view('get_outgoing_details',$data);
$this->load->view("common/footer");
}
		

    }
	


	function get_outgoing_sms()
    {   
    $start_date=date('Y-m-d');      
    $end_date=date('Y-m-d'); 
    $data['results'] = $this->sms_model->getOutgoingDetail($start_date,$end_date);
    $this->load->view("common/header");
	$this->load->view("common/menu");
    $this->load->view('get_outgoing_details',$data);
	$this->load->view("common/footer");
    }















	/*function get_incoming_details_for_distributors()
    {           
       
        $data['results'] = $this->sms_model->getIncomingDetailDistributors();
		$this->load->view("common/header");
			$this->load->view("common/menu");
        $this->load->view('get_incoming_details_distributors',$data);
		$this->load->view("common/footer");
		

    }

	
	
	function get_outgoing_details_for_distributors()
    {           
       
        $data['results'] = $this->sms_model->getOutgoingDetailDistributors();
		$this->load->view("common/header");
			$this->load->view("common/menu");
        $this->load->view('get_outgoing_details_distributors',$data);
		$this->load->view("common/footer");
		

    }*/


}
?>