<?php
/* Displays barcode after a request to create one has been made */

 include 'barcode128.php';
 echo "<br>";
 echo "<br>";
 echo "<br>";
 echo '<center><div style="height: 30%; width: 50%;">';
 echo '<p>'.bar128(stripcslashes($_POST['generate'])).'</p>';
 echo '</div></center>';
 ?>
