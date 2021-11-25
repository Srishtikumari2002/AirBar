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
    <link rel="stylesheet" href="Css/index.css">

    <!-- favicon -->
    <link rel="icon" href="Images/favicon.png" type="image/png">

    <!-- javascript files -->
    <script defer src="Js/index.js"></script>

</head>

<body>

    <?php 

        include("Includes/header.php");
        include("Background/mysql_details.php");
    ?>
    

    <!-- image carousel -->
    <div class="carousel-container">

        <div class="mySlides fade">
            <a href="#"><img src="Images/Vaxi_Fare.png" style="width:100%"></a>
            <a href="index.php" class="know-more">Know More</a>
        </div>
        <div class="mySlides fade">
            <a href="#"><img src="Images/fast_booking.png" style="width:100%"></a>
            <a href="index.php" class="know-more">Know More</a>
        </div>
        <div class="mySlides fade">
            <a href="#"><img src="Images/home_delivery.png" style="width:100%"></a>
        </div>
        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
        <!-- The dots/circles -->
        <a id="dot1" class="dot" onclick="currentSlide(1)"></a>
        <a id="dot2" class="dot" onclick="currentSlide(2)"></a>
        <a id="dot3" class="dot" onclick="currentSlide(3)"></a>
    </div>

    <!-- flight search form  -->
    <form action="flight_search_details.php" method="POST">
    <div class="flight-find">
        <h1>Book a Flight</h1>

        <div class="radios">
            <label for="oneway" class="radio">
                <input type="radio" name="tripcycle" id="oneway" class="radio__input">
                <div class="radio__radio"></div>
                One Way
            </label>
            <label for="roundtrip" class="radio">
                <input type="radio" name="tripcycle" id="roundtrip" class="radio__input">
                <div class="radio__radio"></div>
                Round Trip
            </label>
        </div>

        <div class="row">
            <div class="form left">
                <input id="from" list="departure" type="text" name="from" required autocomplete="off">
                <label for="from" class="label-name">
                    <span class="content-name">From</span>
                </label>
                <datalist id="departure">
                    <?php

                        $conn=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);
                        if(!$conn){
                            exit;
                        }
                        $sql="SELECT cities.c_name as cname, CONCAT(cities.c_name, ', ', states.st_name,', ', countries.cn_name)as 'CITIES' FROM cities JOIN states on cities.st_id = states.id  JOIN countries on states.cn_id = countries.id";

                        $result = mysqli_query($conn,$sql);
                        if(!$result){
                            echo 0;
                            exit;
                        }
                        while($row=mysqli_fetch_assoc($result)){
                            echo "<option value='$row[cname]'>$row[CITIES]</option>";
                        }

                        mysqli_close($conn);
                    ?>
                    
                </datalist>
            </div>
            <i id="exchange" class="fas fa-exchange-alt"></i>
            <div class="form right">
                <input id="to" list="arrival" type="text" name="to" required autocomplete="off">
                <label for="to" class="label-name">
                    <span class="content-name">To</span>
                </label>
                <datalist id="arrival">
                    <?php

                        $conn=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);
                        if(!$conn){
                            exit;
                        }
                        $sql="SELECT cities.c_name as cname, CONCAT(cities.c_name, ', ', states.st_name,', ', countries.cn_name)as 'CITIES' FROM cities JOIN states on cities.st_id = states.id  JOIN countries on states.cn_id = countries.id";

                        $result = mysqli_query($conn,$sql);
                        if(!$result){
                            echo 0;
                            exit;
                        }
                        while($row=mysqli_fetch_assoc($result)){
                            echo "<option value='$row[cname]'>$row[CITIES]</option>";
                        }

                        mysqli_close($conn);
                    ?>
                    
                </datalist>
            </div>
        </div>

        <div class="form left">
            <input type="date" unselectable="on" onselectstart="return false;" onmousedown="return false;" name="depart"
                required autocomplete="off" value="">
            <label for="depart" class="label-name">
                <span class="content-name">Departure Date</span>
            </label>
        </div>

        <div class="form right">
            <input type="date" unselectable="on" onselectstart="return false;" onmousedown="return false;"
                name="arrival" required autocomplete="off" value="">
            <label for="arrival" class="label-name">
                <span class="content-name">Return Date</span>
            </label>
        </div>

        <div class="form left">
            <input type="text" name="passenger" required autocomplete="off">
            <label for="passenger" class="label-name">
                <span class="content-name">Passenger(s)</span>
            </label>
        </div>

        <div class="form right">
            <input type="text" name="currency" required autocomplete="off">
            <label for="currency" class="label-name">
                <span class="content-name">Pay in (currency)</span>
            </label>
        </div>

        <div class="radios">
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
        </div>

        <div class="left">
            <label for="docs" class="radio">
                <input type="radio" name="concession" id="docs" class="radio__input">
                <div class="radio__radio"></div>
                Doctors & Nurses
            </label>
        </div>

        <div class="right">
            <button type="submit">Search Flight→</button>
        </div>
    </div>
    </form>
    
    <main style="height: 100vh;background:#004bade1;"></main>

    <?php include("Includes/footer.php"); ?>

</body>

</html>