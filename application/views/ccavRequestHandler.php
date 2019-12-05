<html>

<head>
	<title> Non-Seamless-kit</title>
</head>

<body>
	<center>
		<?php include('Crypto.php') ?>
		<?php

		error_reporting(0);

		$merchant_data = '';

		//-----------------------for (localhost)----------------------------------------------------
		
	//	$working_key = '111314BFB81ED272670FC3F7DE652880'; //Shared by CCAVENUES
	//	$access_code = 'AVRN02GG81BL72NRLB'; //Shared by CCAVENUES

		//------------------------------------------------------------------------------------------
		//---------------------for(allysoftsollutions.com)------------------------------------------

		 $working_key ='F27FB36A249F97021F1B7BB4E2C20AA8';// 'D237A602DEC2044AC74150914F58EAA0'; //Shared by CCAVENUES
		 $access_code = 'AVNB86GG56BH29BNHB'; //Shared by CCAVENUES

		//------------------------------------------------------------------------------------------


		foreach ($val as $key => $value) {
			$merchant_data .= $key . '=' . $value . '&';
		}
		$merchant_data2 = '';
		//$merchant_data2 .=str_replace("&&", "&", $merchant_data);
		$encrypted_data = encrypt($merchant_data, $working_key); // Method for encrypting the data.
		//print_r($merchant_data2);
		?>

		<form method="post" name="redirect" action="https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction">
			<?php
			echo "<input type=hidden name=encRequest value=$encrypted_data>";
			echo "<input type=hidden name=access_code value=$access_code>";
			?>
		</form>
	</center>

	<script language='javascript'>
		document.redirect.submit();
	</script>
</body>

</html>