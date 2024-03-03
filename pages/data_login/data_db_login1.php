<?php
// For LOCAL-HOST
///*
// define("DB_SERVER1_LOGIN", "localhost");//E: Server
define("DB_SERVER1_LOGIN", "localhost:3306");//E: Server
define("DB_USER1_LOGIN", "root");       //E: DB username
define("DB_PASSWORD1_LOGIN", "");       //E: DB password
define("DB_NAME1_LOGIN", "igmi2db");    //E: DB name
// define("DB_NAME1_LOGIN", "wrestore1");    //E: DB name
define("PORT1_LOGIN", 3306);            //E: DB port
//define("PORT1_LOGIN", 1900);            //E: DB port

//$link = mysqli_connecdefine("PORT1", 3606);t (DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME, 3306)
//or die("Unable to connect to server<br>\n");
////echo "Connected to database!<br><br>";
//*/
// For OSU-SERVER
define("DB_SERVER2_LOGIN", "engr-db.engr.oregonstate.edu");//E: Server
define("DB_USER2_LOGIN", "wrestore");                   //E: DB username
define("DB_PASSWORD2_LOGIN", "fTABGBC2");               //E: DB password
define("DB_NAME2_LOGIN", "wrestore");                   //E: DB name
define("PORT2_LOGIN", 3307);                            //E: DB port
//$link = mysqli_connect (DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME, 3307)
//or die("Unable to connect to server<br>\n");
//echo "Connected to database!<br><br>";
//*/
?>
