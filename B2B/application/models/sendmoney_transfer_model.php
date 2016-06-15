<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Sendmoney_transfer_model extends CI_Model {
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
        }
		
	
function parentrequest($sessp_id)
{  

    $this->db->select('*');
    $this->db->from('usermaster');
	$this->db->where('uid',$sessp_id);
    $query = $this->db->get();

    if ($query->num_rows() > 0)
    {
     return $query; 
    }
}


	
function payregister($paymentregister_data)
{
	$this->db->insert('icash_payment_request',$paymentregister_data);
	$qry= $this->db->insert_id();
	if($qry)
{
	echo "<script language=\"javascript\">alert('Register successfully');window.location.href = 'requestpayment';</script>";
	return true;
}
return false;
	
}

function viewrequest($del)
{  

    $this->db->select('*');
    $this->db->from('icash_payment_request');
	$this->db->where('isdelete1',$del);
    $query = $this->db->get();

    if ($query->num_rows() > 0)
    {
     return $query; 
    }
}



public function fillgrid(){
	$leave_id=$this->session->userdata('uid');
	$del="no";
	$sql="SELECT * FROM usermaster INNER JOIN icash_payment_request ON 
	usermaster.uid=icash_payment_request.user_id where usermaster.parent_id='$leave_id'&& icash_payment_request.isdelete1='$del' ";
   $data= $this-> db-> query($sql);
  
   
		
        foreach ($data->result() as $row){
			$transfer = base_url().'payment/transfer/';
                        $date=date ("d-M-Y ",strtotime($row->transfer_date));
            echo "<tr>         
                        <td>$row->name</td>
                        <td>$row->payment_mode</td>
                        <td>$row->amount</td>
                        <td>$date</td>
						<td>$row->bank</td>
                        <td>$row->branch</td>
                        ";

					echo"                       						
						<td><a href='$transfer' data-id='$row->id/$row->parent_id' class='btntransfer' title='transfer'>"; ?>
						<img src='<?php echo base_url(); ?>img/fund transfer.png' height="20" width="20" title='Transfer'>
						<?php echo "</a>
						&nbsp;&nbsp;&nbsp;&nbsp;						
						 </td> 						
                    </tr>";
            
        }
        exit;
    }
	
	
	

 /*?>function reversaltopregister($type,$operator,$distributor_code,$distributor_name,$distributor_email,$distributor_number,$smartcard_number,$smartcard_vc_no,$transaction_amount,$transaction_date,$transaction_number,$request_id)
{
	$sql = "insert into reversal_request (operator,requester_id,distributor_name,distributor_email,distributor_number,smartcard_number,smartcard_vc_no,transaction_amount,transaction_date,transaction_number,requested_date,request_type)values('$operator','$request_id','$distributor_name','$distributor_email','$distributor_number','$smartcard_number','$smartcard_vc_no','$transaction_amount','now()','$transaction_number',now(),'$type')";
   $qry= $this-> db-> query($sql);
	if($qry)
{
	return true;
}
return false;
	
}<?php */

function reversaltopregister($type,$operator,$distributor_code,$distributor_name,$distributor_email,$distributor_number,$smartcard_number,$smartcard_vc_no,$transaction_amount,$transaction_date,$transaction_number,$request_id)
{
	$sql = "insert into reversal_request (operator,requester_id,distributor_name,distributor_email,distributor_number,smartcard_number,smartcard_vc_no,transaction_amount,transaction_date,transaction_number,requested_date,request_type)values('$operator','$request_id','$distributor_name','$distributor_email','$distributor_number','$smartcard_number','$smartcard_vc_no','$transaction_amount','$transaction_date','$transaction_number',now(),'$type')";
   $qry= $this-> db-> query($sql);
	if($qry)
{
	return true;
}
return false;
	
}

