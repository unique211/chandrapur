<style>
	table {
		border-collapse: collapse;
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
	function getIndianCurrency($number)
	{
		$no = round($number);
		$point = round($number - $no, 2) * 100;
		$hundred = null;
		$digits_1 = strlen($no);
		$i = 0;
		$str = array();
		$words = array(
			0 => '', 1 => 'One', 2 => 'Two',
			3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
			7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
			10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
			13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
			16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
			19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
			40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
			70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety'
		);
		$digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
		while ($i < $digits_1) {
			$divider = ($i == 2) ? 10 : 100;
			$number = floor($no % $divider);
			$no = floor($no / $divider);
			$i += $divider == 10 ? 1 : 2;
			if ($number) {
				$plural = (($counter = count($str)) && $number > 9) ? 's' : null;
				$hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
				$str[] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural . ' ' . $hundred : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural . ' ' . $hundred;
			} else $str[] = null;
		}
		$str = array_reverse($str);
		$result = implode('', $str);
		// $points = ($point) ?"." . $words[$point / 10] . " " . $words[$point = $point % 10] : '';
		return $result . "Rupees Only";
	}
	foreach ($record as $value) {
		$today = date('d/m/Y');
		$amt = $value->payble_amt;
		$words = getIndianCurrency($amt);
		?>
			<div style="border-bottom:1px solid;width:100%;">
	<center><b>Customer Copy</b></center>	
</div><br>
	<table width="100%">
		<tr>
			<td><img src="<?php echo base_url() ?>images/logo.jpg" width="120px" height="120px" /></td>
			<td colspan="3" style="margin-top:-20%;">
				<center>
					<table>
						<tr style="font-size:12px;">
							<td>
								<center>नमुना क्र . २ (Form no. 2)</center>
							</td>
						</tr>
						<tr style="font-size:12px;">
							<td>
								<center>MA Form No 2</center>
							</td>
						</tr>
						<tr style="font-size:20px;">
							<td>
								<center><b>चंद्रपूर शहर महानगरपालिका</b></center>
							</td>
						</tr>
						<tr style="font-size:12px;">
							<td>
								<center>सर्वसाधारण पावती</center>
							</td>
						</tr>
						<tr style="font-size:12px;">
							<td>
								<center>See Rule 12,113.(2) 114,116.2 & 117,(1)(2)&(3)</center>
							</td>
						</tr>
					</table>
				</center>
			</td>
			<td colspan="2">
				<!--<img src="<?php echo base_url() ?>images/logo.jpg" width="120px" height="120px"align="right"/>-->
			</td>
		</tr>
		<tr>
			<td colspan="5"></td>
		</tr>
		<tr>
			<td colspan="5"></td>
		</tr>
		<tr>
			<td colspan="5"></td>
		</tr>
		<tr>
			<td colspan="5"></td>
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
		<tr style="font-size:13px;">
			<td colspan=3 rowspan=2>श्री / श्रीमती : <?php echo htmlentities($value->name); ?></td>
			<td colspan=2>पावती क्रमांक : <?php echo htmlentities($value->receipt_no); ?></td>
		</tr>
		<tr style="font-size:13px;">
			<td colspan=2>पावती दिनांक : <?php echo htmlentities($value->add_date); ?></td>
		</tr>
		<tr>
			<td colspan=5></td>
		</tr>
		<tr>
			<td colspan=5></td>
		</tr>
		<tr>
			<td colspan=5></td>
		</tr>
		<tr>
			<td colspan=5></td>
		</tr>
		<tr class="allborder" style="font-size:13px;">
			<td style="width:1%;" class="allborder">
				<center>क्रं</center>
			</td>
			<td style="width:56%;" colspan=2 class="allborder">
				<center>विषय</center>
			</td>
			<td style="width:20%;" class="allborder">
				<center>प्रति</center>
			</td>
			<td style="width:20%;" class="allborder">
				<center>रक्कम</center>
			</td>
		</tr>
		<tr class="allborder" style="font-size:13px;">
			<td style="width:1%;" class="allborder">
				<center>१</center>
			</td>
			<td style="padding-left:1%;width:56%;" colspan=2 class="allborder"><?php echo htmlentities($value->reason); ?></td>
			<td style="width:20%;" class="allborder">
				<center> <?php echo htmlentities($value->no_of_copy); ?></center>
			</td>
			<td style="width:20%;" class="allborder">
				<center> <?php echo htmlentities($value->payble_amt); ?></center>
			</td>
		</tr>
		<tr style="font-size:13px;">
			<td class="allborder" style="width:1%;"></td>
			<td colspan=2 style="width:56%;" class="allborder"></td>
			<td style="text-align:right;width:20%;" class="allborder">एकुण रुपये</td>
			<td class="allborder" style="width:20%;">
				<center> <?php echo htmlentities($value->payble_amt); ?></center>
			</td>
		</tr>
		<tr style="font-size:13px;">
			<td colspan=5 style="padding-left:1%;" class="allborder">अक्षरी रुपये :- <?php echo $words; ?>रोख मिळाले </td>
		</tr>
		<tr style="font-size:13px;">
			<td colspan=5 class="allborder" style="border-left:1px solid #000;border-right:1px solid #000;padding-left:1%;">शेरा :-</td>
		</tr>
		<tr>
			<td colspan=5 style="border-left:1px solid #000;border-right:1px solid #000;"></td>
		</tr>
		<tr>
			<td colspan=5 style="border-left:1px solid #000;border-right:1px solid #000;"></td>
		</tr>
		<tr>
			<td colspan=5 style="border-left:1px solid #000;border-right:1px solid #000;"></td>
		</tr>
		<tr>
			<td colspan=5 style="border-left:1px solid #000;border-right:1px solid #000;"></td>
		</tr>
		<tr>
			<td colspan=5 style="border-left:1px solid #000;border-right:1px solid #000;"></td>
		</tr>
		<tr>
			<td colspan=5 style="border-left:1px solid #000;border-right:1px solid #000;"></td>
		</tr>
		<tr>
			<td colspan=5 style="border-left:1px solid #000;border-right:1px solid #000;"></td>
		</tr>
		<tr style="font-size:13px;">
			<td style="border-left:1px solid #000;"></td>
			<td>वापरकर्त्याची स्वाक्षरी</td>
			<td></td>
			<td></td>
			<td style="border-right:1px solid #000;"></td>
		</tr>
		<tr style="font-size:13px;">
			<td style="border-left:1px solid #000;"></td>
			<td>नाव :- <?php echo $this->session->username; ?></td>
			<!-- <td>नाव :- Arti Joseph</td> -->
			<td>विभाग</td>
			<td colspan=2 style="border-right:1px solid #000;">प्राधिकृत अधिकाऱ्याची स्वाक्षरी</td>
		</tr>
		<tr>
			<td colspan=5 style="border-left:1px solid #000;border-right:1px solid #000;"></td>
		</tr>
		<tr>
			<td colspan=5 style="border-left:1px solid #000;border-right:1px solid #000;"></td>
		</tr>
		<tr>
			<td colspan=5 style="border-left:1px solid #000;border-right:1px solid #000;"></td>
		</tr>
		<tr>
			<td colspan=5 style="border-left:1px solid #000;border-right:1px solid #000;"></td>
		</tr>
		<tr>
			<td colspan=5 style="border-left:1px solid #000;border-right:1px solid #000;"></td>
		</tr>
		<tr>
			<td colspan=5 style="border-left:1px solid #000;border-right:1px solid #000;"></td>
		</tr>
		<tr>
			<td colspan=5 style="border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;""></td></tr>
	</table>
	<div style="border-bottom:1px solid;width:100%;">
		<br><br><br>	<center><b>Office Copy</b></center>	
</div><br>
<table width=" 100%">
	<tr>
		<td><img src="<?php echo base_url() ?>images/logo.jpg" width="120px" height="120px" /></td>
		<td colspan="3" style="margin-top:-20%;">
			<center>
				<table>
					<tr style="font-size:12px;">
						<td>
							<center>नमुना क्र . २ (Form no. 2)</center>
						</td>
					</tr>
					<tr style="font-size:12px;">
						<td>
							<center>MA Form No 2</center>
						</td>
					</tr>
					<tr style="font-size:20px;">
						<td>
							<center><b>चंद्रपूर शहर महानगरपालिका</b></center>
						</td>
					</tr>
					<tr style="font-size:12px;">
						<td>
							<center>सर्वसाधारण पावती</center>
						</td>
					</tr>
					<tr style="font-size:12px;">
						<td>
							<center>See Rule 12,113.(2) 114,116.2 & 117,(1)(2)&(3)</center>
						</td>
					</tr>
				</table>
			</center>
		</td>
		<td colspan="2">
			<!--<img src="<?php echo base_url() ?>images/logo.jpg" width="120px" height="120px"align="right"/>-->
		</td>
	</tr>
	<tr>
		<td colspan="5"></td>
	</tr>
	<tr>
		<td colspan="5"></td>
	</tr>
	<tr>
		<td colspan="5"></td>
	</tr>
	<tr>
		<td colspan="5"></td>
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
	<tr style="font-size:13px;">
		<td colspan=3 rowspan=2>श्री / श्रीमती : <?php echo htmlentities($value->name); ?></td>
		<td colspan=2>पावती क्रमांक : <?php echo htmlentities($value->receipt_no); ?></td>
	</tr>
	<tr style="font-size:13px;">
		<td colspan=2>पावती दिनांक : <?php echo htmlentities($value->add_date); ?></td>
	</tr>
	<tr>
		<td colspan=5></td>
	</tr>
	<tr>
		<td colspan=5></td>
	</tr>
	<tr>
		<td colspan=5></td>
	</tr>
	<tr>
		<td colspan=5></td>
	</tr>
	<tr class="allborder" style="font-size:13px;">
		<td style="width:1%;" class="allborder">
			<center>क्रं</center>
		</td>
		<td style="width:56%;" colspan=2 class="allborder">
			<center>विषय</center>
		</td>
		<td style="width:20%;" class="allborder">
			<center>प्रति</center>
		</td>
		<td style="width:20%;" class="allborder">
			<center>रक्कम</center>
		</td>
	</tr>
	<tr class="allborder" style="font-size:13px;">
		<td style="width:1%;" class="allborder">
			<center>१</center>
		</td>
		<td style="padding-left:1%;width:56%;" colspan=2 class="allborder"><?php echo htmlentities($value->reason); ?></td>
		<td style="width:20%;" class="allborder">
			<center> <?php echo htmlentities($value->no_of_copy); ?></center>
		</td>
		<td style="width:20%;" class="allborder">
			<center> <?php echo htmlentities($value->payble_amt); ?></center>
		</td>
	</tr>
	<tr style="font-size:13px;">
		<td class="allborder" style="width:1%;"></td>
		<td colspan=2 style="width:56%;" class="allborder"></td>
		<td style="text-align:right;width:20%;" class="allborder">एकुण रुपये</td>
		<td class="allborder" style="width:20%;">
			<center> <?php echo htmlentities($value->payble_amt); ?></center>
		</td>
	</tr>
	<tr style="font-size:13px;">
		<td colspan=5 style="padding-left:1%;" class="allborder">अक्षरी रुपये :- <?php echo $words; ?>रोख मिळाले </td>
	</tr>
	<tr style="font-size:13px;">
		<td colspan=5 class="allborder" style="border-left:1px solid #000;border-right:1px solid #000;padding-left:1%;">शेरा :-</td>
	</tr>
	<tr>
		<td colspan=5 style="border-left:1px solid #000;border-right:1px solid #000;"></td>
	</tr>
	<tr>
		<td colspan=5 style="border-left:1px solid #000;border-right:1px solid #000;"></td>
	</tr>
	<tr>
		<td colspan=5 style="border-left:1px solid #000;border-right:1px solid #000;"></td>
	</tr>
	<tr>
		<td colspan=5 style="border-left:1px solid #000;border-right:1px solid #000;"></td>
	</tr>
	<tr>
		<td colspan=5 style="border-left:1px solid #000;border-right:1px solid #000;"></td>
	</tr>
	<tr>
		<td colspan=5 style="border-left:1px solid #000;border-right:1px solid #000;"></td>
	</tr>
	<tr>
		<td colspan=5 style="border-left:1px solid #000;border-right:1px solid #000;"></td>
	</tr>
	<tr style="font-size:13px;">
		<td style="border-left:1px solid #000;"></td>
		<td>वापरकर्त्याची स्वाक्षरी</td>
		<td></td>
		<td></td>
		<td style="border-right:1px solid #000;"></td>
	</tr>
	<tr style="font-size:13px;">
		<td style="border-left:1px solid #000;"></td>
		<td>नाव :- <?php echo $this->session->username; ?></td>
		<!-- <td>नाव :- Arti Joseph</td> -->
		<td>विभाग</td>
		<td colspan=2 style="border-right:1px solid #000;">प्राधिकृत अधिकाऱ्याची स्वाक्षरी</td>
	</tr>
	<tr>
		<td colspan=5 style="border-left:1px solid #000;border-right:1px solid #000;"></td>
	</tr>
	<tr>
		<td colspan=5 style="border-left:1px solid #000;border-right:1px solid #000;"></td>
	</tr>
	<tr>
		<td colspan=5 style="border-left:1px solid #000;border-right:1px solid #000;"></td>
	</tr>
	<tr>
		<td colspan=5 style="border-left:1px solid #000;border-right:1px solid #000;"></td>
	</tr>
	<tr>
		<td colspan=5 style="border-left:1px solid #000;border-right:1px solid #000;"></td>
	</tr>
	<tr>
		<td colspan=5 style="border-left:1px solid #000;border-right:1px solid #000;"></td>
	</tr>
	<tr>
		<td colspan=5 style="border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;""></td></tr>
</table>
	<?php } ?>
	</div>
	<div style=" text-align: center">
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