<?php
// always start session
session_start();

// database connection
require "assets/php/connect.php";

// true kapag may laman na
if (isset($_SESSION["student_id"]) && isset($_SESSION["password"])) {
	header("Location: home.php");
	exit();
}

// get value from user input (the input came from login.php)
$student_id = $_POST["student_id"];
$password = $_POST["password"];

// declare query
$query = "SELECT * FROM ACCOUNTS WHERE student_id = '$student_id' AND PASS = '$password'";
$result = mysqli_query($con, $query);
$count = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);


// if there are no row found
if ($count == 0) {
	echo ("<script>alert('Incorrect student number or password.')</script>");
	header("refresh: 0; url=login.php");
} else {
	// admin login
	if ($row['access'] == 1) {
		if ($row['student_id'] == 'addAdmin') {
			header("Location: login.php");
		}
		else {
			$_SESSION["adminID"] = $student_id;
			$_SESSION["adminpass"] = $password;
			$_SESSION["adminFname"] = $row['fname'];
			header("Location: admin.php");
		}
	}

	// student login
	else if ($row['access'] == 0) { 
		if ($row['penalty'] < 3) {
			$_SESSION["student_id"] = $student_id;
			$_SESSION["password"] = $password;
			$_SESSION["studentFname"] = $row['first_name'];
			$_SESSION['studentLname'] = $row['last_name'];
			header("Location: home.php");
		} else {
			echo ("<script>alert('You are temporarily banned from using the system. Please look for librarian to assist you.')</script>");
			header("refresh: 0; url=login.php");
		}
	} 
	
	else {
		echo "error logging in.";
	}
}
mysqli_close($con);
?>