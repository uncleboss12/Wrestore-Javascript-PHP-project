<?php
session_start();
?>

<!DOCTYPE html>
<!--  http://localhost/wrestoreBCK1/index.html  -->
<!--[if IE 6]-->
<html id="ie6" lang="en-US">
<!--[if IE 7]-->
<html id="ie7" lang="en-US">
<!--[if IE 8]-->
<html id="ie8" lang="en-US">
<!--[if !(IE 6) | !(IE 7) | !(IE 8)]-->
<html lang="en-US">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Register | Wrestore</title>

    <!-- Styles -->
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <!--    <link rel="stylesheet" type="text/css" media="all" href="http://wrestore.iupui.edu/wp-content/themes/wrestore/style.css" />-->
    <link rel="stylesheet" type="text/css" href="../css/style1.css"/>
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Oswald:400,300'>

    <style>
        .error {color: #FF0000;}
    </style>
</head>

<body>
<!--[if lte IE 6]><script src="js/ie6/warning.js"></script><script>window.onload=function(){e("js/ie6/")}</script><![endif]-->
<div class="wrapper">
    <!-- row 1/5: WRESTORE header -->
    <div class="row row-1">
        <div id="siteHeader">
<!--        <header id="siteHeader">-->

            <div>
                <hgroup>
                    <h1><a href="/">WRESTORE</a></h1>
                    <h2>Watershed REstoration using Spatio-Temporal Optimization of REsources</h2>
                    <h3>Visualize & Design Your Watershed Landscape</h3>
                </hgroup>
            </div>

<!--        </header>-->
        </div>
    </div>
    <!-- end row 1: Main Site Header -->

    <!-- row 2/5: MENU Nav-bar -->
    <div id="navRow" class="row row-2"> <!-- Nav Row -->
        <nav id="access" role="navigation">
            <div class="menu"><div class="menu">
                    <ul>
<!--                        <li class="page_item page-item-29"><a href="http://wrestore.oregonstate.edu/">Return to Mainpage</a></li>-->
                        <li class="page_item page-item-29"><a href="../../index.html">Return to Mainpage</a></li>
                    </ul>
                </div></div>
        </nav>
        <!--        <nav id="loginNav"><a href="register.html">Register</a> | <a href="#">Login</a></nav>-->
    </div><!-- End Nav Row -->

    <header id="pageHeader">
        <h1>Register</h1>
    </header>
    <p style="display: none">If you live or farm in the Eagle Creek watershed, then your farm would be in one of the smaller watersheds (also, called sub-basins) within the Eagle Creek Watershed. Use the link to the map provided <a href="https://www.google.com/fusiontables/DataSource?snapid=S720810vz1C" target="_blank">here</a> to find your Sub-BasinID. Put the number in the field below” with “If you live or farm in the Eagle Creek watershed, then your farm lies in one of the smaller watersheds (also, called sub-basins) within the Eagle Creek Watershed. Please use the link to the map provided <a href="https://www.google.com/fusiontables/DataSource?snapid=S720810vz1C" target="_blank">here</a> to find your <em>Subbasin</em> ID.</p>
<!--    <p><em>Disclaimer: Please note that any information you provide to us via this website is kept confidential and not shared with anyone else. Only the primary members of the research team have access to this data. If any results from your participation are presented in research reports and publications, they will be presented in aggregate form and will be free of any identifiers. If you have any questions or concerns, please do not hesitate to contact us.</em></p>-->
    <div id="personal_info" class='gform_page_fields'>
<!--        <h3 class='gf_progressbar_title'>Step 1 of 3</h3>-->
        <ul id='gform_fields_1' class='gform_fields top_label form_sublabel_below description_above'>
            <li id='field_1_39' class='gfield gfield_html gfield_html_formatted gfield_no_follows_desc field_sublabel_below field_description_above' >
                <h2>Personal Information</h2>
            </li>

            <p style="margin-bottom: 5px"><span class="error">* required field</span></p>
        </ul>
    </div>
    <?php
    // define variables and set to empty values
    //    $nameErr = $emailErr = $genderErr = $websiteErr = "";
    $firstnameErr = $lastnameErr = $emailErr = $user_nameErr = $pass1Err = $pass2Err = $pass12Err = "";
    //    $name = $email = $gender = $comment = $website = "";
    $firstname = $lastname = $email = $user_name = $pass1 = $pass2 = "";

    //E: It does not execute when it is upload first time
    //if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //E: It does not execute if "submit" was not clicked i.e. the first time is not executed
    if (isset($_POST["submit"])){
        $valid = true; //

        //E: ---------- FIRST NAME ---------
        // check if firstname input-box is empty. //EE: https://www.w3schools.com/php/php_form_complete.asp
        if (empty($_POST["firstname"])) {
            $firstnameErr = "First name is required"; $valid = false;
        } else {
            $firstname = test_input($_POST["firstname"]);
            // check if firstname starts with dash
            if (substr($firstname,0,1) === '_' or substr($firstname,0,1) === '-') {
//                $firstnameErr = '<p>Dash is not allowed at the beginning of the name</p>';
                $firstnameErr = "Dash is not allowed at the beginning of the First name"; $valid = false;
            } else {
                // check if firstname only contains letters and whitespace
                //E: it allows firstnames starting with letters (uppercase or lowercase but not dashes) REf: https://www.phpjabbers.com/php-validation-and-verification-php27.html
                if (!preg_match("/^[a-zA-Z][a-zA-Z -]+$/",$firstname)) {
//                $firstnameErr = "Only letters and white space allowed";
                    $firstnameErr = "Only letters, dashes, and white space allowed"; $valid = false;
                }
            }
        }

        //E: ---------- LAST NAME ---------
        if (empty($_POST["lastname"])) {
            $lastnameErr = "Last Name is required"; $valid = false;
        } else {
            $lastname = test_input($_POST["lastname"]);
            // check if lastname starts with dash
            if (substr($lastname,0,1) === '_' or substr($lastname,0,1) === '-') {
                $lastnameErr = "Dash is not allowed at the beginning of the lastname"; $valid = false;
            } else {
                // check if lastname only contains letters and whitespace
                //E: it allows names starting with letters (uppercase or lowercase but not dashes) REf: https://www.phpjabbers.com/php-validation-and-verification-php27.html
                if (!preg_match("/^[a-zA-Z][a-zA-Z -]+$/",$lastname)) {
                    $lastnameErr = "Only letters, dashes, and white space allowed"; $valid = false;
                }
            }
        }

        //E: ---------- EMAIL ---------
        if (empty($_POST["email"])) {
            $emailErr = "Email is required"; $valid = false;
        } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format"; $valid = false;
            }
        }

        //E: ---------- USER-NAME ---------
        if (empty($_POST["user_name"])) {
            $user_nameErr = "username is required"; $valid = false;
        } else {
            $user_name = test_input($_POST["user_name"]);
            // check if user_name address is well-formed
            if (!preg_match("/^[0-9a-zA-Z_]{5,}$/",$user_name)) {
//                $user_nameErr = '<p class="errText">User must* be bigger that 5 chars and contain only digits, letters and underscore</p>';
                $user_nameErr = "Minimum 5 characters. Letters, numbers and dashes are allowed"; $valid = false;
            } else{
//                $user_nameErr = "Checking existing..."; $valid = false;
//                include ('../data_login/data_db_login.php');
                include_once ('../data_login/data_db_login1.php');
                //EE: import connection function. Give: $connection_login
                include_once ('../data_login/connect_local_remote_login1.php');//E: it gives "$connection_login"

//                $q1 = "SELECT USERNAME FROM REGISTER WHERE USERNAME = '$user_name'";
                $q1 = "SELECT USERNAME FROM $users_register WHERE USERNAME = '$user_name'";
                if ($result=mysqli_query($connection_login,$q1)){
                    $rowcount=mysqli_num_rows($result);
//                    $user_nameErr = "Checking existing...".$rowcount."<br>"; $valid = false;
                    if($rowcount !== 0){
                        $user_nameErr = "The username already exists*"; $valid = false;
                    }
                }
                //mysqli_close($connection_login);//E: Don't close it. Below there is another query
            }
        }

        //E: ---------- PASSWORD 1 ---------
        if (empty($_POST["pass1"])) {
            if(empty($_POST["pass2"])){
                $pass1Err = "Password and Password confirmation are required."; $valid = false;
            } else{
                $pass1Err = "Password is required.&nbsp &nbsp "; $valid = false;
            }
        } else {
            $pass1 = test_input($_POST["pass1"]);
            // check if password address is well-formed
            if (!preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/",$pass1)) {
                $pass1Err = "Minimum 8 characters and must contain at least one lower case letter, one upper case letter and one number.";
                $valid = false;
            }
        }

        //E: ---------- PASSWORD 2 ---------
        if (empty($_POST["pass2"])) {
            if(empty($_POST["pass1"])){
                $pass2Err = ""; $valid = false;
            } else{
                $pass2Err = " Password confirmation is required."; $valid = false;
            }
        } else {
            if (empty($_POST["pass1"])){
                $pass12Err = ""; $valid = false;
            } else {
                $pass2 = test_input($_POST["pass2"]);
                // check if password address is well-formed
//            if (!preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/",$pass2)) {
////                $pass2Err = "Minimum 8 characters and must contain at least one lower case letter, one upper case letter and one digit";
//                $valid = false;
//            } else{
                if ($_POST["pass1"] !== $_POST["pass2"]) {
//            echo "great";// failed!
                    $pass12Err = "Your passwords do not match"; $valid = false;
                } else{//E: When the code arrives here is because password input is RIGHT
                    //E: Encrypt password
                    $encrypted_pass = password_hash($pass1,PASSWORD_DEFAULT,array("cost"=>12));
                }
                //        else {echo "fail";}// success :(
//            }
            }

        }


