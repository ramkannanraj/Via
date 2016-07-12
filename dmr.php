<?php
//$xml = file_get_contents('php://input');
echo(header('content-type: text/xml'));
$dataPOST = file_get_contents('php://input');
$xmlData = simplexml_load_string($dataPOST);
$dom=new DomDocument;
$dom->Load('php://input');
$root=$dom->documentElement;
$tag= $root->tagName;

//print "<pre>";
//print_r($xmlData);
 
 $xmlData->AGENTCODE;
$agent_code= $xmlData->AGENTCODE;
$user_id= $xmlData->USERID;
$girefid= $xmlData->GIREFID;
 $method_id =$xmlData->METHODID;
 $totalamount=$xmlData->TOTALAMOUNT;
$rechargefee=$xmlData->RECHARGEFEE; 
$netamount=$xmlData->NETAMOUNT;
$creditamount=$xmlData->CREDITAMOUNT;
$reason=$xmlData->REASON;
$balance='100';

$CHANNELPARTNERREFID= 'VIP016';
$agent='Viapiase001';
$user='Tass123';

$con=mysql_connect('64.187.228.106','viapaise_viapais','We!come!@#');
mysql_select_db("viapaise_viapaise_dev", $con);
$res=mysql_query('select *from tbl_icash_credential',$con);
while($row=mysql_fetch_array($res))
{
  $agent2=$row['agent_id'];  
 
    
}
$res2=mysql_query("select *from usermaster where uid='$user_id'",$con);
$num_rows = mysql_num_rows($res2);
if($num_rows>0)
{
while($result=mysql_fetch_array($res2))
{
  $balance=$result['total_balance'];  
 
    
}

}
else
{
     $user2='false';  
}

//print "<pre>";
//print_r($xmlData);
 
//print $xmlData->AGENTCODE;
//$agent_code= $xmlData->AGENTCODE;
//$user_id= $xmlData->USERID;
//$girefid= $xmlData->GIREFID;
//$method_id =$xmlData->METHODID;

