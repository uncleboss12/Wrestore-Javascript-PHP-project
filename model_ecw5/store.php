<?xml version="1.0" encoding="UTF-8"?>
<?php
//E: 'store.php' gets info from 'mt_config.js' (username, tracking info, etc) to store into the DB by
//using 3 connections, and queries.
//Connection 1 '$con1' to insert information into 'users' table
//Connection 2 '$con2' gets the last user id from 'users' table and set it as a variable to create a new table with this name
//Connection 3 '$con3' to insert tracking info into a table created above in connection 2.
//
// Author: Efrain Noa-Yarasca.
// Project: WRESTORE, Oregon State University, 2019

header('Access-Control-Allow-Origin: *');
//========================================================================================
/*
// Short code to verify connection
$conexion=mysqli_connect('localhost','root','','test');
$sql="INSERT into usuarios (nombre,apellido,usuario,password) values ('MMM','Noa','mish','wilson')";
echo mysqli_query($conexion,$sql);
mysqli_close($conexion);
*/
//====================================================================================


// ------------------------- Start: 'getvar' function to get variables from 'mt_config.js' ------------------------- //
/* Gets variables from 'mt_config' javascript file either by _GET or _POST.
 * @param string $default Default value in case no value is retrieved for the variable. Defaults itself to an empty string ('').
 * @return string */
function getvar($var, $default=''){
    if (isset($_POST[$var])) {
        return trim($_POST[$var]); }
    elseif (isset($_GET[$var])) {
        return trim($_GET[$var]); }
    else {
        return trim($default); }
}
// ------------------------- End: 'getvar' function to get variables from 'mt_config.js' ------------------------- //

// -------------------------- Start: Set variables coming from 'mt_config.js' ------------------------------------- //
// We obtain the data coming from the request.
$pid = getvar('pid', '');			// Participant ID.
$name = getvar('name', '');			// Name of this 'project' (optional)
$content = getvar('content', '');	// Whole record of mouse-tracking data.
$cont_array = explode("#",$content); // Content is exploted to get as ARRAY
$login_t = getvar('login_time', '');	// Beginning of the user's session on this page
$logoff_t = getvar('logoff_time', '');	// End of the user's session on this page
//$agent = getvar('agent', '');
// -------------------------- End: Set variables coming from 'mt_config.js' --------------------------------- //


// ----------------------------- Start: Get data for connection and connection with DDB ---------------------------- //

require_once('config.php'); echo "<br>"; // GIVE A ERROR CHECK IT

//E: Set variables according to the server (Localhost, Remote server)
$host = $_SERVER['HTTP_HOST'];
if ($host == 'localhost') {
    $dbhost1 = DB_servidor1; $dbuser1 = DB_usuario1; $dbpass1 = DB_codigo1; $dbname1 = DB_nombre1; $port1 = puerto1;
}
else {
    $dbhost1 = DB_servidor2; $dbuser1 = DB_usuario2; $dbpass1 = DB_codigo2; $dbname1 = DB_nombre2; $port1 = puerto2;
}

// We open a connection to the database where everything will be stored.
$con1 = mysqli_connect($dbhost1,$dbuser1,$dbpass1,$dbname1,$port1);
$con2 = mysqli_connect($dbhost1,$dbuser1,$dbpass1,$dbname1,$port1);
$con3 = mysqli_connect($dbhost1,$dbuser1,$dbpass1,$dbname1,$port1);
// ------------------------------- End: Get data for connection and connection with DDB --------------------------- //

// ------------ Start: Insert data into 'USERS' table (connection 1) ---------//
//E: The first line insert 4 variables
$query_ins = "INSERT INTO users_w2 (pid,name,login,spent_time) VALUES ('$pid','$name','$login_t','$logoff_t');";
//E These two lines get ans insert the 'usercod'
$query_ins .= "SELECT @mid := MAX(id) AS MMMM FROM users_w2;";//E: get the maximun id value to set the 'usercod'
$query_ins .= "UPDATE users_w2 SET usercod = (CONCAT('user',@mid)) WHERE ID = @mid;";//E: insert the 'usercod'

mysqli_multi_query($con1,$query_ins);
mysqli_close($con1);
// ------------ End: Insert data into 'USERS' table (connection 1) -----------//

// ------------- Get max id value generated by 'AUTO INCREMENT' (connection 2) ---------- //
$q_maxval_id = mysqli_query($con2,"SELECT MAX(id) AS maxv FROM users_w2");//E: select the max usercod (last usercod)
$maxid = mysqli_fetch_assoc($q_maxval_id);

$last_id = $maxid["maxv"]; //echo ("Last id: ". $last_id); echo "<br>";//E: Get the last 'id' generated by auto-increment
$table_name = "user".$last_id; //E: Set the table-name to create below
echo ("table name: ". $table_name); echo "<br>";

//E: Create a table with the last 'userid'
$query_ins2 = "DROP TABLE IF EXISTS `".$table_name."`;";
$query_ins2 .= "CREATE TABLE `".$table_name."` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `usercod` varchar(20) NOT NULL DEFAULT '',
            `pid` varchar(1000) NOT NULL DEFAULT '',
            `name` varchar(1000) NOT NULL DEFAULT '',
            `time` varchar(1000) NOT NULL DEFAULT '',
            `all_act` varchar(1000) NOT NULL DEFAULT '',
            PRIMARY KEY (`id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";
mysqli_multi_query($con2,$query_ins2);
mysqli_close($con2);
//$con1->multi_query($query_ins);
// ------------ End: Insert data into 'USERS' table (connection 1) ------------//

// ------------ Start: Insert mouse track data into '$table_name' table (connection 3) ------------- //
$count = 1;
foreach ($cont_array as $row){
	$element = explode(':', $row, 2);
//	$q_insert_array = "INSERT INTO `".$table_name."` (usercod,pid,name,time,all_act) VALUES
//	('".$table_name."','".$pid."','".$name."','".$element[0]."','".$element[1]."')";
	$q_insert_array = "INSERT INTO `".$table_name."` (usercod,pid,name,time,all_act) VALUES
	('".$table_name."','".$pid."','".$name."','".$element[0]."','".$element[1]."')";
	$count = $count + 1;
	
	mysqli_query($con3,$q_insert_array);
//	$count = $count + 1;
}

//mysqli_close($con3);
//*/
// ------------ End: Insert mouse track data into '$table_name' table (connection 3) ------------- //

////E: Extra lines (old ones)
/*
	// And some additional variables.
	$error = 0;
	$errormsg = '';
	$ret = 0;
	$additional = '';
    echo ("pid 129: " . $pid); echo "<br>";
	// If we receive no pid, we complain.
	if ($pid=='')
	{
		$error = 1;
		$errormsg = 'No participant id in URL';
	}

	// If there is no content to store, we don't bother trying.
	else if ($content=='')
	{
		$error = 2;
		$errormsg = 'No tracking data to store';
	}

	// We finally try to insert. If we fail, we complain.
	else if (!$db->qInsert("insert into track (`pid`,`name`,`content`,`agent`)
            values ('$pid','$name','".$db->escape($content)."','".$db->escape($agent)."')"))
	
	
	{
		$error = 3;
		$errormsg = 'Insertion in database failed';
		$additional = $db->error();
	}

	// If we get to this point, everything went well.
	else
		$errormsg = 'OK';
    echo ("error # : " . $error); echo "<br>";
    echo ("error msm: " . $errormsg);
*/
?>
