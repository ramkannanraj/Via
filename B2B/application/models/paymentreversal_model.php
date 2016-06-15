<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class paymentreversal_model extends CI_Model {
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
        }
		
	
function parentrequest($type)
{  

    $this->db->select('*');
    $this->db->from('usermaster');
	$this->db->where('type',$type);
    $query = $this->db->get();

    if ($query->num_rows() > 0)
    {
     return $query; 
    }
}
function reversaltopregister($paymenttopregister_data)
{
	$this->db->insert('reversal_request',$paymenttopregister_data);
	$qry= $this->db->insert_id();
	if($qry)
{
	echo "<script language=\"javascript\">alert('Your topup reversal request send successfully');window.location.href = 'reversalpayment';</script>";
	return true;
}
return false;
	
}

function reversalamtregister($paymentamtregister_data)
{
	$this->db->insert('reversal_request',$paymentamtregister_data);
	$qry= $this->db->insert_id();
	if($qry)
{
	echo "<script language=\"javascript\">alert('Your amount reversal request send successfully');window.location.href = 'reversalpayment';</script>";
	return true;
}
return false;
	
}
public function fillgrid(){
	$leave_id=$this->session->userdata('uid');
	$del="0";
	$sql="SELECT * FROM usermaster INNER JOIN reversal_request ON 
	usermaster.uid=reversal_request.requester_id where reversal_request.request_status='$del' ";
   $data= $this-> db-> query($sql);
		
        foreach ($data->result() as $row){
			$transfer = base_url().'paymentreversal/reversaltransfer/';
			$date=date ("d-M-Y ",strtotime($row->transaction_date));
            echo "<tr>         
                        <td>$row->distributor_name</td>
                        <td>$row->smartcard_number</td>
                        <td>$row->transaction_amount</td>
                        <td>$date</td>
						<td>$row->transaction_number</td>
						
                        ";

					echo"                       						
						<td><a href='$transfer' data-id='$row->reversal_id' class='btntransfer' title='transfer'>"; ?>
						<img src='<?php echo base_url(); ?>img/reverse fund.png' height="20" width="20" title='Transfer'>
						<?php echo "</a>
						&nbsp;&nbsp;&nbsp;&nbsp;						
						 </td> 						
                    </tr>";
            
        }
        exit;
    }
	
	function idds($sessid)
   {  
   
     $qry="select * from usermaster where uid='$sessid'";
	 $data =  $this-> db-> query($qry);
	   if($data)
     {
	    return $data;
     }
     return false;
   }
   
   function transfer($id,$del)
   {  
   
      $sql="SELECT * FROM usermaster LEFT JOIN reversal_request ON usermaster.uid=reversal_request.requester_id where reversal_request.reversal_id='$id' && request_status='$del' ";
      $data=  $this-> db-> query($sql);
	   if($data)
     {
	    return $data;
     }
     return false;
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
   
      $sql = "update reversal_request set request_status='$del' where reversal_id='".$ids."'";
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
	  (date,type,comment,debit,balance,by_id,to_id)values('$date','$type','$commentby','$amount','$total','$sess_id','$user_id')";
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
	  (date,type,comment,credit,balance,by_id,to_id)values('$date','$type','$commentto','$amount','$total1','$user_id','$sess_id')";
      $qry= $this-> db-> query($sql);
	   if($qry)
     {
		// $testing="BALANCE TRANSFER $sname transferred Rs .$amount/- for Member Id: $user_type($uname) On $date";
		 $testing= "BALANCE TRANSFER transferred Rs $amount./- for Member Id:  $user_type($uname) On $date";
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
	
	echo "<script type='text/javascript'>alert('Reversal amount Transfer Successfully'); window.location.href = 'viewreversalpaymentdetail';  </script>";

	    return true;
     }
     return false;
}
		
	}