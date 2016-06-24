 
 
</div>  


<footer id="footer" class="main_footer">
<a href="#" class="footerp"><img src="<?php echo base_url()?>/assets/paybuks/images/footer_logo.png" /></a>
<p>@ Copyright 2016 - 2017  |  ViaPiase All rights reserved</p>
</footer> 

<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/paybuks/css/sticky-footer-navbar.css" />
<style>

.main_footer{
background: #fff;

    padding: 15px;
    
    border-top: 1px solid #d2d6de;
}
#footer {
	background-color: #00bbf0; /* #e1e1e1; */
	color: #fff;
    padding: 32px;
    position:relative;
	bottom:0px;
    text-align: center;
	width:100%;

}
#footer p {
    color: #fff;
    font-size: 12px;
    margin-bottom: 0;
    margin-top: 25px;
}
</style>

<!---------updated footer------------------>


<!-- wrapper ends -->

<!-- RESP MENU STARTS -->
<!--load jPushMenu, required-->

<!-- RESP MENU ENDS -->

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

<!-- ADD class for wallet and promo code -->
<script>
$(document).ready(function(){
	$(".add_send_money").click(function(){
		$(".add_send_money_field").addClass("open");
		$(".add_send_money").addClass("open");
	});
	
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
<!---------updated footer ends------------->