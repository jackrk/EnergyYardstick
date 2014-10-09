<?php
/**
 * Created by PhpStorm.
 * User: jack_ultra
 * Date: 3/3/14
 * Time: 11:01 PM
 */


//$ajax = ajax();
/*
$ajax->call("../ajax.php?tab/rating");

$ajax->click("tab_rating",$ajax->call("../ajax.php?tab/rating"));
$ajax->click("tab_compare",$ajax->call("../ajax.php?tab/compare"));
$ajax->click("tab_history",$ajax->call("../ajax.php?tab/history")); */

?>
<!DOCTYPE html>
<html>
<head>

    <!--
      Bilal:

      There are getting to be too many references to have different blocks
      for your workspace and the rest of ours. Every img tag would have to be changed
      as well as script tags in other files besides this one.

      I'd recommend that you figure out how to set your root directory in php to the folder
      that contains the php, css, javascript, img etc directories.

      -->

    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:200' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="../css/tab_menu.css"/>
    <link rel="stylesheet" type="text/css" href="../css/home.css"/>
    <link rel="stylesheet" type="text/css" href="../css/rating_tab.css"/>
    <link rel="stylesheet" type="text/css" href="../css/slider/jquery.nouislider.css"/>
    <link rel="stylesheet" type="text/css" href="../css/jquery.jqChart.css" />
    <link rel="stylesheet" type="text/css" href="../css/jquery.jqRangeSlider.css" />
    <link rel="stylesheet" type="text/css" href="../css/jquery-ui-1.10.4.css" />
    <!--[if IE 7]>
    <link href="../css/ie7/rating_tab.css" rel="stylesheet" type="text/css"/>
    <![endif]-->
</head>
<body style="width: 599px; height: 560px; margin: 0 auto;">
<div id="tab_menu">
    <a id="tab_rating" href="#" class="tab_link tab_active">RATING</a>
    <a id="tab_compare" href="compare_main.php" class="tab_link">COMPARE</a>
    <a id="tab_history" href="history_main.php" class="tab_link tab_link_last">HISTORY</a>
</div>

<div id="tab_container">
    <div id="rating_tab">
        <div class="slider_cont"><div class="rating_slider" id="slider"></div></div>
        <div id="rating_container">
            <div id="loadcover" class="show_load"><img class="load_gif" src="../css/images/loading_spin.gif"/></div>
            <div class="info_container">
            <div class="rating_info_container"><div class="rating_info"><span class="rating_number">1</span><span class="rating_text">good</span></div></div>
            <div id="metric_container">
                <div id="rating_metrics"><span class="metric_title">equivalent to</span>
                    <div class="metric" id="mpg_metric"><img style="padding-left: 4px;" src="../img/gas_mid.png" height="26" width="26" class="icon_img"/><img style="padding-left: 2px;" src="../img/x_mid.png" height="26" width="38" class="x_img" />
                        <div class="metric_number"><span id="mpg_number">0</span><span class="metric_text">&nbsp;&nbsp;mpg&nbsp;&nbsp;</span></div></div>
                    <div class="metric" id="cars_metric"><img src="../img/car_mid.png" height="32" width="32" class="icon_img"/><img src="../img/x_mid.png" height="26" width="38" class="x_img"/>
                        <div class="metric_number"><span id="cars_number">0</span><span class="metric_text">&nbsp;&nbsp;removed</span></div></div>
                    <div class="metric" id="trees_metric"><img style="padding-left: 1px; margin-right: 9px;" src="../img/tree_mid.png" height="32" width="32" class="icon_img" /><img src="../img/x_mid.png" heheight="26" width="38" class="x_img"/>
                        <div class="metric_number"><span id="trees_number">0</span><span class="metric_text">&nbsp;&nbsp;planted</span></div></div>
                </div>
            </div>
            </div>
            <div class="rating_breakdown">
                <span class="rating_breakdown_desc" >
                    average monthly use: <br>
                    average cost per month:  <br>
                    total billed last 12 months: <br>
                </span>
                <span id="usage_now" class="rating_breakdown_numbers" >
                    <span style="font-style: italic">now</span><br>
                    <span id="cur_kwh">548.3</span> kWh<br>
                    $<span id="cur_month_bill">50.45</span><br>
                    $<span id="cur_year_bill">605.40</span><br>
                </span>
                <span id="usage_goal" class="rating_breakdown_numbers" >
                    <span style="font-style: italic">10% less</span><br>
                    <span id="goal_kwh"></span> kWh<br>
                    $<span id="goal_month_bill"></span><br>
                    $<span id="goal_year_bill"></span><br>
                </span>
                <span id="usage_new" class="rating_breakdown_numbers" >
                    <span style="font-style: italic">new</span><br>
                    <span id="new_kwh"></span> kWh<br>
                    $<span id="new_month_bill"></span><br>
                    $<span id="new_year_bill"></span><br>
                </span>
                </div>
        </div>
        <div id="tips_container">
            <div id="tips_title">Select improvements to see the impact on your efficiency</div>
            <div id="tips_list">
                <ul class="tips">
                    <li class="tip tip-unselected">
                        <span class="check_container"><img src="../img/checkmark.png" /></span><span class="tip_text">New Refrigerator</span></li><li class="tip tip-unselected">
                        <span class="check_container"><img src="../img/checkmark.png" /></span><span class="tip_text">Turn down A/C by 3&#176;</span></li><li class="tip tip-unselected">
                        <span class="check_container"><img src="../img/checkmark.png" /></span><span class="tip_text">LED Lights</span></li><li class="tip tip-unselected">
                        <span class="check_container"><img src="../img/checkmark.png" /></span><span class="tip_text">New Refrigerator</span></li><li class="tip tip-unselected">
                        <span class="check_container"><img src="../img/checkmark.png" /></span><span class="tip_text">Turn down A/C by 3&#176;</span></li><li class="tip tip-unselected">
                        <span class="check_container"><img src="../img/checkmark.png" /></span><span class="tip_text">LED Lights</span></li><li class="tip tip-unselected">
                        <span class="check_container"><img src="../img/checkmark.png" /></span><span class="tip_text">Turn down A/C by 3&#176;</span></li><li class="tip tip-unselected">
                        <span class="check_container"><img src="../img/checkmark.png" /></span><span class="tip_text">LED Lights</span></li>
                </ul>
                <div id="tips_submit">Save selected improvements</div>
            </div>
        </div>
    </div>

