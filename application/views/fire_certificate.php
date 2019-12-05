<style>
	table {

		border-collapse: collapse;
		table-layout: auto;

	}

	th,
	td {

		text-align: left;

	}

	.allborder {

		border: 1px solid #000;



		text-align: left;

	}
</style>



<div style="text-align:center" id='receipt'>
	<?php


	foreach ($record as $value) {
		$today = date('d/m/Y');
		?>



		<table width="100%" style="border:2px solid rgb(0,0,0);">

			<tr style="padding-left:1%;">
				<td colspan="5">
					<table width="100%">
						<tr>
							<td width="150px" style="padding-left:1%;"><img src="<?php echo base_url() ?>images/cmc.jpg" width="100px" height="100px" style="margin-left:2px" /></td>
							<td style="margin-left: -10%;">
								<center>
									<h2 style="margin-left:-20%;">चंद्रपूर शहर महानगरपालिका, चंद्रपूर</h2>
								</center>
							</td>
						</tr>
					</table>
				</td>


				<!-- <td  colspan="1" style="border-right: 2px solid rgb(0, 0, 0);border-top: 2px solid rgb(0, 0, 0);"></td> -->
			</tr>



			<!-- <tr style="padding-left:1%;">
							<td colspan="5" style="border-right: 2px solid rgb(0, 0, 0);padding-left:1%;padding-right:1%;"><br></td>
						</tr>
						<tr style="padding-left:1%;">
							<td colspan="5" style="border-right: 2px solid rgb(0, 0, 0);padding-left:1%;padding-right:1%;"><br></td>
						</tr> -->
			<tr style="padding-left:1%;">
				<td colspan="5" style="border-right: 2px solid rgb(0, 0, 0);padding-left:1%;padding-right:1%;"><br></td>
			</tr>
			<tr style="padding-left:1%;">

				<td colspan="4" nowrap style="border-left: 2px solid rgb(0, 0, 0);padding-left:1%;">क्रमांक: चंशमनपा/अग्निशमन विभाग <?php echo htmlentities($value->reg_no); ?></td>
				<td style="text-align:right;padding-right:1%;border-right: 2px solid rgb(0, 0, 0);">दिनांक: <?php echo htmlentities($value->ncertificate_date); ?></td>

			</tr>

			<tr style="padding-left:1%;">

				<td colspan=5 style="border-right: 2px solid rgb(0, 0, 0);padding-left:1%;padding-right:1%;"> </td>
			</tr>


			<tr style="border-left: 2px solid rgb(0, 0, 0);border-right: 2px solid rgb(0, 0, 0);border-bottom: 2px solid rgb(0, 0, 0);padding-left:1%;">

				<td colspan=5 style="border-right: 2px solid rgb(0, 0, 0);padding-left:1%;padding-right:1%;"> </td>
			</tr>
			<tr style="padding-left:1%;">

				<td colspan=5 style="border-right: 2px solid rgb(0, 0, 0);padding-left:1%;padding-right:1%;"> </td>
			</tr>

			<tr style="font-weight:bold;padding-left:1%;">

				<td colspan="5" style="border-right: 2px solid rgb(0, 0, 0);padding-left:1%;padding-right:1%;">
					<center>
						<h4>अग्निशमन ना-हरकत प्रमाणपत्र</h4>
					</center>
				</td>

			</tr>

			<tr style="padding-left:1%;">

				<td colspan="5" style="border-right: 2px solid rgb(0, 0, 0);padding-left:1%;padding-right:1%;text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; प्रमाणपत्र देण्यात येते की, अग्निसुरक्षा कायद्याचे परीक्षण करण्याकरीता संचालक महाराष्ट्र अग्निशमन सेवा, मुंबई यांनी निश्चित केलेल्या एजन्सी यांनी महाराष्ट्र आग प्रतिबंधक व जीवसरंक्षक उपाययोजना अधिनियम २००६ अंतर्गत, खाली नमूद व्यावसायिक ठिकाणातील अग्निसुरक्षा व्यवस्थेचे परीक्षण (फायर सेफ्टी ऑडिट) व आग प्रतिबंधक उपाययोजनेची तपासणी दिनांक <?php echo htmlentities($value->ncertificate_date); ?> रोजी केली. त्यांनी खालीलप्रमाणे अग्निप्रतिबंधक उपाययोजना अस्तित्वात असल्याचे प्रमाणित केले आहे.</td>

			</tr>

			<tr style="padding-left:1%;">
				<td colspan=5 style="border-right: 2px solid rgb(0, 0, 0);padding-left:1%;padding-right:1%;"><br></td>
			</tr>
			<tr>
				<td colspan=5>
					<table width="100%">
						<tr style="padding-left:1%;">
							<td style="padding-left:1%;padding-right:1%;width:25%;">व्यवसायाचे नाव</td>
							<td style="padding-left:1%;padding-right:1%;">: <?php echo htmlentities($value->bussiness_name); ?></td>

						</tr>
						<tr style="padding-left:1%;">
							<td colspan=2 style="padding-left:1%;padding-right:1%;"><br></td>
						</tr>
						<tr style="padding-left:1%;">
							<td style="padding-left:1%;padding-right:1%;">ठिकाण</td>
							<td style="padding-left:1%;padding-right:1%;">: <?php echo htmlentities($value->address); ?></td>

						</tr>
						<tr style="padding-left:1%;">
							<td colspan=2 style="padding-left:1%;padding-right:1%;"><br></td>
						</tr>
						<tr style="padding-left:1%;">

							<td style="padding-left:1%;padding-right:1%;">उपाययोजनेचे विवरण</td>
							<td style="padding-left:1%;padding-right:1%;">: <?php echo htmlentities($value->details_solution); ?></td>
						</tr>
						<tr style="padding-left:1%;">
							<td colspan=2 style="padding-left:1%;padding-right:1%;"><br></td>
						</tr>
						<tr style="padding-left:1%;">

							<td style="padding-left:1%;padding-right:1%;">परीक्षण एजन्सी</td>
							<td style="padding-left:1%;padding-right:1%;">: <?php echo htmlentities($value->testing_agency); ?></td>
						</tr>
						<tr style="padding-left:1%;">
							<td colspan=2 style="padding-left:1%;padding-right:1%;"><br></td>
						</tr>
						<tr style="padding-left:1%;">

							<td style="padding-left:1%;padding-right:1%;">एजन्सीचे लायसन्स क्रं.</td>
							<td style="padding-left:1%;padding-right:1%;">: <?php echo htmlentities($value->agency_license_no); ?></td>
						</tr>
					</table>
				</td>

			</tr>


			<tr style="padding-left:1%;">
				<td colspan=5 style="border-right: 2px solid rgb(0, 0, 0);padding-left:1%;padding-right:1%;"><br></td>
			</tr>

			<tr style="padding-left:1%;">

				<td colspan="5" style="border-right: 2px solid rgb(0, 0, 0);padding-left:1%;padding-right:1%;text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; सदर प्रमाणपत्र दिनांक १ जानेवारी/ १ जुलै २०____ पासून सहा महिन्यापर्यंत वैध असेल. अग्निशमन प्रतिबंधक उपाययोजनेची तपासणी दर सहा महिन्यात (जानेवारी/जुलै) चंद्रपूर शहर महानगरपालिका ने निश्चित केलेल्या एजन्सीकडून करवून घेणे व्यावसायिकांना बंधनकारक आहे.</td>

			</tr>
			<tr style="padding-left:1%;">

				<td colspan="5" style="border-right: 2px solid rgb(0, 0, 0);padding-left:1%;padding-right:1%;text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; सदर प्रमाणपत्र यापुढे नूतनीकरण करतेवेळी चंद्रपूर शहर महानगरपालिका चा कर विभागाकडून चालू वर्षाचा कर भरणा केल्याची कर पावती जोडणे बंधनकारक असेल.</td>

			</tr>



			<tr style="padding-left:1%;">

				<td colspan=5 style="border-right: 2px solid rgb(0, 0, 0);padding-left:1%;padding-right:1%;"> </td>
			</tr>

			<tr style="padding-left:1%;">

				<td colspan=5 style="border-right: 2px solid rgb(0, 0, 0);padding-left:1%;padding-right:1%;"> </td>
			</tr>

			<tr style="padding-left:1%;">

				<td colspan=5 style="border-right: 2px solid rgb(0, 0, 0);padding-left:1%;padding-right:1%;"></td>
			</tr>

			<tr style="padding-left:1%;">

				<td colspan=5 style="border-right: 2px solid rgb(0, 0, 0);padding-left:1%;padding-right:1%;"></td>
			</tr>

			<tr style="padding-left:1%;">

				<td colspan=5 style="border-right: 2px solid rgb(0, 0, 0);padding-left:1%;padding-right:1%;"></td>
			</tr>

			<tr style="padding-left:1%;">

				<td colspan=5 style="border-right: 2px solid rgb(0, 0, 0);padding-left:1%;padding-right:1%;"></td>
			</tr>

			<tr style="padding-left:1%;">

				<td colspan=5 style="border-right: 2px solid rgb(0, 0, 0);padding-left:1%;padding-right:1%;"></td>
			</tr>

			<tr style="padding-left:1%;">

				<td colspan=5 style="border-right: 2px solid rgb(0, 0, 0);padding-left:1%;padding-right:1%;"></td>
			</tr>

			<tr style="padding-left:1%;">

				<td colspan=5 style="border-right: 2px solid rgb(0, 0, 0);padding-left:1%;padding-right:1%;"></td>
			</tr>

			<tr style="padding-left:1%;">

				<td colspan=5 style="border-right: 2px solid rgb(0, 0, 0);padding-left:1%;padding-right:1%;"> </td>
			</tr>

			<tr style="padding-left:1%;">

				<td colspan=5 style="border-right: 2px solid rgb(0, 0, 0);padding-left:1%;padding-right:1%;"> </td>
			</tr>

			<tr style="padding-left:1%;">

				<td colspan=5 style="border-right: 2px solid rgb(0, 0, 0);padding-left:1%;padding-right:1%;"> </td>
			</tr>

			<tr style="padding-left:1%;">

				<td colspan=5 style="border-right: 2px solid rgb(0, 0, 0);padding-left:1%;padding-right:1%;"> </td>
			</tr>

			<tr style="padding-left:1%;">

				<!-- <td colspan=3></td> -->

				<td style="font-weight:bold ;border-right: 2px solid rgb(0, 0, 0);padding-right:10%;text-align:right;" colspan=5>
					ऊपायुक्त
				</td>

			</tr>

			<tr style="padding-left:1%;">

				<!-- <td colspan=2></td> -->

				<td style="font-weight:bold ;border-right: 2px solid rgb(0, 0, 0);padding-right:1%;padding-bottom:1%;text-align:right;" colspan=5>
					चंद्रपूर शहर महानगरपालिका, चंद्रपूर
				</td>

			</tr>

		</table>

	<?php } ?>
