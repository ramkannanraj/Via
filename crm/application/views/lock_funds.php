<div class="well">
    <div class="errorresponse">
        
    </div>
	
    <form class="form" class="frmupdate" role="form" action="<?php echo site_url() ?>home/lock_update" method="POST">
	
    <?php foreach($querys->result() as $row):?>
                            
							<?php
							if($row->isactive=='no')
							{ ?>
							<div class="form-group">  
                          <label for="exampleInputEmail2"> User is Inactive.</label>
                          </div> 	
					  <?php	}else{
							?>
						
                            <div class="form-group">  
                            <label for="exampleInputEmail2">Type</label>
                            <input type="text" name="name" readonly class="form-control" value="Lock">
                          </div>         
                          <div class="form-group">
                            <label for="exampleInputEmail2">Locked By</label>
                            <input class="form-control" name="companyname" readonly type="text" value="<?php $val=$this->session->userdata('type');echo $val;  ?>" >
                          </div>
                        <!--  <div class="form-group">
                            <label for="exampleInputPassword2">Locked By ID</label>
                            <input type="text" class="form-control" readonly name="parent_id" value="<?php echo $row->parent_id?>">
                          </div>-->
                            
						   <div class="form-group">
                            <label for="exampleInputPassword2">Locked To</label>
                            <input type="text" name="name" readonly class="form-control" value="<?php echo $row->name?>">
                          </div>
						 <!--  <div class="form-group">
                            <label for="exampleInputPassword2">Locked to ID</label>
                            <input type="text" name="uid" readonly class="form-control" value="<?php echo $row->uid?>">
                             <input type="hidden" name="tot_bal" readonly class="form-control" value="<?php echo $row->total_balance?>">
                             <input type="hidden" name="used_balance" readonly class="form-control" value="<?php echo $row->used_balance?>">
                          </div>-->
						 <input type="hidden" name="tot_bal" readonly class="form-control" value="<?php echo $row->total_balance?>">
                             <input type="hidden" name="used_balance" readonly class="form-control" value="<?php echo $row->used_balance?>">
						  <div class="form-group">
                            <label for="exampleInputPassword2">Transfered Amount</label>
                            <input type="text" name="amt"  class="form-control" value="">
                          </div>
						   <?php  /*$res_total_balz=$row->total_balance;$vars='0';

if($res_total_balz ===$vars){*/ ?>
<div class="form-group">

<!--<input type="button" class="btn btn-success" id="exampleInputPassword2" value="InSufficiant balance">-->
</div>
<?php  /*}     else{*/?>
                            <div class="form-group">
							<input type="hidden" name="total_balance" value="<?php echo $row->total_balance;   ?>"/>
								<input type="hidden" name="locked_balance" value="<?php echo $row->locked_balance;   ?>"/>
                                <input type="hidden" name="hidden" value="<?php $uid=$row->uid; echo $uid ?>"/>
                            <input type="submit" class="btn btn-success" id="exampleInputPassword2" value="update">
                          </div>
						  <?php }?>
        <?php endforeach;?>
                        </form>
						
                    </div>
</div>

<script>
$(document).ready(function (){
    $(".frmupdate").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'<?php echo site_url() ?>home/lock_update',
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