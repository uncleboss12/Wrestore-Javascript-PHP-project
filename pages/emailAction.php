<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset=utf-8>
<title>WRESTORE - Watershed REstoration using Spatio-Temporal Optimization of REsources</title>    
<link rel="stylesheet" type="text/css" href="style.css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
<!--[if lte IE 6]><script src="js/ie6/warning.js"></script><script>window.onload=function(){e("js/ie6/")}</script><![endif]-->
<div class="wrapper">
	<div class="row">
        <header id="siteHeader">
            <div>
                <hgroup>
                    <h1><a href="/">WRESTORE</a></h1>
                    <h2>Watershed REstoration using Spatio-Temporal Optimization of REsources</h2>
                    <h3>Visualize & Design Your Watershed Landscape</h3>
                </hgroup>
            </div>
        </header>
    </div><!-- end Main Site Header -->
    <div class="row" id="navRow"> <!-- Nav Row -->
    	<nav id="mainNav">
    		<ul>
        		<li><a href="http://wrestore.iupui.edu">Return to Mainpage</a></li>
                <li><a href="login.php">Back to Login</a></li>
    		</ul>
    	</nav>
        <!--<nav id="loginNav">
        	<a href="#">Register</a> | <a href="#">Login</a>
        </nav>-->
	</div>
    <!-- End Nav Row -->
    <div class="row" id="banner"></div>
    <div class="row mainFrameRightBck" id="mainFrame">
    	<div id="mainCol">
        	<section id="content">
        		<header id="pageHeader">
            		<h1>Password reset results</h1>
            	</header>
                <p>
                   <?php
                   require_once 'PHPMailer/class.phpmailer.php';
                   //echo session_id();
                   //$email = $_REQUEST['emailAddress'];
                   //$connection = mysql_connect('localhost', 'mytest_jeynon', 'onrd80on');
                   $connection = mysql_connect('IN-GEOL-ESAIG06.geology.iupui.edu', 'swat', 'theswat2012');
                   if (!$connection) {
                       die('Could not connect: ' . mysql_error());
                   }

                   $mypassword=$_POST["PASSWORD"];
                   $encrypted_mypassword=md5($mypassword);
                   $username=$_POST["USERNAME"];
                   $encrypted_mypassword=md5($mypassword);
                   mysql_select_db("igmi2db", $connection) or die("Error selecting database");

                   $query="UPDATE users SET PASSWORD='$encrypted_mypassword' WHERE USERNAME='$username'";

                   // Perform Query
                   $result = mysql_query($query,$connection);
                   // This could be supplied by a user, for example

                   //echo mysql_affected_rows();
                   if( mysql_affected_rows() == 0 ){
                       echo "No match\n";
                   } else{
                       echo "Updated data successfully\n";
                   }
                   mysql_close($connection);

                   //mysql_free_result($result);
                   // Free the resources associated with the result set
                   // This is done automatically at the end of the script
                   ?>
                </p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
            </section>
        </div><!-- end main content column -->
        <!-- Right Side Column -->
        <div id="sideCol">
            <h1>Get Involved</h1>
            <p>We provide web-based tools for visualizing watershed and designing land use and runoff management alternatives on the landscape.</p>
            <div class="barButton"><a href="http://wrestore.iupui.edu/visualize-design/how-it-works/" target="_blank">How does Wrestore work?</a></div>
            <div class="barButton"><a href="http://wrestore.iupui.edu/partners/" target="_blank">Meet our partners</a></div>
            <div class="barButton"><a href="http://wrestore.iupui.edu/resources/" target="_blank">Learn about our tools</a></div>
            <div class="barButton"><a href="http://wrestore.iupui.edu/contact/" target="_blank">Questions? Contact us</a></div>
        </div>
        <div class="clear"></div>
    </div><!-- end mainFrame -->
    <div class="row footer">
        <div id="sponsorsCon">
            <h2>Sponsors</h2>
            <a href="http://www.iupui.edu/" target="_blank"><img src="images/logoIUPUI.gif" width="200" height="76" alt="IUPUI" class="sponsorsLogos"></a>
            <a href="http://oregonstate.edu/" target="_blank"><img src="images/logoOsu.gif" width="200" height="76" alt="Oregon State University" class="sponsorsLogos"></a>
            <a href="http://www.nsf.gov/" target="_blank"><img src="images/logoNsf.gif" alt="NSF" width="75" height="76" class="sponsorsLogos"></a>
        </div><!-- end sponsorsCon -->
    </div>
</div><!-- end Wrapper -->

<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
<script type="text/javascript" src="js/jquery.maskedinput.js"></script>
<script type="text/javascript" src="js/jquery.keyfilter.js"></script>
<script type="text/javascript" src="js/validate.js"></script>
</body>
</html>