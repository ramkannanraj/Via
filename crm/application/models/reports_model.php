<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class reports_model extends CI_Model 
{
 
/*GET ADMIN TRANSFER DETAILS*/
 function getDailyreport($retailer,$distributor)
{
	if($this->session->userdata('type')=="admin")
	{
 	$success="Transaction Successful";
$this->db->select("*");
 $this->db->order_by("id","desc");
$this->db->from('recharge_details');
$this->db->where('result',$success);
$this->db->join('usermaster','usermaster.uid = recharge_details.by_id');
 if($retailer !="" ) $this->db->where('usermaster.uid',$retailer);
  if($distributor !="" ) $this->db->where('usermaster.parent_id',$distributor);
  $query = $this->db->get();
  return $query->result();
	}
	if($this->session->userdata('type')=="distributor")
	{

	
		$success="Transaction Successful";
$this->db->select("recharge_details.id,recharge_details.result,recharge_details.rdate,recharge_details.amount,
recharge_details.commission ,recharge_details.by_id,recharge_details.dcommission,
recharge_details.mobilenumber,recharge_details.type,recharge_details.service,usermaster.uid,usermaster.parent_id,usermaster.username");
  $this->db->from('recharge_details');
 $this->db->order_by("recharge_details.id","desc");
  $this->db->join('usermaster','usermaster.uid = recharge_details.by_id');
  $this->db->where(array('usermaster.parent_id' => $this->session->userdata('uid'), 'recharge_details.result' => $success));
   
   
   if($retailer !="" ) $this->db->where('usermaster.uid',$retailer);
   
  // $this->db->where(array('usermaster.type' => '' $this->session->userdata('uid'), 'recharge_details.result' => $success));
  
  
  
  //$this->db->where('parent_id',$this->session->userdata('uid'));
  
  $query = $this->db->get();
  return $query->result();
		
	}
	
	if($this->session->userdata('type')=="retailer")
	{
		$success="Transaction Successful";
$this->db->select("recharge_details.id,recharge_details.result,recharge_details.rdate,recharge_details.amount,
recharge_details.commission ,recharge_details.by_id,recharge_details.dcommission,
recharge_details.mobilenumber,recharge_details.type,recharge_details.service,usermaster.uid,usermaster.parent_id,usermaster.username");
  $this->db->from('recharge_details');
  $this->db->join('usermaster','usermaster.uid = recharge_details.by_id');
  $this->db->where(array('by_id' => $this->session->userdata('uid'), 'recharge_details.result' => $success));
  
 $this->db->order_by("recharge_details.id","desc");
  //$this->db->where('by_id',$this->session->userdata('uid'));
  $query = $this->db->get();
  return $query->result();
		
	}
 
}

/*function getDailyreportDistributor()
{
	$success="Success";
$this->db->select("recharge_details.id,recharge_details.rdate,recharge_details.amount,recharge_details.commission ,recharge_details.by_id,recharge_details.dcommission,
recharge_details.mobilenumber,recharge_details.type,recharge_details.service,
usermaster.type,usermaster.uid,usermaster.parent_id,

usermaster.username");
  $this->db->from('recharge_details');
  $this->db->join('usermaster','usermaster.uid = recharge_details.by_id');
  $this->db->where('parent_id',$this->session->userdata('uid'));
  $query = $this->db->get();
  return $query->result();
}


function getDailyreportFranchise()
{
	$success="Success";
$this->db->select("recharge_details.id,recharge_details.rdate,recharge_details.amount,recharge_details.commission ,recharge_details.by_id,recharge_details.dcommission,
recharge_details.mobilenumber,recharge_details.type,recharge_details.service,
usermaster.type,usermaster.uid,
usermaster.parent_id,usermaster.username");
  $this->db->from('recharge_details');
  $this->db->join('usermaster','usermaster.uid = recharge_details.by_id');
  $this->db->where('by_id',$this->session->userdata('uid'));
  $query = $this->db->get();
  return $query->result();
}
*/


function getOperatorList()
{
   $success="Transaction Successful";
   $this->db->select('*');
   $this->db->from('mobileprovider');  
    
  $query = $this->db->get();
  return $query->result();
}

function getRetailerList()
{
   
   $this->db->select('*');
   $this->db->from('usermaster');
   $this->db->where('type','retailer');  
   //$this->db->where('parent_id',$this->session->userdata('uid'));  
   $query = $this->db->get();
   return $query->result();
}

	 
	 function getRetailerListByDis($dis)
	{
		$this->db->select('uid,name');
		$this->db->from('usermaster');
		$this->db->where('parent_id',$dis);
		$query = $this -> db -> get()->result(); 
	 
		
		return $query;
	}  
	
function getDistributorList()
{
   
   $this->db->select('*');
   $this->db->from('usermaster');
   $this->db->where('type','distributor');  
  // $this->db->where('parent_id',$this->session->userdata('uid'));   
   $query = $this->db->get();
   return $query->result();
}




function getOperatorReport($date,$operator)
{
   $success="Transaction Successful";
   $this->db->select('*,SUM(amount) as total, SUM(commission) as commi,SUM(dcommission) as dcommi');
   $this->db->from('recharge_details');
   $this->db->group_by('service');
  if($date !="" )   $this->db->where(array("DATE_FORMAT(rdate,'%Y-%m-%d')"=>"$date", 'recharge_details.result' => $success));
   if($operator !="" ) $this->db->where('service',$operator);
   
  $query = $this->db->get();
  
 // echo $this->db->last_query();
  return $query->result();
}


function getRetailerreport()
{
if($this->session->userdata('type')=="admin")
	{
 	$success="Transaction Successful";
//$this->db->select("recharge_details.id,recharge_details.result,recharge_details.rdate,recharge_details.amount,recharge_details.commission ,recharge_details.by_id,recharge_details.dcommission,recharge_details.service,recharge_details.type,recharge_details.req_id,recharge_details.trans_id,recharge_details.before_bal,recharge_details.after_bal,usermaster.uid,usermaster.parent_id,usermaster.username,usermaster.mobile,usermaster.used_balance,usermaster.total_balance");

$this->db->select("recharge_details.id,recharge_details.result,recharge_details.rdate,recharge_details.amount,recharge_details.commission ,recharge_details.by_id,recharge_details.dcommission,recharge_details.service,recharge_details.type,recharge_details.req_id,recharge_details.trans_id,usermaster.uid,usermaster.parent_id,usermaster.username,usermaster.mobile,usermaster.used_balance,usermaster.total_balance");
  
  
  $this->db->order_by("recharge_details.rdate","desc");
  $this->db->from('recharge_details');
  $this->db->join('usermaster','usermaster.uid = recharge_details.by_id');
$this->db->where('result',$success);
  $query = $this->db->get();
  return $query->result();
	}
	if($this->session->userdata('type')=="retailer")
	{
$success="Transaction Successful";
//$this->db->select("recharge_details.id,recharge_details.result,recharge_details.rdate,recharge_details.amount,recharge_details.commission ,recharge_details.by_id,recharge_details.dcommission,recharge_details.service,recharge_details.type,recharge_details.req_id,recharge_details.trans_id,recharge_details.before_bal,recharge_details.after_bal,usermaster.uid,usermaster.parent_id,usermaster.username,usermaster.mobile,usermaster.used_balance,usermaster.total_balance");
  
$this->db->select("recharge_details.id,recharge_details.result,recharge_details.rdate,recharge_details.amount,recharge_details.commission ,recharge_details.by_id,recharge_details.dcommission,recharge_details.service,recharge_details.type,recharge_details.req_id,recharge_details.trans_id,usermaster.uid,usermaster.parent_id,usermaster.username,usermaster.mobile,usermaster.used_balance,usermaster.total_balance");



  $this->db->order_by("recharge_details.rdate","desc");
  $this->db->from('recharge_details');
  $this->db->join('usermaster','usermaster.uid = recharge_details.by_id');
  $this->db->where(array('by_id' => $this->session->userdata('uid'), 'recharge_details.result' => $success));
  $query = $this->db->get();
  return $query->result();
	}	
	
 
}

function getMoneyTransferCommission(){
	
	
	return $this->db->select('*')->join('usermaster','icash_money_transfer_commision.retailer_id = usermaster.uid')->get('icash_money_transfer_commision')->result();
	
	
}

function getCardList(){
	      
	if($this->session->userdata('type') == 'admin' ){
		$where = "card_no <> '' ";
	 return $this->db->distinct()->select('card_no')->join('icash_sales_mgmt','icashcardregistraion.card_no = icash_sales_mgmt.icash_user_id', 'left')->where($where)->get('icashcardregistraion')->result();
	 
	 }else if($this->session->userdata('type') == 'distributor' ){
		 $where = "icash_user_id <> '' ";
	return $this->db->distinct()->select('icash_user_id as card_no')->join('usermaster','icash_sales_mgmt.retailer_id = usermaster.uid')->where('parent_id',$this->session->userdata('uid'))->where($where)->get('icash_sales_mgmt')->result();
	
	}else if($this->session->userdata('type') == 'retailer' ){
		$where = "icash_user_id <> '' ";
	return $this->db->distinct()->select('icash_user_id as card_no')->where($where)->where('retailer_id',$this->session->userdata('uid'))->get('icash_sales_mgmt')->result();

}
	
	
}




 
}
?>