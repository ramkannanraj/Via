<div class="container-fluid">
        <button class="toggle-menu menu-left push-body gradient_btn1">Menu</button>
    	<div class="admin-page2">
        
        	<div class="row">
            	<div class="col-lg-12">
                <div class="panel dashboard">
        <div class="panel-body">
                	<div class="form-group">
                    <a href="#" class="btn btn-warning">Profile</a>
                      <a href="<?php echo site_url('margin/viewmargin') ?>" class="btn btn-warning">Discounts</a>
                      </div>
                      </div>
                      </div>
                </div>
          
            	<div class="col-lg-12">
                <div class="panel dashboard">
        			<div class="panel-body">
                	
                      <div class="mobile-1"> 
                      <p>Profile</p>
                      </div>
                <!-- col-xs-12 ends-->
                <form action="<?php echo site_url('user/do_upload')?>" method="post" id="myform" enctype="multipart/form-data">
              
                						<?php
                                        if($this->session->flashdata('item')!="") {
                                        $message = $this->session->flashdata('item');
                                        ?>
                                       
                                        <div class="<?php echo $message['class']?>" style="color:#090">
										<?php echo $message['message']; ?>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                        
                                        <div class="col-lg-3">
                                        
                                        <div class="form-group"><?php if($this->session->userdata('uid')!="" ) {  
			  	 	 $img_url = base_url()."images/".$this->session->userdata('img_name');
					 
					 
               	if( !file_exists(FCPATH."images/".$this->session->userdata('img_name')) ) {
               	 $img_url = base_url()."images/logo.png"; 	
				} 
				
			 }?>
                                        <img class="img-thumbnail" src="<?php echo  $img_url; ?>" />
                    	<label>Your Profile photo</label>
                        <input type="file" name="userfile" size="20" id="userfile" class="form-control" value="">
                    </div>
                                        
                                        </div>
           <div class="col-lg-9">
           
                    <div class="form-group col-lg-6">
                    	<label>Name</label>
                        <input type="text" class="form-control" value="<?php echo $member->name?>" disabled="disabled" />
                    </div>
                    <div class="form-group col-lg-6">
                    	<label>Username</label>
                        <input type="text" class="form-control" value="<?php echo $member->username?>"  disabled="disabled" />
                    </div>
                    <div class="form-group col-lg-6">
                    	<label>Firm</label>
                        <input type="text" class="form-control" value="<?php echo $member->companyname?>" disabled="disabled"  />
                    </div>
                    
                          
<?php   
$parent=$member->parent_id;
$this->db->select('*');
$this->db->from('usermaster');
$this->db->where('uid',$parent);  
$query = $this->db->get(); 
foreach ($query->result() as $row)
{
?>

                        <div class="form-group col-lg-6">
                    	<label>Sponser Name</label>
                        <input type="text" class="form-control" value="<?php echo $row->name;?>"  disabled="disabled" />
                    </div>
                        <?php } ?>
                        
              <div class="form-group col-lg-6">
                    	<label>Email id</label>
                        <input type="text" class="form-control" value="<?php echo $member->email?>" disabled="disabled"  />
                    </div>
                    <div class="form-group col-lg-6">
                    	<label>Mobile Number</label>
                        <input type="text" class="form-control" value="<?php echo $member->mobile?>"  disabled="disabled" />
                    </div>
                    <div class="form-group col-lg-12">
                    	<label>Address</label>
                        <textarea type="text" rows="4" class="form-control" value="<?php echo $member->address1?>"  disabled="disabled" /></textarea>
                    </div>
                    <div class="form-group col-lg-6">
                    	<label>State</label>
                        <input type="text" class="form-control" value="<?php echo $member->state?>"  disabled="disabled" />
                    </div>
                    <div class="form-group col-lg-6">
                    	<label>City</label>
                        <input type="text" class="form-control" value="<?php echo $member->city_name?>" disabled="disabled"  />
                    </div> 
             
                        
                        
              <div class="form-group col-lg-6">
                    	<label>New Password</label>
                        <input type="password" value="" name="password" id="password" data-validate="required,alphaNumeric" class="form-control">
                        <input type="hidden" name="did" id="did" value="<?php echo $member->uid?>"/>
                    </div>
                        
                        <div class="form-group col-lg-6">
                    	<label>Re-entry Password</label>                       
                        <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" value="">
                    </div>
                        
                        
                  
                    <div class="form-group col-lg-12">
                <div class="pull-right">
                   	<input type="submit" id="submit" name="dsubmit" value="Submit" class="btn btn-warning">
                </div>
                </div>
                </div>
                 
              </form>
                    
                    
                      </div>
                      </div>
                </div>
                </div>
                
              
            </div>
            <!-- row ends-->
        </div>
     
        <!-- admin-page1 ends -->
    </div>
    
    
<script src="<?php echo base_url(); ?>/assets/js/jquery-1.10.2.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/additional-methods.min.js"></script>
<script>
// just for the demos, avoids form submit
$(document).ready(function(){
	
	$.validator.addMethod('mypassword', function(value, element) {
        return this.optional(element) || (value.match(/[a-zA-Z]/) && value.match(/[0-9]/));
    },
    'Password must have atleast one numeric & alphabet.');

   $('#myform').validate({
        // other options,
        rules: {
            "password": {
				 minlength: 7,
                maxlength: 12,
				mypassword: true
				
            },
			   confirmpassword: { 
                equalTo: "#password",
  
               }

			
        },
		 highlight: function (element) {
            $(element).parent().addClass('error')
        },

		
    });
	
	$("#userfile ").click(function(){
    $("img").hide();
});
});

$(function() {
    $("#userfile").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
 
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
 
            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
        }
    });
});
</script>    