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
<link rel="stylesheet" type="text/css" href="../../css/jquery.jqChart.css" />
    <link rel="stylesheet" type="text/css" href="../../css/jquery.jqRangeSlider.css" />
    <link rel="stylesheet" type="text/css" href="../../css/jquery-ui-1.10.4.css" />
    <script src="../../javascript/jquery-1.11.0.min.js" type="text/javascript"></script>
    <script src="../../javascript/jquery.mousewheel.js" type="text/javascript"></script>
    <script src="../../javascript/jquery.jqChart.min.js" type="text/javascript"></script>
    <script src="../../javascript/jquery.jqRangeSlider.min.js" type="text/javascript"></script>
    <!--[if IE]><script lang="javascript" type="text/javascript" src="../../javascript/excanvas.js"></script><![endif]-->
    
    <script lang="javascript" type="text/javascript">
        $(document).ready(function () {
            $('#histgraph_container').jqChart({
                title: { text: 'Monthly Electricity Usage (kWh)' },
                legend: { location: 'top' },
                animation: { duration: 1 },
                shadows: {
                    enabled: true
                },
                border: {
                    cornerRadius: 1,
                    strokeStyle: '#212121',
                    padding: 30
                },
                series: [
                    {
                        type: 'column',
                        title: 'City Average',
                        fillStyle: '#418CF0',
                        data: [['Jan. 2013', 32], ['Feb. 2013', 35], ['Mar. 2013', 38],
                               ['Apr. 2013', 30], ['May 2013', 39], ['Jun. 2013', 52], ['Jul. 2013', 79],
                               ['Aug. 2013', 75], ['Sep. 2013', 48], ['Oct. 2013', 28], ['Nov. 2013', 24],
                               ['Dec. 2013', 22]]
                    },
                    {
                        type: 'column',
                        title: 'Your Usage',
                        fillStyle: '#FCB441',
                        data: [['Jan. 2013', 29], ['Feb. 2013', 37], ['Mar. 2013', 40],
                               ['Apr. 2013', 22], ['May 2013', 41], ['Jun. 2013', 55], ['Jul. 2013', 75],
                               ['Aug. 2013', 76], ['Sep. 2013', 42], ['Oct. 2013', 30], ['Nov. 2013', 29],
                               ['Dec. 2013', 31]]
                    }
                ]
            });
        });
    </script>

<script type="text/javascript" src="../../javascript/range_selector.js"></script>
</head>

<body>

<div id="history_container">
    <div id="histgraph_container">
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