if($tag=="CHECKBALANCEREQUEST")
{
    
if (empty($method_id)) {
               print $response_xml ="<CHECKBALANCERESPONSE>
    <STATUSCODE>1</STATUSCODE>
    <STATUSDESCRIPTION>Invalid Method ID</STATUSDESCRIPTION>
      <AGENTCODE>$agent_code</AGENTCODE>
    <USERID>$user_id</USERID>
    <GIREFID>$girefid</GIREFID>
    <CHANNELPARTNERREFID>$CHANNELPARTNERREFID</CHANNELPARTNERREFID>
    <BALANCE>0.00</BALANCE>
    <METHODID></METHODID>
</CHECKBALANCERESPONSE>";

            }
            
            else if (empty($agent_code)) {
               print $response_xml="<CHECKBALANCERESPONSE>
    <STATUSCODE>1</STATUSCODE>
    <STATUSDESCRIPTION>ERROR IN AGENTCODE INPUT</STATUSDESCRIPTION>
    <AGENTCODE>$agent_code</AGENTCODE>
    <USERID>$user_id</USERID>
   <GIREFID>$girefid</GIREFID>   
    <CHANNELPARTNERREFID>$CHANNELPARTNERREFID</CHANNELPARTNERREFID>
    <BALANCE>0.00</BALANCE>
    <METHODID>$method_id</METHODID>
</CHECKBALANCERESPONSE>";
            }else if($agent_code!=$agent){
              print $response_xml="
<CHECKBALANCERESPONSE>
    <STATUSCODE>1</STATUSCODE>
    <STATUSDESCRIPTION>ERROR IN AGENTCODE INPUT</STATUSDESCRIPTION>
    <AGENTCODE>$agent_code</AGENTCODE>
    <USERID>$user_id</USERID>
   <GIREFID>$girefid</GIREFID>   
    <CHANNELPARTNERREFID>$CHANNELPARTNERREFID</CHANNELPARTNERREFID>
    <BALANCE>0.00</BALANCE>
    <METHODID>$method_id</METHODID>
</CHECKBALANCERESPONSE>";

            }
            
          else  if (empty($user_id)) {
              print $response_xml="<CHECKBALANCERESPONSE>
    <STATUSCODE>1</STATUSCODE>
    <STATUSDESCRIPTION>ERROR IN USERID INPUT</STATUSDESCRIPTION>
    <AGENTCODE>$agent_code</AGENTCODE>
   <USERID>$user_id</USERID>
   <GIREFID>$girefid</GIREFID> 
    <CHANNELPARTNERREFID>$CHANNELPARTNERREFID</CHANNELPARTNERREFID>
    <BALANCE>0.00</BALANCE>
     <METHODID>$method_id</METHODID>
</CHECKBALANCERESPONSE>";
            }else if($user_id!=$user)
            {
                
              print $response_xml="
<CHECKBALANCERESPONSE>
    <STATUSCODE>1</STATUSCODE>
    <STATUSDESCRIPTION>ERROR IN USERID INPUT</STATUSDESCRIPTION>
    <AGENTCODE>$agent_code</AGENTCODE>
    <USERID>$user_id</USERID>
     <GIREFID>$girefid</GIREFID> 
    <CHANNELPARTNERREFID>$CHANNELPARTNERREFID</CHANNELPARTNERREFID>
    <BALANCE>0.00</BALANCE>
     <METHODID>$method_id</METHODID>
</CHECKBALANCERESPONSE>";
  
                
                
            }
            
            
            
          else  if (empty($girefid)) {
              print $response_xml="
<CHECKBALANCERESPONSE>
    <STATUSCODE>1</STATUSCODE>
    <STATUSDESCRIPTION>ERROR IN GI Ref. ID INPUT</STATUSDESCRIPTION>
      <AGENTCODE>$agent_code</AGENTCODE>
   <USERID>$user_id</USERID>
   <GIREFID></GIREFID> 
    <CHANNELPARTNERREFID>$CHANNELPARTNERREFID</CHANNELPARTNERREFID>
    <BALANCE>0.00</BALANCE>
     <METHODID>$method_id</METHODID>
</CHECKBALANCERESPONSE>";

            }
            
 
            
        
      else if(!empty($method_id)&&!empty($agent_code)&& !empty($girefid)&& !empty($user_id))
        {
            
         if($method_id)
         {
            
          if($agent_code==$agent)  
            {
           if($girefid)     
                {
                if($method_id==1)    
                  {
                  
                 print $response_xml="
<CHECKBALANCERESPONSE>
<STATUSCODE>0</STATUSCODE>
<STATUSDESCRIPTION>SUCCESS</STATUSDESCRIPTION>
 <AGENTCODE>$agent_code</AGENTCODE>
   <USERID>$user_id</USERID>
   <GIREFID>$girefid</GIREFID> 
    <CHANNELPARTNERREFID>$CHANNELPARTNERREFID</CHANNELPARTNERREFID>
    <BALANCE>$balance</BALANCE>
     <METHODID>$method_id</METHODID>
</CHECKBALANCERESPONSE>";
                  
            }
                
                
                
                
                
                
                
                
            
                    
                    
                }
             
                
            }
     
            
         }   
        
            
            
        }
       
 
 }

