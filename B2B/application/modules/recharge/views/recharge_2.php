<link rel="shortcut icon" href="<?php echo base_url()?>/assets/paybuks/images/favicon_square.png"> 
   <!-- MY STYLESHEET -->
<link rel="stylesheet" href="<?php echo base_url()?>/assets/paybuks/css/style.css" type="text/css" />
<!-- BOOSTRAB STYLESHEET -->
<link rel="stylesheet" href="<?php echo base_url()?>/assets/paybuks/css/bootstrap.css" type="text/css" />

<link rel="stylesheet" href="<?php echo base_url()?>/assets/css/bootstrap.min.css" type="text/css" />
<!-- MENU CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/assets/paybuks/css/jPushMenu.css" />
<!-- DEFAULT SCRIPT -->
<script type="text/jscript" src="<?php echo base_url()?>/assets/paybuks/js/jquery-1.11.3.js"></script>
<!-- BOOSTRAB SCRIPT -->
<script type="text/javascript" src="<?php echo base_url()?>/assets/paybuks/js/bootstrap.min.js"></script>

<!-- EASY RESPONSIVE CSS -->
<link rel="stylesheet" href="<?php echo base_url()?>/assets/paybuks/css/easy-responsive-tabs.css" type="text/css" />


<style>
      button, input, select, textarea {
  /* I want my default button style back */
  font-size: 90%;
}

* {
  box-sizing: border-box;
}

