<?php
//echo "Welcome : ".$_COOKIE["cookie_1"]."<br>"."<br>";//E: cookie is not set yet
session_start();
//echo "Hi: ".$_SESSION['user_name'];//E: For checking
$pid_fresh = $_SESSION['user_name'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--<html xmlns="http://www.w3.org/1999/xhtml" style="height: 100vh; overflow: hidden; width: 100%;">-->
<html xmlns="http://www.w3.org/1999/xhtml" style="height: 100vh">
<head>
    <!--  Selection of options  -->
    <!--  PHP: Line 90  -->
    <!--  JS: Line 1062  --> 

    <meta charset=utf-8>
    <meta http-equiv="X-UA-Compatible" content="IE=8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WRESTORE - Watershed REstoration using Spatio-Temporal Optimization of REsources</title>

    <!--  Style libraries created for this webpage  -->
    <link rel="stylesheet" type="text/css" href="css/basic.css"/>
    <link rel="stylesheet" type="text/css" href="css/gdropdown.css"/>
    <link rel="stylesheet" type="text/css" href="css/map_legend.css">
    <link rel="stylesheet" type="text/css" href="css/star.css"/>
    <link rel="stylesheet" type="text/css" href="css/style1a.css"/>
    <!-- 'style.css' file was renamed as 'css/style1b.css' -->
    <link rel="stylesheet" type="text/css" href="css/style1b.css"/>
    <link rel="stylesheet" type="text/css" href="css/style2.css"/>
    <link rel='stylesheet' type='text/css' href='css/styles.css'/>
    <link rel="stylesheet" type="text/css" href="css/visualize.css"/>
<!--    <link rel="stylesheet" type="text/css" href="css/SimpleStarRating.css"/>-->

    <!--  Style-libraries retrieved from the web  -->
    <link rel="stylesheet" type="text/css" href="js/shadowbox/shadowbox.css"/>
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- (3 - no) http  -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Oswald:400,300' type='text/css'>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>

    <!-- JS: Javascript libraries -->
    <!-- (4 - no) http  -->
    <script src='//maps.googleapis.com/maps/api/js'></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVNzONb19t-556kuu-ebT5DUF0wCpEt-g&callback=initMap"
            type="text/javascript"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <!-- (7 - no) http  -->
    <script type='text/javascript' src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script type='text/javascript' src="bootstrap/js/bootstrap.min.js"></script>

    <!--[if IE]><![endif]-->
<!--    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>-->
<!--    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>-->

    <!-- This script makes toggling and tracking the legend in the main-map and 4 heat-maps -->
    <script type="text/javascript" src="js/legend_plug.js"></script>
    <!-- This script build the DOM-legend in the main-map -->
    <script type="text/javascript" src="js/legend_dom.js"></script>

    <script type="text/javascript" src="js/json2.js"></script>
<!--    <script type="text/javascript" src="js/jquery.collapsible.js"></script>-->
    <script type="text/javascript" src="js/bargraphcpy_g2c.js"></script>
    <script type='text/javascript' src='js/fda.js'></script>
    <script type='text/javascript' src='js/mt_config.js'></script>

<!--    DATA    -->
    <script src="data/ecw4b.js"></script> <!-- Here goes the JS.File name. var "subbasin_json" -->
    <script src="data/ecw_border.js"></script> <!-- JS.File name. var "Watershed border" -->
    <script src="data/stream_g.js"></script> <!-- Here goes the JS.File name. var "stream_json" -->
    <!-- It brings the JS.File name. var "optimiz_json" - Selection of DB L.1200 - See L.96 -->
    <!--    <script src="data/takefeedback2b.js"></script>-->

    <!--  Google chart lybrary load  -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        // //window.onload(heatinitialize);
        // google.load("visualization", "1", {packages:["corechart"]});
        // google.setOnLoadCallback(subBasinGraph1);

        // google.charts.load('current', {packages: ['corechart']});//E: New Library Loader Code. last version
        google.charts.load('45', {packages: ['corechart']});//E: New Library Loader Code. version 45
        google.charts.setOnLoadCallback(subBasinGraph1);
    </script>
    
    <!--  EE: Tracking module  -->
    <script type='text/javascript'>
        // The automaton is: s_start --one--> s_one --two--> s_two --three--> s_end
		// In the transition between s_two and s_end, when three is clicked, we invoke the submitData()
		// method, to store all collected data up to the moment.

        fda.addTransition('s_start', 'one', 's_one');
        fda.addTransition('s_one', 'two', 's_two');
        //fda.addTransition('s_two', 'three', 's_end', function() { submitData() });
        fda.addTransition('s_two', 'three', 's_end');

        var myObj = JSON.stringify(fda.data.s_start);

        //EE: If we are also interested in knowing whether the browser window is resized, we set this to true.
        mt_detect_resize = true;

        //EE: This function must be invoked, and it has to go last.
        $(document).ready(init);
    </script>
    
</head>
<!--  -------------------- START BODY --------------------  -->
<body name="body">
<!--  E: This "WRAPPER" Div encloses the whole page, after "BODY" without js Scripts -->
<div class="wrapper"> <!-- style="background:#e6ffcc;" #e6ffcc; #99ff66; #e6ff0c; -->

<!--  E: This PHP reads/grabs the data from the DB and creates a "TABLE" Html-tag to save them on it -->
<?php
////EE: Options for DATA-BASE (L.1218 database_option = 2)
////EE: For option 2, Turn-on src="data/takefeedback2b.js" (in L.60).Turn-off both, becaus JSON doesn't need none ofthem
//// EE: For Option 1, Turn-on 'read_database.php', but NOT 'read_db.php'.
//// EE: For Option 3, Turn-on 'read_db.php', but NOT 'read_database.php'.

//include ('read_database.php');//EE: Turn-Off when 'database_option' is 2 or 3.
include ('read_db.php');//EE: TurnOff when 'database_option' is 1 or 2

?>

<!--[if lte IE 6]><script src="js/ie6/warning.js"></script><script>window.onload=function(){e("js/ie6/")}</script><![endif]-->

<div class="container-fluid px-2">
    <!--  row 1 -->
    <!--  ================= LINE-1: WRESTORE TITTLE  ===================== -->
    <div class="row no-gutters">
        <div class="col-xl-3 col-lg-4 col-md-4 debug">
            <div class="row1-box1">WRESTORE</div>
        </div>
        <div id="row1-box2a" class="col-xl-2 col-lg-6" style="display: grid; vertical-align: middle; text-align:
        center">
            <div class="row1-box2" style="display: none /*inline-block*/">Eagle Creek watershed</div>
        </div>
        <div class="col-xl-7 col-lg-8 col-md-8 debug">
            <div class="row1-box3a ">
                <h2 class="row1-box3a" name="site_header2" style="padding-top: 5px; color: black;">
                    Watershed Restoration using Spatio-Temporal Optimization of Resources
                </h2>
                <h3 class="row1-box3b" name="site_header3" style="letter-spacing: 2px;">
                    Visualize & Design Your Watershed Landscape
                </h3>
            </div>
        </div>
    </div>
    <!--  End: row 1  -->

    <!--  row 2  -->
    <!--  ================== LINE-2: "MENU  BAR" ================= -->
    <div class="row no-gutters" style="margin-bottom: 10px; border: 1px solid #285971; border-radius: 5px;
    background-color: #357697;">
        <div class="col-xl-9 col-lg-9 col-md-9 debug">
            <div id="line2-col1">
                <section id="content">
                    <p name="suggestionsNumberHeader" style="display: inline-block; padding: 0px 0px 0px 5px;
                    font-size: 17px; margin: 0px; color: #ffffff">Eagle Creek Watershed
                    </p>

                </section>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 debug" style="position: relative">
            <div id="line2-col2" style="float: right;">
                <div class="topnav" style="display: -webkit-inline-box;">

                    <div style="color: #FFFFFF">USER :
                        <span id="username_session_data" style="color: #ffffff; padding: 0px 5px"><?php echo $pid_fresh ?></span>
                        <span class="vl" style="border-left: 2px solid #ffffff"></span>
<!--                        <span id="session_pilot_test" style="color: #ffffff; padding: 0px 5px">session 1</span>-->
                        <span id="session_pilot_test" style="color: #ffffff; padding: 0px 5px">session neb-test</span>
                    </div>

                    <!--    MENU BAR as TEXT   -->
                    <!--                <a id="quit" class="trackable mainbuttons submitFeedbackJon" title="Option to quit current search-->
                    <!--                experiment" name="Quit" href="abort.html" rel="shadowbox;height=240;width=900">Quit</a>-->

                    <!--                <a id="save" class="trackable mainbuttons submitFeedbackJon" title="Option to save current design and-->
                    <!--                come back later" name="saveMapHeader" href="#" onclick="instruct();return false;">Save</a>-->

                    <!--                <a id="instructions" class="trackable mainbuttons submitFeedbackJon" title="Option to view instructions-->
                    <!--                again" name="InstructionsHeader" href="#" onclick="open_instruction();return false;">Instructions</a>-->

                    <!--                <a id="take_rest" class="trackable mainbuttons submitFeedbackJon" title="Option to stop the website-->
                    <!--                for a while" name="TakeRest" href="#" onclick="takeRest_function();return false;">Take a rest</a>-->

                    <!--    MENU BAR as ICONS   -->
                    <!--    "open_instruction()" function located at L.1884     -->
                    <button id="instructions" class="trackable mainbuttons2 submitFeedbackJon" onclick="open_instruction
                ()" title="View instructions" style="font-size:22px">
                        <i class="fa fa-info-circle"></i></button>

                    <!--    "pause_function()" function located at L.1906     -->
                    <button id="pause" class="trackable mainbuttons2 submitFeedbackJon" onclick="pause_function()"
                            title="Option to pause the website for a while" style="font-size:22px; display: none;">
                        <i class="fa fa-pause"></i></button>

                    <!--    "save_function()" function located at L.1938     -->
                    <button id="save" class="trackable mainbuttons2 submitFeedbackJon" onclick="save_function
                ()" title="Save the current design and come back later" style="font-size:22px">
                        <i class="fa fa-save"></i></button>


                    <button id="quit" class="trackable mainbuttons2 submitFeedbackJon" onclick="exit_wrestore()"
                            title="Quit the current search experiment" style="font-size:22px; display: none;">
                        <i class="fa fa-sign-out"></i></button>
                </div>
            </div>
        </div>
    </div>
    <!--  End: row 2  -->

    <!--  Start: row 3  -->
    <!--  ================ row 3: "Show the number of Suggestion bar (box) " =============== -->
    <div class="row no-gutters" style="margin-bottom: 5px; border: 1px solid #b3b3b3; border-radius: 5px;
    background-color: #d9d9d9;">
        <div class="col-xl-10 col-lg-10 col-md-9 debug">
            <div id="line2-col1">
                <section id="content">
                    <p name="suggestionsNumberHeader" style="display: inline-block; padding: 0px 5px; font-size:17px;
                     margin: 0px;">
                        Total number of <font color="#7d110c"><b>suggested plans</b></font> (i.e., conservation
                        plans) recommended in this session: 20 | <font color="#7d110c"><strong>Page
                                <span class="currentPage">1</span> of <span class="totalPages">20</span></strong></font>
                    </p>
                </section>
            </div>
        </div>

    </div>
    <!--  End: row 3  -->

    <!--    ================ LINE-4: MAIN MAP (STEP 1 and STEP 2) ================================  -->
    <!--  Start: row 4  -->
    <div class="row no-gutters row4">
        <!--        =================================== STEP 1 ======================================  -->

        <div class="col-xl-9 col-lg-8 col-md-8 debug" style="height: 100%">
    <!--Changed mapHolder to mapHolder1-->
            <div class="mapHolder1 map1" style="height: 100%">
                <div class="step_line" style="height: 26px;">
                    <div id="step1" class="step_box"
                     title="Lear about recommended conservation decisions in this
suggested plan by clicking inside each sub-basin in the map.
The left panel shows maps of how this suggestion effects
the costs and benefits over the watershed landscape">STEP 1:
                    </div>
                    <div>
                        <h4 class="step_title_text fontStepTitle">Learn about <font
                                    color="#7d110c"><strong>Suggested Plan SP<span
                                    class="oneMap"></span></strong></font>
                        </h4>
                    <!--  Selection of Type-MAP (Not in use)  -->
                        <div style="display: none; position: relative; top: 30px; left: 50px; z-index: 200;">
                            <button onclick="basemap_1.setMapTypeId(google.maps.MapTypeId.ROADMAP);">ROADMAP</button>
                            <button onclick="basemap_1.setMapTypeId(google.maps.MapTypeId.SATELLITE);">SATELLITE</button>
                        </div>
                        <!--  Full-screen buttom for main map  -->
                        <input id="fullscreen" class="trackable" title="Click here to display a fullscreen map" type="button"
                           value="Full-screen" style="position: relative; top: 55px;
     left: 20px; z-index: 200; width: 90px; height: 26px;/*background-color: #fcd4b5;*/ cursor: pointer" />
                    </div>

                    <!--   ++++++++++++++   inserting HeatMaps in STEP1 box  ++++++++++++++  -->
                    <!--                <div class ="heatmaps_frame1 collapsed" name='step1_alter'>-->
                    <div class ="panel_1 collapsed" name='step1_alter' style="display: none">
                        <!--                For testing   -->
                        <!--                <div name='step2collapse' class ="containerABC collapsed" style="position: relative; width: 250px;-->
                        <!--                left: 5px; top: 0px; z-index: 100; background-color: #ff9933; border: 2px solid black;">-->

                        <div id="tabs_hm" style="font-size: 12px; height: 100%;">
                            <ul class="tabs_heatmap">
                                <li><a id="step1_start" class="trackable" href="#info_heatmap">Info</a></li>
                                <li><a id="step1_PFR_tab" class="trackable" title="Peak Flow Reduction in cubic
meters per second (cms)" href="#tabs-PF">PFR</a></li>
                                <li style="display: none"><a id="step1_SR_tab" class="trackable" title="Sediment Reduction in tons" href="#tabs-SR">SR</a></li>
<!--                                <li><a id="step1_SR_tab" class="trackable" title="Sediment Reduction in tons" href="#tabs-SR">SR</a></li>-->
                                <li style="display: none"><a id="step1_NR_tab" class="trackable" title="Nitrate Reduction in kilograms (kg)" href="#tabs-NR">NR</a></li>
<!--                                <li><a id="step1_NR_tab" class="trackable" title="Nitrate Reduction in kilograms (kg)" href="#tabs-NR">NR</a></li>-->
                                <li style="display: none; width: 40px;"><a id="step1_P_tab" class="trackable" title="Profit (Revenue-Cost)
in US Dollars" style="margin: 0px 0px 0px 4px;" href="#tabs-RV">P</a></li>
                            </ul>
                            <div class="tab_container2">
                                <!--    ------------ (1a) tab-Info of HeatMap  ------------   -->
                                <div id="info_heatmap" class='tab_content2' style="height: 98%; overflow: auto;">
                                    <!--                            <div id="info_heatmap" class='tab_content2' style="height: 345px; overflow: auto; border: 1px solid red;">-->
                                    <h4 style="font-size: 20px">Instructions </h4>
                                    <p>Click on the PFR tab to view how the performance (i.e., benefits and costs) of this
                                        suggested plan spatially varies over the watershed. </p>
                                    <p>Acronyms stand for:</p>
                                    <ul>
                                        <li><p><b>PFR </b>is Peak Flow Reduction in cubic meters per second (cms)
                                                . This represents the benefit of reduced flooding in the
                                                landscape</p></li>
                                        <li style="display: none"><p><b>SR </b>is Sediment Reduction in tons. This represents the benefit of
                                                reduced erosion in the landscape.
                                            </p></li>
                                        <li style="display: none"><p><b>NR </b>is Nitrate Reduction in Kilograms (kg). This represents
                                                the benefit of reduced fertilizer loss in the landscape.</p></li>
                                        <li style="display: none"><p><b>P </b>is Profit (Revenue-Expenses) in US Dollars. This represents the
                                                monetary benefits minus costs accrued from implementing proposed conservation
                                                decisions on the landscape.</p></li>
                                    </ul>
                                </div>
                                <!--    ------------ (2a) tabs-PFR heatmap ------------   -->
                                <div id="tabs-PF" class="map1">
                                    <div class="tab-header2">
                                        <h4 class="fontStepTitle">Suggested Plan P<span class="oneMap"></span></h4>
                                        <input id="fullscreen_heatmap1" class="trackable" type="button" style="display: none"
                                               title="Click here to display a fullscreen map" value="fullscreen PFR"/>
                                    </div>
                                    <div id="heatMapHolderOne">
                                        <div id="oneMapPF" class="tip"></div>
                                        <!--  It draws them map1 -->
                                        <div id="heatmap_canvasPF1" name="heatmap_canvasPF1"></div>
                                    </div>
                                </div>
                                <div style="clear:both"></div>

                                <!--    ------------ (3a) tabs-SR heatmap --------   -->
                                <div id="tabs-SR" class="map1">
                                    <div class="tab-header2">
                                        <h4 class="fontStepTitle">Suggested Plan P<span class="oneMap"></span></h4>

                                        <input id="fullscreen_heatmap3" class="trackable" type="button" style="display: none"
                                               title="Click here to display a fullscreen map" value="fullscreen SR"/>
                                    </div>
                                    <div id="heatMapHolderOne">
                                        <div id="oneMapSR" class="tip"></div>
                                        <!--  It draws them map1 -->
                                        <div id="heatmap_canvasSR1" name="heatmap_canvasSR1"></div>
                                    </div>
                                </div>
                                <div style="clear:both"></div>

                                <!--    -----------  (4a)  tabs-NR heatmap ------   -->
                                <div id="tabs-NR" class="map1">
                                    <div class="tab-header2">
                                        <h4 class="fontStepTitle">Suggested Plan P<span class="oneMap"></span></h4>

                                        <input id="fullscreen_heatmap4" class="trackable" type="button" style="display: none"
                                               title="Click here to display a fullscreen map" value="fullscreen NR"/>
                                    </div>
                                    <div id="heatMapHolderOne">
                                        <div id="oneMapNR" class="tip"></div>
                                        <!--  It draws them map1 -->
                                        <div id="heatmap_canvasNR1" name="heatmap_canvasNR1"></div>
                                    </div>
                                </div>
                                <div style="clear:both"></div>

                                <!--    ------------ (5a) tabs-RV heatmap (Profit) --------   -->
                                <div id="tabs-RV" class="map1">
                                    <div class="tab-header2">
                                        <h4 class="fontStepTitle">Suggested Plan P<span class="oneMap"></span></h4>

                                        <input id="fullscreen_heatmap2" class="trackable" type="button" style="display: none"
                                               title="Click here to display a fullscreen map" value="fullscreen P"/>
                                    </div>
                                    <div id="heatMapHolderOne">
                                        <div id="oneMapRV" class="tip"></div>
                                        <!--  It draws them map1 -->
                                        <div id="heatmap_canvasRV1" name="heatmap_canvasRV1"></div>
                                    </div>
                                </div>
                                <div style="clear:both"></div>

                            </div>
                        </div>
                        <!--                @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@    -->
                    </div>
                    <script>
                        $( function() {
                            $("#tabs_bp").tabs();
                        } );
                    </script>
                    <!--   +++++++++++   finish insert HeatMaps in Step 1 +++++++++++ -->
                </div>
            
                <div id="mapHolderOne">

                    <div id="map_canvas1" name="map_canvas1"></div>

<!--                    <div style="display:none">-->
<!--                    <button onclick="basemap_1.setMapTypeId(google.maps.MapTypeId.ROADMAP);">Show ROADMAP</button>-->
<!--                    <button onclick="basemap_1.setMapTypeId(google.maps.MapTypeId.SATELLITE);">Show SATELLITE</button>-->

                    <!--  This try was not succesfull, instead see above.    -->
                    <!--  This worked with 'initMapTypeControl(basemap_1)' function (L.1584 of 'mapping_new.js'), but
                    they didn't work -->
                    <!--                    <div>-->
<!--                        <div id="mtc" class="controls maptype-control maptype-control-is-map">-->
<!--                            <button class="maptype-control-map" title="Show road map">Map</button>-->
<!--                            <button class="maptype-control-satellite" title="Show satellite imagery">Satellite</button>-->
<!--                        </div>-->
<!--                    </div>-->
                
                    <!--   ++++++++++++++   inserting HeatMaps in STEP1 box (Not in Use) ++++++++++++++  -->
                    <div class ="panel_1 collapsed" name='step1_alter' style="display: none">
<!--                For testing   -->
<!--                <div name='step2collapse' class ="containerABC collapsed" style="position: relative; width: 250px;-->
<!--                left: 5px; top: 0px; z-index: 100; background-color: #ff9933; border: 2px solid black;">-->

                        <div id="tabs_hm" style="font-size: 12px; height: 100%; margin: 2px 0px 0px 0px;">
                            <ul class="tabs_heatmap">
                                <li><a id="step1_start" class="trackable" href="#info_heatmap">Info+</a></li>
                                <li><a id="step1_PFR_tab" class="trackable" title="Peak Flow Reduction in cubic
meters per second (cms)" href="#tabs-PF">PFR</a></li>
                                <li><a id="step1_SR_tab" class="trackable" title="Sediment Reduction in tons" href="#tabs-SR">SR</a></li>
                                <li><a id="step1_NR_tab" class="trackable" title="Nitrate Reduction in kilograms (kg)" href="#tabs-NR">NR</a></li>
                                <li style="width: 40px;"><a id="step1_P_tab" class="trackable" title="Profit (Revenue-Cost)
in US Dollars" style="margin: 0px 0px 0px 4px;" href="#tabs-RV">P</a></li>
                            </ul>
                            <div class="tab_container2">
                            <!--    ------------ (1a) tab-Info of HeatMap (display: none)  ------------   -->
                                <div id="info_heatmap" class='tab_content2' style="/*height: 390px;*/ overflow: auto;">
<!--                            <div id="info_heatmap" class='tab_content2' style="height: 345px; overflow: auto; border: 1px solid red;">-->
                                    <h4 style="font-size: 20px">Instructions </h4>
                                    <p>Click on the PFR tab to view how the performance (i.e., benefits and costs) of this
                                    suggested plan spatially varies over the landscape. </p>
                                    <p>Acronyms stand for:</p>
                                    <ul>
                                        <li><p><b>PFR </b>is Peak Flow Reduction in cubic meters per second (cms)
                                            . This represents the benefit of reduced flooding in the
                                            landscape</p></li>
                                        <li><p><b>SR </b>is Sediment Reduction in tons. This represents the benefit of
                                            reduced erosion in the landscape.
                                            </p></li>
                                        <li><p><b>NR </b>is Nitrate Reduction in Kilograms (kg). This represents
                                            the benefit of reduced fertilizer loss in the landscape.</p></li>
                                        <li><p><b>P </b>is Profit (Revenue-Expenses) in US Dollars. This represents the
                                            monetary benefits minus costs accrued from implementing proposed conservation
                                            decisions on the landscape.</p></li>
                                    </ul>
                                </div>
                            <!--    ------------ (2a) tabs-PFR heatmap (display: none) ------------   -->
                                <div id="tabs-PF" class="map1">
                                    <div class="tab-header2">
                                        <h4 class="fontStepTitle">Suggestion <span class="oneMap"></span></h4>
                                        <input id="fullscreen_heatmap1" class="trackable" type="button" style="display: none"
                                           title="Click here to display a fullscreen map" value="fullscreen PFR"/>
                                    </div>
                                    <div id="heatMapHolderOne">
                                        <div id="oneMapPF" class="tip"></div>
                                    <!--  It draws them map1 -->
                                        <div id="heatmap_canvasPF1" name="heatmap_canvasPF1"></div>
                                    </div>
                                </div>
                                <div style="clear:both"></div>

                            <!--    ------------ (3a) tabs-SR heatmap (display: none) --------   -->
                                <div id="tabs-SR" class="map1">
                                    <div class="tab-header2">
                                        <h4 class="fontStepTitle">Suggestion <span class="oneMap"></span></h4>

                                        <input id="fullscreen_heatmap3" class="trackable" type="button" style="display: none"
                                           title="Click here to display a fullscreen map" value="fullscreen SR"/>
                                    </div>
                                    <div id="heatMapHolderOne">
                                        <div id="oneMapSR" class="tip"></div>
                                    <!--  It draws them map1 -->
                                        <div id="heatmap_canvasSR1" name="heatmap_canvasSR1"></div>
                                    </div>
                                </div>
                                <div style="clear:both"></div>

                            <!--    -----------  (4a)  tabs-NR heatmap (display: none) ------   -->
                                <div id="tabs-NR" class="map1">
                                    <div class="tab-header2">
                                        <h4 class="fontStepTitle">Suggestion <span class="oneMap"></span></h4>

                                        <input id="fullscreen_heatmap4" class="trackable" type="button" style="display: none"
                                           title="Click here to display a fullscreen map" value="fullscreen NR"/>
                                    </div>
                                    <div id="heatMapHolderOne">
                                        <div id="oneMapNR" class="tip"></div>
                                    <!--  It draws them map1 -->
                                        <div id="heatmap_canvasNR1" name="heatmap_canvasNR1"></div>
                                    </div>
                                </div>
                                <div style="clear:both"></div>

                            <!--    ------------ (5a) tabs-RV heatmap (Profit)(display:none) --------   -->
                                <div id="tabs-RV" class="map1">
                                    <div class="tab-header2">
                                        <h4 class="fontStepTitle">Suggestion <span class="oneMap"></span></h4>

                                        <input id="fullscreen_heatmap2" class="trackable" type="button" style="display: none"
                                           title="Click here to display a fullscreen map" value="fullscreen P"/>
                                    </div>
                                    <div id="heatMapHolderOne">
                                        <div id="oneMapRV" class="tip"></div>
                                    <!--  It draws them map1 -->
                                        <div id="heatmap_canvasRV1" name="heatmap_canvasRV1"></div>
                                    </div>
                                </div>
                                <div style="clear:both"></div>

                            </div>
                        </div>
                    <!--                @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@    -->
                    </div>
                    <script>
                        $( function() {
                            $("#tabs_bp").tabs();
                        } );
                    </script>
                <!--   +++++++++++   finish insert HeatMaps in Step 1 +++++++++++ -->
                </div>
            </div>
        </div>
        <!--        =================================== STEP 2 ======================================  -->
        <!--   ++++++++++++++   inserting Barplots STEP2  ++++++++++++++  -->
        <!--        This 'div" is a false frame to positioning the 'heat-map' container    -->
        <div class="col-xl-3 col-lg-4 col-md-4 debug" style="height: 100%; padding-left: 8px;">
<!--        <div class="false_frame" style="margin: 4px 0px 4px 0px;">-->

            <div class="panel_2" name='step2_goals' style="/*width: 23.3%; right: 5px; top: 0px;*/">
<!--                <div class = "heatmap_header" style="height: 26px;">-->
                <div class = "step_line" style="height: 26px; margin: 0px 0px 3px 0px;">
                    <div id='step2' class="step_box" name="step2" style="width: 75px;"
                         title="Learn about how costs and benefits of this suggested plan
compare to those of other recommended suggested-plans
(on previous or following pages of this session)">
                        STEP 2:
                    </div>
                    <div>
                        <h4 class="step_title_text fontStepTitle">Evaluate <font color="#7d110c"><strong>Suggested
                                    Plan SP<span class="oneMap"></span></strong></font> </h4>
                    </div>
                </div>

                <div class="graph">
<!--                    <div class="dropDownArea">-->
                    <div class="dropDownArea" style="display: none">
                        <label style="margin: 0px 0px 0px 3px;">Choose a catchment of interest to you</label>
                        <select id="subDrop" title="Click here to select a sub-basin" name="subDrop"
                            style="margin: 0px 0px 0px 3px;" onchange='subBasinGraph1();selected_option();select_sb();
                            select_sb_heatmap_pfr();
                            select_sb_heatmap_rv();
                            select_sb_heatmap_sr();
                            select_sb_heatmap_nr();
                            '>
<!--                            <option id="watershed" value="Watershed" selected="selected">Full Watershed</option>-->
                            <option id="watershed" value="Watershed" selected="selected">Full Watershed</option>
                            <?php
                            $y=1;
                            while($y<=130){
                                print "<option id=SB-$y value=S$y>Subbasin $y</option>";
                                $y++;
                            }
                            ?>
                        </select>
                        <script>
                            //E: Function for tracking the selected subbasin
                            function selected_option() {
                                var theSelect = subDrop;
                                report('m-clk**  ' , "Sub-basin " + theSelect[theSelect.selectedIndex].value , ';');
                            }
                        </script>
                    </div>

                    <div id="tabs_bp" class="tabs_bp" style="font-size:12px; height: calc(100% - 46px); min-height:
                    450px;">
                        <ul class="tabs_barplot">
                            <li><a id="step2-start" class="trackable" href="#start_barplot" style="/*width:
                            40px*/">
                                    Info</a></li>
                            <li><a id="step2-PFR" class="trackable"  title="Peak Flow Reduction in cubic
meters per second (cms)" href="#PFR_barplot" >PFR</a></li>
                            <li style="display: none"><a id="step2-SR" class="trackable" title="Sediment Reduction in tons"
                                   href="#SR_barplot" > SR</a></li>
                            <li style="display: none"><a id="step2-NR" class="trackable" title="Nitrate Reduction in kilograms (kg)"
                                   href="#NR_barplot"> NR</a></li>
                            <li style="display: none; width: 40px;"><a id="step2-P" class="trackable" title="Profit (Revenue-Cost)
in US Dollars" style="margin: 0px 0px 0px
                            4px;" href="#CR_barplot" >P</a></li>
                        </ul>
                        <div class="tab_container1" style="height: calc(100% - 37px);">
                        <!--    ------------ (1b)  tabs-Info of BAR-PLOTs  ------------   -->
                        <div id="start_barplot" style="height: 99%; overflow: auto;">
<!--                        <div id="start_barplot" style="height: 406px; overflow: auto; border: 1px solid red">-->
                            <h4 style="font-size: 20px">Instructions </h4>
                            <p>Click on the PFR tab to view bar plots that assess the performance (i.e., benefits) of
                                this suggested plan in comparison to others.</p>
                            <p>Also, note the following about the bar plots:</p>
                            <ol>
                                <li>The yellow colored bar corresponds to the suggested plan you see on this page.</li>
                                <li>The other bars represent the rest of the suggested plans that you will be evaluating and
                                    will be highlighted similarly as you go through the pages.</li>
                                <li>The length of the bar corresponds to an average value of the benefit.
                                    When thin lines are present with the bars, they indicate the range (i.e.,
                                    minimum and maximum values) of the cost or benefit.</li>
                                <li><p>Acronyms stand for:</p>
                                    <ul style="list-style-type:disc">
                                        <li><p><b>PFR </b>is Peak Flow Reduction in cubic meters per second (cms)
                                                . This represents the benefit of reduced flooding in the
                                                landscape</p></li>
                                        <li style="display: none"><p><b>SR </b>is Sediment Reduction in tons. This represents the benefit of
                                                reduced erosion in the landscape.
                                            </p></li>
                                        <li style="display: none"><p><b>NR </b>is Nitrate Reduction in Kilograms (kg). This represents
                                                the benefit of reduced fertilizer loss in the landscape.</p></li>
                                        <li style="display: none"><p><b>P </b>is Profit (Revenue-Cost) in US Dollars. This represents the
                                                expenses and revenue accrued from implementing proposed conservation
                                                decisions on the landscape.</p></li>
                                    </ul>
                                </li>
                            </ol>
                        </div>
                        <!--    ------------ (2b)  tabs-PFR Barplot ------------   -->
                        <div id="PFR_barplot" style="height: 100%; overflow-x: hidden; overflow-y: overlay;">
                            <div id="chart_div1"></div>
                            <div style="position: absolute; width: 250px; top: 428px;/*top: 385px;*/ left:35px; padding: 0px 10px;
                            background-color: #fde3ce; border:1px solid #f77e22; border-radius: 3px; font-size:
                            11px; color: #7d110c;">
                                PFR in Cubic meters per second (cms)
                            </div>
<!--                            <div style="position: absolute; transform: rotate(270deg); top: 200px; left:-42px;">-->
                            <div style="position: absolute; transform: rotate(270deg); top: 200px; left:-55px;">
                                Suggested Plans - SP
                            </div>
                        </div>
                        <!--    ------------ (3b)  tabs-Cost Barplot ------------   -->
                        <div id="CR_barplot" style="height: 100%; overflow-x: hidden; overflow-y: overlay;">
                            <div id="chart_div2"></div>
                            <div style="position: absolute; width: 220px; top: 385px; left:35px; padding: 0px 10px;
                            background-color: #fde3ce; border:1px solid #f77e22; border-radius: 3px; font-size:
                            11px; color: #7d110c;">
                                Profit in US Dollars
                            </div>
                            <div style="position: absolute; transform: rotate(270deg); top: 200px; left:-42px;">
                                Suggested Plans - SP
                            </div>
                        </div>
                        <!--    ------------ (4b)  tabs-Sed. Red. Barplot  ------------   -->
                        <div id="SR_barplot" style="height: 100%; overflow-x: hidden; overflow-y: overlay;">
                            <div id="chart_div3"></div>
                            <div style="position: absolute; width: 240px; top: 385px; left:35px; padding: 0px 10px;
                            background-color: #fde3ce; border:1px solid #f77e22; border-radius: 3px; font-size:
                            11px; color: #7d110c;">
                                Sediment Reduction in tons
                            </div>
                            <div style="position: absolute; transform: rotate(270deg); top: 200px; left:-42px;">
                                Suggested plans
                            </div>

                        </div>
                        <!--    ------------ (5b)  tabs-Nit. Red Barplot  ------------   -->
                        <div id="NR_barplot" style="height: 100%; overflow-x: hidden; overflow-y: overlay;">
                            <div id="chart_div4"></div>
                            <div style="position: absolute; width: 240px; top: 385px; left:35px; padding: 0px 10px;
                            background-color: #fde3ce; border:1px solid #f77e22; border-radius: 3px; font-size:
                            11px; color: #7d110c;">
                                Nitrate Reduction in kilograms (kg)
                            </div>
                            <div style="position: absolute; transform: rotate(270deg); top: 200px; left:-42px;">
                                Suggested plans
                            </div>
                        </div>
                    </div>
                    </div>
                </div>

<!--                @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@    -->
            </div>
            <script>
                $( function() {
                    $("#tabs_hm").tabs();
                });
            </script>

<!--        </div>-->
        </div>
        <!--    +++++++++++  finish inserting Barplots in STEP2  +++++++++++ -->

<!--        <div style="clear:both"></div>-->
<!--    </form>-->
    </div>
    <!--  End: row 4  -->
</div> <!--  End "container-fluid" (1) -->
    <div style="clear:both"></div>



    <!--     *******  Inserting RATING (STEP 3) (TWO Questions)  *********  -->
    <!--  Start "container-fluid" (2) -->
    <div class="container-fluid px-2 mt-2">
        <div class="row no-gutters">

            <!-- GoTo Back Suggestion  -->
            <div class="debug" style="width: 13%">
                <div class="rating_backnext debug">
                    <div class="l6_box" style="/*border: 1px solid; border-radius: 5px*/">
                        <input id="Back" class="barBlue moveBack" type="button" name="Back"
                               title="Click here to back to the previous suggestion plan"
                               value="&lt;&lt; Previous Suggestion" />
                    </div>
                </div>
            </div>

            <!--  Rating  -->
            <div class="debug" style="width: 74%">
                <div class="rating_backnext debug">
                    <div class="vote_section" style="position: relative; /*left: 345px; top: -515px;*/ z-index: 100;">
                        <div class="step_line">
                            <div class="step_box" name="step3" title="Let's Vote!" style="height: 26px;">STEP 3:</div>
                            <!--                <div class="displayStuffa">Provide a rating for the <b>alternative</b> shown above</div>-->

                            <!--  ---------- QUESTION 1 ------------- -->
                            <div>
                                <div class="map1" style="height:25px; display: inline-flex; margin: 5px;">
                                    <div>
                                        <h4 class="step_title_text fontStepTitle">Rate <font color="#7d110c">
                                                <strong>Suggested Plan P<span class="oneMap"></span></strong></font>
                                            based on its performance
                                        </h4>
                                    </div>

                                    <div class="innerMapLines" style="min-width: 120px;">
                                        <div class="rating">
                                            <!-- class was set for checking the last SP. See Jquery L.2133 -->
                                            <input id='perform_rate_0_stars' class="trackable check_last_SP" name="rating1"
                                                   type="radio" value="0" checked /><span id="hide"></span>
                                            <input id='perform_rate_1_stars' class="trackable check_last_SP" name="rating1"
                                                   type="radio" value="1" /><span></span>
                                            <input id='perform_rate_2_stars' class="trackable check_last_SP" name="rating1"
                                                   type="radio" value="2" /><span></span>
                                            <input id='perform_rate_3_stars' class="trackable check_last_SP" name="rating1"
                                                   type="radio" value="3" /><span></span>
                                            <input id='perform_rate_4_stars' class="trackable check_last_SP" name="rating1"
                                                   type="radio" value="4" /><span></span>
                                            <input id='perform_rate_5_stars' class="trackable check_last_SP" name="rating1"
                                                   type="radio" value="5" /><span></span>
                                            <input id='perform_rate_6_stars' class="trackable check_last_SP" name="rating1"
                                                   type="radio" value="6" /><span></span>
                                            <input id='perform_rate_7_stars' class="trackable check_last_SP" name="rating1"
                                                   type="radio" value="7" /><span></span>

                                            <input name="rating1" type="text" class="padInput" id="rating1" size="2" />
                                        </div>
                                    </div>

                                    <div class="innerMapLinesHead1">
                                        <h4>How confident are you about your rating? (%)</h4>
                                    </div>
                                    <div class="innerMapLines1">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td width="22%"><input name="confidence1" type="text" id="confidence1" size="3" readonly="readonly"/></td>
                                                <td width="78%"><div id="slider"></div></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>


                            <!--  ---------- QUESTION 2 ------------- -->
                            <div style="display:none;">
                                <div class="map1" style="display: inline-flex; margin: 5px;">
                                    <div>
                                        <h4 class="step_title_text fontStepTitle">
                                            based on its feasibility
                                        </h4>
                                    </div>

                                    <div class="innerMapLines" style="min-width: 120px;">
                                        <div class="rating">
                                            <input id='step3_star0' class="trackable" name="rating2"
                                                   type="radio" value="0" checked /><span id="hide"></span>
                                            <input id='step3_star1' class="trackable" name="rating2"
                                                   type="radio" value="1" /><span></span>
                                            <input id='step3_star2' class="trackable" name="rating2"
                                                   type="radio" value="2" /><span></span>
                                            <input id='step3_star3' class="trackable" name="rating2"
                                                   type="radio" value="3" /><span></span>
                                            <input id='step3_star4' class="trackable" name="rating2"
                                                   type="radio" value="4" /><span></span>
                                            <input id='step3_star5' class="trackable" name="rating2"
                                                   type="radio" value="5" /><span></span>
                                            <input id='step3_star6' class="trackable" name="rating2"
                                                   type="radio" value="6" /><span></span>
                                            <input id='step3_star7' class="trackable" name="rating2"
                                                   type="radio" value="7" /><span></span>
                                            <input name="rating2" type="text" class="padInput" id="rating2" size="2" />
                                        </div>
                                    </div>

                                    <div class="innerMapLinesHead1">
                                        <h4>How confident are you about your rating? (%)</h4>
                                    </div>
                                    <div class="innerMapLines1">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td width="22%"><input name="confidence1" type="text" id="confidence1" size="3" readonly="readonly"/></td>
                                                <td width="78%"><div id="slider"></div></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!--  GoTo Next Suggestion  -->
            <div class="debug" style="width: 13%">
                <div style="/*border: 1px solid; border-radius: 5px*/">
                    <input id="Next" class="barBlue moveNext" type="button" name="Next"
                           title="Click here to move to the next suggestion plan" style="position:
                relative; float: right;" value="Next Suggestion &gt;&gt;" />
                </div>
            </div>

        </div>
    </div> <!--  End "container-fluid" (2) -->


<!-- ===================================  VOLADIZOS  =================================== -->
    <!--  VOLADIZOS  -->
    <!--  (1) Voladizo 1: TEST -->


    <!--  (2) Voladizo 2: DataBase  -->
    <textarea name="JSONHolder" id="JSONHolder" cols="45" rows="5" style="display: none;"></textarea>
<!--    <textarea name="JSONHolder" id="JSONHolder" cols="45" rows="5"></textarea>-->

    <!--  (3) Voladizo 3: SVG circle-shapes for representing Wetlands into the main map -->
    <!--  Start SVG  -->
    <!--  (width, height, cx,cy,r) = (box_width, box_height, coord_x, coord_y, radius)  -->
    <div style="display: none">
<!--    <div>-->
        <!--    CIRCLEs    -->
        <div id="div1">wetlands' Circles: r = 3.5, 4.5, 5.0, 5.5, 6.0, 7.0, 7.5</div>
        <div id="div1">wetlands' Ranges: r = [<2], [2-6], [6-11], [11-15], [15-29], [29-40], [>40]</div>

        <svg id="svg1" width="7" height="7">
<!--            <circle cx="3.5" cy="3.5" r="3.5" fill="#336699" />-->
<!--            <circle cx="3.0" cy="3.0" r="3.0" stroke="#001141" stroke-width="1" fill="#001141" />-->
            <circle cx="3.0" cy="3.0" r="3.0" stroke="#003300" stroke-width="1" fill="#006600" />
            Sorry, your browser does not support inline SVG.
        </svg>
        <svg id="svg2" width="9" height="9">
<!--            <circle cx="4.5" cy="4.5" r="4.5" fill="#e600e6" />-->
<!--            <circle cx="4.0" cy="4.0" r="4.0" stroke="#001141" stroke-width="1" fill="#00258d" />-->
            <circle cx="4.0" cy="4.0" r="4.0" stroke="#003300" stroke-width="1" fill="#006600" />
            Sorry, your browser does not support inline SVG.
        </svg>
        <svg id="svg3" width="10" height="10">
<!--            <circle cx="5" cy="5" r="5" fill="#ff6666" />-->
<!--            <circle cx="4.5" cy="4.5" r="4.5" stroke="#001141" stroke-width="1" fill="#003be0" />-->
            <circle cx="4.5" cy="4.5" r="4.5" stroke="#003300" stroke-width="1" fill="#009900" />
            Sorry, your browser does not support inline SVG.
        </svg>
        <svg id="svg4" width="11" height="11">
<!--            <circle cx="5.5" cy="5.5" r="5.5" fill="#00b300" />-->
<!--            <circle cx="5" cy="5" r="5" stroke="#00258d" stroke-width="1" fill="#1d68eb" />-->
            <circle cx="5" cy="5" r="5" stroke="#009900" stroke-width="1" fill="#00cc00" />
            Sorry, your browser does not support inline SVG.
        </svg>
        <svg id="svg5" width="12" height="12">
<!--            <circle cx="6" cy="6" r="6" fill="#e6b800"/>-->
<!--            <circle cx="5.5" cy="5.5" r="5.5" stroke="#003be0" stroke-width="1" fill="#3891eb"/>-->
            <circle cx="5.5" cy="5.5" r="5.5" stroke="#00cc00" stroke-width="1" fill="#00ff00"/>
            Sorry, your browser does not support inline SVG.
        </svg>
        <svg id="svg6" width="14" height="14">
<!--            <circle cx="7" cy="7" r="7" fill="#1ad1ff" />-->
<!--            <circle cx="6" cy="6" r="6" stroke="#1d68eb" stroke-width="1" fill="#51b6eb" />-->
            <circle cx="6" cy="6" r="6" stroke="#00cc00" stroke-width="1" fill="#33ff33" />
            Sorry, your browser does not support inline SVG.
        </svg>
        <svg id="svg7" width="16" height="16">
<!--            <circle cx="7.5" cy="7.5" r="7.5" fill="#ff3300" />-->
<!--            <circle cx="6.5" cy="6.5" r="6.5" stroke="#3891eb" stroke-width="1" fill="#6bdceb" />-->
            <circle cx="6.5" cy="6.5" r="6.5" stroke="#00ff00" stroke-width="1" fill="#66ff66" />
            Sorry, your browser does not support inline SVG.
        </svg>

        <!--    RECTANGLEs    -->
        <svg id="label_rect" width="25" height="15">
            <!-- create a rectangle with rounded corners. Retrieved from: https://www.w3schools.com/graphics/svg_rect.asp -->
<!-- Set "fill-opacity:0; stroke-opacity:0" to not see the DOM box -->
            <rect x="1" y="1" rx="2" ry="2" width="23" height="13" style="fill:yellow; stroke:black; stroke-width:1;
            fill-opacity:0; stroke-opacity:0"/>
            Sorry, your browser does not support inline SVG.
        </svg>
        <svg id="rectangle1" width="22" height="22">
            <!-- create a rectangle with rounded corners. Retrieved from: https://www.w3schools.com/graphics/svg_rect.asp -->
            <!-- Set "fill-opacity:0; stroke-opacity:0" to not see the DOM box -->
            <rect x="1" y="1" rx="2" ry="2" width="20" height="20" style="fill:yellow; stroke:red; stroke-width:2;
            fill-opacity:0; stroke-opacity:1"/>
<!--        <rect x="x-coord y="y-coord" rx="x-radius" ry="y-radius" width="w-box" height="h-box" style="fill:yellow;
stroke:red; stroke-width:1; fill-opacity:0; stroke-opacity:1"/>-->
        </svg>
        <svg id="rectangle2" width="20" height="20">
            <rect x="1" y="1" rx="2" ry="2" width="18" height="18" style="fill:yellow; stroke:green; stroke-width:2;
            fill-opacity:0; stroke-opacity:1"/>
        </svg>
        <svg id="rectangle3" width="18" height="18">
            <rect x="1" y="1" rx="2" ry="2" width="16" height="16" style="fill:yellow; stroke:magenta; stroke-width:2;
            fill-opacity:0; stroke-opacity:1"/>
        </svg>
        <svg id="rectangle4" width="15" height="15">
            <rect x="2" y="1" rx="2" ry="2" width="12" height="12" style="fill:yellow; stroke:#663300; stroke-width:2;
            fill-opacity:0; stroke-opacity:1"/>
        </svg>
        <svg id="rectangle5" width="15" height="15">
            <rect x="4" y="3" rx="2" ry="2" width="8" height="8" style="fill:yellow; stroke:blue; stroke-width:2;
            fill-opacity:0; stroke-opacity:1"/>
        </svg>

    </div>
    <!--  End SVG - Voladizo (3) -->

    <!--  (4) Voladizo 4: Instructions BOX -->
    <!--  Start Instructions Box  -->
    <div id="shade_frame">
    </div>
<!--    <div id="inst_box1">-->
    <div id="instruction_box1">
        <div id="sb-title-inner" class="inst_base">
            WRESTORE Visualization Tool
        </div>
        <div id="message_box">
            <div id="ints_welcome-msg">
                <h2 style="font-family: 'Oswald', Arial, Helvetica, sans-serif;
                font-weight:normal; color:#7d110c;font-size:20px;/*font-weight:300;*/text-transform:uppercase;">
                    Instructions</h2>
                <div style="line-height:80%;"><br></div>
                <p>In this session, you will see multiple suggested plans for implementing new
                    conservation practices on the watershed landscape.</p>
                <div style="line-height:30%;"><br></div>
                <p>In WRESTORE, every <b>suggested plan</b> consists of multiple conservation
                    decisions distributed over the landscape. Each conservation decision describes the type of
                    recommended conservation practice (e.g. wetlands), location where the practice is implemented, and other
                    attributes such as size, etc.</p>
                <div style="line-height:30%;"><br></div>
                <p>You are advised to first learn about decisions recommended by a suggested conservation plan (i.e.
                    <b>Step 1</b>), then assess its performance in comparison to other plans suggested in the user
                    session (i.e. <b>Step 2</b>), and then finally evaluate the suggested plan based on its
                    overall performance (i.e. <b>Step 3</b>).</p>
                <div style="line-height:30%;"><br></div>
                <p>Your feedback will help WRESTORE create new conservation plans that best meet your
                    needs. For each session, you will be evaluating 20 suggested plans using the star rating in
                    Step 3.</p>
            </div>
        </div>
        <div class="cross"><img id="close_instruction" class="trackable cross_img"  onclick="close_instruction();"
                                title="Close" src="images/cross_img_15.png" alt=""/></div>
    </div>

    <script type="text/javascript">
        function close_instruction(){
//            alert ("hello instruction open");
            document.getElementById("shade_frame").style.display = "none";//EE: 'shade_frame' located at Voladizo 4
            document.getElementById("instruction_box1").style.display = "none";
        }
    </script>
    <!--  End Instructions Box - voladiizo 4 -->

    <!--  (5) Voladizo 5: PAUSE BOX -->
    <!--  Start PAUSE Box  -->
    <div id="shade_frame">
    </div>
<!--    <div id="inst_box1_tr">-->
    <div id="pause_box">
        <div id="sb-title-inner" class="inst_base">
            WRESTORE Visualization Tool
        </div>
        <div id="message_box">
            <div id="ints_welcome-msg">
                <h2 style="font-family: 'Oswald', Arial, Helvetica, sans-serif;
                font-weight:normal; color:#7d110c;font-size:20px;/*font-weight:300;*/text-transform:uppercase;">
                    Pause !</h2>
                <br>
                <p>You clicked on the Pause button. When you are ready to continue working with WRESTORE, please
                    close this window by clicking on the cross icon <img src="images/cross_img_15.png" style="width:
                    14px; height: 14px; border: 1px solid; border-radius: 50%"> (bottom right). </p>
                <br>
            </div>
        </div>
        <div class="cross"><img id="close_pause" class="trackable cross_img" onclick="close_tr_instruction();"
                                title="Close" src="images/cross_img_15.png" alt=""/></div>
    </div>
    <script type="text/javascript">
        function close_tr_instruction(){
//            alert ("hello instruction open");
            document.getElementById("shade_frame").style.display = "none";
            document.getElementById("pause_box").style.display = "none";
        }
    </script>
    <!--  End Pause Box - Voladizo 5 -->


    <!--  (6) Voladizo 6: SAVE-function BOX -->
    <!--  Start Save-function Box  -->
    <div id="shade_frame">
    </div>
    <div id="save_box1_tr">
        <div id="sb-title-inner" class="inst_base">
            WRESTORE Visualization Tool
        </div>
        <div id="message_box">
            <div id="ints_welcome-msg">
                <h2 style="font-family: 'Oswald', Arial, Helvetica, sans-serif; font-weight:normal; color:#7d110c;
                font-size:20px;/*font-weight:300;*/text-transform:uppercase;">
                    Save</h2>
                <br>
                <p>Your work has been saved. Please, close this window by clicking on the cross icon <img
                            src="images/cross_img_15.png" style="width:
                    14px; height: 14px; border: 1px solid; border-radius: 50%"> (bottom right) to continue. </p>
                <br>
            </div>
        </div>
        <div class="cross"><img id="close_save" class="trackable cross_img" onclick="close_save_msg();"
                                title="Close" src="images/cross_img_15.png" alt=""/></div>
    </div>
    <script type="text/javascript">
        function close_save_msg(){
//            alert ("hello instruction open");
            document.getElementById("shade_frame").style.display = "none";
            document.getElementById("save_box1_tr").style.display = "none";
        }
    </script>
    <!--  End Save-function Box - Voladizo (6) -->

    <!--  (7) Voladizo 7: INACTIVE-TIME  -->
    <!--  Start Inactive-time Box - These tags connect with the Inactive-time script at L.1965 (search: timeoutID) -->
    <div id="shade_frame">
    </div>
<!--    <div id="inst_box1_in">-->
    <div id="inactive_box">
        <div id="sb-title-inner" class="inst_base">
            WRESTORE Visualization Tool
        </div>
        <div id="message_box">
            <div id="ints_welcome-msg">
                <h2 style="font-family: 'Oswald', Arial, Helvetica, sans-serif;
                font-weight:normal; color:#7d110c;font-size:20px;/*font-weight:300;*/text-transform:uppercase;">
                    Inactive time</h2>
                <br>
                <p>It appears you are inactive on this page. When you are ready to continue working with WRESTORE,
                    please close this window by clicking on the cross icon <img src="images/cross_img_15.png" style="width:
                    14px; height: 14px; border: 1px solid; border-radius: 50%"> (bottom right). </p>
                <br>
<!--                <button id="continue_after_inactive" class="trackable" onclick="cont_after_inactive()">Continue</button>-->
            </div>
        </div>
        <div class="cross"><img id="close_inactive" class="trackable cross_img" onclick="cont_after_inactive();"
                                title="Close" src="images/cross_img_15.png" alt=""/></div>
    </div>
    <script type="text/javascript">
        function cont_after_inactive(){
//            alert ("hello instruction open");
            document.getElementById("shade_frame").style.display = "none";
            document.getElementById("inactive_box").style.display = "none";
        }
    </script>
    <!--  End Inactive-time Box - Voladizo (7) -->

    <!--  (8) Voladizo 8: END-EXPERIMENT-function BOX -->
    <!--  Start Save-function Box  -->
    <div id="shade_frame"></div>
    <div id="end_experiment_box">
        <div id="sb-title-inner" class="inst_base">
            WRESTORE Visualization Tool
        </div>
        <div id="message_box">
            <div id="ints_welcome-msg">

                <!--  For SESSION 1 -->
                <h2 style="font-family: 'Oswald', Arial, Helvetica, sans-serif; font-weight:normal; color:#7d110c;
                font-size:20px;/*font-weight:300;*/text-transform:uppercase;">
                    End of Session 1</h2>
                <br>
                <p>You have reached the end of session 1. Please, close this window by clicking on the button
                     (below) to exit.</p>

                <!--  For SESSION 2 -->
<!--                <h2 style="font-family: 'Oswald', Arial, Helvetica, sans-serif; font-weight:normal; color:#7d110c;-->
<!--                font-size:20px;/*font-weight:300;*/text-transform:uppercase;">-->
<!--                    End of Session 2</h2>-->
<!--                <p>You have reached the end of this experiment. Please, close this window by clicking on the button-->
<!--                    (below) to exit.</p>-->
                <br>
                <div>
                    <button id="end_session" class="trackable" onclick="exit_wrestore()"
                            title="Close the current experiment session">Exit
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function exit_wrestore(){
//            alert ("hello instruction open");
            document.getElementById("shade_frame").style.display = "none";
            document.getElementById("end_experiment_box").style.display = "none";
        }
    </script>
    <!--  End End-Experiment-function Box - Voladizo (8) -->

    <!--  ===========================  End VOLADIZOS ============================== -->
</div>
<!-- E: end the "wrapper" Div which holds the all page after "BODY" Div -->

<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<link href="js/shadowbox/shadowbox.css" rel="stylesheet" type="text/css"/>
<link href="https://ajax.googleapis.com/ajax/static/modules/gviz/1.0/core/tooltip.css" rel="stylesheet" type="text/css"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
<script type="text/javascript" src="https://filamentgroup.github.com/EnhanceJS/enhance.js"></script>

<script type="text/javascript" src="js/jquery.maskedinput.js"></script>
<script type="text/javascript" src="js/jquery.keyfilter.js"></script>
<script type="text/javascript" src="js/shadowbox/shadowbox.js"></script>
<!--<script type="text/javascript" src="js/set_polygons.js"></script>-->
<script type="text/javascript" src="js/mapping_new_g2c.js"></script>
<script type="text/javascript" src="js/heatmapnew1_g2c.js"></script>
<script type="text/javascript" src="js/visualize.jQuery.js"></script>
<script type="text/javascript" src="js/excanvas.js"></script>
<script type="text/javascript" src="js/graphing.js"></script>
<script type="text/javascript" src="js/graphingSub.js"></script>
<!-- This script make shuffling action of 20 alternatives. It works directly with g2c.php -->
<script type="text/javascript" src="js/shuffling.js"></script>
<!-- This script makes toggling and tracking on conservation-practice checboxs -->
<script type="text/javascript" src="js/checkbox_plug.js"></script>
<!-- This script switch the type of map -->
<script type="text/javascript" src="js/maptype_plug.js"></script>

<script type="text/javascript">
    Shadowbox.init();
</script>

<!--  Start TOOLTIP TOOL TIP -->
<!--  E: This 'script' sets a message on some icons when hovering  -->
<script type="text/javascript">
    $(document).ready(function() {
        // Tooltip only Text
        $('.masterTooltip').hover(function(){
            // Hover over code
            var title = $(this).attr('title');
            $(this).data('tipText', title).removeAttr('title');

//            $("body").append("p class='tooltip'" +   title + "</p>")
//                .fadeIn('fast');
            $("<p class='tooltip'></p>")
                .text(title)
                .appendTo('body')
                .fadeIn('fast');
        }, function() {
            // Hover out code
            $(this).attr('title', $(this).data('tipText'));
            $('.tooltip').remove();
        }).mousemove(function(e) {
            var mousex = e.pageX + 20; //Get X coordinates
            var mousey = e.pageY + 10; //Get Y coordinates
            $('.tooltip')
                .css({ top: mousey, left: mousex })
        });
    });
</script>
<!--  End TOOLTIP TOOL TIP -->


<script type="text/javascript">
    //=================== SELECT THE DATABASE ==================== //
    //    After selecting "database_option", set the corresponding files in L.95
    var database_option = 3;//EE: MySQL(as-html) = 1; JSON = 2; MySQL(as-json) = 3
    var debug_js = 0;//EE: for debugging set 1
//    var testing = json_from_mysql;
//    alert("testing:" + testing);

    if (database_option == 2) {
        var nsga2_values_as_json = optimized_values;//EE: 'optimized_values' comes from 'data/takefeedback' file
        if (debug_js == 1) alert ("L.821 Database_option: "+ database_option + "  data from JS file as JSON");
    }
    else if (database_option == 3) {
        //E: 'json_from_mysql' comes from "read_db.php". It was obtained by encoding the MySQL database into JSON
        // format. Check "read_db.php" for more detail
        var nsga2_values_as_json = json_from_mysql;
        //E: console.log ("L.889 data coming from PHP: \n"+ aux1);
        console.log ("L.1185 test 1: \n"+ Object.keys(nsga2_values_as_json[0]).length);//E: get number of JSON objects
//        console.log ("L.1186 test 1: \n"+ JSON.stringify(nsga2_values_as_json[0]));
        if (debug_js == 1) alert ("L.1187 Database_option: "+ database_option + "  data from MySQL as JSON");
    }
    else {//E: If database_option == 1, or acidentally another value is given
        database_option = 1//EE: By default 'database_option' is set as 1
        if (debug_js == 1) alert ("L.1191 Database_option: "+ database_option + "  data from MySQL as html");
    }


    // ====================            start   SAVING the "wholeTable" in some arrays        ====================== //
    //E:The next chunk of code saves all the data from the table ("wholeTable") at the top of the page in Arrays that
    // we can access for all things. Also creates the answers array that we need to pass the answers. If you ever
    // want to see any of these arrays you can use the structure // alert(JSON.stringify(arrayName)); where arrayName
    // is the name of the array you want to see.
//    var array = [];
    var array_fullvalues = [];//EE: It'll store all values of 'wholeTable'
    var headers = [];//EE: It'll store all header of 'wholeTable'
    var answersArray =[];//EE: It'll store RATING and CONFIDENCE (answer) values of 'wholeTable' of 20 alternatives
    var fn_obj_array =[];//EE: It'll store values of F0,F1,F2,F3,F4,F5 (objective functions) of 'wholeTable' of 20 alt


    //EE: .............................. Start:(1) HEADERS  .........................
    //EE: ****************************** MySQL or JSON ************************************
    if (database_option == 1) {
        //EE: .............................. (1) Headers using MySQL  .........................
        //E: it gets the headers of the 'WholeTable' and saves as 'headers'
        if (debug_js == 1) alert ("L.1212 Databse: MySQL");
        $('#wholeTable th').each(function (index, item) {
            headers[index] = $(item).html();
        });
        console.log("L.1216 headers: \n" + JSON.stringify(headers));//EE: Show the headers of 'wholeTable'
        //EE: .............................. End:(1) Headers using MySQL  .........................
    }
    else {//E: This is for "database_option == 2" and "database_option == 3"
        //EE: .............................. Start:(1) Headers using JSON  .........................
        // E: This works when the data comes in JSON format either for "database_option == 2" or "database_option == 3"
        // E: Above "nsga2_values_as_json" takes "optimized_values" for "database_option == 2"
        // E: Above "nsga2_values_as_json" takes "json_from_mysql" for "database_option == 3"
//        if (debug_js == 1) alert ("L.1268 Databse: JSON");
        var nsga2_values = nsga2_values_as_json;//EE: Values obtained from optimization process by NSGA2 algorithm

        var headers = Object.keys(nsga2_values[0]);
//        console.log("L.954 nsga2_values: \n" + JSON.stringify(nsga2_values));//E: show full data
        console.log ("L.1229 test 1: \n"+ Object.keys(nsga2_values[0]).length);//E: get number of JSON objects
        console.log("L.1230 headers: \n" + headers);//E: console.log ("L.927 keys: \n" + headers.length);

        //EE: Get list of headers of subbasins only. For ecw it goes from 15 to 145 (145-15=130 subbasins)
        var list_header_subbasins = Object.values(headers).slice(19, 149);//EE: Get list of headers of subbasins
        console.log("L.1234 List of Headers of subbasins only: \n" + list_header_subbasins);//E: It is important for
        // looping below
        //EE: .............................. End:(1) Headers using JSON  .........................
    }
    //EE: .............................. End:(1) Headers  .........................

    //EE: Start: Saving Fullvalues
    if (database_option == 1){    //E: Way (1)
        //EE: ................... (2) array_fullvalues, answersArray, fn_obj_array (MySQL) ..................
        //E: it gets all values of the 'WholeTable' and saves 'array_fullvalues'
        if (debug_js == 1) alert ("L.1244 Databse: MySQL");

        $('#wholeTable tr').has('td').each(function() {//EE: Return all (tr) elements that have a (td) element inside them
            var arrayItem = {};
            var arrayItemAnswers = {};
            var fn_obj_arrayItems={};

            $('td', $(this)).each(function(index, item) {
                arrayItem[headers[index]] = $(item).html();
                //alert(JSON.stringify(headers[index]));
                //I am grabbing the incoming information to create the answers array. I will be replacing these numbers as they fill them out
                //themselves but for now we need all the originals.
//                if(headers[index]=="USERID" || headers[index]=="INDVID" || headers[index]=="RATING"  ||
                if(headers[index]=="USERID" || headers[index]=="INDVID" || headers[index]=="RATING1"  ||
                    headers[index]=="CONFIDENCE" ){
                    arrayItemAnswers[headers[index]] = $(item).html();
                }

                if(headers[index]=="F0" || headers[index]=="F1" || headers[index]=="F2"  || headers[index]=="F3"  || headers[index]=="F4"  || headers[index]=="F5" ){
                    fn_obj_arrayItems[headers[index]] = $(item).html();
                }
            });
            arrayItemAnswers["stripCropping"]="0";
            arrayItemAnswers["cropRotation"]="0";
            arrayItemAnswers["coverCrops"]="0";
            arrayItemAnswers["filterStrips"]="0";
            arrayItemAnswers["grassedWaterways"]="0";
            arrayItemAnswers["conservationTillage"]="0";
            arrayItemAnswers["Wetlands"]="0";

            array_fullvalues.push(arrayItem);//E:It merges or appends ALL the 'wholeTable' values into one array
            answersArray.push(arrayItemAnswers);//EE: store RATING and CONFIDENCE (answer) values of 'wholeTable' of 20 alt
            fn_obj_array.push(fn_obj_arrayItems);//E: store F0,F1,...,F5 values (objective functions)of 'wholeTable' of 20 alt
        });

//        //EE:This console.log shows all values from 'wholeTable' saved as array named 'array_fullvalues'
//        console.log("L.969 full values of 'wholeTable': \n" + JSON.stringify (array_fullvalues));
//        console.log("L969 length of 'array_fullvalues': \n" + array_fullvalues.length);//E:It gives 20 (because of 20 alternatives)
//        console.log("L.972 full values of 'answersArray': \n" + JSON.stringify (answersArray));//EE:Give answer of RATING, CONFIDENCE, and attributes USERID, INDVID, and "stripCropping=0", "cropRotation=0", so on of 20 Alt.
//        console.log("L.974 full values of 'fn_obj_array': \n" + JSON.stringify (fn_obj_array));//EE: Give MEAN, MIN and MAX values of F0,F1,F2,F3,F4,F5 (objective functions) for all the 20 Alternatives
        console.log("L.1284 'answersArray': \n" + JSON.stringify (answersArray));//EE: Give RATING and CONFIDENCE from
        // for all the 20 Alternatives
//        //EE: ................... End: array_fullvalues, answersArray, fn_obj_array (using MySQL) ..................
    }
    else {//E: Way (2)
        //EE: ................... Start: array_fullvalues, answersArray, fn_obj_array (using JSON) ..................
        if (debug_js == 1) alert ("L.986 Databse: JSON");
        //E: For "database_option == 2", nsga2_values_as_json = "optimized_values" from 'data/takefeedback', see L.1224
        //E: For "database_option == 3", nsga2_values_as_json = "json_from_mysql" from "read_db.php", see L.1228
        ///////////////////////////////////////////  RANDOMIZATION  ////////////////////////////////////////
        var nsga2_values_as_json_shuffled;
        nsga2_values_as_json_shuffled = shuffle1(nsga2_values_as_json);//E: Comment it for not shuffling
        if (nsga2_values_as_json_shuffled) {
            nsga2_values_as_json = nsga2_values_as_json_shuffled;
            // alert ("L.1298  Shuffling...");
        }
        ///////////////////////////////////////////////////////////////////////////////////////////////////

        var array_fullvalues = nsga2_values_as_json;//EE: This is also used in 'bargraphcpy.js'
//        console.log("L.1344 full values of 'wholeTable' using JSON file: \n" + array_fullvalues.length);
//        console.log("L.1345 array_fullvalues = 'wholeTable': \n" + JSON.stringify (array_fullvalues));

        var answersArray = [];
        var fn_obj_array = [];//EE: To store values of F0,F1,F2,F3,F4,F5 (objective functions) of 20 alt
        for (var i = 0; i < array_fullvalues.length; i++) {
            var arrayItemAnswers_js = {};
            var fn_obj_arrayItems_js = {};

            arrayItemAnswers_js["USERID"] = array_fullvalues[i].USERID.toString();
            arrayItemAnswers_js["INDVID"] = array_fullvalues[i].INDVID.toString();
//            arrayItemAnswers_js["ID2"] = array_fullvalues[i].ID2.toString();
            arrayItemAnswers_js["RATING1"] = array_fullvalues[i].RATING1.toString();
            arrayItemAnswers_js["RATING2"] = array_fullvalues[i].RATING2.toString();
            arrayItemAnswers_js["CONFIDENCE"] = array_fullvalues[i].CONFIDENCE.toString();
            arrayItemAnswers_js["stripCropping"] = "0";
            arrayItemAnswers_js["cropRotation"] = "0";
            arrayItemAnswers_js["coverCrops"] = "0";
            arrayItemAnswers_js["filterStrips"] = "0";
            arrayItemAnswers_js["grassedWaterways"] = "0";
            arrayItemAnswers_js["conservationTillage"] = "0";
            arrayItemAnswers_js["Wetlands"] = "0";

            fn_obj_arrayItems_js["F0"] = array_fullvalues[i].F0;
            fn_obj_arrayItems_js["F1"] = array_fullvalues[i].F1;
            fn_obj_arrayItems_js["F2"] = array_fullvalues[i].F2;
            fn_obj_arrayItems_js["F3"] = array_fullvalues[i].F3;
            fn_obj_arrayItems_js["F4"] = array_fullvalues[i].F4;
            fn_obj_arrayItems_js["F5"] = array_fullvalues[i].F5;

            answersArray.push(arrayItemAnswers_js);
            fn_obj_array.push(fn_obj_arrayItems_js);
        }
//    console.log("L.1370 answersArray using JSON file: \n"+ JSON.stringify(answersArray));
//    console.log("L.1014 fn_obj_array using JSON file: \n"+ JSON.stringify(fn_obj_array));
        //EE: ................... End: array_fullvalues, answersArray, fn_obj_array (using JSON) ..................
    }

    // =============================   End   SAVING the "wholeTable" as array   ============================== //


    // =========  Start: SAVING Function-objectives values of each Subbasin (right part of wholeTable)  ============= //
    // ==================  These values are setup (and used) for building HEATMAPS  wholeTable)  ============= //

//    var heatpfra = new Array();//E: To save mean values of PFR of each subbasin (108 in total) as Array
//    var heatera = new Array();//E: To save mean values of Cost of each subbasin (108 in total) as Array
//    var heatseda = new Array();//E: To save mean values of SR of each subbasin (108 in total) as Array
//    var heatnita = new Array();//E: To save mean values of NR of each subbasin (108 in total) as Array
    var PFR_meanVals_array = new Array();//E: Save PFR mean-values of each subbasin (108 total) asArray for building the HeatMap
    var Cost_meanVals_array = new Array();//E: To save mean values of Cost of each subbasin (108 in total) as Array
    var SR_meanVals_array = new Array();//E: To save mean values of SR of each subbasin (108 in total) as Array
    var NR_meanVals_array = new Array();//E: To save mean values of NR of each subbasin (108 in total) as Array

    var iter_altern = 1;
    var iter_subbasins = 1;

    //EE: ****************************** MySQL or JSON ************************************
    if (database_option == 1){
        //E: ****************************** Start: Saving using MySQL DATA *******************************
        if (debug_js == 1) alert ("L.1046 Databse from MySQL");
        //EE: Iteration through  the '20 ALTERNATIVES' - MySQL Data
        $('#wholeTable tbody tr').has('td').each(function() {//EE: Return all (tr) elements that have(td) element inside them
//        heatiter=1;
            iter_subbasins = 1;

            var PFR_mean_value = new Array();
            var Cost_mean_value = new Array();
            var SR_mean_value = new Array();
            var NR_mean_value = new Array();

            //EE: iteration through the '130 SUBBAINS' - MySQL Data
            //$('td:nth-child(15)').nextUntil('td:nth-child(143)').each(function() {

            //E: It apears 'td:gt(14)' works rather than 'td:gt(14):lt(140)'. I mean adding ":lt(140)" does not make
            // any effect for bounding the last element into the loop. In other words, it doesn't matter if we set ":lt(130)" or ":lt(140)"
            //E: I tested it at https://www.w3schools.com/jquery/tryit.asp?filename=tryjquery_sel_gt
            //E: At column 18 in the DB (MySQL), the assignation of Conservation Practices for each sub-basin start.
            $('td:gt(18):lt(140)',$(this)).each(function() {
//                console.log("L.1401 iter_subbasins: " + iter_subbasins);
                var subarr=[];

                subarr = JSON.parse("["+$(this).html()+"]");
                //   subarr=($(this).html()).split(',');
                PFR_mean_value.push({name:iter_subbasins, val:-subarr[1][0]});//E: the second bracket i.e.[0] gives the mean value
                Cost_mean_value.push({name:iter_subbasins, val:-subarr[2][0]});
                SR_mean_value.push({name:iter_subbasins, val:-subarr[3][0]});
                NR_mean_value.push({name:iter_subbasins, val:-subarr[4][0]});
                iter_subbasins++;
            });
//            console.log("L.1412 alt: "+iter_altern+ "  'PFR_mean_value' length: "+ JSON.stringify(PFR_mean_value.length));
//            console.log("L.1413 mean values of PFR 'PFR_mean_value': \n"+ JSON.stringify(PFR_mean_value));

            PFR_mean_value.sort(function (a, b) {
                if ((typeof b.val === 'undefined' && typeof a.val !== 'undefined') || a.val < b.val) {
                    return -1;
                }
                if ((typeof a.val === 'undefined' && typeof b.val !== 'undefined') || a.val > b.val) {
                    return 1;
                }
                return 0;
            });

            Cost_mean_value.sort(function (a, b) {
                if ((typeof b.val === 'undefined' && typeof a.val !== 'undefined') || a.val < b.val) {
                    return -1;
                }
                if ((typeof a.val === 'undefined' && typeof b.val !== 'undefined') || a.val > b.val) {
                    return 1;
                }
                return 0;
            });

            SR_mean_value.sort(function (a, b) {
                if ((typeof b.val === 'undefined' && typeof a.val !== 'undefined') || a.val < b.val) {
                    return -1;
                }
                if ((typeof a.val === 'undefined' && typeof b.val !== 'undefined') || a.val > b.val) {
                    return 1;
                }
                return 0;
            });

            NR_mean_value.sort(function (a, b) {
                if ((typeof b.val === 'undefined' && typeof a.val !== 'undefined') || a.val < b.val) {
                    return -1;
                }
                if ((typeof a.val === 'undefined' && typeof b.val !== 'undefined') || a.val > b.val) {
                    return 1;
                }
                return 0;
            });

            PFR_meanVals_array.push({name:iter_altern, val:PFR_mean_value});//E: Before heatpfra
            Cost_meanVals_array.push({name:iter_altern, val:Cost_mean_value});//E: Before heatera
            SR_meanVals_array.push({name:iter_altern, val:SR_mean_value});//E: Before heatseda
            NR_meanVals_array.push({name:iter_altern, val:NR_mean_value});//E: Bedfore heatnita
            iter_altern++
        });
//            console.log("L.1064 PFR_meanVals_array: \n"+ JSON.stringify(PFR_meanVals_array));
        //E: ****************************** End: Saving Using MySQL DATA *******************************
    }
    else {
        //E: ****************************** Start: Saving Using JSON DATA *******************************
//        if (debug_js == 1) alert ("L.1151 Databse from JSON");
        //EE: iteration through the '20 ALTERNATIVES' - JSON Data
        for (var i = 0; i < array_fullvalues.length; i++) {
//        heatiter = 1;
            var iter_subbasins = 1;
            var PFR_mean_value_js = new Array();
            var Cost_mean_value_js = new Array();
            var SR_mean_value_js = new Array();
            var NR_mean_value_js = new Array();

            //EE: iteration through the '130 SUBBAINS' - JSON Data
            //EE: 'list_header_subbasins' is setup above
            list_header_subbasins.forEach(function (item) {
                var key = item;//E: The 'item' (S1,S2,S3, etc) is saved as 'key' at each loop
                //EE: The value of 'array_fullvalues[i]' is searched by its 'key' value (for example: by S1).
                var my_target = array_fullvalues[i][key];//EE: it returns [0,0,0],[...],[...],[...],[...],[0,0,0]
                var aux2 = JSON.parse("[" + my_target + "]");//EE: the previous result is converted in array of 6 items
//                if (i<1) console.log("L.1496:   my_target: \n"+ my_target);
//                if (i<1) console.log("L.1497: \n"+ typeof aux2+ " ; "+ aux2.length+ " ; "+ JSON.stringify(aux2));

                PFR_mean_value_js.push({name: iter_subbasins, val: -aux2[1][0]});//E:the second bracket i.e.[0] gives the mean value
                Cost_mean_value_js.push({name: iter_subbasins, val: -aux2[2][0]});
                SR_mean_value_js.push({name: iter_subbasins, val: -aux2[3][0]});
                NR_mean_value_js.push({name: iter_subbasins, val: -aux2[4][0]});
                iter_subbasins++;
            });
            if (i < 1) console.log("L.1472: PFR_mean_value_js ; #items: " + PFR_mean_value_js.length);
            if (i < 1) console.log("L.1473: PFR_mean_value_js: \n" + JSON.stringify(PFR_mean_value_js));

            PFR_mean_value_js.sort(function (a, b) {
                if ((typeof b.val === 'undefined' && typeof a.val !== 'undefined') || a.val < b.val) {
                    return -1;
                }
                if ((typeof a.val === 'undefined' && typeof b.val !== 'undefined') || a.val > b.val) {
                    return 1;
                }
                return 0;
            });

            Cost_mean_value_js.sort(function (a, b) {
                if ((typeof b.val === 'undefined' && typeof a.val !== 'undefined') || a.val < b.val) {
                    return -1;
                }
                if ((typeof a.val === 'undefined' && typeof b.val !== 'undefined') || a.val > b.val) {
                    return 1;
                }
                return 0;
            });

            SR_mean_value_js.sort(function (a, b) {
                if ((typeof b.val === 'undefined' && typeof a.val !== 'undefined') || a.val < b.val) {
                    return -1;
                }
                if ((typeof a.val === 'undefined' && typeof b.val !== 'undefined') || a.val > b.val) {
                    return 1;
                }
                return 0;
            });

            NR_mean_value_js.sort(function (a, b) {
                if ((typeof b.val === 'undefined' && typeof a.val !== 'undefined') || a.val < b.val) {
                    return -1;
                }
                if ((typeof a.val === 'undefined' && typeof b.val !== 'undefined') || a.val > b.val) {
                    return 1;
                }
                return 0;
            });

            PFR_meanVals_array.push({name: iter_altern, val: PFR_mean_value_js});
            Cost_meanVals_array.push({name: iter_altern, val: Cost_mean_value_js});
            SR_meanVals_array.push({name: iter_altern, val: SR_mean_value_js});
            NR_meanVals_array.push({name: iter_altern, val: NR_mean_value_js});
            iter_altern++
        }
        //E: ****************************** End: Saving Using JSON DATA *******************************
    }//E: 'else' ends here


    // --------------------------------------------------
    // These two lines get the subbasins' IDs with PFR values (127 in total) and store as 'PFR_meanVals_array'
    var subbasins_with_PFR = new Array();//E: Before: ressss
    subbasins_with_PFR = PFR_meanVals_array[0].val.map(function(a) { return a.name;});
//    console.log("L.1550 subbasins_with_PFR: \n" + JSON.stringify(PFR_meanVals_array[0]));
//    console.log("L.1551 subbasins_with_PFR: \n" + JSON.stringify(subbasins_with_PFR));
    //subbasins_with_PFR= PFR_meanVals_array[1].val.map(function(a) { return a.name;});
    //console.log(heatpfra[1].val[0].val);//console.log(heatpfra[1].val[0].name);

    // =========  END: SAVING Function-objectives values of each Subbasin (right part of wholeTable)  ============= //


    //********************************** trying to enter the heatmap code (2) ***************************

//    $(".tools").click(function () { //E: Not identify yet ?????
//
//        $tools = $(this);
//        //getting the next element
//        $toolpic = $tools.next();
//        //open up the toolpic needed - toggle the slide- if visible, slide up, if not slidedown.
//        $toolpic.slideToggle(500, function () {
//            //execute this after slideToggle is done
//            //change text of tools based on visibility of toolpic div
//            /*$tools.text(function () {
//                 //change text based on condition
//                 return $toolpic.is(":visible") ? "Collapse" : "Expand";
//            });*/
//        });
//    });

    //empty the comment box div that are not corresponding to the BMP selection.
    var subBMP=[];
//    subBMP = array[0].CHOSENBMP.split(','); //E: 'CHOSENBMP' is the binary number of ChosenBMP from the DDBB
    subBMP = array_fullvalues[0].CHOSENBMP.split(','); //E: 'CHOSENBMP' is the binary number of ChosenBMP from the DDBB
    console.log("L.1067 subBMP: " + subBMP);// E: It shows the BMP selection, ex: 1,1,1,1,1,1,0,1,1,0
    
//    if(subBMP[0] != 1){$('#stripCropping.commentBoxQ').hide();}
//    if(subBMP[1] != 1){$('#cropRotation.commentBoxQ').hide();}
//    if(subBMP[2] != 1){$('#coverCrops.commentBoxQ').hide();}
//    if(subBMP[3] != 1){$('#filterStrips.commentBoxQ').hide();}
//    if(subBMP[4] != 1){$('#grassedWaterways.commentBoxQ').hide();}
//    if(subBMP[5] != 1){$('#conservationTillage.commentBoxQ').hide();}
//    if(subBMP[7] != 1){$('#Wetlands.commentBoxQ').hide();}


    //for star rating hover ???? //E:no identified yet
    //E: It was identified. It changes star' color on rating box, when hovering. See 'css/star.css'
    //E: When hovering, "jshoverNext" class is added to nextAll stars, and "jshover" class is added to prevAll stars
    $('.rating input[type="radio"]').hover(function() {
        $(this).nextAll('span').removeClass().addClass('jshoverNext');
        $(this).next('span').removeClass().addClass('jshover');
        $(this).prevAll('span').removeClass().addClass('jshover');
    },function() {
        $('.rating input[type="radio"] + span').removeClass();
    });

/////////////////////////////////////////////
    var totalLength = array_fullvalues.length;//E: it gives 20, because of 20 alternatives
//    console.log("L.1128 length of (array_fullvalues): "+ array_fullvalues.length);

    var totalPages = Math.floor(totalLength);
    var page = 1;
    var oneMap = 0;// E: The DDBB is set in Arrays starting from 0. Ex: CHOSENBMP[0] to CHOSENBMP[19]. That is why
    // oneMap starts from zero, at each moveNext or moveBack it increases or decreases
//    var twoMap=1;
    var subBasinArray=[];
//    var subBasinArray2=[];
    //Shows what maps we are on. oneMap and twoMap are important variables.
    $( ".oneMap" ).html(oneMap+1);//EE: This is mainly for setting the number of the current alternative in webpage

    var map1;
    ///BEGIN FUNCTION FOR MAPPING IT IS CALLING THE MAPPING JS
    var forMapArray =[];
    var subBasinArrayStart =[];
    var bmpArray =[];
    var bmpArray_asNumbers =[];
    var assArray =[];
    var session =0;
    var bmpArrayNames =["strip_cropping", "crop_rotation", "cover_crops", "filter_strips", "grassed_waterway",
        "conservation_tillage", "No", "variable_area_wetlands","variable_wetfr_wetlands"];
    //only call to graph based off of maps
    graphIt();
    var instance = 0;
    colorChangeGraphIt(instance);

    //   **************  It goes until Line 2326  ********************* //
    $(document).ready(function() {
        //This is the function used to allow the user to stop in the middle of grading maps and come back later and  have the results saved.
//        $('.submitFeedbackJon').live("click",function() {
//            $.ajax({
//                url: 'sendBackTakefeedback.php',
//                type: 'post',
//                //dataType: 'json',
//                data:"JSONHolder=" + $('#JSONHolder').val(),
//                success: function(data) {
//                    Shadowbox.open({
//                        content:    '<div id="welcome-msg"><h2>Maps Saved</h2>You may now close this window and ' +
//                        'continue this feedback or simply quit your browser and return later to continue.</div>',
//                        player:     "html",
//                        title:      "WRESTORE Visualization Tool ",
//                        height:     450,
//                        width:      550
//                    });
//                }
//            });
//        });


//        $("body").click(function(e) {
//            session = session+1;
//            /*var obj3=$(e.target);
//            obj4 = obj3.getAttribute("Height");
//            //alert(session);
//            var obj2=5;
//            var obj2=$(e.target).naturalHeight;
//            var obj1=$(e.target).naturalWidth;*/
//
//            var obj1 = $(e.target).attr('name');
////            alert("obj1:  " + obj1);
//            var obj8 = $(e.target).attr('width');
//            var obj3 = $(e.target).attr('height');
//            var objj = $(e.target).parents().eq(11);
//            console.log($(e.target).parents().eq(11).attr('className'));
//
//            if((obj3==492) && (obj8==59)){
//                obj1= 'popupClose';
//            }
//            var answer='NULL';
//
//            if(obj1=='stripCropping1'){
//                var answer=document.querySelector('input[name="stripCropping1"]:checked').value;
//            }
//
//            if(obj1=='stripCropping2'){
//                var answer=document.querySelector('input[name="stripCropping2"]:checked').value;
//            }
//
//            if(obj1=='cropRotation1'){
//                var answer=document.querySelector('input[name="cropRotation1"]:checked').value;
//            }
//
//            if(obj1=='cropRotation2'){
//                var answer=document.querySelector('input[name="cropRotation2"]:checked').value;
//            }
//
//            if(obj1=='coverCrops1'){
//                var answer=document.querySelector('input[name="coverCrops1"]:checked').value;
//            }
//
//            if(obj1=='coverCrops2'){
//                var answer=document.querySelector('input[name="coverCrops2"]:checked').value;
//            }
//
//            if(obj1=='filterStrips1'){
//                var answer=document.querySelector('input[name="filterStrips1"]:checked').value;
//            }
//
//            if(obj1=='filterStrips2'){
//                var answer=document.querySelector('input[name="filterStrips2"]:checked').value;
//            }
//
//            if(obj1=='grassedWaterways1'){
//                var answer=document.querySelector('input[name="grassedWaterways1"]:checked').value;
//            }
//
//            if(obj1=='grassedWaterways2'){
//                var answer=document.querySelector('input[name="grassedWaterways2"]:checked').value;
//            }
//
//            if(obj1=='conservationTillage1'){
//                var answer=document.querySelector('input[name="conservationTillage1"]:checked').value;
//            }
//
//            if(obj1=='conservationTillage2'){
//                var answer=document.querySelector('input[name="conservationTillage2"]:checked').value;
//            }
//
//            if(obj1=='Wetlands1'){
//                var answer=document.querySelector('input[name="Wetlands1"]:checked').value;
//            }
//
//            if(obj1=='Wetlands2'){
//                var answer=document.querySelector('input[name="Wetlands2"]:checked').value;
//            }
//
//            if(obj1=='rating1'){
//                var answer=document.querySelector('input[name="rating1"]:checked').value;
//            }
//
//            if(obj1=='rating2'){
//                var answer=document.querySelector('input[name="rating2"]:checked').value;
//            }
//
//            if(obj1=='subDrop'){
//                var answer=document.getElementsByName('subDrop').item(0).value;
//            }
//
//            if(obj1=='bmpType'){
//                var answer=$(e.target).val();
//            }
//
//            if(obj1=='heatDrop'){
//                var answer='suggestion '+document.getElementsByName('heatDrop').item(0).value;
//            }
//
//
//            if (typeof obj1==="undefined" | typeof obj1==="");
//            //alert ("bad");
//            else(
//                //alert(obj1);
//                $.ajax({
//                    url: 'sendToTime.php',
//                    type: 'post',
//                    data:"JSONHolder=" + obj1 + "," + page + "," + session+ "," + answer,
//                    success: function(data) {
//                        //alert(obj1);
//                    }
//                }));
//            // Do whatever you want; the event that'd fire if the "special" element has been clicked on has been cancelled.
//        });

        function goToTime(incoming) { //E: ------------------------> 1199 in 'googletool_ron1_1'
            session = session+1;
            //session= session+1;
            //alert(session);
//            $.ajax({
//                url: 'sendToTime.php',
//                type: 'post',
//                data:"JSONHolder=" + incoming + "," + page + "," + session,
//                success: function(data) {
//                    //alert(incoming);
//                }
//            });
            // Do whatever you want; the event that'd fire if the "special" element has been clicked on has been cancelled.
        }

        //Time to get our data. getSubBasins is called each time we need a new set of maps. oneMap and twoMap are the
        // variables that change on the click of the buttons. It causes us to move to the new rows in the giant dataset.
        // The maps then read the new materials and away we go. That (mapping) occurs in the initialize() function.

        function getSubBasins(){
            subBasinArray=[];

            //E: 'bmpArray' gets the 'CHOSENBMP' of the current alternative starting from alternative 0 to 20
            bmpArray = array_fullvalues[oneMap].CHOSENBMP.split(',');
            // alert("L.1274 bmpArray for oneMap = "+ oneMap +",  bmpArray: \n"+ bmpArray);
            bmpArray_asNumbers = bmpArray;
            // alert("L.1815 bmpArray as Number for oneMap = "+ oneMap +",  bmpArray: \n"+ bmpArray_asNumbers);

            //E: 'subBasinArrayStart' gets the 'REGIONSUBBASINID' of the current alternative starting from 0 to 20
            //E: For example for ecw 'REGIONSUBBASINID' is 108 for each alternative
            subBasinArrayStart = array_fullvalues[oneMap].REGIONSUBBASINID.split(',');
//            console.log("L.1591 subBasinArrayStart: \n"+ subBasinArrayStart);

            //E: 'assArray' gets the 'ASSIGNMENTS' values of the current alternative starting from 0 to 20
            //E: For example for ecw 'ASSIGNMENTS' is 8x108 (864) for each alternative
            assArray = array_fullvalues[oneMap].ASSIGNMENTS.split(',');


            //E: 'subBasinArray' = 'subBasinArrayStart' but as dictionary
            var count = 0;
            $.each(subBasinArrayStart, function(index, value) {
                var subArrayItem={};
                subArrayItem["subbasinID"] = value;
                subBasinArray.push(subArrayItem);
                count = count + 1;
            });
           console.log("L.1813 subBasinArray(phase 1) - "+count+": \n"+ JSON.stringify(subBasinArray));//E: 'subBasinArray' =
            // 'subBasinArrayStart' but as dictionary

            //E 'bmpArray' containing 'CHOSENBMP' number is converted as name of BMP (array of BMP names)
            $.each(bmpArray, function(index, value) {
                if (value=="1"){
                    bmpArray[index] = bmpArrayNames[index];
                }
            });
           // alert("L.1302 bmpArray: \n"+ bmpArray);//E 'bmpArray' gets the 'CHOSENBMP' of the current alternative

            bmpArray = jQuery.removeFromArray("0", bmpArray);//E: BMPs no applies are removed
            // alert("L.1825 Length-bmpArray: \n"+ bmpArray.length);//EE: 'bmpArray' by names with no Zeros
           // alert("L.1305 bmpArray: \n"+ bmpArray);//EE: 'bmpArray' by names with no Zeros

            //E: Push all the subbasins that need to be mapped into one spot 'forMapArray'
            var count1=648;//0;
            var count2=0;
            forMapArray=[];
            var wholeList="";
            $.each(bmpArray, function(index1, value1) {//E: index1=0,1,...etc  value1=variable_area_wetlands, variable_wetfr_wetlands
                var words="";
                // alert("L.1834 index1, value1: "+ index1 + " & " + value1);

                //Now I am going to push all the subbasins that need to be mapped into one spot
                var arrayItemMap={};
                arrayItemMap["Title"] = value1;
                forMapArray.push(arrayItemMap);
                //alert("arrayItemMap"+arrayItemMap);
                // alert("L.1330 subBasinArray Length: "+ JSON.stringify(subBasinArray[0]));

                //EE: HERE 'subBasinArray' is built (phase 2)
                $.each(subBasinArray, function(index, value) {
                    subBasinArray[index][value1]=assArray[count1];//E: "assArray" set above 864 values 8x108
                    //E: "count1" is the index for 'assArray', it goes from 0 to 863 (8x108)
                    count1=count1+1;
                });
                // alert("L.1849 count1: "+ count1);
                // alert("L.1851 subBasinArray: "+ JSON.stringify(subBasinArray));

                //Here I am looping and finding out which values do not equal 0. I put them in an string and will stick that string into an Array. (BELOW)
                $.each(subBasinArray, function(index2, value2) {
                    if (subBasinArray[index2][value1]!=="0.0"){
                        words=words + subBasinArray[index2]["subbasinID"] + ",";
                    }
                });

                forMapArray[count2]["subs"]=words;
                console.log("L.1855 : words "+ JSON.stringify(words));
                //This one shows all the subbasins for the each bmp
                count2=count2+1;
            });
           // console.log("L.1858 subBasinArray: \n"+ JSON.stringify(subBasinArray));
//            console.log("L.1348 forMapArray: \n"+ JSON.stringify(forMapArray));

            //Now that I have all the data arranged for the incoming dataset (multiple arrays labeled 1 and 2)  I
            // initialize mapping. It is on mapping.js
//            initialize();//E: Original WRESTORE
//            google.maps.event.addDomListener(window, 'load', initialize);
            initialize();
        }
        ////////////////////////////////END GET SUBBASINS////////////////////////////////////////////////
        
        //E: Start: This a sub-function to remove all the 0s in the array above.
        //E: This is called above (L.1304) to remove all 0s from 'bmpArray'
        jQuery.removeFromArray = function(value, arr) {
            return jQuery.grep(arr, function(elem, index) {
                return elem !== value;
            });
        };
        // End Sub-function


        //This grabs the information needed to get the radio buttons set up with new data
        function setUpRadio(){

            //Setting up the radio buttons - General Rating1
            var $radios = $('input:radio[name=rating1]');
            //alert(answersArray[oneMap].RATING1);
//            var ratingAnswer=answersArray[oneMap].RATING;
            var ratingAnswer=answersArray[oneMap].RATING1;//E: It takes 'RATING1' from the DB through 'answersArray'
//            alert("L.1878 alert 1: oneMap = "+oneMap+"  r1= "+ ratingAnswer);
            $('input[name=rating1]').attr('checked', false);
            $radios.filter('[value='+ratingAnswer+']').attr('checked', true);

            var $radios2 = $('input:radio[name=rating2]');
//            var ratingAnswer2=answersArray[oneMap].RATING;//E: @@@
//            var ratingAnswer2=answersArray[oneMap].RATING1;//E: @@@
            var ratingAnswer2=answersArray[oneMap].RATING2;//E: @@@
//            alert("L.1883 alert 1: oneMap = "+oneMap+"  r2= "+ ratingAnswer2);
            $('input[name=rating2]').attr('checked', false);
            $radios2.filter('[value='+ratingAnswer2+']').attr('checked', true);


            //  ----------------------------------------------------------------------------------

            //setting up Crop-Rotation one (CR)
            var $radios5 = $('input:radio[name=cropRotation1]');
            //alert(answersArray[oneMap].RATING1);
            var cropRotationAnswer1=answersArray[oneMap].cropRotation;
            $('input[name=cropRotation1]').attr('checked', false);
            $radios5.filter('[value='+cropRotationAnswer1+']').attr('checked', true);
            //alert(rating1a);
            if(cropRotationAnswer1 !== "0") {
                $radios5.filter('[value='+cropRotationAnswer1+']').attr('checked', true);
            }


            //setting up Cover-Crops one (CC)
            var $radios7 = $('input:radio[name=coverCrops1]');
            //alert(answersArray[oneMap].RATING1);
            var coverCropsAnswer1=answersArray[oneMap].coverCrops;
            $('input[name=coverCrops1]').attr('checked', false);
            $radios7.filter('[value='+coverCropsAnswer1+']').attr('checked', true);
            //alert(rating1a);
            if(coverCropsAnswer1 !== "0") {
                $radios7.filter('[value='+coverCropsAnswer1+']').attr('checked', true);
                //$radios.filter('[rating1]').attr('checked', true);
            }


            //setting up Strip-Cropping one (SC)
            var $radios3 = $('input:radio[name=stripCropping1]');
            //alert(answersArray[oneMap].RATING1);
            var stripCroppingAnswer1=answersArray[oneMap].stripCropping;
            $('input[name=stripCropping1]').attr('checked', false);
            $radios3.filter('[value='+stripCroppingAnswer1+']').attr('checked', true);

            if(stripCroppingAnswer1 !== "0") {
                $radios3.filter('[value='+stripCroppingAnswer1+']').attr('checked', true);
                //$radios.filter('[rating1]').attr('checked', true);
            }


            //setting up Filter-Strips one (FS)
            var $radios9 = $('input:radio[name = filterStrips1]');
            //alert(answersArray[oneMap].RATING1);
            var filterStripsAnswer1=answersArray[oneMap].filterStrips;
            $('input[name=filterStrips1]').attr('checked', false);
            $radios9.filter('[value='+filterStripsAnswer1+']').attr('checked', true);

            if(filterStripsAnswer1 !== "0") {
                $radios9.filter('[value='+filterStripsAnswer1+']').attr('checked', true);
                //$radios.filter('[rating1]').attr('checked', true);
            }


            //setting up Grassed-Waterways one (GW)
            var $radios11 = $('input:radio[name=grassedWaterways1]');
            //alert(answersArray[oneMap].RATING1);
            var grassedWaterwaysAnswer1=answersArray[oneMap].grassedWaterways;
            $('input[name=grassedWaterways1]').attr('checked', false);
            $radios11.filter('[value='+grassedWaterwaysAnswer1+']').attr('checked', true);
            //alert(rating1a);
            if(grassedWaterwaysAnswer1 !== "0") {
                $radios11.filter('[value='+grassedWaterwaysAnswer1+']').attr('checked', true);
                //$radios.filter('[rating1]').attr('checked', true);
            }


            //setting up Conservation-Tillage one (CT)
            var $radios13 = $('input:radio[name=conservationTillage1]');
            //alert(answersArray[oneMap].RATING1);
            var conservationTillageAnswer1=answersArray[oneMap].conservationTillage;
            $('input[name=conservationTillage1]').attr('checked', false);
            $radios13.filter('[value='+conservationTillageAnswer1+']').attr('checked', true);
            //alert(rating1a);
            if(conservationTillageAnswer1 !== "0") {
                $radios13.filter('[value='+conservationTillageAnswer1+']').attr('checked', true);
                //$radios.filter('[rating1]').attr('checked', true);
            }


            //setting up Wetlands one (WT)
            var $radios15 = $('input:radio[name=Wetlands1]');
            //alert(answersArray[oneMap].RATING1);
            var WetlandsAnswer1=answersArray[oneMap].Wetlands;
//            alert("WetlandsAnswer1: "+ WetlandsAnswer1);//E:
//            alert("WetlandsAnswer1: "+ answersArray);//E:
            $('input[name=Wetlands1]').attr('checked', false);
            $radios15.filter('[value='+WetlandsAnswer1+']').attr('checked', true);
            //alert(rating1a);
            if(WetlandsAnswer1 !== "0") {
                $radios15.filter('[value='+WetlandsAnswer1+']').attr('checked', true);
                //$radios.filter('[rating1]').attr('checked', true);
            }
        }
        //  -----------------------------  END setting up radio buttons  ------------------------------//

        //  -----------------  Start: Putting radio button values in text area ---------------------- //
        jQuery('input:radio[name=rating1]').change(function(){
            //var id = $(this).attr("value");
            $("#rating1").val(function () {
                return document.querySelector('input[name="rating1"]:checked').value;
            });
        });

        jQuery('input:radio[name=rating2]').change(function(){
            //var id = $(this).attr("value");
            $("#rating2").val(function () {
                return document.querySelector('input[name="rating2"]:checked').value;
            });
            // alert("L.1952 rating: \n"+ $(this).val());
        });

        //setting up Crop-Rotation radio (CP1)
        jQuery('input:radio[name = cropRotation1]').change(function(){
            //var id = $(this).attr("value");
            $("#cropRotation1").val(function () {
                return document.querySelector('input[name="cropRotation1"]:checked').value;
            });
            alert("L.1952 crop rotation: \n"+ $(this).val());
        });


        //setting up Cover-Crops radio (CP2)
        jQuery('input:radio[name=coverCrops1]').change(function(){
            //var id = $(this).attr("value");
            $("#coverCrops1").val(function () {
                return document.querySelector('input[name="coverCrops1"]:checked').value;
            });
            alert("L.1952 cover crop: \n"+ $(this).val());
        });


        //setting up Strip Cropping radio (CP3)
        jQuery('input:radio[name=stripCropping1]').change(function(){
            //var id = $(this).attr("value");
            $("#stripCropping1").val(function () {
                return document.querySelector('input[name="stripCropping1"]:checked').value;
            });
            //alert($(this).val());
        });


        //setting up Filter-Strips radio (CP4)
        jQuery('input:radio[name=filterStrips1]').change(function(){
            //var id = $(this).attr("value");
            $("#filterStrips1").val(function () {
                return document.querySelector('input[name="filterStrips1"]:checked').value;
            });
            //alert($(this).val());
        });


        //setting up Grassed-Waterways radio (CP5)
        jQuery('input:radio[name = grassedWaterways1]').change(function(){
            //var id = $(this).attr("value");
            $("#grassedWaterways1").val(function () {
                return document.querySelector('input[name="grassedWaterways1"]:checked').value;
            });
            //alert($(this).val());
        });


        //setting up Conservation-Tillage radio (CP6)
        jQuery('input:radio[name = conservationTillage1]').change(function(){
            //var id = $(this).attr("value");
            $("#conservationTillage1").val(function () {
                return document.querySelector('input[name="conservationTillage1"]:checked').value;
            });
            //alert($(this).val());
        });


        //setting up Wetlands radio (CP7)
        jQuery('input:radio[name = Wetlands1]').change(function(){
            //var id = $(this).attr("value");
            $("#Wetlands1").val(function () {
                return document.querySelector('input[name="Wetlands1"]:checked').value;
            });
            //alert($(this).val());
        });
        //  -----------------  End: Putting radio button values in text area ---------------------- //

        // -------------------------Setting up the slider bar to measure the confidence of the user. ----------- //
        $(function() {
            $( "#slider" ).slider({
                range: "min",
                value: answersArray[oneMap].CONFIDENCE,
                min: 1,
                max: 100,
                slide: function( event, ui ) {
                    $( "#confidence1" ).val( ui.value + "%" );
                },
                stop: function( event, ui ) {
                    goToTime("slider1");
                }
            });
            $( "#confidence1" ).val(answersArray[oneMap].CONFIDENCE + "%");
        });

// ====================  Start Setting 'slider' measurement  ======== //
        $( "#confidence1" ).val( $( "#slider" ).slider( "option","values"));
        
//        $("#JSONHolder").hide(); // It hides all the rating table
        $("#rating1").hide();
        $("#rating2").hide();

        $("#stripCropping1").hide();
        $("#stripCropping2").hide();
        $("#cropRotation1").hide();
        $("#cropRotation2").hide();
        $("#coverCrops1").hide();
        $("#coverCrops2").hide();
        $("#filterStrips1").hide();
        $("#filterStrips2").hide();
        $("#grassedWaterways1").hide();
        $("#grassedWaterways2").hide();
        $("#conservationTillage1").hide();
        $("#conservationTillage2").hide();
        $("#Wetlands1").hide();
        $("#Wetlands2").hide();

        $("#wholeTable").hide();
        $(".moveBack").fadeTo(1000,.2);
        //$('.submitAll').click(function() {
        //$.ajax({
        //type: "POST",
        //dataType: "json",
        //data:{'data':$('#JSONHolder').html()},
        //url: 'sendToUsersFeedback.php'
        //});
        //});

        $('.totalMaps').text(totalLength);
        $('.totalPages').text(totalPages);
        $('.currentPage').text(page);
//        $("#rating1").val(answersArray[oneMap].RATING);
        $("#rating1").val(answersArray[oneMap].RATING1);
//        $("#rating2").val(answersArray[oneMap].RATING);//E: @@@
//        $("#rating2").val(answersArray[oneMap].RATING1);//E: @@@
        $("#rating2").val(answersArray[oneMap].RATING2);//E: @@@
        $("#stripCropping1").val(answersArray[oneMap].stripCropping);
        $("#cropRotation1").val(answersArray[oneMap].cropRotation);
        $("#coverCrops1").val(answersArray[oneMap].coverCrops);
        $("#filterStrips1").val(answersArray[oneMap].filterStrips);
        $("#grassedWaterways1").val(answersArray[oneMap].grassedWaterways);
        $("#conservationTillage1").val(answersArray[oneMap].conservationTillage);
        $("#Wetlands1").val(answersArray[oneMap].Wetlands);

        //$("#confidence1").val(answersArray[oneMap].CONFIDENCE);
        $("#JSONHolder").val(JSON.stringify(answersArray));//EE: Show the 'answerArray' at the bottom of webpage
        setUpRadio();   //
        getSubBasins();
        // ====================  End Setting 'slider' measurement  ======== //

        // ======================= Start: Check if RATING for the las SP was clicked ================== //
        var check_rated = 0;

        $('.check_last_SP').click(function(e){
            var sugg_plan = oneMap+1;
            check_rated = 1;
            // alert (typeof(oneMap));//E: to check type of variable
            // alert ("L.2118  Plan: "+ sugg_plan + "  Rating: "+ $(this).attr('id'));//E: it gives the 'id'
            // alert ("L.2118  Plan: "+ sugg_plan + "  Rating: "+ $(this).attr('value'));//E: it gives the 'value'
            // report('Plan', sugg_plan, '  Rating ',$(this).attr('value'));

            if (sugg_plan == 20) {//E: Set 20 for checking the last SP
                // alert ("end");//E: For checking
                submitData();
                end_experiment();
            }
        });
        // ======================= End: Check if RATING for the las SP was clicked ================== //


        //  ============== Start moveNext =============== //
        //This fires off each time someone hits the next button. It moves the data 2 spots and runs through the
        //new arrays that are created. The "if" statement stops it from doing anything if at the end of the set.
        // ----- E: 'page' goes from 1 to 20; 'oneMap' goes from 0 to 19 ----- //
        $(".moveNext").click(function() {
            if ($("#rating1").val() == 0){
                // alert ("Rate of the current SP: " + $("#rating1").val());//E: For test
                alert ("The current Suggested-Plan was NOT rated. Please rate it to go next Suggested-Plan");
                check_rated = 0;
            } else {
                // alert ("the SP was rated: " + $("#rating1").val());
                $('.displayStuff').html("");
            // Load the answers into the answers array //
            $(".moveBack").fadeTo(1000,1);
            //$(".moveBack").show();
//            answersArray[oneMap].RATING=$("#rating1").val();
            answersArray[oneMap].RATING1=$("#rating1").val();
//            alert("L.2154 alert 3: oneMap = "+oneMap+"  r1= "+ answersArray[oneMap].RATING1);// E: shows the last rating
            //answersArray[oneMap].CONFIDENCE=$("#confidence1").val();
//            answersArray[oneMap].RATING=$("#rating2").val();//E: @@@
//            answersArray[oneMap].RATING1=$("#rating2").val();//E: @@@
            answersArray[oneMap].RATING2=$("#rating2").val();//E: @@@
//            alert("L.2158 alert 3: oneMap = "+oneMap+"  r2= "+ answersArray[oneMap].RATING2);
            //answersArray[twoMap].CONFIDENCE=$("#confidence2").val();
            var value1 = $( "#slider" ).slider( "option", "value" );
//            answersArray[oneMap].CONFIDENCE=value1;
//            var value2 = $( "#slider1" ).slider( "option", "value" );
//            answersArray[twoMap].CONFIDENCE=value2;

            answersArray[oneMap].cropRotation=$("#cropRotation1").val();
//            answersArray[twoMap].cropRotation=$("#cropRotation2").val();
            answersArray[oneMap].coverCrops=$("#coverCrops1").val();
//            answersArray[twoMap].coverCrops=$("#coverCrops2").val();
            answersArray[oneMap].stripCropping=$("#stripCropping1").val();
//            answersArray[twoMap].stripCropping=$("#stripCropping2").val();
            answersArray[oneMap].filterStrips=$("#filterStrips1").val();
//            answersArray[twoMap].filterStrips=$("#filterStrips2").val();
            answersArray[oneMap].grassedWaterways=$("#grassedWaterways1").val();
//            answersArray[twoMap].grassedWaterways=$("#grassedWaterways2").val();
            answersArray[oneMap].conservationTillage=$("#conservationTillage1").val();
//            answersArray[twoMap].conservationTillage=$("#conservationTillage2").val();
            answersArray[oneMap].Wetlands=$("#Wetlands1").val();
//            answersArray[twoMap].Wetlands=$("#Wetlands2").val();

//            JSONHolder holds rates obtained from users
            $("#JSONHolder").val(JSON.stringify(answersArray));
//            alert(JSON.stringify(answersArray));//E:

            //This gets new data
//            alert ("move-Next: current page: " + page + " of " + totalPages);//E: it gives the current page which is
            // same as # of suggestion
//            alert ("move-Next: current 'bmpArray' index: " + oneMap); //E: it gives the current 'bmpArray' index,
            // which goes from 0 to 19 (20 alternatives)
            
            if(page!=totalPages){ //E: 'page' value starts at 1 an so on.
//                alert("here");
                if (page==totalPages-1){
                    $(".moveNext").fadeTo(1000,.2);
                }
                page = page + 1;
                $('.currentPage').text(page);//E: Set text content into the element with 'currentPAge' class
                //			 $(".moveNext").show();
//                alert("'oneMap' value: " + oneMap);
//                bmpArray = array[page-1].CHOSENBMP;
                bmpArray = array_fullvalues[page-1].CHOSENBMP;
//                bmpArray=array[page-1].CHOSENBMP;
//                alert("new 'bmpArray' to display: ["+ (page-1) +"]: " + bmpArray);//E: it provides the CHESENBMP from DDBB
//                oneMap=oneMap+2;
//                alert("L.1687 OneMap-before: "+ oneMap);//EE: 'oneMap' starts as zero
                oneMap = oneMap+1;//EE: 'oneMap' starts as 0. Here, it is set as 1 (or current alternative)
//                alert("L.1689 OneMap-after: "+ oneMap);
                console.log("L.1690 Alternative: "+ oneMap+1);
//                alert("new 'page': " + page);//E: 'page' was increased into 1 above
//                alert("move-Next: next 'bmpArray' index: " + oneMap);//E:
                $( ".oneMap" ).html(oneMap+1);//E: As 'moveNext' was clicked, 'oneMap' is set as 2 or next alternative
//                //$( ".twoMap" ).html(twoMap+1);

                //this next line will get new data and then map
                //Maps are still being created with new data
                getSubBasins();
                //MAP IT//////////
                //initialize();
                $( "#tabs" ).tabs("destroy");
//                alert("destroy 1 - in 'moveNext' button ");//E: it shows which button was clicked (moveNext or moveBack)
//                 report('NEXT - Sug.Plan and ID2 = ', (oneMap+1)+" and "+ array_fullvalues[oneMap].ID2.toString());
                report('NEXT - Sug.Plan set', (oneMap+1)+"  ;  initial ID: "+ (Number(array_fullvalues[oneMap].ID2)+1));
                // report('NEXT >> Suggested Plan', (oneMap+1));
                heatinitialize();

//                $("#rating1").val(answersArray[oneMap].RATING);
                $("#rating1").val(answersArray[oneMap].RATING1);
//                $("#rating2").val(answersArray[oneMap].RATING);//E: @@@
//                $("#rating2").val(answersArray[oneMap].RATING1);//E: @@@
                $("#rating2").val(answersArray[oneMap].RATING2);//E: @@@
//                alert("L.2223 a4: oneMap= "+oneMap+" - r2= "+ $("#rating2").val(answersArray[oneMap].RATING1));
                $("#confidence1").val(answersArray[oneMap].CONFIDENCE);
                $("#slider" ).slider("option","value",(answersArray[oneMap].CONFIDENCE));
//                $( "#slider1" ).slider("option","value",(answersArray[twoMap].CONFIDENCE));
//                $("#confidence2").val(answersArray[twoMap].CONFIDENCE);

                $("#stripCropping1").val(answersArray[oneMap].stripCropping);
//                $("#stripCropping2").val(answersArray[twoMap].stripCropping);
                $("#cropRotation1").val(answersArray[oneMap].cropRotation);
//                $("#cropRotation2").val(answersArray[twoMap].cropRotation);
                $("#coverCrops1").val(answersArray[oneMap].coverCrops);
//                $("#coverCrops2").val(answersArray[twoMap].coverCrops);
                $("#filterStrips1").val(answersArray[oneMap].filterStrips);
//                $("#filterStrips2").val(answersArray[twoMap].filterStrips);
                $("#grassedWaterways1").val(answersArray[oneMap].grassedWaterways);
//                $("#grassedWaterways2").val(answersArray[twoMap].grassedWaterways);
                $("#conservationTillage1").val(answersArray[oneMap].conservationTillage);
//                $("#conservationTillage2").val(answersArray[twoMap].conservationTillage);
                $("#Wetlands1").val(answersArray[oneMap].Wetlands);
//                $("#Wetlands2").val(answersArray[twoMap].Wetlands);

                //This JSONHolder is just a hidden text field on the page where I am saving my giant array of answers. When the person is done, this field is submitted and we can grab all the data out of it.
                $("#JSONHolder").val(JSON.stringify(answersArray));
                setUpRadio();
                $(".map1").hide();
                $(".map1").fadeIn("slow");
                subBasinGraph1();
                
                //alert(JSON.stringify(bmpArray));
//                page = page + 1;
//                $('.currentPage').text(page);//E: Set text content into the element with 'currentPAge' class
                }
                else {
                    $(".moveNext").fadeTo(1000,0.2);
                    // alert("total pages DONE: ");//E: it alerts when all the 20 pages were displayed.
                }
            }
        });
        // ============= End moveNext ================= //
    
        // ================= Start moveBack ================= //
        //This is fired when people are going backwards!
        $(".moveBack").click(function() {
//            alert("moving back: ");
            $('.displayStuff').html("");
            $(".moveNext").fadeTo(1000,1);
//            answersArray[oneMap].RATING=$("#rating1").val();
            answersArray[oneMap].RATING1=$("#rating1").val();
            //answersArray[oneMap].CONFIDENCE=$("#confidence1").val();
//            answersArray[oneMap].RATING=$("#rating2").val();//E: @@@
//            answersArray[oneMap].RATING1=$("#rating2").val();//E: @@@
            answersArray[oneMap].RATING2=$("#rating2").val();//E: @@@
            //answersArray[twoMap].CONFIDENCE=$("#confidence2").val();
            var value1 = $( "#slider" ).slider( "option", "value" );
            answersArray[oneMap].CONFIDENCE=value1;
//            var value2 = $( "#slider1" ).slider( "option", "value" );
//            answersArray[twoMap].CONFIDENCE=value2;

            answersArray[oneMap].stripCropping=$("#stripCropping1").val();
//            answersArray[twoMap].stripCropping=$("#stripCropping2").val();
            answersArray[oneMap].cropRotation=$("#cropRotation1").val();
//            answersArray[twoMap].cropRotation=$("#cropRotation2").val();
            answersArray[oneMap].coverCrops=$("#coverCrops1").val();
//            answersArray[twoMap].coverCrops=$("#coverCrops2").val();
            answersArray[oneMap].filterStrips=$("#filterStrips1").val();
//            answersArray[twoMap].filterStrips=$("#filterStrips2").val();
            answersArray[oneMap].grassedWaterways=$("#grassedWaterways1").val();
//            answersArray[twoMap].grassedWaterways=$("#grassedWaterways2").val();
            answersArray[oneMap].conservationTillage=$("#conservationTillage1").val();
//            answersArray[twoMap].conservationTillage=$("#conservationTillage2").val();
            answersArray[oneMap].Wetlands=$("#Wetlands1").val();
//            answersArray[twoMap].Wetlands=$("#Wetlands2").val();

            $("#JSONHolder").val(JSON.stringify(answersArray));
            //alert(JSON.stringify(answersArray));
//            alert("move Back: current page: "+ page);//E: it gives the current page, before to be decreased
            if(page>1){
                //write the answers in the fields to the AnswersArray
                $(".moveNext").fadeTo(1000,1);
//                bmpArray = array[page-1].CHOSENBMP;
                bmpArray = array_fullvalues[page-1].CHOSENBMP;
//                alert("current 'bmpArray': ["+ (page-1) +"]: " + bmpArray);//E: it provides the CHESENBMP from DDBB

//                alert("move Back: current 'bmpArray' index: "+ oneMap);//E: it displays the current
                // 'bmpArray' index
                oneMap=oneMap-1;

//                alert("move Back: next 'bmpArray' index: "+ oneMap);//E: it displays the next index of 'bmpArray'.
                // Index goes from 0 to 19
                $( ".oneMap" ).html(oneMap+1);//E: 'oneMap' start from 0 to 19.

                //this next line will get new data and then map
                getSubBasins();
                $( "#tabs" ).tabs("destroy");
//                alert("destroy 2");
//                 report('BACK - Sug.Plan and ID2 = ', (oneMap+1)+" and "+ array_fullvalues[oneMap].ID2.toString());
                report('BACK - Sug.Plan set', (oneMap+1)+"  ;  initial ID: "+ (Number(array_fullvalues[oneMap].ID2)+1));
                // report('BACK << Suggested Plan', (oneMap+1));
                heatinitialize();

//                $("#rating1").val(answersArray[oneMap].RATING);
                $("#rating1").val(answersArray[oneMap].RATING1);
//                $("#rating2").val(answersArray[oneMap].RATING);//E: @@@
//                $("#rating2").val(answersArray[twoMap].RATING);
                $("#rating2").val(answersArray[oneMap].RATING2);
                $( "#slider" ).slider("option","value",(answersArray[oneMap].CONFIDENCE));
                $("#confidence1").val(answersArray[oneMap].CONFIDENCE);

                $("#stripCropping1").val(answersArray[oneMap].stripCropping);
                $("#cropRotation1").val(answersArray[oneMap].cropRotation);
                $("#coverCrops1").val(answersArray[oneMap].coverCrops);
                $("#filterStrips1").val(answersArray[oneMap].filterStrips);
                $("#grassedWaterways1").val(answersArray[oneMap].grassedWaterways);

                $("#conservationTillage1").val(answersArray[oneMap].conservationTillage);
                $("#Wetlands1").val(answersArray[oneMap].Wetlands);

                setUpRadio();
                subBasinGraph1();
                
                //alert(JSON.stringify(bmpArray));
                page = page - 1;
                if (page==1){
                    $(".moveBack").fadeTo(1000,.2);
                }
                $('.currentPage').text(page);
            }else
            {
                $(".moveBack").fadeTo(1000,.2);
            }
        });
        //  =======================  End moveBack ================ //

        //  =======================  Start submit All ================ //
        //This sends all the data. I move the answers data into the id JSONHolder and then submit the form.
        $(".submitAll").click(function() {
//            answersArray[oneMap].RATING=$("#rating1").val();
            answersArray[oneMap].RATING1=$("#rating1").val();
//            answersArray[oneMap].RATING=$("#rating2").val();//E: @@@
//            answersArray[oneMap].RATING1=$("#rating2").val();//E: @@@
            answersArray[oneMap].RATING2=$("#rating2").val();//E: @@@
            var value1 = $( "#slider" ).slider( "option", "value" );
            answersArray[oneMap].CONFIDENCE=value1;
//            var value2 = $( "#slider1" ).slider( "option", "value" );
//            answersArray[twoMap].CONFIDENCE=value2;
            $("#JSONHolder").val(JSON.stringify(answersArray));
            $('#form1').submit();
        });
        //  =======================  End submit All ================ //
    });

    window.onload = function() {
        heatinitialize(); // This function is located at 'heatmapnew1.js' file
        // open a welcome message as soon as the window loads
//        alert("Begining. Alternative 1");
//                 report('BEGINNING - Sug.Plan and ID2 = ', (oneMap+1)+" and "+ (array_fullvalues[oneMap].ID2.toString()+1));
        report('BEGINNING - Sug.Plan set', (oneMap+1)+"  ;  initial ID: "+ (Number(array_fullvalues[oneMap].ID2)+1));
        // report('BEGINNING Suggested Plan ', (oneMap+1));
        Shadowbox.open({
            content:    '<div id="welcome-msg"><h2 style="font-family: \'Oswald\', Arial, Helvetica, sans-serif;\n' +
            '                font-weight:normal; color:#7d110c;font-size:20px; text-transform:uppercase;">' +
            'Instructions</h2><br>' +
            '<p>In this session, you will see multiple suggested plans for implementing new conservation practices on the ' +
            'watershed landscape.</p>' + '<div style="line-height:30%;"><br></div>' +
            '<p>In WRESTORE, every <b>suggested plan</b> consists of multiple conservation decisions distributed over the landscape. Each conservation decision ' +
            'describes the type of recommended conservation practice (e.g. wetlands), location where the practice is implemented, and' +
            ' other attributes such as size, etc.</p>' + '<div style="line-height:30%;"><br></div>' +
            '<p>You are advised to first learn about decisions recommended by a suggested conservation plan (i.e. ' +
            '<b>Step 1</b>), then assess its performance in comparison to other plans suggested in the user session ' +
            '(i.e. <b>Step 2</b>), and then finally evaluate the suggested plan based on its overall performance ' +
            ' (i.e. <b>Step 3</b>).</p>'+
            '<div style="line-height:30%;"><br></div>' +
            '<p>Your feedback will help WRESTORE create new conservation plans that best meet your ' +
            'needs. For each session, you will be evaluating 20 suggested plans using the star ratings in Step 3.</p></div>',
            player:     "html",
            title:      "WRESTORE Visualization Tool ",
            height:     450,
            width:      550
        });
    };

    function open_instruction() {
//        ////   WAY 1
//        // open a welcome message as soon as the window loads
//        Shadowbox.open({
//            content:    '<div id="welcome-msg"><h2>Instructions*</h2><ol><li>Please compare  alternatives based on ' +
//            'how the conservation practices are spatially distributed  in the watershed and based on the performance of these alternatives with  respect to the various goals or objectives you selected earlier. </li>' +
//            '<li>The bar-graphs at  the bottom of the page display how the various alternatives perform with respect  to the objectives. </li>' +
//            '<li>Then, please make  a judgment on the quality of the design of the various alternatives based on  any subjective criteria important to you. </li>' +
//            '<li>Once you have  compared the alternatives, please provide a rating on how much you like or dislike  a particular alternative.</li></ol></div>',
//            player:     "html",
//            title:      "WRESTORE Visualization Tool ",
//            height:     450,
//            width:      550
//        });

        ////   WAY 2
            // alert ("Open instruction");
            document.getElementById("shade_frame").style.display = "block";//EE: call to tags in Voladizo (4)
            document.getElementById("instruction_box1").style.display = "block";//EE: call to tags in Voladizo (4)
    }

    function pause_function() {
//        //// Way 1. It has some CSS lines
//        // Source1: https://sweetalert.js.org/docs/#content
//        // Source2: https://sweetalert2.github.io/
//        swal({
//            title: "Rest time!",
//            text: "You press the option to take a rest. During this time the WRESTORE tool is stopped. When you are " +
//            "ready to continue press \'ok\'",
//            icon: "success",
//            button: "Continue!",
//            closeOnClickOutside: false,
//            closeOnEsc: false
//        });

        //// WAY 2. It has a own CSS file
//        Shadowbox.open({
//            content:    '<div msg-frame> <div id="takeRest-msg"><h2>Rest time</h2><ol><li>You press the option to take a rest .</li>' +
//            '<li>During this time the WRESTORE tool is stopped. When you are ready to continue press \'ok\' cross ' +
//            'icon at the right bottom.</li></ol></div> </div>',
//            player:     "html",
//            title:      "WRESTORE Visualization Tool* ",
//            height:     450,
//            width:      850
//        });

        ////   WAY 3
//        alert ("Open Take rest");
        document.getElementById("shade_frame").style.display = "block";//EE: call to "tags" in Voladizo (5)
        document.getElementById("pause_box").style.display = "block";//EE: call to "tags" in Voladizo (5)
    }

    function save_function() {
        document.getElementById("shade_frame").style.display = "block";//EE: call to "tags" in Voladizo (6)
        document.getElementById("save_box1_tr").style.display = "block";//EE: call to "tags" in Voladizo (6)
    }

    function exit_wrestore() {
//        window.location.href = 'http://google.com';
//         window.location.href = '../pages/login/login_ok.php';
        window.location.href = '../index.html';
    }

    function end_experiment() {
        document.getElementById("shade_frame").style.display = "block";//EE: call to "tags" in Voladizo (6)
        document.getElementById("end_experiment_box").style.display = "block";//EE: call to "tags" in Voladizo (6)
    }

//    function instruct1() {
//        // open a welcome message as soon as the window loads
//        Shadowbox.open({
//            content:'<div id="welcome-msg"><h2>The Progress Bar</h2><p><img src="images/table.jpg"></p><p>The  ' +
//            'progress ' +
//            'bar shows you at what step of WRESTORE&#39s <strong>search-learn</strong> process  you currently are in. The <strong>search-learn</strong> process is divided into  consecutive sessions of interaction, during which you will get to see and  compare multiple alternatives. A colored box in the progress bar shows you  which session you currently are in. <strong>If you are in</strong> –</p><ul><li>an <strong>Introspection</strong> session, then you will get to see all of the  previously found alternatives that you have seen before and have rated as &ldquo;favorably&rdquo; solutions (except for Introspection session 1 that consist of  &ldquo;initial&rdquo; alternatives to help you become familiar with the designs). In the  introspection session you should reflect on why you liked the solutions that  you rated highly and whether you need to change your criteria for comparing or  rating alternatives.</li><li> a <strong>Human-guided Search (HS)</strong> session, then you are now actively involved  in helping the underlying WRESTORE tools to search for better alternatives. So,  you will see some &ldquo;bad&rdquo; alternatives and some &ldquo;good alternatives&rdquo;. Please use  your most current understanding of preferences and priorities to compare and  rate alternatives as they appear.</li><li><p> an <strong>Automated Search</strong> session, then the underlying WRESTORE tools  are searching for alternatives in an automated manner. In this session, you  will <strong><u>not</u></strong> be asked to compare and rate alternatives. Instead, the  feedbacks you gave in earlier sessions will be used to mechanically estimate  the ratings of the alternatives. <em>Note, that even though Automated Search is  currently shown to occur between the 4th and 5th  introspection sessions, it could also unexpectedly occur between any other  introspections sessions. But when that occurs in real-time, you will be  notified in the progress bar!</em></p></li></ul></div>',
//            player:     "html",
//            title:      "WRESTORE Visualization Tool ",
//            height:     550,
//            width:      920
//        });
//    }

</script>




<!--  #########################################################################################  -->
<!--  ######## This js script detects the inactive time of the user - connection with Voladizo (7) ######### -->
<script>
    var timeoutID;

    function setup() {
        this.addEventListener("mousemove", resetTimer, false);
        this.addEventListener("mousedown", resetTimer, false);
        this.addEventListener("keypress", resetTimer, false);
        this.addEventListener("DOMMouseScroll", resetTimer, false);
        this.addEventListener("mousewheel", resetTimer, false);
        this.addEventListener("touchmove", resetTimer, false);
        this.addEventListener("MSPointerMove", resetTimer, false);
        startTimer();
    }
    setup();
    function startTimer() {
        // wait 2 seconds before calling goInactive
        timeoutID = window.setTimeout(goInactive, 600000); //E: Set the start of inactive time in mili-sec
    }
    function resetTimer(e) {
        window.clearTimeout(timeoutID);
        goActive();
    }
    function goInactive() {
        // do something when inactive
        report('m-clk* ', 'Wrestore page inactive');
        document.getElementById("shade_frame").style.display = "block";//EE: call to "tags" in Voladizo (7)
        document.getElementById("inactive_box").style.display = "block";//EE: call to "tags" in Voladizo (7)
        // alert("It appears you are inactive on this page."+"\n"+"Press 'Ok' to keep working?");
    }
    function goActive() {
        // do something
        startTimer();
    }
</script>
<!--  ######## End:  Detect the inactive-time script of the user ######### -->


<!--  ######## Start:  Shuffling function ######### -->
<script type="text/javascript">
    //E: Functions for Shuffling a js object
    function shuffle1(a) {
        for (let i = a.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [a[i], a[j]] = [a[j], a[i]];
        }
        return a;
    }

    function shuffle2(array) {
        let counter = array.length;

        // While there are elements in the array
        while (counter > 0) {
            // Pick a random index
            let index = Math.floor(Math.random() * counter);

            // Decrease counter by 1
            counter--;

            // And swap the last element with it
            let temp = array[counter];
            array[counter] = array[index];
            array[index] = temp;
        }
        return array;
    }
</script>


</body>
</html>
