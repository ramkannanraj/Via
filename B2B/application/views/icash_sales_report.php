<div class="container-fluid">
      <!--  <button class="toggle-menu menu-left push-body gradient_btn1">Menu</button>-->
    	<div class="admin-page2">
        
        	<div class="row">
            	<div class="col-xs-12">
                <div class="panel dashboard">
                <div class="panel-body">
                	<div class="form-group"> 
                    
                    	<?php $type=$this->session->userdata('type');
						if($type === "admin" || $type === "distributor" ||$type === "retailer"  ){?>
                    	<a href="<?php echo site_url('report') ?>" class="btn btn-warning">Recharge Hristory</a>
                        
                        <?php }if($this->session->userdata('type')=="admin"){?>  
                        <a href="<?php echo site_url('sendmoneyreport/sendmoney_admin') ?>" class="btn btn-warning">Card Topup Report</a>                  <?php } ?>
                        
                        <?php if($this->session->userdata('type')=="distributor"){?> 
                        <a href="<?php echo site_url('sendmoneyreport/sendmoney_dist') ?>" class="btn btn-warning">Card Topup Report</a>
                        <?php } ?>
                        
                     
                        
                        <?php if($this->session->userdata('type')=="retailer"){?>
                      <a href="<?php echo site_url('sendmoneyreport/sendmoney_fran') ?>" class="btn btn-warning">Card Topup Report</a>                    <?php } ?>
                      
                      
                      
                        <?php if($this->session->userdata('type')=="admin"){?>  
                      <a href="<?php echo site_url('sendmoneyreport/sendmoney_sales') ?>" class="btn btn-default">Send Money Report</a>                        <?php } ?>
                        
                        <?php if($this->session->userdata('type')=="admin"){?>
                    <a href="<?php echo site_url('cardgeneration/card_details_admin') ?>" class="btn btn-warning">Card Generation</a>
                        <?php }?>
                        
                        <?php if($this->session->userdata('type')=="distributor"){?>
                     <a href="<?php echo site_url('cardgeneration/card_details_dist') ?>" class="btn btn-warning">Card Generation</a>
                        <?php }?>
                        
                        <?php if($this->session->userdata('type')=="admin"){?>
                      <a href="<?php echo site_url('reports/daily_sales_report') ?>" class="btn btn-warning">Daily Sales Report</a><!--
                        <a href="<?php echo site_url('reports/retailer_sales_report') ?>" class="btn btn-primary">Retailer Report</a>-->
                        
                        <?php } if($this->session->userdata('type')=="distributor"){ ?>
                      <a href="<?php echo site_url('reports/daily_sales_report') ?>" class="btn btn-warning">Daily Sales Report</a>
                        
                        <?php } if($this->session->userdata('type')=="retailer"){ ?>
                      <a href="<?php echo site_url('reports/daily_sales_report') ?>" class="btn btn-warning">Daily Sales Report</a> 
                        
                      
                         <?php }if($type === "admin" ){ ?>
                     <a href="<?php echo site_url('reports/get_operator_report') ?>" class="btn btn-warning">Operator Report</a>
                        <?php } ?>
                    </div>
                    
                    <div class="mobile-1">
                        <p>View Send Money Report</p>
                    </div>
                    
                    <div class="col-xs-12 table-responsive">
                          <table class="table air-table1 air-table2" id="dataTables-example">
                            <thead>
                            <tr class="table-title">
                                <th>Sno</th>
                                <th>Retailer Name</th>
                                <th>Card Number</th>
                                <th>Sent Amount</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                                        <?php if( isset( $card )  ){ $i=1;		foreach($card as $val){?>
                                            <tr>
										    <td><?=$i;?> <br /></td> 
                                            <td><?=$val->name?> <br /></td>
                                                <td><?=$val->icash_user_id?> <br /></td>
                                                <td><?=$val->amount?> <br /></td>
                                                <td><?=$val->transaction_date?> <br /></td>              
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