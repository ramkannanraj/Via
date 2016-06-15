<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/jquery-ui.css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/DataTables-1.10.7/media/css/jquery.dataTables_themeroller.css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/DataTables-1.10.7/media/css/jquery.dataTables.css"/>
        <script src="<?php echo base_url(); ?>/assets/js/jquery-1.10.2.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/jquery-ui.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
            $('#table_refund').dataTable({});});
        </script>
	</head>
    <style>
	@media (min-width: 768px) and (max-width: 3200px) {
	.reportdiv{	width:100% !important; }
	}
	@media (min-width: 240px) and (max-width: 767px) {
	.reportdiv{	width:100% !important; }
	}
@media only screen and (max-width: 1024px) {
.left-sidebar { margin-right: 0px !important;}}
</style>
    <body>
    		<div class="dashboard-container">
            <div class="container">
                <div class="dashboard-wrapper">
    
                    <!-- Left Sidebar Start -->
                    <div class="left-sidebar">
    
                        <!-- Row Start -->
                        <div class="row reportdiv">
                            <div class="col-lg-12 col-md-12">
                                <div class="widget">
                                    <div class="widget-header">
                                        <div class="title">
                                             View Refund Report
                                        </div>
                                     </div> 
                                     <div class="widget-body">
										<div class="metro-nav">
                                        <div class="table-responsive">
                                   		 <table width="100%" border="0" class="display" id="table_refund">
                                        <thead>
                                            <tr>
                                                <th width="5%" scope="col">Transaction ID</th>
                                                <th width="5%" scope="col">User Name</th>
                                                <th width="20%" scope="col">Number</th>
                                                <th width="20%" scope="col">Amount</th>       
                                                <th width="20%" scope="col">Operator</th>
                                                <th width="10%" scope="col">Date</th>
                                                <th width="5%" scope="col">Status</th>
                                                <th width="10%" scope="col">Refunded Date</th>       
                                                <th width="5%" scope="col">Balance After Refund</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($refund as $val){?>
                                            
                                            <tr>
                                                  <?php
        $rdate= $val->rdate;
        $newrdate=date('d M Y h:i:s A',strtotime($rdate));  
        
       
        
        
      $refund_date=$val->refund_date;
       $newrrefund_date=date('d M Y',strtotime($refund_date));  
        ?>
                                                <td><?=$val->trans_id?> <br /></td>
                                                <td><?=$val->by?> <br /></td>          
                                                <td><?=$val->mobilenumber?> <br /></td>
                                                <td><?=$val->amount?> <br /></td>
                                                <td><?=$val->service?> <br /></td>          
                                                <td><?=$newrdate?> <br /></td>
                                                <td><?=$val->result?> <br /></td>
                                                <td><?=$newrrefund_date?> <br /></td>  
                                                <td><?=$val->cur_bal?> <br /></td>         
                                            </tr>
                                             <?php }?>
                                        </tbody>
                                    </table>
                                    </div>
                                         </div>
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
    </body>
</html>