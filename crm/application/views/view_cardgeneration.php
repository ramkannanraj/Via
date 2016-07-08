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

<div class="container-fluid">
        <button class="toggle-menu menu-left push-body gradient_btn1">Menu</button>
    	<div class="admin-page2">
        	<div class="row">
            
            	<div class="col-md-12">
                
                <div class="panel dashboard"> 
            <div class="panel-body">
                <?php if(isset($error)){ ?>
     <div class="alert alert-warning alert-dismissible"  role="alert">
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
               
                 		<a href="<?php echo site_url('sendmoney/log') ?>" class="btn btn-warning">Back</a>
                    
                    </div>
                    
                    
                    <div class="clearfix"></div>
    
             <div class="mobile-1">
             <p>Card Generation</p>
             </div>
             
             
             		
                    <form action="<?php echo site_url('sendmoney/card_register') ?>" method="POST">
                       
  
                             <div class="form-group col-md-6">
                             
                             <label>Register As</label>
                            <select required name="account_type" class="form-control">
                             	<option value="">Please Select Customer</option>
                                <option value="1">Non-KYC Customer</option>

                             </select>
                           	</div>
                           
                           
                           
                            <div class="form-group col-md-6">
                             
                             <label>User Name</label>
                             <input type="text" name="username" required class="form-control" />
                            
                             </div>
                            <div class="form-group col-md-6">
                             
                             <label>First Name</label>
                             <input type="text" name="first_name" value="" class="form-control">
                             
                             </div>
                            <div class="form-group col-md-6">
                             
                             <label>Last Name</label>
                             <input type="text" name="last_name" value="" class="form-control">
                             
                             </div>
                            <div class="form-group col-md-6">
                             
                             <label>Mothers/Maiden Name</label>
                             <input type="text" name="mothers_name" value="" class="form-control">
                             
                             </div>
                            <div class="form-group col-md-6">
                             
                             <label>Dob</label>
                             <input type="text" name="dob" value="" class="form-control">
                             
                             </div>
                            <div class="form-group col-md-6">
                             
                             <label>Email</label>
                             <input type="email" name="mail" value="" class="form-control">
                             
                             </div>
                            <div class="form-group col-md-6">
                             
                             <label>Mobile No</label>
                             <input type="text" maxlength="10" minlength="10"required   onkeypress="return isNumber(event)" name="fields11" class="form-control">
                             
                             </div>
                            <div class="form-group col-md-6">
                             
                             <label>State</label>
                             <input type="text" name="state" value="" class="form-control">
                             
                             </div>
                            <div class="form-group col-md-6">
                             
                             <label>City</label>
                             <input type="text" name="city" value="" class="form-control">
                             
                             </div>
                            <div class="form-group col-md-6">
                             
                             <label>Address</label>
                             <textarea type="text" name="address" value="" class="form-control"></textarea>
                             
                             </div>
                            <div class="form-group col-md-6">
                             
                             <label>Pin Code</label>
                             
                             <input type="text" name="pin_code" maxlength="6" required   minlength="6" onkeypress="return isNumber(event)" value="" class="form-control">
                            <input type="hidden" class="form-control" name="trans_code" />
                            
                            </div>
                        
                   
                    
                    <div class="form-group col-md-12">
                    <div class="pull-right">
                        <input type="submit" name="submit" value="Submit"class="btn btn-warning">
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