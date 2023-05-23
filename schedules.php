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
    <title>Reservation Schedule</title>
    <!------------------------ Bootstrap 5.3.0 ------------------------>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css" />
    <!------------------------ CSS Link ------------------------>
    <link rel="stylesheet" href="assets/css/schedules.css">
    <link rel="stylesheet" type="text/css" href="assets/css/home.css" />
    <!------------------------ SweetAlert ------------------------>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
</head>

<body>
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


    <!------------------------ CURRENT RESERVATION-------------------->
    <h1>Pending Reservation</h1>
    <div class="courses-container">
        <div class="course">
            <div class="course-preview">
                <h6>6th Floor</h6>
                <h2>Seat 1</h2>
                <a href="#">See Datails <i class="fas fa-chevron-right"></i></a>
            </div>
            <div class="course-info">
                <h4><b>Time:</b> 4:00 PM-5:00 PM</h4>
                <h4><b>Date:</b> WEDNESDAY | 04/19/2023</h4>
                <p>
                <div class="container">
                    <div id="countdown">
                        <ul>
                            <li><span id="days"></span>days</li>
                            <li><span id="hours"></span>Hours</li>
                            <li><span id="minutes"></span>Minutes</li>
                            <li><span id="seconds"></span>Seconds</li>
                        </ul>
                    </div>
                    </p>
                    <button class="btn" onclick="showConfirmation()">Cancel</button>
                    <div id="app"></div>
                </div>
            </div>
        </div>

        <!------------------------ END CURRENT RESERVATION-------------------->


        <!------------------------RESERVATION HISTORY-------------------->

        <h1>Reservation History</h1>
        <div class="courses-container">
            <div class="course">
                <div class="course-preview">
                    <h6>6th Floor</h6>
                    <h2>Seat 55</h2>
                </div>
                <div class="course-info">
                    <h5><b>Time: </b> 3:00 PM-4:00 PM</h5>
                    <h5><b>Date: </b> 04/10/2023</h5>

                    <div id="app"></div>
                </div>
            </div>

        </div>
    </div>

    <div class="courses-container">
        <div class="course">
            <div class="course-preview">
                <h6>6th Floor</h6>
                <h2>Seat 30</h2>
            </div>
            <div class="course-info">
                <h5><b>Time: </b> 10:00 PM-11:00 PM</h5>
                <h5><b>Date: </b> 04/05/2023</h5>

                <div id="app"></div>
            </div>
        </div>

    </div>
    </div>

    <div class="courses-container">
        <div class="course">
            <div class="course-preview">
                <h6>6th Floor</h6>
                <h2>Seat 17</h2>
            </div>
            <div class="course-info">
                <h5><b>Time: </b> 12:00 PM-1:00 PM</h5>
                <h5><b>Date: </b> 03/21/2023</h5>

                <div id="app"></div>
            </div>
        </div>

    </div>
    </div>
    <!-- SweetAlert2 confirmation box -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function showConfirmation(reservationId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, cancel it!'
            }).then((result) => {
                if (result.isConfirmed) {
                }
            })
        }
    </script>
    <!------------------------END OF RESERVATION HISTORY-------------------->
    <script src="assets/js/schedules.js"></script>
</body>

</html>