.loading-anim {
  position: relative;
  width: 200px;
  height: 200px;
  margin: auto;
  perspective: 800px;
  transform-style: preserve-3d;
  transform: translateZ(-100px) rotateY(-90deg) rotateX(90deg) rotateZ(90deg) scale(0.5);
  opacity: 0;
  transition: all .2s ease-out;
}
.loading-anim .circle {
  width: 100%;
  height: 100%;
  animation: spin 5s linear infinite;
}
.loading-anim .border {
  position: absolute;
  border-radius: 50%;
  border: 3px solid #e34981;
}
.loading-anim .out {
  top: 15%;
  left: 15%;
  width: 70%;
  height: 70%;
   border-bottom-color:#DD017F;
  border-top-color:#009CE1;
  border-left-color: transparent;
  border-right-color: transparent;
  animation: spin 2s linear reverse infinite;
}
.loading-anim .in {
  top: 18%;
  left: 18%;
  width: 64%;
  height: 64%;
  border-left-color:#009CE1;
  border-right-color:#DD017F;
  border-top-color: transparent;
  border-bottom-color: transparent;
  animation: spin 2s linear infinite;
}
.loading-anim .mid {
  top: 40%;
  left: 40%;
  width: 20%;
  height: 20%;
  border: transparent;

  /*animation: spin 1s linear infinite;*/
  background-image:url(http://paybuks.com/images/paybuck_logo.png);
  background-position: center center;
  background-repeat:no-repeat;
}

.loading-anim {
  transform: translateZ(0) rotateY(0deg) rotateX(0deg) rotateZ(0deg) scale(1);
  opacity: 1;
}

.loading-overlay {
 background-color: rgba(0,0,0,0.0.5);
}

.dot {
  position: absolute;
  display: block;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  background-color: #e34981;
  animation: jitter 5s ease-in-out infinite, fade-in-out 5s linear infinite;
}

.dot:nth-child(1) {
  top: 90px;
  left: 180px;
  animation-delay: 0s;
}

.dot:nth-child(2) {
  top: 135px;
  left: 168px;
  animation-delay: 0.41667s;
}

.dot:nth-child(3) {
  top: 168px;
  left: 135px;
  animation-delay: 0.83333s;
}

.dot:nth-child(4) {
  top: 180px;
  left: 90px;
  animation-delay: 1.25s;
}

.dot:nth-child(5) {
  top: 168px;
  left: 45px;
  animation-delay: 1.66667s;
}

.dot:nth-child(6) {
  top: 135px;
  left: 12px;
  animation-delay: 2.08333s;
}

.dot:nth-child(7) {
  top: 90px;
  left: 0px;
  animation-delay: 2.5s;
}

.dot:nth-child(8) {
  top: 45px;
  left: 12px;
  animation-delay: 2.91667s;
}

.dot:nth-child(9) {
  top: 12px;
  left: 45px;
  animation-delay: 3.33333s;
}

.dot:nth-child(10) {
  top: 0px;
  left: 90px;
  animation-delay: 3.75s;
}

.dot:nth-child(11) {
  top: 12px;
  left: 135px;
  animation-delay: 4.16667s;
}

.dot:nth-child(12) {
  top: 45px;
  left: 168px;
  animation-delay: 4.58333s;
}

@keyframes spin {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}
@keyframes jitter {
  0% {
    transform: scale(1, 1);
  }
  25% {
    transform: scale(0.7, 0.7);
  }
  50% {
    transform: scale(1, 1);
  }
  75% {
    transform: scale(1.3, 1.3);
  }
  100% {
    transform: scale(1, 1);
  }
}
@keyframes fade-in-out {
  0% {
    opacity: 0.8;
  }
  25% {
    opacity: 0.2;
  }
  75% {
    opacity: 1;
  }
  100% {
    opacity: 0.8;
  }
}

</style> 
 
 
<div class="modal fade bs-example-modal-lg-pop" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                        <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
                      <div class="modal-body"> 
                       <!--loading start-->
                      
                       <div class="loading-anim">
    <div class="border out"></div>
    <div class="border in"></div>
    <div class="border mid"></div>
   <span id="otherFail" style="color:red;"></span>
  </div>
  
  
                       <!-- loading dialog end -->
                       
                       <!--success dialog start-->
                        <div class="panel success hidden">

<div class="panel-body">

<div class="row">

<div class="col-lg-4">
    <img src="<?php echo base_url()?>assets/paybuks/images/success-stamp.png" style="width:100%;">
</div>

<div class="col-lg-8">
    <div class="page-header">
        <div class="pull-left text-left">
            <strong><b><span id="mobileSucc"> </span></b></strong>
            <div class="text-uppercase"><span id="serviceProviderSucc"> </span> <span id="serviceTyepeSucc"> </span></div>
        </div>
        <div class="pull-right text-right">
            <strong><b><i class="fa fa-inr"></i> <span id="moneySucc" class="money"></span>/-</b></strong>
            <div class="text-uppercase" id="trans_id" class="trans_id"></div>
        </div>
        <div class="clearfix"></div>
    
    
    </div>
    
    
    <div class="page-content">
        <div class="pull-left text-left">
            NO COUPON SELECTED
           
        </div>
        <div class="pull-right text-right">
            
        </div>
        <div class="clearfix"></div>
    
    
    </div>
    <hr>
    <div class="page-content">
        <div class="pull-left text-left">
            <strong><b>Total</b></strong>
           
        </div>
        <div class="pull-right text-right">
            <strong><b><i class="fa fa-inr"></i><span id="totalSucc" class="totalMoney"></span>/-</b></strong>
        </div>
        <div class="clearfix"></div>
    
    
    </div>
    
    
    
</div>

</div>
<div class="form-group text-center">
                                     <input class="btn btn-primary" id="close" data-dismiss="modal" type="button" value="Ok"/>
                                     </div>
</div>
 
<div class="panel-footer"></div>


</div>
                       <!-- success dialog end -->
                       
                       
                      <!-- failure dialog start  -->
                        <div class="panel failure hidden">
                                
                                	<div class="panel-body">
                                    
                                    		<div class="row">
                                            
                                            	<div class="col-lg-4">
                                                	<img src="<?php echo base_url()?>assets/paybuks/images/failure-stamp.png" style="width:100%;">
                                                </div>
                                                
                                                <div class="col-lg-8">
                                                	<div class="page-header">
                                                        <div class="pull-left text-left">
                                                        	<strong><b><span id="mobileFail"></span></b></strong>
                                                            <div class="text-uppercase"><span id="serviceProviderFail" class="serviceprovider"> </span> <span id="serviceTyepeFail"> </span></div>
                                                        </div>
                                                        <div class="pull-right text-right">
                                                        	<strong><b><i class="fa fa-inr"></i> <span id="moneyFail" class="money"> </span>/-</b></strong>
                                                            <div class="text-uppercase" id="trans_id_fail" class="trans_id" ></div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    
                                                    
                                                    </div>
                                                    
                                                    
                                                    <div class="page-content">
                                                        <div class="pull-left text-left">
                                                        	NO COUPON SELECTED
                                                           
                                                        </div>
                                                        <div class="pull-right text-right">
                                                        	
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    
                                                    
                                                    </div>
                                                    <hr>
                                                    <div class="page-content">
                                                        <div class="pull-left text-left">
                                                        	<strong><b>Total</b></strong>
                                                           
                                                        </div>
                                                        <div class="pull-right text-right">
                                                        	<strong><b><i class="fa fa-inr"></i> <span id="totalFail" class="totalMoney"> </span>/-</b></strong>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    
                                                    
                                                    </div>
                                                    
                                                    
                                                    
                                                </div>
                                                
                                            </div>
                                    <div class="form-group text-center">
                                     <input class="btn btn-primary" id="close" data-dismiss="modal" type="button" value="Ok"/>
                                     </div>
                                    </div>
                                    
                                    <div class="panel-footer"></div>
                                    
                                    
                                </div>
                      <!-- failure dialog end  -->       
                                
                        <!--pending dialog start-->
                                
                                <div class="panel pending hidden">
                                
                                	<div class="panel-body">
                                    
                                    		<div class="row">
                                            
                                            	<div class="col-lg-4">
                                                	<img src="<?php echo base_url()?>assets/paybuks/images/pending-stamp.png" style="width:100%;">
                                                </div>
                                                
                                                <div class="col-lg-8">
                                                	<div class="page-header">
                                                        <div class="pull-left text-left">
                                                        	<strong><b><span id="mobileFail"></span></b></strong>
                                                            <div class="text-uppercase"><span id="serviceProviderFail" class="serviceprovider"> </span> <span id="serviceTyepeFail"> </span></div>
                                                        </div>
                                                        <div class="pull-right text-right">
                                                        	<strong><b><i class="fa fa-inr"></i> <span id="moneyFail" class="money"> </span>/-</b></strong>
                                                            <div class="text-uppercase trans_id" id="trans_id_fail"></div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    
                                                    
                                                    </div>
                                                    
                                                    
                                                    <div class="page-content">
                                                        <div class="pull-left text-left">
                                                        	NO COUPON SELECTED
                                                           
                                                        </div>
                                                        <div class="pull-right text-right">
                                                        	
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    
                                                    
                                                    </div>
                                                    <hr>
                                                    <div class="page-content">
                                                        <div class="pull-left text-left">
                                                        	<strong><b>Total</b></strong>
                                                           
                                                        </div>
                                                        <div class="pull-right text-right">
                                                        	<strong><b><i class="fa fa-inr"></i> <span id="totalFail" class="totalMoney"> </span>/-</b></strong>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    
                                                    
                                                    </div>
                                                    
                                                    
                                                   <div class="form-group">
                                    <div class="pull-right">
                                     <input class="btn btn-primary" id="close" data-dismiss="modal" type="button" value="Ok"/>
                                     </div>
                                     </div> 
                                                </div>
                                                
                                            </div>
                                    
                                    </div>
                                    
                                    <div class="panel-footer"></div>
                                    </div>
                       
                               <!-- pending dialog end-->          
                                
                       </div> 
                        	 
                        </div>
                    </div>
                </div> 
 
 
 <div class="container-fluid">
       
    	<div class="admin-recharge">
        	<div id="parentHorizontalTab">
            	
                <ul class="resp-tabs-list hor_1">
                    <li class="gradient_btn2">Mobile</li>
                    <li class="gradient_btn2">DTH</li>
                    <li class="gradient_btn2">Bills</li>
                </ul>
                <div class="resp-tabs-container hor_1" style="clear:none;">
                    <div>
                        <div class="ChildVerticalTab_1">
                            <ul class="resp-tabs-list ver_1">
                                <li class="recharge_pre" selected="selected">prepaid</li>
                                <li class="recharge_post">postpaid</li>
                            </ul>
                            <div class="resp-tabs-container ver_1">
                                <div>
                                <span id="preError" style="color:red;"> </span>
                                <span id="preSucc" style="color:green;"> </span>
                                    <p>Quick Recharge</p>
                                    <form action="javascript:void(0);" method="post" id="prepaidForm">
                                    <input type="text" placeholder="+91" maxlength="10" pattern="[0-9]{10}" name="mobilenumber" id="pre-mobilenumber" required /> 
                                    <input type="text" placeholder="Rs" name="amount" id="pre-amount" required  />
                                    <select name="serviceprovider" id="pre-service_type" >
                                    	
                                       <!--
 <option value="">Aircel</option>
-->
                                        <option value="4">BSNL</option>
                                         <option value="3">BSNL-Validity</option>
                                        
<option value="15">DOCOMO</option>
                                        <option value="16">DOCOMO-Special</option>
                                        <option value="34">IDEA</option>
                                        <option value="45">MTNL DEL</option>
                                        <option value="40">MTNL DEL-Special</option>
                                        <option value="11">MTNL MUM</option>
                                        <option value="44">MTNL MUM-Special</option>
                                        <option value="14">MTS</option>
                                        <option value="18">Reliance GSM</option>
                                        <option value="19">Reliance CDMA</option>
                                        
                                        <option value="42">T24-TOP UP</option>
                                        <option value="43">T24-SPECIAL</option>
                                        
                                        <option value="17">TATA INDICOM</option>
                                        <option value="6">UNINORQuick Recharge-TOP UP</option>
                                        <option value="5">UNINOR-SPECIAL</option>
                                        <option value="21">VIDEOCON-TOP UP</option>
                                        <option value="22">VIDEOCON-SPECIAL</option>
                                        <option value="12">VODAFONE-TOP UP</option>

                                         
                                    </select>
                                    <input type="hidden" id="service_type_pre" name="service_type" value="prepaid"/>
                                    <input type="submit" class="gradient_btn" value="Submit" />
                                    </form>
                                </div>
                                <div>
                                 <span id="postError" style="color:red;"> </span>
                                 <span id="postSucc" style="color:green;"> </span>
                                    <p>Quick Recharge</p>
                                    <form action="javascript:void(0);" method="post" id="postpaidForm">
                                    <input type="text" placeholder="+91" name="post-mobilenumber" id="post-mobilenumber" />
                                    <input type="text" placeholder="Rs" name="post-amount" id="post-amount"  />
                                    <select name="serviceprovider" id="post-service_type" >
                                    	<option value="32">Airtel</option>
                                        <option value="54">Aircel</option>
                                        <option value="31">BSNL</option>
                                         <option value="52">DOCOMO</option>
                                          <option value="33">IDEA</option>
                                           <option value="50">LOOP MOBILE</option>
                                          <option value="57">MTS</option>
                                        <option value="59">Reliance GSM</option>
                                        <option value="47">Reliance CDMA</option>
                                           <option value="53">TATA INDICOM</option>
                                           <option value="35">VODAFONE</option>
                                           
                                    </select>
                                     <input type="hidden" name="post-service_type" value="postpaid"/>
                                    <input type="submit" class="gradient_btn" value="Pay Bill" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <div class="ChildVerticalTab_1">
                            <ul class="resp-tabs-list ver_1" id="dthUl">
                                <li class="dth-1">airtel</li>
                                <li class="dth-2">tatasky</li>
                                <li class="dth-3">bigtv</li>
                                <li class="dth-4">dishtv</li>
                                <li class="dth-5">videcon</li>
                                <li class="dth-6">sundirect</li>
                            </ul>
                            <div class="resp-tabs-container ver_1">
                                <span id="dthError" style="color:red;"> </span>
                                <span id="dthSucc" style="color:green;"> </span>
                                <div>
                                <form id="airtel" action="javascript:void(0);" class="dthRecharge" method="post">
                                    <label>Customer ID</label>
                                    <input type="text" placeholder="Enter your ID" id="airtelNumber" name="mobilenumber" />
                                    <input type="hidden" name="serviceprovider" value="10"/>
                                    <label>Amount</label>
                                    <input type="text" placeholder="Enter your amount" id="airtelAmount" name="amount" />
                                    <input type="submit" class="gradient_btn" value="Pay Bill" />
                                    </form>
                                </div>
                                <div>
                                <form id="tatasky" action="javascript:void(0);" class="dthRecharge" method="post">
                                    <label>Subscriber ID</label>
                                    <input type="text" placeholder="Enter your ID" id="tataskyNumber" name="mobilenumber1" />
                                    <input type="hidden" name="serviceprovider" value="9"/>
                                    <label>Amount</label>
                                    <input type="text" placeholder="Enter your amount" id="tataskyAmount" name="amount" />
                                    <input type="submit" class="gradient_btn" value="Pay Bill" />
                                     </form>
                                </div>
                                <div>
                                <form id="bigtv" action="javascript:void(0);" class="dthRecharge" method="post">
                                    <label>Smart Card</label>
                                    <input type="text" placeholder="Enter your ID" id="bigtvNumber" name="mobilenumber2" />
                                    <input type="hidden" name="serviceprovider" value="20"/>
                                    <label>Amount</label>
                                    <input type="text" placeholder="Enter your amount" id="bigtvAmount" name="amount" />
                                    <input type="submit" class="gradient_btn" value="Pay Bill" />
                                     </form>
                                </div>
                                <div>
                                <form id="dishtv" action="javascript:void(0);" class="dthRecharge" method="post">
                                    <label>View Card</label>
                                    <input type="text" placeholder="Enter your ID" id="dishtvNumber" name="mobilenumber3" />
                                    <input type="hidden" name="serviceprovider" value="7"/>
                                    <label>Amount</label>
                                    <input type="text" placeholder="Enter your amount" id="dishtvAmount" name="amount" />
                                    <input type="submit" class="gradient_btn" value="Pay Bill" />
                                     </form>
                                </div>
                                <div>
                                <form id="videcon" action="javascript:void(0);" class="dthRecharge" method="post">
                                    <label>Customer ID</label>
                                    <input type="text" placeholder="Enter your ID" id="videconNumber" name="mobilenumber4" />
                                    <input type="hidden" name="serviceprovider" value="13"/>
                                    <label>Amount</label>
                                    <input type="text" placeholder="Enter your amount" id="videconAmount" name="amount" />
                                    <input type="submit" class="gradient_btn" value="Pay Bill" />
                                     </form>
                                </div>
                                <div>
                                <form id="sundirect" action="javascript:void(0);" class="dthRecharge" method="post">
                                    <label>Smart Card</label>
                                    <input type="text" placeholder="Enter your ID" id="sundirectNumber" name="mobilenumber5" />
                                    <input type="hidden" name="serviceprovider" value="4"/>
                                    <label>Amount</label>
                                    <input type="text" placeholder="Enter your amount" id="sundirectAmount" name="amount" />
                                    <input type="submit" class="gradient_btn" value="Pay Bill" />
                                     </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                         <div class="ChildVerticalTab_1">
                            <ul class="resp-tabs-list ver_1" id="billUl">
                                <li class="bill-1">landline</li>
                                <li class="bill-2">electricity</li>
                                <li class="bill-3">insurance</li>
                                <li class="bill-4">gas</li>
                                <li class="bill-5">datacard</li>
                            </ul>
                            <div class="resp-tabs-container ver_1">
                              <span id="billtError" style="color:red;"> </span>
                                 <span id="billSucc" style="color:green;"> </span>
                                <div>
                                <form id="billForm" action="javascript:void(0);" method="post" >
                                    
                                	<label>Provider</label>
                                    <select name="serviceprovider" id="bill_serviceprovider" >
                                    	<option value="48">Airtel Landline</option>
                                        <option value="56">BSNL Landline</option>
                                        <option value="51">MTNL Delhi</option>
                                        <option value="49">Reliance Communication</option>
                                        <option value="53">Tata Tele Service(CDMA)</option>
                                    </select><label>STD Code</label><input type="text" placeholder="Std Code" name="std_code" id="std_code" />
                                    <label>Telephone No</label>
                                    <input type="text" placeholder="Enter Number" id="telephone" name="telephone" />
                                    <label>Amount</label>
                                    <input type="text" placeholder="Enter your amount" id="landlineAmount" name="amount" />
                                    <input type="submit" class="gradient_btn" value="Pay Now" />
                                    <input type="hidden" name="bill_service_type" value="landline" />
                                    </form>
                                </div>
                                
                                <div>
                                    <label>Provider</label>
                                    <select>
                                    	<option value="BSES Rejdhani">BSES Rejdhani</option>
                                        <option value="MTNL Delhi">BSES Yamuna</option>
                                        <option value="Dakshin Gujarat Vij Company">Dakshin Gujarat Vij Company</option>
                                        <option value="Madhya Gujarat vij Company">Madhya Gujarat vij Company</option>
                                    </select>
                                    <label>Card No</label>
                                    <input type="text" placeholder="Enter Card Number" />
                                    <label>Amount</label>
                                    <input type="text" placeholder="Enter your amount" />
                                    <input type="submit" class="gradient_btn" value="Pay Now" />
                                </div>
                                
                                <div>
                                    <label>Provider</label>
                                    <select>
                                    	<option value="Birla Sun Life Insurnce">Birla Sun Life Insurnce</option>
                                        <option value="ICICI Prudential Life Insurance">ICICI Prudential Life Insurance</option>
                                        <option value="India First life Insurance">India First life Insurance</option>
                                        <option value="Tata All Life Insurance">Tata All Life Insurance</option>
                                    </select>
                                    <label>Policy No</label>
                                    <input type="text" placeholder="Enter Policy Number" />
                                    <label>Client ID</label>
                                    <input type="text" placeholder="Enter Client ID" />
                                    <label>Bill Due Date</label>
                                    <input type="text" placeholder="Enter Due Date" />
                                    <label>Amount</label>
                                    <input type="text" placeholder="Enter your amount" />
                                    <input type="submit" class="gradient_btn" value="Pay Now" />
                                </div>
                                
                                <div>
                                    <label>Provider</label>
                                    <select>
                                    	<option value="Mahanagar Gas Ltd">Mahanagar Gas Ltd</option>
                                    </select>
                                    <label>Account No</label>
                                    <input type="text" placeholder="Enter Account Number" />
                                    <label>Amount</label>
                                    <input type="text" placeholder="Enter your amount" />
                                    <input type="submit" class="gradient_btn" value="Pay Now" />
                                </div>
                                
                                <div>
                                	<div class="ChildVerticalTab_2">
                                        <ul class="resp-tabs-list ver_2">
                                            <li class="recharge_pre">prepaid</li>
                                            <li class="recharge_post">postpaid</li>
                                        </ul>
                                        <div class="resp-tabs-container ver_2">
                                            <div>
                                                <p>Quick Recharge</p>
                                                <input type="text" placeholder="+91" />
                                                <input type="text" placeholder="Rs" />
                                                <select>
                                                    <option value="airtel">Airtel</option>
                                                    <option value="Aircel">Aircel</option>
                                                    <option value="Reliance gsm">Reliance GSM</option>
                                                    <option value="Reliance cdma">Reliance CDMA</option>
                                                </select>
                                                <input type="submit" class="gradient_btn" value="Submit" id="prepaid_btn" />
                                            </div>
                                            <div>
                                                <p>Quick Recharge</p>
                                                <input type="text" placeholder="+91" />
                                                <input type="text" placeholder="Rs" />
                                                <select>
                                                    <option value="airtel">Airtel</option>
                                                    <option value="Aircel">Aircel</option>
                                                    <option value="Reliance gsm">Reliance GSM</option>
                                                    <option value="Reliance cdma">Reliance CDMA</option>
                                                </select>
                                                <input type="submit" class="gradient_btn" value="Pay Bill" id="postpaid_btn" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- child tab ends -->
                            </div>
                        </div>
                    </div>
                    
                </div>
           
            </div>
            <!-- parentHorizontalTab ends -->
        </div>
        <!-- admin recharge ends -->
    
       <!-- POPUP STARTS -->
    <div class="modal fade bs-example-modal-lg-4" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                    <div class="modal-dialog modal-lg" style="width:365px;">
                        <div class="modal-content">
                        	<form>
                            	<!--<div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                   
                                </div>-->
                                <div class="modal-body">
                                 <h4 class="text-center">You are logging out of Paybuks.com </h4>
                                </div>
                                <div class="modal-footer">
                              
                                    <a href="<?php echo base_url()?>user/thankyou_content" class="btn btn-default">OK</a> 
  									<a href="<?=current_url()?>" class="btn btn-default" type="submit" />Cancel</a>   
                              
                                </div>
                                <!-- row ends -->
                            </form>
                        </div>
                    </div>
                </div>
	  <!-- POPUP END -->
<!-- RESP MENU STARTS -->
<!--load jPushMenu, required-->

<!-- RESP MENU ENDS -->
</div>
<!-------------new----------->
<script>
$(document).ready(function(){
	$(".toggle-menu").click(function(){
		$(".cd-overlay").addClass("is-visible ");
	});
	
	$(".cd-overlay").click(function(){
		$(".cd-overlay").removeClass("is-visible ");
	});
});
</script>

<!-- ADD class for wallet and promo code -->
<script>
$(document).ready(function(){
	$(".add_money").click(function(){
		$(".add_money_field").addClass("open");
		$(".add_money").addClass("open");
	});
	
	$(".promo_code").click(function(){
		$(".add_promo").addClass("open");
		$(".promo_code").addClass("open");
	});
	
	$(".cancel").click(function(){
		$(".add_money_field").removeClass("open");
		$(".add_money").removeClass("open");
		$(".add_promo").removeClass("open");
		$(".promo_code").removeClass("open");
	});
});
</script>

<!-- EASY RESPONSIVE STARTS -->
<script src="<?php echo base_url()?>/assets/paybuks/js/easy-responsive-tabs.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$('#parentHorizontalTab').easyResponsiveTabs({
			type: 'default', //Types: default, vertical, accordion
			width: 'auto', //auto or any width like 600px
			fit: true, // 100% fit in a container
			closed: 'accordion', // Start closed if in accordion view
			tabidentify: 'hor_1', // The tab groups identifier
			activate: function (event) { // Callback function if tab is switched
				var $tab = $(this);
				var $info = $('#nested-tabInfo');
				var $name = $('span', $info);
	
				$name.text($tab.text());
	
				$info.show();
			}
		});
		$('.ChildVerticalTab_1').easyResponsiveTabs({
			type: 'default',
			width: 'auto',
			fit: true,
			tabidentify: 'ver_1', // The tab groups identifier
			activetab_bg: '#fff', // background color for active tabs in this group
			inactive_bg: '#F5F5F5', // background color for inactive tabs in this group
			active_border_color: '#c1c1c1', // border color for active tabs heads in this group
			active_content_border_color: '#5AB1D0' // border color for active tabs contect in this group so that it matches the tab head border
		});
		$('.ChildVerticalTab_2').easyResponsiveTabs({
			type: 'default',
			width: 'auto',
			fit: true,
			tabidentify: 'ver_2', // The tab groups identifier
			activetab_bg: '#fff', // background color for active tabs in this group
			inactive_bg: '#F5F5F5', // background color for inactive tabs in this group
			active_border_color: '#c1c1c1', // border color for active tabs heads in this group
			active_content_border_color: '#5AB1D0' // border color for active tabs contect in this group so that it matches the tab head border
		});
	});
