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
				<li class="active">Death Registration</li>
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
								<h3 class="panel-title">Code Id : 14 Death Registration</h3>
								<ul class="panel-controls">
									<li> <button class="btn btn-success btnhideshow" style="background-color:#00B050;">
											Add Detail</button></li>
								</ul>
							</div>
							<div class="panel-body">
								<?php

								if ($this->session->role == "staff" || $this->session->role == "admin") {
								?>
									<div class="col-lg-12 ">
										<form action="" name="filter_form" id="filter_form">
											<div class="form-group row">
												<div class="col-md-1">
													<label class="control-label"> Zone</label>
												</div>
												<div class="col-md-3">
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
											</div>
											<div class="form-group row">
												<div class="col-md-1">
													<label class="control-label"> From Date</label>
												</div>
												<div class="col-md-3">
												<div class="input-group date " data-provide="datepicker" required>
														<input type="text" class="form-control input-sm placeholdesize date1" placeholder="From Date" id="from_filter" autocomplete="off" name="from_filter" >
														<div class="input-group-addon">
															<span class="fa fa-calendar"></span>
														</div>
													</div>
												</div>
												<div class="col-md-1">
													<label class="control-label"> To Date</label>
												</div>
												<div class="col-md-3">
												<div class="input-group date " data-provide="datepicker" required>
														<input type="text" class="form-control input-sm placeholdesize date1" placeholder="To Date" id="to_filter" autocomplete="off" name="to_filter" >
														<div class="input-group-addon">
															<span class="fa fa-calendar"></span>
														</div>
													</div>
												</div>
												<div class="col-md-1">
												<label class="control-label"> Name</label>
												</div>
												<div class="col-md-3">
												<input type="text" name="name_filter" id="name_filter" class="form-control" placeholder="Name">
												</div>
											</div>

											<div class="form-group row">
										
												<div class="col-md-1">
													<label class="control-label"> Registration Number</label>
												</div>
												<div class="col-md-3">
												<input type="text" name="regno_filter" id="regno_filter" class="form-control" placeholder="Registration Number">
												</div>
												<div class="col-md-1">
													
												</div>
												<div class="col-md-3">
												<button type="submit" class="btn btn-warning">Filter</button>

												</div>
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
					</div>
				</div>
				<!--NEWS SECTION END-->
				<!-- strat notification -->
				<div class="row formhideshow">
					<div class="col-md-12 col-sm-12 col-xs-12 right_side" id="form1" style="display:none;">
						<!-- START SIMPLE DATATABLE -->
						<div class="panel panel-default">
							<div class="panel-heading">
								<!-- <h3 class="panel-title">Information</h3> -->
								<div class="pull-right">
									<button class="btn btn-success closehideshow" style="background-color:#00B050;">View
										Detail</button>
								</div>
							</div>
							<div class="panel-body">
								<div class="col-lg-12">
									<form class="form-horizontal" id="master_form" name="master_form">
										<div class="row">
											<div class="form-group">
												<div class="col-sm-3">
													<label>अर्जदार :*</label>
												</div>
												<div class="col-sm-3">
													<input type="text" id="applicant" name="applicant" class="form-control" placeholder="अर्जदार " required>
												</div>
												<div class="col-sm-3">
													<label>पत्ता :*</label>
												</div>
												<div class="col-sm-3">

													<textarea rows="1" id="address" name="address" class="form-control" style="height:34px;" placeholder="पत्ता" required></textarea>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<div class="col-sm-3">
													<label>माझ्या :*</label>
												</div>
												<div class="col-sm-3">
													<input type="text" id="my_relation" name="my_relation" class="form-control" placeholder="माझ्या" required>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="form-group">
												<div class="col-sm-3">
													<label>नोंदणी क्रमांक :*</label>
												</div>
												<div class="col-sm-3">
													<input type="text" id="reg_no" name="reg_no" class="form-control" placeholder="नोंदणी क्रमांक" required>
												</div>
												<div class="col-sm-3">
													<label>नोंदणी दिनांक:*</label>
												</div>
												<div class="col-sm-3">
													<div class="input-group date " data-provide="datepicker">

														<input type="text" class="form-control input-sm placeholdesize date1" id="reg_date" name="reg_date" autocomplete="off" required>

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
													<label>मृतकाचे पूर्ण नाव :*</label>
												</div>
												<div class="col-sm-3">
													<input type="text" id="name_deceased_m" name="name_deceased_m" class="form-control" placeholder="मृतकाचे पूर्ण नाव" required>
												</div>
												<div class="col-sm-3">
													<label>Full Name of Deceased:*</label>
												</div>
												<div class="col-sm-3">
													<input type="text" id="name_deceased" name="name_deceased" class="form-control" placeholder="Full Name of Deceased" required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<div class="col-sm-3">
													<label>लिंग :*</label>
												</div>
												<div class="col-sm-3">
													<div class="form-check form-check-inline ">


														<input class="form-check-input" type="radio" name="gender_m" id="men_m" value="पुरुष">पुरुष



														<input class="form-check-input" type="radio" name="gender_m" id="woman_m" value="स्त्री">स्त्री


													</div>
												</div>
												<div class="col-sm-3">
													<label>Gender:*</label>
												</div>
												<div class="col-sm-3">
													<div class="form-check form-check-inline ">


														<input class="form-check-input" type="radio" name="gender" id="men" value="Male" />Male

														<input class="form-check-input" type="radio" name="gender" id="woman" value="Female" />Female

													</div>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="form-group">
												<div class="col-sm-3">
													<label>मृतकाचे वडील /पतीचे पूर्ण नाव :*</label>
												</div>
												<div class="col-sm-3">
													<input type="text" id="deceased_name_husbund_m" name="deceased_name_husbund_m" class="form-control" placeholder="मृतकाचे वडील /पतीचे पूर्ण नाव" required>
												</div>
												<div class="col-sm-3">
													<label>Full name of Father / Husband of Deceased:*</label>
												</div>
												<div class="col-sm-3">
													<input type="text" id="deceased_name_husbund" name="deceased_name_husbund" class="form-control" placeholder="Full name of Father / Husband of Deceased" required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<div class="col-sm-3">
													<label>मृतकाच्या आईचे नाव :*</label>
												</div>
												<div class="col-sm-3">
													<input type="text" id="deceased_name_mother_m" name="deceased_name_mother_m" class="form-control" placeholder="मृतकाच्या आईचे नाव" required>
												</div>
												<div class="col-sm-3">
													<label>Full name of Mother of Deceased:*</label>
												</div>
												<div class="col-sm-3">
													<input type="text" id="deceased_name_mother" name="deceased_name_mother" class="form-control" placeholder="Full name of Mother of Deceased" required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<div class="col-sm-3">
													<label>मृत्यू तारीख :*</label>
												</div>
												<div class="col-sm-3">
													<div class="input-group date " data-provide="datepicker">

														<input type="text" class="form-control input-sm placeholdesize date1" id="dod" name="dod" autocomplete="off" required>

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
													<label>मृत्यू ठिकाण(दवाखाना /घरी /इतर) :*</label>
												</div>
												<div class="col-sm-3">
													<input type="text" id="death_place_m" name="death_place_m" class="form-control" placeholder="मृत्यू ठिकाण(दवाखाना /घरी /इतर) " required>
												</div>
												<div class="col-sm-3">
													<label>Place Of Death(Hospital /Home /Others):*</label>
												</div>
												<div class="col-sm-3">
													<input type="text" id="death_place" name="death_place" class="form-control" placeholder="Place Of Death(Hospital /Home /Others) " required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<div class="col-sm-3">
													<label>मृतकाचे राहण्याचा कायमचा पत्ता :*</label>
												</div>
												<div class="col-sm-3">
													<textarea rows="1" id="parmanent_address_deceased_m" name="parmanent_address_deceased_m" class="form-control" style="height:34px;" placeholder="मृतकाचे राहण्याचा कायमचा पत्ता" required></textarea>

												</div>
												<div class="col-sm-3">
													<label>Permanent address of Deceased:*</label>
												</div>
												<div class="col-sm-3">

													<textarea rows="1" id="parmanent_address_deceased" name="parmanent_address_deceased" class="form-control" style="height:34px;" placeholder="Permanent address of Deceased" required></textarea>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="form-group">
												<div class="col-sm-3">
													<label>मृतकाचे मृत्युसमयीचा पत्ता :*</label>
												</div>
												<div class="col-sm-3">

													<textarea rows="1" id="at_time_address_deceased_m" name="at_time_address_deceased_m" class="form-control" style="height:34px;" placeholder="मृतकाचे मृत्युसमयीचा पत्ता" required></textarea>
												</div>

												<div class="col-sm-3">
													<label>Address of Deceased at the time of death:*</label>
												</div>
												<div class="col-sm-3">
													<textarea rows="1" id="at_time_address_deceased" name="at_time_address_deceased" class="form-control" style="height:34px;" placeholder="Address of Deceased at the time of death" required></textarea>

												</div>
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<div class="col-sm-3">
													<label>अंतिम संस्काराचे ठिकाण :*</label>
												</div>
												<div class="col-sm-3">
													<input type="text" id="place_funeral_m" name="place_funeral_m" class="form-control" placeholder="अंतिम संस्काराचे ठिकाण" required>
												</div>
												<div class="col-sm-3">
													<label>शेरा / Remarks:</label>
												</div>
												<div class="col-sm-3">
													<input type="text" id="remarks" name="remarks" class="form-control" placeholder="शेरा / Remarks">
												</div>
											</div>
										</div>
								</div>
							</div>
							<div class="btn-group pull-left">
								<input type="hidden" id="save_update" value="">
								<button class="btn btn-primary" type="submit">Save</button>
								</form>
								<button class="btn btn-info " id="reset">Reset</button>
							</div>
						</div>
						<!--panel panel default-->
						<!-- END SIMPLE DATATABLE -->
					</div>
					<!------------------------form1-end------------------------------->
					<!------------------------form2-start------------------------------->
					<div class="col-md-12 col-sm-12 col-xs-12 right_side" id="form2" style="display:none;">
						<!-- START SIMPLE DATATABLE -->
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Checklist</h3>
								<div class="pull-right">
									<button class="btn btn-success closehideshow" style="background-color:#00B050;">View
										Detail</button>
								</div>
							</div>
							<div class="panel-body">
								<div class="col-lg-12">
									<form class="form-horizontal" id="master_form2" name="master_form2">
										<input type="hidden" id="chk_list_form" value="">
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
														<td>ID Proof*</td>
														<td align="center"><input type="checkbox" name="chk_id_proof" id="chk_id_proof">
														</td>
														<td align="center"> <input type="file" id="attachment1" name="attachment1" accept="*" style="padding:0px;border:0; display:none;">
															<input type="hidden" id="file_attachother1" class="file_attachother1" value="" />
															<div id="msg1" class="msg1"></div>
														</td>
														<td align="center">
															<div id="down1"></div>
														</td>
													</tr>
													<tr>
														<td>2</td>
														<td>In One Year<br>1)Certificate of Delivery
															Handle by<br>2)Affidavit</td>
														<td align="center"><input type="checkbox" name="chk_cer_delivery" id="chk_cer_delivery"><br><br><input type="checkbox" name="chk_affidavit" id="chk_affidavit"></td>
														<td align="center"><input type="file" id="attachment2" name="attachment2" accept="*" style="padding:0px;border:0; display:none;">
															<input type="hidden" id="file_attachother2" class="file_attachother2" value="" />
															<div id="msg2" class="msg2"></div><br><input type="file" id="attachment3" name="attachment3" accept="*" style="padding:0px;border:0;display:none;">
															<input type="hidden" id="file_attachother3" class="file_attachother3" value="" />
															<div id="msg3" class="msg3"></div>
														</td>
														<td align="center">
															<div id="down2"></div><br><br>
															<div id="down3"></div>
														</td>
													</tr>
													<tr>
														<td>3</td>
														<td>After One Year<br>1)NOC Certificate<br>2)Court
															Registration<br>3)Aadesh Patr</td>
														<td align="center"><input type="checkbox" name="chk_noc" id="chk_noc"><br><br><input type="checkbox" name="chk_court_reg" id="chk_court_reg"><br><br><input type="checkbox" name="chk_order" id="chk_order"></td>
														<td align="center"><input type="file" id="attachment4" name="attachment4" accept="*" style="padding:0px;border:0;display:none;">
															<input type="hidden" id="file_attachother4" class="file_attachother4" value="" />
															<div id="msg4" class="msg4"></div><br><input type="file" id="attachment5" name="attachment5" accept="*" style="padding:0px;border:0;display:none;">
															<input type="hidden" id="file_attachother5" class="file_attachother1" value="" />
															<div id="msg5" class="msg5"></div><br><input type="file" id="attachment6" name="attachment6" accept="*" style="padding:0px;border:0;display:none;">
															<input type="hidden" id="file_attachother6" class="file_attachother6" value="" />
															<div id="msg6" class="msg6"></div>
														</td>
														<td align="center">
															<div id="down4"></div><br /><br />
															<div id="down5"></div><br /><br />
															<div id="down6"></div>
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
					<!------------------------form2-end------------------------------->
					<!------------------------form3-start------------------------------->
					<div class="col-md-12 col-sm-12 col-xs-12 right_side" id="form3" style="display:none;">
						<!-- START SIMPLE DATATABLE -->
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Appointment</h3>
								<div class="pull-right">
									<button class="btn btn-success closehideshow" style="background-color:#00B050;">View
										Detail</button>
								</div>
							</div>
							<div class="panel-body">
								<div class="col-lg-12">
									<form class="form-horizontal" id="master_form3" name="master_form3">
										<div class="row">
											<input type="hidden" id="register_id" value="">
											<div class="form-group">
												<div class="col-sm-3">
													<label>Registration No*</label>
												</div>
												<div class="col-sm-3">
													<input type="text" id="registration_no3" name="registration_no3" class="form-control" placeholder="Registration No" required disabled>
												</div>
												<div class="col-sm-3">
													<label>Applicant's Mobile Number*</label>
												</div>
												<div class="col-sm-3">
													<input type="number" style="text-align:right;" id="applicant_mno3" name="applicant_mno3" class="form-control" placeholder="Applicant's Mobile number" required disabled>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<div class="col-sm-3">
													<label>Date*</label>
												</div>
												<div class="col-sm-3">
													<div class="input-group date " data-provide="datepicker" required>
														<input type="text" class="form-control input-sm placeholdesize date1" id="appo_date" autocomplete="off" name="appo_date" required>
														<div class="input-group-addon">
															<span class="fa fa-calendar"></span>
														</div>
													</div>
												</div>
												<div class="col-sm-3">
													<label>Time*</label>
												</div>
												<div class="col-sm-3">
													<div class="input-group clockpicker" data-placement="top" data-align="left" data-donetext="Done">
														<input type="text" class="form-control" id="time" name="time" required>
														<span class="input-group-addon">
															<span class="glyphicon glyphicon-time"></span>
														</span>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<div class="col-sm-3">
													<label>Message</label>
												</div>
												<div class="col-sm-3">
													<textarea id="message" name="message" class="form-control" placeholder="Message"></textarea>
												</div>
											</div>
										</div>
								</div>
							</div>
							<div class="btn-group pull-left">
								<input type="hidden" id="appointment_id" value="">
								<button class="btn btn-primary" type="submit">Submit</button>
								</form>
							</div>
						</div>
						<!--panel panel default-->
						<!-- END SIMPLE DATATABLE -->
					</div>
					<!---form3 end---->
					<!------------------------form4-start------------------------------->
					<div class="col-md-12 col-sm-12 col-xs-12 right_side" id="form4" style="display:none;">
						<!-- START SIMPLE DATATABLE -->
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Application Form</h3>
								<div class="pull-right">
									<button class="btn btn-success closehideshow" style="background-color:#00B050;">View
										Detail</button>
								</div>
							</div>
							<div class="panel-body">
								<div class="col-lg-12">
									<form class="form-horizontal" id="master_form4" name="master_form4">
										<div class="row">
											<div class="form-group">
												<div class="col-sm-3">
													<label>Name of Child</label>
												</div>
												<div class="col-sm-3">
													<input type="text" id="name_child1" name="name_child1" class="form-control" placeholder="Name of Child">
												</div>
												<div class="col-sm-3">
													<label>बाळाचे नाव</label>
												</div>
												<div class="col-sm-3">
													<input type="text" id="name_child2" name="name_child2" class="form-control" placeholder="बाळाचे नाव" required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<div class="col-sm-3">
													<label>Name of Mother*</label>
												</div>
												<div class="col-sm-3">
													<input type="text" id="name_mother1" name="name_mother1" class="form-control" placeholder="Name of Mother" required disabled>
												</div>
												<div class="col-sm-3">
													<label>आईचे पूर्ण नाव*</label>
												</div>
												<div class="col-sm-3">
													<input type="text" id="name_mother2" name="name_mother2" class="form-control" placeholder="आईचे पूर्ण नाव" required disabled>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<div class="col-sm-3">
													<label>Name of Father*</label>
												</div>
												<div class="col-sm-3">
													<input type="text" id="name_father1" name="name_father1" class="form-control" placeholder="Name of Father" required disabled>
												</div>
												<div class="col-sm-3">
													<label>वडिलांचे पूर्ण नाव*</label>
												</div>
												<div class="col-sm-3">
													<input type="text" id="name_father2" name="name_father2" class="form-control" placeholder="वडिलांचे पूर्ण नाव" required disabled>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<div class="col-sm-3">
													<label>Address of Parent*</label>
												</div>
												<div class="col-sm-3">
													<textarea id="address_app1" name="address_app1" class="form-control" placeholder="Address of Parent" required></textarea>
												</div>
												<div class="col-sm-3">
													<label>पालकांचा कायमचा पत्ता*</label>
												</div>
												<div class="col-sm-3">
													<textarea id="address_app2" name="address_app2" class="form-control" placeholder="पालकांचा कायमचा पत्ता" required></textarea>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<div class="col-sm-3">
													<label>Birth place*</label>
												</div>
												<div class="col-sm-3">
													<input type="text" id="birth_place1" name="birth_place1" class="form-control" placeholder="Birth place" required disabled>
												</div>
												<div class="col-sm-3">
													<label>जन्म स्थान*</label>
												</div>
												<div class="col-sm-3">
													<input type="text" id="birth_place11" name="birth_place11" class="form-control" placeholder="जन्म स्थान" required disabled>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<div class="col-sm-3">
													<label>जन्म दिनांक*</label>
												</div>
												<div class="col-sm-3">
													<div class="input-group date " data-provide="datepicker" required>
														<input type="text" class="form-control input-sm placeholdesize date1" id="app_dob" autocomplete="off" name="app_dob" disabled>
														<div class="input-group-addon">
															<span class="fa fa-calendar"></span>
														</div>
													</div>
												</div>
												<div class="col-sm-3">
													<label>लिंग*</label>
												</div>
												<div class="col-sm-3">
													<div class="form-check form-check-inline ">
														<div class="col-sm-1">
															<input class="form-check-input" type="radio" name="redio_app" id="men_app" value="men"></div>
														<div class="col-sm-2" style="margin-left:-2%;">
															<label class="form-check-label" for="gender_men">पुरुष</label>
														</div>
													</div>
													<div class="form-check form-check-inline">
														<div class="col-sm-1">
															<input class="form-check-input" type="radio" name="redio_app" id="woman_app" value="woman"></div>
														<div class="col-sm-1" style="margin-left:-2%;">
															<label class="form-check-label" for="gender_woman">
																स्त्री</label>
														</div>
													</div>
												</div>
											</div>
										</div>
								</div>
							</div>
							<div class="btn-group pull-left">
								<input type="hidden" id="application_id" value="">
								<button class="btn btn-primary" type="submit">Save</button>
								</form>
							</div>
						</div>
						<!--panel panel default-->
						<!-- END SIMPLE DATATABLE -->
					</div>
					<!---form4 end---->
					<!------------------------form5-start------------------------------->
					<div class="col-md-12 col-sm-12 col-xs-12 right_side" id="form5" style="display:none;">
						<!-- START SIMPLE DATATABLE -->
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Death Registration slip</h3>
								<div class="pull-right">
									<button class="btn btn-success closehideshow" style="background-color:#00B050;">View
										Detail</button>
								</div>
							</div>
							<form class="form-horizontal" id="master_form5" name="master_form5">
								<div class="panel-body" id="death_registration_slip">
									<div class="col-lg-12">

										<div id="divToPrint">
											<center>
												<table frame="box" id="tbl_1" style="margin-top: 1%;width:100%;height:111px">
													<tbody>
														<tr>
															<td rowspan="2" style="width:20%;"><img src="<?php echo base_url(); ?>images/cmc.jpg" style="margin-left: 5%;height: 88px;">
															</td>
															<th style="padding-top: 1%;font-size:26px;">
																<font style="vertical-align: inherit;">
																	<font style="vertical-align: inherit;">
																		Chandrapur City Municipality
																	</font>
																</font>
															</th>
															<td style="width:20%;"></td>
														</tr>
														<tr>
															<td style="padding-bottom: 1%;padding-left: 17%;font-size:20px;">
																<font style="vertical-align: inherit;">
																	<font style="vertical-align: inherit;">
																		Health department </font>
																</font>
															</td>
															<td style="width:20%;"></td>
														</tr>
													</tbody>
												</table>
											</center>
											<center>
												<table frame="box" id="tbl_2" style="width:100%">
													<tbody>
														<tr>
															<th colspan="4" style="padding-top: 1%;">
																<center>
																	<font style="vertical-align: inherit;">
																		<font style="vertical-align: inherit;">
																			Death registration</font>
																	</font>
																</center>
															</th>
														</tr>
														<tr>
															<td colspan="4">
																<center>
																	<font style="vertical-align: inherit;">
																		<font style="vertical-align: inherit;">
																			DEATH REGISTRATION SLIP
																		</font>
																	</font>
																	<center> </center>
																</center>
															</td>
														</tr>
														<tr>
															<td colspan="4">&nbsp;</td>
														</tr>
														<tr>
															<td colspan="2" class="tbl_data">
																<font style="vertical-align: inherit;">
																	<font style="vertical-align: inherit;">
																		मृतकाचे नोंदणी खालीलप्रमाणे </font>
																</font>
															</td>
															<td colspan="2">&nbsp;</td>
														</tr>
														<tr>
															<td colspan="2" class="tbl_data">
																<font style="vertical-align: inherit;">
																	<font style="vertical-align: inherit;">
																		The registration details of Deceased is as
																		follows</font>
																</font>
															</td>
															<td colspan="2">&nbsp;</td>
														</tr>
														<tr>
															<td colspan="4">&nbsp;</td>
														</tr>
														<tr>
															<td class="tbl_data">
																<font style="vertical-align: inherit;">
																	<font style="vertical-align: inherit;">
																		नोंदणी क्रमांक :</font>
																</font>
															</td>
															<td class="tbl_data b_regno1" id="b_regno1">

															</td>
															<td class="tbl_data">
																<font style="vertical-align: inherit;">
																	<font style="vertical-align: inherit;">
																		नोंदणी दिनांक : :</font>
																</font>
															</td>
															<td class="tbl_data b_regdate1" id="b_regdate1">

															</td>
														</tr>
														<tr>
															<td class="tbl_data">
																<font style="vertical-align: inherit;">
																	<font style="vertical-align: inherit;">
																		Registration No. </font>
																	<font style="vertical-align: inherit;">
																		:</font>
																</font>
															</td>
															<td class="tbl_data b_regno1" id="b_regno2"></td>
															<td class="tbl_data">
																<font style="vertical-align: inherit;">
																	<font style="vertical-align: inherit;">
																		Registration Date:</font>
																</font>
															</td>
															<td class="tbl_data b_regdate1" id="b_regdate2">

															</td>
														</tr>
														<tr>
															<td colspan="4">&nbsp;</td>
														</tr>
														<tr>
															<td class="tbl_data">
																<font style="vertical-align: inherit;">
																	<font style="vertical-align: inherit;">
																		मृताचे नाव :</font>
																</font>
															</td>
															<td class="tbl_data name_deceased_m" id="name_deceased_m">
															</td>
															<td class="tbl_data">
																<font style="vertical-align: inherit;">
																	<font style="vertical-align: inherit;">
																		लिंग :</font>
																</font>
															</td>
															<td class="tbl_data b_gender1" id="b_gender1">

															</td>
														</tr>
														<tr>
															<td class="tbl_data">
																<font style="vertical-align: inherit;">
																	<font style="vertical-align: inherit;">
																		Name of Deceased:</font>
																</font>
															</td>
															<td class="tbl_data name_deceased" id="name_deceased"></td>
															<td class="tbl_data">
																<font style="vertical-align: inherit;">
																	<font style="vertical-align: inherit;">
																		Gender:</font>
																</font>
															</td>
															<td class="tbl_data b_gender2" id="b_gender2">

															</td>
														</tr>
														<tr>
															<td colspan="4">&nbsp;</td>
														</tr>
														<tr>
															<td class="tbl_data">
																<font style="vertical-align: inherit;">
																	<font style="vertical-align: inherit;">
																		मृत्यु दिनांक :</font>
																</font>
															</td>
															<td class="tbl_data b_dob1" id="b_dob1">

															</td>
															<td class="tbl_data">
																<font style="vertical-align: inherit;">
																	<font style="vertical-align: inherit;">
																		मृत्यूचे ठिकाण :</font>
																</font>
															</td>
															<td class="tbl_data death_place_m" id="death_place_m"></td>
														</tr>
														<tr>
															<td class="tbl_data">
																<font style="vertical-align: inherit;">
																	<font style="vertical-align: inherit;">
																		Date of Death:</font>
																</font>
															</td>
															<td class="tbl_data b_dob1" id="b_dob2">

															</td>
															<td class="tbl_data">
																<font style="vertical-align: inherit;">
																	<font style="vertical-align: inherit;">
																		Place of Death:</font>
																</font>
															</td>
															<td class="tbl_data death_place" id="death_place_m"></td>
														</tr>
														<tr>
															<td colspan="4">&nbsp;</td>
														</tr>
														<tr>
															<td class="tbl_data">
																<font style="vertical-align: inherit;">
																	<font style="vertical-align: inherit;">
																		आईचे पूर्ण नाव :</font>
																</font>
															</td>
															<td class="tbl_data mother_name_deceased_m" id="mother_name_deceased_m"></td>

															<td class="tbl_data">
																<font style="vertical-align: inherit;">
																	<font style="vertical-align: inherit;">
																		वडिलांचे/ पतीचे पूर्ण नाव :</font>
																</font>
															</td>

															<td class="tbl_data father_name_deceased_m" id="father_name_deceased_m"></td>
														</tr>
														<tr>
															<td class="tbl_data">
																<font style="vertical-align: inherit;">
																	<font style="vertical-align: inherit;">
																		Name of Mother:</font>
																</font>
															</td>

															<td class="tbl_data b_mname2" id="b_mname2"></td>
															<td class="tbl_data">
																<font style="vertical-align: inherit;">
																	<font style="vertical-align: inherit;">
																		Father’s / Husband Name:</font>
																</font>
															</td>

															<td class="tbl_data b_fname2" id="b_fname2"></td>
														</tr>
														<tr>
															<td colspan="4">&nbsp;</td>
														</tr>
														<tr>
															<td colspan="2" class="tbl_data">
																<font style="vertical-align: inherit;">
																	<font style="vertical-align: inherit;">
																		मयत व्यक्तीचा मृत्युसमयीचा पत्ता :</font>
																</font>
															</td>
															<td colspan="2" class="tbl_data">
																<font style="vertical-align: inherit;">
																	<font style="vertical-align: inherit;">
																		मयत व्यक्तीचा कायमचा पत्ता :
																	</font>
																</font>
															</td>
														</tr>
														<tr>
															<td class="tbl_data address_at_deceased_m" id="address_at_deceased_m">
															</td>
															<td class="tbl_data parmanent_address_deceased_m" id="parmanent_address_deceased_m">
															</td>
														</tr>
														<tr>
															<td colspan="4">&nbsp;</td>
														</tr>
														<tr>
															<td class="tbl_data">
																<font style="vertical-align: inherit;">
																	<font style="vertical-align: inherit;">
																		Address of Deceased at the time of death:</font>
																</font>
															</td>
															<td class="tbl_data address_at_deceased" id="address_at_deceased">
															</td>
															<td class="tbl_data">
																<font style="vertical-align: inherit;">
																	<font style="vertical-align: inherit;">
																		Permanent address of Deceased:
																	</font>
																</font>
															</td>
															<td class="tbl_data parmanent_address_deceased" id="parmanent_address_deceased">
															</td>
														</tr>

														<tr>
															<td colspan="4">&nbsp;</td>
														</tr>
														<tr>
															<td class="tbl_data">
																<font style="vertical-align: inherit;">
																	<font style="vertical-align: inherit;">
																		शेरा / Remark:
																	</font>
																</font>
															</td>
															<td class="tbl_data remarks" id="remarks">&nbsp;
															</td>
														</tr>
														<tr>
															<td colspan="4">&nbsp;</td>
														</tr>

														<tr>
															<td class="tbl_data">
																<font style="vertical-align: inherit;">
																	<font style="vertical-align: inherit;">
																		प्रमाणपत्र दिल्याचा दिनांक:</font>
																</font>
															</td>
															<!--<td class="tbl_data">0000-00-00</td>-->
															<td class="tbl_data issue_date">

															</td>
															<td>&nbsp;</td>
														</tr>
														<tr>
															<td class="tbl_data">
																<font style="vertical-align: inherit;">
																	<font style="vertical-align: inherit;">
																		Date of Issue of Registration
																		Slip:</font>
																</font>
															</td>
															<!--<td class="tbl_data">0000-00-00</td>-->
															<td class="tbl_data issue_date" id="issue_date">

															</td>
															<td>&nbsp;</td>
														</tr>
														<tr>
															<td colspan="4">&nbsp;</td>
														</tr>
														<tr>
															<td colspan="4">
																<table frame="box" style="width:98%;margin-left:1%;margin-right:1%;margin-bottom:1%;background-color: rgba(128, 128, 128, 0.41);">
																	<tbody>
																		<tr>
																			<td style="padding-left: 1%;">
																				<font style="vertical-align: inherit;">
																					<font style="vertical-align: inherit;">
																						"प्रत्येक जन्म व मृत्यूची घटना
																						नोंदवल्याची खात्री करा"
																					</font>
																				</font>
																			</td>
																			<td style="padding-left: 3%;">
																				<font style="vertical-align: inherit;">
																					<font style="vertical-align: inherit;">
																						"Ensure
																						Registration
																						of every
																						birth
																						&amp;
																						death"
																					</font>
																				</font>
																			</td>
																		</tr>
																	</tbody>
																</table>
															</td>
														</tr>
														<tr>
															<td colspan="4">
																<center><img alt="" src="<?php echo base_url(); ?>images/barcode.png"><br>
																	<font style="vertical-align: inherit;">
																		<font style="vertical-align: inherit;">
																			<label class="b_regno1"></label></font>
																	</font>
																</center>
															</td>
														</tr>
													</tbody>
												</table>
											</center>
										</div>
									</div>
								</div>
								<div class="btn-group pull-left">
									<input type="hidden" id="appointment_id" value="">
									<a class="printPagedeathslip btn btn-primary" href="#">Print</a>
							</form>
						</div>
					</div>
					<!--panel panel default-->
					<!-- END SIMPLE DATATABLE -->
				</div>
				<!---form5 end---->
				<!-----------------------form7--------------------------start------------------------------->
				<div class="col-md-12 col-sm-12 col-xs-12 right_side" id="form7" style="display:none;">
					<!-- START SIMPLE DATATABLE -->
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Certificate</h3>
							<div class="pull-right">
								<button class="btn btn-success closehideshow" style="background-color:#00B050;">View
									Detail</button>
							</div>
						</div>
						<div class="panel-body" id="form7_certificate">
							<div class="col-lg-12">
								<form class="form-horizontal" id="master_form5" name="master_form5">
									<div id="divToPrint">
										<center>
											<table frame="box" id="tbl_1" style="margin-top: 1%;width:100%;height:111px;padding-left:2%;padding-right:2%;">
												<tbody>
													<tr>
														<td style="width:20%;margin-top: -1%;padding-left: 2%;">
															<table style="width:100%;">
																<tbody>
																	<tr style="margin-bottom: 5%;">
																		<td>
																			<center>
																				<img src="<?php echo base_url(); ?>images/satya.jpg" style="float: left;padding-left: 20%;width: 35%;height:85px;">
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
																				<center><b style="font-size: 15px;">महाराष्ट्र
																						शासन</b></center>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<center><b style="font-size: 15px;">Government
																						of Maharashtra</b></center>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<center><b style="font-size: 15px;">आरोग्य
																						विभाग</b></center>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<center><b style="font-size: 15px;">Health
																						Department</b></center>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<center><b style="font-size: 15px;">
																						चंद्रपूर शहर महानगरपालिका </b>
																				</center>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<center><b style="font-size: 15px;">
																						Chandrapur City Municipal
																						Corporation </b></center>
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
																		<td>
																			<center>
																				<img src="<?php echo base_url(); ?>images/cmc.jpg" style="float: left;padding-left: 1%;width: 70%;height:105px;">
																			</center>
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
										</center>
										<center>
											<table frame="box" id="tbl_2" style="width:100%;padding-left:2%;padding-right:2%;">
												<tbody>
													<tr>
														<td colspan="4" style="font-size:13px;">
															<center>
																<font style="vertical-align: inherit;">
																	<font style="vertical-align: inherit;">
																		मृत्यु प्रमाणपत्र
																	</font>
																</font>
																<center> </center>
															</center>
														</td>
													</tr>
													<tr>
														<td colspan="4" style="font-size:13px;">
															<center>
																<font style="vertical-align: inherit;">
																	<font style="vertical-align: inherit;">
																		DEATH CERTIFICATE
																	</font>
																</font>
																<center> </center>
															</center>
														</td>
													</tr>
													<tr>
														<td colspan="4">&nbsp;</td>
													</tr>
													<tr style="padding-bottom:2%;">
														<td colspan="4" style="text-align:justify;font-size:11px;">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	( जन्म व मृत्यू नोंदणी अधिनियम, १९६९ च्या कलम १२/१७
																	आणि महाराष्ट्र जन्म आणि मृत्यू नोंदणी नियम, २००० चे
																	नियम ८/१३ अन्वये देण्यात आले आहे. )
																</font>
															</font>
														</td>
													</tr>
													<tr style="padding-bottom:2%;">
														<td colspan="4" style="text-align:justify;font-size:11px;">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	( Issued undersection 12/17 of the Registration of
																	Births & Deaths Act, 1969 and Rule 8/13 of the
																	Maharashtra Registraion of Births and Deaths Rules,
																	2000. )
																</font>
															</font>
														</td>
													</tr>
													<tr style="padding-bottom:2%;">
														<td colspan="4" style="text-align:justify;font-size:11px;">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	प्रमाणित करण्यात येते की, खालील माहिती मृत्यूच्या
																	मूळ अभिलेखाच्या नोंदवहीतून घेण्यात आली आहे, जी की
																	चंद्रपूर शहर महानगरपालिका, तालुका चंद्रपूर, जिल्हा
																	चंद्रपूर, महाराष्ट्र राज्याच्या नोंदवहीत उल्लेख आहे.
																</font>
															</font>
														</td>
													</tr>
													<tr>
														<td colspan="4" style="text-align:justify;font-size:11px;">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	This is to certify that the following information
																	has been taken from the original record of death
																	which is the register for Chandrapur City Municipal
																	Corporation, Chandrapur of Tahasil / Chadrapur of
																	District Chandrapur of MAHARASTRA State.
																</font>
															</font>
														</td>
													</tr>
													<tr>
														<td colspan="4">&nbsp;</td>
													</tr>
													<tr style="font-size:12px;">
														<td class="tbl_data" style="width:20%;">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	मृताचे नाव : </font>
															</font>
														</td>
														<td class="tbl_data " id="b_regdate1">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	<label class="deceased_name_m"></label></font>
															</font>
														</td>
														<td class="tbl_data" style="width:20%;">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	लिंग :</font>
															</font>
														</td>
														<td class="tbl_data " id="b_regdate1">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	<label class="gender_m"></label></font>
															</font>
														</td>
													</tr>
													<tr style="font-size:12px;">
														<td class="tbl_data" style="width:20%;">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	Full Name of Deceased :</font>
															</font>
														</td>
														<td class="tbl_data " id="b_regdate1">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	<label class="deceased_name"></label></font>
															</font>
														</td>
														<td class="tbl_data" style="width:20%;">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	Gender :</font>
															</font>
														</td>
														<td class="tbl_data" id="b_regdate1">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	<label class="gender"></label></font>
															</font>
														</td>
													</tr>
													<tr>
														<td colspan="4">&nbsp;</td>
													</tr>
													<tr style="font-size:12px;">
														<td class="tbl_data" style="width:20%;">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	मृत्यु दिनांक :</font>
															</font>
														</td>
														<td class="tbl_data" id="b_regno1">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	<label class="date_of_death"></label></font>
															</font>
														</td>
														<td class="tbl_data" style="width:20%;">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	मृत्यूचे ठिकाण :</font>
															</font>
														</td>
														<td class="tbl_data" id="b_regdate1">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	<label class="death_place_m"></label></font>
															</font>
														</td>
													</tr>
													<tr style="font-size:12px;">
														<td class="tbl_data" style="width:20%;">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	Date of Death: </font>
															</font>
														</td>
														<td class="tbl_data" id="b_regno1">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	<label class="date_of_death"></label></font>
															</font>
														</td>
														<td class="tbl_data" style="width:20%;">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	Place of Death:</font>
															</font>
														</td>
														<td class="tbl_data" id="b_regdate1">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	<label class="death_place"></label></font>
															</font>
														</td>
													</tr>
													<tr>
														<td colspan="4">&nbsp;</td>
													</tr>
													<tr style="font-size:12px;">
														<td class="tbl_data">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	आईचे पूर्ण नाव :</font>
															</font>
														</td>
														<td class="tbl_data" id="b_dob1">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	<label class="mother_name_m"></label></font>
															</font>
														</td>
														<td class="tbl_data">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	वडिलांचे/ पतीचे पूर्ण नाव :</font>
															</font>
														</td>
														<td class="tbl_data" id="b_dob1">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	<label class="father_name_m"></label></font>
															</font>
														</td>
													</tr>
													<tr style="font-size:12px;">
														<td class="tbl_data" style="width:20%;">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	Name of Mother :</font>
															</font>
														</td>
														<td class="tbl_data" id="b_dob1">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	<label class="mother_name"></label></font>
															</font>
														</td>
														<td class="tbl_data" style="width:20%;">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	Father’s / Husband Name :</font>
															</font>
														</td>
														<td class="tbl_data" id="b_dob1">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	<label class="father_name"></label></font>
															</font>
														</td>
													</tr>
													<tr>
														<td colspan="4">&nbsp;</td>
													</tr>
													<tr style="font-size:12px;">
														<td class="tbl_data" style="width:20%;" colspan="2">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	मयत व्यक्तीचा मृत्युसमयीचा पत्ता :</font>
															</font>
														</td>
														<td class="tbl_data" style="width:20%;" colspan="2">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	मयत व्यक्तीचा कायमचा पत्ता :</font>
															</font>
														</td>
													</tr>
													<tr style="font-size:12px;">
														<td class="tbl_data" id="b_dob1" colspan="2">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	<label class="address_at_deceased_m"></label></font>
															</font>
														</td>
														<td class="tbl_data" id="b_dob1" colspan="2">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	<label class="perminent_address_deceased_m"></label>
																</font>
															</font>
														</td>
													</tr>
													<tr style="font-size:12px;">
														<td class="tbl_data" style="width:20%;" colspan="2">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	Address of Deceased at the time of death:
																</font>
															</font>
														</td>
														<td class="tbl_data" style="width:20%;" colspan="2">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	Permanent address of Deceased:</font>
															</font>
														</td>
													</tr>
													<tr style="font-size:12px;">
														<td class="tbl_data" id="b_dob1" colspan="2">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	<label class="address_at_deceased"></label></font>
															</font>
														</td>
														<td class="tbl_data" id="b_dob1" colspan="2">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	<label class="perminent_address_deceased"></label>
																</font>
															</font>
														</td>
													</tr>
													<tr>
														<td colspan="4">&nbsp;</td>
													</tr>
													<tr style="font-size:12px;">
														<td class="tbl_data" style="width:20%;">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	नोंदणी क्रमांक :</font>
															</font>
														</td>
														<td class="tbl_data" id="b_dob1">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	<label class="reg_no"></label></font>
															</font>
														</td>
														<td class="tbl_data" style="width:20%;">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	नोंदणी दिनांक :</font>
															</font>
														</td>
														<td class="tbl_data" id="b_dob1">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	<label class="reg_date"></label></font>
															</font>
														</td>
													</tr>
													<tr style="font-size:12px;">
														<td class="tbl_data" style="width:20%;">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	Registration No.:</font>
															</font>
														</td>
														<td class="reg_no" id="b_dob1">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	<label class="perminent_address"></label></font>
															</font>
														</td>
														<td class="tbl_data" style="width:20%;">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	Registration Date:</font>
															</font>
														</td>
														<td class="tbl_data" id="b_dob1">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	<label class="reg_date"></label></font>
															</font>
														</td>
													</tr>
													<tr>
														<td colspan="4">&nbsp;</td>
													</tr>
													<tr style="font-size:12px;">
														<td class="tbl_data" colspan="1">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	शेरा / Remarks (If Any) :</font>
															</font>
														</td>
														<td class="tbl_data" id="b_dob1" colspan="3">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	<label class="remarks_m"></label>&nbsp;<label class="remarks"></label></font>
															</font>
														</td>
													</tr>
													<tr>
														<td colspan="4">&nbsp;</td>
													</tr>
													<tr style="font-size:12px;">
														<td class="tbl_data" colspan="1">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	प्रमाणपत्र दिल्याचा दिनांक :</font>
															</font>
														</td>
														<td class="tbl_data" id="b_dob1" colspan="3">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	<label class="date_of_issue"></label></font>
															</font>
														</td>
													</tr>
													<tr style="font-size:12px;">
														<td class="tbl_data" colspan="1">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	Date of Issue of Certificate :</font>
															</font>
														</td>
														<td class="tbl_data" id="b_dob1" colspan="3">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	<label class="date_of_issue"></label></font>
															</font>
														</td>
													</tr>
													<tr>
														<td colspan="4">&nbsp;</td>
													</tr>
													<tr style="font-size:12px;text-align:left;">
														<td class="tbl_data" rowspan="3" style="vertical-align:bottom;">
															<!-- <center> -->
															<!-- <font style="vertical-align: inherit;"> -->
															<!-- <font style="vertical-align: inherit;"> -->
															<!-- तयार करणार / तपासणार</font> -->
															<!-- </font> -->
															<!-- </center> -->
														</td>
														<td colspan="1">&nbsp;</td>
														<td class="tbl_data" colspan="2" style="text-align:left;padding-left:20%;">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	निर्गमित करणाऱ्या प्राधिकाऱ्याची सही</font>
															</font>
														</td>
													</tr>
													<tr style="font-size:12px;text-align:left;">
														<td colspan="1">&nbsp;</td>
														<td class="tbl_data" colspan="2" style="text-align:left;padding-left:20%;">

															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	Signature of the issuing Authority</font>
															</font>
														</td>
													</tr>
													<tr style="font-size:12px;text-align:left;">
														<td colspan="1">&nbsp;</td>
														<td class="tbl_data" colspan="2" style="text-align:left;padding-left:20%;">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	निबंधक जन्म व मृत्यू नोंद अधिकारी</font>
															</font>
														</td>
													</tr>
													<tr style="font-size:12px;text-align:left;">
														<td class="tbl_data" colspan="1" rowspan="3" style="vertical-align:top;">
															<!-- <center> -->
															<!-- <font style="vertical-align: inherit;"> -->
															<!-- <font style="vertical-align: inherit;"> -->
															<!-- जन्म व मृत्यू विभाग, चंशमनपा, चंद्रपूर</font> -->
															<!-- </font> -->
															<!-- </center> -->
														</td>
														<td colspan="1">&nbsp;</td>
														<td class="tbl_data" colspan="2" style="text-align:left;padding-left:20%;">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	प्राधिकाऱ्याचा पत्ता</font>

															</font>
														</td>
													</tr>
													<tr style="font-size:12px;text-align:left;">
														<td colspan="1">&nbsp;</td>
														<td class="tbl_data" colspan="2" style="text-align:left;padding-left:20%;">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	Address of the issuing Authority</font>
															</font>
														</td>
													</tr>
													<tr style="font-size:12px;text-align:left;">
														<td colspan="1">&nbsp;</td>
														<td class="tbl_data" colspan="2" style="text-align:left;padding-left:20%;">
															<font style="vertical-align: inherit;">
																<font style="vertical-align: inherit;">
																	चंद्रपूर शहर महानगरपालिका, चंद्रपूर</font>
															</font>
														</td>
													</tr>
													<tr>
													<tr>
														<td colspan="4">
															<table frame="box" style="width:98%;margin-left:1%;margin-right:1%;margin-bottom:1%;background-color: rgba(128, 128, 128, 0.41);">
																<tbody>
																	<tr>
																		<td style="padding-left: 1%;font-size:14px;">
																			<font style="vertical-align: inherit;">
																				<font style="vertical-align: inherit;">
																					"प्रत्येक जन्म व मृत्यूची घटना
																					नोंदवल्याची खात्री करा"
																				</font>
																			</font>
																		</td>
																		<td style="padding-left: 3%;">
																			<font style="vertical-align: inherit;">
																				<font style="vertical-align: inherit;">
																					"Ensure
																					Registration
																					of every
																					birth
																					&amp;
																					death"
																				</font>
																			</font>
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
													<tr>
														<td colspan="4" style="font-size:12px;">
															<center><img alt="" src="<?php echo base_url(); ?>images/barcode.png"><br>
																<font style="vertical-align: inherit;">
																	<font style="vertical-align: inherit;">
																		<label class="reg_no"></label></font>
																</font>
															</center>
														</td>
													</tr>
												</tbody>
											</table>
										</center>
									</div>
							</div>
						</div>
						<div class="btn-group pull-left">
							<input type="hidden" id="appointment_id" value="">
							<a class="printPage btn btn-primary" href="#">Print</a>
							</form>
						</div>
					</div>
					<!--panel panel default-->
					<!-- END SIMPLE DATATABLE -->
				</div>
				<!----------------------------------------form 7 end------------------------------->
				<!-------------------------------------------------------------------------------------------------------------------------->
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
	</script>
	<script src="<?php echo base_url(); ?>assets/js/myjs/death.js"></script>
	<!--fileupload Files -->
	<script src="<?php echo base_url() . 'assets/js/AjaxFileUpload.js' ?>"></script>
	<script type="text/javascript">
		$('.clockpicker').clockpicker();
	</script>
	<script>
		$('a.printPagedeathslip').click(function() {
			var divToPrint = document.getElementById("death_registration_slip");
			newWin = window.open("");
			newWin.document.write(divToPrint.outerHTML);
			newWin.print();
			newWin.close();
		});
	</script>
	<script>
		$('a.printPage').click(function() {
			var divToPrint = document.getElementById("form7_certificate");
			newWin = window.open("");
			newWin.document.write(divToPrint.outerHTML);
			newWin.print();
			newWin.close();
		});
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
