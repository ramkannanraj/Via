<div class="well">
    <div class="errorresponse">
        
    </div>
	
    <form class="form" class="frmupdate" role="form" action="<?php echo site_url() ?>paymentreversal/fund_update" method="POST">
	
    <?php foreach($querys->result() as $row):?>
                        
                           <div class="form-group">  
                            <label for="exampleInputEmail2">Name</label>
                            <input type="text" name="name" class="form-control" readonly value="<?php echo $row->distributor_name?>">
                          </div>         
                          <div class="form-group">
                            <label for="exampleInputEmail2">Amount</label>
                            <input class="form-control" name="amount" type="text" readonly value="<?php echo $row->transaction_amount?>" >
                          </div>
						  <?php if($row->request_type=='1') { ?>
                          <div class="form-group">
                            <label for="exampleInputPassword2">Smartcard Number</label>
                            <input type="text" class="form-control" name="mode" readonly value="<?php echo $row->smartcard_number?>">
                          </div>
						  <?php }?>
						 
						   <div class="form-group">
                            <label for="exampleInputPassword2">Date</label>
                            <input type="text" name="date" class="form-control" readonly value="<?php echo $row->transaction_date?>">
                          </div>
						   <?php if($row->request_type=='1') { ?>
						  <div class="form-group">
                            <label for="exampleInputPassword2">Transaction Number</label>
                            <input type="text" name="bank" class="form-control" readonly value="<?php echo $row->transaction_number?>">
                          </div>
						   <?php }?>
						  
                            <div class="form-group">
                                <input type="hidden" name="hidden" value="<?php $id=$row->reversal_id; echo $id ?>"/>
   <input type="hidden" name="mobile" value="<?php $mobile=$row->mobile; echo $mobile ?>"/>
								<input type="hidden" name="type" value="<?php $type=$row->type; echo $type ?>"/>
								<input type="hidden" name="sesstype" value="<?php $stype=$this->session->userdata('type'); echo $stype ?>"/>
								<input type="hidden" name="sessname" value="<?php $sname=$this->session->userdata('username'); echo $sname ?>"/>
								<input type="hidden" name="usename" value="<?php $usename=$row->username; echo $usename ?>"/>
								<input type="hidden" name="userid" value="<?php $uid=$row->requester_id; echo $uid ?>"/>
								<input type="hidden" name="parentid" value="<?php $pid=$row->parent_id; echo $pid ?>"/>
								<input type="hidden" name="totalbal" value="<?php $tot=$row->total_balance; echo $tot ?>"/>
								<input type="hidden" name="usedbal" value="<?php $used=$row->used_balance; echo $used ?>"/>
								<input type="hidden" name="totalbal1" value="<?php $tot1=$this->session->userdata('total_balance'); echo $tot1 ?>"/>
<input type="hidden" name="sname" value="<?php $sname=$this->session->userdata('name'); echo $sname ?>"/>
								<input type="hidden" name="uname" value="<?php $uname=$row->name; echo $uname ?>"/>
								 <?php foreach($querys1->result() as $row1):?>
								<input type="hidden" name="usedbal1"" value="<?php $used1=$row1->used_balance; echo $used1 ?>"/>
								<?php endforeach;?>
                           <input type="submit" class="btn btn-success" id="exampleInputPassword2" value="Transfer">
                          </div>
						   
        <?php endforeach;?>
                        </form>
						
                    </div>
</div>

<script>
$(document).ready(function (){
    $(".frmupdate").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'<?php echo site_url() ?>paymentreversal/fund_update',
            type:'POST',
            dataType:'json',
            data: $(".frmupdate").serialize()
        }).done(function (data){
            window.mydata = data;
                if(mydata['error'] !=""){
                    $(".errorresponse").html(mydata['error']);
                }
                else{
                $(".errorresponse").text('');
                $('.frmupdate')[0].reset();
                $("#response").html(mydata['success']);
                
                $.colorbox.close();
                $("#response").html(mydata['success']);
                }
        });
    });    
});

    
</script>
</body>
</html>






