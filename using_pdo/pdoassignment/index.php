<?php
require_once "pdo.php";
session_start();

if ( ! isset($_SESSION['name']) ) {
    die('Not logged in');
}
// if ( ! isset($_GET['email'])){
//   $_SESSION['error'] = "Missing auto_id";
//   header('Location: home.php');
//   return;
// }
$name = $_SESSION['name'];
    $stmt = $pdo->query("SELECT make, model, year, mileage, auto_id FROM autos");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<html>
<head>
<title>Ivan Toroitich Bowen | Automobile Tracker</title>
</head><body>
  <h1> Tracking Autos for  <?php echo $_SESSION['name']; ?></h1>
    <?php
    if ( isset($_SESSION['success']) ) {
    echo('<p style="color: green;">'.htmlentities($_SESSION['success'])."</p>\n");
    unset($_SESSION['success']);
    }
    ?>
<h3>Automobiles</h3>
<table border="1">
<?php


    if(sizeof($rows)>0){
      echo "<table border='1'>";
      echo "<thead><tr>";
      echo "<th>Make</th>";
      echo "<th>Model</th>";
      echo "<th>Year</th>";
      echo "<th>Mileage</th>";
      echo "<th>Action</th>";
      echo "</tr></thead>";
      foreach ( $rows as $row ) {

          echo "<tr><td>";
          echo(htmlentities($row['make']));
          echo("</td><td>");
          echo(htmlentities($row['model']));
          echo("</td><td>");
          echo(htmlentities($row['year']));
          echo("</td><td>");
          echo(htmlentities($row['mileage']));
          echo("</td><td>");

          // echo('<form method="post"><input type="hidden" ');
          // echo('name="auto_id" value="'.$row['auto_id'].'">'."\n");
          echo('<a href="edit.php?auto_id='.urlencode($row['auto_id']).'">Edit</a> / ');
          echo('<a href="delete.php?auto_id='.urlencode($row['auto_id']).'">Delete</a>  ');
          echo("\n</form>\n");
          echo("</td></tr>\n");
    }
  }
  // echo "<li>";
  // echo($row['make']);
  // echo " ";
  // echo($row['year']);
  // echo " / ";
  // echo($row['mileage']);
  // echo "</li>";


?>
</table>
<a href="add.php">Add New Entry</a> | <a href="logout.php">Logout</a>
</body>
</html>
