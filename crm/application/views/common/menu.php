<div class="main_menu cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left">
<?php 
$type=$this->session->userdata('type');
$username = $this->session->userdata('username');
$uid = $this->session->userdata('uid');		 
if(	$type == '' && $username == '' && $uid == '')
{	
	header("Location: http://64.187.228.106/dev/Via/trunk/B2B/"); 
}
if($type === "admin" || $type === "retailer" ||$type === "distributor" ||$type === "super" || $type === "consumer" ){?>

<ul class="list-unstyled">
        	<li>
			<a href="<?php echo site_url('user/secure_login') ?>" class="<?php echo ('user' == $this->router->class && 'secure_login' == $this->router->method) ? 'active' : ''; ?>">
			<i class="flaticon-house28"></i>
			<span>Home</span>
			</a>
			</li>
            <li>
			<a href="<?php echo site_url('user/myprofile') ?>" class="<?php echo ('user' == $this->router->class && 'myprofile' == $this->router->method || 'margin' == $this->router->class &&  'viewmargin' == $this->router->method) ? 'active' : ''; ?>">
			<i class="flaticon-users149"></i>
			<span>Profile</span>
			</a>
			</li>
            
            <?php }  if($type === "distributor" ||$type === "super" ){?>
            
            <li>
			<a href="<?php echo site_url('home/index') ?>" class="<?php echo ('home' == $this->router->class && 'index' == $this->router->method || 'user' == $this->router->class && 'viewbalance' == $this->router->method || 'user' == $this->router->class && 'createuser' == $this->router->method || 'mobile_no_change' == $this->router->class && 'index' == $this->router->method)  ? 'active' : ''; ?>">
			<i class="flaticon-multiple25"></i>
			<span>User</span>
			</a>
			</li>
            
            <?php }	if( $type === "retailer" ){?>
            
            <li>
			<a href="<?php echo site_url('recharge/index') ?>">
			<i class="flaticon-multiple25"></i>
			<span>Recharge</span>
			</a>
			</li>
            
            <li>
			<a href="<?php echo site_url('sendmoney/log') ?>">
			<i class="flaticon-buy11"></i>
			<span>Send Money</span>
			</a>
			</li>
            
            <?php } if($type === "admin"  ){?>
            
            <li>
			<a href="<?php echo site_url('home/index') ?>" class="<?php echo ('home' == $this->router->class && 'index' == $this->router->method || 'user' == $this->router->class && 'viewbalance' == $this->router->method || 'user' == $this->router->class && 'createuser' == $this->router->method || 'mobile_no_change' == $this->router->class && 'index' == $this->router->method)  ? 'active' : ''; ?>">
			<i class="flaticon-multiple25"></i>
			<span>User</span>
			</a>
			</li>
            
            <?php } if( $type === "admin" ){?>            
            
            <li> 
			<a href="<?php echo site_url('prepaid/prepaid_service') ?>" class="<?php echo ('prepaid' == $this->router->class && 'prepaid_service' == $this->router->method || 'postpaid' == $this->router->class && 'postpaid_service' == $this->router->method || 'DTH_provider' == $this->router->class && 'DTH_service' == $this->router->method) ? 'active' : ''; ?>">
			<i class="flaticon-gear74"></i>
			<span>Service</span>
			</a>
			</li>
            
            <?php }?>
            
            <li>
			<a href="<?php echo site_url('report') ?>" class="<?php echo ('sendmoneyreport' == $this->router->class && 'icash_admin' == $this->router->method)  || 'cardgeneration' == $this->router->class && 'card_details_admin' == $this->router->method || 'reports' == $this->router->class && 'daily_sales_report' == $this->router->method || 'reports' == $this->router->class && 'retailer_sales_report' == $this->router->method || 'reports' == $this->router->class && 'get_operator_report' == $this->router->method || 'report' == $this->router->class && 'report/index' == $this->router->method ? 'active' : ''; ?>">
			<i class="flaticon-progress" ></i>
			
            <span>Report</span>
			</a>
			</li>
            
            
            <?php if($type === "admin"){?>
            <li>
			<a href="<?php echo site_url('sms/get_outgoing_sms') ?>" class="<?php echo ('sms' == $this->router->class && 'get_outgoing_sms' == $this->router->method) ? 'active' : ''; ?>">
			<i class="flaticon-chat81"></i>
			<span>Sms</span>
			</a>
			</li>
            
            <?php }	if($type === "distributor"){?>
            <li>
			<a href="<?php echo site_url('sms/get_outgoing_sms') ?>" class="<?php echo ('sms' == $this->router->class && 'get_outgoing_sms' == $this->router->method) ? 'active' : ''; ?>">
			<i class="flaticon-chat81"></i>
			<span>Sms</span>
			</a>
			</li>
            
            <?php	}	if($type === "super"){	?>
            <li>
			<a href="<?php echo site_url('sms/get_outgoing_sms') ?>" class="<?php echo ('sms' == $this->router->class && 'get_outgoing_sms' == $this->router->method) ? 'active' : ''; ?>">
			<i class="flaticon-chat81"></i>
			<span>Sms</span>
			</a>
			</li>
            
            <?php } if($type === "super" || $type === "distributor" ){?>
            
            <li>
			<a href="<?php echo site_url('payment/viewrequestpaymentdetail') ?>" class="<?php echo ('payment' == $this->router->class && 'viewrequestpaymentdetail' == $this->router->method || 'paymentreversal' == $this->router->class &&  'viewreversalpaymentdetail' == $this->router->method) ? 'active' : ''; ?>">
			<i class="flaticon-buy11"></i>
			<span>Payment</span>
			</a>
			</li>
            
            <?php } if($type === "retailer" ){?>
            <li>
			<a href="<?php echo site_url('payment/viewrequestpaymentdetail') ?>" class="<?php echo ('payment' == $this->router->class && 'viewrequestpaymentdetail' == $this->router->method || 'paymentreversal' == $this->router->class &&  'viewreversalpaymentdetail' == $this->router->method) ? 'active' : ''; ?>">
			<i class="flaticon-buy11"></i>
			<span>Payment</span>
			</a>
			</li>
            
            <?php }if($type === "admin"){?>
            <li>
			<a href="<?php echo site_url('payment/viewrequestpaymentdetail') ?>" class="<?php echo ('payment' == $this->router->class && 'viewrequestpaymentdetail' == $this->router->method || 'paymentreversal' == $this->router->class &&  'viewreversalpaymentdetail' == $this->router->method) ? 'active' : ''; ?>">
			<i class="flaticon-buy11"></i>
			<span>Payment</span>
			</a>
			</li>
            
            <?php } if($type === "admin" || $type === "distributor" || $type === "retailer" || $type === "super"){ ?>
            
            <li>
			<a href="<?php echo site_url('transfer/get_transfer_details') ?>" class="<?php echo ('transfer' == $this->router->class && 'get_transfer_details' == $this->router->method || 'transfer' == $this->router->class &&  'other_transfer' == $this->router->method) ? 'active' : ''; ?>">
			<i class="flaticon-arrow95"></i>
			<span>Transfer</span>
			</a>
			</li>
            
            <?php } else if($type === "consumer") { ?>
            
            <li>
	<a href='#'><!--<i class="fa fa-table"></i>-->Your Order</a>
	</li>
			<?php } ?>
            <li>
             <?php if($type === "consumer") { ?> 
			<a href="">
			<i class="flaticon-inbox18"></i>
			<span>Customer Report</span>
			</a>
            <?php } else { ?>
            <a href="<?php echo site_url('complaints/index') ?>" class="<?php echo ('complaints' == $this->router->class && 'index' == $this->router->method) ? 'active' : ''; ?>">
			<i class="flaticon-inbox18"></i>
			<span>Compliants</span>
			</a>
            <?php } ?>
			</li>
        </ul>
    </div>
 <script src="<?php echo base_url()?>/assets/paybuks/js/jPushMenu.js"></script>
<script>
jQuery(document).ready(function($) {
	$('.toggle-menu').jPushMenu();
});
</script>   
    								
    
   
<style>
.okb{
    background: rgba(0, 0, 0, 0) linear-gradient(270deg, rgba(227, 16, 109, 1) 0%, rgba(134, 1, 120, 1) 100%) repeat scroll 0 0;
    border: medium none !important;
    border-radius: 8px;
    color: #fff;
    float: left;
    font-size: 20px;
    height: 52px;
    line-height: 52px;
    margin-top: 30px;
    padding: 0 50px;
}		
</style>		
<!-- POPUP ENDS -->    
<div class="content_wrapper">