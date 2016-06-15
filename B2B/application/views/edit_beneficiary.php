
<style type="text/css">
    .box{
        display: none;
 
    }
 
</style>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            if($(this).attr("value")=="1"){
                $(".box").not(".1").hide();
                $(".1").show();
            }
            else if($(this).attr("value")=="2"){
                $(".box").not(".2").hide();
                $(".2").show();
            }
            
            else{
                $(".box").hide();
            }
        });
    }).change();
});
</script>
	<div class="dashboard-container">
		<div class="container">
			<div class="dashboard-wrapper">

				<!-- Left Sidebar Start -->
				<div class="left-sidebar">

                    <!-- Row Start -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="widget">
                                <div class="widget-header">
                               		<div class="title">
                    					EDIT BENEFICIARY
                                    </div>
								 </div>  
<form method="post" class="form-style-9" action="<?php echo site_url('beneficiary/addss_beneficiary') ?>"  >

<ul>

<li>
 <label class="align-left "style=" width: 110px;">Flag</label>
<select  class="field-style field-split " name="flag"  >
<option  >Select Flag</option>
<option value="1">IFSC</option>
<option value="2">MMID</option>
</select>
</li>

<div class="1 box">
<li>
 <?php  foreach($cards_details as $user){ ?>
<label class="align-left " style=" width: 110px; ">Card No</label><input type="text" name="card" readonly value="<?php  echo $user['card_no'];?>"   class="field-style field-split "   />
<label class="align-left " style=" width: 110px; ">MMID</label><input type="text" name="mmid_no"  value="<?php  echo $user['mmid'];?>"  class="field-style field-split "   />
<label class="align-left " style=" width: 110px; ">Mobile_no</label><input type="text" name="branch_name"  value="<?php  echo $user['mmid_no'];?>"    class="field-style field-split "   />
</li>
 <li>
 <label class="align-left "style=" width: 110px;">Bank Name</label><input type="text" name="b_bank" value="<?php  echo $user['bene_id'];?>"  class="field-style field-split "   />
<label class="align-left " style=" width: 110px; ">Branch Name</label><input type="text" name="b_branch"  value="<?php  echo $user['bene_id'];?>" class="field-style field-split "   />
<label class="align-left "style=" width: 110px;">City</label><input type="text" name="b_city"   value="<?php  echo $user['city'];?>"class="field-style field-split "   />
</li>
<li>

<label class="align-left " style=" width: 110px; ">State</label><input type="text" name="b_state" value="<?php  echo $user['state'];?>"  class="field-style field-split "   />

<label class="align-left " style=" width: 110px; ">IFSC Code</label><input type="text" name="ifsc"    value="<?php  echo $user['ifsc'];?>" class="field-style field-split "   />
<label class="align-left "style=" width: 110px;">Account No</label><input type="text" name="accno" value="<?php  echo $user['acc_no'];?>" class="field-style field-split "   />

<input type="hidden" name="cardnumber" readonly value="<?php   echo $user->card_no;?>" class="field-style field-split "   />
<input type="hidden" name="seckey" readonly value="<?php   echo $user->id;?>"   />
 
</li>
<li>

<label class="align-left "style=" width: 110px;">Bene Id</label><input type="text" readonly value="<?php  echo $user['bene_id'];?>" name="bene_id"  class="field-style field-split "   />
 </li>
  <?php }?>
 </div>
 
 
 
 
 
 
 
 
 
 
 
 
 
 <div class="2 box">
 <li>
  <?php  foreach($cards_details as $user){ ?>
<label class="align-left " style=" width: 110px; ">Card No</label><input type="text" name="card" readonly value="<?php  echo $user['card_no'];?>"   class="field-style field-split "   />
<label class="align-left " style=" width: 110px; ">MMID</label><input type="text" name="mmid_no"  value="<?php  echo $user['mmid'];?>"  class="field-style field-split "   />
<label class="align-left " style=" width: 110px; ">Mobile_no</label><input type="text" name="branch_name"  value="<?php echo $user['mmid_no'];?>"    class="field-style field-split "   />
</li>
 <li>
 
 <label class="align-left "style=" width: 110px;">Bank Name</label><input type="text" name="b_bank" value="<?php  echo $user['bene_id'];?>"  class="field-style field-split "   />
<label class="align-left " style=" width: 110px; ">Branch Name</label><input type="text" name="b_branch"  value="<?php  echo $user['bene_id'];?>" class="field-style field-split "   />
<label class="align-left "style=" width: 110px;">City</label><input type="text" name="b_city"   value="<?php   echo $user['city'];?>"class="field-style field-split "   />


</li>
<li>

<label class="align-left " style=" width: 110px; ">State</label><input type="text" name="b_state" value="<?php  echo $user['state'];?>"  class="field-style field-split "   />

<label class="align-left " style=" width: 110px; ">IFSC Code</label><input type="text" name="ifsc"    value="<?php  echo $user['ifsc'];?>" class="field-style field-split "   />
<label class="align-left "style=" width: 110px;">Account No</label><input type="text" name="accno" value="<?php  echo $user['acc_no'];?>" class="field-style field-split "   />


<input type="hidden" name="cardnumber" readonly value="<?php   echo $user->card_no;?>" class="field-style field-split "   />
<input type="hidden" name="seckey" readonly value="<?php   echo $user->id;?>"   />
 
</li>
<li>

<label class="align-left "style=" width: 110px;">Bene Id</label><input type="text" readonly value="<?php  echo $user['bene_id'];?>" name="bene_id"  class="field-style field-split "   />
 <?php  }?>
 </li>
 
 
 </div>
 
 
 
 
 
 
 
