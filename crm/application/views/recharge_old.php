<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Waalat CRM</title>
<meta name="description" content="overview &amp; stats" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo base_url()?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/font-awesome.min.css" />
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/ace.min.css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/ace-responsive.min.css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/ace-skins.min.css" />
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
<script src="<?php echo base_url()?>assets/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        if($(this).attr("value")=="postpaid"){
         $(".postpaid").show();
		 $(".prepaid").hide();
        }
        if($(this).attr("value")=="prepaid"){
          
            $(".prepaid").show();
			 $(".postpaid").hide();
        }
        
    });
});
</script>
<style>
.user_profile li { width:100%; display:inline; }
ul.tabs li img {
    width: 20px;
}
ul.tabs li.active {
    background: #FFF;
    border-bottom: 1px solid #FFF;
	font-size: 12px;
	font-weight: 300;
   background:#d9d9d9;
	    height: 70px;
	    color: #000;
    width: 165px;
}
ul.tabs li {
    background: #fff;
	    border: 1px solid #e8e8e8;
    color: #000;
	 height: 70px;
    width: 165px;
	
	
  
}
ul.tabs li:hover {
     background:#fff ;
	 font-weight: 300;
    color: #000;
}
.tab_container {
    border: 1px solid #e8e8e8;
	 margin-top:27px;

	
}
ul.tabs {
  
    border-bottom: 0px solid #e8e8e8;
    border-left: 0px solid #e8e8e8;
    
}
.user_profile li div.one  
{	  margin-left: 33px;
	 float:left;
    font-size: 12px;
    text-decoration: none;
   color:#000;
  
    text-transform: uppercase;
}
.two input 
{
	height: 24px;
    font-size: 12px;
    width: 200px;
	 font-weight: 300;
}
.two select 
{
	height: 24px;
    font-size: 12px;
    width: 200px;
	 font-weight: 300;
}
.btn-info {
    background-color:#5bc0de!important;
     border-color: #5bc0de; 
}
div input
{
		font-size: 11px;
    text-decoration: none;
    color: #4d4d4d;
    font-weight: 300;
   

	
}

.common-class

{
	 font-size: 11px;
    text-decoration: none;
    color: #4d4d4d;
    font-weight: 300;
    text-transform: uppercase;
	float:left;
}



.prepaid
{
	    margin-top: 30px;
    margin-left: 0px;
}
.postpaid
{
	    margin-top: 30px;
    margin-left: 0px;
}

/*.text-down
{
	margin-top:20px;
}*/
.text-des
{
    font-size: 14px;
	text-align:left;
    color: #4d4d4d;
   font-weight:600;
    text-transform: uppercase;
}
img
{
	    cursor: pointer;
}


.input-sizes
{	

	font-size: 11px;
    color: #4d4d4d;
   
    
}
.row .col-lg-12 {
    
        height: 40px;
}
.row .col-md-12 {
    
        height: 40px;
}
.m-d-b
{
	 font-size: 11px;
    text-decoration: none;
    color: #4d4d4d;
    font-weight: 300;
    text-transform: uppercase;
}
.tabs li .imgs
{
	margin-left:60px;margin-top: 11px;
}
.tabs li .txts
{
	margin-top: 36px;
}
.quick
{
	    font-size: 11px;
    text-decoration: none;
    color: #4d4d4d;
    text-align: center;
    font-weight: 300;
    text-transform: uppercase;
	
}
.quick-input select
{
	    font-size: 11px;
    text-decoration: none;
    color: #4d4d4d;
    text-align: center;
    font-weight: 300;
    text-transform: uppercase;
	
}
/* our style*/
.user_profile li div.main{ width:100%; }
.prepaid{ margin-left:0px; }
</style>
</head>

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
 <div class="title">Recharge</div>
 </div>  
<div class="widget-body">
<div class="metro-nav">
<div class="row-fluid">
<div class="span12">
<!--PAGE CONTENT BEGINS-->
<div id="container">
<style>
@media (min-width: 240px) and (max-width: 320px) {
#mobiletab{ width:77px !important; }
#dthtab{ width:62px !important; }
#billstab{ width:80px !important; }
.tabs li .imgs{ margin-left:-12px !important;}
}
@media (min-width: 321px) and (max-width: 480px) {
#mobiletab{ width:110px !important; }
#dthtab{ width:110px !important; }
#billstab{ width:110px !important; }
.tabs li .imgs{ margin-left:25px !important;}
}
@media (min-width: 481px) and (max-width: 568px) {
#mobiletab{ width:130px !important; }
#dthtab{ width:130px !important; }
#billstab{ width:130px !important; }
.tabs li .imgs{ margin-left:40px !important;}
}
</style>
<ul class="tabs">

