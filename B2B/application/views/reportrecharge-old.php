<div class="container-fluid">
      <!--  <button class="toggle-menu menu-left push-body gradient_btn1">Menu</button>-->
    	<div class="admin-page2">
        
        	<div class="row">
            	<div class="col-xs-12">
                <div class="panel dashboard">
                <div class="panel-body">
                	<div class="form-group">
                    	<?php $type=$this->session->userdata('type');
						if($type === "admin" || $type === "distributor" ||$type === "retailer"  ){?>
                    	<a href="<?php echo site_url('report') ?>" class="btn btn-primary">Recharge Hristory</a>
                        
                        <?php }if($this->session->userdata('type')=="admin"){?> 
                        <a href="<?php echo site_url('sendmoneyreport/sendmoney_admin') ?>" class="btn btn-primary">Send Money Report</a>
                        <?php } ?>
                        
                        <?php if($this->session->userdata('type')=="distributor"){?> 
                        <a href="<?php echo site_url('sendmoneyreport/sendmoney_dist') ?>" class="btn btn-primary">Send Money Report</a>
                        <?php } ?>
                        
                        
                        <?php if($this->session->userdata('type')=="retailer"){?>
                        <a href="<?php echo site_url('sendmoneyreport/sendmoney_fran') ?>" class="btn btn-primary">Send Money Report</a>
                        <?php } ?>
                        
                        <?php if($this->session->userdata('type')=="admin"){?>
                       <a href="<?php echo site_url('cardgeneration/card_details_admin') ?>" class="btn btn-primary">Card Generation</a>
                        <?php }?>
                        
                        <?php if($this->session->userdata('type')=="distributor"){?>
                        <a href="<?php echo site_url('cardgeneration/card_details_dist') ?>" class="btn btn-primary">Card Generation</a>
                        <?php }?>
                        
                        <?php if($this->session->userdata('type')=="admin"){?>
                        <a href="<?php echo site_url('reports/daily_sales_report') ?>" class="btn btn-primary">Daily Sales Report</a>
                        <a href="<?php echo site_url('reports/retailer_sales_report') ?>" class="btn btn-primary">Retailer Report</a>
                        
                        <?php } if($this->session->userdata('type')=="distributor"){ ?>
                        <a href="<?php echo site_url('reports/daily_sales_report') ?>" class="btn btn-primary">Daily Sales Report</a>
                        
                        <?php } if($this->session->userdata('type')=="retailer"){ ?>
                        <a href="<?php echo site_url('reports/daily_sales_report') ?>" class="btn btn-primary">Daily Sales Report</a> 
                        
                       
                         
                         <?php }if($type === "admin" ){ ?>
                        <a href="<?php echo site_url('reports/get_operator_report') ?>" class="btn btn-primary">Operator Report</a>
                        <?php } ?>
                    </div>
               
                <!-- col-xs-12 ends-->
                    <div class="mobile-1">
                        <p>Recharge Hristory</p>
                    </div>
                    
                    <div class="col-xs-12 table-responsive">
                          <table class="table air-table1 air-table2" id="dataTables-example">
                            <thead>
                            <tr class="table-title">
                                <th scope="col">Sno</th>                                
                    <th scope="col">Number</th>
					<th scope="col">Recharge Date</th>
                    <th scope="col">Amount</th>
                     <th scope="col">Operator</th>
                    <th scope="col">After Balance</th> 
                    <th scope="col">Before Balance</th>
               <?php if( $this->session->userdata('type')=='distributor' ||  $this->session->userdata('type')=='admin'  ){ ?>
                    <th width="10%" scope="col">Dis. Commission</th>
                   <?php } ?>
                    <th scope="col" >Ret. Commission</th>
                    
                    <th scope="col">Txn id</th>	
                    <th scope="col">Status</th>
                  <!-- <?php if($this->session->userdata('type')=='retailer'){ ?>
                    <th width="10%" scope="col">Refund</th>
                   <?php } ?> 
                     <th width="10%" scope="col">Ticket</th>-->
                            </tr>
                            </thead>
                            <tbody class="fillgrid">
           </tbody>
                          </table>
                    </div>
                    <!-- table ends-->
                
                 <!-- service pre-paid ends-->
           </div>
                    </div>
                </div>
                <!-- col-xs-12 ends-->
               
                 <!-- service pre-paid ends-->
             
            </div>
            <!-- row ends-->
        </div>
        <!-- admin-page1 ends -->
    </div>
    
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
$(document).ready(function() {
	 $('#table').dataTable({
    });
	 });
	</script>
<script>
$(document).ready(function (){
    //fill data
	var btnticket='';
	var btnprocess='';
	var btnsolve='';
   // var btnedit='';
	//var test='';
   // var btndelete = '';
	//var lock__funds='';
	//var release_fund='';
        fillgrid();
       
    function fillgrid(){
        $("#loader").show();
        $.ajax({
            url:'<?php echo base_url() ?>report/fillgrid',
            type:'GET'
        }).done(function (data){
            $(".fillgrid").html(data);
            $(".loader").hide();
			btnticket = $(".fillgrid .btnticket");
			btnprocess = $(".fillgrid .btnprocess");
			btnsolve = $(".fillgrid .btnsolve");
           // btnedit = $(".fillgrid .btnedit");
           // btndelete = $(".fillgrid .btndelete");
			//test = $(".fillgrid .test");
			//release_fund = $(".fillgrid .release_fund");
			//lock__funds = $(".fillgrid .lock__funds");
			
          //  var deleteurl = btndelete.attr('href');
          //  var editurl = btnedit.attr('href');
			//var fundurl = test.attr('href');
		//	var fundurl = test.attr('href');
         //  var fundurl = release_fund.attr('href');
		  // var fundurl = lock__funds.attr('href');
            
			  var ticketurl = btnticket.attr('href');
			  var processurl = btnprocess.attr('href');
			  var solveurl = btnsolve.attr('href');
            //edit record
            
			
			 btnprocess.on('click', function (e){
                e.preventDefault();
                var processid = $(this).data('id');
                $.colorbox({
                href:"<?php echo base_url()?>report/process/"+processid,
                top:50,
                width:500,
                onClosed:function() {fillgrid();}
                });
            });
			 btnticket.on('click', function (e){
                e.preventDefault();
                var ticketid = $(this).data('id');
                $.colorbox({
                href:"<?php echo base_url()?>report/ticket/"+ticketid,
                top:50,
                width:500,
                onClosed:function() {fillgrid();}
                });
            });
			
			
			btnsolve.on('click', function (e){
                e.preventDefault();
                var solveid = $(this).data('id');
                $.colorbox({
                href:"<?php echo base_url()?>report/solve/"+solveid,
                top:50,
                width:500,
                onClosed:function() {fillgrid();}
                });
            });
			
			
        });
    }
    
});
</script>
