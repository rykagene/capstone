<?php
	require "connect.php";

	$student_id = $_POST["student_id"];
	$first_name = $_POST["first_name"];
	$last_name = $_POST["last_name"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$college = $_POST["college"];
	$course = $_POST["course"];
	// $image = base64_encode(file_get_contents(addslashes($_FILES["image"]["tmp_name"])));
	
	$query = "INSERT INTO STUDENTS (student_id,first_name,last_name,email,password,college,course) 
			   VALUES ('$student_id','$first_name','$last_name','$email','$password','$college','$course')";
			   
	if(mysqli_query($conn,$query)){
		echo ("<script>alert('Account registered.')</script>");
		header("refresh: 0; url=add.php");
	}
	else{
		echo ("<script>alert('Registration failed.')</script>");
		header("refresh: 0; url=add.php");
	}
	mysqli_close($conn);
?>