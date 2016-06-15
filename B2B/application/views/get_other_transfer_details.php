<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/jquery-ui.css"/>

<script src="<?php echo base_url(); ?>/assets/js/jquery-1.10.2.js"></script>
  <script src="<?php echo base_url(); ?>/assets/js/jquery-ui.js"></script>
   <script src="<?php echo base_url(); ?>/assets/js/jquery.dataTables.min.js"></script>
   
   
   <div class="container-fluid">
       
    	<div class="admin-page2">
        	<div class="row">
            	<div class="col-xs-12">
                	<div class="panel dashboard">
                    	<div class="panel-body">
                	<div class="form-group">
                    <?php $type=$this->session->userdata('type');
					 if($type === "admin" || $type === "distributor" || $type === "retailer"){ ?>
                       <a href="<?php echo site_url('transfer/get_transfer_details') ?>" class="btn btn-primary">View Transfer</a><?php } ?>
                        
                        <?php if($type === "admin" ){?>
                        <a href="<?php echo site_url('transfer/other_transfer') ?>" class="btn btn-primary active">View Other Transfer</a><?php } ?>
                        
                        <?php if($type === "super" ){?>
                        <a href="<?php echo site_url('transfer/get_transfer_details') ?>" class="btn btn-primary">View Transfer</a><?php } ?>
                    </div>
                    
                    
                     <div class="mobile-1">
                        <p>Transfer other Detail</p>
                    </div>
                     <form action="<?=site_url('transfer/other_transfer')?>" method="post" id="other_transfer_det">
                     
                     
  <div class="form-group col-lg-2">
         
          <input placeholder="From date"  type="text" id="report_from_date" name="from_date" value="" class="form-control"/> 
          </div>
          <div class="form-group col-lg-2">
        
          <input placeholder="To date" readonly type="text" id="report_to_date" name="to_date" value="" class="form-control"/>
                     </div>
          <div class="form-group col-lg-1">
                                    <input class="btn btn-primary form-control" type="submit" value="Submit" >
                                    <?php //if(!empty($_REQUEST['from_date']) || !empty($_REQUEST['to_date']) ){ ?>
                                    <?php //} ?>
                                  
                                    </div>
                                </form>
                         <?php if($this->session->userdata('type')=='admin' || $this->session->userdata('type')=='distributor' || $this->session->userdata('type')=='super' ){ ?> 
                         <div class="col-lg-12 table-responsive">
                          <table class="table air-table1 air-table2" id="dataTables-example">
                            <thead>
                            <tr class="table-title">
                               <th scope="col">Date</th>
            <th scope="col">Transaction Type</th>
            <th scope="col">Comment</th>
            <th scope="col">Credit</th>
            <th scope="col">Debit</th>
            <th scope="col">Balance</th>
            <th scope="col">Type</th>
            <th scope="col">Mobile number</th>
                            </tr>
                            </thead>
                                <tbody>
        
          <?php foreach($results as $post){ ?>
     <tr>
         <?php
        $date= $post->date_part;
        $fdate=date('d M Y',strtotime($date));          ?>
          <td><?php echo $fdate;?></td>
           <td><?php echo $post->leg_typ;?></td>
         <td><?php echo $post->comment;?></td>
          <td><?php echo $post->credit;?></td>
          <td><?php echo $post->debit;?></td>
         <td><?php echo $post->balance;?></td>
         <td><?php echo $post->type;?></td>
           <td><?php echo $post->mobile;?></td>
      </tr>    
     <?php } ?>  
    </tbody>
                          </table>
                    </div>
                           <?php	}	if($this->session->userdata('type')=='retailer')	{	?>    
                    <div class="col-lg-12 table-responsive">
                          <table class="table air-table1 air-table2" id="dataTables-example">
                            <thead>
                            <tr class="table-title">
                               <th scope="col">Date</th>
            <th scope="col">Transaction Type</th>
            <th scope="col">Comment</th>
            <th scope="col">Credit</th>
            <th scope="col">Debit</th>
            <th scope="col">Balance</th>
            <th scope="col">Type</th>
            <th scope="col">Mobile number</th>
                            </tr>
                            </thead>
                                <tbody>
        
          <?php foreach($results as $post){ ?>
     <tr>
         <?php
        $date= $post->date_part;
        $fdate=date('d M Y',strtotime($date));          ?>
          <td><?php echo $fdate;?></td>
           <td><?php echo $post->leg_typ;?></td>
         <td><?php echo $post->comment;?></td>
          <td><?php echo $post->credit;?></td>
          <td><?php echo $post->debit;?></td>
         <td><?php echo $post->balance;?></td>
         <td><?php echo $post->type;?></td>
           <td><?php echo $post->mobile;?></td>
      </tr>    
     <?php } ?>  
    </tbody>
                          </table>
                    </div>
                     <?php	}	?>
                    </div>
                    </div>
                </div>
<script>
$(document).ready(function() {
	$('#example').dataTable({
    });
	
	$('#other_transfer_det').on('submit', function(e){
		var from_date=$('#report_from_date').val();
		var to_date= $('#report_to_date').val();
		if(from_date =='' || to_date =='')
		{
			alert('Please Choose date');
		}
	});
});
</script>
<script>
  $(function() {
    $( "#report_from_date").datepicker({ dateFormat: 'yy-mm-dd',changeMonth: true, changeYear: true ,yearRange: "2015:2075" });
	 $( "#report_to_date").datepicker({ dateFormat: 'yy-mm-dd',changeMonth: true, changeYear: true ,yearRange: "2015:2075"});
	 
  });
  </script>                
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

 <script src="<?php echo base_url()?>/bower_components/metisMenu/dist/metisMenu.min.js"></script>
 <script src="<?php echo base_url()?>/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
 <script src="<?php echo base_url()?>/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
  
<script>
$(document).ready(function() {
$('#dataTables-example').DataTable({
responsive: true
});
});
</script>
     	  