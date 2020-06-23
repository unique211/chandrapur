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

							</div>
						</div>
						<!-- END SIMPLE DATATABLE -->


						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"> Occupation Certificate Renew</h3>

								<ul class="panel-controls">

									<!-- <li> <button class="btn btn-success btnhideshow" style="background-color:#00B050;"> Add Occupation certificate Detail</button></li> -->
								</ul>
							</div>
							<div class="panel-body">

								<div class="col-lg-12 ">
									<div class="table-responsive" id="show_master2">

									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
				<!--NEWS SECTION END-->

				<!-- strat notification -->
				<div class="row formhideshow" style="display:none">
					<div class="col-md-12 col-sm-12 col-xs-12 right_side" id="form1">
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

									<!-- </form> -->
								</div>
							</div>
						</div>
						<!-- END SIMPLE DATATABLE -->
					</div>

					<!--------------------form-2 start----------------------->
					<div class="col-md-12 col-sm-12 col-xs-12 right_side" id="form2" style="display:none;">
						<div class="panel-body">
							<div class="panel-heading">
								<h3 class="panel-title">Receipt</h3>
								<div class="pull-right">
									<button class="btn btn-success closehideshow viewdetailsbtn" style="background-color:#00B050;">View Detail</button>
								</div>
							</div>
							<div id="divToPrint" class="divToPrint" style="height:100%">
								<form class="form-horizontal" id="master_form2" name="master_form2">
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
																	Receipt.No. <input type="text" id="receipt_no" name="receipt_no" style="float:right;width:100%;" required></font>
															</font>
														</th>
														<th style="background-color: rgb(231, 226, 226);">
															<font style="vertical-align: inherit;">Date
																of Receipt <div class="input-group date" data-provide="datepicker" required>
																	<input type="text" class="date1" style="width:103%;margin-bottom:-2%;" id="receipt_date" name="receipt_date" autocomplete="off" required>
																	<div class="input-group-addon" style="float:right;width:0%;background-color:rgb(231, 226, 226);border-color:rgb(231, 226, 226)">
																	</div>
															</font>
														</th>
														<th style="background-color: rgb(231, 226, 226);">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	Document Details. <input type="text" id="collection_no" name="collection_no" style="float:right;width:100%;" required></font>
															</font>
														</th>
														<th style="background-color: rgb(231, 226, 226);">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	Document Quantity <input type="text" id="counter_no" name="counter_no" value="1" style="float:right;width:100%;" required></font>
															</font>
														</th>
													</tr>
												</tbody>
											</table>
											<br>
											<table width="100%" border="1">
												<tbody>
													<tr>
														<th align="left" style="width: 24%;padding-left: 8px;background-color: rgb(231, 226, 226);">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	Received From</font>
															</font>
														</th>
														<td style="padding-left: 0px;">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	<input type="text" id="receive_from" name="receive_from" style="width:100%;" required>
																</font>
															</font>
														</td>
														<th align="left" style="width: 24%;padding-left: 8px;background-color: rgb(231, 226, 226);">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	Business Type</font>
															</font>
														</th>
														<td style="padding-left: 0px;">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	<input type="text" id="rec_business_type" name="rec_business_type" style="width:100%;" required>
																</font>
															</font>
														</td>
													</tr>
													<tr>
														<th align="left" style="padding-left: 8px;background-color: rgb(231, 226, 226);">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">Amount
																	(Rs)</font>
															</font>
														</th>
														<td style="padding-left: 0px;">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	<input type="text" id="amt" name="amt" style="width:100%;" required>
																</font>
															</font>
														</td>
														<th align="left" style="width: 24%;padding-left: 8px;background-color: rgb(231, 226, 226);">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	Penalty (Rs)</font>
															</font>
														</th>
														<td style="padding-left: 0px;">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	<input type="text" id="penalty" name="penalty" style="width:100%;" value="0.00" required>
																</font>
															</font>
														</td>
													</tr>
													<tr>
														<th align="left" style="padding-left: 8px;background-color: rgb(231, 226, 226);">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">Amount
																	In Words</font>
															</font>
														</th>
														<td style="padding-left: 0px;" colspan="3">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	<input type="text" id="amt_words" name="amt_words" style="width:100%;" readonly>
																</font>
															</font>
														</td>
													</tr>
													<tr>
														<th align="left" style="padding-left: 8px;background-color: rgb(231, 226, 226);">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	Function</font>
															</font>
														</th>
														<td style="padding-left: 0px;" colspan="3">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	<input type="text" id="function" name="function" style="width:100%;" readonly>
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
																	Of Receipt<input type="text" id="mode" name="mode" style="float:right;width:100%;" required></font>
															</font>
														</th>
														<th style="background-color: rgb(231, 226, 226);">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">Amount
																	(Rs)<input type="text" id="amt2" name="amt2" style="float:right;width:100%;" required></font>
															</font>
														</th>

														<th style="background-color: rgb(231, 226, 226);">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">Cheque
																	No.<input type="text" id="chq_no" name="chq_no" style="float:right;width:100%;"></font>
															</font>
														</th>
														<th style="background-color: rgb(231, 226, 226);">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">Cheque
																	Date<div class="input-group date " data-provide="datepicker">
																		<input type="text" class="date1" style="width:100%;margin-bottom:-2%;" id="chq_date" name="chq_date" autocomplete="off">
																		<div class="input-group-addon" style="float:right;width:0%;background-color:rgb(231, 226, 226);border-color:rgb(231, 226, 226)">
																		</div>
																</font>
															</font>
														</th>
														<th style="background-color: rgb(231, 226, 226);">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">Bank
																	Name<input type="text" id="bank_name" name="bank_name" style="float:right;width:100%;"></font>
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
																	Reference No./Bill No.<input type="text" id="bill_no" name="bill_no" style="float:right;width:100%;" required></font>
															</font>
														</th>
														<th style="background-color: rgb(231, 226, 226);">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">From Date<div class="input-group  date" data-provide="datepicker">
																		<input type="text" class="date1" style="width:100%;margin-bottom:-2%;" id="r_from_dt" name="r_from_dt" autocomplete="off" required>
																		<div class="input-group-addon" style="float:right;width:0%;background-color:rgb(231, 226, 226);border-color:rgb(231, 226, 226)">
																		</div>
																</font>
															</font>
														</th>
														<th style="background-color: rgb(231, 226, 226);">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">To Date<div class="input-group date " data-provide="datepicker">
																		<input type="text" class="date1" style="width:100%;margin-bottom:-2%;" id="r_to_dt" name="r_to_dt" autocomplete="off" required>
																		<div class="input-group-addon" style="float:right;width:0%;background-color:rgb(231, 226, 226);border-color:rgb(231, 226, 226)">
																		</div>
																</font>
															</font>
														</th>
														<th style="background-color: rgb(231, 226, 226);">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	Details<input type="text" id="details" name="details" style="float:right;width:100%;" readonly></font>
															</font>
														</th>
														<th style="background-color: rgb(231, 226, 226);">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	Payable Amount (Rs)<input type="text" id="payble" name="payble" style="float:right;width:100%;" required></font>
															</font>
														</th>
														<th style="background-color: rgb(231, 226, 226);">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">Amount
																	Received (Rs)<input type="text" id="receive_amt" name="receive_amt" style="float:right;width:100%;" required></font>
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
																	<input type="text" id="total" name="total" style="width:50%;float:right" required>
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
										<input type="hidden" id="is_renew" value="0">
										<input type="hidden" id="rcpt_no" value="0">
										<button class="btn btn-primary" id="formbtn4" type="submit">Save</button>
										</form>
										<button class="btn btn-primary" type="submit" id="btnprint2" form="property2" name="btnprint2" value="">Print </button>
										<form name="property2" id="property2" method="POST" action="<?php echo base_url('Occuption_c/print_cash'); ?>" target="_blank">
										</form>
									</font>
									</button>
							</center>
						</div>
					</div>
					<!--------------------form2 end- -------------->

					<!------------form3 start-------------------------->
					<div class="col-md-12 col-sm-12 col-xs-12 right_side" id="form3" style="display:none;margin-bottom:-1%;">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Certificate</h3>
								<div class="pull-right">
									<button class="btn btn-success closehideshow" style="background-color:#00B050;">View
										Detail</button>
								</div>
							</div>
							<div class="panel-body" >
								<div class="col-lg-12">
									<form class="form-horizontal" id="master_form3" name="master_form3">
										<div id="form3_certificate">
											<center>
												<table id="tbl_1" style="margin-top: 1%;width:100%;height:111px;padding-left:2%;padding-right:2%;">
													<tbody>
														<tr>
															<td style="width:20%;margin-top: -1%;padding-left: 2%;">
																<table style="width:100%;">
																	<tbody>
																		<tr style="margin-bottom: 5%;">
																			<td>
																				<center>
																					<img src="<?php echo base_url(); ?>images/cmc.jpg" style="float: left;padding-left: 1%;width: 70%;height:105px;">
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
																					<center><b style="font-size: 25px;">
																							चंद्रपूर शहर महानगरपालिका,चंद्रपूर
																						</b></center>
																				</td>
																			</tr>
																			<tr>
																				<td>
																					<center><b style="font-size: 25px;">
																							बाजार परवाना विभाग</b></center>
																				</td>
																			</tr>
																		</tbody>
																	</table>
																</center>
															</td>
															<td style="width:20%;margin-top: -1%;padding-right: 1%;">

															</td>
														</tr>
													</tbody>
												</table>
											</center>
											<hr>
											<center>
												<table id="tbl_1" style="width:100%;padding-left:2%;padding-right:2%;">
													<tbody>
														<tr>
															<td style="width:20%;margin-top: -1%;padding-left: 2%;">

															</td>
															<td style="width:40%;">
																<center>
																	<table>
																		<tbody>


																			<tr>
																				<td>
																					<center><b style="font-size: 15px;">
																							(म.न.पा. नियम 278,280 व 289 नुसार) (धंदा परवाना)
																						</b></center>
																				</td>
																			</tr>
																			<tr>
																				<td>
																					<center><b style="font-size: 15px;">
																							बाजार परवाना विभाग</b></center>
																				</td>
																			</tr>
																		</tbody>
																	</table>
																</center>
															</td>
															<td style="width:20%;margin-top: -1%;padding-right: 1%;">

															</td>
														</tr>
													</tbody>
												</table>
											</center>

											<table id="tbl_1" style="width:100%;padding-left:2%;padding-right:2%;font-size:12px">
												<tbody>
													<tr>
														<td style="width:20%;margin-top: -1%;padding-left: 2%;">

														</td>
														<td style="width:30%;">



														</td>
														<td style="width:20%;margin-top: -1%;padding-right: 1%;">

														</td>
														<td style="width:30%;margin-top: -1%;padding-right: 1%;">
															<center>परवाना क्र. <span id="c_auto_id"></span></center>
														</td>
													</tr>
													<tr>
														<td style="width:20%;margin-top: -1%;padding-left: 2%;">

														</td>
														<td style="width:30%;">



														</td>
														<td style="width:20%;margin-top: -1%;padding-right: 1%;">

														</td>
														<td style="width:30%;margin-top: -1%;padding-right: 1%;">
															<center> दिनांक :- <span id="c_today"></span></center>
														</td>
													</tr>
													<tr>
														<td colspan="2" style="width:20%;margin-top: -1%;padding-left: 2%;">
															परवाना धरकाचे नाव : <span id="c_name"></span>
														</td>

														<td style="width:20%;margin-top: -1%;padding-right: 1%;">

														</td>
														<td rowspan="5" style="margin-top: -1%;padding-right: 1%;">
															<center>
																<div style="width:100px;height:130px;border:1px solid #000;">
																	<center>
																		<div id="c_photo"></div>
																	</center>
																</div>
																<!-- <center> Customer Photo</center> -->
															</center>
														</td>
													</tr>
													<tr>
														<td colspan="2" style="width:20%;margin-top: -1%;padding-left: 2%;">
															व्यवसायाचे नाव : <span id="c_business_name"></span>
														</td>

														<td style="width:20%;margin-top: -1%;padding-right: 1%;">

														</td>

													</tr>
													<tr>
														<td colspan="2" rowspan="3" style="width:20%;margin-top: -1%;padding-left: 2%;">
															व्यवसायाचा पत्ता : <span id="c_business_address"></span>
														</td>

														<td style="width:20%;margin-top: -1%;padding-right: 1%;">

														</td>

													</tr>
												</tbody>
											</table>

											<table id="tbl_1" style="width:100%;padding-left:2%;padding-right:2%;border:1px solid #000;font-size:12px">
												<tbody>
													<tr>
														<td colspan="2" rowspan="2" style="width: 30%;border:1px solid #000;">
															<center>परवानाचे प्रकार / परवान्याचे वर्गीकरण</center>
														</td>
														<td colspan="3" style="width: 70%;border:1px solid #000;">
															<center>परिमाण</center>
														</td>
													</tr>
													<tr>

														<td style="width: 20%;border:1px solid #000;">
															<center>परिमाण</center>
														</td>
														<td style="width: 30%;border:1px solid #000;">
															<center>शुल्क प्रकार</center>
														</td>
														<td style="width: 20%;border:1px solid #000;">
															<center>शुल्क</center>
														</td>
													</tr>
													<tr>
														<td colspan="2" style="width: 30%;border:1px solid #000;">
															<center><span id="c_business_type"></span></center>
														</td>
														<td style="width: 20%;border:1px solid #000;">
															<center><span id="c_dimension"></span></center>
														</td>
														<td style="width: 30%;border:1px solid #000;">
															<center><span id="c_charge_type"></span></center>
														</td>
														<td style="width: 20%;border:1px solid #000;">
															<center><span id="c_charge"></span></center>
														</td>
													</tr>
													<td colspan="2" style="width: 30%;border:1px solid #000;">
														<center></center>
													</td>
													<td colspan="2" style="width: 20%;border:1px solid #000;text-align: right;">एकूण </td>
													<td style="width: 20%;border:1px solid #000;">
														<center><span id="c_tot_charge"></span></center>
													</td>
													</tr>
												</tbody>
											</table>

											<table id="tbl_1" style="width:100%;padding-left:2%;padding-right:2%;font-size:12px">
												<tbody>

													<tr>
														<td colspan="2" style="width:40%;margin-top: -1%;padding-left: 2%;">
															एकूण परवाना फी : <span id="c_tot_charge2"></span>
														</td>

														<td style="width:60%;margin-top: -1%;padding-right: 1%;">

														</td>

													</tr>
													<tr>
														<td colspan="2" style="width:40%;margin-top: -1%;padding-left: 2%;">
															पावती क्र. : <span id="c_auto_id2"></span>
														</td>

														<td style="width:60%;margin-top: -1%;padding-right: 1%;">
															दिनांक : <span id="c_today2"></span>
														</td>

													</tr>
													<tr>
														<td colspan="2" style="width:40%;margin-top: -1%;padding-left: 2%;">
															परवानाची मुदत पासून : <span id="c_from"></span>
														</td>

														<td style="width:60%;margin-top: -1%;padding-right: 1%;">
															परवानाची मुदत पर्यंत : <span id="c_to"></span>
														</td>

													</tr>
													<tr>
														<td colspan="4" style="margin-top: -1%;padding-left: 2%;">
															शेरा / Remark (if any) : <span id="c_remark"></span>
														</td>



													</tr>

												</tbody>
											</table>

											<table id="tbl_1" style="width:100%;padding-left:2%;padding-right:2%;font-size:12px">
												<tbody>

													<tr>
														<td colspan="2" style="width:40%;margin-top: -1%;padding-left: 2%;">

														</td>

														<td style="width:30%;margin-top: -1%;padding-right: 1%;">
															<center> शिक्का (Seal) </center>
														</td>

														<td style="width:30%;margin-top: -1%;padding-right: 1%;">
															<center> अनुज्ञापन अधिकाऱ्याची सही</center><br>
															<center> <b>चंद्रपूर शहर महानगरपालिका, चंद्रपूर </b> </center>
														</td>

													</tr>


												</tbody>
											</table>

											<table id="tbl_1" style="width:100%;padding-left:2%;padding-right:2%;border:1px solid #000;font-size:12px">
												<thead>
													<tr>
														<td colspan="9">
															<center>परवाना नुतनीकरण तक्ता</center>
														</td>
													</tr>
													<tr>
														<td style="width: 5%;border:1px solid #000;">
															<center>अ क्र</center>
														</td>
														<td style="width: 15%;border:1px solid #000;">
															<center>नुतनीकरण पावती क्र</center>
														</td>
														<td style="width: 8%;border:1px solid #000;">
															<center>पावती दि.</center>
														</td>
														<td style="width: 14%;border:1px solid #000;">
															<center>नुतनीकरण शुल्क</center>
														</td>
														<td style="width: 8%;border:1px solid #000;">
															<center>विलंब शुल्क</center>
														</td>
														<td style="width: 8%;border:1px solid #000;">
															<center>एकूण शुल्क</center>
														</td>
														<td colspan="2" style="width: 22%;border:1px solid #000;">
															<center>नुतानिकरनाची मुदत</center>
														</td>
														<td style="width: 20%;border:1px solid #000;">
															<center>अधिकाऱ्याची सही व शिक्का</center>
														</td>

													</tr>


													<tr>
														<td colspan="6" style="border:1px solid #000;">
															<center></center>
														</td>

														<td style="width: 11%;border:1px solid #000;">
															<center>पासून</center>
														</td>
														<td style="width: 11%;border:1px solid #000;">
															<center>पर्यंत</center>
														</td>
														<td style="width: 20%;border:1px solid #000;">
															<center></center>
														</td>

													</tr>
												</thead>
												<tbody id="c_table_renew">
													<tr>
														<td colspan="9" style="border:1px solid #000;">
															<center>.</center>
														</td>


													</tr>

												</tbody>
											</table>


											<table id="tbl_1" style="width:100%;padding-left:2%;padding-right:2%;font-size:10px">
												<tbody>

													<tr>
														<td colspan="2" style="margin-top: -1%;padding-left: 2%;">
															<b> अटी व शर्ती :-</b>
														</td>



													</tr>

													<tr>
														<td style="width: 10%;;margin-top: -1%;padding-left: 2%;">
															<b> 1.</b> </td>

														<td style="width: 90%;;margin-top: -1%;padding-left: 2%;">
															<b> परवाना दर्शनी भागावर लावण्यात यावा.</b> </td>
													</tr>
													<tr>
														<td style="width: 10%;;margin-top: -1%;padding-left: 2%;">
															<b> 2.</b> </td>

														<td style="width: 90%;;margin-top: -1%;padding-left: 2%;">
															<b> अनुज्ञाप्तीधारकाची ह्या अनुज्ञाप्तीचे नवीकरणाचा अर्ज अनुज्ञाप्तीची मुदत ज्या वर्षात संपत असेल त्या वर्षाच्या आर्थिक वर्ष समाप्ती पूर्वी सादर करण्यात यावे.</b> </td>
													</tr>
													<tr>
														<td style="width: 10%;;margin-top: -1%;padding-left: 2%;">
															<b> 3.</b> </td>

														<td style="width: 90%;;margin-top: -1%;padding-left: 2%;">
															<b>हा परवाना देण्यात आल्यामुळे ज्या वास्तुत हे दुकान/आस्थाप्ना/व्यवसाय स्थित आहे त्या वास्तूला/दुकानाला वैधता बहाल होत नाही. या परवाना/नोंदणीचा उपयोग जागेच्या मालकी हक्का बाबत पुरावा म्हणून करता येणार नाही. तसेच ज्या वास्तूत हे दुकान/आस्थापना/व्यवसाय स्थित आहे ती वस्तू आजच्या दिनांक/वेळात अस्थित्वात असल्यासंबंधात मनपा परवाना नोंदणीमुळे कोणताही हक्क व स्वामित्व सदरहु परवाना/नोंदणी धारकास प्राप्त होत नाही.</b> </td>
													</tr>
													<tr>
														<td style="width: 10%;;margin-top: -1%;padding-left: 2%;">
															<b> 4.</b> </td>

														<td style="width: 90%;;margin-top: -1%;padding-left: 2%;">
															<b> नोंदणी/परवाना बाबत वाद निर्माण झाल्यास कोणतेही कारण न दर्शविता सदरचा परवाना रद्द करण्याचे अधिकार मा.आयुक्त यांना आहेत. </b> </td>
													</tr>
													<tr>
														<td style="width: 10%;;margin-top: -1%;padding-left: 2%;">
															<b> 5.</b> </td>

														<td style="width: 90%;;margin-top: -1%;padding-left: 2%;">
															<b> नोंदणी/परवाना धारकांनी विहित मुदतीत परवाना नुतनीकरण न केल्यास रु. १०/- विलंब शुल्क आकारण्यात येईल.</b> </td>
													</tr>
													<tr>
														<td style="width: 10%;;margin-top: -1%;padding-left: 2%;">
															<b> 6.</b> </td>

														<td style="width: 90%;;margin-top: -1%;padding-left: 2%;">
															<b> अनधिकृत बांधकाम असल्यास नोंदणी/परवाना देण्यात आल्यामुळे अनधिकृत बांधकाम नियमित झाले असे समजण्यात येऊ नये. परवाना देण्यात आल्यामुळे महानगरपालिकेस कायद्याने असलेल्या अनधिकृत बांधकामाविरुद्ध करावयाच्या कायदेशीर/हरकतीस कोणतीही बाधा येत नाही.</b> </td>
													</tr>
													<tr>
														<td style="width: 10%;;margin-top: -1%;padding-left: 2%;">
															<b> 7.</b> </td>

														<td style="width: 90%;;margin-top: -1%;padding-left: 2%;">
															<b> सदर परवान्यामध्ये मानवी तथा संगणकीय चूक असल्यास सुधारित परवाना देण्याचे अधिकार राखून ठेवण्यात येत आहे.</b> </td>
													</tr>


												</tbody>
											</table>
										</div>
										<div class="btn-group pull-left">
											<input type="hidden" id="appointment_id" value="">
											<a class="printPage btn btn-primary" href="#">Print</a>

										</div>
									</form>
								</div>
							</div>

						</div>
					</div>
					<!-------------end of form3----------------------------------->
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
		$('a.printPage').click(function() {
			var divToPrint = document.getElementById("form3_certificate");
			newWin = window.open("");
			newWin.document.write(divToPrint.outerHTML);
			newWin.print();
			// window.open("");
			newWin.close();
		});
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