<li class="active m-d-b" rel="tab1" id="mobiletab"><div class="imgs"><img src="<?php echo base_url()?>images/mobile.png" /></div><div  class="txts">Mobile</div></li>
<li rel="tab2"class=" m-d-b" id="dthtab"><div class="imgs"><img src="<?php echo base_url()?>images/dths.png" /></div><div class="txts">DTH</div></li>
<li rel="tab3" class=" m-d-b" id="billstab"><div class="imgs"><img src="<?php echo base_url()?>images/bills.png" /></div><div class="txts">Bills</li></div>
<!--<li rel="tab4"><img src="<?php echo base_url()?>assets/images/electricity.png" />Electricity</li>
<li rel="tab5"><img src="<?php echo base_url()?>assets/images/gas.png" />Gas</li>
<li rel="tab6"><img src="<?php echo base_url()?>assets/images/landline.png" />Landline</li>
<li rel="tab7"><img src="<?php echo base_url()?>assets/images/insurance.png" />Insurance</li>-->
</ul>

<div class="tab_container user_profile">
<div class="space-10"></div>
<div id="tab1" class="tab_content">
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
<div id="menubox">
 <style>
  .form-horizontal .control-label {
    font-weight: normal;
    margin-bottom: 0;
    padding-top: 7px;
    text-align: left;
}
</style>
<ul>


<li><div class="main">
<?php foreach($details as $res){  
if($res->total_balance=="0"){
	echo "Your balance is very low,so you could not recharge it"; 
 }     else{
	 ?>
     
     <div class="col-md-12 prepaid"> <!---------prepaid starts----------->
     <form class="form-inline" method="post" action="<?php echo site_url(); ?>recharge/ad_recharge" id="mobileproviderForm" name="form1">
     
     <div class="form-group">
     <label for="exampleInputName2">Quick Recharge</label>
    <input type="text" name="mobilenumber" required class="trns form-control" maxlength="10" minlength="10" onKeyPress="return isNumber(event)" id="mobilenumber_mobileprovider" placeholder="+91">
  </div>
  <div class="form-group">
    <input type="text" name="amount" required class="trns form-control" id="amount_mobileprovider" placeholder="Rs">
  </div>
  
  <div class="form-group">
    <select name="serviceprovider"  required id="serviceprovider_mobileprovider"  class="oddfields form-control" notEqual="-Choose-"> 
	  <option selected="selected" value="">-- Operator --</option>
	  <?php foreach($Prepaid as $rels){ ?>
	  <option value="<?php echo $rels->ezypay_prcode; ?>"><?php echo $rels->name; ?></option>
	  <?php } ?>			
	  </select>
	  <input type="hidden" name="used_balance" value="<?php echo $res->used_balance;?>"/>
	  <input type="hidden" name="tot_bal" value="<?php echo $res->total_balance;?>"/>
  </div>
  
     </form>
     <!---------prepaid ends----------->
     </div>
     
     
     <div class="col-lg-12 postpaid" style="display:none;"><!---------postpaid ends----------->
     <form class="form-inline" method="post" action="<?php echo site_url(); ?>recharge/ad_postpaid_recharge" id="mobilepostpaidproviderForm" name="form1">
     
     
     <div class="form-group">
     <label for="exampleInputName2">Quick Recharge</label>
     <input type="text" name="mobilenumber" required class="trns form-control" maxlength="10" minlength="10" onKeyPress="return isNumber(event)" id="mobilenumber_mobileprovider" placeholder="+91">
  </div>
  <div class="form-group">
  <input type="text" name="amount" required class="trns form-control" id="amount_mobileprovider" placeholder="Rs">
  </div>
  
  <div class="form-group">
  <select name="serviceprovider"  required id="serviceprovider_mobileprovider"  class="oddfields form-control" notEqual="-Choose-"> 
<option selected="selected" value="">-- Operator --</option>
<?php foreach($Postpaid as $rels){ ?>
<option value="<?php echo $rels->ezypay_prcode; ?>"><?php echo $rels->name; ?></option>
<?php } ?>			
</select>
<input type="hidden" name="used_balance" value="<?php echo $res->used_balance;?>"/>
<input type="hidden" name="tot_bal" value="<?php echo $res->total_balance;?>"/>
      </div>
  
     </form>
     </div><!---------postpaid ends----------->
     
     <div class="col-md-12 post-prepaid" style="margin-top:35px;">
     <form class="form-inline">
     <div class="form-group">
     <div class="checkbox" style="margin-right:50px;">
    <label>
      <input type="radio" value="prepaid" name="service_type" id="service_type" class="card_type"> Prepaid
    </label>
  </div>
  <div class="checkbox" style="margin-right:50px;">
    <label>
      <input type="radio" value="postpaid" name="service_type" id="service_type" class="card_type"> Postpaid
    </label>
  </div>
  </div>
  
  <div class="form-group">
      <input type="submit" value="Recharge" class="btn btn-info btn-small"/>
  </div>
  </form>
  </div>
     

<!--<div class="one">Recharge</div>
<input type="hidden" name="token" value="28c6907a31f427507842b52a9a5122d0" />
<input type="hidden" name="service" value="mobileprovider" />
<div class="two">

<select name="serviceprovider"  required id="serviceprovider_mobileprovider"  class="oddfields" notEqual="-Choose-">
<option selected="selected" value="">-Select-</option>
<?php /*foreach($Prepaid as $rels){*/ ?>
<option value="<?php //echo $rels->ezypay_prcode; ?>"><?php //echo $rels->name; ?></option>
<?php //} ?>			
</select>
</div>-->
</div>
</li>
<!--<li><div class="main">
<div class="one">Mobile No.</div>
<div class="two"><input type="text" name="mobilenumber" required class="trns" maxlength="10" minlength="10" onkeypress="return isNumber(event)" id="mobilenumber_mobileprovider" /><input type="hidden" name="billingtype"  class="trns" id="billingtype_mobileprovider" value="prepaid" /></div>
</div>
</li>
<li><div class="main">
<div class="one">Amount</div>
<div class="two"><input type="text" name="amount" required class="trns" id="amount_mobileprovider" /></div>
</div>
</li>-->

</ul>


<?php }}?>


