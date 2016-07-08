<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home_model extends CI_Model {

 public function update_users($id,$fn,$ln,$age,$ht,$job,$limit,$mail, $executive_name )
   {
		 
			$data = array(			
				'name' => $fn,
				'companyname' => $ln,
				'mobile' => $age,
				'username' => $ht,
				'password' => $job,
				'adduser_limit' => $limit,
                                'email' => $mail,'executive_name' => $executive_name,
			);
			$this->db->where('uid', $id);
			$query=$this->db->update('usermaster', $data);
			return true;
   
   }
function checkColumn( $col , $val, $uid ){
	 
			
		$sql="SELECT * FROM usermaster  where usermaster.$col='$val' AND usermaster.uid <> $uid";
			 $qry= $this-> db-> query($sql);			 
			if($qry->num_rows()>0)
			{	
			   $querys = $qry->result();
			   return true; 
			} 
			else 
			{
				return false;
			}	
	
}
function active($sta_id,$up_sta)
{  
   
      $sql = "update usermaster set isactive='$up_sta' where uid='".$sta_id."'";
      $qry= $this-> db-> query($sql);
	    return true;
     
}


function inactive($sta_id,$up_sta)
{  
   
      $sql = "update usermaster set isactive='$up_sta' where uid='".$sta_id."'";
      $qry= $this-> db-> query($sql); 
	    return true;
     
}
 public function update_user_abalanz($tot,$ids)
   {
		 
			$data = array(			
				'available_balance' => $tot
			);
			$this->db->where('uid', $ids);
			$query=$this->db->update('usermaster', $data);
			return true;
   
   }
    public function update_user_balanz($tot,$ids)
   {
		 
			$data = array(			
				'total_balance' => $tot
			);
			$this->db->where('uid', $ids);
			$query=$this->db->update('usermaster', $data);
			return true;
   
   }
    public function update_session_abalz($id_sess,$current_user_balance)
   {
		
			$data = array(			
				'available_balance' =>$current_user_balance,
				
			);
			$this->db->where('uid', $id_sess);
			$query=$this->db->update('usermaster', $data);
			
			return true;
   
   }
   
   public function update_session_balz($id_sess,$current_user_balance)
   {
		
			$data = array(			
				'used_balance' =>$current_user_balance,
				
			);
			$this->db->where('uid', $id_sess);
			$query=$this->db->update('usermaster', $data);
			
			return true;
   
   }
   
   public function transferbyview($type,$amount,$total,$commentby,$ids,$sess_id,$date)
    {  
   
      $sql = "insert into ledgerreport 
	  (date,type,comment,amount,by_id,to_id)values('$date','$type','$commentby','$amount','$sess_id','$ids')";
      $qry= $this-> db-> query($sql);
	   if($qry)
     {
	    return true;
     }
     return false;
   }

    public function transfertoview($type,$amount,$total1,$commentto,$ids,$sess_id,$date,$testing,$mobile,$mobile1)
    {  
   
      $sql = "insert into ledgerreport 
	  (date,type,comment,amount,by_id,to_id)values('$date','$type','$commentto','$amount','$ids','$sess_id')";
      $qry= $this-> db-> query($sql);
	   if($qry)
     {
		 $url = "http://alerts.solutionsinfini.com//api/v3/index.php?method=sms&api_key=A96b7866cc3166b24d4c6397ef5d6d436&to=$mobile,$mobile1&sender=PAYBUK&message=$testing&format=json&custom=1,2";

					$url = str_replace(" ", "%20", $url);
					$ret = file($url);
					$sess = explode(":",$ret[0]);
					 if ($sess[0] == "OK") 
					 {
					$sess_id = trim($sess[1]); // remove any whitespace 
					
					 $ret = file($url);
					 $send = explode(":",$ret[0]);
					 if ($send[0] == "ID") 
					 {
					 echo "successnmessage ID: ". $send[1];
					 } 
					 else
					 {
					 echo "send message failed";
					 }
					 } 
					 else
					 {
					  $ret[0] ;
					 }


        /* echo "<script type='text/javascript'>alert('Fund transfer Successfully'); window.location.href = 'home';  </script>";  */
	    return true;
        }
     return false;
    }



//////////////////////////////////////////////////SEND MONEY TRANSFER starts//////////////////////////////////////////////////////////////////////


 public function sendmoney_update_user_balanz($tot,$ids)
   {
		 
			$data = array(			
				'send_money_bal' => $tot
			);
			$this->db->where('uid', $ids);
			$query=$this->db->update('usermaster', $data);
			return true;
   
   }
   
   public function sendmoney_update_session_balz($id_sess,$current_user_balance)
   {
		
			$data = array(			
				'sendmoney_used_bal' =>$current_user_balance,
				
			);
			$this->db->where('uid', $id_sess);
			$query=$this->db->update('usermaster', $data);
			
			return true;
   
   }
   
   public function sendmoney_transferbyview($type,$amount,$total,$commentby,$ids,$sess_id,$date)
    {  
   
      $sql = "insert into icash_ledgerreport 
	  (date,type,comment,credit,balance,by_id,to_id)values('$date','$type','$commentby','$amount','$total','$sess_id','$ids')";
      $qry= $this-> db-> query($sql);
	   if($qry)
     {
	    return true;
     }
     return false;
   }

    public function sendmoney_transfertoview($type,$amount,$total1,$commentto,$ids,$sess_id,$date,$testing,$mobile,$mobile1)
    {  
   
      $sql = "insert into icash_ledgerreport 
	  (date,type,comment,debit,balance,by_id,to_id)values('$date','$type','$commentto','$amount','$total1','$ids','$sess_id')";
      $qry= $this-> db-> query($sql);
	   if($qry)
     {
		 $url = "http://alerts.solutionsinfini.com//api/v3/index.php?method=sms&api_key=A96b7866cc3166b24d4c6397ef5d6d436&to=$mobile,$mobile1&sender=PAYBUK&message=$testing&format=json&custom=1,2";

					$url = str_replace(" ", "%20", $url);
					$ret = file($url);
					$sess = explode(":",$ret[0]);
					 if ($sess[0] == "OK") 
					 {
					$sess_id = trim($sess[1]); // remove any whitespace 
					
					 $ret = file($url);
					 $send = explode(":",$ret[0]);
					 if ($send[0] == "ID") 
					 {
					 echo "successnmessage ID: ". $send[1];
					 } 
					 else
					 {
					 echo "send message failed";
					 }
					 } 
					 else
					 {
					  $ret[0] ;
					 }


        /*echo "<script type='text/javascript'>alert('Fund transfer Successfully'); window.location.href = 'home';  </script>";*/
	    return true;
        }
     return false;
    }

//////////////////////////////////////////////////SEND MONEY TRANSFER ENDS//////////////////////////////////////////////////////////////////////



   public function update_lock_balanz($tot,$id)
   {
		 
			$data = array(			
				'locked_balance' => $tot
			);
			$this->db->where('uid', $id);
			$query=$this->db->update('usermaster', $data);
			return true;
   
   }

 public function update_lockbal_balz($id,$current_user_balance)
   {
		 
			$data = array(			
				'used_balance' => $current_user_balance
			);
			$this->db->where('uid', $id);
			$query=$this->db->update('usermaster', $data);
			return true;
   
   }


 public function rel_balanz($tot,$id)
   {
		 
			$data = array(			
				'locked_balance' => $tot
			);
			$this->db->where('uid', $id);
			$query=$this->db->update('usermaster', $data);
			return true;
   
   }
   
   
    public function relase_balz($id,$current_user_balance)
   {
		 
			$data = array(			
				'used_balance' => $current_user_balance
			);
			$this->db->where('uid', $id);
			$query=$this->db->update('usermaster', $data);
			return true;
   
   }

  function deltuser($del_id,$up_del)
   {  
   
      $sql = "update usermaster set isdelete='$up_del' where uid='".$del_id."'";
      $qry= $this-> db-> query($sql);
	   if($qry)
     {
	    return true;
     }
     return false;
   }
   
   }