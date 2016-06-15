<div class="well">
    <div class="errorresponse">
        
    </div>
	
    <form class="form" class="frmupdate" role="form" action="<?php echo site_url() ?>home/update" method="POST">
	
    <?php foreach($query->result() as $row):?>
                        
                           <div class="form-group">  
                            <label for="exampleInputEmail2">Name</label>
                            <input type="text" name="name" class="form-control" required="required" value="<?php echo $row->name?>">
                          </div>         
                          <div class="form-group">
                            <label for="exampleInputEmail2">Firm name</label>
                            <input class="form-control" name="companyname" type="text" required="required" value="<?php echo $row->companyname?>" >
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword2">Mobile no</label>
                            <input type="text" class="form-control" name="mobile" required="required" value="<?php echo $row->mobile?>" onkeypress="return isNumber(event)">
                          </div>
                            
						   <div class="form-group">
                            <label for="exampleInputPassword2">User Name</label>
                            <input type="text" name="username" class="form-control" required="required" value="<?php echo $row->username?>">
                          </div>
						  <div class="form-group">
                            <label for="exampleInputPassword2">Password</label>
                            <input type="text" name="password" class="form-control" required="required" value="<?php echo $row->password?>">
                          </div>
                          <?php
						  if($row->type=='distributor')
                           {?>
                          <div class="form-group">
                            <label for="exampleInputPassword2">User limit</label>
                            <input type="text" name="limit" class="form-control" value="<?php echo $row->adduser_limit?>" required="required" onkeypress="return isNumber(event)">
                          </div>
                          <?php }?>
						  <div class="form-group">
                            <label for="exampleInputPassword2">Total balance</label>
                            <input type="text" name="total_balance" readonly class="form-control" value="<?php echo $row->total_balance?>">
                          </div>
						  
						  <div class="form-group">
                            <label for="exampleInputPassword2">Locked balance</label>
                            <input type="text" name="locked_balance" readonly class="form-control" value="<?php echo $row->locked_balance?>">
                          </div>
						 
                            <div class="form-group">
                                <input type="hidden" name="hidden" value="<?php $uid=$row->uid; echo $uid ?>"/>
                           <input type="submit" class="btn btn-success" id="exampleInputPassword2" value="update">
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
            url:'<?php echo site_url() ?>home/update',
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