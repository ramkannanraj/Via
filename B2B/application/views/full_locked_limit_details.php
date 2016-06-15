<!DOCTYPE html>
<html lang="en">
    <head>
       <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/jquery-ui.css"/>
 <link rel="stylesheet" href="<?php echo base_url();?>/assets/DataTables-1.10.7/media/css/jquery.dataTables_themeroller.css"/>
 <link rel="stylesheet" href="<?php echo base_url();?>/assets/DataTables-1.10.7/media/css/jquery.dataTables.css"/>
  <script src="<?php echo base_url();?>/assets/js/jquery-1.10.2.js"></script>
  <script src="<?php echo base_url();?>/assets/js/jquery-ui.js"></script>
   <script src="<?php echo base_url();?>/assets/js/jquery.dataTables.min.js"></script>
 <script>
$(document).ready(function() {
	 $('#postpaid_detail').dataTable({
		 "order": [[ 0, "desc" ]]
    });
$("#postpaid_detail").on('change','input',function() {
	var  base_url = '<?php echo base_url();?>';
	var $row = $(this).closest("tr"),
$tds = $row.find("td:nth-child(1)");
	//alert($(this).val()); 
	//alert($(this).attr('id'));
	if($(this).attr('id')=="commission")
	{
		var url=base_url+"index.php/postpaid/getCommission/";
	}
	 var com=$(this).val();
	if($(this).attr('id')=="d_commission")
	{
		var url=base_url+"index.php/postpaid/getDCommission/";
	}
	var d_com=$(this).val();
	if($(this).attr('id')=="sf_commission")
	{
		var url=base_url+"index.php/postpaid/getSFCommission/";
	}
	var sf_com=$(this).val();
	if($(this).attr('id')=="sd_commission")
	{
		var url=base_url+"index.php/postpaid/getSDCommission/";
	}
	var sd_com=$(this).val();
	
		if($(this).attr('id')=="s_commission")
	{
		var url=base_url+"index.php/postpaid/getSCommission/";
	}
	var s_com=$(this).val();
	
		if($(this).attr('id')=="status")
	{
		var url=base_url+"index.php/postpaid/getStatus/";
	}
	var status=$(this).val();
	
	
	$.each($tds, function() {               
    var post_id= $(this).text();
	
    $.ajax({
            type: "POST",
            url: url, 
            data: {
                commission: com,
				d_commission:d_com,
				sf_commission:sf_com,
				sd_commission:sd_com,
				s_commission:s_com,
				sts:status,
				id: post_id,
            },
            success: function(result) {
                $("#result").html(result);
				
				alert('Successfully Updated');
            }
        });
		

		
  });
	
      });
				


});
				
</script>

    </head>
    <body>
      
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
                    <div class="title">
                     Full Locked Limit Report
                    </div>
                    
                  </div>
                  <div class="widget-body">
                    <div class="metro-nav">     
<form name="postpaid_form" method="post" action="">
        <table border="0" class="display" id="postpaid_detail">
            <thead>
                 <tr>
                    <th width="10%" scope="col">Distributor Id</th>
                    <th width="30%" scope="col">Company Name</th>               
                    <th width="20%" scope="col">Locked Amount</th>
                    <th width="20%" scope="col">Recharge Amount</th>
                     <th width="20%" scope="col">Remaining Balance</th>
                     
                   
                 </tr>
            </thead>
            <tbody>
                <?php 
				
				foreach($results as $val){
				
     
     ?>
     <tr>
         
          <td><?php echo $val->dis_id;?></td>
           <td><?php echo $val->companyname; ?></td>
         <td><?php echo $val->locked_balance;?></td>
        
         <td><?php echo $val->recharge_amt;?></td>
          <?php $remainingbal=(($val->dis_amt)-($val->recharge_amt));?>
          <td><?php echo $remainingbal;?></td>
        
          
           
           
       
        
          
      </tr>    
                
                 <?php 
   
     }
     
     ?>
            </tbody>
        </table>
      
       
         
        </form> 
           </div>
              </div>
            </div>
              <!-- Row End -->
            </div>
               <!-- Left Sidebar End -->
            
              </div>
        <!-- Dashboard Wrapper End -->

        

      </div>
      <!-- Container End -->
    </div>             
      <!--Dashboard Container End -->    
      </div>
      </div>      
         
      
    </body>
</html>