// This function builds the main-legend DOM

// 'mm_legend' builds the main-map legend DOM


function mm_legend(){

    // ##########  Start building bmp (1), (2), (3), (4), and (5)  ########
    // Build and set the square-boxes of Crop-Rotation, Cover-Crop, Strip-Cropping, Grass-Waterways, and
    // Conservation-Tillage

    // Building separators
    var sep1 = document.createElement('DIV');
    sep1.className = "separatorDiv";
    var sep2 = document.createElement('DIV');
    sep2.className = "separatorDiv";
    var sep3 = document.createElement('DIV');
    sep3.className = "separatorDiv";
    var sep4 = document.createElement('DIV');
    sep4.className = "separatorDiv";
    var sep5 = document.createElement('DIV');
    sep5.className = "separatorDiv";
    var sep6 = document.createElement('DIV');
    sep6.className = "separatorDiv";

    // ------------------- Start: Crop Rotation ----------- //
    // 'b1' corresponds to 'Crop Rotation'
    var b1 = document.createElement('DIV');
    b1.className = "square_box";
    // b1.style.backgroundColor = "#8da1bf";
    b1.innerHTML = "(R)";//E: De-Activated for square Icon. Activated for acronym
    b1.style.fontSize = "9px";//E: De-Activated for square Icon. Activated for acronym
    b1.style.fontWeight = 'bold';
    b1.style.color = "#008000";//E: De-Activated for square Icon. Activated for acronym

    var labelB1 = document.createElement('DIV');
    labelB1.className = "sq_label";
    labelB1.innerHTML = "Crop Rotation";

    var labelB1_b1 = document.createElement('DIV');
    labelB1_b1.className = "labelAndBox";

    labelB1_b1.appendChild(labelB1);
    labelB1_b1.appendChild(b1);
    // ------------------- End: Crop Rotation ----------- //

    // ------------------- Start: Cover Crop ----------- //
    // 'b2' corresponds to 'Cover Crop'
    var b2 = document.createElement('DIV');
    b2.className = "square_box";
    // b2.style.backgroundColor = "#99c9ba";
    b2.innerHTML = "(C)";//E: De-Activated for square Icon. Activated for acronym
    b2.style.fontSize = "9px";//E: De-Activated for square Icon. Activated for acronym
    b2.style.fontWeight = 'bold';
    b2.style.color = "#ff0000";//E: De-Activated for square Icon. Activated for acronym

    var labelB2 = document.createElement('DIV');
    labelB2.className = "sq_label";
    labelB2.innerHTML = "Cover Crop";

    var labelB2_b2 = document.createElement('DIV');
    labelB2_b2.className = "labelAndBox";

    labelB2_b2.appendChild(labelB2);
    labelB2_b2.appendChild(b2);
    // ------------------- End: Cover Crop ----------- //

    // ------------------- Start: Strip Cropping ----------- //
    // 'b3' corresponds to 'Strip Cropping'
    var b3 = document.createElement('DIV');
    b3.className = "square_box";
    // --------------- For 'Icon'
    // b3.style.backgroundColor = "#87b07e";
    // --------------- For 'text' acronym
    b3.innerHTML = "(S)";//E: De-Activated for square Icon. Activated for acronym
    b3.style.fontSize = "9px";//E: De-Activated for square Icon. Activated for acronym
    b3.style.fontWeight = 'bold';
    b3.style.color = "#990000";//E: De-Activated for square Icon. Activated for acronym
    // --------------- For 'HTML symbol'
    // b3.innerHTML = "&#9733";
    // b3.style.fontSize = "14px";//E: De-Activated for square Icon. Activated for acronym

    var labelB3 = document.createElement('DIV');
    labelB3.className = "sq_label";
    labelB3.innerHTML = "Strip Cropping";

    var labelB3_b3 = document.createElement('DIV');
    labelB3_b3.className = "labelAndBox";

    labelB3_b3.appendChild(labelB3);
    labelB3_b3.appendChild(b3);
    // ------------------- End: Strip Cropping ----------- //

    // ------------------- Start: Grass Waterways ----------- //
    // 'b4' corresponds to 'Grass waterways'
    var b4 = document.createElement('DIV');
    b4.className = "square_box";
    b4.style.height = "10px"; b4.style.width = "10px"; b4.style.borderRadius = "50%";
    // For Icon
    // b4.style.border = "1px solid #333333";//E: Activated for square Icon. Deactivated for Acronym
    // For 'text' acronym
    b4.innerHTML = "(G)";//E: De-Activated for square Icon. Activated for acronym
    b4.style.fontSize = "9px";//E: De-Activated for square Icon. Activated for acronym
    b4.style.fontWeight = 'bold';
    b4.style.color = "#000000";//E: De-Activated for square Icon. Activated for acronym

    var labelB4 = document.createElement('DIV');
    labelB4.className = "sq_label";
    labelB4.innerHTML = "Grass Waterways";

    var labelB4_b4 = document.createElement('DIV');
    labelB4_b4.className = "labelAndBox";

    labelB4_b4.appendChild(labelB4);
    labelB4_b4.appendChild(b4);
    // ------------------- End: Grass Waterways ----------- //

    // ------------------- Start: Conservation Tillage ----------- //
    // 'b5' corresponds to 'Conservation Tillage'
    var b5 = document.createElement('DIV');
    b5.className = "square_box";
    b5.style.height = "9px"; b5.style.width = "9px";
    // b5.style.border = "1px solid #333333";//E: Activated for square Icon. Deactivated for Acronym
    b5.innerHTML = "(T)";//E: De-Activated for square Icon. Activated for acronym
    b5.style.fontSize = "9px";//E: De-Activated for square Icon. Activated for acronym
    b5.style.fontWeight = 'bold';
    b5.style.color = "#0033cc";//E: De-Activated for square Icon. Activated for acronym

    var labelB5 = document.createElement('DIV');
    labelB5.className = "sq_label";
    labelB5.innerHTML = "Conservation Tillage";

    var labelB5_b5 = document.createElement('DIV');
    labelB5_b5.className = "labelAndBox";

    labelB5_b5.appendChild(labelB5);
    labelB5_b5.appendChild(b5);
    // ------------------- End: Conservation Tillage ----------- //

    var whole_sq = document.createElement('DIV');

    whole_sq.appendChild(labelB1_b1);
    whole_sq.appendChild(sep1);
    whole_sq.appendChild(labelB2_b2);
    whole_sq.appendChild(sep2);
    whole_sq.appendChild(labelB3_b3);
    whole_sq.appendChild(sep3);
    whole_sq.appendChild(labelB4_b4);
    whole_sq.appendChild(sep4);
    whole_sq.appendChild(labelB5_b5);
    whole_sq.appendChild(sep5);

    //     return whole_sq;
    // ===============  END building bmp (1), (2), (3), (4), and (5)  ================ //

    // ===============  Start building bmp (6) Filter-Strip  ================ //
    // // -----------------  Lines for Filters in the main-map legend ------------ //
    // function mmfilter_legend(){
    var filt_1 = document.createElement('DIV');
    filt_1.className = "rectangle_box";
    filt_1.style.backgroundColor = "#fcb0b0";//"#7cb468";//"#e927c2";

    var label_f1 = document.createElement('DIV');
    label_f1.className = "filter_label";
    label_f1.innerHTML = "< 3";

    var label1_fil1 = document.createElement('DIV');
    label1_fil1.className = "labelAndLine";

    label1_fil1.appendChild(filt_1);
    label1_fil1.appendChild(label_f1);
// ----------------------

    var filt_2 = document.createElement('DIV');
    filt_2.className = "rectangle_box";
    filt_2.style.backgroundColor = "#fc7575";//"#559547";//"#bf8811";

    var label_f2 = document.createElement('DIV');
    label_f2.className = "filter_label";
    label_f2.innerHTML = "3 to < 6";
    // label_f2.innerHTML = '<div class="filter_label">'+"3 to < 6"+'</div>';

    var label2_fil2 = document.createElement('DIV');
    label2_fil2.className = "labelAndLine";

    label2_fil2.appendChild(filt_2);
    label2_fil2.appendChild(label_f2);
// ----------------------

    var filt_3 = document.createElement('DIV');
    filt_3.className = "rectangle_box";
    filt_3.style.backgroundColor = "#fc5050";//"#107c10";//"#7da569";

    var label_f3 = document.createElement('DIV');
    label_f3.className = "filter_label";
    label_f3.innerHTML = "6 to <10";
    // label_f3.innerHTML = '<div class="filter_label">'+"6 to <10"+'</div>';

    var label3_fil3 = document.createElement('DIV');
    label3_fil3.className = "labelAndLine";

    label3_fil3.appendChild(filt_3);
    label3_fil3.appendChild(label_f3);
// ----------------------

    var filt_4 = document.createElement('DIV');
    filt_4.className = "rectangle_box";
    filt_4.style.backgroundColor = "#fc0909";//"#045605";//"#602288";

    var label_f4 = document.createElement('DIV');
    label_f4.className = "filter_label";
    label_f4.innerHTML = "10 to < 13";
    // label_f4.innerHTML = '<div class="filter_label">'+"10 to < 13"+'</div>';

    var label4_fil4 = document.createElement('DIV');
    label4_fil4.className = "labelAndLine";

    label4_fil4.appendChild(filt_4);
    label4_fil4.appendChild(label_f4);
// ----------------------

    var filt_5 = document.createElement('DIV');
    filt_5.className = "rectangle_box";
    filt_5.style.backgroundColor = "#d20000";//"#003301";//"#b10c0c";

    var label_f5 = document.createElement('DIV');
    label_f5.className = "filter_label";
    label_f5.innerHTML = ">= 13";
    // label_f5.innerHTML = '<div class="filter_label">'+">= 13"+'</div>';

    var label5_fil5 = document.createElement('DIV');
    label5_fil5.className = "labelAndLine";

    label5_fil5.appendChild(filt_5);
    label5_fil5.appendChild(label_f5);
// ----------------------

    var all_filter = document.createElement('DIV');
    all_filter.className = "all_filter";

    all_filter.appendChild(label1_fil1);
    all_filter.appendChild(label2_fil2);
    all_filter.appendChild(label3_fil3);
    all_filter.appendChild(label4_fil4);
    all_filter.appendChild(label5_fil5);

    var all_filter_title = document.createElement('DIV');
    all_filter_title.className = "all_filter_title";
    all_filter_title.innerHTML = "Filter Strip (feet)";

    var whole_filter = document.createElement('DIV');
    whole_filter.appendChild(all_filter_title);
    whole_filter.appendChild(all_filter);
    whole_filter.appendChild(sep6);
    // return whole_filter;
    // ===============  END building bmp (6) Filter-Strip  ================ //


    // ===============  START: building bmp (7) Wetlands  ================ //
    // -----------------  Circles for Wetlands in the main-map legend ------------ //
    // function mmcir_legend(){
    var circle_1 = document.createElement('DIV'); // Range 1
    circle_1.className = "circle";
    circle_1.style.height = "7px"; circle_1.style.width = "7px";
    // circle_1.style.backgroundColor = "#001141";//"#336699";//"#3366cc";"#3366ff";
    circle_1.style.backgroundColor = "#002280";
    // circle_1.style.backgroundColor = "#006600";

    var c1 = document.createElement('DIV');
    c1.className = "caja_c";
    c1.appendChild(circle_1);

    var label1 = document.createElement('DIV');
    label1.className = "circle_label";
    label1.innerHTML = "< 2";
    // label1.innerHTML = '<div class="circle_label">'+"< 2"+'</div>';

    var label1_circle = document.createElement('DIV');
    label1_circle.className = "labelAndCircle";

    label1_circle.appendChild(c1);
    label1_circle.appendChild(label1);
    // -------------------------------

    var circle_2 = document.createElement('DIV');
    circle_2.className = "circle";
    circle_2.style.height = "9px"; circle_2.style.width = "9px";
    // circle_2.style.backgroundColor = "#00258d";//"#e600e6";//"#cc33ff";"#cc66ff";
    circle_2.style.backgroundColor = "#002999";
    circle_2.style.border = "1px solid #001141";
    // circle_2.style.backgroundColor = "#006600";
    // circle_2.style.border = "1px solid #003300";

    var c2 = document.createElement('DIV');
    c2.className = "caja_c";
    c2.appendChild(circle_2);

    var label2 = document.createElement('DIV');
    label2.className = "circle_label";
    label2.innerHTML = "2 to < 6";
    // label2.innerHTML = '<div class="circle_label">'+"2 to < 6"+'</div>';

    var label2_circle = document.createElement('DIV');
    label2_circle.className = "labelAndCircle";

    label2_circle.appendChild(c2);
    label2_circle.appendChild(label2);
    // -----------------------------------------

    var circle_3 = document.createElement('DIV');
    circle_3.className = "circle";
    circle_3.style.height = "10px"; circle_3.style.width = "10px";
    circle_3.style.backgroundColor = "#003be0";//"#ff6666";//"#ff9999";
    circle_3.style.border = "1px solid #001141";
    // circle_3.style.backgroundColor = "#009900";//"#ff6666";//"#ff9999";
    // circle_3.style.border = "1px solid #003300";

    var c3 = document.createElement('DIV');
    c3.className = "caja_c";
    c3.appendChild(circle_3);

    var label3 = document.createElement('DIV');
    label3.className = "circle_label";
    label3.innerHTML = "6 to < 11";
    // label3.innerHTML = '<div class="circle_label">'+"6 to < 11"+'</div>';

    var label3_circle = document.createElement('DIV');
    label3_circle.className = "labelAndCircle";

    label3_circle.appendChild(c3);
    label3_circle.appendChild(label3);
    // -----------------------------------

    var circle_4 = document.createElement('DIV');
    circle_4.className = "circle";
    circle_4.style.height = "11px"; circle_4.style.width = "11px";
    circle_4.style.backgroundColor = "#1d68eb";//"#00b300";//"#00cc00";"#339933";"#00cc66";
    circle_4.style.border = "1px solid #00258d";
    // circle_4.style.backgroundColor = "#00cc00";
    // circle_4.style.border = "1px solid #009900";

    var c4 = document.createElement('DIV');
    c4.className = "caja_c";
    c4.appendChild(circle_4);

    var label4 = document.createElement('DIV');
    label4.className = "circle_label";
    label4.innerHTML = "11 to < 15";
    // label4.innerHTML = '<div class="circle_label">'+"11 to < 15"+'</div>';

    var label4_circle = document.createElement('DIV');
    label4_circle.className = "labelAndCircle";

    label4_circle.appendChild(c4);
    label4_circle.appendChild(label4);
    // --------------------------------------------------

    var circle_5 = document.createElement('DIV');
    circle_5.className = "circle";
    circle_5.style.height = "12px"; circle_5.style.width = "12px";
    circle_5.style.backgroundColor = "#3891eb";//"#e6b800";//"#ffcc00";
    circle_5.style.border = "1px solid #003be0";
    // circle_5.style.backgroundColor = "#00ff00";
    // circle_5.style.border = "1px solid #00cc00";

    var c5 = document.createElement('DIV');
    c5.className = "caja_c";
    c5.appendChild(circle_5);

    var label5 = document.createElement('DIV');
    label5.className = "circle_label";
    label5.innerHTML = "15 to < 29";
    // label5.innerHTML = '<div class="circle_label">'+"15 to < 29"+'</div>';

    var label5_circle = document.createElement('DIV');
    label5_circle.className = "labelAndCircle";

    label5_circle.appendChild(c5);
    label5_circle.appendChild(label5);
    // --------------------------------------------------

    var circle_6 = document.createElement('DIV');
    circle_6.className = "circle";
    circle_6.style.height = "14px"; circle_6.style.width = "14px";
    circle_6.style.backgroundColor = "#51b6eb";//"#1ad1ff";//"#4ddbff";
    circle_6.style.border = "1px solid #1d68eb";
    // circle_6.style.backgroundColor = "#33ff33";
    // circle_6.style.border = "1px solid #00cc00";

    var c6 = document.createElement('DIV');
    c6.className = "caja_c";
    c6.appendChild(circle_6);

    var label6 = document.createElement('DIV');
    label6.className = "circle_label";
    label6.innerHTML = "29 to < 40";
    // label6.innerHTML = '<div class="circle_label">'+"29 to < 40"+'</div>';

    var label6_circle = document.createElement('DIV');
    label6_circle.className = "labelAndCircle";

    label6_circle.appendChild(c6);
    label6_circle.appendChild(label6);
    // ----------------------------------------------------

    var circle_7 = document.createElement('DIV');
    circle_7.className = "circle";
    circle_7.style.height = "15px"; circle_7.style.width = "15px";
    circle_7.style.backgroundColor = "#6bdceb";//"#ff3300";//"#ff1a1a";
    circle_7.style.border = "1px solid #3891eb";
    // circle_7.style.backgroundColor = "#66ff66";
    // circle_7.style.border = "1px solid #00ff00";

    var c7 = document.createElement('DIV');
    c7.className = "caja_c";
    c7.appendChild(circle_7);

    var label7 = document.createElement('DIV');
    label7.className = "circle_label";
    label7.innerHTML = ">= 40";
    // label7.innerHTML = '<div class="circle_label">'+">= 40"+'</div>';

    var label7_circle = document.createElement('DIV');
    label7_circle.className = "labelAndCircle";

    label7_circle.appendChild(c7);
    label7_circle.appendChild(label7);
    // ------------------------------

    var all_wets = document.createElement('DIV');
    all_wets.className = "all_wets";

    all_wets.appendChild(label1_circle);
    all_wets.appendChild(label2_circle);
    all_wets.appendChild(label3_circle);
    all_wets.appendChild(label4_circle);
    all_wets.appendChild(label5_circle);
    all_wets.appendChild(label6_circle);
    all_wets.appendChild(label7_circle);

    var all_wets_title = document.createElement('DIV');
    all_wets_title.className = "all_wets_title";
    all_wets_title.innerHTML = "Wetland Area (acres)";

    var whole_wets = document.createElement('DIV');
    whole_wets.appendChild(all_wets_title);
    whole_wets.appendChild(all_wets);

    // return whole_leg;

    // =============  End: building bmp (7) Wetlands  ================ //

    // ==============  START building the legend DOM  ================ //

    var whole_mmLeg = document.createElement('DIV');
    whole_mmLeg.append(whole_sq);
    whole_mmLeg.append(whole_filter);
    whole_mmLeg.append(whole_wets);

    return whole_mmLeg;
    // ==============  END building the legend DOM  ================ //

}
