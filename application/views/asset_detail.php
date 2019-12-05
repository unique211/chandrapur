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

                    <li class="active">Asset Detail Certificate</li>



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

                                        <h3 class="panel-title">Code Id : 13 Asset Detail Certificate</h3>

                                       

                                        <ul class="panel-controls">



                                             <li> <button class="btn btn-success btnhideshow"

                                                       style="background-color:#00B050;"> Add Detail</button></li>

                                        </ul>

                                   </div>

                                   <div class="panel-body">



                                   </div>

                              </div>

                              <!-- END SIMPLE DATATABLE -->

                         </div>

                    </div>

                    <!--NEWS SECTION END-->



                    <!-- strat notification -->

                    <div class="row  formhideshow">

                         <div class="col-md-12 col-sm-12 col-xs-12 right_side">

                              <!-- START SIMPLE DATATABLE -->

                              <div class="panel panel-default">

                                   <div class="panel-heading">

                                        <h3 class="panel-title">Add Asset Detail</h3>

                                        <div class="pull-right">

                                             <button class="btn btn-success closehideshow"

                                                  style="background-color:#00B050;">View Asset Detail</button>

                                        </div>

                                   </div>

                                   <div class="panel-body">

                                        <div class="row">

                                             <!-- <form action="" class="form-horizontal" id="jvalidate" method="post" -->

                                                  <!-- accept-charset="utf-8"> -->

                                                <div class="row">

													<div class="form-group">

													<div class="col-sm-2">

														<label>Choose Language</label>

														</div>

														<div class="col-sm-2">

														<select id="language" name="language" class="form-control">

															<option selected value="english">English</option>

															<option value="marathi	">Marathi</option>

														</select>

													</div>

												</div>

											</div>

											<br>

											<section class="asset" id="marathi" style="vertical-align:center;border:1px solid #d3d3d3;">

											<div class="row" style="background-color:#d3d3d3;">

												<div class="text_notes">Asset Detail</div>

											</div>

											<br>

                                            <div class="row" style="margin-left:5px; margin-right:5px;border:1px solid #D3D3D3;">

												<div class="text_notes" style="color:blue;background-color:#D3D3D3;padding-left:20px;">Find Information</div>

												<br>

												<div class="row">

												<div class="col-sm-2 text_notes" style="background-color:#d3d3d3;margin-left:10px;height:35px;">Property Number</div>

												<div class="col-sm-3">

													<select id="p_no" name="p_no" class="form-control">

														<option selected disabled>select</option>

														<option value="1">1001</option>

														<option value="2">1002</option>

														<option value="3">1003</option>

														<option value="4">1004</option>

													</select>

													<br>

												</div>

												</div>

												

											</div> <br>

                                              </section>

											  <br>

											  

											  <section class="asset_detail" id="marathi_select" style="border:1px solid #d3d3d3;">

												<div class="row">

													<div class="col-sm-8"></div>

													<div class="col-sm-4">

														<div class="text_notes">Go No. Recovery Department&nbsp;/&nbsp;2019</div>

														<div class="text_notes">Office of Chandrapur Municipal Corporation</div>

														<div class="text_notes">Date:/ 2019</div>

													</div>

												</div>

												<br>

												<h3 style="font-weight:bold;text-align:center;">Office of Chandrapur Municipal Corporation</h3>

												<h3 style="font-weight:bold;text-align:center;">-::Property Description Certificate::-</h3>

												<br>

												<div class="row">

													<div class="text_notes">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;It is certified that in the order of 20-20 registration of <b>Chandrapur city corporation</b>, Name of the <b>1004</b> WordAccording to the property serial number of Mr. The details of the property / name of Mrs. <b>T. Eert</b> are as follows.</div>

												</div>

												<hr>

												<div class="row" style="width:70%;margin-left:15%;">

													<h3 style="font-weight:bold;text-align:center;">Asset Details</h3><br>

													<div class="row">

														<div class="col-sm-4 text_notes">1.Area of plot-</div>

														<div class="col-sm-4 text_notes" style="text-align:center">Length 5.00 * width 23.00</div>

														<div class="col-sm-4 text_notes" style="text-align:right">= 115 sq ft</div>

													</div><br>

													<div class="row">

														<div class="col-sm-4 text_notes">2.Area of construction-</div>

														<div class="col-sm-4 text_notes" style="text-align:center">Length 1.00 * width 23.00</div>

														<div class="col-sm-4 text_notes" style="text-align:right">= 23 sq ft</div>

													</div><br>

													<div class="row">

														<div class="col-sm-4 text_notes">3.Construction Details-</div>

														<div class="col-sm-4 text_notes" style="text-align:center"></div>

														<div class="col-sm-4 text_notes" style="text-align:right"></div>

													</div><br>

													<div class="row">

														<div class="col-sm-4 text_notes">4.Year Completion-</div>

														<div class="col-sm-4 text_notes" style="text-align:center">2016</div>

														<div class="col-sm-4 text_notes" style="text-align:right"></div>

													</div><br>

												</div>

												<hr>

												<br>

												<div class="row">

												 <div class="col-sm-6">

													

												 </div>

												 <div class="col-sm-3"></div>

												 <div class="col-sm-3" style="text-align:center;">

													<b style="center">Chief Officer</b><br>

													Changrapur city municipality

												 </div>

												 </div>

												 <br>

												 <div class="row center">

												 <div class="col-sm-3"></div>

												 <div class="col-sm-3">

												

												  </div>

												  <div class="col-sm-3" style="margin-left:-1%;">

												  <form name="asset" id="asset" method="POST" action="<?php echo base_url('Pdf_print/print_asset');?>" target="_blank"></form>                             

												  <button class="btn btn-primary" type="submit" form="asset" id="btnprint" name="btnprint" value="">Print</button>

												  </div>

												  <div class="col-sm-3"></div>

												  </div>

											  </section>

											  

											  

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



</body>



</html>