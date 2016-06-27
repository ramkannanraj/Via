<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/jquery-ui.css"/>


<!-- <script src="<?php echo base_url(); ?>/assets/js/jquery-1.10.2.js"></script>
  <script src="<?php echo base_url(); ?>/assets/js/jquery-ui.js"></script>-->
<!--   <script src="<?php echo base_url(); ?>/assets/js/jquery.dataTables.min.js"></script>             
  -->              
<script>
  $(function() {
    $( "#report_from_date").datepicker({ dateFormat: 'yy-mm-dd',changeMonth: true, changeYear: true ,yearRange: "2015:2075"});
	 $( "#report_to_date").datepicker({ dateFormat: 'yy-mm-dd',changeMonth: true, changeYear: true ,yearRange: "2015:2075" });
	 
  });
  </script> 
    
   
   
<div class="container-fluid">
      <!--  <button class="toggle-menu menu-left push-body gradient_btn1">Menu</button>-->
    	<div class="admin-page2">
        
        	<div class="row">
            	<div class="col-xs-12">
                <div class="panel dashboard">
                <div class="panel-body">
                	<div class="form-group">
                    <?php $type=$this->session->userdata('type');
					 if($type === "admin" || $type === "distributor" || $type === "retailer"){ ?>
                      <a href="<?php echo site_url('transfer/get_transfer_details') ?>" class="btn btn-default active">View Transfer</a><?php } ?>
                        
                        <?php if($type === "admin" ){?>
                 <a href="<?php echo site_url('sendmoney_transfer/get_sendmoney_details') ?>" class="btn btn-warning">View Sendmoney Transfer</a><?php } ?>
                        
                        
                    </div>
                    
                     <div class="mobile-1">
                        <p>Sendmoney Transfer Detail</p>
                    </div>
    
                    <form action="<?=site_url('sendmoney_transfer/get_sendmoney_details')?>" method="post" name="transfer_det" id="transfer_det">
                   
  <?php  if($this->session->userdata('type')=="admin"){ ?>
  <div class="form-group col-lg-3">
 		
         <select name="distributor" class="form-control" id="distributor"  >
         <option value="">Select Distributor</option>
    	 <?php $i=1; foreach($distributors as $distributor){//ezypay_prcode ?> 
        
         <option value="<?php  echo $distributor->uid; //ezypay_prcode; ?>"> <?php  echo $distributor->name; ?></option>
         <?php } ?> 
    </select>
    </div>
    <?php } ?>
    
     <?php  if($this->session->userdata('type')=="admin"  || $this->session->userdata('type')=="distributor" ){  ?>
    <div class="form-group col-lg-3">
    
         <select name="retailer" class="form-control" id="retailer"  >
         <option value="">Select Retailer</option>
    	 <?php  foreach($retailers as $retailer){//ezypay_prcode ?> 
         <option value="<?php  echo $retailer->uid; //ezypay_prcode; ?>"> <?php  echo $retailer->name; ?></option>
         <?php } ?> 
    </select>
    </div>
 <!--   

	<input type="submit" id="showLoader"   value="Go" class="btn btn-small btn-info" style="font-weight:15px;width: 120px; height: 35px;font-size: 15px;"/>
    -->
    <?php } ?>
	 <div class="form-group col-lg-2">
         
         <input class="form-control" placeholder="From date"  type="text" id="report_from_date" name="from_date" value="" /> 
         </div>
         <div class="form-group col-lg-2">
         
         <input placeholder="To date" readonly type="text" id="report_to_date" name="to_date" value=""  class="form-control"/>
          </div>
          <div class="form-group col-lg-2">
                                    <input  class="btn btn-primary form-control" type="submit" value="Submit">
                                    <?php //if(!empty($_REQUEST['from_date']) || !empty($_REQUEST['to_date']) ){ ?>
                                    <?php //} ?>
               </div>                  
                                </form>
                                
                                 
                           <?php  if($this->session->userdata('type')=='admin' || $this->session->userdata('type')=='distributor' || $this->session->userdata('type')=='retailer' ){ ?>                      
                    <div class="col-xs-12 table-responsive">
                          <table class="table air-table1 air-table2" id="dataTables-example">
                            <thead>
                            <tr class="table-title">
                               <th scope="col">Date</th>
                                <th scope="col">Transaction Type</th>
                                <th scope="col">Comment</th>
                                <th scope="col">Debit</th> 
                                <th scope="col">Credit</th> 
                                <th scope="col">Balance</th>
                                <th scope="col">Type</th>
                                <th scope="col">Mobile Number</th> 
                                 <th scope="col">Status</th>
         <?php   if($this->session->userdata('type')=='admin' ){   ?> <th scope="col">Action</th> <?php }  ?>
                            </tr>
                            </thead>
                                <tbody> 
          <?php foreach($results as $post){ ?>
     <tr>
                 <?php
        $date= $post->date_part;
        $fdate=date('d M Y',strtotime($date));  
        ?>
          <td><?php echo $fdate;?></td>
           <td><?php echo $post->leg_typ;?></td>
         <td><?php echo $post->comment;?></td>
          <td><?php echo $post->amount;?></td>  
          <td><?php echo $post->credit;?></td>  
          <td><?php echo $post->balance;?></td> 
         <td><?php echo $post->user_type;?></td>
           <td><?php echo $post->mobile;?></td>
            <td><?php echo $post->transaction_status;?></td>
            <?php   if($this->session->userdata('type')=='admin' ){   ?> <td>
             <?php   if(  $post->leg_typ !="Refund" && $post->transaction_status !="Refunded" ){   ?> 
            <a href="javascript:void(0);" class="refund_link" rel="<?php echo $post->id;?>" title="Refund Transfer" alt="<?php echo $post->username;?>" >Refund</a>  <?php }  ?>  </td> <?php }  ?>
     <!-- <td><a href="javascript(void);" data-toggle="modal" data-target="#refund_transfer" rel="<?php echo $post->id;?>" title="Refund Transfer" alt="<?php echo $post->username;?>" >Refund</a> </td>-->
      </tr>    
     <?php } ?>  
    </tbody>
                          </table>
                    </div>
                    
                    <?php }	?> 
                </div>
                
