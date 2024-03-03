<?php
session_set_cookie_params(3600);//E: It changes the default expiration time of the cookie
session_start(); //E: create a session
//E: Get DATA from the "login_form" file
$user_name = $_POST['username'];//E: get the username that was input at username box
$password_i  = $_POST['password'];//E: get the password that was input at password box

//$passwordEn  = md5($_POST['password']);

//EE: import data for connection
include('../data_db_login.php');
//EE: import connection function
include('../con_local_remote_login.php');//E: it gives "$connection_login"

////$connection = mysql_connect('localhost', 'mytest_jeynon', 'onrd80on');
//$connection = mysql_connect('IN-GEOL-ESAIG06.geology.iupui.edu', 'wrestore', 'swat2011');
//if (!$connection) {
//    die('Could not connect: ' . mysql_error());
//}
//mysql_select_db("igmi2db", $connection) or die("Error selecting database");

//$query_2 = sprintf("SELECT * FROM users WHERE USERNAME='%s' AND PASSWORD='%s'",
//    mysqli_real_escape_string($connection_login,$user_name),
//	mysqli_real_escape_string($connection_login,$password));
//echo "data: ".$user_name."  pass:  ".$password_i."<br><br>";

//E: This query select data comparing 'username' and 'password'. Both must match
//$query_2 = "SELECT * FROM register WHERE USERNAME='$user_name' AND PASSWORD='$password_i'";
//E: This query select data comparing just 'username'. This is ok because duplicated-username is not allowed in Registration process
$query_2 = "SELECT PASSWORD FROM register WHERE USERNAME='$user_name'";

// Perform Query
$result = mysqli_query($connection_login,$query_2);
$rowcount = mysqli_num_rows($result);//E: It counts how many results we have
$row = mysqli_fetch_assoc($result);//E: It gives '$result' values as array
//if ($result = mysqli_query($connection_login,$query_2)){//EE: verification of 'username'
if (mysqli_num_rows($result) !== 0){//EE: verification of 'username'
    echo "This is rowcount: "."$rowcount"."<br><br>";
    echo "This is row as array: "."<br>"; print_r($row); echo "<br><br>";
    echo "This is row['password'] as associative array: "."<br>".$row['PASSWORD']."<br><br>";//E: It prints the '$row' array as array asociativo by name.

    if(password_verify($password_i,$row['PASSWORD'])){//E:verification of password
        $_SESSION['errorMsg'] = "Success........";
        echo "login !!"."<br>";
        $row = mysqli_fetch_assoc($result);
        echo "U: ".$user_name."  P: ".$password_i."  other: "."<br>";
        header('Location:login_form.php');
    }else{
        $_SESSION['errorMsg'] = "You have entered an invalid password. Please try again.";
        header('Location:login_form.php');
//        echo "NOOOOOT login...";
    }

//    if($rowcount !== 0){
////        $user_nameErr = "The username already exists"."<br>"; $valid = false;
//        echo "login !!"."<br>";
//        $row = mysqli_fetch_assoc($result);
//        echo "U: ".$user_name."  P: ".$password_i."  other: "."<br>";
//    }else{
//        echo "not login..."."<br>";
//        echo "u:  ".$user_name."  p:  ".$password_i."<br>";
//        //E: This session send a session-name with some message to the "login_form.php" page
//        $_SESSION['errorMsg'] = "The username or password does match any records. Please try again or have your username and password sent to you using the link below.";
//        header('Location:login_form.php');
//    }
}else{
    $_SESSION['errorMsg'] = "The username you entered not exist*.";
    header('Location:login_form.php');
//    echo "Wrong usermane ...";
}
///////////////////////


//if (mysql_num_rows($result)>0){
//    //login match!!! I turn their username and userID into a session variable so I can travel with it.
//    mysql_free_result($result);
//    $_SESSION['var'] = $row["USERNAME"];
//    $_SESSION['USERID'] = $row["USERID"];
//    echo 'I am in';
//    echo $_SESSION["USERID"];
//    //exit;
//} else{
//    //No Match. Kick them out to try again.
//    mysqli_free_result($result);
//    $_SESSION['errorMsg'] = "The username or password does match any records. Please try again or have your username and password sent to you using the link below.";
//    header('Location:login.php');
//    exit;
//}

//Now I am going to check to see if the model is currently running. So in other words, they are in and now do they have stuff waiting.

//$query = sprintf("SELECT * FROM users_activity WHERE USERID=%s",
//    mysql_real_escape_string($_SESSION['USERID']));
//
//// Perform Query
////$result = mysql_query($query,$connection);
//$result = mysql_query($query,$connection)  or die($query."<br/><br/>".mysql_error());
//$row = mysql_fetch_assoc($result);
//if (mysql_num_rows($result)>0){
//    //the model is still running from the last go around. Tell them to chill out
//    mysql_free_result($result);
//    echo "STUFF IN THERE";
//    header('Location:abortLoginRunning.html');
//    exit;
//} else{
//
//}
//
////I am going to  erase any instance of Vidya's writing to the event_server. if the user leaves then I quit listening
//// for this table and never erase it. This is causing the false positives and people being sent with no maps.
//$query = sprintf("DELETE FROM igami2_event_server WHERE USERID='%s'",
//    mysql_real_escape_string($_SESSION['USERID']));
//	$result = mysql_query($query,$connection);
//	mysql_free_result($result);
//
////Now I am going to check and see if they have anything sitting in newUsers///////////////////
//$query = sprintf("SELECT * FROM takefeedback WHERE USERID='%s'",
//    mysql_real_escape_string($_SESSION['USERID']));
//// Perform Query
//$result = mysql_query($query,$connection);
//// This could be supplied by a user, for example
//$row = mysql_fetch_assoc($result);
//if (mysql_num_rows($result)>0){
//    //they have stuff waiting for them. I take them to the model, tool.php
//    mysql_free_result($result);
//    $_SESSION['errorMsg'] ="";
//    echo "Thinks I have data ready in the takefeedback table";
//    header('Location:googletoolneww.php');
//    exit;
//} else {
//    // They have nothing waiting for them, it not running. They are going to select the parameters.
//    mysql_free_result($result);
//    $_SESSION['errorMsg'] ="";
//    header('Location:selectTool.php?data=0');
//    echo "Didnt pick up anything";
//    //login fail
//}

?>