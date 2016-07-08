<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class transfer extends CI_Controller {
	
	
	public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');     
			$this->load->library('form_validation');
			$this->load->model('user_model');
			$this->load->library('session');
		 	//$this->load->database(); // load database
   			$this->load->model('transfer_model'); // load model
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
				$this->load->view('transfer_details');
				$this->load->view("common/footer");
				
				
			}
			else
				{
				
					$this->load->view("register_view");
					
				}
	}
	
	function refund(){
		$refund_amount = $this->input->post('refund_amount');
        $led_id = $this->input->post('id');
		
		if ( $refund_amount < 1 ) 
		{
		  echo " Invalid amount ";
			return;
		}
		
		$this->load->model('longcoderecharge_model');
	/*	1. Get the ledger_details based on led_id & get the To-id details 
		2. Calculate the Before and after avaiable amount for by afer the tranascation should do the same for to_id
		3. Insert new record in ledger report with led_id
		4. update the status of current led_id status into Refunded
		
	*/	
		$transaction = $this->transfer_model->get_transfer_details( $led_id, 'by_id' );/* by details */     // $condition = by_id or to_id
	//	print_r( $transaction );
			 
		if ( $transaction ) { 
			
			$row_by = $transaction[0];
			//print_r( $row_by );
			$to = $row_by->to_id;
			$to_details = $this->transfer_model->get_transfer_details( $led_id, 'to_id' ); 	/* to details */
			//print_r( $transaction );
			if ( $to_details ) { 
			$row_to = $to_details[0];
			
				$before_balance_to = $row_to->total_balance - $row_to->used_balance ;
				if ( $before_balance_to >= $refund_amount ) {
					$before_balance_by =  $row_to->total_balance - $row_to->used_balance ;
					
					$before_balance_to = $row_to->available_balance;
					$after_balance_to = $before_balance_by - $refund_amount;
					
					$total_balance_to = $row_to->total_balance - $refund_amount; 
					
					$data = array('total_balance'=>$total_balance_to,'available_balance'=>$after_balance_to,);
					
					$update = $this->longcoderecharge_model->update_balance_with_id( $data,$row_to->uid );
					
					if ( $update ) {
						$before_balance_by = $row_by->available_balance;
						$after_balance_by = $before_balance_by + $refund_amount;
						
						$used_balance_by = $row_by->used_balance - $refund_amount; 
							
							$data = array('used_balance'=>$used_balance_by,'available_balance'=>$after_balance_by,);
       					    $update_by = $this->longcoderecharge_model->update_balance_with_id($data,$row_by->uid);
	    					if( $update_by  )
							{
								
								   $comment_by="Refund transfered by ".$this->session->userdata('name');
								   $comment_to="Refund transfered to ".$row_to->name;
								   
								   $timezone = new DateTimeZone("Asia/Kolkata" );
							  
									$date = new DateTime();
									$date->setTimezone($timezone );
									$date = $date->format( 'Y-m-d H:i:s' );
								   
								   
								   $dis_msg="REFUND TRANSFER ".$row_to->name." transferred Rs .$refund_amount/- for Member Id: ".$row_to->username." On $date";
								   $ret_msg="REFUND TRANSFER ".$row_by->name." transferred Rs .$refund_amount/- to Member Id: ".$row_by->username." On $date";
								  $to_id = $this->session->userdata('uid'); 
								
												
$sql = "INSERT INTO  `ledgerreport` (`id`, `date`, `type`, `comment`, `amount`, `by_id`,`to_id`,`before_balance`,`after_balance`,`transaction_status`,`ledger_id`) VALUES (NULL, '".$date."', 'Refund', '".$comment_to."', '".$refund_amount."', '".$to_id."', '".$row_to->uid."','".$before_balance_to."','".$after_balance_to."','Success',".$led_id."), (NULL, '".$date."', 'Refund', '".$comment_by."', '".$refund_amount."', '".$row_to->uid."', '".$to_id."','".$before_balance_by."','".$after_balance_by."','Success',".$led_id.");";



								 $ins =  $this->longcoderecharge_model->add_ledgerreport($sql,$row_by->mobile,$row_to->mobile,$dis_msg,$ret_msg);//($sql,$mobile,$mobile1,$testing)
								 
								 $data = array('transaction_status'=>'Refunded',);
       					    $update_by = $this->transfer_model->update_ledger_id($data, $led_id);
							
							
							
								  if(  $ins == false){
									  echo " Legder insertion  Failed";
								  }else{
									  echo "Fund transfer Successfully";
								  } 
							}else
							{
								echo " Balance Failed";
							}
						
						}else
						{
							echo " Balance update Failed";
						}
						
					
					} else
					  {
						$this->longcoderecharge_model->send_insufficient_sms($distributor->mobile,$avaliable_amount,0,$refund_amount,0,$by_id);
						echo "Insufficent balance";
					  } 
			}
			else
			{
				echo " Transaction not found Ledger";
			}
	 
		}else
			{
				echo " Transaction not found Ledger";
			}
		
 }
	function get_transfer_details()
    {           
        //Search Engine
       $start_date = $this->input->post('from_date');
        $end_date = $this->input->post('to_date');
		 $retailer = $this->input->post('retailer');
        $distributor = $this->input->post('distributor');
		//$type=$this->session->userdata('type');
		$this->load->model('reports_model');
			
		if(  $this->session->userdata('type') == 'distributor' ){
		$data['retailers']=$this->transfer_model->getRetailerListByDis( $this->session->userdata('uid') ); 
		
		 
	}else{
		$data['retailers']=$this->transfer_model->getRetailerList();
		$data['distributors']=$this->transfer_model->getDistributorList();
		 
	}
		
		if(  $distributor != '' ){
		$by_id	= $distributor;
		}else
		{
			$by_id	= '';
		}
		
		if(  $retailer != '' ){
		$to_id	= $retailer;
		}else
		{
			$to_id	= '';
		}

		if($start_date!="" && $end_date!="" )
		{
        $data['results'] = $this->transfer_model->getTransferDetail($start_date,$end_date,$by_id,$to_id);
		$this->load->view("common/header");
			$this->load->view("common/menu");
        $this->load->view('get_transfer_details',$data);
			$this->load->view("common/footer");
		}
		else
		{
            $date=date("Y-m-d"); 
			$data['results'] = $this->transfer_model->getTransferDetailcurrentdate($date);
				$this->load->view("common/header");
				
			$this->load->view("common/menu");
			$this->load->view('get_transfer_details',$data);
			$this->load->view("common/footer");
		}

    }



