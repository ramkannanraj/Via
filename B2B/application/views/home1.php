 
<html>
 <head>
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
 
 </style>
 </head>
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
                     Dashboard
                    </div>
                    
                  </div>
                  <div class="widget-body">
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
					   <td style="width:50%;color:white;" class="captail"><?php  echo $user->password;?></td>
					   </tr>
					    <tr >
					   <td style="width:50%;padding-left: 15px;color:white;"> Mobile Number</td>
					   <td style="width:50%;color:white;" class="captail"><?php  echo $user->mobile;?></td>
					   </tr>
					    <tr >
					   <td style="width:50%;padding-left: 15px;color:white;"> Limit Amount</td>
					   <td style="width:50%;color:white;" class="captail"><?php  echo $user->total_balance;?></td>
					   </tr>
                        <tr>
                          <?php  $url = "http://103.29.232.110:8089/Ezypaywebservice/GetBalance.aspx?AuthorisationCode=de4527cfd9674f86bc";
			 $ret = file($url);
			 $sess = explode(":",$ret[0]);
			 if ($sess[0] == "OK") {
			 $sess_id = trim($sess[1]); 
			 $url = "http://103.29.232.110:8089/Ezypaywebservice/GetBalance.aspx?AuthorisationCode=de4527cfd9674f86bc";
			 $ret = file($url);
			$send = explode(":",$ret[0]);
			if ($send[0] == "ID") {
			echo "successnmessage ID: ". $send[1];
			 }
			 else {
			 echo "send message failed";
			 }
			 } 
			 else {
				 $ret[0];
				 $data=(explode("~",$ret[0]));
				 
				 ?>
					   <td style="width:50%;padding-left: 15px;color:white;">Total Amount</td>
                       
					   <td style="width:50%;color:white;" class="captail"><?php  echo $data[0];?></td>
                       <?php
						   }?>
					   </tr>
					  
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
                          <div class="info"></div>
                          <div class="brand">Distributor</div>
                        </a>	
						
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
                          <div class="info"></div>
                          <div class="brand">Retailer</div>
                        </a>	
                       
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
                          <div class="info"></div>
                          <div class="brand">Sucess Recharge</div>
                        </a>
                      </div>
                     
                      <div class="metro-nav-block nav-block-blues">
                        <a href="#">
                          <i class="fa fa-smile-o"></i>
                          <div class="info"></div>
                          <div class="brand">Process Recharge</div>
                        </a>
                      </div>
                      <div class="metro-nav-block nav-block-red double">
                        <a href="#">
                          <i class="fa fa-times-circle-o"></i>
                          <div class="info"></div>
                          <div class="brand">Failure Recharge</div>
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
                      Reports
                    </div>
                   <span class="tools">
                      <a class="btn btn-info btn-sm" href="#">Today</a>
                     <!-- <a class="btn btn-success btn-sm" href="#">Yesterday</a>
                      <a class="btn btn-danger btn-sm" href="#">Last week</a>-->
                    </span>
                  </div>
                  <div class="widget-body">
                    <div class="pie-charts-container">
                      <div class="pie-chart">
                        <div class="chart1" data-percent="70">
                          Postpaid 
                        </div>
                        
                      </div>
                      <div class="pie-chart">
                        <div class="chart2" data-percent="71">
                           Prepaid
                        </div>
                       
                      </div>
                      <div class="pie-chart">
                        <div class="chart3" data-percent="87">
                        DTH
                        </div>

                      </div>
                      <div class="pie-chart">
                        <div class="chart4" data-percent="22">
                        Gas
                        </div>

                      </div>
                      <div class="pie-chart hidden-tablet">
                        <div class="chart5" data-percent="21">
                        Other
                        </div>

                      </div>
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
          <div class="right-sidebar">
            
            <div class="wrapper">
              <ul class="stats">
                <li>
                  <div class="left">
                    <h4>
                      15,859
                    </h4>
                    <p>
<b>Airtel</b>
                    </p>
                  </div>
                  <div class="chart">
                    <span id="unique-visitors">
                      3, 9, 8, 5, 3, 5, 2, 3, 4, 7
                    </span>
                  </div>
                </li>
                <li>
                  <div class="left">
                    <h4>
                      47,830
                    </h4>
                    <p>
                    <b> Aricel</b>
                    </p>
                  </div>
                  <div class="chart">
                    <span id="monthly-sales">
                      3, 9, 8, 5, 3, 5, 2, 3, 4, 7
                    </span>
                  </div>
                </li>
                <li>
                  <div class="left">
                    <h4>
                      98,846
                    </h4>
                    <p>
                     <b>Vodafone</b>
                    </p>
                  </div>
                  <div class="chart">
                    <span id="current-balance">
                      3, 5, 8, 5, 3, 5, 2, 9, 6, 8
                    </span>
                  </div>
                </li>
                <li>
                  <div class="left">
                    <h4>
                      18,846
                    </h4>
                    <p>
                    <b> Idea</b>
                    </p>
                  </div>
                  <div class="chart">
                    <span id="registrations">
                      3, 9, -8, 5, -3, 5, -2, 9, 6, 8
                    </span>
                  </div>
                </li>
                <li>
                  <div class="left">
                    <h4>
                      22,571
                    </h4>
                    <p>
                    <b>  Bsnl</b>
                    </p>
                  </div>
                  <div class="chart">
                    <span id="site-visits">
                      2, 5, -4, 6, -3, 5, -2, 7, 9, 5
                    </span>
                  </div>
                </li>
              </ul>
            </div>
            
            
            
           
          </div>
          <!-- Right Sidebar End -->
        </div>
        <!-- Dashboard Wrapper End -->

        

      </div>
    </div>
 
  </body>


</html>