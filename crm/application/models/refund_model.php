<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class refund_model extends CI_Model
	 {
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
		function login($username,$password)
		{
			$this->db->where("username",$username);
			$this->db->where("password",$password);
			$query=$this->db->get("usermaster");
			if($query->num_rows()>0)
			{
			$row=$query->row();
			$userdata = array(
			'uid'  => $row->uid,
			'username'  => $row->username,
			'type'  => $row->type,
			'password'    => $row->password,
			);
			$this->session->set_userdata($userdata);
			return true;
		}
			return false;
		}

 		function refund_admin()
		{
			$q = $this->db->get('recharge_details');
			
			if($q->num_rows() > 0) 
			{
			return $q->result();
			
			}
		}
		function refund_dist()
		{
			$this->db->select("recharge_details.trans_id,recharge_details.by,recharge_details.mobilenumber,
			recharge_details.amount ,recharge_details.serviceprovider,recharge_details.rdate,
			recharge_details.result,
			recharge_details.refunddate,recharge_details.rcur_bal,usermaster.parent_id");
			$this->db->from('recharge_details');
			$this->db->join('usermaster','usermaster.uid = recharge_details.by_id');
			$this->db->where('parent_id',$this->session->userdata('uid'));
			$query = $this->db->get();
			return $query->result();
			
		}
		function refund_super()
		{
			$this->db->select("recharge_details.trans_id,recharge_details.by,recharge_details.mobilenumber,
			recharge_details.amount ,recharge_details.serviceprovider,recharge_details.rdate,
			recharge_details.result,
			recharge_details.refunddate,recharge_details.rcur_bal,usermaster.parent_id");
			$this->db->from('recharge_details');
			$this->db->join('usermaster','usermaster.uid = recharge_details.by_id');
			$this->db->where('parent_id',$this->session->userdata('uid'));
			$query = $this->db->get();
			return $query->result();
		}	 	
	}
	
	
                    
                    
                    
                    
                    
                    
                    
                    
                    