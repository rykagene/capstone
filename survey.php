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
    <title>Form Review</title>
    <!------------------------ Bootstrap 5.3.0 ------------------------>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css" />
    <!------------------------ CSS Link ------------------------>
    <link rel="stylesheet" type="text/css" href="assets/css/survey.css" />
    <!------------------------ For Survey ------------------------>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
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
                    <a href="profile.php">ACCOUNT</a>
                    <a class="hidden" href="toLogout.php">LOGOUT</a>
                </nav>
            </div>
        </header>
        <!-- Sticky header -->


        <!------------------------ SURVEY ------------------------>
        <div class="survey">
            <h3>Tell us how was your experience.</h3>
            <form action="#">
                <div class="rating">
                    <input type="number" name="rating" hidden>
                    <i class='bx bx-star star' style="--i: 0;"></i>
                    <i class='bx bx-star star' style="--i: 1;"></i>
                    <i class='bx bx-star star' style="--i: 2;"></i>
                    <i class='bx bx-star star' style="--i: 3;"></i>
                    <i class='bx bx-star star' style="--i: 4;"></i>
                </div>
                <textarea name="opinion" cols="30" rows="5" placeholder="Your opinion..."></textarea>
                <div class="btn-group">
                    <button type="submit" class="btn submit">Submit</button>
                    <button class="btn cancel">Cancel</button>
                </div>
            </form>
        </div>
        <!------------------------ END OF SURVEY ------------------------>

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
<script src="assets/js/survey.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/bootstrap/js/popper.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    </html>