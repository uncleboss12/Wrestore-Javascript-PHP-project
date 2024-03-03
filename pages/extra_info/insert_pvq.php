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
        <h1>E-PVQ Survey</h1>
    </header>
<!--    <p>If you live or farm in the Eagle Creek watershed, then your farm would be in one of the smaller watersheds (also, called sub-basins) within the Eagle Creek Watershed. Use the link to the map provided <a href="https://www.google.com/fusiontables/DataSource?snapid=S720810vz1C" target="_blank">here</a> to find your Sub-BasinID. Put the number in the field below” with “If you live or farm in the Eagle Creek watershed, then your farm lies in one of the smaller watersheds (also, called sub-basins) within the Eagle Creek Watershed. Please use the link to the map provided <a href="https://www.google.com/fusiontables/DataSource?snapid=S720810vz1C" target="_blank">here</a> to find your <em>Subbasin</em> ID.</p>-->
<!--    <p><em>Disclaimer: Please note that any information you provide to us via this website is kept confidential and not shared with anyone else. Only the primary members of the research team have access to this data. If any results from your participation are presented in research reports and publications, they will be presented in aggregate form and will be free of any identifiers. If you have any questions or concerns, please do not hesitate to contact us.</em></p>-->

    <div id="personal_info" class='gform_page_fields'>
        <h3 class='gf_progressbar_title' style="display: none">Step 1 of 3</h3>
        <ul id='gform_fields_1' class='gform_fields top_label form_sublabel_below description_above'>
            <li id='field_1_39' class='gfield gfield_html gfield_html_formatted gfield_no_follows_desc field_sublabel_below field_description_above' >
                <h2>Instructions</h2>
            </li>

<!--            <p><span>Here we briefly describe different people. Please read each description and think about how much-->
<!--            each person is or is not like you. Click the option that shows how much the person described-->
<!--            is like you </span></p>-->
            <p><span>Below you will find brief descriptions of different people. For each person we describe what is very important
                to him/her/them. Please read each description carefully and <b>indicate how much this person is like you</b>. The
                meaning of the score is as follow:</span></p>
            <p><span><b>1</b> means that the person is <b>totally not like you,</b></span></p>
            <p><span><b>7</b> means that the person is <b>totally like you.</b></span></p>
            <p><span>Please try to <b>distinguish as much as possible</b> in your answering by using different scores. The person
                that is most like you should thus receive the highest score. The person that is the least like you, the lowest.</span></p>

            <p><span class="error">* required field</span></p>

        </ul>
    </div>

    <!--  ++++++++++++++++ Start: PHP for questions ++++++++++++++++++++++ -->
    <?php

    //----------------------E: Start: (Block 1) of Change for new survey ---------------------
    // ---------- E: changes in "form_pvq.html" are also needed --------------------------------

    // define variables and set to empty values
    // E: These variables are for unique-answer questions, and questions with input-box
    //    $nameErr = $emailErr = $genderErr = $websiteErr = "";
//    $land_q1_Err = $land_q2_Err = $land_q3_Err = $land_q4_Err = $land_q5_Err = $land_q5b_Err = $land_q6_Err = "";
    $pvq_q1_Err = $pvq_q2_Err = $pvq_q3_Err = $pvq_q4_Err = $pvq_q5_Err = $pvq_q6_Err = "";
    $pvq_q7_Err = $pvq_q8_Err = $pvq_q9_Err = $pvq_q10_Err = $pvq_q11_Err = $pvq_q12_Err = "";
    $pvq_q13_Err = $pvq_q14_Err = $pvq_q15_Err = $pvq_q16_Err = $pvq_q17_Err = "";
    //    $name = $email = $gender = $comment = $website = "";
