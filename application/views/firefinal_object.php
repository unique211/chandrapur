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
                    <li class="active">Fire Fighting Final No Objection Certificate</li>

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
                                        <h3 class="panel-title">Code Id : 03 Fire Fighting Final No Objection Certificate</h3>
                                       
                                        <ul class="panel-controls">

                                             <li> <button class="btn btn-success btnhideshow"
                                                       style="background-color:#00B050;"> Add Fire Fighting Final No Objection Certificate Detail</button></li>
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
                                                                      <input type="file" id="attachment2"
                                                                                name="attachment2" accept="*"
                                                                                style="padding:0px;border:0;">
                                                                           <input type="hidden" id="file_attachother2"
                                                                                class="file_attachother2" value="" />
                                                                           <div id="msg2" class="msg2"></div>
                                                                           </div> <!-- Modal footer -->
                                                                      <div class="modal-footer">
                                                                           <button type="button" class="btn btn-danger"
                                                                                data-dismiss="modal" id="close_model2">Close</button>
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
                    <div class="row  formhideshow" style="display:none">
                         <div class="col-md-12 col-sm-12 col-xs-12 right_side">
                              <!-- START SIMPLE DATATABLE -->
                              <div class="panel panel-default">
                                   <div class="panel-heading">
							<h3 class="panel-title">Code Id : 03 Fire Fighting Final No Objection Certificate</h3>
                                        <div class="pull-right">
                                             <button class="btn btn-success closehideshow"
                                                  style="background-color:#00B050;">View Fire Fighting Final No Objection Certificate Detail</button>
                                        </div>
                                   </div>
                                   <div class="panel-body">
                                        <div class="row">
											<div class="row">
												<form class="form-horizontal" id="master_form" name="master_form">
													<div class="form-group">
													<div class="col-sm-2">
														<label>Choose Language</label>
														</div>
														<div class="col-sm-2">
														<select id="language" name="language" class="form-control">
															<option selected value="marathi	">Marathi</option>
															<option  value="english">English</option>
														</select>
													</div>
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-sm-1"></div>
												<div class="col-sm-10" style="text-align:center;">
													<h4 id="0">चंद्रपूर शहर महानगरपालिका</h4>
													<h3 id="1">अग्निशमन अंतिम ना-हरकत प्रमाणपत्र</h3>
													<h6 id="3">कार्यालय : चंद्रपूर शहर महानगरपालिका , चंद्रपूर , तालुका : चंद्रपूर , जिल्हा : चंद्रपूर , फोन नं. : 0</h6>
													<hr style="width:121%;margin-left:-100px;background-color:#000;height:1px;"><hr style="width:121%;margin-left:-100px;background-color:#000;height:1px;"> 
												</div>
											</div>
											
											<section class="fire_fight" id="marathi" style="vertical-align:center;">
											
												<div class="row">
													<div class="col-sm-1 text_notes" id="4">जा. क्रं.</div>
													<div class="col-sm-9 text_notes" style="text-align:right;">
														<div class="form-group" id="5">
															दिनांक :
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-1 text_notes" id="6">प्रति,</div>
												</div>
												<br>
												<div class="row">
													<div class="col-sm-1 text_notes" style="margin-left:1%;" id="7">
														मेसर्स -
													</div>
													<div class="col-sm-3">
														<input type="text" name="name" value="" id="name" placeholder="Name" class="form-control" required/> 
													</div>
												</div>
												&nbsp;
												<div class="row">
													
													<div class="col-sm-1 text_notes" style="margin-left:1%;" id="8">
														प्रो. श्री.
													</div>
													<div class="col-sm-3">
														<input type="text" name="prof" value="" id="prof" placeholder="Prof. Mr." class="form-control" required/> 
													</div>
												</div><br>
												<div class="row">
													<div class="col-sm-2"></div>
													<div class="col-sm-8">
														<div class="row">
															<div class="col-sm-2 text_notes" id="9"><b>विषय:</b></div>
															<div class="col-sm-4"><input type="text" name="subject" value="" id="subject" placeholder="Subject" class="form-control" required/></div>
															<div class="col-sm-4" id="10"><b>अग्निशमन अंतिम ना -हरकत दाखला</b></div>
														</div>
													</div>
													<div class="col-sm-2"></div>
												</div><br>
												<div class="row" style="text-align:center;">
													<div class="col-sm-2"></div>
													<div class="col-sm-8">
														<div class="row">
															<div class="col-sm-1 text_notes" id="11"><b>संदर्भ:</b></div>
															<div class="col-sm-2 " id="12">१. आपला दिनांक</div>
															<div class="col-sm-4">
																<div class="input-group date " data-provide="datepicker">
																	<input type="text" class="form-control input-sm placeholdesize date1"  id="ref_date" name="ref_date" autocomplete="off" required>
																	<div class="input-group-addon">
																	<span class="fa fa-calendar"></span>
																	</div>
																</div>
															</div>
															<div class="col-sm-3 " id="13">रोजीचा अर्ज</div>
														</div>
														<br>
														<div class="row" style="margin-left:0.7%">
															
															<div class="col-sm-4" id="14">२ .अग्निशमन अंतिम ना -हरकत दाखला फि रु.</div>
															<div class="col-sm-3"><input type="number" name="fee" value="" id="fee" placeholder="Fee Rs." class="form-control" required/></div>
															<div class="col-sm-2" id="15">'/- पावती क्रं .</div>
															<div class="col-sm-3"><input type="text" name="form" value="" id="form" placeholder="Form Number" class="form-control" required/></div>
														</div><br>
														<div class="row" style="margin-left:0.7%">
															<div class="col-sm-1" id="16">दिनांक</div>
															<div class="col-sm-3">
																<div class="input-group date " data-provide="datepicker">
																	<input type="text" class="form-control input-sm placeholdesize date1"  id="bill_date" name="bill_date" autocomplete="off" required>
																	<div class="input-group-addon">
																	<span class="fa fa-calendar"></span>
																	</div>
																</div>
															</div>
															<div class="col-sm-2" id="17">रोजीचा भरणा.</div>
														</div>
													</div>
													<div class="col-sm-2"></div>
												</div>
												<div class="row" style="margin-left:2%;">
													<div class="col-sm-1 text_notes" id="19">महोदय,</div>
												</div>
												<br>
												<div class="row">
													<div class="col-sm-7 text_notes1" id="20">उपरोक्त संदर्भित विषयांन्वये, चंद्रपूर शहर महानगरपालिका अग्निशमन दलाकडून मेसर्स-</div>
													<div class="col-sm-2" style="margin-left:-10%;"><input type="text" name="fire_name" value="" id="fire_name" placeholder="Name" class="form-control" required/></div>
													<div class="col-sm-1 text_notes1" style="width:0.5%; margin-left:-1%;" id="21">या</div>
													<div class="col-sm-2"><input type="text" name="fire_sub" value="" id="fire_sub" placeholder="Subject" class="form-control" required/></div>
													<div class="col-sm-2 text_notes1" id="22">करीता अग्निशमन दलाची हरकत नाही.</div>
												</div>
												<div class="row">
													<h6 id="18">अटी :-</h6><br>
													<div class="row">
														<div class="text_notes1" id="23">१ . धंद्याचे ठिकाणी आगीसारखी दुर्घटना घडल्यास फायर ब्रिगेडची गाडी सहज पोहचेल असा रस्ता असणे आवश्यक आहे.</div><br>
														<div class="text_notes1" id="24">२ . केरोसिनचा साठा स्टोव्हपासून वेगळ्या खोलीत ठेवावा.</div><br>
														<div class="text_notes1" id="25">३ . किचनरूम मध्ये एक्झॉस्ट पंख बसविणे (आवश्यकतेनुसार) .</div><br>
														<div class="text_notes1" id="26">४ . हॉटेल चे ठिकाणी फायरब्रिगेडचे नियमानुसार अग्निसंरक्षण यंत्रणा ठेवणे (फायर एक्स्टींग्युशर्स ठेवावे.)</div><br>
														<div class="text_notes1" style="padding-left:2%;" id="27">अ) ए. बी. सी. टाईप फायर एक्स्टींग्युशर्स ०५ किलो वजनाचे २ नग.</div><br>
														<div class="text_notes1" id="28">५ . नियमाप्रमाणे सर्व सरकारी परवाने घेतल्यानंतरच सदरचा धंदा सुरु करावा.</div><br>
														<div class="text_notes1" id="29">'६ . आगीसारखी घटना घडल्यास रहदारीला कोणत्याही प्रकारचा अडथळा निर्माण होणार नाही याची दक्षता घ्यावी.</div><br>
														<div class="text_notes1" id="30">७ . अग्निशमन अधिकारी तपासनीस येतील त्यावेळी जर वरील बाबींमध्ये त्रुटी आढळल्यास कोणत्याही प्रकारची सूचन न देता जागेवर दाखला रद्द करण्याचा अधिकार अग्निशमन अधिकारी यांना राहील.</div><br>
														<div class="text_notes1" id="31">८ . सदराचा ना-हरकत दाखला प्राप्त झाल्यावर असणाऱ्या त्रुटी व कमतरतेबद्दल व्यावासधारक व्यक्तिशः जबाबदार असून याबाबत अग्निशमन अधिकारी वा महापालिका जबाबदार राहणार नाही.</div><br>
														<div class="text_notes1" id="32">९ . भविष्यात गरज वाटल्यास अग्निशमन अधिकारी ह्यांचे सूचनेनुसार आवश्यक ते फेरबदल / अतिरिक्त अग्निशमन उपाययोजना करणे बंधनकारक आहे.</div><br>
														<div class="text_notes1" id="33">१० . सदर व्यवसाय करणेकरीता व्यवसाय धारकास चंद्रपूर शहर महानगरपालिका इतर आवश्यक परवानग्या प्राप्त करणे बंधनकारक राहील.</div><br>
														<div class="text_notes1" id="34">११ . धंद्याच्या ठिकाणी अत्यावश्यक सेवा उदा. अग्निशमन दल, पोलीस अँम्बुलंस यांचे दूरध्वनी क्रंमांक फलकावर लावणे आवश्यक आहे .</div>
														
													</div>
													<br>
													<div class="row">
														<div class="col-sm-5 text_notes1" style="padding-left:2%;text-decoration:underline;" id="35">
															<b>सदर अग्निशमन अंतिम ना-हरकत दाखल्याची मुदत दिनांक पर्यंत आहे.</b>
														</div>
														<div class="col-sm-2" style="margin-left:-4%;">
															<div class="input-group date " data-provide="datepicker">
																	<input type="text" class="form-control input-sm placeholdesize date1"  id="cer_date" name="cer_date" autocomplete="off" required>
																	<div class="input-group-addon">
																	<span class="fa fa-calendar"></span>
																	</div>
																</div>
														</div>
														<div class="col-sm-1 text_notes1" style="text-decoration:underline;" id="36">त्यानंतर</div>
														<div class="col-sm-4 text_notes1" style="margin-left:-4%;" id="37">अग्निशमन अंतिम ना-हरकत दाखला पुढील मुदतीकरिता नुतनीकरण</div>
													</div>
													<div class="row">
														<div class="text_notes1" id="38">करून घेणे व्यवसाय मालकास बंधनकारक राहील.</div>
													</div>
												</div>
												<br>
												<div class="row">
												 <div class="col-sm-6">
													
												 </div>
												 <div class="col-sm-3"></div>
												 <div class="col-sm-3" style="text-align:center;">
													<label id="39"><b style="center">प्र. अग्निशमन अधिकारी</b></label><br>
													<label id="40">अग्निशमन सेवा </label>
													<label id="41">चंद्रपूर शहर महानगरपालिका</label>
												 </div>
												 </div>
												<div class="row">
													<div class="text_notes1" style="text-decoration:underline;" id="42">सूचना : सदर अग्निशमन अंतिम ना -हरकत दाखल्याची मुदत संपल्यानंतर एक महिन्याचे आत ना-हरकत दाखल्याचे नुतनीकरण</div>
													<div class="text_notes1" style="text-decoration:underline;" id="43">करून घेणे बंधनकारक राहील. जर वेळेत नुतनीकरण न केल्यास प्रति महिना ५०/- रुपये प्रमाणे लेट फी आकारण्यात येईल. </div>
												</div>
												
												
												<br><br><br>
										<div style="margin-top:-15px;border-bottom:2px solid;width:100%;">
												<b>Upload Documents</b>
												</div><br>
												<div class="row">
												<table id="file_info"
                                                                      class="table table-striped file_info"
                                                                      cellspacing="0">

                                                                      <thead>
                                                                           <input type="hidden" id="row" class="row"
                                                                                value="0">
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
                                                                             
                                                                                     <input type="hidden" id="ids"
                                                                                          class="ids" />
                                                                                     <td>
																	<input type="file" id="attachment" name="attachment" accept="*" style="padding:0px;border:0;">
                                                                           			<input type="hidden" id="file_attachother" class="file_attachother" value="" />
                                                                          				 <div id="msg" class="msg"></div>
                                                                                     </td>
                                                                                     <td >
																	<input name="remark"  type="text" class="form-control" id="remark" placeholder="Remarks" value="">
                                                                                     </td>
                                                                                         <td><button type="button"
                                                                                               class="btn btn-primary btn-xs plus "
                                                                                               form="pro_form"
                                                                                               id="plus"><i
                                                                                                    class="fa fa-plus"></i></button>
                                                                                     </td>
                                                                           </tr>

                                                                      </thead>
                                                                      <tbody id="file_info_tbody"
                                                                           class="file_info_tbody">

                                                                      </tbody>
                                                                 </table>
												</div>
												<br>
												<div class="row center">
												 <div class="col-sm-3"></div>
												 <div class="col-sm-3">
												<div class="btn-group " style="float:right;">
												<input type="hidden" id="save_update" value="" >
													<button class="btn btn-primary" id="submit" type="submit">Save</button>
													&nbsp;&nbsp;
                                                                      <?php if($this->session->role == "user"){?>
                                                                           <button class="btn btn-success" form="payment" id="pay" name="pay"value="Fire_Fighting_No_Objection_Certificate"
                                                                      type="submit">Pay Online</button>
																	  <input type="hidden" form="payment" name="ref_id" id="ref_id" value="">
                                                                     <?php }?>
												</div>
												  </div></form>
												  <form name="payment" id="payment" method="POST" 
                                                                 action="<?php echo base_url('Payment/online_payment');?>"
                                                                 ></form>
												  <div class="col-sm-6" style="margin-left:-1%;">
												  <button class="btn btn-primary" type="button"
                                                                 id="btnapprove" name="btnapprove" style="display:none"
                                                                 value="">Approve</button>
                                                            <button class="btn btn-primary" type="button" id="btnreject"
                                                                 name="btnreject" style="display:none" value=""
                                                                 data-toggle="modal"
                                                                 data-target="#myModal">Reject</button>
												  <form name="fire" id="fire" method="POST" action="<?php echo base_url('Pdf_print/print_fire');?>" target="_blank"></form>                             
												  <button class="btn btn-primary" type="submit" form="fire" id="btnprint" name="btnprint" value="" style="display:none">Print</button>
												  <button class="btn btn-primary" type="submit"id="btnprint2"form="property2"   name="btnprint2" value="" style="display:none">Print </button> 
										 <form name="property2" id="property2" method="POST" action="<?php echo base_url('Pdf_print/print_fire_marathi');?>" target="_blank"></form>
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
                                                                      <input name="reject_remark" type="text"
                                                                           class="form-control" id="reject_remark"
                                                                           placeholder="Remarks" value="" required>
                                                                 </div> <!-- Modal footer -->
                                                                 <div class="modal-footer">
                                                                      <button type="button" class="btn btn-danger"
                                                                           data-dismiss="modal"
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
     var user_id = "<?php echo $this->session->userid;?>";
     var role = "<?php echo $this->session->role;?>";
     </script>
	<script src="<?php echo base_url(); ?>assets/js/myjs/firefinal_object.js"></script>
	 <!--fileupload Files -->
	 <script src="<?php echo base_url().'assets/js/AjaxFileUpload.js'?>"></script>
	 <script>
		var newlabel = '';
		var newlabel1 = '';
		var newlabel2 = '';
		var newlabel3 = '';
		var newlabel4 = '';
		var newlabel5 = '';
		var newlabel6 = '';
		var newlabel7 = '';
		var newlabel8 = '';
		var newlabel9 = '';
		var newlabel10 = '';
		var newlabel11 = '';
		var newlabel12 = '';
		var newlabel13 = '';
		var newlabel14 = '';
		var newlabel15 = '';
		var newlabel16 = '';
		var newlabel17 = '';
		var newlabel18 = '';
		var newlabel19 = '';
		var newlabel20 = '';
		var newlabel21 = '';
		var newlabel22 = '';
		var newlabel23 = '';
		var newlabel24 = '';
		var newlabel25 = '';
		var newlabel26 = '';
		var newlabel27 = '';
		var newlabel28 = '';
		var newlabel29 = '';
		var newlabel30 = '';
		var newlabel31 = '';
		var newlabel32 = '';
		var newlabel33 = '';
		var newlabel34 = '';
		var newlabel35 = '';
		var newlabel36 = '';
		var newlabel37 = '';
		var newlabel38 = '';
		var newlabel39 = '';
		var newlabel40 = '';
		var newlabel41 = '';
		$('#language').on('change',function(){
			var lan=$('#language').val();
			if(lan=='english'){
				newlabel = 'Chandrapur city municipality';
				newlabel1 = 'Fire Fighting Final No Objection Certificate';
				newlabel2 = 'Office:Chandrapur City Municipal Corporation, Chandrapur,Taluka: Chandrapur, District: Chandrapur, Phone no.:0';
				newlabel3 = 'Go sir.';
				newlabel4 = 'Date:';
				newlabel5 = 'Per';
				newlabel6 = 'M/S -';
				newlabel7 = 'Prof. Mr.';
				newlabel8 = 'Subject:';
				newlabel9 = 'Fire Fighting Final Non-Hacture Certificate';
				newlabel10 = 'Reference:';
				newlabel11 = '1. Your date';
				newlabel12 = 'Application for Release';
				newlabel13 = '2. Fire Fighting Final Non-Harmonization Certificates';
				newlabel14 = '/- Receipt form';
				newlabel15 = 'Date';
				newlabel16 = 'Bill Payment';
				newlabel17 = 'Sir,';
				newlabel18 = 'Under the above mentioned matters, Chandrapur City Municipal Corporation Fire Bridge M/s.';
				newlabel19 = 'Or';
				newlabel20 = 'No fire department for this.';
				newlabel21 = 'Terms:-';
				newlabel22 = '1.Fire brigade must have a road that can easily reach a car accident if there is a fire.';
				newlabel23 = '2.Store kerosene in a diffrent room the stove.';
				newlabel24 = '3.Setting exhaust wings in the kitchenroom (as necessary).';
				newlabel25 = "4.To maintain fire extinguishers in the hotel's fire brigade rules.";
				newlabel26 = 'A)A.B.C. Type fire extinguishers 05kg weighing 2 nos.';
				newlabel27 = '5.After taking all goverment licenses as per the rules, start the business.';
				newlabel28 = '6.If there is a fire incident, then take precautions that there will be no obstruction to traffic.';
				newlabel29 = '7.When the Fire Office goes to the Investigator, the Fire Officer will have the right to cancel the certificate on the ground without giving any kind of information if there is an error in above matters.';
				newlabel30 = '8.The person is personally responsible for the errors and shortcomings received after obtainning a non-objection certificate, and the Fire Officer or the municipal corporation will not be held liable in this regard.';
				newlabel31 = '9.In future, if necessary, necessary compulsory/additional fire prevention measures are required according to the instructions of the Fire Brigade Officer.';
				newlabel32 = '10.For this business, the business owner will be required to obtain other necessary permissions from the Chandrapur Municipal Corporation.';
				newlabel33 = '11.Essential services like place of business The phone number of firefighting force, police ambulance, is required.';
				newlabel34 = 'Dead Fire Termination Deadline for final non-objection certificate';
				newlabel35 = 'Is up to';
				newlabel36 = 'After this, It will be mandatory for the business owner to get';
				newlabel37 = 'renewed fire for the final non-objection certificate';
				newlabel38 = 'Q.Fire officer';
				newlabel39 = 'Fire Fighting & Emergency Services';
				newlabel40 = 'Chandrapur city municipality';
				newlabel41 = 'Notice: It will be mandatory to renew the non-objection certificate within one month after the end of the final';
				newlabel42 = 'non-filing deadline. If renewal is not renewed in time. then a fee of Rs. 50/- per month will be levied.';
			}
			else{
				newlabel = 'चंद्रपूर शहर महानगरपालिका';
				newlabel1 = 'अग्निशमन अंतिम ना-हरकत प्रमाणपत्र';
				newlabel2 = 'कार्यालय : चंद्रपूर शहर महानगरपालिका , चंद्रपूर , तालुका : चंद्रपूर , जिल्हा : चंद्रपूर , फोन नं. : 0';
				newlabel3 = 'जा. क्रं.';
				newlabel4 = 'दिनांक :';
				newlabel5 = 'प्रति,';
				newlabel6 = 'मेसर्स -';
				newlabel7 = 'प्रो. श्री.';
				newlabel8 = 'विषय:';
				newlabel9 = 'अग्निशमन अंतिम ना -हरकत दाखला';
				newlabel10 = 'संदर्भ:';
				newlabel11 = '१. आपला दिनांक';
				newlabel12 = 'रोजीचा अर्ज';
				newlabel13 = '२ .अग्निशमन अंतिम ना -हरकत दाखला फि रु.';
				newlabel14 = '/- पावती क्रं .';
				newlabel15 = 'दिनांक';
				newlabel16 = 'रोजीचा भरणा.';
				newlabel17 = 'महोदय,';
				newlabel18 = 'उपरोक्त संदर्भित विषयांन्वये, चंद्रपूर शहर महानगरपालिका अग्निशमन दलाकडून मेसर्स-';
				newlabel19 = 'या';
				newlabel20 = 'करीता अग्निशमन दलाची हरकत नाही.';
				newlabel21 = 'अटी :-';
				newlabel22 = '१ . धंद्याचे ठिकाणी आगीसारखी दुर्घटना घडल्यास फायर ब्रिगेडची गाडी सहज पोहचेल असा रस्ता असणे आवश्यक आहे.';
				newlabel23 = '२ . केरोसिनचा साठा स्टोव्हपासून वेगळ्या खोलीत ठेवावा.';
				newlabel24 = '३ . किचनरूम मध्ये एक्झॉस्ट पंख बसविणे (आवश्यकतेनुसार) .';
				newlabel25 = '४ . हॉटेल चे ठिकाणी फायरब्रिगेडचे नियमानुसार अग्निसंरक्षण यंत्रणा ठेवणे (फायर एक्स्टींग्युशर्स ठेवावे.)';
				newlabel26 = 'अ) ए. बी. सी. टाईप फायर एक्स्टींग्युशर्स ०५ किलो वजनाचे २ नग.';
				newlabel27 = '५ . नियमाप्रमाणे सर्व सरकारी परवाने घेतल्यानंतरच सदरचा धंदा सुरु करावा.';
				newlabel28 = '६ . आगीसारखी घटना घडल्यास रहदारीला कोणत्याही प्रकारचा अडथळा निर्माण होणार नाही याची दक्षता घ्यावी.';
				newlabel29 = '७ . अग्निशमन अधिकारी तपासनीस येतील त्यावेळी जर वरील बाबींमध्ये त्रुटी आढळल्यास कोणत्याही प्रकारची सूचन न देता जागेवर दाखला रद्द करण्याचा अधिकार अग्निशमन अधिकारी यांना राहील.';
				newlabel30 = '८ . सदराचा ना-हरकत दाखला प्राप्त झाल्यावर असणाऱ्या त्रुटी व कमतरतेबद्दल व्यावासधारक व्यक्तिशः जबाबदार असून याबाबत अग्निशमन अधिकारी वा महापालिका जबाबदार राहणार नाही.';
				newlabel31 = '९ . भविष्यात गरज वाटल्यास अग्निशमन अधिकारी ह्यांचे सूचनेनुसार आवश्यक ते फेरबदल / अतिरिक्त अग्निशमन उपाययोजना करणे बंधनकारक आहे.';
				newlabel32 = '१० . सदर व्यवसाय करणेकरीता व्यवसाय धारकास चंद्रपूर शहर महानगरपालिका इतर आवश्यक परवानग्या प्राप्त करणे बंधनकारक राहील.';
				newlabel33 = '११ . धंद्याच्या ठिकाणी अत्यावश्यक सेवा उदा. अग्निशमन दल, पोलीस अँम्बुलंस यांचे दूरध्वनी क्रंमांक फलकावर लावणे आवश्यक आहे .';
				newlabel34 = 'सदर अग्निशमन अंतिम ना-हरकत दाखल्याची मुदत दिनांक पर्यंत आहे.';
				newlabel35 = 'त्यानंतर';
				newlabel36 = 'अग्निशमन अंतिम ना-हरकत दाखला पुढील मुदतीकरिता नुतनीकरण';
				newlabel37 = 'करून घेणे व्यवसाय मालकास बंधनकारक राहील.';
				newlabel38 = 'प्र. अग्निशमन अधिकारी';
				newlabel39 = 'अग्निशमन सेवा ';
				newlabel40 = 'चंद्रपूर शहर महानगरपालिका';
				newlabel41 = 'सूचना : सदर अग्निशमन अंतिम ना -हरकत दाखल्याची मुदत संपल्यानंतर एक महिन्याचे आत ना-हरकत दाखल्याचे नुतनीकरण';
				newlabel42 = 'करून घेणे बंधनकारक राहील. जर वेळेत नुतनीकरण न केल्यास प्रति महिना ५०/- रुपये प्रमाणे लेट फी आकारण्यात येईल.';
			}
			$('#0').html(newlabel);
			$('#1').html(newlabel1);
			$('#3').html(newlabel2);
			$('#4').html(newlabel3);
			$('#5').html(newlabel4);
			$('#6').html(newlabel5);
			$('#7').html(newlabel6);
			$('#8').html(newlabel7);
			$('#9').html(newlabel8);
			$('#10').html(newlabel9);
			$('#11').html(newlabel10);
			$('#12').html(newlabel11);
			$('#13').html(newlabel12);
			$('#14').html(newlabel13);
			$('#15').html(newlabel14);
			$('#16').html(newlabel15);
			$('#17').html(newlabel16);
			$('#19').html(newlabel17);
			$('#20').html(newlabel18);
			$('#21').html(newlabel19);
			$('#22').html(newlabel20);
			$('#18').html(newlabel21);
			$('#23').html(newlabel22);
			$('#24').html(newlabel23);
			$('#25').html(newlabel24);
			$('#26').html(newlabel25);
			$('#27').html(newlabel26);
			$('#28').html(newlabel27);
			$('#29').html(newlabel28);
			$('#30').html(newlabel29);
			$('#31').html(newlabel30);
			$('#32').html(newlabel31);
			$('#33').html(newlabel32);
			$('#34').html(newlabel33);
			$('#35').html(newlabel34);
			$('#36').html(newlabel35);
			$('#37').html(newlabel36);
			$('#38').html(newlabel37);
			$('#39').html(newlabel38);
			$('#40').html(newlabel39);
			$('#41').html(newlabel40);
			$('#42').html(newlabel41);
			$('#43').html(newlabel42);
		});
	</script>
	<script>
        $('.date').datepicker({
        'todayHighlight':true,
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