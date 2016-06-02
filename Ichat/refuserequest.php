<?php
	session_start();
	
	if(empty($_SESSION['password'])){
		//echo "<a href='index.php'>Logon</a> <a href='signup.php' target='_blank'>Signup</a>";
		exit();
	}
	header("Content-type:text/html; charset=utf-8");
	//include "include/dbconn.php";
	$link=mysqli_connect("localhost","root","suming","ichat");
	$id = $_GET['id'];
	
	$sql = "delete from friend where id='{$id}';";
	$res = mysqli_query($link,$sql);
	if($res){
		echo "<script type='text/javascript'> alert('Refuses'); location.href='request.php'; </script>";
		exit();
	}

?>
