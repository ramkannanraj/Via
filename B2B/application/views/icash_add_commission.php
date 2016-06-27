<script src="http://ajax.googleap...1/jquery.min.js">
</script>


<div class="container">
       
    	<div class="admin-page2">
        	<div class="row">
            	<div class="col-md-offset-2 col-md-8 ">
                <div class="panel dashboard">
                	<div class="panel-body">
 <div class="form-group">
                     	<?php $type=$this->session->userdata('type');
						if( $type === "admin" ){?>
                    	<a href="<?php echo site_url('prepaid/prepaid_service') ?>" class="btn btn-warning">Prepaid</a>
                        <a href="<?php echo site_url('postpaid/postpaid_service') ?>" class="btn btn-warning">Postpaid</a>
                        <a href="<?php echo site_url('DTH_provider/DTH_service') ?>" class="btn btn-warning">DTH</a>
 <a href="<?php echo site_url('sendmoney/add_commission') ?>" class="btn btn-default active">Send Money</a>
                        <?php } ?>
                   </div>
                	<div class="mobile-1">
                    <p>Send Money Commission</p>
                    </div>
               
                <!-- col-xs-12 ends-->
               <span style="color:green;"><?php if($this->session->flashdata('message')){ echo $this->session->flashdata('message');   }?></span> 
               <span style="color:red;"><?php if($this->session->flashdata('error')){ echo $this->session->flashdata('error');   }?></span> 
               
                    
                    <?php foreach($commission as $commission){
						if($commission->type == 'money_transfer'){
						
						 ?>
                     
                     <form method="post" class="row" action="<?php echo site_url('sendmoney/add_icash_commission') ?>" >
                     <div class="form-group col-lg-12">
                      <label><?php echo $commission->type; ?></label>
                     </div>
                     
                         
                             
                            
                             <div class="form-group col-lg-3">
                              <label>Range Start</label>
                              <input type="text" value="<?php echo $commission->range_start; ?>" name="range_start" class="form-control" >
                              </div>
                              <div class="form-group col-lg-3">
                              <label>Range End</label>
                              <input type="text" value="<?php echo $commission->range_end; ?>" name="range_end" class="form-control" >
                             </div>
                              <div class="form-group col-lg-3">
                               <label>Commission</label>     
                              <input type="text" value="<?php echo $commission->commission; ?>" name="commission" class="form-control" >
                               <input type="hidden" class="form-control" value="<?php echo $commission->type; ?>" name="type"/>
                               <input type="hidden" class="form-control" value="<?php echo $commission->id; ?>" name="id"/>
                             
                             </div>
                              <div class="form-group col-lg-3">
                              <label>Action</label> 
                              <input type="submit" value="Save" class="form-control btn-warning">
                         </div>
                   
                        </form>
                     
                     
                     
                     
                     
                     
                     <?php }else{  ?>
                    
                        <form method="post" action="<?php echo site_url('sendmoney/add_icash_commission') ?>" >
                            <div class="form-group">
                              <label><?php echo $commission->type; ?></label>
                             <div class="input-group">
                                    
                              <input type="text" value="<?php echo $commission->commission; ?>" name="commission" class="form-control" >
                               <input type="hidden" class="form-control" value="<?php echo $commission->type; ?>" name="type"/>
                               <input type="hidden" class="form-control" value="<?php echo $commission->id; ?>" name="id"/>
                              <span class="input-group-btn">
                                 <input type="submit" value="Save" class="btn btn-warning">
                              </span>
                            </div><!-- /input-group -->
                                                
                         </div>  
                        </form>
                                    
                                   <?php } } ?>
                     </div>
                  </div>
               </div>                  
            </div>
            <!-- row ends-->
        </div>
        <!-- admin-page1 ends -->
    </div>
    
    
    <!-- RESP MENU STARTS -->
<!--load jPushMenu, required-->
     
<!-- RESP MENU ENDS -->


<!-- TOOGLE STARTS -->
<!-- TOOGLE SCRIPT -->
<script type="text/javascript" src="js/tab_accodian.js"></script>
<script>
 $(document).ready(function() {
	$('.accordion').accordion({defaultOpen: 'some_id'}); //some_id section1 in demo
});
</script>
<!-- TOOGLE ENDS -->