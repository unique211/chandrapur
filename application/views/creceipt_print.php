<style>

  table {

    border-collapse: collapse;

  }

  th, td {

    text-align: left;

  }

  .allborder{

	border: 1px solid #000;

  

    text-align: left;

  }

</style>



<div style="text-align:center" id='receipt'>

<?php

                             

                          foreach ($record as $value) {

                              ?>


<center>Customer Copy</center>
<table width="100%">

	<tr >
		<td rowspan="2" style="border-left: 2px solid rgb(0, 0, 0);border-top: 2px solid rgb(0, 0, 0);"><img src="<?php echo base_url() ?>images/logo.jpg" width="100px" height="100px" style="margin-left:2px"/></td>
		<td colspan="3" style="border-top: 2px solid rgb(0, 0, 0);"><center><h2>Chandrapur City Municipal Corporation</h2></center></td>
		<td rowspan="2"  style="border-right: 2px solid rgb(0, 0, 0);border-top: 2px solid rgb(0, 0, 0);"><img src="<?php echo base_url() ?>images/logo.jpg" width="100px" height="100px"align="right"/></td>
	</tr>

	

	<tr><td colspan="3"><center>Receipt Voucher</center></td></tr>

	<tr >

			<td colspan = 5 style="border-left: 2px solid rgb(0, 0, 0);border-right: 2px solid rgb(0, 0, 0);"> </td></tr>

			<tr style="border-left: 2px solid rgb(0, 0, 0);border-right: 2px solid rgb(0, 0, 0);border-bottom: 2px solid rgb(0, 0, 0);">

					<td colspan = 5> </td></tr><tr>

							<td colspan = 5> </td></tr>

	<tr style="font-weight:bold" >

		<td class="allborder">Receipt.No. : </td>

		<td class="allborder">Date of Receipt :</td>

		<td colspan=2 class="allborder">Document Details. :</td>

		<td class="allborder">Document Quantity: </td>

	</tr>

	<tr>

		<td class="allborder"><b><?php echo htmlentities($value->receipt_no);?></b></td>

		<td class="allborder"><b><?php echo htmlentities($value->n_receipt_date);?></b></td>

		<td colspan=2><b><?php echo htmlentities($value->collection_no);?></b></td>

		<td class="allborder"><b><?php echo htmlentities($value->counter_no );?></b></td>

	</tr>

	<tr><td colspan=5></td></tr>

	<tr class="allborder">

		<td style="font-weight:bold" class="allborder">Received From :</td>

		<td colspan=4 class="allborder"><b><?php echo htmlentities($value->receive_from );?></b></td>

	</tr>

	<tr class="allborder">

		<td style="font-weight:bold" class="allborder">Amount(Rs).</td>

		<td colspan=4 class="allborder"><b><?php echo htmlentities($value->amt );?></b></td>

	</tr>

	<tr class="allborder">

		<td style="font-weight:bold" class="allborder">Amount In Words</td>

		<td colspan=4 class="allborder"><b><?php echo htmlentities($value->amt_words );?></b></td>

	</tr>

	<tr class="allborder">

		<td style="font-weight:bold class="allborder"">Function</td>

		<td colspan=4 class="allborder"><b><?php echo htmlentities($value->function);?></b></td>

	</tr>

	<tr><td colspan=5></td></tr>

	<tr style="font-weight:bold" >

		<td class="allborder">Mode of Receipt</td>

		<td class="allborder">Amount(Rs).</td>

		<td class="allborder">Cheque No.</td>

		<td class="allborder">Cheque Date</td>

		<td class="allborder">Bank Name</td>

	</tr>

	<tr class="allborder">

		<td class="allborder"><b><?php echo htmlentities($value->mode);?></b></td>

		<td class="allborder"><b><?php echo htmlentities($value->amt2);?></b></td>

		<td class="allborder"><b><?php echo htmlentities($value->chq_no);?></b></td>

		<td class="allborder"><b><?php echo htmlentities($value->chq_date);?></b></td>

		<td class="allborder"><b><?php echo htmlentities($value->bank);?></b></td>

	</tr>

	<tr><td colspan=5></td></tr>

	<tr style="font-weight:bold" class="allborder">

		<td class="allborder">Reference No./Bill No.</td>

		<td class="allborder">Date of Bill</td>

		<td class="allborder">Details</td>

		<td class="allborder">Payable Amount(Rs)</td>

		<td class="allborder">Amount Received(Rs)</td>

	</tr>

	<tr class="allborder">

		<td class="allborder"><b><?php echo htmlentities($value->bill_no);?></b></td>

		<td class="allborder"><b><?php echo htmlentities($value->bill_date);?></b></td>

		<td class="allborder"><b><?php echo htmlentities($value->details);?></b></td>

		<td class="allborder"><b><?php echo htmlentities($value->payble);?></b></td>

		<td class="allborder"><b><?php echo htmlentities($value->receive_amt);?></b></td>

	</tr>

	<tr>

		<td colspan = 3></td>

		<td style="font-weight:bold" class="allborder">Total</td>

		<td class="allborder"><b><?php echo htmlentities($value->total);?></b></td>

	</tr>

	<tr>

			<td colspan = 5> </td></tr>

	<tr>

			<td colspan = 5> </td></tr>

	<tr>

			<td colspan = 5></td></tr>

	<tr>

			<td colspan = 5></td></tr>

	<tr>

			<td colspan = 5></td></tr>

	<tr>

			<td colspan = 5></td></tr>

	<tr>

			<td colspan = 5></td></tr>

	<tr>

			<td colspan = 5></td></tr>

	<tr>

			<td colspan = 5></td></tr>

	<tr>

			<td colspan = 5> </td></tr>

	<tr>

			<td colspan = 5> </td></tr>

	<tr>

			<td colspan = 5> </td></tr>

	<tr>

			<td colspan = 5> </td></tr>

	

		<td colspan = 3  ></td>

		<td style="font-weight:bold" colspan = 3><center>Signature of Authorized Officer</center></td>

	</tr>

</table>
<hr/>
<center>Office Copy</center>
<table width="100%">

<tr >
		<td rowspan="2" style="border-left: 2px solid rgb(0, 0, 0);border-top: 2px solid rgb(0, 0, 0);"><img src="<?php echo base_url() ?>images/logo.jpg" width="100px" height="100px" style="margin-left:2px"/></td>
		<td colspan="3" style="border-top: 2px solid rgb(0, 0, 0);"><center><h2>Chandrapur City Municipal Corporation</h2></center></td>
		<td rowspan="2"  style="border-right: 2px solid rgb(0, 0, 0);border-top: 2px solid rgb(0, 0, 0);"><img src="<?php echo base_url() ?>images/logo.jpg" width="100px" height="100px"align="right"/></td>
	</tr>

	

	<tr><td colspan="3"><center>Receipt Voucher</center></td></tr>

	<tr >

			<td colspan = 5 style="border-left: 2px solid rgb(0, 0, 0);border-right: 2px solid rgb(0, 0, 0);"> </td></tr>

			<tr style="border-left: 2px solid rgb(0, 0, 0);border-right: 2px solid rgb(0, 0, 0);border-bottom: 2px solid rgb(0, 0, 0);">

					<td colspan = 5> </td></tr><tr>

							<td colspan = 5> </td></tr>

	<tr style="font-weight:bold" >

		<td class="allborder">Receipt.No. : </td>

		<td class="allborder">Date of Receipt :</td>

		<td colspan=2 class="allborder">Document Details. :</td>

		<td class="allborder">Document Quantity: </td>

	</tr>

	<tr>

		<td class="allborder"><b><?php echo htmlentities($value->receipt_no);?></b></td>

		<td class="allborder"><b><?php echo htmlentities($value->n_receipt_date);?></b></td>

		<td colspan=2><b><?php echo htmlentities($value->collection_no);?></b></td>

		<td class="allborder"><b><?php echo htmlentities($value->counter_no );?></b></td>

	</tr>

	<tr><td colspan=5></td></tr>

	<tr class="allborder">

		<td style="font-weight:bold" class="allborder">Received From :</td>

		<td colspan=4 class="allborder"><b><?php echo htmlentities($value->receive_from );?></b></td>

	</tr>

	<tr class="allborder">

		<td style="font-weight:bold" class="allborder">Amount(Rs).</td>

		<td colspan=4 class="allborder"><b><?php echo htmlentities($value->amt );?></b></td>

	</tr>

	<tr class="allborder">

		<td style="font-weight:bold" class="allborder">Amount In Words</td>

		<td colspan=4 class="allborder"><b><?php echo htmlentities($value->amt_words );?></b></td>

	</tr>

	<tr class="allborder">

		<td style="font-weight:bold class="allborder"">Function</td>

		<td colspan=4 class="allborder"><b><?php echo htmlentities($value->function);?></b></td>

	</tr>

	<tr><td colspan=5></td></tr>

	<tr style="font-weight:bold" >

		<td class="allborder">Mode of Receipt</td>

		<td class="allborder">Amount(Rs).</td>

		<td class="allborder">Cheque No.</td>

		<td class="allborder">Cheque Date</td>

		<td class="allborder">Bank Name</td>

	</tr>

	<tr class="allborder">

		<td class="allborder"><b><?php echo htmlentities($value->mode);?></b></td>

		<td class="allborder"><b><?php echo htmlentities($value->amt2);?></b></td>

		<td class="allborder"><b><?php echo htmlentities($value->chq_no);?></b></td>

		<td class="allborder"><b><?php echo htmlentities($value->chq_date);?></b></td>

		<td class="allborder"><b><?php echo htmlentities($value->bank);?></b></td>

	</tr>

	<tr><td colspan=5></td></tr>

	<tr style="font-weight:bold" class="allborder">

		<td class="allborder">Reference No./Bill No.</td>

		<td class="allborder">Date of Bill</td>

		<td class="allborder">Details</td>

		<td class="allborder">Payable Amount(Rs)</td>

		<td class="allborder">Amount Received(Rs)</td>

	</tr>

	<tr class="allborder">

		<td class="allborder"><b><?php echo htmlentities($value->bill_no);?></b></td>

		<td class="allborder"><b><?php echo htmlentities($value->bill_date);?></b></td>

		<td class="allborder"><b><?php echo htmlentities($value->details);?></b></td>

		<td class="allborder"><b><?php echo htmlentities($value->payble);?></b></td>

		<td class="allborder"><b><?php echo htmlentities($value->receive_amt);?></b></td>

	</tr>

	<tr>

		<td colspan = 3></td>

		<td style="font-weight:bold" class="allborder">Total</td>

		<td class="allborder"><b><?php echo htmlentities($value->total);?></b></td>

	</tr>

	<tr>

			<td colspan = 5> </td></tr>

	<tr>

			<td colspan = 5> </td></tr>

	<tr>

			<td colspan = 5></td></tr>

	<tr>

			<td colspan = 5></td></tr>

	<tr>

			<td colspan = 5></td></tr>

	<tr>

			<td colspan = 5></td></tr>

	<tr>

			<td colspan = 5></td></tr>

	<tr>

			<td colspan = 5></td></tr>

	<tr>

			<td colspan = 5></td></tr>

	<tr>

			<td colspan = 5> </td></tr>

	<tr>

			<td colspan = 5> </td></tr>

	<tr>

			<td colspan = 5> </td></tr>

	<tr>

			<td colspan = 5> </td></tr>



		<td colspan = 3  ></td>

		<td style="font-weight:bold" colspan = 3><center>Signature of Authorized Officer</center></td>

	</tr>

</table>



</div>

<?php

                          }

		

						  ?>

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
        win.document.write('<title>Receipt</title>');   // <title> FOR PDF HEADER.
        win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
        win.document.write('</body></html>');
     
        win.document.close(); 	// CLOSE THE CURRENT WINDOW.
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