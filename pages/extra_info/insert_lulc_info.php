<?php
session_start();
//error_reporting(0);
if(!isset($_SESSION['user_name'])){
    header("Location:../login/login_check.php");
}
$user_name_i = $_SESSION['user_name'];
//echo $user_name_i;//E: For test
?>
<!DOCTYPE html>
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
            <div class="menu">
                <div class="menu">
                    <ul>
                        <!--                        <li class="page_item page-item-29"><a href="http://wrestore.oregonstate.edu/">Home Page</a></li>-->
                        <li class="page_item page-item-29"><a href="http://wrestore.oregonstate.edu/">Return to Mainpage</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--        <nav id="loginNav"><a href="register.html">Register</a> | <a href="#">Login</a></nav>-->
    </div><!-- End Nav Row -->

    <header id="pageHeader">
        <h1>Register</h1>
    </header>
<!--    <p>If you live or farm in the Eagle Creek watershed, then your farm would be in one of the smaller watersheds (also, called sub-basins) within the Eagle Creek Watershed. Use the link to the map provided <a href="https://www.google.com/fusiontables/DataSource?snapid=S720810vz1C" target="_blank">here</a> to find your Sub-BasinID. Put the number in the field below” with “If you live or farm in the Eagle Creek watershed, then your farm lies in one of the smaller watersheds (also, called sub-basins) within the Eagle Creek Watershed. Please use the link to the map provided <a href="https://www.google.com/fusiontables/DataSource?snapid=S720810vz1C" target="_blank">here</a> to find your <em>Subbasin</em> ID.</p>-->
<!--    <p><em>Disclaimer: Please note that any information you provide to us via this website is kept confidential and not shared with anyone else. Only the primary members of the research team have access to this data. If any results from your participation are presented in research reports and publications, they will be presented in aggregate form and will be free of any identifiers. If you have any questions or concerns, please do not hesitate to contact us.</em></p>-->
    <p>For Eagle Creek Watershed (ECW), use this <a href="https://www.google.com/fusiontables/DataSource?snapid=S720810vz1C" target="_blank">link</a> to open the ECW map and find your Sub-Basin ID.
        Put the <b>ID</b> number in the field below.
        <br>
        For Dairy McKay Watershed (DMW), use this <a href="../../maps_feature/map_dmw_sb.html" target="_blank">link</a> to open the DMW map and find your Sub-Basin ID.
        Put the <b>ID</b> number in the field below.
    </p>

    <div id="personal_info" class='gform_page_fields'>
        <h3 class='gf_progressbar_title' style="display: none">Step 1 of 3</h3>
        <ul id='gform_fields_1' class='gform_fields top_label form_sublabel_below description_above'>
            <li id='field_1_39' class='gfield gfield_html gfield_html_formatted gfield_no_follows_desc field_sublabel_below field_description_above' >
                <h2>Land Information</h2>
            </li>

            <p><span class="error">* required field</span></p>

        </ul>
    </div>
    <?php
    // define variables and set to empty values
//    $genderErr = $land_q1_Err = $land_q2_Err = $land_q3_Err = $land_q4_Err = $land_q5_Err = $land_q5b_Err = $land_q6_Err = "";
    $land_q1_Err = $land_q2_Err = $land_q3_Err = $land_q4_Err = $land_q5_Err = $land_q5b_Err = $land_q6_Err = "";
//    $firstnameErr = $lastnameErr = $emailErr = $user_nameErr = $pass1Err = $pass2Err = $pass12Err = "";

//    $gender = $land_q1 = $land_q2 = $land_q3 = $land_q4 = $land_q5 = $land_q5b = $land_q6 = "";
    $land_q1 = $land_q2 = $land_q3 = $land_q4 = $land_q5 = $land_q5b = $land_q6 = "";
