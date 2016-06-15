<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class icash_report_model extends CI_Model
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

 		function icash_admin()
		{
			$q = $this->db->get('icashcardregistraion');
			if($q->num_rows() > 0) 
			{
			 return $q->result();
			}
		}
		function icash_dist()
		{
		
			$this->db->select("icashcardregistraion.user_name,icashcardregistraion.mail_id,icashcardregistraion.card_no,
			icashcardregistraion.topup_amount ,icashcardregistraion.expiry_date,
                         usermaster.parent_id");
			
			$this->db->from('icashcardregistraion');
			$this->db->join('usermaster','usermaster.uid = icashcardregistraion.created_by');
		         $this->db->where('parent_id',$this->session->userdata('uid'));
			$query = $this->db->get();
			return $query->result();
		}
	 	function icash_super()
		{
			
			$this->db->select("icashcardregistraion.user_name,icashcardregistraion.mail_id,icashcardregistraion.card_no,
			icashcardregistraion.topup_amount ,icashcardregistraion.expiry_date,usermaster.parent_id");
			
			$this->db->from('icashcardregistraion');
			$this->db->join('usermaster','usermaster.uid = icashcardregistraion.created_by');
			$this->db->where('parent_id',$this->session->userdata('uid'));
			$query = $this->db->get();
			return $query->result();
		}
			function icash_fran()
		{
			
			$this->db->select("icashcardregistraion.user_name,icashcardregistraion.mail_id,icashcardregistraion.card_no,
			icashcardregistraion.topup_amount ,icashcardregistraion.expiry_date,usermaster.parent_id");
		
			$this->db->from('icashcardregistraion');
			$this->db->join('usermaster','usermaster.uid = icashcardregistraion.created_by');
			$this->db->where('uid',$this->session->userdata('uid'));
			$query = $this->db->get();
			return $query->result();
		}
		
		function icash_sales(){
			
		return $this->db->select('*')->join('usermaster','usermaster.uid = icash_sales_mgmt.retailer_id')->get('icash_sales_mgmt')->result();
		
			
		}
	}
	