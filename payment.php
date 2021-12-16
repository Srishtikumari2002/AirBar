<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- title of the page  -->
    <title>Confirm Payment</title>

    <!-- css stylesheets -->

    <!-- favicon -->
    <link rel="icon" href="Images/favicon.png" type="image/png">

    <!-- javascript files -->

</head>

<body>

    <?php 
        include("Includes/header.php");
        include("Background/mysql_details.php");
        require_once("PaytmKit/config_paytm.php");
        require_once("PaytmKit/encdec_paytm.php");

        $orderId 	= time();
        $txnAmount 	= "100.50";
        $custId 	= $_SESSION['id'];
        $mobileNo 	= '';
        $email 		= $_SESSION['email'];
    
        $paytmParams = array();
        $paytmParams["ORDER_ID"] 	= $orderId;
        $paytmParams["CUST_ID"] 	= $custId;
        $paytmParams["MOBILE_NO"] 	= $mobileNo;
        $paytmParams["EMAIL"] 		= $email;
        $paytmParams["TXN_AMOUNT"] 	= $txnAmount;
        $paytmParams["MID"] 		= PAYTM_MERCHANT_MID;
        $paytmParams["CHANNEL_ID"] 	= PAYTM_CHANNEL_ID;
        $paytmParams["WEBSITE"] 	= PAYTM_MERCHANT_WEBSITE;
        $paytmParams["INDUSTRY_TYPE_ID"] = PAYTM_INDUSTRY_TYPE_ID;
        $paytmParams["CALLBACK_URL"] = PAYTM_CALLBACK_URL;
        $paytmChecksum = getChecksumFromArray($paytmParams, PAYTM_MERCHANT_KEY);
        $transactionURL = PAYTM_TXN_URL;
    ?>

    <div style="background: #004aad;height: 6.6rem;"></div>

    <form method="POST" action='<?php echo $transactionURL; ?>'>
        <?php
            foreach($paytmParams as $name => $value) {
                echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
            }
        ?>
        <input type="hidden"  name="CHECKSUMHASH" value="<?php echo $paytmChecksum ?>">
        <input type="submit" name="submit" value="Pay Now" />
    </form>

</body>

</html>