//    $firstname = $lastname = $email = $user_name = $pass1 = $pass2 = "";

    //E: It does not execute when it is upload first time
    //if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //E: It does not execute if "submit" was not clicked i.e. the first time is not executed
    if (isset($_POST["submit"])) {
        $valid = true; //
        //E: ---------- QUESTION-1 ------------
        // check if firstname input-box is empty. //EE: https://www.w3schools.com/php/php_form_complete.asp
        if (empty($_POST["land_q1"])) {
            $land_q1_Err = "This is required"; $valid = false;
        } else {
            $land_q1 = test_input($_POST["land_q1"]);
        }

        //E: ---------- QUESTION-2 ---------
        if ($_POST["land_q2"]=="") {
            //$land_q2 = ($_POST["land_q2"]);
            $land_q2_Err = "This field is required"; $valid = false;
        } elseif ($_POST["land_q2"]=='0'){
            $land_q2 = ($_POST["land_q2"]);
//            $land_q2_Err = "You selected you watershed is not located in the ECW"; $valid = false;
        } else {
            // $land_q2 = test_input($_POST["land_q2"]);
            $land_q2 = ($_POST["land_q2"]);
            // check if user_name address is well-formed
            // if (!preg_match("/^\d(?:,\d)*$/",$land_q2)) {//E: it allos just one digit numbers
            if (!preg_match("/^[0-9,]+$/",$land_q2)) {
                // if (!preg_match('~^\d+(,\d+)?$~',$land_q2)) {
                $land_q2_Err = "Only numbers beetwen commas allowed. Like: 5,12,25"; $valid = false;
            }
        }

        //E: ---------- QUESTION-3 ---------
        if ($_POST["land_q3"]=="") {
            $land_q3_Err = "This field is required"; $valid = false;
        } elseif ($_POST["land_q3"]=='0'){
            $land_q3 = ($_POST["land_q3"]);
//            $land_q3_Err = "You selected you watershed is not located in the ECW"; $valid = false;
        } else {
            // $land_q2 = test_input($_POST["land_q2"]);
            $land_q3 = ($_POST["land_q3"]);
            // check if user_name address is well-formed
            if (!preg_match("/^[0-9,]+$/",$land_q3)) {
                $land_q3_Err = "Only numbers beetwen commas are allowed. Like: 5,12,25"; $valid = false;
            }
        }

        //E: ---------- QUESTION-4 ---------
        if ($_POST["land_q4"]=="") {
            $land_q4_Err = "This field is required"; $valid = false;
        } elseif ($_POST["land_q4"]=='0'){
            $land_q4 = ($_POST["land_q4"]);
//            $land_q4_Err = "You selected you watershed is not located in the ECW"; $valid = false;
        } else {
            // $land_q2 = test_input($_POST["land_q2"]);
            $land_q4 = ($_POST["land_q4"]);
            // check if user_name address is well-formed
            if (!preg_match("/^[0-9,]+$/",$land_q4)) {
                $land_q4_Err = "Only numbers beetwen commas are allowed. Like: 5,12,25"; $valid = false;
            }
        }

        //E: ---------- QUESTION-5 What Crop do you grow? ------------
        if (empty($_POST["land_q5"])) {
            $land_q5_Err = "This is required*"; $valid = false;
        } else {
            $land_q5 = test_input($_POST["land_q5"]);
        }

        //E: ---------- QUESTION-5b ---------
        if ($_POST["land_q5b"]!=="") {
//            $land_q5b_Err = "This field is required"; $valid = false;
//        } else {
            // $land_q2 = test_input($_POST["land_q2"]);
            $land_q5b = ($_POST["land_q5b"]);
            // check if user_name address is well-formed
            if (!preg_match("/^[a-zA-Z,\s]+$/",$land_q5b)) {
                $land_q5b_Err = "Only letters are allowed. Like: orange"; $valid = false;
            }
        }

        //E: ---------- QUESTION-6 How long ? ------------
        if (empty($_POST["land_q6"])) {
            $land_q6_Err = "This is required"; $valid = false;
        } else {
            $land_q6 = test_input($_POST["land_q6"]);
//            echo "value of this:  ".$land_q6;
        }
//        echo "value of this:  ".$land_q6;
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
    <?php
    //E: This PHP.file imports the form for personal information, from "form1.html"
    // include ("form1.html");
    if(empty($valid)){
//        include ("form1b_Copy.html");
        include ("form_lulc.html");
    }else{
        if (!$valid==true){
//            include ("form1b_Copy.html");
            include ("form_lulc.html");
        }else{//E: insert read data into the DB MySQL
//                                        session_start();
//            echo "User registered"."<br>";
//            include ('../model_ecw/data.php');
            include ('../data_login/data_db_login1.php');
//            include ('connection_local_remote_Copy.php');
            include ('../data_login/connect_local_remote_login1.php');
//            echo "Option selected:           ".$land_q5."<br>";//E: Selected option. For checking !
//            echo "Other crop (option 5):     ".$land_q5b."<br>";//E: Other crop (when option-5 is selected). For checking !
            $land_q5_conc = $land_q5 ." - ". $land_q5b;//E: Concatenate both option-selected and other crop
//            echo "Option selected and crop:  ".$land_q5_conc."<br>";//E: For checking !

//            $query_insert_2 = "UPDATE REGISTER SET LULC_Q1 = '$land_q1', LULC_Q2='$land_q2', LULC_Q3='$land_q3', LULC_Q4='$land_q4', LULC_Q5='$land_q5_conc', LULC_Q6='$land_q6' WHERE id = 182";
//            $query_insert_2 = "UPDATE REGISTER SET LULC_Q1 = '$land_q1', LULC_Q2='$land_q2', LULC_Q3='$land_q3', LULC_Q4='$land_q4', LULC_Q5='$land_q5_conc', LULC_Q6='$land_q6'
//WHERE username = '$user_name_i'";
            $query_insert_2 = "UPDATE $users_register SET LULC_Q1 = '$land_q1', LULC_Q2='$land_q2', LULC_Q3='$land_q3', LULC_Q4='$land_q4', LULC_Q5='$land_q5_conc', LULC_Q6='$land_q6'
WHERE username = '$user_name_i'";

            $result = mysqli_query($connection_login, $query_insert_2);

            //E: Create a Cookie and Session
//            setcookie("cookie_1","This is a message from cookie...");
//            session_start();
//            $_SESSION['lulc_test_name'] = $land_q1;

            // ++++++++++++++++++++++
            //EE: This line send the current page to "registry_done.php" page (FIRST way to send to it)
            //            header('Location:done_lulc.php');//E: It moves the "done_personal_info.php" (First way)

            echo "username:   ".$user_name_i."<br>\n";//E: For testing
            echo "Answer for question 1:  ".$land_q1; //E: For test

            ////////////////////////////////////////////////////////////////////////////////////////
            //////////////////////////////// Changes for TESTETING /////////////////////////////////
            // By commenting this two options, this page prints the previous echo messages

            //EE: This line send-back the current page to "login_ok.php" after submitting.
            //EE: Used to run in REMOTE HOST
            echo("<script>location.href = '../login/login_ok.php';</script>");//E: Send back to 'login_ok.php'

            //EE: Send the current page to "done_exp_test.php" after submitting for testing
            //EE: Used to test at LOCAL HOST
            // echo("<script>location.href = 'done_lulc_test.php';</script>");//E: For test
        }
    }
    ?>
    <div class="row mainFrameRightBck" id="mainFrame">
        <!-- Right Side Column (GET INVOLVED) -->
        <div id="sideCol" style="display: none">
            <div class="textwidget"><h1>Get Involved</h1>
                <p>We provide web-based tools for visualizing watershed and designing land use and runoff management alternatives on the landscape.</p>
                <div class="barButton"><a href="/visualize-design/how-it-works/">How does Wrestore work?</a></div>
                <div class="barButton"><a href="/partners/">Meet our partners</a></div>
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
            <a href="http://www.iupui.edu/" target="_blank"><img src="../img/IUPUI_logo/iu_logo_tr3_1500x500.gif" width="225" height="75" alt="IUPUI" class="sponsorsLogos"></a>
            <a href="http://www.nsf.gov/" target="_blank"><img src="../img/logoNsf.gif" alt="NSF" width="75" height="76" class="sponsorsLogos"></a>
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

<script>
    function myFunction(){
        var personal_information = document.getElementById("personal_info");
        personal_information.style.display = "none";
        var land_information = document.getElementById("gform_page_1_2");
        land_information.style.display = "block";
        // alert("hello");
    }
</script>

</body>
</html>
