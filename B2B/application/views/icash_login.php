

<div class="container-fluid">
     <div class="admin-page2">
        	<div class="row">
            	<div class="col-lg-4 col-xs-12">
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
                          <h3>Card Generation</h3>
                     <p><span class="glyphicon glyphicon-briefcase" style="font-size:48px;"></span></p>
                     
                        <a href="<?php echo site_url('sendmoney/create_card') ?>" class="btn btn-default pull-right">Card Generation</a>
                	<div class="clearfix"></div>
                 
                   
                    </div>
                    </div>
                </div>
                
                <!--<div class="col-lg-3 col-xs-12">
                	<div class="panel dashboard">
                    	<div class="panel-body">
                          <h3>Icash Login</h3>
                     <p><span class="glyphicon glyphicon-user" style="font-size:48px;"></span></p>
                     
                	
                   <a href="<?php echo site_url('sendmoney/log') ?>" class="btn btn-default pull-right">Login</a>
                   
                    </div>
                    </div>
                </div>-->
                <!-- col-xs-12 ends-->
                <div class="col-lg-4 col-xs-12">
                	<div class="panel dashboard">
                    	<div class="panel-body">
                          <h3>Login with pin</h3>
                          <p><span class="fa fa-key fa-2x" style="font-size:48px;"></span></p>
                         
                                <a class="btn btn-default pull-right accordion accordion-close" id="log_pin">Login with pin</a>
                                <span id="forgetPin" style="color:green;"></span>
                                
                                <div class="clearfix"></div>
                                
                                <div class="pin" style="display:none">	
                  
                                     <form method="post" id="sendMoneyLogin" action="<?php echo site_url('sendmoney/login') ?>" >
                                     
                                     <div class="form-group">
    <label for="Mobile No">Mobile No</label>
    <input type="text" name="mobile" value="" id="mobile" class="form-control">
    
  </div>
  
  <div class="form-group">
    <label for="Pin No">Pin No</label>
    <input type="text" name="pin_no" value="" class="in-btn1 form-control">
    
  </div>
  
  <div class="form-group">
 
   <input type="submit" value="Submit" class="btn btn-default">
  </form>
  
  <!--
  <form method="post" id="frgOtp" name="frgOtp" onsubmit="sendForgetPin();" action="javascript:void(0);"  >
   
      <input type="hidden" name="mobile" value="" id="forgetMobile"/>
      
   <input type="submit" value="Forget Pin" class="btn btn-primary">
   </form>-->
  <span id="frgSending" style="color:orange; display:none;">Sending.....</span>
  
     </div>
                                    
                                    
                                </div>
                                	</div>
                    </div>
                    </div>
                    <div class="col-lg-4 col-xs-12">
                         <div class="panel dashboard">
                    	<div class="panel-body">
                         <h3>Login with OTP</h3>
                   <p><span class="fa fa-tty fa-2x" style="font-size:48px;"></span></p>
                            <a class="btn btn-default pull-right accordion accordion-close" id="log_otp">Login with OTP</a>
                            <div class="clearfix"></div>
                          <div class="otp" style="display:none">
                               
                                     <form method="post" action="<?php echo site_url('sendmoney/login_otp') ?>" >
                                     
                                     <div class="form-group">
    <label for="Mobile No">Mobile No</label>
    <input type="text" name="mobile" value="" class="form-control">
    
  </div>
  <div class="form-group">
  <input type="submit" value="Submit" class="btn btn-default">
                 
  
     </div>
                                    	
                                    </form>
                                </div>
           				</div>
                    </div>
                    <br>
                    
                                
                                
                </div>
            </div>
            <!-- row ends-->
        </div>
        <!-- admin-page1 ends -->
    </div>
    
    
    <!-- RESP MENU STARTS -->
<!--load jPushMenu, required-->
     
<!-- RESP MENU ENDS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script type="text/javascript">
	/*$(document).on('submit','#frgOtp',function(){
		
		alert('dffdffgfg');
	
	});*/
	function sendForgetPin(){
		
	
	$('#frgSending').show();	
		//e.preventDefault();
	var mobile = $('#mobile').val();	
	$('#forgetMobile').val(mobile);
	
	var data = $('#frgOtp').serialize();
	var baseurl = '<?php echo base_url(); ?>';
	
	//alert(mobile);
	
	//return false;
	
	$.ajax({
		
		type:'POST',
		data:data,
		url:baseurl+'sendmoney/forget_pin',
		success:function(html){
		$('#frgSending').hide();		
		//alert(html);
		$('#forgetPin').html(html);

		},

	});
		
		
	}
	
	$(document).on('submit','#frgOtp',function(e){
		
		//e.preventDefault();
	var mobile = $('#mobile').val();	
	$('#forgetMobile').val(mobile);
	
	var data = $('#frgOtp').serialize();
	var baseurl = '<?php echo base_url(); ?>';
	
	//alert(mobile);
	
	return false;
	
	$.ajax({
		
		type:'POST',
		data:data,
		url:baseurl+'sendmoney/forget_pin',
		success:function(html){
			
		//alert(html);
		$('#forgetPin').html(html);

		},

	});
	});
	</script>




<script>
$(document).ready(function(){
$("#log_pin").click(function(){
$(".otp").hide();
$(".pin").show();
});
$("#log_otp").click(function(){
$(".pin").hide();
$(".otp").show();
});
});
</script>
 <script src="<?php echo base_url()?>/assets/js/jquery.validate.min.js"></script>
   <script src="<?php echo base_url()?>/assets/js/jquery.validate-rules.js"></script>
<!-- TOOGLE STARTS -->
<!-- TOOGLE SCRIPT -->

<!-- TOOGLE ENDS -->