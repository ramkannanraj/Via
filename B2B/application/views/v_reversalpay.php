<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Paybuks Mobile money</title>
		</head>
		<body>
		<?php $this->load->view('common/header');?>
<?php $this->load->view('common/menu');?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="<?php echo base_url()?>/assets/js/date.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
$(function() {
$( ".datepicker" ).datepicker();
});
</script>
	<body class="">

<style>
.container
{
margin-right:173px;
}

ul

{

    list-style-type: none;

}

ul.tabs li.active {

    background: #fff none repeat scroll 0 0;

    border-bottom: 1px solid #cfcfcf;

    

}

ul.tabs li {

    -moz-border-bottom-colors: none;

    -moz-border-left-colors: none;

    -moz-border-right-colors: none;

    -moz-border-top-colors: none;

    /*background: #eee none repeat scroll 0 0;*/

    border-color: #cfcfcf #cfcfcf #cfcfcf -moz-use-text-color;

    border-image: none;

    border-style: solid solid solid none;

    border-width: 1px 1px 1px medium;

   

    cursor: pointer;

    float: left;

    font-family: Arial;

    font-size: 13px;

    font-weight: 600;

    height: 40px;

    letter-spacing: 1px;

    line-height: 31px;

    margin: 0;

    overflow: hidden;

    padding: 4px 12.6px;

    position: relative;
	width:50%;

}

li {

    list-style: outside none none;

	margin-left:20px;

}

li {

    line-height: 20px;

	padding: 7px;

}

#container {

    margin: 0px auto 0;

   /* width: 820px;*/

}

ul.tabs {

    border-bottom: 1px solid #cfcfcf;

    border-left: 1px solid #cfcfcf;

    float: left;

    height: 40px;

    list-style: outside none none;

    margin: 0;

    padding: 0;

    width: 100%;

}

#data tr td 

{

	padding: 15px 5px 5px 15px;

	  





}

#data

{

	  margin-top: 10px;

}



</style>

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

