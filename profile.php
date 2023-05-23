<?php
// always start session
session_start();

// if the user was not logged in
if (!isset($_SESSION["student_id"]) && !isset($_SESSION["password"])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>My Profile</title>

    <!------------------------ Bootstrap 5.3.0 ------------------------>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css" />
    <!------------------------ CSS Link ------------------------>
    <link rel="stylesheet" type="text/css" href="assets/css/profile.css" />
    <!------------------------ ICONS ------------------------>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
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
                    <a href="profile.php" class="active">ACCOUNT</a>
                    <a href="toLogout.php">LOGOUT</a>
                </nav>
            </div>
        </header>
        <!-- Sticky header -->

        <div class="my-proflie">
            <div class="app-wrapper">

                <aside class="profile">

                    <h2>My Profile</h2>

                    <div class="details">

                        <div class="profile-pic">
                            <label class="-label" for="file">
                                <span>Change Image</span>
                            </label>
                            <input id="file" type="file" onchange="loadFile(event)" />
                            <img src="https://i.pinimg.com/564x/e4/a4/7d/e4a47dc1f909bb9c88bb1a3c7a95fe1e.jpg"
                                id="output" width="200" />
                        </div>
                        <h4>Ryka Gene Austria</h4>
                        <p>2020104776</p>


                        <div class="profile-info">
                            <h5><span>Email:</span> rykagene.austria@bulsum.edu.ph</h5>
                            <h5><span>Age:</span> 20</h5>
                            <h5><span>Gender:</span> Female</h5>
                            <h5><span>College:</span> CICT</h5>
                            <h5><span>Course/Section:</span> BSIT 3E</h5>
                        </div>

                        <div class="edit-info">
                            <button type="submit" class="buttons"><span class="las la-user-edit"></span>Edit</button>
                        </div>
                </aside>

                <!--
                <content class="reservations-wrapper">

                    <h2>
                        Reservation History &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                        <span class="total-reservation">6</span>

                    </h2>
                    <div class="reservations">
                        <h3>PC12 6th floor</h3>
                        <p>
                            <ion-icon name="time-outline"></ion-icon>
                            10:30 am - 11:30 am <br>
                            <ion-icon name="calendar-outline"></ion-icon> June 24, 2022
                        </p><br><br>
                        <h3>PC12 6th floor</h3>
                        <p>
                            <ion-icon name="time-outline"></ion-icon>
                            10:30 am - 11:30 am <br>
                            <ion-icon name="calendar-outline"></ion-icon> June 24, 2022
                        </p><br><br>
                        <h3>PC12 6th floor</h3>
                        <p>
                            <ion-icon name="time-outline"></ion-icon>
                            10:30 am - 11:30 am <br>
                            <ion-icon name="calendar-outline"></ion-icon> June 24, 2022
                        </p><br><br>
                        <h3>PC12 6th floor</h3>
                        <p>
                            <ion-icon name="time-outline"></ion-icon>
                            10:30 am - 11:30 am <br>
                            <ion-icon name="calendar-outline"></ion-icon> June 24, 2022
                        </p><br><br>
                        <h3>PC12 6th floor</h3>
                        <p>
                            <ion-icon name="time-outline"></ion-icon>
                            10:30 am - 11:30 am <br>
                            <ion-icon name="calendar-outline"></ion-icon> June 24, 2022
                        </p><br><br>
                        <h3>PC12 6th floor</h3>
                        <p>
                            <ion-icon name="time-outline"></ion-icon>
                            10:30 am - 11:30 am <br>
                            <ion-icon name="calendar-outline"></ion-icon> June 24, 2022
                        </p><br><br>
                    </div>

                </content>
-->

                <content class="reservations-wrapper">

                    <h2>
                        Pending Reservation &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                        <span class="total-reservation"> 2/3</span>
                    </h2>
                    <div class="reservations">
                        <h3>PC12 6th floor</h3>
                        <p>
                            <ion-icon name="time-outline"></ion-icon>
                            10:30 am - 11:30 am <br>
                            <ion-icon name="calendar-outline"></ion-icon> June 24, 2022
                        </p><br><br>
                        <h3>PC12 6th floor</h3>
                        <p>
                            <ion-icon name="time-outline"></ion-icon>
                            10:30 am - 11:30 am <br>
                            <ion-icon name="calendar-outline"></ion-icon> June 24, 2022
                        </p><br><br>



                        <h2>
                            Reservation History &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                            <span class="total-reservation">6</span>

                        </h2>
                        <div class="reservations">
                            <h3>PC12 6th floor</h3>
                            <p>
                                <ion-icon name="time-outline"></ion-icon>
                                10:30 am - 11:30 am <br>
                                <ion-icon name="calendar-outline"></ion-icon> June 24, 2022
                            </p><br><br>
                            <h3>PC12 6th floor</h3>
                            <p>
                                <ion-icon name="time-outline"></ion-icon>
                                10:30 am - 11:30 am <br>
                                <ion-icon name="calendar-outline"></ion-icon> June 24, 2022
                            </p><br><br>
                            <h3>PC12 6th floor</h3>
                            <p>
                                <ion-icon name="time-outline"></ion-icon>
                                10:30 am - 11:30 am <br>
                                <ion-icon name="calendar-outline"></ion-icon> June 24, 2022
                            </p><br><br>
                            <h3>PC12 6th floor</h3>
                            <p>
                                <ion-icon name="time-outline"></ion-icon>
                                10:30 am - 11:30 am <br>
                                <ion-icon name="calendar-outline"></ion-icon> June 24, 2022
                            </p><br><br>
                            <h3>PC12 6th floor</h3>
                            <p>
                                <ion-icon name="time-outline"></ion-icon>
                                10:30 am - 11:30 am <br>
                                <ion-icon name="calendar-outline"></ion-icon> June 24, 2022
                            </p><br><br>
                            <h3>PC12 6th floor</h3>
                            <p>
                                <ion-icon name="time-outline"></ion-icon>
                                10:30 am - 11:30 am <br>
                                <ion-icon name="calendar-outline"></ion-icon> June 24, 2022
                            </p><br><br>

                        </div>
                    </div>


                </content>



            </div>

        </div>

        <!------------------------ FOOTER ------------------------>
        <footer>
            <div class="container">
                <div class="footer-top">
                    <div class="row">
                        <div class="col-md-6 col-lg-3 about-footer">
                            <h3>Bulacan State University
                                E-Library </h3>
                            <ul>
                                <li><a href="tel:(010) 919 7800"><i class="fas fa-phone fa-flip-horizontal"></i>
                                        919 7800</a></li>
                                <li><i class="fas fa-map-marker-alt"></i>
                                    Guinhawa,
                                    <br />City of Malolos,
                                    <br />Bulacan
                                </li>
                                <li><i class="fas fa-at"></i>
                                    officeofthepresident@bulsu.edu.ph
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-lg-2 page-more-info">
                            <div class="footer-title">
                                <h4>Page links</h4>
                            </div>
                            <ul>
                                <li><a href="home.php">Home</a></li>
                                <li><a href="home.php#aboutus">About Us</a></li>
                                <li><a href="reserve.php">Reserve seat</a></li>
                                <li><a href="profile.php">Your Account</a></li>
                            </ul>
                        </div>

                        <div class="col-md-6 col-lg-3 page-more-info">
                            <div class="footer-title">
                                <h4>More Info</h4>
                            </div>
                            <ul>
                                <li><a href="survey.php">Rate our service</a></li>
                                <li><a href="https://www.bulsu.edu.ph/">Official Website</a></li>
                                <li><a href="https://myportal.bulsu.edu.ph/">BulSU Portal</a></li>
                                <li><a href="https://www.bulsu.edu.ph/library/">Library Service</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-lg-4 open-hours">
                            <div class="footer-title">
                                <h4>Open hours</h4>
                                <ul class="footer-social">
                                    <li><a href="https://www.facebook.com/BulSUaklatan" target="_blank"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>

                                </ul>
                            </div>
                            <table class="table-hours">
                                <tbody>
                                    <tr>
                                        <td><i class="far fa-clock"></i>Monday-Thursday </td>
                                        <td>10:00am - 7:00pm</td>
                                    </tr>
                                    <tr>
                                        <td><i class="far fa-clock"></i>Friday</td>
                                        <td>10:00am - 7:30pm</td>
                                    </tr>
                                    <tr>
                                        <td><i class="far fa-clock"></i>Saturday</td>
                                        <td>10:30am - 7:30pm</td>
                                    </tr>
                                    <tr>
                                        <td><i class="far fa-clock"></i>Sunday</td>
                                        <td>10:30am - 7:00pm</td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr>
                            <div class="footer-logo">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td><img src="assets/img/elib logo.png"></td>
                                            <td><img src="assets/img/bulsu logo.png"></td>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="footer-bottom">
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="">Privacy policy</a>
                        </div>
                        <div class="col-sm-8">
                            <p>© 2017 Bulacan State University</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!------------------------ FOOTER ------------------------>
    </div>

</body>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/bootstrap/js/popper.min.js"></script>

</html>