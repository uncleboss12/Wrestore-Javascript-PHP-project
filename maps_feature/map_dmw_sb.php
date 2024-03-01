<!DOCTYPE html>
<html>
<head>
    <style>
        html, body { height:100%; width:100%;}

        /* Set the size of the div element that contains the map */
        #map_div {
            width:100%;
            height:95%;
            position: relative;
            top: 5px;/* This was given for showing the tittle */
            left: 0px;
        }
    </style>

    <!--    DATA    -->
    <script src="data/dmw_border.js"></script> <!-- JS.File name. var "Watershed border" -->
    <script src="data/dmw_sb.js"></script> <!-- JS.File name. var "Watershed sub-basins" -->

</head>

<body>
<h3 style="margin: 5px 0px">Dairy McKay Sub-basins</h3>
<!--The div element for the map -->
<div id="map_div"></div>
<script>
    // Initialize and add the map
    function initMap() {
        var basemap = new google.maps.Map(document.getElementById('map_div'), {
            center: new google.maps.LatLng(45.65, -123.1),//E: center for "Dairy-Mckay"
            zoom: 10.5,
        });

        // --------- Start: Draw the Watershed border --------- //
        var newCoordinates_border = [];//EE: For polygons or sub-basins
        var newCoordinates_border = constructNewCoordinates(border_json.features[0].geometry);//EE: Function is Set at 85
        //E: "background_2" is for border
        var background_2 = new google.maps.Polygon({
            path: newCoordinates_border,
            // map: basemap
            strokeColor: '#000099', strokeOpacity: .6, strokeWeight: 4,
            fillOpacity: 0, fillColor: "#ffffcc",//"#ffb366",// "#ff99cc",// "#aaff80",// "#ffff99",//"#ffffff",
            // clickable: true,
            // indexID: whichNode
        });
        background_2.setMap(basemap);//E: IT SETS THE POLYGONS over the BASEMAP
        // ------------ End: Draw the Watershed border ------------ //

        // ------------ Start: Draw the Sub-basins ------------ //
        for (var i = 0; i < subbasin_json.features.length; i++){
            var newCoordinates = [];//EE: For polygons or sub-basins
            var newCoordinates_labels = [];//EE: For labels on each sub-basin
            var newCoordinates = constructNewCoordinates(subbasin_json.features[i].geometry);//EE: Function is Set at 85

            var whichNode = subbasin_json.properties[i]["Subbasin"].toString();//E: For "ecw"
            var acres = subbasin_json.properties[i]["area_ac"];//EE:
            var acres = Math.round(acres * 100) / 100;
            var rivers = subbasin_json.properties[i]["stream_mi"];//EE:
            var rivers = Math.round(rivers * 1000) / 1000;

            //E: "background_1" is for sub basins
            var background_1 = new google.maps.Polygon({
                path: newCoordinates,
                // map: basemap
                strokeColor: '#000099', strokeOpacity: .6, strokeWeight: 1,
                fillOpacity: 0.3, fillColor: "#ffffcc",//"#ffb366",// "#ff99cc",// "#aaff80",// "#ffff99",//"#ffffff",
                // clickable: true,
                // indexID: whichNode
            });
            background_1.setMap(basemap);//E: IT SETS THE POLYGONS over the BASEMAP

            // ------------ End: Draw the Sub-basins ------------ //


            // ------------ Start: List of data to show when click over sub-basins ------------ //
            var listAll = '<h4><strong> Dairy-McKay Watershed </strong></h4>' +
                'Sub basin: # ' + whichNode + '<br>'+'Watershed Area: ' + acres + '  sq. mi.<br>';
            // var listAll = 'Dairy-McKay Watershed </br>' + 'Watershed Area: ' + acres + '  sq. mi.<br>';
            var obj = {
                'list': listAll
            };
            background_1.objInfo = obj;

            google.maps.event.addListener(background_1, 'click', function (event) {
                // alert ("hello");
                // $('.displayStuff').html(this.objInfo.list);
                // alert("objInfo: " +"\n"+ this.objInfo.list);
                // var window_info = this.objInfo.list + '<br><div class="displayStuffb" name="What Do They Mean">' +
                //     '<a target="_blank" href="infoBox.html" rel="shadowbox;height=640;width=620" name="What Do They Mean">' +
                //     '<strong><em name="What Do They Mean">What do these numbers* mean?</em></strong></a></div>';
                var window_info = this.objInfo.list;
                infowindow2 = new google.maps.InfoWindow({//E: it makes a window with information
                    content: window_info,
                    position: event.latLng
                });
                infowindow2.open(basemap);//E: The window with information is added to the basemap.
                // alert ("Suggestion: " + this.indexID); // newalert
                // report('m-clk+', 'Sug:' + (+oneMap + +1) + '  Sub-basin:' + this.indexID + ';'); // trackable
            });
            // ------------ End: List of data to show when click over sub-basins ------------ //
        }

        // ++++++++++++++  This is used to parse out the long lats for all the polygons +++++++++++++++++//
        function constructNewCoordinates(polygon) {
            var newCoordinates = [];
            var coordinates = null;
            if (polygon['coordinates'])
                coordinates = polygon['coordinates'];
            if (coordinates.length == 1) {
                coordinates = coordinates[0];
            }
            // alert(coordinates);
            for (var i in coordinates) {
                newCoordinates.push(
                    new google.maps.LatLng(coordinates[i][1], coordinates[i][0]));
            }
            return newCoordinates;
        }
        // +++++++++++++++++++++ end 'constructNewCoordinates(polygon)' +++++++++++++++++++++ //

    }
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVNzONb19t-556kuu-ebT5DUF0wCpEt-g&callback=initMap" type="text/javascript"></script>

</body>
</html>
