<?php
require_once "pdo.php";
if (isset($_POST['email']) && isset($_POST['password'])){
	echo "Handling POST data ........\n";
	$e = $_POST['email'];
	$p = $_POST['password'];
	$sql = "SELECT name FROM users WHERE email = '$e' AND password = '$p'";
	echo "<p>$sql</p>";
	$stmt = $pdo -> query($sql);
	// checking if there is one row ............
	$row = $stmt->fetch(PDO::FETCH_ASSOC);

	var_dump($row);
	echo "-->\n";

	if ($row === FALSE){
		echo "<h1>Login Incorrect</h1>\n";
	}
	else {
		echo "<h1>Login Success</h1>\n";
	}

	
}
?>
<html>
	<head></head>
	<body>
		<p>Please Login Mamen</p>
		<form method="post">
			<p>Email:<input type="text" name="email"></p>
			<p>Password:<input type="password" name="password"></p>
			<p><input type="submit" value="Login">
				<a href="<?php echo($SERVER['PHP_SELF']);?>">Refresh</a></p>
		</form>
	</body>
</html>