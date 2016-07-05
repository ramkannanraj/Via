     	<div class="panel dashboard">
        	<div class="panel-body">
             <?php if(isset($error)){ ?>
     <div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   <?php echo $error; ?>
</div>
<?php } ?> 

 <?php if($this->session->flashdata('error')){ ?>
     <div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   <?php echo $this->session->flashdata('error'); ?>
</div>
<?php } ?> 
     
    <?php if(isset($message)){ ?>
     <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   <?php echo $message; ?>
</div>
    <?php } ?> 
    
     <?php if($this->session->flashdata('message')){ ?>
     <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   <?php echo $this->session->flashdata('message'); ?>
</div>
    <?php } ?>  
           

            
         
                   
                    
                     <?php //foreach($card_details as $user){ ?>
				<div class="row">
                
                	<div class="col-lg-6">
                    
                     <div class="mobile-1"><p>Card Topup</p></div>
                   <form method="post" id="cardTopup" action="<?php echo site_url('sendmoney/card_topup') ?>"  >
                 
                     <?php //foreach($card_details as $user){ ?>

                     <?php /*?>
                   <div class="form-group">
                    <label >Face Value</label>
					<input type="text" class="form-control" name="mobile" readonly  value=" <?php  echo $user->transaction_limit;?>" />
                   </div>
				    <div class="form-group">
                    <label>Topup Limit</label>
					<input type="text"  class="form-control" name="pin" readonly value="<?php  echo $user->transaction_limit;?> "/>
<<<<<<< HEAD</div>
                    <?php */?>
                    <?php /*?><div class="form-group col-lg-6"> 
                        <label>Balance</label>
                        <input type="text"  class="form-control" name="mobile" readonly value="<?php  echo $this->session->userdata('balance');?>"   />
                        
                         

					</div><?php */?>
                    
                    <div class="form-group col-lg-6">
                    
                        <label>Balance</label>
                        <input type="text"  class="form-control" name="mobile" readonly value="<?php  echo $this->session->userdata('balance');?>"   />
                     </div> 
                      <div class="form-group col-lg-6">
                        <label >Region</label>
                      

                        <select name="region"  class="form-control">
                        <option value="1">SOUTH</option>
                        <option  value="2">NORTH</option>
                        <option  value="3">WEST</option>
                        <option value="4" >EAST</option>
                        <option  value="5">OTHERS</option>
                        </select>

                        <input type="hidden" name="top_mobile"  class="form-control" readonly value="<?php  echo $this->session->userdata('mobile_number');?>"    />
                        <input type="hidden" name="seckey"  class="form-control" readonly value="<?php  echo $this->session->userdata('security_key');?>"   />
                        <input type="hidden" name="card_no"  class="form-control" readonly value="<?php  echo $this->session->userdata('card_no');?>"   />
                           </div>
                           <div class="form-group col-lg-6">
                             <label>Topup Amount</label>
                             <input  class="form-control" type="text" name="amnt" required/>
                             <span> Minimum amount of card topup is Rs.100/-</span>
                             
                     <?php //}?>
                        <input type="hidden" name="service"  class="form-control" readonly value="0.25"    />
                         </div>
                           <div class="form-group col-lg-12">
                           <div class="pull-right">
                         	 <input type="submit" value="Submit"  class="btn btn-warning" />
                             </div> 
                    	</div>
                    
                    
                    </form>
                    </div>
                    
                    </div>
            
            </div>
        </div>
     </div>
            </div>
        </div>
   </div>
                <!-- container close -->
        
	 
    
  <script src="<?php echo base_url()?>/assets/js/jquery.validate.min.js"></script>
   <script src="<?php echo base_url()?>/assets/js/jquery.validate-rules.js"></script>
              
 