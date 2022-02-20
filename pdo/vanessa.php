<html>
	<head></head>
	<body>
		<p>Please Enter Your Monthly Salary and number off days</p>
		<form method="post">
			<p>Salary:<input type="number" name="salary"></p>
			<p>Off days:<input type="number" name="offd"></p>
			<p><input type="submit" value="calculate">
				<a href="<?php echo($SERVER['PHP_SELF']);?>">Refresh</a></p>
				<?php
				if (isset($_POST['salary']) && isset($_POST['offd'])){
					echo "---------------------------------------------------------------";
					echo "<p>Calculating ........</p>";
					$s = $_POST['salary'];
					$o = $_POST['offd'];
					echo "<p>Your monthly salary is $s and you were $o days off</p>";
					$no_of_days_in_Month = 30;
					$sal_per_day = $s/$no_of_days_in_Month;
					$total_sal = $s-($o*$sal_per_day);
					echo "<p>Total Salary is $total_sal</p>";
					echo "---------------------------------------------------------------";
				}
				?>
		</form>
	</body>
</html>