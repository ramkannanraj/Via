  
	<div class="dashboard-container">
		<div class="container">
			<div class="dashboard-wrapper">

				<!-- Left Sidebar Start -->
				<div class="left-sidebar">

                    <!-- Row Start -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="widget">
                                <div class="widget-header">
                               		<div class="title">
                    					PIN GENERATION
                                    </div>
								 </div>  
<form method="post" class="form-style-9" action="<?php echo site_url('beneficiary/otp_generate') ?>"  >
 
  <?php foreach($beni_details as $user){ ?>
  <table>
 
 
 <tr>
 <td>
<label >OTP</label></td><td><input type="text" name="otp_no" required    /></td></tr>
<input type="hidden" name="card_number" readonly value="<?php  echo $user->card_no;?>" class="field-style field-split "   />
<input type="hidden" name="ben_id" readonly value="<?php  echo $user->icash_beneficiaryid;?>"   />
<input type="hidden" name="ids" readonly value="<?php  echo $user->id;?>"   />

 
</tr>
 <tr>
<td>

<input type="submit" value="Submit"  class="btn btn-info btn-small" />
</td>
</tr>
 
</table>
<?php }?>
 
</div>

</form>
	</div>
						</div>
					</div>
					<!-- Row End -->
				</div>
				<!-- Left Sidebar End -->
			</div>
				<!-- Dashboard Wrapper End -->
		</div>
	</div>
<style type="text/css">
 
td {
    padding: 15px 5px 5px 15px;
}
td label{
    font-size: 11px;
    text-decoration: none;
    color: #4d4d4d;
    font-weight: 300;
    text-transform: uppercase;
}
td input {
    width: 200px;
    height: 21px;
    font-size: 12px;
}
tr .button input {
    width: 90px;
    height: 30px;
}
.from-move
{

   margin-top:20px;
}
.row .col-lg-12 {
    width: 90%;
}

</style>