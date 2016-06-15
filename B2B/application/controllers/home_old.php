<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

public function __construct() {
parent::__construct();
$this->load->model('home_model');
$this->load->library('form_validation');
$this->load->helper('url');     
			$this->load->library('form_validation');
			$this->load->model('user_model');
			$this->load->model('viewuser_model');
			$this->load->helper('string');
			$this->load->helper('date');
			//$this->load->library("pagination");
            $this->load->library('table');
			$this->load->database();
}
public function index()
{
$this->load->view("common/header");
$this->load->view("common/menu");  
$this->load->view('user_mgmt');
$this->load->view("common/footer");
}

public function fillgrid(){
$parentid=$this->session->userdata('parent_id');
	$data['report']=$this->home_model->getid($parentid);
    $this->home_model->fillgrid($data);
}

public function create(){
$this->form_validation->set_rules('name', 'Name', 'required');
$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
$this->form_validation->set_rules('contact', 'Contact Number', 'required|numeric|max_length[10]|min_length[10]');
if ($this->form_validation->run() == FALSE){
echo'<div class="alert alert-danger">'.validation_errors().'</div>';
exit;
}
else{
$this->home_model->create();
}
}

public function edit(){
$id =  $this->uri->segment(3);
$this->db->where('uid',$id);
$data['query'] = $this->db->get('usermaster');
$data['uid'] = $id;
$this->load->view('edit', $data);
}
public function fund(){
$id =  $this->uri->segment(3);
$this->db->where('uid',$id);
$data['querys'] = $this->db->get('usermaster');
$data['uid'] = $id;
$this->load->view('fund_transfer', $data);
}

 
public function lock_fund(){
$id =  $this->uri->segment(3);
$this->db->where('uid',$id);
$data['querys'] = $this->db->get('usermaster');
$data['uid'] = $id;
$this->load->view('lock_funds', $data);
}
public function release_fund(){
$id =  $this->uri->segment(3);
$this->db->where('uid',$id);
$data['querys'] = $this->db->get('usermaster');
$data['uid'] = $id;
$this->load->view('release_fund', $data);
}


public function update(){
$name= $this->input->post('name');
$companyname=$this->input->post('companyname');
$mobile=$this->input->post('mobile');
$password=$this->input->post('password');
$adduser_limit=$this->input->post('limit');
$username=$this->input->post('username');
$idd=$this->input->post('hidden');
$modify = $this->home_model->modify($name,$companyname,$mobile,$password,$adduser_limit,$username,$idd);
//echo '<a href="#" class="big-link" data-reveal-id="myModal" id="big-link"></a>';
echo "<script type='text/javascript'>alert('update Successfully'); window.location.href = 'home';  </script>"; 
}

/*public function fund_update()
{
$total_balance =$this->input->post('total_balance');
$ids=$this->input->post('hidden');
$amount =$this->input->post('amt');
$tot=$total_balance + $amount;


$update = $this->home_model->update_user_balanz($tot,$ids);
if($update){
$id_sess=$this->session->userdata('uid');
$sess_amnt=$this->session->userdata('total_balance');
$sess_val=$sess_amnt - $amount;
$update_val = $this->home_model->update_session_balz($id_sess,$sess_val);
echo "<script type='text/javascript'>alert('Updated Successfully'); window.location.href = 'home';  </script>"; 
}

}*/

public function fund_update()
{
$type='Balance Transfer';
$date=date('Y-m-d');
$total_balance =$this->input->post('total_balance');
$used_balance =$this->input->post('used_balance');
$login_user_tbalance =$this->session->userdata('total_balance');
$login_user_ubalance =$this->session->userdata('used_balance');
$sess_id =$this->session->userdata('uid');
$user_type =$this->input->post('type');
$sess_type =$this->session->userdata('type');
$mobile =$this->input->post('mobile');
$mobile1 =$this->session->userdata('mobile');
$ids=$this->input->post('hidden');
$amount =$this->input->post('amt');
$sess_name =$this->session->userdata('username');
$user_name =$this->input->post('usename');
$avaliable_amount=$login_user_tbalance - $login_user_ubalance;
$commentby="Balance transfered by $sess_type($sess_name)";
$commentto="Balance transfered to $user_type($user_name)";
 $sname=$this->input->post('sname');
     $uname=$this->input->post('uname');
$testing="BALANCE TRANSFER $sname transferred Rs .$amount/- for Member Id: $user_type($uname) On $date";
$testing1="BALANCE TRANSFER $sess_name transferred Rs .$amount/- to Member Id: $user_name On $date";
if($amount < $avaliable_amount)
{
	$user_avali=$total_balance-$used_balance;
$tot=$total_balance + $amount;
$total=$avaliable_amount-$amount;
$total1=$user_avali+$amount; 
$update = $this->home_model->update_user_balanz($tot,$ids);
if($update)
{
	$amount =$this->input->post('amt');
$id_sess=$this->session->userdata('uid');
$login_user_ubalance =$this->input->post('used_bal');
$current_user_balance=$login_user_ubalance + $amount;
$update_val = $this->home_model->update_session_balz($id_sess,$current_user_balance);

$transferby=$this->home_model->transferbyview($type,$amount,$total,$commentby,$ids,$sess_id,$date);
$transferto=$this->home_model->transfertoview($type,$amount,$total1,$commentto,$ids,$sess_id,$date);

$url = "http://alerts.solutionsinfini.com//api/v3/index.php?method=sms&api_key=A96b7866cc3166b24d4c6397ef5d6d436&to=$mobile,$mobile1&sender=IRUPAY&message=$testing&format=json&custom=1,2";

					$url = str_replace(" ", "%20", $url);
					$ret = file($url);
					$sess = explode(":",$ret[0]);
					 if ($sess[0] == "OK") 
					 {
					$sess_id = trim($sess[1]); // remove any whitespace 
					
					 $ret = file($url);
					 $send = explode(":",$ret[0]);
					 if ($send[0] == "ID") 
					 {
					 echo "successnmessage ID: ". $send[1];
					 } 
					 else
					 {
					 echo "send message failed";
					 }
					 } 
					 else
					 {
					  $ret[0] ;
					 }


echo "<script type='text/javascript'>alert('Fund transfer Successfully'); window.location.href = 'home';  </script>";
}
}
else
{
		echo "<script type='text/javascript'>alert('Insufficent balance');window.location.href = 'home';</script>";
}


}



