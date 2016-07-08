<link href="<?php echo base_url()?>/assets/css/bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo base_url()?>/assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url()?>/assets/css/font-awesome.min.css" />
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />
<link rel="stylesheet" href="<?php echo base_url()?>/assets/css/ace.min.css" />
<link rel="stylesheet" href="<?php echo base_url()?>/assets/css/ace-responsive.min.css" />
<link rel="stylesheet" href="<?php echo base_url()?>/assets/css/ace-skins.min.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

 <script type = "text/javascript" >
    history.pushState(null, null, 'thankyou_content');
    window.addEventListener('popstate', function(event) {
    history.pushState(null, null, 'thankyou_content');
    });
    </script>
 <body class="login-layout">
<div class="main-container container-fluid" >
<div class="main-content" style="background-color:#FFF">
<div class="row-fluid">
<div class="span20">
<div class="login-container" style="width:800px">
<div class="row-fluid">
<div class="center">
<h1>
<!--<i class="icon-leaf green"></i>-->

<!--<span class="white">CRM</span>-->
</h1>
</div>
</div>

<div class="space-6"></div>

<div class="row-fluid">
<div class="position-relative">
<div id="login-box" class="login-box visible widget-box no-border" style="height:400px;">
<div class="widget-body">
<div class="widget-main">
            
         
                    
                    

                      
<span id="spn_thankyou" align="center" >Thanks for using ViaPaise.com</span><br><br>

<br><br>
<p align="justify" style="margin-left:5px;margin-top: -20px;" >
<b>
To protect the safety of your account, you have been logged out.This may be due to the<br> 
following reasons:</br> </br></b>
</p>
<p align="justify" style="margin-left:30px;margin-top: 10px;" >

<b style="color:#900">&#8667;</b>
 You have used Back/Forward/Refresh button of your Browser.</br> 
 <b style="color:#900">&#8667;</b>
Multiple clicks on an option or button.</br> 
<b style="color:#900">&#8667;</b>
Long inactive period after login.</br> 
<b style="color:#900">&#8667;</b>
Login from multiple browser windows at the same time.</br> 
</p>
</br>
<p style="margin-left:450px;margin-top:-105px;font-size:10px;width:350px;">
You may start another session by clicking below &nbsp;&nbsp;&nbsp;
<a href="<?php echo site_url('/index.php')?><?php $array_items = array('username' => '', 'uid' => '', 'type' => ''); $this->session->unset_userdata($array_items); $this->session->sess_destroy();?>"  style="color:#390;font-size:14px;text-decoration:underline;"> Login</a></br> 
</p>
<br>	
<br>
<p align="justify" style="margin-left:5px;margin-top: 30px;" >
If the problem persists, please clear the temporary files from your browser and try again or contact us at 
<a target="_blank" href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=support@viapaise.com" style="color:#009;text-decoration:underline;">info@viapaise.com</a>
</p>
       
       
       
       
       
       
       
       
</div> 
</div> 
</div> 

</div> 
</div>
</div>
</div> 
</div> 
</div>
</div> 
<style>
#spn_thankyou {
    font-size: 36px;
    color: #39C;
}
<br>

</style>


</body>

          