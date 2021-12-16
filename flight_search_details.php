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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- favicon -->
    <link rel="icon" href="Images/favicon.png" type="image/png">

    <!-- javascript files -->
    <script defer src="Js/header.js"></script>

</head>

<body>

    <?php 
        include("Includes/header.php"); 
        include("Background/mysql_details.php"); 
    ?>
    <div style="background: #004aad;height: 6.6rem;"></div>
    <div class="modify-search">

        <div>
            <label for="oneway" class="radio">
                <input type="radio" required name="tripcycle" value="one-way" id="oneway" class="radio__input">
                <div class="radio__radio"></div>
                One Way
            </label>
            <label for="roundtrip" class="radio">
                <input type="radio" required name="tripcycle" value="roundtrip" id="roundtrip" class="radio__input">
                <div class="radio__radio"></div>
                Round Trip
            </label>
        </div>

        <div>
            <label for="to">From</label>
            <select name="from">
            <?php

                $conn=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);
                if(!$conn){
                    exit;
                }
                $sql="SELECT cities.id as ct_id, cities.c_name as cname, CONCAT(cities.c_name, ', ', states.st_name,', ', countries.cn_name)as 'CITIES' FROM cities JOIN states on cities.st_id = states.id  JOIN countries on states.cn_id = countries.id";

                $result = mysqli_query($conn,$sql);
                if(!$result){
                    exit;
                }
                while($row=mysqli_fetch_assoc($result)){
                    echo "<option value='$ro[ct_id]'>$row[cname]</option>";
                }

                mysqli_close($conn);
            ?>
            </select>
            <label for="to">To</label>
            <select name="to">
            <?php

                $conn=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);
                if(!$conn){
                    exit;
                }
                $sql="SELECT cities.id as ct_id, cities.c_name as cname, CONCAT(cities.c_name, ', ', states.st_name,', ', countries.cn_name)as 'CITIES' FROM cities JOIN states on cities.st_id = states.id  JOIN countries on states.cn_id = countries.id";

                $result = mysqli_query($conn,$sql);
                if(!$result){
                    exit;
                }
                while($row=mysqli_fetch_assoc($result)){
                    echo "<option value='$ro[ct_id]'>$row[cname]</option>";
                }

                mysqli_close($conn);
            ?>
            </select>

            <label for="depart">Departure Date</label>
            <input id="depart-date" type="date" unselectable="on" onselectstart="return false;" onmousedown="return false;" name="depart"
                required autocomplete="off" value="">
                
            <label for="arrival">Return Date</label>
            <input id="return-date" type="date" unselectable="on" onselectstart="return false;" onmousedown="return false;" name="arrival" required autocomplete="off">
       
            <label for="travel-class">Class</label>
            <select name="travel-class">
                <option value="Economy">Economy</option>
                <option value="Business">Business</option>
                <option value="First">First</option>
            </select>
            
            <label for="currency">Pay in (currency)</label>
            <select name="currency">
                    <?php

                        $conn=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);
                        if(!$conn){
                            exit;
                        }
                        $sql="SELECT name from currencies";
                    
                        $result = mysqli_query($conn,$sql);
                        if(!$result){
                            exit;
                        }
                        while($row=mysqli_fetch_assoc($result)){
                            echo "<option value='$row[name]'>$row[name]</option>";
                        }
                    
                        mysqli_close($conn);
                    ?>
                    
            </select>
        </div>

        <div>
            <label for="student" class="radio">
                <input type="radio" name="concession" id="student" class="radio__input">
                <div class="radio__radio"></div>
                Students
            </label>
            <label for="forces" class="radio">
                <input type="radio" name="concession" id="forces" class="radio__input">
                <div class="radio__radio"></div>
                Armed Forces
            </label>            
            <label for="docs" class="radio">
                <input type="radio" name="concession" id="docs" class="radio__input">
                <div class="radio__radio"></div>
                Doctors & Nurses
            </label>

            <button type="submit">Modify Search</button>
        </div>

    </div>
    <form action="passenger_edit.php" method="POST">
        <table class="table table-striped table-hover">
	        <thead>
	            <tr>
	            	<th>#</th>
	                <th>FlightNo</th>
	                <th>Departure</th>
	                <th>Arrival</th>
	                <th>Duration</th>
	                <th>Price</th>
	                <th></th>
	            </tr>
	        </thead>
            <tbody>
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
                    $class = $_POST["travel-class"];
                    $currency = $_POST["currency"];
                    // $concession = $_POST['concession'];

                    if($class='First'){$class_fare = 'AF.first_fare';}
                    else if($class='Business'){$class_fare = 'AF.business_fare';}
                    else {$class_fare = 'AF.economy_fare';}
                
                    $sql="select FS.fl_id as fl_id,AC.ac_number as Flight_Name,TIME_FORMAT(FS.depart_time, '%r') as Departure,
                    TIME_FORMAT(FS.arrival_time,'%r') as Arrival, 
                    TIMEDIFF(FS.arrival_time,FS.depart_time) as Duration, 
                    A1.ap_name as dest,
                    A2.ap_name as source,
                    AC.first_class_capacity as first_class,
                    AC.economy_class_capacity as Eco_class,
                    AC.bussiness_class_capacity as Bus_class,
                    $class_fare as Price,
                    DATE_FORMAT(FS.depart, '%d %M, %Y') as Departure_date
                    from Flight_schedule as FS 
                    JOIN airfare as AF on FS.total_fare = AF.af_id
                    JOIN Route as R on AF.route = R.rt_id 
                    JOIN airports  A1 on R.arrival = A1.id 
                    JOIN cities C1 on A1.ct_id = C1.id and C1.c_name = '$to'
                    JOIN airports  A2 on R.departure = A2.id 
                    JOIN cities C2 on A2.ct_id = C2.id and C2.c_name = '$from'
                    JOIN Aircraft as AC on FS.aircraft = AC.ac_id
                    where FS.depart = '$depart_date'";
                
                    $result = mysqli_query($conn,$sql);
                
                    if(!$result){
                        echo "";
                        exit;
                    }
                    $id = 0 ;
                    if (mysqli_num_rows($result) != 0){
                        while($row=mysqli_fetch_assoc($result)){
                            $id++;
                            echo "<tr>";
                            echo "<td>$id</td>";
                            echo "<td>$row[Flight_Name]</td>";
                            echo "<td>$row[Departure]</td>";
                            echo "<td>$row[Arrival]</td>";
                            echo "<td>$row[Duration]</td>";
                            echo "<td>$row[Price]</td>";
                            if ($id==1){
                            echo "<td>
                                    <label for='$row[fl_id]' class='radio'>
                                    <input type='radio' name='flight_select' checked id='$row[fl_id]' value='$row[fl_id]' class='radio__input'><div class='radio__radio'></div></label></td>";
                            }
                            else{echo "<td>
                                        <label for='$row[fl_id]' class='radio'>
                                        <input type='radio' name='flight_select' id='$row[fl_id]' value='$row[fl_id]' class='radio__input'>
                                        <div class='radio__radio'></div>
                                        </label>
                                       </td>";
                            }
                            echo "</tr>";
                        }
                    }
                    else{
                    ?>
                    <tr>
                        <td>No flights are scheduled on this route.</td>
                    </tr>
                    <?php
                    }
                    mysqli_close($conn);  
                    
                    if (!empty($concession)){
                        echo "<input id='concession' type='hidden' value='$concession'>$concession</input>";
                    }
                    echo "<input name='from' type='hidden' value='$from'>$from</input>";
                    echo "<input name='to' type='hidden' value='$to'>$to</input>";
                    echo "<input name='departure_date' type='hidden' value='$depart_date'>$depart_date</input>";
                    echo "<input name='travel_class' type='hidden' value='$class'>$class</input>";
                ?>
            </tbody>
                
        </table>

        <div style="position:fixed;bottom:0;margin: 0 auto;width: 100%;padding: 15px;border-top:3px solid grey;" class="accordion" id="flight_details">
            <div class="accordion-item">
                <div class="accordion-body">
                    <div style="display:flex;justify-content:space-between;">
                        <label>
                            <?php 
                                echo "$from &#8594; $to";
                            ?>
                        </label>
                        <label>
                            <?php
                                echo "$depart_date";
                            ?>
                        </label>
                        <?php 
                            if (isset($_SESSION['email']) && !empty($_SESSION['email'])){

                                echo '<input id="book-flight" class="btn btn-primary" type="submit" value="Continue"></input>';
                            }
                            else {
                            
                                echo '<a id="log_warn_btn" onclick="show_log_warn()" class="btn btn-primary">Login</a>';
                            } 
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </form>
<script>
    function show_log_warn(){
    modal.style.display = "block";
    show_login();}
</script>
</body>

</html>