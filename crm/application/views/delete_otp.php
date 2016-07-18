 
	
		<div class="container-fluid">
			<div class="admin-page2">

				<!-- Left Sidebar Start -->
				

                    <!-- Row Start -->
                    <div class="row">
                        <div class="col-lg-offset-4 col-lg-4">
                     <div class="panel dashboard">
                     <div class="panel-body">      
                              
                               		
									<div class="mobile-1">
                    					<p>DELETE OTP</p>
                                    </div>	
                                    							
<form method="post" action="<?php echo site_url('beneficiary/deleteotp') ?>"  >
  

 <div class="form-group">
<label>OTP</label>
<input type="text" name="otp_no" required class="form-control"/>
<input type="hidden" name="card_number" readonly value="<?php  echo $this->session->userdata('card_no');?>" class="form-control"/>
<input type="hidden" name="ben_id" readonly value="<?php  echo $bene_id;?>"   />
</div>
<div class="form-group">
<select name="ben_status" class="form-control"  required >
<option value="10">Delete</option>
<option value="11">Disable</option>
</select>
</div>
<div class="form-group">
<input type="submit" class="btn btn-warning" value="Delete Otp"  />
</div>

</form> 
</div>
</div>


	</div>
						</div>
					
					<!-- Row End -->
				</div>
				<!-- Left Sidebar End -->
			</div>
				<!-- Dashboard Wrapper End -->

