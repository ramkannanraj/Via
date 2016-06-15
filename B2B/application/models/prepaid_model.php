<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class prepaid_model extends CI_Model
	 {
		public function __construct()
		{
		parent::__construct();
		$this->load->database();
		}
		function show_prepaid()//display provider details 
		{
		$this->db->select('*');
		$this->db->from('mobileprovider');
		$get_prepaid_det = $this->db->get();
		return $get_prepaid_det->result();
		}
		function update_comm($mobile_pre_id,$mobile_comm)//update FRC Commission
		{		
		$this->db->set('commission',$mobile_comm);
		$this->db ->where('id', $mobile_pre_id);
		$this->db ->update('mobileprovider');
		
		echo $this->db->last_query();
		exit();
		}
		function update_dcomm($mobile_pre_id,$mobile_dcomm)//update DIS Commission
		{		
		$this->db->set('dcommission',$mobile_dcomm);
		$this->db ->where('id', $mobile_pre_id);
		$this->db ->update('mobileprovider');
		}
		function update_sfcomm($mobile_pre_id,$mobile_sfcomm)//S-FRC Commission
		{		
		$this->db->set('sfcommission',$mobile_sfcomm);
		$this->db ->where('id', $mobile_pre_id);
		$this->db ->update('mobileprovider');
		}
		function update_sdcomm($mobile_pre_id,$mobile_sdcomm)//update DIS Commission
		{		
		$this->db->set('sdcommission',$mobile_sdcomm);
		$this->db ->where('id', $mobile_pre_id);
		$this->db ->update('mobileprovider');
		}
		function update_scomm($mobile_pre_id,$mobile_scomm)//update SUP Commission
		{		
		$this->db->set('scommission',$mobile_scomm);
		$this->db ->where('id', $mobile_pre_id);
		$this->db ->update('mobileprovider');
		}
		function update_sta($mobile_pre_id,$mobile_sta)//update status Commission
		{		
		$this->db->set('status',$mobile_sta);
		$this->db ->where('id', $mobile_pre_id);
		$this->db ->update('mobileprovider');
		}
		function update_provider($mobile_pre_id,$mobile_provider)//update provider Commission
		{		
		$this->db->set('provider',$mobile_provider);
		$this->db ->where('id', $mobile_pre_id);
		$this->db ->update('mobileprovider');
		}	
		
		function update_provider_tbl($column,$column_val,$id)//update provider Commission
		{		
		$this->db->set($column,$column_val);
		$this->db ->where('id', $id);
		$this->db ->update('mobileprovider');
		}	
		
		//
		
		
	}
		

	