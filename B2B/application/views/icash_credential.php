<?php 
	$sql=mysql_query("SELECT * FROM tbl_icash_credential   ")or die(mysql_error());

 
while($row=mysql_fetch_array($sql))
{
 
			 $terminal_id=$row['terminal_id'];
			 $login_key=$row['login_key'];
			 $merchant_id=$row['merchant_id'];
			 $agent_id=$row['agent_id'];
		}?>
		<input type="hidden" name="terminal_id" readonly  value=" <?php  echo $terminal_id;?>" />
		<input type="hidden" name="login_key" readonly  value=" <?php  echo $login_key;?>" />
		<input type="hidden" name="merchant_id" readonly  value=" <?php  echo $merchant_id;?>" />
		<input type="hidden" name="agent_id" readonly  value=" <?php  echo $agent_id;?>" />
			 