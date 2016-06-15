<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class locked_limit_report_model extends CI_Model 
{
 
/*GET ADMIN TRANSFER DETAILS*/
 function getDistributorAmount()
{
	//,recharge_details.amount,recharge_details.trans_id,recharge_details.by_id,recharge_details.by,recharge_details.cur_bal,recharge_details.mobilenumber
/*$this->db->select("*,usermaster.type,usermaster.uid,usermaster.parent_id,usermaster.username,usermaster.companyname,usermaster.total_balance,usermaster.locked_balance,usermaster.used_balance");
$this->db->from('mp_distributor_amounts');
$this->db->join('usermaster', 'usermaster.uid = mp_distributor_amounts.distributor_id');
//$this->db->join('recharge_details', 'recharge_details.by_id = usermaster.uid');
$query = $this->db->get();
return $query->result();*/


 //$this->db->select('mp_distributor_amounts.distributor_id,mp_distributor_amounts.distributor_amount as dis_amt,mp_distributor_amounts.distributor_amount_date,usermaster.uid,usermaster.parent_id,usermaster.companyname,usermaster.locked_balance,recharge_details.amount as recharge_amt,recharge_details.by_id');
 
 $this->db->select('mp_distributor_amounts.distributor_id as dis_id,mp_distributor_amounts.distributor_amount as dis_amt,mp_distributor_amounts.distributor_amount_date,usermaster.uid,usermaster.parent_id,usermaster.companyname,usermaster.locked_balance,recharge_details.amount as recharge_amt,recharge_details.by_id');
            $this->db->from('mp_distributor_amounts'); 
			$this->db->join('recharge_details', 'mp_distributor_amounts.distributor_id=recharge_details.by_id AND recharge_details.result !="Failure"', 'left');
            $this->db->join('usermaster', 'usermaster.uid=mp_distributor_amounts.distributor_id','left');
			$query = $this->db->get();
			return $query->result();
 
}

}
?>
