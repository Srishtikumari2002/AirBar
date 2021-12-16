<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- title of the page  -->
    <title>Passenger Details</title>

    <!-- css stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="Css/passenger_edit.css" rel="stylesheet">
    <!-- favicon -->
    <link rel="icon" href="Images/favicon.png" type="image/png">

    <!-- javascript files -->
	<script defer src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script defer src="Js/passenger_edit.js"></script>

</head>

<body>

    <?php 
        include("Includes/header.php");
        include("Background/mysql_details.php");
        $flight_id = $_POST['flight_select'];
    ?>

    <div style="background: #004aad;height: 6.6rem;margin-bottom:25px;"></div>

    <div class="booking_form">

        <div style="margin-bottom:50px;" class="accordion" id="flight_details">
            <div class="accordion-item">
                <div class="accordion-body">
                    <div style="display:flex;justify-content:flex-end;" class="row">
                        <button style="width:20%;" id="seat-select-btn" type="submit" class="btn btn-primary"><a style="color: white">Modify</a></button>
                    </div>
                </div>
            </div>
        </div>

        <form method="POST" action="payment.php">
            <div class="accordion" id="booking_details">
                <div class="accordion-item">
                    <h1 class="accordion-header" id="passenger_details">
                        <button style="font-size:2rem;" class="accordion-button" type="button" disabled data-bs-toggle="collapse" data-bs-target="#add_passenger_details" aria-expanded="true" aria-controls="add_passenger_details">
                            ADD PASSENGER DETAILS
                        </button>
                    </h1>
                    <div id="add_passenger_details" class="accordion-collapse show" aria-labelledby="passenger_details" data-bs-parent="#booking_details">
                        <div class="accordion-body">
                            <div id="passenger_detail_area">
                                <div style="display:flex;justify-content: space-between;">
                                    <div style="width:60%;" class="form">
                                        <input type="text" name="passenger1" required autocomplete="off">
                                        <label for="passenger1" class="label-name">
                                            <span class="content-name">Passenger Full Name</span>
                                        </label>
                                    </div>
                                    <div style="width:30%;" style="display: flex; justify-content: flex-end;" class="form">
                                        <input type="number" name="age_passenger1" required autocomplete="off">
                                        <label for="age_passenger1" class="label-name">
                                            <span class="content-name">Passenger Age</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div style="display:flex;justify-content:space-between;" class="row">
                                    <button style="width:25%;" type="button" id="add_passenger_btn" class="btn btn-primary"><a style="color: white"><i class="fa fa-plus"></i> Add Passenger</a></button>
                                    <button style="width:25%;" id="seat-select-btn" type="submit" class="btn btn-primary"><a style="color: white">Continue to Payment</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</body>

</html>