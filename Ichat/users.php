<?php
$email=$_REQUEST['email'];
$gender=$_REQUEST['gender'];
$userName=$_REQUEST['username'];
$password=$_REQUEST['password'];
$encrypted_password=md5($password);

$con=mysqli_connect("localhost","root","suming","ichat");
if(mysql_errno()){
	echo "Failed to connect to database";
}
$sql="INSERT INTO users(username,password,email,gender) VALUES('$userName','$encrypted_password','$email','$gender')";
if(mysqli_query($con,$sql)){
	//echo "Hello, ".$userName."! <br>Registration Information:<br>Username: ".$userName."<br>Password: ".$password."<br> Email: ".$email."<br>Gender: ".$gender;
	//sleep(10);
	header("Location:index.php");
}
else{
	echo "Failed";
}
mysqli_close($con);
?>