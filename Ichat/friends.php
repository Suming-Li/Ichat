<?php
	session_start();
	@$_SESSION['password'] = stripslashes(htmlspecialchars($_POST['password']));
	if(empty($_SESSION['name'])){
		echo "<a href='login.php'>Log in</a> <a href='regist.php' target='_blank'>Sign up</a>";
		exit();
	}
	header("Content-type:text/html; charset=utf-8");
	//include "include/dbconn.php";
	$link=mysqli_connect("localhost","root","suming","ichat");
	include "include/common.inc.php";
	
	$nickname = $_SESSION['name'];
	$f_nickname = $_GET['f_nickname'];
	
	//check whether the id exists
	$sql = "select id from users where username='{$f_nickname}';";
	$res = mysqli_query($link,$sql);
	if(mysqli_num_rows($res)<1){
		echo "<script type='text/javascript'> alert('not exist'); location.href='add.php'; </script>";
		exit();
	}
	
	//check whether the friend is added 
	$sql = "select nickname from friend where f_nickname='{$f_nickname}' and nickname='{$nickname}';";
	$res = mysqli_query($link,$sql);
	if(mysqli_num_rows($res)>0){
		echo "<script type='text/javascript'> alert('Already added'); location.href='add.php'; </script>";
		exit();
	}
	
	$sql = "insert friend (nickname,f_nickname) values ('{$nickname}','{$f_nickname}');";
	$res = mysqli_query($link,$sql);
	if($res){
		echo "<script type='text/javascript'> alert('Please wait response'); location.href='add.php'; </script>";
	}

?>
