<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html, charset=utf-8" />
<title>Air Ticket Booking</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/responsive_style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
  <script>
  $(function() {
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});
  </script>
</head>


<body>
<div class="row">
<!--header-->
<header>
<div class="container">
<nav class="navbar navbar-default navbar-fixed-top menu_bar_div">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="img/logo.png" class="logo img-responsive" style="background: #fff; padding: 3%;"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse second_nav_menu" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right" id="navmenu">
        <li class="active"><a href="index.php#home">Home</a></li>
      <li><a href="index.php#recharge_page">Recharge</a></li>
      <li><a href="index.php#send_money"> Send Money</a></li>
      <li><a href="index.php#ticket_booking">Ticket Booking</a></li>
      <li><a href="#">Register</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>
</header>

<div class="col-sm-12 header_div">
<div class="container">
<div class="col-sm-6 content_white header_content_div">
<h1 class="header_heading">Bring your phone <br> <span class="header_title">up clouds</span></h1>
<br>
<p>We at viapaise set high standard of customer service, As we want to retain our customers in any Service provide below</p><br>
<button type="button" class="btn btn-lg btn-warning header_button"><i class="fa fa-download" aria-hidden="true"></i> Download</button>
&nbsp;&nbsp;
<button type="button" class="btn btn-lg btn-default button_design header_button">Connect your device</button>
</div>
<div class="col-sm-6"><img class="img-responsive header_img" src="img/header_img.png" alt="header"></div>

</div>
</div>
 <?php //include('slider.php') ?>

<!--header ends-->


<!--1st div-->

<div class="col-sm-12 padding_div">
<div class="container f_menu">
<h1 class="heading_violet">Air Ticket Booking</h1>
<p>This policy sets out the basis on which any personal data we collect from you, or that you provide to us, will be processed by us. Please read the following carefully to understand our views and practices regarding your personal data and how we will treat it. We keep certain basic information when you visit our website and recognize the importance of keeping that information secure and letting you know what we will do with it. For the purpose of the Data Protection Act 1998 (the Act), 
This policy only applies to our site. If you leave our site via a link or otherwise, you will be subject to the policy of that website provider. We have no control over that policy or the terms of the website and you should check their policy before continuing to access the site.
</p>

</div>
</div>
<!--1st div end-->
</div>


<!--footer-->
<?php include('footer.php')?>
<!--footer end-->


</body>
</html>
