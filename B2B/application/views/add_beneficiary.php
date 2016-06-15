 	
    
    <div class="panel dashboard">
        	<div class="panel-body">
           
            
            <div class="row">
            <div class="col-lg-12">
             <div class="mobile-1"><p>ADD BENEFICIARY</p></div>
                    <form method="post" class="form-style-9" action="<?php echo site_url('beneficiary/addss_beneficiary') ?>"  >
<div class="form-group col-lg-6">
<?php //foreach($card_details as $user){ ?>
<label >Name</label>


 <input type="text" name="name" class="form-control"  required   ondrop="return false;"onpaste="return false;" />
<span id="error" style=" display: none"> </span>
  </div>
   <div class="form-group col-lg-6">
<label>Mobile No</label>
<input type="text" class="form-control"  name="mobile_no"  required  />
  </div>
   <div class="form-group col-lg-6">

<label>Bank Name</label>
<input type="text" class="form-control"  name="bank_name"  required   />
  </div>
   <div class="form-group col-lg-6">
<label>Branch Name</label>
<input type="text" class="form-control" name="branch_name" required  />
  </div>
   <div class="form-group col-lg-6">


<label >City</label>
<input type="text" class="form-control"  name="b_city"/>
  </div>
   <div class="form-group col-lg-6">
<label>State</label>
<input type="text" class="form-control"  name="b_state"     />

  </div>
   <div class="form-group col-lg-6">
<label>IFSC Code</label>
<input type="text" class="form-control" name="ifsc" onkeypress="return IsAlphaNumeric(event);" ondrop="return false;"onpaste="return false;" required/>
  </div>
   <div class="form-group col-lg-6">
<label>Account No</label>
<input type="text" class="form-control"  name="accno" required/>
<input type="hidden" name="cardnumber" readonly value="<?php  echo $this->session->userdata('card_no');?>"    />
<input type="hidden" name="icash_user_id" readonly value="<?php  //echo $user->id;?>"   />

 <?php 
 
 //}?>
   </div>
   <div class="form-group col-lg-12">
<div class=" pull-right ">
 <input type="submit" value="Add Beneficary" class="btn btn-primary" />
</div>
</div>
</form>
</div>
</div>
            
            </div>
        </div>
     </div>      		</div>
        </div>

 </div> <!-- container close -->
        
	 
 
