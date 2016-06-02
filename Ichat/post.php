<?php
session_start();
if(isset($_SESSION['name'])){
   $text = $_POST['text'];

   $fp = fopen("log.html", 'a');
   date_default_timezone_set('PST8PDT');
   fwrite($fp, "<div class='msgln'>(".date("l H:i").") <b>".$_SESSION['name']."</b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
   fclose($fp);
}
?>