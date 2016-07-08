<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class report_model extends CI_Model {
    
		function recharge_history()
		{  
		//	$this->db->select("*");
			
		//	$this->db->from('recharge_details');
			$condition = "";
			 if($this->session->userdata('type')=='retailer' || $this->session->userdata('type')=='distributor'  ){
				
				 // $this->db->join('usermaster','usermaster.uid = icashcardregistraion.created_by');
			//	 $this->db->where('by_id',$this->seassion->userdata('uid'));
				
				$condition = ' where  recharge_details.by_id = '.$this->session->userdata('uid') . '  ' ;
				 
			 }//else if($this->session->userdata('type')=='retailer'){
				 
			/*	$sql="SELECT * FROM recharge_details join usermaster on 
				usermaster.uid=recharge_details.by_id where recharge_details.by_id='$ses_id' order by  recharge_details.rdate desc ";
			 $join = " usermaster on 
				usermaster.uid=recharge_details.by_id ";
				
			      $this->db->join('usermaster','usermaster.uid=recharge_details.by_id');
				 $this->db->where('parent_id',$this->session->userdata('uid'));
				 */
				//  $this->db->where('by_id',$this->session->userdata('uid'));
			//}  
			/*
			
			*/
		  //  $this->db->order_by("id","DESC");
			
			
			
	/*		$sql="SELECT * FROM recharge_details where  ( rdate >= curdate() - INTERVAL DAYOFWEEK( curdate())+6 DAY
AND rdate < curdate() - INTERVAL DAYOFWEEK( curdate() )-1 DAY )  ".$condition." order by  recharge_details.id desc "; 
*/
	 $sql="SELECT *  FROM recharge_details JOIN usermaster ON usermaster.uid = recharge_details.by_id ".$condition."  order by  recharge_details.id desc LIMIT 1000 ";
			 
			
			$query = $this-> db-> query($sql);  	
		 	// echo $this->db->last_query();
			if($query->num_rows() > 0) 
			{
			 return $query->result();
			}
		}
	
    public function fillgrid(){
		$ses_id=$this->session->userdata('uid');
		
	if($this->session->userdata('type')=='admin')
	{
    $sql="SELECT * FROM recharge_details order by  recharge_details.rdate desc";
    $data = $this-> db-> query($sql);  
	
	}else if($this->session->userdata('type')=='retailer'){
		$sql="SELECT * FROM recharge_details join usermaster on 
		usermaster.uid=recharge_details.by_id where recharge_details.by_id='$ses_id' order by  recharge_details.rdate desc ";
		$data = $this-> db-> query($sql);
		
	}else if($this->session->userdata('type')=='distributor'){
		$sql="SELECT * FROM recharge_details join usermaster on 
		usermaster.uid=recharge_details.by_id where usermaster.parent_id='$ses_id' order by  recharge_details.rdate desc ";
		$data = $this-> db-> query($sql);
	
	}
	$i=0;
	 foreach ($data->result() as $row){
		$mon= $row->amount;
		
		 $ticket = base_url().'report/ticket/';
            $process = base_url().'report/process/';
			$solve = base_url().'report/solve/';
			//$edit_fund = base_url().'home/fund/';
            //$delete = base_url().'home/delete/';
			//$lock_funds = base_url().'home/lock_fund/';
			//$rel_funds = base_url().'home/release_fund/';
			
			$date_in =date ("d-M-Y H:s:i ",strtotime($row->rdate));
			$date= $this->local_date( $date_in );
			$sno= ++$i;
			$error_status =(int)$row->error_status_code;
			
			if( $error_status==1)
			{
				$con='Success';
			}else if($error_status==0)
			{
				$con='Failure';
			}
			else if($error_status==2)
			{
				$con='Pending';
			}
			if($this->session->userdata('type') == 'retailer'){
				$commission = "<td>$row->commission</td>";				
			}else 
			 {
				$commission = "<td>$row->dcommission</td><td>$row->commission</td>";	
			}
					 
            echo "<tr>     
			
                        <td>$sno</td>
                        <td>$row->mobilenumber</td>
						<td>$date</td>
                        <td>$row->amount</td>
                        <td>$row->service</td>
						<td>$row->after_balance</td>  
                        <td>$row->before_balance</td> ".  $commission."	
						<td>$row->trans_id</td>					
					    <td>$con</td> ";




					/*if($this->session->userdata('type')=='franchise'){
                   if($row->error_status_code=='0') {
					echo "<td>-</td>"; }else if($row->error_status_code=='1') {
					echo "<td>-</td>";} else if($row->error_status_code=='2') {
						if($row->refundstatus=='0'){
				      echo "<td>"; ?><a href="<?=site_url('report/amtrefund')?>/<?php echo $row->id; ?>/<?php echo $row->amount; ?>/<?php echo $row->used_balance; ?>/<?php echo $row->by_id; ?>"
					onclick="if(confirm('Do you want to delete')) return true; else return false;">Refund <?php echo "</a></td>";
					}else{
						 echo "<td>Refunded</td>";
					}
					}} 


					
		  
						 $t_id=$row->id;
                       $this->db->where("transaction_id",$t_id);
		               $data1 = $this->db->get('ticket');
                        foreach ($data1->result() as $row1){
							$status1=$row1->status;
							
							
						}
					if($row->error_status_code=='2') {
								  if($row->ticket=='0') 
						   {
							  if($this->session->userdata('type')=='admin'){
                          echo "<td>Newticket</td>"; 
						}else{ 	  
							   echo "<td><a href='$ticket'  data-id='$row->id' class='btnticket' title='ticket'>
						   Newticket</a></td>";
							   
						     }
							   } 
						    if($row->ticket=='1') 
						   {
						if($this->session->userdata('type')=='franchise'){
                          echo "<td>Processing</td>"; 
						}else{						 
				        echo "<td><a href='$process'  data-id='$row->id' class='btnprocess' title='process'>
						   Processing</a></td>"; 
						   }}
						  else if($row->ticket=='1' && $status1=='1')
						  {
							   
							   echo "<td><a href='$solve'  data-id='$row->id' class='btnsolve' title='solve'>
						   Solved</a></td>";
					      }       }else {
							  echo "<td>-</td>";
						  }
                        
					
						 echo " &nbsp;&nbsp;&nbsp;&nbsp;						
						 </td> 			
                    </tr>";*/	

            
	 }
        exit;
    }
	private function local_date($date){
		
			$now=date('d-M-Y h:m:s a',strtotime($date));
			 
			
			$date = new DateTime($now, new DateTimeZone('GMT')); 
			
			 $timezone = new DateTimeZone("Asia/Kolkata");
				  $date = new DateTime();
				 $date->setTimezone($timezone); 
				
			return $date->format('Y-m-d H:i:s');	
	}
	private function ticket(){}
	   private function process(){}
   
   private function solve(){}
   
   
     function tic_insert($reason,$transaction_id,$create_id,$date)
{  
   
      $sql = "insert into ticket(reason,transaction_id,create_id,date)values('$reason','$transaction_id','$create_id','$date')";
      $qry= $this-> db-> query($sql);
	   if($qry)
     {
	    return true;
     }
     return false;
}

  function tic_status($transaction_id,$change)
{  
   
      $sql = "update recharge_details set ticket='$change' where id='".$transaction_id."'";
      $qry= $this-> db-> query($sql);
	   if($qry)
     {
	    return true;
     }
     return false;
}

     function refund($id,$up_del)
{  
   
      $sql = "update recharge_details set refundstatus='$up_del' where id='".$id."'";
      $qry= $this-> db-> query($sql);
	   if($qry)
     {
	    return true;
     }
     return false;
}
  function refund1($sess_id,$up_balance)
{  
   
      $sql = "update usermaster set total_balance='$up_balance' where uid='".$sess_id."'";
      $qry= $this-> db-> query($sql);
	   if($qry)
     {
	    return true;
     }
     return false;
}

 function reply($reply,$ids,$sta)
{  
   
      $sql = "update ticket set status='$sta',reply='$reply' where transaction_id='".$ids."'";
      $qry= $this-> db-> query($sql);
	   if($qry)
     {
	    return true;
     }
     return false;
}

function statusrefund($id,$sta)
{  
   
      $sql = "update recharge_details set refundstatus='$sta',refund_date=now() where id='".$id."'";
      $qry= $this-> db-> query($sql);
	   if($qry)
     {
	    return true;
     }
     return false;
}


function amtrefund($id,$afterbal,$by_id)
{  
   
      $sql = "update usermaster set used_balance='$afterbal' where uid='".$by_id."'";
      $qry= $this-> db-> query($sql);
	   if($qry)
     {
	    return true;
     }
     return false;
}



function refundreport($status,$ids,$type)
		{
			
			//$this->db->where("uid",$var);
			if($type=='admin')
			{
			 $sql="SELECT * FROM recharge_details
			 join usermaster on usermaster.uid=recharge_details.by_id where recharge_details.refundstatus='$status' ";
			 $qry= $this-> db-> query($sql);
			}else if($type=='super')
			{
				$sql="SELECT * FROM recharge_details
			 join usermaster on usermaster.uid=recharge_details.by_id where recharge_details.refundstatus='$status' ";
			 $qry= $this-> db-> query($sql);
			}
			else if($type=='distributor')
			{
				$sql="SELECT * FROM recharge_details
			 join usermaster on usermaster.uid=recharge_details.by_id where recharge_details.refundstatus='$status' 
			 && usermaster.parent_id='$ids'";
			 $qry= $this-> db-> query($sql);
			
			 
	 }
			else if($type=='retailer')
			{
				$sql="SELECT * FROM recharge_details
			 join usermaster on usermaster.uid=recharge_details.by_id where recharge_details.refundstatus='$status' 
			 && recharge_details.by_id='$ids' ";
			 $qry= $this-> db-> query($sql);
			}
			if($qry->num_rows()>0)
			{	
		   $querys = $qry->result();
           return $querys;
				
			} 
			else 
			{
				return False;
			}
		}
    
}