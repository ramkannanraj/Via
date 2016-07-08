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
@media (min-width: 240px) and (max-width: 1023px) {
.left-sidebar {
    margin-right: 0px !important;
}
.formlabel{ width:100%; text-align:left; }
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
                     Transfer Details
                    </div>
                    
                  </div>
                  <div class="widget-body">
                    <div class="metro-nav prag">
  <form action="<?php echo site_url('transfer/other_transfer')?>" method="post" id="other_transfer_det" class="form-inline">
                                    <p class="formlabel">From Date:<input placeholder="From date"  type="text" id="report_from_date" name="from_date" value=""  class="form-control"/> To Date:<input placeholder="To date" readonly type="text" id="report_to_date" name="to_date" value=""  class="form-control"/>
                                   &nbsp;
                                    <input style="margin-bottom:10px"  class="btn btn-small btn-info" type="submit" value="Submit">
                                    <?php //if(!empty($_REQUEST['from_date']) || !empty($_REQUEST['to_date']) ){ ?>
                                    <?php //} ?>
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