//    $land_q1 = $land_q2 = $land_q3 = $land_q4 = $land_q5 = $land_q5b = $land_q6 = "";
    $exp_q1 = $exp_q2 = $exp_q3 = $exp_q4 = $exp_q5 = $exp_q6 = $exp_q7 = $exp_q8 = $exp_q9 = "";
    $exp_q10 = $exp_q11 = $exp_q12 = $exp_q13 = $exp_q14 = $exp_q15 = $exp_q16 = $exp_q17 = "";

    //E: These variables are to fix the selected variable when randomnize. See L.126
    $fixvar_Err = ""; $fixvar = "";

    //E: These variables are for multiple-answer questions
    // $exp_q2b = $exp_q3b = $exp_q4b = $exp_q13b = [];
    // $exp_q2b_Err = $exp_q3b_Err = $exp_q4b_Err = $exp_q13b_Err = "";

    //E: It does not execute when it is upload first time
    //if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //E: It does not execute if "submit" was not clicked i.e. the first time is not executed
    $ind = 0;
    if (isset($_POST["submit"])) {
        $valid = true; //E: $Valid is set TRUE, but if some input is empty it'll set FALSE
        $ind = 1;

        //E: ---------- FIX VARIABLE from RANDOM Slection (hidden input) ------------
        if (empty($_POST["custId"])) {
            $fixvar_Err = "This is required"; $ind = 3;
        } else {
            $fixvar = test_input($_POST["custId"]);
            // $fixvar = "ok";
        }

        //E: ---------- QUESTION-1 Experience - ONE OPTION ------------
        if (empty($_POST["pvq_q1"])) {
            $pvq_q1_Err = "This is required"; $valid = false; $ind = 2;
        } else {
            $pvq_q1 = test_input($_POST["pvq_q1"]);
            // echo "value of this:  ".$land_q6;
        }

        //E: ---------- QUESTION-2 Experience - one OPTIONS ------------
        if (empty($_POST["pvq_q2"])) {
            $pvq_q2_Err = "This is required"; $valid = false; $ind = 2;
        } else {
            $pvq_q2 = test_input($_POST["pvq_q2"]);
        }

        //E: ---------- QUESTION-3 Experience - one OPTIONS ------------
        if (empty($_POST["pvq_q3"])) {
            $pvq_q3_Err = "This is required"; $valid = false; $ind = 2;
        } else {
            $pvq_q3 = test_input($_POST["pvq_q3"]);
        }

        //E: ---------- QUESTION-4 Experience - one OPTIONS ------------
        if (empty($_POST["pvq_q4"])) {
            $pvq_q4_Err = "This is required"; $valid = false; $ind = 2;
        } else {
            $pvq_q4 = test_input($_POST["pvq_q4"]);
        }

        //E: ---------- QUESTION-5 Experience - ONE OPTION ------------
        if (empty($_POST["pvq_q5"])) {
            $pvq_q5_Err = "This is required"; $valid = false; $ind = 2;
        } else {
            $pvq_q5 = test_input($_POST["pvq_q5"]);
        }

        //E: ---------- QUESTION-6 Experience - ONE OPTION ------------
        if (empty($_POST["pvq_q6"])) {
            $pvq_q6_Err = "This is required"; $valid = false; $ind = 2;
        } else {
            $pvq_q6 = test_input($_POST["pvq_q6"]);
        }

        //E: ---------- QUESTION-7 Experience - ONE OPTION ------------
        if (empty($_POST["pvq_q7"])) {
            $pvq_q7_Err = "This is required"; $valid = false; $ind = 2;
        } else {
            $pvq_q7 = test_input($_POST["pvq_q7"]);
        }

        //E: ---------- QUESTION-8 Experience - ONE OPTION ------------
        if (empty($_POST["pvq_q8"])) {
            $pvq_q8_Err = "This is required"; $valid = false; $ind = 2;
        } else {
            $pvq_q8 = test_input($_POST["pvq_q8"]);
        }

        //E: ---------- QUESTION-9 Experience - ONE OPTION ------------
        if (empty($_POST["pvq_q9"])) {
            $pvq_q9_Err = "This is required"; $valid = false; $ind = 2;
        } else {
            $pvq_q9 = test_input($_POST["pvq_q9"]);
        }

        //E: ---------- QUESTION-10 Experience - ONE OPTION ------------
        if (empty($_POST["pvq_q10"])) {
            $pvq_q10_Err = "This is required"; $valid = false; $ind = 2;
        } else {
            $pvq_q10 = test_input($_POST["pvq_q10"]);
        }

        //E: ---------- QUESTION-11 Experience - ONE OPTION ------------
        if (empty($_POST["pvq_q11"])) {
            $pvq_q11_Err = "This is required"; $valid = false; $ind = 2;
        } else {
            $pvq_q11 = test_input($_POST["pvq_q11"]);
        }

        //E: ---------- QUESTION-12 Experience - ONE OPTION ------------
        if (empty($_POST["pvq_q12"])) {
            $pvq_q12_Err = "This is required"; $valid = false; $ind = 2;
        } else {
            $pvq_q12 = test_input($_POST["pvq_q12"]);
        }

        //E: ---------- QUESTION-13 Experience - ONE OPTIONS ------------
        if (empty($_POST["pvq_q13"])) {
            $pvq_q13_Err = "This is required"; $valid = false; $ind = 2;
        } else {
            $pvq_q13 = test_input($_POST["pvq_q13"]);
        }

        //E: ---------- QUESTION-14 Experience - ONE OPTION ------------
        if (empty($_POST["pvq_q14"])) {
            $pvq_q14_Err = "This is required"; $valid = false; $ind = 2;
        } else {
            $pvq_q14 = test_input($_POST["pvq_q14"]);
        }

        //E: ---------- QUESTION-15 Experience - ONE OPTION ------------
        if (empty($_POST["pvq_q15"])) {
            $pvq_q15_Err = "This is required"; $valid = false; $ind = 2;
        } else {
            $pvq_q15 = test_input($_POST["pvq_q15"]);
        }

        //E: ---------- QUESTION-16 Experience - ONE OPTION ------------
        if (empty($_POST["pvq_q16"])) {
            $pvq_q16_Err = "This is required"; $valid = false; $ind = 2;
        } else {
            $pvq_q16 = test_input($_POST["pvq_q16"]);
        }

        //E: ---------- QUESTION-17 Experience - ONE OPTION ---------
        if (empty($_POST["pvq_q17"])) {
            $pvq_q17_Err = "This is required"; $valid = false; $ind = 2;
        } else {
            $pvq_q17 = test_input($_POST["pvq_q17"]);
        }

    }

    //----------------------E: End: (Block 1) of Change for new survey ---------------------

    // This function some test (verification) of some input data
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    <!--  ++++++++++++++++ End: PHP for questions (L.94 - L.251) ++++++++++++++++++++++ -->


    <!--  ++++++++++++++++ Start: PHP for DB connection, insert Data, and jump to login_ok.php ++++++++++++++++++++++ -->
    <?php
    //----------------------E: Start: (Block 2) of Change for new survey ---------------------
    //E: This PHP.file imports the form for personal information, from "form1.html"
    // include ("form1.html");

