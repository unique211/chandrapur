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
			<!-- END BREADCRUMB -->

			<!-- PAGE CONTENT WRAPPER -->
			<div class="page-content-wrap">
				<?php if ($this->session->role != "user") { ?>
					<!--NEWS SECTION-->
					<div class="row">
						<div class="col-md-4 col-sm-12 ">
							<!-- <div class="column "> -->
							<article class="card box_panel">
								<section class="card_body property_transfer">
									<div class="graph ">
										<div class="txt_warn graph_data  txt_serif">Property Transfer Record</div>
									</div>
								</section>
								<section class="stats stats_row">
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Today's Count
											</label>
											<div class=" stats_item_number txt_success">
												<?php echo $data['property_today_cnt']; ?>
											</div>
										</div>
									</div>
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Overall Count
											</label>
											<div class=" stats_item_number red">
												<?php echo $data['property_overall_cnt']; ?>
											</div>
										</div>
									</div>
								</section>
								<section class="stats stats_row">
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Today's Amount
											</label>
											<div class=" stats_item_number txt_success">
												<?php echo $data['pro_today_amt']; ?>
											</div>
										</div>
									</div>
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Overall Amount
											</label>
											<div class=" stats_item_number red">
												<?php echo $data['pro_overall_amt']; ?>
											</div>
										</div>
									</div>
								</section>
							</article>
							<!-- </div>					  -->
						</div>
						<div class="col-md-4 col-sm-12 ">
							<!-- <div class="column "> -->
							<article class="card box_panel">
								<section class="card_body inheritance">
									<div class="graph ">
										<div class="txt_warn graph_data  txt_serif">Inheritance Certificate</div>
									</div>
								</section>
								<section class="stats stats_row">
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Today's Count
											</label>
											<div class=" stats_item_number txt_success">
												<?php echo $data['inher_today_cnt']; ?>
											</div>
										</div>
									</div>
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Overall Count
											</label>
											<div class=" stats_item_number red">
												<?php echo $data['inher__overall_cnt']; ?>
											</div>
										</div>
									</div>
								</section>
								<section class="stats stats_row">
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Today's Amount
											</label>
											<div class=" stats_item_number txt_success">
												<?php echo $data['inh_today_amt']; ?>
											</div>
										</div>
									</div>
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Overall Amount
											</label>
											<div class=" stats_item_number red">
												<?php echo $data['inh_overall_amt']; ?>
											</div>
										</div>
									</div>
								</section>
							</article>
							<!-- </div>					  -->
						</div>

						<div class="col-md-4 col-sm-12 ">
							<!-- <div class="column "> -->
							<article class="card box_panel">
								<section class="card_body fire_no_objection">
									<div class="graph ">
										<div class="txt_warn graph_data  txt_serif">Fire Fighting Final No Objection Certificate</div>
									</div>
								</section>
								<section class="stats stats_row">
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Today's Count
											</label>
											<div class=" stats_item_number txt_success">
												<?php echo $data['ffn_today_cnt']; ?>
											</div>
										</div>
									</div>
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Overall Count
											</label>
											<div class=" stats_item_number red">
												<?php echo $data['ffn__overall_cnt']; ?>
											</div>
										</div>
									</div>
								</section>
								<section class="stats stats_row">
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Today's Amount
											</label>
											<div class=" stats_item_number txt_success">
												<?php echo $data['ffn_today_amt']; ?>
											</div>
										</div>
									</div>
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Overall Amount
											</label>
											<div class=" stats_item_number red">
												<?php echo $data['ffn_overall_amt']; ?>
											</div>
										</div>
									</div>
								</section>
							</article>
							<!-- </div>					  -->
						</div>


					</div>

					<div class="row">
						<div class="col-md-4 col-sm-12 ">
							<!-- <div class="column "> -->
							<article class="card box_panel">
								<section class="card_body occupation">
									<div class="graph ">
										<div class="txt_warn graph_data  txt_serif">Occupation Certificate</div>
									</div>
								</section>
								<section class="stats stats_row">
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Today's Count
											</label>
											<div class=" stats_item_number txt_success">
												<?php echo $data['occ_today_cnt']; ?>
											</div>
										</div>
									</div>
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Overall Count
											</label>
											<div class=" stats_item_number red">
												<?php echo $data['occ__overall_cnt']; ?>
											</div>
										</div>
									</div>
								</section>
								<section class="stats stats_row">
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Today's Amount
											</label>
											<div class=" stats_item_number txt_success">
												<?php echo $data['occ_today_amt']; ?>
											</div>
										</div>
									</div>
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Overall Amount
											</label>
											<div class=" stats_item_number red">
												<?php echo $data['occ_overall_amt']; ?>
											</div>
										</div>
									</div>
								</section>
							</article>
							<!-- </div>					  -->
						</div>
						<div class="col-md-4 col-sm-12 ">
							<!-- <div class="column "> -->
							<article class="card box_panel">
								<section class="card_body part">
									<div class="graph ">
										<div class="txt_warn graph_data  txt_serif">Part Certificate</div>
									</div>
								</section>
								<section class="stats stats_row">
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Today's Count
											</label>
											<div class=" stats_item_number txt_success">
												<?php echo $data['part_today_cnt']; ?>
											</div>
										</div>
									</div>
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Overall Count
											</label>
											<div class=" stats_item_number red">
												<?php echo $data['part__overall_cnt']; ?>
											</div>
										</div>
									</div>
								</section>
								<section class="stats stats_row">
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Today's Amount
											</label>
											<div class=" stats_item_number txt_success">
												<?php echo $data['part_today_amt']; ?>
											</div>
										</div>
									</div>
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Overall Amount
											</label>
											<div class=" stats_item_number red">
												<?php echo $data['part_overall_amt']; ?>
											</div>
										</div>
									</div>
								</section>
							</article>
							<!-- </div>					  -->
						</div>

						<div class="col-md-4 col-sm-12 ">
							<!-- <div class="column "> -->
							<article class="card box_panel">
								<section class="card_body zone">
									<div class="graph ">
										<div class="txt_warn graph_data  txt_serif">Zone Certificate</div>
									</div>
								</section>
								<section class="stats stats_row">
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Today's Count
											</label>
											<div class=" stats_item_number txt_success">
												<?php echo $data['zone_today_cnt']; ?>
											</div>
										</div>
									</div>
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Overall Count
											</label>
											<div class=" stats_item_number red">
												<?php echo $data['zone__overall_cnt']; ?>
											</div>
										</div>
									</div>
								</section>
								<section class="stats stats_row">
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Today's Amount
											</label>
											<div class=" stats_item_number txt_success">
												<?php echo $data['zone_today_amt']; ?>
											</div>
										</div>
									</div>
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Overall Amount
											</label>
											<div class=" stats_item_number red">
												<?php echo $data['zone_overall_amt']; ?>
											</div>
										</div>
									</div>
								</section>
							</article>
							<!-- </div>					  -->
						</div>


					</div>

					<div class="row">
						<div class="col-md-4 col-sm-12 ">
							<!-- <div class="column "> -->
							<article class="card box_panel">
								<section class="card_body construction">
									<div class="graph ">
										<div class="txt_warn graph_data  txt_serif">Construction Certificate</div>
									</div>
								</section>
								<section class="stats stats_row">
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Today's Count
											</label>
											<div class=" stats_item_number txt_success">
												<?php echo $data['construction_today_cnt']; ?>
											</div>
										</div>
									</div>
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Overall Count
											</label>
											<div class=" stats_item_number red">
												<?php echo $data['construction__overall_cnt']; ?>
											</div>
										</div>
									</div>
								</section>
								<section class="stats stats_row">
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Today's Amount
											</label>
											<div class=" stats_item_number txt_success">
												<?php echo $data['const_today_amt']; ?>
											</div>
										</div>
									</div>
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Overall Amount
											</label>
											<div class=" stats_item_number red">
												<?php echo $data['const_overall_amt']; ?>
											</div>
										</div>
									</div>
								</section>
							</article>
							<!-- </div>					  -->
						</div>
						<div class="col-md-4 col-sm-12 ">
							<!-- <div class="column "> -->
							<article class="card box_panel">
								<section class="card_body plant">
									<div class="graph ">
										<div class="txt_warn graph_data  txt_serif">Plant Certificate</div>
									</div>
								</section>
								<section class="stats stats_row">
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Today's Count
											</label>
											<div class=" stats_item_number txt_success">
												<?php echo $data['plant_today_cnt']; ?>
											</div>
										</div>
									</div>
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Overall Count
											</label>
											<div class=" stats_item_number red">
												<?php echo $data['plant__overall_cnt']; ?>
											</div>
										</div>
									</div>
								</section>
								<section class="stats stats_row">
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Today's Amount
											</label>
											<div class=" stats_item_number txt_success">
												<?php echo $data['plant_today_amt']; ?>
											</div>
										</div>
									</div>
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Overall Amount
											</label>
											<div class=" stats_item_number red">
												<?php echo $data['plant_overall_amt']; ?>
											</div>
										</div>
									</div>
								</section>
							</article>
							<!-- </div>					  -->
						</div>

						<div class="col-md-4 col-sm-12 ">
							<!-- <div class="column "> -->
							<article class="card box_panel">
								<section class="card_body fire_fighting">
									<div class="graph ">
										<div class="txt_warn graph_data  txt_serif">Fire Fighting</div>
									</div>
								</section>
								<section class="stats stats_row">
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Today's Count
											</label>
											<div class=" stats_item_number txt_success">
												<?php echo $data['ff_today_cnt']; ?>
											</div>
										</div>
									</div>
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Overall Count
											</label>
											<div class=" stats_item_number red">
												<?php echo $data['ff__overall_cnt']; ?>
											</div>
										</div>
									</div>
								</section>
								<section class="stats stats_row">
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Today's Amount
											</label>
											<div class=" stats_item_number txt_success">
												<?php echo $data['ff_today_amt']; ?>
											</div>
										</div>
									</div>
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Overall Amount
											</label>
											<div class=" stats_item_number red">
												<?php echo $data['ff_overall_amt']; ?>
											</div>
										</div>
									</div>
								</section>
							</article>
							<!-- </div>					  -->
						</div>


					</div>

					<div class="row">
						<div class="col-md-4 col-sm-12 ">
							<!-- <div class="column "> -->
							<article class="card box_panel">
								<section class="card_body outstanding">
									<div class="graph ">
										<div class="txt_warn graph_data  txt_serif">Outstanding Certificate</div>
									</div>
								</section>
								<section class="stats stats_row">
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Today's Count
											</label>
											<div class=" stats_item_number txt_success">
												<?php echo $data['outstanding_today_cnt']; ?>
											</div>
										</div>
									</div>
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Overall Count
											</label>
											<div class=" stats_item_number red">
												<?php echo $data['outstanding__overall_cnt']; ?>
											</div>
										</div>
									</div>
								</section>
								<section class="stats stats_row">
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Today's Amount
											</label>
											<div class=" stats_item_number txt_success">
												<?php echo $data['out_today_amt']; ?>
											</div>
										</div>
									</div>
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Overall Amount
											</label>
											<div class=" stats_item_number red">
												<?php echo $data['out_overall_amt']; ?>
											</div>
										</div>
									</div>
								</section>
							</article>
							<!-- </div>					  -->
						</div>
						<div class="col-md-4 col-sm-12 ">
							<!-- <div class="column "> -->
							<article class="card box_panel">
								<section class="card_body no_objection">
									<div class="graph ">
										<div class="txt_warn graph_data  txt_serif">No Objection Certificate</div>
									</div>
								</section>
								<section class="stats stats_row">
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Today's Count
											</label>
											<div class=" stats_item_number txt_success">
												<?php echo $data['noc_today_cnt']; ?>
											</div>
										</div>
									</div>
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Overall Count
											</label>
											<div class=" stats_item_number red">
												<?php echo $data['noc__overall_cnt']; ?>
											</div>
										</div>
									</div>
								</section>
								<section class="stats stats_row">
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Today's Amount
											</label>
											<div class=" stats_item_number txt_success">
												<?php echo $data['noc_today_amt']; ?>
											</div>
										</div>
									</div>
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Overall Amount
											</label>
											<div class=" stats_item_number red">
												<?php echo $data['noc_overall_amt']; ?>
											</div>
										</div>
									</div>
								</section>
							</article>
							<!-- </div>					  -->
						</div>

						<div class="col-md-4 col-sm-12 ">
							<!-- <div class="column "> -->
							<article class="card box_panel">
								<section class="card_body resident">
									<div class="graph ">
										<div class="txt_warn graph_data  txt_serif">Resident Certificate</div>
									</div>
								</section>
								<section class="stats stats_row">
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Today's Count
											</label>
											<div class=" stats_item_number txt_success">
												<?php echo $data['res_today_cnt']; ?>
											</div>
										</div>
									</div>
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Overall Count
											</label>
											<div class=" stats_item_number red">
												<?php echo $data['res__overall_cnt']; ?>
											</div>
										</div>
									</div>
								</section>
								<section class="stats stats_row">
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Today's Amount
											</label>
											<div class=" stats_item_number txt_success">
												<?php echo $data['res_today_amt']; ?>
											</div>
										</div>
									</div>
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Overall Amount
											</label>
											<div class=" stats_item_number red">
												<?php echo $data['res_overall_amt']; ?>
											</div>
										</div>
									</div>
								</section>
							</article>
							<!-- </div>					  -->
						</div>


					</div>

					<div class="row">
						<div class="col-md-4 col-sm-12 ">
							<!-- <div class="column "> -->
							<article class="card box_panel">
								<section class="card_body asset_detail">
									<div class="graph ">
										<div class="txt_warn graph_data  txt_serif">Asset Detail Certificate</div>
									</div>
								</section>
								<section class="stats stats_row">
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Today's Count
											</label>
											<div class=" stats_item_number txt_success">
												0
											</div>
										</div>
									</div>
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Overall Count
											</label>
											<div class=" stats_item_number red">
												0
											</div>
										</div>
									</div>
								</section>
								<section class="stats stats_row">
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Today's Amount
											</label>
											<div class=" stats_item_number txt_success">
												0
											</div>
										</div>
									</div>
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Overall Amount
											</label>
											<div class=" stats_item_number red">
												0
											</div>
										</div>
									</div>
								</section>
							</article>
							<!-- </div>					  -->
						</div>
						<div class="col-md-4 col-sm-12 ">
							<!-- <div class="column "> -->
							<article class="card box_panel">
								<section class="card_body birth">
									<div class="graph ">
										<div class="txt_warn graph_data  txt_serif">Birth And Death</div>
									</div>
								</section>
								<section class="stats stats_row">
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Today's Count
											</label>
											<div class=" stats_item_number txt_success">
												<?php echo $data['birth_today_cnt']; ?>
											</div>
										</div>
									</div>
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Overall Count
											</label>
											<div class=" stats_item_number red">
												<?php echo $data['birth__overall_cnt']; ?>
											</div>
										</div>
									</div>
								</section>
								<section class="stats stats_row">
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Today's Amount
											</label>
											<div class=" stats_item_number txt_success">
												<?php echo $data['birth_today_amt']; ?>
											</div>
										</div>
									</div>
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Overall Amount
											</label>
											<div class=" stats_item_number red">
												<?php echo $data['birth_overall_amt']; ?>
											</div>
										</div>
									</div>
								</section>
							</article>
							<!-- </div>					  -->
						</div>

						<div class="col-md-4 col-sm-12 ">
							<!-- <div class="column "> -->
							<article class="card box_panel">
								<section class="card_body marriage">
									<div class="graph ">
										<div class="txt_warn graph_data  txt_serif">Marriage Registration Department</div>
									</div>
								</section>
								<section class="stats stats_row">
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Today's Count
											</label>
											<div class=" stats_item_number txt_success">
												<?php echo $data['marr_today_cnt']; ?>
											</div>
										</div>
									</div>
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Overall Count
											</label>
											<div class=" stats_item_number red">
												<?php echo $data['marr__overall_cnt']; ?>
											</div>
										</div>
									</div>
								</section>
								<section class="stats stats_row">
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Today's Amount
											</label>
											<div class=" stats_item_number txt_success">
												<?php echo $data['marr_today_amt']; ?>
											</div>
										</div>
									</div>
									<div class="stats_item ">
										<div class="txt_faded">
											<label class="txt_label space_n_b">
												Overall Amount
											</label>
											<div class=" stats_item_number red">
												<?php echo $data['marr_overall_amt']; ?>
											</div>
										</div>
									</div>
								</section>
							</article>
							<!-- </div>					  -->
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
	<!-- MESSAGE BOX-->
	<?php include('include/message_box.php');  ?>
	<!-- END MESSAGE BOX-->

	<!-- START SCRIPTS -->
	<?php include('include/footer_scripts.php');  ?>
	<!-- END SCRIPTS -->

</body>

</html>