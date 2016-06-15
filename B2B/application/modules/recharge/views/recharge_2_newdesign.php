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


<div class="container">
        <button class="toggle-menu menu-left push-body gradient_btn1">Menu</button>
    	<div class="admin-recharge">
        	<div id="parentHorizontalTab">
            	<form>
                <ul class="resp-tabs-list hor_1">
                    <li class="gradient_btn2">Mobile</li>
                    <li class="gradient_btn2">DTH</li>
                    <li class="gradient_btn2">Bills</li>
                </ul>
                <div class="resp-tabs-container hor_1">
                    <div>
<?php foreach($details as $res){  
if($res->total_balance=="0"){
  echo "Your balance is very low,so you could not recharge it"; 
 }     else{   ?>                    
                        <div class="ChildVerticalTab_1">
                            <ul class="resp-tabs-list ver_1">
                                <li class="recharge_pre">prepaid</li>
                                <li class="recharge_post">postpaid</li>
                            </ul>
                            <div class="resp-tabs-container ver_1">
                                <div><form class="form-inline" method="post" action="<?php echo site_url(); ?>recharge/ad_postpaid_recharge" id="mobilepostpaidproviderForm" name="form1">
                                    <p>Quick Recharge</p>
                                     <input type="text" name="mobilenumber" required maxlength="10" minlength="10" onKeyPress="return isNumber(event)" id="mobilenumber_mobileprovider" placeholder="+91">
                                    <input type="text" name="amount" required id="amount_mobileprovider" placeholder="Rs">
  <input type="hidden" name="service_type" value="prepaid">
  
                                    <select name="serviceprovider"  required id="serviceprovider_mobileprovider" notEqual="-Choose-"> 
    <option selected="selected" value="">-- Operator --</option>
    <?php foreach($Prepaid as $rels){ ?>

    <option value="<?php echo $rels->ezypay_prcode; ?>" data-image="<?php echo base_url(); ?>images/airtel.png"> <?php echo $rels->name; ?></option>
     <?php } ?>  
    </select>

    <input type="hidden" name="used_balance" value="<?php echo $res->used_balance;?>"/>
    <input type="hidden" name="tot_bal" value="<?php echo $res->total_balance;?>"/>
        <input type="hidden" name="user_parent_id" value="<?php echo $res->parent_id;?>"/>
        
        <input type="submit" id="showLoader" value="Submit" class="gradient_btn"/>
                                        </div>
                                        
                                        
                                <div>
                                    <p>Quick Recharge</p>
                                    <input type="text" name="mobilenumber" required  maxlength="10" minlength="10" onKeyPress="return isNumber(event)" id="mobilenumber_mobileprovider" placeholder="+91">
                                    <input type="text" name="amount" required id="amount_mobileprovider" placeholder="Rs">
   <input type="hidden" value="postpaid" name="service_type">
                                    
                                    <select name="serviceprovider"  required id="serviceprovider_mobileprovider"  notEqual="-Choose-"> 
<option selected="selected" value="">-- Operator --</option>
<?php foreach($Postpaid as $rels){ ?>
<option value="<?php echo $rels->ezypay_prcode; ?>"><?php echo $rels->name; ?></option>
<?php } ?>      
</select>
<input type="hidden" name="used_balance" value="<?php echo $res->used_balance;?>"/>
<input type="hidden" name="tot_bal" value="<?php echo $res->total_balance;?>"/>
  <input type="hidden" name="user_parent_id" value="<?php echo $res->parent_id;?>"/>
  
                                    <input type="submit" value="Pay Bill"   class="gradient_btn"/>
                                </div>
                            </div>
                        </form></div>
                    <?php }}?></div>
                    
                    
                    
<div>
<form method="post" action="<?php echo site_url(); ?>recharge/ad_dth_recharge" id="dthproviderForm" name="form1" class="form-horizontal">
<input type="hidden" name="token" value="28c6907a31f427507842b52a9a5122d0" />
<input type="hidden" name="service" value="dthprovider" />
                    
<?php foreach($details as $res){  
if($res->total_balance=="0"){
    echo "Your balance is very low,so you could not recharge it"; 
 }     else{ ?>                    
                        <div class="ChildVerticalTab_1">
                            <ul class="resp-tabs-list ver_1">
                                <li class="dth-1">airtel</li>
                                <li class="dth-2">tatasky</li>
                                <li class="dth-3">bigtv</li>
                                <li class="dth-4">dishtv</li>
                                <li class="dth-5">videcon</li>
                                <li class="dth-6">sundirect</li>
                            </ul>
                            <div class="resp-tabs-container ver_1">
                                <div>
                                    <label>Customer ID</label>
                                    <input type="text" id="customer_id" placeholder="Enter your ID" name="mobilenumber" />
                                    <label>Amount</label>
                                    <input type="text" id="check_test4" name="amount" placeholder="Enter your amount" />
                                    <input type="submit" class="gradient_btn" value="Pay Bill" />
                                </div>
                                <div>
                                    <label>Subscriber ID</label>
                                    <input type="text" id="subscriber_id" placeholder="Enter your ID" name="mobilenumber1" />
                                    <label>Amount</label>
                                    <input type="text" id="check_test4" name="amount" placeholder="Enter your amount" />
                                    <input type="submit" class="gradient_btn" value="Pay Bill" />
                                </div>
                                <div>
                                    <label>Smart Card</label>
                                    <input type="text"  id="smart_card" placeholder="Enter your ID" name="mobilenumber2" />
                                    <label>Amount</label>
                                    <input type="text" id="check_test4" name="amount" placeholder="Enter your amount" />
                                    <input type="submit" class="gradient_btn" value="Pay Bill" />
                                </div>
                                <div>
                                    <label>View Card</label>
                                    <input type="text"  id="viewing_card" placeholder="Enter your ID"  name="mobilenumber3" />
                                    <label>Amount</label>
                                    <input type="text" id="check_test4" name="amount" placeholder="Enter your amount" />
                                    <input type="submit" class="gradient_btn" value="Pay Bill" />
                                </div>
                                <div>
                                    <label>Customer ID</label>
                                   <input type="text" id="videocon_customer_id" placeholder="Enter your ID" name="mobilenumber4" />
                                    <label>Amount</label>
                                    <input type="text" id="check_test4" name="amount" placeholder="Enter your amount" />
                                    <input type="submit" class="gradient_btn" value="Pay Bill" />
                                </div>
                                <div>
                                    <label>Smart Card</label>
                                    <input type="text"  id="sundirect_smart_card" placeholder="Enter your ID"   name="mobilenumber5"/>
                                    <label>Amount</label>
                                    <input type="text" id="check_test4" name="amount" placeholder="Enter your amount" />
                                    <input type="submit" class="gradient_btn" value="Pay Bill" />
                                </div>
                            </div>
                        </div>
                    </form>
					<?php }}?>
                    </div>
                    
                    
                    
                    <div>
