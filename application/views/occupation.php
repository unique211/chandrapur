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
				<li class="active">Occupation certificate</li>

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
								<h3 class="panel-title">Code Id : 04 Occupation Certificate</h3>

								<ul class="panel-controls">

									<li> <button class="btn btn-success btnhideshow" style="background-color:#00B050;"> Add Occupation certificate Detail</button></li>
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
												<select class="form-control zone" style="width:100%;" name="zone_filter" id="zone_filter" required>
													<option selected value="All">All</option>
												</select>
											</div>
											<div class="col-md-1">
												<label class="control-label">Sub Zone</label>
											</div>
											<div class="col-md-3">
												<select class="form-control" style="width:100%;" name="subzone_filter" id="subzone_filter" required>
													<option selected value="All">All</option>


												</select>
											</div>
											<div class="col-md-1">
												<label class="control-label">Staff</label>
											</div>
											<div class="col-md-3">
												<select class="form-control " style="width:100%;" name="staff_filter" id="staff_filter" required>
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
													<input type="file" id="attachment2" name="attachment2" accept="*" style="padding:0px;border:0;">
													<input type="hidden" id="file_attachother2" class="file_attachother2" value="" />
													<div id="msg2" class="msg2"></div>
												</div> <!-- Modal footer -->
												<div class="modal-footer">
													<button type="button" class="btn btn-danger" data-dismiss="modal" id="close_model2">Close</button>
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
								<h3 class="panel-title">Code Id : 04 Occupation Certificate</h3>
								<div class="pull-right">
									<button class="btn btn-success closehideshow" style="background-color:#00B050;">View Occupation certificate Detail</button>
								</div>
							</div>
							<div class="panel-body">
								<div class="row">
									<form class="form-horizontal" id="master_form" name="master_form">

										<div class="form-group">

											<div class="col-md-3">
												<label class="control-label">दिनांक*</label>

											</div>

											<div class="col-md-3">
												<div class="input-group date " data-provide="datepicker">
													<input type="text" class="form-control input-sm placeholdesize date1" id="date" name="date" autocomplete="off" required>
													<div class="input-group-addon">
														<span class="fa fa-calendar"></span>
													</div>
												</div>

											</div>

											<div class="col-md-3">
												<label class="control-label">परवाना धरकाचे नाव*</label>

											</div>

											<div class="col-md-3">

												<input type="text" placeholder="परवाना धरकाचे नाव" class="form-control input-sm placeholdesize" id="name" name="name" required>

											</div>



										</div>

										<div class="form-group">

											<div class="col-sm-3">

												<label>व्यवसायाचे नाव*</label>

											</div>

											<div class="col-sm-3">
												<input type="text" min="0" placeholder="व्यवसायाचे नाव" class="form-control input-sm placeholdesize" id="business_name" name="business_name" required>

											</div>
											<div class="col-sm-3">

												<label>व्यवसायाचा पत्ता*</label>

											</div>

											<div class="col-sm-3">
												<input type="text" min="0" placeholder="व्यवसायाचा पत्ता" class="form-control input-sm placeholdesize" id="business_address" name="business_address" required>

											</div>

										</div>


										<div class="form-group">

											<div class="col-sm-3">

												<label>परवानाचे प्रकार / परवान्याचे वर्गीकरण*</label>

											</div>

											<div class="col-sm-3">
											
<select name="business_type" id="business_type" class="form-control input-sm placeholdesize" required>
	
