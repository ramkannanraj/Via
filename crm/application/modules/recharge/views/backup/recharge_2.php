<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Paybuks Mobile Money</title>
<meta name="description" content="overview &amp; stats" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo base_url()?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/font-awesome.min.css" />
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/ace.min.css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/ace-responsive.min.css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/ace-skins.min.css" />

<script src="<?php echo base_url(); ?>assets/js/jquery-1.9.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/dd.css" />
<script src="<?php echo base_url(); ?>assets/js/jquery.dd.js"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->

<script src="<?php echo base_url()?>assets/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>


<script type="text/javascript">
$(document).ready(function(){
  
  /* $('input[type="radio"]').click(function(){
        if($(this).attr("value")=="postpaid"){
         $(".postpaid").show();
     $(".prepaid").hide();
        }
        if($(this).attr("value")=="prepaid"){
            $(".prepaid").show();
      $(".postpaid").hide();
        }
        
    });*/
  
     $('#img_postpaid').click(function(){
         $(".bottoms").show();
      $(".postpaid").show();
          $(".bottom").hide();
     $(".prepaid").hide();
    });
 $('#img_prepaid').click(function(){
      $(".postpaid").hide();
           $(".bottoms").hide();
           $(".bottom").show();
     $(".prepaid").show();
    });
  
   $('#img_dth_postpaid').click(function(){
      $(".postpaid").show();
     $(".prepaid").hide();
    });
 $('#img_dth_prepaid').click(function(){
      $(".postpaid").hide();
     $(".prepaid").show();
    });
  
  

});

 function close_pop(){
    document.getElementById('back').style.display="none";
    document.getElementById('showMsg').style.display="none";
  document.getElementById('pendingMsg').style.display="none";
  document.getElementById('duplicateMsg').style.display="none";
  document.getElementById('failureMsg').style.display="none";
  document.getElementById('insufMsg').style.display="none";
  

  }
</script>


<style>
#bottom
{
    display:none;
}
#bottoms
{
    display:none;
}
/*SANKAR POPUP CODING START*/

.showMsg {
    width: 432px;
    height: 288px;
    float: left;
padding: 2%;
border: 1px solid #CCC;
position:fixed;
z-index:100003;
top:40%; left: 31%;
background-image:url(../images/success_box.png) ;
overflow:hidden;
display:none;
}
.closeMsg {
    width: 64px;
    height: 64px;
    float: left;
padding: 2%;
border: 0px solid #CCC;
position:fixed;
z-index:100003;
top:60%; left: 41%;
overflow:hidden;
background-image:url(../images/demo_wait.gif);
display:none;
}
.pendingMsg
{
   width: 432px;
    height: 288px;
    float: left;
padding: 2%;
border: 1px solid #CCC;
position:fixed;
z-index:100003;
top:40%; left: 31%;
background-image:url(../images/pending_box.png) ;
overflow:hidden;
display:none;
}
.duplicateMsg
{
width: 432px;
height: 288px;
float: left;
padding: 2%;
border: 1px solid #CCC;
position:fixed;
z-index:100003;
top:40%; left: 31%;
background-image:url(../images/duplicate_box.png) ;
overflow:hidden;
display:none;
}
.failureMsg
{
width: 432px;
height: 288px;
float: left;
padding: 2%;
border: 1px solid #CCC;
position:fixed;
z-index:100003;
top:40%; left: 31%;
background-image:url(../images/failure_box.png) ;
overflow:hidden;
display:none;
}
.insufMsg
{
width: 432px;
height: 288px;
float: left;
padding: 2%;
border: 1px solid #CCC;
position:fixed;
z-index:100003;
top:40%; left: 31%;
background-image:url(../images/insufficient_box.png) ;
overflow:hidden;
display:none;
}
/*SANKAR POPUP CODING END*/
@media only screen and (min-width: 320px) {
.left-sidebar {
    margin-right: 0px !important;
}
}
@media (min-width: 240px) and (max-width: 768px) {
#servicetypes{ margin-top:140px !important; }
}
@media only screen and (min-width: 769px) {
#servicetypes{ margin-top:35px !important; }
}

