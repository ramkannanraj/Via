 

<html>
<script type = "text/javascript" >
    history.pushState(null, null, 'secure_login');
    window.addEventListener('popstate', function(event) {
    history.pushState(null, null, 'secure_login');
    });
    </script>
<script src="<?php echo base_url()?>assets/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url()?>assets/js/tiny-scrollbar.js"></script>
 <head>

 <script type="text/javascript">

/*$(document).ready(function(){

    $("select").change(function(){

        $(this).find("option:selected").each(function(){

            if($(this).attr("value")=="prepaid"){

                

                $("#prepaid_div").show();

				$("#postpaid_div").hide();

				$("#dth_div").hide();

            }

            else if($(this).attr("value")=="postpaid"){

                $("#postpaid_div").show();

				 $("#prepaid_div").hide();

				 $("#dth_div").hide();

            }

            else if($(this).attr("value")=="dth"){

                  $("#dth_div").show();

				  $("#postpaid_div").hide();

				   $("#prepaid_div").hide();

            }

            else{

                $("#prepaid_div").show();

				$("#postpaid_div").hide();

				$("#dth_div").hide();

            }

        });

    }).change();

});





$(document).ready(function(){



    $('input[type="radio"]').click(function(){



        if($(this).attr("value")=="mobile"){



         $("#prepaid_div").show();

		$("#postpaid_div").show();

				$("#dth_div").hide();



        }



      else if($(this).attr("value")=="dth"){

                  $("#dth_div").show();

				  $("#postpaid_div").hide();

				   $("#prepaid_div").hide();

            }

            else{

                $("#prepaid_div").show();

				$("#postpaid_div").show();

				$("#dth_div").hide();

            }



        



    });

	

	



});*/

</script>
	<script type="text/javascript">

  $(function () {
          //create instance
         
      //Tiny Scrollbar
      $('#scrollbar').tinyscrollbar();
        $('#scrollbar-two').tinyscrollbar();
         $('#scrollbar-three').tinyscrollbar();

  });
		</script>

 <style type="text/css">

 .brand 

 {

	

    font-size: 11px;

    text-decoration: none;

    color: #fff;

    font-weight: 300;

    text-transform: uppercase;

 }

  .brand1 a

  {

	  font-size: 11px;

    text-decoration: none;

    color: #fff;

    

    font-weight: 300;

    text-transform: uppercase;

  }
  
  .widget .widget-body{ height:auto !important; }
  .dashwidth{ width:80% !important; }
@media (min-width: 240px) and (max-width: 767px) {
.widget .widget-body{ height:auto !important; }
.dashwidth{ width:100% !important; }
}
  </style>

 </head>

    <div class="dashboard-container">



      <div class="container">

        <div class="dashboard-wrapper">

          

          <!-- Left Sidebar Start -->

          <div class="left-sidebar">

            

            <!-- Row Start -->

            <div class="row">

              <div class="col-lg-12 col-md-12 dashwidth">

                <div class="widget">

                  <div class="widget-header">

                    <div class="title">

                     Dashboard

                    </div>

                    

                  </div>

                  <div class="widget-body" >

                    <div class="metro-nav">

                      <div class="metro-nav-block nav-block-blue double" style="height:200px;"  >

					  <div class="brand1">

					  <a href="#">

					     <i class="fa fa-user"></i> <?php echo $this->session->userdata('type');?></a><br><br>

                       <?php foreach($user_details as $user){ ?>

					   <table style="width:100%;height:130px;">

					   <tr >

					   <td style="width:50%;padding-left: 15px; color:white;"> Name</td>

					   <td class="captail"style="width:50%;color:white;"><?php  echo $user->name;?></td>

					   </tr>

					    <tr >

					   <td style="width:50%;padding-left: 15px;color:white;"> User code</td>

					   <td style="width:50%;color:white;" class="captail"><?php  echo $user->username;?></td>

					   </tr>

					    <tr >

					   <td style="width:50%;padding-left: 15px;color:white;"> Mobile Number</td>

					   <td style="width:50%;color:white;" class="captail"><?php  echo $user->mobile;?></td>

					   </tr>

					    

                        

                        <tr>

                       <td style="width:50%;padding-left: 15px;color:white;">Total Amount</td>

                       

					     <?php $total=$user->total_balance; 

					   $used=$user->used_balance;

					   $available=$total-$used;

					   ?>

					   <td style="width:50%;color:white;" class="captail"><?php  echo $available;?></td>
                    
					   </tr>

                      

                         <!--<tr>

					   <td style="width:50%;padding-left: 15px;color:white;"> Total Amount</td>

					   <td style="width:50%;color:white;" class="captail"><?php  //echo $user->total_balance;?></td>

					   </tr>

					  

					  <tr >

					   <td style="width:50%;padding-left: 15px;color:white;">Used Balance</td>

					   <td style="width:50%;color:white;" class="captail"><?php  //echo $user->used_balance;?></td>

					   </tr>

                        <tr >

					   <td style="width:50%;padding-left: 15px;color:white;">Avaliable Balance</td>

                       <?php /*$total=$user->total_balance; 

					   $used=$user->used_balance;

					   $available=$total-$used;*/

					   ?>

					   <td style="width:50%;color:white;" class="captail"><?php  //echo $available;?></td>

					   </tr>-->

					   </table><?php } ?>

					 </div>

                       

                      </div>

                     

                    <div class="metro-nav-block nav-block-green" style="height:200px;">

                      <!--  <a href="#" >

                          <i class="fa fa-user"></i>

                          <div class="info"></div>

                          <div class="brand">Distributors</div>

                        </a>--><a href="#">

                           <i class="fa fa-user"></i>

						   <?php $type=$this->session->userdata('type');?>

						   <?php if($type==="admin" || $type==="super"){echo strtoupper("Distributor");} 

						   

						   else if($type==="distributor"){echo strtoupper("Superstockist");}

						   

						    else if($type==="franchise"){echo strtoupper("Distributor");}

						   ?>

                          <div class="info"></div>

                          

