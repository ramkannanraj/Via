		<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

			class User_model extends CI_Model {

			 

		function login($username,$password)

		{ 

        $type="consumer";

	    $this->db->where("username",$username);

		$this->db->where("password",$password);

		$this->db->where("type !=",$type); 
		
		$this->db->where("isactive ='yes'"); 
		

		$query=$this->db->get("usermaster");

 

		if($query->num_rows()>0)

		{

		$row=$query->row();


		$userdata = array(

		'uid'  => $row->uid,

        'parent_id'  => $row->parent_id,

        'name'  => $row->name,

		'username'  => $row->username,

		'type'  => $row->type,

		'lastlogin'  => $row->lastlogin,

		'secure_code'  => '',

		'status'  => $row->status,

		'mobile'  => $row->mobile,
		
		'available_balance'  => $row->available_balance,

		'used_balance'  => $row->used_balance,

		'total_balance'    => $row->total_balance,

		'img_name'    => $row->img_name,

		'password'    => $row->password,

        'store_id'    => $row->store_id,

		

		);

		

		 

				$this->session->set_userdata($userdata);		

             //   redirect(site_url('user/secure_login'));

 			//  redirect(site_url('user/home'));

				return true;



		}

		else

		{
           /*      echo "<script type='text/javascript'>alert('Invalid username and password'); window.location.href = 'index';  </script>"; */ 
		//  $this->index();

		return false;

		}

	

		}

		function consumerlogin($username,$password)

		{

        $type="consumer";

	    $this->db->where("username",$username);

		$this->db->where("password",$password);

		$this->db->where("type",$type);

		$query=$this->db->get("usermaster");

		if($query->num_rows()>0)

		{

				$row=$query->row();

				$userdata = array(

		'uid'  => $row->uid,

		'username'  => $row->username,

		'type'  => $row->type,

		'lastlogin'  => $row->lastlogin,

		'secure_code'  => $row->secure_code,

		'status'  => $row->status,

		'mobile'  => $row->mobile,

		'used_balance'  => $row->used_balance,

		'total_balance'    => $row->total_balance,

		'img_name'    => $row->img_name,

		'password'    => $row->password,

		);



		$this->session->set_userdata($userdata);

		return $row;

		}

		else

		{

		return false;

		}



		}

		

		

		function image_update($file)

		{

		$this->session->set_userdata($file);

		return true;

		}

		function add_image($data)

		{

			$id=$this->session->userdata('uid');

			$this->db->where('uid', $id);

			$this->db->update('usermaster',$data);

		}

		function mailcheck($key)

		{

			$this->db->select('uid');

			$this->db->where('email',$key);

                        $this->db->where('isactive','yes');

                        $this->db->where('type !=','consumer');             

			$query = $this->db->get('usermaster');

			$query->result(); 

			if ($query->num_rows() > 0)

			{

				return true;

			}

			else

			{

				return false;

			}

		}

		function mobcheck($mob)

		{

			$this->db->select('uid');

			$this->db->where('mobile',$mob);

                        $this->db->where('isactive','yes');
	                
                        $this->db->where('type !=','consumer');

    

			$query = $this->db->get('usermaster');

			$query->result(); 

			if ($query->num_rows() > 0)

			{

			return true;

			}

			else

			{

			return false;

			}

		}	



		function secur_log_model($secure_code,$var)

		

		{ 

			

			$this->db->where(array('uid' => $var, 'secure_code' => $secure_code));





			//$this->db->where("uid",$var);

			//$this->db->where("secure_code",$secure_code and );

			$query=$this->db->get("usermaster");

			

			if($query->num_rows()>0)

			{	

				return $query->result();

			} 

			else 

			{

				return False;

			}

		}

		

		function update_user_secure($dates,$status)

		{

			$id=$this->session->userdata('uid');

			$data = array('lastlogin' => $dates,				

				'status' => $status);

			$this->db->where('uid', $id);

			$query=$this->db->update('usermaster', $data);
		
			return true;

		}

		function resend_secure_code_firsttime_date($secure_code,$login_uid,$ladate)

		{

			//$id=$this->session->userdata('uid');

			$data = array(	'secure_code' => $secure_code,
			 
			 'lastlogin' => $ladate

			);

			$this->db->where('uid', $login_uid);

			$query=$this->db->update('usermaster', $data);
		}

		

		function update_user_code($auto_no,$mobile_no)

		{

			$id=$this->session->userdata('uid');

			$data = array(	'secure_code' => $auto_no

			);

			$this->db->where('uid', $id);

			$query=$this->db->update('usermaster', $data);
                    /* echo $this->db->last_query();
					 exit();*/
					  $testing = "One Time Password to verify your Mobile $mobile_no on Paybuks is $auto_no.";    
                       
		$url = "http://alerts.solutionsinfini.com//api/v3/index.php?method=sms&api_key=A96b7866cc3166b24d4c6397ef5d6d436&to=$mobile_no&sender=PAYBUK&message=$testing&format=json&custom=1,2";
		
		
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
						 return false;
					 }

			return true;

		}

	

		function get_user_details($datas)

		{

			$this->db->select('*');

			$this->db->from('usermaster');

			$this->db->where('uid',$datas);

			$query=$this->db->get();

			return  $query->result();  

		}

		

		function register($register_data)

		{
            $this->db->insert('usermaster',$register_data);
			$qry= $this->db->insert_id();
			
			// Check the admin balance with EzyPay 
			
			
			
			if($qry)

			{			
/*
            $exe="insert into user_service_provider_details(user_id,parent_id,type,date)values('$id','$parent_id','$type',now())";

			$qrm= $this-> db-> query($exe);			
*/
			return true;		

			}

			return false;

		}

		function consumer_register($parent_id,$type,$name,$firmname,$email,$gender,$mobile,$address,$city,$state,$country,$pincode,$sponserid,$executivename,$pass,$usname,$limit,$secure_code)

		{

			$sql = "insert into usermaster (parent_id,type,name,companyname,executive_name,mobile,email,gender,address1,city,state,country,pincode,password,lastlogin,joindata,isdelete,username,adduser_limit,secure_code)

			values('$parent_id','$type','$name','$firmname','$executivename','$mobile','$email','$gender','$address','$city','$state','$country','$pincode','$pass',now(),now(),'no','$usname','$limit','$secure_code')";

			$qry= $this-> db-> query($sql);

			$id = $this->db->insert_id();

			if($qry)

			{			        	

			return $id;		

			}

			return false;

		}

		function myprofile_details()

		{

			$id=$this->session->userdata('uid');

		

			//$q = $this->db->get('usermaster');	
       $this->db->select('uid,parent_id,name,companyname,mobile,email,username, password,address1,state_name,city_name');
  $this->db->from('usermaster');
$this->db->join('states', 'usermaster.state = states.state_id');
$this->db->join('cities', 'usermaster.city = cities.city_id');
	$this->db->where('usermaster.uid',$id);
$q = $this->db->get();


			if($q->num_rows() > 0) 

				{

				$data = array();

				foreach($q->result() as $row) 

				{

					$data=$row;

				}

					return $data;

				}

		}

		function update_temppassword($id,$data)

		{	

			$this->db->where('uid', $id);

			$this->db->update('usermaster', $data);

			//$this->session->unset_userdata($userdata);

			return true;

		}

		

			function update_password($id,$data)

		{	

			$this->db->where('uid', $id);

			$this->db->update('usermaster', $data);

			$this->session->unset_userdata($userdata);

			return true;

		}

		function get_uid($username)

		{	

		$this -> db -> select('uid');

        $this -> db -> where('username', $username);

        $query = $this -> db -> get('usermaster');

       return $query->result();
		
		

		}

		 function getcountry()

     {

        $this -> db -> select('*');

        $query = $this -> db -> get('country');

        return $query->result();

     }
