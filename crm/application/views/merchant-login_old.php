<!DOCTYPE HTML>



<html>



   <head>



      <title>Paybuks Mobile Money</title>



      <link href="<?php echo base_url();?>/assets/website_designs/css/bootstrap.css" rel='stylesheet' type='text/css' />



      <link href="<?php echo base_url();?>/assets/website_designs/css/flexslider.css" rel='stylesheet' type='text/css' />



      <link href="<?php echo base_url();?>/assets/website_designs/css/animate.min.css" rel='stylesheet' type='text/css' />



      <link rel="shortcut icon" href="<?php echo base_url();?>/assets/website_designs/img/favicon_square.png" />



      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->		<script src="<?php echo base_url();?>/assets/website_designs/js/jquery.min.js"></script>		 <!---- start-smoth-scrolling---->		<script src="<?php echo base_url();?>/assets/website_designs/js/bootstrap.min.js"></script>		<script type="text/javascript" src="<?php echo base_url();?>/assets/website_designs/js/move-top.js"></script>		<script type="text/javascript" src="<?php echo base_url();?>/assets/website_designs/js/easing.js"></script>        <script type="text/javascript" src="<?php echo base_url();?>/assets/website_designs/js/jquery.flexslider.js"></script>		<script type="text/javascript">			jQuery(document).ready(function($) {				// Smooth scroll start				$(".down").click(function() {					$('html, body').animate({					scrollTop: $(".bg").offset().top					}, 2000);				});				// Smooth scroll end			});		</script>



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

<script type = "text/javascript" >

    history.pushState(null, null, 'index');

    window.addEventListener('popstate', function(event) {

    history.pushState(null, null, 'index');

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



                           <a class="navbar-brand iRup" href="index.html"><img class="logo" src="http://irupaya.com/B2B//assets/website_designs/img/logo final 1.png" title="logo" width="200" /></a>



                        </div>



                        <!-- Collect the nav links, forms, and other content for toggling -->



                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">



                           <ul class="nav navbar-nav">



                              <li><a href="#">RECHARGE</a></li>



                              <li><a href="money-transfer.html"><span>MONEY</span>TRANSFER</a></li>



                              <li><a href="touch-n-go.html"><span>TOUCH</span>-N-GO</a></li>



                              <li><a href="voucher.html"><span>VOU</span>CHER</a></li>



                              <li><a href="#"><span>DISTRI</span>BUTOR</a></li>



                              <li><a href="consumer-login.html"><span></span> <span style="color:#2E7295; font-weight:bold;"><img src="<?php echo base_url();?>/assets/website_designs/img/user.png">&nbsp;&nbsp;CONSUMER</span> LOGIN</a></li>



                              <li><a href="B2B/index.php"><span></span> <span style="color:#2E7295; font-weight:bold;"><img src="<?php echo base_url();?>/assets/website_designs/img/merchant.png">&nbsp;&nbsp;MERCHANT</span> LOGIN</a></li>



                           </ul>



                        </div>



                        <!-- /.navbar-collapse -->



                     </div>



                     <!-- /.container-fluid -->



                  </nav>



                  <nav class="navbar navsystemview">



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



                              <li><a href="http://www.irupaya.com/index.html">RECHARGE</a></li>



                              <li><a href="http://www.irupaya.com/money-transfer.html"><span>MONEY</span>TRANSFER</a></li>



                              <li><a href="http://www.irupaya.com/touch-n-go.html"><span>TOUCH</span>-N-GO</a></li>



                              <li><a href="http://www.irupaya.com/voucher.html"><span>VOU</span>CHER</a></li>



                              <li><a href="#"><span>DISTRI</span>BUTOR</a></li>



                           </ul>



                        </div>



                        <div >



                           <ul class="nav navbar-nav navbar-right">



                              <li class="dropdown" id="dropdown-top">



                                 <a class="dropdown-toggle" data-toggle="dropdown" href="#"><img class="indicator" src="<?php echo base_url();?>/assets/website_designs/img/Final_dup_03.png"></a>



                                 <ul class="dropdown-menu" style="background-color:#acd7e0;">



                                    <li><a href="http://www.irupaya.com/B2B/user/user_index"><span></span> <span style="color:#2E7295; font-weight:bold;"><img src="<?php echo base_url();?>/assets/website_designs/img/user.png">&nbsp;&nbsp;CONSUMER</span> LOGIN</a></li>



                                    <li><a href="http://www.irupaya.com/B2B/index.php"><span></span> <span style="color:#2E7295; font-weight:bold;"><img src="<?php echo base_url();?>/assets/website_designs/img/merchant.png">&nbsp;&nbsp;MERCHANT</span> LOGIN</a></li>



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



            <!-- Header End -->



            <!-- Header End -->





 <link rel="stylesheet" href="<?php echo base_url();?>/assets/validation/bootstrap.css">

    <link rel="stylesheet" href="<?php echo base_url();?>/assets/validation/formValidation.css">

	<script type="text/javascript" src="<?php echo base_url();?>/assets/validation/jquery.min.js"></script>

 

    <script type="text/javascript" src="<?php echo base_url();?>/assets/validation/formValidation.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>/assets/validation/bootstrap.js"></script>       



<script type="text/javascript">

$(document).ready(function() { 

    $('#form-signin').formValidation({

        message: 'This value is not valid',

        icon: {

            valid: 'glyphicon glyphicon-ok',

            invalid: 'glyphicon glyphicon-remove',

            validating: 'glyphicon glyphicon-refresh'

        },

        fields: {

            

            username: {

			row: '.merchant-text-box',

                validators: {

                    notEmpty: {

                        message: 'User name is required'

                    },

                   

                }

            },

			

			password: {

			row: '.merchant-text-box',

                validators: {

                    notEmpty: {

                        message: 'Password is required'

                    },

                }

            },    

          

            

           

            

          

        }

    });

});

</script>              

<script type='text/javascript'> 



function showDiv() {

   document.getElementById('welcomeDiv').style.display = "block";

   document.getElementById('welcomeDivs').style.display = "none";

}



 

</script>

            <!-- Form Box Starts -->

 <div id="welcomeDivs"    class="answer_list" >

            <form action="<?=site_url('user/login')?>" class="form-signin" method="post" action="" id="form-signin" >



               <div class="merchant-login">



                  <div class="col-lg-6" style="padding-left:0px; padding-right:0px; margin:0 -14px 0 0px;">



                     <div class="clearfix"></div>



                     <div class="tab-content pull-right">



                        <div id="mobile" class="tab-pane fade in active merchant-background">



                           <div class="input-consumer"> 



                           <label for="prepaid">MERCHANT <span style="font-weight:normal;">LOGIN</span></label> 



                           </div>



                           <div class="merchant-text-box">      



                              <input type="text" name="username" id="username"class="merchantformelement form-control" placeholder="&nbsp;&nbsp;User ID">                                    



                           </div>



                           <div class="merchant-text-box">



                           <input type="password" class="merchantformelement form-control" id="password" name="password" placeholder="&nbsp;&nbsp;Password">



                           <input class="consumerpassword" type="hidden" name="type" value="others">                                    



                           </div>



                           <div class="consumer-text-box" style="color:#fff; margin-bottom:10px !important; margin-top:10px !important;"> 



                           By Logging in you agree to our <a href="#" class="big-link" data-reveal-id="myModal" id="big-link"><span style="color:#336699;">T&C </span></a> and that you have read our <span style="color:#336699;">Privacy Policy</span>                                    </div>



                           <div class="col-md-12">



                              <div class="col-md-4" style="padding-right:0px;">



                                 <div class="merchant-login-text-box">



                                 <button class="btn-block merchantlogin"    type="submit" value="submit" name="signin">LOGIN</button>



                                 </div>



                              </div>

  </form>

                              <div class="col-md-8" style="padding-left:0px;">



                                 <div class="merchant-reset-text-box">     

 <!--<button class="btn-block merchantreset"    type="submit" value="submit" name="answer" onclick="showDiv()">FORGOT PASSWORD</button>-->

                              <input type="button" style="background-color: #3ba56d;border: 1px solid #3ba56d;color: #fff;" class="btn-block merchantreset" name="answer" value="FORGOT PASSWORD" onClick="showDiv()" />



                                 </div>



                              </div>



                           </div>



                           <br><br><br><br>                                



                        </div>



                     </div>



                     <div class="clearfix"></div>



                  </div>



               </div>

</div>

          



		  

		  

		  

		  

		  

		  

		  

		  

		  

		  

		  

		  

		  

		  

		  

		  

		  

		  

		  <div id="welcomeDiv"  style="display:none;" class="answer_list" >

		  

		    <form action="<?php echo base_url() ?>user/send_password" class="form-signin" method="post" action="" id="form-signin" >



               <div class="merchant-login">



                  <div class="col-lg-6" style="padding-left:0px; padding-right:0px; margin:0 -14px 0 0px;">



                     <div class="clearfix"></div>



                     <div class="tab-content pull-right">



                        <div id="mobile" class="tab-pane fade in active merchant-background">



                           <div class="input-consumer"> 



                           <label for="prepaid">Forget <span style="font-weight:normal;">Password</span></label> 



                           </div>



                           <div class="merchant-text-box">      



                              <input type="text" name="mobile_no" required id="username"class="merchantformelement form-control" placeholder="&nbsp;&nbsp;Mobile Number">                                    



                           </div>



                           

                           <div class="col-md-12">



                              <div class="col-md-4" style="padding-right:0px;">



                                 <div class="merchant-login-text-box">



                                 <button class="merchantreset"    type="submit" value="submit" name="Submit">FORGET PASSWORD</button>



                                 </div>



                              </div>

  </form>

                              



                           </div>



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



                     <li style="color:white;" ><a href="http://www.irupaya.com/about-us.html">About Us</a></li>



                     <li><a href="http://www.irupaya.com/what-we-do.html">Partner with Us</a></li>



                     <li><a href="http://www.irupaya.com/terms.html">Term & conditions</a></li>



                     <li><a href="http://www.irupaya.com/career.html">Career</a></li>



                     <li><a href="#">CustomerCare</a></li>



                     <li><a href="http://www.irupaya.com/contact-us.php?msg=1">Contact Us</a></li>



                     <li><a href="http://www.irupaya.com/security.html">Security</a></li>



                  </ul>



               </div>



               <div class="bottom-image">



                  <ul class="bottom-image-list">



                     <span id="firstsicon"></span>                



                     <li><a target="_blank" href="https://www.facebook.com/pages/IRupaya-Payment-Solutions/979848098705369?fref=ts"><img src='<?php echo base_url();?>/assets/website_designs/img/face.png' style="width:20px;" ></a></li>



                     <span id="firstsicon"></span>                 



                     <li><a target="_blank" href="https://twitter.com/irupaya"><img src='<?php echo base_url();?>/assets/website_designs/img/tiwer.png' style="width:20px;"></a></li>



                     <span id="firstsicon"></span>                 



                     <li><a href="#Sports"><img src='<?php echo base_url();?>/assets/website_designs/img/in.png' style="width:20px;"></a></li>



                     <span id="firstsicon"></span>                  



                     <li><a href="#Country"><img src='<?php echo base_url();?>/assets/website_designs/img/google.png' style="width:20px;"></a></li>



                     <span id="firstsicon"></span>                   



                  </ul>



               </div>



               <div>



                  <h5>@ Copyright 2015 -IRUPAYA All rights reserved</h5>



               </div>



               <!--<div class='bottom-input'>			<input type="text" name="name" value="Enter your Email">            <button name="but1">Join</button>			</div>-->           



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





 <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/reveal.css">	

		<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>

		<script type="text/javascript" src="<?php echo base_url()?>/assets/js/jquery.reveal.js"></script>

	    <div id="myModal" class="reveal-modal modal-box" style='height:500px; line-height:30px; font-size:11px !important; width:600px !important; overflow: auto;'>

     

   <h3>Terms and Conditions</h3> 

 <p class="aboutmaincontent" style='font-size:12px; height:400px; width:520px; line-height: 30px; color: windowframe;'> Before registering with IRUPAYA, you are required to read and accept the below Terms &amp; Conditions. By continuing with registration for IRUPAYA, it shall be deemed that, YOU HAVE EXPRESSLY AGREED TO BE BOUND BY THE FOLLOWING TERMS &amp; CONDITIONS.<br>





These Terms &amp; Conditions form an agreement between you and IRUPAYA PATMENT SOLUTIONS PVT LTD that governs your access to IRUPAYA login and use of IRUPAYA service to facilitate the purchase of goods/services or utility/essential service from merchants that has tied up with IRUPAYA. You are free to call our toll free no. or visit the nearest branch in case of any doubt or for clarification (if any).<br>

<strong>1. Terms</strong>



The following defined terms appear in these Terms &amp; Conditions.



 <strong>a) Issuer/We/Company</strong>



Issuer/we/Company mentioned hereunder refers to IRUPAYA<a name="_GoBack"></a>that operates payment systems by issuing prepaid payment instruments to individual/organizations, as per the authorization received from the Reserve Bank of India.<br>



<strong>b) Holder/Customer/ You/Buyer</strong><br>



Individual/organization who has registered with the Company for availing the IRUPAYA service for purchase of goods &amp; services and utility/essential bill settlements, including Domestic Money Transfer Services (DMTS).<br>



<strong>c) Merchant</strong><br>



A person/retail establishment/ institution, who ties up/ registers via a separate registration process for providing IRUPAYA service and is governed by the terms therein.<br>



<strong>d) IRUPAYA</strong><br>



