


<!-- as of now, username is also user_id.
planning to make a feature that username is editable
so the user can use both username or id number to login -->




<?php
require_once 'assets/php/connect.php';

// Retrieve submitted form data
$username = mysqli_real_escape_string($conn, $_POST['user_id']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$account_type = "student";

$user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
$firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
$lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
              // $courseCode = mysqli_real_escape_string($conn, $_POST['courseCode']);
// $yearsecId = mysqli_real_escape_string($conn, $_POST['yearsecId']);
// $yearsecId = 9; //SECTION 3E-G1 


// Insert into 'account' table
$query = "INSERT INTO account (username, password, email, account_type) VALUES ('$username', '$password', '$email', '$account_type')";
if ($conn->query($query)) {
  // Get the generated account_id
  $accountId = $conn->insert_id;

  // Insert into 'users' table
  $query2 = "INSERT INTO users (user_id, rfid_no, first_name, last_name, account_id, course_code, yearsec_id) 
  VALUES ('$user_id', NULL, '$firstName', '$lastName', '$accountId', NULL, NULL)";
  $conn->query($query2);
} 

// Close the database connection
$conn->close();
?>