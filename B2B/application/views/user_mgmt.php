<div class="container-fluid">
      <!--  <button class="toggle-menu menu-left push-body gradient_btn1">Menu</button>-->
    	<div class="admin-page2">
        
        	<div class="row">
            	<div class="col-xs-12">
                <div class="panel dashboard">
                <div class="panel-body">
                        <div class="form-group">
                            <?php if($type === "distributor" ||$type === "super" ){?>
                            <a href="<?php echo site_url('user/createuser') ?>" class="btn btn-warning">Create User</a>
                            <a href="<?php echo site_url('home/index') ?>" class="btn btn-default active">View User</a>
                            
                            <?php } if($type === "admin"  ){?>
                            <a href="<?php echo site_url('user/createuser') ?>" class="btn btn-warning">Create User</a>
                            <a href="<?php echo site_url('home/index') ?>" class="btn btn-default active">View User</a>
                            <a href="<?php echo site_url('mobile_no_change/index') ?>" class="btn btn-warning chg-mobi-no">Change Mobile No</a>
                            <?php } if($type === "admin"){ ?>
                            <a href="<?php echo site_url('user/viewbalance/distributor') ?>" class="btn btn-warning">View Balance</a>
                            <?php } ?>
                        </div>
                        
                        <div class="mobile-1">
                        <p>View User</p>
                 </div>
                 
               			<div class="table-responsive">
                          <table class="table air-table1 air-table2" id="dataTables-example">
                            <thead>
                            <tr class="table-title">
                                <th>Sno</th>
                                <th>Name</th>
                                <th>Firm name</th>
                                <th>Mobile no</th>
                                <th>Distributor Name </th>
                                <th>User Type</th>
                                <th>Recharege balance</th> 
                                <th>Sendmoney balance</th> 
                                <?php $val=$this->session->userdata('type');if($val =="admin") {?>
								<th width="5%" scope="col">Status</th><?php }?>
                                <th>Action</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            <?php  
 $val=$this->session->userdata('type');
	$leave_id=$this->session->userdata('uid');
	$del="no";
	$ids="0";
	if($val=='admin')
	{
		$sql=mysql_query("SELECT * FROM usermaster  where usermaster.parent_id!='$ids' && usermaster.uid!='$leave_id' 
  && usermaster.isdelete='$del' &&  usermaster.isactive='yes'")or die(mysql_error());
	}else{
$sql=mysql_query("SELECT * FROM usermaster  where usermaster.parent_id='$leave_id' && usermaster.uid!='$leave_id' 
  && usermaster.isdelete='$del' &&  usermaster.isactive='yes'")or die(mysql_error());
	}
$i=1;
				if(mysql_num_rows($sql)>0)
				{
while($row=mysql_fetch_array($sql))
{
 $active=$row['isactive'];
 $tot=$row['total_balance'];
	$use=$row['used_balance'];
	
	$aval_blce=$tot-$use;
	$send_tot=$row['send_money_bal'];
	$send_use=$row['sendmoney_used_bal'];
	 $sendmoney_avail= $send_tot - $send_use ;
	 
																  
	?>
<tr>
								<td><?php echo $i ;?></td>
								<td><?php echo $row['name'];?></td>
								<td><?php echo $row['companyname'];?></td>
								<td><?php echo $row['mobile'];?></td>
								<?php
								 $this->db->select('*');
								  $this->db->from('usermaster');
							  $this->db->where('uid',$leave_id);                             
								$querys = $this->db->get(); 
								 foreach ($querys->result() as $row3)
								 { 
								 $parent_total_bal=$row3->total_balance;																
								 $parent_used_bal=$row3->used_balance;
								 $parent_sendmoney_bal=$row3->send_money_bal;																
								 $parent_sendmoney_used_bal=$row3->sendmoney_used_bal;
								 }
?>
<?php $parent=$row['parent_id'];

								  $this->db->select('*');
								  $this->db->from('usermaster');
								  $this->db->where('uid',$parent);                             
								  $query = $this->db->get(); 
								 foreach ($query->result() as $row2)
								 { 
								 //$parent_total_bal=$row2->total_balance;
								//$parent_used_bal=$row2->used_balance;
								 ?>
																   
                                <td><?php echo $row2->name;?>( <?php echo $row2->username;?> ) </td><?php }?>
                                <td><?php echo $row['type'];?></td>
                                <td><?php echo $aval_blce;?></td> 
                                <td><?php echo $sendmoney_avail;?></td> 
								<?php	if($val =='admin'){ ?>
<?php 	if($active=='yes'){ ?>

<td>
<a class="active1" style="color:#EC9924;" href="<?php echo site_url('home/statusactive')?>/<?php echo $row['uid']; ?>"onclick="if(confirm('Do you want to change the inactive status ')) return true; else return false;"  title="Edit Status" alt="Edit Status">
<span style="color:#EC9924; font-size:10px !important;" class="glyphicon glyphicon-ok" aria-hidden="true"></span> active</a></td>

<?php  }else if($active=='no') {  ?>

<td>
<a class="inactive1" style="color:#575B5D;" href="<?php echo site_url('home/statusinactive')?>/<?php echo $row['uid']; ?>"onclick="if(confirm('Do you want to change the active status')) return true; else return false;" title="Edit Status" alt="Edit Status">
<span style="color:#575B5D; font-size:10px;" class="glyphicon glyphicon-remove" aria-hidden="true"></span> Inactive</a></td>

<?php  } ?>

<?php	}?>


<td class="tab-img">

<a data-toggle="modal" data-target="#edit_modify-<?php echo $row['uid'];?>" title="Edit User Info" alt="Edit User Info">
	<img class="actionicons" src="<?php echo base_url()?>/img/edit.png" />
</a>
<a data-toggle="modal" data-target="#fund_transfer-<?php echo $row['uid'];?>" title="Fund Transfer" alt="Fund Transfer">
	<img class="actionicons" src="<?php echo base_url()?>/img/fund transfer.png" />
</a>
<a data-toggle="modal" title="Send Money Transfer" data-target="#sendmoney_transfer-<?php echo $row['uid'];?>">
<img class="actionicons" src="<?php echo base_url()?>/img/fund transfer.png" />
</a>
<a href="<?php echo site_url('home/deltuser')?>/<?php echo $row['uid']; ?>" onclick="if(confirm('Do you want to delete')) return true; else return false;"  title="Fund Delete User" alt="Delete User">
<img class="actionicons" src="<?php echo base_url()?>/img/delete.png" />
</a>

</td>
							</tr>
							 <?php $i++; }}else{
	echo "No user Found"; }?>
                              
                          </table>
                    </div>
                    </div>
                    </div>
                </div>
                <!-- col-xs-12 ends-->
               
               
               
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
    
<?php  
 $sql=mysql_query("SELECT * FROM usermaster  where usermaster.parent_id!='$ids' && usermaster.uid!='$leave_id' 
  && usermaster.isdelete='$del' &&  usermaster.isactive='yes'")or die(mysql_error());
while($row=mysql_fetch_array($sql))
{
$types=$row['type'];
$active=$row['isactive'];
?>

</div></div></div></div>
</div></div>
</div></div>  


<!---==============UPDATE INFORMATION STARTS---======================--->
<div class="modal fade bs-example-modal-lg-3" id="edit_modify-<?php echo $row['uid']; ?>" tabindex="-<?php echo $row['uid']; ?>" role="dialog" aria-labelledby="myModalLabel-<?php echo $row['uid']; ?>" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<form >
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
<h2 class="modal-title" id="myModalLabel-<?php echo $row['uid']; ?>">Update Information</h2>
</div>
<div class="modal-body">
<span class="IL_AD" id="IL_AD3"><input type="hidden" id="id" value="<?php echo $row['uid']; ?>"></span>
<div class="row">
<div class="form-group col-sm-6">
<input type="hidden" id="id" value="<?php echo $row['uid']; ?>">
<label for="pop_name">Name</label>
<input type="text" class="form-control" id="fn<?php echo $row['uid']; ?>" value="<?php echo $row['name']; ?>">

</div>
<div class="form-group col-sm-6">
<label for="pop_name">Firm Name</label>
<input type="text" class="form-control" id="ln<?php echo $row['uid']; ?>" value="<?php echo $row['companyname']; ?>">
</div>

<div class="form-group col-sm-6">
<label for="pop_name">Mobile no</label>
<input type="text" class="form-control" id="age<?php echo $row['uid']; ?>" value="<?php echo $row['mobile']; ?>"  <?php if($val!='admin') {?> readonly="readonly" 
<?php } ?>>
</div>
<div class="form-group col-sm-6">
<label for="pop_name">User Name</label>
<input type="text" class="form-control" id="ht<?php echo $row['uid']; ?>" value="<?php echo $row['username']; ?>" <?php if($val!='admin') {?> readonly="readonly" 
<?php } ?>>
</div>

<?php if($val=='admin') {?>
<div class="form-group col-sm-6">
<label for="pop_name">Password</label>
<input type="text" class="form-control" id="job<?php echo $row['uid']; ?>" value="<?php echo $row['password']; ?>">
</div>
<?php } ?>
<div class="form-group col-sm-6">
<label for="pop_name">Email</label>
<input type="email" class="form-control" id="mail<?php echo $row['uid']; ?>" value="<?php echo $row['email']; ?>" style="border: 1px solid #606060; height: 40px; padding: 5px 10px; width: 100%;">
</div>

<?php if($types=='distributor') {?>
<div class="form-group col-sm-6">
<label for="pop_name">User limit</label>
<input type="text" name="limit" class="form-control" id="limit<?php echo $row['uid']; ?>" value="<?php echo $row['adduser_limit']; ?>" required="required" onKeyPress="return isNumber(event)">
</div>
<?php }?>
<div class="form-group col-sm-6">
<label for="pop_name">Recharge balance</label>
<input type="text" name="total_balance" readonly class="form-control" id="job<?php echo $row['uid']; ?>" value="<?php echo $row['available_balance'];?>">
</div>

<div class="form-group col-sm-6">
<label for="pop_name">Sendmoney balance</label>
<input type="text" name="locked_balance" readonly class="form-control" value="<?php echo $row['sendmoney_available_bal']; ?>">
</div>

<div class="form-group col-sm-6">
<label for="pop_name">Executive Name</label>
<input type="text" name="executive_name"   class="form-control" value="<?php echo $row['executive_name']; ?>"   id="executive_name<?php echo $row['uid']; ?>"  >
</div>

<div class="form-group col-sm-12">
<div class="pull-right">
<button type="button" onClick="updatedata('<?php echo $row['uid']; ?>')" class="btn btn-default">Save changes</button>
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
<!---==============UPDATE INFORMATION ENDS---======================--->


<!---==============FUND TRANSFER STARTS---======================--->
<div class="modal fade" id="fund_transfer-<?php echo $row['uid']; ?>" tabindex="-<?php echo $row['uid']; ?>" role="dialog" aria-labelledby="myModalLabel-<?php echo $row['uid']; ?>" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<form class="form" class="frmupdate" role="form" action="<?php echo site_url() ?>home/update_funds_transfer" method="POST"> 
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
<h2 class="modal-title" id="myModalLabel-<?php echo $row['uid']; ?>">Fund Transfer</h2>
</div>

<div class="modal-body">
<?php if($active=='no'){ ?>
<label for="pop_name">User is Inactive.</label>
<?php	}else{ ?>

<span class="IL_AD" id="IL_AD3"><input type="hidden" id="id" value="<?php echo $row['uid']; ?>"></span>
<div class="row">
<div class="form-group col-sm-6 col-xs-12">
<label for="pop_name">Type</label>
<input type="text" name="name" id="lock<?php echo $row['uid']; ?>" readonly class="form-control" value="Take">

</div>
<div class="form-group col-sm-6 col-xs-12">
<label for="pop_name">Transfered By</label>
<input class="form-control" name="companyname" id="locked_buy<?php echo $row['uid']; ?>" readonly type="text" value="<?php $val=$this->session->userdata('type');echo $val;  ?>" >
</div>

<div class="form-group col-sm-6 col-xs-12">
<label for="pop_name">Transfered to</label>
<input type="text" name="name" class="form-control" id="name<?php echo $row['uid']; ?>"readonly value="<?php echo $row['name']?>">

<input type="hidden" name="total_balance" id="total_balance<?php echo $row['uid']; ?>" value="<?php echo $row['total_balance'];   ?>"/>
<input type="hidden" name="used_balance" id="used_balance<?php echo $row['uid']; ?>" value="<?php echo $row['used_balance'];   ?>"/>
<input type="hidden" name="hidden" id="hidden<?php echo $row['uid']; ?>" value="<?php echo $row['uid']; $uid ?>"/>
<input type="hidden" name="mobile" id="mobile<?php echo $row['uid']; ?>" value="<?php echo  $row['mobile']; ?>"/>
<input type="hidden" name="usename" id="usename<?php echo $row['uid']; ?>" value="<?php echo  $row['username'];  ?>"/>
<input type="hidden" name="type" id="type<?php echo $row['uid']; ?>" value="<?php echo  $row['type'];?>"/>
<input type="hidden" name="sname" id="sname<?php echo $row['uid']; ?>" value="<?php $sname=$this->session->userdata('name'); echo $sname ?>"/>
<input type="hidden" name="uname" id="uname<?php echo $row['uid']; ?>" value="<?php echo $row['name']; ?>"/>
<input type="hidden" name="parent_tot" id="parent_tot<?php echo $row['uid']; ?>" value="<?php echo $parent_total_bal ?>"/>
<input type="hidden" name="parent_used" id="parent_used<?php echo $row['uid']; ?>" value="<?php echo $parent_used_bal ?>"/>
</div>

<div class="form-group col-sm-6 col-xs-12">
<label for="pop_name">Transfered Amount</label>
<input type="text" name="amt"  class="form-control" id="transfered_amnt<?php echo $row['uid']; ?>" value="">
</div>

<div class="form-group col-sm-12 col-xs-12">
<div class="pull-right">
<button type="button" onClick="update_fund_transfer('<?php echo $row['uid']; ?>')" class="btn btn-default" style="margin-right:20px;">Transfered Amount</button>
<button type="button" class="btn btn-danger" data-dismiss="modal" style="width:130px;">Close</button>
</div>
</div>
<?php }?>

</div>
</div>
</form>
</div>
</div>
</div>
<!---==============FUND TRANSFER ENDS---======================--->

<!---==============SEND MONEY TRANSFER STARTS---======================--->
<div class="modal fade" id="sendmoney_transfer-<?php echo $row['uid']; ?>" tabindex="-<?php echo $row['uid']; ?>" role="dialog" aria-labelledby="myModalLabel-<?php echo $row['uid']; ?>" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<form class="form" class="frmupdate" role="form" action="<?php echo site_url(); ?>home/update_sendmoney_transfer" method="POST"> 
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
<h2 class="modal-title" id="myModalLabel-<?php echo $row['uid']; ?>">Send Money Transfer</h2>
</div>

<div class="modal-body">
<?php if($active=='no'){ ?>
<label for="pop_name">User is Inactive.</label>
<?php	}else{ ?>

<span class="IL_AD" id="IL_AD3"><input type="hidden" id="id" value="<?php echo $row['uid']; ?>"></span>
<div class="row">
<div class="form-group col-sm-6 col-xs-12">
<label for="pop_name">Type</label>
<input type="text" name="name" id="lock<?php echo $row['uid']; ?>" readonly class="form-control" value="Take">

</div>
<div class="form-group col-sm-6 col-xs-12">
<label for="pop_name">Transfered By</label>
<input class="form-control" name="companyname" id="locked_buy<?php echo $row['uid']; ?>" readonly type="text" value="<?php $val=$this->session->userdata('type');echo $val;  ?>" >
</div>


<div class="form-group col-sm-6 col-xs-12">
<label for="pop_name">Transfered to</label>
<input type="text" name="name" class="form-control" id="name<?php echo $row['uid']; ?>"readonly value="<?php echo $row['name']?>">

<input type="hidden" name="sendmoney_balance" id="sendmoney_balance<?php echo $row['uid']; ?>" value="<?php echo $row['send_money_bal'];   ?>"/>
<input type="hidden" name="sendmoney_used_balance" id="sendmoney_used_balance<?php echo $row['uid']; ?>" value="<?php echo $row['sendmoney_used_bal'];   ?>"/>
<input type="hidden" name="hidden" id="snd_hidden<?php echo $row['uid']; ?>" value="<?php echo $row['uid']; $uid ?>"/>
<input type="hidden" name="mobile" id="snd_mobile<?php echo $row['uid']; ?>" value="<?php echo  $row['mobile']; ?>"/>
<input type="hidden" name="usename" id="snd_usename<?php echo $row['uid']; ?>" value="<?php echo  $row['username'];  ?>"/>
<input type="hidden" name="type" id="snd_type<?php echo $row['uid']; ?>" value="<?php echo  $row['type'];?>"/>
<input type="hidden" name="sname" id="snd_sname<?php echo $row['uid']; ?>" value="<?php $sname=$this->session->userdata('name'); echo $sname ?>"/>
<input type="hidden" name="uname" id="snd_uname<?php echo $row['uid']; ?>" value="<?php echo $row['name']; ?>"/>
<input type="hidden" name="sendmoney_parent_tot" id="sendmoney_parent_tot<?php echo $row['uid']; ?>" value="<?php echo $parent_sendmoney_bal ?>"/>
<input type="hidden" name="sendmoney_parent_used" id="sendmoney_parent_used<?php echo $row['uid']; ?>" value="<?php echo $parent_sendmoney_used_bal ?>"/>
</div>

<div class="form-group col-sm-6 col-xs-12">
<label for="pop_name">Transfered Amount</label>
<input type="text" name="amt"  class="form-control" id="snd_transfered_amnt<?php echo $row['uid']; ?>" value="">
</div>

<div class="form-group col-sm-12 col-xs-12">
<div class="pull-right">
<button type="button" onClick="update_sendmoney_transfer('<?php echo $row['uid']; ?>')" class="btn btn-default" style="margin-right:20px;">Transfered Amount</button>
<button type="button" class="btn btn-danger" data-dismiss="modal" style="width:130px;">Close</button>
</div>
</div>
<?php }?>

</div>

</div>
</form>
</div>
</div>
</div>
<!---==============SEND MONEY TRANSFER ENDS---======================--->



<!---==============LOCK FUND STARTS---======================--->
<div class="modal fade" id="lock_fund-<?php echo $row['uid']; ?>" tabindex="-<?php echo $row['uid']; ?>" role="dialog" aria-labelledby="myModalLabel-<?php echo $row['uid']; ?>" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
 <form class="form" class="frmupdate" role="form" action="<?php echo site_url() ?>home/lock_update" method="POST">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
<h2 class="modal-title" id="myModalLabel-<?php echo $row['uid']; ?>">Lock Fund</h2>
</div>

<div class="modal-body">
<?php if($active=='no'){ ?>
<label for="pop_name">User is Inactive.</label>
<?php	}else{ ?>

<span class="IL_AD" id="IL_AD3"><input type="hidden" id="id" value="<?php echo $row['uid']; ?>"></span>
<div class="row">
<div class="form-group col-sm-6 col-xs-12">
<label for="pop_name">Type</label>
<input type="text" name="name" id="lock<?php echo $row['uid']; ?>" readonly class="form-control" value="Lock">

</div>
<div class="form-group col-sm-6 col-xs-12">
<label for="pop_name">Locked By</label>
<input class="form-control" name="companyname" id="locked_buy<?php echo $row['uid']; ?>" readonly type="text" value="<?php $val=$this->session->userdata('type');echo $val;  ?>" >
</div>

<div class="form-group col-sm-6 col-xs-12">
<label for="pop_name">Locked to</label>
<input type="text" name="name" class="form-control" id="locked_to<?php echo $row['uid']; ?>"readonly  value="<?php echo $row['name']?>">

<input type="hidden" name="locked_balance"  id="locked_balance<?php echo $row['uid']; ?>"value="<?php echo $row['locked_balance'];   ?>"/>
<input type="hidden" name="tot_bal" readonly class="form-control" id="total_balz<?php echo $row['uid']; ?>" value="<?php echo $row['total_balance']?>">
<input type="hidden" name="used_balance" class="form-control" id="used_balz<?php echo $row['uid']; ?>" readonly  value="<?php echo $row['used_balance']?>">
</div>

<div class="form-group col-sm-6 col-xs-12">
<label for="pop_name">Locked Amount</label>
<input type="text" name="ltransfered_amnt"  class="form-control" id="ltransfered_amnt<?php echo $row['uid']; ?>" value="">
</div>

<div class="form-group col-sm-12 col-xs-12">
<div class="pull-right">
<button type="button" onClick="update_locked_amnt('<?php echo $row['uid']; ?>')" class="btn btn-default" style="margin-right:20px;">Transfered Amount</button>
<button type="button" class="btn btn-danger" data-dismiss="modal" style="width:130px;">Close</button>
</div>
</div>
<?php }?>

</div>

</div>

</form>
</div>
</div>
</div>
<!---==============LOCK FUND ENDS---======================--->




<!---==============RELEASE FUND STARTS---======================--->
<div class="modal fade" id="release_fund-<?php echo $row['uid']; ?>" tabindex="-<?php echo $row['uid']; ?>" role="dialog" aria-labelledby="myModalLabel-<?php echo $row['uid']; ?>" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<form class="form" class="frmupdate" role="form" action="<?php echo site_url() ?>home/lock_update" method="POST">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
<h2 class="modal-title" id="myModalLabel-<?php echo $row['uid']; ?>">Release Fund</h2>
</div>

<div class="modal-body">
<?php if($active=='no'){ ?>
<label for="pop_name">User is Inactive.</label>
<?php	}else if($row['locked_balance']=='0'){ ?>
<label for="pop_name">No Release amount.</label>
<?php } else  { ?>

<span class="IL_AD" id="IL_AD3"><input type="hidden" id="id" value="<?php echo $row['uid']; ?>"></span>
<div class="row">
<div class="form-group col-sm-6 col-xs-12">
<label for="pop_name">Type</label>
<input type="text" name="name" id="lock<?php echo $row['uid']; ?>" readonly class="form-control" value="Released">

</div>
<div class="form-group col-sm-6 col-xs-12">
<label for="pop_name">Released By</label>
<input class="form-control" name="companyname" id="locked_buy<?php echo $row['uid']; ?>" readonly type="text" value="<?php $val=$this->session->userdata('type');echo $val;  ?>" >
</div>

<div class="form-group col-sm-6 col-xs-12">
<label for="pop_name">Released to</label>
<input type="text" name="name" class="form-control" id="locked_to<?php echo $row['uid']; ?>"readonly value="<?php echo $row['name']?>">

<input type="hidden" name="locked_balance"  id="locked_balance<?php echo $row['uid']; ?>"value="<?php echo $row['locked_balance'];   ?>"/>
<input type="hidden" name="tot_bal" readonly class="form-control" id="total_balz<?php echo $row['uid']; ?>" value="<?php echo $row['total_balance']?>">
<input type="hidden" name="used_balance" class="form-control" id="used_balz<?php echo $row['uid']; ?>" readonly value="<?php echo $row['used_balance']?>">
</div>

<div class="form-group col-sm-6 col-xs-12">
<label for="pop_name">Released Amount</label>
<input type="hidden" name="locked_balance"  id="amount<?php echo $row['uid']; ?>"value="<?php echo $row['locked_balance'];   ?>"/>
<input type="text" name="transfered_amnt"  class="form-control" id="transfered_amnt<?php echo $row['uid']; ?>" readonly value="<?php echo $row['locked_balance']?>">
</div>

<div class="form-group col-sm-12 col-xs-12">
<div class="pull-right">
<button type="button" onClick="update_released_amnt('<?php echo $row['uid']; ?>')" class="btn btn-primary" style="margin-right:20px;">Transfered Amount</button>
<button type="button" class="btn btn-primary" data-dismiss="modal" style="width:130px;">Close</button>
</div>
</div>
<?php }?>

</div>

</div>

</form>
</div>
</div>
</div>
<?php }  ?>
<!---==============RELEASE FUND ENDS---======================--->

  <script type="text/javascript">
  
     function updatedata(str){
   var id = str;
   var fn = $('#fn'+str).val();
 if(fn=="" || fn==null)
    {
    alert('Enter First name'); 
    document.getElementById('#fn'+str).focus();
    return false;
    }
   var ln = $('#ln'+str).val();
   if(ln=="" || ln==null)
    {
    alert('Enter Last name'); 
    document.getElementById('#ln'+str).focus();
    return false;
    }
   var age = $('#age'+str).val();
if(age=="" || age==null)
    {
    alert('Enter Age'); 
    document.getElementById('#age'+str).focus();
    return false;
    }
   var ht = $('#ht'+str).val();
if(ht=="" || ht==null)
    {
    alert('Enter User name'); 
    document.getElementById('#ht'+str).focus();
    return false;
    }
   var job = $('#job'+str).val();
if(job=="" || job==null)
    {
    alert('Enter Password'); 
    document.getElementById('#job'+str).focus();
    return false;
    }
    var limit = $('#limit'+str).val();

var mail= $('#mail'+str).val();
if(mail=="" || mail==null)
    {
    alert('Enter Email'); 
    document.getElementById('#mail'+str).focus();
    return false;
    }
	
var executive_name= $('#executive_name'+str).val();
    
   var datas = "id="+id+"&fn="+fn+"&ln="+ln+"&age="+age+"&ht="+ht+"&limit="+limit+"&job="+job+"&mail="+mail+"&executive_name="+executive_name;
    
   $.ajax({
       type: "POST",
       url: "<?php echo base_url('home/update')?>",
       data: datas,
       dataType: "html"
   }).done(function( msg ) {
	    alert( msg ); 
	   if( msg == "Update Successfully" ){
		   window.location.href = 'home';
	   } 
      // viewdata();
   });
     }
	 function update_locked_amnt(str){
   var id = str;
   var lock = $('#lock'+str).val();
   var locked_buy = $('#locked_buy'+str).val();
   var locked_to = $('#locked_to'+str).val();
   var total_balz = $('#total_balz'+str).val();
   var used_balz = $('#used_balz'+str).val();
    var ltransfered_amnt = $('#ltransfered_amnt'+str).val();
if(ltransfered_amnt=="" || ltransfered_amnt==null)
    {
    alert('Enter Amount'); 
    document.getElementById('#ltransfered_amnt'+str).focus();
    return false;
    }
	var locked_balance = $('#locked_balance'+str).val();
	
   
   var datas = "id="+id+"&lock="+lock+"&locked_buy="+locked_buy+"&locked_to="+locked_to+"&total_balz="+total_balz+"&used_balz="+used_balz+"&ltransfered_amnt="+ltransfered_amnt+"&locked_balance="+locked_balance;
     //document.write(datas);
   $.ajax({
       type: "POST",
       url: "<?php echo base_url('home/locked_balance')?>",
       data: datas,
       dataType: "html"
   }).done(function( msg ) {
       alert( msg ); window.location.href = 'home';
       viewdata();
   });
     }
	 
	  function update_released_amnt(str){
   var id = str;
   var lock = $('#lock'+str).val();
   var locked_buy = $('#locked_buy'+str).val();
   var locked_to = $('#locked_to'+str).val();
   var total_balz = $('#total_balz'+str).val();
   var used_balz = $('#used_balz'+str).val();
    var transfered_amnt = $('#transfered_amnt'+str).val();
	var locked_balance = $('#locked_balance'+str).val();
	var amount = $('#amount'+str).val();
    
   var datas = "id="+id+"&lock="+lock+"&locked_buy="+locked_buy+"&locked_to="+locked_to+"&total_balz="+total_balz+"&used_balz="+used_balz+"&transfered_amnt="+transfered_amnt+"&locked_balance="+locked_balance+"&amount="+amount;
    
   $.ajax({
       type: "POST",
       url: "<?php echo base_url('home/released_balance')?>",
       data: datas,
       dataType: "html"
   }).done(function( msg ) {
       alert( msg ); window.location.href = 'home';
       viewdata();
   });
   
  
     }
	 
function update_fund_transfer(str){
   var id = str;
   var total_balance = $('#total_balance'+str).val();
   var used_balance = $('#used_balance'+str).val();
   var mobile = $('#mobile'+str).val();
   var usename = $('#usename'+str).val();
   var type = $('#type'+str).val();
    var sname = $('#sname'+str).val();
	var uname = $('#uname'+str).val();
	var amt = $('#transfered_amnt'+str).val();
if(amt=="" || amt==null)
    {
    alert('Enter Amount'); 
    document.getElementById('#transfered_amnt'+str).focus();
    return false;
    }
	var parent_used = $('#parent_used'+str).val();
	var parent_tot = $('#parent_tot'+str).val();
    
   var datas = "id="+id+"&total_balance="+total_balance+"&used_balance="+used_balance+"&mobile="+mobile+"&usename="+usename+"&type="+type+"&sname="+sname+"&uname="+uname+"&amt="+amt+"&parent_tot="+parent_tot+"&parent_used="+parent_used;
    
   $.ajax({
       type: "POST",
       url: "<?php echo base_url('home/update_funds_transfer')?>",
       data: datas,
       dataType: "html"
   }).done(function( msg ) {
       alert( msg ); window.location.href = 'home';
       viewdata();
   });
     }
	 
	 
	 function update_sendmoney_transfer(str){
   var id = str;
   var total_balance = $('#sendmoney_balance'+str).val();
   var used_balance = $('#sendmoney_used_balance'+str).val();
   var mobile = $('#snd_mobile'+str).val();
   var usename = $('#snd_usename'+str).val();
   var type = $('#snd_type'+str).val();
    var sname = $('#snd_sname'+str).val();
	var uname = $('#snd_uname'+str).val();
	var amt = $('#snd_transfered_amnt'+str).val();
if(amt=="" || amt==null)
    {
    alert('Enter Amount'); 
    document.getElementById('#snd_transfered_amnt'+str).focus();
    return false;
    }
	var parent_used = $('#sendmoney_parent_used'+str).val();
	var parent_tot = $('#sendmoney_parent_tot'+str).val();
    
   var datas = "id="+id+"&sendmoney_balance="+total_balance+"&sendmoney_used_balance="+used_balance+"&mobile="+mobile+"&usename="+usename+"&type="+type+"&sname="+sname+"&uname="+uname+"&amt="+amt+"&parent_tot="+parent_tot+"&parent_used="+parent_used;
    
   $.ajax({
       type: "POST",
       url: "<?php echo base_url('home/update_sendmoney_transfer')?>",
       data: datas,
       dataType: "html"
   }).done(function( msg ) {
       alert( msg ); window.location.href = 'home';
       viewdata();
   });
     }
	 
    </script>    