<?php 

 $type=$this->session->userdata('type');

if($type === "admin" ||$type === "super" ){?>

 <div>

  

 <table style="width:100%;height:130px;">

					   <tr>

<td style="color:white;font-weight: bold;">Distributor Count</td>

<td style="color:white;font-weight: bold; padding-right:61px;">

 <?php foreach ($distributor_details as $total_distributor) {

							  echo $total_distributor->distributor_total;

						  }?> 

                          </td>

                          </tr>

                          </table>

                         </div>

 



<?php } 



if($type === "distributor"){?>





<div>

     <?php foreach($distributor_parent_details as $dist_parent_det){ ?>

 <table style="width:100%;height:130px;">

					   <tr>

  <td style="width:50%;padding-left: 15px;color:white;">Name</td>

<td style="width:50%;color:white;" class="captail"><?php echo $dist_parent_det->name;?>

 

                          </td>

                           </tr>

                           <tr>

                         <td style="width:50%;padding-left: 15px;color:white;">Code</td>

<td style="width:50%;color:white;" class="captail"><?php echo $dist_parent_det->username;?> 

 

                          </td>

                          </tr>

                            <tr>

                         <td style="width:50%;padding-left: 15px;color:white;">Mobile</td>

<td style="width:50%;color:white;" class="captail"><?php echo $dist_parent_det->mobile;?> 

 

                          </td>

                          </tr>

                          </table>

                          <?php

	 }?>

                         </div>

 



<?php } 



if($type === "franchise"){?>





<div>

     <?php foreach($distributor_parent_details as $dist_parent_det){ ?>

 <table style="width:100%;height:130px;">

					   <tr>

  <td style="width:50%;padding-left: 15px;color:white;">Name</td>

<td style="width:50%;color:white;" class="captail"><?php echo $dist_parent_det->name;?>

 

                          </td>

                           </tr>

                           <tr>

                         <td style="width:50%;padding-left: 15px;color:white;">Code</td>

<td style="width:50%;color:white;" class="captail"><?php echo $dist_parent_det->username;?> 

 

                          </td>

                          </tr>

                           <tr>

                         <td style="width:50%;padding-left: 15px;color:white;">Mobile</td>

<td style="width:50%;color:white;" class="captail"><?php echo $dist_parent_det->mobile;?> 

 

                          </td>

                          </tr>

                          </table>

                          <?php

	 }?>

                         </div>

 



<?php } 







