<div class="well">
    <div class="errorresponse">
        <div class="form-group">
                            <label for="exampleInputPassword2">Mobile no</label>
                            <input type="text" class="form-control" name="mobile_no" required value="">
                          </div>
    </div>
    <form class="form" id="frmupdate" role="form" action="<?php echo base_url() ?>user/send_password" method="POST">

                          <div class="form-group">
                            <label for="exampleInputPassword2">Mobile no</label>
                            <input type="text" class="form-control" name="mobile_no" required value="">
                          </div>
                            <div class="form-group">
                                <input type="hidden" name="hidden" value=" "/>
                            <input type="submit" class="btn btn-success" id="exampleInputPassword2" value="Submit">
                          </div>
      
                        </form>
                    </div>
</div>
 
</body>
</html>