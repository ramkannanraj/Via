<div class="container-fluid">
       
    	<div class="admin-page2">
        	<div class="row">
            	<div class="col-xs-12">
              
                        <div class="panel dashboard">
                            <div class="panel-body">
                                
                                <div class="form-group">
                     	<?php $type=$this->session->userdata('type');
						if( $type === "admin" ){?>
                    	<a href="<?php echo site_url('prepaid/prepaid_service') ?>" class="btn btn-warning">Prepaid</a>
                        <a href="<?php echo site_url('postpaid/postpaid_service') ?>" class="btn btn-default active">Postpaid</a>
                        <a href="<?php echo site_url('DTH_provider/DTH_service') ?>" class="btn btn-warning">DTH</a>
 <a href="<?php echo site_url('sendmoney/add_commission') ?>" class="btn btn-warning">Send Money</a>
                        <?php } ?>
                   </div>
                               
                                <div class="mobile-1">
                                    <p>Postpaid Service Management</p>
                             </div>
                                
                                <div class="table-responsive">
                                      <table class="table air-table1 air-table2 service" id="dataTables-example">
                                        <thead>
                                        <tr class="table-title">
                                            <th>Sno</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Provider</th>
                                            <th>FRC Commission</th>
                                            <th>Dis Commission</th>
                                        </tr>
                                        </thead>
                                        
                                          <tbody>
                            <?php 
                            $i = 1; 
                            foreach($postpaid_serv as $val){ ?>
                            <tr>
                                <td><input type="hidden" name="mblpost_id" id="mblpost_id" value="<?php echo $val->id;?>" class="gg"/><?php echo $val->id;?></td>
                                <td><?php echo $val->name;?></td>
                                <td> 
              <?php $status= $val->status; ?>  
            <input type="radio" name="status_<?php echo $i ?>" id="status" value="Enable"  <?php echo ($status=='Enable') ?  "checked" : "" ;  ?> /> Enable
            <input type="radio" name="status_<?php echo $i ?>" id="status" value="Disable"  <?php echo ($status=='Disable') ?  "checked" : "" ;  ?>/>Disable
                                </td>
                                <td><?php echo $val->provider;?></td>
                                <td>
                                <input type="text" name="postpaid_commission" id="commission" value="<?php echo $val->commission;?>" style="width:80%" />
                                </td>
                                <div id="result" class="checkbillno"></div>
                                <td><input type="text" name="postpaid_dcommission" value="<?php echo $val->dcommission;?>" id="d_commission" style="width:80%"/></td>
                                <!--
                                <td><input type="text" name="postpaid_sfcommission" value="<?php //echo $val->sfcommission;?>" id="sf_commission" style="width:80%"/></td>
                                <td><input type="text" name="postpaid_sdcommission" value="<?php// echo $val->sdcommission;?>" id="sd_commission" style="width:80%"/></td>             
                                <td ><input type="text" name="scommission" value="<?php //echo $val->scommission;?>" id="s_commission" style="width:80%"/></td>-->
                                </tr>
                                <?php  $i++ ; } ?></tbody>
                                      </table>
                                </div>
                                
                            </div>
                        </div>
                </div>
                <!-- col-xs-12 ends-->
               
               
                 <!-- service pre-paid ends-->
               
                
               
          </div>
            <!-- row ends-->
        </div>
        <!-- admin-page1 ends -->
    </div>
    
    
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
		var url=base_url+"index.php/postpaid/getCommission/";
	}
	 var com=$(this).val();
	if($(this).attr('id')=="d_commission")
	{
		var url=base_url+"index.php/postpaid/getDCommission/";
	}
	var d_com=$(this).val();
	if($(this).attr('id')=="sf_commission")
	{
		var url=base_url+"index.php/postpaid/getSFCommission/";
	}
	var sf_com=$(this).val();
	if($(this).attr('id')=="sd_commission")
	{
		var url=base_url+"index.php/postpaid/getSDCommission/";
	}
	var sd_com=$(this).val();
	
		if($(this).attr('id')=="s_commission")
	{
		var url=base_url+"index.php/postpaid/getSCommission/";
	}
	var s_com=$(this).val();
	
		if($(this).attr('id')=="status")
	{
		var url=base_url+"index.php/postpaid/getStatus/";
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