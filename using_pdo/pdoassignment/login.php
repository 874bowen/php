<?php
session_start();

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
	if (strpos($_POST['email'], '@') == false) {
		$_SESSION['error'] = "Email must have an at-sign (@)";
		header("Location: login.php");
		return;
	}
    else{
    	if ( strlen($_POST['email']) < 1 || strlen($_POST['pass']) < 1 ) {
        $_SESSION['error'] = "User name and password are required";
				header("Location: login.php");
				return;
    }
    else {
        $check = hash('md5', $salt.$_POST['pass']);
        if ( $check == $stored_hash ) {
						$_SESSION['success']= "You are logged-in";
						$_SESSION['name'] = $_POST['email'];
            // Redirect the browser to game.php
            header("Location: index.php");
            return;
        } else {
            $_SESSION['error']= "Incorrect password";
						header("Location: login.php");
						return;
        }
    }
   }

}
?>
<!DOCTYPE html>
<html>
	<head>
		<?php require_once "pdo.php"; ?>
		<title>Ivan Toroitich Bowen's Login Page</title>
	</head>
	<body>
		<h1>Please Log In</h1>

		<?php
		// Note triple not equals and think how badly double
		// not equals would work here...
		if ( isset($_SESSION['error']) ) {
    echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
    unset($_SESSION['error']);
 		}

		?>
		<form method="POST">
		<p><label for="email">User Name</label>
		<input type="text" name="email" id="email"><br/></p>
		<p><label for="id_1723">Password</label>
		<input type="password" name="pass" id="id_1723"><br/></p>
		<input type="submit" value="Log In">
		<input type="submit" name="cancel" value="Cancel">
		</form>
		<p>
	</body>
</html>