<form method="post" action="#" id="mobilepostpaidproviderForm" name="form1" class="form-horizontal"  >                    
  <?php foreach($details as $res){  
        if($res->total_balance=="0"){
        echo "Your balance is very low,so you could not recharge it"; 
        }     else{ ?>                       <div class="ChildVerticalTab_1">
                            <ul class="resp-tabs-list ver_1">
                                <li class="bill-1">landline</li>
                                <li class="bill-2">electricity</li>
                                <li class="bill-3">insurance</li>
                                <li class="bill-4">gas</li>
                                <li class="bill-5">datacard</li>
                            </ul>
                            <div class="resp-tabs-container ver_1">
                                <div>
                                	<label>Provider</label>
                                    <select id="types">
                                    	<option value="airtel Landline">Airtel Landline</option>
                                        <option value="MTNL Delhi">MTNL Delhi</option>
                                        <option value="Reliance Communication">Reliance Communication</option>
                                        <option value="Tata Tele Service(CDMA)">Tata Tele Service(CDMA)</option>
                                    </select>
                                    <label>Telephone No</label>
                                    <input type="text" name="names" placeholder="Enter Number">
                                    <label>Amount</label>
                                    <input type="text" name="names" placeholder="Enter your amount">
                                    <input type="submit" class="gradient_btn" value="Pay Now" />
                                </div>
                                
                                <div>
                                    <label>Provider</label>
                                    <select id="types">
                                    	<option value="BSES Rejdhani">BSES Rejdhani</option>
                                        <option value="MTNL Delhi">BSES Yamuna</option>
                                        <option value="Dakshin Gujarat Vij Company">Dakshin Gujarat Vij Company</option>
                                        <option value="Madhya Gujarat vij Company">Madhya Gujarat vij Company</option>
                                    </select>
                                    <label>Card No</label>
                                    <input type="text" name="names" placeholder="Enter Card Number">
                                    <label>Amount</label>
                                    <input type="text" name="names" placeholder="Enter your Amount">
                                    <input type="submit" class="gradient_btn" value="Pay Now" />
                                </div>
                                
                                <div>
                                    <label>Provider</label>
                                    <select id="types">
                                    	<option value="Birla Sun Life Insurnce">Birla Sun Life Insurnce</option>
                                        <option value="ICICI Prudential Life Insurance">ICICI Prudential Life Insurance</option>
                                        <option value="India First life Insurance">India First life Insurance</option>
                                        <option value="Tata All Life Insurance">Tata All Life Insurance</option>
                                    </select>
                                    <label>Policy No</label>
                                    <input type="text" name="names" placeholder="Enter Policy Number">
                                    <label>Client ID</label>
                                    <input type="text" name="names" placeholder="Enter Client ID">
                                    <label>Bill Due Date</label>
                                    <input type="text" name="names" placeholder="Bill Due Date">
                                    <label>Amount</label>
                                    <input type="text" name="names" placeholder="Enter your amount">
                                    <input type="submit" class="gradient_btn" value="Pay Now" />
                                </div>
                                
                                <div>
                                    <label>Provider</label>
                                    <select id="types">
                                    	<option value="Mahanagar Gas Ltd">Mahanagar Gas Ltd</option>
                                    </select>
                                    <label>Account No</label>
                                    <input type="text" name="names" placeholder="Enter Account Number">
                                    <label>Amount</label>
                                    <input type="text" name="names" placeholder="Enter your amount">
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
                                                <input type="submit" class="gradient_btn" value="Submit" />
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
                                                <input type="submit" class="gradient_btn" value="Pay Bill" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- child tab ends -->
                            </div>
                        </div>
                    </form>
				<?php }}?>
			</div>
                    
                </div>
            </form>
            </div>
            <!-- parentHorizontalTab ends -->
        </div>
        <!-- admin recharge ends -->
    </div>
    <!-- container ends -->
	
	
	
	
<!-- RESP MENU STARTS -->
<!--load jPushMenu, required-->
<script src="<?php echo base_url()?>/assets/paybuks/js/jPushMenu.js"></script>
<script>
jQuery(document).ready(function($) {
	$('.toggle-menu').jPushMenu();
});
</script>
<!-- RESP MENU ENDS -->

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