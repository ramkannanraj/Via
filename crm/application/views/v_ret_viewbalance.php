<div class="container-fluid">
      
    	<div class="admin-page2">
        	<div class="row">
            	<div class="col-xs-12">
               	<div class="panel dashboard">
                	<div class="panel-body">
                	<div class="form-group">
                    
                    	<?php if($type === "distributor" ||$type === "super" ){?>
                        <a href="<?php echo site_url('user/createuser') ?>" class="btn btn-primary">Create User</a>
                        <a href="<?php echo site_url('home/index') ?>" class="btn btn-primary">View User</a>
                        
                    	<?php } if($type === "admin"  ){?>
                    	<a href="<?php echo site_url('user/createuser') ?>" class="btn btn-primary">Create User</a>
                        <a href="<?php echo site_url('home/index') ?>" class="btn btn-primary">View User</a>
                        <a href="<?php echo site_url('mobile_no_change/index') ?>" class="btn btn-primary chg-mobi-no ">Change Mobile No</a>
                        <?php } if($type === "admin"){ ?>
                        <a href="<?php echo site_url('user/viewbalance/distributor') ?>" class="btn btn-default">View Balance</a>
                        <?php } ?>
                    
                    </div>
                 
                    <div class="mobile-1">
                        <p><?php   $i=0; foreach($records as $val){ ?>
                        View Balance -<?=$type//$val->type?>
                        <?php
                        $i++;
                        if($i==1) break;
                        }?> 
                        
                         
                        </p>
                        
                       
                 </div>
                 <!--filter start--> 
                 <form action="" class="row" method="post">
                 <div class="col-lg-4">
                 <div class="form-group">
                
                 	<label>Distributor</label>
                    <select class="form-control"  name="distributor" id="distributor"  >
                    	<option value="">Select Distributor</option>
    	 <?php $i=1; foreach($distributors as $distributor){//ezypay_prcode ?> 
        
         <option value="<?php  echo $distributor->uid;   ?>"> <?php  echo $distributor->name; ?></option>
         <?php } ?> 
                    </select>
              
                 </div>
                 </div>
               <div class="col-lg-4">
                 <div class="form-group">
               
             	 <div class="mobile-1" style="color:#fff"><p>Recharge Wallet :: Rs.<?php if( isset( $ret_sum_total[0] )){ echo $ret_sum_total[0]->total_recharge_money; } else { echo "0"; } ?> 	/-   </p></div>
             
              
                 </div>
                 </div>
                <div class="col-lg-4">
                 <div class="form-group">
                
             <div class="mobile-1" style="color:#fff"><p>Send Money Wallet :: Rs.<?php  if( isset( $ret_sum_total[0] )){ echo $ret_sum_total[0]->total_send_money; } else { echo "0"; } ?> 	/- </p></div>
             
                 </div>
                 </div>
                 </form>
               <!--filter end--> 
               
               
             
               
                      
                    <div class="table-responsive">
                          <table class="table air-table1 air-table2" id="dataTables-example">
                            <thead>
                            <tr class="table-title">
                                <th>Sno</th>
                                <th>Name</th>
                                <th>Firm name</th>
                                <th>Mobile no</th>
                                <th>Recharge balance</th>
                                <th>Sendmoney balance</th> 
                                 <th>  
                                 <input type="checkbox"  id="selectall" /> 
                    <select class="form-control"  id="checkall"><option value="0">select</option>
                    	<option value="yes">yes</option>
                        <option value="no">no</option>
                        
                    </select>Status </th> 
						   </tr>
                            </thead>
                               <tbody>
