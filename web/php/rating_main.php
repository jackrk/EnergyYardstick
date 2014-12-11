<?php


/**
 * Created by PhpStorm.
 * User: jack_ultra
 * Date: 3/3/14
 * Time: 11:01 PM
 */
require_once "../ajax.php";


$ajax = ajax();

$username = $_SESSION['username'];
$house_id = $_SESSION['house_id'];

$ajax->call("../ajax.php?rating/get/$username/$house_id");


//$ajax->click("save-tips-original",$ajax->call("../ajax.php?tips/save/$username"));


/*
$ajax->click("tab_compare",$ajax->call("../ajax.php?tab/compare"));
$ajax->click("tab_history",$ajax->call("../ajax.php?tab/history")); */

?>
<!DOCTYPE html>
<html>
<head>
    <?php echo $ajax->init(); ?>

    <!--
      Bilal:

      There are getting to be too many references to have different blocks
      for your workspace and the rest of ours. Every img tag would have to be changed
      as well as script tags in other files besides this one.

      I'd recommend that you figure out how to set your root directory in php to the folder
      that contains the php, css, javascript, img etc directories.

      -->

    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:200' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="../css/tab_menu.css"/>
    <link rel="stylesheet" type="text/css" href="../css/home.css"/>
    <link rel="stylesheet" type="text/css" href="../css/rating_tab.css"/>
    <link rel="stylesheet" type="text/css" href="../css/jquery-ui-1.10.4.css" />
    <link rel="stylesheet" type="text/css" href="../css/glyphicons/css/bootstrap.min.css">
    <!--[if IE 7]>
    <link href="../css/ie7/rating_tab.css" rel="stylesheet" type="text/css"/>
    <![endif]-->
</head>
<body style="width: 599px; height: 560px; margin: 0 auto;">
<div id="tab_menu">
    <a id="tab_rating" href="#" class="tab_link tab_active">Rating</a>
    <a id="tab_compare" href="compare_main.php" class="tab_link">Compare</a>
    <a id="tab_history" href="history_main.php" class="tab_link">History</a>
    <a id="account_button" class="tab_link account-dropdown-button"><?php echo $username ?><span class="glyphicon glyphicon-chevron-down dropdown-arrow"></span></a>
    <div class="account-dropdown">
        <ul>
            <li><a href="select_house.php">Switch Address</a></li>
            <li style="padding-bottom: 10px;"><a href="login.php">Log Out</a></li>
        </ul>
    </div>
    <a style="float: right" id="show_help" href="#" class="tab_link">Help</a>
</div>

