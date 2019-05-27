<?php
session_start();
if(isset($_SESSION['username'])){
    echo $text = $_POST['text'];
    $localOffset = $_POST['localOffset'];
	$serverOffset = date('Z');

	$now = time();
	$offset = $localOffset - $serverOffset;
	$solvedTime = date(' h:i A', $offset);

    $fp = fopen("log.html", 'a');

    fwrite($fp, $solvedTime."<a target='_blank' href='../viewuser/$_SESSION[user_id]/$_SESSION[username]'><div class='msgln'> <b>".$_SESSION['username']."</b>:</a>".stripslashes(htmlspecialchars($text))."<br></div>");
    fclose($fp);
}
?>
