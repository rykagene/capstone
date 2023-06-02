<?php
session_start();
require 'connect.php';

$seat_id = $_GET['seat_id'];
$student_id = $_SESSION['student_id'];
$date = $_GET['date'];
$start_time = $_GET['start_time'];
$end_time = $_GET['end_time'];

// Check if the selected date and time range already exists in the database for the specified seat
$query = "SELECT * FROM reservations WHERE seat_id = '$seat_id' AND date = '$date' AND start_time < '$end_time' AND end_time > '$start_time'";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);

if ($count > 0) {
  // The seat is already reserved for the selected date and time range
  echo "error";
} else {
  // Insert the reservation into the database
  $sql = "INSERT INTO reservations (seat_id, student_id, date, start_time, end_time) VALUES ('$seat_id', '$student_id', '$date', '$start_time', '$end_time')";
  if (mysqli_query($conn, $sql)) {
    // Reservation inserted successfully
    echo "success";
  } else {
    // Error occurred during the database insertion
    echo "error";
  }
}

mysqli_close($conn);
?>
