<div class="well">
    <div class="errorresponse">
        
    </div>
	
    <form class="form" class="frmupdate" role="form" action="<?php echo site_url() ?>mobile_no_change/update" method="POST">
	
    <?php foreach($query->result() as $row):?>
                        
                           <div class="form-group">  
                            <label for="exampleInputEmail2">Name</label>
                            <input type="text" name="name" class="form-control" required value="<?php echo $row->name?>">
                          </div>         
                         
                          <div class="form-group">
                            <label for="exampleInputPassword2">Old Mobile no</label>
                            <input type="text" class="form-control" name="old_mobile_no" required value="<?php echo $row->mobile?>" onkeypress="return isNumber(event)" readonly>
                          </div>
                            
                             <div class="form-group">
                            <label for="exampleInputPassword2">New Mobile no</label>
                            <input type="text" class="form-control" name="new_mobile_no" required onkeypress="return isNumber(event)" maxlength="10" pattern="[0-9]{10,10}">
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
            url:'<?php echo site_url() ?>mobile_no_change/update',
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
<script>
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>
</body>
</html>