</div><!-- end of menubox-->
<div class="clear"></div>
</div><!-- #tab1 -->
<script>
$(document).ready(function(){
    $(".rsABlock1 img.info").click(function(){
        $("#id").hide();
		 $("#subscriber_id").hide();
		 $("#smart_card").hide();
		$("#customer_id").show();
		$("#viewing_card").hide();
		$("#sundirect_smart_card").hide();
		$("#videocon_customer_id").hide();
		var airtel=$("#airtel").val();
		$("#service_provider").val(airtel);
    });
    $(".rsABlock2 img.info1").click(function(){
        $("#subscriber_id").show();
		$("#customer_id").hide();
		$("#id").hide();
		$("#smart_card").hide();
		$("#viewing_card").hide();
		$("#sundirect_smart_card").hide();
		$("#videocon_customer_id").hide();
		var tata=$("#tata").val();
		$("#service_provider").val(tata);
    });
	$(".rsABlock3 img.info2").click(function(){
        $("#smart_card").show();
		$("#customer_id").hide();
		$("#subscriber_id").hide();
		$("#viewing_card").hide();
		$("#sundirect_smart_card").hide();
		$("#videocon_customer_id").hide();
		$("#id").hide();
		var big_tv=$("#big").val();
		$("#service_provider").val(big_tv);
		
    });
	
	$(".rsABlock4 img.info3").click(function(){
        $("#smart_card").hide();
		$("#customer_id").hide();
		$("#subscriber_id").hide();
		$("#videocon_customer_id").hide();
		$("#sundirect_smart_card").hide();
		$("#viewing_card").show();
		$("#id").hide();
		var dish=$("#dish").val();
		$("#service_provider").val(dish);
    });
	
	$(".rsABlock5 img.info4").click(function(){
        $("#smart_card").hide();
		$("#customer_id").hide();
		$("#subscriber_id").hide();
		$("#viewing_card").hide();
		$("#sundirect_smart_card").hide();
		$("#videocon_customer_id").show();
		$("#id").hide();
		var videocon=$("#videocon").val();
		$("#service_provider").val(videocon);
		
    });
	
	$(".rsABlock6 img.info5").click(function(){
        $("#smart_card").hide();
		$("#customer_id").hide();
		$("#subscriber_id").hide();
		$("#viewing_card").hide();
		$("#videocon_customer_id").hide();
		$("#sundirect_smart_card").show();
		$("#id").hide();
		var sun=$("#sun").val();
		$("#service_provider").val(sun);
		
    });
	
	$(".landline img.infos").click(function(){
        $(".reds").show();
		 $(".greens").hide();
		  $(".blues").hide();
		   $(".gas1").hide();
		  $(".datacard1").hide()
    });
	$(".electricity img.infos1").click(function(){
        $(".greens").show();
		  $(".reds").hide();
		     $(".blues").hide();
			  $(".gas1").hide();
		 $(".datacard1").hide()
    });
	
	$(".insurancce img.infos2").click(function(){
        $(".blues").show();
		  $(".reds").hide();
		    $(".greens").hide();
			 $(".gas1").hide();
		 $(".datacard1").hide()
    });
	
	$(".gas img.infos3").click(function(){
        $(".gas1").show();
		  $(".reds").hide();
		    $(".greens").hide();
			  $(".blues").hide();
			  $(".datacard1").hide()
		
    });
		$(".datacard img.infos4").click(function(){
        $(".datacard1").show();
		  $(".reds").hide();
		    $(".greens").hide();
			  $(".blues").hide();
			   $(".gas1").hide();
		
    });
	
	
});
</script>

  <!--<script>
								
									$(function() {
										
										
    $('.rsABlock1 img.info').click(function(e) {
        e.preventDefault();
        $("#check_test1").show();
			$("#default_id").hide();
		});
	 $('.rsABlock2 img.info1').click(function(e) {
        e.preventDefault();
		
  $('.caption-background2').toggleClass('show');
			$(".defalut").hide();
			$(".caption-background").hide();
			
		
    });
	
	 $('.rsABlock3 img.info2').click(function(e) {
        e.preventDefault();
        $('.caption-background3').toggleClass('show');
			$(".caption-background1").hide();
			$(".caption-background2").hide();
		
    });
});

								</script>-->
