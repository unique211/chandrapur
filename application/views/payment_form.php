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
                    <li class="active">Payment Form</li>

               </ul>
               <!-- END BREADCRUMB -->

               <!-- PAGE CONTENT WRAPPER -->
               <div class="page-content-wrap">
                    <!--NEWS SECTION-->

                    <div class="row tablehideshow" style="display:none">
                         <div class="col-md-12 col-sm-12 col-xs-12 right_side">
                              <!-- START SIMPLE DATATABLE -->

                              <div class="panel panel-default">
                                   <div class="panel-heading">
                                        <h3 class="panel-title">Payment</h3>
                                       
                                        <ul class="panel-controls">

                                             <!-- <li> <button class="btn btn-success btnhideshow"
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

                    <!-- strat notification -->
                    <div class="row  formhideshow"  >
                    <div class="col-md-12 col-sm-12 col-xs-12 right_side">
                              <!-- START SIMPLE DATATABLE -->
                              <div class="panel panel-default">
                                   <div class="panel-heading">
                                        <h3 class="panel-title">Payment</h3>
                                        <div class="pull-right">
                                             <!-- <button class="btn btn-success closehideshow"
                                                  style="background-color:#00B050;">View </button> -->
                                        </div>
                                   </div>
                                   <div class="panel-body">
                                        <div class="row">
                                        <form class="form-horizontal" id="master_form" name="master_form">
                                                
                                                 
												<div class="form-group">
                                                     
                                                       <div class="col-md-3">
                                                            <label class="control-label" > Name*</label>
                                                       </div>
                                                       <div class="col-md-3">
														<input type="text" placeholder="Name" class="form-control input-sm placeholdesize" id="name" name="name" value="<?php echo $name;?>" required disabled>
                                                       </div>
													  
                                                        </div>
                                                        <div class="form-group">
                                                       <div class="col-sm-3">
                                                            <label>Service</label>
                                                       </div>
                                                       <div class="col-md-3">
                                                          
														<input type="text" placeholder="Service" class="form-control input-sm placeholdesize" id="service" name="service"  value="<?php echo $service; ?>" required  disabled>
                                                       </div>
                                                  </div>
                                                  <div class="form-group">
                                                       <div class="col-sm-3">
                                                            <label>Amount*</label>
                                                       </div>
                                                       <div class="col-md-3">
														<input type="text" placeholder="Amount" class="form-control input-sm placeholdesize" id="amt" name="amt" value="<?php echo $amount; ?>" disabled required >
                                                       </div>
                                                  </div>
                                                  <div class="form-group">
                                                       <div class="col-sm-3">
                                                            <label>Number of Copy*</label>
                                                       </div>
                                                       <div class="col-md-3">
                                                         
														<input type="number" placeholder="Number of Copy" class="form-control input-sm placeholdesize" id="copy" name="copy" value="1" required >
                                                       </div>
                                                  </div>
                                                  <div class="form-group">
                                                       <div class="col-sm-3">
                                                            <label>Total Amount*</label>
                                                       </div>
                                                       <div class="col-md-3">
														<input type="text" placeholder="Total Amount" class="form-control input-sm placeholdesize" id="total" name="total" disabled required >
                                                       </div>
                                                  </div>
                                                     
													
                                                
                                                  <div class="btn-group pull-right">
                                                  <input type="hidden" id="ref_id" value="<?php echo $ref_id; ?>" >
                                                  <input type="hidden" id="save_update" value="" >
                                                       <button class="btn btn-primary" type="submit">Check Out</button>
                                                  </div>
                                             </form>
                                             <form id="merch_form" method="post" action="<?php echo base_url() . 'Payment/transaction' ?>">
														<!-- <input type="hidden" value="225578" id="merchant_id" name="merchant_id"> -->
														<input type="hidden" value="225578" id="merchant_id" name="merchant_id">
														<input type="hidden" value="" id="order_id"  name="order_id">
														<input type="hidden" value="INR" id="currency"  name="currency">
														<input type="hidden" value="" id="amount"  name="amount">
														<input type="hidden"  name="redirect_url" value="<?php echo base_url() . 'Payment/responce' ?>" id="redirect_url">
														<input type="hidden" name="cancel_url" value="<?php echo base_url() . 'Payment/responce' ?>" id="cancel_url">
														<input type="hidden" name="language" value="en" id="language">
								
														
														<input type="submit" value="submit" id="payment" style="display:none">
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
     <script type="text/javascript">var baseurl = "<?php print base_url(); ?>";</script>
     <script src="<?php echo base_url(); ?>assets/js/myjs/payment_form.js"></script>

</body>

</html>