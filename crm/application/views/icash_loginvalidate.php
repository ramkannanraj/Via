<div class="container-fluid">
    	<div class="admin-page2"> 
        	<div class="row">
            	<div class="col-lg-offset-4 col-lg-4">
            		<div class="panel dashboard">
                    	<div class="panel-body">
                        <div class="mobile-1">
                    					<p>LOGIN VALIDATE</p>
                                    </div>
	                    	 <form method="post" class="form-style-9" action="<?php echo site_url('sendmoney/loginvalidate') ?>"  >
<div class="form-group">
<label>Mobil No</label>
<input type="text" name="mobile_no" required class="form-control" value="<?php echo $this->session->userdata('mobile_number');?>"  />
</div>

<div class="form-group">
<label>OTP</label>
<input type="text" name="otp_pass" required class="form-control"   />
</div>

<div class="form-group">
<input type="submit" value="Login Validate" class="btn btn-primary"  />
</div>



</form>
                         </div>
                    </div>
               </div>
            </div>
        </div>
   </div>



 