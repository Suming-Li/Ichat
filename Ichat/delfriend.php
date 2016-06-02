<?php
	session_start();
	if(empty($_SESSION['name'])){
		header("Location:index.php");
		exit();
	}
	header("Content-type:text/html; charset=utf-8");
	//include "include/dbconn.php";
	$link =mysqli_connect("localhost","root","suming","ichat");
	$f_nickname = $_GET['f_nickname'];
	@$sql = "delete from friend where nickname='".$_SESSION['nickname']."' and f_nickname='{$f_nickname}'";
	if(mysqli_query($link,$sql)){
		echo "<script type='text/javascript'> alert('OK'); location.href='index.php'; </script>";	}
	

?>