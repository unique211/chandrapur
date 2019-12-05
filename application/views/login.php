<?php include('include/header.php');  ?>

<body>
    <div class="row">
        <div class="col-sm-12">


            <!-- START LOGIN-->
            <div class="login">
                <!-- message box -->
                <div class="message-box message-box-info animated fadeIn" id="message-box-info">
                    <!-- LOGIN WIDGET -->
                    <div class="row popup-container">
                        <div id="infoMessage"></div>




                        <div class="row" id="MYROW" style="margin: 0 auto;max-width:640px; background: #ffffff;">
                            <div class="col-4 col-sm-2 myDiv" style="text-align:center;">
                                <!-- width: 21.666667%; padding-top: 66px; -->
                                <div class="log">
                                    <img src="<?php echo base_url(); ?>images/cmc.jpg" class="imglogo"
                                        style="height:100px;">
                                </div>
                                <br>

                                <div class="txt">
                                    <h2 style="font-size: 20px;font-weight: 400;line-height: 27px;" class="titles">
                                        &nbsp; चंद्रपूर शहर महानगरपालिका</h2>
                                </div>

                            </div>
                            <div class="col-4 col-sm-8  popup-container-inner" style="">


                                <div class="panel panel-default"
                                    style="box-shadow:0px 0px 0px 0px rgba(0, 0, 0, 0) !important">
                                    <div class="panel-body">
                                        <h2>Login</h2>
                                        <p>Please fill in your basic personal information in the folowing fields:</p>
                                        <form id="loginform" name="loginform" class="form-signin">
                                            <div class="form-group">
                                                <label>User Id / Mobile Number</label>
                                                <input type="text" name="user_id" value="" id="user_id"
                                                    placeholder="User Id / Mobile Number" class="form-control"
                                                    required />
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" value="" id="password"
                                                    placeholder="Password" class="form-control" required />
                                                <a href="<?php echo base_url(); ?>Welcome/forgot"
                                                    style='color:red;'><b><i>Forgot Your Password?</i></b></a>

                                            </div>
                                            <div class="form-group">
                                                <a href="<?php echo base_url(); ?>Welcome/signup">Sign Up</a>
                                                <div class="col-md-4 pull-right">

                                                    <input type="submit" name="submit" value="Log In"
                                                        class="btn btn-info btn-block" />
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>



                </div>

                <!-- END LOGIN WIDGET -->
            </div>
            <!-- end message box -->

        </div>


    </div>
    </div>



    <!--END LOGIN-->
    <!-- MESSAGE BOX-->
    <?php include('include/message_box.php');  ?>
    <!-- END MESSAGE BOX-->

    <!-- START SCRIPTS -->
    <?php include('include/footer_scripts.php');  ?>
    <!-- END SCRIPTS -->
    <script type="text/javascript">
    var baseurl = "<?php print base_url(); ?>";
    </script>
    <script src="<?php echo base_url(); ?>assets/js/myjs/login.js"></script>

</body>

</html>

<style>
@media screen and (min-width: 768px) and (max-width: 1800px) {
    .imglogo {
        float: left;
    }
}

@media screen and (min-width: 768px) and (max-width: 1800px) {
    .myDiv {
        width: 21.666667%;
        padding-top: 66px;



        position: relative;
        
min-height: 1px;
        padding-right: 8px;
        padding-left: 30px;


    }
}
</style>