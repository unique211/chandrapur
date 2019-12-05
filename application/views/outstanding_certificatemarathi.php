<div id="page-wrapper" style="min-height: 529px;">

	<style>
		.textbox
		{
			height: 34px;
			border-radius: 4px;
			border: 1px solid #ccc;
			padding: 6px 12px;
			font-size: 14px;
			line-height: 1.42857143;
			position: relative;
			margin: 5px;
		}
		
	</style>


	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
				<?php
 
                             
 foreach($record as $value)
 {
	$today= date('d/m/Y');
 ?>
				
						<div id="divToPrint">
							
							<center>
							<table id="tbl_2" style="width:100%">
								<tbody><tr>
									<th colspan="4"><center><h3>  चंद्रपूर शहर महानगरपालिका , चंद्रपूर </h3></center></th>
								</tr>
								<tr>
									<th colspan="4"><center><h3>  जिल्हा , चंद्रपूर </h3></center></th>
								</tr>
								<tr>
									<th colspan="4"><center><h3>  स्थापना , 0000-00-00 </h3></center></th>
								</tr>
								
								
								<tr><td colspan="4">&nbsp;</td></tr>
								<tr>
									<td>
										दुरध्वनी क्रं. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; /&nbsp;&nbsp;&nbsp;0									</td>
									<td colspan="3" rowspan="3" style="padding-left: 1%;width: 80%;"></td>
								</tr>
								
								<tr>
									<td>
										क्रं. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2019 / प्रशा /   
									</td>
								</tr>
								
								<tr>
									<td>चंद्रपूर शहर महानगरपालिका , दिनांक : &nbsp;&nbsp;  <?php echo $today; ?> </td>
								</tr>
								
								<tr><td colspan="4">&nbsp;</td></tr>
								<tr>
									<th colspan="4"><center><h3> - :: थकबाकी नसलेबाबत प्रमाणपत्र :: - </h3></center></th>
								</tr>
								
								<tr><td colspan="4">&nbsp;</td></tr>
								<tr><td colspan="4">&nbsp;</td></tr>
								
								<tr>
									<th colspan="4"><center><b><?php echo htmlentities($value->name);?></b> </center></th>
								</tr>
								
								<tr>
									<th colspan="4"><center> मिळकत नं. <?php echo htmlentities($value->income_no);?> </center></th>
								</tr>
								
								<tr><td colspan="4">&nbsp;</td></tr>
								<tr>
									<th colspan="4"><center><b> विषय </b>: थकबाकी नसलेबाबत प्रमाणपत्र मिळणेबाबत </center></th>
								</tr>
								
								<tr>
									<th colspan="4"><center> संदर्भ : आपला अर्ज <?php echo htmlentities($value->app_date);?> </center></th>
								</tr>
								
								<tr>
									<td colspan="4" style="padding-top: 1%;padding-left: 1%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; येणेबाकी प्रमाणपत्र देण्यात येतो की,  <?php echo htmlentities($value->name2);?> हे  <?php echo htmlentities($value->address);?>येथील रहिवाशी असून यांचेकडे सन  <?php echo htmlentities($value->res_date);?> अखेर चंद्रपूर शहर महानगरपालिकाची थकबाकी नाही.  </td>
								</tr>
								
								<tr>
									<td colspan="4" style="padding-top: 1%;padding-left: 1%;line-height: 2;margin: 5px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;सदर प्रमाणपत्र त्यांच्या मागणी अर्जावरून देण्यात येत आहे .</td>
								</tr>
							</tbody></table>
						</center></div>
						
						<?php }?>
				</div>
			</div><!-- /.panel -->
		</div>  <!-- /.col-lg-12 -->
	</div><!-- /.row -->
	
	<?php include('include/footer_scripts.php');  ?>
<!-- <button onclick="myFunction()">Print this page</button> -->
<a  class="printPage btn btn-primary" href="#">Print</a>
		
	<script>

//function to submit form with all textbox values

$('a.printPage').click(function() {
        var divToPrint = document.getElementById("divToPrint");
        newWin = window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    });

</script>