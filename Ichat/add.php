<?php
include 'head.html';
session_start();
	@$_SESSION['password'] = stripslashes(htmlspecialchars($_POST['password']));
?>


<body>
<div id="addfriend"> 
<div id="af1"> 
<br><br>
<form action="friends.php" method="get">
<input type="text" name="f_nickname" placeholder="Enter friend's username"/>
<input type="submit" value=" Add " name="sub" />
</form>
<h2><a href="index.php">Back</a></h2>
<br>
<h1>User List</h1>
</div>

<div id="af2">

<?php

	//include "include/dbconn.php";
	$link =mysqli_connect("localhost","root","suming","ichat");
	//$sql = "select username from users order by reg_time desc limit 0,10;";
	$sql = "select username from users order by id desc limit 0,10;";
	$res = mysqli_query($link,$sql);
	
	while($row = mysqli_fetch_array($res)){
		echo "<li>".$row['username']."&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;<a href='friends.php?f_nickname=".$row['username']."'>Add</a></li>";
	}
	mysqli_free_result($res);

?>
</div>
</div>


</body>





<?php



?>