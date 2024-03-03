<?php
session_start();
//error_reporting(0);
if(!isset($_SESSION['user_name'])){
    header("Location:../login/login_check.php");
}
$user_name_i = $_SESSION['user_name'];
//echo $user_name_i;//E:For test
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

    <div id="personal_info" class='gform_page_fields'>
        <h3 class='gf_progressbar_title' style="display: none">Step 1 of 3</h3>
        <ul id='gform_fields_1' class='gform_fields top_label form_sublabel_below description_above'>
            <li id='field_1_39' class='gfield gfield_html gfield_html_formatted gfield_no_follows_desc field_sublabel_below field_description_above' >
                <h2>Experience Information</h2>
            </li>

            <p><span class="error">* required field</span></p>

        </ul>
    </div>

    <?php

    // define variables and set to empty values
    // E: These variables are for unique-answer questions, and questions with input-box
    //    $nameErr = $emailErr = $genderErr = $websiteErr = "";
//    $land_q1_Err = $land_q2_Err = $land_q3_Err = $land_q4_Err = $land_q5_Err = $land_q5b_Err = $land_q6_Err = "";
    $exp_q1_Err = $exp_q5_Err = $exp_q6_Err = $exp_q7_Err = $exp_q8_Err = $exp_q9_Err = "";
    $exp_q10_Err = $exp_q11_Err = $exp_q12_Err = $exp_q14_Err = $exp_q15_Err = $exp_q16_Err = "";
    $exp_q17_Err = $exp_q18_Err = $exp_q19_Err = $exp_q20_Err = $exp_q21_Err = "";
    //    $name = $email = $gender = $comment = $website = "";
