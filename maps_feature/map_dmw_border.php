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

</head>

<body>
<h3 style="margin: 5px 0px">Dairy McKay Watershed</h3>
<!--The div element for the map -->
<div id="map_div"></div>
<script>
    // Initialize and add the map
    function initMap() {
        var basemap = new google.maps.Map(document.getElementById('map_div'), {
            center: new google.maps.LatLng(45.65, -123.1),//E: center for "Dairy-Mckay"
            zoom: 9.5,
        });

        var newCoordinates = constructNewCoordinates(border_json.features[0].geometry);//EE: Function is Set at 1069

        var background = new google.maps.Polygon({
            path: newCoordinates,
            // map: basemap
            strokeOpacity: .6, strokeWeight: 1,
            fillOpacity: 0.3, fillColor: "#000099",//"#ffb366",// "#ff99cc",// "#aaff80",// "#ffff99",//"#ffffff",
            // clickable: true,
            // indexID: whichNode
        });

        background.setMap(basemap);//E: IT SETS THE POLYGONS over the BASEMAP


        var acres = border_json.properties[0]["area_mi2"];//EE:
        var listAll = '<h4><strong> Dairy-McKay Watershed </strong></h4>' + 'Watershed Area: ' + acres + '  sq. mi.<br>';
        // var listAll = 'Dairy-McKay Watershed </br>' + 'Watershed Area: ' + acres + '  sq. mi.<br>';
        var obj = {
            'list': listAll
        };
        background.objInfo = obj;

        google.maps.event.addListener(background, 'click', function (event) {
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