// This 'script' is compliment of mapping_new script.
// This is called by 'mapping_new' to build, check and track the BMP checkboxs located in the top side of the main map


// --------------- Start: Function 'toggleLayerNew' ----------------- //
//E: This function is called each time that features' checkboxes are checked or unchecked
// function toggleLayerNew(whichArray, whichArray2, mapName) {//E: old version, including Map2
function toggleLayerNew(whichArray, mapName) {
    // alert ("toggleLayerNew function ...  ");
    if (mapName.getMap()) {
        // alert (cropArray);
        $.each(whichArray, function(index, value) {
            // alert(value);
            value.setMap(null);
        });
        // $.each(whichArray2, function(index, value) {//E: This was for map 2, I think
        //     value.setMap(null);
        // });
    } else {
        $.each(whichArray, function(index, value) {
            // alert(value);
            // value.setMap(map1);
            value.setMap(basemap_1);
        });
        // $.each(whichArray2, function(index, value) {
        //     value.setMap(map2);
        // });
    }
}
// --------------- End: Function 'toggleLayerNew' ----------------- //


// $$$$$$$$$$$$$$$$$$$$$$$$$$$  Start  CHECK BOXES in the main map $$$$$$$$$$$$$$$$$$$$$$$$
// -------------- Start: Check Boxes for bmp (1),(2),(3),(4),(5),(6),and (7) in the main map ---------------- //

//E: (1)Function for Crop_Rotation checkbox
function checkBox_CropRotation(options) {
    var container = document.createElement('DIV'); //first make the outer container
    container.className = "checkboxContainer";
    container.title = options.title;
    container.id = options.id1;//'filter';

    var span = document.createElement('SPAN'); //E:It creates the check-box square
    span.role = "checkbox";
    span.className = "checkboxSpan";

    var bDiv = document.createElement('DIV'); //E:It creates a blank DIV to draw the "check" symbol v.
    bDiv.className = "blankDiv";
    bDiv.id = options.id2;

    var image = document.createElement('IMG'); //E:It creates a tag "IMG" with the check symbol v.
    image.className = "blankImg";
    image.src = "https://maps.gstatic.com/mapfiles/mv/imgs8.png";

    var label = document.createElement('LABEL'); //E:It creates a tag "LABEL" with the name Label.
    label.className = "checkboxLabel";
    label.innerHTML = options.label;

    container.appendChild(label); // If this DOM goes at the end, order of presentation will be switch
    bDiv.appendChild(image);
    span.appendChild(bDiv);
    container.appendChild(span);

    if (bmpArray_asNumbers[1]==0){//E: This condition un-check the box when the conservation practice is not set.
        bDiv.style.display = 'none';
    }

    //E: This lines draws the check box into the map, as it is called the 'checkBox' function.
    google.maps.event.addDomListener(container,'click',function(){
        if (bmpArray_asNumbers[1]==0){
            alert ("This option is not available because 'CropRotation' was not set");
        } else {
            // alert ("'CropRotation' option was SET");//E: For test. This message is Not needed for users

            //E: This function was defined above (at the beginning).
            toggleLayerNew(cropArray, crop);//E: toggle between set and unset CropRotation-features in the map.
            // EE: 'cropArray & crop' connect to "mapping_new.js/doCropRotation_markers()" (L.698) to on/off on the map

            // The "checked" or "unchecked" condition is controlled by using 'css' style here
            (document.getElementById(bDiv.id).style.display == 'none') ?
                document.getElementById(bDiv.id).style.display = 'block' : document.getElementById(bDiv.id).style.display = 'none';

            //----- For tracking
            //E: This 'if' checks if 'CropRotation' checkbox is checked to send info to the tracking function
            if (window.getComputedStyle(bDiv).display === "none") {
                // alert ("Action: Un-check CropRotation check-box");//E: For test
                report('m-clk', 'Un-check CropRotation check-box;'); //E: report 'CropRotation' un-check
            } else {
                // alert ("Action: Check CropRotation check-box");//E: For test
                report('m-clk', 'Check CropRotation check-box;'); //E: report 'CropRotation' un-check
            }
        }
        // options.action(); //E: option to add some other function. Not in use for now
    });
    return container;
}