else if($type === "consumer" ) { ?>

<div class="brand">Add Wallet</div>  <?php } ?>                          </a>	

						

					   <!--<table style="width:100%;height:130px;">

					   <tr >

					   <td style="width:50%;padding: 5px;"> Name</td>

					   <td style="width:50%">Distributor</td>

					   </tr>

					    <tr >

					   <td style="width:50%;padding: 5px"> User code</td>

					   <td style="width:50%">Admin_123</td>

					   </tr>

					    <tr >

					   <td style="width:50%;padding: 5px"> Mobile Number</td>

					   <td style="width:50%">988412635</td>

					   </tr>

					    <tr >

					   <td style="width:50%;padding: 5px"> Limit Amount</td>

					   <td style="width:50%">5000</td>

					   </tr>

					   

					   </table>-->

					 

                      </div>

					  <div class="metro-nav-block nav-block-yellow" style="height:200px;">

                       <!-- <a href="#" >

                          <i class="fa fa-user"></i>

                          <div class="info"></div>

                          <div class="brand">Retailers</div>

                        </a>-->

								<a href="#">

                          <i class="fa fa-user"></i>

                          <?php $type=$this->session->userdata('type');

						  if($type === "franchise")

						  {

							  echo strtoupper("Recharged Amount");

						  }

						  else if($type === "admin" || $type === "distributor" ||$type === "super")

						  {

							   echo strtoupper("Retailers");

						  }

						  ?>

                          <div class="info"> </div>

<?php 

 $type=$this->session->userdata('type');

if($type === "admin" || $type === "distributor" ||$type === "super" ){?>



<div>

 <table style="width:100%;height:130px;">

					   <tr>

<td style="color:white;">Retailer Count</td>

<td style="color:white; padding-right:61px;">

 <?php foreach ($franchise_details as $total_franchise) {

							  echo $total_franchise->franchise_total;

						  }?>

</td>

</tr>

</table>

</div>



<?php } 







if($type === "franchise"){?>



<div>

 <table style="width:100%;height:130px;">

					   <tr>

<td style="color:white;">Recharged Amount</td>

<td style="color:white; padding-right:61px; font-size:20px;">

 <?php foreach ($login_franchise_details as $total_franchise_amout) {

							  echo $total_franchise_amout->login_franchise_total_amount;

						  }?>

</td>

</tr>

 <tr>

<td style="color:white;">Commission Received</td>

<td style="color:white; padding-right:61px; font-size:20px;">

 <?php foreach ($login_franchise_details as $total_franchise_amout) {

							  echo round($total_franchise_amout->retailer_commission,2);

						  }?>

</td>

</tr>



</table>

</div>



<?php } 















