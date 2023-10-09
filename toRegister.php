


<!-- as of now, username is also user_id.
planning to make a feature that username is editable
so the user can use both username or id number to login -->




<?php
require_once 'assets/php/connect.php';

// Retrieve submitted form data
$username = mysqli_real_escape_string($conn, $_POST['user_id']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$account_type = mysqli_real_escape_string($conn, $_POST['account_type']);
$user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
$firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
$lastName = mysqli_real_escape_string($conn, $_POST['lastName']);

// $yearsecId = mysqli_real_escape_string($conn, $_POST['yearsecId']);
// $yearsecId = NULL; //SECTION 3E-G1

// $year_level = mysqli_real_escape_string($conn, $_POST['year_level']);
// $section = mysqli_real_escape_string($conn, $_POST['section']);
// $section_group = mysqli_real_escape_string($conn, $_POST['section_group']);

if ($account_type === 'student') {
  $courseCode = mysqli_real_escape_string($conn, $_POST['courseCode']);
  $year_level = mysqli_real_escape_string($conn, $_POST['year_level']);
  $section = mysqli_real_escape_string($conn, $_POST['section']);
  $section_group = mysqli_real_escape_string($conn, $_POST['section_group']);

  // Process and insert student data into the database
  // Add your code to handle student data here...
} else if ($account_type === 'faculty'){
  // Handle non-student account type (e.g., alumni, faculty)
  // Add your code to handle non-student data here
  $courseCode = 'faculty';
  $year_level = 100;
  $section = 'none';
  $section_group = 'none';
}
else if ($account_type === 'alumni'){
  $courseCode = 'alumni';
  $year_level = 100;
  $section = 'none';
  $section_group = 'none';
}
// $courseCode = mysqli_real_escape_string($conn, $_POST['courseCode']);
// $year_level = mysqli_real_escape_string($conn, $_POST['year_level']);
// $section = mysqli_real_escape_string($conn, $_POST['section']);
// $section_group = mysqli_real_escape_string($conn, $_POST['section_group']);

// Retrieve yearsec_id based on year_level, section, and section_group
$queryYearsec = "SELECT yearsec_id FROM yearsec WHERE year_level='$year_level' AND section='$section' AND section_group='$section_group'";
$resultYearsec = $conn->query($queryYearsec);

if ($resultYearsec->num_rows > 0) {
  // Assuming yearsec_id is unique, retrieve the first row
  $row = $resultYearsec->fetch_assoc();
  $yearsecId = $row['yearsec_id'];

  // // Update the yearsec_id in the users table
  $queryUpdateYearsecId = "UPDATE users SET yearsec_id='$yearsecId' WHERE user_id='$user_id'";
  $conn->query($queryUpdateYearsecId);
} else {
  // Handle the case where the yearsec_id was not found
  echo "Error inserting user: " . $conn->error;
}

// Generate a password hash
$password = $_POST['new_password'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert the hashed password into the 'password' column
$query = "INSERT INTO account (username, password, email, account_type) VALUES ('$username', '$hashed_password', '$email', '$account_type')";

if ($conn->query($query)) {
  // Get the generated account_id
  $accountId = $conn->insert_id;

  // Insert into 'users' table
  $query2 = "INSERT INTO users (user_id, rfid_no, first_name, last_name, account_id, course_code, yearsec_id) 
  VALUES ('$username', NULL, '$firstName', '$lastName', '$accountId', '$courseCode', $yearsecId)";

  if ($conn->query($query2)) {
    // Successful insertion into users table
    echo "User inserted successfully.";
  } else {
    echo "Error inserting user: " . $conn->error;
  }

} 

// Close the database connection
$conn->close();
?>



