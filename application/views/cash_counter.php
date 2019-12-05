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
                <li class="active">Cash Counter</li>

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
                                <h3 class="panel-title">Cash Counter</h3>

                                <ul class="panel-controls">
                                    <!-- <li>
                                        <form name="challan" id="challan" method="POST"
                                            action="<?php echo base_url('CashCounter/showDatewiseReceipt'); ?>"
                                            target="_blank"></form>
                                        <button class="btn btn-info" type="submit" form="challan"
                                            name="getDatewiseReceiptbtn" id="getDatewiseReceiptbtn" value="">Generate
                                            Challan</button>
                                    </li> -->
                                    <li> <button class="btn btn-success btnhideshow" style="background-color:#00B050;">
                                            Add Detail</button></li>
                                </ul>
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
                                        <select class="form-control " style="width:100%;" name="staff_filter"
                                            id="staff_filter" required>
                                            <option selected value="All">All</option>


                                        </select>

<br>
									</div>
									<div class="col-lg-1">

                                       
                                    </div>
                                    <div class="col-lg-3">

                                        <div class="input-group date " data-provide="datepicker">
                                            <input type="text" class="form-control input-sm placeholdesize date1"
                                                id="fdate" name="fdate" autocomplete="off" required>
                                            <div class="input-group-addon">
                                                <span class="fa fa-calendar"></span>
                                            </div>
                                        </div>
									</div>
										<div class="col-lg-1">

                                       
                                    </div>
                                    <div class="col-lg-3 ">
                                        <div class="input-group date " data-provide="datepicker">
                                            <input type="text" class="form-control input-sm placeholdesize date1"
                                                id="tdate" name="tdate" autocomplete="off" required>
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
                                    </div>
                                </form>

                                <div class="col-lg-12 "><br /><br />
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
                <div class="row formhideshow">


                    <!--------------------form-4 start----------------------->
                    <div class="col-md-12 col-sm-12 col-xs-12 right_side" id="form4" style="display:none;">
                        <div class="panel-body">

                            <div class="panel-heading">
                                <h3 class="panel-title">Receipt</h3>
                                <div class="pull-right">
                                    <button class="btn btn-success closehideshow" style="background-color:#00B050;"
                                        id="view_details">View Detail</button>
                                </div>
                            </div>
                            <form class="form-horizontal" id="master_form4" name="master_form4">
                                <div id="divToPrint" class="divToPrint" style="height:100%">
                                    <center>
                                        <div id="print_save_div">
                                            <table id="print_save_table" width="100%" border="1">
                                                <tbody>
                                                    <tr>
                                                        <td align="center" colspan="2"><b>
                                                                <br>
                                                                <font style="vertical-align: inherit;">
                                                                    Chandrapur City Municipal Corporation
                                                                </font>
                                                            </b><br><br><br>
                                                            <font style="vertical-align: inherit;"> Receipt
                                                                Voucher</font><br><br>
                                                            <!-- <font vertical-align: inherit;"> </font><font style="vertical-align: inherit;"></font>-->
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <table width="100%" border="1">
                                                <input type="hidden" id="ref_id4" value="">
                                                <tbody>
                                                    <tr>
                                                        <th style="background-color: rgb(231, 226, 226);">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">
                                                                    Receipt.No. <input type="text" id="receipt_no"
                                                                        name="receipt_no"
                                                                        style="float:right;width:100%;" readonly></font>
                                                            </font>
                                                        </th>
                                                        <th style="background-color: rgb(231, 226, 226);">
                                                            <font style="vertical-align: inherit;">Date
                                                                of Receipt <div class="input-group date "
                                                                    data-provide="datepicker" required>
                                                                    <input type="text" class="date1"
                                                                        style="width:103%;margin-bottom:-2%;"
                                                                        id="receipt_date" name="receipt_date"
                                                                        autocomplete="off" required>

                                                                    <div class="input-group-addon"
                                                                        style="float:right;width:0%;background-color:rgb(231, 226, 226);border-color:rgb(231, 226, 226)">

                                                                    </div>
                                                            </font>
                                                        </th>
                                                        <th style="background-color: rgb(231, 226, 226);">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">
                                                                    Document Details. <input type="text"
                                                                        id="collection_no" name="collection_no"
                                                                        style="float:right;width:100%;" required></font>
                                                            </font>
                                                        </th>
                                                        <th style="background-color: rgb(231, 226, 226);">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">
                                                                    Document Quantity <input type="text" id="counter_no"
                                                                        name="counter_no"
                                                                        style="float:right;width:100%;" required></font>
                                                            </font>
                                                        </th>

                                                    </tr>

                                                </tbody>
                                            </table>
                                            <br>
                                            <table width="100%" border="1">
                                                <tbody>
                                                    <tr>
                                                        <th align="left"
                                                            style="width: 24%;padding-left: 8px;background-color: rgb(231, 226, 226);">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">
                                                                    Received From</font>
                                                            </font>
                                                        </th>
                                                        <td style="padding-left: 0px;">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">
                                                                    <input type="text" id="receive_from"
                                                                        name="receive_from" style="width:100%;"
                                                                        required>
                                                                </font>
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th align="left"
                                                            style="padding-left: 8px;background-color: rgb(231, 226, 226);">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Amount
                                                                    (Rs)</font>
                                                            </font>
                                                        </th>
                                                        <td style="padding-left: 0px;">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">
                                                                    <input type="number" id="amt" name="amt"
                                                                        style="width:100%;" required>
                                                                </font>
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th align="left"
                                                            style="padding-left: 8px;background-color: rgb(231, 226, 226);">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Amount
                                                                    In Words</font>
                                                            </font>
                                                        </th>
                                                        <td style="padding-left: 0px;">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">
                                                                    <input type="text" id="amt_words" name="amt_words"
                                                                        style="width:100%;" disabled>
                                                                </font>
                                                            </font>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th align="left"
                                                            style="padding-left: 8px;background-color: rgb(231, 226, 226);">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">
                                                                    Function</font>
                                                            </font>
                                                        </th>
                                                        <td style="padding-left: 0px;">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">
                                                                    <select id="function" name="function"
                                                                        style="width:100%;">
                                                                        <option selected disabled>Select</option>
                                                                        <option value="Property Transfer Record">
                                                                            Property Transfer Record</option>
                                                                        <option value="Inheritance Certificate">
                                                                            Inheritance Certificate</option>
                                                                        <option
                                                                            value="Fire_Fighting_No_Objection_Certificate">
                                                                            Fire Fighting No Objection Certificate
                                                                        </option>
                                                                        <option value="Occupation_Certificate">
                                                                            Occupation Certificate</option>
                                                                        <option value="Part_Certificate">Part
                                                                            Certificate</option>
                                                                        <option value="Zone_Certificate">Zone
                                                                            Certificate</option>
                                                                        <option value="Construction_Certificate">
                                                                            Construction Certificate</option>
                                                                        <option value="Plant_Certificate">Plant
                                                                            Certificate</option>
                                                                        <option value="Fire_Fighting">Fire Fighting
                                                                        </option>
                                                                        <option value="Outstanding_Certificate">
                                                                            Outstanding Certificate</option>
                                                                        <option value="No Objection_Certificate">No
                                                                            Objection Certificate</option>
                                                                        <option value="Resident_Certificate">Resident
                                                                            Certificate</option>
                                                                        <option value="Asset_Detail_Certificate">Asset
                                                                            Detail Certificate</option>
                                                                        <option value="Birth_Registration">Birth
                                                                            Registration </option>
                                                                        <option value="Death_Registration">Death
                                                                            Registration </option>
                                                                    </select>
                                                                </font>
                                                            </font>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <br>

                                            <table width="100%" border="1">
                                                <tbody>
                                                    <tr>

                                                        <th style="background-color: rgb(231, 226, 226);">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Mode
                                                                    Of Receipt<input type="text" id="mode" name="mode"
                                                                        style="float:right;width:100%;" required></font>
                                                            </font>
                                                        </th>
                                                        <th style="background-color: rgb(231, 226, 226);">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Amount
                                                                    (Rs)<input type="text" id="amt2" name="amt2"
                                                                        style="float:right;width:100%;" required></font>
                                                            </font>
                                                        </th>
                                                        <th style="background-color: rgb(231, 226, 226);">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Cheque
                                                                    No.<input type="text" id="chq_no" name="chq_no"
                                                                        style="float:right;width:100%;"></font>
                                                            </font>
                                                        </th>
                                                        <th style="background-color: rgb(231, 226, 226);">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Cheque
                                                                    Date<div class="input-group date "
                                                                        data-provide="datepicker">
                                                                        <input type="text" class="date1"
                                                                            style="width:100%;margin-bottom:-2%;"
                                                                            id="chq_date" name="chq_date"
                                                                            autocomplete="off">
                                                                        <div class="input-group-addon"
                                                                            style="float:right;width:0%;background-color:rgb(231, 226, 226);border-color:rgb(231, 226, 226)">

                                                                        </div>
                                                                </font>
                                                            </font>
                                                        </th>
                                                        <th style="background-color: rgb(231, 226, 226);">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Bank
                                                                    Name<input type="text" id="bank_name"
                                                                        name="bank_name"
                                                                        style="float:right;width:100%;"></font>
                                                            </font>
                                                        </th>
                                                        <!--<th style="background-color: rgb(231, 226, 226);">Branch Name</th> -->
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 8px;">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">
                                                                </font>
                                                            </font>
                                                        </td>
                                                        <td style="padding-left: 8px;">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">
                                                                </font>
                                                            </font>
                                                        </td>
                                                        <td style="padding-left: 8px;"></td>
                                                        <td style="padding-left: 8px;">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">
                                                                </font>
                                                            </font>
                                                        </td>
                                                        <td style="padding-left: 8px;"></td>
                                                        <!--<td style="padding-left: 8px;"></td> -->
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <table width="100%" border="1">
                                                <tbody>
                                                    <tr>

                                                        <th style="background-color: rgb(231, 226, 226);">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">
                                                                    Reference No./Bill No.<input type="text"
                                                                        id="bill_no" name="bill_no"
                                                                        style="float:right;width:100%;" readonly></font>
                                                            </font>
                                                        </th>
                                                        <th style="background-color: rgb(231, 226, 226);">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Date
                                                                    of Bill<div class="input-group date "
                                                                        data-provide="datepicker">
                                                                        <input type="text" class="date1"
                                                                            style="width:100%;margin-bottom:-2%;"
                                                                            id="bill_date" name="bill_date"
                                                                            autocomplete="off" required>
                                                                        <div class="input-group-addon"
                                                                            style="float:right;width:0%;background-color:rgb(231, 226, 226);border-color:rgb(231, 226, 226)">

                                                                        </div>
                                                                </font>
                                                            </font>
                                                        </th>
                                                        <th style="background-color: rgb(231, 226, 226);">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">
                                                                    Details<input type="text" id="details"
                                                                        name="details" style="float:right;width:100%;"
                                                                        required></font>
                                                            </font>
                                                        </th>
                                                        <th style="background-color: rgb(231, 226, 226);">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">
                                                                    Payable Amount (Rs)<input type="text" id="payble"
                                                                        name="payble" style="float:right;width:100%;"
                                                                        required></font>
                                                            </font>
                                                        </th>
                                                        <th style="background-color: rgb(231, 226, 226);">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Amount
                                                                    Received (Rs)<input type="text" id="receive_amt"
                                                                        name="receive_amt"
                                                                        style="float:right;width:100%;" required></font>
                                                            </font>
                                                        </th>

                                                    </tr>


                                                </tbody>
                                            </table>
                                            <table width="42%" border="1" align="right">
                                                <tbody>
                                                    <tr>
                                                        <th style="background-color: rgb(231, 226, 226);">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Total </font>
                                                            </font>
                                                        </th>
                                                        <td align="right" style="padding-right: 8px;">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">
                                                                    <input type="text" id="total" name="total"
                                                                        style="width:50%;float:right" required>
                                                                </font>
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <hr>

                                            <br><br>
                                            <table width="50%" align="right">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            &nbsp;
                                                        </td>
                                                        <td>
                                                            &nbsp;
                                                        </td>
                                                        <td>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">
                                                                    Signature of Authorized Officer
                                                                </font>
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br><br><br>


                                        </div>
                                    </center>
                                </div>
                                <center>

                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">
                                            <input type="hidden" id="receipt_id" value="">
                                            <button class="btn btn-success" id="formbtn4" type="submit">Save</button>
                            </form>

                            <button class="btn btn-primary" type="submit" id="btnprint2" form="property2"
                                name="btnprint2" value="">Print </button>
                            <button class="btn btn-warning" type="button" id="resetform" name="resetform" value="">New
                                Entry</button>
                            <form name="property2" id="property2" method="POST"
                                action="<?php echo base_url('CashCounter/print_cash'); ?>" target="_blank"></form>

                            </font>
                            </button>
                            </center>

                        </div>
                    </div>
                    <!--------------------form4 end- -------------->



                </div>
                <!------------form hide show--------------------->
                <!-- end notification -->


            </div>

            <!-- END PAGE CONTENT WRAPPER -->
        </div>
        <!-- END PAGE CONTENT -->
    </div>
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
    <script src="<?php echo base_url(); ?>assets/js/myjs/cashcounter.js"></script>
    <!--fileupload Files -->
    <script src="<?php echo base_url() . 'assets/js/AjaxFileUpload.js' ?>"></script>

    <script type="text/javascript">
    $('.clockpicker').clockpicker();
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


    console.log(date);
    //  $("#fdate").val(date);
    $('a.printPage').click(function() {
        var divToPrint = document.getElementById("divToPrint");

        newWin = window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    });
    $('a.printPage1').click(function() {
        //var divToPrint = document.getElementById("divToPrint");
        var divToPrint = document.getElementById("divToPrint1");
        newWin = window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    });
    $('a.printPage2').click(function() {
        //var divToPrint = document.getElementById("divToPrint");
        var lang = $('#language').val();
        console.log('lang ' + lang);
        var divToPrint = '';
        if (lang == 'english')
            divToPrint = document.getElementById("divToPrint3");
        else
            divToPrint = document.getElementById("divToPrint2");
        console.log(divToPrint);
        newWin = window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    });
    $('#language').change(function() {
        $('#divToPrint2').toggle();
        $('#divToPrint3').toggle();

    });
    </script>
</body>

</html>