<li>
<input type="submit" value="Submit"  />
</li>

</ul>

 
</div>

</form>
	</div>
						</div>
					</div>
					<!-- Row End -->
				</div>
				<!-- Left Sidebar End -->
			</div>
				<!-- Dashboard Wrapper End -->
		</div>
	</div>
<style type="text/css">
 
.form-style-9{
    max-width: 1140px;
    background: #FAFAFA;
    padding: 30px;
    margin: 50px 10px auto;
    
     
}
.form-style-9 ul{
    padding:0;
    margin:0;
    list-style:none;
}
.form-style-9 ul li{
    display: block;
    margin-bottom: 10px;
    min-height: 35px;
}
.form-style-9 ul li input[type="file"],
.form-style-9 ul li  .field-style{
    box-sizing: border-box; 
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box; 
    padding: 8px;
    outline: none;
    border: 1px solid #B0CFE0;
    -webkit-transition: all 0.30s ease-in-out;
    -moz-transition: all 0.30s ease-in-out;
    -ms-transition: all 0.30s ease-in-out;
    -o-transition: all 0.30s ease-in-out;

}.form-style-9 ul li  .field-style:focus{
    box-shadow: 0 0 5px #B0CFE0;
    border:1px solid #B0CFE0;
}
.form-style-9 ul li .field-split{
    width: 21%;
}
.form-style-9 ul li .field-full{
    width: 100%;
}
.form-style-9 ul li input.align-left{
    float:left;
}
.form-style-9 ul li input.align-right{
    float:right;
}
.form-style-9 ul li textarea{
    width: 100%;
    height: 100px;
}
.form-style-9 ul li input[type="button"], 
.form-style-9 ul li input[type="submit"] {
    -moz-box-shadow: inset 0px 1px 0px 0px #3985B1;
    -webkit-box-shadow: inset 0px 1px 0px 0px #3985B1;
    box-shadow: inset 0px 1px 0px 0px #3985B1;
    background-color: #216288;
    border: 4px solid #17445E;
    display: inline-block;
    cursor: pointer;
    color: #FFFFFF;
    padding: 8px 18px;
    text-decoration: none;margin-left: 385px;
    margin-top: 24px;
    font: 12px Arial, Helvetica, sans-serif;
}
.form-style-9 ul li input[type="button"]:hover, 
.form-style-9 ul li input[type="submit"]:hover {
    background: linear-gradient(to bottom, #2D77A2 5%, #337DA8 100%);
    background-color: #28739E;
}
</style>