function reversalamtregister($type,$amount_distributor_code,$amount_distributor_name,$amount_distributor_email,$amount_distributor_number,$amount_transaction_amount,$amount_reversal_remarks,$request_id,$amount_transaction_date)
{
	$sql = "insert into reversal_request (requester_id,distributor_name,distributor_email,distributor_number,transaction_amount,transaction_date,requested_date,transaction_remarks,request_type)values('$request_id','$amount_distributor_name','$amount_distributor_email','$amount_distributor_number','$amount_transaction_amount','$amount_transaction_date',now(),'$amount_reversal_remarks','$type')";
   $qry= $this-> db-> query($sql);
	if($qry)
{
	return true;
}
return false;
	
}

 public function idds($sessid)
		{
		    $qry="select * from usermaster where uid='$sessid'";
			$data=  $this-> db-> query($qry);
			if($data)
         {
	        return $data;
         }
          return false;
		}
		
		 public function transfer($id,$del)
		{
		    $sql="SELECT * FROM usermaster LEFT JOIN icash_payment_request ON usermaster.uid=icash_payment_request.user_id where icash_payment_request.id='$id' && isdelete1='$del' ";
            $data =  $this-> db-> query($sql);
			if($data)
         {
	        return $data;
         }
          return false;
		}

      public function insert_sms_details($sms_data)
		{
			$this->db->insert('smsoutgoing',$sms_data);
			return $this->db->insert_id();
		}
		
	 function update_sess_usedblce($sess_id,$add_usedbal)
     {  
   
      $sql = "update usermaster set used_balance='$add_usedbal' where uid='".$sess_id."'";
      $qry= $this-> db-> query($sql);
	   if($qry)
     {
	    return true;
     }
     return false;
    }

    function update_user_totblce($user_id,$add_totbal)
    {  
   
      $sql = "update usermaster set total_balance='$add_totbal' where uid='".$user_id."'";
      $qry= $this-> db-> query($sql);
	   if($qry)
     {
	    return true;
     }
     return false;
    }

    function update_isdel($ids,$del)
    {  
   
      $sql = "update icash_payment_request set isdelete1='$del' where id='".$ids."'";
      $qry= $this-> db-> query($sql);
	   if($qry)
     {
	    return true;
     }
     return false;
    }


     function transferby($type,$amount,$total,$commentby,$user_id,$sess_id,$date)
    {  
   
      $sql = "insert into ledgerreport 
	  (date,type,comment,credit,balance,by_id,to_id)values('$date','$type','$commentby','$amount','$total','$sess_id','$user_id')";
      $qry= $this-> db-> query($sql);
	   if($qry)
     {
	    return true;
     }
     return false;
   }

    function transferto($type,$amount,$total1,$commentto,$user_id,$sess_id,$date,$sess_name,$user_name,$mobile,$mobile1,$sess_type,$user_type,$sname,$uname)
    {  
   
      $sql = "insert into ledgerreport 
	  (date,type,comment,debit,balance,by_id,to_id)values('$date','$type','$commentto','$amount','$total1','$user_id','$sess_id')";
      $qry= $this-> db-> query($sql);
	   if($qry)
     {
	     if($sess_type=='admin')
         {
        $testing="BALANCE TRANSFER $sess_name transferred Rs .$amount/- for Member Id: $user_type($uname) On $date";
         }else{
        $testing="BALANCE TRANSFER $sess_type($sname) transferred Rs .$amount/- for Member Id: $user_type($uname) On $date";
         }
	     $url = "http://alerts.solutionsinfini.com//api/v3/index.php?method=sms&api_key=A96b7866cc3166b24d4c6397ef5d6d436&to=$mobile,$mobile1&sender=IRUPAY&message=$testing&format=json&custom=1,2";
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
					 echo "<script type='text/javascript'>alert('Request Payment Transfer Successfully'); window.location.href = 'viewrequestpaymentdetail';  </script>";
     }
     return false;
    }

