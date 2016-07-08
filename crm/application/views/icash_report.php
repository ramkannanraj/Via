<div class="container-fluid">
      <!--  <button class="toggle-menu menu-left push-body gradient_btn1">Menu</button>-->
    	<div class="admin-page2">
        
        	<div class="row">
            	<div class="col-xs-12">
                <div class="panel dashboard">
                <div class="panel-body">
                	<div class="form-group"> <?php
					 		$this->load->view("report_menu");
					 
					  ?>
                    </div>
                    
                    <div class="mobile-1">
                        <p><?php echo $heading; ?></p>
                    </div>
                    
                    <div class="col-xs-12 table-responsive">
                          <table class="table air-table1 air-table2" id="dataTables-example">
                            <thead>
                            <tr class="table-title">
                                <th>Sno</th>
                                <th>Name</th>
                                <th>Mail Id</th>
                                <th>Card Number</th>
                                <th>Top up Amount</th>
                                <th>Card Expiry Date</th>
                            </tr>
                            </thead>
                            <tbody>
                                        <?php if( isset( $card )  ){ $i=1;		foreach($card as $val){?>
                                            <tr>
										    <td><?=$i;?> <br /></td> 
                                            <td><?=$val->user_name?> <br /></td>
                                                <td><?=$val->mail_id?> <br /></td>          
                                                <td><?=$val->card_no?> <br /></td>
                                                <td><?=$val->topup_amount?> <br /></td>
                                                <td><?=$val->expiry_date?> <br /></td>              
                                            </tr>
                                        <?php $i++;} } ?>
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