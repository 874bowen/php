<?php
require_once "pdo.php";
if(isset($_POST['user_id'])){
	$sql = "DELETE FROM users WHERE user_id = :zip";
	echo "<pre>\n$sql>\n</pre>\n";
	$stmt = $pdo->prepare($sql);
	$stmt -> execute(array(
		':zip' => $_POST['user_id']
	));
}
?>
<html>
	<head></head>
	<body>
		<form method="post">
			<p>Enter ID to DELETE: <input type="text" name="user_id"></p>
			<p><input type="submit" value="delete"></p>
		</form>
	</body>
</html>