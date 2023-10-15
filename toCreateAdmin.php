<?php
session_start();
require 'assets/php/connect.php';
require 'assets/php/session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve submitted form data
    $userName = $_POST['userName'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $department = $_POST['department'];
    $employmentSTS = $_POST['employmentSTS'];
    $position = $_POST['position'];
    $account_type = "admin";

    // Update the user's information in the database
    $sql = "INSERT INTO account (username, password, email, account_type) VALUES ('$userName', '$password', '$email', '$account_type')";
    if ($conn->query($sql)) {
        // Return a success response as JSON if the update is successful
        // echo json_encode(array('status' => 'success'));
        $accountId = $conn->insert_id;

        // Insert into 'users' table
        $sql2 = "INSERT INTO admin (admin_id, isSuperAdmin, rfid_no, department, first_name, last_name, gender, mobile_no, tel_no, fb_link, linkedIn_link, home_address, work_status, account_id) 
                 VALUES ('$userName', '$position', NULL, '$department', '$firstName', '$lastName', '$gender', NULL, NULL, NULL, NULL, NULL, '$employmentSTS', '$accountId')";
        $conn->query($sql2);
    } else {
        // Return an error response as JSON if the update fails
        //echo json_encode(array('status' => 'error'));
    }

    // Close the database connection
    $conn->close();
}

?>