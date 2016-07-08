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
                        <p>Retailer Reports</p>
                    </div>
         
                    
                    <?php  //if($this->session->userdata('type')=="admin"){ 	?>
                    <div class="col-xs-12 table-responsive">
                          <table class="table air-table1 air-table2" id="dataTables-example">
                            <thead>
                            <tr class="table-title">
                                <th>Sl.No</th>
                                <th>Card No</th>
                                <th>Action</th>
                                
                            </tr>
                            </thead>
                            <tbody>
          <?php 	$i=1;	 foreach($results as $reports){ ?>
                             <tr>
                                  <td><?php echo $i;?></td>
                                  <td><?php echo $reports->card_no; ?></td>
                                  <td><a href="<?php echo base_url(); ?>reports/getCardDetails/<?php echo $reports->card_no; ?>">View</a></td>
                              </tr>    
     <?php $i++;} ?>  
    </tbody>
                          </table>
                    </div>
                   
                  
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