<?php

	header("Content-type:text/html;charset=utf-8");
	if(empty($_POST['sender'])){exit();}
	$sender = $_POST['sender'];
	$geter = $_POST['geter'];
	
	//include "include/dbconn.php";
	$link=mysqli_connect("localhost","root","suming","ichat");
	$sql = "select content,stime from message where sender='{$geter}' and geter='{$sender}' and mloop=0 order by stime asc";
	//file_put_contents("log.txt",$sql."\r\n",FILE_APPEND);
	$res = mysqli_query($link,$sql);
	$row=mysqli_fetch_array($res);
	//message numbers      json
	$mNums = mysqli_num_rows($res);
	if($mNums<1){
		echo "no message";
		exit();
	}else if($mNums==1){
		echo "[{'content':'".$row['content']."','stime':'".substr($row['stime'],11)."'}]";
	}else{
		$result="[{'content':'".$row['content']."','stime':'".substr($row['stime'],11)."'}";
		while($row=mysqli_fetch_array($res)){
			$result.=",{'content':'".$row['content']."','stime':'".substr($row['stime'],11)."'}";
		}
		$result.=']';
		echo $result;
	}
	mysqli_free_result($res);
	 
	//set status as 1 after receiving message
	if($mNums>0){
		$sql = "update message set mloop=1 where sender='{$geter}' and geter='{$sender}' and mloop=0";
		mysqli_query($link,$sql);
		//file_put_contents("log.txt",$sql."\r\n",FILE_APPEND);
	}
	
?>

