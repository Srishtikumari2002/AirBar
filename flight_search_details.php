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
    <link rel="stylesheet" href="Css/flight_search_details.css">

    <!-- favicon -->
    <link rel="icon" href="Images/favicon.png" type="image/png">

    <!-- javascript files -->

</head>

<body>

    <?php include("Includes/header.php"); ?>
    <div style="background: #004aad;height: 6.6rem;"></div>
    <div class="search-result-box">
        <table>
            <tr>
                <th>Flight Details</th>
                <th>Flight Name</th>
                <th>Departure</th>
                <th>Arrival</th>
                <th>Duration</th>
                <th>Price</th>
                <th></th>
            </tr>
    <?php

        include("Background/mysql_details.php");

        $conn=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);
        if(!$conn){
            exit;
        }

        $tripcycle = $_POST["tripcycle"];
        $from = $_POST["from"];
        $to = $_POST["to"];
        $depart_date = $_POST["depart"];
        $return_date = $_POST["arrival"];
        $passenger = $_POST["passenger"];
        $currency = $_POST["currency"];
        $concession = $_POST['concession'];

        $sql="select AC.ac_number as Flight_Name,TIME_FORMAT(FS.depart_time, '%r') as Departure, TIME_FORMAT(FS.arrival_time,'%r') as Arrival, TIMEDIFF(FS.arrival_time,FS.depart_time) as Duration, AF.fare as Price from Flight_schedule as FS JOIN airfare as AF on FS.total_fare = AF.af_id JOIN Route as R on AF.route = R.rt_id JOIN airports  A1 on R.arrival = A1.id JOIN cities C1 on A1.ct_id = C1.id and C1.c_name = '$to' JOIN airports  A2 on R.departure = A2.id JOIN cities C2 on A2.ct_id = C2.id and C2.c_name = '$from' JOIN Aircraft as AC on FS.aircraft = AC.ac_id where FS.depart = '$depart_date'";

        $result = mysqli_query($conn,$sql);

        if(!$result){
            echo "";
            exit;
        }
        
        if (mysqli_num_rows($result) != 0){
            while($row=mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td><a href='#'>Flight Details</a></td>";
                echo "<td>$row[Flight_Name]</td>";
                echo "<td>$row[Departure]</td>";
                echo "<td>$row[Arrival]</td>";
                echo "<td>$row[Duration]</td>";
                echo "<td>$row[Price]</td>";
                echo "<td><label for='flight_select' class='radio'><input type='radio' name='flight-select' id='$row[Flight_Name]' class='radio__input'><div class='radio__radio'></div></label></td>";
                echo "</tr>";
            }
        }
        else{
        ?>
        <tr>
            <td>No flights are scheduled on this route</td>
        </tr>
        <?php
        }
        mysqli_close($conn);    
    ?>

        </table>
    </div>

    <?php include("Includes/footer.php"); ?>

</body>

</html>