<?php
 $i=1; $sum_total=0;
 foreach($records as $record):
    $sql="select * from usermaster where parent_id='$record->uid'";
		 $exe=$this-> db-> query($sql);
		 $exe->num_rows(); 
		if(isset($_POST['act']))
{
$qry="update usermaster set isactive='yes' where uid='$_POST[active]'";
$eww=mysql_query($qry);
echo "<script type='text/javascript'>
                        alert('User Status changed successfully.'); 
                     </script>";
					 header("location:#");
}
if(isset($_POST['inact']))
{
$spm="update usermaster set isactive='no' where uid='$_POST[active]'";
$ewm=mysql_query($spm);
echo "<script type='text/javascript'>
                        alert('User Status changed successfully.'); 
                     </script>";
					 header("location:#");
}
?> 
	 
<tr>
<td><?php echo $i ;?></td>
<td><?php echo $record->name; ?></td>
<td><?php echo $record->companyname; ?></td>
<td><?php echo $record->mobile; ?></td>
<td><?php $tot=$record->total_balance; $sum_total= $sum_total + $tot;
	$use=$record->used_balance;
	$aval_blce=$tot-$use; 
	echo $aval_blce; ?></td>
<td><?php  $sendtot=$record->send_money_bal;
	$senduse=$record->sendmoney_used_bal;
	$avail_bal=$sendtot-$senduse; echo $avail_bal; ?></td>
<td> <span id="isactive_<?php echo $record->uid; ?>" class="isactive"><?php echo $record->isactive;?></span><input type="checkbox" id="check_<?php echo $record->uid; ?>" alt="<?php echo $record->parent_id; ?>" rel="<?php echo $record->uid; ?>" class="status"   /></td>

<!--  <?php if( $record->isactive == 'yes' ) { ?> checked="checked" <?php } ?>   -->
 
</tr>
<?php $i++;  
endforeach;?>
</tbody>
                          </table>
                    </div>
                    <!-- table ends-->
              
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
</div>
<!-- RESP MENU ENDS -->

<script>
$(document).ready(function() {
	$('#dataTables-example').DataTable({
	responsive: true 
	});
});
 
</script>

<script>
var save_flag="NO";
$('#checkall').change(function() {
	 	if (  $(this).val() == 0 ) { 
		//alert( 'Please select status');
		return;
		}
	 var value;
	  var inverse = !( $('.status').prop('checked') );  
	  
    if ($('#selectall').is(':checked')) { 
		  $('.status').attr('checked', 'checked');
      //  $('.status').prop('checked', inverse);
		// value = 'yes'; // disable
		value = $(this).val();
    } else {
		 /* value = 'no'; // enable
      */  $('.status').prop('checked', false);
		
		alert('Please check box');
		return;
    }

	$('.isactive').html(value);
   
		 var  u_id = '';
		 var  p_id = $(".status").attr('alt');
			
	 var datas = "p_id="+p_id+"&u_id="+u_id+"&value="+value; 
  
	$.ajax({ 
		 type: "POST",
		 url: "<?=base_url('user/updatestatus/')?>",
		 data: datas,
		 dataType: "html"
	 }).done(function( msg ) {
		 alert( msg );  
	 });
	
});</script>


<script> 
$('.status').click(function() {
	 var value;
		 var  u_id = $(this).attr('rel'); 
		 
	 
 /*   if ($(this).is(':checked')) {
		 value = 'yes'; // disable
    } else {
	value = 'no'; // enable
    }*/
	value = $('#isactive_'+u_id ).html();
	
	if( value == 'yes' )
	{
		value = 'no';
	}else{
		value = 'yes';
	}
	
		 var  p_id = '';
		$('#isactive_'+u_id ).html(value) ;
       
				
	 var datas = "p_id="+p_id+"&u_id="+u_id+"&value="+value; 
  
  $.ajax({ 
       type: "POST",
       url: "<?=base_url('user/updatestatus/')?>",
       data: datas,
       dataType: "html"
   }).done(function( msg ) {
       alert( msg );  
   });
   
	
});

	
	$(document).on('change','#distributor',function(){
	// user/viewretailersdetails/322
	var id = $(this).val();
	if ( id == 0 ){
	alert( "Please select distributor");
		return;
	}
 	window.location.href = "<?php echo base_url()?>user/viewretailersdetails/"+id;
	
});

</script>