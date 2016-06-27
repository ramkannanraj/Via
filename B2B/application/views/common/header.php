<!DOCTYPE html>
<html lang="en">
<head>
<title>ViaPaise</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<meta name="description" content="Blue Moon - Responsive Admin Dashboard" />
<meta name="keywords" content="Notifications, Admin, Dashboard, Bootstrap3, Sass, transform, CSS3, HTML5, Web design, UI Design, Responsive Dashboard, Responsive Admin, Admin Theme, Best Admin UI, Bootstrap Theme, Wrapbootstrap, Bootstrap, bootstrap.gallery" />
<meta name="author" content="Bootstrap Gallery" />
    
<link rel="shortcut icon" href="<?php echo base_url()?>/assets/paybuks/css/images/favicon_square.png">
   <!-- MY STYLESHEET -->
<link rel="stylesheet" href="<?php echo base_url()?>/assets/paybuks/css/style.css" type="text/css" />
<!-- BOOSTRAB STYLESHEET -->
<!--<link rel="stylesheet" href="<?php echo base_url()?>/assets/paybuks/css/bootstrap.css" type="text/css" />-->

<link rel="stylesheet" href="<?php echo base_url()?>/assets/paybuks/css/bootstrap.min.css" type="text/css" />
<!-- MENU CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/assets/paybuks/css/jPushMenu.css" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/assets/paybuks/css/jquery.fancybox.css" media="screen" />
<!-- FANCYBOX CSS -->


<!-- DEFAULT SCRIPT -->

<link href="<?php echo base_url()?>/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url()?>/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
<link href="<?php echo base_url()?>/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
<link href="<?php echo base_url()?>/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

<link href="<?php echo base_url()?>/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<!--<script type="text/jscript" src="<?php echo base_url()?>/assets/paybuks/js/jquery-1.11.3.js"></script>

<script type="text/javascript" src="<?php echo base_url()?>/assets/paybuks/js/bootstrap.min.js"></script>-->
 
 
<script src="<?php echo base_url()?>/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url()?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>/bower_components/metisMenu/dist/metisMenu.min.js"></script>

<script src="<?php echo base_url()?>assets/js/date.js"></script>
<script src="<?php echo base_url()?>bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js">
</script>
<!--


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>-->

 <script>
   $(document).ready(function() {
    $('[id^=detail-]').hide();
    $('.toggle').click(function() {
        $input = $( this );
        $target = $('#'+$input.attr('data-toggle'));
        $target.slideToggle();
    });
});
   </script> 

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<style>
/*check-transaction*/

.check-transaction{
	padding:30px 70px;
}
.check-transaction h1{
	background: url(images/check-tranaction.png) no-repeat 0 center;
    padding-left: 103px;
    min-height: 129px;
    line-height: 47px;
}
.check-transaction p{
    margin-bottom: 20px
}
.check-transaction1 {
	width:50%;

}
.check-transaction1 form label{
	 float: left;
    margin-bottom: 20px;
    width: 35%;
}
.check-transaction1 form label input {
	margin-right: 5px;
}
.check-transaction1 .login-btn{
	float:left;
	clear:inherit;
}
.login-btn .select-op{
	background: rgba(0, 0, 0, 0) linear-gradient(to right, #0093d5 0%, #00b8ee 100%) repeat scroll 0 0;
    border: medium none;
    border-radius: 6px;
    float: left;
    font-size: 20px;
    margin-left: 0;
    padding: 7px 25px;
}
.login-btn .select-op:after{
	display:none;
}
.check-mail{
    float: left;
}
.check-mail span{
	background: rgba(0, 0, 0, 0) linear-gradient(to right, #7f0074 0%, #f9017c 100%) repeat scroll 0 0;
	color: #fff;
    float: left;
    padding: 20px 30px;
    text-align: center;
    width: 100%;
    line-height: 33px;
    font-size: 25px;
}
.check-transaction1 .fancybox-opened .fancybox-skin{
}
.check-mail span:before{
	content:"";
	background:url(http://paybuks.com/images/information-before.png) no-repeat;
	float: left;
    height: 38px;
    width: 38px;
	margin-right:5px;
	position: absolute;
    left: 170px;	
}
.check-mail-inner{
	float: left;
    width: 100%;
    text-align: center;
    padding: 20px 0px;
}
.check-mail p {
	color: #000;
    display: inline-block;
    font-size: 18px;
    padding: 0;
    text-align: center;
    width: 100%;
    margin-bottom: 20px;
}
.check-mail .center-text{
}
.check-mail a{
    border-radius: 30px;
    float: none;
    margin: 0 !important;
    padding: 5px 20px;
    text-align: center;
}
.btn-bg {
    background: linear-gradient(to right, #7f0074 0%, #f9017c 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
    color: #fff;
    font-family: "OpenSansSemibold_0",Arial,Helvetica,sans-serif;
    text-transform: uppercase;
    transition: all 0.3s ease 0s;
}
.gradient_btn, .gradient_btn.btn {
	margin-left:20px;
}
</style>
    
<body>
  <!-- POPUP STARTS -->
                <div class="modal fade bs-example-modal-lg-4" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                        	<form>
                            	<!--<div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                   
                                </div>-->
                                <div class="modal-body">
                                 <h4 class="text-center">You are logging out of ViaPaise.com</h4>
                                </div>
                                <div class="modal-footer">
                              
                                    <a href="<?php echo base_url()?>user/thankyou_content" class="btn btn-default">OK</a> 
  									<a href="<?=current_url()?>" class="btn btn-danger" type="submit" />Cancel</a>   
                              
                                </div>
                                <!-- row ends -->
                            </form>
                        </div>
                    </div>
                </div>
<div class="wrapper">
<div class="cd-overlay"></div>
<header>
    <nav class="navbar navbar-default">
    <div class="container-fluid">
    
            <div class="navbar-header">
        
               <a class="toggle-menu menu-left gradient_btn1"><i class=" glyphicon glyphicon-menu-hamburger"></i></a>
              <a class="navbar-brand" href="http://viapaise.com"><img class="img-responsive" src="<?php echo base_url()?>/assets/paybuks/images/logo_blue.png"></a>
              
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
				} 
				
			 }?>
    
            <div class="collapse navbar-collapse hidden-xs" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                
                    <li><a href="#">(Your last visit was on  <?php $lastlogin=date('d-M-Y h:m:s a',strtotime($this->session->userdata('lastlogin')));
			echo $lastlogin;?>)</a></li>
                    <li><a href="#" class="profile_img"><?php echo $this->session->userdata('name')?><span><img src="<?php echo  $img_url; ?>" /></span></a></li>
                    
                    <?php if($this->session->userdata('uid')!="" ) { ?>
                    <li><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg-4"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
                    
                      <?php } ?>
                 </ul>
            </div>
         </div>
                    </nav>
</header>
    <!---->
 <!-- POPUP STARTS -->
                