<style>
.dthstyle{ font-size:14px; font-weight:bold; }

@media (min-width: 240px) and (max-width: 990px) {
.rsABlock1{ width:100px; }
.rsABlock2{ width:100px; }
.rsABlock3{ width:100px; }
.rsABlock4{ width:100px; }
.rsABlock5{ width:100px; }
.rsABlock6{ width:100px; }
}
</style>                            

<div id="tab2" class="tab_content"><div class="clear20"></div>
<div id="menubox">

<form method="post" action="<?php echo site_url(); ?>recharge/ad_dth_recharge" id="dthproviderForm" name="form1" class="form-horizontal">
<input type="hidden" name="token" value="28c6907a31f427507842b52a9a5122d0" />
<input type="hidden" name="service" value="dthprovider" />
<ul>
<li>
<div class="main">
<?php foreach($details as $res){  
if($res->total_balance=="0"){
		echo "Your balance is very low,so you could not recharge it"; 
 }     else{?>
 

 <!--<div class="col-md-12 dth" style="margin-bottom:50px;">
 <div class="rsABlock1 col-md-2">
    <input type="hidden" value="10" id="airtel" /><img class="info" src="<?php echo base_url()?>/images/airtel dth.png"/>
</div>
<div class="rsABlock2 col-md-2">
    <input type="hidden" value="9" id="tata" /><img class="info1" src="<?php echo base_url()?>/images/tata sky dth.png"/ >
</div>
<div class="rsABlock3 col-md-2">
    <input type="hidden" value="20" id="big" /><img class="info2" src="<?php echo base_url()?>/images/reliance.png"/>
</div>
<div class="rsABlock4 col-md-2">
   <input type="hidden" value="7" id="dish" /> <img class="info3" src="<?php echo base_url()?>/images/dish.png"/>
</div>
<div class="rsABlock5 col-md-2">
    <input type="hidden" value="13" id="videocon" /><img class="info4" src="<?php echo base_url()?>/images/videocon dth.png"/>
</div>
<div class="rsABlock6 col-md-2">
    <input type="hidden" value="8" id="sun" /><img class="info5" src="<?php echo base_url()?>/images/sun dth.png"/>
     
</div>
<input type="hidden" id="service_provider" name="serviceprovider" />
<input type="hidden" name="used_balance" value="<?php echo $res->used_balance;?>"/>
<input type="hidden" name="tot_bal" value="<?php echo $res->total_balance;?>"/>

</div>-->


				<ul style="margin-bottom:40px;">
                <li class="rsABlock1"><input type="hidden" value="10" id="airtel" /><img class="info" src="<?php echo base_url()?>/images/airtel dth.png"/></li>
                <li class="rsABlock2"><input type="hidden" value="9" id="tata" /><img class="info1" src="<?php echo base_url()?>/images/tata sky dth.png"/ ></li>
                <li class="rsABlock3"><input type="hidden" value="20" id="big" /><img class="info2" src="<?php echo base_url()?>/images/reliance.png"/></li>
                <li class="rsABlock4"><input type="hidden" value="7" id="dish" /> <img class="info3" src="<?php echo base_url()?>/images/dish.png"/></li>
                <li class="rsABlock5"><input type="hidden" value="13" id="videocon" /><img class="info4" src="<?php echo base_url()?>/images/videocon dth.png"/></li>
                <li class="rsABlock6"><input type="hidden" value="8" id="sun" /><img class="info5" src="<?php echo base_url()?>/images/sun dth.png"/></li>
                </ul>
                <input type="hidden" id="service_provider" name="serviceprovider" />
				<input type="hidden" name="used_balance" value="<?php echo $res->used_balance;?>"/>
				<input type="hidden" name="tot_bal" value="<?php echo $res->total_balance;?>"/>
                
                
                

<div>
<div class="col-md-12 text-down" >
<div class="col-md-3 text-des">ID</div>
<div class=" col-md-4 input-sizes ">
<input type="text" class="form-control" id="check_test"    / >
</div>
</div>
 
<div class="caption-background col-md-12 text-down" style="display:none; " id="customer_id">
<div class="col-md-3 text-des">Customer Id</div>
<div class=" col-md-4 input-sizes ">
<input  class="form-control" type="text"  id="customer_id" placeholder="3 XXXX"  name="mobilenumber" />
</div>
</div> 

<div class="caption-background col-md-12 text-down" style="display:none; " id="subscriber_id">
<div class="col-md-3 text-des">Subscriber Id</div>
<div class=" col-md-4 input-sizes ">
<input  class="form-control" type="text"  id="subscriber_id" placeholder="1 XXXX"  name="mobilenumber" />
</div>
</div> 

<div class="caption-background col-md-12 text-down" style="display:none; " id="smart_card">
<div class="col-md-3 text-des">Smart card</div>
<div class=" col-md-4 input-sizes ">
<input  class="form-control" type="text"  id="smart_card" placeholder="2 XXXX"  name="mobilenumber" />
</div>
</div>


<div class="caption-background col-md-12 text-down" style="display:none; " id="viewing_card">
<div class="col-md-3 text-des">Viewing card</div>
<div class=" col-md-4 input-sizes ">
<input  class="form-control" type="text"  id="viewing_card" placeholder="0 XXXX"  name="mobilenumber" />
</div>
</div>

<div class="caption-background col-md-12 text-down" style="display:none; " id="videocon_customer_id">
<div class="col-md-3 text-des">Customer Id</div>
<div class=" col-md-4 input-sizes ">
<input  class="form-control" type="text"  id="videocon_customer_id" placeholder=""  name="mobilenumber" />
</div>
</div>
                    
 
<div class="caption-background col-md-12 text-down" style="display:none; " id="sundirect_smart_card">
<div class="col-md-3 text-des">Smart card</div>
<div class=" col-md-4 input-sizes ">
<input  class="form-control" type="text"  id="sundirect_smart_card" placeholder="X XXXX"   name="mobilenumber"/>
</div>
</div>

<div class="caption-background col-md-12 text-down" style="margin-top: 5px;">
<div class="col-md-3 text-des">Amount</div>
<div class=" col-md-4 input-sizes ">
<input  class="form-control" type="text"  id="check_test4" name="amount" />
</div>
</div>


</div>


<!--
<div class="one">Recharge</div>

<div class="two">

<select name="serviceprovider" number=true maxlength="10" minlength="10" required class="oddfields" id="serviceprovider_dthprovider">
<option selected="selected" value="">-Select-</option>
<?php foreach($dthprovider as $rels){ ?>
<option value="<?php echo $rels->ezypay_prcode; ?>"><?php echo $rels->name; ?></option>
<?php } ?>	</select></div>-->
</div>



</li>
<!--
<li>
<div class="main">
  

<div class="one">CI/VC Number</div>
<div class="two"><input type="text" name="mobilenumber"  class="trns" id="mobilenumber_dthprovider" /> <input type="hidden" name="billingtype"  class="trns" id="billingtype_dthprovider" value="prepaid" /></div>
</div>
</li>

<li><div class="main">
<div class="one">Amount</div>
<div class="two"><input type="text" name="amount" class="trns" id="amount_dthprovider" /></div>
</div>
</li>
-->
<li><div class="main"><div class="three" style="margin-left:141px; "><input type="submit" value="Submit" class="btn btn-info btn-small"  /></div></div>
</ul>
</form>
<?php }}?>

