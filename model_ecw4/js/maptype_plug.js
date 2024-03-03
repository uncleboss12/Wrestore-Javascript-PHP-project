// This 'script' is compliment of mapping_new script.
// This is called by 'mapping_new' to build the DOM, and switch the type of map


// ================ Start: Create DOM For Map-Type. =======================//

//E: The check and uncheck function is controlated by 2 functions: 'checkbox_Function1' and 'checkbox_Function2'
//E: located at here at the bottom (at the end of these session)
var maptype_container = document.createElement('DIV'); //E: ***
maptype_container.className = 'maptype_container';
maptype_container.title = 'Click here to On/Off';
maptype_container.index = 1;
maptype_container.style.display = 'flex';

var container_maptype1 = document.createElement('DIV'); //E: ***
container_maptype1.type = 'button';
container_maptype1.className = 'container_maptype1';
container_maptype1.style.width = '50%';
var container_maptype2 = document.createElement('DIV'); //E: ***
container_maptype2.type = 'button';
container_maptype2.className = 'container_maptype2';
container_maptype2.style.width = '50%';

var node1 = document.createElement('div');
node1.innerHTML = '<input type="checkbox" id="check1" name="check1" checked onclick="checkbox_Function1(this.id)"><label for="check1"> Roadmap </label>';
container_maptype1.appendChild(node1);

var node2 = document.createElement('div');
node2.innerHTML = '<input type="checkbox" id="check2" name="check2" onclick="checkbox_Function2(this.id)"><label for="check2"> Satellite </label>';
container_maptype2.appendChild(node2);

maptype_container.appendChild(container_maptype1);
maptype_container.appendChild(container_maptype2);

// ========================= End: Create DOM For Map-Type =========================== //


// ---------------------- Start: Functions for selecting TypeMap ------------------------------ //
//E: These two functions are set to select the typeMap of the base map
//E: These two functions are called above (above: create DOM for Type-Map)
//E: See another way: http://www-db.deis.unibo.it/courses/TW/DOCS/w3schools/googleapi/tryit.asp-filename=tryhtml_ref_setmaptypeid.html
function checkbox_Function1(id){
    // alert("checkit ROADMAP"+ JSON.stringify(id));
    document.getElementById("check2").checked = false;
    basemap_1.setMapTypeId(google.maps.MapTypeId.ROADMAP);
}
function checkbox_Function2(id){
    // alert("checkit**"+ JSON.stringify(id));
    document.getElementById("check1").checked = false;
    basemap_1.setMapTypeId(google.maps.MapTypeId.SATELLITE);
}
// ---------------------------------- End: Functions for selecting TypeMap -------------------------------- //


