<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class cardgeneration_model extends CI_Model
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

 		function card_admin()
		{
			$q = $this->db->get('icashcardregistraion');
			if($q->num_rows() > 0) 
			{
			 return $q->result();
			}
		}
		function card_dist()
		{
			$this->db->select("
				icashcardregistraion.id,
				icashcardregistraion.user_name,
				icashcardregistraion.last_name,
				icashcardregistraion.mobile_number ,
				icashcardregistraion.state,
				icashcardregistraion.city,		
				icashcardregistraion.pin_code,			
				icashcardregistraion.card_no,
				icashcardregistraion.created_by_name,
				icashcardregistraion.created_by,
				icashcardregistraion.expiry_date,
				icashcardregistraion.card_status,
                                usermaster.parent_id			
				");
				
				$this->db->from('icashcardregistraion');
				$this->db->join('usermaster','usermaster.uid = icashcardregistraion.created_by');
				$this->db->where('parent_id',$this->session->userdata('uid'));
			$query = $this->db->get();
			return $query->result();
		}


	 	function card_super()
		{
			$this->db->select("
icashcardregistraion.id,
icashcardregistraion.username,
icashcardregistraion.last_name,
			
icashcardregistraion.mobile ,
icashcardregistraion.state,
icashcardregistraion.city,
			
icashcardregistraion.pin_code,
			
icashcardregistraion.card_no,
icashcardregistraion.created_by_name,
icashcardregistraion.created_by,
icashcardregistraion.expiry_date,icashcardregistraion.card_status,usermaster.parent_id");
$this->db->from('icashcardregistraion');
$this->db->join('usermaster','usermaster.uid = icashcardregistraion.created_by');
$this->db->where('parent_id',$this->session->userdata('uid'));
			$query = $this->db->get();
			return $query->result();
		}
	}
	