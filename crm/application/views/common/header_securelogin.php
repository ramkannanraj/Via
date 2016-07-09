<head>
    <title>Via Paise Smart Payment</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta name="description" content="Blue Moon - Responsive Admin Dashboard" />
    <meta name="keywords" content="Notifications, Admin, Dashboard, Bootstrap3, Sass, transform, CSS3, HTML5, Web design, UI Design, Responsive Dashboard, Responsive Admin, Admin Theme, Best Admin UI, Bootstrap Theme, Wrapbootstrap, Bootstrap, bootstrap.gallery" />
    <meta name="author" content="Bootstrap Gallery" />
    
    
    <link rel="shortcut icon" href="<?php echo base_url()?>/assets/viapaisa/css/images/favicon_square.png">
   <!-- MY STYLESHEET -->
<link rel="stylesheet" href="<?php echo base_url()?>/assets/viapaisa/css/style.css" type="text/css" />

<!-- BOOSTRAB STYLESHEET -->
<link rel="stylesheet" href="<?php echo base_url()?>/assets/viapaisa/css/bootstrap.min.css" type="text/css" />

<!-- MENU CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/assets/viapaisa/css/jPushMenu.css" />

<!-- DEFAULT SCRIPT -->
<script type="text/jscript" src="<?php echo base_url()?>/assets/viapaisa/js/jquery-1.11.3.js"></script>

<!-- BOOSTRAB SCRIPT -->
<script type="text/javascript" src="<?php echo base_url()?>/assets/viapaisa/js/bootstrap.min.js"></script>
  
     </head>
     
  <body>
  
  <header>
    <nav class="navbar navbar-default">
    <div class="container-fluid">
    
            <div class="navbar-header">
           <!--   <button type="button" class=" menu-left push-body  gradient_btn1" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>-->
               <a class="toggle-menu menu-left gradient_btn1"><i class=" glyphicon glyphicon-menu-hamburger"></i></a>
              <a class="navbar-brand" href="http://viapaisa.com"><img class="img-responsive" src="<?php echo base_url()?>/assets/viapaisa/images/logo_blue.png"></a>
              
               <ul class="pull-right list-unstyled list-inline visible-xs">
                
                    
                    <li><a href="#" class="gradient_btn1"><span class="profile_img "><img src="images/profile-img.png"></span></a></li>
                    <li><a href="#" class="gradient_btn1" data-toggle="modal" data-target=".bs-example-modal-lg-4"><i class="glyphicon glyphicon-log-out
"></i></a></li>
                 </ul>
            </div>
               <?php if($this->session->userdata('uid')!="" ) {  
			  	 	 $img_url = base_url()."images/".$this->session->userdata('img_name');
               	if( !file_exists($_SERVER["DOCUMENT_ROOT"]."images/".$this->session->userdata('img_name')) ) {
               	 $img_url = base_url()."images/logo.png"; 	
				} ?>
    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                
                    <li><a href="#">(Your last visit was on  <?php $lastlogin=date('d-M-Y h:m:s a',strtotime($this->session->userdata('lastlogin')));
			echo $lastlogin;?>)</a></li>
                    <li><a href="#" class="profile_img"><?php echo $this->session->userdata('name')?><span><img src="<?php echo  $img_url; ?>" /></span></a></li>
                    
                 
                    <li><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg-4"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
                    
                   
                 </ul>
            </div>
       <?php } ?>
            
         </div>
                    </nav>
</header>


    

 

