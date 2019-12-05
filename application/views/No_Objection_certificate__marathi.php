<?php include('include/header.php');  ?>

	 
	   
<div id="divToPrint">
<img src="<?php echo base_url() ?>images/logo.jpg" width="120px" height="120px"/>
<div style="text-align: center">
<?php
                             
						  foreach($record as $value)
						  {
		
						  ?>
						  <h1><u>चकार्यालय चंद्रपूर शहर महानगरपालिका</u></h1>
<h3>- :: ना - हरकत प्रमाणपत्र:: -</h3>
		<table width="100%">
	<tr>
	<td width="80%"></td>
	<td style="text-align: center">जा . क्र . कर विभाग        /   2019</td>
	</tr>
	<tr>
	<td style="text-align: left"></b></td>
	<td style="text-align: center">कार्यालय चंद्रपूर शहर महानगरपालिका</td>
	</tr>
	<tr>
	<td style="text-align: left"></td>
	<td style="text-align: center"></td>
	</tr>
</table>				  

<p>प्रमाणित करण्यात येते की , श्री / श्रीमती <b><?php echo htmlentities($value->name);?></b>  ह्यांचे घर क्रमांक<b><?php echo htmlentities($value->house_no);?></b> हे स्वतःच्या मालकीचे असुन<b><?php echo htmlentities($value->ward_no);?></b>  वार्डात आहे . त्यांना विद्दुत पुरवठा घेण्या करिता काहीच हरकत नाही .</p>
<p>तथापी विद्दुत कनेक्शन घेतेवेळी विद्दुत वायर दुसऱ्यांच्या प्लॉट / घरावरून जाणार नाही याची दक्षता घ्यावी . तसेच कोणतीही कायदेशीर अडचण / हरकत उपस्थिती झाल्यास हे प्रमाणपत्र निलंबित / रद्द करण्याचे अधिकार मु . अ . ह्यांनी म . न . पा . अधि . १९६५ चे कलम ३३८ ( ३ ) अन्वये राखून ठेवेले आहेत .</p>
</div>
<table width="100%">
	<tr>
	<td style="text-align: left"></td>
	<td></td>
	</tr>
	<tr>
	<td style="text-align: left"></b></td>
	<td style="text-align: right">मुख्याधिकारी &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
	<td style="text-align: left"></td>
	<td style="text-align: right">चंद्रपूर शहर महानगरपालिका</td>
	</tr>
</table>
</div>
<?php  } ?>  


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