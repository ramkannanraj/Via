<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
$(".show").hide();
    $(".cls").click(function(){
        $(".show").hide();
    });
    $(".btn2").click(function(){
        $(".show").show();
    });
});
</script>-->
<link rel='stylesheet' href='<?php echo base_url();?>assets/source/jquery.fancybox.css' type='text/css' media='all' />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type='text/javascript' src='<?php echo base_url();?>assets/source/jquery.fancybox.pack.js'></script>
<script type="text/javascript" src='<?php echo base_url();?>assets/js/script.js'></script>
</head>
<body>

<style>
.ta_top,.ta_top1,.ta_top2
{
	border:1px solid #9CF;
}
</style>

<div>
<form action="" method="post">
<table class="ta_top">
<tr >
<th class="ta_top1" width="120">Name</th>
<th class="ta_top1" width="120">Firm name</th>
<th class="ta_top1" width="120">Mobile no</th>
<th class="ta_top1" width="120">Parent id</th>
<th class="ta_top1" width="120">User code</th>
<th class="ta_top1" width="120">Total balance</th>
<th class="ta_top1" width="120">Locked balance</th>
<th class="ta_top1" width="120">Created date</th>
<th class="ta_top1" width="150">Down</th>
<?php if( $type=$this->session->userdata('type')=='admin'){
?>
<th width="100">Status</th>
<?php } ?>
<th class="ta_top1" width="80">Id</th>
<th class="ta_top1" width="160">Action</th>
</tr>


   <?php foreach($records as $record){ ?>  
 
<tr>
<td class="ta_top2"><?php echo $record->name; ?></td>
<td class="ta_top2"><?php echo $record->companyname; ?></td>
<td class="ta_top2"><?php echo $record->mobile; ?></td>
<td class="ta_top2"><?php echo $record->parent_id; ?></td>
<td class="ta_top2"><?php echo $record->username; ?></td>
<td class="ta_top2"><?php echo $record->total_balance; ?></td>
<td class="ta_top2"><?php echo $record->locked_balance; ?></td>
<td class="ta_top2"><?php echo $record->joindata; ?></td>
<td class="ta_top2"><a href="#myPopup" data-rel="popup" class="ui-btn ui-btn-inline ui-corner-all">Recharge history </a>| Ledger Report</td>
<?php if( $type=$this->session->userdata('type')=='admin'){
?>
<td class="ta_top2"><?php if ($record->isactive=='yes') { echo 'Active'; } else { echo 'Inactive'; } ?></td><?php } ?>
<td class="ta_top2"><?php echo $record->uid; ?></td>
<td class="ta_top2"><a href="#?uid=<?php echo $record->uid; ?>" class="topopup">Edit  </a>  |    Delete    |    Reverse
Fund Transfer | Lock Fund | Release Fund | Reset Password</td>
</tr>
<?php } ?>
</table>
</form>
</div>

     <div style="display:none">
      	<div id="popup_content" style="width:900px">
			<p><h3>Edit User</h3>
			<form action="" method="post">
            <table>
            <tr><th>User type</th><td><select name="type">
            <?php if( $type=$this->session->userdata('type')=='admin'){
?>
            <option value="distributor">Distributor</option>
            <option value="super">Super</option><?php } if( $type=$this->session->userdata('type')=='distributor'){?>
            <option value="retailer">Retailer</option> <?php } ?>
            </select></td></tr>
            <tr><th>User code</th><td><?php  echo  $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']. $_SERVER[ 'QUERY_STRING' ];    $url=parse_url("http://domain.com/site/gallery/1#photo45 ");
// echo $var; ?></td></tr>
             <tr><th>Name</th><td></td></tr>
              <tr><th>Gender</th><td>-</td></tr>
              <tr><th>Address</th><td><textarea name="address"></textarea></td></tr>
            </table>
			</form></p>
     </div>
    </div>

</body>
</html>