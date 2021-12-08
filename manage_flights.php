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
	        <tr>
	        	<td>1</td>
	        	<td>4091</td>
	            <td>Uttar pradesh </td>
	            <td>punjab</td>
	            <td>11/12/2021</td>
	            <td>04:30 pm</td>
	            <td>First<br>Business<br>Economy</td>
	            <td>200<br>200<br>200</td>
	            <td>4000<br>3000<br>2000</td>
    
	            <td>
	    	  	<div class="btn-group-vertical">
	    			<button class="btn btn-primary">Approve</button>
	    			<button class="btn btn-primary">Reject</button>
	    		</div>
	      		</td>
	        </tr>
        </tbody>
    </table>


    <?php include("Includes/footer.php"); ?>

</body>

</html>