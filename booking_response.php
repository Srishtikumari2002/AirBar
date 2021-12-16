<?php
// following files need to be included
require_once("PaytmKit/config_paytm.php");
require_once("PaytmKit/encdec_paytm.php");
include('Background/mysql_details.php');

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	// echo "<pre>";
	// print_r($_POST);

	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		
		if (isset($_POST) && count($_POST)>0 )
		{ 
			foreach($_POST as $paramName => $paramValue) {
					echo "<br/>" . $paramName . " = " . $paramValue;
			}
			// $conn=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);
            // if(!$conn){
            //     exit;
            // }
            // $sql="INSERT INTO Transactions (booking_date,passenger,flight_no,type,charges,discount,total) Values (date('Y-m-d'),'$_SESSION[id]','$_SESSION[fl_id]',1,1,1,'$_POST[TXNAMOUNT]')";
            // $result = mysqli_query($conn,$sql);
            // if(!$result){
			// 	echo "<b>Transaction status is failure</b>" . "<br/>";
            //     exit;
            // }
            echo "<b>Transaction status is success</b>" . "<br/>";
            // mysqli_close($conn);
			header("Refresh:0; url=feedback.php");
		}
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>
