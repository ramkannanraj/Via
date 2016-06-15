 

 
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
$(function() {
$( ".datepicker" ).datepicker();
});
</script>
<script>
function show()
{
document.getElementById('show_form').style.display="block" ;
}
</script>


	<div class="container-fluid">
    	<div class="admin-page2"> 
        	<div class="row">
            	<div class="col-lg-12">
            		<div class="panel dashboard">
                    	<div class="panel-body">
	                    	<div class="form-group">
                            	
                                <a href='<?=site_url('sendmoney/card_top')?>' class="btn btn-primary">Card Topup</a>
                                <a href='<?= site_url('beneficiary/view')?>'    class="btn btn-primary">View Beneficary / Send Money</a>
                                <a href='<?=site_url('beneficiary/add_beneficiary_details')?>'  class="btn btn-primary">Add Beneficary</a> 
                                
                                <a href='<?=site_url('beneficiary/view_balance')?>'   class="btn btn-primary">View Balance</a> 
                                <a href='<?=site_url('beneficiary/transaction_history')?>'  class="btn btn-primary">Transaction History</a> 
                                <a href='<?=site_url('beneficiary/logout')?>'  class="btn btn-primary">Logout</a> 

                            </div> 
                         </div>
                    </div>
               