</div>
</div><!-- end of menubox-->
<!-- #tab2 -->
<div id="tab3" class="tab_content"><div class="clear20"></div>
<div id="menubox">
<ul>

<form method="post" action="<?php echo site_url(); ?>recharge/ad_postpaid_recharge" id="mobilepostpaidproviderForm" name="form1" class="form-horizontal"  >
        <li>
<div class="main">
	<?php foreach($details as $res){  
				if($res->total_balance=="0"){
				echo "Your balance is very low,so you could not recharge it"; 
				}     else{?>
    
                <!--<div class="col-md-12" style="margin-bottom:40px;">
                    <div class="landline col-md-2">
                    <img class="infos" src="<?php echo base_url()?>/images/telephone.png"/>
                    </div>
                    <div class="electricity col-md-2">
                    <img class="infos1" src="<?php echo base_url()?>/images/electricity.png"/>
                    </div>
                    <div class="insurancce col-md-2">
                    <img class="infos2" src="<?php echo base_url()?>/images/insurance.png"/>
                    </div>
                    <div class="gas col-md-2">
                    <img class="infos3" src="<?php echo base_url()?>/images/gas.png"/>
                    </div>
                    <div class="datacard col-md-2">
                    <img class="infos4" src="<?php echo base_url()?>/images/datacard.png"/>
                    </div>
                </div>-->
                
                <ul style="margin-bottom:40px;">
                <li class="landline"><img class="infos" src="<?php echo base_url()?>/images/telephone.png"/></li>
                <li class="electricity"><img class="infos1" src="<?php echo base_url()?>/images/electricity.png"/></li>
                <li class="insurancce"><img class="infos2" src="<?php echo base_url()?>/images/insurance.png"/></li>
                <li class="gas"><img class="infos3" src="<?php echo base_url()?>/images/gas.png"/></li>
                <li class="datacard"><img class="infos4" src="<?php echo base_url()?>/images/datacard.png"/></li>
                </ul>
                
                
                <div class="reds input-txt-box">
                    <div class="col-md-12 text-align">
                        <div class="col-md-3 text-des">
                        Provider
                        </div>
                        <div class="col-md-4 input-sizes">
                        <select id="types" class="form-control">
                        <option value="">Airtel Landline</option>
                        <option value="1">MTNL Delhi</option>
                        <option value="2">Reliance Communication</option>
                        <option value="3">Tata Tele Service(CDMA)</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-md-12 text-down" >
                        <div class="col-md-3 text-des">
                       		 Telephone No
                        </div>
                        <div class=" col-md-4 input-sizes ">
                        	<input type="text" name="names" placeholder="Telephone No" class="form-control">
                        </div>
                    </div>
                    <div  class="col-md-12 text-down">
                        <div class="col-md-3 text-des">
                       		 Amount
                        </div>
                        <div class="col-md-4 input-sizes">
                        	<input type="text" name="names" placeholder="Amount" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="greens input-txt-box"  style="display:none;" >
                    <div class="col-md-12 text-align ">
                        <div class="col-md-3 text-des">
                       	 Provider
                        </div>
                        <div class="col-md-4 input-sizes">
                            <select id="types" readonly  class="form-control">
                            <option value="">BSES Rejdhani</option>
                            <option value="1">BSES Yamuna</option>
                            <option value="2">Dakshin Gujarat Vij Company</option>
                            <option value="3">Madhya Gujarat vij Company</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 text-down " >
                        <div class="col-md-3 text-des">
                        	Card No
                        </div>
                        <div class="col-md-4 input-sizes">
                        	<input type="text" name="names" placeholder="card No" class="airtel_hiden form-control">
                        </div>
                    </div>
                    <div class="col-md-12 text-down">
                        <div class="col-md-3 text-des">
                        Amount
                        </div>
                        <div class="col-md-4 input-sizes">
                        	<input type="text" name="names" placeholder="Amount" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="blues input-txt-box" style="display:none;" >
                    <div class="col-md-12 text-align ">
                        <div class="col-md-3 text-des">
                        Provider
                        </div>
                        <div class="col-md-4 input-sizes">
                            <select id="types" readonly  class="form-control">
                            <option value="">Birla Sun Life Insurnce</option>
                            <option value="1">ICICI Prudential Life Insurance</option>
                            <option value="2">India First life Insurance</option>
                            <option value="3">Tata All Life Insurance</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12" >
                        <div class="col-md-3 text-des">
                        Policy No
                        </div>
                        <div class="col-md-4 input-sizes">
                       		 <input type="text" name="names" placeholder="Policy No" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12 text-down " >
                        <div class="col-md-3 text-des">
                        Client Id
                        </div>
                        <div class="col-md-4 input-sizes">
                       		 <input type="text" name="names" placeholder="Client Id" class="form-control">
                        </div>
					</div>
                    <div class="col-md-12 text-align " >
                        <div class="col-md-3 text-des">
                        Bill Due Date
                        </div>
                        <div class="col-md-4 input-sizes" >
                        	<input type="text" name="names" placeholder="Bill Due Date"  class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12 text-down ">
                        <div class="col-md-3 text-des">
                        Amount
                        </div>
                        <div class="col-md-4 input-sizes" >
                       		 <input type="text" name="names" placeholder="Amount"  class="form-control">
                        </div>
                    </div>
                    
                </div>
                <div class="gas1 input-txt-box" style="display:none;"  >
                    <div class="col-md-12 text-align " >
                 	  	 <div class="col-md-3 text-des">
                    Provider
                    </div>
                   		 <div class="col-md-4 input-sizes">
                        <select id="types" readonly  class="form-control">
                        <option value="">Mahanagar Gas Ltd</option>
                        </select>
                    </div>
                    </div>
                   		<div class="col-md-12 text-down">
                    <div class="col-md-3 text-des">
                    Account No
                    </div>
                    <div class="col-md-4 input-sizes">
                   		 <input type="text" name="names" placeholder="Account number" class="form-control">
                    </div>
                    </div>
					<div class="col-md-12" >
                        <div class="col-md-3 text-des">
                        Amount
                        </div>
                        <div class="col-md-4 input-sizes">
                        	<input type="text" name="names" placeholder="Client Id" class="form-control">
                        </div>
                    </div>
                </div>                            
    		  <div class="datacard1 input-txt-box" style="display:none;"  >
              
              <div class="col-md-12">
     <div class="form-group">
    <div class="col-sm-5" style="text-align:left;">
      <input type="radio" checked value="prepaid" class=""> <span> Prepaid </span> 
    </div>
    <div class="col-sm-5" style="text-align:left;">
      <input type="radio"  value="postpaid" class=""> <span> Postpaid </span>
    </div>
  </div>
  </div>
              
              	 
              
              
    					 <div class="col-md-12 text-align " >
                 	  		 <div class="col-md-3 text-des">
                   				Number
                   			</div>
     						<div class="col-md-4 input-sizes">
   							  <input type="text" name="mobilenumber" class="form-control" /></div>
                              </div>
    					  
             				
                  
                  <div class="col-md-12" >
                        <div class="col-md-3 text-des">
                        Amount
                        </div>
                        <div class="col-md-4 input-sizes">
                        	<input type="text" name="names" class="form-control" placeholder="Client Id">
                        </div>
                    </div>
     					 </div> 		
     </div>
                  
       
    <!--<div class="one">Recharge</div>
    
    <input type="hidden" name="token" value="28c6907a31f427507842b52a9a5122d0" />
    <input type="hidden" name="service" value="mobilepostpaidprovider" />
    <div class="two">
    
    <select name="serviceprovider"     class="oddfields" id="serviceprovider_mobilepostpaidprovider">
    <option selected="selected" value="">-Select-</option>
    <?php foreach($Postpaid as $rels){ ?>
    <option value="<?php echo $rels->ezypay_prcode; ?>"><?php echo $rels->name; ?></option>
    <?php } ?>
    </select></div>
    </div>
    </li>
    <li><div class="main">
    <div class="one">Mobile No.</div>
    <div class="two"><input type="text" name="mobilenumber"  required class="trns" maxlength="10" minlength="10" onkeypress="return isNumber(event)" id="mobilenumber_mobilepostpaidprovider"/><input type="hidden" name="billingtype"  class="trns" id="billingtype_mobilepostpaidprovider" value="postpaid" /></div>
    </div>
    </li>
    <li><div class="main">
    <div class="one">Amount</div>
    <div class="two"><input type="text" name="amount" class="trns" id="amount_mobilepostpaidprovider" /></div>
    </div>
    </li>-->
    <li><div class="main"><div class="three"><input type="submit" value="Submit" class="btn btn-info btn-small"   /></div></div>
    </ul>
    </form>
<?php }}?>

