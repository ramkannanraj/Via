<!DOCTYPE HTML>
<html>
	<head>
		<title>Paybuks Mobile Money</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="<?php echo base_url();?>/assets/website_designs/css/bootstrap.css" rel='stylesheet' type='text/css' />
        <link href="<?php echo base_url();?>/assets/website_designs/css/flexslider.css" rel='stylesheet' type='text/css' />
        <link href="<?php echo base_url();?>/assets/website_designs/css/animate.min.css" rel='stylesheet' type='text/css' />
		<link rel="shortcut icon" href="<?php echo base_url();?>/assets/website_designs/img/favicon_square.png" />	
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="<?php echo base_url();?>/assets/website_designs/js/jquery.min.js"></script>
		 <!---- start-smoth-scrolling---->
		<script src="<?php echo base_url();?>/assets/website_designs/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>/assets/website_designs/js/move-top.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>/assets/website_designs/js/easing.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>/assets/website_designs/js/jquery.flexslider.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				// Smooth scroll start
				$(".down").click(function() {
					$('html, body').animate({
					scrollTop: $(".bg").offset().top
					}, 2000);
				});
				// Smooth scroll end
			});
		</script>
		 <!-- Custom Theme files -->
<link href="<?php echo base_url();?>/assets/website_designs/css/style.css" rel='stylesheet' type='text/css' />   		 <!-- Custom Theme files -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		</script>
		<!----webfonts---->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700' rel='stylesheet' type='text/css'>
		<!----//webfonts---->
		<!----start-top-nav-script---->
		<script>
		$(function() {
			var pull 		= $('#pull');
				menu 		= $('nav ul');
				menuHeight	= menu.height();

			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});

			
		});
</script>
    
<script type="text/javascript" src="<?php echo base_url();?>/assets/website_designs/js/background.cycle.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $(".headers").backgroundCycle({
                    imageUrls: [
                        'img/Home.jpg'
                    ],
                    fadeSpeed: 6000,
                    duration: 5000,
					
                    backgroundSize: SCALING_MODE_COVER
                });
            });
        </script>

           <script type="text/javascript" src="<?php echo base_url();?>/assets/website_designs/js/jquery.fadeshow-0.1.1.js"></script>

		<!----//End-top-nav-script---->
