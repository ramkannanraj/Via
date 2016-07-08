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
                    					FORGOT PIN
                                    </div>
								 </div>  
<form method="post" class="form-style-9" action=""  >
 <table class="from-move">
 
 <tr>
 <td>

<label>Mobil No</label><input type="text" name="mobile_no" required class="field-style"
 value=""  />

</td>
</tr>
 
 
 <tr>
 <td class="button">

<input type="submit" value="Forgot Pin" name="submit"class="btn btn-info btn-small"  />
</td>
</tr>
 </table>


</form>
</div>
	</div>
				<?php 
 if (isset($_POST['submit'])){
$sql=mysql_query("SELECT * FROM tbl_icash_credential   ")or die(mysql_error());
$mobile_no= $this->input->post('mobile_no');
while($row=mysql_fetch_array($sql))
{
 
			 $terminal_id=$row['terminal_id'];
			 $login_key=$row['login_key'];
			 $merchant_id=$row['merchant_id'];
			 $agent_id=$row['agent_id'];
		}

$service_url = 'http://202.54.157.20/wsnpci/impsmethods.asmx/FORGOTPIN';
				$ch = curl_init($service_url);
				$curl_post_data = array(			
				"RequestData" =>"<FORGOTPINREQUEST>
				<TERMINALID>$terminal_id</TERMINALID>
				<LOGINKEY>$login_key</LOGINKEY>
				<MERCHANTID>$merchant_id</MERCHANTID>
				<USERMOBILENO>$mobile_no</USERMOBILENO>
				</FORGOTPINREQUEST>");
				$post_array_string = '';
				foreach($curl_post_data as $key=>$value) 
				{ 
					$post_array_string .= $key.'='.$value.'&'; 
				}
				$post_array_string = rtrim($post_array_string,'&');
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $post_array_string);
				
$output = curl_exec($ch);  
$xml = simplexml_load_string($output);
$xml = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $xml);
$xml = simplexml_load_string($xml);
$json = json_encode($xml);
$responseArray = json_decode($json,true);
$status_code=$responseArray['STATUSCODE'];		
		if($status_code	==0)
		{ 
			echo "<script type='text/javascript'>alert('Sucessfully send a pin with your Mobile number'); window.location.href = 'sendmoney';  </script>"; 	
		}	
else if($status_code	==1)
		{ 
			echo "<script type='text/javascript'>alert('Failed'); window.location.href = 'sendmoney';  </script>"; 	
		}
		
		
}?>		</div>
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
margin-left: 96px;
 min-width: 120px;

	
}
.from-move
{
	margin-left:20px;
	margin-top:20px;
}
.field-style
{
	    margin-left: 33px;
}
.field-split 
{
	 margin-left:66px
}
.row .col-lg-12 {
    width: 90%;
}
</style>