<!---==============Refund TRANSFER STARTS---======================--->
<div class="modal fade" id="refund_transfer"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<form class="form" class="frmupdate" role="form" action="<?php echo site_url() ?>transfer/refund" method="POST"> 
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
<h2 class="modal-title" id="myModalLabel">Refund Transfer</h2>
</div>

<div class="modal-body">

<?php $active=""; if($active=='no'){ ?>
<label for="pop_name">User is Inactive.</label>
<?php	}else{ ?>

<span class="IL_AD" id="IL_AD3"></span>
<div class="row">
<div class="form-group col-sm-6 col-xs-12">
<label for="pop_name">Type</label>
<input type="text" name="type" id="type" readonly class="form-control" value="Refund">

</div>
<div class="form-group col-sm-6 col-xs-12">
<label for="pop_name">Refund By</label>
<input class="form-control" name="Refunded_by" id="Refunded_by" readonly type="text" value="<?php echo $this->session->userdata('username');?>" >
</div>

<div class="form-group col-sm-6 col-xs-12">
<label for="pop_name">Refund to</label>
<input type="text" name="refunded_to" class="form-control" id="refunded_to" readonly value="">
  
<input type="hidden" name="refunded_to_id" id="refunded_to_id" value=""/>
<input type="hidden" name="led_id" id="led_id" value=""/>
</div>

<div class="form-group col-sm-6 col-xs

-12">
<label for="pop_name">Refund Amount</label>
<input type="text" name="refunded_amount"  class="form-control" id="refunded_amount" value="">
</div>

<div class="form-group col-sm-12 col-xs-12">
<div class="pull-right">
<button type="button" id="refund_btn"  class="btn btn-primary" style="margin-right:20px;">Refund</button>
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
<!---==============FUND TRANSFER ENDS---======================--->
 
<!--<script src="<?php echo base_url()?>/bower_components/metisMenu/dist/metisMenu.min.js"></script>
<script src="<?php echo base_url()?>/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js">-->
</script>
<script>
$(document).ready(function() {
	$('#example').dataTable({
    });
	
	 $('#transfer_det').on('submit', function(e){
		var from_date=$('#report_from_date').val();
		var to_date= $('#report_to_date').val();
		if(from_date =='')
		{
			alert('Please Choose date');
			e.preventDefault();	
		}
		
	});
    
});
</script>

<script>
$(document).ready(function() {
$('#dataTables-example').DataTable({
responsive: true
});
});

	$(document).on('change','#distributor',function(){
	
	var dis_id = $(this).val();
           $.ajax({
                type: "POST",
                url: "<?php echo  site_url();?>reports/get_retailer_by/"+dis_id, 
                success: function(result) 
                { 
				var ret = JSON.parse(result);
				 $('#retailer').empty();
					$('#retailer').append('<option value="">Select</option>');
                    $.each(ret,function(id,data) 
                    {
                        var opt = $('<option />');
                        opt.val(data.uid);
						opt.text(data.name);
                        $('#retailer').append(opt);
                    }); 
  				}
 			});
	
	
});
	$(document).on('click','#refund_btn',function(){
	
 return;
	var refund_amount = $('#refunded_amount').val();
	
	var id = $('#led_id').val();
					
	
	 var datas = "id="+id+"&refund_amount="+refund_amount; 
  
  $.ajax({ 
       type: "POST",
       url: "<?=base_url('transfer/refund/')?>",
       data: datas,
       dataType: "html"
   }).done(function( msg ) {
       alert( msg ); 
	   $('#refund_transfer').modal('hide'); 
        location.reload();

   });
   
   
	
	
});

$(document).on('click','.refund_link',function(){
	  	
	//alert( $(this).attr('rel') + "   " + $(this).attr('alt'));
	var to_id =  $(this).attr('rel');
	
	
	$('#refunded_to').val( $(this).attr('alt') );
	
	$('#led_id').val(to_id );
	 
 	//jQuery.noConflict(); 
$('#refund_transfer').modal('show'); 
	 
	
});
    </script>
    
    
    
                    
                <!-- col-xs-12 ends-->
                
                 <!-- service pre-paid ends-->
             </div>
             </div>
            </div>
            <!-- row ends-->
        </div>
        <!-- admin-page1 ends -->
    </div>
    
    
    <!-- RESP MENU STARTS -->
    
<!--load jPushMenu, required-->
     
<!-- RESP MENU ENDS -->


  
    