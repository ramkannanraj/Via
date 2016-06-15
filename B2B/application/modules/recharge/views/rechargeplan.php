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
    margin-bottom: 5px;
}
.page-head-bg4 {
background: left top #e80080;
    background-image: url(../images/head-bg.png),-webkit-linear-gradient(left,#18b6ea,#18b6ea,#0de0ff,#0de0ff,#18b6ea,#18b6ea);    
    -moz-box-shadow: 3px 3px 3px rgba(0,0,0,.3);
    -webkit-box-shadow: 3px 3px 3px rgba(0,0,0,.3);
    border-radius: 5px;
    padding: 0px;
    color: #fff;
    margin-bottom: 2px;
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
 <div class="page-head-bg4" style="height:50px;background-color:#fff">Recharge Plan
 <!--<div class="page-head-bg"></div>
 <div class="page-head-bg1"></div><br><br><br><br>-->
</div>
 <form class="form-inline" method="post" action="<?php echo site_url(); ?>recharge/rechargeplan" id="mobilepostpaidproviderForm" name="form1">
 <div style="padding-left:150px;padding-top:40px;">
 <select name="serviceprovider" style="width:200px;" required id="serviceprovider_mobileprovider"  class="oddfields form-control" notEqual="Select Operator"> 
    <option selected="selected" value="">Operator</option>
    <?php foreach($Prepaid as $rels){ ?>

    <option value="<?php echo $rels->id; ?>" data-image="<?php echo base_url(); ?>images/airtel.png"> <?php echo $rels->name; ?></option>
     <?php } ?>  
    </select>
<select name="circle" style="width:200px;"  required id="circle"  class="oddfields form-control" notEqual="Select Circle"> 
    <option selected="selected" value="">Circle</option>
    <?php foreach($Circle as $rels){ ?>

    <option value="<?php echo $rels->circle_id; ?>" data-image="<?php echo base_url(); ?>images/airtel.png"> <?php echo $rels->circle_name; ?></option>
     <?php } ?>  
    </select>
	<select name="plan" style="width:200px;"  required id="plan"  class="oddfields form-control" notEqual="Select Paln"> 
    <option selected="selected" value="">Plan</option>
    <?php foreach($OperatorPlan as $rels){ ?>

    <option value="<?php echo $rels->plan_id; ?>" data-image="<?php echo base_url(); ?>images/airtel.png"> <?php echo $rels->plan_name; ?></option>
     <?php } ?>  
    </select>
	<input type="submit" id="showLoader"   value="View Plan" class="page-head-bg3" style="font-weight:15px;width: 120px; height: 35px;font-size: 15px;"/>
	</div>
	</form>
	
		<div class="panel-body">
								<div class="dataTable_wrapper">
		
		<form action="" enctype="multipart/form-data" method="post">
	 
		
		<table class="table table-striped table-bordered table-hover" id="dataTables-example" style="background-color:#fff;">
		<thead>
			<tr style="color:#ffffff;background-color:#18b6ea">
			<th style="width:30px;color:#ffffff;"><b>Sl.No</b></th>            
            <th style="width:130px;color:#ffffff;"><b>Plan Name</b></th>
            <th style="color:#ffffff;"><b>Plan Description</b></th>
            <th style="width:60px;color:#ffffff;"><b>Validity</b></th>
			<th style="width:60px;color:#ffffff;"><b>Talktime</b></th> 
            <th style="width:60px;color:#ffffff;"><b>Amount</b></th>           
            
        </tr>
    </thead>
    <tbody>     
    <?php 
	$i=1;
	 foreach($plandetails as $admin_report_details){		
	?>
     <tr>
    
    <td><?php echo $i;?></td>    
	<td><?php echo $admin_report_details->plan_name; ?></td>
    <td><?php echo $admin_report_details->plan_desc; ?></td>
    <td><?php echo $admin_report_details->validity; ?></td>
	<td><?php echo $admin_report_details->talktime;?></td>
    <td><input type="button" value=<?php echo $admin_report_details->amount; ?> class="page-head-bg4" style="width:55px;height:25px;color:#fff;"></td>
	
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




