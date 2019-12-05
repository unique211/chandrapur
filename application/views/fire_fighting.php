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
                <li class="active">Fire Fighting</li>

            </ul>
            <!-- END BREADCRUMB -->

            <!-- PAGE CONTENT WRAPPER -->
            <div class="page-content-wrap">
                <!--NEWS SECTION-->

                <div class="row  tablehideshow">
                    <div class="col-md-12 col-sm-12 col-xs-12 right_side">
                        <!-- START SIMPLE DATATABLE -->

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Code Id : 09 Fire Fighting</h3>

                                <ul class="panel-controls">

                                    <li> <button class="btn btn-success btnhideshow" style="background-color:#00B050;">
                                            Add Fire Fighting Detail</button></li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <?php

								if ($this->session->role == "staff" || $this->session->role == "admin") {
									?>
                                <div class="col-lg-12 ">
									   <form action="" name="filter_form" id="filter_form">
                                    <div class="col-md-1">
                                        <label class="control-label"> Zone</label>
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-control zone" style="width:100%;" name="zone_filter"
                                            id="zone_filter" required>
                                            <option selected value="All">All</option>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <label class="control-label">Sub Zone</label>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" style="width:100%;" name="subzone_filter"
                                            id="subzone_filter" required>
                                            <option selected value="All">All</option>


                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <label class="control-label">Staff</label>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control " style="width:100%;" name="staff_filter"
                                            id="staff_filter" required>
                                            <option selected value="All">All</option>


                                        </select>


                                    </div>
                                    <div class="col-md-1">
                                       <button type="submit" class="btn btn-warning">Filter</button>
                                        <br><br>
									</div>
									 </form>
                                </div>
                                <?php
								}
								?>
                                <div class="col-lg-12 ">
                                    <div class="table-responsive" id="show_master">

                                    </div>
                                </div>
                                <!-- The Modal -->
                                <div class="modal fade" id="myModal2">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Upload Document</h4>

                                            </div>
                                            <form id="upload_form" name="upload_form">
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <label>Document</label><br>
                                                    <input type="hidden" id="this_id" value="">
                                                    <input type="hidden" id="unique_id" value="">
                                                    <input type="file" id="attachment2" name="attachment2" accept="*"
                                                        style="padding:0px;border:0;">
                                                    <input type="hidden" id="file_attachother2"
                                                        class="file_attachother2" value="" />
                                                    <div id="msg2" class="msg2"></div>
                                                </div> <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"
                                                        id="close_model2">Close</button>
                                                    <input type="submit" class="btn btn-success">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END SIMPLE DATATABLE -->
                    </div>
                </div>
                <!--NEWS SECTION END-->

                <!-- strat notification -->
                <div class="row formhideshow" style="display:none">
                    <div class="col-md-12 col-sm-12 col-xs-12 right_side">
                        <!-- START SIMPLE DATATABLE -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Code Id : 09 Fire Fighting</h3>
                                <div class="pull-right">
                                    <button class="btn btn-success closehideshow" style="background-color:#00B050;">View
                                        Fire Fighting Detail</button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <!-- <div class="fire_fight_print" id="fire_fight_print"> -->
                                    <div class="row" style="height:100px;">
                                        <div class="col-sm-4">
                                            <center>
                                                <img src="<?php echo base_url(); ?>images/cmc.jpg"
                                                    style="float: left;padding-left: 20%;width: 40%;height:85px;">
                                            </center>
                                        </div>
                                        <div class="col-sm-8" style="text-align:left;padding-top:3%;">
                                            <h2><b>चंद्रपूर शहर महानगरपालिका, चंद्रपूर</b></h2>

                                        </div>

                                    </div>
                                    <br></br>
                                    <div class="row">
                                        <div class="col-sm-5 text_notes">क्रमांक:चंशमनपा/अग्निशमन विभाग<label
                                                class="kramank_no"></label></div>
                                        <div class="col-sm-5 text_notes" style="text-align:right;">
                                            <div class="form-group">
                                                दिनांक:<label class="certi_dt"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="width:100%;background-color:#000;height:1px;">
                                    <section class="fire_fight" id="marathi" style="vertical-align:center;">
                                        <form class="form-horizontal" id="master_form" name="master_form">

                                            <div class="row">
                                                <div class="col-sm-1">
                                                </div>
                                                <div class="col-sm-10" style="text-align:center;">
                                                    <!-- <h4 id="0">चंद्रपूर शहर महानगरपालिका</h4> -->
                                                    <h4><b>अग्निशमन ना-हरकत प्रमाणपत्र</b></h4>
                                                    <!-- <h6 id="3">कार्यालय : चंद्रपूर शहर महानगरपालिका , चंद्रपूर , तालुका : चंद्रपूर , जिल्हा : चंद्रपूर , फोन नं. : 0</h6> -->

                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 text_notes" style="margin-left:1%;">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;प्रमाणपत्र देण्यात येते
                                                    की, अग्निसुरक्षा कायद्याचे परीक्षण करण्याकरीता संचालक महाराष्ट्र
                                                    अग्निशमन सेवा, मुंबई यांनी निश्चित केलेल्या एजन्सी यांनी महाराष्ट्र
                                                    आग प्रतिबंधक व जीवसरंक्षक उपाययोजना अधिनियम २००६ अंतर्गत, खाली नमूद
                                                    व्यावसायिक ठिकाणातील अग्निसुरक्षा व्यवस्थेचे परीक्षण (फायर सेफ्टी
                                                    ऑडिट) व आग प्रतिबंधक उपाययोजनेची तपासणी दिनांक <label
                                                        class="certi_dt">23/07/2019</label> रोजी केली. त्यांनी
                                                    खालीलप्रमाणे अग्निप्रतिबंधक उपाययोजना अस्तित्वात असल्याचे प्रमाणित
                                                    केले आहे.
                                                </div>

                                            </div>
                                            &nbsp;
                                            <div class="row">

                                                <div class="col-sm-3 text_notes" style="margin-left:1%;">
                                                    व्यवसायाचे नाव :
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" name="business_name" id="business_name"
                                                        placeholder="व्यवसायाचे नाव" class="form-control" required />
                                                </div>
                                            </div><br>
                                            <div class="row">

                                                <div class="col-sm-3 text_notes" style="margin-left:1%;">
                                                    ठिकाण :
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" name="address" id="address" placeholder="ठिकाण"
                                                        class="form-control" required />
                                                </div>
                                            </div>

                                            <br>
                                            <div class="row">

                                                <div class="col-sm-3 text_notes" style="margin-left:1%;">
                                                    उपाययोजनेचे विवरण :
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" name="details_solution" id="details_solution"
                                                        placeholder="उपाययोजनेचे विवरण" class="form-control" required />
                                                </div>
                                            </div>

                                            <br>
                                            <div class="row">

                                                <div class="col-sm-3 text_notes" style="margin-left:1%;">
                                                    परीक्षण एजन्सी :
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" name="testing_agency" id="testing_agency"
                                                        placeholder="परीक्षण एजन्सी" class="form-control" required />
                                                </div>
                                            </div>

                                            <br>
                                            <div class="row">

                                                <div class="col-sm-3 text_notes" style="margin-left:1%;">
                                                    एजन्सीचे लायसन्स क्रं. :
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" name="agency_license_no" id="agency_license_no"
                                                        placeholder="एजन्सीचे लायसन्स क्रं" class="form-control"
                                                        required />
                                                </div>
                                            </div>

                                            <br>
                                            <div class="row">
                                                <div class="col-sm-12 text_notes" style="margin-left:1%;">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;सदर प्रमाणपत्र दिनांक १
                                                    जानेवारी/ १ जुलै २०____ पासून सहा महिन्यापर्यंत वैध असेल. अग्निशमन
                                                    प्रतिबंधक उपाययोजनेची तपासणी दर सहा महिन्यात (जानेवारी/जुलै)
                                                    चंद्रपूर शहर महानगरपालिका ने निश्चित केलेल्या एजन्सीकडून करवून घेणे
                                                    व्यावसायिकांना बंधनकारक आहे.
                                                </div>

                                            </div><br>
                                            <div class="row">
                                                <div class="col-sm-12 text_notes" style="margin-left:1%;">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;सदर प्रमाणपत्र यापुढे
                                                    नूतनीकरण करतेवेळी चंद्रपूर शहर महानगरपालिका चा कर विभागाकडून चालू
                                                    वर्षाचा कर भरणा केल्याची कर पावती जोडणे बंधनकारक असेल.
                                                </div>

                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-sm-9"></div>
                                                <div class="col-sm-3 text_notes" style="text-align:center;">
                                                    ऊपायुक्त
                                                </div>

                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-sm-9"></div>
                                                <div class="col-sm-3 text_notes" style="text-align:center;">
                                                    चंद्रपूर शहर महानगरपालिका, चंद्रपूर
                                                </div>

                                            </div>
                                            <!-- </div> -->
                                            <br>
                                            <div class="row center">
                                                <div class="col-sm-3"></div>
                                                <div class="col-sm-3">
                                                    <div class="btn-group " style="float:right;">
                                                        <input type="hidden" id="save_update" value="">
                                                        <button class="btn btn-primary" id="submit"
                                                            type="submit">Save</button>
                                                        &nbsp;&nbsp;
                                                        <?php if($this->session->role == "user"){?>
                                                        <button class="btn btn-success" form="payment" id="pay"
                                                            name="pay" value="Fire_Fighting" type="submit">Pay
                                                            Online</button>
                                                        <input type="hidden" form="payment" name="ref_id" id="ref_id"
                                                            value="">
                                                        <?php }?>
                                                    </div>
                                                </div>
                                        </form>
                                        <form name="payment" id="payment" method="POST"
                                            action="<?php echo base_url('Payment/online_payment');?>"></form>
                                        <div class="col-sm-6" style="margin-left:-1%;">
                                            <button class="btn btn-primary" type="button" id="btnapprove"
                                                name="btnapprove" style="display:none" value="">Approve</button>
                                            <button class="btn btn-primary" type="button" id="btnreject"
                                                name="btnreject" style="display:none" value="" data-toggle="modal"
                                                data-target="#myModal">Reject</button>
                                            <!-- <form name="firefight" id="firefight" method="POST" action="<?php echo base_url('Fire_fight/print_fire'); ?>" target="_blank"></form>
                                                       <button class="btn btn-primary" type="submit" form="firefight" id="btnprint" name="btnprint" value="">Print</button> -->
                                            <!--<a class="printPage btn btn-primary" href="#">Print</a>-->
                                            <button class="btn btn-primary" type="submit" id="btnprint2"
                                                form="property2" name="btnprint2" value="">Print </button>
                                            <form name="property2" id="property2" method="POST"
                                                action="<?php echo base_url('Fire_fight/print_fire'); ?>"
                                                target="_blank"></form>
                                        </div>

                                </div>
                                </section>

                                <!-- The Modal -->
                                <div class="modal fade" id="myModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Reject</h4>

                                            </div>
                                            <form id="reject_form" name="reject_form">
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <label>Remark</label><br>
                                                    <input name="reject_remark" type="text" class="form-control"
                                                        id="reject_remark" placeholder="Remarks" value="" required>
                                                </div> <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"
                                                        id="close_model">Close</button>
                                                    <input type="submit" class="btn btn-success">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>



                                <!-- </form> -->
                            </div>
                        </div>
                    </div>
                    <!-- END SIMPLE DATATABLE -->
                </div>
            </div>
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
    var user_id = "<?php echo $this->session->userid; ?>";
    var role = "<?php echo $this->session->role; ?>";
    </script>
    <script src="<?php echo base_url(); ?>assets/js/myjs/fire_fighting.js"></script>
    <!--fileupload Files -->
    <script src="<?php echo base_url() . 'assets/js/AjaxFileUpload.js' ?>"></script>

    <script>
    $('.date').datepicker({
        'todayHighlight': true,
        format: 'dd/mm/yyyy',
        autoclose: true,
    });

    var date = new Date();
    date = date.toString('DD/MM/YYYY');
    $(".date").val(date);
    //  $("#fdate").val(date);
    </script>
</body>

</html>