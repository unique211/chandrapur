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
                <li class="active">Marriage Certificate Registration</li>
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
                                <h3 class="panel-title">Code Id : 15 Marriage Certificate Registration</h3>
                                <ul class="panel-controls">
                                    <!-- <li> <button class="btn btn-success btncash_counter"
                                            style="background-color:#33414e;"> Cash Counter Receipt Voucher</button>
                                    </li> -->
                                    <!-- <li>
                                        <form name="challan" id="challan" method="POST"
                                            action="<?php echo base_url('Marrige/showDatewiseReceipt'); ?>"
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
                                <!-- start -->
                                <form name="filter_form" id="filter_form">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="input-group">
                                            <select id="mode" class="form-control" style="width:100%">
                                                <option value="1" selected>Registration Date</option>
                                                <option value="2">Receipt Date</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="input-group date " data-provide="datepicker">
                                            <input type="text" class="form-control input-sm placeholdesize date1"
                                                id="fdate" name="fdate" autocomplete="off" required>
                                            <div class="input-group-addon">
                                                <span class="fa fa-calendar"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="input-group date " data-provide="datepicker">
                                            <input type="text" class="form-control input-sm placeholdesize date1"
                                                id="tdate" name="tdate" autocomplete="off" required>
                                            <div class="input-group-addon">
                                                <span class="fa fa-calendar"></span>
                                            </div>
                                        </div>
                                        <br>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="col-sm-1">
                                            <label class="control-label"> Zone</label>
                                        </div>
                                        <div class="col-sm-2">
                                            <select class="form-control zone" style="width:100%;" name="zone_filter"
                                                id="zone_filter" required>
                                                <option selected value="All">All</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <label class="control-label">Sub Zone</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <select class="form-control" style="width:100%;" name="subzone_filter"
                                                id="subzone_filter" required>
                                                <option selected value="All">All</option>


                                            </select>
                                        </div>

                                        <div class="col-sm-1">
                                            <label class="control-label">Staff</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <select class="form-control " style="width:100%;" name="staff_filter"
                                                id="staff_filter" required>
                                                <option selected value="All">All</option>


                                            </select>


                                        </div>
                                        <div class="col-sm-1">
                                            <button class="btn btn-success" type="submit" name="filter" id="filter"
                                                value="">Filter</button>

                                            <br><br>
                                        </div>
                                    </div>





                                </form>
                                <br />
                                <br />
                                <br />
                                <!--end-->
                                <div class="col-lg-12 ">

                                    <div class="table-responsive" id="show_master">
                                        <table id="myTable2" class="table table-striped">
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
                                                        <font style="font-weight:bold">Groom's name</font>
                                                    </th>
                                                    <th>
                                                        <font style="font-weight:bold">Groom's address
                                                        </font>
                                                    </th>
                                                    <th>
                                                        <font style="font-weight:bold">Bride's name</font>
                                                    </th>
                                                    <th>
                                                        <font style="font-weight:bold">Bride's address
                                                        </font>
                                                    </th>
                                                    <th>
                                                        <font style="font-weight:bold">Wedding Date</font>
                                                    </th>
                                                    <th>
                                                        <font style="font-weight:bold">Wedding address
                                                        </font>
                                                    </th>
                                                    <th style="display:none">
                                                        <font style="font-weight:bold">Amount
                                                        </font>
                                                    </th>
                                                    <th>
                                                        <font style="font-weight:bold">See</font>
                                                    </th>
                                                    <th>
                                                        <font style="font-weight:bold">Checklist</font>
                                                    </th>
                                                    <th>
                                                        <font style="font-weight:bold">Receipt</font>
                                                    </th>
                                                    <th>
                                                        <font style="font-weight:bold">Appointment</font>
                                                    </th>
                                                    <th>
                                                        <font style="font-weight:bold">Second form </font>
                                                    </th>
                                                    <th>
                                                        <font style="font-weight:bold">Order letter</font>
                                                    </th>
                                                    <th>
                                                        <font style="font-weight:bold">Appeal</font>
                                                    </th>
                                                    <th>
                                                        <font style="font-weight:bold">Certificate</font>
                                                    </th>
                                                    <th class="not-export-column">
                                                        <font style="font-weight:bold">Upload</font>
                                                    </th>
                                                    <?php
													if ($this->session->role == 'admin') {
														?>
                                                    <th class="not-export-column">
                                                        <font style="font-weight:bold">Delete</font>
                                                    </th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody"></tbody>
                                            <tfoot id="tfoot"></tfoot>
                                        </table>
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
                    <!-------------form1 start--------------------------------------->
                    <div class="col-md-12 col-sm-12 col-xs-12 right_side" id="form1" style="display:none;">
                        <!-- START SIMPLE DATATABLE -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Marriage certificate registration</h3>
                                <div class="pull-right">
                                    <button class="btn btn-success closehideshow viewdetailsbtn"
                                        style="background-color:#00B050;">View Detail</button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <form class="form-horizontal" id="master_form1" name="master_form">
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label>Groom's Aadhar Card Number</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" id="child_aadharcard_no"
                                                        name="child_aadharcard_no" class="form-control"
                                                        placeholder="Child's Aadhar Card Number">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label>Bride's Aadhaar card number</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" id="girl_aadharcard_number"
                                                        name="girl_aadharcard_number" class="form-control"
                                                        placeholder="Girl's Aadhaar card number">
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-heading">
                                <h3 class="panel-title">Zone and Ward Information</h3>
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-sm-3">
                                                <label>Zone</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <select id="zone" name="zone" class="form-control">
                                                    <option selected disabled>Select</option>
                                                    <option value="1">Zone1</option>
                                                    <option value="2">Zone2</option>
                                                    <option value="3">Zone3</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <label>Ward / Area</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <select id="ward_area" name="ward_area" class="form-control">
                                                    <option selected disabled>Select</option>
                                                    <option value="11">D.G.Tukum-1 </option>
                                                    <option value="9">Tukum Talav-2</option>
                                                    <option value="8">Vivek Nagar-3</option>
                                                    <option value="7">Vadgaon -10</option>
                                                    <option value="12">Naginabag-11</option>
                                                    <option value="13">Civil Lines-12</option>
                                                    <option value="14">Jatpura Ward-13</option>
                                                    <option value="15">Ghutkala Ward-14</option>
                                                    <option value="16">Hospital Ward-15</option>
                                                    <option value="17">Rahmat Nagar-22</option>
                                                    <option value="30">Hanuman Nagar-9</option>
                                                    <option value="18">Anchaleshwar Ward-19</option>
                                                    <option value="19">Bhanapeth Ward-20</option>
                                                    <option value="20">Ekori Ward-21</option>
                                                    <option value="21">Binaba Ward-23</option>
                                                    <option value="22">Vithal Mandir Ward-24</option>
                                                    <option value="23">Bazar Ward-25</option>
                                                    <option value="24">Pathanpura Ward-26</option>
                                                    <option value="25">Maa.Tuljabhavani Ward-27</option>
                                                    <option value="26">Mahakali Mandir Ward-28</option>
                                                    <option value="27">Babupeth Ward-31</option>
                                                    <option value="28">Matanagar Ward-32</option>
                                                    <option value="29">Hindustan Ward-33</option>
                                                    <option value="31">Shastrinagar Ward-4</option>
                                                    <option value="32">M.E.L.Ward-5</option>
                                                    <option value="33">Indira Nagar Ward-6</option>
                                                    <option value="34">Camp Ward-7</option>
                                                    <option value="35">Industrial Estate Ward-8</option>
                                                    <option value="36">Rayyatwari Colony Ward-16</option>
                                                    <option value="37">Kamgar Nagar Ward-17</option>
                                                    <option value="38">Ashthabhuja Ward-18</option>
                                                    <option value="39">Gauri Talav Ward-29</option>
                                                    <option value="40">Dr.Babasaheb Ambedkar Ward-30
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-heading">
                                <h3 class="panel-title">* Please fill in all the columns</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <label>Groom Contact No.*</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="number" style="text-align:right;" id="groom_contact_no"
                                                    name="groom_contact_no" class="form-control"
                                                    placeholder="Groom Contact No." required>
                                            </div>
                                            <div class="col-sm-3">
                                                <label>Bride Contact No.*</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" id="bride_contact_no" name="bride_contact_no"
                                                    class="form-control" placeholder="Bride Contact No." required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>Groom Name*</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" id="groom_name" name="groom_name"
                                                    class="form-control" placeholder="Groom Name" required>
                                            </div>
                                        </div>
                                        <!--row end-->
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>Groom Address*</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <textarea id="g_address" name="g_address" class="form-control"
                                                    style="height:34px;" placeholder="Groom Name" required></textarea>
                                            </div>
                                        </div>
                                        <!--row end-->
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>Groom Tahsil*</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" id="groom_tahsil" name="groom_tahsil"
                                                    class="form-control" placeholder="Groom Tahsil" required>
                                            </div>
                                        </div>
                                        <!--row end-->
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>Groom District*</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" id="groom_dist" name="groom_dist"
                                                    class="form-control" placeholder="Groom District" required>
                                            </div>
                                        </div>
                                        <!--row end-->
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>Bride Name*</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" id="bride_previousname" name="bride_previousname"
                                                    class="form-control" placeholder="Bride Previous Name" required>
                                            </div>
                                        </div>
                                        <!--row end-->
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>Bride Address*</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <textarea id="bride_previousnadd" style="height:34px;"
                                                    name="bride_previousnadd" class="form-control"
                                                    placeholder="Bride Previous Address" required></textarea>
                                            </div>
                                        </div>
                                        <!--row end-->
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>Bride Tahsil*</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" id="bride_previoustahsil" name="bride_previoustahsil"
                                                    class="form-control" placeholder="Bride Previous Tahsil" required>
                                            </div>
                                        </div>
                                        <!--row end-->
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>Bride's District*</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" id="bride_previousdist" name="bride_previousdist"
                                                    class="form-control" placeholder="Bride Previous District" required>
                                            </div>
                                        </div>
                                        <!--row end-->
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>Marriage Address*</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <textarea id="marriage_add" style="height:34px;" name="marriage_add"
                                                    class="form-control" placeholder="Marriage Address"
                                                    required></textarea>
                                            </div>
                                        </div>
                                        <!--row end-->
                                    </div>
                                    <!----col-md-6 end--------------->
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>पतीचे नाव*</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" id="child_name" name="child_name"
                                                    class="form-control" placeholder="पतीचे नाव" required>
                                            </div>
                                        </div>
                                        <!--row end-->
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>पतीचा पत्ता*</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <textarea id="c_address" name="c_address" style="height:34px;"
                                                    class="form-control" placeholder="पतीचा पत्ता" required></textarea>
                                            </div>
                                        </div>
                                        <!--row end-->
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>पतीचा तहसिल*</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" id="child_tahsil" name="child_tahsil"
                                                    class="form-control" placeholder="पतीचा तहसिल" required>
                                            </div>
                                        </div>
                                        <!--row end-->
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>पतीचा जिल्हा*</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" id="child_dist" name="child_dist"
                                                    class="form-control" placeholder="पतीचा जिल्हा" required>
                                            </div>
                                        </div>
                                        <!--row end-->
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>पत्नीचे नाव*</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" id="girl_previousname" name="girl_previousname"
                                                    class="form-control" placeholder="पत्नीचे नाव" required>
                                            </div>
                                        </div>
                                        <!--row end-->
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>पत्नीचा पत्ता*</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <textarea id="girl_previousadd" style="height:34px;"
                                                    name="girl_previousadd" class="form-control"
                                                    placeholder="पत्नीचा पत्ता" required></textarea>
                                            </div>
                                        </div>
                                        <!--row end-->
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>पत्नीचा तहसिल*</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" id="girl_previoustahsil" name="girl_previoustahsil"
                                                    class="form-control" placeholder="पत्नीचा  तहसिल" required>
                                            </div>
                                        </div>
                                        <!--row end-->
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>पत्नीचा जिल्हा*</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" id="girl_previousdist" name="girl_previousdist"
                                                    class="form-control" placeholder="पत्नीचा  जिल्हा" required>
                                            </div>
                                        </div>
                                        <!--row end-->
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>विवाह पत्ता*</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <textarea id="wedding_add" style="height:34px;" name="wedding_add"
                                                    class="form-control" placeholder="विवाह पत्ता" required></textarea>
                                            </div>
                                        </div>
                                        <!--row end-->
                                    </div>
                                    <!------col-md-6 end------->
                                </div>
                                <!---row end---->
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-sm-3">
                                                <label>Date of Marriage*</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <!-- <div class="input-group date " data-provide="datepicker"> -->
                                                <input type="text" class="form-control input-sm placeholdesize date1"
                                                    id="date_of_marrige" name="date_of_marrige" autocomplete="off"
                                                    required placeholder="DD/MM/YYYY">
                                                <!-- <div class="input-group-addon">
                                                                      <span class="fa fa-calendar"></span>
                                                                 </div>
                                                            </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-sm-3">
                                                <label>Groom's birth date*</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <!-- <div class="input-group date " data-provide="datepicker"> -->
                                                <input type="text" class="form-control input-sm placeholdesize date1"
                                                    id="c_birth_date" name="c_birth_date" autocomplete="off" required
                                                    placeholder="DD/MM/YYYY">
                                                <!-- <div class="input-group-addon">
                                                                      <span class="fa fa-calendar"></span>
                                                                 </div>
                                                            </div> -->
                                            </div>
                                            <div class="col-sm-3">
                                                <label>Bride's birth date*</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <!-- <div class="input-group date " data-provide="datepicker"> -->
                                                <input type="text" class="form-control input-sm placeholdesize date1"
                                                    id="g_birth_date" name="g_birth_date" autocomplete="off" required
                                                    placeholder="DD/MM/YYYY">
                                                <!-- <div class="input-group-addon">
                                                                      <span class="fa fa-calendar"></span>
                                                                 </div>
                                                            </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-sm-3">
                                                <label>Groom's age*</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="number" style="text-align:right;" id="child_age"
                                                    name="child_age" class="form-control" placeholder="Child's age"
                                                    required disabled>
                                            </div>
                                            <div class="col-sm-3">
                                                <label>Bride's age*</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="number" style="text-align:right;" id="girl_age"
                                                    name="girl_age" class="form-control" placeholder="Girl's age"
                                                    required disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-group pull-left">
                                <input type="hidden" id="save_update" value="">
                                <button class="btn btn-primary" type="submit">Save</button>
                                </form>
                            </div>
                        </div>
                        <!--panel panel default-->
                        <!-- END SIMPLE DATATABLE -->
                    </div>
                    <!-------------form1 end------------------->
                    <!--------------------------form-2 start--------------------------->
                    <div class="col-md-12 col-sm-12 col-xs-12 right_side" id="form2" style="display:none;">
                        <!-- START SIMPLE DATATABLE -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Checklist</h3>
                                <div class="pull-right">
                                    <button class="btn btn-success closehideshow viewdetailsbtn"
                                        style="background-color:#00B050;">View Detail</button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-12">
                                    <form class="form-horizontal" id="master_form2" name="master_form2">
                                        <input type="hidden" id="ref_id_chk_list" value="">
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-2">
                                                    <label>मुलाचे नाव</label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" id="boy_name" name="boy_name"
                                                        class="form-control" placeholder="मुलाचे नाव" disabled>
                                                </div>
                                                <div class="col-sm-2">
                                                    <label>मुलीचे नाव</label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" id="girl_name" name="girl_name"
                                                        class="form-control" placeholder="मुलीचे नाव" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive" id="show_master">
                                            <table id="dataTable" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>अ. क्र.</th>
                                                        <th>कागदपत्राचे नाव</th>
                                                        <th>सिलेक्ट करा </th>
                                                        <th>अपलोड करा</th>
                                                        <th>जमा केलेले कागदपत्र</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="issuetbody">
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Memorandum of Marraige ('FROM D')</td>
                                                        <td align="center"><input type="checkbox" name="checkbox"
                                                                id="ch_1"></td>
                                                        <td><input type="file" id="attachment1" name="attachment1"
                                                                accept="*" style="padding:0px;border:0; display:none;">
                                                            <input type="hidden" id="file_attachother1"
                                                                class="file_attachother1" value="" />
                                                            <div id="msg1" class="msg1"></div>
                                                        </td>
                                                        <td align="center">
                                                            <div id="down1"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Rs. 100/- court fee stamps(under provision
                                                            court fee Act 1859) affixed.</td>
                                                        <td align="center"><input type="checkbox" name="checkbox"
                                                                id="ch_2"></td>
                                                        <td><input type="file" id="attachment2" name="attachment2"
                                                                accept="*" style="padding:0px;border:0; display:none;">
                                                            <input type="hidden" id="file_attachother2"
                                                                class="file_attachother2" value="" />
                                                            <div id="msg2" class="msg2"></div>
                                                        </td>
                                                        <td align="center">
                                                            <div id="down2"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Memorandum presented<br>1)from 1 - 90 days 265
                                                            Rs.<br>2)from 91 - 365 days 315
                                                            Rs.<br>3)After 365 days 415 Rs.</td>
                                                        <td align="center"><input type="checkbox" name="checkbox"
                                                                id="ch_3_1"><br><br><input type="checkbox"
                                                                name="checkbox" id="ch_3_2"><br><br><input
                                                                type="checkbox" name="checkbox" id="ch_3_3"></td>
                                                        <td><input type="file" id="attachment3_1" name="attachment3_1"
                                                                accept="*" style="padding:0px;border:0; display:none;">
                                                            <input type="hidden" id="file_attachother3_1"
                                                                class="file_attachother3_1" value="" />
                                                            <div id="msg1" class="msg1"></div>
                                                            <br><br><input type="file" id="attachment3_2"
                                                                name="attachment3_2" accept="*"
                                                                style="padding:0px;border:0; display:none;">
                                                            <input type="hidden" id="file_attachother3_2"
                                                                class="file_attachother3_2" value="" />
                                                            <div id="msg3_2" class="msg3_2"></div>
                                                            <br><br><input type="file" id="attachment3_3"
                                                                name="attachment3_3" accept="*"
                                                                style="padding:0px;border:0; display:none;">
                                                            <input type="hidden" id="file_attachother3_3"
                                                                class="file_attachother3_3" value="" />
                                                            <div id="msg3_3" class="msg3_3"></div>
                                                        </td>
                                                        <td align="center">
                                                            <div id="down3_1"></div><br><br>
                                                            <div id="down3_2"></div><br><br>
                                                            <div id="down3_3"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>Proof of age,attested photo copy of any of the
                                                            following- Bridge: 18 years, Bridegroom-21
                                                            years<br>1)School leaving
                                                            certificate<br>2)Birth certificate</td>
                                                        <td align="center"><input type="checkbox" name="checkbox"
                                                                id="ch_4_1"><br><br><input type="checkbox"
                                                                name="checkbox" id="ch_4_2"></td>
                                                        <td><input type="file" id="attachment4_1" name="attachment4_1"
                                                                accept="*" style="padding:0px;border:0; display:none;">
                                                            <input type="hidden" id="file_attachother4_1"
                                                                class="file_attachother4_1" value="" />
                                                            <div id="msg4_1" class="msg4_1"></div>
                                                            <br><br><input type="file" id="attachment4_2"
                                                                name="attachment4_2" accept="*"
                                                                style="padding:0px;border:0; display:none;">
                                                            <input type="hidden" id="file_attachother4_2"
                                                                class="file_attachother4_2" value="" />
                                                            <div id="msg4_2" class="msg4_2"></div>
                                                        </td>
                                                        <td align="center">
                                                            <div id="down4_1"></div><br><br>
                                                            <div id="down4_2"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>Whether Bride of Bridegroom is resided with in
                                                            jurisdicition of marriage register.</td>
                                                        <td align="center"><input type="checkbox" name="checkbox"
                                                                id="ch_5"></td>
                                                        <td><input type="file" id="attachment5" name="attachment5"
                                                                accept="*" style="padding:0px;border:0; display:none;">
                                                            <input type="hidden" id="file_attachother5"
                                                                class="file_attachother5" value="" />
                                                            <div id="msg5" class="msg5"></div>
                                                        </td>
                                                        <td align="center">
                                                            <div id="down5"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>6</td>
                                                        <td>Proof of residence of Bride &
                                                            Bridegroom(attested photocopy of any one of
                                                            the following)<br>1)Ration card or<br>2)
                                                            M.S.E.B bill or<br>3)Telephone bill
                                                            or<br>4)Passport</td>
                                                        <td align="center"><input type="checkbox" name="checkbox"
                                                                id="ch_6_1"><br><br><input type="checkbox"
                                                                name="checkbox" id="ch_6_2"><br><br><input
                                                                type="checkbox" name="checkbox"
                                                                id="ch_6_3"><br><br><input type="checkbox"
                                                                name="checkbox" id="ch_6_4"></td>
                                                        <td><input type="file" id="attachment6_1" name="attachment6_1"
                                                                accept="*" style="padding:0px;border:0; display:none;">
                                                            <input type="hidden" id="file_attachother6_1"
                                                                class="file_attachother6_1" value="" />
                                                            <div id="msg6_1" class="msg6_1"></div>
                                                            <br><br><input type="file" id="attachment6_2"
                                                                name="attachment6_2" accept="*"
                                                                style="padding:0px;border:0; display:none;">
                                                            <input type="hidden" id="file_attachother6_2"
                                                                class="file_attachother6_2" value="" />
                                                            <div id="msg6_2" class="msg6_2"></div>
                                                            <br><br><input type="file" id="attachment6_3"
                                                                name="attachment6_3" accept="*"
                                                                style="padding:0px;border:0; display:none;">
                                                            <input type="hidden" id="file_attachother6_3"
                                                                class="file_attachother6_3" value="" />
                                                            <div id="msg6_3" class="msg6_3"></div>
                                                            <br><br><input type="file" id="attachment6_4"
                                                                name="attachment6_4" accept="*"
                                                                style="padding:0px;border:0; display:none;">
                                                            <input type="hidden" id="file_attachother6_4"
                                                                class="file_attachother6_4" value="" />
                                                            <div id="msg6_4" class="msg6_4"></div>
                                                        </td>
                                                        <td align="center">
                                                            <div id="down6_1"></div><br><br>
                                                            <div id="down6_2"></div><br><br>
                                                            <div id="down6_3"></div><br><br>
                                                            <div id="down6_4"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>7</td>
                                                        <td>Photographs<br>1)Bride<br>2)Bridegroom</td>
                                                        <td align="center"><input type="checkbox" name="checkbox"
                                                                id="ch_7_1"><br><br><input type="checkbox"
                                                                name="checkbox" id="ch_7_2"></td>
                                                        <td><input type="file" id="attachment7_1" name="attachment7_1"
                                                                accept="*" style="padding:0px;border:0; display:none;">
                                                            <input type="hidden" id="file_attachother7_1"
                                                                class="file_attachother7_1" value="" />
                                                            <div id="msg7_1" class="msg7_1"></div>
                                                            <br><br><input type="file" id="attachment7_2"
                                                                name="attachment7_2" accept="*"
                                                                style="padding:0px;border:0; display:none;">
                                                            <input type="hidden" id="file_attachother7_2"
                                                                class="file_attachother7_2" value="" />
                                                            <div id="msg7_2" class="msg7_2"></div>
                                                        </td>
                                                        <td align="center">
                                                            <div id="down7_1"></div><br><br>
                                                            <div id="down7_2"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>8</td>
                                                        <td>Wedding Address Proof<br>1)Copy of wedding
                                                            card(if available)<br>2)Copy of Mandir /
                                                            Devsthan Dakhla</td>
                                                        <td align="center"><input type="checkbox" name="checkbox"
                                                                id="ch_8_1"><br><br><input type="checkbox"
                                                                name="checkbox" id="ch_8_2"></td>
                                                        <td><input type="file" id="attachment8_1" name="attachment8_1"
                                                                accept="*" style="padding:0px;border:0; display:none;">
                                                            <input type="hidden" id="file_attachother8_1"
                                                                class="file_attachother8_1" value="" />
                                                            <div id="msg8_1" class="msg8_1"></div>
                                                            <br><br><input type="file" id="attachment8_2"
                                                                name="attachment8_2" accept="*"
                                                                style="padding:0px;border:0; display:none;">
                                                            <input type="hidden" id="file_attachother8_2"
                                                                class="file_attachother8_2" value="" />
                                                            <div id="msg8_2" class="msg8_2"></div>
                                                        </td>
                                                        <td align="center">
                                                            <div id="down8_1"></div><br><br>
                                                            <div id="down8_2"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>9</td>
                                                        <td>Affidavit(if necessary under Sec.5(3) In case
                                                            of doubtful cases)</td>
                                                        <td align="center"><input type="checkbox" name="checkbox"
                                                                id="ch_9"></td>
                                                        <td><input type="file" id="attachment9" name="attachment9"
                                                                accept="*" style="padding:0px;border:0; display:none;">
                                                            <input type="hidden" id="file_attachother9"
                                                                class="file_attachother9" value="" />
                                                            <div id="msg9" class="msg9"></div>
                                                        </td>
                                                        <td align="center">
                                                            <div id="down9"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>10</td>
                                                        <td>Divorce Certificate, where application</td>
                                                        <td align="center"><input type="checkbox" name="checkbox"
                                                                id="ch_10"></td>
                                                        <td><input type="file" id="attachment10" name="attachment10"
                                                                accept="*" style="padding:0px;border:0; display:none;">
                                                            <input type="hidden" id="file_attachother10"
                                                                class="file_attachother10" value="" />
                                                            <div id="msg10" class="msg10"></div>
                                                        </td>
                                                        <td align="center">
                                                            <div id="down10"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>11</td>
                                                        <td>Death Certificate of deceased spouse,where
                                                            applicable</td>
                                                        <td align="center"><input type="checkbox" name="checkbox"
                                                                id="ch_11"></td>
                                                        <td><input type="file" id="attachment11" name="attachment11"
                                                                accept="*" style="padding:0px;border:0; display:none;">
                                                            <input type="hidden" id="file_attachother11"
                                                                class="file_attachother11" value="" />
                                                            <div id="msg11" class="msg11"></div>
                                                        </td>
                                                        <td align="center">
                                                            <div id="down11"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>12</td>
                                                        <td>For Office used only<br>1)Marriage can be
                                                            registered/rejected<br>2) Papers are
                                                            incomplete/ case is doubtful, issue
                                                            notice<br>3)No case is pending prior to this
                                                            case<br>4)Time limit is strictly followed
                                                        </td>
                                                        <td align="center"><input type="checkbox" name="checkbox"
                                                                id="ch_12_1"><br><br><input type="checkbox"
                                                                name="checkbox" id="ch_12_2"><br><br><input
                                                                type="checkbox" name="checkbox"
                                                                id="ch_12_3"><br><br><input type="checkbox"
                                                                name="checkbox" id="ch_12_4"></td>
                                                        <td><input type="file" id="attachment12_1" name="attachment12_1"
                                                                accept="*" style="padding:0px;border:0; display:none;">
                                                            <input type="hidden" id="file_attachother12_1"
                                                                class="file_attachother12_1" value="" />
                                                            <div id="msg12_1" class="msg12_1"></div>
                                                            <br><br><input type="file" id="attachment12_2"
                                                                name="attachment12_2" accept="*"
                                                                style="padding:0px;border:0; display:none;">
                                                            <input type="hidden" id="file_attachother12_2"
                                                                class="file_attachother12_2" value="" />
                                                            <div id="msg12_2" class="msg12_2"> </div>
                                                            <br><br><input type="file" id="attachment12_3"
                                                                name="attachment12_3" accept="*"
                                                                style="padding:0px;border:0; display:none;">
                                                            <input type="hidden" id="file_attachother12_3"
                                                                class="file_attachother12_3" value="" />
                                                            <div id="msg12_3" class="msg12_3"></div>
                                                            <br><br><input type="file" id="attachment12_4"
                                                                name="attachment12_4" accept="*"
                                                                style="padding:0px;border:0; display:none;">
                                                            <input type="hidden" id="file_attachother12_4"
                                                                class="file_attachother12_4" value="" />
                                                            <div id="msg12_4" class="msg12_4"></div>
                                                        </td>
                                                        <td align="center">
                                                            <div id="down12_1"></div><br><br>
                                                            <div id="down12_2"></div><br><br>
                                                            <div id="down12_3"></div><br><br>
                                                            <div id="down12_4"></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                </div>
                            </div>
                            <div class="btn-group pull-left">
                                <input type="hidden" id="chklist_id" value="">
                                <button class="btn btn-primary" type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                        <!--panel panel default-->
                        <!-- END SIMPLE DATATABLE -->
                    </div>
                    <!---form2 end---->
                    <!------------------------form3-start------------------------------->
                    <div class="col-md-12 col-sm-12 col-xs-12 right_side" id="form3" style="display:none;">
                        <!-- START SIMPLE DATATABLE -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Appointment</h3>
                                <div class="pull-right">
                                    <button class="btn btn-success closehideshow viewdetailsbtn"
                                        style="background-color:#00B050;">View Detail</button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-12">
                                    <form class="form-horizontal" id="master_form" name="master_form">
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label>Registration No*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" id="registration_no" name="registration_no"
                                                        class="form-control" placeholder="Registration No" required
                                                        disabled>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label>Groom Mobile No*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="number" style="text-align:right;" id="groom_mno"
                                                        name="groom_mno" disabled class="form-control"
                                                        placeholder="Groom Mobile number" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label>Bride Mobile No*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="number" style="text-align:right;" id="bride_mno"
                                                        name="bride_mno" disabled class="form-control"
                                                        placeholder="Bride Mobile number" required>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label>Date*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="input-group date " data-provide="datepicker" required>
                                                        <input type="text"
                                                            class="form-control input-sm placeholdesize date1"
                                                            id="notification_date5" autocomplete="off"
                                                            name="notification_date5">
                                                        <div class="input-group-addon">
                                                            <span class="fa fa-calendar"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label>Time</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="input-group clockpicker" data-placement="top"
                                                        data-align="left" data-donetext="Done">
                                                        <input type="text" id="time" class="form-control">
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-time"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label>Message</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <textarea id="message" name="message" class="form-control"
                                                        placeholder="Message"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="btn-group pull-left">
                                <input type="hidden" id="a_saveupdate" value="">
                                <button class="btn btn-primary" id="appointment" type="button">Submit</button>
                                </form>
                            </div>
                        </div>
                        <!--panel panel default-->
                        <!-- END SIMPLE DATATABLE -->
                    </div>
                    <!---form3 end---->
                    <!----------------------form3 end------------------------------->
                    <!--------------------form-4 start----------------------->
                    <div class="col-md-12 col-sm-12 col-xs-12 right_side" id="form4" style="display:none;">
                        <div class="panel-body">
                            <div class="panel-heading">
                                <h3 class="panel-title">Receipt</h3>
                                <div class="pull-right">
                                    <button class="btn btn-success closehideshow viewdetailsbtn"
                                        style="background-color:#00B050;">View Detail</button>
                                </div>
                            </div>
                            <div id="divToPrint" class="divToPrint" style="height:100%">
                                <form class="form-horizontal" id="master_form4" name="master_form4">
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
                                                                        style="float:right;width:100%;" required></font>
                                                            </font>
                                                        </th>
                                                        <th style="background-color: rgb(231, 226, 226);">
                                                            <font style="vertical-align: inherit;">Date
                                                                of Receipt <div class="input-group date"
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
                                                                    <input type="text" id="amt" name="amt"
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
                                                                    <input type="text" id="function" name="function"
                                                                        style="width:100%;" required>
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
                                                                        style="float:right;width:100%;" required></font>
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
                                        <button class="btn btn-primary" id="formbtn4" type="submit">Save</button>
                                        </form>
                                        <button class="btn btn-primary" type="submit" id="btnprint2" form="property2"
                                            name="btnprint2" value="">Print </button>
                                        <form name="property2" id="property2" method="POST"
                                            action="<?php echo base_url('Marrige/print_cash'); ?>" target="_blank">
                                        </form>
                                    </font>
                                    </button>
                            </center>
                        </div>
                    </div>
                    <!--------------------form4 end- -------------->
                    <!------------------------form5-start------------------------------->
                    <div class="col-md-12 col-sm-12 col-xs-12 right_side" id="form5" style="display:none;">
                        <!-- START SIMPLE DATATABLE -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Form D</h3>
                                <div class="pull-right">
                                    <button class="btn btn-success closehideshow viewdetailsbtn"
                                        style="background-color:#00B050;">View Detail</button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="panel-heading">
                                    <h3 class="panel-title">वैयक्तिक माहिती</h3>
                                </div>
                                <div class="col-lg-12">
                                    <form class="form-horizontal" id="master_form" name="master_form">
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label>विवाहाची तारीख*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="input-group date " data-provide="datepicker" required
                                                        disabled>
                                                        <input type="text"
                                                            class="form-control input-sm placeholdesize date1"
                                                            id="notification_date51" autocomplete="off"
                                                            name="notification_date51">
                                                        <div class="input-group-addon">
                                                            <span class="fa fa-calendar"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label>विवाहाचे ठिकाण*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <textarea id="wedding_place" rows="1" name="wedding_place"
                                                        class="form-control" placeholder="विवाहाचे ठिकाण" disabled
                                                        required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label>पक्षकारामधील विविध ज्या व्यक्तिगत कायद्यान्वये
                                                        विधी संपन्न झाला*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <textarea id="various_personal" style="width: 408px; height: 33px;"
                                                        rows="1" name="various_personal" class="form-control"
                                                        placeholder="पक्षकारामधील विविध ज्या व्यक्तिगत कायद्यान्वये विधी संपन्न झाला"
                                                        required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--col-->
                                <div class="panel-heading">
                                    <h3 class="panel-title">वराची माहिती</h3>
                                </div>
                                <div class="col-lg-12">
                                    <form class="form-horizontal" id="master_form" name="master_form">
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label>पतीचे नाव*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" id="husbund_name" name="husbund_name"
                                                        class="form-control" placeholder="पतीचे नाव" required disabled>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label>पतीला दुसऱ्या नावाने ओळखत असल्यास ते नाव</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" id="husbund_name_second"
                                                        name="husbund_name_second" class="form-control"
                                                        placeholder="पतीला दुसऱ्या नावाने ओळखत असल्यास ते नाव">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label>व्यवसाय आणि कार्यालयाचा पत्ता*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <textarea id="address_business" rows="1" name="address_business"
                                                        class="form-control" placeholder="आणि कार्यालयाचा पत्ता"
                                                        required></textarea>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label>धर्म*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <select id="religion" name="religion" class="form-control">
                                                        <option selected disabled>Select</option>
                                                        <option value="हिंदू">हिंदू</option>
                                                        <option value="इस्लाम ">इस्लाम </option>
                                                        <option value="सिख ">सिख </option>
                                                        <option value="बौद्ध">बौद्ध</option>
                                                        <option value="जैन">जैन</option>
                                                        <option value="पारसी">पारसी</option>
                                                        <option value="ख्रिश्चन">ख्रिश्चन</option>
                                                        <option value="इतर">इतर</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label>दुसरा धर्म स्वीकारला असल्यास*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <select id="another_religion" name="another_religion"
                                                        class="form-control">
                                                        <option selected disabled>Select</option>
                                                        <option value="हिंदू">हिंदू</option>
                                                        <option value="इस्लाम ">इस्लाम </option>
                                                        <option value="सिख ">सिख </option>
                                                        <option value="बौद्ध">बौद्ध</option>
                                                        <option value="जैन">जैन</option>
                                                        <option value="पारसी">पारसी</option>
                                                        <option value="ख्रिश्चन">ख्रिश्चन</option>
                                                        <option value="इतर">इतर</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label>जन्माने*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <select id="born" name="born" class="form-control">
                                                        <option selected disabled>Select</option>
                                                        <option value="हिंदू">हिंदू</option>
                                                        <option value="इस्लाम ">इस्लाम </option>
                                                        <option value="सिख ">सिख </option>
                                                        <option value="बौद्ध">बौद्ध</option>
                                                        <option value="जैन">जैन</option>
                                                        <option value="पारसी">पारसी</option>
                                                        <option value="ख्रिश्चन">ख्रिश्चन</option>
                                                        <option value="इतर">इतर</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label>विविध विधी ज्या तारखेस संपन्न झाले त्या तारखेचे
                                                        वय*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" id="g_age_executed" name="g_age_executed"
                                                        class="form-control"
                                                        placeholder="विविध विधी ज्या तारखेस संपन्न झाले त्या तारखेचे वय"
                                                        disabled required></textarea>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label>पतीचा पुर्ण पत्ता*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <textarea id="address_full" rows="1" name="address_full"
                                                        class="form-control" placeholder="पतीचा पुर्ण पत्ता"
                                                        required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label>विवाहाच्या वेळेची स्थिती*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <select id="h_state_marriage" name="h_state_marriage"
                                                        class="form-control">
                                                        <option selected disabled>Select</option>
                                                        <option>अविवाहित</option>
                                                        <option>विधुर </option>
                                                        <option>घटस्फोटीत</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--col-->
                                <div class="panel-heading">
                                    <h3 class="panel-title">वधूची माहिती</h3>
                                </div>
                                <div class="col-lg-12">
                                    <form class="form-horizontal" id="master_form" name="master_form">
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label>पत्नीचे नाव*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" id="wife_name" name="wife_name"
                                                        class="form-control" placeholder="पत्नीचे नाव" required
                                                        disabled>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label>पत्नीला दुसऱ्या नावाने ओळखत असल्यास ते
                                                        नाव</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" id="wife_name_second" name="wife_name_second"
                                                        class="form-control"
                                                        placeholder="पत्नीला दुसऱ्या नावाने ओळखत असल्यास ते नाव">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label>व्यवसाय आणि कार्यालयाचा पत्ता*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <textarea id="waddress_business" rows="1" name="waddress_business"
                                                        class="form-control" placeholder="आणि कार्यालयाचा पत्ता"
                                                        required></textarea>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label>धर्म*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <select id="w_religion" name="w_religion" class="form-control">
                                                        <option selected disabled>Select</option>
                                                        <option value="हिंदू">हिंदू</option>
                                                        <option value="इस्लाम ">इस्लाम </option>
                                                        <option value="सिख ">सिख </option>
                                                        <option value="बौद्ध">बौद्ध</option>
                                                        <option value="जैन">जैन</option>
                                                        <option value="पारसी">पारसी</option>
                                                        <option value="ख्रिश्चन">ख्रिश्चन</option>
                                                        <option value="इतर">इतर</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label>दुसरा धर्म स्वीकारला असल्यास*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <select id="wanother_religion" name="wanother_religion"
                                                        class="form-control">
                                                        <option selected disabled>Select</option>
                                                        <option value="हिंदू">हिंदू</option>
                                                        <option value="इस्लाम ">इस्लाम </option>
                                                        <option value="सिख ">सिख </option>
                                                        <option value="बौद्ध">बौद्ध</option>
                                                        <option value="जैन">जैन</option>
                                                        <option value="पारसी">पारसी</option>
                                                        <option value="ख्रिश्चन">ख्रिश्चन</option>
                                                        <option value="इतर">इतर</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label>जन्माने*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <select id="w_born" name="w_born" class="form-control">
                                                        <option selected disabled>Select</option>
                                                        <option value="हिंदू">हिंदू</option>
                                                        <option value="इस्लाम ">इस्लाम </option>
                                                        <option value="सिख ">सिख </option>
                                                        <option value="बौद्ध">बौद्ध</option>
                                                        <option value="जैन">जैन</option>
                                                        <option value="पारसी">पारसी</option>
                                                        <option value="ख्रिश्चन">ख्रिश्चन</option>
                                                        <option value="इतर">इतर</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label>विविध विधी ज्या तारखेस संपन्न झाले त्या तारखेचे
                                                        वय*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" id="b_age_executed" name="b_age_executed"
                                                        class="form-control"
                                                        placeholder="विविध विधी ज्या तारखेस संपन्न झाले त्या तारखेचे वय"
                                                        disabled required></textarea>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label>पत्नीचा पुर्ण पत्ता*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <textarea id="w_address_full" rows="1" name="w_address_full"
                                                        class="form-control" placeholder="पत्नीचा पुर्ण पत्ता"
                                                        required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label>विवाहाच्या वेळेची स्थिती*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <select id="w_state_marriage" name="w_state_marriage"
                                                        class="form-control">
                                                        <option selected disabled>Select</option>
                                                        <option>अविवाहित</option>
                                                        <option>विधुर </option>
                                                        <option>घटस्फोटीत</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--col--->
                                <div class="panel-heading">
                                    <h3 class="panel-title">साक्षीदार</h3>
                                </div>
                                <div class="col-lg-12">
                                    <form class="form-horizontal" id="master_form" name="master_form">
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label>साक्षीदार 1)</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label>नाव*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" id="w1_name" name="w1_name" class="form-control"
                                                        placeholder="नाव" required>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label>पत्ता</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <textarea id="w1_address" rows="1" name="w1_address"
                                                        class="form-control" placeholder=" पत्ता" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label>व्यवसाय आणि कार्यालयाचा पत्ता*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <textarea id="w1address_business" rows="1" name="w1address_business"
                                                        class="form-control" placeholder="व्यवसाय आणि कार्यालयाचा पत्ता"
                                                        required></textarea>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label>विवाहित जोडप्याशी असलेले नाते*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" id="relationship_couple1"
                                                        name="relationship_couple1" class="form-control"
                                                        placeholder="विवाहित जोडप्याशी असलेले नाते" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label>साक्षीदार 2)</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label>नाव*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" id="w2_name" name="w2_name" class="form-control"
                                                        placeholder="नाव" required>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label>पत्ता</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <textarea id="w2_address" rows="1" name="w2_address"
                                                        class="form-control" placeholder=" पत्ता" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label>व्यवसाय आणि कार्यालयाचा पत्ता*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <textarea id="w2address_business" rows="1" name="w2address_business"
                                                        class="form-control" placeholder="व्यवसाय आणि कार्यालयाचा पत्ता"
                                                        required></textarea>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label>विवाहित जोडप्याशी असलेले नाते*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" id="relationship_couple2"
                                                        name="relationship_couple2" class="form-control"
                                                        placeholder="विवाहित जोडप्याशी असलेले नाते" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label>साक्षीदार 3)</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label>नाव*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" id="w3_name" name="w3_name" class="form-control"
                                                        placeholder="नाव" required>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label>पत्ता</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <textarea id="w3_address" rows="1" name="w3_address"
                                                        class="form-control" placeholder=" पत्ता" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label>व्यवसाय आणि कार्यालयाचा पत्ता*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <textarea id="w3address_business" rows="1" name="w3address_business"
                                                        class="form-control" placeholder="व्यवसाय आणि कार्यालयाचा पत्ता"
                                                        required></textarea>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label>विवाहित जोडप्याशी असलेले नाते*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" id="relationship_couple3"
                                                        name="relationship_couple3" class="form-control"
                                                        placeholder="विवाहित जोडप्याशी असलेले नाते" required>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--col--->
                                <div class="panel-heading">
                                    <h3 class="panel-title"> पुरोहित</h3>
                                </div>
                                <div class="col-lg-12">
                                    <form class="form-horizontal" id="master_form" name="master_form">
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label>पुरोहिताचे नाव*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" id="priest_name" name="priest_name"
                                                        class="form-control" placeholder="पुरोहिताचे नाव" required>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label>पुर्ण पत्ता*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <textarea id="address" rows="1" name="address" class="form-control"
                                                        placeholder="पुर्ण पत्ता" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label>धर्म*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <select id="p_religion" name="p_religion" class="form-control">
                                                        <option selected disabled>Select</option>
                                                        <option value="हिंदू">हिंदू</option>
                                                        <option value="इस्लाम ">इस्लाम </option>
                                                        <option value="सिख ">सिख </option>
                                                        <option value="बौद्ध">बौद्ध</option>
                                                        <option value="जैन">जैन</option>
                                                        <option value="पारसी">पारसी</option>
                                                        <option value="ख्रिश्चन">ख्रिश्चन</option>
                                                        <option value="इतर">इतर</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label>वय*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" id="age" name="age" class="form-control"
                                                        placeholder="वय" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label>निबंधकाकडे सादर केल्याचा दिनांक*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="input-group date " data-provide="datepicker" required
                                                        disabled>
                                                        <input type="text"
                                                            class="form-control input-sm placeholdesize date1"
                                                            id="notification_date52" autocomplete="off"
                                                            name="notification_date52">
                                                        <div class="input-group-addon">
                                                            <span class="fa fa-calendar"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--col-->
                                <div class="panel-heading">
                                    <h3 class="panel-title"> Attachment :: कागदपत्रे जोडा</h3>
                                </div>
                                <div class="col-lg-12">
                                    <form class="form-horizontal" id="master_form" name="master_form">
                                        <input type="hidden" id="atc_photo" value="">
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label>1) पती</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-2">
                                                    <label>पतीचा फोटो*</label>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="file" class="form-control input-md" id="uploadFile51"
                                                        name="uploadFile51" accept="image/*">
                                                    <input type="hidden" id="file_attachother51" value="" required>
                                                    <div id="msg51"></div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <!-- <button class="btn btn-success "
                                                                      style="background-color:#00B050;">Capture</button> -->
                                                </div>
                                                <div class="col-sm-1" style="margin-top:30px;">
                                                    <div id="containerother_kyc51"></div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <label>पतीचा अंगठ्याचा ठसा*</label>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="file" class="form-control input-md" id="uploadFile52"
                                                        name="uploadFile52" accept="image/*">
                                                    <input type="hidden" id="file_attachother52" value="" required>
                                                    <div id="msg52"></div>
                                                </div>
                                                <div class="col-sm-1" style="margin-top:30px;">
                                                    <div id="containerother_kyc52"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label>1) पत्नी</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-2">
                                                    <label>पत्नीचा फोटो*</label>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="file" class="form-control input-md" id="uploadFile53"
                                                        name="uploadFile53" accept="image/*">
                                                    <input type="hidden" id="file_attachother53" value="" required>
                                                    <div id="msg53"></div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <!-- <button class="btn btn-success "
                                                                      style="background-color:#00B050;">Capture</button> -->
                                                </div>
                                                <div class="col-sm-1" style="margin-top:30px;">
                                                    <div id="containerother_kyc53"></div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <label>पत्नीचा अंगठ्याचा ठसा*</label>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="file" class="form-control input-md" id="uploadFile54"
                                                        name="uploadFile54" accept="image/*">
                                                    <input type="hidden" id="file_attachother54" value="" required>
                                                    <div id="msg54"></div>
                                                </div>
                                                <div class="col-sm-1" style="margin-top:30px;">
                                                    <div id="containerother_kyc54"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label>1) साक्षीदार 1)</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-2">
                                                    <label>साक्षीदारचा फोटो*</label>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="file" class="form-control input-md" id="uploadFile55"
                                                        name="uploadFile55" accept="image/*">
                                                    <input type="hidden" id="file_attachother55" value="" required>
                                                    <div id="msg55"></div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <!-- <button class="btn btn-success "
                                                                      style="background-color:#00B050;">Capture</button> -->
                                                </div>
                                                <div class="col-sm-1" style="margin-top:30px;">
                                                    <div id="containerother_kyc55"></div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <label>साक्षीदारचा अंगठ्याचा ठसा*</label>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="file" class="form-control input-md" id="uploadFile56"
                                                        name="uploadFile56" accept="image/*">
                                                    <input type="hidden" id="file_attachother56" value="" required>
                                                    <div id="msg56"></div>
                                                </div>
                                                <div class="col-sm-1" style="margin-top:30px;">
                                                    <div id="containerother_kyc56"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label>1) साक्षीदार 2)</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-2">
                                                    <label>साक्षीदारचा फोटो*</label>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="file" class="form-control input-md" id="uploadFile57"
                                                        name="uploadFile57" accept="image/*">
                                                    <input type="hidden" id="file_attachother57" value="" required>
                                                    <div id="msg57"></div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <!-- <button class="btn btn-success "
                                                                      style="background-color:#00B050;">Capture</button> -->
                                                </div>
                                                <div class="col-sm-1" style="margin-top:30px;">
                                                    <div id="containerother_kyc57"></div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <label>साक्षीदारचा अंगठ्याचा ठसा*</label>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="file" class="form-control input-md" id="uploadFile58"
                                                        name="uploadFile58" accept="image/*">
                                                    <input type="hidden" id="file_attachother58" value="" required>
                                                    <div id="msg58"></div>
                                                </div>
                                                <div class="col-sm-1" style="margin-top:30px;">
                                                    <div id="containerother_kyc58"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label>1) साक्षीदार 3)</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-2">
                                                    <label>साक्षीदारचा फोटो*</label>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="file" class="form-control input-md" id="uploadFile59"
                                                        name="uploadFile59" accept="image/*">
                                                    <input type="hidden" id="file_attachother59" value="" required>
                                                    <div id="msg59"></div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <!-- <button class="btn btn-success "
                                                                      style="background-color:#00B050;">Capture</button> -->
                                                </div>
                                                <div class="col-sm-1" style="margin-top:30px;">
                                                    <div id="containerother_kyc59"></div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <label>साक्षीदारचा अंगठ्याचा ठसा*</label>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="file" class="form-control input-md" id="uploadFile591"
                                                        name="uploadFile591" accept="image/*">
                                                    <input type="hidden" id="file_attachother591" value="" required>
                                                    <div id="msg591"></div>
                                                </div>
                                                <div class="col-sm-1" style="margin-top:30px;">
                                                    <div id="containerother_kyc591"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--col-->
                            </div>
                            <!---panel body---->
                            <div class="btn-group pull-left">
                                <input type="hidden" id="f_saveupdate" value="">
                                <button class="btn btn-primary" id="formd" type="submit">Save</button>
                            </div>
                        </div>
                        <!--panel panel default-->
                        <!-- END SIMPLE DATATABLE -->
                    </div>
                    <!---form5 end---->
                    <!----------------------form5 end------------------------------->
                    <!--------------form6-start ----------------------->
                    <div class="col-md-12 col-sm-12 col-xs-12 right_side" id="form6" style="display:none;">
                        <div class="panel-body">
                            <div class="panel-heading">
                                <h3 class="panel-title">Marriage Registration</h3>
                                <div class="pull-right">
                                    <button class="btn btn-success closehideshow viewdetailsbtn"
                                        style="background-color:#00B050;">View Detail</button>
                                </div>
                            </div><br>
                            <div id="divToPrint1">
                                <center>
                                    <table frame="box" id="tbl_2" style="width:100%">
                                        <tbody>
                                            <tr>
                                                <th colspan="4" style="padding-top: 1%;">
                                                    <center><b> विवाह नोंदणी कर्यालय , चंद्रपूर शहर महानगरपालिका </b>
                                                    </center>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td colspan="4">
                                                    <center><b> - आदेश पत्र - </b></center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th colspan="4" style="padding-top: 1%;padding-left: 1%;">
                                                    <center>-------------------------------------विवाह नोंदणी करणे बाबत
                                                        ----------------------------------------------- </center>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="padding-left:2%;">दिनांक <label
                                                        class='current_date_print'></label></td>
                                                <td colspan="2">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="padding-left:2%;"><b>सादर,</b></td>
                                                <td colspan="2">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" style="padding-top: 1%;padding-left: 3%;">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; अर्जदार श्री,<label
                                                        class="c_name"></label> यांचा अर्ज दिनांक <label
                                                        class='current_date_print'></label> अन्वये विवाह नोंदणी करिता
                                                    अर्ज सादर केला त्या प्रमाणे त्यांची माहिती खालील प्रमाणे आहे. </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" style="padding-top: 1%;padding-left: 3%;">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; मुलाचे नाव : <label
                                                        class="c_name"></label> राहणार <label class="c_address"></label>
                                                    -तहसिल <label class="c_tahsil"></label> जिल्हा <label
                                                        class="c_dist"></label> तसेच </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" style="padding-top: 1%;padding-left: 3%;">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; मुलीचे नाव : <label
                                                        class="g_name"></label> राहणार <label class="g_address"></label>
                                                    -तहसिल <label class="g_tahsil"></label> जिल्हा <label
                                                        class="g_dist"></label> तसेच </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" style="padding-top: 1%;padding-left: 3%;">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; विवाह दिनांक: <label
                                                        class="m_date"></label> ला <label class="m_address"></label>
                                                    येथे झाला आहे. त्यांनी सोबत आवश्यक लागणारे प्रमाणपत्र व फोटो सोबत
                                                    जोडले असून तीन साक्षीदारांचे फोटो व पुरावे सोबत जोडले. व प्रत्यक्षात
                                                    वर वधु व तीन साक्षीदार हजर राहून स्वाक्षरी केली आहे.
                                                    त्यांनी विवाह नोंदणी करून प्रमाण पत्राची मागणी केली असून त्यांना
                                                    विवाह प्रमाणपत्र देण्यास हरकत नाही. तरी डि फार्म व विवाह नोंदणी
                                                    प्रमाणपत्र आपल्या स्वाक्षरीस सदर
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" style="padding-top: 1%;">
                                                    <center>निबंधक, विवाह नोंदणी , चंद्रपूर शहर महानगरपालिका
                                                        -----------------------------------</center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" style="padding-top:25px;">
                                                    <center><label class="modify_date"></label></center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </center>
                            </div>
                            <center>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;"> <a class="printPage1 btn btn-primary"
                                            href="#">Print</a></font>
                                </font>
                                </button>
                            </center>
                        </div>
                    </div>
                    <!--------------------form6 end--------------->
                    <input type="hidden" id="base_url" value="<?php echo base_url(); ?> " />
                    <!------------form8 start-------------------------->
                    <div class="col-md-12 col-sm-12 col-xs-12 right_side" id="form8"
                        style="display:none;margin-bottom:-1%;">
                        <div class="panel-body">
                            <div class="panel-heading">
                                <h3 class="panel-title">Certificate </h3>
                                <div class="pull-right">
                                    <button class="btn btn-success closehideshow viewdetailsbtn"
                                        style="background-color:#00B050;">View Detail</button>
                                </div>
                            </div><br>
                            <!--start-->
                            <!-- <div class="form-group">
													<div class="col-sm-2">
														<label>Choose Language</label>
														</div>
														<div class="col-sm-2">
														<select id="language" name="language" class="form-control">
															<option selected="" value="marathi">Marathi</option>
															<option value="english">English</option>
														</select>
													</div>
                                                            </div> -->
                            <div class="form-group">
                                <div class="col-sm-2">
                                    <label>Choose Certificate/label>
                                </div>
                                <div class="col-sm-2">
                                    <select id="c_certificate" name="c_certificate" class="form-control">
                                        <option selected="" value="1">नमुना 'इ'</option>
                                        <option value="2">गोषवारा भाग १</option>
                                        <option value="3">गोषवारा भाग २</option>
                                        <option value="4">नमुना "ई"</option>
                                    </select>
                                </div>
                            </div>
                            <div id="divToPrint3" style="display:none">
                                <center>
                                    <!-- <div><span>Reference No : <strong>CMC</strong></span></div> -->
                                    <table frame="box" id="tbl_2" style="width:100%;margin-top:2%;border: 4px solid;">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <table style="width:100%;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="padding-left: 2%;width: 80%;height:147px;">
                                                                    <img src="<?php echo base_url(); ?>images/cmc.jpg"
                                                                        style="margin-left: 5%;height: 88px;">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td
                                                                    style="width:20%;padding-top: 11%;padding-left: 2%; margin-left: -119px;">
                                                                    <center>
                                                                        <img src="<?php echo base_url(); ?>images/cmc.jpg"
                                                                            style="float: left;padding-left: 2%;width: 80%;height:147px;border: 1px solid;">
                                                                        <div
                                                                            style="width: 59%;font-size: 16px;margin-left: -119px;">
                                                                            पतीचा फोटो <br>
                                                                            Husband's Photo
                                                                        </div>
                                                                    </center>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td style="width:40%;">
                                                    <center>
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <center><b style="font-size: 23px;"> Chandrapur
                                                                                City Municipal Corporation </b></center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <center><b style="font-size: 20px;">Marriage
                                                                                Registration</b></center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <center><b>Sample 'E'</b></center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <center><b>Marriage Registration Certificate</b>
                                                                        </center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <center><b> (See section 6 (1) and Rule 5) </b>
                                                                        </center>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </center>
                                                </td>
                                                <td style="width:20%;padding-top: 11%;padding-right: 2%;">
                                                    <center>
                                                        <img src="<?php echo base_url(); ?>images/cmc.jpg"
                                                            style="float: right;padding-right: 2%;width: 80%;height:147px;border: 1px solid;">
                                                        <div style="width: 40%;font-size: 16px;margin-left: 102px;">
                                                            पत्नीचा फोटो
                                                            <br>Wife's Photo
                                                        </div>
                                                    </center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3"
                                                    style="padding-top: 1%;padding-left: 2%;padding-right: 2%;">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;It is
                                                    certified that the husband's name स्वप्नील सुधाकर जोगी Will stay २४
                                                    लक्ष्मी नगर, वडगाव रोड, चंद्रपूर &nbsp; Tahasil चंद्रपूर District
                                                    चंद्रपूर And wife's name भाग्यश्री संजय पावडे Will stay लक्ष्मी नगर,
                                                    गुरुद्वारा रोड, चंद्रपूर &nbsp; Tahasil चंद्रपूर District चंद्रपूर
                                                    Marriage date of 31/05/2019 on लिली हाल शकुंतला फार्म, नागपूर रोड,
                                                    चंद्रपूर &nbsp;
                                                    done here Regarding the Maharashtra Marriage Regulations of
                                                    Maharashtra and the serial number 54 of the records maintained under
                                                    the Marriage Registration Bill, 1998, MHA / CND /
                                                    2019/000784 on date 12/06/2019 I was registered on my behalf.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="padding-top: 1%;padding-left: 1%;">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date :
                                                    2019/06/12 </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="padding-top: 1%;padding-left: 1%;">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Place :
                                                    Chandrapur City Municipal Corporation </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="padding-top: 1%;padding-left: 1%;">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<center>
                                                        ------------------------------------------------------------------------------------------------------------------------------------------------------------------
                                                    </center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <table style="float: right; margin-right: 75px;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="padding-top: 2%;">
                                                                    <center><b>Registrar</b></center>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding-top: 2%;">
                                                                    <center><b>Marriage Registration Officer,</b>
                                                                    </center>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding-top: 2%;">
                                                                    <center><b>Chandrapur City Municipal
                                                                            Corporation.</b></center>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding-top: 2%;">
                                                                    <center><img alt=""
                                                                            src="http://allysoftsolutions.com/chandrapur/images/barcode.png"><br>2019MCMC14163
                                                                    </center>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </center>
                            </div>
                            <!--end-->
                            <div id="divToPrint2">
                                <center>
                                    <!-- <div><span>Reference No : <strong>CMC</strong></span></div> -->
                                    <table frame="box" id="tbl_2" style="width:100%;margin-top:2%;border: 4px solid;">
                                        <tbody>
                                            <tr></tr>
                                            <tr>
                                                <td style="width:20%;">
                                                    <table style="width:100%;">
                                                        <tbody>
                                                            <tr style="margin-bottom: 5%;" rowspan="3">
                                                                <td>
                                                                    <center>
                                                                        <img src="<?php echo base_url(); ?>images/cmc.jpg"
                                                                            style="float: left;padding-left: 2%;width: 115px;height:115px;">
                                                                    </center>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>&nbsp;</td>
                                                            </tr>
                                                            <tr rowspan="3">
                                                                <td>
                                                                    <center>
                                                                        <img class="hphoto"
                                                                            src="<?php echo base_url(); ?>images/cmc.jpg"
                                                                            style="float:left; padding-left: 2%; padding-right: 1%; width: 115px;height:115px;border: 1px solid;">

                                                                        <div
                                                                            style="width: 100%;font-size: 14px;margin-left: -20%;text-align:center;">
                                                                            पतीचा फोटो <br>
                                                                            Husband's Photo
                                                                        </div>
                                                                    </center>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td style="width:60%;text-align:center;">

                                                    <table style="width:100%;text-align:center;margin-left: 30%;">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <center><b
                                                                            style="font-size: 25px;text-align:center;">
                                                                            चंद्रपूर शहर महानगरपालिका </b></center>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <center><b
                                                                            style="font-size: 20px;text-align:center;">
                                                                            विवाह नोंदणी कर्यालय </b></center>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <center><b
                                                                            style="font-size: 15px;line-height:2;text-align:center;">
                                                                            नमुना 'इ' </b></center>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <center><b
                                                                            style="font-size: 15px;line-height:2;text-align:center;">
                                                                            विवाह नोंदणीचे प्रमाणपत्र </b></center>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <center><b
                                                                            style="font-size: 15px;line-height:2;text-align:center;">
                                                                            (पहा कलम ६(१) आणि नियम ५) </b></center>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </td>
                                                <td style="width:20%;text-align:center;">
                                                    <table style="width:100%;">
                                                        <tbody>
                                                            <tr style="margin-bottom: 5%;" rowspan="3">
                                                                <td>&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td>&nbsp;</td>
                                                            </tr>
                                                            <tr style="margin-bottom: 5%;" rowspan="3">
                                                                <td>
                                                                    <center>
                                                                        <img class="gphoto"
                                                                            src="<?php echo base_url(); ?>images/cmc.jpg"
                                                                            style="float:right; padding-left: 1%;margin-top:35%; padding-right: 2%;width: 115px;height:114px;border: 1px solid;">
                                                                        <br>
                                                                        <div
                                                                            style="width:45%;font-size: 14px;margin-right: -50%;text-align:center;">
                                                                            पत्नीचा फोटो <br>
                                                                            Wife's Photo
                                                                        </div>
                                                                    </center>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3"
                                                    style="padding-top: 2%;padding-left: 5%;padding-right: 2%;line-height: 2;font-size:15px;text-align:justify;">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;प्रमाणित
                                                    करण्यात येते की, पतीचे नाव <label class="c_name"></label> राहणार
                                                    <label class="c_address"></label> &nbsp; तहसिल <label
                                                        class="c_tahsil"></label> जिल्हा <label class="c_dist"></label>
                                                    आणि पत्नीचे नाव <label class="g_name"></label> राहणार <label
                                                        class="g_address"></label> &nbsp; तहसिल <label
                                                        class="g_tahsil"></label> जिल्हा <label class="g_dist"></label>
                                                    यांचा विवाह दिनांक <label class="m_date"></label> रोजी <label
                                                        class="m_address"></label> &nbsp;येथे संपन्न झाला त्याची
                                                    महाराष्ट्र विवाह मंडळाचे विनियमन आणि विवाह नोंदणी विधेयक १९९८ अन्वये
                                                    ठेवण्यात आलेल्या नोंद वहीच्या खंड क्रमांक ५४ च्या अनुक्रमांक एम ए एच
                                                    एम / सी एन डी /
                                                    २०१९ / <label class="mr_reg"></label> वर दिनांक रोजी <label
                                                        class='reg_date'></label> माझ्याकडून नोंदणी करण्यात आली.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="padding-top: 2%;padding-left: 1%;">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;दिनांक :
                                                    <label class='current_date_print'></label> </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="padding-top: 2%;padding-left: 1%;">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ठिकाण :
                                                    चंद्रपूर शहर महानगरपालिका </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <table
                                                        style="width: 100%; border-bottom: 2px dotted gray;padding-top:1%;">
                                                        <tr>
                                                            <td></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">&nbsp;</td>
                                            </tr>
                                            <!-- <tr><td colspan="3">&nbsp;</td></tr> -->
                                            <tr>
                                                <td style="padding-top:100px;padding-left:15px;"><label
                                                        class="modify_date"></label></td>
                                                <td></td>
                                                <td>
                                                    <table style="float: right; margin-right: 15px;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="padding-top: 2%;">
                                                                    <center><b> निबंधक </b></center>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding-top: 2%;">
                                                                    <center><b> विवाह नोंदणी अधिकारी , </b></center>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding-top: 2%;">
                                                                    <center><b> चंद्रपूर शहर महानगरपालिका. </b></center>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding-top: 2%;"><img
                                                                        src="<?php echo base_url(); ?>images/barcode.png"
                                                                        style="width: margin-right:-5% 40%;height:35px;border: 1px solid;">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding-top: 1%;">
                                                                    <center><b><label class="mr_receipt"></label></b>
                                                                    </center>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <!-- <tr><td colspan="3">&nbsp;</td></tr> -->
                                        </tbody>
                                    </table>
                                </center>
                            </div>
                            <!-- goswar 1 start -->
                            <div id="divToPrintGoswar1" style="display:none">
                                <center>
                                    <!-- <div><span>Reference No : <strong>CMC</strong></span></div> -->
                                    <table frame="box" id="tbl_2" style="width:100%;margin-top:2%;border: 4px solid;">
                                        <tbody>
                                            <tr>
                                                <td style="width:40%;" colspan="4">
                                                    <center>
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <center><b style="font-size: 18px;"> विवाह
                                                                                नोंदणी कर्यालय, चंद्रपूर शहर
                                                                                महानगरपालिका </b></center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <center><b style="font-size: 15px;"> नमुना 'इ '
                                                                            </b></center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <center><b style="font-size: 15px;"> विवाह
                                                                                नोंदणीचे प्रमाणपत्र </b></center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <center><b style="font-size: 15px;"> (गोषवारा
                                                                                भाग १) </b></center>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">
                                                    <table
                                                        style="width: 100%; border-bottom: 2px dotted;padding-top:1%;margin-bottom:1%;">
                                                        <tr>
                                                            <td></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr style="font-size:14px;">
                                                <td></td>
                                                <td colspan=2 style="padding-left: 2%;">विवाह नोंदणी क्रमांक:<label
                                                        class='svnk'></label></td>
                                                <td>दिनांक: <label class='current_date_print'></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">
                                                    <table style="width: 100%; border-bottom: 2px dotted gray;">
                                                        <tr>
                                                            <td></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">&nbsp;</td>
                                            </tr>
                                            <tr colspan="4" style="font-size:14px;">
                                                <td style="width:42%;" colspan="2">
                                                    <center>वराची माहिती</center>
                                                </td>
                                                <td>
                                                    <center>छायाचित्र</center>
                                                </td>
                                                <td>
                                                    <center>अंगठ्याचा ठसा</center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">
                                                    <table style="width:100%;">
                                                        <tr style="font-size:14px;">
                                                            <td colspan="2" style="padding-left: 2%;">
                                                                <table width="100%">
                                                                    <tr style="font-size:14px;">
                                                                        <td style="padding-left: 2%; width:15%;">नाव :
                                                                        </td>
                                                                        <td><label style="font-size:14px;"
                                                                                class="c_name"></label> </td>
                                                                    </tr>
                                                                    <tr style="font-size:14px;">
                                                                        <td style="padding-left: 2%;width:15%;">पत्ता :
                                                                        </td>
                                                                        <td style="vertical-align: bottom;"
                                                                            class="add_marathi_mrg"><label
                                                                                style="font-size:14px;margin-top:3px;"
                                                                                class="c_address"></label> </td>
                                                                    </tr>
                                                                    <tr style="font-size:14px;">
                                                                        <td style="padding-left: 2%;width:15%;">सही :
                                                                        </td>
                                                                        <td>______________________</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td style="width:25%">
                                                                <center><img alt="" class="hphoto" width="130px"
                                                                        height="130px"
                                                                        src="<?php echo base_url(); ?>images/barcode.png">
                                                                </center>
                                                            </td>
                                                            <td style="width:25%">
                                                                <center><img alt="" class="htphoto" width="130px"
                                                                        height="130px"
                                                                        src="<?php echo base_url(); ?>images/barcode.png">
                                                                </center>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">&nbsp;
                                                    <table
                                                        style="width: 100%; border-bottom: 2px dotted gray;padding-top:1%;">
                                                        <tr>
                                                            <td></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">&nbsp;</td>
                                            </tr>
                                            <tr colspan="4" style="font-size:14px;">
                                                <td style="width:42%;" colspan="2">
                                                    <center>वधूची माहिती</center>
                                                </td>
                                                <td>
                                                    <center>छायाचित्र</center>
                                                </td>
                                                <td>
                                                    <center>अंगठ्याचा ठसा</center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">
                                                    <table style="width:100%;">
                                                        <tr style="font-size:14px;">
                                                            <td colspan="2" style="padding-left: 2%;">
                                                                <table width="100%">
                                                                    <tr style="font-size:14px;width:100%;">
                                                                        <td style="padding-left: 2%; width:15%;">नाव :
                                                                        </td>
                                                                        <td><label style="font-size:14px;"
                                                                                class="g_name"></label> </td>
                                                                    </tr>
                                                                    <tr style="font-size:14px;">
                                                                        <td style="padding-left: 2%;width:15%;">पत्ता :
                                                                        </td>
                                                                        <td style="vertical-align: bottom;"
                                                                            class="add_marathi_mrg"><label
                                                                                style="font-size:14px;margin-top:3px;"
                                                                                class="g_address"></label> </td>
                                                                    </tr>
                                                                    <tr style="font-size:14px;">
                                                                        <td style="padding-left: 2%;width:15%;">सही :
                                                                        </td>
                                                                        <td>______________________</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td style="width:25%">
                                                                <center><img alt="" class="gphoto" width="130px"
                                                                        height="130px"
                                                                        src="<?php echo base_url(); ?>images/barcode.png">
                                                                </center>
                                                            </td>
                                                            <td style="width:25%">
                                                                <center><img alt="" class="gtphoto" width="130px"
                                                                        height="130px"
                                                                        src="<?php echo base_url(); ?>images/barcode.png">
                                                                </center>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="padding-top:80px;padding-left:15px;"><label
                                                        class="modify_date"></label></td>
                                                <td colspan="2">
                                                    <table style="float: right; margin-right: 75px; font-size:18px;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="padding-top: 1%;">
                                                                    <center><b> निबंधक </b></center>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding-top: 1%;">
                                                                    <center><b> विवाह नोंदणी अधिकारी , </b></center>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding-top: 1%;">
                                                                    <center><b> चंद्रपूर शहर महानगरपालिका. </b></center>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </center>
                            </div>
                            <!-- goswar 1 end -->
                            <!-- goswar 2 start -->
                            <div id="divToPrintGoswar2" style="display:none">
                                <center>
                                    <!-- <div><span>Reference No : <strong>CMC</strong></span></div> -->
                                    <table frame="box" id="tbl_2" style="width:100%;margin-top:2%;border: 4px solid;">
                                        <tbody>
                                            <tr>
                                                <td style="width:40%;" colspan="4">
                                                    <center>
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <center><b style="font-size: 18px;"> विवाह
                                                                                नोंदणी कर्यालय, चंद्रपूर शहर
                                                                                महानगरपालिका </b></center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <center><b style="font-size: 15px;"> नमुना 'इ '
                                                                            </b></center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <center><b style="font-size: 15px;"> विवाह
                                                                                नोंदणीचे प्रमाणपत्र </b></center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <center><b style="font-size: 15px;"> (गोषवारा
                                                                                भाग २) </b></center>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">
                                                    <table
                                                        style="width: 100%;padding-top:1%; border-bottom: 2px dotted gray;margin-bottom:1%;">
                                                        <tr>
                                                            <td></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr style="font-size:14px;">
                                                <td></td>
                                                <td colspan="2" style="padding-left: 2%;">विवाह नोंदणी क्रमांक:<label
                                                        class='svnk'></label></td>
                                                <td>दिनांक: <label class='current_date_print'></label></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">
                                                    <table
                                                        style="width: 100%;padding-top:1%; border-bottom: 2px dotted gray;">
                                                        <tr>
                                                            <td></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">&nbsp;</td>
                                            </tr>
                                            <tr colspan="3" style="font-size:14px;">
                                                <td></td>
                                                <td style="padding-left: 2%;">साक्षीदाराची माहिती</td>
                                                <td>
                                                    <center>छायाचित्र</center>
                                                </td>
                                                <td>
                                                    <center>अंगठ्याचा ठसा</center>
                                                </td>
                                            </tr>
                                            <tr style="font-size:14px;">
                                                <td style="padding-left: 2%;">१. नाव :</td>
                                                <td><label class="s_name1"></label></td>
                                                <td rowspan="3" style="width:25%">
                                                    <center><img class='sphoto1' width="130px" height="130px" alt=""
                                                            src="<?php echo base_url(); ?>images/barcode.png"></center>
                                                </td>
                                                <td rowspan="3" style="width:25%">
                                                    <center><img class='stphoto1' width="130px" height="130px" alt=""
                                                            src="<?php echo base_url(); ?>images/barcode.png"></center>
                                                </td>
                                            </tr>
                                            <tr style="font-size:14px;">
                                                <td style="padding-left: 2%;">पत्ता :</td>
                                                <td><label class="s_address1"></label> </td>
                                            </tr>
                                            <tr style="font-size:14px;">
                                                <td style="padding-left: 2%;">सही :</td>
                                                <td>______________________</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">
                                                    <table
                                                        style="width: 100%; border-bottom: 2px dotted gray; padding-top:1%;">
                                                        <tr>
                                                            <td></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">&nbsp;</td>
                                            </tr>
                                            <tr style="font-size:14px;">
                                                <td style="padding-left: 2%;">२. नाव :</td>
                                                <td><label class="s_name2"></label></td>
                                                <td rowspan="3" style="width:25%">
                                                    <center><img class='sphoto2' width="130px" height="130px" alt=""
                                                            src="<?php echo base_url(); ?>images/barcode.png"></center>
                                                </td>
                                                <td rowspan="3" style="width:25%">
                                                    <center><img class='stphoto2' width="130px" height="130px" alt=""
                                                            src="<?php echo base_url(); ?>images/barcode.png"></center>
                                                </td>
                                            </tr>
                                            <tr style="font-size:14px;">
                                                <td style="padding-left: 2%;">पत्ता :</td>
                                                <td><label class="s_address2"></label> </td>
                                            </tr>
                                            <tr style="font-size:14px;">
                                                <td style="padding-left: 2%;">सही :</td>
                                                <td>______________________</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">
                                                    <table
                                                        style="width: 100%; border-bottom: 2px dotted gray;padding-top:1%;">
                                                        <tr>
                                                            <td></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">&nbsp;</td>
                                            </tr>
                                            <tr style="font-size:14px;">
                                                <td style="padding-left: 2%;">३. नाव :</td>
                                                <td><label class="s_name3"></label></td>
                                                <td rowspan="3" style="width:25%">
                                                    <center><img class='sphoto3' width="130px" height="130px" alt=""
                                                            src="<?php echo base_url(); ?>images/barcode.png"></center>
                                                </td>
                                                <td rowspan="3" style="width:25%">
                                                    <center><img class='stphoto3' width="130px" height="130px" alt=""
                                                            src="<?php echo base_url(); ?>images/barcode.png"></center>
                                                </td>
                                            </tr>
                                            <tr style="font-size:14px;">
                                                <td style="padding-left: 2%;">पत्ता :</td>
                                                <td><label class="s_address3"></label> </td>
                                            </tr>
                                            <tr style="font-size:14px;">
                                                <td style="padding-left: 2%;">सही :</td>
                                                <td>______________________</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="padding-top:80px;padding-left:15px;"><label
                                                        class="modify_date"></label></td>
                                                <td colspan="2">
                                                    <table style="float: right; margin-right: 75px; font-size:16px;">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <center><b> निबंधक </b></center>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding-top: 1%;">
                                                                    <center><b> विवाह नोंदणी अधिकारी , </b></center>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding-top: 1%;">
                                                                    <center><b> चंद्रपूर शहर महानगरपालिका. </b></center>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </center>
                            </div>
                            <!-- goswar 2 end -->
                            <!-- sample E start -->
                            <div id="divToPrintSampleE" style="display:none;">
                                <center>
                                    <!-- <div><span>Reference No : <strong>CMC</strong></span></div> -->
                                    <table frame="box" id="tbl_2" style="width:100%;margin-top:1%;border: 4px solid;">
                                        <tbody>
                                            <tr>
                                                <td style="width:20%;margin-top: -1%;padding-left: 2%;">
                                                    <table style="width:100%;">
                                                        <tbody>
														

                                                            <tr style="margin-bottom: 5%;">
                                                                <td>
                                                                    <center>
                                                                        <img src="<?php echo base_url(); ?>images/logo_new.png"
                                                                            style="float: left;padding-left: 20%;width: 100%;height:130px;">
                                                                    </center>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>&nbsp;</td>
                                                            </tr>
                                                            <tr style="margin-top:5%;">
                                                                <td>
                                                                    <center>
                                                                        <img class="hphoto"
                                                                            src="<?php echo base_url(); ?>images/cmc.jpg"
                                                                            style="float: left;padding-left: 1%;width: 65%;height:95px;border: 1px solid;">
                                                                        <div
                                                                            style="width: 45%;font-size: 14px;margin-left: -55px;">
                                                                            <br> पतीचा फोटो <br>
                                                                            Husband's Photo
                                                                        </div>
                                                                    </center>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td style="width:40%;">
                                                    <center>
                                                        <table>
                                                            <tbody>
															<tr style="text-align: center;">
                                                                <td>
                                                                    <center>
                                                                        <img src="<?php echo base_url(); ?>images/satya.jpg"
                                                                            style="width: 30%;height:75px;">
                                                                    </center>
                                                                </td>
                                                            </tr>
                                                                <tr>
                                                                    <td>
                                                                        <center><b style="font-size: 19px;">महाराष्ट्र
                                                                                शासन</b></center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <center><b style="font-size: 19px;">Government
                                                                                of Maharashtra</b></center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <center><b style="font-size: 19px;"> चंद्रपूर
                                                                                शहर महानगरपालिका </b></center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <center><b style="font-size: 19px;"> Chandrapur
                                                                                City Municipal Corporation </b></center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <center><b> नमुना "ई" </b></center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <center><b> Form “E” </b></center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <center><b> विवाह नोंदणीचे प्रमाणपत्र </b>
                                                                        </center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <center><b> Certificate of Registration of
                                                                                Marriage </b></center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <center><b> (कलम ६ (१) आणि नियम ५) </b></center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <center><b> (See Section 6 (1) and Rule 5) </b>
                                                                        </center>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </center>
                                                </td>
                                                <td style="width:20%;margin-top: -1%;padding-right: 1%;">
                                                    <table style="width:100%;">
                                                        <tbody>
														<tr style="margin-bottom: 5%;">
                                                                <td >
                                                                    <center>
                                                                        <img src="<?php echo base_url(); ?>images/cmc.jpg"
                                                                            style="float: left;padding-left: 20%;width: 70%;height:50%;margin-top: 17px;">
                                                                    </center>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>&nbsp;</td>
                                                            </tr>
                                                            <tr style="margin-top:5%;">
                                                                <td>
                                                                    <center>
                                                                        <img class="gphoto"
                                                                            src="<?php echo base_url(); ?>images/cmc.jpg"
                                                                            style="float: left;padding-left: 1%;width: 65%;height:95px;border: 1px solid;">

                                                                        <div
                                                                            style="width: 45%;font-size: 14px;margin-left: -55px;">
                                                                            <br> पत्नीचा फोटो <br>
                                                                            Wife's Photo
                                                                        </div>
                                                                    </center>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3"
                                                    style="padding-top: 1%;padding-left: 2%;padding-right: 2%;font-size:11px;">
                                                    <center>प्रमाणित करण्यात येते की, / This is to Certify that,
                                                        Marriage Between</center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-left: 5%;width:20%;font-size:11px;">पतीचे नाव </td>
                                                <td> : <label class="c_name" style="font-size:11px;"></label></td>
                                                <td style="font-size:11px;">DOB:<label class='h_dob'
                                                        style="font-size:11px;"></label></td>
                                            </tr>
                                            <tr>
                                                <td style="padding-left: 5%;width:20%;font-size:11px;">Husband’s Name
                                                </td>
                                                <td colspan="2"> : <label class="ce_name"
                                                        style="font-size:11px;"></label></td>
                                            </tr>
                                            <tr>
                                                <td style="padding-left: 5%;width:20%;font-size:11px;">राहणार </td>
                                                <td colspan="2"> : <label class="c_address"
                                                        style="font-size:11px;"></label></td>
                                            </tr>
                                            <tr>
                                                <td style="padding-left: 5%;width:20%;font-size:11px;">Residing at </td>
                                                <td colspan="2"> : <label class="ce_address"
                                                        style="font-size:11px;"></label></td>
                                            </tr>
                                            <tr>
                                                <td style="padding-left: 5%;width:20%;font-size:11px;">पत्नीचे नाव </td>
                                                <td> : <label class="g_name" style="font-size:11px;"></label></td>
                                                <td style="font-size:11px;">DOB:<label class='w_dob'
                                                        style="font-size:11px;"></label></td>
                                            </tr>
                                            <tr>
                                                <td style="padding-left: 5%;width:20%;font-size:11px;">Wife’s Name </td>
                                                <td colspan="2"> : <label class="ge_name"
                                                        style="font-size:11px;"></label></td>
                                            </tr>
                                            <tr>
                                                <td style="padding-left: 5%;width:20%;font-size:11px;">राहणार </td>
                                                <td colspan="2"> : <label class="g_address"
                                                        style="font-size:11px;"></label></td>
                                            </tr>
                                            <tr>
                                                <td style="padding-left: 5%;width:20%;font-size:11px;">Residing at </td>
                                                <td colspan="2"> : <label class="ge_address"
                                                        style="font-size:11px;"></label></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3"
                                                    style="padding-top: 1%;padding-left: 5%;padding-right: 2%;text-align: justify;font-size:11px;">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;यांचा
                                                    विवाह दिनांक <label class="m_date"></label> रोजी <label
                                                        class="m_address"></label> &nbsp; येथे संपन्न झाला. त्याची
                                                    महाराष्ट्र विवाह मंडळाचे विनियमन आणि विवाह नोंदणी विधेयक १९९८ अन्वये
                                                    ठेवण्यात आलेल्या नोंद वहीच्या खंड क्रमांक ५४ च्या अनुक्रमांक एम ए एच
                                                    एम / सी एन डी / २०१९ /<label class="mr_reg"></label> वर दिनांक
                                                    <label class='current_date_print'></label> रोजी मी नोंदणी केली आहे.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3"
                                                    style="padding-top: 1%;padding-left: 5%;padding-right: 2%;text-align: justify;font-size:11px;">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;शासनाकडील
                                                    पत्र क्रमांक एस / ३० / १००७ / ८४८ / सी आर - २८४ / एफडब्लू २ / दिनांक
                                                    २७ फेब्रुवारी - २००८ अन्वये प्रदान केलेल्या अधिकारानुसार हे
                                                    प्रमाणपत्र देण्यात येत आहे.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3"
                                                    style="padding-top: 1%;padding-left: 5%;padding-right: 2%;text-align: justify;font-size:11px;">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Solemnized
                                                    on dated <label class="m_date"></label> at <label
                                                        class="me_address"></label> (Place) is registered by me on date
                                                    <label class='current_date_print'></label> at serial No. MAHM/ CND /
                                                    2019 / <label class="mr_reg"></label> of Volume no. 54 of register
                                                    of Marriages maintained under the Maharashtra Regulation of Marriage
                                                    bureau and Registration of Marriage Act 1998.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3"
                                                    style="padding-top: 1%;padding-left: 5%;padding-right: 2%;font-size:11px;">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Certificate
                                                    issued in accordance with the power vested by the State Government
                                                    Notification No. S/30/1007/848/CR-284/FW 2/ Dated 27th February
                                                    2008.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="padding-top: 1%;padding-left: 1%;">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ठिकाण :
                                                    चंद्रपूर, जि. चंद्रपूर </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="padding-left: 1%;">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Place :
                                                    Chandrapur, Dist. Chandrapur </td>






                                            </tr>

                                            <tr>
                                                <td style="padding-left: 1%;" colspan="3">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;दिनांक:
                                                    <label class='current_date_print'></label></td>
                                                <!-- <td style="padding-left: 1%;"> </td> -->
                                            </tr>
                                            <tr>
                                                <td style="padding-left: 1%;" colspan="3">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date:<label
                                                        class='current_date_print'></label></td>
                                                <!-- <td style="padding-left: 1%;"> </td> -->
                                            </tr>
                                            <tr>
                                                <td style="padding-left: 1%;margin-left:2%;"><img
                                                        src="<?php echo base_url(); ?>images/barcode.png"
                                                        style="float: left;margin-left: 25%;width: 55%;height:35px;border: 1px solid;">
                                                </td>
                                                <td style="padding-right: 1%;text-align:right;vertical-align: bottom;"
                                                    colspan="2">Registrar of Marriage / निबंधक - विवाह नोंदणी,</td>
                                            </tr>
                                            <tr>
                                                <td style="padding-left: 1%;">
                                                    <center><b><label class="mr_receipt"></label></b></center>
                                                </td>
                                                <td style="text-align:center;"><label class='modify_date'></label></td>
                                                <td style="padding-right: 1%;text-align:center;vertical-align: bottom;font-size:10px;">चंद्रपूर शहर महानगरपालिका, चंद्रपूर </td>
                                            </tr>
                                            <!-- <tr><td colspan="3">&nbsp;</td></tr> -->
                                        </tbody>
                                    </table>
                                </center>
                            </div>
                            <!-- sample E end -->
                            <center>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;"><a class="printPage2 btn btn-primary"
                                            href="#">Print</a></font>
                                </font>
                                </button>
                            </center>
                        </div>
                    </div>
                    <!-------------end of form8----------------------------------->
                    <!----------------------form9 start------------------------------->
                    <div class="col-md-12 col-sm-12 col-xs-12 right_side" id="form9" style="display:none;">
                        <!-- START SIMPLE DATATABLE -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Upload Certificate</h3>
                                <div class="pull-right">
                                    <button class="btn btn-success closehideshow viewdetailsbtn"
                                        style="background-color:#00B050;">View Detail</button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-12">
                                    <form class="form-horizontal" id="master_form9" name="master_form">
                                        <input type="hidden" id="id_upload" value="">
                                        <div class="table-responsive" id="show_master">
                                            <table id="dataTable" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>अ. क्र.</th>
                                                        <th>प्रमाणपत्राचे नाव</th>
                                                        <th>अपलोड करा</th>
                                                        <th>शेरा</th>
                                                        <th>जमा केलेले कागदपत्र</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="issuetbody">
                                                    <tr>
                                                        <td>१.</td>
                                                        <td>आदेश पत्र</td>
                                                        <td><input type="file" id="attachment9_1" name="attachment9_1"
                                                                accept="*" style="padding:0px;border:0;">
                                                            <input type="hidden" id="file_attachother9_1"
                                                                class="file_attachother9_1" value="" />
                                                            <div id="msg9_1" class="msg9_1"></div>
                                                        </td>
                                                        <td><input type="text" class="form-control" id="order_latter"
                                                                name="order_latter" placeholder="आदेश पत्र" required>
                                                        </td>
                                                        <td id="download1"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>२.</td>
                                                        <td>नमुना ई (मराठी)</td>
                                                        <td><input type="file" id="attachment9_2" name="attachment9_2"
                                                                accept="*" style="padding:0px;border:0;">
                                                            <input type="hidden" id="file_attachother9_2"
                                                                class="file_attachother9_2" value="" />
                                                            <div id="msg9_2" class="msg9_2"></div>
                                                        </td>
                                                        <td><input type="text" class="form-control"
                                                                id="sample_e_marathi" name="sample_e_marathi"
                                                                placeholder="नमुना ई (मराठी)" required></td>
                                                        <td id="download2"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>३.</td>
                                                        <td>नमुना ई (इंग्रजी)</td>
                                                        <td><input type="file" id="attachment9_3" name="attachment9_3"
                                                                accept="*" style="padding:0px;border:0;">
                                                            <input type="hidden" id="file_attachother9_3"
                                                                class="file_attachother9_3" value="" />
                                                            <div id="msg9_3" class="msg9_3"></div>
                                                        </td>
                                                        <td><input type="text" class="form-control"
                                                                id="sample_e_english" name="sample_e_english"
                                                                placeholder="नमुना ई (इंग्रजी)" required></td>
                                                        <td id="download3"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>४.</td>
                                                        <td>गोषवारा भाग १</td>
                                                        <td><input type="file" id="attachment9_4" name="attachment9_4"
                                                                accept="*" style="padding:0px;border:0;">
                                                            <input type="hidden" id="file_attachother9_4"
                                                                class="file_attachother9_4" value="" />
                                                            <div id="msg9_4" class="msg9_4"></div>
                                                        </td>
                                                        <td><input type="text" class="form-control" id="abstract_1"
                                                                name="abstract_1" placeholder="गोषवारा भाग १" required>
                                                        </td>
                                                        <td id="download4"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>५.</td>
                                                        <td>गोषवारा भाग २</td>
                                                        <td><input type="file" id="attachment9_5" name="attachment9_5"
                                                                accept="*" style="padding:0px;border:0;">
                                                            <input type="hidden" id="file_attachother9_5"
                                                                class="file_attachother9_5" value="" />
                                                            <div id="msg9_5" class="msg9_5"></div>
                                                        </td>
                                                        <td><input type="text" class="form-control" id="abstract_2"
                                                                name="abstract_2" placeholder="गोषवारा भाग २" required>
                                                        </td>
                                                        <td id="download5"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                </div>
                            </div>
                            <div class="btn-group pull-left">
                                <input type="hidden" id="ref_id_upload" value="">
                                <button class="btn btn-primary" type="submit">Save</button>
                                </form>
                            </div>
                        </div>
                        <!--panel panel default-->
                        <!-- END SIMPLE DATATABLE -->
                    </div>
                    <!---form9 end---->
                    <!-----form9 end------------------------->
                    <!------------------------------------form 10-------------------------------------------->
                    <!------------------------------------form 10 start-------------------------------------------->
                    <div class="col-md-12 col-sm-12 col-xs-12 right_side" id="form10" style="display:none;">
                        <!-- START SIMPLE DATATABLE -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Cash Counter Receipt Voucher</h3>
                                <div class="pull-right">
                                    <button class="btn btn-success closehideshow viewdetailsbtn"
                                        style="background-color:#00B050;">Back</button>
                                </div>
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
                                                        placeholder="Name" required>
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
                                                        placeholder="Reason" required>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label>No of Copies*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="number" style="text-align:right;" id="no_copies"
                                                        name="no_copies" class="form-control" placeholder="No of Copies"
                                                        required>
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
                                                        placeholder="Payable Amount" required>
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
                                        action="<?php echo base_url('Marrige/cash_counter_reciept_voucher'); ?>"
                                        target="_blank"></form>
                                </div>
                            </div>
                            <div class="row">
                                <br />
                                <br />
                                <!--start extra receipt table-->
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
                                                <th class="not-export-column">
                                                    <font style="font-weight:bold">Action</font>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody_extra"></tbody>
                                    </table>
                                </div>
                                <!--end extra receipt table-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--panel panel default-->
                <!-- END SIMPLE DATATABLE -->
            </div>
            <!---------------------------------form 10 end--------------------------------------------->
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
    <script src="<?php echo base_url(); ?>assets/js/myjs/marriage.js"></script>
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
    // alert(date);
    //alert($("#receipt_date").val(date));
    $('.date').datepicker({
        'todayHighlight': true,
        format: 'dd/mm/yyyy',
        autoclose: true,
    });
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
        //   var lang = $('#language').val();
        //   console.log('lang '+lang);
        //   var divToPrint = '';
        //   if(lang=='english')
        // 	divToPrint = document.getElementById("divToPrint3");
        // else
        // 	divToPrint = document.getElementById("divToPrint2");
        var divToPrint = '';
        var certi = $('#c_certificate').val();
        if (certi == '1') {
            divToPrint = document.getElementById("divToPrint2");
        } else if (certi == '2') {
            divToPrint = document.getElementById("divToPrintGoswar1");
        } else if (certi == '3') {
            divToPrint = document.getElementById("divToPrintGoswar2");
        } else if (certi == '4') {
            divToPrint = document.getElementById("divToPrintSampleE");
        }
        console.log(divToPrint);
        newWin = window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    });
    $('#c_certificate').change(function() {
        var certi = $('#c_certificate').val();
        $("#divToPrint2").hide();
        $("#divToPrintGoswar1").hide();
        $("#divToPrintGoswar2").hide();
        $("#divToPrintSampleE").hide();
        if (certi == '1') {
            $("#divToPrint2").show();
        } else if (certi == '2') {
            $("#divToPrintGoswar1").show();
        } else if (certi == '3') {
            $("#divToPrintGoswar2").show();
        } else if (certi == '4') {
            $("#divToPrintSampleE").show();
        }
    });
    </script>
</body>

</html>
