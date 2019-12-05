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
                    <li class="active">Construction Certificate</li>

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
                                        <h3 class="panel-title">Code Id : 07 Construction Certificate</h3>
                                       
                                        <ul class="panel-controls">

                                             <li> <button class="btn btn-success btnhideshow"
                                                       style="background-color:#00B050;"> Add Construction certificate Detail</button></li>
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
							<h3 class="panel-title">Code Id : 07 Construction Certificate</h3>
                                        <div class="pull-right">
                                             <button class="btn btn-success closehideshow"
                                                  style="background-color:#00B050;">View Construction certificate Detail</button>
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
											<h3 style="font-weight:bold;text-align:center;" id="0">-::बांधकाम प्रमाणपत्र::-</h3>
											<br>
                                              <!-- <form action="" class="form-horizontal" id="jvalidate" method="post" -->
                                                   <!-- accept-charset="utf-8"> -->
                                                <section class="construction" id="english" style="vertical-align:center;">
                                                <form class="form-horizontal" id="master_form" name="master_form">
												<div class="row" style="padding-left:35px;">
												<div class="form-group">
                                                <div class="col-sm-3 text_notes" id="2">प्रमाणित करण्यात येते की , श्री / श्रीमती</div>
												<div class="col-sm-2"> <input type="text" name="name" value="" id="name" placeholder="Name" class="form-control" required/></div>
												<div class="col-sm-2 text_notes" id="3">राहणार वार्ड क्र.</div>
												<div class="col-sm-2"> <input type="text" name="ward_no" value="" id="ward_no" placeholder="Ward No" class="form-control" required/></div>
												<div class="col-sm-3 text_notes" id="4">चंद्रपूर शहर महानगरपालिका / प्रभाग क्र.</div>
												</div>
												 </div>
												 &nbsp;
												 <div class="row">
												 <div class="form-group">
													<div class="col-sm-2"> <input type="text" name="munici_ward_no" value="" id="munici_ward_no" placeholder="municipality/ward no." class="form-control" required/></div>
												<div class="col-sm-3 text_notes" id="5">यांना बांधकाम प्रमाणपत्र देण्यात येत आहे.</div>
												 </div>
												 </div>
													 <br>
												 <br>
												 <br>
												 <div class="row">
												 <div class="col-sm-6">
													<div class="col-sm-2" id="6">
														स्थान: 
													</div>
													<div class="col-sm-5" id="7">
														चंद्रपूर शहर महानगरपालिका
													</div>
													<br>
													<div class="col-sm-2" id="8">
														दिनांक:
													</div>
													<div class="col-sm-4">
														<div class="input-group date " data-provide="datepicker">
																	<input type="text" class="form-control input-sm placeholdesize date1"  id="date" name="date" autocomplete="off" required>
																	<div class="input-group-addon">
																	<span class="fa fa-calendar"></span>
																	</div>
																</div>
													</div>
												 </div>
												 <div class="col-sm-3"></div>
												 <div class="col-sm-3" style="text-align:center;">
													<label id="9"><b style="center">मुख्याधिकारी</b></label><br>
													<label id="10">चंद्रपूर शहर महानगरपालिका</label>
												 </div>
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
                                                                           <button class="btn btn-success" form="payment" id="pay" name="pay"value="Construction_Certificate"
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
												  <form name="construction" id="construction" method="POST" action="<?php echo base_url('Pdf_print/print_construction');?>" target="_blank"></form>                             
												  <button class="btn btn-primary" type="submit" form="construction" id="btnprint" name="btnprint" value=""style="display:none">Print</button>
												 
												<button class="btn btn-primary" type="submit"id="btnprint2"form="property2"   name="btnprint2" value="" style="display:none">Print </button> 
										 <form name="property2" id="property2" method="POST" action="<?php echo base_url('Pdf_print/print_construction_marathi');?>" target="_blank"></form>
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
	<script src="<?php echo base_url(); ?>assets/js/myjs/construction.js"></script>
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
		$('#language').on('change',function(){
			var lan=$('#language').val();
			if(lan=='english'){
				newlabel = '-::Construction Certificate::-';
				newlabel1 = 'It is certifified that Mr./Smt';
				newlabel2 = 'Will stay on ward no.';
				newlabel3 = 'Chandrapur city municipality/ward no.';
				newlabel4 = 'These are given construction certificate.';
				newlabel5 = 'Location:';
				newlabel6 = 'Chandrapur Municipal Corporation';
				newlabel7 = 'Date:';
				newlabel8 = 'Chief Officer';
				newlabel9 = 'Changrapur city municipality';
			}
			else{
				newlabel = '-::बांधकाम प्रमाणपत्र::-';
				newlabel1 = 'प्रमाणित करण्यात येते की , श्री / श्रीमती';
				newlabel2 = 'राहणार वार्ड क्र.';
				newlabel3 = 'चंद्रपूर शहर महानगरपालिका / प्रभाग क्र.';
				newlabel4 = 'यांना बांधकाम प्रमाणपत्र देण्यात येत आहे.';
				newlabel5 = 'स्थान:';
				newlabel6 = 'चंद्रपूर शहर महानगरपालिका';
				newlabel7 = 'दिनांक:';
				newlabel8 = 'मुख्याधिकारी';
				newlabel9 = 'चंद्रपूर शहर महानगरपालिका';
			}
			$('#0').html(newlabel);
			$('#2').html(newlabel1);
			$('#3').html(newlabel2);
			$('#4').html(newlabel3);
			$('#5').html(newlabel4);
			$('#6').html(newlabel5);
			$('#7').html(newlabel6);
			$('#8').html(newlabel7);
			$('#9').html(newlabel8);
			$('#10').html(newlabel9);
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