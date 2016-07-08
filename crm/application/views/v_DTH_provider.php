<!DOCTYPE html>

<html lang="en">
 
  <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url()?>/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url()?>/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <link href="<?php echo base_url()?>/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12" >
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        Postpaid Service Management
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">

                             <!-- /#wrapper -->
	<form action="" enctype="multipart/form-data" method="post">
 
	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
         	<thead>
<tr>

                 <tr>
                    <th width="5%" scope="col">Sl.No</th>
                    <th width="15%" scope="col">Name</th>               
                    <th width="20%" scope="col">Status</th>
                    <th width="10%" scope="col">Provider</th>
                     <th width="10%" scope="col">FRC Commission</th>
                    <th width="10%" scope="col">DIS Commission</th>               
                    <th width="10%" scope="col">S-FRC Commission</th>
                    <th width="10%" scope="col">$-DIS Commission</th>
                    <th width="10%" scope="col">SUP Commission</th>
                 </tr>
            </thead>
            <tbody>
                <?php 
				$i = 1; 
				foreach($dth_serv as $val){
				
     
     ?>
                <tr>
                
                    <td width="5%"><input type="hidden" name="mblpost_id" id="mblpost_id" value="<?php echo $val->id;?>" class="gg"/><?php echo $val->id;?> <br /></td>
                    <td width="15%"><?php echo $val->name;?> <br /></td>
                
    						  <td width="20%"> 
                            
  <?php $status= $val->status; ?>  
<input type="radio" name="status_<?php echo $i ?>" id="status" value="Enable"  <?php echo ($status=='Enable') ?  "checked" : "" ;  ?>/> Enable
<input type="radio" name="status_<?php echo $i ?>" id="status" value="Disable"  <?php echo ($status=='Disable') ?  "checked" : "" ;  ?>/>Disable

                           </td>
 
                       
                    <td width="10%"><?php echo $val->provider;?></td>
                    <td width="10%">
                    <input type="text" name="dth_commission" id="commission" value="<?php echo $val->commission;?>" style="width:80%" />
                   
                    
                    </td>
                    <div id="result" class="checkbillno"></div>
      
                    <td width="10%"><input type="text" name="dth_dcommission" value="<?php echo $val->dcommission;?>" id="d_commission" style="width:80%"/></td>
                    
                    <td width="10%"><input type="text" name="dth_sfcommission" value="<?php echo $val->sfcommission;?>" id="sf_commission" style="width:80%"/></td>
                    <td width="10%"><input type="text" name="dth_sdcommission" value="<?php echo $val->sdcommission;?>" id="sd_commission" style="width:80%"/></td>             
                    <td width="10%"><input type="text" name="dth_scommission" value="<?php echo $val->scommission;?>" id="s_commission" style="width:80%"/></td>
                </tr>
                 <?php 
     $i++;
   
     }
     
     ?>

                                        </tbody>

                                    </table>

                                    </div>
 <script src="<?php echo base_url()?>/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url()?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>/bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <script src="<?php echo base_url()?>/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
  
<script>
$(document).ready(function() {
$('#dataTables-example').DataTable({
responsive: true
});
});
</script>
<script>
$('.selectall').click(function() {
    if ($(this).is(':checked')) {
        $('div input').attr('checked', true);
    } else {
        $('div input').attr('checked', false);
    }
});</script>
 <script>
$(document).ready(function() {
 
$("#dataTables-example").on('change','input',function() {
	var  base_url = '<?php echo base_url();?>';
	var $row = $(this).closest("tr"),
$tds = $row.find("td:nth-child(1)");
	//alert($(this).val()); 
	//alert($(this).attr('id'));
	if($(this).attr('id')=="commission")
	{
		var url=base_url+"index.php/DTH_provider/getDTH_Commission/";
	}
	 var com=$(this).val();
	if($(this).attr('id')=="d_commission")
	{
		var url=base_url+"index.php/DTH_provider/getDTH_DCommission/";
	}
	var d_com=$(this).val();
	if($(this).attr('id')=="sf_commission")
	{
		var url=base_url+"index.php/DTH_provider/getDTH_SFCommission/";
	}
	var sf_com=$(this).val();
	if($(this).attr('id')=="sd_commission")
	{
		var url=base_url+"index.php/DTH_provider/getDTH_SDCommission/";
	}
	var sd_com=$(this).val();
	
		if($(this).attr('id')=="s_commission")
	{
		var url=base_url+"index.php/DTH_provider/getDTH_SCommission/";
	}
	var s_com=$(this).val();
	
		if($(this).attr('id')=="status")
	{
		var url=base_url+"index.php/DTH_provider/getDTH_Status/";
	}
	var status=$(this).val();
	
	
	$.each($tds, function() {               
    var post_id= $(this).text();
	
    $.ajax({
            type: "POST",
            url: url, 
            data: {
                commission: com,
				d_commission:d_com,
				sf_commission:sf_com,
				sd_commission:sd_com,
				s_commission:s_com,
				sts:status,
				id: post_id,
            },
            success: function(result) {
                $("#result").html(result);
				
				alert('Successfully Updated');
            }
        });
		

		
  });
	
      });
				


});
				
</script>