<?php
session_start();

if (! isset($_SESSION['pizza'])){
	echo "<p>Session is empty</p>\n";
	$_SESSION['pizza'] = 0;
} else if( $_SESSION['pizza'] < 3){
	$_SESSION['pizza'] = $_SESSION['pizza'] +1; 
	echo "<p>Added one ....</p>\n";
}
else{
	session_destroy();
	session_start();
	echo "<p>Session restarted</p>\n";
}
?>
<p><a href="sess.php">Click me!!</a></p>
<p>Our session id is: <?php echo(session_id()); ?></p>
<pre>
	<?php print_r ($_SESSION)?>
</pre>