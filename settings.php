<?php
session_start();
require 'assets/php/connect.php';
require 'assets/php/session.php';


// Initialize variables
$settingsUpdated = false;

// Update the settings in the database
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reservation = $_POST['customRadio'];
    $minDuration = $_POST['min_duration'];
    $maxDuration = $_POST['max_duration'];
    $reservePerDay = $_POST['reserve_per_day'];

    $sql = "UPDATE `settings` SET `reservation` = '$reservation', `minDuration` = '$minDuration', `maxDuration` = '$maxDuration', `reservePerDay` = '$reservePerDay' WHERE `settings_id` = 1";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $settingsUpdated = true;
        // Display SweetAlert2 success message
        echo '<script>
            Swal.fire({
                icon: "success",
                title: "Settings Updated",
                text: "The settings have been updated successfully.",
                confirmButtonColor: "#3085d6",
                confirmButtonText: "OK"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "settings.php"; // Redirect to settings page
                }
            });
        </script>';
    } else {
        echo "Error updating settings: " . mysqli_error($conn);
    }
}

// Retrieve the data from the settings table
$sql = "SELECT * FROM `settings` WHERE `settings_id` = 1";
$result = mysqli_query($conn, $sql);

// Rest of your code...
?>

<!DOCTYPE HTML>
<html>
<!--  SweetAlert2 CSS and JS files -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>


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
                <li> <a href="settings.php" class="active"><span class="las la-cog"></span>
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
                Settings
            </h2>

            <!-- <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search here..">
            </div> -->

            <div class="user-wrapper">
                <img src="assets/img/librarian.jpg" width="40px" height="40px" alt="">

                <div>
                    <h4>
                        <?php echo $_SESSION["first_name"] . ' ' . $_SESSION["last_name"]; ?>
                    </h4>
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
                <h3 class=""> Reservation</h3>
                <br>
                <form id="settings-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <!-- Enable Reservation -->
                    <div class="form-group row">
                        <label for="enableReservation" class="col-sm-2 col-form-label">Maintenance Mode</label>
                        <div class="col-sm-10">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input"
                                    value="1" <?php if ($settings['reservation'] == 1)
                                        echo 'checked'; ?>>
                                <label class="custom-control-label" for="customRadio1">Enable</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input"
                                    value="0" <?php if ($settings['reservation'] == 0)
                                        echo 'checked'; ?>>
                                <label class="custom-control-label" for="customRadio2">Disable</label>
                            </div>
                        </div>
                    </div>

                    <!-- Min duration -->
                    <div class="form-group row">
                        <label for="min_duration" class="col-sm-2 col-form-label">Min duration</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="min_duration" name="min_duration"
                                value="<?php echo $settings['minDuration']; ?>">
                            <small class="form-text text-muted">Enter the minimum duration in hours</small>
                        </div>
                    </div>

                    <!-- Max duration -->
                    <div class="form-group row">
                        <label for="max_duration" class="col-sm-2 col-form-label">Max duration</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="max_duration" name="max_duration"
                                value="<?php echo $settings['maxDuration']; ?>">
                            <small class="form-text text-muted">Enter the maximum duration in hours</small>
                        </div>
                    </div>

                    <!-- Reserve per day -->
                    <div class="form-group row">
                        <label for="reserve_per_day" class="col-sm-2 col-form-label">Reserve per day</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="reserve_per_day" name="reserve_per_day"
                                value="<?php echo $settings['reservePerDay']; ?>">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-danger" name="apply" id="applyButton" disabled>Apply
                        Changes</button>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>

<!-- AJAX script -->
<script>
    $(document).ready(function () {
        const settingsForm = $("#settings-form");
        const applyButton = $("#applyButton");

        // Store the initial values of the form fields
        const initialValues = {
            customRadio: <?php echo $settings['reservation']; ?>,
            min_duration: <?php echo $settings['minDuration']; ?>,
            max_duration: <?php echo $settings['maxDuration']; ?>,
            reserve_per_day: <?php echo $settings['reservePerDay']; ?>
        };

        // Function to check if any changes have been made
        function hasChanges() {
            const currentValues = {
                customRadio: parseInt(settingsForm.find("input[name='customRadio']:checked").val()),
                min_duration: parseInt(settingsForm.find("#min_duration").val()),
                max_duration: parseInt(settingsForm.find("#max_duration").val()),
                reserve_per_day: parseInt(settingsForm.find("#reserve_per_day").val())
            };

            return JSON.stringify(currentValues) !== JSON.stringify(initialValues);
        }

        // Check if there are changes on form input
        settingsForm.on("input", function () {
            applyButton.prop("disabled", !hasChanges());
        });

        settingsForm.on("submit", function (event) {
            if (!hasChanges()) {
                event.preventDefault();
                return;
            }

            event.preventDefault(); // Prevent the default form submission

            $.ajax({
                url: "settings.php",
                method: "POST",
                data: settingsForm.serialize(),
                success: function (responseText) {
                    Swal.fire({
                        icon: "success",
                        title: "Settings Updated",
                        text: "The settings have been updated successfully.",
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK"
                    }).then(function (result) {
                        if (result.isConfirmed) {
                            window.location.href = "settings.php"; // Redirect to settings page
                        }
                    });
                },
                error: function (xhr, status, error) {
                    console.error("Error:", error);
                }
            });
        });
    });
</script>


<!-- <script src="assets/js/analytics.js"></script> -->


</html>