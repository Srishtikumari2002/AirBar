<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- title of the page  -->
    <title>Search Results</title>

    <!-- css stylesheets -->

    <!-- favicon -->
    <link rel="icon" href="Images/favicon.png" type="image/png">

    <!-- javascript files -->

</head>

<body>

    <?php include("Includes/header.php"); ?>
    <div style="background: #004aad;height: 6.6rem;"></div>

    <?php

        include("mysql_details.php");

        $conn=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);
        if(!$conn){
            echo 0;
            exit;
        }


$email = $_POST['email'];
$psd = $_POST['psd'];

$sql="select * from users";

$result = mysqli_query($conn,$sql);
if(!$result){
    echo 0;
    exit;
}

    
    ?>

    <?php include("Includes/footer.php"); ?>

</body>

</html>