IRUPAYA is Pre-paid Payment Instrument of the Company that facilitates purchase of goods and services &amp; other utility bills /essential services, including DMTS, against the value stored in IRUPAYA. The value stored on such instruments represents the value paid for by the customer by cash or bank mode after prescribed deductions.<br>



<strong>e) Product</strong><br>



Products offered by the Company to customers via IRUPAYA Application/Site.<br>



<strong>f) Pre-paid Payment Instrument</strong><br>



IRUPAYA is a virtual card that can be accessed by allotted login ID/User ID &amp; transaction can be done by using secret &ldquo;MPIN&rdquo; password that is issued to the customer by Issuer.<br>



<strong>g) Payment Transaction</strong><br>



The processing of a payment Service through mobile/ internet / IVRS that result in the debiting or charging of the IRUPAYA balance of the customer and the crediting of Merchant&#39;s account.<br>



<strong>h) Login &amp; MPIN</strong><br>



Login/User ID is used to access the IRUPAYA&amp; MPIN which is secret digit password. Both are simultaneously issued to the customer by the Issuer immediately after IRUPAYA registration for authenticating transaction at the time of making a payment to the Merchant.<br>



<strong>i) OPT</strong><br>



OTP is One Time Password generated for validating the customer registered mobile number and for proceeding with the transactions<br>



