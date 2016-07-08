<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class viewuser_model extends CI_Model {
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
}
function viewusers($del,$leave_id)
{  
    $this->db->select('*');
	$this->db->from('usermaster');
	$this->db->where('isdelete',$del);
	$this->db->where('uid != ', $leave_id);
	$this->db->where('parent_id', $leave_id);
	$query=$this->db->get();
	return  $query->result();  
}

  function update_status($parent_id,$flag,$value )
{  
   if ( $flag == 'ALL' )
   {	
   
   $condition = " parent_id = ".$parent_id;
	   
   }else
   {
		$condition = " uid = ".$parent_id;   
   }
      $sql = "update usermaster set isactive='$value' where  ".$condition;
      $qry= $this-> db-> query($sql);
	   if($qry)
     {
	    return true;
     }
     return false;
}
function listbalance($type_id)
{  

    $this->db->select('*');
    $this->db->from('usermaster');
	$this->db->where('type',$type_id);
    $query = $this->db->get();
	return $query->result();
}
function ret_total_sum( $parent_id )
{
	 $this->db->select("SUM( total_balance - used_balance )  AS total_recharge_money, SUM( `send_money_bal` - `sendmoney_used_bal` )  AS total_send_money ");
   $this->db->from('usermaster');
	if( $parent_id != '' ) {
		$this->db->where('parent_id',$parent_id);
	}
  $query = $this->db->get();
  return $query->result();
}
 
function listbalance_ret($parent_id )
{  

    $this->db->select('*');
    $this->db->from('usermaster');
	if( $parent_id != '' ) {
		$this->db->where('parent_id',$parent_id);
	}
	 
    $query = $this->db->get();
//	echo $this->db->last_query();
	return $query->result();
}

}
 