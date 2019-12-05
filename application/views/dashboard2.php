<?php include('include/header.php');  ?>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.css">

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
                <li class="active">Dashboard </li>
            </ul>
            <style>
            body {
                padding-top: 0;
                font-size: 12px;
                color: #111927;
                background: #f9f9f9;
                font-family: "Open Sans", sans-serif;
            }

            .bg-danger {
                background-color: #fc8675 !important;
                color: #fff !important;
            }

            .panel-stat3 {
                position: relative;
                overflow: hidden;
                padding: 25px 20px;
                margin-bottom: 20px;
                color: #fff;
                cursor: pointer;
                border-radius: 10px;
                -moz-border-radius: 10px;
                -webkit-border-radius: 10px;
            }

            .bg-danger {
                background-color: #f2dede;
            }

            .bg-warning {
                background-color: #f3ce85;
                color: #fff;
            }

            .m-top-none {
                margin-top: 0;
            }

            .padding-md {
                padding: 35px !important;
                margin: 10px;
            }

            .panel-stat3 .stat-icon {
                position: absolute;
                top: 20px;
                right: 10px;
                font-size: 30px;
                opacity: 0.3;
            }

            .fa-3x {
                font-size: 5em;
            }
            </style>
            <!-- END BREADCRUMB -->
            <!-- PAGE CONTENT WRAPPER -->
            <div class="page-content-wrap">
                <?php if ($this->session->role == "staff") { ?>
                <!--NEWS SECTION-->
                <div class="padding-md col-md-12">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="panel-stat3 bg-danger">
                                <?php if ($this->session->department_code == "01") { ?>
                                <h2 class="m-top-none" id="userCount">
                                    <?php echo $data['property_today_cnt']; ?>/<?php echo $data['property_overall_cnt']; ?>
                                </h2>
                                <?php	}
										if ($this->session->department_code == "02") { ?>
                                <h2 class="m-top-none" id="userCount">
                                    <?php echo $data['inher_today_cnt']; ?>/<?php echo $data['inher__overall_cnt']; ?>
                                </h2>
                                <?php	}
										if ($this->session->department_code == "03") { ?>
                                <h2 class="m-top-none" id="userCount">
                                    <?php echo $data['ffn_today_cnt']; ?>/<?php echo $data['ffn__overall_cnt']; ?></h2>
                                <?php	}
										if ($this->session->department_code == "04") { ?>
                                <h2 class="m-top-none" id="userCount">
                                    <?php echo $data['occ_today_cnt']; ?>/<?php echo $data['occ__overall_cnt']; ?></h2>
                                <?php	}
										if ($this->session->department_code == "05") { ?>
                                <h2 class="m-top-none" id="userCount">
                                    <?php echo $data['part_today_cnt']; ?>/<?php echo $data['part__overall_cnt']; ?>
                                </h2>
                                <?php	}
										if ($this->session->department_code == "06") { ?>
                                <h2 class="m-top-none" id="userCount">
                                    <?php echo $data['zone_today_cnt']; ?>/<?php echo $data['zone__overall_cnt']; ?>
                                </h2>
                                <?php	}
										if ($this->session->department_code == "07") { ?>
                                <h2 class="m-top-none" id="userCount">
                                    <?php echo $data['construction_today_cnt']; ?>/<?php echo $data['construction__overall_cnt']; ?>
                                </h2>
                                <?php	}
										if ($this->session->department_code == "08") { ?>
                                <h2 class="m-top-none" id="userCount">
                                    <?php echo $data['plant_today_cnt']; ?>/<?php echo $data['plant__overall_cnt']; ?>
                                </h2>
                                <?php	}
										if ($this->session->department_code == "09") { ?>
                                <h2 class="m-top-none" id="userCount">
                                    <?php echo $data['ff_today_cnt']; ?>/<?php echo $data['ff__overall_cnt']; ?></h2>
                                <?php	}
										if ($this->session->department_code == "10") { ?>
                                <h2 class="m-top-none" id="userCount">
                                    <?php echo $data['outstanding_today_cnt']; ?>/<?php echo $data['outstanding__overall_cnt']; ?>
                                </h2>
                                <?php	}
										if ($this->session->department_code == "11") { ?>
                                <h2 class="m-top-none" id="userCount">
                                    <?php echo $data['noc_today_cnt']; ?>/<?php echo $data['noc__overall_cnt']; ?></h2>
                                <?php	}
										if ($this->session->department_code == "12") { ?>
                                <h2 class="m-top-none" id="userCount">
                                    <?php echo $data['res_today_cnt']; ?>/<?php echo $data['res__overall_cnt']; ?></h2>
                                <?php	}
										if ($this->session->department_code == "13") { ?>
                                <h2 class="m-top-none" id="userCount">0/0</h2>
                                <?php	}
										if ($this->session->department_code == "14") { ?>
                                <h2 class="m-top-none" id="userCount">
                                    <?php echo $data['birth_today_cnt']; ?>/<?php echo $data['birth__overall_cnt']; ?>
                                </h2>
                                <?php	}
										if ($this->session->department_code == "15") { ?>
                                <h2 class="m-top-none" id="userCount">
                                    <?php echo $data['marr_today_cnt']; ?>/<?php echo $data['marr__overall_cnt']; ?>
                                </h2>
                                <?php	}
										if ($this->session->department_code == "16") { ?>
                                <h2 class="m-top-none" id="userCount">
                                    <?php echo $data['cash_counter_today_amt']; ?>/<?php echo $data['cash_counter_overall_amt']; ?>
                                </h2>
                                <h5>Cash Counter Income</h5>
                                <div class="stat-icon">
                                    <i class="fa fa-inr fa-3x"></i>
                                </div>
                                <?php	}
										?>
                                <?php if ($this->session->department_code != "16") { ?>
                                <h5>Registration Count</h5>
                                <div class="stat-icon">
                                    <i class="fa fa-registered fa-3x"></i>
                                </div>
                                <?php } ?>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-sm-12 col-md-6">
                            <div class="panel-stat3 bg-info">
                                <?php if ($this->session->department_code == "01") { ?>
                                <h2 class="m-top-none" id="userCount">
                                    <?php echo $data['pro_today_amt']; ?>/<?php echo $data['pro_overall_amt']; ?>
                                </h2>
                                <?php	}
										if ($this->session->department_code == "02") { ?>
                                <h2 class="m-top-none" id="userCount">
                                    <?php echo $data['inh_today_amt']; ?>/<?php echo $data['inh_overall_amt']; ?>
                                </h2>
                                <?php	}
										if ($this->session->department_code == "03") { ?>
                                <h2 class="m-top-none" id="userCount">
                                    <?php echo $data['ffn_today_amt']; ?>/<?php echo $data['ffn_overall_amt']; ?>
                                    <?php	}
											if ($this->session->department_code == "04") { ?>
                                    <h2 class="m-top-none" id="userCount">
                                        <?php echo $data['occ_today_amt']; ?>/<?php echo $data['occ_overall_amt']; ?>
                                        <?php	}
												if ($this->session->department_code == "05") { ?>
                                        <h2 class="m-top-none" id="userCount">
                                            <?php echo $data['part_today_amt']; ?>/<?php echo $data['part_overall_amt']; ?>
                                        </h2>
                                        <?php	}
												if ($this->session->department_code == "06") { ?>
                                        <h2 class="m-top-none" id="userCount">
                                            <?php echo $data['zone_today_amt']; ?>/<?php echo $data['zone_overall_amt']; ?>
                                        </h2>
                                        <?php	}
												if ($this->session->department_code == "07") { ?>
                                        <h2 class="m-top-none" id="userCount">
                                            <?php echo $data['const_today_amt']; ?>/<?php echo $data['const_overall_amt']; ?>
                                        </h2>
                                        <?php	}
												if ($this->session->department_code == "08") { ?>
                                        <h2 class="m-top-none" id="userCount">
                                            <?php echo $data['plant_today_amt']; ?>/<?php echo $data['plant_overall_amt']; ?>
                                        </h2>
                                        <?php	}
												if ($this->session->department_code == "09") { ?>
                                        <h2 class="m-top-none" id="userCount">
                                            <?php echo $data['ff_today_amt']; ?>/<?php echo $data['ff_overall_amt']; ?>
                                        </h2>
                                        <?php	}
												if ($this->session->department_code == "10") { ?>
                                        <h2 class="m-top-none" id="userCount">
                                            <?php echo $data['out_today_amt']; ?>/<?php echo $data['out_overall_amt']; ?>
                                        </h2>
                                        <?php	}
												if ($this->session->department_code == "11") { ?>
                                        <h2 class="m-top-none" id="userCount">
                                            <?php echo $data['noc_today_amt']; ?>/<?php echo $data['noc_overall_amt']; ?>
                                        </h2>
                                        <?php	}
												if ($this->session->department_code == "12") { ?>
                                        <h2 class="m-top-none" id="userCount">
                                            <?php echo $data['res_today_amt']; ?>/<?php echo $data['res_overall_amt']; ?>
                                        </h2>
                                        <?php	}
												if ($this->session->department_code == "13") { ?>
                                        <h2 class="m-top-none" id="userCount">0/0</h2>
                                        <?php	}
												if ($this->session->department_code == "14") { ?>
                                        <h2 class="m-top-none" id="userCount">
                                            <?php echo $data['birth_today_amt']; ?>/<?php echo $data['birth_overall_amt']; ?>
                                        </h2>
                                        <?php	}
												if ($this->session->department_code == "15") { ?>
                                        <h2 class="m-top-none" id="userCount">
                                            <?php echo $data['marr_today_amt']; ?>/<?php echo $data['marr_overall_amt']; ?>
                                        </h2>
                                        <?php	}
												if ($this->session->department_code == "16") { ?>
                                        <h2 class="m-top-none" id="userCount">
                                            <?php echo $data['mis_cash_counter_today_amt']; ?>/<?php echo $data['mis_counter_overall_amt']; ?>
                                        </h2>
                                        <h5>Miscellaneous Cash Counter Income</h5>
                                        <div class="stat-icon">
                                            <i class="fa fa-inr fa-3x"></i>
                                        </div>
                                        <?php	}
												?>
                                        <?php if ($this->session->department_code != "16") { ?>
                                        <h5>Income Count</h5>
                                        <div class="stat-icon">
                                            <i class="fa fa-inr fa-3x"></i>
                                        </div>
                                        <?php } ?>
                            </div>
                        </div><!-- /.col -->
                    </div>
                </div>
                <div class="padding-md col-md-12">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <!-- START SIMPLE DATATABLE -->
                            <div class=" panel panel-default">
                                <div class="panel-heading">
                                    <?php if ($this->session->department_code == "16") { ?>
                                    <h3 class="panel-title">Cash Counter Details</h3>
                                    <?php } else { ?>
                                    <h3 class="panel-title">Registration Details</h3>
                                    <?php } ?>
                                    <ul class="panel-controls">
                                        <li>
                                            <!--<button class="btn btn-success btnhideshow"
                              style="background-color:#00B050;"> Add </button></li> -->
                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <div class="col-lg-12 ">
                                        <div class="table-responsive" id="department_wise">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END SIMPLE DATATABLE -->
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <!-- START SIMPLE DATATABLE -->
                            <div class=" panel panel-default">
                                <div class="panel-heading">
                                    <?php if ($this->session->department_code == "16") { ?>
                                    <h3 class="panel-title">Miscellaneous Cash Counter Details</h3>
                                    <?php } else { ?>
                                    <h3 class="panel-title">Payment Details</h3>
                                    <?php } ?>

                                    <ul class="panel-controls">
                                        <li>
                                            <!--<button class="btn btn-success btnhideshow"
                              style="background-color:#00B050;"> Add </button></li> -->
                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <div class="col-lg-12 ">
                                        <div class="table-responsive" id="department_wise_right">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END SIMPLE DATATABLE -->
                        </div>



                    </div>
                </div>

                <!--NEWS SECTION END-->
                <?php } else { ?>
                <div class="row">
                </div>
                <?php } ?>
            </div>
            <!-- END PAGE CONTENT WRAPPER -->
        </div>
        <!-- END PAGE CONTENT -->
    </div>
    <!-- END PAGE CONTAINER -->
    <!- - MESSAGE BOX-->
        <?php include('include/message_box.php');  ?>
        <!-- END MESSAGE BOX-->
        <!-- START SCRIPTS -->
        <?php include('include/footer_scripts.php');  ?>
        <!-- END SCRIPTS -->
        <script type='text/javascript'>
        $(document).ready(function() {
            $("#table1").dataTable();
            $("#table2").dataTable();
        });
        </script>
</body>

</html>