//    $land_q1 = $land_q2 = $land_q3 = $land_q4 = $land_q5 = $land_q5b = $land_q6 = "";
    $exp_q1 = $exp_q5 = $exp_q6 = $exp_q7 = $exp_q8 = $exp_q9 = $exp_q10 = $exp_q11 = $exp_q12 = "";
    $exp_q14 = $exp_q15 = $exp_q16 = $exp_q17 = $exp_q18 = $exp_q19 = $exp_q20 = $exp_q21 = "";

    //E: These variables are for multiple-answer questions
    $exp_q2b = $exp_q3b = $exp_q4b = $exp_q13b = [];
    $exp_q2b_Err = $exp_q3b_Err = $exp_q4b_Err = $exp_q13b_Err = "";

    //E: It does not execute when it is upload first time
    //if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //E: It does not execute if "submit" was not clicked i.e. the first time is not executed
    if (isset($_POST["submit"])) {
        $valid = true; //

        //E: ---------- QUESTION-1 Experience - ONE OPTION ------------
        if (empty($_POST["exp_q1"])) {
            $exp_q1_Err = "This is required"; $valid = false;
        } else {
            $exp_q1 = test_input($_POST["exp_q1"]);
            // echo "value of this:  ".$land_q6;
        }

        //E: ---------- QUESTION-2 Experience - SEVERAL OPTIONS ------------
        // check if "exp_q2b" input-box is empty.
        if (empty($_POST["exp_q2b"])) {
            $exp_q2b_Err = "This is required*"; $valid = false;
            } else{
            $exp_q2b = ($_POST["exp_q2b"]);//E: It gets the input options as array, because many options at same tiem are allowed

            //echo "Exp-2:   ".$exp_q2b[0]."<br>";//E: For checking !
            //print_r($exp_q2b);//E: For checking !. Print the full array. print_r($exp_q2b[1]);//E: For checking !
            //print_r(array_keys($exp_q2b));//E: For checking !. Print the only keys of the above array.
            //echo "<br><br>";
            $exp_q2_report = '';
            foreach ($exp_q2b as $key => $value) {
                $exp_q2_report .= $key.","; //echo $key; //E: For checking
            }
            $exp_q2_report = rtrim($exp_q2_report,',');//E: Remove the last comma (,)
        }

        //E: ---------- QUESTION-3 Experience - SEVERAL OPTIONS ------------
        // check if "exp_q3b" input-box is empty.
        if (empty($_POST["exp_q3b"])) {
            $exp_q3b_Err = "This is required*"; $valid = false;
        } else {
            $exp_q3b = ($_POST["exp_q3b"]);//E: It gets the input options as array, because many options at same tiem are allowed
            $exp_q3_report = '';
            foreach ($exp_q3b as $key => $value) {
                $exp_q3_report .= $key.","; //echo $key; //E: For checking
            }
            $exp_q3_report = rtrim($exp_q3_report,',');//E: Remove the last comma (,)
        }

        //E: ---------- QUESTION-4 Experience - SEVERAL OPTIONS ------------
        // check if "exp_q4b" input-box is empty.
        if (empty($_POST["exp_q4b"])) {
            $exp_q4b_Err = "This is required*"; $valid = false;
        } else {
            $exp_q4b = ($_POST["exp_q4b"]);//E: It gets the input options as array, because many options at same tiem are allowed
            $exp_q4_report = '';
            foreach ($exp_q4b as $key => $value) {
                $exp_q4_report .= $key.","; //echo $key; //E: For checking
            }
            $exp_q4_report = rtrim($exp_q4_report,',');//E: Remove the last comma (,)
        }

        //E: ---------- QUESTION-5 Experience - ONE OPTION ------------
        if (empty($_POST["exp_q5"])) {
            $exp_q5_Err = "This is required"; $valid = false;
        } else {
            $exp_q5 = test_input($_POST["exp_q5"]);
        }

        //E: ---------- QUESTION-6 Experience - ONE OPTION ------------
        if (empty($_POST["exp_q6"])) {
            $exp_q6_Err = "This is required"; $valid = false;
        } else {
            $exp_q6 = test_input($_POST["exp_q6"]);
        }

        //E: ---------- QUESTION-7 Experience - ONE OPTION ------------
        if (empty($_POST["exp_q7"])) {
            $exp_q7_Err = "This is required"; $valid = false;
        } else {
            $exp_q7 = test_input($_POST["exp_q7"]);
        }

        //E: ---------- QUESTION-8 Experience - ONE OPTION ------------
        if (empty($_POST["exp_q8"])) {
            $exp_q8_Err = "This is required"; $valid = false;
        } else {
            $exp_q8 = test_input($_POST["exp_q8"]);
        }

        //E: ---------- QUESTION-9 Experience - ONE OPTION ------------
        if (empty($_POST["exp_q9"])) {
            $exp_q9_Err = "This is required"; $valid = false;
        } else {
            $exp_q9 = test_input($_POST["exp_q9"]);
        }

        //E: ---------- QUESTION-10 Experience - ONE OPTION ------------
        if (empty($_POST["exp_q10"])) {
            $exp_q10_Err = "This is required"; $valid = false;
        } else {
            $exp_q10 = test_input($_POST["exp_q10"]);
        }

        //E: ---------- QUESTION-11 Experience - ONE OPTION ------------
        if (empty($_POST["exp_q11"])) {
            $exp_q11_Err = "This is required"; $valid = false;
        } else {
            $exp_q11 = test_input($_POST["exp_q11"]);
        }

        //E: ---------- QUESTION-12 Experience - ONE OPTION ------------
        if (empty($_POST["exp_q12"])) {
            $exp_q12_Err = "This is required"; $valid = false;
        } else {
            $exp_q12 = test_input($_POST["exp_q12"]);
        }

        //E: ---------- QUESTION-13 Experience - SEVERAL OPTIONS ------------
        // check if "exp_q13b" input-box is empty.
        if (empty($_POST["exp_q13b"])) {
            $exp_q13b_Err = "This is required*"; $valid = false;
        } else {
            $exp_q13b = ($_POST["exp_q13b"]);//E: It gets the input options as array, because many options at same tiem are allowed
            $exp_q13_report = '';
            foreach ($exp_q13b as $key => $value) {
                $exp_q13_report .= $key.","; //echo $key; //E: For checking
            }
            $exp_q13_report = rtrim($exp_q13_report,',');//E: Remove the last comma (,)
        }

        //E: ---------- QUESTION-14 Experience - ONE OPTION ------------
        if (empty($_POST["exp_q14"])) {
            $exp_q14_Err = "This is required"; $valid = false;
        } else {
            $exp_q14 = test_input($_POST["exp_q14"]);
        }

        //E: ---------- QUESTION-15 Experience - ONE OPTION ------------
        if (empty($_POST["exp_q15"])) {
            $exp_q15_Err = "This is required"; $valid = false;
        } else {
            $exp_q15 = test_input($_POST["exp_q15"]);
        }

        //E: ---------- QUESTION-16 Experience - ONE OPTION ------------
        if (empty($_POST["exp_q16"])) {
            $exp_q16_Err = "This is required"; $valid = false;
        } else {
            $exp_q16 = test_input($_POST["exp_q16"]);
        }

        //E: ---------- QUESTION-17 Experience - POSITIVE NUMBERS ---------
        if ($_POST["exp_q17"]=="") {
            //$land_q2 = ($_POST["land_q2"]);
            $exp_q17_Err = "This field is required"; $valid = false;
        } elseif ($_POST["exp_q17"]=='0'){
            $exp_q17 = ($_POST["exp_q17"]);
            $exp_q17_Err = "You selected ZERO"; $valid = false;
        } else {
            // $land_q2 = test_input($_POST["land_q2"]);
            $exp_q17 = ($_POST["exp_q17"]);
            // check if user_name address is well-formed
            if (!preg_match("/^[0-9]+(\\.[0-9]+)?$/",$exp_q17)) {//E: Allows only positive numbers including ZERO
                $exp_q17_Err = "Only positive numbers are allowed"; $valid = false;
            }
        }

        //E: ---------- QUESTION-18 Experience - POSITIVE NUMBERS ---------
        if ($_POST["exp_q18"]=="") {
            //$land_q2 = ($_POST["land_q2"]);
            $exp_q18_Err = "This field is required"; $valid = false;
        } elseif ($_POST["exp_q18"]=='0'){
            $exp_q18 = ($_POST["exp_q18"]);
            $exp_q18_Err = "You selected ZERO"; $valid = false;
        } else {
            // $land_q2 = test_input($_POST["land_q2"]);
            $exp_q18 = ($_POST["exp_q18"]);
            // check if user_name address is well-formed
            if (!preg_match("/^[0-9]+(\\.[0-9]+)?$/",$exp_q18)) {//E: Allows only positive numbers including ZERO
                $exp_q18_Err = "Only positive numbers are allowed"; $valid = false;
            }
        }

        //E: ---------- QUESTION-19 Experience - POSITIVE NUMBERS ---------
        if ($_POST["exp_q19"]=="") {
            //$land_q2 = ($_POST["land_q2"]);
            $exp_q19_Err = "This field is required"; $valid = false;
        } elseif ($_POST["exp_q19"]=='0'){
            $exp_q19 = ($_POST["exp_q19"]);
            $exp_q19_Err = "You selected ZERO"; $valid = false;
        } else {
            // $land_q2 = test_input($_POST["land_q2"]);
            $exp_q19 = ($_POST["exp_q19"]);
            // check if user_name address is well-formed
            if (!preg_match("/^[0-9]+(\\.[0-9]+)?$/",$exp_q19)) {//E: Allows only positive numbers including ZERO
                $exp_q19_Err = "Only positive numbers are allowed"; $valid = false;
            }
        }

        //E: ---------- QUESTION-20 Experience - POSITIVE NUMBERS ---------
        if ($_POST["exp_q20"]=="") {
            //$land_q2 = ($_POST["land_q2"]);
            $exp_q20_Err = "This field is required"; $valid = false;
        } elseif ($_POST["exp_q20"]=='0'){
            $exp_q20 = ($_POST["exp_q20"]);
//            $exp_q20_Err = "You selected ZERO"; $valid = false;
        } else {
            // $land_q2 = test_input($_POST["land_q2"]);
            $exp_q20 = ($_POST["exp_q20"]);
            // check if user_name address is well-formed
            if (!preg_match("/^[0-9]+(\\.[0-9]+)?$/",$exp_q20)) {//E: Allows only positive numbers including ZERO
                $exp_q20_Err = "Only positive numbers are allowed"; $valid = false;
            }
        }

        //E: ---------- QUESTION-21 Experience - ONE OPTION ------------
        if (empty($_POST["exp_q21"])) {
            $exp_q21_Err = "This is required"; $valid = false;
        } else {
            $exp_q21 = test_input($_POST["exp_q21"]);
        }
        // echo "value of this:  ".$land_q6;

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
        include ("form_exp.html");
    }else{
        if (!$valid==true){
            include ("form_exp.html");
        }else{//E: insert read data into the DB MySQL
//                                        session_start();
            echo "User registered"."<br>";
//            include ('../model_ecw/data.php');
            include ('../data_login/data_db_login1.php');
//            include ('connection_local_remote.php');
            include ('../data_login/connect_local_remote_login1.php');
//            echo "Exp-1:  ".$exp_q1."<br>";//E: For checking !
//            echo "Exp-2:  ".$exp_q2_report."<br>";//E: For checking!
//            echo "Exp-17:  ".$exp_q17."<br>";//E: For checking !

//E: ""$query_insert_2" is for insert LULC info
//            $query_insert_3 = "UPDATE REGISTER SET EXP_Q1='$exp_q1', EXP_Q2='$exp_q2_report',EXP_Q3='$exp_q3_report',EXP_Q4='$exp_q4_report'
//WHERE id = 182";
            $query_insert_3 = "UPDATE $users_register SET EXP_Q1='$exp_q1', EXP_Q2='$exp_q2_report',EXP_Q3='$exp_q3_report',EXP_Q4='$exp_q4_report',EXP_Q5='$exp_q5',
EXP_Q6='$exp_q6', EXP_Q7='$exp_q7', EXP_Q8='$exp_q8', EXP_Q9='$exp_q9', EXP_Q10='$exp_q10', EXP_Q11='$exp_q11',EXP_Q12='$exp_q12', EXP_Q13='$exp_q13_report',
EXP_Q14='$exp_q14', EXP_Q15='$exp_q15', EXP_Q16='$exp_q16', EXP_Q17='$exp_q17',EXP_Q18='$exp_q18', EXP_Q19='$exp_q19', EXP_Q20='$exp_q20', EXP_Q21='$exp_q21'
WHERE username = '$user_name_i'";/**/

            /*$query_insert_3 = "UPDATE REGISTER SET EXP_Q1='$exp_q1', EXP_Q2='$exp_q2_report',EXP_Q3='$exp_q3_report',EXP_Q4='$exp_q4_report',EXP_Q5='$exp_q5',
EXP_Q6='$exp_q6', EXP_Q7='$exp_q7', EXP_Q8='$exp_q8', EXP_Q9='$exp_q9', EXP_Q10='$exp_q10', EXP_Q11='$exp_q11',EXP_Q12='$exp_q12', EXP_Q13='$exp_q13_report',
EXP_Q14='$exp_q14', EXP_Q15='$exp_q15', EXP_Q16='$exp_q16', EXP_Q17='$exp_q17',EXP_Q18='$exp_q18', EXP_Q19='$exp_q19', EXP_Q20='$exp_q20', EXP_Q21='$exp_q21'
WHERE username = 'enoay1'";/**/

            //E: ""$query_insert_2" is for insert LULC info
            $result = mysqli_query($connection_login, $query_insert_3);

            //E: Create a Cookie and Session
            //            setcookie("cookie_1","This cokie come from insert_exp_info");
            //            session_start();
            //            $_SESSION['exp_test'] = $exp_q2_report;

            // ++++++++++++++++++++++
            //EE: This line send the current page to "registry_done.php" page (FIRST way to send to it)
//            header('Location:done_exp.php');//E: It moves the "registry_done.php" (First way)

            echo "Username:   ".$user_name_i."<br>\n";//E: For test
            echo "Answer for question 1:  ".$exp_q1; //E: For test

            ////////////////////////////////////////////////////////////////////////////////////////
            //////////////////////////////// Changes for TESTETING /////////////////////////////////
            // By commenting this two options, this page prints the previous echo messages

            //EE: This line send-back the current page to "login_ok.php" after submitting.
            //EE: Used to run in REMOTE HOST
            echo("<script>location.href = '../login/login_ok.php';</script>");//E: Send back to 'login_ok.php'

            //EE: Send the current page to "done_exp_test.php" after submitting for testing
            //EE: Used to test at LOCAL HOST
            // echo("<script>location.href = 'done_exp_test.php';</script>");//E: For test
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

<script type='text/javascript' src='http://wrestore.iupui.edu/wp-includes/js/comment-reply.min.js?ver=4.3.19'></script>
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
