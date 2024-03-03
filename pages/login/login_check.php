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
                <div class="menu"><ul>
<!--                        <li class="page_item page-item-29"><a href="http://wrestore.oregonstate.edu/">Return to Home page</a></li>-->
                        <li class="page_item page-item-29"><a href="../../index.html">Return to Home page</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--        <nav id="loginNav"><a href="register.html">Register</a> | <a href="#">Login</a></nav>-->
    </div><!-- End Nav Row -->

    <header id="pageHeader">
        <h1>Login</h1>
    </header>
    <p>Please login in order to begin a new test or continue with an existing ongoing test</p>
    <p><font color="red"><b>NOTE: Before logging in, please make sure you are either using Google Chrome or Mozilla Firefox browser.</b></font></p>

    <div id="personal_info" class='gform_page_fields' style="display: none"><h2>Login</h2></div>

    <?php
    // define variables and set to empty values
    $user_nameErr = $pass1Err = $user_pass_Err = $email_s_Err = $email_s_Err2 = "";
    $user_name = $pass1 = $email_s = "";
    $id_reg = ""; //E: this will hostes the id corresponding to the $user_name from the
    //E: It does not execute when it is upload first time
    //if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //E: It does not execute if "submit" was not clicked i.e. the first time is not executed
//    if (isset($_POST["submit"])){
    if (isset($_POST["submit"])){
        $valid = true; //

        //E: ---------- Start: Checking USER-NAME and PASSWORD --------- //
        //E: If either "user_name" or "password" is empty, it pop ups a message
        if (empty($_POST["user_name"]) || empty($_POST["password"])) {//E: it gives error if one of them are empty
            $user_pass_Err = "Username and password are required"; $valid = false;
        }
        //E:"user_name" and "password" are verified into the DB, after they have been input above.
        else {
            $user_name = test_input($_POST["user_name"]);
            $password_i  = $_POST['password'];
            //E: Call Files for connection with the DDBB
            include('../data_login/data_db_login1.php');//E: Import data for connection
            include('../data_login/connect_local_remote_login1.php');//E: import connection function. It gives "$connection_login"

            //E: Select "$user_name" from the DDBB
//            $q1 = "SELECT USERNAME FROM REGISTER WHERE USERNAME = '$user_name'";//E: query to get "user_name"
            $q1 = "SELECT USERNAME FROM $users_register WHERE USERNAME = '$user_name'";//E: query to get "user_name"

            $result1 = mysqli_query($connection_login,$q1);
            $rowcount1 = mysqli_num_rows($result1);//E: It counts how many "user_name" we have
            $row1 = mysqli_fetch_assoc($result1);//E: It gives '$result' values as array

            //E: Select "$password_i" from the DDBB
//            $q2 = "SELECT PASSWORD FROM REGISTER WHERE USERNAME = '$user_name'";//E: query to get password
            $q2 = "SELECT PASSWORD FROM $users_register WHERE USERNAME = '$user_name'";//E: query to get password
            $result2 = mysqli_query($connection_login,$q2);
            $row2 = mysqli_fetch_assoc($result2);//E: It gives '$result' values as array

            $q2b = "SELECT id FROM $users_register WHERE USERNAME = '$user_name'";//E: query to get the $user id from user_list table
            $result2b = mysqli_query($connection_login,$q2b);
            $row2b = mysqli_fetch_assoc($result2b);//E: It gives '$result' values as array

            //E: First, check if "$user_name" is DB
            if ($result1 = mysqli_query($connection_login,$q1)){
                $rowcount1 = mysqli_num_rows($result1);
                // $user_nameErr = "Checking existing...".$rowcount."<br>"; $valid = false;
                if($rowcount1 == 0){
//                    $user_nameErr = "The username you entered does not exist"."<br>"; $valid = false;
                    $user_nameErr = "The username you entered does not exist"; $valid = false;
                }
                //E: Second, check if "$password_i" is in DB. After having checked the "$user_name"
                else {
                    $rowcount2 = mysqli_num_rows($result2);
                    // echo "rowcount2:   ".$rowcount2; //E: For checking
                    if(password_verify($password_i,$row2['PASSWORD'])){
                        $pass1Err = "The password is correct !"."<br>"; $valid = true;

                    }else{
//                        $pass1Err = "The password is incorrect"."<br>"; $valid = false;
                        $pass1Err = "The password is incorrect"; $valid = false;
                    }
                }
            }
//            mysqli_close($connection_login);
        }
        //E: ---------- End: Checking USER-NAME and PASSWORD --------- //

        ////E: ---------- Start: Checking PASSWORD (This part is not in use, it was merged into "user-name" checking) ---------
//        if (empty($_POST["password"])) {
//            $pass1Err = "password+ is required to login"; $valid = false;
//        } else {
//            // check if password is DB
////            include ('../data_db_login.php');
//            //EE: import connection function
////            include ('../con_local_remote_login.php');//E: it gives "$connection_login"
//
////            $q1 = "SELECT USERNAME FROM REGISTER WHERE USERNAME = '$user_name'";
//            $q2 = "SELECT PASSWORD FROM REGISTER WHERE USERNAME = '$user_name'";
//            // Perform Query
//            $result = mysqli_query($connection_login,$q2);
//            $rowcount = mysqli_num_rows($result);//E: It counts how many results we have
//            $row = mysqli_fetch_assoc($result);//E: It gives '$result' values as array
//
//            $password_i  = $_POST['password'];
//
//            if (password_verify($password_i,$row['PASSWORD'])){
//                $pass1Err = "Pass  ok"."<br>"; $valid = true;
//            } else{
//                $pass1Err = "Pasr NOT ok"."<br>"; $valid = false;
//            }
//            mysqli_close($connection_login);
//        }
        ////E: ---------- End: Checking PASSWORD (This part is not in use, it was merged into "user-name" checking) ---------

//// ------------------- Start: Recover Username (This was off for first test) -------------------- //
//        //E: Assign the input email in '$email_s' variable
//        $email_s = ($_POST["email_rec"]);
////        echo "email for recovering username: ".$email_s."<br>";//E: for test
//
//        // check if user_name is DB by using recovering-email
//        include ('../data_db_login.php');//E: Import data for connection
//        include ('../con_local_remote_login.php');//E: import connection function. It gives "$connection_login"
//
//        $q3 = "SELECT USERNAME FROM REGISTER WHERE EMAIL = '$email_s'";//E: query to get username
//        $result3 = mysqli_query($connection_login,$q3);
//
//        if ($result3 = mysqli_query($connection_login,$q3)){
//            $rowcount3 = mysqli_num_rows($result3);
////            echo $rowcount3."<br>";//E: number of usernames found. For Test
//            if($rowcount3 == 0){
//                $email_s_Err = "No account found with that email address"; $valid = false;
//                echo "<br>"."message: ".$email_s_Err;//E: For Test
//            } else{
//                //$row3 = mysqli_fetch_assoc($result3);//E: It gets '$result' values as array (1 by 1)
//                while($row3b = mysqli_fetch_assoc($result3)){//E: For old MySQL versions
//                    $json[] = $row3b["USERNAME"];
//                }
//                // $json1 = mysqli_fetch_all ($result3, MYSQLI_ASSOC);//E: For new version of MySQL
//
//                $email_s_Err = "These usernames were found for that email*: ";
//                $email_s_Err2 = json_encode($json);
////                echo "We found these usernames for that email: ".json_encode($json)."<br>";
//
//                ////E: Send email to recover username and password (IN PROGRESS),
//                //$to = $email_s;
//                //$subject = "Recover your WRESTORE account";
//                //$txt = "Hello world!".json_encode($json);
//                //$headers = "From: wrestore@example.com" . "\r\n";
//                //mail($to,$subject,$txt,$headers);
//            }
//        }
//// ------------------- End: Recover Username  -------------------- //

    }
    //E: Function for processing the input data in some boxes such "$user_name"
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
        include ("login_form.html");
    }else{
        if (!$valid==true){
            include ("login_form.html");
        }else{//E: Access to work in WRESTORE

            //E: Create a Cookie and Session
            setcookie("cookie_1","This is a Message set by a cookie... from 'login-check'");
            session_start();
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_id'] = implode(" ",$row2b);

            //EE: This line send the current page to "login_ok_test.php" page (FIRST way to send to it)
//            header('Location:login_ok_test.php');//E: It moves the "login_ok_test.php" (First way)

            echo "email:   ".$email_s."<br>";//E: For checking
            echo "username:   ".$user_name."<br>";//E: For checking
            echo "password:   ".$pass1."<br>";//E: For checking
            $id_reg = implode(" ",$row2b);
            echo "id:       ".$id_reg."<br>";//E: For checking

            //E: Comment this line to TEST
            //EE: This line send the current page to "login_ok_test.php" page (SECOND way to send to it)
//            echo("<script>location.href='login_ok_test.php';</script>");//E: It moves the "login_ok_test.php" (Second way)
            echo("<script>location.href='login_ok.php';</script>");//E: It moves the "login_ok.php" (Second way)
        }
    }
    ?>


    <div class="row mainFrameRightBck" id="mainFrame">
        <div id="mainCol">
        </div>
        <!-- end main content column -->

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
<!--            <a href="http://www.iupui.edu/" target="_blank"><img src="../img/IUPUI_logo/iu_logo_2982x576.png" width="393" height="76" alt="IUPUI" class="sponsorsLogos"></a>-->
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

</body>
</html>
