<?php include('Crypto.php') ?>
<?php

error_reporting(0);
//-----------------------for (localhost)----------------------------------------------------
//$workingKey = '111314BFB81ED272670FC3F7DE652880';		//Working Key should be provided here.
//------------------------------------------------------------------------------------------

//---------------------for(allysoftsollutions.com)------------------------------------------
$workingKey ='F27FB36A249F97021F1B7BB4E2C20AA8';  	//Working Key should be provided here.
//------------------------------------------------------------------------------------------

$encResponse = $_POST["encResp"];			//This is the response sent by the CCAvenue Server
$rcvdString = decrypt($encResponse, $workingKey);		//Crypto Decryption used as per the specified working key.
$order_status = "";
$decryptValues = explode('&', $rcvdString);
$dataSize = sizeof($decryptValues);
echo "<center>";

for ($i = 0; $i < $dataSize; $i++) {
	$information = explode('=', $decryptValues[$i]);
	if ($i == 3)	$order_status = $information[1];
}

if ($order_status === "Success") {
	echo "<br>Thank you for Transaction with us. Your credit card has been charged and your transaction is successful.";
} else if ($order_status === "Aborted") {
	echo "<br>Thank you for Transaction with us.We will keep you posted regarding the status of your order through e-mail";
} else if ($order_status === "Failure") {
	echo "<br>Thank you for Transaction with us.However,the transaction has been declined.";
} else {
	echo "<br>Security Error. Illegal access detected";
}

echo "<br><br>";

echo "<table cellspacing=4 cellpadding=4>";
for ($i = 0; $i < $dataSize; $i++) {
	$information = explode('=', $decryptValues[$i]);
	echo '<tr><td>' . $information[0] . '</td><td>' . $information[1] . '</td></tr>';
}

$base_url = base_url() . "Payment/tran_data";

echo "</table><br>";
echo "<form id='return_form' name='return_form' method='post' action='$base_url'>";
for ($i = 0; $i < $dataSize; $i++) {
	$information = explode('=', $decryptValues[$i]);
	echo "<input type='hidden' id='$information[0]' name='$information[0]' value='$information[1]'  	>";
}


echo "<input type='submit' value='submit' id='payment' style='display:none'>";
echo "</form>";

echo "</center>";
?>
<script language='javascript'>
	document.return_form.submit();
</script>