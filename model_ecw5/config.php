<?php
/* Contains Database parameters.*/

//// For LOCAL-HOST
//// Host (usually 'localhost') //Database name //Username. //Password.
//$dbhost1 = 'localhost';
//$dbuser1 = 'root';
//$dbpass1 = '';
//$dbname1 = 'test';
//$port1 = 3306;

define("DB_servidor1", "localhost");
define("DB_usuario1", "root");
define("DB_codigo1", "");
//define("DB_nombre1", "test");//E: Use this table for tests to not overload 'igmi2db'
define("DB_nombre1", "igmi2db");
define("puerto1", 3306);
//
////echo ("hello config.php");//E: For test
//
// For OSU-SERVER
define("DB_servidor2", "engr-db.engr.oregonstate.edu");
define("DB_usuario2", "wrestore");
define("DB_codigo2", "fTABGBC2");
define("DB_nombre2", "wrestore");
define("puerto2", 3307);

?>