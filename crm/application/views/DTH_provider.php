<div class="container">
        <button class="toggle-menu menu-left push-body gradient_btn1">Menu</button>
    	<div class="admin-page2">
        	<div class="row service_row">
            	<div class="col-xs-12 profile-btn">
                <div class="form-group">
                     	<?php $type=$this->session->userdata('type');
						if( $type === "admin" ){?>
                    	<a href="<?php echo site_url('prepaid/prepaid_service') ?>" class="btn btn-warning">Prepaid</a>
                        <a href="<?php echo site_url('postpaid/postpaid_service') ?>" class="btn btn-warning">Postpaid</a>
                        <a href="<?php echo site_url('DTH_provider/DTH_service') ?>" class="btn btn-default active">DTH</a>
 <a href="<?php echo site_url('sendmoney/add_commission') ?>" class="btn btn-warning">Send Money</a>
                        <?php } ?>
                   </div>
                </div>
                <!-- col-xs-12 ends-->
               
               <div class="service-Pre-Paid">
                    <div class="col-xs-12 mobile-1">
                        <p>DTH Service Management</p>
                 </div>
                    <!--<div class="col-sm-6 col-xs-6 show1">
                        <span>Show</span>
                            <select>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                            </select>
                          <span>entries</span>
                    </div>
                    <div class="col-sm-6 col-xs-6 search1">
                        <input type="text" placeholder="search">
                    </div>-->
                    <div class="col-xs-12 table-responsive">
                          <table class="table air-table1 air-table2 service" id="dataTables-example">
                            <thead>
                            <tr class="table-title">
                                <th>Sno</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Provider</th>
                                <th>FRC Commission</th>
                                <th>DIS Commission</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                <?php 
				$i = 1; 
				foreach($dth_serv as $val){ ?>
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
                    <!--<td width="10%"><input type="text" name="dth_sfcommission" value="<?php //echo $val->sfcommission;?>" id="sf_commission" style="width:80%"/></td>
                    <td width="10%"><input type="text" name="dth_sdcommission" value="<?php// echo $val->sdcommission;?>" id="sd_commission" style="width:80%"/></td>             
                    <td width="10%"><input type="text" name="dth_scommission" value="<?php //echo $val->scommission;?>" id="s_commission" style="width:80%"/></td>-->
                    </tr>
                    <?php  $i++; } ?>
                    </tbody>
                              
                          </table>
                    </div>
                    <!-- table ends-->
              </div>
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
  }); });
});
</script>