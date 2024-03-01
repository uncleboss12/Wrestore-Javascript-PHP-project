// This 'script' is compliment of mapping_new script.
// This is called by 'mapping_new' to build, check, and track the legend checkboxs located in main map and the 4 heatmaps


// ==================== ----------- Start: (1) Settings for Legend in Main-Map ------------- ====================== //
// E: This js script creates the button for LEGEND in the main map. This button displays even in fullscreen.

// ---- Function for button 'legend' into main map ----- //
// function buttonControl(options) {
function legend_mainMap() {
    // Level 0
    var mainMapLegend_frame = document.createElement('DIV'); //E: main container of the main-map-legend pannel
    mainMapLegend_frame.className = "mainMapLegend_frame"; //E: class name for the created DIV
//        mainMapLegend_frame.style.zIndex = "100";

    // Level 1
    var mainMapLegend_container = document.createElement('DIV'); //E: main container of the main-map-legend pannel
    mainMapLegend_container.className = "mainMapLegend_container"; //E: class name for the created DIV

    // Level 1.a
    var mainMapLeg_button = document.createElement('DIV'); //E: legend-header (title) DIV is created here
    mainMapLeg_button.className = 'mainMapLegend_button';
    mainMapLeg_button.title = 'Click here to On/Off the legend';
    mainMapLeg_button.index = 1;

    // Level 1.a.1
    var mainMapLeg_title = document.createElement('DIV'); //E: legend-header (title) DIV is created here
    mainMapLeg_title.innerHTML = "Legend";
    mainMapLeg_title.className = 'mainMapLegend_title';

    // Level 1.b
    var legend_contend = document.createElement('DIV'); //E: DIV is created to contain the legend features
    legend_contend.className = "feat_content"; //E: class name for the created DIV
    legend_contend.id = "feat_content"; //E: class name for the created DIV
    legend_contend.style.display = "block";

    var lleggg = new mm_legend1(); // E: <--------  Function DOM
    legend_contend.appendChild(lleggg);

    //Level 1.a.2
    var drop_arrow = document.createElement('DIV'); //E: DIV is created to contain the dropdown arrow
    drop_arrow.className = "dropdown_img"; //E: class name for the created DIV
    drop_arrow.innerHTML = '<i style="font-size:20px" class="fa">&#xf102;</i>';
    //E: More icons can be found at: https://fontawesome.com/v4.7.0/cheatsheet/


    //E: Links between DOM's created above
    mainMapLegend_frame.appendChild(mainMapLegend_container);
    mainMapLegend_frame.appendChild(maptype_container);

    mainMapLegend_container.appendChild(mainMapLeg_button);
    mainMapLegend_container.appendChild(legend_contend);
//        mainMapLegend_container.appendChild(checkbox_maptype);//E: ***

    mainMapLeg_button.appendChild(mainMapLeg_title);
    // mainMapLeg_button.appendChild(dropdown_arrow);
    mainMapLeg_button.appendChild(drop_arrow);


    //E: Add a control for "mainMapLegend_frame" DIV. Definition and Settings of "mainMapLegend_frame" DIV is above
    basemap_1.controls[google.maps.ControlPosition.TOP_RIGHT].push(mainMapLegend_frame);

    //E: Add an event when "mainMapLegend_frame" DIV is clicked. "function ()" is activated when "mainMapLegend_frame" DIV is clicked.
    google.maps.event.addDomListener(mainMapLeg_button, 'click', function () {
        (legend_contend.style.display == 'none') ?
            legend_contend.style.display = 'block' : legend_contend.style.display = 'none';

        if (window.getComputedStyle(legend_contend).display === "none"){
            // alert ("Action: Close");//E: For test
            drop_arrow.innerHTML = '<i style="font-size:20px" class="fa">&#xf103;</i>';
            report('m-clk**','Close main-map legend');
        } else {
            // alert ("Action: Open");//E: For test
            drop_arrow.innerHTML = '<i style="font-size:20px" class="fa">&#xf102;</i>';
            report('m-clk**','Open main-map legend');
        }
    });
    return mainMapLegend_frame;
}
// ==================== ----------- End: (1) Settings for Legend in Main-Map ------------- ====================== //



// ===============----------------- Start: (2) Settings for PFR-Legend in Heatmap ------------- ==================== //