</head>
	<body>
		<!-----header-section------>
		
			<div id="home" class="consumer-header">
				<div class="container">
                	<!-- Header Start -->
					<div class="top-header">
						<!--<div class="col-lg-3">
							
						</div>-->
						<!----start-top-nav---->
                        <div class="col-lg-12">
						 <!--<nav class="top-nav">
							<ul class="top-nav" id="nav">
								<li><a href="" class="scroll">RECHAGER </a></li>
						    <li class="page-scroll"><a href="" class="scroll"><label id="list-bold">MONEY</label> TRANsFER</a></li>
						    <li class="page-scroll"><a href="" class="scroll"><label id="list-bold">TOUCH </label>-N-GO</a></li>
						    <li class="page-scroll"><a href="" class="scroll"><label id="list-bold">VOU</label>CHER </a></li>
							  <li class="contatct-active" class="page-scroll"><a href="#contact" class="scroll"><label id="list-bold">DISTRI</label>BUTOR</a></li>
							</ul>
							
						</nav>-->
  <nav class="navbar navbar-default navmobileview">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand iRup" href="http://www.paybuks.com/"><img class="logo" src="<?php echo base_url();?>/assets/website_designs/img/logo final 1.png" title="logo" width="200" /></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        	<li><a href="#">RECHARGE</a></li>
            <li><a href="http://www.paybuks.com/money-transfer.html"><span>MONEY</span>TRANSFER</a></li>
            <li><a href="http://www.paybuks.com/touch-n-go.html"><span>TOUCH</span>-N-GO</a></li>
            <li><a href="http://www.paybuks.com/voucher.html"><span>VOU</span>CHER</a></li>
            <li><a href="#"><span>DISTRI</span>BUTOR</a></li>
            <li><a href="user_index"><span></span> <span style="color:#2E7295; font-weight:bold;"><img src="<?php echo base_url();?>/assets/website_designs/img/user.png">&nbsp;&nbsp;CONSUMER</span> LOGIN</a></li>
	        <li><a href="index"><span></span> <span style="color:#2E7295; font-weight:bold;"><img src="<?php echo base_url();?>/assets/website_designs/img/merchant.png">&nbsp;&nbsp;MERCHANT</span> LOGIN</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
                        
                        
                         <nav class="navbar navsystemview">
                          <div class="container-fluid">
                            <div class="navbar-header">
                              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#iRupayabar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>                        
                              </button>
                              <a class="navbar-brand iRup" href="http://www.paybuks.com/"><img class="logo" src="<?php echo base_url();?>/assets/website_designs/img/logo final 1.png" title="logo" width="200" /></a>
                            </div>
                            <div class="collapse navbar-collapse" id="iRupayabar">
                              <ul class="nav navbar-nav">
                                <li><a href="#">RECHARGE</a></li>
                                <li><a href="http://www.paybuks.com/money-transfer.html"><span>MONEY</span>TRANSFER</a></li>
                                <li><a href="http://www.paybuks.com/touch-n-go.html"><span>TOUCH</span>-N-GO</a></li>
                                <li><a href="http://www.paybuks.com/voucher.html"><span>VOU</span>CHER</a></li>
                                <li><a href="#"><span>DISTRI</span>BUTOR</a></li>
                              </ul>
                             
                            </div>
                             <div >
                              <ul class="nav navbar-nav navbar-right">
                               <li class="dropdown" id="dropdown-top">
                                  <a class="dropdown-toggle" data-toggle="dropdown" href="#"><img class="indicator" src="<?php echo base_url();?>/assets/website_designs/img/Final_dup_03.png"></a>
                                  <ul class="dropdown-menu" style="background-color:#acd7e0;">
                                     <li><a href="user_index"><span></span> <span style="color:#2E7295; font-weight:bold;"><img src="<?php echo base_url();?>/assets/website_designs/img/user.png">&nbsp;&nbsp;CONSUMER</span> LOGIN</a></li>
	                                <li><a href="index"><span></span> <span style="color:#2E7295; font-weight:bold;"><img src="<?php echo base_url();?>/assets/website_designs/img/merchant.png">&nbsp;&nbsp;MERCHANT</span> LOGIN</a></li>
                                  </ul>
                                </li>
                              </ul>
                              </div>
                          </div>
                        </nav>

                        </div>
                        
                      <!-- <div class="col-lg-3 pull-right text-right">
                        	<a href="#"></a>
                        </div>-->
						<div class="clearfix"> </div>
					</div>
  
  <style>
