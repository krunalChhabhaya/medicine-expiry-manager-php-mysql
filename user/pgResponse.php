<?php
include('../database/conn.php');


header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

include('../database/conn.php');

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.

// print_r($odid);
// exit();

if ($isValidChecksum == "TRUE") {
	//echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		$oid = $_POST['ORDERID'];
		$odid = $_GET['odid'];
		$txnid = $_POST['TXNID'];

		mysqli_query($conn, "UPDATE `orders` SET `status`='Paid', `payment_id`='$txnid' WHERE `order_id` = '$odid'");


		//echo "<b>Transaction status is success</b>" . "<br/>";

		$kc = "SELECT `stock_id` FROM `orders` WHERE `order_id`=$odid";

		//$kc = "SELECT * FROM `orders` ORDER BY `orders`.`stock_id` DESC ";

		$result = $conn->query($kc);

		($row = $result->fetch_assoc());

		$stock_id =  $row['stock_id'];
	
		mysqli_query($conn, "UPDATE `stock` SET `status`='Paid' WHERE `stock_id` = '$stock_id'");
		echo "<script> window.location.href='../user/index.php?page=show_medical.php&odid=$odid';</script>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	} else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}

	if (isset($_POST) && count($_POST) > 0) {

		foreach ($_POST as $paramName => $paramValue) {
			echo "<br/>" . $paramName . " = " . $paramValue;
		}
	}
} else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}
