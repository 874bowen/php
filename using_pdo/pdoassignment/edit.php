<?php
require_once "pdo.php";
session_start();

if (! isset($_SESSION['name'])){
  die('ACCESS DENIED');
}

if(isset($_POST['make']) && isset($_POST['model']) && isset($_POST['year']) && isset($_POST['mileage'])){
    $sql = "UPDATE autos SET make = :make, model = :model, year = :year, mileage = :mileage WHERE auto_id = :auto_id";
    $stmt = $pdo -> prepare($sql);
    $stmt->execute(array(
        ':make' => $_POST['make'],
        ':model' => $_POST['model'],
        ':year' => $_POST['year'],
        ':mileage' => $_POST['mileage'],
        ':auto_id' => $_GET['auto_id']
    ));
    $_SESSION['success'] = 'Record edited';
    header('Location: index.php');
    return;
}
if ( ! isset($_GET['auto_id'])){
  $_SESSION['error'] = "Missing auto_id";
  header('Location: index.php');
  return;
}


$stmt = $pdo->prepare("SELECT make, model, year, mileage, auto_id FROM autos WHERE auto_id = :xy");
$stmt->execute(array(":xy" => $_GET['auto_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false){
  $_SESSION['error'] = "bad value for auto_id";
  header('Location: index.php');
  return;
}
$mk = htmlentities($row['make']);
$md = htmlentities($row['model']);
$yr = htmlentities($row['year']);
$ml = htmlentities($row['mileage']);
$auto_id = $row['auto_id'];

?>
<title>Ivan Toroitich Bowen | Automobile Tracker</title>
<p>Edit Auto</p>
<form method="post">
  <p>Make: <input type="text" name="make" value="<?= $mk ?>"></p>
  <p>Model: <input type="text" name="model" value="<?= $md ?>"></p>
  <p>Year: <input type="text" name="year" value="<?= $yr ?>"></p>
  <p>mileage: <input type="text" name="mileage" value="<?= $ml ?>"> </p>
  <input type="hidden" name="auto_id" value="<?= $auto_id ?>">
  <p><input type="submit" value="Save"/>
  <a href="index.php">Cancel</a></p>

</form>
