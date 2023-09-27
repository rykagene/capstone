<?php
session_start();
require 'assets/php/connect.php';
require 'assets/php/session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the user ID, new first name, and new last name from the AJAX request
    $account_id = $_SESSION['account_id'];
    $userId = $_SESSION['user_id'];

    $newEmail = $_POST['email'];
    $newTelNo = $_POST['telNo'];
    $newMobileNo = $_POST['mobileNo'];
    $newFb = $_POST['fb'];
    $newlinkedIn = $_POST['linkedIn'];
    $newAddress = $_POST['address'];

    // Update the user's information in the database
    $sql = "UPDATE account SET email = '$newEmail' WHERE account_id = '$account_id';";
    $sql2 =" UPDATE admin SET tel_no = '$newTelNo', mobile_no = '$newMobileNo', fb_link = '$newFb', linkedIn_link = '$newlinkedIn', home_address = '$newAddress'  WHERE account_id = '$account_id';";

    if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE)   {
        // Return a success response as JSON if the update is successful
        echo json_encode(array('status' => 'success'));
    } else {
        // Return an error response as JSON if the update fails
        echo json_encode(array('status' => 'error'));
    }

    // Close the database connection
    $conn->close();
}

?>