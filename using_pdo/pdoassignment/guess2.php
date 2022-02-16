
<?php 
session_start();
if(isset($_POST['guess'])){
	$guess = $_POST['guess'] + 0;
	$_SESSION['guess'] = $guess;
	if ($guess == 42){
		$_SESSION['message'] = "Great Job Mamen!";
	} else if ($guess < 42){
		$_SESSION['message'] = "Guess too low!";
	} else {
		$_SESSION['message'] = "Guess too high!";
	}
	header("Location: guess2.php");
	return;
}


?>
<html>
<body style="font-family: sans-serif;">
<?php
$guess = isset($_SESSION['guess']) ? $_SESSION['guess'] : '';
$message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
?>
<p>Welcome to my guessing game </p>
<?php
if ($message !== false){
	echo "<p>$message</p>\n";
}
?>
<form method="post">
  <p><label for="guess">Input guess: </label>
  <input type="text" name="guess" id="guess"></p>
  <input type="submit"/>
</form>
</body>
</html>