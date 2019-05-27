<?php
session_start();
if(isset($_SESSION['username'])){
    echo $text = $_POST['text'];
    $localOffset = $_POST['localOffset'];

	$serverOffset = date('Z');


	$now = time();
	$offset = $now+ $localOffset - $serverOffset;
	$solved_time =date('h:i A',$offset);


    $fp = fopen("log.html", 'a');
    fwrite($fp,"(". $solved_time.")<a target='_blank' href='../viewuser/$_SESSION[user_id]/$_SESSION[username]'><span class='msgln'> <b>".$_SESSION['username']."</b>:</a>".stripslashes(htmlspecialchars($text))."<br></span>");
    fclose($fp);
}
?>
