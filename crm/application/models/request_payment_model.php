<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class request_payment_model extends CI_Model
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
		public function fillgrid()
			{
				$this->db->order_by("reversal_id", "desc"); 
			if($this->session->userdata('type')=="admin")
			{
				$data = $this->db->get('reversal_request');	
			}
			else
			{
				$this->db->select("reversal_request.request_type,reversal_request.distributor_name,
				reversal_request.distributor_number,
				reversal_request.transaction_amount ,reversal_request.transaction_date,reversal_request.transaction_number,
				reversal_request.requested_date,
				reversal_request.requester_id,reversal_request.reversal_id,usermaster.parent_id");
				$this->db->from('reversal_request');
				$this->db->join('usermaster','usermaster.uid = reversal_request.requester_id');
				$this->db->where('parent_id',$this->session->userdata('uid'));
				$data = $this->db->get();	
			}
				foreach ($data->result() as $row)
				{
					$view = base_url().'index.php/reversal/view/';
					echo "<tr>";
					if($row->request_type==1)
					{
					echo "<td>Top Up Reversal</td>";
					}
					else
					{
					echo "<td>Amount Reversal</td>";	
					}
					echo "<td>$row->distributor_name</td>
					<td>$row->distributor_number</td>
					<td>$row->transaction_amount</td>
					<td>$row->transaction_date</td>
					<td>$row->transaction_number</td>
					<td>$row->requested_date</td>
					<td>$row->requester_id</td>
					<td>
					<a href='$view' data-id='$row->reversal_id' class='btnview' title='view'>View</a>
					</td> 
					</tr>";	
				}
       			 exit;
			}
	 private function view()
	 {}			
	}
				