</script>
<!-- EASY RESPONSIVE ENDS -->	

<!-- RECHARGE POST STARTS -->

<script type="text/javascript">

$(document).on('submit','#prepaidForm',function(){
var mobile = $('#pre-mobilenumber').val();								
	var money = $('#pre-amount').val();								
	
	if ( mobile <= 0 || money <=0 ){
		 return false;
	}
   
    var catId = $(this).val();
// 	$('#preSucc').html("Recharge processing please wait");
	var  form_data =  $('#prepaidForm').serialize();
	
									
	var provider = $('#pre-service_type option:selected').text();	
	var service_type = $('#service_type_pre').val();
	
	//setTimeout(show_succ, 4000);
	 
     
 
		  //showModal();				
	 
	
    $.ajax({
                type: "POST",
                url: "<?php echo  base_url();?>recharge/ad_recharge", 
                data: form_data,
				//datatype:"json",
				success: function( result)  
                { 
		          alert(result);
                  
				$('#trans_id').html(result.trans_id);
				if(result.class == "fail"){
				
				$('.loading-anim').hide();
					
				$('#mobileFail').html(mobile);
				$('#serviceProviderFail').html(provider);
				$('#serviceTyepeFail').html(service_type);
				$('#moneyFail').html(money);
				$('#totalFail').html(money);	
				
				$('.failure').removeClass('hidden');	
				
				
				}else if(result.class == "pending"){
				
				$('.loading-anim').hide();
					
				$('#mobileFail').html(mobile);
				$('#serviceProviderFail').html(provider);
				$('#serviceTyepeFail').html(service_type);
				$('#moneyFail').html(money);
				$('#totalFail').html(money);	
				
				$('.pending').removeClass('hidden');	
				
				
				}else if(result.class == "success"){
					
				$('.loading-anim').hide();
				
				$('#mobileSucc').html(mobile);
				$('#serviceProviderSucc').html(provider);
				$('#serviceTyepeSucc').html(service_type);
				
				$('#moneySucc').html(money);
				$('#totalSucc').html(money);	
					
				$('.success').removeClass('hidden');	
				}else{
					
				$('#otherFail').html('Some Technical Issues.');	
				setTimeout(closeModal, 2000);	
					
				}
	
			    },
				error:function(){
					
				//alert('Err');	
				$('#otherFail').html('Some Technical Issue.');	
				setTimeout(closeModal, 2000);
				}
    }).fail(function() {
		//alert('Fail');	
               $('#otherFail').html('Some Technical Issue.');	
				setTimeout(closeModal, 2000);  
      });
 
 
});

