<?php 
session_start(); 
@$_SESSION['password'] = stripslashes(htmlspecialchars($_POST['password']));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/main.css" type="text/css" rel="stylesheet" />
<title>Request</title>
</head>

<body>
<?php

	$link=mysqli_connect("localhost","root","suming","ichat");
	
	if(empty($_SESSION['name'])){
		header("Location:index.php");
		exit();
	}else{
		$nickname = $_SESSION['name'];
		echo "<a href='index.php'>".$nickname.", </a>";
		
		$sql = "select id from friend where f_nickname='{$nickname}' and fzt='0';";
		$res = mysqli_query($link,$sql);
		$fnum = mysqli_num_rows($res);
		if($fnum>0){
			echo "<span ><a href='request.php' style='color:#c00'>&nbsp;You have (".$fnum.") request</span></a> <a href='exit.php'>Exit</a>";
		}else{
			echo " &nbsp;&nbsp;<a href='exit.php'>Exit</a>";
		}
		mysqli_free_result($res);	
	}
?>

<div id="message">			
	<hr />
	<h1><span style="font-weight:bold">Request</span></h1>
	<?php
		$sql = "select id,nickname,f_nickname from friend where f_nickname='{$nickname}' and fzt='0';";
		$res = mysqli_query($link,$sql);
		if(mysqli_num_rows($res)<1){
			echo "No request";
			exit();
		}
		while($row = mysqli_fetch_array($res)){
			echo "<p style='float:left;margin-left:30px;'><span style='color:#00a;font-weight:bold;'>";
			echo $row['nickname']."</span> asks to be your friend &nbsp;<a href='agreerequest.php?f_nickname=";
			echo $row['nickname']."&id=".$row['id']."'>Add</a>&nbsp;<a href='refuserequest.php?id=".$row['id']."'>Refuse</a></p>";
		}
		mysqli_free_result($res);
	?>
</div>
</body>
</html>
