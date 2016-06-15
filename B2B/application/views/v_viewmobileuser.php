<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<div>
<a href="<?=site_url('user/logout')?>" style="float: right;">logout</a>
</div>
<div>
<?php echo "Welcome ".$this->session->userdata('username');?>
<?php  echo $type=$this->session->userdata('type');
?>

</div>
<style>
.ta_top,.ta_top1,.ta_top2
{
	border:1px solid #9CF;
}
</style>
<div>
<form action="<?=site_url('user/viewuser_detail')?>" method="post">
<table class="ta_top">
<tr >
<th class="ta_top1" width="120">Name</th>
<th class="ta_top1" width="120">Firm name</th>
<th class="ta_top1" width="120">Mobile no</th>
<th class="ta_top1" width="120">Parent id</th>
<th class="ta_top1" width="120">User code</th>
<th class="ta_top1" width="120">Total balance</th>
<th class="ta_top1" width="120">Created date</th>
<th class="ta_top1" width="160">Action</th>
</tr>

     
    <?php foreach($records as $record){ ?>  
<tr>
<td class="ta_top2"><?php echo $record->name; ?></td>
<td class="ta_top2"><?php echo $record->companyname; ?></td>
<td class="ta_top2"><?php echo $record->mobile; ?></td>
<td class="ta_top2"><?php echo $record->parent_id; ?></td>
<td class="ta_top2"><?php echo $record->uid; ?></td>
<td class="ta_top2"><?php echo $record->total_balance; ?></td>
<td class="ta_top2"><?php echo $record->joindata; ?></td>
<td class="ta_top2">
<a href="<?=site_url('user/edituser1')?>/<?php echo $record->uid; ?>" class="topopup">Update mobile number</a></td>
</tr>
<?php } ?>
</table>
</form>
</div>

  

</body>
</html>