//  /////////////  FUNCTION for PFR-LEGEND button into the heat-map  ///////////
// function buttonControl_pfr(options, colorList, map, min_v, max_v,rg_pfr) {
function buttonControl_pfr(colorList, map, min_v, max_v, rg_pfr) {
    min_v = Math.trunc(min_v);
//        alert("Line:2694-g2.php: " + "colors: " + Object.keys(colors).length + " map: " + map + "  min: " + min_v + "  max: " + max_v);

    // Level 0: extra frame to engañar to google map
    var hml_extraFrame = document.createElement('DIV'); //E: main container of the main-map-legend pannel
    hml_extraFrame.className = "hml_extraFrame"; //E: class name for the created DIV

    // Level 1: propper frame to show. It contains title and lengend-content
    var heatMapLegend_frame = document.createElement('DIV'); //E: main container of the main-map-legend pannel
    heatMapLegend_frame.className = "heatMapLegend_frame"; //E: class name for the created DIV

    // Level 1.a. Legend title or button
    var heatMapLegend_frameHead = document.createElement('DIV'); //E: legend-header (title) DIV is created here
    heatMapLegend_frameHead.className = 'mainMapLegend_button';
    heatMapLegend_frameHead.title = 'Click here to On/Off the legend';
    heatMapLegend_frameHead.index = 1;

    // Level 1.b. Legend displayable contain (contenido desplegable)
    var heatMapLegend_container_pfr = document.createElement('DIV'); //E: container of labels and square boxes
    heatMapLegend_container_pfr.className = "heatMapLegend_container_pfr"; //E: class name for the created DIV
    heatMapLegend_container_pfr.style.display="block";
    heatMapLegend_container_pfr.title = 'Peak Flow Reduction in cubic meters per second';//E:adding TITLE

    // Level 1.a.1
    var heatMapLeg_title = document.createElement('DIV'); //E: legend-header (title) DIV is created here
    // heatMapLeg_title.innerHTML = options.name;
    heatMapLeg_title.innerHTML = "Legend";
    heatMapLeg_title.className = 'heatMapLegend_title';

    // New DIV
    var box_for_units = document.createElement('DIV'); //E: This DIV will host the units description
    box_for_units.innerHTML = "Peak Flow Reduction in Cubic meters per second";
    box_for_units.className = 'box_for_units';
    box_for_units.style.fontSize = "10.5px";
    box_for_units.style.border = "1px solid #d9d9d9";
    box_for_units.style.marginBottom = "2px";
    box_for_units.style.backgroundColor = "#ffeecc";
    heatMapLegend_container_pfr.appendChild(box_for_units);

    // Level 1.b.1
    var len_arr = Object.keys(colorList).length;
    var range2 = (max_v-min_v)/len_arr;
    var ii = 0;

    for (var key in colorList) {
        var boxContainer = document.createElement("DIV");
        var box = document.createElement("DIV");
        var label = document.createElement("SPAN");

//            var range_inf2 = min_v + Math.ceil(ii*range2); // Get the low value of range
//            var range_sup2 = min_v + Math.ceil((ii+1)*range2); // Get the high value of range
        var range_inf2 = rg_pfr[ii]; // Get the low value of range
        var range_sup2 = rg_pfr[ii+1]; // Get the high value of range

        boxContainer.appendChild(box);
        boxContainer.appendChild(label);
        heatMapLegend_container_pfr.appendChild(boxContainer);

//            label.innerHTML = range_inf2 + ' to ' + range_sup2;// + ' cfs';
        label.innerHTML = range_inf2 + ' - ' + range_sup2;// + ' cfs';
        label.className = "label";
        box.className = "box";
        box.style.backgroundColor = colorList[key];
//            boxContainer.id = "box_container";
        boxContainer.className = "box_container";
        ii += 1;
    }

    //Level 1.a.2
    var drop_arrow = document.createElement('DIV'); //E: DIV is created the dropdown arrow
    drop_arrow.className = "dropdown_img"; //E: class name for the created DIV
    drop_arrow.innerHTML = '<i style="font-size:20px" class="fa">&#xf102;</i>';//E: arrow image

    //E: Links between DOM's created above
    hml_extraFrame.appendChild(heatMapLegend_frame);

    heatMapLegend_frame.appendChild(heatMapLegend_frameHead);
    heatMapLegend_frame.appendChild(heatMapLegend_container_pfr);

    heatMapLegend_frameHead.appendChild(heatMapLeg_title);
    heatMapLegend_frameHead.appendChild(drop_arrow);


    //E: Add a control for "hml_extraFrame" DIV. Definition and Settings of "hml_extraFrame" DIV is above
    heatmapPF1.controls[google.maps.ControlPosition.TOP_RIGHT].push(hml_extraFrame);

    //E: Add an event when "heatMapLegend_container_pfr" DIV is clicked. "function ()" is activated when "heatMapLegend_container_pfr" DIV is clicked.
    google.maps.event.addDomListener(hml_extraFrame, 'click', function () {
        (heatMapLegend_container_pfr.style.display == 'none') ?
            heatMapLegend_container_pfr.style.display = 'block' : heatMapLegend_container_pfr.style.display = 'none';

        if (window.getComputedStyle(heatMapLegend_container_pfr).display === "none"){
            // alert ("Action: Close PFR legend");//E: For test
            drop_arrow.innerHTML = '<i style="font-size:20px" class="fa">&#xf103;</i>';
            report('m-clk**','Close PFR-map legend');
        } else {
            // alert ("Action: Open PFR legend");//E: For test
            drop_arrow.innerHTML = '<i style="font-size:20px" class="fa">&#xf102;</i>';
            report('m-clk**','Open PFR-map legend');
        }
    });

    //// OLD STUFF
// //Add the control to the map
    // options.gmap.controls[options.position].push(hml_extraFrame);

//     var pfr_leg = 0;
// //        google.maps.event.addDomListener(hml_extraFrame, 'click', options.action);
//     google.maps.event.addDomListener(hml_extraFrame, 'click', function () {
// //            report('m-clk*** ' , 'PFR Legend ');
//         jQuery('.heatMapLegend_container_pfr').toggle('show');
//         var cond=(pfr_leg%2) ? report('m-clk**','PFR Legend NOactivated'):report('m-clk**','PFR Legend activated');
//         pfr_leg++
// //            options.action;
//     });

    return hml_extraFrame;
}
// --------------------- End: (2) Settings for PFR-Legend in Heatmap ---------------------------------- //



