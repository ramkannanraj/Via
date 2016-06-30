<?php
//if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

   <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/jquery-ui.css"/>
 <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/DataTables-1.10.7/media/css/jquery.dataTables_themeroller.css"/>
 <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/DataTables-1.10.7/media/css/jquery.dataTables.css"/>
  <script src="<?php echo base_url(); ?>/assets/js/jquery-1.10.2.js"></script>
  <script src="<?php echo base_url(); ?>/assets/js/jquery-ui.js"></script>
   <script src="<?php echo base_url(); ?>/assets/js/jquery.dataTables.min.js"></script>
 
<script>
  $(function() {
    $( "#operator_date").datepicker({ dateFormat: 'yy-mm-dd',changeMonth: true, changeYear: true });
	 
	 
  });
  </script>
  <script>
$(document).ready(function() {
	$('#clr').hide();
	 $('#operator_det').on('submit', function(e){
		var from_date=$('#operator_date').val();
		
		if(from_date =='')
		{
			alert('Please Choose date');
		}
		
	});
	
});
</script>
</head>
<style>
@media only screen and (max-width: 1024px) {
.left-sidebar {
    margin-right: 0px !important;
}
}
</style>
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
                     Operator Reports
                    </div>
                    
                  </div>
                  <div class="widget-body">
                    <div class="metro-nav">
  <form action="<?php echo site_url('reports/operator_report')?>" method="post" name="operator_det" id="operator_det">
                                    <p>From Date:<input placeholder="From date"  type="text" id="operator_date" name="operator_date" value="" /> 
                                  &nbsp;
                                    <input style="margin-bottom:10px"  class="btn btn-small btn-info" type="submit" value="Go">
                                    
                                    </p>
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