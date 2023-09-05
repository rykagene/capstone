<?php
session_start();
require 'assets/php/connect.php';
require 'assets/php/session.php';
?>

<!DOCTYPE HTML>
<html>


<!-- Popup for superadmin permission -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Super Admin Permission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body" style="padding:40px 50px;">
                    <form role="form">
                        <div class="form-group">
                            <label for="usrname"><span class="glyphicon glyphicon-user"></span>
                                Super Admin Username</label>
                            <input type="text" class="form-control" id="usrname">
                        </div>
                        <div class="form-group">
                            <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>
                                Super Admin Key</label>
                            <input type="text" class="form-control" id="psw">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <a href="manage.php" class="btn btn-danger">Proceed</a>
                </div>
            </div>
        </div>
    </div>
</div>


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

        <div class="sidebar-menu" id="tabButton">
            <ul>
                <li> <a data-tabName="dashboard" class="dashboard active" id="tabButtons"><span
                            class="las la-th-large"></span>
                        <span>Dashboard</span></a>
                </li>
                <li> <a href="seats-info.php" ><span class="las la-check"></span>
                        <span>Seats Information</span></a>
                </li>
                <li> <a href="reserved.php"><span class="las la-clock"></span>
                        <span>Reserved</span></a>
                </li>
                <li> <a href="userlist.php"><span
                            class="las la-user-friends"></span>
                        <span>User List</span></a>
                </li>
                <li> <a href="history.php"><span class="las la-history"></span>
                        <span>History</span></a>
                </li>
                <li> <a href="analytics.php"><span
                            class="las la-chart-bar"></span>
                        <span>Analytics</span></a>
                </li>
                <li> <a href="settings.php"><span class="las la-cog"></span>
                        <span>Settings</span></a>
                </li>
                <li class="manage" data-toggle="modal" data-target="#exampleModal"> <a><span
                            class="las la-users-cog"></span>
                        <span>Manage Accounts</span></a>
                </li>
                <li class="logout"> <a href="toLogout.php">
                        <span>Logout</span></a>
                </li>
            </ul>
        </div>
    </div>
    <!------------------------ END OF SIDEBAR ------------------------>
    </input>

    <!------------------------ HEADER ------------------------>
    <div class="header">
        <header>
            <h2>
                <label for="nav-toggle">
                    <div class="toggle">
                        <span class="la la-bars"></span>
                    </div>
                </label>
                <h2 class="dashboardText">
                    Dashboard
                </h2>
            </h2>

            <div class="dropdown">
                <button class="dropdown-toggle" class="btn btn-secondary dropdown-toggle" type="button"
                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <div class="user-wrapper">
                        <img src="assets/img/librarian.jpg" width="40px" height="40px" alt="">
                        <div id="user_admin">
                            <h4>
                                <?php echo $_SESSION["first_name"] . ' ' . $_SESSION["last_name"]; ?>
                            </h4>
                        </div>
                    </div>
                </button>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="adminProfile.php">Profile</a></li>
                    <li><a class="dropdown-item" href="toLogout.php">Logout</a></li>
                </div>
            </div>
        </header>
    </div>
    <!------------------------ END OF HEADER ------------------------>


    <div class="main-content">
        <main>
            <div id="tabContainer">
                <!--- Dashboard Code --->
                <div class="tab active" id="dashboard">
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
                                    <a href="reserved.php" class="button" id="tabButtons">See all <span
                                            class="las la-arrow-right"></span></a>
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
                                    <a href="history.php" class="button">See all <span
                                            class="las la-arrow-right"></span></a>
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

                        <!-- Popup for superadmin permission -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Super Admin Permission</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-body" style="padding:40px 50px;">
                                            <form role="form">
                                                <div class="form-group">
                                                    <label for="usrname"><span class="glyphicon glyphicon-user"></span>
                                                        Super Admin Username</label>
                                                    <input type="text" class="form-control" id="usrname">
                                                </div>
                                                <div class="form-group">
                                                    <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>
                                                        Super Admin Key</label>
                                                    <input type="text" class="form-control" id="psw">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancel</button>
                                            <a href="manage.php" class="btn btn-danger">Proceed</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!--- Seats Information Code --->
                <div class="tab" id="seats-info">
                    <div class="filter">

                        <div class="row">

                            <div class="date">
                                <label>Date seated </label>
                                <input type="date" name="claimed_date" value="2023-04-17" class="form-control"
                                    required="required"></input>
                            </div>

                            <div class="college">
                                <label for="cars">Table No.</label>
                                <select class="form-control">
                                    <option style="display:none">Select here</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option selected="selected">8</option>
                                    <option>9</option>
                                </select>
                            </div>

                            <div class="floor" class="form-control">
                                <label for="cars">Floor</label>
                                <select class="form-control">
                                    <option style="display:none">Select here</option>
                                    <option disabled>1</option>
                                    <option disabled>2</option>
                                    <option disabled>3</option>
                                    <option disabled>4</option>
                                    <option disabled>5</option>
                                    <option selected="selected">6</option>
                                    <option disabled>7</option>
                                </select>
                            </div>


                            <div class="col-md-2">
                                <button type="submit" class="buttons">Filter</button>
                            </div>

                            <div class="table">

                                <!-- Non-responsive (yet); Just a small sample of what's possible with CSS Grid. -->
                                <ul class="calendar weekly-byhour">
                                    <!--  EVENT NODES  -->
                                    <!--  DATA:      CATEGORY                         DAY              START  /  END     EVENT DETAILS  -->


                                    <li class="event personal" style="grid-column:   tue;   grid-row:  h05   /  h07;  ">
                                        2020104776</li>
                                    <li class="event personal" style="grid-column:   mon;   grid-row:  h11   /  h12;  ">
                                        2020103123</li>
                                    <li class="event personal" style="grid-column:   mon;   grid-row:  h08   /  h10;  ">
                                        2020104124</li>
                                    <li class="event personal" style="grid-column:   mon;   grid-row:  h16  /  h17;  ">
                                        2020104214</li>
                                    <li class="event personal" style="grid-column:   sun;   grid-row:  h13  /  h15;  ">
                                        2020107547</li>
                                    <li class="event personal" style="grid-column:   wed;   grid-row:  h10   /  h12;  ">
                                        2020107476</li>




                                    <!--  DAYS OF THE WEEK  -->
                                    <li class="day sun">Seat 40</li>
                                    <li class="day mon">Seat 41</li>
                                    <li class="day tue">Seat 42</li>
                                    <li class="day wed">Seat 43</li>
                                    <li class="day thu">Seat 44</li>


                                    <!--  TIMES OF THE DAY  -->
                                    <li class="time h05">9:00 am</li>
                                    <li class="time h06">10:00 am</li>
                                    <li class="time h07">11:00 am</li>
                                    <li class="time h08">12:00 am</li>
                                    <li class="time h09">1:00 pm</li>
                                    <li class="time h10">2:00 pm</li>
                                    <li class="time h11">3:00 pm</li>
                                    <li class="time h12">4:00 pm</li>
                                    <li class="time h13">5:00 pm</li>
                                    <li class="time h14">6:00 pm</li>
                                    <li class="time h15">7:00 pm</li>
                                    <li class="time h16">8:00 pm</li>
                                    <li class="time h17">9:00 pm</li>

                                    <!--  TOP LEFT CORNER FILLER  -->
                                    <li class="corner"></li>

                                    <!--  EMPTY HOURLY FILLERS: -->
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>

                                </ul>
                            </div>

                        </div>

                    </div>
                </div>

                <!--- Reserved Code --->
                <div class="tab" id="reserved">

                    <form action="brw_history.php" method="GET">

                        <div class="filter">
                            <form action="brw_history.php" method="GET">

                                <div class="row">

                                    <div class="date">
                                        <label>Date seated </label>
                                        <input type="date" name="claimed_date" value="" class="form-control"
                                            required="required"></input>
                                    </div>

                                    <div class="college">
                                        <label for="cars">College</label>
                                        <select class="form-control">
                                            <option style="display:none">Select here</option>
                                            <option>College of Architecture and Fine Arts (CAFA)</option>
                                            <option>College of Arts and Letters (CAL)</option>
                                            <option>College of Business Administration (CBA)</option>
                                            <option>College of Criminal Justice Education (CCJE)</option>
                                            <option>College of Hospitaity and Tourism Management (CHTM)</option>
                                            <option>College of Information and Communications Technology (CICT)</option>
                                            <option>College of Industrial Technology (CIT)</option>
                                            <option>College of Law (CLaw)</option>
                                            <option>College of Nursing (CN)</option>
                                            <option>College of Engineering (COE)</option>
                                            <option>College of Education (COED)</option>
                                            <option>College of Science (CS)</option>
                                            <option>College of Exercise and Recreation (CSER)</option>
                                            <option>College of Social Sciences and Philosophy (CSSP)</option>
                                            <option>Graduate School (GS)</option>
                                        </select>
                                    </div>

                                    <div class="course">
                                        <label for="cars">Course</label>
                                        <select class="form-control">
                                            <option style="display:none">Select here</option>
                                            <optgroup label="CAFA">
                                                <option>Bachelor of Science in Architecture</option>
                                                <option>Bachelor of Landscape Architecture</option>
                                                <option>Bachelor of Fine Arts Major in Visual Communication</option>
                                            <optgroup label="CAL">
                                                <option>Bachelor of Arts in Broadcasting</option>
                                                <option>Bachelor of Arts in Journalism</option>
                                                <option>Bachelor of Performing Arts (Theater Track)</option>
                                                <option>Batsilyer ng Sining sa Malikhaing Pagsulat</option>
                                            <optgroup label="CBA">
                                                <option>Bachelor of Science in Business Administration Major in Business
                                                    Economics
                                                </option>
                                                <option>Bachelor of Science in Business Administration Major in
                                                    Financial
                                                    Management
                                                </option>
                                                <option>Bachelor of Science in Business Administration Major in
                                                    Marketing
                                                    Management
                                                </option>
                                                <option>Bachelor of Science in Entrepreneurship</option>
                                                <option>Bachelor of Science in Accountancy</option>
                                            <optgroup label="CCJE">
                                                <option>Bachelor of Arts in Legal Management</option>
                                                <option>Bachelor of Science in Criminology</option>
                                            <optgroup label="CHTM">
                                                <option>Bachelor of Science in Hospitality Management</option>
                                                <option>Bachelor of Science in Tourism Management</option>
                                            <optgroup label="CICT">
                                                <option>Bachelor of Science in Information Technology</option>
                                                <option>Bachelor of Library and Information Science</option>
                                                <option>Bachelor of Science in Information System</option>
                                            <optgroup label="CIT">
                                                <option>Bachelor of Industrial Technology with specialization in
                                                    Automotive
                                                </option>
                                                <option>Bachelor of Industrial Technology with specialization in
                                                    Computer
                                                </option>
                                                <option>Bachelor of Industrial Technology with specialization in
                                                    Drafting
                                                </option>
                                                <option>Bachelor of Industrial Technology with specialization in
                                                    Electrical
                                                </option>
                                                <option>Bachelor of Industrial Technology with specialization in
                                                    Electronics
                                                    &
                                                    Communication Technology</option>
                                                <option>Bachelor of Industrial Technology with specialization in
                                                    Electronics
                                                    Technology</option>
                                                <option>Bachelor of Industrial Technology with specialization in Food
                                                    Processing
                                                    Technology</option>
                                                <option>Bachelor of Industrial Technology with specialization in
                                                    Mechanical
                                                </option>
                                                <option>Bachelor of Industrial Technology with specialization in
                                                    Heating,
                                                    Ventilation, Air Conditioning and Refrigeration Technology (HVACR)
                                                </option>
                                                <option>Bachelor of Industrial Technology with specialization in
                                                    Mechatronics
                                                    Technology</option>
                                                <option>Bachelor of Industrial Technology with specialization in Welding
                                                    Technology
                                                </option>
                                            <optgroup label="CLaw">
                                                <option>Bachelor of Laws</option>
                                                <option>Juris Doctor</option>
                                            <optgroup label="CN">
                                                <option>Bachelor of Science in Nursing</option>
                                            <optgroup label="COE">
                                                <option>Bachelor of Science in Civil Engineering</option>
                                                <option>Bachelor of Science in Computer Engineering</option>
                                                <option>Bachelor of Science in Electrical Engineering</option>
                                                <option>Bachelor of Science in Electronics Engineering</option>
                                                <option>Bachelor of Science in Industrial Engineering</option>
                                                <option>Bachelor of Science in Manufacturing Engineering</option>
                                                <option>Bachelor of Science in Mechanical Engineering</option>
                                                <option>Bachelor of Science in Mechatronics Engineering</option>
                                            <optgroup label="COED">
                                                <option>Bachelor of Elementary Education</option>
                                                <option>Bachelor of Early Childhood Education</option>
                                                <option>Bachelor of Secondary Education Major in English minor in
                                                    Mandarin
                                                </option>
                                                <option>Bachelor of Secondary Education Major in English minor in
                                                    Mandarin
                                                </option>
                                                <option>Bachelor of Secondary Education Major in Sciences</option>
                                                <option>Bachelor of Secondary Education Major in Mathematics</option>
                                                <option>Bachelor of Secondary Education Major in Social Studies</option>
                                                <option>Bachelor of Secondary Education Major in Values Education
                                                </option>
                                                <option>Bachelor of Physical Education</option>
                                                <option>Bachelor of Technology and Livelihood Education Major in
                                                    Industrial
                                                    Arts
                                                </option>
                                                <option>Bachelor of Technology and Livelihood Education Major in
                                                    Information
                                                    and
                                                    Communication Technology</option>
                                                <option>Bachelor of Technology and Livelihood Education Major in Home
                                                    Economics
                                                </option>
                                            <optgroup label="CS">
                                                <option>Bachelor of Science in Biology</option>
                                                <option>Bachelor of Science in Environmental Science</option>
                                                <option>Bachelor of Science in Food Technology</option>
                                                <option>Bachelor of Science in Math with Specialization in Computer
                                                    Science
                                                </option>
                                                <option>Bachelor of Science in Math with Specialization in Applied
                                                    Statistics
                                                </option>
                                                <option>Bachelor of Science in Math with Specialization in Business
                                                    Applications
                                                </option>
                                            <optgroup label="CSER">
                                                <option>Bachelor of Science in Exercise and Sports Sciences with
                                                    specialization in
                                                    Fitness and Sports Coaching</option>
                                                <option>Bachelor of Science in Exercise and Sports Sciences with
                                                    specialization in
                                                    Fitness and Sports Management</option>
                                                <option>Certificate of Physical Education</option>
                                            <optgroup label="CSSP">
                                                <option>Bachelor of Public Administration</option>
                                                <option>Bachelor of Science in Social Work</option>
                                                <option>Bachelor of Science in Psychology</option>
                                            <optgroup label="GS">
                                                <option>Doctor of Education</option>
                                                <option>Doctor of Philosophy</option>
                                                <option>Doctor of Public Administration</option>
                                                <option>Master in Physical Education</option>
                                                <option>Master in Business Administration</option>
                                                <option>Master in Public Administration</option>
                                                <option>Master of Arts in Education</option>
                                                <option>Master of Engineering Program</option>
                                                <option>Master of Industrial Technology Management</option>
                                                <option>Master of Science in Civil Engineering</option>
                                                <option>Master of Science in Computer Engineering</option>
                                                <option>Master of Science in Electronics and Communications Engineering
                                                </option>
                                                <option>Master of Information Technology</option>
                                                <option>Master of Manufacturing Engineering</option>
                                        </select>
                                    </div>

                                    <div class="floor" class="form-control">
                                        <label for="cars">Floor</label>
                                        <select class="form-control">
                                            <option style="display:none">Select here</option>
                                            <option disabled>1</option>
                                            <option disabled>2</option>
                                            <option disabled>3</option>
                                            <option disabled>4</option>
                                            <option disabled>5</option>
                                            <option>6</option>
                                            <option disabled>7</option>
                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <button type="submit" class="buttons">Filter</button>
                                    </div>
                                </div>

                                <div class="recent-grid">
                                    <div class="history">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3>Reserved Users</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">

                                                    <table width="100%">
                                                        <div class="head">
                                                            <thead>
                                                                <tr>
                                                                    <td>Student No.</td>
                                                                    <td>College</td>
                                                                    <td>Time-in</td>
                                                                    <td>Time-out</td>
                                                                    <td>Date</td>
                                                                    <td>Seat No.</td>
                                                                    <td>Floor No.</td>
                                                                    <td style="display:hidden"></td>
                                                                </tr>
                                                            </thead>
                                                        </div>
                                                        <div class='fill'>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="studno">2020106234</td>
                                                                    <td>CICT</td>
                                                                    <td>09:30AM</td>
                                                                    <td>10:00AM</td>
                                                                    <td>4/17/23</td>
                                                                    <td>53</td>
                                                                    <td>6</td>
                                                                    <td><button class="cancel">Cancel</button></td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="studno">2020103646</td>
                                                                    <td>CLaw</td>
                                                                    <td>10:00AM</td>
                                                                    <td>12:00PM</td>
                                                                    <td>4/17/23</td>
                                                                    <td>65</td>
                                                                    <td>6</td>
                                                                    <td><button class="cancel">Cancel</button></td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="studno">2020106434</td>
                                                                    <td>CAL</td>
                                                                    <td>1:00PM</td>
                                                                    <td>3:00PM</td>
                                                                    <td>4/17/23</td>
                                                                    <td>24</td>
                                                                    <td>6</td>
                                                                    <td><button class="cancel">Cancel</button></td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="studno">2020106434</td>
                                                                    <td>CIT</td>
                                                                    <td>09:30AM</td>
                                                                    <td>10:00AM</td>
                                                                    <td>4/17/23</td>
                                                                    <td>12</td>
                                                                    <td>6</td>
                                                                    <td><button class="cancel">Cancel</button></td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="studno">2020106434</td>
                                                                    <td>CN</td>
                                                                    <td>10:00AM</td>
                                                                    <td>12:00PM</td>
                                                                    <td>4/17/23</td>
                                                                    <td>52</td>
                                                                    <td>6</td>
                                                                    <td><button class="cancel">Cancel</button></td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="studno">2020104122</td>
                                                                    <td>CAFA</td>
                                                                    <td>3:00PM</td>
                                                                    <td>4:00PM</td>
                                                                    <td>4/17/23</td>
                                                                    <td>52</td>
                                                                    <td>6</td>
                                                                    <td><button class="cancel">Cancel</button></td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="studno">2020106234</td>
                                                                    <td>CICT</td>
                                                                    <td>09:30AM</td>
                                                                    <td>10:00AM</td>
                                                                    <td>4/17/23</td>
                                                                    <td>53</td>
                                                                    <td>6</td>
                                                                    <td><button class="cancel">Cancel</button></td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="studno">2020103646</td>
                                                                    <td>CLaw</td>
                                                                    <td>10:00AM</td>
                                                                    <td>12:00PM</td>
                                                                    <td>4/17/23</td>
                                                                    <td>65</td>
                                                                    <td>6</td>
                                                                    <td><button class="cancel">Cancel</button></td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="studno">2020106434</td>
                                                                    <td>CAL</td>
                                                                    <td>1:00PM</td>
                                                                    <td>3:00PM</td>
                                                                    <td>4/17/23</td>
                                                                    <td>24</td>
                                                                    <td>6</td>
                                                                    <td><button class="cancel">Cancel</button></td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="studno">2020106434</td>
                                                                    <td>CIT</td>
                                                                    <td>09:30AM</td>
                                                                    <td>10:00AM</td>
                                                                    <td>4/17/23</td>
                                                                    <td>12</td>
                                                                    <td>6</td>
                                                                    <td><button class="cancel">Cancel</button></td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="studno">2020106434</td>
                                                                    <td>CN</td>
                                                                    <td>10:00AM</td>
                                                                    <td>12:00PM</td>
                                                                    <td>4/17/23</td>
                                                                    <td>52</td>
                                                                    <td>6</td>
                                                                    <td><button class="cancel">Cancel</button></td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="studno">2020104122</td>
                                                                    <td>CAFA</td>
                                                                    <td>3:00PM</td>
                                                                    <td>4:00PM</td>
                                                                    <td>4/17/23</td>
                                                                    <td>52</td>
                                                                    <td>6</td>
                                                                    <td><button class="cancel">Cancel</button></td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="studno">2020106234</td>
                                                                    <td>CICT</td>
                                                                    <td>09:30AM</td>
                                                                    <td>10:00AM</td>
                                                                    <td>4/17/23</td>
                                                                    <td>53</td>
                                                                    <td>6</td>
                                                                    <td><button class="cancel">Cancel</button></td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="studno">2020103646</td>
                                                                    <td>CLaw</td>
                                                                    <td>10:00AM</td>
                                                                    <td>12:00PM</td>
                                                                    <td>4/17/23</td>
                                                                    <td>65</td>
                                                                    <td>6</td>
                                                                    <td><button class="cancel">Cancel</button></td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="studno">2020106434</td>
                                                                    <td>CAL</td>
                                                                    <td>1:00PM</td>
                                                                    <td>3:00PM</td>
                                                                    <td>4/17/23</td>
                                                                    <td>24</td>
                                                                    <td>6</td>
                                                                    <td><button class="cancel">Cancel</button></td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="studno">2020106434</td>
                                                                    <td>CIT</td>
                                                                    <td>09:30AM</td>
                                                                    <td>10:00AM</td>
                                                                    <td>4/17/23</td>
                                                                    <td>12</td>
                                                                    <td>6</td>
                                                                    <td><button class="cancel">Cancel</button></td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="studno">2020106434</td>
                                                                    <td>CN</td>
                                                                    <td>10:00AM</td>
                                                                    <td>12:00PM</td>
                                                                    <td>4/17/23</td>
                                                                    <td>52</td>
                                                                    <td>6</td>
                                                                    <td><button class="cancel">Cancel</button></td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="studno">2020104122</td>
                                                                    <td>CAFA</td>
                                                                    <td>3:00PM</td>
                                                                    <td>4:00PM</td>
                                                                    <td>4/17/23</td>
                                                                    <td>52</td>
                                                                    <td>6</td>
                                                                    <td><button class="cancel">Cancel</button></td>
                                                                </tr>
                                                            </tbody>

                                                        </div><!-- fill -->

                                                    </table>

                                                </div><!-- responsive -->


                                            </div> <!-- card body -->
                                        </div> <!-- card -->
                                    </div> <!-- history -->
                                </div> <!-- recent grid -->


                            </form>
                        </div>

                    </form>


                </div>

                <!--- User List Code --->
                <div class="tab" id="userList">
                    <div class="filter">
                        <form action="brw_history.php" method="GET">

                            <div class="row">

                                <div class="college">
                                    <label for="cars">College</label>
                                    <select class="form-control">
                                        <option style="display:none">Select here</option>
                                        <option>College of Architecture and Fine Arts (CAFA)</option>
                                        <option>College of Arts and Letters (CAL)</option>
                                        <option>College of Business Administration (CBA)</option>
                                        <option>College of Criminal Justice Education (CCJE)</option>
                                        <option>College of Hospitaity and Tourism Management (CHTM)</option>
                                        <option>College of Information and Communications Technology (CICT)</option>
                                        <option>College of Industrial Technology (CIT)</option>
                                        <option>College of Law (CLaw)</option>
                                        <option>College of Nursing (CN)</option>
                                        <option>College of Engineering (COE)</option>
                                        <option>College of Education (COED)</option>
                                        <option>College of Science (CS)</option>
                                        <option>College of Exercise and Recreation (CSER)</option>
                                        <option>College of Social Sciences and Philosophy (CSSP)</option>
                                        <option>Graduate School (GS)</option>
                                    </select>
                                </div>

                                <div class="course">
                                    <label for="cars">Course</label>
                                    <select class="form-control">
                                        <option style="display:none">Select here</option>
                                        <optgroup label="CAFA">
                                            <option>Bachelor of Science in Architecture</option>
                                            <option>Bachelor of Landscape Architecture</option>
                                            <option>Bachelor of Fine Arts Major in Visual Communication</option>
                                        <optgroup label="CAL">
                                            <option>Bachelor of Arts in Broadcasting</option>
                                            <option>Bachelor of Arts in Journalism</option>
                                            <option>Bachelor of Performing Arts (Theater Track)</option>
                                            <option>Batsilyer ng Sining sa Malikhaing Pagsulat</option>
                                        <optgroup label="CBA">
                                            <option>Bachelor of Science in Business Administration Major in Business
                                                Economics
                                            </option>
                                            <option>Bachelor of Science in Business Administration Major in Financial
                                                Management
                                            </option>
                                            <option>Bachelor of Science in Business Administration Major in Marketing
                                                Management
                                            </option>
                                            <option>Bachelor of Science in Entrepreneurship</option>
                                            <option>Bachelor of Science in Accountancy</option>
                                        <optgroup label="CCJE">
                                            <option>Bachelor of Arts in Legal Management</option>
                                            <option>Bachelor of Science in Criminology</option>
                                        <optgroup label="CHTM">
                                            <option>Bachelor of Science in Hospitality Management</option>
                                            <option>Bachelor of Science in Tourism Management</option>
                                        <optgroup label="CICT">
                                            <option>Bachelor of Science in Information Technology</option>
                                            <option>Bachelor of Library and Information Science</option>
                                            <option>Bachelor of Science in Information System</option>
                                        <optgroup label="CIT">
                                            <option>Bachelor of Industrial Technology with specialization in Automotive
                                            </option>
                                            <option>Bachelor of Industrial Technology with specialization in Computer
                                            </option>
                                            <option>Bachelor of Industrial Technology with specialization in Drafting
                                            </option>
                                            <option>Bachelor of Industrial Technology with specialization in Electrical
                                            </option>
                                            <option>Bachelor of Industrial Technology with specialization in Electronics
                                                &
                                                Communication Technology</option>
                                            <option>Bachelor of Industrial Technology with specialization in Electronics
                                                Technology</option>
                                            <option>Bachelor of Industrial Technology with specialization in Food
                                                Processing
                                                Technology</option>
                                            <option>Bachelor of Industrial Technology with specialization in Mechanical
                                            </option>
                                            <option>Bachelor of Industrial Technology with specialization in Heating,
                                                Ventilation, Air Conditioning and Refrigeration Technology (HVACR)
                                            </option>
                                            <option>Bachelor of Industrial Technology with specialization in
                                                Mechatronics
                                                Technology</option>
                                            <option>Bachelor of Industrial Technology with specialization in Welding
                                                Technology
                                            </option>
                                        <optgroup label="CLaw">
                                            <option>Bachelor of Laws</option>
                                            <option>Juris Doctor</option>
                                        <optgroup label="CN">
                                            <option>Bachelor of Science in Nursing</option>
                                        <optgroup label="COE">
                                            <option>Bachelor of Science in Civil Engineering</option>
                                            <option>Bachelor of Science in Computer Engineering</option>
                                            <option>Bachelor of Science in Electrical Engineering</option>
                                            <option>Bachelor of Science in Electronics Engineering</option>
                                            <option>Bachelor of Science in Industrial Engineering</option>
                                            <option>Bachelor of Science in Manufacturing Engineering</option>
                                            <option>Bachelor of Science in Mechanical Engineering</option>
                                            <option>Bachelor of Science in Mechatronics Engineering</option>
                                        <optgroup label="COED">
                                            <option>Bachelor of Elementary Education</option>
                                            <option>Bachelor of Early Childhood Education</option>
                                            <option>Bachelor of Secondary Education Major in English minor in Mandarin
                                            </option>
                                            <option>Bachelor of Secondary Education Major in English minor in Mandarin
                                            </option>
                                            <option>Bachelor of Secondary Education Major in Sciences</option>
                                            <option>Bachelor of Secondary Education Major in Mathematics</option>
                                            <option>Bachelor of Secondary Education Major in Social Studies</option>
                                            <option>Bachelor of Secondary Education Major in Values Education</option>
                                            <option>Bachelor of Physical Education</option>
                                            <option>Bachelor of Technology and Livelihood Education Major in Industrial
                                                Arts
                                            </option>
                                            <option>Bachelor of Technology and Livelihood Education Major in Information
                                                and
                                                Communication Technology</option>
                                            <option>Bachelor of Technology and Livelihood Education Major in Home
                                                Economics
                                            </option>
                                        <optgroup label="CS">
                                            <option>Bachelor of Science in Biology</option>
                                            <option>Bachelor of Science in Environmental Science</option>
                                            <option>Bachelor of Science in Food Technology</option>
                                            <option>Bachelor of Science in Math with Specialization in Computer Science
                                            </option>
                                            <option>Bachelor of Science in Math with Specialization in Applied
                                                Statistics
                                            </option>
                                            <option>Bachelor of Science in Math with Specialization in Business
                                                Applications
                                            </option>
                                        <optgroup label="CSER">
                                            <option>Bachelor of Science in Exercise and Sports Sciences with
                                                specialization in
                                                Fitness and Sports Coaching</option>
                                            <option>Bachelor of Science in Exercise and Sports Sciences with
                                                specialization in
                                                Fitness and Sports Management</option>
                                            <option>Certificate of Physical Education</option>
                                        <optgroup label="CSSP">
                                            <option>Bachelor of Public Administration</option>
                                            <option>Bachelor of Science in Social Work</option>
                                            <option>Bachelor of Science in Psychology</option>
                                        <optgroup label="GS">
                                            <option>Doctor of Education</option>
                                            <option>Doctor of Philosophy</option>
                                            <option>Doctor of Public Administration</option>
                                            <option>Master in Physical Education</option>
                                            <option>Master in Business Administration</option>
                                            <option>Master in Public Administration</option>
                                            <option>Master of Arts in Education</option>
                                            <option>Master of Engineering Program</option>
                                            <option>Master of Industrial Technology Management</option>
                                            <option>Master of Science in Civil Engineering</option>
                                            <option>Master of Science in Computer Engineering</option>
                                            <option>Master of Science in Electronics and Communications Engineering
                                            </option>
                                            <option>Master of Information Technology</option>
                                            <option>Master of Manufacturing Engineering</option>
                                    </select>
                                </div>

                                <div class="floor" class="form-control">
                                    <label for="cars">User Type</label>
                                    <select class="form-control">
                                        <option style="display:none">Select here</option>
                                        <option>Student</option>
                                        <option>Faculty</option>
                                        <option>Alumni</option>
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <button type="submit" class="buttons">Filter</button>
                                </div>

                            </div>
                        </form>
                    </div>

                    <div class="recent-grid">
                        <div class="history">
                            <div class="card">

                                <div class="card-body">
                                    <div class="table-responsive">

                                        <section class="table__header">
                                            <h1>Users</h1>
                                            <div class="input-group">
                                                <input type="search" placeholder="Search Data...">
                                                <div class="search-icon">
                                                    <img src="assets/img/search.png" alt="Search">
                                                </div>
                                            </div>
                                            <div class="export__file">
                                                <label for="export-file" class="export__file-btn" title="Export File">
                                                    <img src="assets/img/export_ic.png" alt="Export" class="export_ic">
                                                </label>
                                                <input type="checkbox" id="export-file">
                                                <div class="export__file-options">
                                                    <label>Export As &nbsp; &#10140;</label>
                                                    <label for="export-file" id="toPDF">PDF <img
                                                            src="assets/img/pdf.png" alt=""></label>
                                                    <label for="export-file" id="toJSON">JSON <img
                                                            src="assets/img/json.png" alt=""></label>
                                                    <label for="export-file" id="toCSV">CSV <img
                                                            src="assets/img/csv.png" alt=""></label>
                                                    <label for="export-file" id="toEXCEL">EXCEL <img
                                                            src="assets/img/excel.png" alt=""></label>
                                                </div>
                                            </div>
                                        </section>
                                        <section class="table__body">
                                            <table id="customers_table">
                                                <thead>
                                                    <tr>
                                                        <th> User ID <span class="icon-arrow">&UpArrow;</span></th>
                                                        <th> RFID No. <span class="icon-arrow">&UpArrow;</span></th>
                                                        <th> First Name <span class="icon-arrow">&UpArrow;</span></th>
                                                        <th> Last Name <span class="icon-arrow">&UpArrow;</span></th>
                                                        <th> Course Code <span class="icon-arrow">&UpArrow;</span></th>
                                                        <th> Year <span class="icon-arrow">&UpArrow;</span></th>
                                                        <th> Type <span class="icon-arrow">&UpArrow;</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="studno">2020104276</td>
                                                        <td>47192</td>
                                                        <td>Killua</td>
                                                        <td>Zoldyck</td>
                                                        <td>CICT</td>
                                                        <td>BSIT</td>
                                                        <td>Student</td>

                                                    </tr>

                                                    <tr>
                                                        <td class="studno">2020604776</td>
                                                        <td>47192</td>
                                                        <td>Kei</td>
                                                        <td>Tsukishima</td>
                                                        <td>CICT</td>
                                                        <td>BSIT</td>
                                                        <td>Student</td>

                                                    </tr>

                                                    <tr>
                                                        <td class="studno">2024104776</td>
                                                        <td>47192</td>
                                                        <td>Safer</td>
                                                        <td>Sephiroth</td>
                                                        <td>CAFA</td>
                                                        <td>BSARC</td>
                                                        <td>Student</td>

                                                    </tr>

                                                    <tr>
                                                        <td class="studno">2020604776</td>
                                                        <td>47192</td>
                                                        <td>Rinoa</td>
                                                        <td>Heartily</td>
                                                        <td>CICT</td>
                                                        <td>BLIS</td>
                                                        <td>Student</td>

                                                    </tr>

                                                    <tr>
                                                        <td class="studno">2020504776</td>
                                                        <td>47192</td>
                                                        <td>Lightning</td>
                                                        <td>Farron</td>
                                                        <td>CICT</td>
                                                        <td>BSIT</td>
                                                        <td>Student</td>

                                                    </tr>

                                                    <tr>
                                                        <td class="studno">2023104776</td>
                                                        <td>47192</td>
                                                        <td>Aerith</td>
                                                        <td>Gainborough</td>
                                                        <td>CICT</td>
                                                        <td>BSIT</td>
                                                        <td>Student</td>

                                                    </tr>

                                                    <tr>
                                                        <td class="studno">2030104776</td>
                                                        <td>47192</td>
                                                        <td>Tifa</td>
                                                        <td>Lockhart</td>
                                                        <td>CICT</td>
                                                        <td>BSIT</td>
                                                        <td>Student</td>

                                                    </tr>

                                                    <tr>
                                                        <td class="studno">2021104776</td>
                                                        <td>47192</td>
                                                        <td>Cloud</td>
                                                        <td>Strife</td>
                                                        <td>CICT</td>
                                                        <td>BSIT</td>
                                                        <td>Student</td>

                                                    </tr>

                                                    <tr>
                                                        <td class="studno">2022104776</td>
                                                        <td>47192</td>
                                                        <td>Zack</td>
                                                        <td>Fair</td>
                                                        <td>CICT</td>
                                                        <td>BSIT</td>
                                                        <td>Student</td>

                                                    </tr>

                                                    <tr>
                                                        <td class="studno">2023104776</td>
                                                        <td>47192</td>
                                                        <td>Loyd</td>
                                                        <td>Cruz</td>
                                                        <td>CICT</td>
                                                        <td>BSIT</td>
                                                        <td>Student</td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </section>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!--- History Code --->
                <div class="tab" id="history">
                    <div class="filter">
                        <form action="brw_history.php" method="GET">

                          <div class="row">

                            <div class="college">
                               <label for="cars">College</label>
                               <select class="form-control">
                                <option style="display:none">Select here</option>
                                <option>College of Architecture and Fine Arts (CAFA)</option>
                                <option>College of Arts and Letters (CAL)</option>
                                <option>College of Business Administration (CBA)</option>
                                <option>College of Criminal Justice Education (CCJE)</option>
                                <option>College of Hospitaity and Tourism Management (CHTM)</option>
                                <option>College of Information and Communications Technology (CICT)</option>
                                <option>College of Industrial Technology (CIT)</option>
                                <option>College of Law (CLaw)</option>
                                <option>College of Nursing (CN)</option>
                                <option>College of Engineering (COE)</option>
                                <option>College of Education (COED)</option>
                                <option>College of Science (CS)</option>
                                <option>College of Exercise and Recreation (CSER)</option>
                                <option>College of Social Sciences and Philosophy (CSSP)</option>
                                <option>Graduate School (GS)</option>
                               </select>
                            </div>

                            <div class="course">
                             <label for="cars">Course</label>
                             <select class="form-control">
                                <option style="display:none">Select here</option>
                                <optgroup label="CAFA">
                                    <option>Bachelor of Science in Architecture</option>
                                    <option>Bachelor of Landscape Architecture</option>
                                    <option>Bachelor of Fine Arts Major in Visual Communication</option>
                                <optgroup label="CAL">
                                    <option>Bachelor of Arts in Broadcasting</option>
                                    <option>Bachelor of Arts in Journalism</option>
                                    <option>Bachelor of Performing Arts (Theater Track)</option>
                                    <option>Batsilyer ng Sining sa Malikhaing Pagsulat</option>
                                <optgroup label="CBA">
                                    <option>Bachelor of Science in Business Administration Major in Business Economics
                                    </option>
                                    <option>Bachelor of Science in Business Administration Major in Financial Management
                                    </option>
                                    <option>Bachelor of Science in Business Administration Major in Marketing Management
                                    </option>
                                    <option>Bachelor of Science in Entrepreneurship</option>
                                    <option>Bachelor of Science in Accountancy</option>
                                <optgroup label="CCJE">
                                    <option>Bachelor of Arts in Legal Management</option>
                                    <option>Bachelor of Science in Criminology</option>
                                <optgroup label="CHTM">
                                    <option>Bachelor of Science in Hospitality Management</option>
                                    <option>Bachelor of Science in Tourism Management</option>
                                <optgroup label="CICT">
                                    <option>Bachelor of Science in Information Technology</option>
                                    <option>Bachelor of Library and Information Science</option>
                                    <option>Bachelor of Science in Information System</option>
                                <optgroup label="CIT">
                                    <option>Bachelor of Industrial Technology with specialization in Automotive</option>
                                    <option>Bachelor of Industrial Technology with specialization in Computer</option>
                                    <option>Bachelor of Industrial Technology with specialization in Drafting</option>
                                    <option>Bachelor of Industrial Technology with specialization in Electrical</option>
                                    <option>Bachelor of Industrial Technology with specialization in Electronics &
                                        Communication Technology</option>
                                    <option>Bachelor of Industrial Technology with specialization in Electronics
                                        Technology</option>
                                    <option>Bachelor of Industrial Technology with specialization in Food Processing
                                        Technology</option>
                                    <option>Bachelor of Industrial Technology with specialization in Mechanical</option>
                                    <option>Bachelor of Industrial Technology with specialization in Heating,
                                        Ventilation, Air Conditioning and Refrigeration Technology (HVACR)</option>
                                    <option>Bachelor of Industrial Technology with specialization in Mechatronics
                                        Technology</option>
                                    <option>Bachelor of Industrial Technology with specialization in Welding Technology
                                    </option>
                                <optgroup label="CLaw">
                                    <option>Bachelor of Laws</option>
                                    <option>Juris Doctor</option>
                                <optgroup label="CN">
                                    <option>Bachelor of Science in Nursing</option>
                                <optgroup label="COE">
                                    <option>Bachelor of Science in Civil Engineering</option>
                                    <option>Bachelor of Science in Computer Engineering</option>
                                    <option>Bachelor of Science in Electrical Engineering</option>
                                    <option>Bachelor of Science in Electronics Engineering</option>
                                    <option>Bachelor of Science in Industrial Engineering</option>
                                    <option>Bachelor of Science in Manufacturing Engineering</option>
                                    <option>Bachelor of Science in Mechanical Engineering</option>
                                    <option>Bachelor of Science in Mechatronics Engineering</option>
                                <optgroup label="COED">
                                    <option>Bachelor of Elementary Education</option>
                                    <option>Bachelor of Early Childhood Education</option>
                                    <option>Bachelor of Secondary Education Major in English minor in Mandarin</option>
                                    <option>Bachelor of Secondary Education Major in English minor in Mandarin</option>
                                    <option>Bachelor of Secondary Education Major in Sciences</option>
                                    <option>Bachelor of Secondary Education Major in Mathematics</option>
                                    <option>Bachelor of Secondary Education Major in Social Studies</option>
                                    <option>Bachelor of Secondary Education Major in Values Education</option>
                                    <option>Bachelor of Physical Education</option>
                                    <option>Bachelor of Technology and Livelihood Education Major in Industrial Arts
                                    </option>
                                    <option>Bachelor of Technology and Livelihood Education Major in Information and
                                        Communication Technology</option>
                                    <option>Bachelor of Technology and Livelihood Education Major in Home Economics
                                    </option>
                                <optgroup label="CS">
                                    <option>Bachelor of Science in Biology</option>
                                    <option>Bachelor of Science in Environmental Science</option>
                                    <option>Bachelor of Science in Food Technology</option>
                                    <option>Bachelor of Science in Math with Specialization in Computer Science</option>
                                    <option>Bachelor of Science in Math with Specialization in Applied Statistics
                                    </option>
                                    <option>Bachelor of Science in Math with Specialization in Business Applications
                                    </option>
                                <optgroup label="CSER">
                                    <option>Bachelor of Science in Exercise and Sports Sciences with specialization in
                                        Fitness and Sports Coaching</option>
                                    <option>Bachelor of Science in Exercise and Sports Sciences with specialization in
                                        Fitness and Sports Management</option>
                                    <option>Certificate of Physical Education</option>
                                <optgroup label="CSSP">
                                    <option>Bachelor of Public Administration</option>
                                    <option>Bachelor of Science in Social Work</option>
                                    <option>Bachelor of Science in Psychology</option>
                                <optgroup label="GS">
                                    <option>Doctor of Education</option>
                                    <option>Doctor of Philosophy</option>
                                    <option>Doctor of Public Administration</option>
                                    <option>Master in Physical Education</option>
                                    <option>Master in Business Administration</option>
                                    <option>Master in Public Administration</option>
                                    <option>Master of Arts in Education</option>
                                    <option>Master of Engineering Program</option>
                                    <option>Master of Industrial Technology Management</option>
                                    <option>Master of Science in Civil Engineering</option>
                                    <option>Master of Science in Computer Engineering</option>
                                    <option>Master of Science in Electronics and Communications Engineering</option>
                                    <option>Master of Information Technology</option>
                                    <option>Master of Manufacturing Engineering</option>
                             </select>
                            </div>

                            <div class="col-md-2">
                             <button type="submit" class="buttons">Filter</button>
                            </div>

                          </div>
                        </form>
                    </div>
                    <div class="recent-grid">
                      <div class="history">
                         <div class="card">
                           <div class="card-body">
                              <div class="table-responsive">
                                <section class="table__body">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th> Student No. <span class="icon-arrow">&UpArrow;</span></th>
                                                <th> College <span class="icon-arrow">&UpArrow;</span></th>
                                                <th> Date <span class="icon-arrow">&UpArrow;</span></th>
                                                <th> Time-in <span class="icon-arrow">&UpArrow;</span></th>
                                                <th> Time-out <span class="icon-arrow">&UpArrow;</span></th>
                                                <th> Table No. <span class="icon-arrow">&UpArrow;</span></th>
                                                <th> Seat No. <span class="icon-arrow">&UpArrow;</span></th>
                                                <th> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="studno">2020104276</td>
                                                <td>COE</td>
                                                <td>4/24/23</td>
                                                <td>10:30AM</td>
                                                <td>12:00PM</td>
                                                <td>4</td>
                                                <td>6</td>
                                                <td>
                                                    <p class="status pending"><a>See More</a></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="studno">2020104776</td>
                                                <td>CICT</td>
                                                <td>4/17/23</td>
                                                <td>10:30AM</td>
                                                <td>12:00PM</td>
                                                <td>42</td>
                                                <td>6</td>
                                                <td>
                                                    <p class="status pending"><a>See More</a></p>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="studno">2020104786</td>
                                                <td>CHTM</td>
                                                <td>10:30AM</td>
                                                <td>12:00PM</td>
                                                <td>4/7/23</td>
                                                <td>42</td>
                                                <td>6</td>
                                                <td>
                                                    <p class="status pending"><a>See More</a></p>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="studno">2020105771</td>
                                                <td>CICT</td>
                                                <td>4/17/23</td>
                                                <td>10:30AM</td>
                                                <td>12:00PM</td>
                                                <td>42</td>
                                                <td>6</td>
                                                <td>
                                                    <p class="status pending"><a>See More</a></p>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="studno">2020104974</td>
                                                <td>CICT</td>
                                                <td>4/17/23</td>
                                                <td>10:30AM</td>
                                                <td>12:00PM</td>
                                                <td>42</td>
                                                <td>6</td>
                                                <td>
                                                    <p class="status pending"><a>See More</a></p>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="studno">2020104226</td>
                                                <td>CLaw</td>
                                                <td>4/17/23</td>
                                                <td>10:30AM</td>
                                                <td>12:00PM</td>
                                                <td>42</td>
                                                <td>6</td>
                                                <td>
                                                    <p class="status pending"><a>See More</a></p>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="studno">2020104717</td>
                                                <td>CIT</td>
                                                <td>4/17/23</td>
                                                <td>10:30AM</td>
                                                <td>12:00PM</td>
                                                <td>42</td>
                                                <td>6</td>
                                                <td>
                                                    <p class="status pending"><a>See More</a></p>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="studno">2020104724</td>
                                                <td>CICT</td>
                                                <td>4/17/23</td>
                                                <td>10:30AM</td>
                                                <td>12:00PM</td>
                                                <td>42</td>
                                                <td>6</td>
                                                <td>
                                                    <p class="status pending"><a>See More</a></p>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="studno">2020104778</td>
                                                <td>CLaw</td>
                                                <td>4/17/23</td>
                                                <td>10:30AM</td>
                                                <td>12:00PM</td>
                                                <td>42</td>
                                                <td>6</td>
                                                <td>
                                                    <p class="status pending"><a>See More</a></p>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="studno">2020104798</td>
                                                <td>COE</td>
                                                <td>4/17/23</td>
                                                <td>10:30AM</td>
                                                <td>12:00PM</td>
                                                <td>42</td>
                                                <td>6</td>
                                                <td>
                                                    <p class="status pending"><a>See More</a></p>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="studno">2020104732</td>
                                                <td>CSSP</td>
                                                <td>4/17/23</td>
                                                <td>10:30AM</td>
                                                <td>12:00PM</td>
                                                <td>42</td>
                                                <td>6</td>
                                                <td>
                                                    <p class="status pending"><a>See More</a></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="studno">2020103779</td>
                                                <td>CHTM</td>
                                                <td>4/17/23</td>
                                                <td>10:30AM</td>
                                                <td>12:00PM</td>
                                                <td>42</td>
                                                <td>6</td>
                                                <td>
                                                    <p class="status pending"><a>See More</a></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="studno">2020102770</td>
                                                <td>COE</td>
                                                <td>4/17/23</td>
                                                <td>10:30AM</td>
                                                <td>12:00PM</td>
                                                <td>42</td>
                                                <td>6</td>
                                                <td>
                                                    <p class="status pending"><a>See More</a></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="studno">2020109774</td>
                                                <td>COE</td>
                                                <td>4/17/23</td>
                                                <td>10:30AM</td>
                                                <td>12:00PM</td>
                                                <td>42</td>
                                                <td>6</td>
                                                <td>
                                                    <p class="status pending"><a>See More</a></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="studno">2020103736</td>
                                                <td>CIT</td>
                                                <td>4/17/23</td>
                                                <td>10:30AM</td>
                                                <td>12:00PM</td>
                                                <td>42</td>
                                                <td>6</td>
                                                <td>
                                                    <p class="status pending"><a>See More</a></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="studno">2020101771</td>
                                                <td>COE</td>
                                                <td>4/17/23</td>
                                                <td>10:30AM</td>
                                                <td>12:00PM</td>
                                                <td>42</td>
                                                <td>6</td>
                                                <td>
                                                    <p class="status pending"><a>See More</a></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="studno">2020105276</td>
                                                <td>CIT</td>
                                                <td>4/17/23</td>
                                                <td>10:30AM</td>
                                                <td>12:00PM</td>
                                                <td>42</td>
                                                <td>6</td>
                                                <td>
                                                    <p class="status pending"><a>See More</a></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="studno">2020109777</td>
                                                <td>COE</td>
                                                <td>4/17/23</td>
                                                <td>10:30AM</td>
                                                <td>12:00PM</td>
                                                <td>42</td>
                                                <td>6</td>
                                                <td>
                                                    <p class="status pending"><a>See More</a></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="studno">2020103779</td>
                                                <td>CSSP</td>
                                                <td>4/17/23</td>
                                                <td>10:30AM</td>
                                                <td>12:00PM</td>
                                                <td>42</td>
                                                <td>6</td>
                                                <td>
                                                    <p class="status pending"><a>See More</a></p>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </section>
                              </div>
                           </div>
                         </div>
                       </div>
                    </div>    
                </div>

                <!--- Analytics Code --->
                <div class="tab" id="analytics">
                   <div class="graphBox">
                      <div class="box">
                         <h4>Weekly Statistics</h4>
                         <div>
                           <canvas id="myChart"></canvas>
                         </div>
                       </div>
                       <div class="box">
                          <div>
                             <canvas id="myChart2"></canvas>
                          </div>
                       </div>
                   </div>

                   <div class="graphBox2">
                         <div class="box">
                           <h4>Monthly/Annual Statistics</h4>
                           <div>
                              <div class="filters">
                                 <div class="year" class="form-control">
                                     <label for="cars">Filter Year:</label>
                                     <select class="form-control">
                                        <option>2022</option>
                                        <option>2023</option>
                                     </select>
                                 </div>
 
                                  <div class="year-level" class="form-control">
                                       <label for="cars">Filter Year Level:</label>
                                       <select class="form-control">
                                         <option style="display:none">Select here</option>
                                         <option>1</option>
                                         <option>2</option>
                                         <option>3</option>
                                         <option>4</option>
                                     </select>
                                 </div>

                            <div class="college">
                                <label for="cars">Filter College:</label>
                                <select class="form-control">
                                    <option style="display:none">Select here</option>
                                    <option>CAFA</option>
                                    <option>CAL</option>
                                    <option>CBA</option>
                                    <option>CCJE</option>
                                    <option>CHTM</option>
                                    <option>CICT</option>
                                    <option>CIT</option>
                                    <option>CLaw</option>
                                    <option>CN</option>
                                    <option>COE</option>
                                    <option>COED</option>
                                    <option>CS</option>
                                    <option>CSER</option>
                                    <option>CSSP</option>
                                    <option>GS</option>
                                </select>
                            </div>

                        </div>
                        <canvas id="myChart3"></canvas>
                        <div class="print-report">
                            <a href="sample-doc.pdf" class="buttons">Print Report</a>
                        </div>
                    </div>
                 </div>
                </div>


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

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js
"></script>

<script src="assets/js/admin.js"></script>
<script src="assets/js/analytics.js"></script>

</html>

