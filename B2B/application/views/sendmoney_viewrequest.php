<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/jquery-ui.css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/DataTables-1.10.7/media/css/jquery.dataTables_themeroller.css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/DataTables-1.10.7/media/css/jquery.dataTables.css"/>
        <script src="<?php echo base_url(); ?>/assets/js/jquery-1.10.2.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/jquery-ui.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
            $('#table_mobile').dataTable({});});
        </script>
</head>
<body>
<?php $this->load->view('common/header');?>
<?php $this->load->view('common/menu');?>
<style>
@media only screen and (min-width: 320px) {
.left-sidebar {
    margin-right: 0px !important;
}
}
</style> 
<style>
.ta_top,.ta_top1,.ta_top2
{
	border:1px solid #9CF;
}
</style>
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
                                        <div class="title">View Request Payment </div>
                                    </div>  
                                     <div class="widget-body">
										<div class="metro-nav">
                                        
<form action="<?=site_url('')?>" method="post">
<div class="table-responsive">
<table width="100%" border="0" class="display" id="table_mobile">
<thead>
<tr >
<th class="ta_top1" width="120">Sno</th>
<th class="ta_top1" width="120">Payment Mode</th>
<th class="ta_top1" width="120">Amount</th>
<th class="ta_top1" width="120">Date</th>
<th class="ta_top1" width="120">Bank</th>
<th class="ta_top1" width="120">Branch</th>
<th class="ta_top1" width="120">Bank Type</th>
<th class="ta_top1" width="120">Remarks</th>

</tr>
</thead>
 <tbody>
<?php 
$i=1;
foreach($records->result() as $record): ?>
     
 
<tr>
<td class="ta_top2"><?php echo $i++; ?></td>
<td class="ta_top2"><?php echo $record->payment_mode; ?></td>
<td class="ta_top2"><?php echo $record->amount; ?></td>
<td class="ta_top2"><?php echo $record->transfer_date; ?></td>
<td class="ta_top2"><?php echo $record->bank; ?></td>
<td class="ta_top2"><?php echo $record->branch; ?></td>
<td class="ta_top2"><?php echo $record->bank_detail; ?></td>
<td class="ta_top2"><?php echo $record->remark; ?></td>

</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
</form>
 </div>
									</div> 
                              	</div>
							</div>
						</div>
					<!-- Row End -->
					</div>
				<!-- Left Sidebar End -->
				</div>
				<!-- Dashboard Wrapper End -->
			</div>
		</div>         
</body>
</html>