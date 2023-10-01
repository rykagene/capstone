<?php
// Function to get the maintenance mode status
function getMaintenanceModeStatus() {
    require 'assets/php/connect.php';

    // Query the maintenance_mode table to get the status
    $query = "SELECT status FROM maintenance WHERE id = 1";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful and fetch the row of data
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $status = $row['status'];
        return $status;
    } else {
        return false;
    }

    // Close the result set and database connection
    mysqli_free_result($result);
    mysqli_close($conn);
}

// Configuration settings
$config = array(
    'maintenance_mode' => getMaintenanceModeStatus(),
    // Add other configuration settings here
);
