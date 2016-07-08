<h4>My Profile:</h4>
<p>
Name: <?php echo $member->name?> <br />
Username: <?php echo $member->username?><br />
Firm: <?php echo $member->companyname?> <br />
Email: <?php echo $member->email?><br />
Mobile: <?php echo $member->mobile?> <br />
Address: <?php echo $member->address1?><br />
State: <?php echo $member->state?> <br />
City: <?php echo $member->city?><br />
Sponser ID: <?php echo $member->parent_id?> <br />
<form action="<?php echo site_url('user/update_password')?>" method="post" id="myform">
	<input type="hidden" name="did" name="did" value="<?php echo $member->uid?>">
		New Password:&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="password" id="password" required /><br /><br />
		Re-new Password:<input type="password" name="confirmpassword" id="confirmpassword" required /><br />
	<input type="submit" id="submit" name="dsubmit" value="Submit">
</form>
<script src="<?php echo base_url();?>assets/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>assets/js/additional-methods.min.js"></script>
 
</p>

<script>
// just for the demos, avoids form submit
$(document).ready(function(){
$( "#myform" ).validate({
	   rules: {
    password: "required",
    confirmpassword: {
      equalTo: "#password"
    }
	 
	   }
});
  
<!--$("#myform").submit(function(event ){
});
</script>
</p>