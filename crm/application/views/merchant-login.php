<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    

    <title>Merchant Login | ViaPaise</title>

    

    <!-- style css -->

    <link href="<?php echo base_url();?>assets/css/style_index.css" rel="stylesheet" type="text/css">

    

    <!-- bootsrap css -->

   
    <link href="http://www.paybuks.com/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


    <!-- jquery -->

    <script type="text/javascript" src="http://www.paybuks.com/js/jquery-1.11.3.min.js"></script>

    

    <!-- bootsrap -->

    <script type="text/javascript" src="http://www.paybuks.com/js/bootstrap.min.js"></script>

    

    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

    

</head>



<body class="login">



	<div class="wrapper">

    

    	<header>

        	
 				 	<div class="fixed-links hidden-xs">

        

        		<!--<div class="hire-icon"><a href="career.html"><img src="<?php echo base_url();?>assets/images/hire.png"></a></div>-->

               
            

            </div> <!-- fixed-links ends -->

        

        			 <!-- top-bar ends -->


            

            <div class="head-inner">
            
            
            		<div class="head-top">
                    
                    
                    		<div class="navbar navbar-default">
<div class="container">

        <div class="navbar-header">
        
                     <button type="button btn-bg" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        
                                        <span class="sr-only">Toggle navigation</span>
        
                                        <span class="icon-bar"></span>
        
                                        <span class="icon-bar"></span>
        
                                        <span class="icon-bar"></span>
        
                                      </button>
                                      
                                     <div class="acc-login visible-xs">

     <a href="<?php echo base_url(); ?>index.php"><i class="fa fa-sign-in"></i> <span class="hidden-xs">Login</span></a>
                           
 </div>
        
                                
                                   
                                    <a class="navbar-brand" href="/"><img class="img-responsive" src="<?php echo base_url();?>assets/paybuks/images/logo_blue.png"></a>
        </div>
         
        


                    

                    	<!-- logo ends -->

                        

                        <!-- acc-login ends -->

                        

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        
                        
                                   <div class="acc-login hidden-xs">

      <a class="btn-warning" href="<?php echo base_url(); ?>index.php"><i class="fa fa-sign-in"></i> <span class="hidden-xs">Login</span></a>
                           
 </div>   

  
                        
                              <ul class="nav navbar-nav navbar-right">

                                <li class="active"><a href="<?php echo base_url();?>">Home</a></li>

                                <li><a href="<?php echo base_url(); ?>index.html">Recharge</a></li>

                                <li><a href="<?php echo base_url(); ?>send-money.html">Send Money</a></li>

                                <li><a href="<?php echo base_url(); ?>index.html">Ticket Booking</a></li>

                              <!--  <li><a href="<?php echo base_url(); ?>consumer-login.html">Register</a></li>-->
                                
                            <!--     <li class="acc-login"><a class="btn-bg" href="B2B/index.php"><i class="fa fa-sign-in"></i> Login</a></li>-->

                              </ul>  
                               
                            </div>   
                            
                            
                                       

                        

    
                    </div>
                    
                    </div>
                    
                    
                    
                        <h1>Merchant Login</h1>
                        
                        
                    </div>

            </div>                       

                   

        

        </header> <!-- header ends -->

        

        <section class="inner-content">

        

        	<div class="container">

            

            	<div class="login-page">

                

                	<div class="login-details row">
                    <div class="col-lg-12">        


							<form class="login-form" action="<?php echo base_url(); ?>user/login"  method="post" id="form-signin">
                            
                            	  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email or Mobile</label>
    <div class="col-sm-10">
      <input type="text" class="form-control">
    </div>
  </div>
  <br>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control">
    </div>
  </div>
                                <br>
                                <div class="form-group  col-lg-12">

                                <p>By Logging in you agree to our <a href="#">T&C </a> and that you have read our <a href="#">Privacy Policy</a></p>
                                
                                </div>
                                
                                

                                <div class="form-group col-lg-offset-3 col-lg-6 col-xs-12 login-btn">
                                <div class="col-lg-6 no-padding text-center">

                                	<a class=" btn btn-link forgot-link" href="#">forgot Password?</a>
                                    </div>
                                    <div class="col-lg-6 no-padding">
                                    

                                	<button type="submit" class="form-control btn-warning">Login</button>
                                    </div>
								</div>
                                    
                                 <!-- login-btn ends -->

                            </form>
                        
                            
                      </div>

<!----forget password----------->

<div id="welcomeDiv"  style="display:none;" class="answer_list" >

		    <form action="<?php echo base_url() ?>user/send_password" class="form-signin" method="post" id="form-signin">

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



                              

                           </div>

<!----------forget password ends------>             

                            

                        </div> <!-- login-form ends -->

                        

                    </div>    <!-- login-details ends -->

                        

                    </div> <!-- login-details ends -->

               

                </div> <!-- login-page ends -->                               
 </form>  
                                

            </div> <!-- container ends -->	

        </div>
        </div>
        </div>
       

        </section> <!-- inner-content ends -->

        

         <style>                   
                    
           /*footer*/