//E: (2)Function for Cover_Crop checkbox
function checkBox_CoverCrop(options) {
    var container = document.createElement('DIV'); //first make the outer container
    container.className = "checkboxContainer";
    container.title = options.title;
    container.id = options.id1;

    var span = document.createElement('SPAN'); //E:It creates the check-box square
    span.role = "checkbox";
    span.className = "checkboxSpan";

    var bDiv = document.createElement('DIV'); //E:It creates a blank DIV to draw the "check" symbol v.
    bDiv.className = "blankDiv";
    bDiv.id = options.id2;

    var image = document.createElement('IMG'); //E:It creates a tag "IMG" with the check symbol v.
    image.className = "blankImg";
    image.src = "https://maps.gstatic.com/mapfiles/mv/imgs8.png";

    var label = document.createElement('LABEL'); //E:It creates a tag "LABEL" with the name Label.
    label.className = "checkboxLabel";
    label.innerHTML = options.label;

    container.appendChild(label); // If this DOM goes at the end, order of presentation will be switch
    bDiv.appendChild(image);
    span.appendChild(bDiv);
    container.appendChild(span);

    if (bmpArray_asNumbers[2]==0){//E: This condition un-check the box when the conservation practice is not set.
        bDiv.style.display = 'none';
    }

    //E: This lines draws the check box into the map, as it is called the 'checkBox' function.
    google.maps.event.addDomListener(container,'click',function(){
        if (bmpArray_asNumbers[2]==0){
            alert ("This option is not available because 'CoverCrop' was not set");
        } else {
            // alert ("'CoverCrop' option was SET");//E: For test. This message is Not needed for users
            toggleLayerNew(coverArray, cover);//E: important to change for each BMP. //E: toggle between set and unset wetland-features in the map

            // The "checked" or "unchecked" condition is controlled by using 'css' style here
            (document.getElementById(bDiv.id).style.display == 'none') ?
                document.getElementById(bDiv.id).style.display = 'block' : document.getElementById(bDiv.id).style.display = 'none';

            //E: This 'if' checks if 'CoverCrop' checkbox is checked to send info to the tracking function
            if (window.getComputedStyle(bDiv).display === "none") {
                // alert ("Action: Un-check CoverCrop check-box");//E: For test
                report('m-clk', 'Un-check CoverCrop check-box;'); //E: report 'CoverCrop' un-check
            } else {
                // alert ("Action: Check wetlands check-box");//E: For test
                report('m-clk', 'Check CoverCrop check-box;'); //E: report 'CoverCrop' un-check
            }
        }
        // options.action(); //E: option to add some other function. Not in use for now
    });
    return container;
}

//E: (3)Function for Strip Cropping checkbox
function checkBox_StripCropping(options) {
    var container = document.createElement('DIV'); //first make the outer container
    container.className = "checkboxContainer";
    container.title = options.title;
    container.id = options.id1;

    var span = document.createElement('SPAN'); //E:It creates the check-box square
    span.role = "checkbox";
    span.className = "checkboxSpan";

    var bDiv = document.createElement('DIV'); //E:It creates a blank DIV to draw the "check" symbol v.
    bDiv.className = "blankDiv";
    bDiv.id = options.id2;

    var image = document.createElement('IMG'); //E:It creates a tag "IMG" with the check symbol v.
    image.className = "blankImg";
    image.src = "https://maps.gstatic.com/mapfiles/mv/imgs8.png";

    var label = document.createElement('LABEL'); //E:It creates a tag "LABEL" with the name Label.
    label.className = "checkboxLabel";
    label.innerHTML = options.label;

    container.appendChild(label); // If this DOM goes at the end, order of presentation will be switched
    bDiv.appendChild(image);
    span.appendChild(bDiv);
    container.appendChild(span);

    if (bmpArray_asNumbers[0]==0){//E: This condition un-check the box when the conservation practice is not set.
        bDiv.style.display = 'none';
    }

    //E: This lines draws the check box into the map, as it is called the 'checkBox' function.
    google.maps.event.addDomListener(container,'click',function(){
        if (bmpArray_asNumbers[0]==0){
            alert ("This option is not available because 'StripCropping' was not set");
        } else {
            // alert ("'StripCropping' option was SET");//E: For test. This message is Not needed for users
            toggleLayerNew(stripArray, strip);//E: important to change for each BMP. //E: toggle between set and unset wetland-features in the map

            // The "checked" or "unchecked" condition is controlled by using 'css' style here
            (document.getElementById(bDiv.id).style.display == 'none') ?
                document.getElementById(bDiv.id).style.display = 'block' : document.getElementById(bDiv.id).style.display = 'none';

            //E: This 'if' checks if 'StripCropping' checkbox is checked to send info to the tracking function
            if (window.getComputedStyle(bDiv).display === "none") {
                // alert ("Action: Un-check StripCropping check-box");//E: For test
                report('m-clk', 'Un-check StripCropping check-box;'); //E: report 'StripCropping' un-check
            } else {
                // alert ("Action: Check wetlands check-box");//E: For test
                report('m-clk', 'Check StripCropping check-box;'); //E: report 'StripCropping' un-check
            }
        }
        // options.action(); //E: option to add some other function. Not in use for now
    });
    return container;
}