</div>



<div style="text-align: center">



	<!-- <a  class="printPage btn btn-primary" href="#">Print</a> -->

</div>





<?php include('include/footer_scripts.php');  ?>

<script>
	var sTable = document.getElementById('receipt').innerHTML;

	var style = "<style>";
	style = style + "table {  border-collapse: collapse;}";
	style = style + "th, td {  text-align: left;}";
	style = style + ".allborder {   border: 1px solid #000; text-align: left;}";
	style = style + "</style>";
	/*$('a.printPage').click(function() {
	     var divToPrint = document.getElementById("divToPrint");
	     newWin = window.open("");
	     newWin.document.write(divToPrint.outerHTML);
	     newWin.print();
	     newWin.close();
	});*/

	var win = window.open('', '', 'height=700,width=700');

	win.document.write('<html><head>');
	win.document.write('<title>Receipt</title>'); // <title> FOR PDF HEADER.
	win.document.write(style); // ADD STYLE INSIDE THE HEAD TAG.
	win.document.write('</head>');
	win.document.write('<body>');
	win.document.write(sTable); // THE TABLE CONTENTS INSIDE THE BODY TAG.
	win.document.write('</body></html>');

	win.document.close(); // CLOSE THE CURRENT WINDOW.
	win.print();
	/*
	$('a.printPage').click(function() {
	        var divToPrint = document.getElementById("receipt");
	        newWin = window.open("");
	        newWin.document.write(divToPrint.outerHTML);
	        newWin.print();
	        newWin.close();
	    });*/
</script>