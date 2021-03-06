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
				<li class="active">Import Birth Data</li>
			</ul>
			<!-- END BREADCRUMB -->
			<!-- PAGE CONTENT WRAPPER -->
			<div class="page-content-wrap">

				<!-- strat notification -->
				<div class="row tablehideshow">
					<div class="col-md-12 col-sm-12 col-xs-12 right_side" id="form1">
						<!-- START SIMPLE DATATABLE -->
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Import Data</h3>
								<!-- <div class="pull-right">
                                             <button class="btn btn-success closehideshow" style="background-color:#00B050;">View Detail</button>
                                        </div> -->
							</div>
							<div class="panel-body">
								<div class="col-lg-12">



									<form method="post" id="import_form" enctype="multipart/form-data">
										<div class="form-group row">
											<div class="col-sm-3">
												<label>Select File Type*</label>
											</div>
											<div class="col-sm-3">
												<select name="file_type" class="form-control" id="file_type" required>
													<option value="">Select Type</option>
													<option value="Birth">Birth Excell File</option>
													<option value="Death">Death Excell File</option>
												</select>
											</div>
											<div class="col-sm-3">
												<label>Select Excel File*</label>
											</div>
											<div class="col-sm-3">
												<input type="file" name="file" id="file" required accept=".xls, .xlsx" />
											</div>
										</div>



										<input type="submit" name="import" value="Import" class="btn btn-info" />
										<div id="wait" style="width:100px;height:100px;position:absolute;top:;left:45%;padding:2px;display:none">
											<img src="<?php echo base_url('images/loader.gif'); ?>" width="100" height="100" /><br>
											<center>
												<h5>Please Wait...</h5>
											</center>
										</div>
									</form>





								</div>
							</div>

						</div>
						<!--panel panel default-->
						<!-- END SIMPLE DATATABLE -->
					</div>
					<!------------------------form1-end------------------------------->
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
	<!-- <script src="<?php echo base_url(); ?>assets/js/myjs/birth_death.js"></script> -->
	<!--fileupload Files -->
	<script src="<?php echo base_url() . 'assets/js/AjaxFileUpload.js' ?>"></script>

	<!-- <script src="<?php echo base_url() . 'assets/js/myjs/import.js' ?>"></script> -->
	<script type="text/javascript">
		$('.clockpicker').clockpicker();
	</script>
	<script>
		$(document).ready(function() {
			$("#wait").hide();

			$('#import_form').on('submit', function(e) {
				e.preventDefault();
				$("#wait").show();
				$(':input[type="submit"]').prop('disabled', true);
				var file_type = $("#file_type").val();
			
				if (file_type == "Birth") {
					$.ajax({
						url: "<?php echo base_url(); ?>Excel_import/import_birth",
						method: "POST",
						data: new FormData(this),
						contentType: false,
						cache: false,
						processData: false,
						success: function(data) {
							$('#file').val('');
							//load_data();
							$("#wait").hide();
							//alert(data);
							swal("Done !!", data, "success");
							$(':input[type="submit"]').prop('disabled', false);
						}
					});
				} else {
					$.ajax({
						url: "<?php echo base_url(); ?>Excel_import/import_death",
						method: "POST",
						data: new FormData(this),
						contentType: false,
						cache: false,
						processData: false,
						success: function(data) {
							$('#file').val('');
							//load_data();
							$("#wait").hide();
							swal("Done !!", data, "success");
							$(':input[type="submit"]').prop('disabled', false);
						}
					});
				}

			});

		});
	</script>
	<script>
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