<strong>j) Merchant Code</strong><br>



A digit numerical code issued to the Merchant by the Issuer after the formal tie up for facilitating IRUPAYA service to customers that is prominently displayed at the Merchant counter to be used while making payment.<br>



<strong>k) NFC CARD</strong><br>



NFC is a smart card issued by the Company to customer/merchant to identify the customer and merchant details and the amount of transaction initiated by them.<br>



<strong>l) IRUPAYA Mobile Application/Mobile Application/Application</strong><br>



A mobile application through which customer/Merchant can carry out the IRUPAYA transactions. IRUPAYA Mobile Application requires a smart phone with GPRS connectivity for its operations.<br>



 <strong>m) IRUPAYA Site</strong><br>



 IRUPAYA Site refers to&nbsp;<a href="http://www.irupaya.com">www.irupaya.com</a><br>



 Coupon Redemption<br>



 <strong>N) Coupon redemption</strong><br>



 Coupon redemption is purely subjected to standard and specified terms and conditions mentioned by the respective retailer. Coupons are issued on behalf of the respective retailer. Hence, any damages, injuries, losses incurred by the end user by using the coupon is not the responsibility of irupaya.com<br>



 <strong>2. Registration Requirements &amp; Process</strong><br>



 <strong>a) For Customers</strong><br>



 <strong>Basic Requirement</strong>&nbsp;- By accepting these terms &amp; conditions or by otherwise using the Services of the Site, you represent that you are at least 18 years of age and have not been previously suspended or removed from the Services. You represent and warrant that you have the right, authority and capacity to enter into this Agreement and to abide by all the terms &amp; conditions of this Agreement. You shall not impersonate any person, entity or falsely state or otherwise misrepresent identity, age or affiliation with any person or entity.<br>



 <strong>Requirements for Registration</strong>&nbsp;- IRUPAYA Registration is not mandatory for signing up/logging in. However, Registration is mandatory for transactions above Rs.10,000/-. For registration, you must submit (1) valid Photo ID Proof &amp; (2) valid Address Proof (mentioned below) along with IRUPYA Application Form at the nearest branch of the Company or shall submit the same by scanning them with the scanner provided in the Application and uploading them. Registration through Application is currently unavailable &amp; will be extended to the Customers in a short span.<br>





 <strong>Sign up / Logging in</strong>&nbsp;- Existing customers shall log in using their User ID. New users shall sign up/register as per requirement. Customer Mobile number will be validated by generating an OTP and will be sent to the Registered Mobile number of the Customer. By submitting the thus received OTP, you shall be directed to the page where you can opt for the service you need. Simultaneously with the registration, a Customer MMID will be generated, which will be visible to you in your application. By clicking the same, you will get the MMID in your registered mobile number as SMS. For transactions requiring MMID, you shall enter this MMID and proceed for initiating transactions through IRUPAYA.<br>



 <strong>Accepted Address / ID proofs</strong><br>



 Passport / Voter&#39;s ID card / Aadhar Card / Driving License / Ration Card which has a photograph of the applicant.<br>



 <strong>Accepted Photo ID proofs</strong><br>



 PAN Card or PSU/Government Department/Defence ID Cards or Photo Credit Card (not expired &amp; must be primary card holder)<br>



 <strong>b) For Merchant registration</strong><br>



 All interested shops and service establishments can tie-up with Issuer for IRUPAYA. Merchant will have to register by submitting the required details including its Bank details and requisite ID copy. ID copy shall be scanned using the scanner provided in this application and submitted. Annual Subscription fees will be charged, which can be paid later and deducted from the first transaction. After checking the documents, a login User ID &amp; Merchant Code will be given to Merchant for logging in to the application &amp; for effecting transactions. The Merchant list will be displayed in Merchant List Screen provided in Company&#39;s website.<br>



 <strong>c) Loading / Re-loading</strong><br>



 Customers/Merchants can load/re-load theirIRUPAYA Account via Internet Banking or Credit/Debit Card payment or by remitting in cash mode at any of the Company&#39;s branch across India. Balance in the IRUPAYA Account at any point of time cannot exceed Rs.25,000/-.<br>



 <strong>3. Payment Transaction Processing</strong><br>



 <strong>a) For Customers</strong><br>



 IRUPAYA facilitates the customers to send money to beneficiary Bank Account (Domestic Money Transfer Service with strict compliance to DMTS rules), send money to another IRUPAYA Account and for Merchant payments. Merchant payment includes payment towards purchase of goods &amp; services and settlement of utility bills/ essential services viz. electricity bills, water bills, telephone/mobile phone bills, insurance premium, cooking gas payments, rental for internet/Broadband connections, Cable/DTH subscription and Citizen services by Government or Government bodies. Merchant payment is possible only where such Merchant is IRUPAYA enabled. All transactions can be processed through this application with GPRS connection. Customers/Merchants are also able to transact through Company&#39;s website using the User ID &amp; MPIN provided.<br>



 By signing into this application, Customer authorizes the Issuer to charge or debit to Buyer&#39;s Payment Instrument as necessary to complete processing of a Payment Transaction.<br>





 <strong>Note</strong>&nbsp;- Customer acknowledge and agree that the Merchant payments are towards the purchases of Products / services or utility payments between the Customer and the Merchant and not with the Company / IRUPAYA. Company / IRUPAYA is not a party to the purchase of Products/Services and Company / IRUPAYA is not a buyer or a Merchant in connection with any Payment Transaction, unless expressly designated as such in the listing of the Product.<br>



 <strong>b) For Merchants</strong><br>



 Merchants may view their last five transactions in the Balance Report in this application. Daily business collection will be credited to merchant&#39;s bank account on the next day if the amount due is Rs.1000/- or above, or else as per merchant request. For security reasons no SMS will be send for any transaction or for loading confirmation.<br>



 

 <strong>Note</strong>&nbsp;- IRUPAYA may delay payment processing of suspicious transactions/ transactions which may involve fraud, misconduct, or violate applicable law, or other applicable IRUPAYA policies, as determined in IRUPAYA&rsquo;s sole and absolute discretion.<br>



 <strong>4. No Endorsement of Products</strong><br>



 IRUPAYA don&#39;t endorse the quality/ merchantability of the goods/service, you opt to thus purchase / avail using IRUPAYA.<br>



 <strong>5. Permissible Payment Transactions</strong><br>



 You may use IRUPAYA Application/Site solely for processing Payment Transaction towards purchase of goods /services and utility bills/essential services that is purchased from a Merchant through a legitimate, bonafide sale of the Product or Domestic Money Transfer Service. IRUPAYA services can not be used for cross boarder transactions.<br>



 IRUPAYA must not be used to receive cash advances from Merchants or to facilitate the purchase of cash equivalents (travellers cheques, prepaid cards, money orders, etc.). IRUPAYA services shall not be used to process Payment Transactions in connection with the sale or exchange of any illegal goods or services or any other underlying illegal transaction. In particular, you shall not use IRUPAYA or process Payment Transactions in connection with the sale/purchase of goods or services, or other remittances that are prohibited &amp; against the law of the land. Company reserves the right to suspend or terminate your use of IRUPAYA, in the event of non-compliance of the above.<br>



 <strong>6. Buyer Responsibility for Taxes</strong><br>



 Payment of any applicable taxes (if any) arising from the use of IRUPAYA is customer&#39;s responsibility. Customer hereby agrees to comply with all the applicable tax laws, including the reporting and payment of any taxes arising in connection with Payment Transactions.<br>



 <strong>7. Validity, Refunds &amp; Redemptions</strong><br>



 IRUPAYA Registration shall be valid for a period of one year from date of successful registration and can be renewed thereafter by giving instruction for renewal through this application or directly by visiting the nearest branch. All Payment Transactions processed through the IRUPAYA are non-refundable to the customer and are non-reversible by Buyer through the IRUPAYA. The loaded amount is interest free &amp; redeemable only if the scheme is wound up as per RBI guidelines.<br>



 <strong>8. Limitations on the Use of Service</strong><br>



 Issuer may establish general practices and limits concerning the use of IRUPAYA, including without limiting individual or aggregate transaction limits on the rupee amount or number of Payment Transactions during any specified time period(s), in accordance with the guidelines of the Reserve Bank of India. We do not warrant that the functions contained in IRUPAYA will be uninterrupted or error free and we shall not be responsible for any service interruptions (including, but not limited to, power outages, system failures, mobile errors or other interruptions that may affect the receipt, processing, acceptance, completion or settlement of Payment Transactions).<br>



 <strong>9. Issuer Not A Banking Institution</strong><br>



 Issuer processes Payment Transactions on behalf of Merchants. Issuer is not a bank. Funds held by the Issuer in connection with the processing of IRUPAYA Payment Transactions are not deposit obligations of the customer and are not insured for the benefit of customers by any governmental agency. Such funds are interest free and are maintained only for making payments to the participating merchants. No loan is permissible against such deposits.<br>



 <strong>10. Termination of Service</strong><br>



 Issuer may, in our sole and absolute discretion without liability to you or any third party, terminate your use of IRUPAYA for any reason, including serious breach/violation of any Terms &amp; Conditions. Upon termination, we have the right to prohibit your access to IRUPAYA until the breach / violation is sorted out to the satisfaction of Issuer and regulatory authorities.<br>



 <strong>11. Unclaimed Property</strong><br>



 If issuer is holding funds due to customer / merchant arising from a Payment Transaction processed through IRUPAYA or otherwise, and the Company is unable to contact concerned customer / merchant and have no record of their use of IRUPAYA for several years, applicable law may require the Company to report these funds as unclaimed property. In such events, the Company will try its best to locate such customer/merchant at the address provided at the time of registration/last updated address. But if unable to locate, Company may be required to deliver any such funds to the applicable state as unclaimed property. Company reserves the right to deduct a dormancy fee or other administrative charges from such unclaimed funds, as permitted by applicable law.<br>



 <strong>12. Privacy</strong><br>



 Customer understand and agree that personal information provided to the Company via this application is subject to the IRUPAYA Privacy Policy.<br>



 <strong>13. Intellectual Property</strong><br>



 This application &amp;IRUPAYA are the sole and exclusive property of the Company. Company retains all right, title and interest (including all copyright, trademark, patent, trade secrets, and all other intellectual property rights) of the Site &amp;IRUPAYA. The Site &amp;IRUPAYA is protected by copyright, trademark, patent, trade secrets, unfair competition, and other laws of worldwide, through the application of local laws or international treaties. Any unauthorized use, reproduction or modification of this Site may violate such laws. Customer/Merchant shall immediately bring to the notice of the Issuer, all matters regarding infringement and/or misuse of the same, within their knowledge &amp; information.<br>



 <strong>14. Use of Electronic Communications</strong><br>



 Issuer may communicate with customer regarding IRUPAYA or other Services of the Issuer by means of electronic communications, including (a) sending electronic mail / text message to the email address / Mobile Number provided by customer at the time of registration, or (b) posting notices or communications on IRUPAYA Web Site and such communications will be deemed to be received by the customer. Customer will keep themself updated with such communications hosted in www.irupaya.com site email us <a href="mailto:support@irupaya.com">support@irupaya.com</a>clarification/information.<br>



 <strong>15. Severability Assignment</strong><br>



 The failure of IRUPAYA to exercise or enforce any right or provision of the Terms shall not constitute a waiver of such right or provision. If any provision of these Terms shall be adjudged by any court of competent jurisdiction to be unenforceable or invalid, that provision shall be limited or eliminated to the minimum extent necessary so that these Terms of IRUPAYA shall otherwise remain in full force and effect and remain enforceable between the parties. Headings are for reference purposes only and in no way define, limit, construe or describe the scope or extent of such section.<br>



 <strong>16. Indemnification</strong><br>



 Customer agree to indemnify, defend and hold harmless Issuer and its affiliates, and its and their directors, managers, officers, owners, agents (collectively &quot;Indemnified Parties&quot;) from and against any and all claims, demands, causes of action, debt or liability, including reasonable attorney&rsquo;s fees, including without limitation attorney&rsquo;s fees and costs incurred by the Indemnified Parties arising out of, related to, or which may arise from: (i) their use of the IRUPAYA Service; (ii) any breach or non-compliance by them of any terms or any of IRUPAYA&rsquo;s policies; (iii) any dispute or litigation caused by their actions, commission or omissions; or (iv) your negligence/violation of any law or rights of a third party.<br>



 



 It shall be the sole responsibility of the customer to safe keep the security keys (User ID &amp; MPIN) provided by the Company. Customer shall be solely responsible and liable for any loss caused to him due to theft of mobile/any device (wherein the application is saved and operated) or use of your account by any unauthorised person (on ground of negligence or otherwise) and shall keep the Company indemnified against any claims / proceedings.<br />

