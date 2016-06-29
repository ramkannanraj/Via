<script>
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
$(document).ready(function(){
    $("select.country").change(function(){
        var selectedCountry = $(".country option:selected").val();
		var url="countrlist/";
		
        $.ajax({
            type: "POST",
            url:url,
            data: { country : selectedCountry } 
        }).done(function(data){
            $("#response").html(data);
        });
    });
});

$(document).on('change','.state',function(){
	
	var state_id = $(this).val(); 	
			
           $.ajax({
                type: "POST",
                url: "<?php echo  site_url();?>user/get_city/"+state_id, 
                success: function(state) 
                { 
				var st = JSON.parse(state);
				 $('#appendCity').empty();
					$('#appendCity').append('<option value="">Select</option>');
                    $.each(st,function(id,city) 
                    {
                        var opt = $('<option />');
                        opt.val(city.city_id);
						opt.text(city.city_name);
                        $('#appendCity').append(opt);
                    }); 
  				}
 			});
	
	
});


</script>
<script type="text/javascript">
/*$(document).ready(function(){
    $("select.state").change(function(){
        var selectedState = $(".state option:selected").val();
        var url="ajax_city_list/";
        //alert(url);
        $.ajax({
            type: "POST",
            url:url,
            data: { state : selectedState } 
        }).done(function(data){
            //$("#response_state").html(data);
			console.log('data');
        });
    });
});*/
</script>
<div class="container-fluid">
        <button class="toggle-menu menu-left push-body gradient_btn1">Menu</button>
    	<div class="admin-page2">
        	<div class="row">
            	<div class="col-xs-12">
                	<div class="panel dashboard">
                		<div class="panel-body">
                			<div class="form-group">
                        
							  <?php if($this->session->userdata('type')=='distributor' || $this->session->userdata('type')=='super' ){?>
                              <a href="<?php echo site_url('user/createuser') ?>" class="btn btn-default">Create User</a> 
                               <a href="<?php echo site_url('home/index') ?>" class="btn btn-warning">View User</a> 
                              
                              <?php } if($this->session->userdata('type')=='admin'){?>
                              <a href="<?php echo site_url('user/createuser') ?>" class="btn btn-default">Create User</a> 
                              <a href="<?php echo site_url('home/index') ?>" class="btn btn-warning">View User</a>
                              <a href="<?php echo site_url('mobile_no_change/index') ?>" class="btn btn-warning chg-mobi-no ">Change Mobile No</a>
                              <?php } if($this->session->userdata('type')=='admin'){ ?>
                               <a href="<?php echo site_url('user/viewbalance/distributor') ?>" class="btn btn-warning">View Balance</a>
                              <?php } ?>
                    
                    </div>
                    
                    <div class="mobile-1">
                    
                    <p>Create User Profile</p>
                    </div>
                    
                       <?php