else if($type === "consumer" ) { ?>

<div class="brand">Coupons</div>  <?php } ?>                         </a>	

                       

					 <!--  <table style="width:100%;height:130px;">

					   <tr>

					   <td style="width:50%;padding: 5px"> Name</td>

					   <td style="width:50%">Retailer</td>

					   </tr>

					    <tr >

					   <td style="width:50%;padding: 5px"> User code</td>

					   <td style="width:50%">Admin_123</td>

					   </tr>

					    <tr >

					   <td style="width:50%;padding: 5px"> Mobile Number</td>

					   <td style="width:50%">988412635</td>

					   </tr>

					    <tr >

					   <td style="width:50%;padding: 5px"> Limit Amount</td>

					   <td style="width:50%">5000</td>

					   </tr>

					   

					   </table>-->

					

                      </div>

                     

                      

                      <div class="metro-nav-block nav-block-green">

                        <a href="#">

                          <i class="fa fa-smile-o"></i>

                          <div class="info"> <?php foreach ($success_recharge_details as $total_user) {

							 $success_recharged=$total_user->user_total;

							  

						  }

						  foreach ($total_recharge_details as $total_det) {

							 $total_recharged=$total_det->total;

							  

						  }

						  $perct=($success_recharged / $total_recharged)*100;

						    echo round($perct, 2)."%"; 

						  

						  ?> </div>

                          <div class="brand">Success Recharge

                          

                          

                          </div>

                        </a>

                      </div>

                     

                      <div class="metro-nav-block nav-block-blues">

                        <a href="#">

                          <i class="fa fa-smile-o"></i>

                          <div class="info">

                           <?php foreach ($pending_details as $total_pending_user) {

							  $pending_recharged=$total_pending_user->user_total;

						  }

						  

						  foreach ($total_recharge_details as $total_det) {

							 $total_recharged=$total_det->total;

							  

						  }

						  $perct=($pending_recharged / $total_recharged)*100;

						   echo round($perct, 2)."%"; 

						  

						  ?>

                          

                          </div>

                          <div class="brand">Process Recharge</div>

                        </a>

                      </div>

                      <div class="metro-nav-block nav-block-red double">

                        <a href="#">

                          <i class="fa fa-times-circle-o"></i>

                          <div class="info">  <?php foreach ($failure_recharge_details as $total_failure_user) {

							  $failure_recharged=$total_failure_user->user_total;

						  }

						  

						  

						   foreach ($total_recharge_details as $total_det) {

							 $total_recharged=$total_det->total;

							  

						  }

						  $perct=($failure_recharged / $total_recharged)*100;

						  echo round($perct, 2)."%"; 

						  //echo $perct."%";

						  ?> </div>

                          <div class="brand">Failure Recharge

                         

                          </div>

                        </a>

                      </div>

                      

                      <!--<div class="metro-nav-block nav-block-green double">

                        <a href="#">

                          <i class="fa fa-suitcase"></i>

                          <div class="info">$39432</div>

                          <div class="brand">Stock</div>

                        </a>

                      </div>-->

                      <!--<div class="metro-nav-block nav-block-orange">

                        <a href="#">

                          <i class="fa fa-envelope-o"></i>

                          <div class="info">434</div>

                          <div class="brand">Messages</div>

                        </a>

                      </div>-->

                      <!--<div class="metro-nav-block nav-block-blue">

                        <a href="#">

                          <i class="fa fa-facebook-square"></i>

                          <div class="info">985</div>

                          <div class="brand">Likes</div>

                        </a>

                      </div>-->

                      <!--<div class="metro-nav-block nav-block-red">

                        <a href="#">

                          <i class="fa fa-gamepad"></i>

                          <div class="info">329</div>

                          <div class="brand">Games</div>

                        </a>

                      </div>-->

                      <!--<div class="metro-nav-block nav-block-green">

                        <a href="#">

                          <i class="fa fa-map-marker"></i>

                          <div class="info">583</div>

                          <div class="brand">Locations</div>

                        </a>

                      </div>-->

                      <!--<div class="metro-nav-block nav-block-yellow double">

                        <a href="#">

                          <i class="fa fa-twitter"></i>

                          <div class="info">199</div>

                          <div class="brand">Tweets</div>

                        </a>

                      </div>-->

                    </div>

                  </div>

                </div>

              </div>

            </div>

            <!-- Row End -->



            <!-- Row Start -->

            <div class="row">

              <div class="col-lg-12 col-md-12" >

                <div class="widget">

                  <div class="widget-header">

                    <div class="title">

<?php 

 $type=$this->session->userdata('type');

if($type === "admin" || $type === "franchise" ||$type === "distributor" ||$type === "super" ){?> Report

<?php } else if($type === "consumer" ) { ?>

Transactions <?php } ?>                    </div>

                   <span class="tools">

                      <a class="btn btn-info btn-sm" href="#">Today</a>

                     <!-- <a class="btn btn-success btn-sm" href="#">Yesterday</a>

                      <a class="btn btn-danger btn-sm" href="#">Last week</a>-->

                    </span>

                  </div>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
     
           
    
    </head>
    <body>
     
     <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.2/d3.min.js" charset="utf-8"></script>
     <script src="<?php echo base_url();?>/assets/js/nv.d3.js"></script>
	
 
  
    <style>
         
        .testBlock {
            display: block;
            float: left;
            height: 300px;
            width: 227px;
		 
        }
		 
        
    </style>
		 
       
    </body>
</html>




                  <div class="widget-body" >

                    <div class="pie-charts-container">
					
					<div class="testBlock"><svg id="test2"></svg><div >Postpaid</div> </div>
						 

						<div class="testBlock"><svg id="test1"></svg><div >Prepaid</div></div>
						   

						<div class="testBlock"><svg id="test3"></svg><div >DTH</div></div>
						    

						<!--<div class="testBlock"><svg id="test4"></svg><div >Gas</div></div>-->
 						  

                   
                      <div class="clearfix"></div>

                    </div>

                  </div>

                </div>

              </div>

            </div>

            <!-- Row End -->



            <!-- Row Start -->

            

            <!-- Row End -->



            <!-- Row Start -->

            

            



          </div>

          <!-- Left Sidebar End -->



          <!-- Right Sidebar Start -->

		  <?php 

 $type=$this->session->userdata('type');

