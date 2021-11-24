<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- title of the page  -->
    <title>Book Domestic & International Flights</title>

    <!-- css stylesheets -->
    <link rel="stylesheet" href="Css/dashboard.css">

    <!-- favicon -->
    <link rel="icon" href="Images/favicon.png" type="image/png">

    <!-- javascript files -->
    <script defer src="Js/dashboard.js"></script>

</head>

<body>

    <?php session_start(); ?>
    <?php include("Includes/header.php"); ?>
    <div class="header-bg"></div>

    <div class="profile-container">

        <div class="profile-content">

            <div class="profile-left-side">

                <div class="profile-topic-text">My Profile</div><br>
                <div class="profile-topic-text"><i class="fas fa-user-tie fa-7x"></i></div>


                <!-- <div class="phone details">

                    <i class="fas fa-phone-alt"></i>
                    <div class="topic">Phone</div>
                    <a href="tel:+919310519210" class="text-one">+91 9310519210</a><br>
                    <a href="tel:+918076654886" class="text-two">+91 8076654886</a><br>
                    <a href="tel:+918766393891" class="text-one">+91 8766393891</a>

                </div>

                <div class="email details">

                    <i class="fas fa-envelope"></i>
                    <div class="topic">Email</div>
                    <a href="mailto:simran033btcsai20@gmail.com" class="text-one">simran033btcsai20@gmail.com</a>
                    <a href="mailto:simran065btcsai20@igdtuw.ac.in" class="text-two">simran065btcsai20@igdtuw.ac.in</a>
                    <a href="mailto:srishti060btcsai20@igdtuw.ac.in" class="text-two">srishti060btcsai20@igdtuw.ac.in</a>
                </div> -->

            </div>

            <div class="profile-right-side">

                <form action="#" method="POST">

                    <div class="profile-input-box">
                        <input type="text" placeholder="Enter your name" value="<?php echo $_SESSION['name']; ?>">
                    </div>

                    <div class="profile-input-box">
                        <input type="email" placeholder="Enter your email" value="<?php echo $_SESSION['email']; ?>">
                    </div>

                    <div class="profile-button">
                        <input type="button" value="Edit Profile">
                    </div>

                </form>

            </div>

        </div>
    </div>

    <?php include("Includes/footer.php"); ?>

</body>

</html>