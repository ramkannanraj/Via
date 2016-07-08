<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    
    <title>Merchant Login</title>
    
    <!-- style css -->
    <link href="http://paybuks.com/style.css" rel="stylesheet" type="text/css">
    
    <!-- bootsrap css -->
    <link href="http://paybuks.com/css/bootstrap.css" rel="stylesheet" type="text/css">
     
    <!-- jquery -->
    <script type="text/javascript" src="http://paybuks.com/js/jquery-1.11.3.min.js"></script>
    
    <!-- bootsrap -->
    <script type="text/javascript" src="http://paybuks.com/js/bootstrap.min.js"></script>
    
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    
</head>

<body class="page">

	<div class="wrapper">
    
    	<header>
        
            <div class="fixed-links">
        
        		<div class="hire-icon"><a href="page4.html"><img src="http://paybuks.com/images/hire.png"></a></div>
                <div class="acc-icon">
                	<a class="btn-bg" href="#">MY <br /> ACCOUNT</a>
                    <a href="#">MOBILE <br /> APP</a>
                </div>
            
            </div> <!-- fixed-links ends -->
        
        	
            
            <div class="head-inner-mer">
            
            	            
            	<div class="container">
                
                	<div class="head-top">
                    
                    	<div class="logo">
                        	<a href="/"><img src="http://paybuks.com/images/logo.png"></a>
                        </div> <!-- logo ends -->
                        
                        <div class="acc-login">
                        	<a class="btn-bg" href="#">Login</a>
                        </div> <!-- acc-login ends -->
                        
                        <nav class="navbar navbar-default">
                          <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                              </button>
                           <!--   <a class="navbar-brand" href="#">Brand</a>  -->
                            </div>
                        
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                              <ul class="nav navbar-nav">
                                <li class="active"><a href="/">Home</a></li>
                                <li><a href="#">Recharge</a></li>
                                <li><a href="#">Send Money</a></li>
                                <li><a href="#">Shopping</a></li>
                                <li><a href="#">Register</a></li>
                              </ul>                             
                            </div><!-- /.navbar-collapse -->
                          </div><!-- /.container-fluid -->
                        </nav>                 
                        
                    
                    </div> <!-- head-top ends --> 
</div>					
                    <div class="mer-title">merchant login</div>
					<div class="mer-subtitle">Home / Merchant Login</div>
        
        </header> <!-- header ends -->
        
        
        <section class="inner-content page-content">
        
        	<div class="container">
            
            	<div class="partner-Paybuks partner-Paybuks-margin">
                
                	<h2 class="h2height"><img src="http://paybuks.com/images/mer_login.png" class="mer-img" />MERCHANT LOGIN</h2>                    
                    
                    <div class="partner-inner partner-inner-mer">
                    <h1 style="margin-top:20px;">Login</h1>                  
                    <p>A little information is all we need to authenticate.</p>
                    <div class="width50">
                    <form action="user/login" class="form-signin" method="post" action="" id="form-signin" >
                    	<div class="row">
                            <input type="text" name="username" id="username"class="btn_round bordercolor" placeholder="&nbsp;&nbsp;User ID">
                                                     
                            	<input type="password" class="btn_round bordercolor" id="password" name="password" placeholder="&nbsp;&nbsp;Password">
                           <input class="consumerpassword" type="hidden" name="type" value="others">
                           
								<a href="#" onClick="showDiv()" class="forget">Forget Password?</a>
                                <button class="btn-bg btn_round" type="submit" value="submit" name="signin">LOGIN</button>
                           
                        </div>
                    </form>
                    
                    
<!----forget password----------->
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
<!----------forget password ends------>                    
                    </div>
                    </div> <!-- partner inner ends -->
                
                </div> <!-- partner-Paybuks
 ends -->
                
                                
            </div> <!-- container ends -->	
        
        </section> <!-- inner-content ends -->
        
        <footer class="footer_color">
        	
            <div class="container">
            
            	<div class="row">
                
                	<div class="col-sm-3">
                    
                    	<h5>Mobile Recharges</h5>
                        <ul>
                        	<li><a href="#">Vodafone Recharge</a></li>
                            <li><a href="#">Airtel Recharge</a></li>
                            <li><a href="#">Aircel Recharge</a></li>
                            <li><a href="#">Idea Recharge</a></li>
                            <li><a href="#">more..</a></li>
                        </ul>
                    
                    </div>
                    
                    <div class="col-sm-3">
                    
                    	<h5>Dth Recharges</h5>
                        <ul>
                        	<li><a href="#">Airtel DTH Recharge</a></li>
                            <li><a href="#">Videocon D2H Recharge</a></li>
                            <li><a href="#">Dish Tv Recharge</a></li>
                            <li><a href="#">Tata Sky Recharge</a></li>
                            <li><a href="#">more..</a></li>
                        </ul>
                    
                    </div>
                    
                    <div class="col-sm-3">
                    
                    	<h5>Bill Payments</h5>
                        <ul>
                        	<li><a href="#">Mobile Bill Payment</a></li>
                            <li><a href="#">Landline Bill Payment</a></li>
                            <li><a href="#">Datacard Bill Payment</a></li>
                            <li><a href="#">Electricity Bill Payment</a></li>
                            <li><a href="#">more..</a></li>
                        </ul>
                    
                    </div>
                    
                    <div class="col-sm-3 social">
                    
                    	<span><img src="http://paybuks.com/images/foot-logo.jpg"></span>
                        
                        <ul>
                        	<li class="fb"><a href="#">fb</a></li>
                            <li class="tweet"><a href="#">tweet</a></li>
                            <li class="gplus"><a href="#">gplus</a></li>
                            <li class="pin"><a href="#">pin</a></li>
                        </ul>
                    
                    </div>
                
                </div> 
            
            </div> <!-- container ends -->
            
            <div class="foot-bottom">
            
            	<div class="container">
            
            	<span><img src="http://paybuks.com/images/payment.jpg"></span>
                <div class="foot-links">
                	<ul>
                    	<li><a href="#">About Us</a></li>
                        <li><a href="#">Partner with Us</a></li>
                        <li><a href="#">Terms and Conditions</a></li>
                        <li><a href="#">Career</a></li>
                        <li><a href="#">Customer Care</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                        <li><a href="#">Security</a></li>
                    </ul>
                </div> <!-- foot-links ends -->
                <p>@Copyright 2015-Paybuks
 All rights reserved.</p>
                
                </div> <!-- container ends -->
                
            </div> <!-- foot-bottom ends -->
            
        </footer>
    
    
    </div> <!-- wrapper ends -->

    

</body>
</html>
