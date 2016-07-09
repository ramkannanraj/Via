<?php 
           
        $servername = "64.187.228.106";
$username = "viapaise_viapais";
$password = "We!come!@#";
$dbname = "viapaise_viapaise_dev";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM tbl_icash_credential";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      echo $terminal_id=$row['terminal_id'];
			 $login_key=$row['login_key'];
			 $merchant_id=$row['merchant_id'];
			 $agent_id=$row['agent_id'];
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
        
        
        ?>
		<input type="hidden" name="terminal_id" readonly  value=" <?php  echo $terminal_id;?>" />
		<input type="hidden" name="login_key" readonly  value=" <?php  echo $login_key;?>" />
		<input type="hidden" name="merchant_id" readonly  value=" <?php  echo $merchant_id;?>" />
		<input type="hidden" name="agent_id" readonly  value=" <?php  echo $agent_id;?>" />
			 