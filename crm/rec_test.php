<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
	<?php
     $url = "http://103.29.232.110:8089/Ezypaywebservice/PushRequest.aspx?AuthorisationCode=de4527cfd9674f86bc&product=13&MobileNumber=9884120461&Amount=5";
		
		
			$ret = file($url);
			
			$sess = explode(":",$ret[0]);
			
$get_trans=(explode("~",$ret[0]));
print_r($get_trans);
echo $get_trans[2];
echo $get_trans[3];
			
			if($sess[0] == "OK") {
			$send = explode(":",$ret[0]);
			 if ($send[0] == "ID") {
			 echo "successnmessage ID: ". $send[1];
			 }
			 else {
			 echo "send message failed";
			 }
			}
			/*function curl($url){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
  }


  $url = 'http://103.29.232.110:8030/Ezypaywebservice/TransactionEnquiry.aspx?AuthorisationCode=de4527cfd9674f86bc8&RequestId=BT00190431';
 echo $contents = curl($url);*/
			
			 ?>
  </body>
</html>