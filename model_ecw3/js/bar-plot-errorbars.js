// JavaScript Document
function subBasinGraph1() {
    var numberOf_alternatives = array_fullvalues.length; //EE: Give 20, because of 20 alternatives ('array_fullvalues' was obtained at L.987 g2.php)
    var option = document.getElementById('subDrop').value;
    // alert("L.5 Option of subbasin: "+ option);
    var rowlen;
    var border = [];
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Individual');//data.addColumn('number', 'Individual');
    // data.addColumn('number', 'Peak- Flow');
    data.addColumn('number', 'PFR.');//E: For first experiment
    data.addColumn({id: 'min',type: 'number',role: 'interval'});
    data.addColumn({id: 'max',type: 'number',role: 'interval'});
    data.addColumn({type: 'string',role: 'style'});
    data.addColumn({'type': 'string','role': 'tooltip','p': {'html': true}});
    //data.addColumn({type: 'number', role: 'annotation'});

    var data1 = new google.visualization.DataTable();
    data1.addColumn('string', 'Individual');//data1.addColumn('number', 'Individual');
    data1.addColumn('number', 'Revenue in $');
    data1.addColumn({id: 'min',type: 'number',role: 'interval'});
    data1.addColumn({id: 'max',type: 'number',role: 'interval'});
    data1.addColumn({type: 'string',role: 'style'});
    data1.addColumn({'type': 'string','role': 'tooltip','p': {'html': true}});
    //data1.addColumn({type: 'number', role: 'annotation'});

    var data2 = new google.visualization.DataTable();
    data2.addColumn('string', 'Individual');//data2.addColumn('number', 'Individual');
    data2.addColumn('number', 'sediment red in tons');
    data2.addColumn({id: 'min',type: 'number',role: 'interval'});
    data2.addColumn({id: 'max',type: 'number',role: 'interval'});
    data2.addColumn({type: 'string',role: 'style'});
    data2.addColumn({'type': 'string','role': 'tooltip','p': {'html': true}});
    //data2.addColumn({type: 'number', role: 'annotation'});

    var data3 = new google.visualization.DataTable();
    data3.addColumn('string', 'Individual');//data3.addColumn('number', 'Individual');
    data3.addColumn('number', 'nitrate red in kilograms');
    data3.addColumn({id: 'min',type: 'number',role: 'interval'});
    data3.addColumn({id: 'max',type: 'number',role: 'interval'});
    data3.addColumn({type: 'string',role: 'style'});
    data3.addColumn({'type': 'string','role': 'tooltip','p': {'html': true}});
    //data3.addColumn({type: 'number', role: 'annotation'});
    

   var colors = new Array(24).fill('#cccccc');
   var border = new Array(24).fill('#8c8c8c');
   var n1 = parseInt($(".oneMap").html());

   colors[n1 - 1] = '#ffe60d';
   border[n1 - 1] = '#ffb226';
  

   if (option == "Watershed") {
    for (let i = 0; i < numberOf_alternatives; i++) {
        let v_label = 'SP' + (i + 1).toString();
        let rowlen = i;

        const parseJSON = (key) => {
            let values = JSON.parse(fn_obj_array[rowlen][key]);
            return values.map(value => Number(Math.abs(parseFloat(value))));
        };

        let [m11, min11, max11] = parseJSON('F1');
        let [m12, min12, max12] = parseJSON('F2');
        let [m13, min13, max13] = parseJSON('F3');
        let [m14, min14, max14] = parseJSON('F4');

        let style = `bar {fill-color:${colors[rowlen]};fill-opacity:1; stroke-color:${border[rowlen]};stroke-width:2},line {stroke-color:'#000066'; stroke-width:1}`;

        data.addRow([v_label, m11, min11, max11, style, createCustomHTMLContent1(i + 1, 'PFR', m11.toFixed(2), min11.toFixed(2), max11.toFixed(2))]);
        data1.addRow([v_label, m12, min12, max12, style, createCustomHTMLContent1(i + 1, 'ER$', m12.toExponential(2), min12.toExponential(2), max12.toExponential(2))]);
        data2.addRow([v_label, m13, min13, max13, style, createCustomHTMLContent1(i + 1, 'SRed', m13.toExponential(2), min13.toExponential(2), max13.toExponential(2))]);
        data3.addRow([v_label, m14, min14, max14, style, createCustomHTMLContent1(i + 1, 'NRed', m14.toExponential(2), min14.toExponential(2), max14.toExponential(2))]);
    }

        var options_old = {
            height: 500, 
            width: 300,
            chartArea: {top:0, left:35},
            legend: {position: 'none'},
            focusTarget: 'category',
            tooltip: {isHtml: true, trigger: 'selection'},
            vAxis: {
                titleTextStyle: {fontName: 'Arial', color: 'black', fontSize: 13, bold: false, italic: true},
                textStyle: {color:"#404040", fontName:'Arial',fontSize:10}, 
                gridlines: {count: numberOf_alternatives}, 
                direction: -1
        },
            hAxis: {
                titleTextStyle: {fontName: 'Arial', color: 'black', fontSize: 11, bold: false, italic: true}, 
                textPosition: 'out', 
                format: 'decimal', 
                textStyle: {color: '#000000',fontSize: 10}
        },
    };
       
        var options = {
            chart: {title: 'Nearby galaxies'},
            height: 570, 
            width: 380,
            chartArea: {top:0, left:45},
            backgroundColor: {
                fill: '#fff2e6',
                fillOpacity: 0.3
            },
            legend: {position: 'none'},
            focusTarget: 'category',
            tooltip: {trigger: 'selection'},
            bars: 'horizontal',
            hAxis:{
                format:'#,###.0',
                title: 'X-tittle',
                titleTextStyle: { color: '#cc0099', fontName: 'global-font-name', fontSize: '18', bold: 'true', italic: 'true'},
                viewWindowMode: 'maximized',
                textStyle: {fontSize: '11'},
                gridlines: {count: -1},
                minorGridlines: {count: 4}
            },
            axisTitlesPosition: 'none',
            vAxis:{
                textPosition: 'out',
                textStyle: {fontSize: '11'}
            },
        };

        var options1_old = {
            height: 500, 
            width: 300,
            chartArea: {top:0, left:35},
            legend: {position: 'none'},
            focusTarget: 'category',
            tooltip: {isHtml: true, trigger: 'selection'},
            vAxis: {
                titleTextStyle:{fontName: 'Arial', color: 'black', fontSize: 13, bold: false, italic: true},
                textStyle:{color:"#404040", fontName:'Arial',fontSize:10}, 
                gridlines: {count: numberOf_alternatives},
                direction: -1
            },
            hAxis: {
                titleTextStyle:{fontName: 'Arial', color: 'black', fontSize: 11, bold: false, italic: true},
                textPosition: 'out',
                format: 'short',
                textStyle: {color: '#000000',fontSize: 10}
            },
        };
        
        var options1 = {
            chart: {title: 'Nearby galaxies'},
            height: 500, 
            width: 380,
            chartArea: {top:0, left:45},
            backgroundColor: {
                fill: '#fff2e6',
                fillOpacity: 0.3
            },
            legend: {position: 'none'},
            focusTarget: 'category',
            tooltip: {trigger: 'selection'},
            bars: 'horizontal',
            hAxis:{
                format:'short',
                title: 'X-tittle',
                titleTextStyle: { color: '#cc0099', fontName: 'global-font-name', fontSize: '18', bold: 'true', italic: 'true'},
                viewWindowMode: 'maximized',
                textStyle: {fontSize: '11'},
                gridlines: {count: -1},
                minorGridlines: {count: 4}
            },
            axisTitlesPosition: 'none',
            vAxis:{
                textPosition: 'out',
                textStyle: {fontSize: '11'}
            },
        };
        
        var options2 = {
            height: 500, 
            width: 300,
            chartArea: {top:0, left:35},
            legend: {position: 'none'},
            focusTarget: 'category',
            tooltip: {isHtml: true, trigger: 'selection'},
            vAxis: {
                titleTextStyle:{fontName: 'Arial', color: 'black', fontSize: 13, bold: false, italic: true},
                textStyle:{color:"#404040", fontName:'Arial',fontSize:10}, 
                gridlines: {count: numberOf_alternatives},
                direction: -1
            },
            hAxis: {
                titleTextStyle:{fontName: 'Arial', color: 'black', fontSize: 11, bold: false, italic: true},
                textPosition: 'out',
                format: 'short',
                textStyle: {color: '#000000',fontSize: 10}
            },
        };

        // ---- For Nitrate Reduction

        var options3 = {
            height: 500, 
            width: 300,
            chartArea: {top:0, left:35},
            legend: {position: 'none'},
            focusTarget: 'category',
            tooltip: {isHtml: true, trigger: 'selection'},
            vAxis: {
                titleTextStyle:{fontName: 'Arial', color: 'black', fontSize: 13, bold: false, italic: true},
                textStyle:{color:"#404040", fontName:'Arial',fontSize:10}, 
                gridlines: {count: numberOf_alternatives},
                direction: -1
            },
            hAxis: {
                titleTextStyle:{fontName: 'Arial', color: 'black', fontSize: 11, bold: false, italic: true},
                textPosition: 'out',
                format: 'short',
                textStyle: {color: '#000000',fontSize: 10}
            },
        };
        
        var charts = ['chart_div1', 'chart_div2', 'chart_div3', 'chart_div4'].map(id => 
            new google.visualization.BarChart(document.getElementById(id))
        );
        
        charts.forEach((chart, i) => {
            chart.draw(window[`data${i}`], window[`options${i}`]);
        });

 //----------------------------------- chart watershed -------------------------------------------//
        //the barclick event capturing is done here.
        google.visualization.events.addListener(chart, 'select', function() {
            var selected_item = chart.getSelection()[0];
            if (selected_item) {
                var topping = data.getValue(selected_item.row, 0);
                report('m-clk+  ', 'Alternative '+ topping , ';');
            } else {
                report('m-clk+  ', 'Un-selection of alternative ' + ';');
            }
        });

 // --------------------------------------  chart 1 - watershed ----------------------------------//
 //         google.visualization.events.addListener(chart1, 'select', function goToTimeBar() {
        google.visualization.events.addListener(chart1, 'select', function() {
            var selected_item = chart1.getSelection()[0];
            if (selected_item) {
                var topping = data.getValue(selected_item.row, 0);
                report('m-clk+  ', 'Alternative '+ topping , ';');
            } else {
                report('m-clk+  ', 'Un-selection of alternative ' + ';');
            }
        });
 // ---------------------------------------- chart 2 - watershed ---------------------------//
        google.visualization.events.addListener(chart2, 'select', function() {
            var selected_item = chart2.getSelection()[0];
            if (selected_item) {
                var topping = data.getValue(selected_item.row, 0);
                report('m-clk+  ', 'Alternative '+ topping , ';');
            } else {
                report('m-clk+  ', 'Un-selection of alternative ' + ';');
            }
        });
 // ---------------------------------------- chart 3 - watershed ---------------------------//
        google.visualization.events.addListener(chart3, 'select', function() {
            var selected_item = chart3.getSelection()[0];
            if (selected_item) {
                var topping = data.getValue(selected_item.row, 0);
                report('m-clk+  ', 'Alternative '+ topping , ';');
            } else {
                report('m-clk+  ', 'Un-selection of alternative ' + ';');
            }
        });
 // ------------------------------------------ END chart 3 ------------------------------- //