//E: (4)Function for Filter-strip checkbox
function checkBox_FilterStrip(options) { //E: Function for checkbox Filterstrip
    var container = document.createElement('DIV'); //first make the outer container
    container.className = "checkboxContainer";
    container.title = options.title;
    container.id = options.id1;//'filter';

    var span = document.createElement('SPAN'); //E:It creates the check-box square
    span.role = "checkbox";
    span.className = "checkboxSpan";

    var bDiv = document.createElement('DIV'); //E:It creates a blank DIV to draw the "check" symbol v.
    bDiv.className = "blankDiv";
    bDiv.id = options.id2;

    var image = document.createElement('IMG'); //E:It creates a tag "IMG" with the check symbol v.
    image.className = "blankImg";
    image.src = "https://maps.gstatic.com/mapfiles/mv/imgs8.png";

    var label = document.createElement('LABEL'); //E:It creates a tag "LABEL" with the name Label.
    label.className = "checkboxLabel";
    label.innerHTML = options.label;

    container.appendChild(label); // If this DOM goes at the end, order of presentation will be switch
    bDiv.appendChild(image);
    span.appendChild(bDiv);
    container.appendChild(span);

    if (bmpArray_asNumbers[3]==0){//E: This condition un-check the box when the conservation practice is not set.
        bDiv.style.display = 'none';
    }

    //E: This lines draws the check box into the map, as it is called the 'checkBox' function.
    google.maps.event.addDomListener(container,'click',function(){
        if (bmpArray_asNumbers[3]==0){
            alert ("This option is not available because 'FilterStrip' was not set");
        } else {
            // alert ("'FilterStrip' option was SET");//E: For test. This message is Not needed for users
            toggleLayerNew(filterArray, filter);

            // The "checked" or "unchecked" condition is controlled by using 'css' style here
            (document.getElementById(bDiv.id).style.display == 'none') ?
                document.getElementById(bDiv.id).style.display = 'block' : document.getElementById(bDiv.id).style.display = 'none';

            //E: This 'if' checks if 'wetland' checkbox is checked to send info to the tracking function
            if (window.getComputedStyle(bDiv).display === "none") {
                // alert ("Action: Un-check FilterStrips check-box");//E: For test
                report('m-clk', 'Un-check FilterStrips check-box;'); //E: report 'FilterStrips' un-check
            } else {
                // alert ("Action: Check FilterStrips check-box");//E: For test
                report('m-clk', 'Check FilterStrips check-box;'); //E: report 'FilterStrips' un-check
            }
        }
        // options.action(); // option to add some other function
    });
    return container;
}

