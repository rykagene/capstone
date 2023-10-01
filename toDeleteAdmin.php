<?php
session_start();
require 'assets/php/connect.php';
require 'assets/php/session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $Account_id = $_POST['account_id'];

    // Delete admin account
    $sql = "DELETE FROM admin WHERE account_id = '$Account_id'";
    $sql2 = "DELETE FROM account WHERE account_id = '$Account_id'";

    if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
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