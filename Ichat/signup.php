<?php
include 'head.html';

?>

<body>
<script>
function validate(form){
	if(form.username.value.length==0){
		alert("Enter username");
		form.username.focus();
		return false;
	}
	if(form.password.value.length==0){
		alert("Enter password");
		form.pass.focus();
		return false;
	}
	if(form.email.value.length==0){
		alert("Enter email");
		form.name.focus();
		return false;
	}
	if(form.gender[0].checked == false && form.gender[1].checked == false){
		alert("Select gender");
		return false;
	}

}
</script>

<div id="registerform">
<h1>Sign up for Ichat.</h1>
<form action="users.php" name="form" method="post" onSubmit="return validate(this)">
<input class="sign" type="text"  name="username" placeholder="Enter username"><br/><br/>
<input class="sign" type="text"  name="email" placeholder="Enter email"><br/><br/>
<input class="sign" type="password" name="password" placeholder="Enter password"><br/><br/>
<input type="radio" class="gender" name="gender" value="male"><label>Male &nbsp </label>
<input type="radio" class="gender" name="gender" value="female"><label>Female &nbsp &nbsp &nbsp</label>
<input type="submit" id="signup" value="Sign up">
</form>
</div>
</body>