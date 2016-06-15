<div class="container" style="min-height: 475px;">
        <button class="toggle-menu menu-left push-body gradient_btn1">Menu</button>
    	<div class="admin-otp">
        	<div class="row">
            	<div class="col-sm-5 col-xs-12">
                	<span><img src="<?php echo base_url()?>assets/paybuks/images/otp-icon.png" /></span>
                    <h2>Pay with Paybuks</h2>
                    <ul>
                    	<li>Pay your bills using Paybuks wallet</li>
                        <li>In case of refund, money will be credited to your wallet instantaneously</li>
                        <li>Use Paybuks wallet on other websites</li>
                    </ul>
                </div>
				
				
				   <center>
<span> 
<?php
if($this->session->flashdata('item')!="") {
$message = $this->session->flashdata('item');
?>

<div class="<?php echo $message['class'] ?>" ><?php echo $message['message']; ?></div>
<?php
}
?>
</span>
</center>

                <div class="col-sm-7 col-xs-12">
				
                	<h2>Enter One Time Password</h2>
                    <p>One Time Password (OTP) has been sent to your mobile ******<?php echo $mobile_no; ?>, Please enter the same here to Login</p>
                    <form method="post" name="form_login" id="form_login" action="<?php echo site_url(); ?>user/secure_login">
					<center>
<span>
<?php
if($this->session->flashdata('item')!="") {
$message = $this->session->flashdata('item');
?>

<div class="<?php echo $message['class'] ?>" ><?php echo $message['message']; ?></div>
<?php
}
?>
</span>
</center>

						<input required type="password" maxlength="4" placeholder="Enter OTP here" name="secure_code" id="security_key"/>
 <input  type="hidden"  name="type" id="type" value="<?php echo $type;?>" />
 
 
                        <span>Get OTP call (00.25)</span>
                        <input type="submit" class="gradient_btn" value="Submit" />
                    </form>
                    <p class="trouble_login">Having troble logging in?<a href="#">Contact us</a></p>
                
				</div>
				
            </div>
            <!-- row ends -->
        </div>
        <!-- admin-page1 ends -->
    </div>
	
      <!-- POPUP STARTS -->
                <div class="modal fade bs-example-modal-lg-4" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                    <div class="modal-dialog modal-lg" style="width:365px;">
                        <div class="modal-content">
                        	<form>
                            	<!--<div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                   
                                </div>-->
                                <div class="modal-body">
                                 <h4 class="text-center">You are logging out of Paybuks.com </h4>
                                </div>
                                <div class="modal-footer">
                              
                                    <a href="<?php echo base_url()?>user/thankyou_content" class="btn btn-default">OK</a> 
  									<a href="<?=current_url()?>" class="btn btn-default" type="submit" />Cancel</a>   
                              
                                </div>
                                <!-- row ends -->
                            </form>
                        </div>
                    </div>
                </div>
<style>
.okb{
    background: rgba(0, 0, 0, 0) linear-gradient(270deg, rgba(227, 16, 109, 1) 0%, rgba(134, 1, 120, 1) 100%) repeat scroll 0 0;
    border: medium none !important;
    border-radius: 8px;
    color: #fff;
    float: left;
    font-size: 20px;
    height: 52px;
    line-height: 52px;
    margin-top: 30px;
    padding: 0 50px;
}		
</style>		
<!-- POPUP ENDS -->  
	
	<!-- RESP MENU STARTS -->
<!--load jPushMenu, required-->

<script>
$(document).ready(function(){
	$(".toggle-menu").click(function(){
		$(".cd-overlay").addClass("is-visible ");
	});
	
	$(".cd-overlay").click(function(){
		$(".cd-overlay").removeClass("is-visible ");
	});
});
</script>
<!-- RESP MENU ENDS -->

<!-- ADD class for wallet and promo code -->
<script>
$(document).ready(function(){
	$(".add_money").click(function(){
		$(".add_money_field").addClass("open");
		$(".add_money").addClass("open");
	});
	
	$(".promo_code").click(function(){
		$(".add_promo").addClass("open");
		$(".promo_code").addClass("open");
	});
	
	$(".cancel").click(function(){
		$(".add_money_field").removeClass("open");
		$(".add_money").removeClass("open");
		$(".add_promo").removeClass("open");
		$(".promo_code").removeClass("open");
	});
});
</script>
