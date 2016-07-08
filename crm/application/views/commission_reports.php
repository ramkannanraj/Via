<div class="container-fluid">
      <!--  <button class="toggle-menu menu-left push-body gradient_btn1">Menu</button>-->
    	<div class="admin-page2">
        
        	<div class="row">
            	<div class="col-xs-12">
                <div class="panel dashboard">
                <div class="panel-body">
                	<div class="form-group">  <?php
					 		$this->load->view("report_menu");
					 
					  ?>
                    </div>
                    
                    
                    <div class=" mobile-1">
                        <p>Send Money Commission Reports</p>
                    </div>
         
                    
                    <?php  //if($this->session->userdata('type')=="admin"){ 	?>
                    <div class="col-xs-12 table-responsive">
                          <table class="table air-table1 air-table2" id="dataTables-example">
                            <thead>
                            <tr class="table-title">
                                <th>Sl.No</th>
                                <th>Username</th>
                                <th>Admin Commission</th>
                                <th>Distributor Commission</th>
                                <th>Amount</th>
                                <th>Admin Before Balance</th>
                                <th>Retailer Before Balance</th>
                                <th>Admin After Balance</th>
                                <th>Retailer After Balance</th>
                                <th>Remarks</th>
                                <th>Transfer Date</th>
                            </tr>
                            </thead>
                            <tbody>
          <?php 	$i=1;	 foreach($results as $reports){ ?>
                             <tr>
                              <?php
                                $date= $reports->transaction_date;
                                $fdate=date('d/M/Y h:i:s A',strtotime($date));  
                                ?>
                                  <td><?php echo $i;?></td>
                                  <td><?php echo $reports->name; ?></td>
                                  <td><?php echo $reports->admin_commission; ?></td>
                                  <td><?php echo $reports->distributor_commission; ?></td>
                                  <td><?php echo $reports->amount; ?></td>
                                  <td><?php echo $reports->admin_before_bal; ?></td>
                                  <td><?php echo $reports->retailer_before_bal; ?></td>
                                  <td><?php echo $reports->admin_after_bal; ?></td>
                                  <td><?php echo $reports->retailer_after_bal; ?></td>
                                  <td><?php echo $reports->remarks; ?></td>
                                  <td><?php echo $fdate;?></td>
                                  
                                
                              </tr>    
     <?php $i++;} ?>  
    </tbody>
                          </table>
                    </div>
                    
                    
                    <?php	//}	
					if($this->session->userdata('type')=="distributor")	{	?>
                    
                    
                    
                     <?php	}	if($this->session->userdata('type')=="retailer")	{	?>
                    
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