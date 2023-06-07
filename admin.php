<?php
session_start();
require 'assets/php/connect.php';
require 'assets/php/session.php';
?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <!------------------------ Bootstrap 4 ------------------------>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!------------------------ CSS Link ------------------------>
    <link rel="stylesheet" type="text/css" href="assets/css/admin.css" />

    <!------------------------ ICONS ------------------------>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

</head>


<body>

    <input type="checkbox" id="nav-toggle">

    <!------------------------ SIDEBAR ------------------------>
    <div class="sidebar">
        <div class="sidebar-brand">
            <img src="assets/img/bulsu logo.png" alt="bulsu logo" class="logo">
            <h2> <span>SOAR Admin</span></h2>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li> <a href="admin.php" class="active"><span class="las la-th-large"></span>
                        <span>Dashboard</span></a>
                </li>
                <li> <a href="seats-info.php"><span class="las la-check"></span>
                        <span>Seats Information</span></a>
                </li>
                <li> <a href="reserved.php"><span class="las la-clock"></span>
                        <span>Reserved</span></a>
                </li>
                <li> <a href="user-list.php"><span class="las la-user-friends"></span>
                        <span>User List</span></a>
                </li>
                <li> <a href="history.php"><span class="las la-history"></span>
                        <span>History</span></a>
                </li>
                <li> <a href="analytics.php"><span class="las la-chart-bar"></span>
                        <span>Analytics</span></a>
                </li>
                <li> <a href="settings.php"><span class="las la-cog"></span>
                        <span>Settings</span></a>
                </li>
                <li class="logout"> <a href="toLogout.php">
                        <span>Logout</span></a>
                </li>
            </ul>
        </div>
    </div>
    <!------------------------ END OF SIDEBAR ------------------------>


    <div class="main-content">

        <!------------------------ HEADER ------------------------>
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="la la-bars"></span>
                </label>
                Dashboard
            </h2>

            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search here..">
            </div>

            <div class="user-wrapper">
                <img src="assets/img/librarian.jpg" width="40px" height="40px" alt="">
                <div>
                    <h4>Derrick Jones</h4>
                    <small>Admin</small>
                </div>
            </div>
        </header>
        <!------------------------ END OF HEADER ------------------------>


        <main>

            <!------------------------ SEAT INFO ------------------------>
            <div class="cards">
                <div class="counter col_fourth">
                    <i class="las la-check"></i>
                    <h2 class="timer count-title count-number" data-to="206" data-speed="1000"></h2>
                    <p class="count-text ">Unoccupied</p>
                </div>

                <div class="counter col_fourth">
                    <i class="las la-user"></i>
                    <h2 class="timer count-title count-number" data-to="156" data-speed="1000"></h2>
                    <p class="count-text ">Occupied</p>
                </div>

                <div class="counter col_fourth">
                    <i class="las la-clock"></i>
                    <h2 class="timer count-title count-number" data-to="35" data-speed="1000"></h2>
                    <p class="count-text ">Pending</p>
                </div>

                <div class="counter col_fourth end">
                    <i class="las la-tools"></i>
                    <h2 class="timer count-title count-number" data-to="10" data-speed="1000"></h2>
                    <p class="count-text ">Maintenance</p>
                </div>
            </div>
            <!------------------------ END OF SEAT INFO ------------------------>



            <div class="recent-grid">
                <!------------------------ PENDING RESERVATION ------------------------>
                <div class="pending">
                    <div class="card">
                        <div class="card-header">
                            <h3>Pending Reservation</h3>
                            <a href="reserved.php" class="button">See all <span class="las la-arrow-right"></span></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>Student No.</td>
                                            <td>College</td>
                                            <td>Time-in</td>
                                            <td>Time-out</td>
                                            <td>Date</td>
                                            <td>Seat No.</td>
                                            <td>Floor</td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td class="studno">2020106234</td>
                                            <td>CICT</td>
                                            <td>09:30AM</td>
                                            <td>10:00AM</td>
                                            <td>4/17/23</td>
                                            <td>53</td>
                                            <td>6</td>
                                        </tr>

                                        <tr>
                                            <td class="studno">2020103646</td>
                                            <td>CLaw</td>
                                            <td>10:00AM</td>
                                            <td>12:00PM</td>
                                            <td>4/17/23</td>
                                            <td>65</td>
                                            <td>6</td>
                                        </tr>

                                        <tr>
                                            <td class="studno">2020106434</td>
                                            <td>CAL</td>
                                            <td>1:00PM</td>
                                            <td>3:00PM</td>
                                            <td>4/17/23</td>
                                            <td>24</td>
                                            <td>6</td>
                                        </tr>

                                        <tr>
                                            <td class="studno">2020106434</td>
                                            <td>CIT</td>
                                            <td>09:30AM</td>
                                            <td>10:00AM</td>
                                            <td>4/17/23</td>
                                            <td>12</td>
                                            <td>6</td>
                                        </tr>

                                        <tr>
                                            <td class="studno">2020106434</td>
                                            <td>CN</td>
                                            <td>10:00AM</td>
                                            <td>12:00PM</td>
                                            <td>4/17/23</td>
                                            <td>52</td>
                                            <td>6</td>
                                        </tr>

                                        <tr>
                                            <td class="studno">2020104122</td>
                                            <td>CAFA</td>
                                            <td>3:00PM</td>
                                            <td>4:00PM</td>
                                            <td>4/17/23</td>
                                            <td>52</td>
                                            <td>6</td>
                                        </tr>

                                        <tr>
                                            <td class="studno">2020106234</td>
                                            <td>CICT</td>
                                            <td>09:30AM</td>
                                            <td>10:00AM</td>
                                            <td>4/17/23</td>
                                            <td>53</td>
                                            <td>6</td>
                                        </tr>

                                        <tr>
                                            <td class="studno">2020103646</td>
                                            <td>CLaw</td>
                                            <td>10:00AM</td>
                                            <td>12:00PM</td>
                                            <td>4/17/23</td>
                                            <td>65</td>
                                            <td>6</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!------------------------ END OF PENDING RESERVATION ------------------------>

                <!------------------------ RECENT HISTORY ------------------------>
                <div class="recent-history">
                    <div class="card">
                        <div class="card-header">
                            <h3>Recent History</h3>
                            <a href="history.php" class="button">See all <span class="las la-arrow-right"></span></a>
                        </div>
                        <div class="card-body">

                            <div class="customer">
                                <div class="info">
                                    <img src="assets/img/stud1.jpg" width="40px" height="40px" alt="">
                                    <div>
                                        <h5>Jericho Jorales</h5>
                                        <small>BSIT 3E </small>
                                    </div>
                                </div>
                                <div class="see-details">
                                    <h7>See details</h7>
                                </div>
                            </div>

                            <div class="customer">
                                <div class="info">
                                    <img src="assets/img/stud1.jpg" width="40px" height="40px" alt="">
                                    <div>
                                        <h5>Jericho Jorales</h5>
                                        <small>BSIT 3E </small>
                                    </div>
                                </div>
                                <div class="see-details">
                                    <h7>See details</h7>
                                </div>
                            </div>


                            <div class="customer">
                                <div class="info">
                                    <img src="assets/img/stud1.jpg" width="40px" height="40px" alt="">
                                    <div>
                                        <h5>Jericho Jorales</h5>
                                        <small>BSIT 3E </small>
                                    </div>
                                </div>
                                <div class="see-details">
                                    <h7>See details</h7>
                                </div>
                            </div>


                            <div class="customer">
                                <div class="info">
                                    <img src="assets/img/stud1.jpg" width="40px" height="40px" alt="">
                                    <div>
                                        <h5>Jericho Jorales</h5>
                                        <small>BSIT 3E </small>
                                    </div>
                                </div>
                                <div class="see-details">
                                    <h7>See details</h7>
                                </div>
                            </div>


                            <div class="customer">
                                <div class="info">
                                    <img src="assets/img/stud1.jpg" width="40px" height="40px" alt="">
                                    <div>
                                        <h5>Jericho Jorales</h5>
                                        <small>BSIT 3E </small>
                                    </div>
                                </div>
                                <div class="see-details">
                                    <h7>See details</h7>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!------------------------ END OF RECENT HISTORY ------------------------>

            </div>
        </main>
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
    crossorigin="anonymous"></script>

<script src="assets/js/admin.js"></script>


</html>