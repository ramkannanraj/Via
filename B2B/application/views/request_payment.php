<div class="container">
        <button class="toggle-menu menu-left push-body gradient_btn1">Menu</button>
    	<div class="admin-page2">
        	<div class="row">
            	<div class="col-xs-12 profile-btn">
                	<ul>
                    	<?php if($type === "distributor" ||$type === "admin" ){?>
                        <li><a href="<?php echo site_url('request_payment/createrequest') ?>" class="gradient_btn2">Request Payment</a></li>
                       <!-- <li><a href="<?php echo site_url('request_payment/index') ?>" class="gradient_btn2">View Request Payment</a></li>
                        -->
                    	<?php } if($type === "retailer"  ){?>
                    	<li><a href="<?php echo site_url('request_payment/createrequest') ?>" class="gradient_btn2">Request Payment</a></li>
                        <!-- <li><a href="<?php echo site_url('request_payment/index') ?>" class="gradient_btn2">View Request Payment</a></li>-->
                         <?php }  ?>
                    </ul>
                </div>
                <!-- col-xs-12 ends-->
               
               <div class="service-Pre-Paid">
                    <div class="col-xs-12 mobile-1">
                        <p>View User</p>
                 </div>
                    <!--<div class="col-sm-6 col-xs-6 show1">
                        <span>Show</span>
                            <select>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                            </select>
                         <span>entries</span>
                    </div>
                    <div class="col-sm-6 col-xs-6 search1">
                        <input type="text" placeholder="search">
                    </div>-->
                    <div class="col-xs-12 table-responsive">
                          <table class="table air-table1 air-table2" id="dataTables-example">
                            <thead>
                            <tr class="table-title">
                                <th>Sno</th>
                                <th>Transfer Date</th>
                                <th>Name</th>
                                <th>Payment Mode</th>
                                <th>Amount</th>
                                <th>Bank</th>
                                <th>Branch</th>
                                <th>Bank Detail</th>
                                <th>Request To</th> 
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
//$sql=mysql_query("SELECT * FROM usermaster  where usermaster.parent_id!='$ids' && usermaster.uid!='$leave_id'  && usermaster.isdelete='$del'")or die(mysql_error());
	}else{
$sql=mysql_query("SELECT * FROM usermaster  where usermaster.parent_id='$leave_id' && usermaster.uid!='$leave_id' 
  && usermaster.isdelete='$del'")or die(mysql_error());
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
																   
                                                                  <td><?php echo $row2->name;?></td><?php }?>
<td><?php echo $row['type'];?></td>
								 <td><?php echo $aval_blce;?></td>
								 <td><?php echo $row['locked_balance'];?></td>
								<?php	if($val =='admin'){ ?>
<?php 	if($active=='yes'){ ?>

<td>
<a class="active1" style="color:#00BBF0;" href="<?=site_url('home/statusactive')?>/<?php echo $row['uid']; ?>"onclick="if(confirm('Do you want to change the inactive status ')) return true; else return false;"  title="Edit Status" alt="Edit Status">
<span style="color:#00BBF0; font-size:10px !important;" class="glyphicon glyphicon-ok" aria-hidden="true"></span> active</a></td>

<?php  }else if($active=='no') {  ?>

<td>
<a class="inactive1" style="color:#575B5D;" href="<?=site_url('home/statusinactive')?>/<?php echo $row['uid']; ?>"onclick="if(confirm('Do you want to change the active status')) return true; else return false;" title="Edit Status" alt="Edit Status">
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
<a href="<?=site_url('home/deltuser')?>/<?php echo $row['uid']; ?>" onclick="if(confirm('Do you want to delete')) return true; else return false;"  title="Fund Delete User" alt="Delete User">
<img class="actionicons" src="<?php echo base_url()?>/img/delete.png" />
</a>

</td>
							</tr>
							 <?php $i++; }}else{
	echo "No user Found"; }?>
                              
                          </table>
                    </div>
                    <!-- table ends-->
              </div>
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
    
<?php  
 $sql=mysql_query("SELECT * FROM usermaster  where usermaster.parent_id!='$ids' && usermaster.uid!='$leave_id' 
  && usermaster.isdelete='$del'")or die(mysql_error());
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
<span class="IL_AD" id="IL_AD3"><input type="hidden" id="id" value="<?php echo $row['uid']; ?>">
<div class="row">
<div class="col-sm-6 col-xs-12">
<input type="hidden" id="id" value="<?php echo $row['uid']; ?>">
<label for="pop_name">Name</label>
<input type="text" class="form-control" id="fn<?php echo $row['uid']; ?>" value="<?php echo $row['name']; ?>">

</div>
<div class="col-sm-6 col-xs-12">
<label for="pop_name">Firm Name</label>
<input type="text" class="form-control" id="ln<?php echo $row['uid']; ?>" value="<?php echo $row['companyname']; ?>">
</div>

<div class="col-sm-6 col-xs-12">
<label for="pop_name">Mobile no</label>
<input type="text" class="form-control" id="age<?php echo $row['uid']; ?>" value="<?php echo $row['mobile']; ?>">
</div>
<div class="col-sm-6 col-xs-12">
<label for="pop_name">User Name</label>
<input type="text" class="form-control" id="ht<?php echo $row['uid']; ?>" value="<?php echo $row['username']; ?>">
</div>

<?php if($val=='admin') {?>
<div class="col-sm-6 col-xs-12">
<label for="pop_name">Password</label>
<input type="text" class="form-control" id="job<?php echo $row['uid']; ?>" value="<?php echo $row['password']; ?>">
</div>
<?php } ?>
<div class="col-sm-6 col-xs-12">
<label for="pop_name">Email</label>
<input type="email" class="form-control" id="mail<?php echo $row['uid']; ?>" value="<?php echo $row['email']; ?>" style="border: 1px solid #606060; height: 40px; padding: 5px 10px; width: 100%;">
</div>

<?php if($types=='distributor') {?>
<div class="col-sm-6 col-xs-12">
<label for="pop_name">User limit</label>
<input type="text" name="limit" class="form-control" id="limit<?php echo $row['uid']; ?>" value="<?php echo $row['adduser_limit']; ?>" required="required" onKeyPress="return isNumber(event)">
</div>
<?php }?>
<div class="col-sm-6 col-xs-12">
<label for="pop_name">Total balance</label>
<input type="text" name="total_balance" readonly class="form-control" id="job<?php echo $row['uid']; ?>" value="<?php echo $row['total_balance'];?>">
</div>

<div class="col-sm-6 col-xs-12">
<label for="pop_name">Locked balance</label>
<input type="text" name="locked_balance" readonly class="form-control" value="<?php echo $row['locked_balance']; ?>">
</div>

<div class="col-sm-6 col-xs-12">
<button type="button" onClick="updatedata('<?php echo $row['uid']; ?>')" class="btn btn-primary gradient_btn" style="margin-right:20px;">Save changes</button>
<button type="button" class="btn btn-primary gradient_btn" data-dismiss="modal">Close</button>
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
<form class="form" class="frmupdate" role="form" action="<?php echo site_url() ?>home/lock_update" method="POST"> 
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
<h2 class="modal-title" id="myModalLabel-<?php echo $row['uid']; ?>">Fund Transfer</h2>
</div>
<?php if($active=='no'){ ?>
<label for="pop_name">User is Inactive.</label>
<?php	}else{ ?>

<span class="IL_AD" id="IL_AD3"><input type="hidden" id="id" value="<?php echo $row['uid']; ?>">
<div class="row">
<div class="col-sm-6 col-xs-12">
<label for="pop_name">Type</label>
<input type="text" name="name" id="lock<?php echo $row['uid']; ?>" readonly class="form-control" value="Take">

</div>
<div class="col-sm-6 col-xs-12">
<label for="pop_name">Transfered By</label>
<input class="form-control" name="companyname" class="form-control" id="locked_buy<?php echo $row['uid']; ?>" readonly type="text" value="<?php $val=$this->session->userdata('type');echo $val;  ?>" >
</div>

<div class="col-sm-6 col-xs-12">
<label for="pop_name">Transfered to</label>
<input type="text" name="name" class="form-control" id="name<?php echo $row['uid']; ?>"readonly class="form-control" value="<?php echo $row['name']?>">

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

<div class="col-sm-6 col-xs-12">
<label for="pop_name">Transfered Amount</label>
<input type="text" name="amt"  class="form-control" id="transfered_amnt<?php echo $row['uid']; ?>"class="form-control" value="">
</div>

<div class="col-sm-6 col-xs-12">
<button type="button" onClick="update_fund_transfer('<?php echo $row['uid']; ?>')" class="btn btn-primary gradient_btn" style="margin-right:20px;">Transfered Amount</button>
<button type="button" class="btn btn-primary gradient_btn" data-dismiss="modal" style="width:130px;">Close</button>
</div>
<?php }?>

</div>
</form>
</div>
</div>
</div>
<!---==============FUND TRANSFER ENDS---======================--->

<!---==============LOCK FUND STARTS---======================--->
<div class="modal fade" id="lock_fund-<?php echo $row['uid']; ?>" tabindex="-<?php echo $row['uid']; ?>" role="dialog" aria-labelledby="myModalLabel-<?php echo $row['uid']; ?>" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
 <form class="form" class="frmupdate" role="form" action="<?php echo site_url() ?>home/lock_update" method="POST">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
<h2 class="modal-title" id="myModalLabel-<?php echo $row['uid']; ?>">Lock Fund</h2>
</div>
<?php if($active=='no'){ ?>
<label for="pop_name">User is Inactive.</label>
<?php	}else{ ?>

<span class="IL_AD" id="IL_AD3"><input type="hidden" id="id" value="<?php echo $row['uid']; ?>">
<div class="row">
<div class="col-sm-6 col-xs-12">
<label for="pop_name">Type</label>
<input type="text" name="name" id="lock<?php echo $row['uid']; ?>" readonly class="form-control" value="Lock">

</div>
<div class="col-sm-6 col-xs-12">
<label for="pop_name">Locked By</label>
<input class="form-control" name="companyname" class="form-control" id="locked_buy<?php echo $row['uid']; ?>" readonly type="text" value="<?php $val=$this->session->userdata('type');echo $val;  ?>" >
</div>

<div class="col-sm-6 col-xs-12">
<label for="pop_name">Locked to</label>
<input type="text" name="name" class="form-control" id="locked_to<?php echo $row['uid']; ?>"readonly class="form-control" value="<?php echo $row['name']?>">

<input type="hidden" name="locked_balance"  id="locked_balance<?php echo $row['uid']; ?>"value="<?php echo $row['locked_balance'];   ?>"/>
<input type="hidden" name="tot_bal" readonly class="form-control" id="total_balz<?php echo $row['uid']; ?>" value="<?php echo $row['total_balance']?>">
<input type="hidden" name="used_balance" class="form-control" id="used_balz<?php echo $row['uid']; ?>" readonly class="form-control" value="<?php echo $row['used_balance']?>">
</div>

<div class="col-sm-6 col-xs-12">
<label for="pop_name">Locked Amount</label>
<input type="text" name="ltransfered_amnt"  class="form-control" id="ltransfered_amnt<?php echo $row['uid']; ?>"class="form-control" value="">
</div>

<div class="col-sm-6 col-xs-12">
<button type="button" onClick="update_locked_amnt('<?php echo $row['uid']; ?>')" class="btn btn-primary gradient_btn" style="margin-right:20px;">Transfered Amount</button>
<button type="button" class="btn btn-primary gradient_btn" data-dismiss="modal" style="width:130px;">Close</button>
</div>
<?php }?>

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
<?php if($active=='no'){ ?>
<label for="pop_name">User is Inactive.</label>
<?php	}else if($row['locked_balance']=='0'){ ?>
<label for="pop_name">No Release amount.</label>
<?php } else  { ?>

<span class="IL_AD" id="IL_AD3"><input type="hidden" id="id" value="<?php echo $row['uid']; ?>">
<div class="row">
<div class="col-sm-6 col-xs-12">
<label for="pop_name">Type</label>
<input type="text" name="name" id="lock<?php echo $row['uid']; ?>" readonly class="form-control" value="Released">

</div>
<div class="col-sm-6 col-xs-12">
<label for="pop_name">Released By</label>
<input class="form-control" name="companyname" class="form-control" id="locked_buy<?php echo $row['uid']; ?>" readonly type="text" value="<?php $val=$this->session->userdata('type');echo $val;  ?>" >
</div>

<div class="col-sm-6 col-xs-12">
<label for="pop_name">Released to</label>
<input type="text" name="name" class="form-control" id="locked_to<?php echo $row['uid']; ?>"readonly class="form-control" value="<?php echo $row['name']?>">

<input type="hidden" name="locked_balance"  id="locked_balance<?php echo $row['uid']; ?>"value="<?php echo $row['locked_balance'];   ?>"/>
<input type="hidden" name="tot_bal" readonly class="form-control" id="total_balz<?php echo $row['uid']; ?>" value="<?php echo $row['total_balance']?>">
<input type="hidden" name="used_balance" class="form-control" id="used_balz<?php echo $row['uid']; ?>" readonly class="form-control" value="<?php echo $row['used_balance']?>">
</div>

<div class="col-sm-6 col-xs-12">
<label for="pop_name">Released Amount</label>
<input type="hidden" name="locked_balance"  id="amount<?php echo $row['uid']; ?>"value="<?php echo $row['locked_balance'];   ?>"/>
<input type="text" name="transfered_amnt"  class="form-control" id="transfered_amnt<?php echo $row['uid']; ?>" class="form-control" readonly value="<?php echo $row['locked_balance']?>">
</div>

<div class="col-sm-6 col-xs-12">
<button type="button" onClick="update_released_amnt('<?php echo $row['uid']; ?>')" class="btn btn-primary gradient_btn" style="margin-right:20px;">Transfered Amount</button>
<button type="button" class="btn btn-primary gradient_btn" data-dismiss="modal" style="width:130px;">Close</button>
</div>
<?php }?>

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
    
   var datas = "id="+id+"&fn="+fn+"&ln="+ln+"&age="+age+"&ht="+ht+"&limit="+limit+"&job="+job+"&mail="+mail;
    
   $.ajax({
       type: "POST",
       url: "<?=base_url('home/update')?>",
       data: datas,
       dataType: "html"
   }).done(function( msg ) {
       alert( msg ); window.location.href = 'home';
       viewdata();
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
       url: "<?=base_url('home/locked_balance')?>",
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
       url: "<?=base_url('home/released_balance')?>",
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
       url: "<?=base_url('home/update_funds_transfer')?>",
       data: datas,
       dataType: "html"
   }).done(function( msg ) {
       alert( msg ); window.location.href = 'home';
       viewdata();
   });
     }
    </script>    