//    $e_pvq_files = array("form_pvq_r01.html", "form_pvq_r02.html");
     $e_pvq_files = array("form_pvq_r01.html", "form_pvq_r02.html", "form_pvq_r03.html", "form_pvq_r04.html", "form_pvq_r05.html", "form_pvq_r06.html",
     "form_pvq_r07.html", "form_pvq_r08.html", "form_pvq_r09.html", "form_pvq_r10.html");

    if($ind==0){ //E:At fisrt execution $valid is empty
        // echo "e1: ".$html_file."<br>\n";  //E: For TEST
        shuffle($e_pvq_files);
        $html_file = $e_pvq_files[0]; //E: It takes the fisrt element of the shuffled array
        // echo "e2: ".$html_file;  //E: For TEST
    }
    else{
        // echo "html.file: ".$html_file."<br>\n"; //E: For TEST
        // echo "fixvar: ".$fixvar."<br>\n";  //E: For TEST
        $html_file = $fixvar;
        // echo "html.file: ".$html_file."<br>\n";  //E: For TEST
    }

    //E: At first execution of this script $valid is empty, then "html" files are called. See L.117 comment
    if(empty($valid)){ //E:At fisrt execution $valid is empty
        // include ("form_pvq.html");
        include ($html_file); //E: This html-file was slected above from an array of several html-files
        // echo "empty: ".$html_file."   val= ".$valid."   ind= ".$ind; //E: For TEST
    }else{
        if (!$valid==true){ ////E: We enter here if some question was set empty, otherwise it goes to insert data into DB MySQL
            ////E: If some question was not set, "html" files are called again
            // include ("form_pvq_4.html");
            include ($html_file);//E: This html-file was slected above from an array of several html-files
            echo "else: ".$html_file."   val= ".$valid."   ind= ".$ind; //E: For TEST
        }
        else {//E: insert read data into the DB MySQL
            //                                        session_start();
            echo "User registered"."<br>";
            //            include ('../model_ecw/data.php');
            include ('../data_login/data_db_login1.php');
            //            include ('connection_local_remote.php');
            include ('../data_login/connect_local_remote_login1.php');
            //            echo "Exp-1:  ".$exp_q1."<br>";//E: For checking !
            //            echo "Exp-2:  ".$exp_q2_report."<br>";//E: For checking!
            //            echo "Exp-17:  ".$exp_q17."<br>";//E: For checking !


        // UPDATE table_name SET column1 = value1, column2 = value2, ... WHERE condition;

        //E: ""$query_insert_2" is for insert LULC info
        //E: ""$query_insert_3" is for insert EXP info
            $query_insert_4 = "UPDATE $users_register SET pvq_q1='$pvq_q1', pvq_q2='$pvq_q2',pvq_q3='$pvq_q3',pvq_q4='$pvq_q4',pvq_q5='$pvq_q5',
pvq_q6='$pvq_q6', pvq_q7='$pvq_q7', pvq_q8='$pvq_q8', pvq_q9='$pvq_q9', pvq_q10='$pvq_q10', pvq_q11='$pvq_q11',pvq_q12='$pvq_q12', pvq_q13='$pvq_q13',
pvq_q14='$pvq_q14', pvq_q15='$pvq_q15', pvq_q16='$pvq_q16', pvq_q17='$pvq_q17'
WHERE username = '$user_name_i'";/**/

            /*$query_insert_3 = "UPDATE REGISTER SET EXP_Q1='$exp_q1', EXP_Q2='$exp_q2_report',EXP_Q3='$exp_q3_report',EXP_Q4='$exp_q4_report',EXP_Q5='$exp_q5',
EXP_Q6='$exp_q6', EXP_Q7='$exp_q7', EXP_Q8='$exp_q8', EXP_Q9='$exp_q9', EXP_Q10='$exp_q10', EXP_Q11='$exp_q11',EXP_Q12='$exp_q12', EXP_Q13='$exp_q13_report',
EXP_Q14='$exp_q14', EXP_Q15='$exp_q15', EXP_Q16='$exp_q16', EXP_Q17='$exp_q17',EXP_Q18='$exp_q18', EXP_Q19='$exp_q19', EXP_Q20='$exp_q20', EXP_Q21='$exp_q21'
WHERE username = 'enoay1'";/**/

            //E: ""$query_insert_2" is for insert LULC info
            //E: ""$query_insert_3" is for insert EXP info
            $result = mysqli_query($connection_login, $query_insert_4);

            //E: Create a Cookie and Session
            //      setcookie("cookie_1","This cokie come from insert_exp_info"); //E: ??
            //      session_start(); //E: ??
            //      $_SESSION['exp_test'] = $exp_q2_report; //E: ??

            // ++++++++++++++++++++++
            //EE: This line send the current page to "registry_done.php" page (FIRST way to send to it)
//            header('Location:done_exp.php');//E: It moves the "registry_done.php" (First way)

            echo "Username:  ".$user_name_i."<br>\n"; //E: For test
            echo "Answer for question 1:  ".$pvq_q1."<br>\n"; //E: For test
            echo "html: ".$html_file."   - val= ".$valid."   - ind= ".$ind." - fixvar: ".$fixvar; //E: For test

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
    //----------------------E: Start: (Block 2) of Change for new survey ---------------------
    ?>
    <!--  ++++++++++++++++ End: PHP for DB connection, insert Data, and jump to login_ok.php ++++++++++++++++++++++ -->

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
