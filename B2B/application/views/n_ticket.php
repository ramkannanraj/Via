<div class="well">
    <div class="errorresponse">
        
    </div>
	
    <form class="form" class="frmupdate" role="form" action="<?php echo site_url() ?>report/createticket" method="POST">
	
    <?php foreach($query->result() as $row):?>
                        
                           <div class="form-group">  
                            <label for="exampleInputEmail2">Transaction ID</label>
                            <input type="text" name="id" class="form-control" readonly value="<?php echo $row->id?>">
                          </div>         
                          <div class="form-group">
                            <label for="exampleInputEmail2">Reason</label>
                             <textarea class="form-control" name="reason" required></textarea>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword2">Created By ID</label>
                            <input type="text" class="form-control" name="create_id" readonly value="<?php echo $this->session->userdata('uid');?>">
                          </div>
                            						  
						 						  
                            <div class="form-group">
                                  <input type="hidden" name="hidden" value="<?php $id=$row->id; echo $id ?>"/>
                                 <input type="hidden" name="hidden1" value="<?php echo $this->session->userdata('uid');?>"/>
                                  <input type="hidden" name="date" value="<?php echo $date = date('Y-m-d H:i:s');?>"/>
                                 <input type="hidden" name="user_id" value="<?php $user_id=$row->by_id; echo $user_id ?>"/>
                           <input type="submit" class="btn btn-success" id="exampleInputPassword2" value="Create">
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
            url:'<?php echo site_url() ?>report/createticket',
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





