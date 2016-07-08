<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class recharge_model extends CI_Model {
	
		public function get_Prepaid()
		{
			$this->db->select('*');
			$this->db->from('mobileprovider');
			$this->db->where('status', 'Enable');
			$query = $this->db->get();
			return  $query->result(); 
		}
		public function get_dthprovider()
		{
			$this->db->select('*');
			$this->db->from('dthprovider');
			$this->db->where('status', 'Enable');
			$query = $this->db->get();
			return  $query->result(); 
		}
		public function get_electricityprovider()
		{
			$this->db->select('*');
			$this->db->from('electricityprovider');
			$this->db->where('status', 'Enable');
			$query = $this->db->get();
			return  $query->result(); 
		}
		public function get_gasprovider()
		{
			$this->db->select('*');
			$this->db->from('gasprovider');
			$this->db->where('status', 'Enable');
			$query = $this->db->get();
			return  $query->result(); 
		}
		public function get_landlineprovider()
		{
			$this->db->select('*');
			$this->db->from('landlineprovider');
			$this->db->where('status', 'Enable');
			$query = $this->db->get();
			return  $query->result(); 
		}
		public function get_postpaid()
		{
			$this->db->select('*');
			$this->db->from('mobilepostpaidprovider');
			$this->db->where('status', 'Enable');
			$query = $this->db->get();
			return  $query->result(); 
		}
		public function get_details()
		{
			$id=$this->session->userdata('uid');
			$this->db->select('*');
			$this->db->from('usermaster');
			$this->db->where('uid',$id);
			$query = $this->db->get();
			return  $query->result(); 
		
		}
		
		public function get_parent_total_detail($loginuser_parent_id)
		{
			$this->db->select('total_balance,parent_id');
			$this->db->from('usermaster');
			$this->db->where('uid',$loginuser_parent_id);
			$query = $this->db->get();
			return  $query->result(); 
		
		}

public function get_distributor_parent_total_detail($distributor_parent_id)
		{
			$this->db->select('total_balance');
			$this->db->from('usermaster');
			$this->db->where('uid',$distributor_parent_id);
			$query = $this->db->get();
			return  $query->result(); 
		
		}
		
		
		public function insert_recharge_details($dataValues)
		{
			$this->db->insert('recharge_details',$dataValues);
			return $this->db->insert_id();
		}
		public function update_balance($data)
		{
			$id=$this->session->userdata('uid');
			$this->db->where('uid', $id);
			$query=$this->db->update('usermaster', $data);
			return true;
		}
		
		public function update_recharge_trans_id($data,$insert)
		{
			$this->db->where('id', $insert);
			$query=$this->db->update('recharge_details', $data);
			return true;
		}
		
		public function update_recharge_error_status($error_datas,$insert)
		{
			$this->db->where('id', $insert);
			$query=$this->db->update('recharge_details', $error_datas);
			return true;
		}
		
		
		public function update_recharge_retailer_commssion($current_total_balance,$insert)
		{
			$this->db->where('uid', $insert);
			$query=$this->db->update('usermaster', array('total_balance' => $current_total_balance));
			return true;
		}
	
	
		public function update_distributor_commission($current_total_balance_distributor,$loginuser_parent_id)
		{
			$this->db->where('uid', $loginuser_parent_id);
			$query=$this->db->update('usermaster', array('total_balance' => $current_total_balance_distributor));
			return true;
		}
	

	public function update_super_commission($current_total_balance_super,$distributor_parent_id)
		{
			$this->db->where('uid', $distributor_parent_id);
			$query=$this->db->update('usermaster', array('total_balance' => $current_total_balance_super));
			return true;
		}
	
		public function get_all_details($serviceprovider)
		{
			$query = $this->db->get_where('mobileprovider', array('ezypay_prcode' => $serviceprovider));		
			if($query)
			{
				return $query->result();
			}
			else
			{
			return false;
			}
		}
		
		public function get_all_dth_details($serviceprovider)
		{
			$query = $this->db->get_where('dthprovider', array('ezypay_prcode' => $serviceprovider));		
			if($query)
			{
				return $query->result();
			}
			else
			{
			return false;
			}
		}
		
		public function get_all_post_paid_details($serviceprovider)
		{
			$query = $this->db->get_where('mobilepostpaidprovider', array('ezypay_prcode' => $serviceprovider));		
			if($query)
			{
				return $query->result();
			}
			else
			{
			return false;
			}
		}
	}
