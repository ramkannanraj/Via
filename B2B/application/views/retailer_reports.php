<div class="container-fluid">
      <!--  <button class="toggle-menu menu-left push-body gradient_btn1">Menu</button>-->
    	<div class="admin-page2">
        
        	<div class="row">
            	<div class="col-xs-12">
                <div class="panel dashboard">
                <div class="panel-body">
                	<div class="form-group">
                    	<?php $type=$this->session->userdata('type');
						if($type === "admin" || $type === "distributor" ||$type === "retailer"  ||$type === "super"  ){?>
                    	<a href="<?php echo site_url('report') ?>" class="btn btn-warning">Retailer History</a>
                        
                        <?php }if($this->session->userdata('type')=="admin"){?>  
                        <a href="<?php echo site_url('sendmoneyreport/sendmoney_admin') ?>" class="btn btn-warning">Send Money Report</a>
                        <?php } ?>
                        
                        <?php if($this->session->userdata('type')=="distributor"){?> 
                        <a href="<?php echo site_url('sendmoneyreport/sendmoney_dist') ?>" class="btn btn-warning">Send Money Report</a>
                        <?php } ?>
                        
                        
                        <?php if($this->session->userdata('type')=="retailer"){?>
                        <a href="<?php echo site_url('sendmoneyreport/sendmoney_fran') ?>" class="btn btn-warning">Send Money Report</a>
                        <?php } ?>
                        
                        <?php if($this->session->userdata('type')=="admin"){?>
                       <a href="<?php echo site_url('cardgeneration/card_details_admin') ?>" class="btn btn-warning">Card Generation</a>
                        <?php }?>
                        
                        <?php if($this->session->userdata('type')=="distributor"){?>
                        <a href="<?php echo site_url('cardgeneration/card_details_dist') ?>" class="btn btn-warning">Card Generation</a>
                        <?php }?>
                        
                        <?php if($this->session->userdata('type')=="admin"){?>
                        <a href="<?php echo site_url('reports/daily_sales_report') ?>" class="btn btn-warning">Daily Sales Report</a>
                        <a href="<?php echo site_url('reports/retailer_sales_report') ?>" class="btn btn-warning">Retailer Report</a>
                        
                        <?php } if($this->session->userdata('type')=="distributor"){ ?>
                        <a href="<?php echo site_url('reports/daily_sales_report') ?>" class="btn btn-warning">Daily Sales Report</a>
                        
                        <?php } if($this->session->userdata('type')=="retailer"){ ?>
                        <a href="<?php echo site_url('reports/daily_sales_report') ?>" class="btn btn-warning">Daily Sales Report</a>
                        <a href="<?php echo site_url('reports/retailer_sales_report') ?>" class="btn btn-warning">Retailer Report</a>
                        
                       
                         
                         <?php }if($type === "admin" ){ ?>
                        <a href="<?php echo site_url('reports/get_operator_report') ?>" class="btn btn-warning">Operator Report</a>
                        <?php } ?>
                    </div>
                    
                    
                    <div class=" mobile-1">
                        <p>Retailer Reports</p>
                    </div>
         
                    
                    <?php  if($this->session->userdata('type')=="admin"){ 	?>
                    <div class="col-xs-12 table-responsive">
                          <table class="table air-table1 air-table2" id="dataTables-example">
                            <thead>
                            <tr class="table-title">
                                <th>Sl.No</th>
            <th>Recharge Date</th>
            <th >UserId</th>
            <th >Mobile</th>
            <th>Operator</th>
            <th>Type</th>
            <th>Trans Id</th>
            <th>Req Id</th>
            <!--<th>Before bal</th>
-->            <th>Amount</th>
           <!-- <th>After bal</th>-->
                            </tr>
                            </thead>
                            <tbody>
          <?php 	$i=1;	 foreach($results as $report_details_franchise){ ?>
     <tr>
      <?php
        $date= $report_details_franchise->rdate;
        $fdate=date('d/M/Y h:i:s A',strtotime($date));  
        ?>
           <td><?php echo $i;?></td>
          <td><?php echo $fdate;?></td>
          <td><?php echo $report_details_franchise->username; ?></td>
           <td><?php echo $report_details_franchise->mobile; ?></td>
            <td><?php echo $report_details_franchise->service; ?></td>
            <td><?php echo $report_details_franchise->type; ?></td>
             <td><?php echo $report_details_franchise->trans_id; ?></td>
              <td><?php echo $report_details_franchise->req_id; ?></td>
               <!--<td><?php echo $report_details_franchise->before_bal; ?></td>-->
           <td><?php echo $report_details_franchise->amount; ?></td>
          <!--<td><?php echo $report_details_franchise->after_bal; ?></td>-->
        
      </tr>    
     <?php $i++;} ?>  
    </tbody>
                          </table>
                    </div>
                    
                    
                    <?php	}	if($this->session->userdata('type')=="distributor")	{	?>
                    <div class="col-xs-12 table-responsive">
                          <table class="table air-table1 air-table2" id="dataTables-example">
                            <thead>
                            <tr class="table-title">
                                <th>Sl.No</th>
            <th >Date</th>
            <th >Success</th>
            <th >FRC Commission</th>
            <th >DIS Commission</th>
                            </tr>
                            </thead>
                            <tbody>
          <?php 	$i=1;	 foreach($results as $report_details_distributors){ ?>
     <tr>
 <?php
        $date= $report_details_distributors->rdate;
        $fdate=date('d/M/Y h:i:s A',strtotime($date));  
        ?>
         <td><?php echo $i;?></td>
          <td><?php echo $fdate;?></td>
           <td><?php echo $report_details_distributors->amount; ?></td>
            <td><?php echo $report_details_distributors->commission;?></td>
         <td><?php echo $report_details_distributors->dcommission;?></td>
      </tr>    
     <?php $i++;} ?>  
    </tbody
                          ></table>
                    </div>
                    
                    
                     <?php	}	if($this->session->userdata('type')=="retailer")	{	?>
                    <div class="col-xs-12 table-responsive">
                          <table class="table air-table1 air-table2" id="dataTables-example">
                            <thead>
                            <tr class="table-title">
                                <th>Sl.No</th>
            <th>Recharge Date</th>
            <th >UserId</th>
            <th >Mobile</th>
            <th>Operator</th>
            <th>Type</th>
            <th>Trans Id</th>
            <th>Req Id</th>
            <!--<th>Before bal</th>
-->            <th>Amount</th>
            <!--<th>After bal</th>-->
                            </tr>
                            </thead>
                            <tbody>
        
          <?php 	$i=1;	 foreach($results as $report_details_franchise){	 ?>
     <tr>
 <?php
        $date= $report_details_franchise->rdate;
        $fdate=date('d/M/Y h:i:s A',strtotime($date));  
        ?>
           <td><?php echo $i;?></td>
          <td><?php echo $fdate;?></td>
          <td><?php echo $report_details_franchise->username; ?></td>
           <td><?php echo $report_details_franchise->mobile; ?></td>
            <td><?php echo $report_details_franchise->service; ?></td>
            <td><?php echo $report_details_franchise->type; ?></td>
             <td><?php echo $report_details_franchise->trans_id; ?></td>
              <td><?php echo $report_details_franchise->req_id; ?></td>
               <!--<td><?php echo $report_details_franchise->before_bal; ?></td>-->
           <td><?php echo $report_details_franchise->amount; ?></td>
         <!-- <td><?php echo $report_details_franchise->after_bal; ?></td>-->
      </tr>    
     <?php $i++;} ?>  
    </tbody>
    </table>
                    </div>
                    <?php	}	?>
                    <!-- table ends-->
         

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