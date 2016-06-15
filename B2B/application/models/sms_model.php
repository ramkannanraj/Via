<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class sms_model extends CI_Model 
{
 
 function getIncomingDetail()
{
	if($this->session->userdata('type')=='admin' || $this->session->userdata('type')=='super')
	{
$this->db->select("*");
$this->db->from('longcodedetails');
$query = $this->db->get();
  return $query->result();
	}
	if($this->session->userdata('type')=='distributor')
	{
		 $this->db->select("longcodedetails.id,longcodedetails.date,longcodedetails.agentmobile,longcodedetails.message,longcodedetails.mode ,usermaster.type,usermaster.uid,usermaster.parent_id,usermaster.username,usermaster.mobile");
  $this->db->from('longcodedetails');
  $this->db->join('usermaster','usermaster.mobile = longcodedetails.agentmobile');
  $this->db->where('parent_id',$this->session->userdata('uid'));
  $query = $this->db->get();
  return $query->result();
	}
 
}


function getOutgoingDetail($start_date,$end_date)
{
	if($this->session->userdata('type')=='admin')
	{
    $this->db->select("*");
$this->db->from('smsoutgoing');
$this->db->join('usermaster','usermaster.mobile= smsoutgoing.agentmob');
 $this->db->where('date >=', $start_date);
$this->db->where("DATE_FORMAT(date,'%Y-%m-%d') <=","$end_date");
$query = $this->db->get();
  return $query->result();
	}
	if($this->session->userdata('type')=='distributor' || $this->session->userdata('type')=='super')
	{
	$this->db->select("smsoutgoing.id,smsoutgoing.date,smsoutgoing.agentmob,smsoutgoing.msg ,usermaster.type,usermaster.uid,usermaster.parent_id,usermaster.username,usermaster.mobile");
  $this->db->from('smsoutgoing');
  $this->db->join('usermaster','usermaster.uid = smsoutgoing.by_uid');
  $ses=$this->session->userdata('uid');
  $this->db->where('smsoutgoing.date >=', $start_date);
$this->db->where("DATE_FORMAT(smsoutgoing.date,'%Y-%m-%d') <=","$end_date");
  $this->db->where("(parent_id = '" . $ses . "' OR uid = '" . $ses . "') ");
  $query = $this->db->get();
  return $query->result();
	}
}


/*function getOutgoingDetailDistributors()
{

   $this->db->select("smsoutgoing.id,smsoutgoing.date,smsoutgoing.agentmob,smsoutgoing.msg ,usermaster.type,usermaster.uid,usermaster.parent_id,usermaster.username,usermaster.mobile");
  $this->db->from('smsoutgoing');
  $this->db->join('usermaster','usermaster.mobile = smsoutgoing.agentmob');
  $this->db->where('parent_id',$this->session->userdata('uid'));
  $query = $this->db->get();
  return $query->result();
 
}


function getIncomingDetailDistributors()
{

   $this->db->select("longcodedetails.id,longcodedetails.date,longcodedetails.agentmobile,longcodedetails.message,longcodedetails.mode ,usermaster.type,usermaster.uid,usermaster.parent_id,usermaster.username,usermaster.mobile");
  $this->db->from('longcodedetails');
  $this->db->join('usermaster','usermaster.mobile = longcodedetails.agentmobile');
  $this->db->where('parent_id',$this->session->userdata('uid'));
  $query = $this->db->get();
  return $query->result();
 
}*/



 
}
?>