<div id="tab_container">
    <div id="rating_tab">
    
            <div id="loadcover" class="show_load" style="height: 562px !important">
                <img class="load_gif" src="../css/images/loading_spin.gif"/>
                <span style="
                    font-size: 26px;
                    /* font-weight: bold; */
                    position: relative;
                    top: 161px;
                    font-style: italic;
                    display: block;
                    font-family: 'Open Sans', Helvetica, sans-serif;
                ">calculating rating</span>
            </div>
            <div id="helpcover" class="show_help help-modal">
                <div class="help-title">Rating Help<span id="helpClose" class="help-close glyphicon glyphicon-remove"></span></div>
               <!-- <p class="help-desc">
                    The goal of using the Energy Yardstick is to understand how to improve our energy efficiency, and show the benefits that even small improvements can make.
                </p>-->
                <!--<div class="help-body-title"><span class="help-body-button help-body-button-on">Rating</span><span style="padding-left: 20px;" class="help-body-button">Compare</span></div>-->
                <div class="help-body" >
                    <p>Your rating is calculated by comparing your average energy usage to the usage of similar Ames residents, while taking in to account the number of people living in your household.</p>
                    <p>Start by clicking on a few of the <b>tips</b> in the list and scroll down to see more. Each tip will have an impact on your <b>new</b> usage and estimated monthly bill. If some already apply to you,
                    or you've logged in before and worked on a few, great!
                    Select those tips, then click the <span class="glyphicon glyphicon-floppy-disk"></span> button to save them.
                    </p>
                    <p>You can also see tips that you've previously saved by clicking the <b>show saved</b> button. If you saved one by accident or you want to remove any from the saved list, just select them and click the
                    <span class="glyphicon glyphicon-floppy-disk"></span> button.
                    </p>
                    <p>The <b>equivalent to</b> section is just a fun way of seeing what your efficiency is in terms of being environmentally friendly. If you're energy efficient, it's like getting great mpg on your car, removing
                    cars from the roads, and planting trees.
                    </p>
                </div>
            </div>
         <div id="rating_container">
            <div class="info_container">
            <div class="rating_info_container"><div class="rating_info"><span class="rating_number">--</span><span class="rating_text">good</span></div></div>
            <div id="metric_container">
                <div id="rating_metrics"><span class="metric_title">equivalent to</span>
                    <div class="metric" id="mpg_metric"><img style="padding-left: 4px;" src="../img/gas_mid.png" height="26" width="26" class="icon_img"/><img style="padding-left: 2px;" src="../img/x_mid.png" height="26" width="38" class="x_img" />
                        <div class="metric_number"><span id="mpg_number">0</span><span class="metric_text">&nbsp;&nbsp;mpg&nbsp;&nbsp;</span></div></div>
                    <div class="metric" id="cars_metric"><img src="../img/car_mid.png" height="32" width="32" class="icon_img"/><img src="../img/x_mid.png" height="26" width="38" class="x_img"/>
                        <div class="metric_number"><span id="cars_number">0</span><span class="metric_text">&nbsp;&nbsp;removed</span></div></div>
                    <div class="metric" id="trees_metric"><img style="padding-left: 1px; margin-right: 9px;" src="../img/tree_mid.png" height="32" width="32" class="icon_img" /><img src="../img/x_mid.png" height="26" width="38" class="x_img"/>
                        <div class="metric_number"><span id="trees_number">0</span><span class="metric_text">&nbsp;&nbsp;planted</span></div></div>
                </div>
            </div>
            </div>
            <div class="rating_breakdown">
                <span class="rating_breakdown_desc" >
                    average monthly use: <br>
                    estimated cost per month:  <br>
                    estimated cost per year: <br>
                </span>
                <span id="usage_now" class="rating_breakdown_numbers" >
                    <span style="font-style: italic">now</span><br>
                    <span id="cur_kwh">--</span> kWh<br>
                    $<span id="cur_month_bill">--</span><br>
                    $<span id="cur_year_bill">--</span><br>
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
            <div id="tips_title">
                <div style="width: 60%;display: inline-block;float: left;padding: 4px;margin-left: 34px;">
                    Click a tip to see how it will impact your efficiency, then save any that you've completed</div>
                <span id="tip_toggle" class="tip-toggle-button">show saved</span>
                <span id="save-tips-loading" class="save-tips-loading"></span>
            </div>
            <div id="tips_list">
                <ul id="tips" class="tips"><li id="tips_inner"></li><li id="saved_tips_inner" style="display: none"></li></ul>
                <input type="text" style="display: none" id="savedtips" value="" />
                <input type="text" style="display: none" id="deletedtips" value="" />
                <!--<div id="tips_submit">Click to save any that you've completed</div>-->
            </div>
        </div>
    </div>

</div>
<div id="hidden_rating_number" style="display: none"></div>

</body>
</html>


<script src="../javascript/jquery-1.11.0.min.js"></script>
<script src="../javascript/jquery-ui-1.10.4.min.js"></script>
<script type="text/javascript" src="../javascript/tips_selector.js"></script>
<script src="../javascript/number/jquery.animateNumber.min.js"></script>
<script src="../javascript/number/jquery-numerator.js"></script>
<script src="../javascript/number/jquery.easing.1.3.js"></script>
<script src="../javascript/animate/jquery.transit.min.js"></script>
<script src="../javascript/tab_menu.js"></script>
<script src="../javascript/rating_functions.js"></script>
<!--[if IE]>
<script lang="javascript" type="text/javascript" src="../javascript/excanvas.js"></script><![endif]-->
<script lang="javascript" type="text/javascript">

    $.holdReady(true);

    function grabDeletions() {
        var datastring = "";
        $(".tip-deleted").each(function() {
           var utId = $(this).find(".ut-id").html();
            datastring += utId + "--";
        });
        $("#deletedtips").attr("value",datastring);
    }


    function grabSelections() {
        var datastring = "";
        $(".tip-selected").each(function() {
            var tipId = $(this).children().first().html();
            datastring += tipId + "--";
        });
        $("#savedtips").attr("value",datastring);
    }

    $(document).ready(function () {

        $("#show_help").click(function() {
            $("#helpcover").css("display", "show");
        });

        $("#helpClose").click(function() {
            $("#helpcover").css("display", "none");
        });

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
        $("#goal_kwh").numerator({toValue:(parseFloat($("#cur_kwh").text()) *.9), duration: 2000, rounding:1 });
        $("#goal_month_bill").numerator({toValue:(parseFloat($("#cur_month_bill").text()) *.9), duration: 2000, rounding:2 });
        $("#goal_year_bill").numerator({toValue:(parseFloat($("#cur_year_bill").text()) *.9), duration: 2000, rounding:2 });

        $("#account_button").click(function() {
            $(this).find(".glyphicon").toggleClass("glyphicon-chevron-down").toggleClass("glyphicon-chevron-up");
            $(".account-dropdown").toggleClass("show");
        });

        $("#loadcover").addClass("hide_load");
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