if($type === "admin" || $type === "franchise" ||$type === "distributor" ||$type === "super" ){?>



          <div class="right-sidebar">

           <!-- <form method="post">

            <div>

          <!--<select class="form-control type" name="month_deatails">

          <option>Select</option>

          

          <option value="prepaid">Prepaid</option>

        

          <option value="postpaid">Postpaid</option>

          <option value="dth">DTH</option>

          </select>

          

 <input type="radio" value="mobile" name="service_type" id="service_type" class="card_type" checked><img src="<?php echo base_url() ?>images/mobile_img.png" width="24" style="margin-bottom:8px;"> 

   <input type="radio" value="dth" name="service_type" id="service_type" class="card_type"><img src="<?php echo base_url() ?>images/dth.png" width="24" style="margin-bottom:8px;">

              

      

          </div>

          </form>-->

            <div class="wrapper" id="prepaid_div">
 <div id="scrollbar">
                <div class="scrollbar">
                  <div class="track">
                    <div class="thumb">
                      <div class="end">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="viewport">
                  <div class="overview">


            <h4><img src="<?php echo base_url() ?>images/prepaid.png" width="17" style="margin-bottom:8px;"> PREPAID</h4>

              <?php 

			  

			   if($service_recharge_details>0)

			  {

			  foreach ($service_recharge_details as $y) {

				  

				     if($y->type=="prepaid") { 

				  ?>

              <ul class="stats airtel box1">

                <li>

                  <div class="left">

                  

                    <p style="color:#1CB54A;">

                 

<b><?php echo $y->service;?></b>

                    </p>

                  </div>

                  <div class="chart">

                    <span id="unique-visitors" style="color:#cc4892;">

                       <?php echo $y->total; ?>

                    </span>

                  </div>

                </li>

              </ul>

              	<?php

				

					 }

					 

					     

					 

					 

					   }

					   

			  }

 else

	{?>

    <ul class="stats airtel box1">

                <li>

                  <div class="left">

                  

                    <p style="color:#ED6D49;;">

                 

<b><?php echo "No Record Found";?></b>

                    </p>

                  </div>

                  <div class="chart">

                    <span id="unique-visitors" style="color:#1CB54A;">

                      

                    </span>

                  </div>

                </li>

              </ul>

    <?php

		

	}			   

				

					   

					    ?>



            </div>

            </div>
</div></div>
<div style="margin-top:10px;">

            <div class="wrapper" id="postpaid_div">
<div id="scrollbar-two">
                <div class="scrollbar">
                  <div class="track">
                    <div class="thumb">
                      <div class="end">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="viewport">
                  <div class="overview">
            <h4><img src="<?php echo base_url() ?>images/prepaid.png" width="17" style="margin-bottom:8px;"> POSTPAID</h4>

            

              <?php 

			   if($service_recharge_details>0)

			  {

			  foreach ($service_recharge_details as $y) {

				  

				     if($y->type=="postpaid") { 

				  ?>

              <ul class="stats airtel box1">

                <li>

                  <div class="left">

                  

                    <p style="color:#39F">

                 

<b><?php echo $y->service;?></b>

                    </p>

                  </div>

                  <div class="chart">

                    <span id="unique-visitors" style="color:#FF5500;">

                       <?php echo $y->total; ?>

                    </span>

                  </div>

                </li>

              </ul>

              	<?php

				

					 }

					 

					     

					 

					 

					   }

					   

						  

	}

	

	else

	{?>

    <ul class="stats airtel box1">

                <li>

                  <div class="left">

                  

                    <p style="color:#ED6D49;;">

                 

<b><?php echo "No Record Found";?></b>

                    </p>

                  </div>

                  <div class="chart">

                    <span id="unique-visitors" style="color:#1CB54A;">

                      

                    </span>

                  </div>

                </li>

              </ul>

    <?php

		

	}			   

					    ?>



            </div>

             </div>
 </div> </div>
            

            
</div>
            

            <div style="margin-top:10px;">

            <div class="wrapper" id="dth_div">
 <div id="scrollbar-three">
                <div class="scrollbar">
                  <div class="track">
                    <div class="thumb">
                      <div class="end">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="viewport">
                  <div class="overview">

            <h4><img src="<?php echo base_url() ?>images/dth.png" width="24" style="margin-bottom:8px;"> DTH</h4>

              <?php 

			  if($service_recharge_details>0)

			  {

			  foreach ($service_recharge_details as $y) {

				  

				     if($y->type=="dth") { 

				  ?>

              <ul class="stats airtel box1">

                <li>

                  <div class="left">

                  

                    <p style="color:#ED6D49;;">

                 

<b><?php echo $y->service;?></b>

                    </p>

                  </div>

                  <div class="chart">

                    <span id="unique-visitors" style="color:#1CB54A;">

                       <?php echo $y->total; ?>

                    </span>

                  </div>

                </li>

              </ul>

              	<?php

				

					 }

					 

					

				  }

				  

	}

	

	else

	{?>

    <ul class="stats airtel box1">

                <li>

                  <div class="left">

                  

                    <p style="color:#ED6D49;;">

                 

<b><?php echo "No Record Found";;?></b>

                    </p>

                  </div>

                  <div class="chart">

                    <span id="unique-visitors" style="color:#1CB54A;">

                      

                    </span>

                  </div>

                </li>

              </ul>

    <?php

		

	}

					   ?>


</div>
</div>
</div>
            </div>

           

          </div>

          

		  <?php } ?>

          <!-- Right Sidebar End -->

        </div>

        <!-- Dashboard Wrapper End -->



        



      </div>

    </div>
