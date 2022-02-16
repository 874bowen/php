<?php
require_once "pdo.php";
session_start();

if (! isset($_SESSION['name'])){
  die('ACCESS DENIED');
}

if ( isset($_POST['delete']) && isset($_POST['auto_id']) ) {
    $sqll = "DELETE FROM autos WHERE auto_id = :tip";
    $stmtt = $pdo->prepare($sqll);
    $stmtt ->execute(array(':tip' => $_POST['auto_id']));
    $_SESSION['success'] = "Record deleted";
    header('Location: index.php');
    return;
}
// if ( isset($_POST['delete']) && isset($_POST['auto_id']) ) {
//     $sql = "DELETE FROM autos WHERE auto_id = :zip";
//     $stmt = $pdo->prepare($sql);
//     $stmt->execute(array(':zip' => $_POST['auto_id']));
//     echo $sql;
// }

if ( ! isset($_GET['auto_id'])){
  $_SESSION['error'] = "Missing auto_id";
  header('Location: index.php');
  return;
}

$stmt = $pdo->prepare("SELECT make, model, year, mileage, auto_id FROM autos WHERE auto_id = :xyz");
$stmt->execute(array(":xyz" => $_GET['auto_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false){
  $_SESSION['error'] = "bad value for auto_id";
  header('Location: index.php');
  return;
}
?>
<title>Ivan Toroitich Bowen | Automobile Tracker</title>
<p> Confirm: Deleting <?= htmlentities($row['make']) ?> </p>
<form method="POST">
  <input type="hidden" name="auto_id" value="<?= $row['auto_id'] ?>">
  <input type="submit" name="delete" value="Delete">
  <a href="index.php">Cancel</a>
</form>
