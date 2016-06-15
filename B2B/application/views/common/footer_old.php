<!---------updated footer------------------>
<footer>
<a href="#"><img src="<?php echo base_url()?>/assets/paybuks/images/footer_logo.png" /></a>
<p>@ Copyright 2015 - 2016  |  IRUPAYA All rights reserved</p>
</footer>
<!-- wrapper ends -->

<!-- RESP MENU STARTS -->
<!--load jPushMenu, required-->
<script src="<?php echo base_url()?>/assets/paybuks/js/jPushMenu.js"></script>
<script>
jQuery(document).ready(function($) {
	$('.toggle-menu').jPushMenu();
});
</script>
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