// ===============----------------- Start: (3) Settings for PROFIT-Legend in Heatmap ------------- ==================== //

//  /////////////  FUNCTION for COST-LEGEND button into the heat-map  ///////////
// function buttonControl_cr(options, colorList, map, min_v, max_v,rg_pr) {
function buttonControl_cr(colorList, map, min_v, max_v,rg_pr) {
    min_v = Math.trunc(min_v);
//        alert("Line:2694-g2.php: " + "colors: " + Object.keys(colors).length + " map: " + map + "  min: " + min_v + "  max: " + max_v);

    // Level 0: extra frame to engañar to google map
    var hml_extraFrame = document.createElement('DIV'); //E: main container of the main-map-legend pannel
    hml_extraFrame.className = "hml_extraFrame"; //E: class name for the created DIV

    // Level 1: propper frame to show. It contains title and lengend-content
    var heatMapLegend_frame = document.createElement('DIV'); //E: main container of the main-map-legend pannel
    heatMapLegend_frame.className = "heatMapLegend_frame"; //E: class name for the created DIV

    // Level 1.a. Legend title or button
    var heatMapLegend_frameHead = document.createElement('DIV'); //E: legend-header (title) DIV is created here
    heatMapLegend_frameHead.className = 'mainMapLegend_button';
    heatMapLegend_frameHead.title = 'Click here to On/Off the legend';
    heatMapLegend_frameHead.index = 1;

    // Level 1.b. Legend displayable contain (contenido desplegable)
    var heatMapLegend_container_cr = document.createElement('DIV'); //E: container of labels and square boxes
    heatMapLegend_container_cr.className = "heatMapLegend_container_cr"; //E: class name for the created DIV
    heatMapLegend_container_cr.style.display="block";
    heatMapLegend_container_cr.title = 'Profit in US Dollars';//E:adding TITLE

    // Level 1.a.1
    var heatMapLeg_title = document.createElement('DIV'); //E: legend-header (title) DIV is created here
    // heatMapLeg_title.innerHTML = options.name;
    heatMapLeg_title.innerHTML = "Legend";
    heatMapLeg_title.className = 'heatMapLegend_title';

    // New DIV
    var box_for_units = document.createElement('DIV'); //E: This DIV will host the units description
    box_for_units.innerHTML = "Profit in US Dollars";
    box_for_units.className = 'box_for_units';
    box_for_units.style.fontSize = "10.5px";
    box_for_units.style.border = "1px solid #d9d9d9";
    box_for_units.style.marginBottom = "2px";
    box_for_units.style.backgroundColor = "#ffeecc";
    heatMapLegend_container_cr.appendChild(box_for_units);

    // Level 1.b.1
    var len_arr = Object.keys(colorList).length;
    var range2 = (max_v-min_v)/len_arr;
    var ii = 0;

    for (var key in colorList) {
        var boxContainer = document.createElement("DIV");
        var box = document.createElement("DIV");
        var label = document.createElement("SPAN");

//            var range_inf2 = min_v + Math.ceil(i*range2); // Get the low value of range
//            var range_sup2 = min_v + Math.ceil((i+1)*range2); // Get the high value of range
        var range_inf2 = rg_pr[ii]; // Get the low value of range
        var range_sup2 = rg_pr[ii+1]; // Get the high value of range

        boxContainer.appendChild(box);
        boxContainer.appendChild(label);
        heatMapLegend_container_cr.appendChild(boxContainer);

//            label.innerHTML = range_inf2 + ' to ' + range_sup2;// + ' cfs';
        label.innerHTML = range_inf2 + ' - ' + range_sup2;// + ' cfs';
        label.className = "label";
        box.className = "box";
        box.style.backgroundColor = colorList[key];
//            boxContainer.id = "box_container";
        boxContainer.className = "box_container";
        ii += 1;
    }

    //Level 1.a.2
    var drop_arrow = document.createElement('DIV'); //E: DIV is created the dropdown arrow
    drop_arrow.className = "dropdown_img"; //E: class name for the created DIV
    drop_arrow.innerHTML = '<i style="font-size:20px" class="fa">&#xf102;</i>';

    //E: Links between DOM's created above
    hml_extraFrame.appendChild(heatMapLegend_frame);

    heatMapLegend_frame.appendChild(heatMapLegend_frameHead);
    heatMapLegend_frame.appendChild(heatMapLegend_container_cr);

    heatMapLegend_frameHead.appendChild(heatMapLeg_title);
    heatMapLegend_frameHead.appendChild(drop_arrow);


    //E: Add a control for "hml_extraFrame" DIV. Definition and Settings of "hml_extraFrame" DIV is above
    heatmapRV1.controls[google.maps.ControlPosition.TOP_RIGHT].push(hml_extraFrame);

    //E: Add an event when "heatMapLegend_container_cr" DIV is clicked. "function ()" is activated when "heatMapLegend_container_cr" DIV is clicked.
    google.maps.event.addDomListener(hml_extraFrame, 'click', function () {
        (heatMapLegend_container_cr.style.display == 'none') ?
            heatMapLegend_container_cr.style.display = 'block' : heatMapLegend_container_cr.style.display = 'none';

        if (window.getComputedStyle(heatMapLegend_container_cr).display === "none"){
            // alert ("Action: Close PROFIT legend");//E: For test
            drop_arrow.innerHTML = '<i style="font-size:20px" class="fa">&#xf103;</i>';
            report('m-clk**','Close PROFIT-map legend');
        } else {
            // alert ("Action: Open PROFIT legend");//E: For test
            drop_arrow.innerHTML = '<i style="font-size:20px" class="fa">&#xf102;</i>';
            report('m-clk**','Open PROFIT-map legend');
        }
    });


//// OLD STUFF
//     // Add the control to the map
//     // options.gmap.controls[options.position].push(mainMapLeg_button);
//     options.gmap.controls[options.position].push(hml_extraFrame);
//
//     var cr_leg = 0;
// //        google.maps.event.addDomListener(hml_extraFrame, 'click', options.action);
//     google.maps.event.addDomListener(hml_extraFrame, 'click', function () {
//         jQuery('.heatMapLegend_container_cr').toggle('show');
//         var cond=(cr_leg%2) ? report('m-clk**','CR Legend NOactivated'):report('m-clk**','CR Legend activated');
//         cr_leg++
//     });

    return hml_extraFrame;
}
// ==============--------------- End: (3) Settings for Legend in Cost-Heatmap ------------- =================== //


