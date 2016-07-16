  
   	<div class="panel dashboard">
        	<div class="panel-body">
                <div class="row">
                    <div class=" col-lg-offset-4 col-lg-4 col-md-4">
                
                        <div class="mobile-1">
                        <p>IMPS(IFSC) TRANSACTION</p>
                        </div> 
                        <ul class="list-group">


            <li class="list-group-item">
                <div class="row toggle" id="dropdown-detail-<?php echo $acc_no;?>" data-toggle="detail-<?php echo $acc_no;?>">
                    <div class="col-xs-10">
                      <b> Beneficiary name</b>: <?php echo $bene_name;?>
                       
                    </div>
                    <div class="col-xs-2"><i class="fa fa-chevron-down pull-right"></i></div>
                </div>
                <div id="detail-<?php echo $acc_no;?>">
                    <hr></hr>
                 
<ul class="list-unstyled">
<li><strong>Card No</strong>: <?php echo $this->session->userdata('card_no');?></li>
<li><strong>Mobile No</strong>: <?php echo $bene_mobile;?></li>
<li><strong>IFSC Code</strong>: <?php echo $ifsc_code;?></li>
<li><strong>Account No</strong>: <?php echo $acc_no;?></li>
<li><strong>Bank Name</strong>: <?php echo $bank_name;?></li>
<li><strong>Branch Name</strong>: <?php echo $branch_name;?></li>
<li><strong>State Name</strong>: <?php echo $bene_state;?></li>
<li><strong>City Name</strong>: <?php echo $bene_city;?></li>
<li><strong>Transaction Type</strong>: <?php echo $trans_type;?></li>
<li><strong>bene_mobile</strong>: <?php echo $bene_mobile;?></li>
<li><strong>bene_bene_id</strong>: <?php echo $bene_id;?></li>

