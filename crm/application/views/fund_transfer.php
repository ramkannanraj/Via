<div class="well">
    <div class="errorresponse">
        
    </div>
	
    <form class="form" class="frmupdate" role="form" action="<?php echo site_url() ?>home/fund_update" method="POST">
	 <?php
	 
	 
	 $sql ="SELECT used_balance FROM usermaster WHERE uid=".$this->session->userdata('uid')."";
$query = $this->db->query($sql);
if ($query->num_rows() > 0) {
  foreach ($query->result() as $row) {?>
    <input type="hidden" name="used_bal" readonly class="form-control" value="<?php echo $row->used_balance;?>">
<?php }
}
?>
	
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
                            <input type="text" name="name" readonly class="form-control" value="Take">
                          </div>         
                          <div class="form-group">
                            <label for="exampleInputEmail2">Transfered By</label>
                            <input class="form-control" name="companyname" readonly type="text" value="<?php $val=$this->session->userdata('type');echo $val;  ?>" >
                          </div>
                          
                            
						   <div class="form-group">
                            <label for="exampleInputPassword2">Transfered To</label>
                            <input type="text" name="name" readonly class="form-control" value="<?php echo $row->name?>">
                          </div>
						  
						 
						  <div class="form-group">
                            <label for="exampleInputPassword2">Transfered Amount</label>
                            <input type="text" name="amt"  class="form-control" value="">
                          </div>
						   <?php /* $res_total_balz=$this->session->userdata('total_balance');$vars='0';

if($res_total_balz ===$vars){*/ ?>
<div class="form-group">

<!--<input type="button" class="btn btn-success" id="exampleInputPassword2" value="InSufficiant balance">-->
</div>
<?php  /*}     else{*/?>
                            <div class="form-group">
								<input type="hidden" name="total_balance" value="<?php echo $row->total_balance;   ?>"/>
								<input type="hidden" name="used_balance" value="<?php echo $row->used_balance;   ?>"/>
                                <input type="hidden" name="hidden" value="<?php $uid=$row->uid; echo $uid ?>"/>
								<input type="hidden" name="mobile" value="<?php $mobile=$row->mobile; echo $mobile ?>"/>
								<input type="hidden" name="usename" value="<?php $usename=$row->username; echo $usename ?>"/>
					
<input type="hidden" name="sname" value="<?php $sname=$this->session->userdata('name'); echo $sname ?>"/>
								<input type="hidden" name="uname" value="<?php $uname=$row->name; echo $uname ?>"/>			<input type="hidden" name="type" value="<?php $type=$row->type; echo $type ?>"/>
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
            url:'<?php echo site_url() ?>home/fund_update',
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