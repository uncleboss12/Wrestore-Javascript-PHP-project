<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<!--    <meta http-equiv="refresh" content="5;url=http://www.google.com/" />-->
<!--    <meta http-equiv="refresh" content="10;url=http://wrestore.oregonstate.edu/" />-->

    <title>Title</title>
</head>
<body>

<?php
echo "test_connection";
$connection_login = mysqli_connect("localhost:3308", "root", "", "igmi2db");
//$connection_login = new mysqli("localhost", "root", "", "mysql");
$consult = "SELECT * FROM user_list1";

$results = mysqli_query($connection_login, $consult);
$fila = mysqli_fetch_row($results);
echo "<br>";
echo $fila[0];
echo "<br>";
echo "done";

 ?>



</body>
</html>
