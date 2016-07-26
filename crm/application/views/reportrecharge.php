<div class="container-fluid">
      <!--  <button class="toggle-menu menu-left push-body gradient_btn1">Menu</button>-->
    	<div class="admin-page2">
        
        	<div class="row">
            	<div class="col-xs-12">
                <div class="panel dashboard">
                <div class="panel-body">
                	<div class="form-group">
                    	 <?php
					 		$this->load->view("report_menu"); 
					  ?>
                    </div>
                    
                    <div class="mobile-1">
                        <p>Recharge History Report</p>
                    </div>
                    
                    <div class="col-xs-12 table-responsive">
                <table class="table air-table1 air-table2" id="dataTables-example">
                  <thead><tr class="table-title">
                    <th>Sno</th>                                
                    <th>Number</th>
					<th style="width: 16%;">Recharge Date</th>
                    <th>Amount</th>
                     <th>Operator</th>
                    <th>After Balance</th> 
                    <th>Before Balance</th>
               <?php if( $this->session->userdata('type')=='distributor'    ){ ?>
                    <th>Dis. Commission</th>
                   <?php } ?>
                   
                     <?php if( $this->session->userdata('type')=='admin'  ){ ?>
                    <th>Ret. Name</th>
                   <?php } ?>
                    <th >Ret. Commission</th>
                    
                    <th>Trans id</th>	
                     
                    <th>Status</th> 
                    <th>Recharge Type</th> 
                                       </tr
                   ></thead>
                <tbody>
                            <?php if( isset( $history )  ){ $i=1;		
							
							
							
							
							foreach($history as $val){
							$date_in =date ("d-M-Y H:i:s",strtotime($val->rdate));
							
							try {
							  
							 //   $date_in =date ('d-M-Y H:i:s',strtotime('2016-02-28 05:22:39'));
							     
							  
								  $date = new DateTime( $date_in , new DateTimeZone('US/Eastern'));
								  $date->setTimezone(new DateTimeZone('Asia/Kolkata'));
								 $date_in = $date->format('d-M-Y H:i:s');
							  } catch (Exception $e) {
								 // echo $e->getMessage();
								  $date_in =  $e->getMessage(); //date ("d-M-Y H:i:s",strtotime($val->rdate));
							  }
							  
							$error_status =(int)$val->error_status_code;
							if( $error_status==1)
								{
									$con='Success';
								}else if($error_status==0)
								{
									$con='Failure';
								}
								else if($error_status==2)
								{
									$con='Pending';
								}else{
									$con='';
								}
								
								?> 
                            <tr>      
                                <td><?php echo $i;?></td>
                                <td><?php echo $val->mobilenumber?> </td>
                                <td><?php echo $date_in?></td>
                                <td><?php echo $val->amount?></td>
                                <td><?php echo $val->service?></td>
                                <td><?php echo $val->after_balance?></td>  
                                <td><?php echo $val->before_balance?></td>  <?php if( $this->session->userdata('type')=='distributor'  ){ ?>
                   <td><?php echo $val->dcommission?></td>
                   <?php } ?>
                               <?php if(  $this->session->userdata('type')=='admin'  ){ ?>
                   <td><?php echo $val->username?></td>
                   <?php } ?>
                                 <td><?php echo $val->commission?></td> 
                        <td><?php echo $val->req_id;?></td>			
                                <td><?php echo $con?></td>  
                                 <td><?php echo $val->recharge_type?></td>	
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