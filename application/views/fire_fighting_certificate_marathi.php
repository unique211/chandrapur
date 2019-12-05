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
<div id="page-wrapper" style="min-height: 529px;">

	

<?php
 
                             
 foreach($record as $value)
 {
	$today= date('d/m/Y');
 ?>

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
				
                    <input type="hidden" id="cer_type" value="0" name="cer_type">					
						<div id="divToPrint">
							
							<center>
							<table id="tbl_2" style="width:100%">
								<tbody><tr>
									<th colspan="4"><center><h3>  चंद्रपूर शहर महानगरपालिका</h3></center></th>
								</tr>
								<tr>
									<th colspan="4"><center><h3>अग्निशमन आणि आणीबाणी सेवा</h3></center></th>
								</tr>
								<tr>
									<td colspan="4"><center>कार्यालय : चंद्रपूर शहर महानगरपालिका , चंद्रपूर , तालुका : चंद्रपूर  , जिल्हा : चंद्रपूर , फोन नं. : 0</center></td>
								</tr>
								<tr style=" border-bottom:1px solid black;"><td colspan="4">&nbsp;</td></tr>
								<tr style=" border-bottom:1px solid black;"><td colspan="4">&nbsp;</td></tr>
								<tr><td colspan="4">&nbsp;</td></tr>
								
								<tr>
									<td>
										जा. क्रं. 
									</td>
									<td colspan="2" style="padding-left: 1%;width: 40%;"></td>
									<td>दिनांक : &nbsp;&nbsp; <?php echo $today; ?> </td>
								</tr>
								
								<tr><td colspan="4">&nbsp;</td></tr>
								
								<tr>
									<td>
										प्रति,
									</td>
									<td colspan="3" rowspan="5" style="padding-left: 1%;width: 60%;"></td>
								</tr>
								
								<tr>
									<td>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; मेसर्स -<b><u><?php echo htmlentities($value->name);?></u></b>
									</td>
								</tr>
								
								<tr>
									<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; प्रो. श्री. <b><u><?php echo htmlentities($value->prof_name);?></u></b> </td>
								</tr>
								
								<tr>
									<td>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  ____________________________________
									</td>
								</tr>
								
								<tr>
									<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ____________________________________ </td>
								</tr>
								
								<tr><td colspan="4">&nbsp;</td></tr>
								<tr><td colspan="4">&nbsp;</td></tr>
								
								<tr>
									<td colspan="2" rowspan="3" style="width:20%;">&nbsp;</td>
									<th colspan="2"><b> विषय </b>:  <b> <?php echo htmlentities($value->subject);?></b>  ना -हरकत दाखला</th>
								</tr>
								
								<tr>
									<td colspan="2"><b> संदर्भ </b> : १. आपला दिनांक <b><?php echo htmlentities($value->nref_date);?></b> रोजीचा अर्ज</td>
								</tr>
								
								<tr>
									<td colspan="2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; २. ना -हरकत दाखला<b><?php echo htmlentities($value->form_no);?></b> फि रु. <b><?php echo htmlentities($value->fee);?></b> रोजीचा भरणा.</td>
								</tr>
								
								<tr><td colspan="4">&nbsp;</td></tr>
								
								<tr>
									<td colspan="4" style="padding-top: 1%;padding-left: 1%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; महोदय,  </td>
								</tr>
								
								<tr>
									<td colspan="4" style="padding-top: 1%;padding-left: 1%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; उपरोक्त संदर्भित विषयांन्वये,  चंद्रपूर शहर महानगरपालिका अग्निशमन दलाकडून मेसर्स-  <b><?php echo htmlentities($value->fire_name);?></b> या   <b><?php echo htmlentities($value->fire_sub);?></b> करीता अग्निशमन दलाची हरकत नाही.  </td>
								</tr>
								
								<tr>
									<td colspan="4" style="padding-top: 1%;padding-left: 1%;line-height: 2;margin: 5px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;सदर ना -हरकत दाखल्याची मुदत दिनांक  <b><?php echo htmlentities($value->ncertificate_date);?></b> पर्यंत आहे. </td>
								</tr>
								
								<tr><td colspan="4">&nbsp;</td></tr>
							</tbody></table>
						</center></div>
 <?php }?>
				
				</div>
			</div><!-- /.panel -->
		</div>  <!-- /.col-lg-12 -->
	</div><!-- /.row -->
		
	</div>
 
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