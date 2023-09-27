<?php
require 'assets/php/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the disabled dates from the POST request
    $disabled_dates = $_POST['disabled_dates'];

    // Update the disabled dates in the database
    $sql = "UPDATE settings SET disabled_dates = '$disabled_dates'";
    if ($conn->query($sql) === TRUE) {
        echo "Disabled dates updated successfully.";
    } else {
        echo "Error updating disabled dates: " . $conn->error;
    }
}

$conn->close();
?>
