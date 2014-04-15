<?php
/**
 * Created by PhpStorm.
 * User: jack_ultra
 * Date: 3/3/14
 * Time: 11:27 PM
 */

?>

<div id="rating_tab">
    <div class="slider_cont"><div class="rating_slider" id="slider"></div></div>
    <div id="rating_container">
        <div class="rating_info"><span class="rating_number">1</span><span class="rating_text">good</span></div>
        <div id="metric_container">
            <div id="piechart" style="opacity: 0">
            <script lang="javascript" type="text/javascript">
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

            $('#piechart').jqChart({
                title: { text: 'Usage Breakdown' },
                legend: { title: 'Usage Key' },
                border: { strokeStyle: '#6ba851' },
                background: background,
                animation: { duration: 1 },
                shadows: {
                    enabled: true
                },
                series: [
                    {
                        type: 'pie',
                        fillStyles: ['#418CF0', '#FCB441', '#E0400A', '#056492', '#BFBFBF', '#1A3B69', '#FFE382'],
                        labels: {
                            stringFormat: '%.1f%%',
                            valueType: 'percentage',
                            font: '15px sans-serif',
                            fillStyle: 'white'
                        },
                        explodedRadius: 10,
                        explodedSlices: [5],
                        data: [['Light bulbs', 65], ['Refrigerator', 58], ['Stove', 30],
                               ['Television', 60], ['Dishwasher', 65], ['Other', 75]]
                    }
                ]
            });

            $('#piechart').bind('tooltipFormat', function (e, data) {
                var percentage = data.series.getPercentage(data.value);
                percentage = data.chart.stringFormat(percentage, '%.2f%%');

                return '<b>' + data.dataItem[0] + '</b><br />' +
                       data.value + ' (' + percentage + ')';
            });
        });
    </script></div>
            <div id="rating_metrics"><span class="metric_title">equivalent to</span>
                <div class="metric" id="mpg_metric"><img style="padding-left: 4px;" src="../../img/gas_mid.png" height="26" width="26" class="icon_img"/><img style="padding-left: 2px;" src="../../img/x_mid.png" height="26" width="38" class="x_img" />
                    <div class="metric_number"><span id="mpg_number">21</span><span class="metric_text">&nbsp;&nbsp;mpg&nbsp;&nbsp;</span></div></div>
                <div class="metric" id="cars_metric"><img src="../../img/car_mid.png" height="32" width="32" class="icon_img"/><img src="../../img/x_mid.png" height="26" width="38" class="x_img"/>
                    <div class="metric_number"><span id="cars_number">5</span><span class="metric_text">&nbsp;&nbsp;removed</span></div></div>
                <div class="metric" id="trees_metric"><img style="padding-left: 1px; margin-right: 9px;" src="../../img/tree_mid.png" height="32" width="32" class="icon_img" /><img src="../../img/x_mid.png" heheight="26" width="38" class="x_img"/>
                    <div class="metric_number"><span id="trees_number">20</span><span class="metric_text">&nbsp;&nbsp;planted</span></div></div>
            <span id="metric_selector"></span><span id="equiv_button" class="metric_button">metrics</span><span id="piechart_button" class="metric_button">breakdown</span>
            </div>
            <div class="rating_breakdown">
                <span class="rating_breakdown_desc" >
                    average monthly use: <br>
                    average cost per month:  <br>
                    total billed last 12 months: <br>
                </span>
                <span id="usage_now" style="padding-left:70px" class="rating_breakdown_numbers" >
                    <span style="font-style: italic">now</span><br>
                    548.3 kWh<br>
                    $50.45<br>
                    $605.40<br>
                </span>
                <span id="usage_minus_five" style="padding-left:231px" class="rating_breakdown_numbers" >
                    <span style="font-style: italic">5% less</span><br>
                    520.9 kWh<br>
                    $47.90<br>
                    $575.13<br>
                </span>
            </div>
        </div>
    </div>
    <div id="tips_container">
        <div id="tips_title">Select all that apply</div>
        <div id="tips_list">
            <ul class="tips">
                <li class="tip-unselected">
                    <span class="check_container"><img src="../../img/checkmark.png" /></span><span class="tip_text">Electric Range</span></li><li class="tip-unselected">
                    <span class="check_container"><img src="../../img/checkmark.png" /></span><span class="tip_text">Electric Water Heater</span></li><li class="tip-unselected">
                    <span class="check_container"><img src="../../img/checkmark.png" /></span><span class="tip_text">LED Lights</span></li><li class="tip-unselected">
                    <span class="check_container"><img src="../../img/checkmark.png" /></span><span class="tip_text">Electric Range</span></li><li class="tip-unselected">
                    <span class="check_container"><img src="../../img/checkmark.png" /></span><span class="tip_text">Electric Water Heater</span></li><li class="tip-unselected">
                    <span class="check_container"><img src="../../img/checkmark.png" /></span><span class="tip_text">LED Lights</span></li><li class="tip-unselected">
                    <span class="check_container"><img src="../../img/checkmark.png" /></span><span class="tip_text">Electric Water Heater</span></li><li class="tip-unselected">
                    <span class="check_container"><img src="../../img/checkmark.png" /></span><span class="tip_text">LED Lights</span></li><li class="tip-unselected">
                    <span class="check_container"><img src="../../img/checkmark.png" /></span><span class="tip_text">Electric Range</span></li><li class="tip-unselected">
                    <span class="check_container"><img src="../../img/checkmark.png" /></span><span class="tip_text">Electric Range</span></li>
            </ul>
            <div id="tips_submit">RECALCULATE</div>
        </div>
    </div>
</div>
<script type="text/javascript" src="../../javascript/tips_selector.js"></script>
<script src="../../javascript/slider/jquery.nouislider.js"></script>
<script src="../../javascript/animate/jquery.transit.min.js"></script>
<script src="../../javascript/rating_functions.js"></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.jqChart.css" />
    <link rel="stylesheet" type="text/css" href="../css/jquery.jqRangeSlider.css" />
    <link rel="stylesheet" type="text/css" href="../themes/le-frog/jquery-ui-1.8.20.css" />
    <script src="../js/jquery-1.11.0.min.js" type="text/javascript"></script>
    <script src="../js/jquery.mousewheel.js" type="text/javascript"></script>
    <script src="../js/jquery.jqChart.min.js" type="text/javascript"></script>
    <script src="../js/jquery.jqRangeSlider.min.js" type="text/javascript"></script>
    <!--[if IE]><script lang="javascript" type="text/javascript" src="../js/excanvas.js"></script><![endif]-->