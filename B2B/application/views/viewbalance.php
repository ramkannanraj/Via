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
            
            <h3>View Balance</h3> 
                    <form method="post" class="form-style-9"   >
  <?php /*foreach($card_details as $user){ 
  
    $card=$user->card_no; }*/
	
	$card = $this->session->userdata('card_no');
	?>
    <div class="table-responsive">
                    <table class="table table-bordered">
   <tr>
   <td>

 <?php
 
 $service_url = 'http://api.icashcard.in/impsmethods.asmx/CHECKCARDBALANCE';
$ch = curl_init($service_url);
$curl_post_data = array(
"RequestData" =>"<CHECKCARDBALANCEREQUEST>
<TERMINALID>100024</TERMINALID>
<LOGINKEY>1982032620</LOGINKEY>
<MERCHANTID>24</MERCHANTID>
<AGENTID>WallTech</AGENTID>
<CARDNO>$card</CARDNO>
</CHECKCARDBALANCEREQUEST>");
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
 $balz=$responseArray['BALANCE'];
 $top=$responseArray['TOPUPLIMIT'];
?>
<label>Balance</label></td><td><span><?php echo $balz;?></span></td>
<?php /*?><td>
 
<label >Topup Limit</label></td><td><input type="text" name="otp_no"class="form-control"  value="<?php echo $top;?>"  readonly /></td><?php */?>
</tr>
</table>


	</div>
  

</form>
            
            </div>
        </div>
     </div>      		</div>
        </div>

 </div> <!-- container close -->
        
	 
    
  
              
 


 