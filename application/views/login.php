<?php include('include/header.php');  ?>
    <body>
      <!-- START LOGIN-->
      <div class="login">
        <!-- message box -->
           <div class="message-box message-box-info animated fadeIn" id="message-box-info">
              <!-- LOGIN WIDGET -->
              <div class="row popup-container">
                <div id="infoMessage"></div>
                 <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4 col-sm-offset-2 col-md-offset-3 col-lg-offset-4 popup-container-inner">
                  <div class="panel panel-default">
                      <div class="panel-body">
                          <h2>Log In</h2>
                          <p>Please fill in your basic personal information in the folowing fields:</p>
                          <form id="loginform" name="loginform" class="form-signin">
                          <div class="form-group">
                              <label>User Id / Mobile Number</label>
                              <input type="text" name="user_id" value="" id="user_id" placeholder="User Id / Mobile Number" class="form-control" required />
                          </div>
                          <div class="form-group">
                              <label>Password</label>
                              <input type="password" name="password" value="" id="password" placeholder="Password" class="form-control" required />
                             <a href="<?php echo base_url(); ?>Welcome/forgot" style='color:red;'><b><i>Forgot Your Password?</i></b></a>
                              
                          </div>
                          <div class="form-group">
                          <a href="<?php echo base_url(); ?>Welcome/signup">Sign Up</a>
                              <div class="col-md-4 pull-right">
                                   
                                  <input type="submit" name="submit" value="Log In"  class="btn btn-info btn-block" />
                              </div>
                          </div>
                          </form>                      </div>
                  </div>
                </div>
              </div>
                  <!-- END LOGIN WIDGET -->
           </div>
        <!-- end message box -->

      </div>
      <!--END LOGIN-->
        <!-- MESSAGE BOX-->
        <?php include('include/message_box.php');  ?>
        <!-- END MESSAGE BOX-->

        <!-- START SCRIPTS -->
        <?php include('include/footer_scripts.php');  ?>
        <!-- END SCRIPTS --> 
        <script type="text/javascript">var baseurl = "<?php print base_url(); ?>";</script>
    <script src="<?php echo base_url(); ?>assets/js/myjs/login.js"></script>	

    </body>
</html>
