    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>
<br>
    <div class="container">
      <div id="viewdata">  <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12" style="margin-left: -48px;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Refund Report
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">

                             <!-- /#wrapper -->
	<form action="" enctype="multipart/form-data" method="post">
 
	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
            
                                            <thead>

                                                <tr>
<th>Sl.No</th>
                                                    <th>User Id</th>                                                   

                                                    <th >Mobile Number</th>                                                  

                                                    <th >Amount</th>                                                              

                                                    <th>Operator</th>

                                                    <th>Date</th>

													<th >Status</th> 

													<th >Refunded Date</th>

													<th >Balance After Refund</th>

                                                 </tr>

                                            </thead>

                                            <tbody>
<?php if($querys>0){?>

                                                 <?php 
												 $i=1;
												 foreach($querys as $row):?>

                                                <tr>

                                             <?php  $date=date ("d-M-Y ",strtotime($row->rdate));

                                                    $date1=date ("d-M-Y ",strtotime($row->refund_date));

													$tot=$row->total_balance;

													$used=$row->used_balance;

													$refund_bal=$tot-$used;?>
 <td><?php echo $i;?></td>
                                                    <td><?php echo $row->by?></td>

                                                    <td><?php echo $row->mobile?></td>

                                                    <td><?php echo $row->amount?></td>

                                                    <td><?php echo $row->service?></td>

                                                    <td><?php echo $date?></td>

                                                    <td><?php echo $row->result?> </td>

                                                   

                                                    <td><?php echo $date1?></td>          

                                                    <td><?php echo $refund_bal?></td>

                                                </tr>

                                                 <?php $i++; endforeach;}?>
 

                                            </tbody>

                                        </table>
					</div>

                                        </div>

									</div> 

								</div>

							</div>

						</div>

					<!-- Row End -->

   <script src="<?php echo base_url();?>/bower_components/jquery/dist/jquery.min.js"></script>
  
    <script src="<?php echo base_url();?>/bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <script src="<?php echo base_url();?>/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
  
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

					</div>

				<!-- Left Sidebar End -->

				</div>

				<!-- Dashboard Wrapper End -->

			</div>

		</div>         

    </body>

</html>