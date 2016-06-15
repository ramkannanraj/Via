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
  
   
</head>

<script>
$(document).ready(function() {
	$('#outgoing_details_distributors').dataTable({
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
                    Outgoing Details
                    </div>
                    
                  </div>
                  <div class="widget-body">
                    <div class="metro-nav">
                                <table width="101%" border="0" class="display" id="outgoing_details_distributors">
    <thead>
        <tr>
            <th width="5%" scope="col">ID</th>
            <th width="10%" scope="col">DATE</th>
            <th width="10%" scope="col">AGENT MOBILE</th>
             <th width="55%" scope="col">MESSAGE</th>
           
        </tr>
    </thead>
    <tbody>
        
          <?php 
	
	 foreach($results as $outgoing_details_distributors){
		
		
		 ?>
     <tr>
         
          <td><?php echo $outgoing_details_distributors->id;?></td>
           <td><?php echo $outgoing_details_distributors->date;?></td>
         <td><?php echo $outgoing_details_distributors->agentmob;?></td>
          <td><?php echo $outgoing_details_distributors->msg;?></td>
          
           
       
        
          
      </tr>    
     <?php }
	
	
	 ?>  
        
    </tbody>
</table>
                         
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