<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class reports extends CI_Controller {
	
	
	public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');     
			$this->load->library('form_validation');
			$this->load->model('user_model');
			$this->load->library('session');
		 	//$this->load->database(); // load database
   			$this->load->model('reports_model'); // load model
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
	
	
	function daily_sales_report()
    {           
       
	   $retailer = "";
	   $distributor = "";
	   
        $data['results'] = $this->reports_model->getDailyreport($retailer,$distributor);
		$data['mobileproviders']=$this->reports_model->getOperatorList();
		
	if(  $this->session->userdata('type') == 'distributor' ){
		$data['retailers']=$this->reports_model->getRetailerListByDis( $this->session->userdata('uid') ); 
		
		 
	}else{
		$data['retailers']=$this->reports_model->getRetailerList();
		$data['distributors']=$this->reports_model->getDistributorList();
	}
		$this->load->view("common/header");
		$this->load->view("common/menu");
        $this->load->view('reports',$data);
		$this->load->view("common/footer");
		
    }
  
 function get_retailer_by()
	{
	  $dis = $this->uri->segment(3);
	 //header('Content-Type: application/json');
	  echo(json_encode($this->reports_model->getRetailerListByDis( $dis )));
	}
  

	
	function daily_report()
    {           
       
	   $retailer = $this->input->post('retailer');
	   $distributor = $this->input->post('distributor');
	  
	   
	   
        $data['results'] = $this->reports_model->getDailyreport($retailer,$distributor);
		$data['mobileproviders']=$this->reports_model->getOperatorList();
		$data['retailers']=$this->reports_model->getRetailerList();
		$data['distributors']=$this->reports_model->getDistributorList();
		
		$this->load->view("common/header");
		$this->load->view("common/menu");
        $this->load->view('reports',$data);
		$this->load->view("common/footer");
		
    }
	

/*function daily_sales_report_distributor()
    {           
        $data['results'] = $this->reports_model->getDailyreportDistributor();
		$this->load->view("common/header");
			$this->load->view("common/menu");
        $this->load->view('reports_distributors',$data);
		$this->load->view("common/footer");

	}
	
	function daily_sales_report_franchise()
    {           
        $data['results'] = $this->reports_model->getDailyreportFranchise();
		$this->load->view("common/header");
			$this->load->view("common/menu");
        $this->load->view('reports_franchise',$data);
		$this->load->view("common/footer");

	}
*/
	
	function operator_report()
    {           
	   $date = $this->input->post('operator_date');
	   
	     $operator = $this->input->post('operator');
	   if($date !="" || $operator !="")
	   {
       $data['results'] = $this->reports_model->getOperatorReport($date,$operator);
	   $data['mobileproviders']=$this->reports_model->getOperatorList();
       $this->load->view("common/header");
       $this->load->view("common/menu");
       $this->load->view('operator_reports',$data); 
	   $this->load->view("common/footer");
	   }
	 	}

function get_operator_report()
    {           
	  	$date=date('Y-m-d'); $operator ="";
        $data['results'] = $this->reports_model->getOperatorReport($date,$operator);
		$data['mobileproviders']=$this->reports_model->getOperatorList();
		$this->load->view("common/header");
		$this->load->view("common/menu");
       	$this->load->view('operator_reports',$data); 
	  	$this->load->view("common/footer");
	   
	}

function retailer_sales_report()
    {           
       
        $data['results'] = $this->reports_model->getRetailerreport();
		
	$this->load->view("common/header");
	$this->load->view("common/menu");
        $this->load->view('retailer_reports',$data);
	$this->load->view("common/footer");
		
    }

function moneyTransferCommission(){
	
	 $data['results'] = $this->reports_model->getMoneyTransferCommission();
	 
	 //print_r($data); exit();
		
	$this->load->view("common/header");
	$this->load->view("common/menu");
    $this->load->view('commission_reports',$data);
	$this->load->view("common/footer");
	
	
	
}

function sendmoneyReport(){
	
	 $data['results'] = $this->reports_model->getCardList();
	 
	 //print_r($data); exit();
		
	$this->load->view("common/header");
	$this->load->view("common/menu");
    $this->load->view('card-list',$data);
	$this->load->view("common/footer");
	
	
	
}

function getCardDetails($cardNo){
	
	 
	$data['cardNo'] = $cardNo;
		
	$this->load->view("common/header");
	$this->load->view("common/menu");
    $this->load->view('card-report',$data);
	$this->load->view("common/footer");
	
	
	
}




}
?>