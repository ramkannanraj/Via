<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class transfer_model extends CI_Model 
{
 
/*GET ADMIN TRANSFER DETAILS*/
 function getTransferDetail($start_date,$end_date,$by_id,$to_id) 
{
	if($this->session->userdata('type')=='admin' || $this->session->userdata('type')=='distributor' )
	{ 
$this->db->select("ledgerreport.id,DATE(date) AS date_part,ledgerreport.comment,ledgerreport.transaction_status,ledgerreport.type AS leg_typ,ledgerreport.by_id,ledgerreport.amount,usermaster.type   AS user_type,usermaster.uid,usermaster.parent_id,usermaster.username,usermaster.mobile");
  $this->db->from('ledgerreport');
  $this->db->join('usermaster', 'usermaster.uid = ledgerreport.to_id');
  
   $this->db->where('DATE(date) >=', $start_date);
 $this->db->where('DATE(date) <=', $end_date);
 
 if(  $by_id !=''  )
	{
		$this->db->where('ledgerreport.by_id',$by_id);	
	
	}else{
	 $this->db->where('ledgerreport.by_id',$this->session->userdata('uid'));	
	}
  $query = $this->db->get();
   
  return $query->result();
	}
	if($this->session->userdata('type')=='retailer')
	{
		$this->db->select("ledgerreport.id,DATE(date) AS date_part,ledgerreport.type AS leg_typ,ledgerreport.comment,ledgerreport.transaction_status,ledgerreport.by_id,ledgerreport.amount,usermaster.type   AS user_type,usermaster.uid,usermaster.parent_id,usermaster.username,usermaster.mobile");
  $this->db->from('ledgerreport');
  $this->db->join('usermaster', 'usermaster.uid = ledgerreport.by_id');
   $this->db->where('DATE(date) >=', $start_date);
 $this->db->where('DATE(date) <=', $end_date);
$this->db->where('by_id',$this->session->userdata('uid'));
  $query = $this->db->get();
  return $query->result();
	}
 
}

 function getRetailerListByDis($dis)
	{
		$this->db->select('uid,name');
		$this->db->from('usermaster');
		$this->db->where('parent_id',$dis);
		$query = $this -> db -> get()->result(); 
	 
		
		return $query;
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

function get_transfer_details( $id, $condition ) // $condition = by_id or to_id
{
	
	
$this->db->select("ledgerreport.id,DATE(date) AS date_part,ledgerreport.comment,ledgerreport.type AS leg_typ,ledgerreport.to_id,ledgerreport.by_id,ledgerreport.amount,usermaster.type   AS user_typec,usermaster.uid,usermaster.parent_id,usermaster.username,usermaster.mobile,usermaster.total_balance,usermaster.available_balance,usermaster.used_balance,usermaster.name");
  $this->db->from('ledgerreport'); 
   
  	$this->db->join('usermaster', 'usermaster.uid = ledgerreport.'.$condition);
   
   $this->db->where('ledgerreport.id',$id);	
    $this->db->where('ledgerreport.transaction_status !=', 'Refunded');	
	 
  $query = $this->db->get(); 
   
 
  if( $query->num_rows() > 0 ){
	 return $query->result();	
  }else
  {
	return false;  
  }
}

 
function get_trasaction_with_id( $id )
{
   $query = $this->db->get_where('ledgerreport', array('id'=>$id,)); 
			if($query)
			{ 
				return $query->row();
			}
			else
			{
			return false;
			}
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
function getTransferDetailcurrentdate($date)
{
	
	if($this->session->userdata('type')=='admin' || $this->session->userdata('type')=='distributor'  )
	{ 
$this->db->select("ledgerreport.id,DATE(date) AS date_part,ledgerreport.comment,ledgerreport.type AS leg_typ,ledgerreport.by_id,usermaster.type   AS user_type,ledgerreport.amount,ledgerreport.transaction_status,usermaster.uid,usermaster.parent_id,usermaster.username,usermaster.mobile");
  $this->db->from('ledgerreport');
  $this->db->join('usermaster', 'usermaster.uid = ledgerreport.to_id');
    $this->db->where('DATE(date) =', $date);
	 $this->db->where('ledgerreport.by_id',$this->session->userdata('uid'));
//	 $this->db->where('DATE(date) >=', $date.' 00:00:00');
// $this->db->where('DATE(date) <=', $date.' 23:59:00');  
	 
	 
  $query = $this->db->get();
 //  echo $this->db->last_query();
  return $query->result();
  
	}
	if($this->session->userdata('type')=='retailer')
	{
		$this->db->select("ledgerreport.id,DATE(date) AS date_part,ledgerreport.type AS leg_typ,ledgerreport.comment,ledgerreport.transaction_status,ledgerreport.by_id,ledgerreport.amount,ledgerreport.transaction_status,usermaster.uid,usermaster.parent_id,usermaster.type   AS user_type,usermaster.username,usermaster.mobile");
  $this->db->from('ledgerreport');
  $this->db->join('usermaster', 'usermaster.uid = ledgerreport.by_id');
 //  $this->db->where('DATE(date) =', $date);
$this->db->where('by_id',$this->session->userdata('uid'));
// echo $this->db->last_query();
  $query = $this->db->get();
  return $query->result();
	}
 
}



function getOthertransfer($start_date,$end_date)
{

    $this->db->select("ledgerreport.id,DATE(date) AS date_part,ledgerreport.type AS leg_typ,ledgerreport.comment,ledgerreport.by_id,ledgerreport.amount,ledgerreport.transaction_status,usermaster.type,usermaster.uid,usermaster.parent_id,usermaster.username,usermaster.mobile");
  $this->db->from('ledgerreport');
  $this->db->join('usermaster', 'usermaster.uid = ledgerreport.by_id');
   $this->db->where('DATE(date) >=', $start_date);
 $this->db->where('DATE(date) <=', $end_date);
$this->db->where('ledgerreport.by_id !=', $this->session->userdata('uid'));
  $query = $this->db->get();
  return $query->result();
}


function getOthertransfercurrentdate($date)
{

    $this->db->select("ledgerreport.id,DATE(date) AS date_part,ledgerreport.type AS leg_typ,ledgerreport.comment,ledgerreport.by_id,ledgerreport.amount,usermaster.type,usermaster.uid,usermaster.parent_id,usermaster.username,usermaster.mobile");
  $this->db->from('ledgerreport');
  $this->db->join('usermaster', 'usermaster.uid = ledgerreport.by_id');
   $this->db->where('DATE(date) =', $date);
$this->db->where('ledgerreport.by_id !=', $this->session->userdata('uid'));
  $query = $this->db->get();
  return $query->result();
}

public function update_ledger_id($data,$id)
		{
			$this->db->where('id', $id);
			$query=$this->db->update('ledgerreport', $data);
			return true;
		}

/*function getOtherFranchisetransfer($start_date,$end_date)
{
	

    $this->db->select("ledgerreport.id,ledgerreport.date,ledgerreport.type AS leg_typ,ledgerreport.comment,ledgerreport.by_id,usermaster.type,usermaster.uid,usermaster.parent_id,usermaster.username,usermaster.mobile");
  $this->db->from('ledgerreport');
  $this->db->join('usermaster', 'usermaster.uid = ledgerreport.by_id');
   $this->db->where('ledgerreport.date >=', $start_date);
 $this->db->where('ledgerreport.date <=', $end_date);
$this->db->where('by_id',$this->session->userdata('uid'));
  $query = $this->db->get();
  return $query->result();
}*/
 
}
?>