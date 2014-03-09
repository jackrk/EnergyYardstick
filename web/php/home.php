<?php
/**
 * Created by PhpStorm.
 * User: jack_ultra
 * Date: 3/3/14
 * Time: 11:01 PM
 */

//require_once "../ajax.php";

//$ajax = ajax();
/*
$ajax->call("../ajax.php?tab/rating");

$ajax->click("tab_rating",$ajax->call("../ajax.php?tab/rating"));
$ajax->click("tab_compare",$ajax->call("../ajax.php?tab/compare"));
$ajax->click("tab_history",$ajax->call("../ajax.php?tab/history")); */

?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Titillium+Web:200"/>
    <link rel="stylesheet" type="text/css" href="/css/tab_menu.css"/>
    <link rel="stylesheet" type="text/css" href="/css/home.css"/>
    <link rel="stylesheet" type="text/css" href="/css/compare_tab.css"/>
    <link rel="stylesheet" type="text/css" href="/css/rating_tab.css"/>
    <link rel="stylesheet" type="text/css" href="/css/history_tab.css"/>
    <link rel="stylesheet" type="text/css" href="/css/slider/jquery.nouislider.css"/>
    <?php //echo $ajax->init(); ?>
</head>
<body style="width: 599px; height: 600px; margin: 0 !important;">
<div id="tab_menu">
        <a id="tab_rating" class="tab_link">RATING</a>
        <a id="tab_compare" class="tab_link">COMPARE</a>
        <a id="tab_history" class="tab_link tab_link_last">HISTORY</a>
</div>
<div id="tab_container"></div>

<script src="/javascript/jquery-1.11.0.min.js"></script>
<script src="/javascript/animate/jquery.transit.min.js"></script>
<script src="/javascript/slider/jquery.nouislider.js"></script>
<script src="/javascript/tab_menu.js"></script>

</body>
</html>