$(document).on('submit','#postpaidForm',function(){

   var  form_data =  $('#postpaidForm').serialize();
    var mobile = $('#post-mobilenumber').val();								
	var money = $('#post-amount').val();
		
   if ( mobile <= 0 || money <=0 ){
		
		return false;	
	}
   
								
	var provider = $('#post-service_type option:selected').text();	
	var service_type = $('#service_type_post').val();	
 	
showModal();
// $('#preSucc').html("Recharge processing please wait");

    $.ajax({
                type: "POST",
                url: "<?php echo  base_url();?>recharge/ad_postpaid_recharge", 
                data: form_data,
                
				datatype:"json",
                
				success: function( result )  
                { 
                
				$('#trans_id').html(result.trans_id);
				
				if(result.class == "fail"){
				
				$('.loading-anim').hide();
					
				$('#mobileFail').html(mobile);
				$('#serviceProviderFail').html(provider);
				$('#serviceTyepeFail').html(service_type);
				$('#moneyFail').html(money);
				$('#totalFail').html(money);	
				
				$('.failure').removeClass('hidden');	

				}else if(result.class == "success"){
					
				$('.loading-anim').hide();
				$('#mobileSucc').html(mobile);
				$('#serviceProviderSucc').html(provider);
				$('#serviceTyepeSucc').html(service_type);
				$('#moneySucc').html(money);
				$('#totalSucc').html(money);	
					
				$('.success').removeClass('hidden');	
				
				}else{
					
				$('#otherFail').html('Some Technical Issue.');	
				setTimeout(closeModal, 10000);
					
				}
			    },
				error:function(){
			$('#otherFail').html('Some Technical Issue.');	
				setTimeout(closeModal, 10000);
				}
    }).fail(function() {
		
               $('#otherFail').html('Some Technical Issue.');	
				setTimeout(closeModal, 10000);
      });
 
 
});