Upon any theft / loss of the mobile or suspected unauthorised use, Customer should immediately take steps to block the IRUPAYA account by calling the customer care number of the Company or by visiting any branch.<br>



 <strong>17. Disclaimer of Warranties</strong><br>



 THE IRUPAYA SERVICE, INCLUDING ALL CONTENT, SOFTWARE, FUNCTIONS, MATERIALS, AND INFORMATION MADE AVAILABLE ON, PROVIDED IN CONNECTION WITH OR ACCESSIBLE THROUGH THE IRUPAYA SERVICE, IS PROVIDED &quot;AS IS&quot; BASIS. TO THE FULLEST EXTENT PERMISSIBLE BY LAW, ISSUER AND ITS AFFILIATES, MAKE NO REPRESENTATION OR WARRANTY OF ANY KIND WHATSOEVER FOR THE SERVICE OR THE CONTENT, MATERIALS, INFORMATION AND FUNCTIONS MADE ACCESSIBLE BY THE SOFTWARE USED ON OR ACCESSED THROUGH THE IRUPAYA SERVICE, OR FOR ANY BREACH OF SECURITY ASSOCIATED WITH THE TRANSMISSION OF SENSITIVE INFORMATION THROUGH THE IRUPAYA SERVICE. EACH IRUPAYA PARTY DISCLAIMS WITHOUT LIMITATION, ANY WARRANTY OF ANY KIND WITH RESPECT TO THE SERVICE, NON INFRINGEMENT, MERCHANTABILITY, OR FITNESS FOR A PARTICULAR PURPOSE. THE IRUPAYA PARTIES DO NOT WARRANT THAT THE FUNCTIONS CONTAINED IN THE SERVICE WILL BE UNINTERRUPTED OR ERROR FREE. THE ISSUER SHALL NOT BE RESPONSIBLE FOR ANY SERVICE INTERRUPTIONS, INCLUDING, BUT NOT LIMITED TO, SYSTEM FAILURES OR OTHER INTERRUPTIONS THAT MAY AFFECT THE RECEIPT, PROCESSING, ACCEPTANCE, COMPLETION OR SETTLEMENT OF PAYMENT TRANSACTIONS OR THE SERVICE.<br>



 <strong>18. Limitations of Liability; Force Majeure</strong><br>



 TO THE FULLEST EXTENT PERMISSIBLE BY LAW, IN NO EVENT SHALL ISSUER BE RESPONSIBLE OR LIABLE TO BUYER OR ANY THIRD PARTY UNDER ANY CIRCUMSTANCES FOR ANY INDIRECT, CONSEQUENTIAL, SPECIAL, PUNITIVE OR EXEMPLARY, DAMAGES OR LOSSES, INCLUDING BUT NOT LIMITED TO DAMAGES FOR LOSS OF PROFITS, GOODWILL, USE, DATA, OR OTHER INTANGIBLE LOSSES WHICH MAY BE INCURRED IN CONNECTION WITH ANY IRUPAYA SERVICE, OR ANY GOODS, SERVICES, OR INFORMATION PURCHASED, RECEIVED, SOLD, OR PAID FOR BY WAY OF THE SERVICE, REGARDLESS OF THE TYPE OF CLAIM OR THE NATURE OF THE CAUSE OF ACTION, EVEN IF THE ISSUER HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGE OR LOSS. IN NO EVENT SHALL THE ISSUERS TOTAL CUMULATIVE LIABILITY ARISING FROM OR RELATING TO IRUPAYA EXCEED THE NET FEES IRUPAYA HAS ACTUALLY RECEIVED AND RETAINED FROM THE BUYER&#39;S VALID PAYMENT TRANSACTIONS DURING THE THREE MONTH PERIOD IMMEDIATELY PRECEDING THE DATE OF THE CLAIM.<br>



 



 Each party acknowledges that the other party has entered into these Terms of Service relying on the limitations of liability stated herein and that those limitations are an essential basis of the bargain between the parties. In addition to and without limiting any of the foregoing, Issuer shall not have any liability for any failure or delay resulting from any condition beyond the reasonable control of the Issuer, including but not limited to governmental action or acts of terrorism, earthquake, fire, flood, labour conditions, power failures and Internet disturbances.<br>



 



 Company is not liable for the internet access device or password obtaining device used by the Customer (such as Computer or mobile phones, etc.) or proper functioning of its hardware software before, during or after the use of IRUPAYA application/site. Company will not take the liability for any virus or unlawful downloads that Customer system may be exposed to while accessing the internet for using the application / site.<br>





 <strong>19. Governing Law</strong><br>



 This Agreement shall be governed by and construed in accordance with the laws of India.<br>



 <strong>20. Disputes</strong><br>



 IRUPAYA may provide various tools to assist Customers in communicating with each other to resolve a dispute that may arise between Buyers and Merchants with respect to IRUPAYA transaction. Customer agree that you will not involve IRUPAYA in any litigation or other dispute arising out of or related to any transaction or arrangement purely between the customer and the Merchant, advertiser or other third party. If you attempt to do so, (i) you shall pay all costs and attorney&rsquo;s fees of Issuer and shall provide indemnification as set forth below, and (ii) the jurisdiction for any such litigation or dispute shall be limited as set forth below.<br>



 

 Any dispute/ controversy arising out or in connection with IRUPAYA shall be referred to an arbitrator appointed by the Issuer as per the Arbitration &amp; Conciliation act, 1996 &amp; its amendments (if any) &amp; will be subject to the jurisdiction of courts at Chennai Tamil Nadu, India.<br>



 

 Headings to the Clauses of this Agreement are inserted for convenience only and shall not affect the construction or interpretation of this Agreement.</p>

 </div>



      </footer>



   </body>



</html>