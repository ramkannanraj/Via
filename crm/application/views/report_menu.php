
                    	<?php $type=$this->session->userdata('type');
						if($type === "admin" || $type === "distributor" ||$type === "retailer"  ){?>
                    	<a href="<?php echo site_url('report') ?>" class="btn btn-warning">Recharge Hristory</a>
                        
                        <?php }if($this->session->userdata('type')=="admin"){?>  
                        <a href="<?php echo site_url('sendmoneyreport/sendmoney_admin') ?>" class="btn btn-warning">Card Topup Report</a>                  <?php } ?>
                        
                        <?php if($this->session->userdata('type')=="distributor"){?> 
                        <a href="<?php echo site_url('sendmoneyreport/sendmoney_dist') ?>" class="btn btn-warning">Card Topup Report</a>
                        <?php } ?>
                        
                     
                        
                        <?php if($this->session->userdata('type')=="retailer"){?>
                      <a href="<?php echo site_url('sendmoneyreport/sendmoney_fran') ?>" class="btn btn-warning">Card Topup Report</a>                    <?php } ?>
                      
                      
                      
                        <?php if($this->session->userdata('type')=="admin"){?>  
                      <a href="<?php echo site_url('sendmoneyreport/sendmoney_sales') ?>" class="btn btn-warning">Send Money Report</a>                        <?php } ?>
                        
                        <?php if($this->session->userdata('type')=="admin"){?>
                    <a href="<?php echo site_url('cardgeneration/card_details_admin') ?>" class="btn btn-warning">Card Generation</a>
                        <?php }?>
                        
                        <?php if($this->session->userdata('type')=="distributor"){?>
                     <a href="<?php echo site_url('cardgeneration/card_details_dist') ?>" class="btn btn-warning">Card Generation</a>
                        <?php }?>
                        
                        <?php if($this->session->userdata('type')=="admin"){?>
                      <a href="<?php echo site_url('reports/daily_sales_report') ?>" class="btn btn-warning">Daily Sales Report</a><!--
                        <a href="<?php echo site_url('reports/retailer_sales_report') ?>" class="btn btn-primary">Retailer Report</a>-->
                        
                        <?php } if($this->session->userdata('type')=="distributor"){ ?>
                      <a href="<?php echo site_url('reports/daily_sales_report') ?>" class="btn btn-warning">Daily Sales Report</a>
                        
                        <?php } if($this->session->userdata('type')=="retailer"){ ?>
                      <a href="<?php echo site_url('reports/daily_sales_report') ?>" class="btn btn-warning">Daily Sales Report</a> 
                        
                      
                         <?php }if($type === "admin" ){ ?>
                     <a href="<?php echo site_url('reports/get_operator_report') ?>" class="btn btn-warning">Operator Report</a>
                        <?php } ?>