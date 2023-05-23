<?php
	$conn = mysqli_connect("localhost","root","");
	if(!mysqli_select_db($conn,"elib")) 
	{
		die("connection error");
	}
?>