<?php
	session_start();
	
	if(empty($_SESSION['name'])){
		echo "<a href='index.php'>login</a> <a href='signup.php' target='_blank'>signup</a>";
		exit();
	}
	header("Content-type:text/html; charset=utf-8");
	$link=mysqli_connect("localhost","root","suming","ichat");
	include "include/common.inc.php";
	
	$id = $_GET['id'];
	$f_nickname = $_GET['f_nickname'];
	//agree to add friend
	$sql = "update friend set fzt=1 where id='{$id}';";
	$res = mysqli_query($link,$sql);
	//add them as my friend
	@$nickname = $_SESSION['nickname'];
	
	if($f_nickname!=$nickname){
		
		$sql = "insert into friend (nickname,f_nickname,fzt) value ('{$nickname}','{$f_nickname}','1');";
		$res = mysqli_query($link,$sql);
		
	}
	if($res){
			echo "<script type='text/javascript'> alert('OK'); location.href='request.php'; </script>";
			exit();
		}

?>
