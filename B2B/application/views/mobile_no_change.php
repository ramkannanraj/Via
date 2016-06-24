<div class="container-fluid">
     
    	<div class="admin-page2">
        	<div class="row">
            	<div class="col-xs-12">
                <div class="panel dashboard">
                	<div class="panel-body">
               			 <div class="form-group">
                    
                    	<?php if($type === "distributor" ||$type === "super" ){?>
                        <a href="<?php echo site_url('user/createuser') ?>" class="btn btn-primary">Create User</a>
                        <a href="<?php echo site_url('home/index') ?>" class="btn btn-primary">View User</a></li>
                        
                    	<?php } if($type === "admin"  ){?>
                    	<a href="<?php echo site_url('user/createuser') ?>" class="btn btn-primary">Create User</a>
                        <a href="<?php echo site_url('home/index') ?>" class="btn btn-primary">View User</a>
                        <a href="<?php echo site_url('mobile_no_change/index') ?>" class="btn btn-default chg-mobi-no ">Change Mobile No</a>
                        <?php } if($type === "admin"){ ?>
                        <a href="<?php echo site_url('user/viewbalance/distributor') ?>" class="btn btn-primary">View Balance</a>
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
                                <th>User Code</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
 <?php  
 $val=$this->session->userdata('type');
	$leave_id=$this->session->userdata('uid');
	$del="no";
$sql=mysql_query("SELECT * FROM usermaster  where usermaster.parent_id='$leave_id' && usermaster.uid!='$leave_id' 
  && usermaster.isdelete='$del'")or die(mysql_error());
$i=1;
				if(mysql_num_rows($sql)>0)
				{
while($row=mysql_fetch_array($sql))
{
 $active=$row['isactive'];
	 $parent=$row['parent_id'];
      $this->db->select('*');
      $this->db->from('usermaster');
      $this->db->where('uid',$parent);                             
      $query = $this->db->get(); 
      foreach ($query->result() as $row2)
      {
	
         $var=$row2->name;

      }               
?>			 
							<tr>
								<td class="center"><?php echo $i ;?></td>
								<td class="center"><?php echo $row['name'];?></td>
								<td class="center"><?php echo $row['companyname'];?></td>
								<td class="center"><?php echo $row['mobile'];?></td>
								<td class="center"><?php echo $var;?></td>
				
<td class="center">
<a data-toggle="modal" data-target="#edit_modify-<?php echo $row['uid'];?>"> <img src='<?php echo base_url(); ?>img/edit.png' height="20" width="20" title='modify'></a> 
</td> 	

							</tr>
							 <?php $i++; }}else{
	echo "No user Found"; }?>
						 	 
						  </tbody>
                              
                          </table>
                    </div>
				 <?php  
 $sql=mysql_query("SELECT * FROM usermaster  where usermaster.parent_id='$leave_id' && usermaster.uid!='$leave_id' 
  && usermaster.isdelete='$del'")or die(mysql_error());
while($row=mysql_fetch_array($sql))
{
 
?>    
    
    <!-- POPUP STARTS -->
<div class="modal fade" id="edit_modify-<?php echo $row['uid']; ?>" tabindex="-<?php echo $row['uid']; ?>" role="dialog" aria-labelledby="myModalLabel-<?php echo $row['uid']; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                        	
                            	<div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                    <h2 class="modal-title" id="myLargeModalLabel-<?php echo $row['uid']; ?>">Change Mobile Number</h2>
                                </div>
                                <div class="modal-body">
                               <form>
                                <div class="row">
                                	<div class="form-group col-sm-12 col-xs-12">
                                    <input type="hidden" id="id" value="<?php echo $row['uid']; ?>">
                                    	<label for="pop_name">Name</label>
                                        <input type="text" class="form-control" id="fn<?php echo $row['uid']; ?>" value="<?php echo $row['name']; ?>">
                                    </div>
                                    <div class="form-group col-sm-12 col-xs-12">
                                    	<label for="pop_name">Old Mobile Number</label>
                                        <input type="text" class="form-control" id="ln<?php echo $row['uid']; ?>" readonly value="<?php echo $row['mobile']; ?>">
                                    </div>
                                    <div class="form-group col-sm-12 col-xs-12">
                                    	<label for="pop_mob">New Mobile Number</label>
                                        <input type="text" class="form-control" id="mob<?php echo $row['uid']; ?>"required maxlength="10" minlength="10" number="true" onKeyPress="return isNumber(event)"  value="">
                                    </div>
                                    
                                    <div class="modal-footer">
                                    <div class="form-group col-sm-12 col-xs-12">
<button type="button" class="btn btn-default" data-dismiss="modal" style="width:50px;">Close</button>
<button type="submit" onClick="updatedata('<?php echo $row['uid']; ?>')" class="btn btn-default" style="margin-left:20px;">Save changes</button>
</div></div>
                                </div>
                                <!-- row ends -->
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- POPUP ENDS -->
                <?php } ?>
                	 
                </div>
                      
          </div>
                <!-- col-xs-12 ends-->
               
             
                 <!-- service pre-paid ends-->
                
         
         
            <!-- row ends-->
                
               </div> 
                
        </div>
        <!-- admin-page1 ends --></div>
        
        </div>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
   
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

</script>

  <script type="text/javascript">
    function viewdata(){
      $.ajax({
   type: "GET",
   url: "<?php echo base_url('mobile_no_change/view_records')?>",
   dataType: "html"
      }).done(function( msg ) {
   $( "#viewdata" ).html( msg );
      }).fail(function( jqXHR, textStatus ) {
   alert( "Request failed: " + textStatus );
      });
     }
     function updatedata(str){
   var id = str;
   var fn = $('#fn'+str).val();
   var ln = $('#ln'+str).val();
   var mob = $('#mob'+str).val();
 
    
   var datas = "id="+id+"&fn="+fn+"&ln="+ln+"&mob="+mob;
      
	 
   $.ajax({
       type: "POST",
       url: "<?php echo base_url('mobile_no_change/mobile_no_update')?>",
       data: datas,
       dataType: "html"
   }).done(function( msg ) {
       alert( msg ); 
	 //  window.location.href = 'mobile_no_change';
       //viewdata();
  	 location.reload();
  
   });
     }
   </script>
    
    
    <!-- RESP MENU STARTS -->
<!--load jPushMenu, required-->

<!-- RESP MENU ENDS -->