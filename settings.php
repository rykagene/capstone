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
    <link rel="stylesheet" type="text/css" href="assets/css/analytics.css" />
   
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
                <li> <a href="analytics.php" ><span class="las la-chart-bar"></span>
                        <span>Analytics</span></a>
                </li>
                <li> <a href="settings.php" class="active"><span class="las la-cog"></span>
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
                Settings
            </h2>

            <!-- <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search here..">
            </div> -->

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
            <div class="container mt-4">
            <h4 class=""> Reservation System </h4>
            <form>
            <div class="form-group row">
                <label for="enableReservation" class="col-sm-2 col-form-label">Enable Reservation</label>
                <div class="col-sm-10">
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked>
                        <label class="custom-control-label" for="customRadio1">Enable</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                        <label class="custom-control-label" for="customRadio2">Disable</label>
                    </div>
                </div>
            </div>
          
            </form>
            
            <div class="form-group row">
                    <label for="reservation_hours" class="col-sm-2 col-form-label">Min duration</label>
        
                    <select class="form-control col-sm-10" name="reservation_hours" id="min_duration">
                        <?php
                        for ($i = 1; $i <= 12; $i++) {
                          if($i == 1) 
                            echo '<option value="' . $i . '">' . $i . ' hour</option>';
                          else 
                            echo '<option value="' . $i . '">' . $i . ' hours</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group row">
                    <label for="reservation_hours"  class="col-sm-2 col-form-label">Max duration </label>
                    <select class="form-control col-sm-10" name="reservation_hours" id="max_duration">
                        <?php
                        for ($i = 2; $i <= 12; $i++) {
                            echo '<option value="' . $i . '">' . $i . ' hours</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group row">
                    <label for="reservation_hours"  class="col-sm-2 col-form-label">User can reserve </label>
                    <select class="form-control col-sm-10" name="reservation_hours" id="max_duration">
                        <?php
                        for ($i = 1; $i <= 12; $i++) {
                            echo '<option value="' . $i . '">' . $i . ' reservations per day</option>';
                        }
                        ?>
                    </select>
                </div>

               

                <button type="submit" class="btn btn-danger">Apply</button>

    
                <?php
                require 'assets/php/connect.php';
                $sql = "SELECT COUNT(*) AS totalSeats FROM seat";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $totalSeats = $row['totalSeats'];
                mysqli_close($conn);
                ?>
                
                <h4>Manage Seats</h4>
                <h6>Total Seats: <?php echo $totalSeats; ?></h6>
                <h4>Add New Seat</h4>
                <form action="assets/php/add_seats.php" method="post">
                    
                    <div class="mb-3">
                        <label for="seat_number" class="form-label">Seat Number</label>
                        <input type="text" class="form-control" id="seat_number" name="seat_number" required>
                    </div>
                   

                    <button type="submit" class="btn btn-primary">Add</button>
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
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js
"></script>

<script src="assets/js/analytics.js"></script>


</html>