<style>


 .user-info-block .navigation {  width: 100%;
    margin: 0;
    padding: 0;
    list-style: none;
    border-bottom: 1px solid #F3F1F1; 
    border-top: 1px solid #F3F1F1;
    border-left: 1px solid #F3F1F1;
    border-right: 1px solid #F3F1F1;
    background-color: #E1106D;
    color: white;}
  .navigation li {float: none!important; display:inline-block; margin: 0; padding: 0;}
   .navigation li a {    padding: 10px 20px;
    display: block;
    color: inherit;
    font-size: 20px;}
   .navigation li.active a {background: rgba(0, 0, 0, 0) linear-gradient(90deg, rgba(7, 127, 240, 1) 0%, rgba(0, 187, 240, 1) 100%) repeat scroll 0 0; color: #fff;}
 .user-info-block .user-body {}
  .user-body .tab-content > div { width: 100%;}
  .user-body .tab-content h4 {width: 100%; margin: 10px 0; color: #333;}

  .user-info-block .panel-heading{
	/* background: rgb(162, 162, 162);*/
	 background: #ec971f; 
	  /*background: rgba(0, 0, 0, 0) linear-gradient(90deg, rgba(7, 127, 240, 1) 0%, rgba(0, 187, 240, 1) 100%) repeat scroll 0 0;*/
	  color:#fff;
  }
  
  .user-info-block .panel-heading:hover{
    background: rgba(0, 0, 0, 0) linear-gradient(270deg,#f0ad4e,#ec971f) repeat scroll 0 0 ;
  }
.user-row .title{
	font-size:20px;
	font-weight:600;
	padding-top:12px;
}
 .user-info-block .panel-default{
	 margin-bottom:30px;
	
 }
 .no-padding{
	 padding:0px;
 }

.user-row .glyphicon-chevron-down{
	
padding-top: 15px;
    font-size: 12px;
}
</style>



<div class="container-fluid">
       <!-- <button class="toggle-menu menu-left push-body gradient_btn1">Menu</button>-->
    	<div class="admin-page1">
        
        
    
        	<div class="row">
            
            
            <div class="col-sm-12 col-md-12 user-info-block">
        
      <div class="panel dashboard">
                <div class="panel-body">
                	 <div class="mobile-1">
                    <p>Dashboard</p>
                    </div>  
        
        
            <?php


					foreach($user_details as $user){ ?>
                	<!--<div class="user-heading row">
                   <div class="col-lg-4">
                    <?php  echo $user->name;?>
                    </div>
                    <div class="col-lg-4">
                     <?php  echo $user->mobile;?>
                     </div>
                    <div class="col-lg-4">
                    <a href="#"><?php  echo $user->email;?></a>
                     </div>
                </div>-->
                
                
              
  <div class="row" id="accordion" role="tablist" aria-multiselectable="true">
<div class="col-lg-4">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#wallet" aria-expanded="true" aria-controls="collapseOne">
         <div class="row user-row">
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                 <i class="glyphicon glyphicon-briefcase" style="font-size:40px;"></i>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <div class="title">Wallet Balance</div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <i class="glyphicon glyphicon-chevron-down"></i>
            </div>
        </div>
        </a>
      </h4>
    </div>
    <div id="wallet" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
       <div class="panel-body">
                
                    
 				
                        <p><span>Rs<?php  echo($user->total_balance - $user->used_balance );?></span></p>
                        
                        <!--<div class="add_promo">
                         <form>
                             <input type="text" placeholder="Enter your promo code" />
                                <small class="cancel">Cancel</small>
                            </form>
                        </div>
                        <small class="promo_code">Have Promo Code?</small>-->
                
                    
                  </div>
                   <?php if( $type=$this->session->userdata('type')=='admin'){ ?>
                      <div class="panel-footer"> 
                       <div class="add_money_field">
                        <p id="addMoneySucc" style="color:green;"></p>
                        <p id="addMoneyFail" style="color:red;"></p>
                        
                         <form id="addMoney" action="javascript:void(0);">
                         
                          <div class="input-group">
  <input type="text" id="addAmount" name="addAmount" placeholder="Enter Amount" class="form-control" aria-label="...">
  <div class="input-group-btn">
    <input type="button" class="btn btn-danger cancel" value="cancel"/>
     <input type="submit" class="btn btn-default" value="Add" />
  </div>
</div>
                            <!-- <input type="text" id="addAmount" name="addAmount" placeholder="Enter Amount" />
                                <input type="submit" class="gradient_btn" value="Add" />
                                <small class="cancel">Cancel</small>-->
                            </form>
                        </div>
                           
                               <button type="button" class="btn btn-default add_money" data-toggle="modal">Add money</button>
                         
                    </div>
                    
                    
                     
                       
                    <?php } ?> 
    </div>
  </div>
</div>
<div class="col-lg-4">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#sendmoney" aria-expanded="true" aria-controls="collapseOne">
         <div class="row user-row">
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                 <i class="glyphicon glyphicon-briefcase" style="font-size:40px;"></i>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <div class="title">Send Money</div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <i class="glyphicon glyphicon-chevron-down"></i>
            </div>
        </div>
        </a>
      </h4>
    </div>
    <div id="sendmoney" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
       <div class="panel-body">
                
                    
 				
                        <span>Rs<?php  echo ($user->send_money_bal - $user->sendmoney_used_bal );?></span>
                   </p>
                        
                        <!--<div class="add_promo">
                         <form>
                             <input type="text" placeholder="Enter your promo code" />
                                <small class="cancel">Cancel</small>
                            </form>
                        </div>
                        <small class="promo_code">Have Promo Code?</small>-->
                
                    
                  </div>
                   <?php if( $type=$this->session->userdata('type')=='admin'){ ?>
                      <div class="panel-footer"> 
                       <div class="add_send_money_field">
                        <p id="sendMoneySucc" style="color:green;"></p>
                        <p id="sendMoneyFail" style="color:red;"></p>
                        
                         <form id="sendMoneyBal" action="javascript:void(0);">
                         
                          <div class="input-group">
  <input type="text" id="sendMoneyAmt" name="sendMoneyAmt" placeholder="Enter Amount" class="form-control" aria-label="...">
  <div class="input-group-btn">
    <input type="button" class="btn btn-danger cancel" value="cancel"/>
     <input type="submit" class="btn btn-default" value="Add" />
  </div>
</div>
                            <!-- <input type="text" id="addAmount" name="addAmount" placeholder="Enter Amount" />
                                <input type="submit" class="gradient_btn" value="Add" />
                                <small class="cancel">Cancel</small>-->
                            </form>
                        </div>
                       
                     <button type="button" class="btn btn-default add_send_money" data-toggle="modal">Add send money</button>
                    </div>
                    
                    
                     
                       
                    <?php } ?>  
    </div>
  </div>
</div>

<div class="col-lg-4">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#transhistory" aria-expanded="true" aria-controls="collapseOne">
         <div class="row user-row">
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                 <i class="glyphicon glyphicon-tasks" style="font-size:40px;"></i>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <div class="title">Transaction History</div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <i class="glyphicon glyphicon-chevron-down"></i>
            </div>
        </div>
        </a>
      </h4>
    </div>
    <div id="transhistory" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
                	
                    <div class="row">
					<?php  foreach($saved_transaction_details as $trans){ ?>
                        <div class="col-xs-12">
                            <p><?php echo date('d-m-Y',strtotime($trans->rdate));?>  Recharge <?php echo $trans->mobilenumber;?>(<?php echo $trans->service;?> )<span>Transaction Id <?php echo $trans->trans_id;?></span>
                            <span class="price"><?php echo $trans->amount;?></span></p>
                        </div>
					<?php } ?>
                        
                        
                    </div>
                    <!-- row ends -->
                    </div>
                    <div class="panel-footer">
                     <button type="button" class="btn btn-default" data-toggle="modal">View Full History</button>
                    </div>
    </div>
  </div>
</div>
<div class="col-lg-4">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#savecard" aria-expanded="true" aria-controls="collapseOne">
         <div class="row user-row">
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                 <i class="glyphicon glyphicon-credit-card" style="font-size:40px;"></i>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <div class="title">Save Card</div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <i class="glyphicon glyphicon-chevron-down"></i>
            </div>
        </div>
        </a>
      </h4>
    </div>
    <div id="savecard" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
       <div class="panel-body">
                	
                 
                    <div class="row">
					<?php  foreach($saved_card_details as $card){ ?>
                    	<div class="col-xs-12">
                        	<?php 
							if($card->card_number > 0 && $card->card_number != ""){
							echo $card->bank_name;?> ( <?php echo $card->card_type;?> )<br /><?php //echo $card->card_number;
							$str_len = strlen($card->card_number);
								if( $str_len >= 8  ){
								echo substr($card->card_number, 0, 4) . str_repeat('X', strlen($card->card_number) - 8) . substr($card->card_number, -4);							}else{
								echo $card->card_number;//substr($card->card_number, 0, 4) . str_repeat('X', strlen($card->card_number) - 8) . substr($card->card_number, -4);					
								
							}
							
							
						     }
							
							?>
                        </div>
					<?php } ?>
                        
                    </div>
                    <!-- row ends -->
                    </div>
                    <div class="panel-footer">
                     <button type="button" class="btn btn-default " data-toggle="modal" data-target=".bs-example-modal-lg-2">Add Card</button>
                    </div>
    </div>
  </div>
</div>
<div class="col-lg-4">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#addressbook" aria-expanded="true" aria-controls="collapseOne">
         <div class="row user-row">
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                 <i class="glyphicon glyphicon-book" style="font-size:40px;"></i>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <div class="title">Address Book</div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <i class="glyphicon glyphicon-chevron-down"></i>
            </div>
        </div>
        </a>
      </h4>
    </div>
    <div id="addressbook" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
     <div class="panel-body">
                	
				   
				   <?php  foreach($saved_address_details as $address){ ?>
                    	<div class="col-xs-12">
                        	<p><?php echo $address->name;?>,<?php echo $address->mobile_number;?><br /><?php echo $address->address;?>,<?php echo $address->city;?>,<?php echo $address->state;?>,<?php echo $address->pincode;?></p>
                        </div>
					<?php } ?></p>
                  
                    </div>
                    <div class="panel-footer">
                     <button type="button" class="btn btn-default " data-toggle="modal" data-target=".bs-example-modal-lg-3">Add Address</button>
                    </div>
    </div>
  </div>
</div>
 </div> 
 
          <?php } ?>        
     </div>
     </div>    
               
          
        </div>
                           
		
        
            
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/assets/paybuks/css/jquery.fancybox.css" media="screen" />
	<script type="text/javascript" src="<?php echo base_url()?>/assets/paybuks/js/jquery.fancybox.js"></script>
    
    <script type="text/javascript">
		$(document).ready(function() {
			$('.fancybox').fancybox();		
		});
	</script>
    
               <!-- <a class="fancybox select-op" href="#inline1">Go</a>-->
                <!---inner popup window starts----->
                                 <div class="form-inner">
                                        <div id="inline1" cl style="display: none;">
                                                <div class="check-mail">
                                                    <span>Check Email ID/ Mobile</span>
                                                    <div class="check-mail-inner">
                                                        <p>Please Enter Email ID / Mobile Number</p>
														<a class="btn-bg" href="javascript:$.fancybox.close();">OK</a>
                                                    </div>
                                               </div>
                                        </div>
                                    </div>
                 <!---inner popup window ends----->
                                    
                                    
                <!-- POPUP STARTS -->
                <div class="modal fade bs-example-modal-lg-2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                        	
                            	<div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                    <h2 class="modal-title" id="myLargeModalLabel">Card Details</h2>
                                </div>
                                <div class="modal-body">
                                <form method="POST" action="<?php echo site_url('user/addcarddetails') ?>">
                             <div class="row">
                                	<div class="form-group col-sm-6 col-xs-12">
                                    	<label for="pop_name">Bank Name</label>
                                        <select id="bank_name" name="bank_name" class="form-control" required>
                                        <option value="">Select Bank</option>
                                        <option value="State Bank of India">State Bank of India</option>
                                        <option value="Icici">Icici</option>
                                        <option value="Axis">Axis</option>
                                        <option value="Federal">Federal</option>
                                        <option value="Hdfc">Hdfc</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6 col-xs-12">
                                    	<label for="pop_name">Card Holder Name</label>
                                        <input type="text" value="" id="card_holder_name" name="card_holder_name" class="form-control" required/>
                                    </div>
                                    <div class="form-group col-sm-6 col-xs-12">
                                    	<label for="pop_mob">Card Number</label>
                                        <input type="text" value="" id="card_no" name="card_no" maxlength="16"  class="form-control" required/>
                                    </div>
                                    <div class="form-group col-sm-6 col-xs-12">
                                    	<label for="pop_address">Card Type</label>
                                        <select id="card_type" name="card_type" class="form-control" required>
                                        <option value="">Select Card Type</option>
                                        <option value="Visa">Visa</option>
                                        <option value="Master">Master</option>
                                        <option value="Maestro">Maestro</option>
                                        <option value="Visa Electron">Visa Electron</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                    	<label for="pop_city">Valid Date</label>
                                        <select id="valid_month" name="valid_month" class="form-control" required>
                                        <option value="">Select Month</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        </select>
                                      </div>
                                      <div class="form-group col-sm-4 col-xs-12"> 
                                      <label for="pop_city">Valid Year</label> 
                                        <select id="valid_year" name="valid_year" class="form-control" required>
                                        <option value="">Select Year</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                        <option value="2030">2030</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                    	<label for="pop_city">CSV Number</label>
                                        <input type="text" value="" id="csv_no" name="csv_no"  class="form-control" maxlength="3" required/>
                                    </div>
                                    <div class="form-group col-md-12 col-xs-12">
                                    	<div class="pull-right">
                                    	<button type="submit" class="btn btn-default">Save Card</button>
                                         <button type="submit" data-dismiss="modal" class="btn btn-danger">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                                 </form>
                                </div>
                                <!-- row ends -->
                           
                        </div>
                    </div>
                </div>
                <!-- POPUP ENDS -->
                
                <!-- blog ends -->
                <!-- POPUP STARTS -->
                <div class="modal fade bs-example-modal-lg-3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                        	
                            	<div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                    <h2 class="modal-title" id="myLargeModalLabel">Address</h2>
                                </div>
                                
                                <div class="modal-body">
                                
                                <form action="<?php echo site_url('user/addaddress') ?>" method="POST">
                                
                                <div class="row">
                                	<div class="form-group col-sm-6 col-xs-12">
                                    	<label for="pop_name">Name</label>
                                        <input type="text" value="" id="add_name" name="add_name" class="form-control" required />
                                    </div>
                                    <div class="form-group col-sm-6 col-xs-12">
                                    	<label for="pop_mob">Mobile Number</label>
                                        <input type="text" value="" id="add_mobile" name="add_mobile" class="form-control" required/>
                                    </div>
                                    <div class="form-group col-sm-12 col-xs-12">
                                    	<label for="pop_address">Address</label>
                                        <textarea type="text" value="" id="add_address" name="add_address" class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                    	<label for="pop_city">City</label>
                                      <!--  <input type="text" value="" id="add_city" name="add_city" required/> -->
                                        <select id="add_city" name="add_city" class="form-control appendCity" required>
                                        <option value="">Select City</option>   
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                    	<label for="pop_state">State</label>
                                        <select id="add_state" name="add_state" class="form-control state" required>
                                        <option value="">Select State</option> 
										<?php foreach($State as $get_state) { ?>
                                        <option value="<?php echo $get_state->state_id; ?>"><?php echo $get_state->state_name;?></option>
                                        <?php }?>
                                      <!--  <option value="Tamilnadu">Tamilnadu</option>
                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                        <option value="Karnataka">Karnataka</option>
                                        <option value="Kerala">Kerala</option>-->
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                    	<label for="pop_pincode">Pincode</label>
                                        <input type="text" value="" id="add_pincode" class="form-control" name="add_pincode" required/>
                                    </div>
                                    <div class="form-group col-md-12 col-xs-12">
                                    	<div class="pull-right">
                                    	<button type="submit" class="btn btn-default">Save address</button>
                                        <button type="submit" data-dismiss="modal" class="btn btn-danger">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                                
                                 </form>
                                </div>
                                <!-- row ends -->
                           
                        </div>
                    </div>
                </div>
                <!-- POPUP ENDS -->
                <div class="col-lg-12 col-xs-12">
                   <div class="panel dashboard">
                <div class="panel-body">
                	 <div class="mobile-1">
                    <p>Transaction Results</p>
                    </div>
                    <div class="row">
                     
                       
                    	<div class="col-md-4 col-sm-6">	
                       
                        	<div class="row">
                            	<div class="col-xs-3">
                                	<img src="<?php echo base_url()?>/assets/paybuks/images/smiley1.png" />
                                </div>
									<?php 
								
			$pre_success=0;$post_success=0;$dth_success=0;
			$pre_failiure=0;$post_failiure=0;$dth_failiure=0;$landline_failiure=0;$landline_success=0;
			foreach($success_transactions_details as $success){ 
				
			if($success->type=='prepaid')
			{$pre_success=$success->total;}
			 if($success->type=='postpaid')
			{$post_success=$success->total;}
		     if($success->type=='dth')
			{$dth_success=$success->total;} 
			  if($success->type=='landline')
			{$landline_success=$success->total;} 
				
					}
			foreach($failiure_transactions_details as $failiure){ 
				
			if($failiure->type=='prepaid')
			{$pre_failiure=$failiure->total;}
			 if($failiure->type=='postpaid')
			{$post_failiure=$failiure->total;}
		     if($failiure->type=='dth')
			{$dth_failiure=$failiure->total;} 
			  if($failiure->type=='landline')
			{$landline_failiure=$failiure->total;}
					}?>
                    <div class="col-xs-9">
                    			<div class="col-xs-6">
                                	<p>Prepaid</p>
                                    <span><?php echo $pre_success;?></span>
                                </div>
                                <div class="col-xs-6">
                                	<p>Postpaid</p>
                                    <span><?php echo $post_success;?></span>
                                </div>
                                <div class="col-xs-6">
                                	<p>DTH</p>
                                    <span><?php echo $dth_success;?></span>
                                </div>
                                <div class="col-xs-6">
                                	<p>Landline</p>
                                    <span><?php echo $landline_success;?></span>
                                </div>
                                
                    </div>
                            </div>	
                        </div>
                        <div class="col-md-4 col-sm-6">	
                        	<div class="row">
                            	<div class="col-xs-3">
                                	<img src="<?php echo base_url()?>/assets/paybuks/images/smiley2.png" />
                                </div>
                                <div class="col-xs-9">
                    			<div class="col-xs-6">
                                	<p>Prepaid</p>
                                    <span><?php echo $pre_failiure;?></span>
                                </div>
                                <div class="col-xs-6">
                                	<p>Postpaid</p>
                                    <span><?php echo $post_failiure;?></span>
                                </div>
                                <div class="col-xs-6">
                                	<p>DTH</p>
                                    <span><?php echo $dth_failiure;?></span>
                                </div>
                                <div class="col-xs-6">
                                	<p>Landline</p>
                                    <span><?php echo $landline_failiure;?></span>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--<div class="col-md-4 col-sm-6">	
                        	<div class="row">
                            	<div class="col-xs-3">
                                	<img style="vertical-align:middle;" src="<?php echo base_url()?>/assets/paybuks/images/smiley3.png" />
                                </div>
                                <div class="col-xs-9">
                    			<div class="col-xs-6">
                                	<p>Prepaid</p>
                                    <span>2050</span>
                                </div>
                                <div class="col-xs-6">
                                	<p>Postpaid</p>
                                    <span>950</span>
                                </div>
                                <div class="col-xs-6">
                                	<p>DTH</p>
                                    <span>1050</span>
                                </div>
                                  <div class="col-xs-6">
                                	<p>Landline</p>
                                    <span>0</span>
                                </div>
                                </div>
                            </div>
                        </div>-->
                    </div>
                    <!-- row ends -->
                    </div>
                    </div>
                </div>
                <!-- blog ends -->
                <!--<div class="col-xs-12 dashboard2">
                	<h2>Transaction Report</h2>
                	<ul>
                    	<li><img src="<?php echo base_url()?>/assets/paybuks/images/transcation_report1.png" /><p>Prepaid</p></li>
                        <li><img src="<?php echo base_url()?>/assets/paybuks/images/transcation_report2.png" /><p>Postpaid</p></li>
                        <li><img src="<?php echo base_url()?>/assets/paybuks/images/transcation_report3.png" /><p>DTH</p></li>
                    </ul>
                </div>-->

 
  
                <!-----chart--------------->
                <div class="col-lg-12 col-xs-12" >
              <div class="panel dashboard">
              <div class="panel-body">
              <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.2/d3.min.js" charset="utf-8"></script>
     <script src="<?php echo base_url();?>/assets/js/nv.d3.js"></script>
	<style>
        .testBlock {
           display: block;
    /* float: left; */
    height: 300px;
    width: 227px;
    text-align: center;
    margin: auto;
        }
    </style>
    
     <div class="mobile-1"><p>Transaction Report</p></div>
     				<div class="row">
                    <div class="pie-charts-container">
                    	<div class="col-lg-4">
                        <div class="testBlock"><svg id="test2"></svg><div class="testblock1"><p>Postpaid</p></div> </div>
                        </div>
                        
                        <div class="col-lg-4">
                        <div class="testBlock"><svg id="test1"></svg><div class="testblock1"><p>Prepaid</p></div></div>
                        </div>
                        
                        <div class="col-lg-4">
                        <div class="testBlock"><svg id="test3"></svg><div class="testblock1"><p>DTH</p></div></div>
                        </div>
                        
                      <!--  <div class="col-lg-3">
                        <div class="testBlock"><svg id="test4"></svg><div class="testblock1"><p>Landline</p></div></div>
                        </div>
              -->
                      
                    </div>
                    
                    </div>
                
                </div>
                </div>
                
              </div>
             
                    <!---------chart end-------->
                    
                <!-- blog ends -->
            </div>
            <!-- row ends -->
        </div>
        <!-- admin-page1 ends -->

</div>

    
 
<?php
$num_result = mysql_query("SELECT count(*)  as id from  recharge_details where error_status_code=0 AND type='prepaid' ") or exit(mysql_error());
$row = mysql_fetch_object($num_result);
$faile_msg=$row->id;
 

$num_result = mysql_query("SELECT count(*)  as id from  recharge_details where error_status_code=1  AND type='prepaid' ") or exit(mysql_error());
$row = mysql_fetch_object($num_result);
$sucess_msg=$row->id;

$num_result = mysql_query("SELECT count(*)  as id from  recharge_details where error_status_code=2  AND type='prepaid' ") or exit(mysql_error());
$row = mysql_fetch_object($num_result);
$process_msg=$row->id;

 
$num_result = mysql_query("SELECT count(*)  as id from  recharge_details where error_status_code=0 AND type='postpaid' ") or exit(mysql_error());
$row = mysql_fetch_object($num_result);
$po_faile_msg=$row->id;

$num_result = mysql_query("SELECT count(*)  as id from  recharge_details where error_status_code=1  AND type='postpaid' ") or exit(mysql_error());
$row = mysql_fetch_object($num_result);
$po_sucess_msg=$row->id;

$num_result = mysql_query("SELECT count(*)  as id from  recharge_details where error_status_code=2  AND type='postpaid' ") or exit(mysql_error());
$row = mysql_fetch_object($num_result);
$po_process_msg=$row->id;

 

$num_result = mysql_query("SELECT count(*)  as id from  recharge_details where error_status_code=0 AND type='dth' ") or exit(mysql_error());
$row = mysql_fetch_object($num_result);
$dth_faile_msg=$row->id;

$num_result = mysql_query("SELECT count(*)  as id from  recharge_details where error_status_code=1  AND type='dth' ") or exit(mysql_error());
$row = mysql_fetch_object($num_result);
$dth_sucess_msg=$row->id;

$num_result = mysql_query("SELECT count(*)  as id from  recharge_details where error_status_code=2  AND type='dth' ") or exit(mysql_error());
$row = mysql_fetch_object($num_result);
$dth_process_msg=$row->id;



$num_result = mysql_query("SELECT count(*)  as id from  recharge_details where error_status_code=0 AND type='gas' ") or exit(mysql_error());
$row = mysql_fetch_object($num_result);
$gas_faile_msg=$row->id;

$num_result = mysql_query("SELECT count(*)  as id from  recharge_details where error_status_code=1  AND type='gas' ") or exit(mysql_error());
$row = mysql_fetch_object($num_result);
$gas_sucess_msg=$row->id;

$num_result = mysql_query("SELECT count(*)  as id from  recharge_details where error_status_code=2  AND type='gas' ") or exit(mysql_error());
$row = mysql_fetch_object($num_result);
$gas_process_msg=$row->id;
?>
<script>
$pre_process = "<?php echo $process_msg; ?>";
$pre_sucess = "<?php echo $sucess_msg; ?>";
$pre_fail = "<?php echo $faile_msg; ?>";
    var testdata = [
        {key: "One", y: $pre_process, color: "#8D0277"},
        {key: "Two", y: $pre_sucess, color: "#00BBF0"},
        {key: "Three", y: $pre_fail, color: "#E1106D"}
    ];

    var width = 200;
    var height = 200;

    nv.addGraph(function() {
        var chart = nv.models.pie()
                .x(function(d) { return d.key; })
                .y(function(d) { return d.y; })
                .width(width)
                .height(height)
                .labelType('percent')
                .valueFormat(d3.format('%'))
                .donut(true);

        d3.select("#test2")
                .datum([testdata])
                .transition().duration(1200)
                .attr('width', width)
                .attr('height', height)
                .call(chart);

        return chart;
    });

	
//postpaid
$post_process = "<?php echo $po_process_msg; ?>";
$post_sucess = "<?php echo $po_sucess_msg; ?>";
$post_fail = "<?php echo $po_faile_msg; ?>";
	var testdatas = [
        {key: "One", y: $post_process, color: "#8D0277"},
        {key: "Two", y: $post_sucess, color: "#00BBF0"},
        {key: "Three", y: $post_fail, color: "#E1106D"}
    ];

    var width = 200;
    var height = 200;

    nv.addGraph(function() {
        var chart = nv.models.pie()
                .x(function(d) { return d.key; })
                .y(function(d) { return d.y; })
                .width(width)
                .height(height)
                .labelType('percent')
                .valueFormat(d3.format('%'))
                .donut(true);

        d3.select("#test1")
                .datum([testdatas])
                .transition().duration(1200)
                .attr('width', width)
                .attr('height', height)
                .call(chart);

        return chart;
    });
	
	$dth_post_process = "<?php echo $dth_process_msg; ?>";
$dth_post_sucess = "<?php echo $dth_sucess_msg; ?>";
$dth_post_fail = "<?php echo $dth_faile_msg; ?>";
	var testdatad = [
        {key: "One", y: $dth_post_process, color: "#8D0277"},
        {key: "Two", y: $dth_post_sucess, color: "#00BBF0"},
        {key: "Three", y: $dth_post_fail, color: "#E1106D"}
    ];

    var width = 200;
    var height = 200;

    nv.addGraph(function() {
        var chart = nv.models.pie()
                .x(function(d) { return d.key; })
                .y(function(d) { return d.y; })
                .width(width)
                .height(height)
                .labelType('percent')
                .valueFormat(d3.format('%'))
                .donut(true);

        d3.select("#test3")
                .datum([testdatad])
                .transition().duration(1200)
                .attr('width', width)
                .attr('height', height)
                .call(chart);

        return chart;
    });
	
	/*gas
	$gas_post_process = "<?php echo $dth_process_msg; ?>";
$gas_post_sucess = "<?php echo $dth_sucess_msg; ?>";
$gas_post_fail = "<?php echo $dth_faile_msg; ?>";
	var testdatag = [
        {key: "One", y: $gas_post_process, color: "#55D4ff"},
        {key: "Two", y: $gas_post_sucess, color: "#C2d053"},
        {key: "Three", y: $gas_post_fail, color: "#CC4892"}
    ];

    var width = 200;
    var height = 200;

    nv.addGraph(function() {
        var chart = nv.models.pie()
                .x(function(d) { return d.key; })
                .y(function(d) { return d.y; })
                .width(width)
                .height(height)
                .labelType('percent')
                .valueFormat(d3.format('%'))
                .donut(true);
 
        d3.select("#test4")
                .datum([testdatag])
                .transition().duration(1200)
                .attr('width', width)
                .attr('height', height)
			 
                .call(chart);

        return chart;
    });*/
	$(document).on('submit','#addMoney',function(){
  
  
  var amount = $('#addAmount').val();
     var baseurl = '<?php echo base_url();  ?>';
  
  var total_bal = eval( $('#total_balance').html() );
  
  $.ajax({
   
   type:'POST',
   url:baseurl+'user/addMoney',
   data:'amount='+amount,
   datatype:'json',
   success:function(html){
    
    if(html.class == 'success'){
     
     $('#addMoneySucc').html(html.message);
	// $('#total_balance').html(total_bal + amount);
	 
	 alert('Successfully Updated');
		window.location.reload(true);
     
    }else if(html.class == 'fail'){
     
     
     $('#addMoneyFail').html(html.message);
     
    }
    
    
   }
   
   
   
  });
  
  
 });
 
 $(document).on('submit','#sendMoneyBal',function(e){
	e.preventDefault();
		var amount = $('#sendMoneyAmt').val();
	    var baseurl = '<?php echo base_url();  ?>';
		
		$.ajax({
			
			type:'POST',
			url:baseurl+'user/addSendMoneyBal',
			data:'amount='+amount,
			datatype:'json',
			success:function(html){
				
				if(html.class == 'success'){
					
					$('#sendMoneySucc').html(html.message);
					// alert('Successfully Updated');
		             window.location.reload(true);
					
				}else if(html.class == 'fail'){
				
					$('#sendMoneyFail').html(html.message);
				}
			}

		});

	});
	
	 
$(document).on('change','.state',function(){
	
	var state_id = $(this).val(); 	
			
           $.ajax({
                type: "POST",
                url: "<?php echo  site_url();?>user/get_city/"+state_id, 
                success: function(state) 
                { 
				var st = JSON.parse(state);
				 $('.appendCity').empty();
					$('.appendCity').append('<option value="">Select</option>');
                    $.each(st,function(id,city) 
                    {
                        var opt = $('<option />');
                        opt.val(city.city_id);
						opt.text(city.city_name);
                        $('.appendCity').append(opt);
                    }); 
  				}
 			});
	
	
});

</script>

