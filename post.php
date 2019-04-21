<?php
session_start();
if(isset($_SESSION['username'])){
    echo $text = $_POST['text'];
    $fp = fopen("log.html", 'a');
    fwrite($fp, "<a target='_blank' href='../viewuser/$_SESSION[user_id]/$_SESSION[username]'><div class='msgln'>(".date("g:i A").") <b>".$_SESSION['username']."</b>:</a>".stripslashes(htmlspecialchars($text))."<br></div>");
    fclose($fp);
}
?>