function getstate()
		{
			$this -> db -> select('*');
			$this -> db -> where('state_country_id', 1);
			$query = $this -> db -> get('states');
			return $query->result();
		}
/*

    	  function getstate($country)

     {

        $this -> db -> select('*');

        $this -> db -> where('state_country_id', $country);

        $query = $this -> db -> get('states');

        return $query->result();

     }*/

     function getcity($state)

     {

        $this -> db -> select('*');

        $this -> db -> where('city_state_id', $state);

        $query = $this -> db -> get('cities');

        return $query->result();

     }



		

		function getImage()

{





			$id=$this->session->userdata('uid');

			$this->db->where('uid',$id);

			$q = $this->db->get('usermaster');

			

			if($q->num_rows() > 0) 

				{

				$data = array();

				foreach($q->result() as $row) 

				{

					$data=$row;

				}

					return $data;

				}

		







     }
	 
function get_success_transactions_details($var)

{ 

$success="Transaction Successful";

	$this->db->select('SUM(amount) as total, type');

 //  $this->db->from('recharge_details_buffer');
    $this->db->from('recharge_details');

   $this->db->group_by('type');

   $this->db->where('result',$success);
   $type=$this->session->userdata('type');

  if($type!="admin")

  { 
    $this->db->where('by_id',$var);
  }
 //$this->db->where(array('by_id' => $var, 'result' => $success));

   $query = $this->db->get();

  return $query->result();
 

}
  function get_failiure_transactions_details($var)

