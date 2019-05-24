<?php
session_start();
if(isset($_SESSION['username'])){
    echo $text = $_POST['text'];
    $fp = fopen("log.html", 'a');
    date_default_timezone_set('Asia/Calcutta');
    fwrite($fp, date("h:i A")."<a target='_blank' href='../viewuser/$_SESSION[user_id]/$_SESSION[username]'><div class='msgln'> <b>".$_SESSION['username']."</b>:</a>".stripslashes(htmlspecialchars($text))."<br></div>");
    fclose($fp);
}
?>
