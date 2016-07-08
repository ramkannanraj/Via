 <script>
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>
<style>
.text-important{
	color:#F00;
}
</style>
<div class="container-fluid">
        <button class="toggle-menu menu-left push-body gradient_btn1">Menu</button>
    	<div class="admin-page2">
        	<div class="row">
            
            	<div class="col-md-12">
                
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
    <div class="form-group pull-right">
               
                 		<a href="<?php echo site_url('sendmoney/log') ?>" class="btn btn-default">Back</a>
                    
                    </div>
                    
                    
                    <div class="clearfix"></div>
    
             <div class="mobile-1">
             <p>Card Generation</p>
             </div>
             
             
             		
                    <form action="<?php echo site_url('sendmoney/card_register') ?>" enctype="multipart/form-data" method="POST">
                       
                       <div class="form-group col-md-12">
                       <div class="col-lg-12">
                       		<div class="form-group">
                             
                             <label>Register As</label>
                             <select name="account_type" required class="form-control">
                             	<option value="">Please Select Customer</option>
                                <option value="1">Non-KYC Customer</option>
                                <option value="2">KYC Customer</option>
                             </select>
                           	</div>
                       </div>
                       <div class="col-lg-6">
  
                            
                            <div class="form-group">
                             
                             <label>Mobile No<span class="text-important">*</span></label>
                             <input type="text" maxlength="10" minlength="10"required   onkeypress="return isNumber(event)" name="fields11" class="form-control">
                             
                             </div>
                             
                            <div class="form-group">
                             
                             <label>First Name<span class="text-important">*</span></label>
                             <input type="text" name="first_name" value="" class="form-control">
                             
                             </div>
                             
                             <div class="form-group">
                             
                             <label>Middle Name</label>
                             <input type="text" name="middle_name" value="" class="form-control">
                             
                             </div>
                             
                            <div class="form-group">
                             
                             <label>Last Name<span class="text-important">*</span></label>
                             <input type="text" name="last_name" value="" class="form-control">
                             
                             </div>
                            
                            <div class="form-group">
                             
                             <label>Date of Birth<span class="text-important">*</span></label>
                             <input type="date" name="dob" value="" class="form-control">
                             
                             </div>
                             
                             <div class="form-group">
                             
                             <label>Email<span class="text-important">*</span></label>
                             <input type="email" name="mail" value="" class="form-control">
                             
                             </div>
                             
                       </div>
                       
                       <div class="col-lg-6">
                                                          
                            <div class="form-group">
                             
                             <label>Address<span class="text-important">*</span></label>
                             <textarea type="text" name="address" rows="5" value="" class="form-control"></textarea>
                             
                             </div>
                            
                            <div class="form-group">
                             
                             <label>State<span class="text-important">*</span></label>
                             <input type="text" name="state" value="" class="form-control">
                             
                             </div>
                            <div class="form-group">
                             
                             <label>City<span class="text-important">*</span></label>
                             <input type="text" name="city" value="" class="form-control">
                             
                             </div>
                            
                            <div class="form-group">
                             
                             <label>Pin Code<span class="text-important">*</span></label>
                             
                             <input type="text" name="pin_code" maxlength="6" required   minlength="6" onkeypress="return isNumber(event)" value="" class="form-control">
                            <input type="hidden" class="form-control" name="trans_code" />
                            
                            </div>
                            
                            <div class="form-group">
                             
                             <label>Mothers/Maiden Name</label>
                             <input type="text" name="mothers_name" value="" class="form-control">
                             
                             </div>
                            
                       </div>
                       
                       </div>
                       <hr />
                       <div class="form-group col-md-12">
                       <div class="col-lg-6">
  
                            <div class="form-group">
                             
                             <label>Address Proof<span class="text-important">*</span></label>
                             <select name="address_proof_type" required class="form-control">
                             	<option value="">Select</option>
                                <option value="1">Voters PHOTOID</option>
                                <option value="2">Passport</option>
                                <option value="3">Family Ration Card</option>
                                <option value="4">Utility bill which is less than three months old.</option>
                                <option value="5">Shop license</option>
                                <option value="6">Letter of introduction or confirmation from post office.</option>
                                <option value="7">Letter of Introduction by local self Government official</option>
                                <option value="8">Aadhaar card</option>
                             </select>
                           	</div>
                            <div class="form-group">
                             
                             <label>Address Proof No.<span class="text-important">*</span></label>
                             <input type="text" name="address_proof_num" class="form-control">
                             
                             </div>
                   
                             
                       </div>
                       
                       <div class="col-lg-6">
                                                          
                           <div class="form-group">
                             
                             <label>ID Proof<span class="text-important">*</span></label>
                             <select name="id_proof_type" required class="form-control">
                             	<option value="">Select</option>
                                <option value="1">PAN card</option>
                                <option value="2">Voters PHOTOID</option>
                                <option value="3">Passport</option>
                                
                             </select>
                           	</div>
                            <div class="form-group">
                             
                             <label>ID Proof No.<span class="text-important">*</span></label>
                             <input type="text" name="id_proof_num" class="form-control" required="required">
                             
                             </div>
                            
                       </div>
                       
                      
                       
                       </div>
                       
                       <div class="form-group col-md-12">
                   
                       
                       
                       
                     
                       </div>
                       
                       <div class="form-group col-md-12">
                   
                    
                       <div class="col-lg-4">
                                                          
                           <div class="form-group">
                           		<label>Address Proof Upload<span class="text-important">*</span></label>
                           		<input type="file" name="kyc_addproof" class="form-control" required="required" />
                           	</div>
                            
                            
                       </div>
                       
                       <div class="col-lg-4">
                                                          
                           <div class="form-group">
                           		<label>ID Proof Upload<span class="text-important">*</span></label>
                           		<input type="file" name="kyc_idproof" class="form-control" required="required" />
                           	</div>
                            
                            
                       </div>
                       
                      
                       </div>
                        
                   
                    
                    <div class="form-group col-md-12">
                    <div class="pull-right">
                        <input type="submit" name="submit" value="Submit"class="btn btn-primary">
                        </div>
                    </div>
                </form>
                </div>
                <!-- col-xs-12 ends-->
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