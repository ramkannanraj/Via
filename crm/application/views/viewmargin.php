<script>
$(document).ready(function() {
$('#dataTables-example').DataTable({
responsive: true
});
});
</script>
<script>
$(document).ready(function() {
$('#dataTablesss-example').DataTable({
responsive: true
});
});
</script>
      <script>
$(document).ready(function() {
$('#dataTablesssss-example').DataTable({
responsive: true
});
});
</script> 

<div class="container-fluid">
   
    	<div class="admin-page2">
        
        	
        	<div class="row">
            	<div class="col-xs-12">
                <div class="panel dashboard">
            <div class="panel-body">
                       <div class="form-group">
                       <a href="<?php echo site_url('user/myprofile') ?>" class="btn btn-warning">Profile</a>
                       <a href="#" class="btn btn-warning active">Discounts</a>
                       </div>
                       
                       </div>
                       </div>
                       
                       <div class="panel dashboard">
            <div class="panel-body">
                       <div class="mobile-1">
                        <p>Mobile Service-Pre Paid</p>
                    </div>
                    
                    <div class="table-responsive">
                          <table class="table air-table1" id="dataTables-example">
                          <thead>
                            <tr class="table-title">
                                <th scope="col">Name</th>

                                                   
                                                    <?php if($this->session->userdata('type')== "distributor"

                                                     ||$this->session->userdata('type')== "super"  || 

                                                        $this->session->userdata('type')=='admin') { ?>

                                                    <th scope="col">Distributer Discounts</th>

                                                                <?php } ?>

                                                    <th scope="col">Retailer Discounts</th>

                                                    <th scope="col">SMS Code</th>
                              </tr>
                              </thead>
                              <tbody>
                                                <?php foreach($mobile->result() as $val){?>
                                                <tr>
                                                    <td>
                                                     <?php if(($val->id)==19) {?>
                                                      <img src='<?php echo base_url(). 'images/'.$val->image?>' width='50' height="50">TOPUP<br />                                  
                                                     <?php } else { ?>
                                                     <img src='<?php echo base_url(). 'images/'.$val->image?>' width='50' height="50">                          
                                                   	 <?php } if(($val->id)==16 )  {?>
														 Validity                       
													<?php  } if(($val->id)==3) {?>
														CDMA
                                                        <?php } if(($val->id)==6) {?>
														GSM
                                                        <?php } if(($val->id)==7){	?>
                                                     Indicom
                                                     <?php	}	if(($val->id)==11){ ?>
												   Validity
                                                     <?php }  if(($val->id)==14)	{ ?>
                                                      special
                                                     <?php } if(($val->id)==15)	{ ?>
                                                      TOPUP
                                                     <?php	}	if(($val->id)==17)	{ ?>
                                                       CDMA
                                                     <?php	}	if(($val->id)==20)	{ ?>
                                                      Special
                                                     <?php	} if(($val->id)==9)	{ ?>
                                                      Special
                                                     <?php	}	?>
												   </td>
                                                   
                                                    <?php if($this->session->userdata('type')== "distributor"
                                                    ||$this->session->userdata('type')== "super"  || 
                                                    $this->session->userdata('type')=='admin') { ?>
                                                    <td><?php echo $val->dcommission?> <br /></td>
                                                    <?php }  ?>
                                                    <td><?php echo $val->commission?> <br /></td>          
                                                    <td><?php echo $val->smscode?> <br /></td>
                                                </tr>
                                                 <?php }?>
                                            </tbody>
                          </table>
                    </div>
                       </div>
                       </div>
                       
                   <div class="panel dashboard">
            <div class="panel-body">
                        
                    <div class="mobile-1">
                	<p>Mobile Service-Post Paid</p>
                </div>
                
                <div class="table-responsive">
                      <table class="table air-table1" id="dataTablesss-example">
                      <thead>
                                                <tr class="table-title">
                                                    <th scope="col">Name</th>
                                                     
                                                    <?php if($this->session->userdata('type')== "distributor"
                                                     ||$this->session->userdata('type')== "super"  || 
                                                        $this->session->userdata('type')=='admin') { ?>
                                                    <th cope="col">Distributer Discounts</th>
                                                                <?php } ?>
                                                    <th scope="col">Retailer Discounts</th>
                                                    <th scope="col">SMS Code</th>
                                                 </tr>
                                            </thead>
                        
                          <tbody>
                                                <?php foreach($postpaid_mob->result() as $val){?>
                                                <tr>
                                                    <td>
                                                    <img src='<?php echo base_url(). 'images/'.$val->image?>' width='50' height="50">
                                                    </td>
                                                     
                                                    <?php if($this->session->userdata('type')== "distributor"
                                                    ||$this->session->userdata('type')== "super"  || 
                                                    $this->session->userdata('type')=='admin') { ?>
                                                    <td><?php echo $val->dcommission?> <br /></td>
                                                    <?php }  ?>
                                                    <td><?php echo $val->commission?> <br /></td>          
                                                    <td><?php echo $val->smscode?> <br /></td>
                                                </tr>
                                                 <?php }?>
                                            </tbody>
                      </table>
                </div>
                
                       </div>
                       </div>
                       
                       <div class="panel dashboard">
            <div class="panel-body">
                   
                 <div class="mobile-1">
                	<p>DTH Service</p>
                </div>
                
                <div class="table-responsive">
                      <table class="table air-table1" id="dataTablesssss-example">
                      <thead>
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <?php if($this->session->userdata('type')== "distributor" 
                                                    ||$this->session->userdata('type')== "super"  || 
                                                    $this->session->userdata('type')=='admin') { ?>
                                                    <th scope="col">Distributer Discounts</th>
                                                    <?php } ?>
                                                    <th scope="col">Retailer Discounts</th>
                                                    <th scope="col">SMS Code</th>
                                                </tr>
                                            </thead>
                        
                          <tbody>
                                            <?php foreach($dth->result() as $val){?>
                                                <tr>	
                                                    <td><?php /*?><?php echo  $val->name?><?php */?>
                                                    <img src='<?php echo base_url(). 'images/'.$val->image?>' width='60' height="60"> <br /></td>
                                                    <?php if($this->session->userdata('type')== "distributor"
                                                    ||$this->session->userdata('type')== "super"  || 
                                                    $this->session->userdata('type')=='admin') { ?>
                                                    <td><?php echo $val->dcommission?> <br /></td>
                                                    <?php }  ?>
                                                    <td><?php echo $val->commission?>  <br /></td>          
                                                    <td><?php echo $val->smscode?> <br /></td>
                                                </tr>
                                            <?php }?>
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
    
