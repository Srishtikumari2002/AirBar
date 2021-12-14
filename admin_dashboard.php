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

    <?php 
		include("Includes/header.php"); 
		include("Background/mysql_details.php");
	?>
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

    <div class="profile-container">
        <div class="tabset">
            <input type="radio" name="tabset" id="tab1" aria-controls="manage_flights" checked>
            <label for="tab1">Manage Flights</label>
            <input type="radio" name="tabset" id="tab2" aria-controls="add_flight">
            <label for="tab2">Add Flight</label>
            <input type="radio" name="tabset" id="tab3" aria-controls="view_transactions">
            <label for="tab3">View Transactions</label>
            <input type="radio" name="tabset" id="tab4" aria-controls="view_bookings">
            <label for="tab4">View Bookings</label>

            <div class="tab-panels">
                <section id="manage_flights" class="tab-panel">
                    <h2>Manage Flights</h2>
	
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
                </section>
                <section id="add_flight" class="tab-panel">
                    <h2>Add Flights</h2>
                    <div id="myscroll" class="container">
						<div style="width: 100%">
							<div class="panel-group">
								<div class="panel panel-default">
									<div class="panel-heading">
										<legend style="text-align: center;">Flight Information</legend>
									</div>
									<form class="form-inline">
										<div class="panel-body">
											<div class="input-group">
												<label for="class">Flight No:</label>
												<select id="flight_no class="form-control">
												<?php
													$conn=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);
                    						    	if(!$conn){
                    						    	    exit;
                    						    	}
												
                    						    	$sql="select ac_id,ac_number from Aircraft";
												
                    						    	$result = mysqli_query($conn,$sql);
												
                    						    	if(!$result){
                    						    	    echo "Can't Connect to network. Please check your network connection.";
                    						    	    exit;
                    						    	}
                    						    	if (mysqli_num_rows($result) != 0){
                    						    	    while($row=mysqli_fetch_assoc($result)){
	                										echo "<option value='$row[ac_id]'>$row[ac_number]</option>";
                    						    	    }
                    						    	} 

													mysqli_close($conn);
                    							?>
												</select>
											</div>
											<br><br>
										
											<div>
												<div class="input-group">
													<label for="from">From</label>
													<select class="form-control" placeholder="Origin" name="from"	required>
														<?php

															$conn=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);
															if(!$conn){
																exit;
															}
															$sql="SELECT id,ap_name from airports";

															$result = mysqli_query($conn,$sql);
															if(!$result){
																exit;
															}
															while($row=mysqli_fetch_assoc($result)){
																echo "<option value='$row[id]'>$row[ap_name]</option>";
															}

															mysqli_close($conn);
														?>
													</select>
												</div>
												<div class="input-group">
													<label for="to">To</label>
													<select class="form-control" placeholder="Destination" name="to"	required>
														<?php

															$conn=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);
															if(!$conn){
																exit;
															}
															$sql="SELECT id,ap_name from airports";

															$result = mysqli_query($conn,$sql);
															if(!$result){
																exit;
															}
															while($row=mysqli_fetch_assoc($result)){
																echo "<option value='$row[id]'>$row[ap_name]</option>";
															}

															mysqli_close($conn);
														?>
													</select>
												</div>
											</div>
											<br>
											<div>
												<div class="input-group">
													<label for="Departure">Departure Date</label><br>
													<input type="date" class="form-control" name="depart_date" id="Departure" unselectable="on" onselectstart="return false;" onmousedown="return false;" autocomplete="false" required>
												</div>
												<div class="input-group">
													<label>Departure Time</label>
													<input type="time" class="form-control" name="depart_time" unselectable="on" onselectstart="return false;" onmousedown="return false;" autocomplete="false" id="">
												</div>
											</div>
											<br>
											<div>
												<div class="input-group">
													<label for="duration">Journey Hours</label>
													<input type="number" class="form-control" id="" value="1" name="duration" min="1" required>
												</div>
											</div>
											<br>
											<!--button-->
											<br>
											<div style="text-align: right;">
												<button type="submit" id="add_flight" class="btn btn-primary"><a style="color: white"><i class="fa fa-plus"></i> Add</a></button>
											</div>	
										</div>
									</form>
									<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
									  	<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
									  	  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
									  	</symbol>
										<symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    										<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  										</symbol>
									</svg>
									<div id="flight_added" class="alert alert-success d-flex align-items-center collapse" role="alert">
									  	<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
									  	Flight Added Successfully.
									</div>
									<div id="flight_error" class="alert alert-danger d-flex align-items-center collapse" role="alert">
									  	<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
									  	Oops, some error ocurred while adding the flight.
									</div>
								</div>
							</div>
						</div>
					</div>

                </section>
                <section id="view_transactions" class="tab-panel">
                    <h2>Transactions</h2>
                    <table class="table table-striped table-hover">
	                    <thead>
	                        <tr>
	                        	<th>#</th>
	                            <th>Passenger Id</th>
	                            <th>Passenger Name</th>
	                            <th>Booking Date</th>
	                            <th>Flight Number</th>
	                            <th>Status</th>
	                            <th>Fare</th>
	                        </tr>
	                    </thead>
	                    <tbody>			

	                		<?php

                    		    $conn=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);
                    		    if(!$conn){
                    		        exit;
                    		    }
                            
                    		    $sql="select TR.booking_date as bd,U.name as pname, U.id as id, A.ac_number as Flight_no, TR.total as fare, TR.type as status
								from Transactions as TR 
								JOIN passengers as P on TR.passenger = P.pid
								JOIN users as U on P.user = U.id
								JOIN Aircraft as A on TR.flight_no = A.ac_id;";
                            
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
                    		            echo "<td>$row[id]</td>";
                    		            echo "<td>$row[pname]</td>";
                    		            echo "<td>$row[bd]</td>";
                    		            echo "<td>$row[Flight_no]</td>";
										if ($row['status'] == 0){
                    		            echo "<td style='color:red;font-weight:bold;'>Cancelled</td>";
                    		            echo "<td style='color:red;'>-$row[fare]</td>";
	                					echo "</tr>";}
										else{
                    		            echo "<td style='color:green;font-weight:bold;'>Booked</td>";
                    		            echo "<td style='color:green;'>+$row[fare]</td>";
	                					echo "</tr>";
										}
                    		        }
                    		    }
                    		    else{
                    		    ?>
                    		    <tr>
                    		        <td>No Transactions to Show.</td>
                    		    </tr>
                    		    <?php
                    		    }
                    		    mysqli_close($conn);    
                    		?>
	                	</tbody>
                    </table>
                </section>
                <section id="view_bookings" class="tab-panel">
                    <h2>Bookings</h2>
                    <table class="table table-striped table-hover">
	                    <thead>
	                        <tr>
	                        	<th>#</th>
	                            <th>Passenger Id</th>
	                            <th>Passenger Name</th>
	                            <th>Booking Date</th>
	                            <th>Flight Number</th>
	                            <th>Status</th>
	                            <th>Fare</th>
	                        </tr>
	                    </thead>
	                    <tbody>			

	                		<?php

                    		    $conn=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);
                    		    if(!$conn){
                    		        exit;
                    		    }
                            
                    		    $sql="select TR.booking_date as bd,U.name as pname, U.id as id, A.ac_number as Flight_no, TR.total as fare, TR.type as status
								from Transactions as TR 
								JOIN passengers as P on TR.passenger = P.pid
								JOIN users as U on P.user = U.id
								JOIN Aircraft as A on TR.flight_no = A.ac_id;";
                            
                    		    $result = mysqli_query($conn,$sql);
                            
                    		    if(!$result){
                    		        echo "Can't Connect to network. Please check your network connection.";
                    		        exit;
                    		    }
	                			$id = 0;
                    		    if (mysqli_num_rows($result) != 0){
                    		        while($row=mysqli_fetch_assoc($result)){
										if ($row['status'] == 1){
	                					$id++;
                    		            echo "<tr>";
                    		            echo "<td>$id</td>";
                    		            echo "<td>$row[id]</td>";
                    		            echo "<td>$row[pname]</td>";
                    		            echo "<td>$row[bd]</td>";
                    		            echo "<td>$row[Flight_no]</td>";
                    		            echo "<td>$row[status]</td>";
                    		            echo "<td>$row[fare]</td>";
	                					echo "</tr>";
										}
                    		        }
                    		    }
                    		    else{
                    		    ?>
                    		    <tr>
                    		        <td>No Bookings to Show.</td>
                    		    </tr>
                    		    <?php
                    		    }
                    		    mysqli_close($conn);    
                    		?>
	                	</tbody>
                    </table>
                </section>
            </div>

        </div>        
    </div>

    <?php include("Includes/footer.php"); ?>
	
</body>

</html>