<?php

	session_start();

	$username = $_SESSION['name'];
	$link=mysqli_connect("localhost","root","suming","ichat");
	$sql = "UPDATE users SET login_status='0' WHERE username='{$username}';";	
	mysqli_query($link, $sql);
	
	
	unset($_SESSION['password']);
	unset($_SESSION['name']);
	header("Location:index.php");
	
?>
