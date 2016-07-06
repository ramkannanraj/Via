
<div class="panel dashboard">
        	<div class="panel-body">
                <?php if(isset($error)){ ?>
     <div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   <?php echo $error; ?>
</div>
<?php } ?> 

 <?php if($this->session->flashdata('error')){ ?>
     <div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   <?php echo $this->session->flashdata('error'); ?>
</div>
<?php } ?> 
     
    <?php if(isset($message)){ ?>
     <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   <?php echo $message; ?>
</div>
    <?php } ?> 
    
     <?php if($this->session->flashdata('message')){ ?>
     <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   <?php echo $this->session->flashdata('message'); ?>
</div>
    <?php } ?>
            
            
             
             	 
                 
                    <!-- Row Start -->
                    <div class="row">
                      <div class="col-lg-12">
                      <div class="mobile-1"><p>SENDER DETAILS</p></div>
                      <ul class="list-unstyled">
                      <li><strong>Mobile No</strong>: <?php echo $this->session->userdata('mobile_number'); ?> </li>
                      <li><strong>Card Number</strong>: <?php echo $this->session->userdata('card_no'); ?></li>
                      </ul>
                         <form class="form-inline">
                         
                 
                  <?php  $cards = $this->session->userdata('card_no');  ?>
 						
                         </form> 
					 </div>
						</div><!-- Row End -->
                        
                        
                        
                        
                        
                        
                        
                        <div class="row">
                      <div class="col-lg-12">
                      <div class="mobile-1">
						<p>BENEFICIARY LIST</p>
                        </div>
                           <ul class="list-group">
               

<!-- /#wrapper -->
 
<div class="table-resposive">
<table class="table table-striped table-condensed" id="dataTables-example">
<thead>
<tr>
<th>BENEFICIARY NAME</th>
</tr>
</thead>
		<tbody>
         <?php include('icash_credential.php');?>
<?php 

$sql=mysql_query("SELECT * FROM tbl_icash_credential   ")or die(mysql_error());

 
while($row=mysql_fetch_array($sql))
{
 
			 $terminal_id=$row['terminal_id'];
			 $login_key=$row['login_key'];
			 $merchant_id=$row['merchant_id'];
			 $agent_id=$row['agent_id'];
		}

