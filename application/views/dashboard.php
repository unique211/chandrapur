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
                color: #777;
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
                padding: 30px !important;
                margin: 5px;
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
                <?php if ($this->session->role == "admin") {

					$all_over_today_register = 0;
					$all_over_all_register = 0;
					$all_over_today_income = 0;
					$all_over_all_income = 0;


					$all_over_today_register = floatval($data['property_today_cnt'] + $data['inher_today_cnt'] + $data['ffn_today_cnt'] + $data['occ_today_cnt'] + $data['part_today_cnt'] + $data['zone_today_cnt'] + $data['construction_today_cnt'] + $data['plant_today_cnt'] + $data['ff_today_cnt'] + $data['outstanding_today_cnt'] + $data['noc_today_cnt'] + $data['res_today_cnt'] + $data['birth_today_cnt'] + $data['marr_today_cnt']);



					$all_over_all_register = floatval($data['property_overall_cnt'] + $data['inher__overall_cnt'] + $data['ffn__overall_cnt'] + $data['occ__overall_cnt'] + $data['part__overall_cnt'] + $data['zone__overall_cnt'] + $data['construction__overall_cnt'] + $data['plant__overall_cnt'] + $data['ff__overall_cnt'] + $data['outstanding__overall_cnt'] + $data['noc__overall_cnt'] + $data['res__overall_cnt'] + $data['birth__overall_cnt'] + $data['marr__overall_cnt']);


					$all_over_today_income = floatval($data['pro_today_amt'] + $data['inh_today_amt'] + $data['ffn_today_amt'] + $data['occ_today_amt'] + $data['part_today_amt'] + $data['zone_today_amt'] + $data['const_today_amt'] + $data['plant_today_amt'] + $data['ff_today_amt'] + $data['out_today_amt'] + $data['noc_today_amt'] + $data['res_today_amt'] + $data['birth_today_amt'] + $data['marr_today_amt']);

					$all_over_all_income = floatval($data['pro_overall_amt'] + $data['inh_overall_amt'] + $data['ffn_overall_amt'] + $data['occ_overall_amt'] + $data['part_overall_amt'] + $data['zone_overall_amt'] + $data['const_overall_amt'] + $data['plant_overall_amt'] + $data['ff_overall_amt'] + $data['out_overall_amt'] + $data['noc_overall_amt'] + $data['res_overall_amt'] + $data['birth_overall_amt'] + $data['marr_overall_amt']);

					if ($all_over_today_register == 0) {
						$property_today_cnt = 0;
						$inher_today_cnt = 0;
						$ffn_today_cnt = 0;
						$occ_today_cnt = 0;
						$part_today_cnt = 0;
						$zone_today_cnt = 0;
						$construction_today_cnt = 0;
						$plant_today_cnt = 0;
						$ff_today_cnt = 0;
						$outstanding_today_cnt = 0;
						$noc_today_cnt = 0;
						$res_today_cnt = 0;
						$birth_today_cnt = 0;
						$marr_today_cnt = 0;
					} else {

						// if ($data['property_today_cnt'] == 0) {
						// 	$inher_today_cnt = 1;
						// }
						$property_today_cnt = floatval($data['property_today_cnt']) * floatval(100) / floatval($all_over_today_register);



						// if ($data['inher_today_cnt'] == 0) {
						// 	$inher_today_cnt = 1;
						// }
						$inher_today_cnt = floatval($data['inher_today_cnt']) * floatval(100) / floatval($all_over_today_register);

						// if ($data['ffn_today_cnt'] == 0) {
						// 	$ffn_today_cnt = 1;
						// }
						$ffn_today_cnt = floatval($data['ffn_today_cnt']) * floatval(100) / floatval($all_over_today_register);

						// if ($data['occ_today_cnt'] == 0) {
						// 	$occ_today_cnt = 1;
						// }
						$occ_today_cnt = floatval($data['occ_today_cnt']) * floatval(100) / floatval($all_over_today_register);

						// if ($data['part_today_cnt'] == 0) {
						// 	$part_today_cnt = 1;
						// }
						$part_today_cnt = floatval($data['part_today_cnt']) * floatval(100) / floatval($all_over_today_register);

						// if ($data['zone_today_cnt'] == 0) {
						// 	$zone_today_cnt = 1;
						// }
						$zone_today_cnt = floatval($data['zone_today_cnt']) * floatval(100) / floatval($all_over_today_register);

						// if ($data['construction_today_cnt'] == 0) {
						// 	$construction_today_cnt = 1;
						// }

						$construction_today_cnt = floatval($data['construction_today_cnt']) * floatval(100) / floatval($all_over_today_register);

						// if ($data['plant_today_cnt'] == 0) {
						// 	$plant_today_cnt = 1;
						// }

						$plant_today_cnt = floatval($data['plant_today_cnt']) * floatval(100) / floatval($all_over_today_register);

						// if ($data['ff_today_cnt'] == 0) {
						// 	$ff_today_cnt = 1;
						// }

						$ff_today_cnt = floatval($data['ff_today_cnt']) * floatval(100) / floatval($all_over_today_register);

						// if ($data['outstanding_today_cnt'] == 0) {
						// 	$outstanding_today_cnt = 1;
						// }

						$outstanding_today_cnt = floatval($data['outstanding_today_cnt']) * floatval(100) / floatval($all_over_today_register);

						// if ($data['noc_today_cnt'] == 0) {
						// 	$noc_today_cnt = 1;
						// }

						$noc_today_cnt = floatval($data['noc_today_cnt']) * floatval(100) / floatval($all_over_today_register);

						// if ($data['res_today_cnt'] == 0) {
						// 	$res_today_cnt = 1;
						// }

						$res_today_cnt = floatval($data['res_today_cnt']) * floatval(100) / floatval($all_over_today_register);

						// if ($data['birth_today_cnt'] == 0) {
						// 	$birth_today_cnt = 1;
						// }

						$birth_today_cnt = floatval($data['birth_today_cnt']) * floatval(100) / floatval($all_over_today_register);

						// if ($data['marr_today_cnt'] == 0) {
						// 	$marr_today_cnt = 1;
						// }

						$marr_today_cnt = floatval($data['marr_today_cnt']) * floatval(100) / floatval($all_over_today_register);
					}


					if ($all_over_today_income == 0) {
						$pro_today_amt = 0;
						$inh_today_amt = 0;
						$ffn_today_amt = 0;
						$occ_today_amt = 0;
						$part_today_amt = 0;
						$zone_today_amt = 0;
						$const_today_amt = 0;
						$plant_today_amt = 0;
						$ff_today_amt = 0;
						$out_today_amt = 0;
						$noc_today_amt = 0;
						$res_today_amt = 0;
						$birth_today_amt = 0;
						$marr_today_amt = 0;
					} else {
						// if ($data['property_today_cnt'] == 0) {
						// 	$inher_today_cnt = 1;
						// }
						$pro_today_amt = floatval($data['pro_today_amt']) * floatval(100) / floatval($all_over_today_income);



						// if ($data['inher_today_cnt'] == 0) {
						// 	$inher_today_cnt = 1;
						// }
						$inh_today_amt = floatval($data['inh_today_amt']) * floatval(100) / floatval($all_over_today_income);

						// if ($data['ffn_today_cnt'] == 0) {
						// 	$ffn_today_cnt = 1;
						// }
						$ffn_today_amt = floatval($data['ffn_today_amt']) * floatval(100) / floatval($all_over_today_income);

						// if ($data['occ_today_cnt'] == 0) {
						// 	$occ_today_cnt = 1;
						// }
						$occ_today_amt = floatval($data['occ_today_amt']) * floatval(100) / floatval($all_over_today_income);

						// if ($data['part_today_cnt'] == 0) {
						// 	$part_today_cnt = 1;
						// }
						$part_today_amt = floatval($data['part_today_amt']) * floatval(100) / floatval($all_over_today_income);

						// if ($data['zone_today_cnt'] == 0) {
						// 	$zone_today_cnt = 1;
						// }
						$zone_today_amt = floatval($data['zone_today_amt']) * floatval(100) / floatval($all_over_today_income);

						// if ($data['construction_today_cnt'] == 0) {
						// 	$construction_today_cnt = 1;
						// }

						$const_today_amt = floatval($data['const_today_amt']) * floatval(100) / floatval($all_over_today_income);

						// if ($data['plant_today_cnt'] == 0) {
						// 	$plant_today_cnt = 1;
						// }

						$plant_today_amt = floatval($data['plant_today_amt']) * floatval(100) / floatval($all_over_today_income);

						// if ($data['ff_today_cnt'] == 0) {
						// 	$ff_today_cnt = 1;
						// }

						$ff_today_amt = floatval($data['ff_today_amt']) * floatval(100) / floatval($all_over_today_income);

						// if ($data['outstanding_today_cnt'] == 0) {
						// 	$outstanding_today_cnt = 1;
						// }

						$out_today_amt = floatval($data['out_today_amt']) * floatval(100) / floatval($all_over_today_income);

		// if ($data['noc_today_cnt'] == 0) {
		// 	$noc_today_cnt = 1;
		// }

		$noc_today_amt = floatval($data['noc_today_amt']) * floatval(100) / floatval($all_over_today_income);

						// if ($data['res_today_cnt'] == 0) {
						// 	$res_today_cnt = 1;
						// }

						$res_today_amt = floatval($data['res_today_amt']) * floatval(100) / floatval($all_over_today_income);

						// if ($data['birth_today_cnt'] == 0) {
						// 	$birth_today_cnt = 1;
						// }

						$birth_today_amt = floatval($data['birth_today_amt']) * floatval(100) / floatval($all_over_today_income);

						// if ($data['marr_today_cnt'] == 0) {
						// 	$marr_today_cnt = 1;
						// }

						$marr_today_amt = floatval($data['marr_today_amt']) * floatval(100) / floatval($all_over_today_income);
					}






					?>

                <!--NEWS SECTION-->
                <div class="padding-md col-md-12">
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <div class="panel-stat3 bg-danger">
                                <h2 class="m-top-none" id="userCount">
                                    <?php echo $all_over_today_register; ?>/<?php echo $all_over_all_register; ?></h2>
                                <h5>Registration Count</h5>

                                <div class="stat-icon">
                                    <i class="fa fa-registered fa-3x"></i>
                                </div>


                            </div>
                        </div><!-- /.col -->
                        <div class="col-sm-12 col-md-4">
                            <div class="panel-stat3 bg-info">
                                <h2 class="m-top-none">
                                    <?php echo $all_over_today_income; ?>/<?php echo $all_over_all_income; ?></h2>
                                <h5>Income Count</h5>

                                <div class="stat-icon">
                                    <i class="fa fa-inr fa-3x"></i>
                                </div>


                            </div>
                        </div><!-- /.col -->

                        <div class="col-sm-12 col-md-4">
                            <div class="panel-stat3 bg-warning">
                                <h2 class="m-top-none" id="userCount"><?php echo $data['staff_cnt']; ?></h2>
                                <h5>Staff Count</h5>

                                <div class="stat-icon">
                                    <i class="fa fa-user fa-3x"></i>
                                </div>


                            </div>
                        </div><!-- /.col -->
                    </div>


                </div>

                <div class="padding-md col-md-12">
                    <div class="row">

                        <div class="col-sm-12 col-md-6">
                            <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                        </div><!-- /.col -->

                        <div class="col-sm-12 col-md-6">
                            <div id="chartContainer2" style="height: 300px; width: 100%;"></div>
                        </div><!-- /.col -->


                    </div>


                </div>

                <div class="padding-md col-md-12">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">

                            <table id="table1" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Department</th>
                                        <th>Register Count</th>
                                        <th>Income Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Property Transfer Record</td>
                                        <td><?php echo $data['property_today_cnt']; ?>/<?php echo $data['property_overall_cnt']; ?>
                                        </td>
                                        <td><?php echo $data['pro_today_amt']; ?>/<?php echo $data['pro_overall_amt']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Inheritance Certificate</td>
                                        <td><?php echo $data['inher_today_cnt']; ?>/<?php echo $data['inher__overall_cnt']; ?>
                                        </td>
                                        <td><?php echo $data['inh_today_amt']; ?>/<?php echo $data['inh_overall_amt']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Fire Fighting Final No Objection Certificate</td>
                                        <td><?php echo $data['ffn_today_cnt']; ?>/<?php echo $data['ffn__overall_cnt']; ?>
                                        </td>
                                        <td><?php echo $data['ffn_today_amt']; ?>/<?php echo $data['ffn_overall_amt']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Occupation Certificate</td>
                                        <td><?php echo $data['occ_today_cnt']; ?>/<?php echo $data['occ__overall_cnt']; ?>
                                        </td>
                                        <td><?php echo $data['occ_today_amt']; ?>/<?php echo $data['occ_overall_amt']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Part Certificate</td>
                                        <td><?php echo $data['part_today_cnt']; ?>/<?php echo $data['part__overall_cnt']; ?>
                                        </td>
                                        <td><?php echo $data['part_today_amt']; ?>/<?php echo $data['part_overall_amt']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Zone Certificate</td>
                                        <td><?php echo $data['zone_today_cnt']; ?>/<?php echo $data['zone__overall_cnt']; ?>
                                        </td>
                                        <td><?php echo $data['zone_today_amt']; ?>/<?php echo $data['zone_overall_amt']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Construction Certificate</td>
                                        <td><?php echo $data['construction_today_cnt']; ?>/<?php echo $data['construction__overall_cnt']; ?>
                                        </td>
                                        <td><?php echo $data['const_today_amt']; ?>/<?php echo $data['const_overall_amt']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Plant Certificate</td>
                                        <td><?php echo $data['plant_today_cnt']; ?>/<?php echo $data['plant__overall_cnt']; ?>
                                        </td>
                                        <td><?php echo $data['plant_today_amt']; ?>/<?php echo $data['plant_overall_amt']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Fire Fighting</td>
                                        <td><?php echo $data['ff_today_cnt']; ?>/<?php echo $data['ff__overall_cnt']; ?>
                                        </td>
                                        <td><?php echo $data['ff_today_amt']; ?>/<?php echo $data['ff_overall_amt']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Outstanding Certificate</td>
                                        <td><?php echo $data['outstanding_today_cnt']; ?>/<?php echo $data['outstanding__overall_cnt']; ?>
                                        </td>
                                        <td><?php echo $data['out_today_amt']; ?>/<?php echo $data['out_overall_amt']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td>No Objection Certificate</td>
                                        <td><?php echo $data['noc_today_cnt']; ?>/<?php echo $data['noc__overall_cnt']; ?>
                                        </td>
                                        <td><?php echo $data['noc_today_amt']; ?>/<?php echo $data['noc_overall_amt']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>Resident Certificate</td>
                                        <td><?php echo $data['res_today_cnt']; ?>/<?php echo $data['res__overall_cnt']; ?>
                                        </td>
                                        <td><?php echo $data['res_today_amt']; ?>/<?php echo $data['res_overall_amt']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>13</td>
                                        <td>Asset Detail Certificate</td>
                                        <td>0/0 </td>
                                        <td>0/0 </td>
                                    </tr>
                                    <tr>
                                        <td>14</td>
                                        <td>Birth And Death</td>
                                        <td><?php echo $data['birth_today_cnt']; ?>/<?php echo $data['birth__overall_cnt']; ?>
                                        </td>
                                        <td><?php echo $data['birth_today_amt']; ?>/<?php echo $data['birth_overall_amt']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>15</td>
                                        <td>Marriage Registration Department</td>
                                        <td><?php echo $data['marr_today_cnt']; ?>/<?php echo $data['marr__overall_cnt']; ?>
                                        </td>
                                        <td><?php echo $data['marr_today_amt']; ?>/<?php echo $data['marr_overall_amt']; ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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

            var property_today_per = "<?php echo $property_today_cnt; ?>";
            var inher_today_per = "<?php echo $inher_today_cnt; ?>";
            var ffn_today_per = "<?php echo $ffn_today_cnt; ?>";
            var occ_today_per = "<?php echo $occ_today_cnt; ?>";
            var part_today_per = "<?php echo $part_today_cnt; ?>";
            var zone_today_per = "<?php echo $zone_today_cnt; ?>";
            var construction_today_per = "<?php echo $construction_today_cnt; ?>";
            var plant_today_per = "<?php echo $plant_today_cnt; ?>";
            var ff_today_per = "<?php echo $ff_today_cnt; ?>";
            var outstanding_today_per = "<?php echo $outstanding_today_cnt; ?>";
            var noc_today_per = "<?php echo $noc_today_cnt; ?>";
            var res_today_per = "<?php echo $res_today_cnt; ?>";
            var birth_today_per = "<?php echo $birth_today_cnt; ?>";
            var marr_today_per = "<?php echo $marr_today_cnt; ?>";



            var pro_today_amt_per = "<?php echo $pro_today_amt; ?>";
            var inh_today_amt_per = "<?php echo $inh_today_amt; ?>";
            var ffn_today_amt_per = "<?php echo $ffn_today_amt; ?>";
            var occ_today_amt_per = "<?php echo $occ_today_amt; ?>";
            var part_today_amt_per = "<?php echo $part_today_amt; ?>";
            var zone_today_amt_per = "<?php echo $zone_today_amt; ?>";
            var const_today_amt_per = "<?php echo $const_today_amt; ?>";
            var plant_today_amt_per = "<?php echo $plant_today_amt; ?>";
            var ff_today_amt_per = "<?php echo $ff_today_amt; ?>";
            var out_today_amt_per = "<?php echo $out_today_amt; ?>";
            var noc_today_amt_per = "<?php echo $noc_today_amt; ?>";
            var res_today_amt_per = "<?php echo $res_today_amt; ?>";
            var birth_today_amt_per = "<?php echo $birth_today_amt; ?>";
            var marr_today_amt_per = "<?php echo $marr_today_amt; ?>";

            //    alert(property_today_per);
            var chart = new CanvasJS.Chart("chartContainer", {
                exportEnabled: true,
                animationEnabled: true,
                title: {
                    text: "Registration Count"
                },
                legend: {
                    cursor: "pointer",
                    itemclick: explodePie
                },
                data: [{
                    type: "pie",
                    showInLegend: true,
                    toolTipContent: "{name}: <strong>{y}%</strong>",
                    indexLabel: "{name} - {y}%",
                    dataPoints: [{
                            y: property_today_per,
                            name: "Property Transfer Record",
                            //exploded: true
                        },
                        {
                            y: inher_today_per,
                            name: "Inheritance Certificate"
                        },
                        {
                            y: ffn_today_per,
                            name: "Fire Fighting Final No Objection Certificate"
                        },
                        {
                            y: occ_today_per,
                            name: "Occupation Certificate"
                        },
                        {
                            y: part_today_per,
                            name: "Part Certificate"
                        },
                        {
                            y: zone_today_per,
                            name: "Zone Certificate"
                        },
                        {
                            y: construction_today_per,
                            name: "Construction Certificate"
                        },
                        {
                            y: plant_today_per,
                            name: "Plant Certificate"
                        },
                        {
                            y: ff_today_per,
                            name: "Fire Fighting"
                        },
                        {
                            y: outstanding_today_per,
                            name: "Outstanding Certificate"
                        },
                        {
                            y: noc_today_per,
                            name: "No Objection Certificate"
                        },
                        {
                            y: res_today_per,
                            name: "Resident Certificate"
                        },
                        {
                            y: 0,
                            name: "Asset Detail Certificate"
                        },
                        {
                            y: birth_today_per,
                            name: "Birth And Death"
                        },
                        {
                            y: marr_today_per,
                            name: "Marriage Registration Department"
                        },
                    ]
                }]
            });
            chart.render();

            function explodePie(e) {
                if (typeof(e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries
                    .dataPoints[e.dataPointIndex].exploded) {
                    e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
                } else {
                    e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
                }
                e.chart.render();

            }



            var chart2 = new CanvasJS.Chart("chartContainer2", {
                exportEnabled: true,
                animationEnabled: true,
                title: {
                    text: "Income Count"
                },
                legend: {
                    cursor: "pointer",
                    itemclick: explodePie2
                },
                data: [{
                    type: "pie",
                    showInLegend: true,
                    toolTipContent: "{name}: <strong>{y}%</strong>",
                    indexLabel: "{name} - {y}%",
                    dataPoints: [{
                            y: pro_today_amt_per,
                            name: "Property Transfer Record"
                         
                        },
                        {
                            y: inh_today_amt_per,
                            name: "Inheritance Certificate"
                        },
                        {
                            y: ffn_today_amt_per,
                            name: "Fire Fighting Final No Objection Certificate"
                        },
                        {
                            y: occ_today_amt_per,
                            name: "Occupation Certificate"
                        },
                        {
                            y: part_today_amt_per,
                            name: "Part Certificate"
                        },
                        {
                            y: zone_today_amt_per,
                            name: "Zone Certificate"
                        },
                        {
                            y: const_today_amt_per,
                            name: "Construction Certificate"
                        },
                        {
                            y: plant_today_amt_per,
                            name: "Plant Certificate"
                        },
                        {
                            y: ff_today_amt_per,
                            name: "Fire Fighting"
                        },
                        {
                            y: out_today_amt_per,
                            name: "Outstanding Certificate"
                        },
                        {
                            y: noc_today_amt_per,
                            name: "No Objection Certificate"
                        },
                        {
                            y: res_today_amt_per,
                            name: "Resident Certificate"
                        },
                        {
                            y: 0,
                            name: "Asset Detail Certificate"
                        },
                        {
                            y: birth_today_amt_per,
                            name: "Birth And Death"
                        },
                        {
                            y: marr_today_amt_per,
                            name: "Marriage Registration Department"
                        },
                    ]
                }]
            });
            chart2.render();




            function explodePie2(e) {
                if (typeof(e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries
                    .dataPoints[e.dataPointIndex].exploded) {
                    e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
                } else {
                    e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
                }
                e.chart2.render();

            }
            $("#table1").dataTable();
        });
        </script>


</body>



























</html>