<div>

	<div class="main-container container-fluid">

			            <a class="menu-toggler" id="menu-toggler" href="#">

				<span class="menu-text"></span>

			</a>

            

            

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

                    <div class="title">Reversal Request</div></div>
				<div class="page-content">
					<div class="row-fluid">

						<div class="span12">

							<!--PAGE CONTENT BEGINS-->

								<div id="container">

          <ul class="tabs">

            <li rel="tab1" class="active">Top Up Reversal</li>

            <li rel="amount_reversal">Amount Reversal</li>

        </ul>

        <div class="tab_container user_profile" style="-moz-border-bottom-colors: none; -moz-border-left-colors: none; -moz-border-right-colors: none; -moz-border-top-colors: none; background: #fff none repeat scroll 0 0; border-color: -moz-use-text-color #cfcfcf; border:1px solid #cfcfcf;
 border-image: none; border-style: none solid solid; border-width: medium 1px 1px; clear: both; float: left; min-height: 320px; width: 99.9%;">

        <div class="space-6"></div>

            <div id="tab1" class="tab_content">

                <div class="clear20"></div>

                <div id="menubox">

                    <form action="<?=site_url('paymentreversal/reversaltopregister')?>" method="post" id="topup_reversal" name="topup_reversal" enctype="multipart/form-data">

                    

                        <table id="data" class="text-box">

                            

                            <tr><td>Operator<span class="mandatory"></span></td><td> <select name="operator" id="operator" class="dropdown form-control" >

                            		        <option value="" selected="">--Select--</option>

                            				<option value="Airtel DTH">Airtel DTH</option>

                            				<option value="Videocon">D2h</option>

                            				<option value="Big TV">Big TV</option>

                            				<option value="Dish TV">Dish TV</option>

                            				<option value="Videocon">TataSky DTH</option>

                                        </select></td></tr>

                                

                           

                            <tr><td>User Name<span class="mandatory"></span></td><td><input type="text" class="trns form-control" id="distributor_code" name="distributor_code" required value='<?php echo $this->session->userdata('username'); ?>' readonly  ></td></tr>

                            

                           

                            <tr><td>Name<span class="mandatory"></span></td><td>

                                  <input type="text" class="trns form-control" id="distributor_name" name="distributor_name" required value='<?php echo $this->session->userdata('name'); ?>' readonly ></td></tr>

                            <tr><td>Email <span class="mandatory"></span></td><td>

                                 <input type="email" class="trns form-control" id="distributor_email" name="distributor_email" required></td></td></tr>

                            <tr><td>Mobile Number<span class="mandatory"></span> </td><td>

                                <input type="text" class="trns form-control" id="distributor_number" name="distributor_number"  maxlength="10" onKeyPress="return isNumber(event)" required>

                              </td>

                            

                            <tr><td>Smartcard Number<span class="mandatory"></span></td><td>

                                <input type="text" class="trns form-control" id="smartcard_number" name="smartcard_number" required>

                                

                          </td></tr>

                            <li id="dish_vc_no" style="display:none"><div class="main"><div class="one">New VC No.</div>

                                 <div class="two"><input type="text" class="trns form-control" id="smartcard_vc_no" name="smartcard_vc_no" ></div>

                              </div>

                            </li>

                            <tr><td>Transaction Amount<span class="mandatory"></span></td><td>

                               <input type="text" class="trns form-control" id="transaction_amount" name="transaction_amount"  onKeyPress="return isNumber(event)" required></td></tr>

                            <tr><td>Transaction Date<span class="mandatory"></span></td><td>

                                 <input type="text" class="datepicker form-control" readonly id="transaction_date" name="transaction_date" required></td></tr>

                              

                            

                            <tr><td>Transaction Number<span class="mandatory"></span></td><td>

                                 <input type="text" class="trns form-control" id="transaction_number" name="transaction_number" required></td></tr>
								 <tr><td>Requested To</td><td><input type="text" name="sendid" value="<?php foreach ($records->result() as $row) {
 echo $row->name; }?>" readonly="readonly" /></td></tr>

                             <tr><td></td><td  class="five"><input type="submit" onClick="javascript: validate_topup_reversal()" value="Submit" class="btn btn-warning btn-small"></td></tr>



                             

                              <div style="display:none" id="loading"><img src="images/ajax-loader.gif"></div>

                           

                        </table>

                        <input type="hidden" value="1" name="type" id="type" />

                        <input type="hidden" name="request_id" value="<?php echo $this->session->userdata('uid');?>">

                        <input type="hidden" value="1642b874ccec10c4a45aad51bce4c7b9" name="token" id="token" />

                    </form>

                </div><!-- end of menubox-->

                <div class="clear"></div>

            </div><!-- #tab1 -->

                        <!-- For Amount Reversal Tab -->

            <div id="amount_reversal" class="tab_content" >

                <div class="clear20"></div>

                <div id="menubox">

                    <form action="<?=site_url('paymentreversal/reversalamtregister')?>" method="post" id="amount_reversal_request" name="amount_reversal_request" enctype="multipart/form-data">

                        <table id="data" class="text-box">

                         <tr><td>User Name<span class="mandatory"></span></td><td>

                                 <input type="text" class="trns form-control" id="amount_distributor_code" name="amount_distributor_code" value='<?php echo $this->session->userdata('username'); ?>' readonly required></td></tr>

                            <tr><td>Name<span class="mandatory"></span></td><td>

                                 <input type="text" class="trns form-control" id="amount_distributor_name" name="amount_distributor_name" required value='<?php echo $this->session->userdata('name'); ?>' readonly></td></tr>

                             <tr><td>Email<span class="mandatory"></span></td><td>

                                 <input type="email" class="trns form-control" id="amount_distributor_email" name="amount_distributor_email" required></td>

                                 </tr>

                            

                             <tr><td>Mobile Number<span class="mandatory"></span></td><td><input type="text" class="trns form-control" id="amount_distributor_number" name="amount_distributor_number" maxlength='10'  onKeyPress="return isNumber(event)" required></td></tr>

                               <tr><td>

                            Transaction Amount<span class="mandatory"></span></td><td>

                                 <input type="text" class="trns form-control" id="amount_transaction_amount" name="amount_transaction_amount"  onKeyPress="return isNumber(event)" required></td></tr>

                            

                           <tr><td>Transaction Date<span class="mandatory"></span></td><td>

                                <input type="text" class="datepicker form-control" id="amount_transaction_date" name="amount_transaction_date" required></td></tr>

                            <tr><td>Remarks<span class="mandatory"></span></td><td>

                                    <textarea name="amount_reversal_remarks" rows="3" id="amount_reversal_remarks" class=" form-control" required></textarea>

                                </td></tr>
								<tr><td>Requested To</td><td><input type="text" name="sendid" readonly value="<?php foreach ($records->result() as $row) {
 echo $row->name; }?>"  /></td></tr>

                            <tr><td></td><td class="five" ><input type="submit" onClick="javascript: validate_amount_reversal()" value="Submit" class="btn btn-warning btn-small" ></td></tr>

                              <div style="display:none" id="amount_loading"><img src="images/ajax-loader.gif"></div>

                           </table>

                        <input type="hidden" name="request_id" value="<?php echo $this->session->userdata('uid');?>">

                        <input type="hidden" value="2" name="type" id="type" />

                        <input type="hidden" value="1642b874ccec10c4a45aad51bce4c7b9" name="token" id="token" />

                    </form>

                </div><!-- end of menubox-->

                <div class="clear"></div>

            </div>

                        <div class="clear"></div>



    </div> 

    </div>

					

						</div>

					</div>

				</div>

			

        

        

        </div>

          <!-- Right Sidebar End -->

        </div>

        <!-- Dashboard Wrapper End -->



        



      </div>

    </div>

</div></div></div></div>

		<script src="assets/js/ace-elements.min.js"></script>

        <script src="assets/js/ace.min.js"></script>

        

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

   

</script>


			

				<!--inline scripts related to this page-->
<?php $this->load->view('common/footer');?>
	</body>

</html>

