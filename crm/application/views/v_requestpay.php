<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Via Paise</title>
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

<style>
td
{
	padding: 15px 5px 5px 15px;

	
}
@media (min-width: 240px) and (max-width: 3200px) {
	.widget .widget-body {
	border-bottom: 1px solid #b3b3b3;
    border-radius: 0 0 2px 2px;
    height: auto;
    padding: 15px;
	}
	}
</style>
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
                    <div class="title">Request Payment</div></div>
                    <div class="widget-body">
                    <div class="metro-nav">
<form action="<?php echo site_url('payment/paymentregister')?>" method="post">

<table class="text-box">
<tr><td>Payment Mode</td><td><select name="mode" class="form-control">
<option value="cash deposit">Cash Deposit</option>
<option value="fund transfer">Fund Transfer</option>
<option value="RTGS">RTGS</option>
<option value="NEFT">NEFT</option>
<option value="cheque deposit">Cheque Deposit</option>
<option value="IMPS">IMPS</option>
</select></td></tr>
<tr><td>Amount</td><td><input type="text" name="amt" required="required" onkeypress="return isNumber(event)" class="form-control"/></td></tr>
<tr><td>Deposited/Trasfered Date</td><td><input class="datepicker form-control" type="text" name="tdate"  /></td></tr>
<tr><td>Bank</td><td><input type="text" name="bank" required="required"  class="form-control" /></td></tr>
<tr><td>Branch</td><td><input type="text" name="branch" required="required" class="form-control" /></td></tr>
<tr><td>Our Bank Details</td><td><select name="bankdetail" class="form-control">
<option value="Axis Bank">Axis Bank</option>
 <option value="Federal Bank">Federal Bank</option>
 <option value="HDFC Bank">HDFC Bank</option>
 <option value="ICICI Bank">ICICI Bank</option>
 <option value="Kodak Mahindra Bank">Kodak Mahindra Bank</option>
 </select></td></tr>
 <tr><td>Remarks</td><td><textarea name="remark" required="required" class="form-control"></textarea></td></tr>
 <tr><td>Requested By</td><td><input type="text" name="reid" value="<?php echo $this->session->userdata('name');?>" readonly="readonly"  class="form-control"/></td></tr>
<tr><td>Requested To</td><td><input type="text" class="form-control" name="request_to" value="<?php foreach ($records->result() as $row) {
 echo $row->name; }?>" readonly="readonly" /></td></tr>
 <input type="hidden" name="userid" value="<?php echo $this->session->userdata('uid');?>" />
  <input type="hidden" name="toid" value="<?php echo $this->session->userdata('parent_id');?>" />
 <tr><td></td><td class="button"><input type="submit" name="sub" value="Submit" class="btn btn-info btn-small" /></td></tr>
</table>
</form>
</div>
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
	<?php $this->load->view('common/footer');?>
</body>
</html>