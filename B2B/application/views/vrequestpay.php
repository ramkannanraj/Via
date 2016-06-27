<?php $this->load->view('common/header');?>
<?php $this->load->view('common/menu');?>

<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/jquery-ui.css"/>
<script src="<?php echo base_url(); ?>/assets/js/jquery-1.10.2.js"></script>
  <script src="<?php echo base_url(); ?>/assets/js/jquery-ui.js"></script>
   <script src="<?php echo base_url(); ?>/assets/js/jquery.dataTables.min.js"></script>
   
   
<div class="container-fluid">
      <!--  <button class="toggle-menu menu-left push-body gradient_btn1">Menu</button>-->
    	<div class="admin-page2">
        
        	<div class="row">
            	<div class="col-xs-12">
                <div class="panel dashboard">
                <div class="panel-body">
                	<div class="form-group">
                      <a href="<?php echo site_url('payment/viewrequestpaymentdetail') ?>" class="btn btn-default">View Request</a>
                      <a href="<?php echo site_url('paymentreversal/viewreversalpaymentdetail') ?>" class="btn btn-warning">View Reversal</a>
                        
                   </div>
                    
                      <div class=" mobile-1">
                        <p>Request Payment</p>
                    </div>
                    <div class="col-xs-12 table-responsive">
                          <table class="table air-table1 air-table2" id="dataTables-example">
                            <thead>
                            <tr class="table-title">
                               <th scope="col">Name</th>
                    <th scope="col">Payment Mode</th>               
                    <th scope="col">Amount</th>
                    <th scope="col">Deposited/Transfered Date</th>
                     <th scope="col">Bank</th>
                    <th scope="col">Branch</th>               
                    <th> Action</th>
                            </tr>
                            </thead>
                                <tbody class="fillgrid">
            
            </tbody>
                          </table>
                    </div>
                   
                   </div>
                   </div>
                   
                </div>
<script>
$(document).ready(function() {
	 $('#operator_det').on('submit', function(e){
		var date=$('#operator_date').val();
		if(date =='')
		{
			alert('Please Choose date');
		}
	});
    });
</script>
<script>
  $(function() {
    $( "#operator_date").datepicker({ dateFormat: 'yy-mm-dd',changeMonth: true, changeYear: true });
  });
  </script>                
                <!-- col-xs-12 ends-->
                
                 <!-- service pre-paid ends-->
             
            </div>
            <!-- row ends-->
        </div>
        <!-- admin-page1 ends -->
    </div>
    <?php $this->load->view('common/footer');?>
    
    <!-- RESP MENU STARTS -->
<!--load jPushMenu, required-->
     
<!-- RESP MENU ENDS -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
    
    <script>
$(document).ready(function (){
    //fill data
    var btntransfer='';
	
        fillgrid();
       
    function fillgrid(){
        $("#loader").show();
        $.ajax({
            url:'<?php echo base_url() ?>payment/fillgrid',
            type:'GET'
        }).done(function (data){
            $(".fillgrid").html(data);
            $(".loader").hide();
            btntransfer = $(".fillgrid .btntransfer");
           
            var transferurl = btntransfer.attr('href');
			
            
            //edit record
            btntransfer.on('click', function (e){
                e.preventDefault();
                var transferid = $(this).data('id');
                $.colorbox({
                href:"<?php echo base_url()?>payment/transfer/"+transferid,
                top:50,
                width:500,
                onClosed:function() {fillgrid();}
                });
            });
			
        });
    }
});
</script>