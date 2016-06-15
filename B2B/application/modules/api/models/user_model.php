		<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

		class user_model extends CI_Model {			 
  
		function deliver_response($status,$status_message,$data)
		{
			//header("HTTP/1.1 $status $status_message");
			$response['status']=$status;
			$response['status_message']=$status_message;
			$response['data']=$data;
			$json_response=json_encode($response);
			return $json_response;
		}			 
			 
		function login($username,$password)
		{
			$type="consumer";
			$this->db->where("username",$username);
			$this->db->where("password",$password);
			$this->db->where("type !=",$type);
			$query=$this->db->get("usermaster");
			if($query->num_rows()>0)
			{
			$row=$query->row();	
			$userdata = array(
			'uid'  => $row->uid,
			'parent_id'  => $row->parent_id,
			'name'  => $row->name,
			'username'  => $row->username,
			'type'  => $row->type,
			'lastlogin'  => $row->lastlogin,
			'secure_code'  => $row->secure_code,
			'status'  => $row->status,
			'mobile'  => $row->mobile,
			'used_balance'  => $row->used_balance,
			'total_balance'    => $row->total_balance,
			'img_name'    => $row->img_name,
			'password'    => $row->password,
			'store_id'    => $row->store_id,
			);
			
			return $userdata;
			}
			else
			{        
			return 0;
			}
		}

		 
	}	 

	