//E: (5)Function for Grasswaterways checkbox
function checkBox_Grasswaterways(options) { //E: Function for checkbox Grasswaterways
    var container = document.createElement('DIV'); //first make the outer container
    container.className = "checkboxContainer";
    container.title = options.title;
    container.id = options.id1;//'filter';

    var span = document.createElement('SPAN'); //E:It creates the check-box square
    span.role = "checkbox";
    span.className = "checkboxSpan";

    var bDiv = document.createElement('DIV'); //E:It creates a blank DIV to draw the "check" symbol v.
    bDiv.className = "blankDiv";
    bDiv.id = options.id2;

    var image = document.createElement('IMG'); //E:It creates a tag "IMG" with the check symbol v.
    image.className = "blankImg";
    image.src = "https://maps.gstatic.com/mapfiles/mv/imgs8.png";

    var label = document.createElement('LABEL'); //E:It creates a tag "LABEL" with the name Label.
    label.className = "checkboxLabel";
    label.innerHTML = options.label;

    container.appendChild(label); // If this DOM goes at the end, order of presentation will be switch
    bDiv.appendChild(image);
    span.appendChild(bDiv);
    container.appendChild(span);

    if (bmpArray_asNumbers[4]==0){//E: This condition un-check the box when the conservation practice is not set.
        bDiv.style.display = 'none';
    }

    //E: This lines draws the check box into the map, as it is called the 'checkBox' function.
    google.maps.event.addDomListener(container,'click',function(){
        if (bmpArray_asNumbers[4]==0){
            alert ("This option is not available because 'Grasswaterways' was not set");
        } else {
            // alert ("'Grasswaterways' option was SET");//E: For test. This message is Not needed for users
            toggleLayerNew(grassArray, grass);

            // The "checked" or "unchecked" condition is controlled by using 'css' style here
            (document.getElementById(bDiv.id).style.display == 'none') ?
                document.getElementById(bDiv.id).style.display = 'block' : document.getElementById(bDiv.id).style.display = 'none';

            //E: This 'if' checks if 'Grasswaterways' checkbox is checked to send info to the tracking function
            if (window.getComputedStyle(bDiv).display === "none") {
                // alert ("Action: Un-check Grasswaterways check-box");//E: For test
                report('m-clk', 'Un-check Grasswaterways check-box;'); //E: report 'Grasswaterways' un-check
            } else {
                // alert ("Action: Check Grasswaterways check-box");//E: For test
                report('m-clk', 'Check Grasswaterways check-box;'); //E: report 'Grasswaterways' un-check
            }
        }
        // options.action(); // option to add some other function
    });
    return container;
}

//E: (6)Function for No-Tillage checkbox (Conservation Tillage)
function checkBox_NoTillage(options) { //E: Function for checkbox No Tillage
    var container = document.createElement('DIV'); //first make the outer container
    container.className = "checkboxContainer";
    container.title = options.title;
    container.id = options.id1;

    var span = document.createElement('SPAN'); //E:It creates the check-box square
    span.role = "checkbox";
    span.className = "checkboxSpan";

    var bDiv = document.createElement('DIV'); //E:It creates a blank DIV to draw the "check" symbol v.
    bDiv.className = "blankDiv";
    bDiv.id = options.id2;

    var image = document.createElement('IMG'); //E:It creates a tag "IMG" with the check symbol v.
    image.className = "blankImg";
    image.src = "https://maps.gstatic.com/mapfiles/mv/imgs8.png";

    var label = document.createElement('LABEL'); //E:It creates a tag "LABEL" with the name Label.
    label.className = "checkboxLabel";
    label.innerHTML = options.label;

    container.appendChild(label); // If this DOM goes at the end, order of presentation will be switch
    bDiv.appendChild(image);
    span.appendChild(bDiv);
    container.appendChild(span);

    if (bmpArray_asNumbers[5]==0){//E: This condition un-check the box when the conservation practice is not set.
        bDiv.style.display = 'none';
    }

    //E: This lines draws the check box into the map, as it is clicked the 'checkBox'.
    google.maps.event.addDomListener(container,'click',function(){
        if (bmpArray_asNumbers[5]==0){
            alert ("This option is not available because 'Conservation-Tillage' was not set");
        } else {
            // alert ("'No-Tillage' option was SET");//E: For test. This message is Not needed for users
            toggleLayerNew(conserveArray, notill); //E: toggle between set and unset NoTillage-features in the map

            // The "checked" or "unchecked" condition is controlled by using 'css' style
            (document.getElementById(bDiv.id).style.display == 'none') ?
                document.getElementById(bDiv.id).style.display = 'block' : document.getElementById(bDiv.id).style.display = 'none';

            //E: This 'if' checks if 'No-Tillage' checkbox is checked to send info to the tracking function
            if (window.getComputedStyle(bDiv).display === "none") {
                // alert ("Action: Un-check wetlands check-box");//E: For test
                report('m-clk', 'Un-check No-Tillage check-box;'); //E: report 'wetland' un-check
            } else {
                // alert ("Action: Check wetlands check-box");//E: For test
                report('m-clk', 'Check No-Tillage check-box;'); //E: report 'wetland' un-check
            }
        }
        // options.action(); // option to add some other function
    });
    return container;
}