$(document).on('submit','.dthRecharge',function(){
	var formId = $(this).attr('id');
		
	var mobile = $('#'+formId+'Number').val();								
	var money = $('#'+formId+'Amount').val();
	
	  if ( mobile <= 0 || money <=0 ){
		
		return false;	
	}
   
//	$('#preSucc').html("Recharge processing please wait");
	
	//alert(formId);
								
	var provider = $('#dthUl>li.resp-tab-active').html();	
	var service_type = 'DTH';	
 
	//return false;
	
	var form_data = $('#'+formId).serialize();
	 	
     showModal();
	//alert(form_data);
	
	 $.ajax({
                type: "POST",
                url: "<?php echo  base_url();?>recharge/ad_dth_recharge", 
                data: form_data,
				datatype:"json",
				success: function( result )  
                { 
				$('.trans_id').html(result.trans_id);
				$('.money').html(result.amount);
				$('.serviceprovider').html(result.serviceprovider);
				$('.totalMoney').html(result.amount);
				
				if(result.class == "fail"){
					
			    $('.loading-anim').hide();
					
				$('#mobileFail').html(mobile);
				$('#serviceProviderFail').html(provider);
				$('#serviceTyepeFail').html(service_type);
				$('#moneyFail').html(money);
				$('#totalFail').html(money);	
				
				$('.failure').removeClass('hidden');
				}else if(result.class == "success"){
				$('.loading-anim').hide();
				$('#mobileSucc').html(mobile);
				$('#serviceProviderSucc').html(provider);
				$('#serviceTyepeSucc').html(service_type);
				$('#moneySucc').html(money);
				$('#totalSucc').html(money);	
					
				$('.success').removeClass('hidden');
				}
			    },
				error:function(){
			        $('#otherFail').html('Some Technical Issue.');	
				setTimeout(closeModal, 2000);
				}
				}).fail(function() {
					
						   $('#otherFail').html('Some Technical Issue.');	
							setTimeout(closeModal, 2000);
				  });
				

	
	
});

	$(document).on('submit','#billForm',function(){
 showModal();
 var  form_data =  $('#billForm').serialize();
 var mobile = $('#telephone').val();								
 var money = $('#landlineAmount').val();								
 var provider = $('#bill_serviceprovider option:selected').text();	
 var service_type = $('#billUl>li.resp-tab-active').html();;	
 
 
 if(service_type != "landline" ){
	 
	alert('Sorry this Service is not available now.'); 
 }
 
// return false;
 
// $('#billSucc').html("Bill payment processing please wait");
    $.ajax({
                type: "POST",
                url: "<?php echo  base_url();?>recharge/ad_bill", 
                data: form_data,
				datatype:"json",
				success: function( result )  
                { 
				$('#trans_id').html(result.trans_id);
				if(result.class == "fail"){
					
				$('.loading-anim').hide();
					
				$('#mobileFail').html(mobile);
				$('#serviceProviderFail').html(provider);
				$('#serviceTyepeFail').html(service_type);
				$('#moneyFail').html(money);
				$('#totalFail').html(money);
				
				$('.failure').removeClass('hidden');
				}else if(result.class == "success"){ 
				
				$('.loading-anim').hide();
				$('#mobileSucc').html(mobile);
				$('#serviceProviderSucc').html(provider);
				$('#serviceTyepeSucc').html(service_type);
				$('#moneySucc').html(money);
				$('#totalSucc').html(money);	
					
				$('.success').removeClass('hidden');
				}
			    },
				error:function(){
			        $('#otherFail').html('Some Technical Issue.');	
				//setTimeout(closeModal, 4000);	
				}
				}).fail(function() {
					
						   $('#otherFail').html('Some Technical Issue.');	
							setTimeout(closeModal, 2000);
				  });
 
 
});

function showModal(){
	// $(".bs-example-modal-lg-4").show();
	 $('#otherFail').html('');
	 $('.failure').addClass('hidden');
	 $('.success').addClass('hidden');
	 $(".bs-example-modal-lg-pop").modal({                    // wire up the actual modal functionality and show the dialog
      "backdrop"  : "static",
      "keyboard"  : true,
      "show"      : true                     // ensure the modal is shown immediately
    });
	
	
}

function closeModal(){
  $(".bs-example-modal-lg-pop").modal('hide');
   location.reload();	
}
function handler2() {
  console.log( "handler2" );
}
 
 function closewin() {
   location.reload();	
}
 $( "#close" ).on( "click", closewin );
 $( ".close" ).on( "click", closewin );

 


</script>


<!-- RECHARGE POST ENDS -->