////E: Checking PASSWORD 1 and PASSWORD 2 in one time
//        if (empty($_POST["pass1"])){
//            $pass1Err = "Password and password-confirmation are required"; $valid = false;
//        }
//        else{
////            echo "hello";//E: For test
//            if (empty($_POST["pass2"])){
//                $pass2Err = "password-confirmation is required"; $valid = false;
//            }
//            else {
//                $pass1 = test_input($_POST["pass1"]);
//                if (!preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/",$pass1)) {
//                    $pass1Err = "Minimum 8 characters and must contain at least one lower case letter, one upper case letter and one number";
//                    $valid = false;
//                }
//                else {
//                    if ($_POST["pass1"] !== $_POST["pass2"]){
//                        $pass12Err = "Your passwords do not match"; $valid = false;
//                    } else {
//                        //E: Encrypt password
//                        $encrypted_pass = password_hash($pass1,PASSWORD_DEFAULT,array("cost"=>12));
//                    }
//                }
//            }
//        }




    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <?php
    //E: This PHP.file imports the form for personal information, from "personal_info_form.html"
    // include ("personal_info_form.html");
    if(empty($valid)){
        include ("personal_info_form.html");
    }else{
        if (!$valid==true){
            include ("personal_info_form.html");
        }else{//E: insert read data into the DB MySQL
//                                        session_start();
//            echo "User registered"."<br><br>";

//            //E: Turned off because above it was already called by 'include_once'
//            include ('../data_login/data_db_login1.php');
//            //E: Turned off because above it was already called by 'include_once'
//            // E: Give: "$connection_login"
//            include ('../data_login/connect_local_remote_login1.php');//E: Turned off because above it was already called
            //echo $firstname."<br>";//E: For checking

            $query_insert_1 = "INSERT INTO $users_register (FIRSTNAME, LASTNAME, EMAIL, USERNAME, PASSWORD,REG_DATE)
VALUES ('$firstname', '$lastname', '$email', '$user_name', '$encrypted_pass',NOW())";

            $result = mysqli_query($connection_login, $query_insert_1);

            //E: Create a Cookie and Session
//            setcookie("cookie_1","This message was set by a REGISTER cookie");
//            session_start();
            $_SESSION['first_name'] = $firstname;
            $_SESSION['username'] = $user_name;
            //EE: This line send the current page to "registry_done.php" page (FIRST way to send to it)
//            header('Location:done_personal_info.php');//E: It moves the "done_personal_info.php" (First way)

            echo "name:   ".$firstname."<br>";//E: For testing
            echo "last-name:   ".$lastname."<br>";//E: For testing
            echo "email:   ".$email."<br>";//E: For testing
            echo "username:   ".$user_name."<br>";//E: For testing
            // echo "password:   ".$pass1."<br>";//E: For testing
            echo "Encrypted-password:   ".$encrypted_pass."<br>";//E: For testing
            echo "Table:   ".$users_register."<br>";//E: For testing
            echo "<br>";
//            echo "Server:  ".$servername."<br>";
//            echo "username DB:  ".$username."<br>";
//            echo "pass DB:  ".$password."<br>";
//            echo "DB Name:  ".$dbname."<br>";
//            echo "DB Port:  ".$port."<br>";
//            echo "table name:   ".$users_register."<br>";//E: For testing


            //EE: This line send the current page to "done_personal_info.php" page (SECOND way to send to it)
            // --------------- EE: TURN OFF it for TEST  --------------- //
            echo("<script>location.href = 'done_register.html';</script>");//E: It moves the "done_personal_info.php" (Second way)
            // Turn-On this line for qualtrics
            // echo("<script>location.href = 'https://oregonstate.qualtrics.com/jfe/form/SV_6zKOMwf9rrYqVhz';</script>");//E: It moves to Qualitrics survey
           // echo("<script>location.href = 'registry_done_test.php';</script>");//E: For test values (Second way)
        }
    }

    //E: It closes the connection if it was opened
    if(!empty($connection_login)){
        mysqli_close($connection_login);//E: We close the connection after the 2 queries
    }

    ?>
    <div class="row mainFrameRightBck" id="mainFrame">
        <div id="mainCol">
        </div><!-- end main content column -->

        <!-- Right Side Column (GET INVOLVED) -->
        <div id="sideCol" style="display: none">
            <div class="textwidget"><h1>Get Involved</h1>
                <p>We provide web-based tools for visualizing watershed and designing land use and runoff management alternatives on the landscape.</p>
                <div class="barButton"><a href="/visualize-design/how-it-works/">How does Wrestore work?</a></div>
                <div class="barButton"><a href="/partners/">Our Team</a></div>
                <div class="barButton"><a href="/resources/">Learn about our tools</a></div>
                <div class="barButton"><a href="/contact/">Questions? Contact us</a></div>
            </div>
        </div>
    <div class="clear"></div>

    </div>
    <!-- end mainFrame -->

    <div class="row footer">
        <div id="sponsorsCon">
            <h2>Partners</h2>
            <!--            <a href="http://oregonstate.edu/" target="_blank"><img src="http://wrestore.iupui.edu/wp-content/themes/wrestore/images/logoOsu.gif" width="200" height="76" alt="Oregon State University" class="sponsorsLogos"></a>-->
            <a href="http://oregonstate.edu/" target="_blank"><img src="../img/OSU_logo/OSU_horizontal_2C_O_over_B.png" width="220" height="76" alt="Oregon State University" class="sponsorsLogos"></a>
            <a href="http://www.iupui.edu/" target="_blank"><img src="../img/IUPUI_logo/iu_logo_tr3_1500x500.gif" width="227" height="76" alt="IUPUI" class="sponsorsLogos"></a>
            <a href="http://www.nsf.gov/" target="_blank"><img src="http://wrestore.iupui.edu/wp-content/themes/wrestore/images/logoNsf.gif" alt="NSF" width="75" height="76" class="sponsorsLogos"></a>
        </div><!-- end sponsorsCon -->
        <div id="utilityCon">
            <!--            <div class="contactLinks"><a href="/">Home</a> | <a href="http://wrestore.iupui.edu/contact/">Contact</a> | <a href="http://wrestore.iupui.edu/model/login.php">Login</a></div>-->
            <div class="connectCon"></div>
            <div class="copyright">&copy; WRESTORE - a NSF funded project</div>
        </div>
    </div>

</div><!-- end Wrapper -->

<!--<script type='text/javascript' src='http://wrestore.iupui.edu/wp-includes/js/comment-reply.min.js?ver=4.3.19'></script>-->
<!--<script type='text/javascript' src='../wp-includes/js/comment-reply.min.js?ver=4.3.19'></script>-->

<!--<script>-->
<!--    function myFunction(){-->
<!--        var personal_information = document.getElementById("personal_info");-->
<!--        personal_information.style.display = "none";-->
<!--        var land_information = document.getElementById("gform_page_1_2");-->
<!--        land_information.style.display = "block";-->
<!--        // alert("hello");-->
<!--    }-->
<!--</script>-->

</body>
</html>
