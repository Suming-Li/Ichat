<?php
	session_start();
	//include "include/dbconn.php";
	$link=mysqli_connect("localhost","root","suming","ichat");
	include "include/common.inc.php";
	$geter= $_GET['geter'];
	$nickname = $_SESSION['name'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" type="text/css" rel="stylesheet" />
<title>Ichat</title>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
	
	var http_request;
	
	//send message
	$(function(){
		$("#sendmess").click(sendMessage);
	});
	
	function sendMessage(){
		var http_request = createAjaxObject();
		if(http_request){
			var url = "sendmes.php";
			var sender = "<?php echo $nickname; ?>";
			var geter = "<?php echo $geter; ?>";
			var content = $("#sendBox").val();
			var data = "content="+content+"&sender="+sender+"&geter="+geter;
			//alert(data);
			http_request.open("post",url,true);
			http_request.setRequestHeader("content-type","application/x-www-form-urlencoded");
			http_request.onreadystatechange = function(){
				if(http_request.readyState==4){
					
					if(http_request.status==200){
						var res = http_request.responseText;
						if(res!=""){
							//res=="" sucessful, write into messageBox
							//var nowtime = new Date().toLocaleString();
							var content1 = "<?php echo $nickname.' '; ?>"+res+"\r\n";
							var content2 = content+"\r\n" ;
							var contents = $("#messageBox").val()+content1+content2;
							//alert(content);
							$("#messageBox").val(contents);
							$("#sendBox").val("");  //clear sendBox
						}
					}
				}
			}
			http_request.send(data);
		}
	}
	
	//receive message
	setInterval(getMessage,1000); 
	function getMessage(){
		var http_request = createAjaxObject();
		if(http_request){
			var url = "getmes.php";
			var sender = "<?php echo $nickname; ?>";
			var geter = "<?php echo $geter; ?>";
			var data = "sender="+sender+"&geter="+geter;
			//alert(data);
			http_request.open("post",url,true);
			http_request.setRequestHeader("content-type","application/x-www-form-urlencoded");
			http_request.onreadystatechange = function(){
				if(http_request.readyState==4){
				
					if(http_request.status==200){
						if(http_request.responseText=="nomessage"){return;}
						var res = eval("("+http_request.responseText+")");
						for(var i=0;i<res.length;i++){
							var content1 = "<?php echo $geter; ?> "+res[i].stime+"\r\n";
							var content2 = res[i].content+"\r\n" ;
							var contents = $("#messageBox").val()+content1+content2;
							//alert(content);
							$("#messageBox").val(contents);
						}
					}
				}
			}
			http_request.send(data);
		}
	}
	
	//ajax
	function createAjaxObject(){
		if(window.ActiveXObject){
			var newRequest = new ActiveXObject("Microsoft.XMLHTTP");
		}else{
			var newRequest = new XMLHttpRequest();
		}
		return newRequest;
	}
</script>
</head>

<body>
<?php

	if(empty($_SESSION['name'])){
		echo "<a href='index.php'>Log in</a>";
		exit();
	}
	//else{
		//echo $nickname. "  <a href='exit.php'>Log out</a>";
	//}
?>

<div id="wrapper">
<div id="chatwith">
<span id="cw">Chat with <?php echo $geter; ?></span>
<span ><a class='c1' href='index.php'>Back</a> <a class='c1' href='exit.php'>Logout</a> </span><br/>

</div>

<div id="chatbox">
<textarea readonly="readonly" id="messageBox"></textarea>
</div>

<div id="sendmessage"> 
	<textarea name="content" id="sendBox"></textarea>
	<p><input type="button" value="Send" id="sendmess" /></p>
</div>

</div>



</body>
</html>
