<?php
// http://localhost/wrestoreBCK1/index.html          For local host access
// ------------ NEW CONNECTION ------ //
$host = $_SERVER['HTTP_HOST'];
if ($host == 'localhost') {//E: For localhost
    $servername = DB_SERVER1_LOGIN; $username = DB_USER1_LOGIN; $password = DB_PASSWORD1_LOGIN;
    $dbname = DB_NAME1_LOGIN; $port = PORT1_LOGIN;

    //E: Tables
    $users_register = "user_list"; // $users_register = "register";
}
else {//E: For OSU Server  E: elseif for more servers
    $servername = DB_SERVER2_LOGIN; $username = DB_USER2_LOGIN; $password = DB_PASSWORD2_LOGIN;
    $dbname = DB_NAME2_LOGIN; $port = PORT2_LOGIN;
    //E: Tables
    $users_register = "user_list"; // $users_register = "register";
}
// Create connection
// $connection_login = new mysqli($servername, $username, $password, $dbname, $port);
$connection_login = mysqli_connect($servername, $username, $password, $dbname, $port);
// Check connection
if ($connection_login->connect_error) {
    die("Connection Login DB failed: " . $connection_login->connect_error);
}
// ----------------------
?>