// --------------------------- Start: (4) Settings for SR-Legend in Heatmap --------------------- //

//   /////////////   FUNCTION for SR-LEGEND button into the heat-map  /////////////
// function buttonControl_sr(options, colorList, map, min_v, max_v, rg_sr) {
function buttonControl_sr(colorList, map, min_v, max_v, rg_sr) {
    min_v = Math.trunc(min_v);
//        alert("Line:2694-g2.php: " + "colors: " + Object.keys(colors).length + " map: " + map + "  min: " + min_v + "  max: " + max_v);

    // Level 0: extra frame to engañar to google map
    var hml_extraFrame = document.createElement('DIV'); //E: main container of the main-map-legend pannel
    hml_extraFrame.className = "hml_extraFrame"; //E: class name for the created DIV

    // Level 1: propper frame to show. It contains title and lengend-content
    var heatMapLegend_frame = document.createElement('DIV'); //E: main container of the main-map-legend pannel
    heatMapLegend_frame.className = "heatMapLegend_frame"; //E: class name for the created DIV

    // Level 1.a. Legend title or button
    var heatMapLegend_frameHead = document.createElement('DIV'); //E: legend-header (title) DIV is created here
    heatMapLegend_frameHead.className = 'mainMapLegend_button';
    heatMapLegend_frameHead.title = 'Click here to On/Off the legend';
    heatMapLegend_frameHead.index = 1;

    // Level 1.b. Legend displayable contain (contenido desplegable)
    var heatMapLegend_container_sr = document.createElement('DIV'); //E: container of labels and square boxes
    heatMapLegend_container_sr.className = "heatMapLegend_container_sr"; //E: class name for the created DIV
    heatMapLegend_container_sr.style.display="block";
    heatMapLegend_container_sr.title = 'Sediment Reduction in tons';//E:adding TITLE

    // Level 1.a.1
    var heatMapLeg_title = document.createElement('DIV'); //E: legend-header (title) DIV is created here
    // heatMapLeg_title.innerHTML = options.name;
    heatMapLeg_title.innerHTML = "Legend";
    heatMapLeg_title.className = 'heatMapLegend_title';

    // New DIV
    var box_for_units = document.createElement('DIV'); //E: This DIV will host the units description
    box_for_units.innerHTML = "Sediment Reduction in tons";
    box_for_units.className = 'box_for_units';
    box_for_units.style.fontSize = "10.5px";
    box_for_units.style.border = "1px solid #d9d9d9";
    box_for_units.style.marginBottom = "2px";
    box_for_units.style.backgroundColor = "#ffeecc";
    heatMapLegend_container_sr.appendChild(box_for_units);

    // Level 1.b.1
    var len_arr = Object.keys(colorList).length;
    var range2 = (max_v-min_v)/len_arr;
    var ii = 0;

    for (var key in colorList) {
        var boxContainer = document.createElement("DIV");
        var box = document.createElement("DIV");
        var label = document.createElement("SPAN");

//            var range_inf2 = min_v + Math.ceil(i*range2); // Get the low value of range
//            var range_sup2 = min_v + Math.ceil((i+1)*range2); // Get the high value of range
        var range_inf2 = rg_sr[ii]; // Get the low value of range
        var range_sup2 = rg_sr[ii+1]; // Get the high value of range

        boxContainer.appendChild(box);
        boxContainer.appendChild(label);
        heatMapLegend_container_sr.appendChild(boxContainer);

//            label.innerHTML = range_inf2 + ' to ' + range_sup2;// + ' cfs';
        label.innerHTML = range_inf2 + ' - ' + range_sup2;// + ' cfs';
        label.className = "label";
        box.className = "box";
        box.style.backgroundColor = colorList[key];
//            boxContainer.id = "box_container";
        boxContainer.className = "box_container";
        ii += 1;
    }

    //Level 1.a.2
    var drop_arrow = document.createElement('DIV'); //E: DIV is created the dropdown arrow
    drop_arrow.className = "dropdown_img"; //E: class name for the created DIV
    drop_arrow.innerHTML = '<i style="font-size:20px" class="fa">&#xf102;</i>';

    //E: Links between DOM's created above
    hml_extraFrame.appendChild(heatMapLegend_frame);

    heatMapLegend_frame.appendChild(heatMapLegend_frameHead);
    heatMapLegend_frame.appendChild(heatMapLegend_container_sr);

    heatMapLegend_frameHead.appendChild(heatMapLeg_title);
    heatMapLegend_frameHead.appendChild(drop_arrow);


    //E: Add a control for "hml_extraFrame" DIV. Definition and Settings of "hml_extraFrame" DIV is above
    heatmapSR1.controls[google.maps.ControlPosition.TOP_RIGHT].push(hml_extraFrame);

    //E: Add an event when "heatMapLegend_container_sr" DIV is clicked. "function ()" is activated when "heatMapLegend_container_sr" DIV is clicked.
    google.maps.event.addDomListener(hml_extraFrame, 'click', function () {
        (heatMapLegend_container_sr.style.display == 'none') ?
            heatMapLegend_container_sr.style.display = 'block' : heatMapLegend_container_sr.style.display = 'none';

        if (window.getComputedStyle(heatMapLegend_container_sr).display === "none"){
            // alert ("Action: Close SR legend");//E: For test
            drop_arrow.innerHTML = '<i style="font-size:20px" class="fa">&#xf103;</i>';
            report('m-clk**','Close SR-map legend');
        } else {
            // alert ("Action: Open SR legend");//E: For test
            drop_arrow.innerHTML = '<i style="font-size:20px" class="fa">&#xf102;</i>';
            report('m-clk**','Open SR-map legend');
        }
    });


//// OLD STUFF
//     // Add the control to the map
//     // options.gmap.controls[options.position].push(mainMapLeg_button);
//     options.gmap.controls[options.position].push(hml_extraFrame);
//
//     var sr_leg = 0;
// //        google.maps.event.addDomListener(hml_extraFrame, 'click', options.action);
//     google.maps.event.addDomListener(hml_extraFrame, 'click', function () {
//         jQuery('.heatMapLegend_container_sr').toggle('show');
//         var cond=(sr_leg%2)? report('m-clk**','SR Legend NOactivated'):report('m-clk**','SR Legend activated');
//         sr_leg++
//     });

    return hml_extraFrame;
}
// ===================== ------------ End: (4) Settings for Legend in SR-Heatmap ------------- =================== //