</div><!-- end of menubox-->
</div><!-- #tab3 -->
<!--<div id="tab4" class="tab_content"><div class="clear20"></div>
<div id="menubox">
<ul>
<?php foreach($details as $res){  
if($res->total_balance=="0"){
	echo "<script type='text/javascript'>alert('Please Add A Amount'); window.location.href = 'home';  </script>"; 
 }     else{?>
<form method="post" action="<?php echo site_url(); ?>recharge/ad_recharge" id="electricityproviderForm" name="form1"  >
<li><div class="main">
<div class="one">Recharge</div>

<input type="hidden" name="token" value="28c6907a31f427507842b52a9a5122d0" />
<input type="hidden" name="service" value="electricityprovider" />
<div class="two">
<select name="serviceprovider" number=true maxlength="10" minlength="10" required class="oddfields" id="serviceprovider_electricityprovider">
<option selected="selected" value="">-Select-</option>
<?php foreach($electricityprovider as $rels){ ?>
<option value="<?php echo $rels->ezypay_prcode; ?>"><?php echo $rels->name; ?></option>
<?php } ?>	
</select></div>
</div>
</li>
<li><div class="main">
<div class="one">Consumer Number</div>
<div class="two"><input type="text" name="mobilenumber"  class="trns" id="mobilenumber_electricityprovider" /><input type="hidden" name="billingtype"  class="trns" id="billingtype_electricityprovider" value="postpaid" /></div>
</div>
</li>
<li><div class="main">
<div class="one">Amount</div>
<div class="two"><input type="text" name="amount" class="trns" id="amount_electricityprovider" /></div>
</div>
</li>
<li><div class="main"><div class="three"><input type="submit" value="Submit" class="button"   /></div></div>
</ul>
</form>
<?php }}?>