{ 

$success="Transaction Successful";

	$this->db->select('SUM(amount) as total, type');

 //  $this->db->from('recharge_details_buffer');

 $this->db->from('recharge_details');

   $this->db->group_by('type');

   $this->db->where('result !=',$success);
   
    $type=$this->session->userdata('type');

  if($type!="admin")

  { 
    $this->db->where('by_id',$var);
  }
   

   $query = $this->db->get();

  return $query->result();
 

}

  function get_saved_card_details($uid)

{ 

    
   $this->db->select('*');

   $this->db->from('card_details');

   $this->db->where('usermaster_uid',$uid);

   $query = $this->db->get();

  return $query->result();

}
	 
 function get_saved_address_details($uid)

{ 

    
   $this->db->select('*');

   $this->db->from('address_details');

   $this->db->where('address_uid',$uid);

   $query = $this->db->get();

  return $query->result();

}
function get_saved_transaction_details($uid)

{ 

    
   $this->db->select('*');
//$this->db->from('recharge_details_buffer');
   $this->db->from('recharge_details');

   $this->db->where('by_id',$uid);
   
   $this->db->order_by('rdate', "desc");
   
   $this->db->limit(2);

   $query = $this->db->get();

  return $query->result();

}

function get_service_recharge_details()
{ 

$success="Transaction Successful";

	$this->db->select('*,SUM(amount) as total, COUNT(id) as user_total');

   $this->db->from('recharge_details');

   $this->db->group_by('service');

   $this->db->where('result',$success);

   $query = $this->db->get();

  return $query->result();

}





 function get_total_user_details()

{ 



	$this->db->select('COUNT(*) as total');

   $this->db->from('recharge_details');

   $query = $this->db->get();

  return $query->result();

}



	 function get_total_user_success_details()

{ 

$success="Transaction Successful";

	$this->db->select('COUNT(*) as user_total');

   $this->db->from('recharge_details');

      $this->db->where('result',$success);

   $query = $this->db->get();

  return $query->result();

}

	

 function get_total_user_failure_details()

{ 

$success="Transaction Successful";

	$this->db->select('COUNT(*) as user_total');

   $this->db->from('recharge_details');

      $this->db->where('result !=',$success);

   $query = $this->db->get();

  return $query->result();

}





function get_total_user_pending_details()

{ 

$pending="Transaction Pending";

	$this->db->select('COUNT(*) as user_total');

   $this->db->from('recharge_details');

      $this->db->where('result',$pending);

   $query = $this->db->get();

  return $query->result();

}





function get_distributors_details()

{ 

/*$distributor="distributor";

	$id=$this->session->userdata('uid');

	$this->db->select('COUNT(*) as distributor_total');

   $this->db->from('usermaster');

      $this->db->where('parent_id',$id);

	   $this->db->where('type',$distributor);

   $query = $this->db->get();

  return $query->result();*/

 $id=$this->session->userdata('uid');

  $type=$this->session->userdata('type');

  if($type==="admin")

  {

  $id=$this->session->userdata('uid');

  $sql = "select count(*) as distributor_total from usermaster where uid in(

SELECT uid FROM usermaster WHERE parent_id=$id)and type='distributor'";

			$qry= $this->db->query($sql);

			return $qry->result();

			}

  else

  {

	  $distributor="distributor";

	$id=$this->session->userdata('uid');

	$this->db->select('COUNT(*) as distributor_total');

   $this->db->from('usermaster');

      $this->db->where('parent_id',$id);

	   $this->db->where('type',$distributor);

   $query = $this->db->get();

  return $query->result();

  }

}



