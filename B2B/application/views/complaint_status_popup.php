<html>
<head>
    <style type="text/css">
 .form-group
 {
	
    font-size: 11px;
    text-decoration: none;
    color: #000;
    padding:10px 5px 5px ;
    font-weight: 300;
    text-transform: uppercase;
 }
 
  
 </style>
</head>



<div class="well">
    <div class="errorresponse">
        
    </div>
    <form class="form" id="frmupdate" role="form" action="<?php echo base_url() ?>index.php/complaints/update_status" method="POST">
    <?php foreach($query->result() as $row):?>
                        
                            
                   
                          <div class="form-group">
                          	 <td> <label for="exampleInputEmail2">Ticket Number:</label></td>
                             <td><?php echo $row->t_id?></td>         
                          </div>
                            
						   <div class="form-group">
                            <td> <label for="exampleInputEmail2">Date Of Creation:</label></td>
                             <td><?php echo $row->date?></td>         
                          </div>
                            
                          <div class="form-group">
                          	 <td> <label for="exampleInputEmail2">Transaction ID:</label></td>
                             <td><?php echo $row->transaction_id?></td>         
                          </div>
                            
						   <div class="form-group">
                            <td> <label for="exampleInputEmail2">Query:</label></td>
                             <td><?php echo $row->reason?></td>         
                          </div>
                            
                         <!-- <div class="form-group">
                          	 <td> <label for="exampleInputEmail2">Smartcard Number:</label></td>
                             <td><?php// echo $row->id?></td>         
                          </div>-->
                            
						<!--   <div class="form-group">
                            <td> <label for="exampleInputEmail2">Transaction Amount:</label></td>
                             <td><?php //echo $row->transactionid?></td>         
                          </div>-->
                            
                          <div class="form-group">
                          	 <td> <label for="exampleInputEmail2">Created By ID:</label></td>
                             <td><?php echo $row->create_id?></td>         
                          </div>
                            
						   <div class="form-group">
                                  <td width="25%" scope="col">Reply:</td>    
               					 <input type="hidden" name="did" id="did" value="<?=$row->t_id?>"   />                 
                                <td> <?php if($row->status=="2"){ echo $row->reply; }
                                else
                                {
                                echo '<input type="textbox" name="comp_details" name="comp_details">'; 
                                }?>         
                                </td>  
                          </div>
                            <div class="form-group">
                                <td>
                                	<input type="submit" id="submit" name="submit" value="Submit" class="btn btn-info btn-small">
                                </td>  
                            </div>      

<?php endforeach;?>
</form>
</div>
</div>
</body>
</html>

           