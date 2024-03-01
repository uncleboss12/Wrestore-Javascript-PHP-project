<?php
// ------------ NEW CONNECTION ------ //
$host = $_SERVER['HTTP_HOST'];
if ($host == 'localhost') {//E: For localhost
    $servername = DB_SERVER1; $username = DB_USER1; $password = DB_PASSWORD1; $dbname = DB_NAME1; $port = PORT1;
} else {//E: For OSU Server  E: elseif for more servers
    $servername = DB_SERVER2; $username = DB_USER2; $password = DB_PASSWORD2; $dbname = DB_NAME2; $port = PORT2;
}
// Create connection
$connection = new mysqli($servername, $username, $password, $dbname, $port);
// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
// ----------------------
?>