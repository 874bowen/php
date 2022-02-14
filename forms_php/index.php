<?php
$oldguess =isset($_POST['account']) ? $_POST['account'] : '';
?>
<p>Many field types... </p>
<form method="post">
  <!-- "/><hr/><input type ="submit" value="monster //XSS -->
  <p><label for="inp01">Account:</label>
    <input type="text" name="account" id="inp01" size="40" value="<?= htmlentities($oldguess) ?>" /></p>
  <p><label for="inp02">Password:</label>
    <input type="password" name="pw" id="inp02" size="40" ></p>
  <p><label for="inp03">Nick name:</label>
    <input type="text" name="nick" id="inp03" size="40"></p>
    <input type="submit"/>
</form
<pre>
$_POST:
<?php
  print_r($_POST);
?>
</pre>

<?= $oldguess ?>
<?php echo($oldguess); ?>
