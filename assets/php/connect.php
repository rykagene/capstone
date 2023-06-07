<?php
	$conn = mysqli_connect("localhost","root","");
	if(!mysqli_select_db($conn,"soar")) //yung "soar" yung database name ko
	{
		die("connection error");
	}
?>