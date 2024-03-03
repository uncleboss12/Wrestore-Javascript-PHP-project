<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
    echo "Welcome : ".$_COOKIE["cookie_1"]."<br>"."<br>";
    session_start();
//    $pid = $_SESSION['session_name'];
    echo "Welcome to WRESTORE: ".$_SESSION['session_name'];

//$_SESSION['id'] = $someID;
//$_SESSION['session_name'] = $firstname;
//$pid = $_SESSION['id'];

//    session_start();
//    if(!isset($_SESSION["user_1"])){
//        header ("Location: insert_personalInfo_form.php");
//    }
?>

<div>
    <p>This is the formr 2</p>
    <br><br>
</div>

</body>
</html>