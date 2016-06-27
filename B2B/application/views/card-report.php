 


 	<div class="panel dashboard">
        	<div class="panel-body">
            <div class="form-group">  <?php
					 		$this->load->view("report_menu");
					 
					  ?>
                    </div>
            <div class="mobile-1"><p>CARD TRANSACTION DETAILS</p></div>
            <div class="row">
            <div class="col-lg-12">        
            <form action="" enctype="multipart/form-data" method="post">

 <div class="form-group col-lg-2">

 <input type="text" class="form-control" placeholder="From Date" required name="from_date" id="datepicker"  />
</div>
<div class="form-group col-lg-2">


<input type="text" class="form-control" placeholder="To Date" id="datepickers"  required name="to_date"   />
</div>
<div class="form-group col-lg-3">

<select name="transaction_type" required class="form-control" >
<option value="" >Select Transaction Type</option>
<option value="3">REMITTED</option>
<option  value="5">REJECTION</option>
<option  value="6">REFUND</option>
</select>
</div>
<div class="form-group col-lg-3">
<select name="transaction_mode" required class="form-control" >
<option value="" >Select Transaction Mode</option>
<option value="1">IMPS(MMID)</option>
<option  value="2">IMPS(IFSC))</option>
<option  value="8">NEFT</option>
<option value="0" >ALL</option>
</select></div>
<div class="form-group col-lg-2">

 <input type="submit" value="Submit" name="submit" class="btn btn-warning form-control" />
</div>
		




</form>
</div>
<div class="col-lg-12">
<?php 
 if (isset($_POST['submit']))
 {
	     

$card = $cardNo;
$fromdate= $this->input->post('from_date');
$todate= $this->input->post('to_date');
$transaction_type= $this->input->post('transaction_type');
$transaction_mode= $this->input->post('transaction_mode');

$service_url = 'http://api.icashcard.in/impsmethods.asmx/TRANSACTIONHISTORY';
				$ch = curl_init($service_url);
				$curl_post_data = array(			
				"RequestData" =>"<TRANSACTIONHISTORYREQUEST>
				<TERMINALID>100024</TERMINALID>
				<LOGINKEY>1982032620</LOGINKEY>
				<MERCHANTID>24</MERCHANTID>
				<CARDNO>$card</CARDNO>
				<FROMDATE>$fromdate</FROMDATE>
				<TODATE>$todate</TODATE>
				<TRANSTYPE>$transaction_type</TRANSTYPE>
				<TRANSMODE>$transaction_mode</TRANSMODE>
				</TRANSACTIONHISTORYREQUEST>");
				$post_array_string = '';
				foreach($curl_post_data as $key=>$value) 
				{ 
					$post_array_string .= $key.'='.$value.'&'; 
				}
				$post_array_string = rtrim($post_array_string,'&');
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $post_array_string);
				
$output = curl_exec($ch);  
$xml = simplexml_load_string($output);
$xml = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $xml);
$xml = simplexml_load_string($xml);
$json = json_encode($xml);
$responseArray = json_decode($json,true);
$status_code = $responseArray['STATUSCODE'];
//print_r($responseArray); exit();
?>
<ul class="list-group">
<?php
if($status_code == 1){

echo "<li class='list-group-item'>
	No Transactions Found
    </li>";
	
	}else if($status_code == 0){
		
	$i=1; 
	
	foreach ($xml->ITEM as $item) {
 

 $TRANSACTIONID=   $item->TRANSACTIONID;
$SENDERNAME= $item->SENDERNAME;
$SENDERMOBILE= $item->SENDERMOBILE;
$BENENAME= $item->BENENAME;
$BENEMOBILE= $item->BENEMOBILE;
$IFSCCODE= $item->IFSCCODE;
$TOACCOUNTNO= $item->TOACCOUNTNO;
$MMID= $item->MMID;
$TRANSACTIONAMOUNT= $item->TRANSACTIONAMOUNT;
$DATETIME= $item->DATETIME;
$REMARKS=$item->REMARKS;
$TRANSACTIONSTATUS=$item->TRANSACTIONSTATUS;


?>

            <li class="list-group-item">
                <div class="row toggle" id="dropdown-detail-<?php echo $TRANSACTIONID ;?>" data-toggle="detail-<?php echo $TRANSACTIONID ;?>">
                    <div class="col-xs-10">
                       Name: <?php echo $BENENAME;?> (Trans Id: <?php echo $TRANSACTIONID ;?>)
                       
                    </div>
                    <div class="col-xs-2"><i class="fa fa-chevron-down pull-right"></i></div>
                </div>
                <div id="detail-<?php echo $TRANSACTIONID ;?>">
                    <hr></hr>
                   
<div class="table-responsive">
<table class="table table-bordered table-condensed" id="dataTables-example">

<tbody>


<tr>
<th>Sl.No</th>
<td class="center"><?php echo $i ;?></td>
</tr>

<tr>
<th>Trans Id</th>
<td class="center"><?php echo $TRANSACTIONID ;?></td>
</tr>

<tr>
<th>Sender Name</th>
<td class="center"><?php echo $SENDERNAME;?></td>
</tr>

<tr>
<th>Sender Mobile</th>
<td class="center"><?php echo $SENDERMOBILE;?></td>
</tr>

<tr>
<th>Name</th>
<td class="center"><?php echo $BENENAME;?></td>
</tr>

<tr>
<th>Mobile</th>
<td class="center"><?php echo $BENEMOBILE;?></td>
</tr>

<tr>
<th>IFSC Code</th>
<td class="center"><?php echo $IFSCCODE ;?></td>
</tr>

<tr>
<th>Account No</th>
<td class="center"><?php echo $TOACCOUNTNO;?></td>
</tr>

<tr>
<th>Trans Amount</th>
<td class="center"><?php echo $TRANSACTIONAMOUNT;?></td>
</tr>

<tr>
<th>Date& Time</th>
<td class="center"><?php echo $DATETIME;?></td>
</tr>

<tr>
<th>Remarks</th>
<td class="center"><?php echo $REMARKS;?></td>
</tr>

<tr>
<th>Status</th>
<td class="center"><?php echo $TRANSACTIONSTATUS;?></td>
</tr>

</tbody>
</table> 
</div>

                    
                </div>
            </li>
          
       
        
        <?php $i++; }}?>
         </ul>
        <?php } ?>

</div>
</div>

 
<!-- /#wrapper -->


						</div>
					</div>
     </div>      		</div>
        </div>

 </div> <!-- container close -->
 
 
 
 

        
    
	
 
    
  
<script>
$(document).ready(function() {
$('#dataTables-example').DataTable({
responsive: true
});
});
</script>  

  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
	$( "#datepickers" ).datepicker();
  });
  </script>
  



<style>
.hscroll{
	overflow-x:scroll;
}


</style>