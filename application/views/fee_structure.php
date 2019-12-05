<?php include('include/header.php');  ?>

<body>
     <script src="<?php echo base_url() ?>assets/js/plugins/d3pie/d3.min.js"></script>
     <script src="<?php echo base_url() ?>assets/js/plugins/d3pie/d3pie.js"></script>
     <!-- START PAGE CONTAINER -->
     <div class="page-container">

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
                    <li class="active">Fee Structure</li>

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
                                        <h3 class="panel-title">Fee Structure</h3>

                                        <ul class="panel-controls">

                                             <li> <button class="btn btn-success btnhideshow" style="background-color:#00B050;"> Add </button></li>
                                        </ul>
                                   </div>
                                   <div class="panel-body">
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
                    <div class="row  formhideshow" style="display:none">
                         <div class="col-md-12 col-sm-12 col-xs-12 right_side">
                              <!-- START SIMPLE DATATABLE -->
                              <div class="panel panel-default">
                                   <div class="panel-heading">
                                        <h3 class="panel-title">Fee Structure</h3>
                                        <div class="pull-right">
                                             <button class="btn btn-success closehideshow" style="background-color:#00B050;">View </button>
                                        </div>
                                   </div>
                                   <div class="panel-body">
                                        <div class="row">
                                             <form class="form-horizontal" id="master_form" name="master_form">


                                                  <div class="form-group">

                                                       <div class="col-md-3">
                                                            <label class="control-label"> Select Service*</label>
                                                       </div>
                                                       <div class="col-md-3">
                                                            <select id="service" name="service" class="form-control input-sm">
                                                                 <option value="" selected disabled>Select</option>
                                                                 <option value="Property_Transfer_Record">Property Transfer Record</option>
                                                                 <option value="Inheritance_Certificate">Inheritance Certificate</option>
                                                                 <option value="Fire_Fighting_No_Objection_Certificate">Fire Fighting No Objection Certificate</option>
                                                                 <option value="Occupation_Certificate">Occupation Certificate</option>
                                                                 <option value="Part_Certificate">Part Certificate</option>
                                                                 <option value="Zone_Certificate">Zone Certificate</option>
                                                                 <option value="Construction_Certificate">Construction Certificate</option>
                                                                 <option value="Plant_Certificate">Plant Certificate</option>
                                                                 <option value="Fire_Fighting">Fire Fighting</option>
                                                                 <option value="Outstanding_Certificate">Outstanding Certificate</option>
                                                                 <option value="No_Objection_Certificate">No Objection Certificate</option>
                                                                 <option value="Resident_Certificate">Resident Certificate</option>
                                                                 <option value="Asset_Detail_Certificate">Asset Detail Certificate</option>
                                                                
                                                            </select>
                                                       </div>

                                                  </div>
                                                  <div class="form-group">
                                                       <div class="col-sm-3">
                                                            <label>Amount*</label>
                                                       </div>
                                                       <div class="col-sm-3">
                                                            <input type="number" placeholder="Amount" class="form-control input-sm placeholdesize" id="amt" name="amt" required>
                                                       </div>
                                                  </div>
                                                  <div class="form-group">
                                                       <div class="col-sm-3">
                                                            <label>Number of Copy*</label>
                                                       </div>
                                                       <div class="col-sm-3">
                                                            <input type="number" placeholder="Number of Copy" class="form-control input-sm placeholdesize" id="copy" name="copy" required>
                                                       </div>
                                                  </div>



                                                  <div class="btn-group pull-right">
                                                       <input type="hidden" id="save_update" value="">
                                                       <button class="btn btn-primary" type="submit">Submit</button>
                                                  </div>
                                             </form>
                                        </div>
                                   </div>
                              </div>
                              <!-- END SIMPLE DATATABLE -->
                         </div>
                    </div>
                    <!-- end notification -->
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
     <script src="<?php echo base_url(); ?>assets/js/myjs/fee_structure.js"></script>

</body>

</html>