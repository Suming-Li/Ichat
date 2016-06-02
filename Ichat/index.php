<?php
include 'head.html';
session_start();

//if(isset($_GET['logout'])){
//$fp = fopen("log.html", 'a');
//fwrite($fp, "<div class='msgln'><i>User ". $_SESSION['name'] ." has left the chat session.</i><br></div>");
//fclose($fp);

//session_destroy();
//header("Location: index.php"); //Redirect the user
//}



function loginForm(){
echo'
<div id="loginform">

<div id="logo">
<img src="images/logo.png" alt="logo">
</div>
<div id="login">
<form action="verify.php" method="post">
<h1>Welcome to Ichat.</h1>
<input type="text" name="username" id="username" autocomplete="on" placeholder="Username"/> 
<br/><br/>
<input type="password" name="password" id="password" placeholder="Password"/>
<input type="submit" name="enter" id="enter" value="Log in" />
<br/>
<h2><a href="signup.php">New to Ichat? Sign up</a></h2>
</form>
</div>

</div>
';
}

/*
if(isset($_POST['enter'])){
 if($_POST['name'] != ""){
     $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
  }
  else{
    echo '<span class="error">Please type in a name</span>';
  }
}
*/

?>


<!DOCTYPE html>
<html>
<head>
<title>Welcome to Ichat</title>
<link type="text/css" rel="stylesheet" href="style.css" />
</head>

<body>

<?php

//include "include/dbconn.php";
$link=mysqli_connect("localhost","root","suming","ichat");
			
if(!isset($_SESSION['name'])){
loginForm();
}

	
else{
	$username = $_SESSION['name'];
	
	$sql="SELECT login_status FROM users where username='{$username}';";
	$res=mysqli_query($link, $sql);
	$row = mysqli_fetch_array($res);
	if($row['login_status']==1 && !isset($_SESSION['password'])){
		echo "<h2>This user has logged in</h2>";
		loginForm();
		}
		
	else{
	@$_SESSION['password'] = stripslashes(htmlspecialchars($_POST['password']));
	$sql = "UPDATE users SET login_status='1' WHERE username='{$username}';";	
	mysqli_query($link, $sql);
	
?>
		<div id='friendlist'>
		<div id='f1'>
		<?php
		echo "<span ><br/><a class='f1' href='index.php'>".$username."</a>". "<a class='f1' href='add.php'>Add</a>". "<a class='f1' href='exit.php'>Logout</a> </span><br/><br/>";
		//whether have requests from friends or not
		$sql = "select id from friend where f_nickname='{$username}' and fzt='0';";
		$res = mysqli_query($link,$sql);
		$fnum = mysqli_num_rows($res);
		if($fnum>0){
			echo "<h3><a href='request.php' style='color:red'>&nbsp;Respond to Your (".$fnum.") Friend Request</h3></a>";
		}else{
			echo "<h3>No Friend Requests</h3>";
		}
		mysqli_free_result($res);	
		?>
		</div>
        
		<div id='f2'>
        <h1> Chat with:</h1>
        </div>
        
		<div id='f3'>
	<ul id="flist">
	 <?php 
	 $sql = "select f_nickname from friend where nickname='{$username}' and fzt='1';"; 
		//echo $sql;exit();
		$res = mysqli_query($link,$sql);
		if(mysqli_num_rows($res)<1){
			echo "<br> <h1 class='fl'>No Friends</h1>";
			exit();
		}
		echo "<table>";
		while($row = mysqli_fetch_array($res)){
			echo "<tr>";
			$f_nickname = $row['f_nickname'];
			//check whether receive new message
			$sql1 = "select id from message where sender='{$f_nickname}' and geter='{$username}' and mloop=0;";
			$res1 = mysqli_query($link,$sql1);
			//echo $sql1;
			//echo "<td><li title='".$f_nickname."'>".$f_nickname;
			echo "<td><li title='".$f_nickname."'>"."<a href='message.php?geter=".$f_nickname."'>".$f_nickname."</a>";
			if(mysqli_num_rows($res1)>0){
				echo "<span style='color:#ffab00'>(New Message)</span></li></td>";
				
			}else{
				echo "</li></td>";
			}
			echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='delfriend.php?f_nickname=".$f_nickname."' onclick='return del_confirm()'>Delete</a></td>";
			echo "</tr>";
		}
		mysqli_free_result($res);
		echo "</table>";
	 ?>
     </ul>
        </div>
        </div>
<?php
	}
}
?>        
        
</body>
</html>