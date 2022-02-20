<?php 
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=misc','fred','zap');
$stmt = $pdo->query("SELECT name, email, password FROM users");
echo '<table border="1">';
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	echo "<td><td>";
	echo ($row['name']);
	echo ("</td><td>");
	echo ($row['email']);
	echo ("</td><td>");
	echo ($row['password']);
	echo ("</td></tr>\n");

}
echo "</table>\n";
?>