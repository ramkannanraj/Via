<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/jquery-ui.css"/>

<script src="<?php echo base_url(); ?>/assets/js/jquery-1.10.2.js"></script>
  <script src="<?php echo base_url(); ?>/assets/js/jquery-ui.js"></script>
   <script src="<?php echo base_url(); ?>/assets/js/jquery.dataTables.min.js"></script>
   
   
   <div class="container-fluid">
        
    	<div class="admin-page2">
        	<div class="row">
            	<div class="panel dashboard">
                	<div class="panel-body">
            	<div class="col-xs-12">
                	<div class="form-group">
                     <?php
					 		$this->load->view("report_menu");
					 
					  ?>
                    </div>
                    
                    <div class="mobile-1">
                        <p>Retailer Reports</p>
                    </div>
                    <form class="form-inline" action="<?=site_url('reports/operator_report')?>" method="post" name="operator_det" id="operator_det">
 <div class="smallformoperatorreports">
 <input placeholder="Date"  type="text" id="operator_date" name="operator_date" value="" class="oddfields form-control" style="width:200px;"/> 
 		<label>   Operator </label>   <select name="operator" id="operator"  >
    	 <?php $i=1; foreach($mobileproviders as $operator){//ezypay_prcode ?> 
         <option value=""></option>
         <option value="<?php  echo $operator->name; //ezypay_prcode; ?>"> <?php  echo $operator->name; ?></option>
         <?php } ?> 
    </select>

	<input type="submit" id="showLoader"   value="Go" class="btn btn-small btn-info" style="font-weight:15px;width: 120px; height: 35px;font-size: 15px;"/>
    
    
	</div>
	</form>
                    <div class="table-responsive">
                          <table class="table air-table1 air-table2" id="dataTables-example">
                        <thead>
                          <tr class="table-title">
                            <th>Sl.No</th>
                            <th>Operator</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Distributor Commission</th>
                            <th>Retailer Commission</th>
                          </tr>
                        </thead>
                                <tbody>
          <?php $i=1; foreach($results as $report_details_distributors){ ?>
     <tr>

<?php
        $date= $report_details_distributors->rdate;
        $fdate=date('d M Y',strtotime($date));  
        ?>
         <td><?php echo $i;?></td>
          <td><?php echo $report_details_distributors->service;?></td>
          <td><?php echo $fdate;?></td>
           <td><?php echo $report_details_distributors->total; ?></td>
         <td><?php echo round($report_details_distributors->dcommi,2);?></td>
         <td><?php echo round($report_details_distributors->commi,2);?></td>
      </tr>    
     <?php 	$i++; }?>
    </tbody>
                          </table>
                    </div>
                    
                    
                </div>
<script>
$(document).ready(function() {
/*	 $('#operator_det').on('submit', function(e){
		var date=$('#operator_date').val();
		if(date =='')
		{
			alert('Please Choose date');
		}
	});
	*/
    });
</script>
<script>
  $(function() {
    $( "#operator_date").datepicker({ dateFormat: 'yy-mm-dd',changeMonth: true, changeYear: true });
  });
  </script>         
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
 