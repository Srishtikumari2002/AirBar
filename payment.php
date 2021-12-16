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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="Css/dashboard.css">

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
        $txnAmount 	= $_POST['total_bill1'];
        $custId 	= $_SESSION['id'];
        $mobileNo 	= '7777777777';
        $email 		= $_SESSION['email'];
        $fl_id = $_POST['fl_id'];
    
        $paytmParams = array();
        $paytmParams["ORDER_ID"] 	= $orderId;
        $paytmParams["CUST_ID"] 	= $custId;
        $paytmParams["FL_ID"]   	= $fl_id;
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

    <form method="POST" action='<?php echo $transactionURL; ?>'>
        <div class="profile-container">

            <div class="profile-content">

                <div class="profile-left-side">

                    <div class="profile-topic-text">Payee Details</div><br>
                    <div class="profile-topic-text"><i class="fas fa-user-tie fa-7x"></i></div>

                </div>

                <div class="profile-right-side">

                        <div class="profile-input-box">
                            <input id="profile-name" type="text" disabled  placeholder="Enter your name" value="<?php echo $_SESSION['name']; ?>">
                        </div>

                        <div class="profile-input-box">
                            <input id="profile-email" type="email"  disabled placeholder="Enter your email" value="<?php echo $_SESSION['email']; ?>">
                        </div>

                </div>

            </div>
        </div>

        <div class="profile-container">

            <div class="profile-content">

                <div class="profile-left-side">

                    <div class="profile-topic-text">Payment Summary</div><br>
                    <div class="profile-topic-text"><i class="fas fa-clipboard-check fa-7x"></i></div>

                </div>

                <div class="profile-right-side">

                    <div style="display:flex;justifycontent:space-between;" class="profile-input-box">
                        <label style="width:50%;font-size:2rem;">Airfare Charges</label>
                        <input disabled type="text" value="<?php echo $_POST['airfare1'];?> INR">
                    </div>
                    <div style="display:flex;justifycontent:space-between;" class="profile-input-box">
                        <label style="width:50%;font-size:2rem;">Fees & Taxes</label>
                        <input disabled type="text" value="655.0 INR">
                    </div>
                    <div style="display:flex;justifycontent:space-between;" class="profile-input-box">
                        <label style="width:50%;font-size:2rem;">Convenience Fee</label>
                        <input disabled type="text" value="300.0 INR">
                    </div>
                    <div style="display:flex;justifycontent:space-between;" class="profile-input-box">
                        <label style="width:50%;font-size:2rem;">Discount</label>
                        <input disabled type="text" value="<?php echo $_POST['discount1'];?> INR">
                    </div>
                    <div style="display:flex;justifycontent:space-between;" class="profile-input-box">
                        <label style="width:50%;font-size:3rem;">Total Bill</label>
                        <input disabled type="text" value="<?php echo $_POST['total_bill1'];?> INR">
                    </div>
                    <div class="profile-button">
                        <input type="submit" name="submit" value="Pay Now">
                    </div>

                </div>

            </div>
        </div>
        <?php
            foreach($paytmParams as $name => $value) {
                echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
            }
        ?>
        <input type="hidden"  name="CHECKSUMHASH" value="<?php echo $paytmChecksum ?>">

    </form>

</body>

</html>