function other_transfer()
    {           
        //Search Engine
       $start_date = $this->input->post('from_date');
        $end_date = $this->input->post('to_date');
		//$type=$this->session->userdata('type');
		if($start_date!="" && $end_date!="")
		{
        $data['results'] = $this->transfer_model->getOthertransfer($start_date,$end_date);
		$this->load->view("common/header");
			$this->load->view("common/menu");
        $this->load->view('get_other_transfer_details',$data);
		$this->load->view("common/footer");
		}
		else
		{
			$date=date("Y-m-d");
			$data['results'] = $this->transfer_model->getOthertransfercurrentdate($date);
			$this->load->view("common/header");
			$this->load->view("common/menu");
			$this->load->view('get_other_transfer_details',$data);
			$this->load->view("common/footer");
		}

    }
	
	
	/*function other_franchise_transfer()
    {           
        //Search Engine
       $start_date = $this->input->post('from_date');
        $end_date = $this->input->post('to_date');
		//$type=$this->session->userdata('type');
		if($start_date!="" && $end_date!="")
		{
        $data['results'] = $this->transfer_model->getOtherFranchisetransfer($start_date,$end_date);
		$this->load->view("common/header");
			$this->load->view("common/menu");
        $this->load->view('get_other_franchise_transfer_details',$data);
			$this->load->view("common/footer");
		}
		else
		{
			$this->load->view("common/header");
			$this->load->view("common/menu");
			$this->load->view('other_franchise_transfer_details');
			$this->load->view("common/footer");
		}

    }*/
	

}
?>