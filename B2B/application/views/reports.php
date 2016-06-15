<div class="container-fluid">
      <!--  <button class="toggle-menu menu-left push-body gradient_btn1">Menu</button>-->
    	<div class="admin-page2">
        
        	<div class="row">
            	<div class="col-xs-12">
                <div class="panel dashboard">
                <div class="panel-body">
                	<div class="form-group"> <?php
					 		$this->load->view("report_menu"); 
					  ?>
                    </div>
                    
                     <div class=" mobile-1">
                        <p>Daily Sales Reports</p>
                    </div>
                    <form class="form-inline" action="<?=site_url('reports/daily_report')?>" method="post" name="operator_det" id="operator_det">
 <div class="smallformoperatorreports">
  <?php  if($this->session->userdata('type')=="admin"){ ?>
 		<label>   Distributor </label>  
         <select name="distributor" id="distributor"  >
         <option value="">Select Distributor</option>
    	 <?php $i=1; foreach($distributors as $distributor){//ezypay_prcode ?> 
        
         <option value="<?php  echo $distributor->uid; //ezypay_prcode; ?>"> <?php  echo $distributor->name; ?></option>
         <?php } ?> 
    </select>
    
    <?php } ?>
    
     <?php  if($this->session->userdata('type')=="admin"  || $this->session->userdata('type')=="distributor" ){  ?>
    
    <label>   Retailer </label>  
         <select name="retailer" id="retailer"  >
         <option value="">Select Retailer</option>
    	 <?php  foreach($retailers as $retailer){//ezypay_prcode ?> 
         <option value="<?php  echo $retailer->uid; //ezypay_prcode; ?>"> <?php  echo $retailer->name; ?></option>
         <?php } ?> 
    </select>
    
    

	<input type="submit" id="showLoader"   value="Go" class="btn btn-small btn-info" style="font-weight:15px;width: 120px; height: 35px;font-size: 15px;"/>
    
    <?php } ?>
	</div>
	</form>
                    <?php  if($this->session->userdata('type')=="admin"){ 	?>
                    <div class="col-xs-12 table-responsive">
                          <table class="table air-table1 air-table2" id="dataTables-example">
                            <thead>
                            <tr class="table-title">
                             <th style="width:25px;">Sl.No</th>
                                <th style="width:270px;">Date</th>
                                <th style="width:268px;">Mobile No</th>
                                <th style="width:45px;">Type</th>
                                <th style="width:79px;">operator</th>
                                <th style="width:40px;">Amount</th>
                                <th style="width:77px;">DIS Commission</th>
                                <th style="width:67px;">RET Commission</th> 
                            </tr>
                            </thead>
                            <tbody>
          <?php 	$i=1;
	 foreach($results as $admin_report_details){ ?>
     <tr>

      <?php
        $date= $admin_report_details->rdate; 
		$date_in=date('d-M-Y H:i:s',strtotime($date));  
	  try {
		
	   //   $date_in =date ('d-M-Y H:i:s',strtotime('2016-02-28 05:22:39'));
		   
		
			$date = new DateTime( $date_in , new DateTimeZone('US/Eastern'));
			$date->setTimezone(new DateTimeZone('Asia/Kolkata'));
		   $date1 = $date->format('d-M-Y H:i:s');
		} catch (Exception $e) {
		   // echo $e->getMessage();
			$date1 =date ("d-M-Y H:i:s",strtotime($date));
		}  
        ?>
          <td><?php echo $i;?></td>
          <td><?php echo $date1;?></td>
 <td><?php echo $admin_report_details->mobilenumber; ?></td>
    <td><?php echo $admin_report_details->type; ?></td>
      <td><?php echo $admin_report_details->service; ?></td>
          
           <td><?php echo $admin_report_details->amount; ?></td>
           
        
         <td><?php echo $admin_report_details->dcommission;?></td>
 <td><?php echo $admin_report_details->commission;?></td>
      </tr>    
     <?php $i++;} ?>  
        
    </tbody>
                          </table>
                    </div>
                    
                    <?php	}	
					
					if($this->session->userdata('type')=="distributor")	{	?>
                    <div class="col-xs-12 table-responsive">
                          <table class="table air-table1 air-table2" id="dataTables-example">
                            <thead>
                            <tr class="table-title">
                                <th style="width:25px;">Sl.No</th>
                                <th style="width:270px;">Date</th>
                                <th style="width:268px;">Mobile No</th>
                                <th style="width:45px;">Type</th>
                                <th style="width:79px;">operator</th>
                                <th style="width:40px;">Amount</th>
                                <th style="width:77px;">DIS Commission</th>
                                <th style="width:67px;">FRC Commission</th>
                            </tr>
                            </thead>
                            <tbody>
          <?php 	$i=1; foreach($results as $report_details_distributors){ ?>
     <tr>
 <?php
        $date= $report_details_distributors->rdate;
        $date_in=date('d-M-Y H:i:s',strtotime($date));  
							try {
							  
							 //   $date_in =date ('d-M-Y H:i:s',strtotime('2016-02-28 05:22:39'));
							     
							  
								  $date = new DateTime( $date_in , new DateTimeZone('US/Eastern'));
								  $date->setTimezone(new DateTimeZone('Asia/Kolkata'));
								 $date1 = $date->format('d-M-Y H:i:s');
							  } catch (Exception $e) {
								 // echo $e->getMessage();
								  $date1 =date ("d-M-Y H:i:s",strtotime($date));
							  }
		
		
		 
        ?>
         <td><?php echo $i;?></td>
          <td><?php echo $date1;?></td>

 <td><?php echo $report_details_distributors->mobilenumber; ?></td>
    <td><?php echo $report_details_distributors->type; ?></td>
      <td><?php echo $report_details_distributors->service; ?></td>
           <td><?php echo $report_details_distributors->amount; ?></td>
         <td><?php echo $report_details_distributors->dcommission;?></td>
           <td><?php echo $report_details_distributors->commission;?></td>
      </tr>    
     <?php $i++;} ?>  
    </tbody>
                          </table>
                    </div>
                    
                    <?php	}	
					
					if($this->session->userdata('type')=="retailer")	{	?>
                    <div class="col-xs-12 table-responsive">
                          <table class="table air-table1 air-table2" id="dataTables-example">
                            <thead>
                            <tr class="table-title">
                             
                            
                            
                                <th>Sl.No</th>
           <th style="width:270px;">Date</th>
   			<th>Mobile No</th>
            <th>Type</th>
            <th>operator</th>
            <th >Success</th>
            <th >FRC Commission</th>
                            </tr>
                            </thead>
                            <tbody>
          <?php 	$i=1;	 foreach($results as $report_details_franchise){ ?>
     <tr>
 <?php
        $date= $report_details_franchise->rdate;
        $date_in=date('d-M-Y H:i:s',strtotime($date)); 
		
	 
							
							try {
							  
							 //   $date_in =date ('d-M-Y H:i:s',strtotime('2016-02-28 05:22:39'));
							     
							  
								  $date = new DateTime( $date_in , new DateTimeZone('US/Eastern'));
								  $date->setTimezone(new DateTimeZone('Asia/Kolkata'));
								 $date1 = $date->format('d-M-Y H:i:s');
							  } catch (Exception $e) {
								 // echo $e->getMessage();
								  $date_in =date ("d-M-Y H:i:s",strtotime($date));
							  }
		
        ?>
           <td><?php echo $i;?></td>
          <td><?php echo $date1;?></td>
 <td><?php echo $report_details_franchise->mobilenumber; ?></td>
    <td><?php echo $report_details_franchise->type; ?></td>
      <td><?php echo $report_details_franchise->service; ?></td>
           <td><?php echo $report_details_franchise->amount; ?></td>
         <td><?php echo $report_details_franchise->commission;?></td>
      </tr>    
     <?php $i++;} ?>  
    </tbody>
                          </table>
                    </div>
                    <?php	}	?>
                   
               


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
	
	
	
	$(document).on('change','#distributor',function(){
	
	var dis_id = $(this).val(); 	
			
           $.ajax({
                type: "POST",
                url: "<?php echo  site_url();?>reports/get_retailer_by/"+dis_id, 
                success: function(result) 
                { 
				var ret = JSON.parse(result);
				 $('#retailer').empty();
					$('#retailer').append('<option value="">Select</option>');
                    $.each(ret,function(id,data) 
                    {
                        var opt = $('<option />');
                        opt.val(data.uid);
						opt.text(data.name);
                        $('#retailer').append(opt);
                    }); 
  				}
 			});
	
	
});

    </script>