</div><!-- end of menubox-->
<!--</div><!-- #tab4 -->
<!--<div id="tab5" class="tab_content"><div class="clear20"></div>
<div id="menubox">
<ul>
<?php foreach($details as $res){  
if($res->total_balance=="0"){
	echo "<script type='text/javascript'>alert('Please Add A Amount'); window.location.href = 'home';  </script>"; 
 }     else{?>
<form method="post" action="<?php echo site_url(); ?>recharge/ad_recharge" id="gasproviderForm" name="form1"  >
<li><div class="main">
<div class="one">Recharge</div>

<input type="hidden" name="token" value="28c6907a31f427507842b52a9a5122d0" />
<input type="hidden" name="service" value="gasprovider" />
<div class="two">
<select name="serviceprovider" number=true maxlength="10" minlength="10" required class="oddfields" id="serviceprovider_gasprovider">
<option selected="selected" value="">-Select-</option>
<?php foreach($gasprovider as $rels){ ?>
<option value="<?php echo $rels->ezypay_prcode; ?>"><?php echo $rels->name; ?></option>
<?php } ?>	

</select></div>
</div>
</li>
<li><div class="main">
<div class="one">Consumer Number</div>
<div class="two"><input type="text" name="mobilenumber"  class="trns" id="mobilenumber_gasprovider" /><input type="hidden" name="billingtype"  class="trns" id="billingtype_gasprovider" value="postpaid" /></div>
</div>
</li>
<li><div class="main">
<div class="one">Amount</div>
<div class="two"><input type="text" name="amount" class="trns" id="amount_gasprovider" /></div>
</div>
</li>
<li><div class="main"><div class="three"><input type="submit" value="Submit" class="button"   /></div></div>
</ul>
</form>
<?php }}?>