function get_retailer_details()

{ 

/*$franchise="franchise";

	$id=$this->session->userdata('uid');

	$this->db->select('COUNT(*) as franchise_total');

   $this->db->from('usermaster');

      $this->db->where('parent_id',$id);

	   $this->db->where('type',$franchise);

   $query = $this->db->get();

  return $query->result();*/

  //$franchise="franchise";

	

  $id=$this->session->userdata('uid');

  $type=$this->session->userdata('type');

  if($type==="admin")

  {

  $sql = "select count(*) as franchise_total from usermaster where parent_id in(

SELECT uid FROM usermaster WHERE parent_id=$id)and type='franchise'";

			$qry= $this->db->query($sql);

			return $qry->result();

  }

  else

  {

	  $franchise="franchise";

	$id=$this->session->userdata('uid');

	$this->db->select('COUNT(*) as franchise_total');

   $this->db->from('usermaster');

      $this->db->where('parent_id',$id);

	   $this->db->where('type',$franchise);

   $query = $this->db->get();

  return $query->result();

	  

  }

}







	 

	 

	function dth($dates,$type)

		{

			$count = $this->db->count_all("recharge_details where type='".$type."' && rdate='".$dates."'");

			return $count;

		}

function postpaid($dates,$type1)

		{

			$count1 = $this->db->count_all("recharge_details where type='".$type1."' && rdate='".$dates."'");

			return $count1;

		}

function prepaid($dates,$type2)

		{

			$count2 = $this->db->count_all("recharge_details where type='".$type2."' && rdate='".$dates."'");

			return $count2;

		}  

		

		function get_distributors_parent_details()

{ 



	$id=$this->session->userdata('parent_id');

$this->db->select('*');

   $this->db->from('usermaster');

      $this->db->where('uid',$id);

	   $query = $this->db->get();

  return $query->result();

}



 function get_login_franchise_recharge_details()

