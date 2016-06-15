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
                       <a href="#" class="btn btn-primary">Outgoing</a>
                        
                    </div>
                    <div class="mobile-1">
                        <p>Outgoing Details</p>
                    </div>
                    
                    
                     <form action="<?=site_url('sms/get_outgoing_details')?>" method="post" name="transfer_det" id="transfer_det" class="form-inline pull-right">
                     	<div class="form-group">
                       	  <label>From date</label><input class="form-control" placeholder="From date"  type="text" id="report_from_date" name="from_date" value="" />
                          </div>
                          <div class="form-group">
                       	  <label>To date</label><input type="text" value="" placeholder="To date"   id="report_to_date" name="to_date" class="form-control">
                          </div>
                            <div class="form-group">
                          <input type="submit" value="Submit" class="btn btn-default">
                          <?php //if(!empty($_REQUEST['from_date']) || !empty($_REQUEST['to_date']) ){ ?>
                                    <?php //} ?>
                               </div>     
                        
                        </form>
                    <div class="clearfix"></div>
                     
                     <div class="col-xs-12 table-responsive">
                    <?php if($this->session->userdata('type')=='admin' || $this->session->userdata('type')=='super')	{  ?>
                          <table class="table air-table1 air-table2" id="dataTables-example">
                            <thead>
                            <tr class="table-title">
                                <th>Sno</th>
                                <th>Date</th>
                                <th>Agent Mobile</th>
                                <th>Type</th>
                                <th>Message</th>
                            </tr>
                            </thead>
                            
                              <?php $i=1; foreach($results as $outgoing_details){ ?>
                              <tr>
                 <?php
        $date= $outgoing_details->date;
        $fdate=date('d M Y h:i:s A',strtotime($date));  
        ?>
          <td><?php echo $i;?></td>
             <td><?php echo $fdate;?></td>
         <td><?php echo $outgoing_details->agentmob;?></td>
 <td><?php echo $outgoing_details->type;?></td>
          <td><?php echo $outgoing_details->msg;?></td>
      </tr>    
     <?php $i++;} ?>  
                          </table>
                    </div>
                    
                    
                    <?php	}	if($this->session->userdata('type')=='distributor')	{	?>

<table class="table air-table1 air-table2" id="dataTables1-example">
    <thead>
        <tr>
            <th >Sl.No</th>
            <th >DATE</th>
            <th  >AGENT MOBILE</th>
 			<th>TYPE</th>
            <th >MESSAGE</th>
        </tr>
    </thead>
    <tbody>
          <?php	$i=1;	 foreach($results as $outgoing_details_distributors){	 ?>
     <tr>
          <td><?php echo $i;?></td>
           <td><?php echo $outgoing_details_distributors->date;?></td>
         <td><?php echo $outgoing_details_distributors->agentmob;?></td>
 <td><?php echo $outgoing_details_distributors->type;?></td>
          <td><?php echo $outgoing_details_distributors->msg;?></td>
      </tr>    
     <?php $i++;}	 ?>  
    </tbody>
</table>   
<?php }	?>  
                     
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
	$('#example').dataTable({
    });
	
	 $('#transfer_det').on('submit', function(e){
		var from_date=$('#report_from_date').val();
		var to_date= $('#report_to_date').val();
		if(from_date =='')
		{
			alert('Please Choose date');
		}
		
	});
    
});
</script>
<script>
  $(function() {
    $( "#report_from_date").datepicker({ dateFormat: 'yy-mm-dd',changeMonth: true, changeYear: true ,yearRange: "2015:2075"});
	 $( "#report_to_date").datepicker({ dateFormat: 'yy-mm-dd',changeMonth: true, changeYear: true ,yearRange: "2015:2075" });
	 
  });
  </script>

<script>
$(document).ready(function() {
	$('#outgoing_details, #outgoing_details_distributors').dataTable({
    });
    });
</script>