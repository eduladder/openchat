<?php
session_start();
error_reporting(E_ALL);

if(isset($_GET['logout'])){

    //Simple exit message
    $fp = fopen("log.html", 'a');
    fwrite($fp, "<div class='msgln'><i>User <a target='_blank' href='../viewuser/$_SESSION[user_id]/$_SESSION[username]'>".  $_SESSION['username'] ."</a> has left the chat session.</i><br></div>");
    fclose($fp);
    header("Location: ../index.php"); //Redirect the user
}
?>
<?php
if(isset($_SESSION['username'])){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<title>Chat - Eduladder</title>
<h2>Welcome to eduladder open chat</h2>
<p>This chat module is for open discussion so that you can find answers more easily please see how to ask a question and how to write down answers for eduladder</p>
<a href="https://eduladder.com/viewquestions/2096/How-to-ask-a-question-in-eduladder" target="_blank">How to ask a queston</a>|<a href="https://eduladder.com/viewquestions/12885/How-to-post-an-answer-on-eduladder" target="_blank">How to answer a question </a>
<link type="text/css" rel="stylesheet" href="style.css" />
</head>
<div id="wrapper">
    <div id="menu">
        <p class="welcome">Welcome, <b><?php echo $_SESSION['username']; ?></b></p>
        <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
        <div style="clear:both"></div>
    </div>

    <div id="chatbox">
      <?php
  if(file_exists("log.html") && filesize("log.html") > 0){
      $handle = fopen("log.html", "r");
      $contents = fread($handle, filesize("log.html"));
      fclose($handle);

      echo $contents;
  }
  ?>
</div>

    <form name="message" action="">
        <input name="usermsg" type="text" id="usermsg" size="63" />
        <input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
    </form>
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript">
// jQuery Document
$(document).ready(function(){

});

// jQuery Document
$(document).ready(function(){
	//If user wants to end session
	$("#exit").click(function(){
		var exit = confirm("Are you sure you want to end the session?");
		if(exit==true){window.location = 'index.php?logout=true';}
	});
});
//If user submits the form
	$("#submitmsg").click(function(){
		var clientmsg = $("#usermsg").val();
		$.post("post.php", {text: clientmsg});
		$("#usermsg").attr("value", "");
		return false;
	});
function loadLog(){
//Load the file containing the chat log
		$.ajax({
			url: "log.html",
			cache: false,
			success: function(html){
				$("#chatbox").html(html); //Insert chat log into the #chatbox div
		  	},
		});
	}
//Load the file containing the chat log
	function loadLog(){

		$.ajax({
			url: "log.html",
			cache: false,
			success: function(html){
				$("#chatbox").html(html); //Insert chat log into the #chatbox div
		  	},
		});
	}
//Load the file containing the chat log
	function loadLog(){
		var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height before the request
		$.ajax({
			url: "log.html",
			cache: false,
			success: function(html){
				$("#chatbox").html(html); //Insert chat log into the #chatbox div

				//Auto-scroll
				var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height after the request
				if(newscrollHeight > oldscrollHeight){
					$("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
				}
		  	},
		});
	}
setInterval (loadLog, 2500);	//Reload file every 2500 m
</script>
<s>
</body>
</html>
<?php
}else{
  echo 'Please <a href="https://eduladder.com/login.php">login</a> to continue';
}
?>
