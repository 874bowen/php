<?php
session_start();
require_once "pdo.php";
require_once "util.php";
if(isset($_POST['cancel'])){
	header("Location: index.php");
	return;
}

$salt = 'XyZzy12*_';
$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';  // Pw is meow123 a8609e8d62c043243c4e201cbb342862

$failure = false;  // If we have no POST data

// Check to see if we have some POST data, if we do process it
if ( isset($_POST['email']) && isset($_POST['pass']) ) {
	unset($_SESSION["email"]);
	$check = hash('md5', $salt.$_POST['pass']);
	$stmt = $pdo -> prepare('SELECT user_id, name FROM users WHERE email = :em AND password = :pw');
	$stmt->execute(array(
		':em' => $_POST['email'],
		':pw' => $check
	));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ( $row !== false){
		$_SESSION['name'] = $row['name'];
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['success'] = "Logged in successfully";

		header("Location: index.php");
		return;
	}
    }

?>
<!DOCTYPE html>

<html lang = "en">

	<head>
		<meta charset = "utf-8">
		<title>Ivan Toroitich Bowen | Login Page</title>
		<?php require_once "head.php" ?>
	</head>

	<body>
		<div class = "container">
			<h1>Please Log In</h1>

			<?php flashmessages(); ?>

			<form method = "post">
				<label for = "email">Email</label>
				<input type="text" name="email" id="email"><br>
				<label for = "id_1723">Password</label>
				<input type="password" name="pass" id="id_1723"><br>
				<input type="submit" value="Log In" onclick="return doValidate();">
				<input type="submit" name="cancel" value="Cancel">
			</form>

			<script type="text/javascript">
				function doValidate()
				{
					console.log("Validating...");
					try{
						addr = document.getElementById("email").value;
						pw = document.getElementById("id_1723").value;
						console.log("Validating addr = " + addr + " pw = " + pw);
						if(addr == null || addr == "" || pw == null || pw == "")
						{
							alert("Both fields must be filled out");
							return false;
						}
						if(addr.indexOf("@") == -1)
						{
							alert("Invalid email address");
							return false;
						}
						return true;
					}
					catch(e)
					{
						return false;
					}

					return false;
				}
			</script>
		</div>
	</body>

</html>