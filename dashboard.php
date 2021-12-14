<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- title of the page  -->
    <title>Dashboard</title>

    <!-- css stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="Css/dashboard.css">

    <!-- favicon -->
    <link rel="icon" href="Images/favicon.png" type="image/png">

    <!-- javascript files -->
    <script defer src="Js/dashboard.js"></script>
    <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script defer src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>

    <?php include("Includes/header.php"); ?>
    <div class="header-bg"></div>

    <div class="profile-container">

        <div class="profile-content">

            <div class="profile-left-side">

                <div class="profile-topic-text">My Profile</div><br>
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

    <div class="profile-container">

        <div class="profile-content">

            <div class="profile-left-side">

                <div class="profile-topic-text">Contact Details</div><br>
                <div class="profile-topic-text"><i class="fas fa-id-card fa-7x"></i></div>

            </div>

            <div class="profile-right-side">

                <form action="#" method="POST">

                    <div class="profile-input-box">
                        <input id="profile-phone" type="number" placeholder="Mobile Number" value="<?php if(isset($_SESSION['phone'])){echo $_SESSION['phone'];}; ?>">
                    </div>
                    <div class="profile-input-box">
                        <input id="profile-address" type="text" placeholder="Address" value="<?php if(isset($_SESSION['address'])){echo $_SESSION['address'];}; ?>">
                    </div>
                    <div class="profile-input-box">
                        <select id="profile-state" class="form-control" value="<?php if(isset($_SESSION['state'])){echo $_SESSION['state'];}; ?>">
                        <?php
                            include("Background/mysql_details.php");
                            $conn=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);
                            if(!$conn){
                                exit;
                            }
                            $sql="SELECT id,st_name from states";
                        
                            $result = mysqli_query($conn,$sql);
                            if(!$result){
                                exit;
                            }
                            while($row=mysqli_fetch_assoc($result)){
                                echo "<option value='$row[id]'>$row[st_name]</option>";
                            }
                        
                            mysqli_close($conn);
                        ?>
                        </select>
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