<?php

$num_result = mysql_query("SELECT count(*)  as id from  recharge_details where error_status_code=0 AND type='prepaid' ") or exit(mysql_error());
$row = mysql_fetch_object($num_result);
$faile_msg=$row->id;
 

$num_result = mysql_query("SELECT count(*)  as id from  recharge_details where error_status_code=1  AND type='prepaid' ") or exit(mysql_error());
$row = mysql_fetch_object($num_result);
$sucess_msg=$row->id;

$num_result = mysql_query("SELECT count(*)  as id from  recharge_details where error_status_code=2  AND type='prepaid' ") or exit(mysql_error());
$row = mysql_fetch_object($num_result);
$process_msg=$row->id;

 
$num_result = mysql_query("SELECT count(*)  as id from  recharge_details where error_status_code=0 AND type='postpaid' ") or exit(mysql_error());
$row = mysql_fetch_object($num_result);
$po_faile_msg=$row->id;

$num_result = mysql_query("SELECT count(*)  as id from  recharge_details where error_status_code=1  AND type='postpaid' ") or exit(mysql_error());
$row = mysql_fetch_object($num_result);
$po_sucess_msg=$row->id;

$num_result = mysql_query("SELECT count(*)  as id from  recharge_details where error_status_code=2  AND type='postpaid' ") or exit(mysql_error());
$row = mysql_fetch_object($num_result);
$po_process_msg=$row->id;

 

$num_result = mysql_query("SELECT count(*)  as id from  recharge_details where error_status_code=0 AND type='dth' ") or exit(mysql_error());
$row = mysql_fetch_object($num_result);
$dth_faile_msg=$row->id;

$num_result = mysql_query("SELECT count(*)  as id from  recharge_details where error_status_code=1  AND type='dth' ") or exit(mysql_error());
$row = mysql_fetch_object($num_result);
$dth_sucess_msg=$row->id;

$num_result = mysql_query("SELECT count(*)  as id from  recharge_details where error_status_code=2  AND type='dth' ") or exit(mysql_error());
$row = mysql_fetch_object($num_result);
$dth_process_msg=$row->id;



$num_result = mysql_query("SELECT count(*)  as id from  recharge_details where error_status_code=0 AND type='gas' ") or exit(mysql_error());
$row = mysql_fetch_object($num_result);
$gas_faile_msg=$row->id;

$num_result = mysql_query("SELECT count(*)  as id from  recharge_details where error_status_code=1  AND type='gas' ") or exit(mysql_error());
$row = mysql_fetch_object($num_result);
$gas_sucess_msg=$row->id;

