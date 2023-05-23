<?php
	$con = mysqli_connect("localhost","root","");
	if(!mysqli_select_db($con,"elib")) //yung "account" yung database name ko
	{
		die("connection error");
	}
?>