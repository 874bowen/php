<?php
require_once "pdo.php";
if (isset($_POST['email']) && isset($_POST['password'])){
	$e = $_POST['email'];
	$p = $_POST['password'];
	$sql = "SELECT name FROM users WHERE email = '$e' AND password = '$p'";
	$stmt = $pdo->query($sql);
}
?>
<html>
	<head></head>
	<body>
		<p>Please Login Mamen</p>
		<form method="post">
			<p>Email:<input type="text" name="email"></p>
			<p>Password:<input type="password" name="password"></p>
			<p><input type="submit" value="Login"></p>
		</form>
	</body>
</html>