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

                    <li class="active">Add Zone</li>



               </ul>

               <!-- END BREADCRUMB -->



               <!-- PAGE CONTENT WRAPPER -->

               <div class="page-content-wrap">

                  



                    <!-- strat notification -->

                    <div class="row"  >

                    <div class="col-md-12 col-sm-12 col-xs-12 right_side">

                              <!-- START SIMPLE DATATABLE -->

                              <div class="panel panel-default">

                                   <div class="panel-heading">

                                        <h3 class="panel-title">Add Zone Form</h3>

                                        <div class="pull-right">

                                           <!--  <button class="btn btn-success closehideshow"

                                                  style="background-color:#00B050;">View </button>-->

                                        </div>

                                   </div>

                                   <div class="panel-body">

                                        <div class="row">

                                        <form class="form-horizontal" id="master_form" name="master_form">

                                                

                                                 

												<div class="form-group">

                                                     

                                                       <div class="col-md-3">

                                                            <label class="control-label" >Zone*</label>

                                                       </div>

                                                       <div class="col-md-3">

														<input type="text" placeholder="Zone" class="form-control input-sm placeholdesize" id="zone" name="zone" required >

                                                       </div>

													  

</div>

<div class="form-group">

                                                       <div class="col-sm-3">

                                                            <label>Status</label>

                                                       </div>

                                                       <div class="col-sm-4">
                                                       <div class="form-check">
                                                  <input type="checkbox" class="form-check-input" id="status" value="1">
                                                  <span><strong>Set Active</strong></span></label>
                                        </div>

                                             
                                                            <!--<input class="form-check-input" type="radio" name="status" id="active" value="1">Active

                                                            <input class="form-check-input" type="radio" name="status" id="deactive" value="0">Deactive  -->

                                                       </div>

                                                  </div>

                                                     

													

                                                

                                                  <div class="btn-group pull-right">

                                                  <input type="hidden" id="save_update" value="" >

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
                      <!--NEWS SECTION-->



                      <div class="row ">

<div class="col-md-12 col-sm-12 col-xs-12 right_side">

     <!-- START SIMPLE DATATABLE -->



     <div class="panel panel-default">

          <div class="panel-heading">

               <h3 class="panel-title">Zone</h3>

              

               <ul class="panel-controls">



                    <li> <!--<button class="btn btn-success btnhideshow"

                              style="background-color:#00B050;"> Add </button></li> -->

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

     <script type="text/javascript">var baseurl = "<?php print base_url(); ?>";</script>

     <script src="<?php echo base_url(); ?>assets/js/myjs/addzone.js"></script>



</body>



</html>