<?php
session_start();
require 'assets/php/connect.php';
require 'assets/php/session.php';

if (isset($_POST['apply'])) {
    // Get the form inputs
    $reservation = $_POST['customRadio'];
    $minDuration = $_POST['min_duration'];
    $maxDuration = $_POST['max_duration'];
    $reservePerDay = $_POST['reserve_per_day'];

    // Update the settings in the database
    $sql = "UPDATE `settings` SET `reservation` = '$reservation', `minDuration` = '$minDuration', `maxDuration` = '$maxDuration', `reservePerDay` = '$reservePerDay' WHERE `settings_id` = 1";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Settings updated successfully.";
    } else {
        echo "Error updating settings: " . mysqli_error($conn);
    }
}


if (isset($_POST['save'])) {
    // Get the maintenance mode value
    $maintenanceStatus = $_POST['maintenanceStatus'];

    // Update the maintenance mode in the database
    $sql = "UPDATE `maintenance` SET `status` = '$maintenanceStatus' WHERE `id` = 1";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Maintenance mode updated successfully.";
    } else {
        echo "Error updating maintenance mode: " . mysqli_error($conn);
    }
}

// Retrieve the current maintenance mode status from the database
$query = "SELECT status FROM `maintenance` WHERE `id` = 1";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $maintenanceStatus = $row['status'];
} else {
    // Handle the case when the query fails or no rows are found
    $maintenanceStatus = 0; // Default value for maintenance mode
}

// Close the result set
mysqli_free_result($result);
?>
?>





?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <!------------------------ Bootstrap 4 ------------------------>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-toggle@2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-toggle@2.2.2/js/bootstrap-toggle.min.js"></script>
    

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

        <?php
        // Assuming you have established a database connection

        // Retrieve the data from the settings table
        $sql = "SELECT * FROM `settings` WHERE `settings_id` = 1";
        $result = mysqli_query($conn, $sql);

        // Check if the query was successful and fetch the row of data
        if ($result && mysqli_num_rows($result) > 0) {
            $settings = mysqli_fetch_assoc($result);
        } else {
            echo "Error retrieving settings: " . mysqli_error($conn);
        }

        // Close the result set
        mysqli_free_result($result);

        // Close the database connection
        mysqli_close($conn);
        ?>

        <main>
            <div class="container mt-4">
                <h4 class=""> Reservation System </h4>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <!-- Enable Reservation -->
                    <div class="form-group row">
                        <label for="enableReservation" class="col-sm-2 col-form-label">Enable Reservation</label>
                        <div class="col-sm-10">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" value="1" <?php if ($settings['reservation'] == 1) echo 'checked'; ?>>
                                <label class="custom-control-label" for="customRadio1">Enable</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input" value="0" <?php if ($settings['reservation'] == 0) echo 'checked'; ?>>
                                <label class="custom-control-label" for="customRadio2">Disable</label>
                            </div>
                        </div>
                    </div>

                    <!-- Min duration -->
                    <div class="form-group row">
                        <label for="min_duration" class="col-sm-2 col-form-label">Min duration</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="min_duration" name="min_duration" value="<?php echo $settings['minDuration']; ?>">
                            <small class="form-text text-muted">Enter the minimum duration in hours</small>
                        </div>
                    </div>

                    <!-- Max duration -->
                    <div class="form-group row">
                        <label for="max_duration" class="col-sm-2 col-form-label">Max duration</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="max_duration" name="max_duration" value="<?php echo $settings['maxDuration']; ?>">
                            <small class="form-text text-muted">Enter the maximum duration in hours</small>
                        </div>
                    </div>

                    <!-- Reserve per day -->
                    <div class="form-group row">
                        <label for="reserve_per_day" class="col-sm-2 col-form-label">Reserve per day</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="reserve_per_day" name="reserve_per_day" value="<?php echo $settings['reservePerDay']; ?>">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="apply">Apply</button>
                </form>
            </div>

            <div class="container mt-4">
                <!-- Maintenance -->
                <div class="toggle_container">
                <h4 class="">Reservation Maintenance</h4>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <div class="form-group row">
        <label for="maintenanceMode" class="col-sm-2 col-form-label">Maintenance Mode</label>
        <div class="col-sm-10">
            <?php
           

            // Check if $maintenanceStatus is equal to 1 or 0 and set the checked attribute accordingly
            $isCheckedOn = ($maintenanceStatus == 1) ? 'checked' : '';
            $isCheckedOff = ($maintenanceStatus == 0) ? 'checked' : '';
            ?>

            <div class="custom-control custom-radio">
                <input type="radio" id="customRadio3" name="maintenanceStatus" class="custom-control-input" value="1" <?php echo $isCheckedOn; ?>>
                <label class="custom-control-label" for="customRadio3">On</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" id="customRadio4" name="maintenanceStatus" class="custom-control-input" value="0" <?php echo $isCheckedOff; ?>>
                <label class="custom-control-label" for="customRadio4">Off</label>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary" name="save">Save</button>
</form>


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

<script src="assets/js/analytics.js"></script>
<script src="assets/js/settings.js"></script>


</html>