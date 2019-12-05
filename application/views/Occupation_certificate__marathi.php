<?php include('include/header.php');  ?>

	 
	   
<div id="divToPrint">
<img src="<?php echo base_url() ?>images/logo.jpg" width="120px" height="120px"/>
<div style="text-align: center">
<?php
                             
						  foreach($record as $value)
						  {
		
						  ?>
<h1><u>चंद्रपूर शहर महानगरपालिका,चंद्रपूर</u></h1>
<h3>- :: भोगवटा उतारा :: -</h3>
<p>प्रमाणित करण्यात येते की , श्री / श्रीमती <b><?php echo htmlentities($value->name);?></b>  राहणार वार्ड क्र.<b><?php echo htmlentities($value->ward_no);?></b> चंद्रपूर शहर महानगरपालिका / प्रभाग क्र.<b><?php echo htmlentities($value->municipalty_ward_no);?></b> मागील मध्ये<b><?php echo htmlentities($value->year);?></b>प्रमाणित करण्यात येते की , श्री / श्रीमती राहणार वार्ड क्र.चंद्रपूर शहर महानगरपालिका / प्रभाग क्र. यांना भोगवटा प्रमाणपत्र देण्यात येत आहे.</p>
</div>
<table width="100%">
	<tr>
	<td style="text-align: left">स्थान     :    चंद्रपूर शहर महानगरपालिका</td>
	<td></td>
	</tr>
	<tr>
	<td style="text-align: left">दिनांक    :<b><?php echo htmlentities($value->ndate);?></b></td>
	<td style="text-align: right">आयुक्त &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
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