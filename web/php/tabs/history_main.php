<?php
/**
 * Created by PhpStorm.
 * User: jack_ultra
 * Date: 3/3/14
 * Time: 11:28 PM
 */
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/jquery.jqChart.css" />
    <link rel="stylesheet" type="text/css" href="../css/jquery.jqRangeSlider.css" />
    <link rel="stylesheet" type="text/css" href="../css/jquery-ui-1.8.20.css" />
    <script src="../javascript/jquery-1.5.2.min.js" type="text/javascript"></script>
    <script src="../javascript/jquery.mousewheel.js" type="text/javascript"></script>
    <script src="../javascript/jquery.jqChart.min.js" type="text/javascript"></script>
    <script src="../javascript/jquery.jqRangeSlider.min.js" type="text/javascript"></script>
    <!--[if IE]><script lang="javascript" type="text/javascript" src="../js/excanvas.js"></script><![endif]-->
    
    <script lang="javascript" type="text/javascript">
        function addDays(date, value) {
            var newDate = new Date(date.getTime());
            newDate.setDate(date.getDate() + value);
            return newDate;
        }

        function round(d) {
            return Math.round(100 * d) / 100;
        }

        var data1 = [];
        var data2 = [];

        var yValue1 = 50;
        var yValue2 = 200;

        var date = new Date(2010, 0, 1);

        for (var i = 0; i < 200; i++) {

            yValue1 += Math.random() * 10 - 5;
            data1.push([date, round(yValue1)]);

            yValue2 += Math.random() * 10 - 5;
            data2.push([date, round(yValue2)]);

            date = addDays(date, 1);
        }

        $(document).ready(function () {

            var background = {
                type: 'linearGradient',
                x0: 0,
                y0: 0,
                x1: 0,
                y1: 1,
                colorStops: [{ offset: 0, color: '#d2e6c9' },
                             { offset: 1, color: 'white' }]
            };

            $('#histgraph_container').jqChart({
                title: 'Chart Title',
                legend: { title: 'Legend' },
                border: { strokeStyle: '#6ba851' },
                background: background,
                animation: { duration: 2 },
                tooltips: { type: 'shared' },
                shadows: {
                    enabled: true
                },
                crosshairs: {
                    enabled: true,
                    hLine: false,
                    vLine: { strokeStyle: '#cc0a0c' }
                },
                axes: [
                    {
                        type: 'dateTime',
                        location: 'bottom',
                        zoomEnabled: true
                    }
                ],
                series: [
                    {
                        title: 'Series 1',
                        type: 'line',
                        data: data1,
                        markers: null
                    },
                    {
                        title: 'Series 2',
                        type: 'line',
                        data: data2,
                        markers: null
                    }
                ]
            });

            $('#histgraph_container').bind('tooltipFormat', function (e, data) {

                if ($.isArray(data) == false) {

                    var date = data.chart.stringFormat(data.x, "ddd, mmm dS, yyyy");

                    var tooltip = '<b>' + date + '</b><br />' +
                          '<span style="color:' + data.series.fillStyle + '">' + data.series.title + ': </span>' +
                          '<b>' + data.y + '</b><br />';

                    return tooltip;
                }

                var date = data[0].chart.stringFormat(data[0].x, "ddd, mmm dS, yyyy");

                var tooltip = '<b>' + date + '</b><br />' +
                      '<span style="color:' + data[0].series.fillStyle + '">' + data[0].series.title + ': </span>' +
                      '<b>' + data[0].y + '</b><br />' +
                      '<span style="color:' + data[1].series.fillStyle + '">' + data[1].series.title + ': </span>' +
                      '<b>' + data[1].y + '</b><br />';

                return tooltip;
            });
        });
    </script>

<script type="text/javascript" src="../javascript/range_selector.js"></script>
</head>

<body>

<div id="history_container">
    <div id="histgraph_container" style="width: 500px; height: 300px;">
    </div>
    <div id="range_buttons">
        <div style="width: 199px !important" class="range_button selected">
            12<span class="range_month">months</span></div><span class="range_button">
            24<span class="range_month">months</span></span><span class="range_button">
            36<span class="range_month">months</span></span>
    </div>
</div>
</body>
</html>