</ul>

                    
                </div>
            </li>

         </ul>
       
                                	<form method="post" id="transAction" action="<?php echo site_url('beneficiary/transaction_process') ?>"  >								<div class="hidden">
                                <div class="form-group col-lg-6">
                                <label >Beneficiary name</label>
                                <input type="text" name="bene_name"    readonly   value="<?php echo $bene_name;?>"  class="form-control"   />
                                
                                <input type="hidden" name="card_no"   value="<?php echo $this->session->userdata('card_no');?>"  class="form-control"   />
                                 <input type="hidden" name="sec_k"   value="<?php echo $this->session->userdata('security_key');?>"  class="form-control"   />
                                 </div>
                                <div class="form-group col-lg-6">
                                <label >Mobile No</label><input type="text" name="mobile_no"  readonly value="<?php echo $bene_mobile;?>"  class="form-control"   />
                                </div>
                                <div class="form-group col-lg-6">
                                <label >IFSC Code</label><input type="text" name="ifsc_code"   readonly value="<?php echo $ifsc_code;?>"  class="form-control"  />
                                </div>
                                <div class="form-group col-lg-6 hidden">
                                <label>Account No</label>
                                <input type="text" name="acc_no"  readonly value="<?php echo $acc_no;?>"    class="form-control"  />
                                </div>
                                <div class="form-group col-lg-6">
                                <label >Bank Name/Branch Name</label><input type="text" name="bank_branch"   readonly value="<?php echo $bank_name;?>/<?php echo $branch_name;?>" class="form-control"   />
                                </div>
                                <div class="form-group col-lg-6">
                                <label>State Name/City Name</label><input type="text" name="state_city"  readonly  value="<?php echo $bene_state;?>/<?php echo $bene_city;?>"  class="form-control"   />
                                <input type="hidden" name="trans_type"   value="<?php echo $trans_type;?>"  class="form-control"   />
                                <input type="hidden" name="bene_mobile"   value="<?php echo $bene_mobile;?>"  class="form-control"   />
                                <input type="hidden" name="bene_bene_id"   value="<?php echo $bene_id;?>"  class="form-control"   />
                                
                                <?php /*?><input type="hidden" name="icash_user_id"   value="<?php echo $icash_user_id;?>"  class="form-control"   /><?php */?>
                                
                                
                                
                                <input type="hidden" name="service"   value=""  class="form-control" />
                                </div>
                                
                                </div>
                                
                                
                                
                                <div class="form-group col-lg-12">
                                <label class="align-left " style=" width: 110px; ">Amount</label><input type="text" name="amount"  class="form-control"   /><span> Minimum amount of send money is Rs.100/-</span>
                                </div>
                                <div class="form-group col-lg-12">
                                <label class="align-left " style=" width: 110px; ">Remarks</label><input type="text" name="remarks"  class="form-control"   />
                                </div>
                                <div class="form-group col-lg-12">
                                <div class="pull-right">
                                <input type="submit" value="Submit" class="btn btn-warning"  />
                                </div>
                                </div>
                                
                                
                                </form>
                               <!-- <form method="post" action="<?php echo site_url('beneficiary/transaction_process') ?>"  >
            
            
            <div class="form-group col-lg-6">
            <label>Beneficiary name</label><input type="text" name="bene_name"    readonly   value="<?php echo $bene_name;?>" class="form-control"/>
            
             <input type="hidden" name="card_no"   value="<?php echo $this->session->userdata('card_no');?>" class="form-control"/>
             <input type="hidden" name="sec_k"   value="<?php echo $this->session->userdata('security_key');?>" class="form-control"/>
             </div>
             <div class="form-group col-lg-6">
            <label>Mobile No</label><input type="text" name="mobile_no"  readonly value="<?php echo $bene_mobile;?>" class="form-control"/>
            </div>
            
            
            
            <div class="form-group col-lg-6">
            <label>IFSC Code</label><input type="text" name="ifsc_code"   readonly value="<?php echo $ifsc_code;?>" class="form-control"/>
            </div>
            <div class="form-group col-lg-6">
            <label>Account No</label><input type="text" name="acc_no"  readonly value="<?php echo $acc_no;?>" class="form-control"/>
            </div>
            <div class="form-group col-lg-6">
            <label>Bank Name/Branch Name</label><input type="text" name="bank_branch"   readonly value="<?php echo $bank_name;?>/<?php echo $branch_name;?>" class="form-control"/>
            </div>
            <div class="form-group col-lg-6">
            <label>State Name/City Name</label><input type="text" name="state_city"  readonly  value="<?php echo $bene_state;?>/<?php echo $bene_city;?>" class="form-control"/>
            <input type="hidden" name="trans_type"   value="<?php echo $trans_type;?>" class="form-control"/>
            <input type="hidden" name="bene_mobile"   value="<?php echo $bene_mobile;?>" class="form-control"/>
            <input type="hidden" name="bene_bene_id"   value="<?php echo $bene_id;?>" class="form-control"/>
            <?php /*?><input type="hidden" name="bene_mm_id"   value="<?php echo $account->icash_mmid;?>" class="field-style field-split "   /><?php */?>
            
            
            
            <input type="hidden" name="service"   value="" class="form-control"/>
            </div>
            
             <div class="form-group col-lg-6">
            <label class="align-left " style=" width: 110px; ">Amount</label><input type="text" name="amount" class="form-control"/>
              </div>
             <div class="form-group col-lg-6">
            <label class="align-left " style=" width: 110px; ">Remarks</label><input type="text" name="remarks" class="form-control"/>
             </div>
             <div class="form-group col-lg-12">
             	<div class="pull-right">
            		<input type="submit" value="Submit" class="btn btn-primary"  />
                </div>
            </div>
            
            
            
            </form>-->
                        
                    </div>
                    
                </div>
            
            </div>
        </div>
     </div>      		</div>
        </div>

 </div> <!-- container close -->
  
  <script src="<?php echo base_url()?>/assets/js/jquery.validate.min.js"></script>
   <script src="<?php echo base_url()?>/assets/js/jquery.validate-rules.js"></script>
