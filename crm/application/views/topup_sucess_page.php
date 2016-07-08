
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
                    					TOPUP CONFIRMATION
                                    </div>
								 </div>  
<form method="post" class="form-style-9"    >

<ul>
 <?php foreach($cards as $user){ ?>
<li>
<label class="align-left " style=" width: 110px; ">Transaction Id</label><input type="text" name="mobile" readonly  value=" <?php  echo $user->topup_transaction_id;?>"  class="field-style field-split "   />
<label class="align-left "style=" width: 110px;">Previou Amount</label><input type="text" name="pin" readonly value="<?php  echo $user->prev_topup_amnt;?> " class="field-style field-split "   />
 
</li>
 <li>
 <label class="align-left " style=" width: 110px; ">Current Amount</label><input type="text" name="mobile" readonly  value=" <?php  echo $user->balance;?>"  class="field-style field-split "   />
<label class="align-left "style=" width: 110px;">Topup Amount</label><input type="text" name="pin" readonly value="<?php  echo $user->topup_amount;?> " class="field-style field-split "   />
 
 </li>
  <li>
 <label class="align-left " style=" width: 110px; ">Expiry Date</label><input type="text" name="mobile" readonly  value=" <?php  echo $user->expiry_date;?>"  class="field-style field-split "   />
 
 
 </li>
 <?php }?>
 
 

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