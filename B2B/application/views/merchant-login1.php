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
		<link href="<?php echo base_url();?>/assets/website_designs/css/style.css" rel='stylesheet' type='text/css' />
   		 <!-- Custom Theme files -->
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
		
			<div id="home" class="merchant-header">
				<div class="container">
                	<!-- Header Start -->
					<div class="top-header">
						<!--<div class="col-lg-3">
							
						</div>-->
						<!----start-top-nav---->
                        <div class="col-lg-12">
						 <!--<nav class="top-nav">
							<ul class="top-nav" id="nav">
								<li class="active"><a href="" class="scroll">RECHAGER </a></li>
						    <li class="page-scroll"><a href="" class="scroll"><label id="list-bold">MONEY</label> TRANsFER</a></li>
						    <li class="page-scroll"><a href="" class="scroll"><label id="list-bold">TOUCH </label>-N-GO</a></li>
						    <li class="page-scroll"><a href="" class="scroll"><label id="list-bold">VOU</label>CHER </a></li>
							  <li class="contatct-active" class="page-scroll"><a href="#contact" class="scroll"><label id="list-bold">DISTRI</label>BUTOR</a></li>
							</ul>
							
						</nav>-->
                        
                        
                        <nav class="navbar">
                          <div class="container-fluid">
                            <div class="navbar-header">
                              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#iRupayabar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>                        
                              </button>
                              <a class="navbar-brand iRup" href="index.html"><img class="logo" src="<?php echo base_url();?>/assets/website_designs/img/logo final 1.png" title="logo" width="200" /></a>
                            </div>
                            <div class="collapse navbar-collapse" id="iRupayabar">
                              <ul class="nav navbar-nav">
                                <li><a href="#">RECHARGE</a></li>
                                <li><a href="../money-transfer.html"><span>MONEY</span>TRANSFER</a></li>
                                <li><a href="../touch-n-go.html"><span>TOUCH</span>-N-GO</a></li>
                                <li><a href="../voucher.html"><span>VOU</span>CHER</a></li>
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
                        
<style>
#consumer-heading{float:right; }

.merchant-login-text-box > button {
    background-color: #3ba56d;
    border: 1px solid #3ba56d;
    color: #fff;
    font-weight: bold;
    margin: 13px 0 0 5px;
    padding: 15px;
	width:100%;
}
.merchant-reset-text-box > button {
    background-color: #3ba56d;
    border: 1px solid #3ba56d;
    color: #fff;
    font-weight: bold;
    margin: 13px 0 0 28px;
    padding: 15px;
	width:91%;
}
</style>                        
                        
                      <!-- <div class="col-lg-3 pull-right text-right">
                        	<a href="#"></a>
                        </div>-->
						<div class="clearfix"> </div>
					</div>
                    
                    <!-- Header End -->
                    <!-- Form Box Starts -->
                    
                    <form action="<?=site_url('user/login')?>" method="post">
                    <div class="merchant-login">
                        <div class="col-lg-6" style="padding-left:0px; padding-right:0px; margin:0 -14px 0 0px;">
                            <div class="clearfix"></div>
                            <div class="tab-content pull-right">
                                <div id="mobile" class="tab-pane fade in active consumer-background">
                                    <div class="input-consumer">
                                        <label for="prepaid">MERCHANT <span style="font-weight:normal;">LOGIN</span></label>
                                    </div>                                    
                                    <div class="consumer-text-box">
                                        <input type="text" name="username" placeholder="&nbsp;&nbsp;User ID">
                                    </div>
                                    
                                    <div class="consumer-text-box">
                                        <input type="password" name="password" placeholder="&nbsp;&nbsp;Password">
                                    </div>
                                    
                                    <div class="col-md-12">
                                    <div class="col-md-4" style="padding-right:0px;">
                                       <div class="merchant-login-text-box">
                                       <button type="submit" value="submit" name="signin">LOGIN</button>
                                       
                                    </div>
                                    </div>
                                    <div class="col-md-8" style="padding-left:0px;">
                                    <div class="merchant-reset-text-box">
                                       <button>RESET PASSWORD</button>
                                    </div>
                                    </div></div>
                                    
                                    <br><br><br><br>
                                </div>
                                
                           
                        </div>
                        	<div class="clearfix"></div>
                    </div>
                        
                    </div>
                    </form>
                    <!-- Form Box ends -->
			</div>
        </div>
<style>
p{text-align:justify; font-size:20px; color:#5B5C5C;}
.aboutcenter{ font-size:20px; color:#5b5c5c; }
.aboutcenter2{ font-size:15px; color:#5b5c5c; }
</style>		
			<!----features----->

<footer style="margin:-4px 0 0 0;">
		<div class='container'>
			
			<div class='eight columns'>
				<div class="bottom-menu">
					<ul class="bottom-menu-list" > 
						<li style="color:white;" ><a href="../about-us.html">About Us</a></li>

						<li><a href="../what-we-do.html">Partner with Us</a></li> 

						<li><a href="#">Term & conditions</a></li>

						<li><a href="../career.html">Career</a></li>

						<li><a href="#">CustomerCare</a></li> 

						<li><a href="../contact-us.html">Contact Us</a></li> 

						<li><a href="../security.html">Security</a></li> 
					</ul>
                </div>
			<div class="bottom-image">
                <ul class="bottom-image-list"> 
                <span id="firstsicon"></span>
                <li><a target="_blank" href="https://www.facebook.com/pages/IRupaya-Payment-Solutions/979848098705369?fref=ts"><img src='<?php echo base_url();?>/assets/website_designs/img/face.png' style="width:20px;" ></a></li> <span id="firstsicon"></span>
                 <li><a target="_blank" href="https://twitter.com/irupaya"><img src='<?php echo base_url();?>/assets/website_designs/img/tiwer.png' style="width:20px;"></a></li>  <span id="firstsicon"></span>
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

