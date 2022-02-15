<?php
require_once "pdo.php";

session_start();

if (! isset($_SESSION['name'])){
  die('ACCESS DENIED');
}

if ( isset($_POST['delete']) && isset($_POST['profile_id']) ) {
    $sqll = "DELETE FROM profile WHERE profile_id = :tip";
    $stmtt = $pdo->prepare($sqll);
    $stmtt ->execute(array(':tip' => $_POST['profile_id']));
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

if ( ! isset($_GET['profile_id'])){
  $_SESSION['error'] = "Missing profile_id";
  header('Location: index.php');
  return;
}

$stmt = $pdo->prepare("SELECT * FROM profile WHERE profile_id = :xyz");
$stmt->execute(array(":xyz" => $_GET['profile_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false){
  $_SESSION['error'] = "bad value for profile_id";
  header('Location: index.php');
  return;
}
?>
<title>99cbf77e Ivan Toroitich Bowen | Resume Registry</title>
<p> Confirm: Deleting <?= htmlentities($row['first_name']) ?> </p>
<form method="POST">
  <input type="hidden" name="profile_id" value="<?= $row['profile_id'] ?>">
  <input type="submit" name="delete" value="Delete">
  <a href="index.php">Cancel</a>
</form>