$num_result = mysql_query("SELECT count(*)  as id from  recharge_details where error_status_code=2  AND type='gas' ") or exit(mysql_error());
$row = mysql_fetch_object($num_result);
$gas_process_msg=$row->id;

 

?>
<script>
$pre_process = "<?php echo $process_msg; ?>";
$pre_sucess = "<?php echo $sucess_msg; ?>";
$pre_fail = "<?php echo $faile_msg; ?>";
    var testdata = [
        {key: "One", y: $pre_process, color: "#55D4ff"},
        {key: "Two", y: $pre_sucess, color: "#C2d053"},
        {key: "Three", y: $pre_fail, color: "#CC4892"}
    ];

    var width = 200;
    var height = 200;

    nv.addGraph(function() {
        var chart = nv.models.pie()
                .x(function(d) { return d.key; })
                .y(function(d) { return d.y; })
                .width(width)
                .height(height)
                .labelType('percent')
                .valueFormat(d3.format('%'))
                .donut(true);

        d3.select("#test2")
                .datum([testdata])
                .transition().duration(1200)
                .attr('width', width)
                .attr('height', height)
                .call(chart);

        return chart;
    });

	
//postpaid
$post_process = "<?php echo $po_process_msg; ?>";
$post_sucess = "<?php echo $po_sucess_msg; ?>";
$post_fail = "<?php echo $po_faile_msg; ?>";
	var testdatas = [
        {key: "One", y: $post_process, color: "#55D4ff"},
        {key: "Two", y: $post_sucess, color: "#C2d053"},
        {key: "Three", y: $post_fail, color: "#CC4892"}
    ];

    var width = 200;
    var height = 200;

    nv.addGraph(function() {
        var chart = nv.models.pie()
                .x(function(d) { return d.key; })
                .y(function(d) { return d.y; })
                .width(width)
                .height(height)
                .labelType('percent')
                .valueFormat(d3.format('%'))
                .donut(true);

        d3.select("#test1")
                .datum([testdatas])
                .transition().duration(1200)
                .attr('width', width)
                .attr('height', height)
                .call(chart);

        return chart;
    });
	
	$dth_post_process = "<?php echo $dth_process_msg; ?>";
$dth_post_sucess = "<?php echo $dth_sucess_msg; ?>";
$dth_post_fail = "<?php echo $dth_faile_msg; ?>";
	var testdatad = [
        {key: "One", y: $dth_post_process, color: "#55D4ff"},
        {key: "Two", y: $dth_post_sucess, color: "#C2d053"},
        {key: "Three", y: $dth_post_fail, color: "#CC4892"}
    ];

    var width = 200;
    var height = 200;

    nv.addGraph(function() {
        var chart = nv.models.pie()
                .x(function(d) { return d.key; })
                .y(function(d) { return d.y; })
                .width(width)
                .height(height)
                .labelType('percent')
                .valueFormat(d3.format('%'))
                .donut(true);

        d3.select("#test3")
                .datum([testdatad])
                .transition().duration(1200)
                .attr('width', width)
                .attr('height', height)
                .call(chart);

        return chart;
    });
	
	/*gas
	$gas_post_process = "<?php echo $dth_process_msg; ?>";
$gas_post_sucess = "<?php echo $dth_sucess_msg; ?>";
$gas_post_fail = "<?php echo $dth_faile_msg; ?>";
	var testdatag = [
        {key: "One", y: $gas_post_process, color: "#55D4ff"},
        {key: "Two", y: $gas_post_sucess, color: "#C2d053"},
        {key: "Three", y: $gas_post_fail, color: "#CC4892"}
    ];

    var width = 200;
    var height = 200;

    nv.addGraph(function() {
        var chart = nv.models.pie()
                .x(function(d) { return d.key; })
                .y(function(d) { return d.y; })
                .width(width)
                .height(height)
                .labelType('percent')
                .valueFormat(d3.format('%'))
                .donut(true);
 
        d3.select("#test4")
                .datum([testdatag])
                .transition().duration(1200)
                .attr('width', width)
                .attr('height', height)
			 
                .call(chart);

        return chart;
    });*/
	
</script>
  </body>





</html>