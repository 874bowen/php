<!DOCTYPE html>
<html>
<head>
<title>Ivan Bowen MD5 Cracker</title>
</head>
<body>
<h1>MD5 Cracker</h1>
<p>This is an application that takes an md5 hash of a four-digit pin string and attempts to recover the original pin.</p>
<pre>
  Debug Output:
  <?php
  $goodtext = "Not Found";
  if ( isset($_GET['md5']) ) {
    $time_pre = microtime(true);
    $md5 = $_GET['md5'];

    $digts = "1234567890";
    $show = 15;

    for ($i = 0; $i<strlen($digts); $i++ ) {
      $dig1 = $digts[$i];

      for ($j = 0; $j<strlen($digts); $j++ ) {
        $dig2 = $digts[$j];

        for ($k = 0; $k<strlen($digts); $k++ ) {
          $dig3 = $digts[$k];

          for ($l = 0; $l<strlen($digts); $l++ ) {
            $dig4 = $digts[$l];

            $try = $dig1.$dig2.$dig3.$dig4;

            $check = hash('md5', $try);
            if ( $check == $md5 ){
              $goodtext = $try;
              break;
            }

            if( $show > 0 ) {
              print "$check $try\n";
              $show = $show - 1;
            }
          }
        }
      }
    }

    $time_post = microtime(true);
    print "Elapsed time: ";
    print $time_post-$time_pre;
    print "\n";






  }
  ?>
</pre>
<p>Original Digits: <?= htmlentities($goodtext); ?></p>
<form>
  <input type="text" name="md5" size="60" />
  <input type="submit" value="Crack MD5" />
</form>
</body>
</html>
