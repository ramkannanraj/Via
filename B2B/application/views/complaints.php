<div class="container-fluid">
      <!--  <button class="toggle-menu menu-left push-body gradient_btn1">Menu</button>-->
    	<div class="admin-page2">
        
        	<div class="row">
            	<div class="col-xs-12">
                <div class="panel dashboard">
                <div class="panel-body">
            
                    <div class="mobile-1">
                        <p>Complaints</p>
                 </div>
                    
                    <div class="col-xs-12 table-responsive">
                          <table class="table air-table1 air-table2 service" id="dataTables-example">
                            <thead>
                            <tr class="table-title">
                                <th>Ticket no</th>
                                <th>Date</th>
                                <th>Transaction Id</th>
                                <th>Query</th>
                                <th>Created by</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                             <tbody id="fillgrid">
                                               <!--?php
             while ($row = mysql_fetch_array($result)) {
             ?-->
             <tr>
                  <td><!--?=$row['Id']?--></td>
                  <td><!--?=$row['FirstName']?--></td>
           <td><!--?=$row['LastName']?--></td>
                  <td><!--?=$row['City']?--></td>
                  <td><!--?=$row['City']?--></td>
                  <td><!--?=$row['City']?--></td>
                  </tr>
                  <!--?php
           }
       ?-->
                                            </tbody>  
                              
                          </table>
                    </div>
                    <!-- table ends-->
              </div>
                 <!-- service pre-paid ends-->
               
                </div>
                </div>
                
               
          </div>
            <!-- row ends-->
        </div>
        <!-- admin-page1 ends -->
    </div>
 <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>   
    <script>
$(document).ready(function (){

     //fill data
       var btnstatus='';
        fillgrid();
        // add data
    function fillgrid(){

        $.ajax({
			
            url:'<?php echo base_url(); ?>/index.php/complaints/fillgrid',
            type:'GET'
        }).done(function (data){
            $("#fillgrid").html(data);
            $("#loader").hide();
            btnstatus = $("#fillgrid .btnstatus");

            var viewurl = btnstatus.attr('href');
            //view record
            btnstatus.on('click', function (e){
                e.preventDefault();
                var viewid = $(this).data('id');
				
				
				$.colorbox({
					
                href:"<?php echo base_url()?>/index.php/complaints/popup/"+viewid,
                top:50,
                width:500,
                onClosed:function() {fillgrid();}
                });
            });
            
        });
	}
	
});
</script>