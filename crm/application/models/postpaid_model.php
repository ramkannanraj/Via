<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class postpaid_model extends CI_Model
  {
 /* public function __construct()
  {
   parent::__construct();
   $this->load->database();
  }*/
   function show_postpaid_details() /*Show postpaid details*/
  {
  $this->db->select('*');
  $this->db->from('mobilepostpaidprovider');
	$get_postpaid_det = $this->db->get();
  return $get_postpaid_det->result();
  
  }
  
  function updatecommission($mobile_post_id,$mobile_commssion) /*update commsion*/
  {
$this->db
    ->set('commission',$mobile_commssion);
	$this->db ->where('id', $mobile_post_id);
  $this->db ->update('mobilepostpaidprovider');
  
  }
  
  function updateDcommission($mobile_post_id,$mobile_d_commssion) /*update D-commsion*/
  {
$this->db
    ->set('dcommission',$mobile_d_commssion);
	$this->db ->where('id', $mobile_post_id);
  $this->db ->update('mobilepostpaidprovider');
  
  } 
  
  
   function updateSFCommission($mobile_post_id,$mobile_sf_name) /*update SF-commsion*/
  {
$this->db
    ->set('sfcommission',$mobile_sf_name);
	$this->db ->where('id', $mobile_post_id);
  $this->db ->update('mobilepostpaidprovider');
  
  } 
  
  function updateSDCommission($mobile_post_id,$mobile_sd_name) /*update SD-commsion*/
  {
$this->db
    ->set('sdcommission',$mobile_sd_name);
	$this->db ->where('id', $mobile_post_id);
  $this->db ->update('mobilepostpaidprovider');
  
  } 
  
  
  
  function updateSCommission($mobile_post_id,$mobile_s_name) /*update S-commsion*/
  {
$this->db
    ->set('scommission',$mobile_s_name);
	$this->db ->where('id', $mobile_post_id);
  $this->db ->update('mobilepostpaidprovider');
  
  } 
  
   function updateStatus($mobile_post_id,$mobile_sts) /*update S-commsion*/
  {
$this->db
    ->set('status',$mobile_sts);
	$this->db ->where('id', $mobile_post_id);
  $this->db ->update('mobilepostpaidprovider');
  
  } 
   
  
  
 }
 ?>