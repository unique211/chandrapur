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
                <li class="active">Disaster Management</li>
            </ul>
            <!-- END BREADCRUMB -->
            <!-- PAGE CONTENT WRAPPER -->
            <div class="page-content-wrap">
                <!-- strat notification -->
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 right_side">
                        <!-- START SIMPLE DATATABLE -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Disaster Management</h3>
                                <div class="pull-right">
                                    <!--  <button class="btn btn-success closehideshow"
                                                  style="background-color:#00B050;">View </button>-->
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <form class="form-horizontal" id="master_form" name="master_form">

                                        <div class="form-group">
                                            <div class="col-md-2">
                                                <label class="control-label">Parent*</label>
                                            </div>
                                            <div class="col-md-4">
                                                <select class="form-control zone" style="width:100%;" name="parent" id="parent" required>
                                                    <option value="" selected disabled>Select Parent</option>
                                                    <option value="parent_1">Parent 1</option>
                                                    <option value="parent_2">Parent 2</option>
                                                    <option value="parent_3">Parent 3</option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-2">
                                                <label class="control-label">Name (in English)*</label>
                                            </div>
                                            <div class="col-md-4">
                                                <textarea id="desc" name="desc" class="form-control" placeholder="Name (in English)" cols="50" rows="3" required></textarea>
                                            </div>

                                        </div>
                                        <div class="form-group">

                                            <div class="col-md-2">
                                                <label class="control-label">नाव (मराठी मध्ये)*</label>
                                            </div>
                                            <div class="col-md-4">
                                                <textarea id="desc_m" name="desc_m" class="form-control" placeholder="नाव (मराठी मध्ये)" cols="50" rows="3" required></textarea>
                                            </div>

                                        </div>
                                        <div class="form-group">

                                            <div class="col-sm-2">
                                                <label>Select file (in English)</label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="file" id="attachment" name="attachment" accept="*" style="padding:0px;border:0;">
                                                <input type="hidden" id="file_attachother" class="file_attachother" value="" />
                                                <div id="msg" class="msg"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <div class="col-sm-2">
                                                <label>फाईल निवडा ( मराठी मध्ये )</label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="file" id="attachment1" name="attachment1" accept="*" style="padding:0px;border:0;">
                                                <input type="hidden" id="file_attachother1" class="file_attachother1" value="" />
                                                <div id="msg1" class="msg1"></div>
                                            </div>
                                        </div>

                                        <div class="btn-group pull-right">
                                            <input type="hidden" id="save_update" value="">
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                            <button class="btn btn-info" id="reset" type="button">Reset</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- END SIMPLE DATATABLE -->
                    </div>
                </div>
                <!-- end notification -->
                <!--NEWS SECTION-->
                <div class="row ">
                    <div class="col-md-12 col-sm-12 col-xs-12 right_side">
                        <!-- START SIMPLE DATATABLE -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Disaster Management Report</h3>
                                <ul class="panel-controls">
                                    <li>
                                        <!--<button class="btn btn-success btnhideshow"
                              style="background-color:#00B050;"> Add </button></li> -->
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
            </div>
            <!-- end notification -->
        </div>
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->

    <!-- END PAGE CONTAINER -->
    <!-- MESSAGE BOX-->
    <?php include('include/message_box.php');  ?>
    <!-- END MESSAGE BOX-->
    <!-- START SCRIPTS -->
    <?php include('include/footer_scripts.php');  ?>
    <!-- END SCRIPTS -->
    <script type="text/javascript">
        var baseurl = "<?php print base_url(); ?>";
    </script>
    <script>
        $('.date').datepicker({
            'todayHighlight': true,
            format: 'dd/mm/yyyy',
            autoclose: true,
        });
        var date = new Date();
        date = date.toString('dd/MM/yyyy');
        $("#date").val(date);
    </script>
    <script src="<?php echo base_url(); ?>assets/js/myjs/disaster_management.js"></script>
    <!--fileupload Files -->
    <script src="<?php echo base_url() . 'assets/js/AjaxFileUpload.js' ?>"></script>
</body>

</html>