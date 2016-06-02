<?php
	
	header("Content-type:text/html;charset=utf-8");
	if(empty($_POST['sender'])){exit();}
	$sender = $_POST['sender'];
	$geter = $_POST['geter'];
	$content = $_POST['content'];
	//$aa = $content."&".$sender."&".$geter;
	//file_put_contents("log.txt",$content."\r\n",FILE_APPEND);
	//include "include/dbconn.php";
	$link=mysqli_connect("localhost","root","suming","ichat");
	
	$sql = "INSERT INTO message (sender,geter,content,stime)VALUES ('{$sender}','{$geter}','{$content}',now())";
	//file_put_contents("log.txt",$sql."\r\n",FILE_APPEND);
	$res = mysqli_query($link,$sql);
	if(!$res){
		echo ""; //failed
	}else{
		date_default_timezone_set('PST8PDT');
		echo "(".date("l H:i").")";
	}
?>