function getTransferDetail($start_date,$end_date,$by_id,$to_id) 
{
	if($this->session->userdata('type')=='admin' || $this->session->userdata('type')=='distributor' )
	{ 
$this->db->select("icash_ledgerreport.id,DATE(date) AS date_part,icash_ledgerreport.balance,icash_ledgerreport.comment,icash_ledgerreport.transaction_status,icash_ledgerreport.type AS leg_typ,icash_ledgerreport.by_id,icash_ledgerreport.debit as amount,icash_ledgerreport.credit,usermaster.type   AS user_type,usermaster.uid,usermaster.parent_id,usermaster.username,usermaster.mobile");
  $this->db->from('icash_ledgerreport');
  $this->db->join('usermaster', 'usermaster.uid = icash_ledgerreport.to_id');
  
   $this->db->where('DATE(date) >=', $start_date);
 $this->db->where('DATE(date) <=', $end_date);
 
 if(  $by_id !=''  )
	{
		$this->db->where('icash_ledgerreport.by_id',$by_id);	
	
	}else{
	 $this->db->where('icash_ledgerreport.by_id',$this->session->userdata('uid'));	
	}
  $query = $this->db->get();
   
  return $query->result();
	}
	if($this->session->userdata('type')=='retailer')
	{
		$this->db->select("icash_ledgerreport.id,DATE(date) AS date_part,icash_ledgerreport.type AS leg_typ,icash_ledgerreport.comment,icash_ledgerreport.transaction_status,icash_ledgerreport.balance,icash_ledgerreport.credit,icash_ledgerreport.by_id,icash_ledgerreport.debit as amount,usermaster.type   AS user_type,usermaster.uid,usermaster.parent_id,usermaster.username,usermaster.mobile");
  $this->db->from('icash_ledgerreport');
  $this->db->join('usermaster', 'usermaster.uid = icash_ledgerreport.by_id');
   $this->db->where('DATE(date) >=', $start_date);
 $this->db->where('DATE(date) <=', $end_date);
$this->db->where('by_id',$this->session->userdata('uid'));
  $query = $this->db->get();
  return $query->result();
	}
 
}

function getTransferDetailcurrentdate($date)
{
	
	if($this->session->userdata('type')=='admin' || $this->session->userdata('type')=='distributor'  )
	{ 
$this->db->select("icash_ledgerreport.id,DATE(date) AS date_part,icash_ledgerreport.comment,icash_ledgerreport.type AS leg_typ,icash_ledgerreport.by_id,usermaster.type   AS user_type,icash_ledgerreport.balance,icash_ledgerreport.credit,icash_ledgerreport.debit as amount,icash_ledgerreport.transaction_status,usermaster.uid,usermaster.parent_id,usermaster.username,usermaster.mobile");
  $this->db->from('icash_ledgerreport');
  $this->db->join('usermaster', 'usermaster.uid = icash_ledgerreport.to_id');
    $this->db->where('DATE(date) =', $date);
	 $this->db->where('icash_ledgerreport.by_id',$this->session->userdata('uid'));
//	 $this->db->where('DATE(date) >=', $date.' 00:00:00');
// $this->db->where('DATE(date) <=', $date.' 23:59:00');  
	 
	 
  $query = $this->db->get();
 //  echo $this->db->last_query();
  return $query->result();
  
	}
	if($this->session->userdata('type')=='retailer')
	{
		$this->db->select("icash_ledgerreport.id,DATE(date) AS date_part,icash_ledgerreport.type AS leg_typ,icash_ledgerreport.comment,icash_ledgerreport.balance,icash_ledgerreport.transaction_status,icash_ledgerreport.by_id,icash_ledgerreport.credit,icash_ledgerreport.debit as amount,icash_ledgerreport.transaction_status,usermaster.uid,usermaster.parent_id,usermaster.type   AS user_type,usermaster.username,usermaster.mobile");
  $this->db->from('icash_ledgerreport');
  $this->db->join('usermaster', 'usermaster.uid = icash_ledgerreport.by_id');
 //  $this->db->where('DATE(date) =', $date);
$this->db->where('by_id',$this->session->userdata('uid'));
// echo $this->db->last_query();
  $query = $this->db->get();
  return $query->result();
	}
 
}


		
	}