#consumer-heading{float:right; }
.face{ width:100%;}
.twit{ width:100%;}
.firstname{background-image: linear-gradient(#f8f8f8, #cad6bf 55%, #cad6bf);
    border: 1px solid #a1a1a1;
    border-radius: 0;
    height: 60px;
	font-weight:600;
	color:#000;
    opacity: 0.5;
	padding:15px;
	width:340px;
	margin:0px 0 12px 5px; }
	
	.lastname{background-image: linear-gradient(#f8f8f8, #cad6bf 55%, #cad6bf);
    border: 1px solid #a1a1a1;
    border-radius: 0;
    height: 60px;
	font-weight:600;
	color:#000;
    opacity: 0.5;
	padding:15px;
	width:340px;
	margin:0px 0 12px -12px; }
	
	a:hover, a:focus { color:#333 !important; text-decoration:none; } .merchant-login-text-box > button {               background-color: #3ba56d;               border: 1px solid #3ba56d;               color: #fff;               font-weight: bold;               margin: 13px 0 0 5px;               padding: 15px;               width:100%;               }               .merchant-reset-text-box > button {               background-color: #3ba56d;               border: 1px solid #3ba56d;               color: #fff;               font-weight: bold;               margin: 13px 0 0 28px;               padding: 15px;               width:91%;               }			   .consumerreset{				   background-color: #3ba56d;    border: 1px solid #3ba56d;    height: 60px !important;    margin: 13px 0 0 5px;    padding: 15px;    width:425px !important;	font-weight:bold !important;			   }
</style>                  
            <!-- Header End -->
                    <!-- Form Box Starts -->
                    <div class="consumer-login">
                        <div class="col-lg-6" style="padding-left:0px; padding-right:0px; margin:0 -14px 0 0px;">
                            <div class="clearfix"></div>
                            <div class="tab-content pull-left">
                                <div id="mobile" class="tab-pane fade in active consumer-background">
                                    <div class="input-consumer">
                                    <div class="col-lg-12" id="systemconsumerlogin">
                                    <div class="col-lg-4"  id="consumerloginleft">
                                        <span style="font-size:16px; font-weight:600;"><a onClick="login();" href="#"><?php //echo $this->session->tempdata('mobile_operator'); ?>Login to Paybuks Wallet</a></div>
                                        <div class="col-lg-4" id="consumerlogincenter">
                                        <label for="prepaid" style="">CONSUMER <span style="font-weight:normal;">LOGIN</span></label></div>
                                        <div class="col-lg-4" id="consumerloginright">
                                        <span style="font-size:16px; font-weight:600;"><a onClick="signup();"  href="#">Signup to Paybuks Wallet</a></span></div>
                                    	</div>
                                        
                                        
                                    </div>
                                    <!--<div class="input-consumer">
                                    <div class="col-md-12">
                                    <div class="col-md-6" id="facebookdiv">
                                        <img src="img/consumer/facebook.png" class="face">
                                    </div>
                                    <div class="col-md-6" id="twitterdiv">
                                    <img src="img/consumer/twitter.png" class="twit">
                                    </div></div>
                                    
                                    <div class="consumer-text-box" style="color:#fff;">
                                    <center><span style="color:#fff; font-size:14px;">or sign up with</span></center>
                                    </div>
                                    </div>-->
                    <form id="signup_form" action="<?=site_url('user/consumer_signup')?>" method="post">
                                    <div class="col-md-12">
                                    <div class="col-md-6"  id="firstnamediv">
                                        <input type="text" class="firstname" name="firstname" placeholder="&nbsp;&nbsp;First Name"  >
					 <input type="hidden" value='consumer' name="type" >
                                    </div> 
                                    <div class="col-md-6"  id="lastnamediv">   
                                        <input type="text" class="lastname" name="lastname" placeholder="&nbsp;&nbsp;Last Name">
                                    </div>
                                    </div>
                                    

                                    <div class="consumer-text-box">
                                        <input class="consumeremail" type="email" name="email" placeholder="&nbsp;&nbsp;your@email.com" required>
                                    </div>
                                    
                                    <div class="consumer-text-box">
                                        <input class="consumeremail" type="text" name="mobile" placeholder="&nbsp;&nbsp;Mobile No" required>
                                    </div>
                                    
                                    <div class="consumer-text-box">
                                        <input class="consumerpassword" type="password" name="password" placeholder="&nbsp;&nbsp;Password" required>
                                    </div>
                                    
                                    <div class="consumer-text-box" style="color:#fff; margin-bottom:10px !important; margin-top:10px !important;">
                                    By creating an account, you agree to our <span style="color:#336699;">terms & conditions</span>
                                    </div>
                                    
                                    <div class="consumer-text-box">
                                       <a class="consumer-text-box" href="B2B/user/home"><button class="consumersubmit">Create account</button></a>
                                    </div></form><br>
									 <form id="login_form" style="display:none;" action="<?=site_url('user/consumer_login')?>" method="post">
                                   
                                    

                                    
                                    
                                    <div class="consumer-text-box">
                                        <input class="consumeremail" type="text" name="username" placeholder="&nbsp;&nbsp;Mobile No" required>
                                    </div>
                                    
                                    <div class="consumer-text-box">
                                        <input class="consumerpassword" type="password" name="password" placeholder="&nbsp;&nbsp;Password" required>
										 <input class="consumerpassword" type="hidden" name="type" value="consumer">
                                    </div>
                                    
                                    <div class="consumer-text-box" style="color:#fff; margin-bottom:10px !important; margin-top:10px !important;">
                                    By creating an account, you agree to our <span style="color:#336699;">terms & conditions</span>
                                    </div>
                                    
                                   				<div class="col-md-12"><div class="col-md-4" style="padding-right:0px;">                                 <div class="merchant-login-text-box">                                 <button class="merchantlogin" type="submit" value="submit" name="signin">LOGIN</button>                                 </div>                              </div>                              <!--<div class="col-md-4" style="padding-right:0px;">                                 <div class="consumer-text-box">                                       <a class="consumer-text-box" href=""><button class="consumersubmit">Login</button></a>                                    </div>                              </div>-->                              <div class="col-md-8" style="padding-left:0px;">                                 <div class="merchant-reset-text-box">                                      <button  id="resetpass" class="consumerreset" >RESET PASSWORD</button>                                 </div>                              </div>                           </div>							  </form></br><div id="change_password" style="display:none;" ><form id="change_passwordx"  action="<?=site_url('user/changepassword')?>" method="post">                                                         <div class="consumer-text-box">                                        <input class="consumeremail" type="text" name="changeusername" placeholder="&nbsp;&nbsp;Mobile No" >                                    </div>    	                              <div class="col-md-8" style="padding-left:0px;">                                 <div class="merchant-reset-text-box">                                      <button id="reset2" class="consumersubmit">RESET PASSWORD</button>                                 </div>                              </div>							  </form>							  </div>							  
                                </div>
                                
                           
                        </div>
                        	<div class="clearfix"></div>
                    </div>
                        
                    </div>
                    <!-- Form Box ends -->
			</div>
        </div>
<style>
p{text-align:justify; font-size:20px; color:#5B5C5C;}
.aboutcenter{ font-size:20px; color:#5b5c5c; }
.aboutcenter2{ font-size:15px; color:#5b5c5c; }
</style>		
			<!----features----->
<script>
function login()
{

	$("#signup_form").hide();
	$("#login_form").show();		$("#change_password").hide();
	
}$( "#resetpass" ).on( "click", function() {    $("#signup_form").hide();	$("#login_form").hide();		$("#change_password").show();		});		
function signup()
{

	$("#signup_form").show();
	$("#login_form").hide();	$("#change_password").hide();
	
}
</script>
<footer style="margin:-4px 0 0 0;">
		<div class='container'>
			
		
			<div class='eight columns'>
				<div class="bottom-menu">
					<ul class="bottom-menu-list" > 
						<li style="color:white;" ><a href="http://www.paybuks.com/about-us.html">About Us</a></li>

						<li><a href="http://www.paybuks.com/what-we-do.html">Partner with Us</a></li> 

						<li><a href="#">Term & conditions</a></li>

						<li><a href="http://www.paybuks.com/career.html">Career</a></li>

						<li><a href="#">CustomerCare</a></li> 

						<li><a href="http://www.paybuks.com/contact-us.html">Contact Us</a></li> 

						<li><a href="http://www.paybuks.com/security.html">Security</a></li> 
					</ul>
                </div>
			<div class="bottom-image">
                <ul class="bottom-image-list"> 
                <span id="firstsicon"></span>
                <li><a target="_blank" href="https://www.facebook.com/pages/IRupaya-Payment-Solutions/979848098705369?fref=ts"><img src='<?php echo base_url();?>/assets/website_designs/img/face.png' style="width:20px;" ></a></li> <span id="firstsicon"></span>
                 <li><a target="_blank" href="https://twitter.com/paybuks"><img src='<?php echo base_url();?>/assets/website_designs/img/tiwer.png' style="width:20px;"></a></li>  <span id="firstsicon"></span>
                 <li><a href="#Sports"><img src='<?php echo base_url();?>/assets/website_designs/img/in.png' style="width:20px;"></a></li> <span id="firstsicon"></span>
                  <li><a href="#Country"><img src='<?php echo base_url();?>/assets/website_designs/img/google.png' style="width:20px;"></a></li> <span id="firstsicon"></span>
                   </ul>
          </div>

		
            <div>
            <h5>@ Copyright 2015 -Paybuks All rights reserved</h5>
            </div>
			<!--<div class='bottom-input'>
			<input type="text" name="name" value="Enter your Email">
            <button name="but1">Join</button>
			</div>-->
           <div class="bottom-image-card">
                <ul class="bottom-image-card-list"> 
               
                <li><a href="#News"><img src='<?php echo base_url();?>/assets/website_designs/img/visa.gif'  ></a></li> 
                 <li><a href="#Technology"><img src='<?php echo base_url();?>/assets/website_designs/img/card.gif'></a></li>  
                 <li><a href="#Sports"><img src='<?php echo base_url();?>/assets/website_designs/img/mastro.gif' ></a></li> 
                  <li><a href="#Country"><img src='<?php echo base_url();?>/assets/website_designs/img/paysafe.gif' ></a></li> 
                   <li><a href="#Sports"><img src='<?php echo base_url();?>/assets/website_designs/img/verified.gif'></a></li> 
                  <li><a href="#Country"><img src='<?php echo base_url();?>/assets/website_designs/img/skrill.gif' ></a></li> 
                  <li><a href="#Country"><img src='<?php echo base_url();?>/assets/website_designs/img/paypal.png' ></a></li> 
                  
                   </ul>

          </div>


		
		</div>
        </div>
       
	</footer>
	</body>
</html>