footer, .footerstyle { background:#2E2D36; }
.footer_menu { list-style: outside none none;padding: 0; }
.footer_menu li a { color:#fff; font-size:13px; }
.footer_menu li a:hover { color: #e4a124; }
.footer_div { padding-left: 8%;}
.copyright { text-align:center;margin:1%;color:#fff; }
.follow_us .fa {  font-size: 38px;color:#fff; }
.footer_logo { padding: 3% 15px; }
.followus_icon { font-size:12px;text-align: center; }
.margin_left { margin-left: -5px; }
/*.follow { margin-top:70px; }*/
.footer_menu_gap { margin-bottom:40px; }
.footer_icon:hover { font-size: 50px; }
.follow_us { margin-left: -4%;padding: 0; }
.footerstyle { color: #fff !important;font-size:14px; }
.no_padding { padding:0; }
/*footer ends*/    
</style>
    
                    <div class="footerstyle">
<div class="container content_white">
<a class="logo" href="#"><span><img src="<?php echo base_url();?>assets/paybuks/images/logo_blue.png"></span></a>


<div class="col-sm-12 footer_padding no_padding">
<br>
<div class="col-sm-3" style="color:#fff;">
<h3 style="margin-top:0">Partner with us:</h3> 
<p>ViaPaise is your Prepaid Stored Value Virtual Wallet. We provide a unique payment feature which makes sure that your transactions remain completely secure.</p>
<p>ViaPaise is looking for partners: Low investment costs, minimal setup hassles, high returns, and of course, the prestige of being associated with the fastest growing telecom company in India.
</p>
</div>

<div class="col-sm-3 footer_div">
<p class="no_margintop"><strong>Money Transfer</strong></p> 
<ul class="footer_menu footer_menu_gap">
			<li><a href="load_money.php">Load Money</a></li>
			<li><a href="send_money.php">Send Money</a></li>
			<li><a href="withdraw_money.php">Withdraw Money</a></li>
            <li><a href="pay_money.php">Pay Money</a></li>
		</ul>
        
        <p class="no_margintop"><strong>Recharges </strong></p> 
<ul class="footer_menu footer_menu_gap1">
			<li><a href="mobile_recharge.php">Mobile Recharges</a></li>
			<li><a href="dth_recharge.php">DTH Recharges</a></li>
			<li><a href="datacard_recharge.php">Data Card Recharges</a></li>
            <li><a href="shopping.php">Shopping</a></li>
		</ul>
</div>

<div class="col-sm-3">
<p class="no_margintop"><strong>Bill Payments</strong></p> 
<ul class="footer_menu footer_menu_gap">
			<li><a href="postpaid_billpayment.php">Postpaid Bill Payments</a></li>
			<li><a href="landline_billpayment.php">Landline Bill Payments</a></li>
			<li><a href="electricity_billpayments.php">Electricity Bill Payments</a></li>
            <li><a href="gas_billpayment.php">Gas Bill Payments</a></li>
			<li><a href="insurance_payment.php">Insurance Payment</a></li>
		</ul>
        
        <p class="no_margintop"><strong>Ticket Booking</strong></p> 
<ul class="footer_menu footer_menu_gap1">
			<li><a href="bus_ticketbooking.php">Bus Ticket Booking</a></li>
			<li><a href="air_ticketbooking.php">Air Ticket Booking</a></li>
			<li><a href="hotel_booking.php">Hotel Booking</a></li>
		</ul>
</div>

<div class="col-sm-3 follow_us">
<p class="no_margintop"><strong>Quick Links</strong></p>
<ul class="footer_menu">
<li><a href="index.php#about_us">About Us</a></li>
<li><a href="index.php#customer_services">Customer Services</a></li>
<li><a href="terms_condition.php#terms_condition">Terms and Conditions</a></li>
<li><a href="privacy.php#privacy">Privacy</a></li>
<li></li>
<li></li>
<li></li>
</ul>
<h3 class="follow">Follow Us</h3>
<br>
<div class="col-sm-3 no_padding margin_left" style="display:inline-block;">
<center><a href="#"><i class="fa fa-facebook footer_icon" aria-hidden="true"></i></a></center>
<p class="followus_icon">Facebook</p>
</div>
<div class="col-sm-3 no_padding" style="display:inline-block;">
<center><a href="#"><i class="fa fa-twitter footer_icon" aria-hidden="true"></i></a></center>
<p class="followus_icon">Tweeter</p>
</div>
<div class="col-sm-3 no_padding" style="display:inline-block;">
<center><a href="#"><i class="fa fa-linkedin footer_icon" aria-hidden="true"></i></a></center>
<p class="followus_icon">Linked In</p>
</div>
<div class="col-sm-3 no_padding" style="display:inline-block;">
<center><a href="#"><i class="fa fa-google-plus footer_icon" aria-hidden="true"></i></a></center>
<p class="followus_icon">Google Plus</p>
</div>
</div>
</div>
</div>
</div>
<footer>
<div class="container">
<hr style="border-color:#444,">
    <p class="copyright">Copyright © 2016 Via Paisa. All rights reserved.</p>
    </div>
</footer>

    

    

    </div> <!-- wrapper ends -->    

  

    



</body>

</html>

