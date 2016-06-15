<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>-->
  <!--<link rel="stylesheet" href="../../assets/css/jquery-ui.css"/>
  <script src="../../assets/js/jquery-1.10.2.js"></script>
  <script src="../../assets/js/jquery-ui.js"></script>-->
  
  
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/jquery-ui.css"/>
 <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/DataTables-1.10.7/media/css/jquery.dataTables_themeroller.css"/>
 <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/DataTables-1.10.7/media/css/jquery.dataTables.css"/>
  <script src="<?php echo base_url(); ?>/assets/js/jquery-1.10.2.js"></script>
  <script src="<?php echo base_url(); ?>/assets/js/jquery-ui.js"></script>
   <script src="<?php echo base_url(); ?>/assets/js/jquery.dataTables.min.js"></script>
  
   

<script>
  $(function() {
    $( "#report_from_date").datepicker({ dateFormat: 'yy-mm-dd',changeMonth: true, changeYear: true });
	 $( "#report_to_date").datepicker({ dateFormat: 'yy-mm-dd',changeMonth: true, changeYear: true });
	 
  });
  </script>
  <script>
$(document).ready(function() {
	
	 $('#other_transfer_det').on('submit', function(e){
		var from_date=$('#report_from_date').val();
		var to_date= $('#report_to_date').val();
		if(from_date =='' || to_date =='')
		{
			alert('Please Choose date');
		}
		
	});

});
</script>
<style>
.prag p {
    font-size: 11px;
    text-decoration: none;
    color: #4d4d4d;
    font-weight: 300;
    text-transform: uppercase;
}
</style>
</head>
<body>

<div class="dashboard-container">

      <div class="container">
        <div class="dashboard-wrapper">
          
          <!-- Left Sidebar Start -->
          <div class="left-sidebar">
            
            <!-- Row Start -->
            <div class="row">
              <div class="col-lg-12 col-md-12">
                <div class="widget">
                  <div class="widget-header">
                    <div class="title">
                    Change Password
                    </div>
                    
                  </div>
                  <div class="widget-body">
                    <div class="metro-nav prag">
  <form action="<?=site_url('user/updatepassword')?>" method="post" id="">
    <div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">Old Password</label>
<div class="col-sm-6">
 <input type="text" disabled="disabled" name="old_password" required class="trns form-control"   id="old_password" value="<?php echo $this->session->userdata('password');?>">
    </div>
  </div>  
   <div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">New Password</label>
<div class="col-sm-6">
 <input type="text"  name="new_password" required class="trns form-control"   id="new_password" value="">
    </div>
  </div>     
  <div class="form-group">



    <div class="col-sm-4">



      <input type="submit" value="Submit" class="btn btn-info btn-small"/>



    </div>



  </div>
                                </form>
                                                             
       </div>
              </div>
            </div>
              <!-- Row End -->
            </div>
               <!-- Left Sidebar End -->
            
              </div>
        <!-- Dashboard Wrapper End -->

        

      </div>
      <!-- Container End -->
    </div>             
      <!--Dashboard Container End -->                        
  </div>
           </div>  
                   
                                
</body>
</html>