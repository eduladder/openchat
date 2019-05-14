# openchat
This is a repo of simple eduladder open chat which is written on php with a log file to store the data and chat any signed up members.
Firstly, you have to make sure that you create session in index.php file. By code written below.
<?php
<?php
// Starting session
session_start();
$_SESSION["username"] = "R";
?>

You have to write the above session code on the line 3 of index.php.
Now you have to run this php code on your system(localhost).
Make sure that you don't delete the code of previous session.
