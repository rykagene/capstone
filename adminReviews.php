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
    <link rel="stylesheet" type="text/css" href="assets/css/adminReviews.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!------------------------ ICONS ------------------------>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

</head>


<body>
    <?php if ($_SESSION['isSuperAdmin'] === 'no') {
        echo '<style type="text/css">
       .sidebar-menu #hidden{
           display: none;
       }
      </style>';
    }
    ; ?>

    <input type="checkbox" id="nav-toggle">

    <!------------------------ SIDEBAR ------------------------>
    <div class="sidebar">
        <div class="sidebar-brand">
            <img src="assets/img/bulsu logo.png" alt="bulsu logo" class="logo">
            <h2> <span>SOAR Admin</span></h2>
        </div>

        <div class="sidebar-menu" id="tabButton">
            <ul>
                <li> <a href="admin.php" data-tabName="dashboard" id="tabButtons"><span class="las la-th-large"></span>
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
                <li id="hidden" class="manage" data-toggle="modal" data-target="#exampleModal"> <a
                        href="manageAdmin.php"><span class="las la-users-cog"></span>
                        <span>Manage Accounts</span></a>
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
                Admin Reviews
            </h2>

            <div class="dropdown">
                <button class="dropdown-toggle" class="btn btn-secondary dropdown-toggle" type="button"
                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <div class="user-wrapper">
                        <img src="<?php if ($_SESSION['gender'] == "Male") {
                            echo "https://cdn-icons-png.flaticon.com/512/2552/2552801.png";
                        } elseif ($_SESSION['gender'] == "Female") {
                            echo "https://cdn-icons-png.flaticon.com/512/206/206864.png";
                        } ?>" alt="Admin" class="rounded-circle p-1 bg-secondary" width="45">
                        <div id="user_admin">
                            <h4>
                                <?php echo $_SESSION["username"]; ?>
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
        <!------------------------ END OF HEADER ------------------------>


        <main>
            <!-- DASHBOARD -->

            <!-- <div class="graphBox">
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
        </div> -->
            <div class="dashboard">
                <div class="reviews-container">
                    <h2>Reviews Summary</h2>
                    <div class="review">
                        <span class="icon-container">5 <i class="fas fa-star"></i></span>
                        <div class="progress">
                            <div class="progress-done" data-done="68"></div>
                        </div>
                        <span class="percent">68%</span>
                    </div>
                    <div class="review">
                        <span class="icon-container">4 <i class="fas fa-star"></i></span>
                        <div class="progress">
                            <div class="progress-done" data-done="13"></div>
                        </div>
                        <span class="percent">13%</span>
                    </div>
                    <div class="review">
                        <span class="icon-container">3 <i class="fas fa-star"></i></span>
                        <div class="progress">
                            <div class="progress-done" data-done="9"></div>
                        </div>
                        <span class="percent">9%</span>
                    </div>
                    <div class="review">
                        <span class="icon-container">2 <i class="fas fa-star"></i></span>
                        <div class="progress">
                            <div class="progress-done" data-done="3"></div>
                        </div>
                        <span class="percent">3%</span>
                    </div>
                    <div class="review">
                        <span class="icon-container">1 <i class="fas fa-star"></i></span>
                        <div class="progress">
                            <div class="progress-done" data-done="7"></div>
                        </div>
                        <span class="percent">7%</span>
                    </div>
                </div>

                <div class="box-container">
                    <div class="box">
                        <h4>Reviews and Feedback</h4>
                        <div>

                            <div class="filters">

                                <div class="year" class="form-control">
                                    <label for="cars">Filter Year:</label>
                                    <select class="form-control">
                                        <option>2022</option>
                                        <option>2023</option>
                                    </select>
                                </div>

                                <div class="college">
                                    <label for="months">Filter by Month:</label>
                                    <select class="form-control" id="months">
                                        <option style="display:none">Select here</option>
                                        <option>January</option>
                                        <option>February</option>
                                        <option>March</option>
                                        <option>April</option>
                                        <option>May</option>
                                        <option>June</option>
                                        <option>July</option>
                                        <option>August</option>
                                        <option>September</option>
                                        <option>October</option>
                                        <option>November</option>
                                        <option>December</option>
                                    </select>
                                </div>

                                <div class="year-level" class="form-control">
                                    <label for="yearlevel">Filter by Stars:</label>
                                    <select class="form-control">
                                        <option style="display:none">Select here</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>

                            </div>

                            <div class="review-list-container">
                                <div class="review-list">
                                    <!-- Review 1 -->
                                    <div class="review">
                                        <div class="review-header">
                                            <div class="review-info">
                                                <span class="name">Name 2</span>
                                                <span class="date">Date 2</span>
                                            </div>
                                            <div class="star-rating">
                                                <span>⭐⭐⭐⭐⭐</span>
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            <p>It is good.</p>
                                        </div>
                                    </div>

                                    <!-- Review 2 -->
                                    <div class="review">
                                        <div class="review-header">
                                            <div class="review-info">
                                                <span class="name">Name 2</span>
                                                <span class="date">Date 2</span>
                                            </div>
                                            <div class="star-rating">
                                                <span>⭐⭐⭐</span>
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            <p>Review text goes here...</p>
                                        </div>
                                    </div>
                                    <!-- Review 2 -->
                                    <div class="review">
                                        <div class="review-header">
                                            <div class="review-info">
                                                <span class="name">Name 2</span>
                                                <span class="date">Date 2</span>
                                            </div>
                                            <div class="star-rating">
                                                <span>⭐⭐⭐⭐</span>
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            <p>Review text goes here...</p>
                                        </div>
                                    </div>
                                    <!-- Review 2 -->
                                    <div class="review">
                                        <div class="review-header">
                                            <div class="review-info">
                                                <span class="name">Name 2</span>
                                                <span class="date">Date 2</span>
                                            </div>
                                            <div class="star-rating">
                                                <span>⭐⭐⭐⭐</span>
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            <p>Review text goes here...</p>
                                        </div>
                                    </div>
                                    <!-- Review 2 -->
                                    <div class="review">
                                        <div class="review-header">
                                            <div class="review-info">
                                                <span class="name">Name 2</span>
                                                <span class="date">Date 2</span>
                                            </div>
                                            <div class="star-rating">
                                                <span>⭐⭐⭐⭐</span>
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            <p>Review text goes here...</p>
                                        </div>
                                    </div>
                                    <!-- Review 2 -->
                                    <div class="review">
                                        <div class="review-header">
                                            <div class="review-info">
                                                <span class="name">Name 2</span>
                                                <span class="date">Date 2</span>
                                            </div>
                                            <div class="star-rating">
                                                <span>⭐⭐⭐</span>
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            <p>Review text goes here...</p>
                                        </div>
                                    </div>
                                    <!-- Review 2 -->
                                    <div class="review">
                                        <div class="review-header">
                                            <div class="review-info">
                                                <span class="name">Name 2</span>
                                                <span class="date">Date 2</span>
                                            </div>
                                            <div class="star-rating">
                                                <span>⭐⭐⭐⭐</span>
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            <p>Review text goes here...</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        <div class="print-report">
                                        <a href="sample-doc.pdf" class="buttons">Print Feedback</a>
                                    </div>
                                    </div>

        </main>

    </div>
    </div>


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
<script src="assets\js\adminReviews.js"></script>

</html>