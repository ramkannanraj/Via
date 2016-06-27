<div class="container-fluid">
      <!--  <button class="toggle-menu menu-left push-body gradient_btn1">Menu</button>-->
    	<div class="admin-page2">
        
        	<div class="row">
            	<div class="col-xs-12">
                <div class="panel dashboard">
                <div class="panel-body">
                     <div class="form-group">
                     	<?php $type=$this->session->userdata('type');
						if( $type === "admin" ){?>
                    	<a href="<?php echo site_url('prepaid/prepaid_service') ?>" class="btn btn-default active">Prepaid</a>
                        <a href="<?php echo site_url('postpaid/postpaid_service') ?>" class="btn btn-warning">Postpaid</a>
                        <a href="#" class="btn btn-warning">DTH</a>
 <a href="<?php echo site_url('sendmoney/add_commission') ?>" class="btn btn-warning">Send Money</a>
                        <?php } ?>
                   </div>
                    
                     <div class=" mobile-1">
                        <p>Prepaid Service Management</p>
                 </div>
                  <div id="results" ></div>
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
                              <!--  <th><input type="submit" id="saveall" value="Save All"  /></th>-->
                            </tr>
                            </thead>
                            
                            <tbody>
                                        <?php
                                        $dd1=0; 
                                        $dd2=0;
										$i=1; 
										foreach($prepaid_serv as $val){?>
                                            <tr> 
                                                <td class="center"><?php echo $i; ?> <br /></td>
                                                <td><?php echo $val->name; ?> <br /></td>
                                                <td>              
                                                <?php $status= $val->status; ?>  
                                                <input type="radio"  name="status_<?php echo $dd1; ?> " id="status" value="Enable" 
                                                <?php echo ($status=='Enable') ?  "checked" : "" ;  ?> /> Enable
                                                <input type="radio" name="status_<?php echo $dd1; ?>" id="status" value="Disable"
                                                <?php echo ($status=='Disable') ?  "checked" : "" ;  ?>/>Disable
                                                </td>
                                                
                                                
                                                <td><?php echo $val->provider;?></td>
                                                
                                                <td ><input type="text" name="commission"
                                                id="commission" value="<?php echo $val->commission?>" class="update" alt="commission" rel="<?php echo $val->id?>" /><br />
                                                </td>
                                                <td><input type="text" name="dcommission"
                                                id="dcommission" value="<?php echo $val->dcommission?>"  class="update" alt="dcommission" rel="<?php echo $val->id?>"  /><br /></td>
                                               <!-- <td><input type="text" name="sfcommission" 
                                                id="sfcommission" value="<?//=$val->sfcommission?>" /><br />
                                                </td>
                                                <td><input type="text" name="sdcommission" 
                                                id="sdcommission" value="<?//=$val->sdcommission?>" /><br /></td>
                                                <td><input type="text" name="scommission" 
                                                id="scommission"value="<?//=$val->scommission?>" /></td>-->
                                            </tr>
                                             <?php
                                             $dd1++;
                                             $dd2++;
                                            $i++ ; }   
                                             ?>
                                        </tbody>
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
    
    
    <!-- RESP MENU STARTS -->
<!--load jPushMenu, required-->

<!-- RESP MENU ENDS -->


	
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
					//$tds = $row.find("td");    
					$tds = $row.find("td:nth-child(1)");
					// alert($(this).val()); 
					//alert($(this).attr('id'));
					if($(this).attr('id')=="commission")
					{
					var url=base_url+"index.php/prepaid/get_data/";
					}
					var c=$(this).val();
					
					if($(this).attr('id')=="dcommission")
					{
						 
					var url=base_url+"index.php/prepaid/get_data_dcomm/";
					}
					var d_com=$(this).val();
					if($(this).attr('id')=="sfcommission")
					{
					var url=base_url+"index.php/prepaid/get_data_sfcomm/";
					}
					var sf_com=$(this).val();
					if($(this).attr('id')=="sdcommission")
					{
					var url=base_url+"index.php/prepaid/get_data_sdcomm/";
					}
					var sd_com=$(this).val();
					
					if($(this).attr('id')=="scommission")
					{
					var url=base_url+"index.php/prepaid/get_data_scomm/";
					}
					var s_com=$(this).val();
					
					if($(this).attr('id')=="status")
					{
					var url=base_url+"index.php/prepaid/get_data_sta/";
					}
					var s_sta=$(this).val();
					
					if($(this).attr('id')=="provider")
					{
					var url=base_url+"index.php/prepaid/get_data_provider/";
					}
					var s_prov=$(this).val();
					
					$.each($tds, function() {               
						var dd= $(this).text();
						
						 
						$.ajax({
								type: "POST",
								url: url, 
								data: {
									c_name: c,
									d_name:d_com,
									sf_name:sf_com,
									sd_name:sd_com,
									s_name:s_com,
									sta_name:s_sta,
									prov_name:s_prov,
									id: dd,
								},
								success: function(result) {
								 	$("#result").html(result);
									alert('Successfully Updated');
								window.location.reload(true);
								}
      							  });
		
		
  						});
  					});
					 	
 
				});
			/*		$(".update").on('blur',function() {
		 
					var  base_url = '<?php echo base_url();?>'; 
					var column = "dcommission";
					if($(this).attr('alt')=="commission")
					{
						  column = "commission";
						
						var url=base_url+"index.php/prepaid/update_data/";
					}
					var column_val=$(this).val();
					alert($(this).attr('alt'));
					                
						var s_id = $(this).attr('rel');
						
						
						$.ajax({
								type: "POST",
								url: url, 
								data: {
									column: column,
									column_val:column_val, 
									id: s_id,
								},
								success: function(result) {
									$("#results").html("Successfully Updated");
								//	alert('Successfully Updated');
								//	window.location.reload(true);
								}
      							  });
		
		
  						
					 
					 
  					});	 */
		</script>
