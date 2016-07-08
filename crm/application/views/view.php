<div class="well">
    <div class="errorresponse">
        
    </div>
    <form class="form" id="frmupdate" role="form" action="<?php //echo base_url() ?>home/update" method="POST">
    <?php foreach($query->result() as $row):?>
                        
                            <div class="form-group">
                                <td> <label for="exampleInputEmail2">Request Type:</label></td>    		
								<?php
                                    if($row->request_type==1)
                                    {
                                   ?><td><?php echo "Top Up Reversal"?></td>
                                   <?php }
                                    else
                                    {
                                      ?><td><?php echo "Amount Reversal"?></td>
                                   <?php }
                                 ?>              
                          </div>         
                          <div class="form-group">
                               <td> <label for="exampleInputEmail2">Operator:</label></td>
                               <td><?php echo $row->operator?></td>       
                          </div>
                          <div class="form-group">
                            <td> <label for="exampleInputEmail2">Distributor / Retailer Code:</label></td>
                            <td></td>  
                           
                          </div>
                            
						   <div class="form-group">
                                 <td> <label for="exampleInputEmail2">Distributor Name:</label></td>
                                 <td><?php echo $row->distributor_name?></td>     
                          </div>
                          
                          
						<div class="form-group">
                             <td> <label for="exampleInputEmail2">Distributor Email:</label></td>
                             <td><?php echo $row->distributor_email?></td>                      
                          </div>         
                          <div class="form-group">
                          		 <td> <label for="exampleInputEmail2">Distributor Number:</label></td>
                             <td><?php echo $row->distributor_number?></td>         
                            
                          </div>
                          <div class="form-group">
                          	 <td> <label for="exampleInputEmail2">Smartcard Number:</label></td>
                             <td><?php echo $row->smartcard_number?></td>         
                          </div>
                            
						   <div class="form-group">
                            <td> <label for="exampleInputEmail2">Transaction Amount:</label></td>
                             <td><?php echo $row->transaction_amount?></td>         
                          </div>
                          
                                           <div class="form-group">  
                                            <td> <label for="exampleInputEmail2">Transaction Date:</label></td>
                             <td><?php echo $row->transaction_date?></td>         
                          
                          </div>         
                          <div class="form-group">
                             <td> <label for="exampleInputEmail2">Transaction Number:</label></td>
                             <td><?php echo $row->transaction_number?></td>         
                          </div>
 
         <?php endforeach;?>
                        </form>
                    </div>
</div>
</body>
</html>