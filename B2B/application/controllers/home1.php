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
$this->home_model->fillgrid();
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
$this->form_validation->set_rules('name', 'Name', 'required');
$this->form_validation->set_rules('username', 'User Name', 'required');
$this->form_validation->set_rules('companyname', 'Company Name', 'required');
$this->form_validation->set_rules('mobile', 'Mobile Number', 'required|numeric|max_length[10]|min_length[10]');
if ($this->form_validation->run() == FALSE){
$res['error']='<div class="alert alert-danger">'.validation_errors().'</div>';    
}           
else{
$data = array('name'=>  $this->input->post('name'),
'companyname'=>$this->input->post('companyname'),
'mobile'=>$this->input->post('mobile'),
'password'=>$this->input->post('password'),
'limit'=>$this->input->post('limit'),
'username'=>$this->input->post('username'));
$this->db->where('uid', $this->input->post('hidden'));
$qry=$this->db->update('usermaster', $data);
if($qry)
{
echo "<script language=\"javascript\">alert('Updated successfully');</script>";
		   $this->index();
}
}

}

public function fund_update()
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

}



public function lock_update()
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
}

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

}

 public function deltuser()
		{ 
		  $del_id = $this->uri->segment(3);
		  $up_del="yes";
		  $delt=$this->home_model->deltuser($del_id,$up_del);
		  if($delt){
		 echo'<div class="alert alert-success">One record deleted Successfully</div>';
		    $this->load->view('user_mgmt');
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
