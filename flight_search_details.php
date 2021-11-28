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

        include("Background/mysql_details.php");

        $conn=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);
        if(!$conn){
            exit;
        }


        $sql="select * from users"; //will update

        $result = mysqli_query($conn,$sql);

        if(!$result){
            echo "";
            exit;
        }

        while($row=mysqli_fetch_assoc($result)){}
        mysqli_close($conn);    
    ?>

    <?php include("Includes/footer.php"); ?>

</body>

</html>