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

        

        		<div class="hire-icon"><a href="career.html"><img src="<?php echo base_url();?>assets/images/hire.png"></a></div>

                <div class="acc-icon">

                	<a class="btn-warning" href="invite-friends.html">Invite <br /> Friends</a>

                    <a href="mobile-app.html">MOBILE <br /> APP</a>

                </div>

            

            </div> <!-- fixed-links ends -->

        

        			<div class="top-bar">

            

                <div class="container">

                

                	<ul class="list-unstyled list-inline pull-right">

                    	<li><a href="sell.html">Sell</a></li>

                        <li><a href="check-transaction.html">Check transaction</a></li>

                        <li><a href="#">Track order</a></li>

                    </ul>

                

                </div> <!-- container ends -->

            

            </div> <!-- top-bar ends -->


            

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

                                <li><a href="<?php echo base_url(); ?>index.html">Shopping</a></li>

                                <li><a href="<?php echo base_url(); ?>consumer-login.html">Register</a></li>
                                
                            <!--     <li class="acc-login"><a class="btn-bg" href="B2B/index.php"><i class="fa fa-sign-in"></i> Login</a></li>-->

                              </ul>  
                               
                            </div>   
                            
                            
                                       

                        

    
                    </div>
                    
                    </div>
                    
                    
                    
                        <h1>Thank You</h1>
                        
                        
                    </div>

            </div>                       

                   

        

        </header> <!-- header ends -->

        

        <section class="inner-content">

        

        	<div class="container">

            

            	<div class="login-page">

                

                	<div class="login-details row">
<center>You have successfully logged out , <a href="<?php echo base_url() ?>/index.php" style="color:#EC971F;">click here </a>to login again.</center>
                    	
					

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

        

        <footer>

        	<div class="footer-top">

            <div class="container">

            

            	<div class="row">
<div class="col-sm-4 vline">

                   
    <div class="social">
    <span><img src="<?php echo base_url();?>assets/paybuks/images/logo_blue.png"></span>
 <ul class="list-unstyled">

                        	<li class="fb"><a href="">fb</a></li>

                            <li class="tweet"><a href="">tweet</a></li>

                            <li class="gplus"><a href="#">gplus</a></li>

                            <li class="pin"><a href="#">pin</a></li>

                        </ul>
                    
</div>
</div>

<div class="col-sm-4 vline">

                    


<h4>Information & Services</h4>

                        <ul class="list-inline">

                        	<li><a href="<?php echo base_url();?>about-us.html">About Us</a></li>
                        
                        <li><a href="<?php echo base_url();?>what-we-do.html">What we Do</a></li>

                        <li><a href="<?php echo base_url();?>partnerwithus.html">Partner with Us</a></li>

                        <li><a href="<?php echo base_url();?>terms-condition.html">Terms and Conditions</a></li>

                        <li><a href="<?php echo base_url();?>career.html">Career</a></li>

                        <li><a href="<?php echo base_url();?>customer-care.html">Customer Care</a></li>

                        <li><a href="<?php echo base_url();?>contact.html">Contact Us</a></li>

                        <li><a href="<?php echo base_url();?>security.html">Security</a></li>

                        </ul>      

                    </div>
                

                    

                    

                    

                    <div class="col-sm-4">

                    



                    	<h4>Stay Connect</h4>
                        <div class="input-group">
      <input type="text" class="form-control" placeholder="Email id">
      <span class="input-group-btn">
        <button class="btn btn-warning" type="button">Subscribe</button>
      </span>
    </div>
   



                    </div>

                    

                   

                

                </div> 

            

            </div> <!-- container ends -->

</div>
            

            <div class="foot-bottom">

            

            	<div class="container">

            

            	<span><img src="<?php echo base_url();?>images/payment.jpg"></span>

                <!--<div class="foot-links">

                	<ul class="list-unstyled">

                    	<li><a href="about-us.html">About Us</a></li>
                        
                        <li><a href="what-we-do.html">What we Do</a></li>

                        <li><a href="partnerwithus.html">Partner with Us</a></li>

                        <li><a href="terms-condition.html">Terms and Conditions</a></li>

                        <li><a href="career.html">Career</a></li>

                        <li><a href="customer-care.html">Customer Care</a></li>

                        <li><a href="contact.html">Contact Us</a></li>

                        <li><a href="security.html">Security</a></li>

                    </ul>

                </div>--> <!-- foot-links ends -->

                <p>@Copyright 2016-Viapaisa

 All rights reserved.</p>

                

                </div> <!-- container ends -->

                

            </div> <!-- foot-bottom ends -->

            

        </footer>

    

    

    </div> <!-- wrapper ends -->    

  

    



</body>

</html>