{ 

$success="Transaction Successful";

$user_id=$this->session->userdata('uid');

	$this->db->select('*,SUM(amount) as login_franchise_total_amount,SUM(commission) as retailer_commission');

//   $this->db->from('recharge_details_buffer');
   
    $this->db->from('recharge_details');

  $this->db->where('by_id',$user_id);

   $this->db->where('result',$success);

   $query = $this->db->get();

  return $query->result();

}

	public function insert_sms_details($sms_data)
		{
			$this->db->insert('smsoutgoing',$sms_data);
			return $this->db->insert_id();
		}	 



	


 function sms($mobile_no,$secure_code)

		{


      //   $testing="One Time Password to verify your Mobile $mobile_no on Paybuks is $secure_code.This verification code for safety of your account and must be done before you proceed.";
		 $testing="One Time Password to verify your Mobile $mobile_no on Paybuks is $secure_code.";
          //$url = "http://alerts.solutionsinfini.com//api/v3/index.php?method=sms&api_key=A96b7866cc3166b24d4c6397ef5d6d436&to=$mobile_no&sender=IRUPAY&message=$testing&format=json&custom=1,2";
		                    $url = "http://alerts.solutionsinfini.com//api/v3/index.php?method=sms&api_key=A96b7866cc3166b24d4c6397ef5d6d436&to=$mobile_no&sender=PAYBUK&message=$testing&format=json&custom=1,2";	
			
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
                                   return true;


        }


	public function otpsmsinsert($insetsms_data)
		{
			$this->db->insert('smsoutgoing',$insetsms_data);
		    $qry= $this->db->insert_id();
			return true;
		}	 



	


 function otpsms($mobile_no,$auth_code)

		{


       //  $testing="One Time Password to verify your Mobile $mobile_no on Paybuks is $auth_code.This verification code for safety of your account and must be done before you proceed.";
	   $testing = "One Time Password to verify your Mobile $mobile_no on Paybuks is $auto_no.";
         $url = "http://alerts.solutionsinfini.com/api/v3/index.php?method=sms&api_key=A96b7866cc3166b24d4c6397ef5d6d436&to=$mobile_no&sender=PAYBUK&message=$testing&format=json&custom=1,2";
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
                                   return true;


        }	

       
    public function check_mobile_no($mobile_no)
		{
			$query="select * from usermaster where mobile='$mobile_no'";
			$result=mysql_query($query) or die(error);
			if(mysql_num_rows($result))
			{
				$this->db->where('mobile',$mobile_no);
				$data = $this->db->get('usermaster');
				foreach ($data->result() as $row)
				{
					$user_Name= $row->name ;
					$password=$row->password;
					$mobile_no=	$row->mobile;
				}
				$testing="PASSWORD:Username: $user_Name, Password: $password";
				$url = "http://alerts.solutionsinfini.com//api/v3/index.php?method=sms&api_key=A96b7866cc3166b24d4c6397ef5d6d436&to=$mobile_no&sender=PAYBUK&message=$testing&format=json&custom=1,2";
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
				echo "<script type='text/javascript'>alert('Check your sms password has beed send.');window.location.href = 'user';</script>";
				//redirect(site_url('user'));	 
			}
			else
			{
			echo "<script type='text/javascript'>alert('Invalid  Mobile Number'); window.location.href = 'user';  </script>";
			}

		}

    
		public function send_sms($email,$name,$usname,$pass,$mobile)
		{
			$testing="Welcome to Paybuks,Dear $name,your account has been activated.Your User ID: $usname and Password: $pass";
					//$url = "http://alerts.solutionsinfini.com//api/v3/index.php?method=sms&api_key=A96b7866cc3166b24d4c6397ef5d6d436&to=$mobile&sender=IRUPAY&message=$testing&format=json&custom=1,2";
					$url = "http://alerts.solutionsinfini.com/api/v3/index.php?method=sms&api_key=A96b7866cc3166b24d4c6397ef5d6d436&to=$mobile&sender=PAYBUK&message=$testing&format=json&custom=1,2";
					
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
			
		} 	
		 
		 
	function insertcarddetails($data)

		{
            $this->db->insert('card_details',$data);
			$qry= $this->db->insert_id();
			return $qry;

		}	 
		 
		function insertaddressdetails($data)

		{
            $this->db->insert('address_details',$data);
			$qry= $this->db->insert_id();
			return $qry;

		}	 
		 

	function get_secure_code($datas)

		{

			$this->db->select('secure_code');

			$this->db->from('usermaster');

			$this->db->where('uid',$datas);

			$query=$this->db->get();

			return  $query->result();  

		} 
		 

function add_money($amount,$uid){
  
  $result = $this->db->select('used_balance')->where('uid',$uid)->get('usermaster')->row();
    
 if ( $result->used_balance  > 0 ){
	 
	
	  $totalAmount =  $result->used_balance + $amount;
  
 }else{
	 $totalAmount =  $amount;
 }
 
  
  $amountArray=array(
      'total_balance' =>$totalAmount
   );
 
    //$query = $this->db->where('uid',$uid)->update('usermaster',$amountArray);
 
  if($this->db->where('uid',$uid)->update('usermaster',$amountArray)){
  /* echo $this->db->last_query();
   echo  $totalAmount;
	exit();
   */
   return true;
   
  }else{
   
      return false; 
  }
 }
	
	
	
	function add_sendmoney_bal($amount,$uid){
		
		$query = $this->db->select('send_money_bal')->where('uid',$uid)->get('usermaster')->row();
		
		$totalSendMoneyBal = $amount + $query->send_money_bal;
		
	
		$amountArray=array(
		    'send_money_bal' =>$totalSendMoneyBal
			);
	
		if($this->db->where('uid',$uid)->update('usermaster',$amountArray)){
		
			return true;
			
		}else{
			
		    return false;	
		}
	}	 
		 	 
		 
	 function citylist($state_id)
	{
		$this->db->select('city_id,city_name');
		$this->db->from('cities');
		$this->db->where('city_state_id',$state_id);
		$query = $this -> db -> get()->result();

		
		
		return $query;
	} 
		 
		 
		 
		}	 

	