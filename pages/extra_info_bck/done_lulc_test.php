<?php
session_start();
?>

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
echo "Welcome : ".$_COOKIE["cookie_1"]."<br>"."<br>";
//session_start();
//    $pid = $_SESSION['session_name'];
echo "Hi: ".$_SESSION['lulc_test_name'];
echo "<h3>Welcome to WRETORE</h3>";
echo "We're super excited to have you on board... !";
//$_SESSION['id'] = $someID;
//$_SESSION['session_name'] = $firstname;
//$pid = $_SESSION['id'];

//    session_start();
//    if(!isset($_SESSION["user_1"])){
//        header ("Location: insert_personalInfo_form.php");
//    }
?>

<div>
    <p>This is a new page: lulc_done.php</p>
    <h5 style="display: none">In 10 seconds the "WRESTORE" page will be opened again</h5>
<!--    <a href="http://wrestore.oregonstate.edu/">Return to Home-page</a>-->
    <a href="../../index.html">Return to Home-page</a>
    <br><br>
</div>

</body>
</html>