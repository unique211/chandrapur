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
                <li class="active">Menu Master</li>
            </ul>
            <!-- END BREADCRUMB -->
            <!-- PAGE CONTENT WRAPPER -->
            <div class="page-content-wrap">
                <!-- strat notification -->
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 right_side">
                        <!-- START SIMPLE DATATABLE -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Menu Master</h3>
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
                                                <label class="control-label">Menu Name*</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" placeholder="Menu Name" name="menu_name" id="menu_name" required>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label">Menu Order*</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" placeholder="Menu Order" name="menu_order" id="menu_order" required>
                                            </div>
                                        </div>
                                        
										<div class="form-group">
                                            <div class="col-md-3">
                                                <label class="control-label">Parent/Child*</label>
                                            </div>
											
                                            <div class="col-md-3">
                                               <select class="form-control zone" style="width:100%;" name="is_child" id="is_child" required>
                                                    <option value="" selected disabled>Select Parent/child</option>
                                                    <option value="FALSE">Parent</option>
                                                    <option value="TRUE">Child</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 hidepar">
                                                <label class="control-label">Select Parent*</label>
                                            </div>
                                            <div class="col-md-3 hidepar">
                                                <select class="form-control zone" style="width:100%;" name="parent_id" id="parent_id">
                                                    <option value="" selected disabled>Select Parent</option>
                                                    <?php foreach($data as $val) { ?>
													<option value="<?php echo $val->id; ?>"><?php echo $val->menu_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
										
                                        <div class="btn-group pull-right">
                                            <input type="hidden" id="save_update" value="">

                                            <button class="btn btn-primary" type="submit">Submit</button>

                                            <button class="btn btn-info" id="reset" type="button">Reset</button>
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
                                <h3 class="panel-title">Menu Master</h3>
                                <ul class="panel-controls">
                                    <li>
                                        <!--<button class="btn btn-success btnhideshow"
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
    <script type="text/javascript">
        var baseurl = "<?php print base_url(); ?>";
    </script>
      <script >
          $(document).on('change','#is_child',function(){
			  var childval = $(this).val();
			  if(childval == 'FALSE')
			  {
				  $('.hidepar').css('display','none');
			  }else{
				  $('.hidepar').css('display','');
			  }
		  });
    </script>
    <script src="<?php echo base_url(); ?>assets/js/myjs/menu_master.js"></script>
    
</body>

</html>