</select>
											</div>
											<div class="col-sm-3">

												<label>परिमाण*</label>

											</div>

											<div class="col-sm-3">
												<input type="text" min="0" placeholder="परिमाण" class="form-control input-sm placeholdesize" id="dimension" name="dimension" required>

											</div>

										</div>

										<div class="form-group">


											<div class="col-sm-3">

												<label>शुल्क प्रकार*</label>

											</div>

											<div class="col-sm-3">
												<input type="text" min="0" placeholder="शुल्क प्रकार" class="form-control input-sm placeholdesize" id="charge_type" name="charge_type" required>

											</div>
											<div class="col-sm-3">

												<label>शुल्क*</label>

											</div>

											<div class="col-sm-3">
												<input type="text" min="0" placeholder="शुल्क" class="form-control input-sm placeholdesize" id="charge" name="charge" required>

											</div>

										</div>

										<div class="form-group">


											<div class="col-sm-3">

												<label>परवानाची मुदत पासून*</label>

											</div>

											<div class="col-sm-3">
												<div class="input-group date " data-provide="datepicker">
													<input type="text" class="form-control input-sm placeholdesize date1" id="from" name="from" autocomplete="off" required>
													<div class="input-group-addon">
														<span class="fa fa-calendar"></span>
													</div>
												</div>

											</div>
											<div class="col-sm-3">

												<label>परवानाची मुदत पर्यंत*</label>

											</div>

											<div class="col-sm-3">
												<div class="input-group date " data-provide="datepicker">
													<input type="text" class="form-control input-sm placeholdesize date1" id="to" name="to" autocomplete="off" required>
													<div class="input-group-addon">
														<span class="fa fa-calendar"></span>
													</div>
												</div>

											</div>

										</div>

										<div class="form-group">


											<div class="col-sm-3">

												<label>शेरा / Remark (if any)*</label>

											</div>

											<div class="col-sm-3">

												<textarea name="remarks2" id="remarks2" style="resize: none;" class="form-control input-sm placeholdesize" placeholder="शेरा / Remark" id="remark2" name="remark2" required></textarea>
											</div>


											<div class="col-sm-3">

												<label>Photo*</label>

											</div>

											<div class="col-sm-2">

												<input type="file" id="attachment3" name="attachment3" accept="*" style="padding:0px;border:0;">
												<input type="hidden" id="file_attachother3" class="" value="" />
												<div id="msg3" class=""></div>
											</div>
											<div class="col-sm-1">

												
												<div id="image_photo" class=""></div>
											</div>


										</div>
										<br><br><br>
										<div style="margin-top:-15px;border-bottom:2px solid;width:100%;">
											<b>Upload Documents</b>
										</div><br>
										<div class="row">
											<table id="file_info" class="table table-striped file_info" cellspacing="0">

												<thead>
													<input type="hidden" id="row" class="row" value="0">
													<tr>
														<th>
															<font style="font-weight:bold">
																Document </font>
														</th>
														<th>
															<font style="font-weight:bold">
																Remarks </font>
														</th>


														<th>
															<font style="font-weight:bold">
															</font>
														</th>


													</tr>
													<tr>

														<input type="hidden" id="ids" class="ids" />
														<td>
															<input type="file" id="attachment" name="attachment" accept="*" style="padding:0px;border:0;">
															<input type="hidden" id="file_attachother" class="file_attachother" value="" />
															<div id="msg" class="msg"></div>
														</td>
														<td>
															<input name="remark" type="text" class="form-control" id="remark" placeholder="Remarks" value="">
														</td>
														<td><button type="button" class="btn btn-primary btn-xs plus " form="pro_form" id="plus"><i class="fa fa-plus"></i></button>
														</td>
													</tr>

												</thead>
												<tbody id="file_info_tbody" class="file_info_tbody">

												</tbody>
											</table>
										</div>
										<br>


										<div class="btn-group pull-right">

											<input type="hidden" id="save_update" value="">

											<button class="btn btn-primary" type="submit">Save</button>
											<button class="btn btn-warning" id="reset_btn" type="button">Reset</button>

										</div>

									</form>
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
														<input name="reject_remark" type="text" class="form-control" id="reject_remark" placeholder="Remarks" value="" required>
													</div> <!-- Modal footer -->
													<div class="modal-footer">
														<button type="button" class="btn btn-danger" data-dismiss="modal" id="close_model">Close</button>
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
	<script src="<?php echo base_url(); ?>assets/js/myjs/occuption.js"></script>
	<!--fileupload Files -->
	<script src="<?php echo base_url() . 'assets/js/AjaxFileUpload.js' ?>"></script>

	<script>
		var date = new Date();
		date = date.toString('dd/MM/yyyy');
		$("#date").val(date);
		$("#from").val(date);
		$("#to").val(date);
		$('.date').datepicker({
			'todayHighlight': true,
			format: 'dd/mm/yyyy',
			autoclose: true,
		});


		//  $("#fdate").val(date);
	</script>
</body>

</html>