// --------------------- Start: (5) Settings for NR-Legend in Heatmap ---------------------- //

//  /////////////  FUNCTION for NR-LEGEND button into the heat-map  /////////////
// function buttonControl_nr(options, colorList, map, min_v, max_v,rg_nr) {
function buttonControl_nr(colorList, map, min_v, max_v,rg_nr) {
    min_v = Math.trunc(min_v);
//        alert("Line:2694-g2.php: " + "colors: " + Object.keys(colors).length + " map: " + map + "  min: " + min_v + "  max: " + max_v);

    // Level 0: extra frame to engañar to google map
    var hml_extraFrame = document.createElement('DIV'); //E: main container of the main-map-legend pannel
    hml_extraFrame.className = "hml_extraFrame"; //E: class name for the created DIV

    // Level 1: propper frame to show. It contains title and lengend-content
    var heatMapLegend_frame = document.createElement('DIV'); //E: main container of the main-map-legend pannel
    heatMapLegend_frame.className = "heatMapLegend_frame"; //E: class name for the created DIV

    // Level 1.a. Legend title or button
    var heatMapLegend_frameHead = document.createElement('DIV'); //E: legend-header (title) DIV is created here
    heatMapLegend_frameHead.className = 'mainMapLegend_button';
    heatMapLegend_frameHead.title = 'Click here to On/Off the legend';
    heatMapLegend_frameHead.index = 1;

    // Level 1.b. Legend displayable contain (contenido desplegable)
    var heatMapLegend_container_nr = document.createElement('DIV'); //E: container of labels and square boxes
    heatMapLegend_container_nr.className = "heatMapLegend_container_nr"; //E: class name for the created DIV
    heatMapLegend_container_nr.style.display="block";
    heatMapLegend_container_nr.title = 'Nitrate Reduction in kilograms';//E:adding TITLE

    // Level 1.a.1
    var heatMapLeg_title = document.createElement('DIV'); //E: legend-header (title) DIV is created here
    // heatMapLeg_title.innerHTML = options.name;
    heatMapLeg_title.innerHTML = "Legend";
    heatMapLeg_title.className = 'heatMapLegend_title';

    // New DIV
    var box_for_units = document.createElement('DIV'); //E: This DIV will host the units description
    box_for_units.innerHTML = "Nitrate Reduction in kilograms";
    box_for_units.className = 'box_for_units';
    box_for_units.style.fontSize = "10.5px";
    box_for_units.style.border = "1px solid #d9d9d9";
    box_for_units.style.marginBottom = "2px";
    box_for_units.style.backgroundColor = "#ffeecc";
    heatMapLegend_container_nr.appendChild(box_for_units);

    // Level 1.b.1
    var len_arr = Object.keys(colorList).length;
    var range2 = (max_v-min_v)/len_arr;
    var ii = 0;

    for (var key in colorList) {
        var boxContainer = document.createElement("DIV");
        var box = document.createElement("DIV");
        var label = document.createElement("SPAN");

//            var range_inf2 = min_v + Math.ceil(i*range2); // Get the low value of range
//            var range_sup2 = min_v + Math.ceil((i+1)*range2); // Get the high value of range
        var range_inf2 = rg_nr[ii]; // Get the low value of range
        var range_sup2 = rg_nr[ii+1]; // Get the high value of range

        boxContainer.appendChild(box);
        boxContainer.appendChild(label);
        heatMapLegend_container_nr.appendChild(boxContainer);

//            label.innerHTML = range_inf2 + ' to ' + range_sup2;// + ' cfs';
        label.innerHTML = range_inf2 + ' - ' + range_sup2;// + ' cfs';
        label.className = "label";
        box.className = "box";
        box.style.backgroundColor = colorList[key];
//            boxContainer.id = "box_container";
        boxContainer.className = "box_container";
        ii += 1;
    }

    //Level 1.a.2
    var drop_arrow = document.createElement('DIV'); //E: DIV is created the dropdown arrow
    drop_arrow.className = "dropdown_img"; //E: class name for the created DIV
    drop_arrow.innerHTML = '<i style="font-size:20px" class="fa">&#xf102;</i>';

    //E: Links between DOM's created above
    hml_extraFrame.appendChild(heatMapLegend_frame);

    heatMapLegend_frame.appendChild(heatMapLegend_frameHead);
    heatMapLegend_frame.appendChild(heatMapLegend_container_nr);

    heatMapLegend_frameHead.appendChild(heatMapLeg_title);
    heatMapLegend_frameHead.appendChild(drop_arrow);

    //E: Add a control for "hml_extraFrame" DIV. Definition and Settings of "hml_extraFrame" DIV is above
    heatmapNR1.controls[google.maps.ControlPosition.TOP_RIGHT].push(hml_extraFrame);

    //E: Add an event when "heatMapLegend_container_nr" DIV is clicked. "function ()" is activated when "heatMapLegend_container_nr" DIV is clicked.
    google.maps.event.addDomListener(hml_extraFrame, 'click', function () {
        (heatMapLegend_container_nr.style.display == 'none') ?
            heatMapLegend_container_nr.style.display = 'block' : heatMapLegend_container_nr.style.display = 'none';

        if (window.getComputedStyle(heatMapLegend_container_nr).display === "none"){
            // alert ("Action: Close NR legend");//E: For test
            drop_arrow.innerHTML = '<i style="font-size:20px" class="fa">&#xf103;</i>';
            report('m-clk**','Close NR-map legend');
        } else {
            // alert ("Action: Open NR legend");//E: For test
            drop_arrow.innerHTML = '<i style="font-size:20px" class="fa">&#xf102;</i>';
            report('m-clk**','Open NR-map legend');
        }
    });



//// OLD STUFF
//     // Add the control to the map
//     // options.gmap.controls[options.position].push(mainMapLeg_button);
//     options.gmap.controls[options.position].push(hml_extraFrame);
//
//     var nr_leg = 0;
// //        google.maps.event.addDomListener(hml_extraFrame, 'click', options.action);
//     google.maps.event.addDomListener(hml_extraFrame, 'click', function () {
//         jQuery('.heatMapLegend_container_nr').toggle('show');
//         var cond=(nr_leg%2)? report('m-clk**','NR Legend NOactivated'):report('m-clk**','NR Legend activated');
//         nr_leg++
// //            options.action;
//     });

    return hml_extraFrame;
}
// ===================== ------------ End: (5) Settings for Legend in NR-Heatmap ------------- =================== //
// ========================  End setting functions for MainMap, PFR, CR, SR, NR, legend-buttons ============== //

