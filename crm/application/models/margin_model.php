<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class margin_model extends CI_Model
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

 		function mymargin_mobile()
		{
			$q = $this->db->get('mobileprovider');
			if($q->num_rows() > 0) 
			{
			 return $q;
			}
		}
			function mymargin_postpaid_mob()
		{
			$q = $this->db->get('mobilepostpaidprovider');
			if($q->num_rows() > 0) 
			{
			 return $q;
			}
		}
	 	function mymargin_dtn()
		{
			$query = $this->db->get('dthprovider');
			if($query->num_rows() > 0) 
			{
			 return $query;
			}
		}
	}
	