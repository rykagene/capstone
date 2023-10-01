


<!-- as of now, username is also user_id.
planning to make a feature that username is editable
so the user can use both username or id number to login -->




<?php
require_once 'assets/php/connect.php';

// Retrieve submitted form data
$username = mysqli_real_escape_string($conn, $_POST['user_id']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$account_type = "student";
$firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
$lastName = mysqli_real_escape_string($conn, $_POST['lastName']);

// Generate a password hash
$password = $_POST['password'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert the hashed password into the 'password' column
$query = "INSERT INTO account (username, password, email, account_type) VALUES ('$username', '$hashed_password', '$email', '$account_type')";

if ($conn->query($query)) {
  // Get the generated account_id
  $accountId = $conn->insert_id;

  // Insert into 'users' table
  $query2 = "INSERT INTO users (user_id, rfid_no, first_name, last_name, account_id, course_code, yearsec_id) 
  VALUES ('$username', NULL, '$firstName', '$lastName', '$accountId', NULL, NULL)";
  $conn->query($query2);
} 

// Close the database connection
$conn->close();
?>



