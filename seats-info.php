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
    <link rel="stylesheet" type="text/css" href="assets/css/seats-info.css" />

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
                <li> <a href="admin.php"><span class="las la-th-large"></span>
                        <span>Dashboard</span></a>
                </li>
                <li> <a href="seats-info.php" class="active"><span class="las la-check"></span>
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
                Seats Information
            </h2>

            <div class="dropdown">
                <button class="dropdown-toggle" class="btn btn-secondary dropdown-toggle" type="button"
                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <div class="user-wrapper">
                        <img src="assets/img/librarian.jpg" width="40px" height="40px" alt="">
                        <div>
                            <h4>
                                <?php echo $_SESSION["first_name"] . ' ' . $_SESSION["last_name"]; ?>
                            </h4>
                        </div>
                    </div>
                </button>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="adminProfile.php">Profile</a></li>
                    <li><a class="dropdown-item" href="toLogout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </header>
        <!------------------------ END OF HEADER ------------------------>

        <main>

            <div class="filter">
                <form action="brw_history.php" method="GET">

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

                                <!--  EMPTY HOURLY FILLERS:
    Helps us show the grid template lines, and create calendar funtionality later. One for every hour
    cell (7 * 24), because our events are "position:absolute" and will sit over top of empty cells -->
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
                </form>
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

<script src="assets/js/seats-info.js"></script>


</html>