else if($tag=="AGENTQUOTADEBITREQUEST") 
{
 if(empty($method_id))
 {
    
    print $response_xml="
<AGENTQUOTADEBITRESPONSE>
    <STATUSCODE>1</STATUSCODE>
    <STATUSDESCRIPTION>Invalid Method ID</STATUSDESCRIPTION>
    <AGENTCODE>manali</AGENTCODE>
   <USERID>$user_id</USERID>
     <GIREFID>$girefid</GIREFID>
    <CHANNELPARTNERREFID>$CHANNELPARTNERREFID</CHANNELPARTNERREFID>
     <TOTALAMOUNT>$totalamount</TOTALAMOUNT>
    <RECHARGEFEE>$rechargefee</RECHARGEFEE>
    <NETAMOUNT>$netamount</NETAMOUNT>
    <BALANCE>0.00</BALANCE>
    <METHODID>$method_id</METHODID>
</AGENTQUOTADEBITRESPONSE>";

   }   
  else if(empty($agent_code))
  {
    
    print $response_xml="
<AGENTQUOTADEBITRESPONSE>
    <STATUSCODE>1</STATUSCODE>
    <STATUSDESCRIPTION>ERROR IN AGENTCODE INPUT</STATUSDESCRIPTION>
    <AGENTCODE></AGENTCODE>
    <USERID>$user_id</USERID>
     <GIREFID>$girefid</GIREFID>
    <CHANNELPARTNERREFID>$CHANNELPARTNERREFID</CHANNELPARTNERREFID>
     <TOTALAMOUNT>$totalamount</TOTALAMOUNT>
    <RECHARGEFEE>$rechargefee</RECHARGEFEE>
    <NETAMOUNT>$netamount</NETAMOUNT>
    <BALANCE>0.00</BALANCE>
     <METHODID>$method_id</METHODID>
</AGENTQUOTADEBITRESPONSE>";
  
    
    
    
  }
  else if($agent_code!=$agent){
    
    
   print $response_xml="
<AGENTQUOTADEBITRESPONSE>
    <STATUSCODE>1</STATUSCODE>
    <STATUSDESCRIPTION>ERROR IN AGENTCODE</STATUSDESCRIPTION>
    <AGENTCODE>$agent_code</AGENTCODE>
    <USERID>$user_id</USERID>
     <GIREFID>$girefid</GIREFID>
    <CHANNELPARTNERREFID>$CHANNELPARTNERREFID</CHANNELPARTNERREFID>
     <TOTALAMOUNT>$totalamount</TOTALAMOUNT>
    <RECHARGEFEE>$rechargefee</RECHARGEFEE>
    <NETAMOUNT>$netamount</NETAMOUNT>
    <BALANCE>0.00</BALANCE>
    <METHODID>2</METHODID>
</AGENTQUOTADEBITRESPONSE>";

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    }
 else if(empty($user_id))
  {
    
    
    print $response_xml="
<AGENTQUOTADEBITRESPONSE>
    <STATUSCODE>1</STATUSCODE>
    <STATUSDESCRIPTION>ERROR IN USERID INPUT</STATUSDESCRIPTION>
    <AGENTCODE>$agent_code</AGENTCODE>
    <USERID></USERID>
    <GIREFID>$girefid</GIREFID>
    <CHANNELPARTNERREFID>$CHANNELPARTNERREFID</CHANNELPARTNERREFID>
    <TOTALAMOUNT>$totalamount</TOTALAMOUNT>
    <RECHARGEFEE>$rechargefee</RECHARGEFEE>
    <NETAMOUNT>$netamount</NETAMOUNT>
    <BALANCE>0.00</BALANCE>
    <METHODID>$method_id</METHODID>
</AGENTQUOTADEBITRESPONSE>";

  } 
 else if($user_id!=$user)
            {
                
              print $response_xml="

<AGENTQUOTADEBITRESPONSE>
    <STATUSCODE>1</STATUSCODE>
    <STATUSDESCRIPTION>ERROR IN USERID</STATUSDESCRIPTION>
    <AGENTCODE>$agent_code</AGENTCODE>
    <USERID>$user_id</USERID>
    <GIREFID>$girefid</GIREFID>
    <CHANNELPARTNERREFID>$CHANNELPARTNERREFID</CHANNELPARTNERREFID>
    <TOTALAMOUNT>$totalamount</TOTALAMOUNT>
    <RECHARGEFEE>$rechargefee</RECHARGEFEE>
    <NETAMOUNT>$netamount</NETAMOUNT>
    <BALANCE>0.00</BALANCE>
    <METHODID>2</METHODID>
</AGENTQUOTADEBITRESPONSE>";

  
                
                
            }
 else if(empty($girefid) )   
  {
    
   print $response_xml="
<AGENTQUOTACREDITRESPONSE>
    <STATUSCODE>1</STATUSCODE>
    <STATUSDESCRIPTION>ERROR IN GI Ref. ID INPUT</STATUSDESCRIPTION>
    <AGENTCODE>$agent_code</AGENTCODE>
    <USERID>$user_id</USERID>
    <GIREFID></GIREFID>         
     <CHANNELPARTNERREFID>$CHANNELPARTNERREFID</CHANNELPARTNERREFID>
    <TOTALAMOUNT>$totalamount</TOTALAMOUNT>
    <RECHARGEFEE>$rechargefee</RECHARGEFEE>
    <NETAMOUNT>$netamount</NETAMOUNT>
    <BALANCE>0.00</BALANCE>
    <METHODID>$method_id</METHODID>
</AGENTQUOTACREDITRESPONSE>";

  }
  else if($balance< $totalamount)
  {
    
     print $response_xml="
<AGENTQUOTADEBITRESPONSE>
    <STATUSCODE>1</STATUSCODE>
    <STATUSDESCRIPTION>Insufficient Balance</STATUSDESCRIPTION>
    <AGENTCODE>$agent_code</AGENTCODE>
<USERID>$user_id</USERID>
<GIREFID>$girefid</GIREFID>
<CHANNELPARTNERREFID>$CHANNELPARTNERREFID</CHANNELPARTNERREFID>
<TOTALAMOUNT>$totalamount</TOTALAMOUNT>
<RECHARGEFEE>$rechargefee</RECHARGEFEE>
<NETAMOUNT>$netamount</NETAMOUNT>
<BALANCE>$balance</BALANCE>
<METHODID>$method_id</METHODID>
</AGENTQUOTADEBITRESPONSE>";

    
  }  
  
            
else if($totalamount && $rechargefee && $netamount)         
          {      
         print $response_xml="<AGENTQUOTADEBITRESPONSE>
<STATUSCODE>0</STATUSCODE>
<STATUSDESCRIPTION>SUCCESS</STATUSDESCRIPTION>
<AGENTCODE>$agent_code</AGENTCODE>
<USERID>$user_id</USERID>
<GIREFID>$girefid</GIREFID>
<CHANNELPARTNERREFID>$CHANNELPARTNERREFID</CHANNELPARTNERREFID>
<TOTALAMOUNT>$totalamount</TOTALAMOUNT>
<RECHARGEFEE>$rechargefee</RECHARGEFEE>
<NETAMOUNT>$netamount</NETAMOUNT>
<BALANCE>$balance</BALANCE>
<METHODID>$method_id</METHODID>
</AGENTQUOTADEBITRESPONSE>" ;
                
           }  

 }