if($this->session->userdata('type')=='distributor' || $this->session->userdata('type')=='super' )
{
$sess_id=$this->session->userdata('uid');
$this->db->where("uid",$sess_id);
$query= $this->db->get('usermaster');
foreach ($query->result() as $row)
{        $limit= $row->adduser_limit;		}
$this->db->where("parent_id",$sess_id);
$data1 = $this->db->get('usermaster');
if($data1->num_rows()>=$limit)
		{
			echo "<script type='text/javascript'>alert('Your user creation limit is over.');</script>";
			echo 'Your user creation limit is over.';  }else {		   ?>
            <form action="<?php echo site_url('user/register')?>" method="post">
            <center>
<span>
<?php
if($this->session->flashdata('item')!="") {
$message = $this->session->flashdata('item');
?>
<div class="<?php echo $message['class']?>" 
><?php echo $message['message']; ?></div>
<?php
}
?>
</span>
</center>                
                	
                    	<div class="form-group col-lg-6">
                        
                        <label>Type</label>
                        <?php if( $type=$this->session->userdata('type')=='admin'){ ?>
                                <select class="form-control">
                                      <option value="distributor" data-image="<?php echo base_url(); ?>img/distributor1c.png">distributor</option>
                                      <!--<option value="super" data-image="<?php echo base_url(); ?>img/dis.png">Super</option>  -->  
									<option value="retailer"  data-image="<?php echo base_url(); ?>img/retailor1c.png">Retailer</option>
                                </select>
                                <?php } if( $type=$this->session->userdata('type')=='distributor' ){?>
<select class="form-control" name="type" id="tech" onChange="showValue(this)">
<option value="retailer"  data-image="<?php echo base_url(); ?>img/retailor1c.png">Retailer</option>
</select>
<?php } $data =$this->session->userdata('uid');
if($type=$this->session->userdata('type')=='super'){?>
<select class="form-control" name="type" id="tech" onChange="showValue(this)">
<option value="distributor"  data-image="<?php echo base_url(); ?>img/distributor1c.png">Distributor</option>
</select>
<?php } $data =$this->session->userdata('uid');?>
                         
                       </div>
                       
                       
                       
                       	<div class="form-group col-lg-6">
                        
                        <label>Name</label>
                        <input type="text" value="" name="name" class="form-control"><input type="hidden" name="parent_id" value="<?php echo $data; ?>">
                        
                        </div>
                        
                        
                        
                        	<div class="form-group col-lg-6">
                            <label>Firm Name</label>
                            <input type="text" name="firmname" value="" class="form-control">
                            </div>
                            
                            
                        <div class="form-group col-lg-6">
                        <label>Email id</label>
                        <input type="text" name="email" value="" required class="form-control">
                        </div>
                        
                        
                        <div class="form-group col-lg-6">
                        <label>Gender</label>
                        <ul class="list-inline">
                        <li class="col-xs-6"><label for="radio4"><input type="radio" name="radiog_dark" id="radio4" />Male</label></li>
                        <li class="col-xs-6"><label for="radio5"><input type="radio" name="radiog_dark" id="radio5" checked="checked"/>Female</label></li>
                        </ul>
                        </div>
                        
                        
                        <div class="form-group col-lg-6">
                        <label>Mobile no.</label>
                        <input type="text" name="mobile" value="" class="form-control">
                        </div>
                        
                        
                        <div class="form-group col-lg-6">
                        <label>Address</label>
                        <input type="text" name="address" value="" class="form-control">
                        </div>
                        
                        <div class="form-group col-lg-6">
                        <label>Country</label>
                        <select name="country" class="form-control"  id="country">
<?php foreach($Country as $get_country) { ?>
<option value="<?php echo $get_country->country_id; ?>"><?php echo $get_country->country_name; ?></option>
<?php }?> 
</select> 
                            </div>
                            
                       <div class="form-group col-lg-6">
                        <label>State</label>
                         <select class="form-control" name="state" required>
                            <option value="">Select</option>
                            <?php foreach($State as $get_state) { ?>
                            <option value="<?php echo $get_state->state_id; ?>"><?php echo $get_state->state_name;?></option>
                            <?php }?> 
						</select>   
                         </div>  
                       <div class="form-group col-lg-6">
                       <label>City</label>
                        		<select name="city" class="form-control" id="appendCity">
                                      <option value=" ">Select</option>
                                </select>
                           </div>
                        <div class="form-group col-lg-6">
                       <label>Pincode</label>
                        <input type="text" name="pin" maxlength="6" minlength="6" number="true" required onKeyPress="return isNumber(event)" class="form-control">
                        </div>
                        <div class="form-group col-lg-6">
                       <label>Sponser ID</label>
                       <input type="text" name="spid" value="<?php echo $this->session->userdata('username'); ?>" readonly class="form-control"></div>
                        <div class="form-group col-lg-6">
                       <label>Executive Name</label>
                       <input type="text" name="executive" required class="form-control">
                       </div>
                   
               
                
                <div class="form-group col-xs-12">
                   	<input type="submit" value="Submit" class="btn btn-default">
                </div>
                </form>
             <?php }}else{?>
<form action="<?php echo site_url('user/register')?>" method="post" id="message1" data-abide="ajax">                
                <div class="col-xs-12 profile-details">
<center>
                                        <span>
                                        <?php
                                        if($this->session->flashdata('item')!="") {
                                        $message = $this->session->flashdata('item');
                                        ?>
                                        <div class="<?php echo $message['class']?>" 
                                        ><?php echo $message['message']; ?></div>
                                        <?php
                                        }
                                        ?>
                                        </span>
                                        </center>
                                                        
                	<ul class="list-unstyled">                    	
                    <li><p><span>Type</span>
                                <?php if( $type=$this->session->userdata('type')=='admin'){?>
<select class="tech" name="type" id="tech" onChange="showValue(this)">
      <option value="distributor" data-image="<?php echo base_url(); ?>img/distributor1c.png">Distributor</option>
      <option value="retailer"  data-image="<?php echo base_url(); ?>img/retailor1c.png">Retailer</option>
     <!-- <option value="super" data-image="<?php echo base_url(); ?>img/dis.png">Super</option>-->
	  </select>
<?php } if( $type=$this->session->userdata('type')=='distributor' ){?>
<select  name="type" id="tech" onChange="showValue(this)">
<option value="retailer"  data-image="<?php echo base_url(); ?>img/retailor1c.png">Retailer</option>
</select>
<?php } $data =$this->session->userdata('uid');
if($type=$this->session->userdata('type')=='super'){?>
<select name="type" id="tech" onChange="showValue(this)">
<option value="distributor"  data-image="<?php echo base_url(); ?>img/distributor1c.png">Distributor</option>
</select>
<?php } $data =$this->session->userdata('uid');?>
                            </p>
                       </li>
                       	<li><p><span>Name</span><input type="text" name="name" required maxlength="40" class="in-btn1">
                        <input type="hidden" name="parent_id" value="<?php echo $data; ?>" class="form-control"></p></li>
                        <li><p><span>Firm Name</span><input type="text" name="firmname" class="in-btn1"></p></li>
                        <li><p><span>Email id</span><input type="email" name="email" class="in-btn1" required ></p></li>
                        <li><p><span>Gender</span>
                        	<table>
                                <tr>
                                <td>
                                <input type="radio" name="gender" id="radio4" class="css-checkbox" /><label for="radio4" class="css-label radGroup2">Male</label>
                                </td>
                                <td>
                                <input type="radio" name="gender" id="radio5" class="css-checkbox" checked="checked"/><label for="radio5" class="css-label radGroup2">Female</label>
                                </td>
                                </tr>
                          	</table>
                     	</p></li>
                        <li><p><span>Mobile no.</span><input type="text" name="mobile"   required maxlength="10" minlength="10" number="true" onKeyPress="return isNumber(event)" class="in-btn1"></p></li>
                        <li><p><span>Address</span><input type="text" value="" name="address" class="in-btn1"></p></li>
                        <li><p><span>Country</span>
                        		<select class="country" name="country" id="country">
<?php foreach($Country as $get_country) { ?>
<option value="<?php echo $get_country->country_id; ?>"><?php echo $get_country->country_name; ?></option>
<?php }?> 
</select>
                            </p>
                       </li>
                       <li><p><span>State</span>
                        		<select class="state" name="state" required>
<option value="">Select</option>
<?php foreach($State as $get_state) { ?>
<option value="<?php echo $get_state->state_id; ?>"><?php echo $get_state->state_name;?></option>
<?php }?> 
</select> 
                            </p>
                       </li>
                       <li><p><span>City</span>
                        		<select name="city" id="appendCity">
                                      <option value=" ">Select</option>
                                </select>
                            </p>
                       </li>
                                
                        <li><p><span>Pincode</span><input type="text" name="pin" maxlength="6" minlength="6" number="true" required onKeyPress="return isNumber(event)" class="in-btn1"></p></li>
                        <li><p><span>Sponser ID</span><input type="text" name="spid" value="<?php echo $this->session->userdata('username'); ?>" readonly class="in-btn1"></p></li>
                        <li><p><span>Executive Name</span><input type="text" name="executive" required class="in-btn1"></p></li>
                     <!--   <li><p><span>Limit</span><input type="text" name="limit" required  onkeypress="return isNumber(event)" class="in-btn1"></p></li>-->
                    </ul>
                </div>
                
                <div class="col-xs-12 submit1">
                   	<input type="submit" value="Submit"class="gradient_btn">
                </div>
                </form><?php }?>       
                    	</div>
                      </div>
                </div>
                <!-- col-xs-12 ends-->
               
            
            <!-- row ends-->
        </div>
        <!-- admin-page1 ends -->
    </div>
    </div>
    
    <!-- RESP MENU STARTS -->
<!--load jPushMenu, required-->
     
<!-- RESP MENU ENDS -->