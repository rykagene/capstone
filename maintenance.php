<?php
// always start session
session_start();

// if the user was not logged in
if (!isset($_SESSION["student_id"]) && !isset($_SESSION["password"])) {
    echo '<style type="text/css">
        .wrapper .hidden{
            display: none;
        }
        </style>'; // reserve and account button is hidden if the user was not logged in

} else {
    echo '<style type="text/css">
        .wrapper .show{
            display: none;
        }
        </style>'; // login button is hidden if the user was logged in
}



// Check if maintenance mode is enabled
$maintenanceMode = false; // Set this variable based on your toggle status

if ($maintenanceMode) {
  header("Location: maintenance.php"); // Redirect to maintenance.php
  exit(); // Terminate further execution of the script
}


?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>

    <!------------------------ Bootstrap 5 ------------------------>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!------------------------ CSS Link ------------------------>
    <link rel="stylesheet" type="text/css" href="assets/css/maintenance.css" />

    <!------------------------ For NAV-BAR ------------------------>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <!------------------------ Google Fonts Used ------------------------>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Playfair+Display:ital@1&display=swap"
        rel="stylesheet">
</head>

<body>

    <div class="wrapper">


        <!-- Sticky header -->

        <!-- Sticky header -->


        <div class="my-proflie">
            <div class="app-wrapper">
                <img id="fix_icon" src="assets/img/maintenance.png">
                <h1>We'll be right back!</h1>
                <p>Our reservation service is temporarily unavailable. We are working diligently to resolve the issue.</p>
                <h3>Please try again later</h3>
            </div>

        </div>

        <!------------------------ FOOTER ------------------------>
      
        <!------------------------ FOOTER ------------------------>



    </div>


</body>