//E: (7)Function for Wetlands checkbox (Wetlands)
function checkBox_Wetlands(options) { //E: Function for checkbox No Tillage
    var container = document.createElement('DIV'); //first make the outer container
    container.className = "checkboxContainer";
    container.title = options.title;
    container.id = options.id1;

    var span = document.createElement('SPAN'); //E:It creates the check-box square
    span.role = "checkbox";
    span.className = "checkboxSpan";

    var bDiv = document.createElement('DIV'); //E:It creates a blank DIV to draw the "check" symbol v.
    bDiv.className = "blankDiv";
    bDiv.id = options.id2;

    var image = document.createElement('IMG'); //E:It creates a tag "IMG" with the check symbol v.
    image.className = "blankImg";
    image.src = "https://maps.gstatic.com/mapfiles/mv/imgs8.png";

    var label = document.createElement('LABEL'); //E:It creates a tag "LABEL" with the name Label.
    label.className = "checkboxLabel";
    label.innerHTML = options.label;

    container.appendChild(label); // If this DOM goes at the end, order of presentation will be switch
    bDiv.appendChild(image);
    span.appendChild(bDiv);
    container.appendChild(span);

    if (bmpArray_asNumbers[7]==0){//E: This condition un-check the box when the conservation practice is not set.
        bDiv.style.display = 'none';
    }

    //E: This lines draws the check box into the map, as it is called the 'checkBox' function.
    google.maps.event.addDomListener(container,'click',function(){
        if (bmpArray_asNumbers[7]==0){
            alert ("This option is not available because 'Wetlands' was not set");
        } else {
            // alert ("'Wetlands' option was SET");//E: For test. This message is Not needed for users
            toggleLayerNew(wetArray, wetlands);//E: toggle between set and unset wetland-features in the map

            // The "checked" or "unchecked" condition is controlled by using 'css' style here
            (document.getElementById(bDiv.id).style.display == 'none') ?
                document.getElementById(bDiv.id).style.display = 'block' : document.getElementById(bDiv.id).style.display = 'none';

            //E: This 'if' checks if 'wetland' checkbox is checked to send info to the tracking function
            if (window.getComputedStyle(bDiv).display === "none") {
                // alert ("Action: Un-check wetlands check-box");//E: For test
                report('m-clk', 'Un-check wetlands check-box;'); //E: report 'wetland' un-check
            } else {
                // alert ("Action: Check wetlands check-box");//E: For test
                report('m-clk', 'Check wetlands check-box;'); //E: report 'wetland' un-check
            }
        }
        // options.action(); //E: option to add some other function. Not in use for now
    });
    return container;
}
// -------------- End: Check Boxes for bmp (1),(2),(3),(4),(5),(6),and (7) in the main map ---------------- //


// -----------------------  Function for Second way. Not in use now ------------------------
function bmp1_ckbox_function(controlDiv, map) {
    //Based on: https://stackoverflow.com/questions/28155703/custom-button-with-google-maps-drawing
    // Set CSS for the control border.
    var controlUI = document.createElement('div');
    controlUI.style.backgroundColor = '#ffffff';//'#99ff66';
    controlUI.style.height = '23px';
//        controlUI.style.marginTop = '5px';
    controlUI.style.marginLeft = '-9px';
    controlUI.style.paddingTop = '1px';
    controlUI.style.cursor = 'pointer';
    controlUI.style.display = 'inline-flex';
    controlUI.title = 'Your Custom function..';
    controlUI.className = 'controlUI';
    controlDiv.appendChild(controlUI);

    // Set CSS for the control interior.
    var controlText = document.createElement('div');
    controlText.style.padding = '2px';
    controlText.innerHTML = 'Crop Rotation+';
    controlText.style.color = '#000000';

    var span = document.createElement('SPAN'); //E:It creates the check-box square
    span.role = "checkbox";
    span.className = "checkboxSpan";
//
    var bDiv = document.createElement('DIV'); //E:It creates a blank DIV to draw the "check" symbol v.
    bDiv.className = "blankDiv";
    bDiv.id = 'bmp1_box';//options.id;
//
    var image = document.createElement('IMG'); //E:It creates a tag "IMG" with the check symbol v.
    image.className = "blankImg";
    image.src = "https://maps.gstatic.com/mapfiles/mv/imgs8.png";
//
    controlUI.appendChild(controlText);

    bDiv.appendChild(image);
    span.appendChild(bDiv);
    controlUI.appendChild(span);

    // Setup the click event listeners
    google.maps.event.addDomListener(controlUI,'click',function(){
        (document.getElementById(bDiv.id).style.display == 'block') ? document.getElementById(bDiv.id).style
            .display = 'none' : document.getElementById(bDiv.id).style.display = 'block';
    });
}
// ---------------------  End Function for Second way -------------------

