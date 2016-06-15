<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<!--<link rel="stylesheet" href="../../assets/css/jquery-ui.css"/>
  <script src="../../assets/js/jquery-1.10.2.js"></script>
  <script src="../../assets/js/jquery-ui.js"></script>
  /*For Datatable*/
   <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
  -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/jquery-ui.css"/>
 <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/DataTables-1.10.7/media/css/jquery.dataTables_themeroller.css"/>
 <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/DataTables-1.10.7/media/css/jquery.dataTables.css"/>
  <script src="<?php echo base_url(); ?>/assets/js/jquery-1.10.2.js"></script>
  <script src="<?php echo base_url(); ?>/assets/js/jquery-ui.js"></script>
   <script src="<?php echo base_url(); ?>/assets/js/jquery.dataTables.min.js"></script>
  
   
</head>

<script>
$(document).ready(function() {
	$('#report_franchise_details').dataTable({
    });
	
    
});
</script>

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
                    Daily Sales Reports
                    </div>
                    
                  </div>
                  <div class="widget-body">
                    <div class="metro-nav">
                                <div class="table-responsive">
                                <table border="0" class="display" id="report_franchise_details">
    <thead>
        <tr>
          
            <th width="20%" scope="col">Date</th>
            <th width="10%" scope="col">Success</th>
            <th width="20%" scope="col">FRC Commission</th>
            <th width="50%" scope="col">DIS Commission</th>
        </tr>
    </thead>
    <tbody>
        
          <?php 
	
	 foreach($results as $report_details_franchise){
		
		
		 ?>
     <tr>
         
          <td><?php echo $report_details_franchise->rdate;?></td>
          
           <td><?php echo $report_details_franchise->amount; ?></td>
           
         <td><?php echo $report_details_franchise->commission;?></td>
         <td><?php echo $report_details_franchise->dcommission;?></td>
          
           
           
       
        
          
      </tr>    
     <?php }
	
	
	 ?>  
        
    </tbody>
</table>
</div>
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