</div><!-- end of menubox-->
<!--</div><!-- #tab4 -->

<!--<div id="tab6" class="tab_content"><div class="clear20"></div>
<div id="menubox">
<ul>
<?php foreach($details as $res){  
if($res->total_balance=="0"){
	echo "<script type='text/javascript'>alert('Please Add A Amount'); window.location.href = 'home';  </script>";
 }     else{?>
<form method="post" action="<?php echo site_url(); ?>recharge/ad_recharge" id="landlineproviderForm" name="form1"  >
<li><div class="main">
<div class="one">Recharge</div>

<input type="hidden" name="token" value="28c6907a31f427507842b52a9a5122d0" />
<input type="hidden" name="service" value="landlineprovider" />
<div class="two">
<select name="serviceprovider"  number=true maxlength="10" minlength="10" required class="oddfields" id="serviceprovider_landlineprovider">
<option selected="selected" value="">-Select-</option>
<?php foreach($landlineprovider as $rels){ ?>
<option value="<?php echo $rels->ezypay_prcode; ?>"><?php echo $rels->name; ?></option>
<?php } ?> </select></div>
</div>
</li>
<li><div class="main">
<div class="one">Number with STD Code</div>
<div class="two"><input type="text" name="mobilenumber"  class="trns" id="mobilenumber_landlineprovider" /><input type="hidden" name="billingtype"  class="trns" id="billingtype_landlineprovider" value="postpaid" /></div>
</div>
</li>
<li><div class="main">
<div class="one">Amount</div>
<div class="two"><input type="text" name="amount" class="trns" id="amount_landlineprovider" /></div>
</div>
</li>
<li><div class="main"><div class="three"><input type="submit" value="Submit" class="button"  /></div></div>
</ul>
</form>

<?php }}?>

</div><!-- end of menubox-->
<!--</div><!-- #tab3 -->

<!-- For Landline & Insurance --->
<!--<div id="tab7" class="tab_content"><div class="clear20"></div>
<h5 class="not_available">This page is available soon</h5>
</div>-->
<div class="clear"></div>
</div> <!-- .tab_container -->
</div>
<!--PAGE CONTENT ENDS-->
</div><!--/.span-->
</div><!--/.row-fluid-->
</div><!--/.page-content-->

<!--/#ace-settings-container-->
</div><!--/.main-content-->
</div><!--/.main-container-->

</div>
</div> 
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>


<script type="text/javascript">
$(document).ready(function() {
$(".tab_content").hide();
$(".tab_content:first").show();
$("ul.tabs li").click(function() {
$("ul.tabs li").removeClass("active");
$(this).addClass("active");
$(".tab_content").hide();
var activeTab = $(this).attr("rel");
$("#"+activeTab).fadeIn();
});
//GetDateTime();
});
function GetDateTime()
{
var date = new Date();
//var date = new Date();
var current_time =((date.getDate()<10)?"0"+date.getDate():date.getDate()) + "-" + ((date.getMonth()+1<10)?""+date.getMonth()+1:date.getMonth()+1) + "-" + date.getFullYear()+" "+((date.getHours()<10)?"0"+date.getHours():date.getHours())+":"+((date.getMinutes()<10)?"0"+date.getMinutes():date.getMinutes())+":"+((date.getSeconds()<10)?"0"+date.getSeconds():date.getSeconds())
$("#current_time").html(current_time);
setTimeout(GetDateTime,1000);
}
</script>