// $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$  End: Check boxes in the main map $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$



// ==================== Start: FUNCTION for TRACKING CHECKBOXS in LEGEND. Not in use now =================== //
//  (1) Crop-rotation         (cr)
//  (2) Cover-crops           (cc)
//  (3) Strip-Cropping        (sc)
//  (4) Filter-strip          (fs)
//  (5) Grass waterways       (gw)
//  (6) No-Till (Till conservation)(nt)
//  (7) Wetlands              (wt)
/*
function track_check_cropRotation(){ // (1) Crop-rotation (cr)
    var value_name = document.getElementsByClassName("cr")[0].getAttribute("value"); // Cover-Crop (cc)
    if ($('input.cr').is(':checked')) {
        report('m-clk+', 'Check of ' + value_name + ';'); // report('Check of', ' Filter-strips' + ';');
    }else{
        report('m-clk+', 'Un-check of ' + value_name + ';');// report('Un-check of', ' Filter-strips' + ';');
    }
}

function track_check_coverCrop(){ // (2) Cover-crops (cc)
    var value_name = document.getElementsByClassName("cc")[0].getAttribute("value"); // Cover-Crop (cc)
    if ($('input.cc').is(':checked')) {
        report('m-clk+', 'Check of ' + value_name + ';'); // report('Check of', ' Filter-strips' + ';');
    }else{
        report('m-clk+', 'Un-check of ' + value_name + ';');// report('Un-check of', ' Filter-strips' + ';');
    }
}

function track_check_stripCropping(){ // (3) Strip-Cropping (sc)
    var value_name = document.getElementsByClassName("sc")[0].getAttribute("value"); // Cover-Crop (cc)
    if ($('input.sc').is(':checked')) {
        report('m-clk+', 'Check of ' + value_name + ';'); // report('Check of', ' Filter-strips' + ';');
    }else{
        report('m-clk+', 'Un-check of ' + value_name + ';');// report('Un-check of', ' Filter-strips' + ';');
    }
}

function track_check_filterStrip(){ //(4) Filter-strip (fs)
    var value_name = document.getElementsByClassName("fs")[0].getAttribute("value"); // Filter-strip (fs)
    if ($('input.fs').is(':checked')) {
        report('m-clk+', 'Check of ' + value_name + ';'); // report('Check of', ' Filter-strips' + ';');
    }else{
        report('m-clk+', 'Un-check of ' + value_name + ';');// report('Un-check of', ' Filter-strips' + ';');
    }
}

function track_check_grassWaterway(){ // (5) Grass waterways (gw)
    var value_name = document.getElementsByClassName("gw")[0].getAttribute("value"); // Cover-Crop (cc)
    if ($('input.gw').is(':checked')) {
        report('m-clk+', 'Check of ' + value_name + ';'); // report('Check of', ' Filter-strips' + ';');
    }else{
        report('m-clk+', 'Un-check of ' + value_name + ';');// report('Un-check of', ' Filter-strips' + ';');
    }
}

function track_check_noTill(){ // (6) No-Till (Till conservation)(nt)
    var value_name = document.getElementsByClassName("nt")[0].getAttribute("value"); // Cover-Crop (cc)
    if ($('input.nt').is(':checked')) {
        report('m-clk+', 'Check of ' + value_name + ';'); // report('Check of', ' Filter-strips' + ';');
    }else{
        report('m-clk+', 'Un-check of ' + value_name + ';');// report('Un-check of', ' Filter-strips' + ';');
    }
}

function track_check_wetland(){ // (7) Wetlands (wt)
    var value_name = document.getElementsByClassName("wt")[0].getAttribute("value"); // Cover-Crop (cc)
    if ($('input.wt').is(':checked')) {
        report('m-clk+', 'Check of ' + value_name + ';'); // report('Check of', ' Filter-strips' + ';');
    }else{
        report('m-clk+', 'Un-check of ' + value_name + ';');// report('Un-check of', ' Filter-strips' + ';');
    }
}

// ================== End: FUNCTION FOR TRACKING CHECKBOXS in LEGEND =================== //
*/