<?php
// always start session
session_start();

// if the user was not logged in
if (!isset($_SESSION["student_id"]) && !isset($_SESSION["password"])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.0.1/model-viewer.min.js"></script>
    <title>Reserve3D</title>
    <!------------------------ Bootstrap 5.3.0 ------------------------>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css" />
    <!------------------------ CSS Link ------------------------>
    <link rel="stylesheet" type="text/css" href="assets/css/timer.css" />
</head>

<body>

    <div class="wrapper">

        <!-- Sticky header -->
        <header class="header-outer">
            <div class="header-inner responsive-wrapper">
                <div class="header-logo">
                    <img src="assets/img/elib logo.png" class="icon">
                </div>
                <nav class="header-navigation">
                    <a href="home.php">HOME</a>
                    <a href="reserve.php">RESERVE A SEAT</a>
                    <a href="home.php#aboutus">ABOUT US</a>
                    <a class="hidden" href="profile.php">ACCOUNT</a>
                    <a class="hidden" href="toLogout.php">LOGOUT</a>
                </nav>
            </div>
        </header>
        <!-- Sticky header -->


        <!------------------------ TIMER START ------------------------>
        <div class="container" id="container">
            <div class="form-container sign-up-container">
                <form action="#">
                    <h1></h1>
                    <div class="social-container">
                        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <span>or use your email for registration</span>
                    <input type="text" placeholder="Name" />
                    <input type="email" placeholder="Email" />
                    <input type="password" placeholder="Password" />
                    <button>Sign Up</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form action="#">
                    <h1>Seat 1</h1>
                    <span>6th Floor</span>
                    <h7>Occupied by Queen Casaclang</h7>
                    <h7>Time: 4:00 PM - 5:00 PM</h7>
                    <span><i>Please don't forget your ID when done</i></span><br>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Welcome Back!</h1>
                        <p>To keep connected with us please login with your personal info</p>
                        <button class="ghost" id="signIn">Sign In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Time Left:</h1>
                        <div id="app"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-------JAVASCRIPT-------->
    <script src="assets/js/timer.js"></script>
</body>

</html>