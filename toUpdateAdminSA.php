<?php
session_start();
require 'assets/php/connect.php';
require 'assets/php/session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the user ID, new first name, and new last name from the AJAX request
    $account_id = $_SESSION['account_id'];
    $userId = $_SESSION['user_id'];

    $newFirstName = $_POST['firstName'];
    $newLastName = $_POST['lastName'];
    $newGender = $_POST['gender'];
    $newDepartment = $_POST['department'];
    $newPosition = $_POST['position'];
    $newEmploymentSTS = $_POST['employmentSTS'];

    // Update the user's information in the database
    $sql2 =" UPDATE admin SET first_name = '$newFirstName', last_name = '$newLastName', department = '$newDepartment', gender = '$newGender', isSuperAdmin = '$newPosition', work_status = '$newEmploymentSTS'  WHERE account_id = '$account_id';";

    if ($conn->query($sql2) === TRUE)   {
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