else if($tag=="AGENTQUOTACREDITREQUEST")
{
   
   if(empty($agent_code))
{
    print $response_xml="
<AGENTQUOTACREDITRESPONSE>
    <STATUSCODE>1</STATUSCODE>
    <STATUSDESCRIPTION>ERROR IN AGENTCODE INPUT</STATUSDESCRIPTION>
    <AGENTCODE></AGENTCODE>
   <USERID>$user_id</USERID>
<GIREFID>$girefid</GIREFID>
    <CHANNELPARTNERREFID>$CHANNELPARTNERREFID</CHANNELPARTNERREFID>
    <CREDITAMOUNT>'$creditamount'</CREDITAMOUNT>
    <BALANCE>0.00</BALANCE>
    <METHODID>$method_id</METHODID>
</AGENTQUOTACREDITRESPONSE>";

    
}  
else if($agent_code!=$agent){
   
  
    
    
   print $response_xml="
<AGENTQUOTACREDITRESPONSE>
    <STATUSCODE>1</STATUSCODE>
    <STATUSDESCRIPTION>ERROR IN AGENTCODE</STATUSDESCRIPTION>
    <AGENTCODE>$agent_code</AGENTCODE>
    <USERID>$user_id</USERID>
<GIREFID>$girefid</GIREFID>
    <CHANNELPARTNERREFID>$CHANNELPARTNERREFID</CHANNELPARTNERREFID>
  <CREDITAMOUNT>$creditamount</CREDITAMOUNT>
    <BALANCE>0.00</BALANCE>
     <METHODID>$method_id</METHODID>
</AGENTQUOTACREDITRESPONSE>";
  
    
    
  }  
  else if(empty($user_id))
  {
    
    print $response_xml="
<AGENTQUOTACREDITRESPONSE>
    <STATUSCODE>1</STATUSCODE>
    <STATUSDESCRIPTION>ERROR IN USERID INPUT</STATUSDESCRIPTION>
    <AGENTCODE>$agent_code</AGENTCODE>
    <USERID></USERID>
    <GIREFID>$girefid</GIREFID>
    <CHANNELPARTNERREFID>$CHANNELPARTNERREFID</CHANNELPARTNERREFID>
   <CREDITAMOUNT>$creditamount</CREDITAMOUNT>
    <BALANCE>0.00</BALANCE>
     <METHODID>$method_id</METHODID>
</AGENTQUOTACREDITRESPONSE>";

    
  }
  else if($user_id!=$user)
  {
    
    
   print $response_xml="
<AGENTQUOTACREDITRESPONSE>
    <STATUSCODE>1</STATUSCODE>
    <STATUSDESCRIPTION>ERROR IN USERID INPUT</STATUSDESCRIPTION>
    <AGENTCODE>$agent_code</AGENTCODE>
    <USERID>$user_id</USERID>
    <GIREFID>$girefid</GIREFID>
    <CHANNELPARTNERREFID>$CHANNELPARTNERREFID</CHANNELPARTNERREFID>
   <CREDITAMOUNT>$creditamount</CREDITAMOUNT>
    <BALANCE>0.00</BALANCE>
    <METHODID>$method_id</METHODID>
</AGENTQUOTACREDITRESPONSE>";

 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
  }
  else if(empty($method_id))
    {
       print $response_xml="
<AGENTQUOTACREDITRESPONSE>
    <STATUSCODE>1</STATUSCODE>
    <STATUSDESCRIPTION>Invalid Method ID</STATUSDESCRIPTION>
    <AGENTCODE>$agent_code</AGENTCODE>
    <USERID>$user_id</USERID>
    <GIREFID>$girefid</GIREFID>
    <CHANNELPARTNERREFID>$CHANNELPARTNERREFID</CHANNELPARTNERREFID>
   <CREDITAMOUNT>$creditamount</CREDITAMOUNT>
    <BALANCE>0.00</BALANCE>
    <METHODID></METHODID>
</AGENTQUOTACREDITRESPONSE>";
  
    
        
    }
    else if(empty($girefid))
    {
        
        
       print $response_xml="
<AGENTQUOTACREDITRESPONSE>
    <STATUSCODE>1</STATUSCODE>
    <STATUSDESCRIPTION>ERROR IN GI Ref. ID INPUT</STATUSDESCRIPTION>
    <AGENTCODE>$agent_code</AGENTCODE>
    <USERID>$user_id</USERID>
    <GIREFID></GIREFID>    
    <CHANNELPARTNERREFID>$CHANNELPARTNERREFID</CHANNELPARTNERREFID>
   <CREDITAMOUNT>$creditamount</CREDITAMOUNT>
    <BALANCE>0.00</BALANCE>
    <METHODID>$method_id</METHODID>
</AGENTQUOTACREDITRESPONSE>";
 
     
        
        
    }
    
    else if ($method_id=3)
            {
                
                 
                 print $response_xml="
<AGENTQUOTACREDITRESPONSE>
    <STATUSCODE>0</STATUSCODE>
    <STATUSDESCRIPTION>SUCCESS</STATUSDESCRIPTION>
    <AGENTCODE>$agent_code</AGENTCODE>
    <USERID>$user_id</USERID>
    <GIREFID>$girefid</GIREFID>
    <CHANNELPARTNERREFID>$CHANNELPARTNERREFID</CHANNELPARTNERREFID>
   <CREDITAMOUNT>$creditamount</CREDITAMOUNT>
    <REASON>$reason</REASON>
    <BALANCE>$balance</BALANCE>
    <METHODID>$method_id</METHODID>
</AGENTQUOTACREDITRESPONSE>";

                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
            }
    
    
    
    
    
    
  } 
  else if($tag=='VERIFICATIONREQUEST')
  {
    
    if(empty($agent_code))
    {
        
    print $response_xml="
<VERIFICATIONRESPONSE>
    <STATUSCODE>1</STATUSCODE>
    <STATUSDESCRIPTION>ERROR IN AGENTCODE INPUT</STATUSDESCRIPTION>
    <AGENTCODE></AGENTCODE> (or) <AGENTCODE>manal2548</AGENTCODE>
    <USERID>$user_id</USERID>
   <GIREFID>$girefid</GIREFID>
    <CHANNELPARTNERREFID>$CHANNELPARTNERREFID</CHANNELPARTNERREFID>
    <TOTALAMOUNT>$totalamount</TOTALAMOUNT>
    <RECHARGEFEE>$rechargefee</RECHARGEFEE>
    <NETAMOUNT>$netamount</NETAMOUNT>
    <BALANCE>0.00</BALANCE>
    <METHODID>$method_id</METHODID>
</VERIFICATIONRESPONSE>";
     
        
    }
  else  if(empty($user_id))
    
    {
        
        
        print $response_xml="
<VERIFICATIONRESPONSE>
    <STATUSCODE>1</STATUSCODE>
    <STATUSDESCRIPTION>ERROR IN USERID INPUT</STATUSDESCRIPTION>
    <AGENTCODE>$agent_code</AGENTCODE>
    <USERID></USERID> (or) <USERID>16564</USERID>
    <GIREFID>$girefid</GIREFID>
    <CHANNELPARTNERREFID>$CHANNELPARTNERREFID</CHANNELPARTNERREFID>
    <TOTALAMOUNT>$totalamount</TOTALAMOUNT>
    <RECHARGEFEE>$rechargefee</RECHARGEFEE>
    <NETAMOUNT>$netamount</NETAMOUNT>
    <BALANCE>0.00</BALANCE>
    <METHODID>$method_id</METHODID>
</VERIFICATIONRESPONSE>";
      
    }
  else  if(empty($method_id))
    {
        
        
        print $response_xml="<VERIFICATIONRESPONSE>
    <STATUSCODE>1</STATUSCODE>
    <STATUSDESCRIPTION>Invalid Method ID</STATUSDESCRIPTION>
    <AGENTCODE>$agent_code</AGENTCODE>
    <USERID>$user_id</USERID>
    <GIREFID>$girefid</GIREFID>
    <METHODID></METHODID>
</VERIFICATIONRESPONSE>";

  
        
        
    }
    else if(empty($girefid))
    {
        
   print $response_xml="<VERIFICATIONRESPONSE>
    <STATUSCODE>1</STATUSCODE>
    <STATUSDESCRIPTION>Invalid GIREFID for this Method ID</STATUSDESCRIPTION>
     <AGENTCODE>$agent_code</AGENTCODE>
    <USERID>$user_id</USERID>
    <GIREFID></GIREFID> (or) <GIREFID>TP605655</GIREFID>
    <CHANNELPARTNERREFID>$CHANNELPARTNERREFID</CHANNELPARTNERREFID>
    <TOTALAMOUNT>$totalamount</TOTALAMOUNT>
    <RECHARGEFEE>$rechargefee</RECHARGEFEE>
    <NETAMOUNT>$netamount</NETAMOUNT>
    <BALANCE>0.00</BALANCE>
    <METHODID>$method_id</METHODID>
</VERIFICATIONRESPONSE>";
    
        
    }
    
    
    
    
    
    
  }
  else
  {
    
   print $response_xml="<ERROR>
    <STATUSCODE>1</STATUSCODE>
    <STATUSDESCRIPTION>Invalid Root Element</STATUSDESCRIPTION>
</ERROR>";
 
    
    
    
    
    
    
    
    
    
  } 
   
   
   
   
   
   
   
   
   

?>