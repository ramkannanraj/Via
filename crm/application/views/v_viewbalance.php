<div class="container-fluid">
      
    	<div class="admin-page2">
        	<div class="row">
            	<div class="col-xs-12">
               	<div class="panel dashboard">
                	<div class="panel-body">
                	<div class="form-group">
                    
                    	<?php if($type === "distributor" ||$type === "super" ){?>
                        <a href="<?php echo site_url('user/createuser') ?>" class="btn btn-warning">Create User</a>
                        <a href="<?php echo site_url('home/index') ?>" class="btn btn-warning">View User</a>
                        
                    	<?php } if($type === "admin"  ){?>
                    	<a href="<?php echo site_url('user/createuser') ?>" class="btn btn-warning">Create User</a>
                        <a href="<?php echo site_url('home/index') ?>" class="btn btn-warning">View User</a>
                        <a href="<?php echo site_url('mobile_no_change/index') ?>" class="btn btn-warning chg-mobi-no ">Change Mobile No</a>
                        <?php } if($type === "admin"){ ?>
                        <a href="<?php echo site_url('user/viewbalance/distributor') ?>" class="btn btn-default">View Balance</a>
                        <?php } ?>
                    
                    </div>
                 
                    <div class="mobile-1">
                        <p><?php   $i=0; foreach($records as $val){ ?>
                        View Balance -<?php echo $type//$val->type?>
                        <?php
                        $i++;
                        if($i==1) break;
                        }?> </p>
                 </div>
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
                                <?php if($type!='retailer') { //if($val->type!='retailer') { ?>             
								<th>Retailer count</th>
								<?php } ?>
								<th >Executive name</th>
						   </tr>
                            </thead>
                               <tbody>
<?php
 $i=1; 
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
<td><a href="<?php echo base_url(); ?>user/viewretailersdetails/<?php echo  $record->uid;  ?>" ><?php echo $record->name; ?></a></td>
<td><?php echo $record->companyname; ?></td>
<td><?php echo $record->mobile; ?></td>
<td><?php $tot=$record->total_balance;
	$use=$record->used_balance;
	$aval_blce=$tot-$use; echo $aval_blce; ?></td>
    <td><?php  $sendtot=$record->send_money_bal;
	$senduse=$record->sendmoney_used_bal;
	$avail_bal=$sendtot-$senduse; echo $avail_bal; ?></td> 
<?php
if($val->type!='retailer')  
{ ?>
<td><a href="<?php echo base_url(); ?>user/viewretailersdetails/<?php echo  $record->uid;  ?>" ><?php echo  $exe->num_rows();  ?></a></td>
<?php } ?>
<td><?php echo $record->executive_name; ?></td>
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
$('.selectall').click(function() {
    if ($(this).is(':checked')) {
        $('div input').attr('checked', true);
    } else {
        $('div input').attr('checked', false);
    }
});</script>