$service_url = 'http://202.54.157.77/wsnpci/impsmethods.asmx=VIEWBENEFICIARY';
$ch = curl_init($service_url);
$curl_post_data = array(
"RequestData" =>"<VIEWBENEFICIARYREQUEST>
<TERMINALID>$terminal_id</TERMINALID>
<LOGINKEY>$login_key</LOGINKEY>
<MERCHANTID>$merchant_id</MERCHANTID>
<CARDNO>$cards</CARDNO>
<AGENTID>$agent_id</AGENTID>
<PARAM1></PARAM1>
<PARAM2></PARAM2>
<PARAM3></PARAM3>
<PARAM4></PARAM4>
<PARAM5></PARAM5>
</VIEWBENEFICIARYREQUEST>");
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
$status_code=$responseArray['STATUSCODE'];
$status=$responseArray['STATUS'];

?>


 
<?php
if($status_code == 0 ){
 $i=1; 
foreach ($xml->ITEM as $item) {
 
$beneid=   $item->BENEID;
 $benename=   $item->BENENAME;
$bank_name= $item->BANKNAME;
$branch_name= $item->BRANCHNAME;
$ifsc_code= $item->IFSCCODE;
$acc_no= $item->ACCOUNTNO;
$mobile= $item->MOBILE;
$ifsc_status= $item->IFSCSTATUS;
$mmid_status= $item->MMIDSTATUS;
$mmid_enable= $item->IMPSMMIDENABLE;
$imps_scan= $item->IMPSIFSCENABLE;
$neft_enable= $item->IMPSNEFTENABLE;
$state= $item->STATE;
$city= $item->CITY;

?>
		<tr>  
        <td>      
                           
                   <span class="hidden"> <?php echo $benename ;?>   </span>     


            <li class="list-group-item">
                <div class="row toggle" id="dropdown-detail-<?php echo $i ;?>" data-toggle="detail-<?php echo $i ;?>">
                    <div class="col-xs-10">
                       <?php echo $benename ;?>
                    </div>
                    <div class="col-xs-2"><i class="fa fa-chevron-down pull-right"></i></div>
                </div>
                <div id="detail-<?php echo $i ;?>">
                    <hr></hr>
                
            
		  
<div class="table-responsive">
<table class="table table-bordered">
<tbody>

<tr>
<th>Sl.No</th>
<td class="center"><?php echo $i ;?></td>
</tr>

<tr>
<th>Name</th>
<td class="center"><?php echo $benename ;?></td>
</tr>

<tr>
<th>Bank Name</th>
<td class="center"><?php echo $bank_name;?></td>
</tr>

<tr>
<th>IFSC Code</th>
<td class="center"><?php echo $ifsc_code;?></td>
</tr>

<tr>
<th>Account No</th>
<td class="center"><?php echo $acc_no;?></td>
</tr>

<tr>
<th>Mobile No</th>
<td class="center"><?php echo $mobile;?></td>
</tr>

<tr>
<th>IMPS(MMID)</th>
<td class="center">
<?php // if($mmid_enable==0 ){?>
		<!--disable-->
<?php //}//else if($mmid_enable==1 ){?>
		
		<form method="post" action="<?php echo site_url('beneficiary/mmid_transaction') ?>/<?php echo $acc_no;?>/<?php //echo $user_id;?>">
		 
		<input type="hidden" name="acc_no" value="<?php echo  $acc_no?>">
		<input type="hidden" name="card"   value="2">
		<input type="hidden" name="id"     value="<?php //echo  $user_id?>">
        <input type="hidden" name="card_no"     value="<?php echo  $cards?>">
        <input type="hidden" name="trans_type"     value="2">
        <input type="hidden" name="bene_mobile"     value="<?php echo  $mobile?>">
        <input type="hidden" name="bene_id"     value="<?php echo  $beneid?>">
        <input type="hidden" name="ifsc_code"     value="<?php echo  $ifsc_code?>">
        <input type="hidden" name="bene_state"     value="<?php echo  $state?>">
        <input type="hidden" name="bene_city"     value="<?php echo  $city?>">
        <input type="hidden" name="bene_name"     value="<?php echo  $benename?>">
        <input type="hidden" name="bank_name"     value="<?php echo  $bank_name?>">
        <input type="hidden" name="branch_name"     value="<?php echo  $branch_name?>">
    
		<input type="submit" id="gobutton" class="btn btn-primary" value="Pay Now">
		</form>
		
		<?php //}?>
</td>
</tr>

<tr>
<th>IMPS(IFSC)</th>
<td class="center">

		<form method="post" action="<?php echo site_url('beneficiary/transactions') ?>/<?php echo $acc_no;?>/<?php //echo $user_id;?>">
		 
		<input type="hidden" name="acc_no" value="<?php echo  $acc_no?>">
		<input type="hidden" name="card"   value="2">
		<input type="hidden" name="id"     value="<?php //echo  $user_id?>">
         <input type="hidden" name="card_no"     value="<?php echo  $cards?>">
        <input type="hidden" name="trans_type"     value="2">
       <input type="hidden" name="bene_mobile"     value="<?php echo  $mobile?>">
       <input type="hidden" name="bene_id"     value="<?php echo  $beneid?>">
        <input type="hidden" name="ifsc_code"     value="<?php echo  $ifsc_code?>">
        <input type="hidden" name="bene_state"     value="<?php echo  $state?>">
        <input type="hidden" name="bene_city"     value="<?php echo  $city?>">
        <input type="hidden" name="bene_name"     value="<?php echo  $benename?>">
        <input type="hidden" name="bank_name"     value="<?php echo  $bank_name?>">
        <input type="hidden" name="branch_name"     value="<?php echo  $branch_name?>">
		<input type="submit" id="gobutton" class="btn btn-primary" value="Pay Now">
		</form>
		
</td>
</tr>

<tr>
<th>NEFT</th>
<td class="center">

		
		<form method="post" action="<?php echo site_url('beneficiary/benetransactions') ?>/<?php echo $acc_no;?>/<?php //echo $user_id;?>">
		<input type="hidden" name="acc_no" value="<?php echo  $acc_no?>">
		<input type="hidden" name="card"   value="8">
		<input type="hidden" name="id"     value="<?php //echo  $user_id?>">
         <input type="hidden" name="card_no"     value="<?php echo  $cards?>">
        <input type="hidden" name="trans_type"     value="8">
        <input type="hidden" name="bene_mobile"     value="<?php echo  $mobile?>">
        <input type="hidden" name="bene_id"     value="<?php echo  $beneid?>">
        <input type="hidden" name="ifsc_code"     value="<?php echo  $ifsc_code?>">
        <input type="hidden" name="bene_state"     value="<?php echo  $state?>">
        <input type="hidden" name="bene_city"     value="<?php echo  $city?>">
        <input type="hidden" name="bene_name"     value="<?php echo  $benename?>">
        <input type="hidden" name="bank_name"     value="<?php echo  $bank_name?>">
        <input type="hidden" name="branch_name"     value="<?php echo  $branch_name?>">
		<input type="submit" id="gobutton" class="btn btn-primary" value="Pay Now">
		</form>
		
		
</td>
</tr>

<tr>
<th>Edit</th>
<td class="center">
		<?php 
		if($ifsc_status==0 && $mmid_status==0){
		?>
		 <a class="btn btn-info" href="beneficiary/edit_beneficiary.php">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
		<?php }
		else if($ifsc_status==1 && $mmid_status==1){?>
		 
                Disable
            </a><?php }?>
</td>
</tr>

<tr>
<th>Action</th>
<td class="center"> <a href="<?php echo site_url('beneficiary/delete') ?>/<?php echo $beneid;?>/<?php echo $cards;?>" onClick="return confirm('Are you sure?')">Delete</a></td>
</tr>
</tbody>
</table>
</div>
   
                </div>
            </li>
            
            
          
</td>
</tr>

  <?php $i++;} }//} 
else if($status_code == 1){?>


<tr><td>
<?php echo"No Beneficiary Found";?>
</td></tr>

<?php } ?>
      </tbody>       
     </table> 
 
</div>       
      </ul>
                      
                          
					 </div>
						</div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
					</div>
					
			 
            
            </div>
            
            
        </div>
     </div>      		</div>
        </div>

 <div class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="<?php echo base_url()?>/bower_components/jquery/dist/jquery.min.js"></script>
 <script src="<?php echo base_url()?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
 <script src="<?php echo base_url()?>/bower_components/metisMenu/dist/metisMenu.min.js"></script>
 <script src="<?php echo base_url()?>/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
 <script src="<?php echo base_url()?>/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
  
<script>
$(document).ready(function() {
$('#dataTables-example').DataTable({
responsive: true
});
});
</script>
     	    

<script type="text/javascript">
      var baseUrl='http://example.com';
      function ConfirmDelete()
      {
            if (confirm("Delete Account?"))
                 location.href=<?php echo base_url(); ?>+'/deleteRecord.php';
      }
  </script> 