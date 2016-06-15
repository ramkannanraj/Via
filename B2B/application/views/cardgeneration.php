<div class="container-fluid">
      
    	<div class="admin-page2">
        	<div class="row">
            	<div class="col-xs-12">
               		<div class="panel dashboard">
                		<div class="panel-body">
                			<div class="form-group">
                    	<?php $type=$this->session->userdata('type');
						if($type === "admin" || $type === "distributor" ||$type === "retailer"   ){?>
                    	<a href="<?php echo site_url('report') ?>" class="btn btn-primary">Recharge Hristory</a>
                        
                        <?php }if($this->session->userdata('type')=="admin"){?>  
                        <a href="<?php echo site_url('sendmoneyreport/sendmoney_admin') ?>" class="btn btn-primary">Send Money Report</a>
                        <?php } ?>
                        
                        <?php if($this->session->userdata('type')=="distributor"){?> 
                        <a href="<?php echo site_url('sendmoneyreport/sendmoney_dist') ?>" class="btn btn-primary">Send Money Report</a>
                        <?php } ?>
                        
                         
                        
                        <?php if($this->session->userdata('type')=="retailer"){?>
                       <a href="<?php echo site_url('sendmoneyreport/sendmoney_fran') ?>" class="btn btn-primary">Send Money Report</a>
                        <?php } ?>
                        
                        <?php if($this->session->userdata('type')=="admin"){?>
                        <a href="<?php echo site_url('cardgeneration/card_details_admin') ?>" class="btn btn-default active">Card Generation</a>
                        <?php }?>
                        
                        <?php if($this->session->userdata('type')=="distributor"){?>
                        <a href="<?php echo site_url('cardgeneration/card_details_dist') ?>" class="btn btn-default active">Card Generation</a>
                        <?php }?>
                        
                        <?php if($this->session->userdata('type')=="admin"){?>
                        <a href="<?php echo site_url('reports/daily_sales_report') ?>" class="btn btn-primary">Daily Sales Report</a>
                        <a href="<?php echo site_url('reports/retailer_sales_report') ?>" class="btn btn-primary">Retailer Report</a>
                        
                        <?php } if($this->session->userdata('type')=="distributor"){ ?>
                        <a href="<?php echo site_url('reports/daily_sales_report') ?>" class="btn btn-primary">Daily Sales Report</a>
                        
                        <?php } if($this->session->userdata('type')=="retailer"){ ?>
                        <a href="<?php echo site_url('reports/daily_sales_report') ?>" class="btn btn-primary">Daily Sales Report</a> 
                        
                        
                         
                         <?php }if($type === "admin" ){ ?>
                       <a href="<?php echo site_url('reports/get_operator_report') ?>" class="btn btn-primary">Operator Report</a>
                        <?php } ?>
                    </div>
                    
                    		<div class="mobile-1">
                        <p>View Card Generation</p>
                    </div>
                    
                  			<div class="table-responsive">
                          <table class="table air-table1 air-table2" id="dataTables-example">
                            <thead>
                            <tr class="table-title">
                                <th>Sl.No</th>
                                                <th>First Name</th>
                                                <th >Last Name</th>
                                                <th >Mobile Number</th>       
                                                <th>State</th>
                                                <th >City</th>
                                                <th >Pin code</th>
                                                <th >Card Number</th>       
                                                <th >Created By</th>
                                                <th>Expiry Date</th>
                                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                        <?php $i=1;foreach($card as $val){?>
                                            <tr>
											 <td><?=$i;?> <br /></td>
                                              
                                                <td><?=$val->user_name?> <br /></td>          
                                                <td><?=$val->last_name?> <br /></td>
                                                <td><?=$val->mobile_number?> <br /></td>
                                                <td><?=$val->state?> <br /></td>          
                                                <td><?=$val->city?> <br /></td>
                                                <td><?=$val->pin_code?> <br /></td>
                                                <td><?=$val->card_no?> <br /></td>  
                                                <td><?=$val->created_by_name?> <br /></td>         
                                                <td><?=$val->expiry_date?> <br /></td>
                                                
                                                <td><?=$val->card_status?> <br /></td>
                                            </tr>
                                        <?php $i++;}?>
                                        </tbody>
                          </table>
                    </div>
                    	</div>
                    </div>
                </div>
                <!-- col-xs-12 ends-->
                
                  
                    <!-- table ends-->
           
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