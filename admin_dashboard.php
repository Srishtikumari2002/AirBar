<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- title of the page  -->
    <title>Admin Dashboard</title>

    <!-- css stylesheets -->
    <link rel="stylesheet" href="Css/dashboard.css">

    <!-- favicon -->
    <link rel="icon" href="Images/favicon.png" type="image/png">

    <!-- javascript files -->
    <script defer src=""></script>

</head>

<body>

    <?php include("Includes/header.php"); ?>
    <div class="header-bg"></div>

    <div class="profile-container">

        <div class="profile-content">

            <div class="profile-left-side">

                <div class="profile-topic-text">Admin Profile</div><br>
                <div class="profile-topic-text"><i class="fas fa-user-tie fa-7x"></i></div>

            </div>

            <div class="profile-right-side">

                <form action="#" method="POST">

                    <div class="profile-input-box">
                        <input id="profile-name" type="text" placeholder="Enter your name" value="<?php echo $_SESSION['name']; ?>">
                    </div>

                    <div class="profile-input-box">
                        <input id="profile-email" type="email" placeholder="Enter your email" value="<?php echo $_SESSION['email']; ?>">
                    </div>

                    <div class="profile-button">
                        <input type="button" value="Edit Profile">
                    </div>

                    <div class="profile-button" style="display:none;">
                        <input type="button" value="Save">
                    </div>

                </form>

            </div>

        </div>
    </div>

    <?php include("Includes/footer.php"); ?>

</body>

</html>