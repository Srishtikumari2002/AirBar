<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Header</title>

    <!-- css stylesheets -->
    <link rel="stylesheet" href="Css/header.css">

    <!-- importing third party javascript -->
    <script src="https://kit.fontawesome.com/47461169aa.js" crossorigin="anonymous"> </script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <!-- custom javascript files -->
    <script defer src="Js/header.js"></script>
    <script defer src="Js/login.js"></script>
    <script defer src="Js/register.js"></script>
    <script defer src="Js/admin_register.js"></script>

</head>

<body>
    
    <div id="loader"></div>

    <?php session_start();?>
    <!-- top navigation bar  -->

    <header>

        <div class="container">

            <nav class="nav">
                <a class="open-nav" id="nav_open">&#9776; </a>
                <a href="index.php" class="logo"> AirBar <img src="Images/logo.png" alt="" width="44" height="40" /></a>
                <ul class="nav-list">
                    <li>
                        <div class="search-box">
                            <button class="btn-search"><i class="fas fa-search"></i></button>
                            <input type="text" class="input-search" placeholder="Search...">
                        </div>
                    </li>
                </ul>

                <?php if (isset($_SESSION['email']) && !empty($_SESSION['email'])){ ?>
                        <a id="logout-btn" href="Background/logout.php" class="nav-link">Logout</a>
                <?php  } else { ?>
                        <a id="log-btn" class="nav-link">Login</a>
                        <a id="reg-btn" class="nav-link">Register</a>
                <?php }?>
                
                <a class="nav-link" <?php echo (isset($_SESSION['email']) && !empty($_SESSION['email'])) ? '':'style="display:none;"'?>>Hi <?php echo $_SESSION['name']?> !&nbsp;</a>
                <a href="book_flight.php" id="nav-cta">Book Now</a>
                <a href="dashboard.php" <?php echo (isset($_SESSION['email']) && !empty($_SESSION['email']) && ($_SESSION['level'] == 0)) ? '':'style="display:none;"'?>>&nbsp;<i class="fas fa-user-tie fa-2x"></i></a>
                <a href="admin_dashboard.php" <?php echo (isset($_SESSION['email']) && !empty($_SESSION['email']) && ($_SESSION['level'] == 1)) ? '':'style="display:none;"'?>>&nbsp;<i class="fas fa-user-tie fa-2x"></i></a>
            </nav>
        </div>
    </header>

    <!-- login pop up -->
    <div id="logreg-popup" class="popup">

        <div class="popup-content">

            <span class="close-popup">&times;</span>

            <div id="login-modal">
                <p>Login</p>

                <div class="logpoptit">
                    <label>New User?<a id="signup" class="popup-link">Sign Up</a></label>
                </div>

                <div id="lprogress" class="progress"></div>

                <div class="center">
                    <div id="login" class="mainform">

                        <i id="lnext" class="fas fa-arrow-circle-right forward"></i>

                        <div id="lic" class="inputContainer">
                            <input id="lif" required autofocus />
                            <label id="lil" class="inputLabel"></label>
                            <div id="lip" class="inputProgress"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="register-modal">
                <!-- Registration Form -->
                <p>Register</p>

                <div class="logpoptit">
                    <label>Existing user?<a id="signin" class="popup-link">Login</a></label>
                </div>

                <div id="rprogress" class="progress"></div>

                <div class="center">
                    <div id="register" class="mainform">

                        <i id="rnext" class="fas fa-arrow-circle-right forward"></i>

                        <div id="ric" class="inputContainer">
                            <input id="rif" required autofocus />
                            <label id="ril" class="inputLabel"></label>
                            <div id="rip" class="inputProgress"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="admin-register-modal">
                <!-- Admin Registration Form -->
                <p style="font-size:3rem;">Admin <br> Registration</p>

                <div class="logpoptit">
                    <label>Existing user?<a id="admin-signin" class="popup-link">Login</a></label>
                </div>

                <div id="arprogress" class="progress"></div>

                <div class="center">
                    <div id="aregister" class="mainform">

                        <i id="arnext" class="fas fa-arrow-circle-right forward"></i>

                        <div id="aric" class="inputContainer">
                            <input id="arif" required autofocus />
                            <label id="aril" class="inputLabel"></label>
                            <div id="arip" class="inputProgress"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- side navigation bar  -->
    <div class="sidebar inactive" id="sidenav">
        <button id="nav_close">x</button>
        <div class="sidenavbar">
            <ul>
                <?php if (isset($_SESSION['email']) && !empty($_SESSION['email'])){ ?>
                    <li>
                        <span>View Profile</span>
                    </li>
                    <li>
                        <a href="Background/logout.php">Logout</a>
                    </li>
                    <li>
                        <span>My Bookings</span>
                    </li>
                    <li>
                        <span>My Account</span>
                    </li>
                <?php  }?>

                <li>
                    <span><a href="index.php">Home</a></span>
                </li>
                <li>
                    <span>Book a Flight</span>
                </li>
                <li>
                    <span>Web Check-in</span>
                </li>
                <li>
                    <span>Flight Status</span>
                </li>
                <li>
                    <span>View/Edit Booking(s)</span>
                </li>
                <li>
                    <span>Update Contact Details</span>
                </li>
                <li>
                    <span>Offers</span>
                </li>
                <li>
                    <span>Manage</span>
                </li>
                <li>
                    <span><a href="faq.php">FAQs</a></span>
                </li>
                <li>
                    <span>Contact Us</span>
                </li>
                <li>
                    <a id="admin-reg-btn">Admin Registration</a>
                </li>
                <li>
                    <a href="index.php" class="logo"> AirBar <img src="Images/logo.png" alt="" width="44" height="40" /></a>
                </li>
            </ul>
        </div> 
    </div>
</body>

</html>