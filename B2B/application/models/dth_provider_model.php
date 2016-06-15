<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class DTH_provider_model extends CI_Model
  {
 /* public function __construct()
  {
   parent::__construct();
   $this->load->database();
  }*/
   function show_dth_details() /*Show postpaid details*/
  {
  $this->db->select('*');
  $this->db->from('dthprovider');
	$get_postpaid_det = $this->db->get();
  return $get_postpaid_det->result();
  
  }
  
  function updatedth_commission($dth_post_id,$dth_commssion) /*update commsion*/
  {
$this->db
    ->set('commission',$dth_commssion);
	$this->db ->where('id', $dth_post_id);
  $this->db ->update('dthprovider');
  
  }
  
  function updatedth_Dcommission($dth_post_id,$dth_d_commssion) /*update D-commsion*/
  {
$this->db
    ->set('dcommission',$dth_d_commssion);
	$this->db ->where('id', $dth_post_id);
  $this->db ->update('dthprovider');
  
  } 
  
  
   function updatedth_SFCommission($dth_post_id,$dth_sf_name) /*update SF-commsion*/
  {
$this->db
    ->set('sfcommission',$dth_sf_name);
	$this->db ->where('id', $dth_post_id);
  $this->db ->update('dthprovider');
  
  } 
  
  function updatedth_SDCommission($dth_post_id,$dth_sd_name) /*update SD-commsion*/
  {
$this->db
    ->set('sdcommission',$dth_sd_name);
	$this->db ->where('id', $dth_post_id);
  $this->db ->update('dthprovider');
  
  } 
  
  
  
  function updatedth_SCommission($dth_post_id,$dth_s_name) /*update S-commsion*/
  {
$this->db
    ->set('scommission',$dth_s_name);
	$this->db ->where('id', $dth_post_id);
  $this->db ->update('dthprovider');
  
  } 
  
   function updatedth_Status($dth_post_id,$dth_sts) /*update S-commsion*/
  {
$this->db
    ->set('status',$dth_sts);
	$this->db ->where('id', $dth_post_id);
  $this->db ->update('dthprovider');
  
  } 
   
  
  
 }
 ?>