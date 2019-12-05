<?php include('include/header.php');  ?>

<body>
    <script src="<?php echo base_url() ?>assets/js/plugins/d3pie/d3.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/plugins/d3pie/d3pie.js"></script>
    <!-- START PAGE CONTAINER -->
    <div class="page-container">

        <!-- START PAGE SIDEBAR -->
        <?php include('include/sidebar.php');  ?>
        <!-- END PAGE SIDEBAR -->

        <!-- PAGE CONTENT -->
        <div class="page-content">

            <!-- START X-NAVIGATION VERTICAL -->
            <?php include('include/topbar.php');  ?>
            <!-- END X-NAVIGATION VERTICAL -->

            <!-- START BREADCRUMB -->
            <ul class="breadcrumb">
                <li class="active">Add Staff Member</li>

            </ul>
            <!-- END BREADCRUMB -->

            <!-- PAGE CONTENT WRAPPER -->
            <div class="page-content-wrap">
                <!--NEWS SECTION-->

                <div class="row tablehideshow">
                    <div class="col-md-12 col-sm-12 col-xs-12 right_side">
                        <!-- START SIMPLE DATATABLE -->

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Staff Member</h3>

                                <ul class="panel-controls">

                                    <li> <button class="btn btn-success btnhideshow" style="background-color:#00B050;">
                                            Add Staff</button></li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-12 ">
                                    <div class="table-responsive" id="show_master">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END SIMPLE DATATABLE -->
                    </div>
                </div>
                <!--NEWS SECTION END-->

                <!-- strat notification -->
                <div class="row  formhideshow" style="display:none">
                    <div class="col-md-12 col-sm-12 col-xs-12 right_side">
                        <!-- START SIMPLE DATATABLE -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Add Staff Form</h3>
                                <div class="pull-right">
                                    <button class="btn btn-success closehideshow" style="background-color:#00B050;">View
                                        Staff</button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <form class="form-horizontal" id="master_form" name="master_form">
                                        <div style="margin-top:-15px;border-bottom:2px solid;width:100%;">
                                            <b>Staff Details</b>
                                        </div><br>
                                        <div class="form-group">
                                            <div class="col-md-1">
                                                <label class="control-label"> Zone*</label>
                                            </div>
                                            <div class="col-md-3">
                                                <select class="form-control zone" style="width:100%;" name="zone"
                                                    id="zone" required>
                                                    <option value="" selected disabled>Select Zone</option>
                                                    <!--  <option value="zone_1">Zone 1</option>
                                                                 <option value="zone_2">Zone 2</option>
                                                                 <option value="zone_3">Zone 3</option>  !-->
                                                </select>
                                            </div>
                                            <div class="col-md-1">
                                                <label class="control-label"> Sub Zone*</label>
                                            </div>
                                            <div class="col-md-3">
                                                <select class="form-control subzone" style="width:100%;" name="subzone"
                                                    id="subzone" required>
                                                    <option value="" selected disabled>Select Subzone</option>


                                                </select>
                                            </div>
                                            <div class="col-md-1">
                                                <label class="control-label"> Department*</label>
                                            </div>
                                            <div class="col-md-3">
                                                <select class="form-control   department" style="width:100%;"
                                                    name="department" id="department" required>
                                                    <option value="" selected disabled>Select Department</option>
                                                    <option value="1">Dept 1</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">


                                            <div class="col-md-1">
                                                <label class="control-label"> Name*</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" placeholder="Name"
                                                    class="form-control input-sm placeholdesize" id="name" name="name"
                                                    required>
                                            </div>
                                            <div class="col-md-1">
                                                <label class="control-label"> Mobile</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="number" placeholder="Mobile Number"
                                                    class="form-control input-sm placeholdesize" id="mobile"
                                                    name="mobile">
                                            </div>

                                            <div class="col-md-1">
                                                <label class="control-label"> Email</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="email" placeholder="Email Address"
                                                    class="form-control input-sm placeholdesize" id="email"
                                                    name="email">

                                            </div>

                                        </div>

                                        <br>
                                        <div style="margin-top:-15px;border-bottom:2px solid;width:100%;">
                                            <b>Login Details</b>
                                        </div><br>
                                        <div class="form-group">


                                            <div class="col-md-2">
                                                <label class="control-label"> User Id*</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" placeholder="User Id"
                                                    class="form-control input-sm placeholdesize" id="user_id"
                                                    name="user_id" required>
                                                <div class='validation2' style='color:red;margin-bottom: 20px;'></div>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="control-label"> Password*</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="password" placeholder="Password"
                                                    class="form-control input-sm placeholdesize" id="psw" name="psw"
                                                    required>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="control-label"> Confirm Password*</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="password" placeholder="Confirm Password"
                                                    class="form-control input-sm placeholdesize" id="cpsw" name="cpsw"
                                                    required>
                                                <div class='validation' style='color:red;margin-bottom: 20px;'>
                                                </div>
                                            </div>

                                            <div class="btn-group pull-right">
                                                <input type="hidden" id="save_update" value="">
                                                <input class="btn btn-primary" type="submit" value="Save">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- END SIMPLE DATATABLE -->
                    </div>
                </div>
                <!-- end notification -->
            </div>
            <!-- end notification -->


        </div>

        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->


    <!-- END PAGE CONTAINER -->
    <!-
- MESSAGE BOX-->
    <?php include('include/message_box.php');  ?>
    <!-- END MESSAGE BOX-->

    <!-- START SCRIPTS -->
    <?php include('include/footer_scripts.php');  ?>
    <!-- END SCRIPTS -->
    <script type="text/javascript">
    var baseurl = "<?php print base_url(); ?>";
    </script>
    <script src="<?php echo base_url(); ?>assets/js/myjs/dynamic.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/myjs/addstaff.js"></script>

</body>

</html>