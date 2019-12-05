<div id="page-wrapper" style="min-height: 62px;">

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
	

	   <?php
 
                             
 foreach($record as $value)
 {
	$today= date('d/m/Y');
 ?>

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<form name="form_no_obj_cert" method="POST" id="form_no_obj_cert">  
                       <input type="hidden" id="cer_type" value="1" name="cer_type">						
						<div id="divToPrint">
							
							<center>
							<table id="tbl_2" style="width:100%">
								<tbody><tr>
									<th colspan="4"><center><h3>  चंद्रपूर शहर महानगरपालिका</h3></center></th>
								</tr>
								<tr>
									<th colspan="4"><center><h3>अग्निशमन अंतिम ना-हरकत प्रमाणपत्र</h3></center></th>
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
									<td>दिनांक : &nbsp;&nbsp;<?php echo $today; ?> </td>
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
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; मेसर्स - <b><u><?php echo htmlentities($value->name);?></u></b>
									</td>
								</tr>
								
								<tr>
									<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; प्रो. श्री.  <b><u><?php echo htmlentities($value->prof_name);?></u></b></td>
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
									<th colspan="2"><b> विषय </b>: <b> <?php echo htmlentities($value->subject);?></b>  अग्निशमन अंतिम ना -हरकत दाखला</th>
								</tr>
								
								<tr>
									<td colspan="2"><b> संदर्भ </b> : १. आपला दिनांक  <b><?php echo htmlentities($value->nref_date);?></b> रोजीचा अर्ज</td>
								</tr>
								
								<tr>
									<td colspan="2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; २. अग्निशमन अंतिम ना -हरकत दाखला फि रु. <b> <?php echo htmlentities($value->fee);?></b> /- पावती क्रं . <b><?php echo htmlentities($value->form_no);?></b> दि. <b><?php echo htmlentities($value->nbill_date);?></b> रोजीचा भरणा.</td>
								</tr>
								
								<tr><td colspan="4">&nbsp;</td></tr>
								
								<tr>
									<td colspan="4" style="padding-top: 1%;padding-left: 1%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; महोदय,  </td>
								</tr>
								
								<tr>
									<td colspan="4" style="padding-top: 1%;padding-left: 1%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; उपरोक्त संदर्भित विषयांन्वये,  चंद्रपूर शहर महानगरपालिका अग्निशमन दलाकडून मेसर्स-<b><?php echo htmlentities($value->fire_name);?></b>  या  <b><?php echo htmlentities($value->fire_sub);?></b> करीता अग्निशमन दलाची हरकत नाही.  </td>
								</tr>
								
								<tr><td colspan="4">&nbsp;</td></tr>
								
								
								<tr><td colspan="4">&nbsp;</td></tr>
								<tr>
									<td colspan="4" style="padding-top: 1%;padding-left: 1%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="text-decoration:underline;"><b>अटी :-  </b></span></td>
								</tr>
								
								<tr><td colspan="4">&nbsp;</td></tr>
								
								<tr>
									<td colspan="4" style="padding-top: 1%;padding-left: 1%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; १ . धंद्याचे ठिकाणी आगीसारखी दुर्घटना घडल्यास फायर ब्रिगेडची गाडी सहज पोहचेल असा रस्ता असणे आवश्यक आहे.   </td>
								</tr>
								
								<tr>
									<td colspan="4" style="padding-top: 1%;padding-left: 1%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; २ . केरोसिनचा साठा स्टोव्हपासून वेगळ्या खोलीत ठेवावा. </td>
								</tr>
								
								<tr>
									<td colspan="4" style="padding-top: 1%;padding-left: 1%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ३ . किचनरूम मध्ये एक्झॉस्ट पंख बसविणे (आवश्यकतेनुसार) .</td>
								</tr>
								
								<tr>
									<td colspan="4" style="padding-top: 1%;padding-left: 1%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ४ . हॉटेल चे ठिकाणी फायरब्रिगेडचे नियमानुसार अग्निसंरक्षण यंत्रणा ठेवणे (फायर एक्स्टींग्युशर्स ठेवावे.)</td>
								</tr>
								
								<tr>
									<td colspan="4" style="padding-top: 1%;padding-left: 1%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; अ) ए. बी. सी. टाईप फायर एक्स्टींग्युशर्स ०५ किलो वजनाचे २ नग. </td>
								</tr>
								
								<tr>
									<td colspan="4" style="padding-top: 1%;padding-left: 1%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ५ . नियमाप्रमाणे सर्व सरकारी परवाने घेतल्यानंतरच सदरचा धंदा सुरु करावा.</td>
								</tr>
								
								<tr>
									<td colspan="4" style="padding-top: 1%;padding-left: 1%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ६ . आगीसारखी घटना घडल्यास रहदारीला कोणत्याही प्रकारचा अडथळा निर्माण होणार नाही याची दक्षता घ्यावी.</td>
								</tr>
								
								<tr>
									<td colspan="4" style="padding-top: 1%;padding-left: 1%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ७ . अग्निशमन अधिकारी तपासनीस येतील त्यावेळी जर वरील बाबींमध्ये त्रुटी आढळल्यास कोणत्याही प्रकारची सूचन न देता जागेवर दाखला रद्द करण्याचा अधिकार अग्निशमन अधिकारी यांना राहील.</td>
								</tr>
								
								<tr>
									<td colspan="4" style="padding-top: 1%;padding-left: 1%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ८ . सदराचा ना-हरकत दाखला प्राप्त झाल्यावर असणाऱ्या त्रुटी व कमतरतेबद्दल व्यावासधारक व्यक्तिशः जबाबदार असून याबाबत अग्निशमन अधिकारी वा महापालिका जबाबदार राहणार नाही.</td>
								</tr>
								
								<tr>
									<td colspan="4" style="padding-top: 1%;padding-left: 1%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ९ . भविष्यात गरज वाटल्यास अग्निशमन अधिकारी ह्यांचे सूचनेनुसार आवश्यक ते फेरबदल / अतिरिक्त अग्निशमन उपाययोजना करणे बंधनकारक आहे.</td>
								</tr>
								
								<tr>
									<td colspan="4" style="padding-top: 1%;padding-left: 1%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; १० . सदर व्यवसाय करणेकरीता व्यवसाय धारकास चंद्रपूर शहर महानगरपालिका इतर आवश्यक परवानग्या प्राप्त करणे बंधनकारक राहील.</td>
								</tr>
								
								<tr>
									<td colspan="4" style="padding-top: 1%;padding-left: 1%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ११ . धंद्याच्या ठिकाणी अत्यावश्यक सेवा उदा. अग्निशमन दल, पोलीस अँम्बुलंस यांचे दूरध्वनी क्रंमांक फलकावर लावणे आवश्यक आहे . </td>
								</tr>
								
								<tr>
									<td colspan="4" style="padding-top: 1%;padding-left: 1%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="text-decoration:underline;"><b>सदर अग्निशमन अंतिम ना-हरकत दाखल्याची मुदत दिनांक <b><?php echo htmlentities($value->certificate_date);?></b>  पर्यंत आहे.</b></span> त्यानंतर अग्निशमन अंतिम ना-हरकत दाखला पुढील मुदतीकरिता नुतनीकरण करून घेणे व्यवसाय मालकास बंधनकारक राहील.  </td>
								</tr>
								
								<tr><td colspan="4">&nbsp;</td></tr>
								<tr>
									<td colspan="3" rowspan="3" style="padding-left: 1%;width: 60%;"></td>
									<td><center>प्र.  अग्निशमन अधिकारी </center></td>
								</tr>
								
								<tr>
									<td><center>अग्निशमन  सेवा</center></td>
								</tr>
								
								<tr>
									<td><center>चंद्रपूर शहर महानगरपालिका</center></td>
								</tr>
								
								<tr>
									<td colspan="4" style="padding-top: 1%;padding-left: 1%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="text-decoration:underline;line-height: 30px;"> सूचना : सदर अग्निशमन अंतिम ना -हरकत दाखल्याची मुदत संपल्यानंतर एक महिन्याचे आत ना-हरकत दाखल्याचे नुतनीकरण करून घेणे बंधनकारक राहील. जर वेळेत नुतनीकरण न केल्यास प्रति महिना ५०/- रुपये प्रमाणे लेट फी आकारण्यात येईल.</span> </td>
								</tr>
								<tr><td colspan="4">&nbsp;</td></tr>
							</tbody></table>
						</center></div>
						
					
 </form>  <?php }?>
				</div>
			</div><!-- /.panel -->
		</div>  <!-- /.col-lg-12 -->
	</div><!-- /.row -->
		

	<?php include('include/footer_scripts.php');  ?>
<!-- <button onclick="myFunction()">Print this page</button> -->
<a  class="printPage btn btn-primary" href="#">Print</a>

<script>

$('a.printPage').click(function() {
        var divToPrint = document.getElementById("divToPrint");
        newWin = window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    });

 
</script>


</div>