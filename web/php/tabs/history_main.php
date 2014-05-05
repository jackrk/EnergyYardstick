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
                        type: 'line',
                        title: 'City Average',
                        fillStyle: '',
                        data: [['Jan 13', 32], ['Feb 13', 35], ['Mar 13', 38],
                               ['Apr 13', 30], ['May 13', 39], ['Jun 13', 52], ['Jul 13', 79],
                               ['Aug 13', 75], ['Sep 13', 48], ['Oct 13', 28], ['Nov 13', 24],
                               ['Dec 13', 22]]
                    },
                    {
                        type: 'line',
                        title: 'Your Usage',
                        fillStyle: '',
                        data: [['Jan 13', 29], ['Feb 13', 37], ['Mar 13', 40],
                               ['Apr 13', 22], ['May 13', 41], ['Jun 13', 55], ['Jul 13', 75],
                               ['Aug 13', 76], ['Sep 13', 42], ['Oct 13', 30], ['Nov 13', 29],
                               ['Dec 13', 31]]
                    },
                    {
                        type: 'line',
                        title: '5% Line',
                        fillStyle: '',
                        data: [['Jan 13', 24], ['Feb 13', 31], ['Mar 13', 41],
                               ['Apr 13', 25], ['May 13', 36], ['Jun 13', 52], ['Jul 13', 70],
                               ['Aug 13', 72], ['Sep 13', 44], ['Oct 13', 27], ['Nov 13', 25],
                               ['Dec 13', 26]]
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