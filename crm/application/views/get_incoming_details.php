   <!DOCTYPE html>
<html lang="en">

<head>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>
<br>
    <div class="container">
      <div id="viewdata">  <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12" style="margin-left: -48px;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Incoming Details
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">

                             <!-- /#wrapper -->
	<form action="" enctype="multipart/form-data" method="post">
 
	
            
                            <?php if($this->session->userdata('type')=='admin' || $this->session->userdata('type')=='super')
	{  ?> 
                              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
            <th>Sl.No</th>
            <th >Mode</th>
            <th>Agent Mobile</th>
             <th>Message</th>
            <th>Date</th>
            <th>Ip</th>
        </tr>
    </thead>
    <tbody>
        
          <?php 
	$i=1;
	 foreach($results as $incoming_details){
		
		
		 ?>
     <tr>
         
          <td><?php echo $i;?></td>
           <td><?php echo $incoming_details->mode;?></td>
         <td><?php echo $incoming_details->agentmobile;?></td>
          <td><?php echo $incoming_details->message;?></td>
           <td><?php echo $incoming_details->date;?></td>
            <td><?php echo $incoming_details->ip;?></td>
           
       
        
          
      </tr>    
     <?php $i++;}
	
	
	 ?>  
        
    </tbody>
</table>
<?php
	}
	if($this->session->userdata('type')=='distributor')
	{
	?>
 <table class="table table-striped table-bordered table-hover" id="dataTables1-example">
    <thead>
        <tr>
            <th>Sl.No</th>
            <th>Mode</th>
            <th>Agent Mobile</th>
             <th>Message</th>
            <th>Date</th>
            
        </tr>
    </thead>
    <tbody>
        
          <?php 
	$i=1;
	 foreach($results as $incoming_details){
		
		
		 ?>
     <tr>
         
          <td><?php echo $i;?></td>
           <td><?php echo $incoming_details->mode;?></td>
         <td><?php echo $incoming_details->agentmobile;?></td>
          <td><?php echo $incoming_details->message;?></td>
           <td><?php echo $incoming_details->date;?></td>
          
           
       
        
          
      </tr>    
     <?php $i++;}
	
	
	 ?>  
        
    </tbody>
</table>
    <?php
	}
	?>
        </div>
              </div>
            </div>
              <!-- Row End -->
            </div>
               <!-- Left Sidebar End -->
            
              </div>
        <!-- Dashboard Wrapper End -->

         <!-- jQuery -->
    <script src="<?php echo base_url();?>/bower_components/jquery/dist/jquery.min.js"></script>
  
    <script src="<?php echo base_url();?>/bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <script src="<?php echo base_url();?>/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
  
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>


    <script>
    $(document).ready(function() {
        $('#dataTables1-example').DataTable({
                responsive: true
        });
    });
    </script>

      </div>
      <!-- Container End -->
    </div>             
      <!--Dashboard Container End -->             
           </div>
           </div>                                 
   
</body>
</html>