.user_profile li { width:100%; display:inline; }
ul.tabs li img {
        width: 37px;
    margin-top: 0px;
}
ul.tabs li.active {
    background: #FFF;
  /* border-bottom: 1px solid #FFF;*/
  font-size: 12px;
  font-weight: 300;
   background:#ee1776 ;
      height: 50px;
      color: #000;
    width: 165px;
}
ul.tabs li {
    background: #fff;
      border: 1px solid #e8e8e8;
    color: #000;
   height: 50px;
    width: 165px;
  
  
  
}
ul.tabs li:hover {
     background:#fff ;
   font-weight: 300;
    color: #000;
}
.tab_container {
    border: 1px solid #e8e8e8;
      margin-top: 10px;
 background-color:#0097c4;
 width:90%;

  
}
ul.tabs {
  
    border-bottom: 0px solid #e8e8e8;
    border-left: 0px solid #e8e8e8;
    
}
.user_profile li div.one  
{   margin-left: 33px;
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
    color: #fff;
   font-weight:600;
    text-transform: uppercase;
          padding: 10px; 
              padding-left:70px;
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
margin-top: 3px;
}
.tabs li .txts
{
  margin-top: 0px;
  color: #fff ;
  margin-right: 28px;
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
.number_rup
{
  font-size:13px;font-weight:900;

}

.poste
{
      margin-left: 100px;
}
.prepaids img {
  position:absolute;
  left:0;
  -webkit-transition: opacity 1s ease-in-out;
  -moz-transition: opacity 1s ease-in-out;
  -o-transition: opacity 1s ease-in-out;
  transition: opacity 1s ease-in-out;
}


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
 
 <div id="showMsg" class="showMsg">dshd</div>
  <div id="pendingMsg" class="pendingMsg">pendingMsg</div>
   <div id="duplicateMsg" class="duplicateMsg">duplicateMsg</div> 
    <div id="failureMsg" class="failureMsg">failureMsg</div> 
    <div id="insufMsg" class="insufMsg">insufMsg</div>
 

<script>
// assumes you're using jQuery
$(document).ready(function() {
/*$("#showLoader").click(function(){*/
//alert(document.getElementById('mobilenumber_mobileprovider').val());
 $(document).ajaxStart(function(){
        $("#wait").css("display", "block");
    });
  /*});*/
$('.showMsg').hide();
$('.pendingMsg').hide();
$('#back').hide();
$('.duplicateMsg').hide();
$('#back').hide();
$('.failureMsg').hide();
$('.insufMsg').hide();
$('#back').hide();

<?php $message = $this->session->flashdata('item'); 
if($message['message']=="Transaction Successful"){
 ?>
  $(document).ajaxComplete(function(){
        $("#wait").css("display", "none");
    });
$('#showMsg').html('<div class="back" id="back" onClick="close_pop()"><img src="../img/closebtn.png" width="15"></div><div style="padding-top:30px;font-size:15px;"><?php echo'<b style="margin-left: 50px;"><img src="../img/green-tick_sri.png" width="20">your recharge for Rs '.$message["amount"].' is done</b>'?></div><table><tr><td style="padding-left:46px; padding-top: 20px;" class="number_rup"><?php echo $message['number'] ?></td><td style="padding-top: 20px; padding-left: 83px; class="number_rup"><?php echo "Rs ".$message['amount'] ?></td></tr><tr><td style="padding-left:45px; padding-top:4px; color:#808080;" class="number_rup"><?php echo $message['serviceprovider'] ?></td><td style=" padding-top:4px;color:#808080;padding-left:83px;" class="number_rup"><?php echo $message['trans_id'] ?></td></tr><tr><td style="font-size:12px;font-weight:600;padding-right:124px; padding-top: 49px;"><?php echo 'Total' ?></td><td style=" font-size:12px;font-weight: 600; padding-top:51px; padding-left:110px;color:#FF0000;" ><?php echo "Rs ".$message['amount']; ?></td></tr></table>').show();
$('#back').show();
<?php } 
if($message['message']=="Transaction Pending"){
 ?>
$('#pendingMsg').html('<div class="back" id="back" onClick="close_pop()"><img src="../img/closebtn.png" width="15"></div><div style="padding-top:30px;font-size:15px;"><?php echo'<b style="margin-left: 50px;"> your recharge for Rs '.$message["amount"].' is Processing</b>'?></div><table><tr><td style="padding-left:46px; padding-top: 20px;" class="number_rup"><?php echo $message['number'] ?></td><td style="padding-top: 20px; padding-left: 83px; class="number_rup"><?php echo "Rs ".$message['amount'] ?></td></tr><tr><td style="padding-left:45px; padding-top:4px; color:#808080;" class="number_rup"><?php echo $message['serviceprovider'] ?></td><td style=" padding-top:4px;color:#808080;padding-left:83px;" class="number_rup"><?php echo $message['trans_id'] ?></td></tr><tr><td style="font-size:12px;font-weight:600;padding-right:124px; padding-top: 49px;"><?php echo 'Total' ?></td><td style=" font-size:12px;font-weight: 600; padding-top:51px; padding-left:110px;color:#FF0000;" ><?php echo "Rs ".$message['amount']; ?></td></tr></table>').show();
$('#back').show();
<?php }

if($message['message']=="Duplicate request,please try after 10 minutes"){
 ?>
$('#duplicateMsg').html('<div class="back" id="back" onClick="close_pop()"><img src="../img/closebtn.png" width="15"></div><div style="padding-top:30px;font-size:15px;"><?php echo'<b style="margin-left: 50px;"> Duplicate request,please try after 10 minutes</b>'?></div><table><tr><td style="padding-left:46px; padding-top: 20px;" class="number_rup"><?php echo $message['number'] ?></td><td style="padding-top: 20px; padding-left: 83px; class="number_rup"><?php echo "Rs ".$message['amount'] ?></td></tr><tr><td style="padding-left:45px; padding-top:4px; color:#808080;" class="number_rup"><?php echo $message['serviceprovider'] ?></td><td style=" padding-top:4px;color:#808080;padding-left:83px;" class="number_rup"><?php echo $message['trans_id'] ?></td></tr><tr><td style="font-size:12px;font-weight:600;padding-right:124px; padding-top: 49px;"><?php echo 'Total' ?></td><td style=" font-size:12px;font-weight: 600; padding-top:51px; padding-left:110px;color:#FF0000;" ><?php echo "Rs ".$message['amount']; ?></td></tr></table>').show();
$('#back').show();
<?php }

if($message['message']=="Transaction Failure"){
 ?>
$('#failureMsg').html('<div class="back" id="back" onClick="close_pop()"><img src="../img/closebtn.png" width="15"></div><div style="padding-top:30px;font-size:15px;"><?php echo'<b style="margin-left: 50px;"><img src="../img/cancel_img_sri.png" width="20"> your recharge for Rs '.$message["amount"].' is Failed</b>'?></div><table><tr><td style="padding-left:46px; padding-top: 20px;" class="number_rup"><?php echo $message['number'] ?></td><td style="padding-top: 20px; padding-left: 83px; class="number_rup"><?php echo "Rs ".$message['amount'] ?></td></tr><tr><td style="padding-left:45px; padding-top:4px; color:#808080;" class="number_rup"><?php echo $message['serviceprovider'] ?></td><td style=" padding-top:4px;color:#808080;padding-left:83px;" class="number_rup"><?php echo $message['trans_id'] ?></td></tr><tr><td style="font-size:12px;font-weight:600;padding-right:124px; padding-top: 49px;"><?php echo 'Total' ?></td><td style=" font-size:12px;font-weight: 600; padding-top:51px; padding-left:110px;color:#FF0000;" ><?php echo "Rs ".$message['amount']; ?></td></tr></table>').show();
$('#back').show();
<?php }

if($message['message']=="Insufficient Balance"){
 ?>
$('#insufMsg').html('<div class="back" id="back" onClick="close_pop()"><img src="../img/closebtn.png" width="15"></div><div style="padding-top:101px;font-size:15px;"><?php echo'<b style="margin-left:74px;"> INSUFFICIENT BALANCE</b>'?></div>').show();
$('#back').show();
<?php }

?>
});

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script type="text/javascript">
$(document).ready(function(){
   
   
    $("#showLoader").click(function(){
        $("#txt").load("demo_ajax_load.asp");
    });

});
</script>
 <div id="txt"></div>
<div id="wait" class="closeMsg"></div>
<div class="metro-nav">
<div class="row-fluid">
<div class="span12">
<!--PAGE CONTENT BEGINS-->
<div id="container">
<style>
@media only screen and (max-device-width: 480px) {
    .tab_container{padding:200px;}

}



@media (min-width: 240px) and (max-width: 320px) {
#mobiletab{ width:77px !important; }
#dthtab{ width:62px !important; }
#billstab{ width:80px !important; }
.tabs li .imgs{ margin-left:-12px !important;}
.row .col-lg-12 {
    
        width: 100%;
}


.text-des {
    width: 100%;
}

}
@media (min-width: 321px) and (max-width: 480px) {
#mobiletab{ width:110px !important; }
#dthtab{ width:110px !important; }
#billstab{ width:110px !important; }
.tabs li .imgs{ margin-left:25px !important;}
.row .col-lg-12 {
    
        width: 100%;
        height: 100%;
}


}
@media (min-width: 481px) and (max-width: 568px) {
#mobiletab{ width:130px !important; }
#dthtab{ width:130px !important; }
#billstab{ width:130px !important; }
.tabs li .imgs{ margin-left:40px !important;}

.text-des {
    width: 100%;
    
}
.tab_container
{
  width: 100%;
  margin-left: 0px;
}
.buttons-s
{
        margin-right:0px;

}
.widget .widget-body {
   
    height: 100%;
   
}
}
@media (min-width: 991px) and (max-width: 2400px) {
.oddfields{ width:240px !important; }


}
.back{  
    margin-left: 367px;
    margin-top: -16px;
    cursor: pointer; 
  
  }

 
.widget .widget-body {
   
    height: 500px;
   
}

</style>
<ul class="tabs">
<li class="active m-d-b" rel="tab4" id="rechargetab"><div class="imgs"><img src="<?php echo base_url()?>images/mobile.png" /></div><div  class="txts active" >Wizard</div></li>
<li class="m-d-b" rel="tab1" id="mobiletab"><div class="imgs"><img src="<?php echo base_url()?>images/mobile.png" /></div><div  class="txts" style="color:#2d86bd;">Mobile</div></li>
<li rel="tab2"class=" m-d-b" id="dthtab"><div class="imgs"><img src="<?php echo base_url()?>images/dths.png" /></div><div class="txts" style="color:#2d86bd;">DTH</div></li>
<li rel="tab3" class=" m-d-b" id="billstab"><div class="imgs"><img src="<?php echo base_url()?>images/bills.png" /></div><div class="txts" style="color:#2d86bd;">Bills</li></div>
<!--<li rel="tab4"><img src="<?php echo base_url()?>assets/images/electricity.png" />Electricity</li>
<li rel="tab5"><img src="<?php echo base_url()?>assets/images/gas.png" />Gas</li>
<li rel="tab6"><img src="<?php echo base_url()?>assets/images/landline.png" />Landline</li>
<li rel="tab7"><img src="<?php echo base_url()?>assets/images/insurance.png" />Insurance</li>-->
</ul>

<div class="tab_container user_profile" style="min-height:240px; background-color:#4ee7ff;">
<div class="space-10"></div>

<!---- wizard form starts-------------------->
<div id="tab4" class="tab_content">

<link href='http://fonts.googleapis.com/css?family=Patua+One' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/assets/wizard/simpleform.css" />

<form id="testform2" method="post">
			<fieldset class="personal-data">
					<label for="name">Enter your mobile number: <span class="required"></span></label>
					<input type="text" id="mobile" name="mobile" placeholder="+91" class="form-control wizard"/>
			</fieldset>
<style>.prepost{ margin:20px 0 0 0; }</style>
			<fieldset class="personal-data">
            <label for="name">Prepaid or Postpaid: <span class="required">*</span></label>
            <div class="form-group">
            <div class="col-sm-4">
            <ul>
            <li class="rsABlock1">
            <input type="radio" value="Prepaid" id="prepost" name="prepost" style="color:#fff !important;" /><span class="prepost">Prepaid</span>
            </li>
            <li class="rsABlock2">
            <input type="radio" value="Postpaid" id="prepost" name="prepost" style="color:#fff !important;" /><span class="prepost">Postpaid</span>
            </li>
            </ul>
            </div>
            <div class="col-sm-4">
            
            </div>
            </div>
			</fieldset>

			<fieldset class="address-data-inputs">
					<label for="house-id">Which Operator?:</label>
                    <select class="form-control wizard" id="operator" name="operator">
                    <option value="">Select Operator</option>
                    <option value="Airtel">Airtel</option>
                    <option value="Aircel">Aircel</option>
                    <option value="Vodafone">Vodafone</option>
                    <option value="BSNL">BSNL</option>
                    <option value="Reliance">Reliance</option>
                    <option value="Docomo">Docomo</option>
                    <option value="Idea">Idea</option>
                    <option value="Uninor">Uninor</option>
                    <option value="MTS">MTS</option>
                    <option value="Tata Indicom">Tata Indicom</option>
                    </select>
			</fieldset>

			<fieldset class="message-details">
					<label for="comments">How much to recharge?:</label>
					<input type="text" id="amt" name="amt" placeholder="Rs." class="form-control wizard" style="width:25%;" />
        	</fieldset>
        	<div class="clear"></div>
		</form>
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>/assets/wizard/simpleform.min.js"></script>
	
	<script type="text/javascript">
		$("#testform2").simpleform({
			speed : 500,
			transition : 'slide',
			progressBar : true,
			showProgressText : true,
			validate: true
		});

		function validateForm(formID, Obj){

			switch(formID){
				case 'testform2' :
					Obj.validate({
						rules: {
							mobile: {
								required: true
							},
							prepost: {
								required: true
							},
							operator: {
								required: true
							},
							amt: {
								required: true
							}
						},
						messages: {
							mobile: {
							 	required: "Please enter a valid 10 digit Mobile Number"
							},
							prepost: {
								required: "Please select any category",
							},
							operator: {
							 	required: "Please select any operator to continue"
							},
							amt: {
								required: "Please enter amount to recharge"
							}
						}
					});
				return Obj.valid();
				break;
			}
		}
		</script>

</div>

<!---- wizard form ends-------------------->

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

<!--<script>
$(document).ready(function(){
$("#customoptions_image_0_0").click(function(){
    
    $(this).next("input[type=radio]").prop("checked", true);





});

$("#customoptions_image_0_01").click(function(){
   
    $(this).next("input[type=radio]").prop("checked", true);
});
 
});
</script>-->

<ul>


<li><div class="main">


<?php foreach($details as $res){  
if($res->total_balance=="0"){
  echo "Your balance is very low,so you could not recharge it"; 
 }     else{
   ?>
     <div class="col-md-12 post-prepaid">

     <div class="form-group">
     
   
     <div class="col-sm-4">
     </div>

    <div class="col-sm-2 prepaids" id="img_prepaids">
 <a id="customoptions_image_0_0" title="" onClick="return false;" href="#" class="iage">
<img class="img-responsive big"  title="" src="../images/prepaid_bw.png" width="60" id="img_prepaid"  >
<img class="bottom"  title="" src="../images/prepaid1.png" width="60" id="bottom"   >
</a>

     <!--<input type="radio" value="prepaid" name="service_type" id="service_type" class="card_type" checked>-->

    </div>

    <div class="col-sm-2 prepaids poste" id="img_postpaid">
<a id="customoptions_image_0_01" title="" onClick="return false;" href="#"  class="iages">
<img class="small-image-preview1 img-responsive v-middle" title="" src="../images/postpaid_bw.png"  width="60"  id="img_postpaid">
<img class="bottoms"  title="" src="../images/postpaid1.png" width="60" id="bottoms"  >

</a>
      <!--<input type="radio" value="postpaid" name="service_type" id="service_type" class="card_type">--> 
    </div>
    
    <div class="col-sm-4">
     </div>

  </div>

  </div> 
     <div class="col-md-12 prepaid" style="margin-top:60px;"> <!--prepaid starts-->
     <form class="form-inline" method="post" action="<?php echo site_url(); ?>recharge/ad_recharge"  id="mobileproviderForm" name="form1">
     
   
   
     <div class="form-group">
     <label for="exampleInputName2" style="color:#fff;">Quick Recharge</label>
    <input type="text" name="mobilenumber" required class="trns form-control" maxlength="10" minlength="10" onKeyPress="return isNumber(event)" id="mobilenumber_mobileprovider" placeholder="+91">
  </div>
  <div class="form-group">
    <input type="text" name="amount" required class="trns form-control" id="amount_mobileprovider" placeholder="Rs">
  <input type="hidden" name="service_type" value="prepaid">
  </div>
  
  <div class="form-group">
    <select name="serviceprovider"  required id="serviceprovider_mobileprovider"  class="oddfields form-control" notEqual="-Choose-"> 
    <option selected="selected" value="">-- Operator --</option>
    <?php foreach($Prepaid as $rels){ ?>

    <option value="<?php echo $rels->ezypay_prcode; ?>" data-image="<?php echo base_url(); ?>images/airtel.png"> <?php echo $rels->name; ?></option>
     <?php } ?>  
    </select>

    

       
    <input type="hidden" name="used_balance" value="<?php echo $res->used_balance;?>"/>
    <input type="hidden" name="tot_bal" value="<?php echo $res->total_balance;?>"/>
        <input type="hidden" name="user_parent_id" value="<?php echo $res->parent_id;?>"/>
        
  </div>
  <div class="col-md-12" style="margin-top:20px;">
  <div class="form-group" >
      <input type="submit" id="showLoader"   value="Proceed Recharge" class="" style="font-weight:15px;width: 150px; height: 35px;font-size: 15px;"/>
      
  </div>
  </div>
     </form>
     <!-- id="submit_btn"prepaid ends-->
     </div>
     
     
     <div class="col-md-12 postpaid" style="display:none;margin-top:60px;"><!--postpaid ends-->
     <form class="form-inline" method="post" action="<?php echo site_url(); ?>recharge/ad_postpaid_recharge" id="mobilepostpaidproviderForm" name="form1">
     
     
     <div class="form-group">
     <label for="exampleInputName2" style="color:#fff;">Quick Recharge</label>
     <input type="text" name="mobilenumber" required class="trns form-control" maxlength="10" minlength="10" onKeyPress="return isNumber(event)" id="mobilenumber_mobileprovider" placeholder="+91">
  </div>
  <div class="form-group">
  <input type="text" name="amount" required class="trns form-control" id="amount_mobileprovider" placeholder="Rs">
   <input type="hidden" value="postpaid" name="service_type">
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
  <input type="hidden" name="user_parent_id" value="<?php echo $res->parent_id;?>"/>
      </div>
      <div class="col-md-12" style="margin-top:20px;">
 <div class="form-group" id="paybill">
      <input type="submit" value="Pay Bill"   class="" style="font-weight:15px;width: 150px; height: 35px;font-size: 15px;"/>
  </div>
  
  </div>
     </form>
     </div><!--postpaid ends-->
 
<script src="<?php echo base_url()?>assets/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
     
    
</div>
</li>
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
 

 

        <ul style="margin-bottom:40px;">
                <li class="rsABlock1"><input type="hidden" value="10" id="airtel" /><img class="info" src="<?php echo base_url()?>/images/airtel dth.png" width="73"/></li>
                <li class="rsABlock2"><input type="hidden" value="9" id="tata" /><img class="info1" src="<?php echo base_url()?>/images/tata sky dth.png"  width="73"/ ></li>
                <li class="rsABlock3"><input type="hidden" value="20" id="big" /><img class="info2" src="<?php echo base_url()?>/images/reliance.png"  width="73"/></li>
                <li class="rsABlock4"><input type="hidden" value="7" id="dish" /> <img class="info3" src="<?php echo base_url()?>/images/dish.png"  width="73"/></li>
                <li class="rsABlock5"><input type="hidden" value="13" id="videocon" /><img class="info4" src="<?php echo base_url()?>/images/videocon dth.png " width="73" /></li>
                <li class="rsABlock6"><input type="hidden" value="8" id="sun" /><img class="info5" src="<?php echo base_url()?>/images/sun dth.png "  width="73"/></li>
                </ul>
                <input type="hidden" id="service_provider" name="serviceprovider" />
        <input type="hidden" name="used_balance" value="<?php echo $res->used_balance;?>"/>
        <input type="hidden" name="tot_bal" value="<?php echo $res->total_balance;?>"/>
                 <input type="hidden" name="user_parent_id" value="<?php echo $res->parent_id;?>"/>
                
                
                

<div>
<div class="col-md-12 text-down" id="id" >
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
<input  class="form-control" type="text"  id="subscriber_id" placeholder="1 XXXX"  name="mobilenumber1" />
</div>
</div> 

<div class="caption-background col-md-12 text-down" style="display:none; " id="smart_card">
<div class="col-md-3 text-des">Smart card</div>
<div class=" col-md-4 input-sizes ">
<input  class="form-control" type="text"  id="smart_card" placeholder="2 XXXX"  name="mobilenumber2" />
</div>
</div>


<div class="caption-background col-md-12 text-down" style="display:none; " id="viewing_card">
<div class="col-md-3 text-des">Viewing card</div>
<div class=" col-md-4 input-sizes ">
<input  class="form-control" type="text"  id="viewing_card" placeholder="0 XXXX"  name="mobilenumber3" />
</div>
</div>

<div class="caption-background col-md-12 text-down" style="display:none; " id="videocon_customer_id">
<div class="col-md-3 text-des">Customer Id</div>
<div class=" col-md-4 input-sizes ">
<input  class="form-control" type="text"  id="videocon_customer_id" placeholder=""  name="mobilenumber4" />
</div>
</div>
                    
 
<div class="caption-background col-md-12 text-down" style="display:none; " id="sundirect_smart_card">
<div class="col-md-3 text-des">Smart card</div>
<div class=" col-md-4 input-sizes ">
<input  class="form-control" type="text"  id="sundirect_smart_card" placeholder="X XXXX"   name="mobilenumber5"/>
</div>
</div>

<div class="caption-background col-md-12 text-down" style="margin-top: 5px;">
<div class="col-md-3 text-des">Amount</div>
<div class=" col-md-4 input-sizes ">
<input  class="form-control" type="text"  id="check_test4" name="amount" />
</div>
</div>


</div>


</div>



</li>

<li><div class="main"><div class="three buttons-s" style="margin-right:50px;padding-top: 12px; "><input type="submit" value="Pay Bill" class="" style="font-weight:15px;width: 150px; height: 35px;font-size: 15px;" /></div></div>
</ul>
</form>
<?php }}?>

</div>
</div><!-- end of menubox-->
<!-- #tab2 -->
<div id="tab3" class="tab_content"><div class="clear20"></div>
<div id="menubox">
<ul>

<form method="post" action="#" id="mobilepostpaidproviderForm" name="form1" class="form-horizontal"  >
        <li>
<div class="main">
  <?php foreach($details as $res){  
        if($res->total_balance=="0"){
        echo "Your balance is very low,so you could not recharge it"; 
        }     else{?>
                <ul style="margin-bottom:40px;">
                <li class="landline"><img class="infos" src="<?php echo base_url()?>/images/telephone.png" width="73"/></li>
                <li class="electricity"><img class="infos1" src="<?php echo base_url()?>/images/electricity.png" width="73"/></li>
                <li class="insurancce"><img class="infos2" src="<?php echo base_url()?>/images/insurance.png" width="73"/></li>
                <li class="gas"><img class="infos3" src="<?php echo base_url()?>/images/gas.png" width="73"/></li>
                <li class="datacard"><img class="infos4" src="<?php echo base_url()?>/images/dths.png" width="73"/></li>
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
    <div class="col-sm-5" style="padding-left: 220px;">
    <a id="customoptions_image_0_0" title="" onClick="return false;" href="#" class="iage">
<img class="img-responsive "  title="" src="../images/prepaid1.png" width="60" id="img_dth_prepaid">

</a>
     <!-- <input type="radio" checked value="prepaid" class=""> <span> Prepaid </span> -->
    </div>
    <div class="col-sm-5" >
    <a id="customoptions_image_0_01" title="" onClick="return false;" href="#"  class="iages">
<img class="small-image-preview1 img-responsive v-middle" title="" src="../images/postpaid1.png"  width="60"  id="img_dth_postpaid">
</a>
    <!--  <input type="radio"  value="postpaid" class=""> <span> Postpaid </span>-->
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
      
    <li><div class="main"><div class="three" style="margin-right:90px; padding-top: 12px;"><input type="submit" value="Pay Now" class="recharge-size" style="font-weight:15px;width: 150px; height: 35px;font-size: 15px;"  /></div></div>
    </ul>
    </form>
<?php }}?>

</div><!-- end of menubox-->
</div><!-- #tab3 -->

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
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>-->


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