</div>
<div id="hidden_rating_number" style="display: none">3</div>

</body>
</html>


<script src="../javascript/jquery-1.11.0.min.js"></script>
<script src="../javascript/jquery-ui-1.10.4.min.js"></script>
<script type="text/javascript" src="../javascript/tips_selector.js"></script>
<script src="../javascript/slider/jquery.nouislider.min.js"></script>
<script src="../javascript/number/jquery.animateNumber.min.js"></script>
<script src="../javascript/number/jquery-numerator.js"></script>
<script src="../javascript/number/jquery.easing.1.3.js"></script>
<script src="../javascript/animate/jquery.transit.min.js"></script>
<script src="../javascript/tab_menu.js"></script>
<script src="../javascript/rating_functions.js"></script>
<script src="../javascript/jquery.mousewheel.js" type="text/javascript"></script>
<script src="../javascript/jquery.jqChart.min.js" type="text/javascript"></script>
<script src="../javascript/jquery.jqRangeSlider.min.js" type="text/javascript"></script>
<!--[if IE]>
<script lang="javascript" type="text/javascript" src="../javascript/excanvas.js"></script><![endif]-->
<script lang="javascript" type="text/javascript">

    $(document).ready(function () {
        $("#goal_kwh").text((parseFloat($("#cur_kwh").text())).toFixed(1));
        $("#goal_month_bill").text((parseFloat($("#cur_month_bill").text())).toFixed(2));
        $("#goal_year_bill").text((parseFloat($("#cur_year_bill").text())).toFixed(2));
        $("#new_kwh").text((parseFloat($("#cur_kwh").text())).toFixed(1));
        $("#new_month_bill").text((parseFloat($("#cur_month_bill").text())).toFixed(2));
        $("#new_year_bill").text((parseFloat($("#cur_year_bill").text())).toFixed(2));
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

            background: background,
            animation: { duration: 1 },
            shadows: {
                enabled: true
            },
            series: [
                {
                    type: 'pie',
                    fillStyles: ['#418CF0', '#FCB441', '#E0400A', '#056492', '#BFBFBF'],
                    labels: {
                        stringFormat: '%.1f%%',
                        valueType: 'percentage',
                        font: '9px sans-serif',
                        fillStyle: 'white'
                    },
                    explodedRadius: 0,
                    explodedSlices: [0],
                    data: [['Cooling', 15], ['Water', 5], ['Plug load', 30],
                        ['Lighting', 15], ['Heating', 35]]
                }
            ]
        });

        $('#piechart').bind('tooltipFormat', function (e, data) {
            var percentage = data.series.getPercentage(data.value);
            percentage = data.chart.stringFormat(percentage, '%.2f%%');

            return '<b>' + data.dataItem[0] + '</b><br />' +
                data.value + ' (' + percentage + ')';
        });
        setTimeout(function() {
            $("#loadcover").addClass("hide_load");

            $("#goal_kwh").numerator({toValue:(parseFloat($("#cur_kwh").text()) *.9), duration: 2000, rounding:1 });
            $("#goal_month_bill").numerator({toValue:(parseFloat($("#cur_month_bill").text()) *.9), duration: 2000, rounding:2 });
            $("#goal_year_bill").numerator({toValue:(parseFloat($("#cur_year_bill").text()) *.9), duration: 2000, rounding:2 });

        }, 500);
        /* var decimal_places = 1;
         var decimal_factor = decimal_places === 0 ? 1 : decimal_places * 10;*/
        /* $("#goal_kwh").prop('number',parseFloat($("#cur_kwh").text())).animateNumber(
         {
         number: parseFloat($("#cur_kwh").text())*.9,
         easing: 'easeOutCirc',
         numberStep: function(now, tween) {
         var target = $(tween.elem);
         // force decimal places even if they are 0
         now = now.toFixed(1);

         target.text(now);
         }
         },
         2000
         );
         $("#goal_month_bill").prop('number',parseFloat($("#cur_month_bill").text())).animateNumber(
         {
         number: parseFloat($("#cur_month_bill").text())*.9,
         easing: 'easeOutCirc',
         numberStep: function(now, tween) {
         var target = $(tween.elem);
         // force decimal places even if they are 0
         now = now.toFixed(2);

         target.text('$' + now);
         }
         },
         2000
         );
         $("#goal_year_bill").prop('number',parseFloat($("#cur_year_bill").text())).animateNumber(
         {
         number: parseFloat($("#cur_year_bill").text())*.9,
         easing: 'easeOutCirc',
         numberStep: function(now, tween) {
         var target = $(tween.elem);
         // force decimal places even if they are 0
         now = now.toFixed(2);

         target.text('$' + now);
         }
         },
         3000
         );*/
    });
</script>