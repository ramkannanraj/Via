<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
	<?php
	
	$longcode=$_GET['long_code'];
	$mobilenumber= $_GET['sender_mob'];
	$Opername=$_GET['opr_name'];
	$Circle=$_GET['circle_state'];
	$amount=0;
	$msg=$_GET['rec_msg'];
	$longcode=$_GET['long_code'];
	
	
	$msg_des = explode(" ", $msg);
	echo $msg_des[0]; 
	echo "<br>";
	echo $msg_des[1]; 
	echo "<br>";
	echo $msg_des[2];
	echo "<br>";
	echo $longcode;
	echo "<br>";
	echo $Opername;
	echo "<br>";
	echo $Circle;

	

	
	/* $url = "http://103.29.232.110:8089/Ezypaywebservice/PushRequest.aspx?AuthorisationCode=de4527cfd9674f86bc&product=12&MobileNumber=$msg_des[0]&Amount=$msg_des[1]&RequestId=";
	 $ch = curl_init();
	 curl_setopt($ch, CURLOPT_URL, $url);
	 curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	 curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
	 $data = curl_exec($ch);
	 curl_close($ch);	

	 $get_trans=(explode("~",$data));
	 $trans_id=$get_trans[0];
	 $error_id=$get_trans[3];
	 $error_description=$get_trans[4];	*/
	
	
	
	
	
	
$testing="RECHARGE SUCCESS. Mobile Number: longcode, Amount: $Opername, Txn ID: $Circle. Your bal: Rs. 20";
					$url = "http://alerts.solutionsinfini.com//api/v3/index.php?method=sms&api_key=A96b7866cc3166b24d4c6397ef5d6d436&to=9884120461&sender=IRUPAY&message=$testing&format=json&custom=1,2";
  
 $url = str_replace(" ", "%20", $url);
					$ret = file($url);
					$sess = explode(":",$ret[0]);
					 if ($sess[0] == "OK") 
					 {
					$sess_id = trim($sess[1]); // remove any whitespace 
					
					 $ret = file($url);
					 $send = explode(":",$ret[0]);
					 if ($send[0] == "ID") 
					 {
					 echo "successnmessage ID: ". $send[1];
					 } 
					 else
					 {
					 echo "send message failed";
					 }
					 } 
					 else
					 {
					  $ret[0] ;
					 }
			echo $ret[0];
			 ?>
  </body>
</html>
