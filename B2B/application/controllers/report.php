<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class report extends CI_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->model('report_model');
        $this->load->library('form_validation');
        $this->load->helper('url');     
			$this->load->library('form_validation');
			$this->load->model('user_model');
			$this->load->helper('string');
			$this->load->helper('date');
			//$this->load->library("pagination");
		    //$this->load->library('Datatables');
            $this->load->library('table');
			$this->load->database();

     
    }
    function index()
    {
		$data['history'] = $this->report_model->recharge_history(); 
		 $this->load->view("common/header");
		 $this->load->view("common/menu");
         $this->load->view('reportrecharge',$data);
		 $this->load->view("common/footer");
    }
	public function fillgrid()
	{
      $this->report_model->fillgrid();
	   $this->load->view('reportrecharge',$data);

    }
	public function ticket(){
$id =  $this->uri->segment(3);
$this->db->where('id',$id);
$data['query'] = $this->db->get('recharge_details');
$data['id'] = $id;
$this->load->view('n_ticket', $data);
}
public function process(){
$id =  $this->uri->segment(3);
$this->db->where('transaction_id',$id);
$data['query'] = $this->db->get('ticket');
$data['transaction_id'] = $id;
$this->load->view('process', $data);
}

public function solve(){
$id =  $this->uri->segment(3);
$this->db->where('transaction_id',$id);
$data['query'] = $this->db->get('ticket');
$data['transaction_id'] = $id;
$this->load->view('solve', $data);
}

public function refund(){
$id =  $this->uri->segment(3);
$up_del="1";
$refun=$this->report_model->refund($id,$up_del);
 if($refun){
$sess_id= $this->uri->segment(4);
$amt=$this->uri->segment(5);
$this->db->where('uid',$sess_id);
$query = $this->db->get('usermaster');
foreach ($query->result() as $row)
{
	
        $up_balance= $row->total_balance+$amt;
		
}
$refun1=$this->report_model->refund1($sess_id,$up_balance);
if($refun1){
echo "<script language=\"javascript\">alert('Refund successfully');</script>";
		   $this->index();
         }}

}

public function createticket(){
         

$reason=  $this->input->post('reason');
$transaction_id=$this->input->post('hidden');
$create_id=$this->input->post('hidden1');
$date=$this->input->post('date');
$data['insert']=$this->report_model->tic_insert($reason,$transaction_id,$create_id,$date);
$transaction_id=$this->input->post('hidden');
$change='1';
$qry=$this->report_model->tic_status($transaction_id,$change);
if($qry){
echo "<script language=\"javascript\">alert('Ticket created successfully');</script>";
		   $this->load->view("common/header");
		 $this->load->view("common/menu");
         $this->load->view('reportrecharge');
		 $this->load->view("common/footer");
         }

}



public function reply()
{
	$sta='1';
$reply =$this->input->post('reply');
$ids=$this->input->post('hidden');
$update = $this->report_model->reply($reply,$ids,$sta);
if($update){
echo "<script type='text/javascript'>alert('Reply update Successfully');</script>"; 
 $this->index();
}

}

public function amtrefund()
{
	$id =  $this->uri->segment(3);
	$amt =  $this->uri->segment(4);
	$usedbal =  $this->uri->segment(5);
	$by_id = $this->uri->segment(6);
	$afterbal=$usedbal-$amt;
	$sta='1';
	$update1 = $this->report_model->statusrefund($id,$sta);
    $update = $this->report_model->amtrefund($id,$afterbal,$by_id);
    if($update){
     echo "<script type='text/javascript'>alert('Amount Refund Successfully');</script>"; 
     $this->index();
               }

}

 function refundreport()
    {
		$status='1';
		$ids=$this->session->userdata('uid');
		$type=$this->session->userdata('type');
		$update['querys'] = $this->report_model->refundreport($status,$ids,$type);
		 $this->load->view("common/header");
		 $this->load->view("common/menu");
         $this->load->view('refundreport',$update);
		 $this->load->view("common/footer");
    }


}