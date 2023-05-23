<?php
	session_start();
	require "connect.php";
	if(isset($_SESSION["student_id"]) && isset($_SESSION["password"])){
		header("Location: home.php");
		exit();
	}	
	$student_id = $_POST["student_id"];
	$password = $_POST["password"];

	$query = "SELECT * FROM STUDENTS WHERE student_id='$student_id' AND password='$password'";

	$result = mysqli_query($conn,$query);
	$count =  mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);

	if ($count == 0) {
		echo ("<script>alert('Incorrect student number or password.')</script>");
		header("refresh: 0; url=login.php");
	} else {
		// admin login
		if ($row['access'] == 1) {
			$_SESSION["adminID"] = $student_id;
			$_SESSION["adminpass"] = $pass;
			header("Location: admin.php");
		}
		// student login
		else if ($row['access'] == 0) {
				$_SESSION["student_id"] = $student_id;
				$_SESSION["password"] = $password;
				header("Location: home.php");
		} else {
			echo "error logging in.";
		}
	}
?>