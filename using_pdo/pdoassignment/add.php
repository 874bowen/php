<?php

session_start();

if ( ! isset($_SESSION['name']) ) {
    die('Not logged in');
}
$name = $_SESSION['name'];
require_once "pdo.php";

if ( isset($_POST['addnew']) && isset($_POST['make']) && isset($_POST['year']) && isset($_POST['mileage']) && isset($_POST['model'])) {
  $make = $_POST['make'];
  if (strlen($make) > 1 ) {
    if (is_numeric($_POST['year']) && is_numeric($_POST['mileage'])) {
      $sql = "INSERT INTO autos (make, model, year, mileage)
                VALUES (:make, :model, :year, :mileage)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(
          ':make' => htmlentities($_POST['make']),
          ':model' => htmlentities($_POST['model']),
          ':year' => htmlentities($_POST['year']),
          ':mileage' => htmlentities($_POST['mileage'])));
      } else {
        $_SESSION['error'] = "Mileage and year must be numeric.";
        header("Location: add.php");
        return;
      }
    } else {
      $_SESSION['error'] = "All fields are required";
      header("Location: add.php");
      return;
    }
    $_SESSION['success'] = "Record added";
    header("Location: index.php?who=".urlencode($name));
    return;
}
?>

<html>
<head>
<title>Ivan Toroitich Bowen | Automobile Tracker</title>
</head><body>
<h1> Tracking Autos for  <?php echo $name; ?></h1>
  <?php
  if ( isset($_SESSION['error']) ) {
  echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
  unset($_SESSION['error']);
  }
  ?>
<p>Add A New Auto</p>
<form method="post">
<p>Make:
<input type="text" name="make" size="40"></p>
<p>Model:
<input type="text" name="model" size="40"></p>
<p>Year:
<input type="text" name="year"></p>
<p>Mileage:
<input type="text" name="mileage"></p>
<p><input type="submit" value="Add New" name="addnew" /></p>
<a href="index.php">Cancel</a>
</form>