/*public function lock_update()
{
$locked_balance =$this->input->post('locked_balance');
$ids=$this->input->post('hidden');
$amount =$this->input->post('amt');
$tot=$locked_balance + $amount;


$update = $this->home_model->update_lock_balanz($tot,$ids);
if($update){
$total_balance=$this->input->post('total_balance');
$sess_val=$total_balance - $amount;
$update_val = $this->home_model->update_lockbal_balz($ids,$sess_val);
echo "<script type='text/javascript'>alert('Updated Successfully'); window.location.href = 'home';  </script>"; 
}
}*/

public function lock_update()
{

$locked_balance =$this->input->post('locked_balance');
$login_user_tbalance =$this->input->post('tot_bal');
$login_user_ubalance =$this->input->post('used_balance');
$avaliable_amount=$login_user_tbalance - $login_user_ubalance;
$ids=$this->input->post('hidden');
$amount =$this->input->post('amt');
if($amount < $avaliable_amount)
{
$tot=$locked_balance + $amount;
$update = $this->home_model->update_lock_balanz($tot,$ids);
if($update){
$login_user_ubalance =$this->input->post('used_balance');
$current_user_balance=$login_user_ubalance + $amount;
$update_val = $this->home_model->update_lockbal_balz($ids,$current_user_balance);
echo "<script type='text/javascript'>alert('Amount Locked Successfully'); window.location.href = 'home';  </script>"; 
}
}
else
{
echo "<script type='text/javascript'>alert('Insufficent balance');window.location.href = 'home';</script>";	
}
}

/*public function relase_update()
{
$locked_balance =$this->input->post('locked_balance');
$ids=$this->input->post('hidden');
$amount =$this->input->post('amt');
if($amount <= $locked_balance)
{
$tot=$locked_balance - $amount;
$update = $this->home_model->rel_balanz($tot,$ids);
if($update){
$total_balance=$this->input->post('total_balance');
$sess_val=$total_balance + $amount;
$update_val = $this->home_model->relase_balz($ids,$sess_val);
echo "<script type='text/javascript'>alert('Updated Successfully'); window.location.href = 'home';  </script>"; 
}
}
else
{
echo "<script type='text/javascript'>alert('Sorry Cant Release'); window.location.href = 'home';  </script>";	
}

}*/

public function relase_update()
{
$locked_balance =$this->input->post('locked_balance');
$ids=$this->input->post('hidden');
$amount =$this->input->post('amt');
if($amount <= $locked_balance)
{
$tot=$locked_balance - $amount;
$update = $this->home_model->rel_balanz($tot,$ids);
if($update){
$login_user_ubalance =$this->input->post('used_balance');
$current_user_balance=$login_user_ubalance - $amount;
$update_val = $this->home_model->relase_balz($ids,$current_user_balance);
echo "<script type='text/javascript'>alert('Amount Release Successfully'); window.location.href = 'home';  </script>"; 
}
}
else
{
echo "<script type='text/javascript'>alert('Insufficent balance'); window.location.href = 'home';  </script>";	
}

}

 public function deltuser()
		{ 
		  $del_id = $this->uri->segment(3);
		  $up_del="yes";
		  $delt=$this->home_model->deltuser($del_id,$up_del);
		  if($delt){
		 //echo'<div class="alert alert-success">One record deleted Successfully</div>';
		  $this->load->view("common/header");
$this->load->view("common/menu");
		    $this->load->view('user_mgmt');
			$this->load->view("common/footer");
         }
		}

public function statusactive()
		{ 
		  $sta_id = $this->uri->segment(3);
		  $up_sta="no";
		  $active=$this->home_model->active($sta_id,$up_sta);
		  if($active){
		  $this->index();
         }
		}
		
		
		
		 public function statusinactive()
		{ 
		  $sta_id = $this->uri->segment(3);
		  $up_sta="yes";
		  $inactive=$this->home_model->inactive($sta_id,$up_sta);
		  if($inactive){
		  $this->index();
         }
		}

// public function delete(){
// $id =  $this->input->POST('uid');
// $this->db->where('uid', $id);
// $this->db->delete('usermaster');
// echo'<div class="alert alert-success">One record deleted Successfully</div>';
// exit;
// }


}
