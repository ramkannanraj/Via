<!DOCTYPE html>
<html lang="en">
    <head>
           <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css"/>
            <link rel="stylesheet" href="<?php echo base_url(); ?>assets/DataTables-1.10.7/media/css/jquery.dataTables_themeroller.css"/>
            <link rel="stylesheet" href="<?php echo base_url(); ?>assets/DataTables-1.10.7/media/css/jquery.dataTables.css"/>
            <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script>
            <script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
            <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>-->

             <link rel="stylesheet" href="<?php echo base_url(); ?>assets/DataTables-1.10.7/media/css/jquery.dataTables_themeroller.css"/>
            <link rel="stylesheet" href="<?php echo base_url(); ?>assets/DataTables-1.10.7/media/css/jquery.dataTables.css"/>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
            <link href="http://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.4.33/example1/colorbox.min.css"
             rel="stylesheet"/>
            <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
            <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.4.33/jquery.colorbox-min.js"></script>
            <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
            <script>
                $(document).ready(function() {
                $('#table_reversal_request').dataTable({});});
            </script>
        </head>
    <body>
    	<div class="dashboard-container">
            <div class="container">
                <div class="dashboard-wrapper">
    
                    <!-- Left Sidebar Start -->
                    <div class="left-sidebar">
    
                        <!-- Row Start -->
                        <div class="row"  style="width:120%">
                            <div class="col-lg-12 col-md-12">
                                <div class="widget">
                                    <div class="widget-header">
                                        <div class="title">
                                             View Reversal Request
                                        </div>
                                     </div> 
                                     <div class="widget-body">
										<div class="metro-nav">   
                                             <table border="0" class="display" id="table_reversal_request">
                                                <thead>
                                                    <tr>
                                                        <th width="10%" scope="col">Type</th>
                                                        <th width="20%" scope="col">Distributor / Retailer Name</th>
                                                        <th width="10%" scope="col">Distributor / Retailer Number</th>
                                                        <th width="10%" scope="col">Transaction Amount</th>       
                                                        <th width="20%" scope="col">Transaction Date</th>
                                                        <th width="10%" scope="col">Transaction Number</th>
                                                        <th width="10%" scope="col">Date</th>
                                                        <th width="10%" scope="col">ID</th>
                                                        <th width="10%" scope="col"></th>
                                                    </tr>
                                                	</thead>
                                                    <tbody id="fillgrid">
                                            	</tbody> 	
                                    		</table>
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
<script>
$(document).ready(function (){
     //fill data
       var btnview='';
        fillgrid();
        // add data
      
    
    
    function fillgrid(){
		
      
        $.ajax({
			
            url:'<?php echo base_url(); ?>/index.php/reversal/fillgrid',
            type:'GET'
        }).done(function (data){
            $("#fillgrid").html(data);
            $("#loader").hide();
            btnview = $("#fillgrid .btnview");
           
            
            var viewurl = btnview.attr('href');
            //view record
            btnview.on('click', function (e){
                e.preventDefault();
                var viewid = $(this).data('id');
				$.colorbox({
					
                href:"<?php echo base_url()?>/index.php/reversal/view/"+viewid,
                top:50,
                width:500,
                onClosed:function() {fillgrid();}
                });
            });
            
        });
	}
	
});
</script>