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
    
    
	<div class="panel dashboard">
		<div class="panel-body">
        
        <div class="row">
                        <div class="col-lg-offset-4 col-lg-4">
                       
                            <div class="panel dashboard">
                                <div class="panel-body">
                               		<div class="mobile-1">
                    					<p>PIN GENERATION</p>
                                    </div>
								<span id="resendResponse" style="color:green"></span>
<form method="post" action="<?php echo site_url('sendmoney/pin_generate') ?>"  >
 <?php foreach($user_details as $user){ ?>
<div class="form-group">
<label>TRANSACTIONID</label><input type="text" name="trans_id" id="trans_id"   value="<?php echo $user->transaction_code;?>" class="form-control"   />
</div>
<div class="form-group">
<label>OTP</label><input type="text" name="otp_no" required class="form-control"   />
</div>
<div class="form-group">
<input type="submit" value="Submit" class="btn btn-default"  />

<?php }?>
 
</div>

</form>
<form method="post" id="resendOtp" onsubmit="sendResendOtp();" action="javascript:void(0);"  >
<!--<form method="post" id="resendOtp" action="javascript:void(0);"  >-->

<input type="hidden" name="tran" value="" id="resendTrans"/>

<input type="submit" value="Resend OTP"  class="btn btn-default" />
</form>

 </div> 
	</div>
						</div>
					</div>
			
				
		</div>
	</div>
    
    </div>
	</div>
    
    </div>
	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script type="text/javascript">
	
	function sendResendOtp(){
		
		
		
	var transId = $('#trans_id').val();	
	$('#resendTrans').val(transId);
	
	var data = $('#resendOtp').serialize();
	var baseurl = '<?php echo base_url(); ?>';
	
	//alert(transId);
	
	//return false;
	
	$.ajax({
		
		type:'POST',
		data:data,
		url:baseurl+'sendmoney/resendotp',
		success:function(html){
			
		//alert(html);
		$('#resendResponse').html(html);
			
			
		},
		
		
	});
	
		
		
	
	}
	
	
	/*$(document).on('submit','#resendOtp',function(){
		
	var transId = $('#trans_id').val();	
	$('#resendTrans').val(transId);
	
	var data = $('#resendOtp').serialize();
	var baseurl = '<?php //echo base_url(); ?>';
	
	//alert(transId);
	
	//return false;
	
	$.ajax({
		
		type:'POST',
		data:data,
		url:baseurl+'sendmoney/resendotp',
		success:function(html){
			
		//alert(html);
		$('#resendResponse').html(html);
			
			
		},
		
		
	});
	
		
		
	});*/
	
	
	</script>
