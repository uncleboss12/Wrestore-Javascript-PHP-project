<?php
//define("DB_SERVER", "localhost");
//define("DB_USER", "root");
//define("DB_PASSWORD", "");
//define("DB_NAME", "igmi2db");
define("DB_SERVER", "engr-db.engr.oregonstate.edu");
define("DB_USER", "wrestore");
define("DB_PASSWORD", "fTABGBC2");
define("DB_NAME", "wrestore");
$link =
  mysqli_connect (DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME, 3307)
  or die("Unable to connect to server+<br>\n");
//echo "Connected to database!<br><br>";
?>