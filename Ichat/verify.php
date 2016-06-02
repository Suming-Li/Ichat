<?php
	session_start();
	
	$username=$_REQUEST['username'];
	$password=$_REQUEST['password'];
	$encrypted_password=md5($password);

	$con = mysql_connect("localhost","root","suming");
	if(mysql_errno()){
		echo "Failed to connect";
	}
	mysql_select_db("ichat");	
	$flag=0;
	$result=mysql_query("SELECT * FROM users");
	while($row=mysql_fetch_array($result)){
		if($row['username']==$username && $row['password']==$encrypted_password){
			$flag=1;
			$_SESSION['name'] = stripslashes(htmlspecialchars($_POST['username']));
			header('Location:index.php');
		}
	}
	if($flag==0){
		echo "<h2>Wrong username or password</h2>";
		header('Location:index.php');
	}
	
	mysql_close();
?>
