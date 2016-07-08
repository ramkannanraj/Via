<div class="well">
    <div class="errorresponse">
        
    </div>
    <form class="form" id="frmupdate" role="form" action="<?php echo base_url() ?>report/reply" method="POST">
    <?php foreach($query->result() as $row):?>
                           <div class="form-group">  
                            <label for="exampleInputEmail2">Ticket Number</label>
                            <input type="text" name="t_id" class="form-control" value="<?php echo $row->t_id?>" readonly="readonly">
                          </div> 
						
						<div class="form-group">  
                            <label for="exampleInputEmail2">Date of Creation</label>
                            <input type="text" name="date" class="form-control" value="<?php echo $row->date?>" readonly="readonly">
                          </div> 
						
                            <div class="form-group">  
                            <label for="exampleInputEmail2">Transaction ID</label>
                            <input type="text" name="tra_id" class="form-control" value="<?php echo $row->transaction_id?>" readonly="readonly">
                          </div>         
                          <div class="form-group">
                            <label for="exampleInputEmail2">Query</label>
                            <input type="text" name="query" class="form-control" value="<?php echo $row->reason?>" readonly="readonly">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword2">Created By ID</label>
                            <input type="text" class="form-control" name="create_id" value="<?php echo $row->create_id?>" readonly="readonly">
                          </div>
                            
						   <div class="form-group">
                            <label for="exampleInputEmail2">Reply</label>
                            <textarea name="reply" class="form-control"></textarea>
                          </div>
						 
                            <div class="form-group">
                                <input type="hidden" name="hidden" value="<?php $id=$row->transaction_id; echo $id ?>"/>
                            <input type="submit" class="btn btn-success" id="exampleInputPassword2" value="Reply">
                          </div>
        <?php endforeach;?>
                        </form>
                    </div>
</div>

<script>
$(document).ready(function (){
    $("#frmupdate").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'<?php echo base_url() ?>report/reply',
            type:'POST',
            dataType:'json',
            data: $("#frmupdate").serialize()
        }).done(function (data){
            window.mydata = data;
                if(mydata['error'] !=""){
                    $(".errorresponse").html(mydata['error']);
                }
                else{
                $(".errorresponse").text('');
                $('#frmupdate')[0].reset();
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