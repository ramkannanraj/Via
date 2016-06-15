<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Paybuks Mobile Money</title>
<link href="<?php echo base_url();?>/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


<script src="<?php echo base_url()?>assets/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>

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
        $('#dataTables2-example').DataTable({
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

<style>
.page-head-bg {
background: left top #e80080;;
    background-image: url(../115.head_bg.png),-webkit-linear-gradient(left,#770072,#bb008d,#e80080,#ff0079);
   
    -moz-box-shadow: 3px 3px 3px rgba(0,0,0,.3);
    -webkit-box-shadow: 3px 3px 3px rgba(0,0,0,.3);
    border-radius: 5px;
    padding: 15px;
    color: #fff;
    margin-bottom: 10px;
	box-shadow: 3px 3px 3px rgba(0,0,0,.3);
	color: white;
	height:35px;
  background: 
  /* On "top" */
  repeating-linear-gradient(
    45deg,
    #ff4eae,
    #ea1a72 5px,
    #ff4eae 5px,
    #ea1a72 6px
  ),
  /* on "bottom" */
  -webkit-linear-gradient(left,#770072,#ff4eae,#ea1a72,#ea1a72);
}
.page-head-bg1 {
background: left top #e80080;;
    background-image: url(../115.head_bg.png),-webkit-linear-gradient(left,#18b6ea,#0de0ff,#0de0ff,#0de0ff);
   
    -moz-box-shadow: 3px 3px 3px rgba(0,0,0,.3);
    -webkit-box-shadow: 3px 3px 3px rgba(0,0,0,.3);
    border-radius: 5px;
    padding: 15px;
    color: #fff;
    margin-bottom: 10px;
	box-shadow: 3px 3px 3px rgba(0,0,0,.3);
	color: white;
	height:35px;
  background: 
  /* On "top" */
  repeating-linear-gradient(
    45deg,
    #18b6ea,
    #0de0ff 5px,
    #18b6ea 5px,
    #0de0ff 6px
  ),
  /* on "bottom" */
  -webkit-linear-gradient(left,#18b6ea,#0de0ff,#0de0ff,#0de0ff);
}
.page-head-bg3 {
background: left top #e80080;
    background-image: url(../images/head-bg.png),-webkit-linear-gradient(left,#770072,#bb008d,#e80080,#ff0079);    
    -moz-box-shadow: 3px 3px 3px rgba(0,0,0,.3);
    -webkit-box-shadow: 3px 3px 3px rgba(0,0,0,.3);
    border-radius: 5px;
    padding: 5px;
    color: #fff;
    margin-bottom: 10px;
}
.page-head-bg4 {
background: left top #e80080;
    background-image: url(../images/head-bg.png),-webkit-linear-gradient(left,#0de0ff,#0de0ff,#18b6ea,#18b6ea);    
    -moz-box-shadow: 3px 3px 3px rgba(0,0,0,.3);
    -webkit-box-shadow: 3px 3px 3px rgba(0,0,0,.3);
    border-radius: 5px;
    padding: 5px;
    color: #fff;
    margin-bottom: 10px;
}

.page-head-bg5 {
background: left top #e80080;
    background-image: url(../images/head-bg.png),-webkit-linear-gradient(left,#ff4eae,#ff4eae,#ea1a72,#ea1a72);    
    -moz-box-shadow: 3px 3px 3px rgba(0,0,0,.3);
    -webkit-box-shadow: 3px 3px 3px rgba(0,0,0,.3);
    border-radius: 5px;
    padding: 5px;
    color: #fff;
    margin-bottom: 10px;
}
</style>

</head>

<div class="dashboard-container">
<div class="container">
<div class="dashboard-wrapper">
<!-- Left Sidebar Start -->
<div class="left-sidebar">
 <!-- Row Start -->
<div class="row">
<div class="col-lg-12 col-md-12">
<div class="widget">
 <div class="page-head-bg4" style="height:50px;">Recharge Status
 <!--<div class="page-head-bg"></div>
 <div class="page-head-bg1"></div><br><br><br><br>-->
</div>
<div style="padding-left:350px;">
 <form class="form-inline" action="<?php echo site_url(); ?>recharge/recharge_statuscheck" method="post">
<input type="radio" name="radio" value="1" checked>  Transaction Id &nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="radio" value="2">  Mobile Number<br><br>
<input type="text" name="txtnumber" id="txtnumber" style="width:250px;">
<input type="submit" name="submit" value="Submit" class="page-head-bg3" style="width:100px;height:35px;"  />
</form>
</div>
	<div class="panel-body">
		<div class="dataTable_wrapper">
		
		<form action="" enctype="multipart/form-data" method="post">
	 
		
		<table class="table table-striped table-bordered table-hover" id="dataTables-example" style="background-color:#fff;">
		<thead>
			<tr style="color:#ffffff;background-color:#18b6ea">
			<th style="color:#ffffff;"><b>Sl.No</b></th>            
            <th style="color:#ffffff;"><b>Type</b></th>
            <th style="color:#ffffff;"><b>Operator Name</b></th>
            <th style="color:#ffffff;"><b>Mobile Number</b></th>
			<th style="color:#ffffff;"><b>Recharge Date</b></th> 
            <th style="color:#ffffff;"><b>Result</b></th>           
            <th style="color:#ffffff;"><b>Transaction Id</b></th>   
        </tr>
    </thead>
    <tbody>     
    <?php 
	$i=1;
	 foreach($rechargestatus as $details){		
	?>
     <tr>
    
    <td><?php echo $i;?></td>    
	<td><?php echo $details->type; ?></td>
    <td><?php echo $details->service; ?></td>
    <td><?php echo $details->mobilenumber; ?></td>
	<td><?php echo $details->rdate;?></td>
    <td><?php echo $details->result;?></td>
	 <td><?php echo $details->trans_id;?></td>
    </tr>    
    <?php $i++;}	
	 ?>  
        
    </tbody>
</table>
</form>	


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
</div>   




