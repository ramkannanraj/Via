<!DOCTYPE html>
<html lang="en">
<head>
<title>Welcome</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="<?php echo base_url()?>/assets/css/style.css" />
</head>	
<body>


 <div id="logodiv"> <!--<img src="<?php //echo base_url()?>/assets/images/logo.png" >---> </div> 
<div id="loginbox">
<div id="grey">
   <div id="icondiv"><img src="<?php echo base_url()?>/assets/images/icon.png" border="0px"  style="padding-left:16px; padding-top:10px"/></div>
   <div id="name">Login Panel</div>
</div>
<div id="innerlogin">

<form action="<?php echo site_url('user/login')?>" method="post">
<ul>
<li><div class="one"><div class="two">User Name</div><div class="three">
<input type="text" name="username" value="" required /></div></div></li>
<li><div class="one"><div class="two">Password</div><div class="three">
<input type="password" name="password" required /></div></div></li>
<li><div class="one" style="border:none !important;"><div class="four"></div><div class="five"></div><div class="six">
<input type="submit" value="Sign in" class="button_example1" name="signin"/> </div></div></li>
<li><div id="error_login"></div></li>
  </ul>
</div>
  </div><!--end of innerlogin!-->
</div><!--end of loginbox!-->

</form>
 
</body>
</html>