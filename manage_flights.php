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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- favicon -->
    <link rel="icon" href="Images/favicon.png" type="image/png">

    <!-- javascript files -->
    <script defer src=""></script>

</head>

<body>

    <?php include("Includes/header.php"); ?>
	<div style="background:#004aad;height:6.6rem;"></div>
	
    <table class="table table-striped table-hover">
	    <thead>
	        <tr>
	        	<th>#</th>
	            <th>FlightNo</th>
	            <th>From</th>
	            <th>To</th>
	            <th>Departure Date</th>
	            <th>Time</th>
	            <th>Class</th>
	            <th>Capacity</th>
	            <th>Fare</th>
	        </tr>
	    </thead>
	    <tbody>			
        
			<?php

    		    include("Background/mysql_details.php");

    		    $conn=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);
    		    if(!$conn){
    		        exit;
    		    }
			
    		    $sql="select AC.ac_number as Flight_Name,TIME_FORMAT(FS.depart_time, '%h:%m %p') as Departure,
				TIME_FORMAT(FS.arrival_time,'%r') as Arrival, 
				TIMEDIFF(FS.arrival_time,FS.depart_time) as Duration, 
				A1.ap_name as dest,
				A2.ap_name as source,
				AC.first_class_capacity as first_class,
				AC.economy_class_capacity as Eco_class,
				AC.bussiness_class_capacity as Bus_class,
				AF.first_fare as First_fare,
				AF.business_fare as bus_fare,
				AF.economy_fare as Eco_fare,
				DATE_FORMAT(FS.depart, '%d %M, %Y') as Departure_date
				from Flight_schedule as FS JOIN airfare as AF on FS.total_fare = AF.af_id
				 JOIN Route as R on AF.route = R.rt_id 
				 JOIN airports  A1 on R.arrival = A1.id 
				 JOIN cities C1 on A1.ct_id = C1.id 
				 JOIN airports  A2 on R.departure = A2.id 
				 JOIN cities C2 on A2.ct_id = C2.id 
				 JOIN Aircraft as AC on FS.aircraft = AC.ac_id;";
			
    		    $result = mysqli_query($conn,$sql);
			
    		    if(!$result){
    		        echo "Can't Connect to network. Please check your network connection.";
    		        exit;
    		    }
				$id = 0;
    		    if (mysqli_num_rows($result) != 0){
    		        while($row=mysqli_fetch_assoc($result)){
						$id++;
    		            echo "<tr>";
    		            echo "<td>$id</td>";
    		            echo "<td>$row[Flight_Name]</td>";
    		            echo "<td>$row[source]</td>";
    		            echo "<td>$row[dest]</td>";
    		            echo "<td>$row[Departure_date]</td>";
    		            echo "<td>$row[Departure]</td>";
						echo "<td>First<br>Business<br>Economy</td>
						<td>$row[first_class]<br>$row[Bus_class]<br>$row[Eco_class]</td>
						<td>$row[First_fare]<br>$row[bus_fare]<br>$row[Eco_fare]</td>";
						echo "<td><div class='btn-group-vertical'><button class='btn btn-primary'>Modify</button><button style='background: #eb2f06;' class='btn btn-primary'>Reject</button></div></td>";
    		            echo "</tr>";
    		        }
    		    }
    		    else{
    		    ?>
    		    <tr>
    		        <td>No flights are scheduled.</td>
    		    </tr>
    		    <?php
    		    }
    		    mysqli_close($conn);    
    		?>
		</tbody>
    </table>

	<main style="height:60vh;"></main>

    <?php include("Includes/footer.php"); ?>

</body>

</html>