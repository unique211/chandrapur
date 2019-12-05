<?php include('include/header.php');  ?>

<body>
    <script src="<?php echo base_url() ?>assets/js/plugins/d3pie/d3.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/plugins/d3pie/d3pie.js"></script>
    <!-- START PAGE CONTAINER -->
    <div class="page-container page-navigation-toggled page-container-wide">
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
                <li class="active">Miscellaneous Cash Counter</li>
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
                                <h3 class="panel-title">Miscellaneous Cash Counter</h3>
                                <ul class="panel-controls">
                                    <li>
                                        <form name="challan" id="challan" method="POST"
                                            action="<?php echo base_url('Miscellaneous_cash_counter/showDatewiseReceipt'); ?>"
                                            target="_blank"></form>
                                        <button class="btn btn-info" type="submit" form="challan"
                                            name="getDatewiseReceiptbtn" id="getDatewiseReceiptbtn" value="">Generate
                                            Challan</button>
                                    </li>
                                    <!-- <li> <button class="btn btn-success btnhideshow" style="background-color:#00B050;"> Add Detail</button></li> -->
                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-12">
                                    <form class="form-horizontal" id="master_form10" name="master_form10">
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label>Name*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="hidden" id="receipt_no2" name="receipt_no2" value="">
                                                    <input type="hidden" id="sequence_no2" name="sequence_no2" value="">
                                                    <input type="text" id="name" name="name" class="form-control"
                                                        placeholder="Name" required="">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label>Mobile No</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="number" style="text-align:right;" id="mobile_no"
                                                        name="mobile_no" class="form-control" placeholder="Mobile No">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label>Reason*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" id="reason" name="reason" class="form-control"
                                                        placeholder="Reason" required="">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label>No of Copies*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="number" style="text-align:right;" id="no_copies"
                                                        name="no_copies" class="form-control" placeholder="No of Copies"
                                                        required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label>Remark</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <textarea id="remark" rows="1" name="remark" class="form-control"
                                                        placeholder="Remark"></textarea>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label>Payable Amount*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="number" style="text-align:right;" id="payable_amount"
                                                        name="payable_amount" class="form-control"
                                                        placeholder="Payable Amount" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="btn-group pull-left">
                                                <input type="hidden" id="ref_voucher" value="">
                                                <button class="btn btn-primary" type="submit">Save</button>
                                    </form>
                                    <button class="btn btn-info" type="submit" form="vouchar" name="print_vouchar"
                                        id="print_vouchar" style="display:none;" value="">Print</button>
                                    <button class="btn btn-info" type="button" form="vouchar" name="reset_vouchar"
                                        id="rest_vouchar" style="display:none;" value="">New Receipt</button>
                                    <form name="vouchar" id="vouchar" method="POST"
                                        action="<?php echo base_url(); ?>Miscellaneous_cash_counter/miscellaneous_cash_receipt"
                                        target="_blank"></form>
                                </div>
                            </div>
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
                        <h3 class="panel-title">Miscellaneous Cash Counter Report</h3>
                    </div>
                    <div class="panel-body">
                        <form name="filter_form" id="filter_form">
                            <div class="col-lg-1">
                                <label class="control-label"> Zone</label>
                            </div>
                            <div class="col-lg-3">
                                <select class="form-control zone" style="width:100%;" name="zone_filter"
                                    id="zone_filter" required>
                                    <option selected value="All">All</option>
                                </select>
                            </div>
                            <div class="col-lg-1">
                                <label class="control-label">Sub Zone</label>
                            </div>
                            <div class="col-lg-3">
                                <select class="form-control" style="width:100%;" name="subzone_filter"
                                    id="subzone_filter" required>
                                    <option selected value="All">All</option>


                                </select>
                            </div>
                            <div class="col-lg-1">
                                <label class="control-label">Staff</label>
                            </div>
                            <div class="col-lg-3">
                                <select class="form-control " style="width:100%;" name="staff_filter" id="staff_filter"
                                    required>
                                    <option selected value="All">All</option>


                                </select>

                                <br>
                            </div>
                            <div class="col-lg-1">

                            </div>
                            <div class="col-lg-3 ">
                                <div class="input-group date " data-provide="datepicker">
                                    <input type="text" class="form-control input-sm placeholdesize date1" id="fdate"
                                        name="fdate" autocomplete="off" required>
                                    <div class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1">

                            </div>
                            <div class="col-lg-3 ">
                                <div class="input-group date " data-provide="datepicker">
                                    <input type="text" class="form-control input-sm placeholdesize date1" id="tdate"
                                        name="tdate" autocomplete="off" required>
                                    <div class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1">

                            </div>
                            <div class="col-lg-3 ">
                                <button class="btn btn-success" type="submit" name="filter" id="filter"
                                    value="">Filter</button>
                                <br><br>
                            </div>
                        </form>
                        <div class="col-lg-12 ">
                            <div class="table-responsive" id="show_master_Extra">
                                <table id="myTableExtra" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                <font style="font-weight:bold">#</font>
                                            </th>
                                            <th>
                                                <font style="font-weight:bold">Receipt number
                                                </font>
                                            </th>
                                            <th>
                                                <font style="font-weight:bold">Date</font>
                                            </th>
                                            <th>
                                                <font style="font-weight:bold">Name</font>
                                            </th>
                                            <th>
                                                <font style="font-weight:bold">Mobile Number</font>
                                            </th>
                                            <th>
                                                <font style="font-weight:bold">Reason</font>
                                            </th>
                                            <th>
                                                <font style="font-weight:bold">No. of Copies</font>
                                            </th>
                                            <th>
                                                <font style="font-weight:bold">Payble Amount</font>
                                            </th>
                                            <th>
                                                <font style="font-weight:bold">Remark
                                                </font>
                                            </th>
                                            <th style="display:none;">
                                                <font style=" font-weight:bold; ">sequence_no
                                                </font>
                                            </th>
                                            <th style="display:none;">
                                                <font style="font-weight:bold;">receipt_no
                                                </font>
                                            </th>
                                            <th class="not-export-column">
                                                <font style="font-weight:bold">Action</font>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody_extra"></tbody>
                                </table>
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
    <sc ript type="text/javascript">
       
 var baseurl = "<?php print base_url(); ?>";
        </script>
        <script>
        var date = new Date();
        date = date.toString('dd/MM/yyyy');
        $(".date").val(date);
        $("#bill_date").val(date);
        $("#receipt_date").val(date);
        $("#fdate").val(date);
        $("#tdate").val(date);
        $('.date').datepicker({
            'todayHighlight': true,
            format: 'dd/mm/yyyy',
            autoclose: true,
        });
        </script>
        <script src="<?php echo base_url(); ?>assets/js/myjs/miscellaneous_cash_counter.js"></script>
        <!--fileupload Files -->
        <script src="<?php echo base_url() . 'assets/js/AjaxFileUpload.js' ?>"></script>
</body>

</html>