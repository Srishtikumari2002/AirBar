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
												<select class="form-control">
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
												<!-- <a href="#"></a> -->
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
													<label for="Adults">Journey Hours</label>
													<input type="number" class="form-control" id="" value="1" name="" min="1" required>
												</div>
											</div>
											<!--class tabs-->
											<br>
											<div class="container" style="margin: 0 0 0 0;padding: 0 0 0 0;float: center;width: 100%">
												<div class="row">
													<div class="col-sm-4">
														<div class="panel-group">
															<div class="panel panel-default">
																<div class="panel-heading" data-toggle="collapse" href="#collapse1">
																	<h4 class="panel-title">First</h4>
																</div>

																<div id="collapse1" class="panel-collapse collapse">
																	<div class="panel-body">
																		<div>
																			<div class="input-group">
																				<label>Seats</label>
																				<input type="number" class="form-control" id=""
																					value="0" min="0" required>
																			</div>
																			<div class="input-group">
																				<label>Price <small>(for each seat)</small></label>
																				<input type="number" class="form-control" value="0"
																					min="0" required>
																			</div>
																			<div class="input-group">
																				<label>Features</label>
																				<input type="text" class="form-control"
																					placeholder="add new features">
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-sm-4">
														<div class="panel-group">
															<div class="panel panel-default">
																<div class="panel-heading" data-toggle="collapse" href="#collapse2">
																	<h4 class="panel-title">Business</h4>
																</div>
																<div id="collapse2" class="panel-collapse collapse">
																	<div class="panel-body">
																		<div>
																			<div class="input-group">
																				<label>Seats</label>
																				<input type="number" class="form-control" id=""
																					value="0" min="0" required>
																			</div>
																			<div class="input-group">
																				<label>Price <small>(for each seat)</small></label>
																				<input type="number" class="form-control" value="0"
																					min="0" required>
																			</div>
																			<div class="input-group">
																				<label>Features</label>
																				<input type="text" class="form-control"
																					placeholder="add new features">
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-sm-4">
														<div class="panel-group">
															<div class="panel panel-default">
																<div class="panel-heading" data-toggle="collapse" href="#collapse3">
																	<h4 class="panel-title">Economy</h4>
																</div>
																<div id="collapse3" class="panel-collapse collapse">
																	<div class="panel-body">
																		<div>
																			<div class="input-group">
																				<label>Seats</label>
																				<input type="number" class="form-control" id=""
																					value="0" min="0" required>
																			</div>
																			<div class="input-group">
																				<label>Price <small>(for each seat)</small></label>
																				<input type="number" class="form-control" value="0"
																					min="0" required>
																			</div>
																			<div class="input-group">
																				<label>Features</label>
																				<input type="text" class="form-control"
																					placeholder="add new features">
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!--button-->
											<br>
											<div style="text-align: right;">
												<button type="submit" class="btn btn-primary"><a style="color: white"><i class="fa fa-plus"></i> Add</a></button>
											</div>	
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>

                </section>
                <section id="view_transactions" class="tab-panel">
                    <h2>Transactions</h2>
                    
                </section>
                <section id="view_bookings" class="tab-panel">
                    <h2>Bookings</h2>
                    
                </section>
            </div>

        </div>        
    </div>

    <?php include("Includes/footer.php"); ?>
	
</body>

</html>