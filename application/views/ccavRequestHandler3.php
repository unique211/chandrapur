<html>
<head>
<title> Iframe</title>
</head>
<body>
<center>
<?php include('Crypto.php')?>
<?php 

	error_reporting(0);

	$working_key = '111314BFB81ED272670FC3F7DE652880'; //Shared by CCAVENUES
		$access_code = 'AVRN02GG81BL72NRLB'; //Shared by CCAVENUES

//	$working_key='';//Shared by CCAVENUES
//	$access_code='';//Shared by CCAVENUES
	$merchant_data='';
	
	foreach ($_POST as $key => $value){
		$merchant_data.=$key.'='.$value.'&';
	}
	
	$encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.

	$production_url='https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction&encRequest='.$encrypted_data.'&access_code='.$access_code;
?>
<iframe src="<?php echo $production_url?>" id="paymentFrame" width="482" height="450" frameborder="0" scrolling="No" ></iframe>
<form method="post" name="redirect" action="https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction">
			<?php
			echo "<input type=hidden name=encRequest value=$encrypted_data>";
			echo "<input type=hidden name=access_code value=$access_code>";
			?>
		</form>
		<script language='javascript'>
		document.redirect.submit();
	</script>

<!-- <script type="text/javascript">
    	// $(document).ready(function(){
    	// 	 window.addEventListener('message', function(e) {
		//     	 $("#paymentFrame").css("height",e.data['newHeight']+'px'); 	 
		//  	 }, false);
	 	 	
		// });
</script> -->
</center>
</body>
</html>

