<style>
	table {

		border-collapse: collapse;

	}

	th,
	td {

text-align: left;
word-wrap:break-word;

}

	.allborder {

		border: 1px solid #000;



		text-align: left;

	}
</style>




<div style="text-align:center" id='chalan'>

	<?php


$i = 0;
$tamt = 0;
$tamt_extra = 0;
$receipt_no= '';
$receipt_no_extra= '';
$today= date('d/m/Y');
foreach ($record as $value) {
	if($i==0)
		$receipt_no=$value->receipt_no;
		else {
			$receipt_no .=', '.$value->receipt_no;
		}
		$tamt = $tamt  + $value->amt;
		$i++;
	

}
$i=0;

foreach ($record_extra as $value) {
	if($i==0)
		$receipt_no_extra=$value->receipt_no;
		else {
			$receipt_no_extra .=', '.$value->receipt_no;
		}
		$tamt_extra = $tamt_extra  + $value->payble_amt;
		$i++;
	

}
// Concatenation Of String 
//$receipt_no1 = $receipt_no.",".$receipt_no;
//	$receipt_no=$receipt_no1;
		?>

		<center>
			<table width="95%" style="table-layout:initial;">

				<tr>
					<td colspan=5>
						<center>
							<h2>चंद्रपूर शहर महानगरपालिका</h2>
						</center>
					</td>
				</tr>

				<tr>
					<td colspan=5 style="margin-top:-10%;font-size:14px;">
						<center>नमुना क्र . १३</center>
					</td>
				</tr>

				<tr>
					<td colspan=5> </td>
				</tr>
				<tr>
					<td colspan=5> </td>
				</tr>
				<tr>
					<td colspan=5> </td>
				</tr>

				<tr>
					<td colspan=5> </td>
				</tr>
				<tr>
					<td colspan=5> </td>
				</tr>

				<tr>

					<td class="allborder" style="font-size:14px;" rowspan=2 colspan=2>नियम ३३ (ने ), ६५,७०(२),७३(५),७८(३),९७(५) आणि १०७ ने लेखा विभागामध्ये पैसे भरण्यासाठी चलन</td>

					<td colspan=1 style="font-size:14px;">चलन क्र.</td>
					<td colspan=2 style="border-left:1px solid #000;border-right:1px solid #000">
						<center><?php echo $challanno;?></center>
					</td>



				</tr>

				<tr>

					<td colspan=1>दिनांक</td>
					<td colspan=2 style="border-left:1px solid #000;border-right:1px solid #000">
						<center><?php echo $today;?></center>
					</td>

				</tr>

				<tr height="50px">

					<td class="allborder" colspan=3>
						<center><b>कराचे नाव</b></center>
					</td>

					<td class="allborder" colspan=2>
						<center><b>एकूण जमा रक्कम</b></center>
					</td>




				</tr>
				<?php
					if($tamt_extra > 0 ){
						?>
						<tr style="border-left:1px solid #000;table-layout:fixed;">

					<td style="border-left:1px solid #000;word-wrap: break-word; " width="80" colspan=3>सर्व साधारण पावती क्रमांक</td>

					<td nowrap class="allborder" colspan=2 rowspan=3><?php echo $tamt_extra;?></td>

				</tr>

				<tr style="border-left:1px solid #000;">

<td style="height:50px;word-wrap: break-all;white-space: normal;max-width:200px;" width="80%" colspan=3 rowspan=2><?php


// Concatenation Of String 
//$receipt_no1 = $receipt_no.",".$receipt_no;
//	$receipt_no=$receipt_no1;?>
<?php	echo htmlentities($receipt_no_extra);?> 
</td>

</tr>
				<tr>
					<td colspan=5></td>
				</tr>
				<?php
				}
				?>
				<?php
					if($tamt > 0 ){
						?>
				<tr style="border-left:1px solid #000;table-layout:fixed;">

					<td style="border-left:1px solid #000;border-top:1px solid #000;word-wrap: break-word; " width="80" colspan=3>विवाह नोंदणी प्रमाणपत्र</td>

					<td nowrap class="allborder" colspan=2 rowspan=3><?php echo $tamt;?></td>

				</tr>

				<tr style="border-left:1px solid #000;">

					<td style="height:50px;word-wrap: break-all;white-space: normal;max-width:200px;" width="80%" colspan=3 rowspan=2><?php


// Concatenation Of String 
//$receipt_no1 = $receipt_no.",".$receipt_no;
//	$receipt_no=$receipt_no1;?>
	<?php	echo htmlentities($receipt_no);?> 
	</td>

				</tr>

				<tr>
					<td colspan=5></td>
				</tr>
				<?php
				}
				?>
				<tr>

					<td class="allborder" style="text-align:right;padding-right:1%;" colspan=3>एकूण जमा रक्कम</td>
					<td class="allborder" colspan=2><?php echo ($tamt+$tamt_extra);?></td>

				</tr>

				<tr height="70px">

					<td nowrap style="border-left:1px solid #000;border-bottom:1px solid #000;" colspan=2>पडताळणी व महानगरपालिका निधी मध्ये जमा करण्यासाठी रुपये जमा केले</td>

					<td nowrap style="border-right:1px solid #000;border-bottom:1px solid #000;">काम्पुटर पावती</td>

					<td style="border-right:1px solid #000;border-bottom:1px solid #000;" colspan=2><?php echo $this->session->username;?> रक्कम घेणारा लिपिक</td>

				</tr>

				<tr height="70px">

					<td nowrap style="border-left:1px solid #000;border-bottom:1px solid #000;" colspan=2>तपासले आणि वसुली नोंदवहीतील बेरजेशी जुळते . त्यातील नोंदी पावत्याच्या दुसऱ्या प्रतिशी पडताळून पहिल्या होत्या . </td>

					<td nowrap style="border-right:1px solid #000;border-bottom:1px solid #000;padding-top:5%;">अधीक्षक /निरीक</td>

					<td style="border-right:1px solid #000;border-bottom:1px solid #000;" colspan=2>रोख रक्कम मिळाली ,तपासले आणि नोंद घेतली .रोखपाल लेखापाल</td>

				</tr>


			</table>
			<br>
			<table width="60%" style="float:left;margin-left:1%;">
				<thead class="allborder">
					<tr>
						<th class="allborder">चलन (रुपये / पैसे )</th>
						<th class="allborder">एकुण नोटा / नाणी</th>
						<th class="allborder">एकुण रक्कम</th>
					</tr>
				</thead>
				<tbody class="allborder">
					<tr class="allborder">
						<td class="allborder">१०००</td>
						<td class="allborder"></td>
						<td class="allborder"></td>
					</tr>
					<tr class="allborder">
						<td class="allborder">५००</td>
						<td class="allborder"></td>
						<td class="allborder"></td>
					</tr>
					<tr class="allborder">
						<td class="allborder">१००</td>
						<td class="allborder"></td>
						<td class="allborder"></td>
					</tr>
					<tr class="allborder">
						<td class="allborder">५०</td>
						<td class="allborder"></td>
						<td class="allborder"></td>
					</tr>
					<tr class="allborder">
						<td class="allborder">२०</td>
						<td class="allborder"></td>
						<td class="allborder"></td>
					</tr>
					<tr class="allborder">
						<td class="allborder">१०</td>
						<td class="allborder"></td>
						<td class="allborder"></td>
					</tr>
					<tr class="allborder">
						<td class="allborder">५</td>
						<td class="allborder"></td>
						<td class="allborder"></td>
					</tr>
					<tr class="allborder">
						<td class="allborder">२</td>
						<td class="allborder"></td>
						<td class="allborder"></td>
					</tr>
					<tr class="allborder">
						<td class="allborder">०.५०</td>
						<td class="allborder"></td>
						<td class="allborder"></td>
					</tr>
				</tbody>
				<tfoot class="allborder">
					<tr>
						<td></td>
						<td style="text-align:right;">Total Rs</td>
						<td class="allborder"></td>
					</tr>
				</tfoot>
			</table>

		</center>

</div>


<div style="text-align: center">



	<!-- <a  class="printPage btn btn-primary" href="#">Print</a> -->

</div>





<?php include('include/footer_scripts.php');  ?>

<script>
		var sTable = document.getElementById('chalan').innerHTML;

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