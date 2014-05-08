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
    <link rel="stylesheet" type="text/css" href="../../css/tab_menu.css"/>
    <link rel="stylesheet" type="text/css" href="../../css/home.css"/>
    <link rel="stylesheet" type="text/css" href="../../css/compare_tab.css"/>
    <link rel="stylesheet" type="text/css" href="../../css/rating_tab.css"/>
    <link rel="stylesheet" type="text/css" href="../../css/history_tab.css"/>
    <link rel="stylesheet" type="text/css" href="../../css/slider/jquery.nouislider.css"/>
    <!--[if IE 7]>
    <link href="../css/ie7/rating_tab.css" rel="stylesheet" type="text/css"/>
    <![endif]-->
    <?php //echo $ajax->init(); ?>
</head>
<body style="width: 599px; height: 560px; margin: 0 auto;">
<div id="tab_menu">
        <a id="tab_rating" class="tab_link">RATING</a>
        <a id="tab_compare" class="tab_link">COMPARE</a>
        <a id="tab_history" class="tab_link tab_link_last">HISTORY</a>
</div>

<div id="tab_container"></div>
<div id="loader" class="hide_load show_load"><label class="loading_label">loading</label><img class="load_gif" src="../../img/loader.gif"/></div>
<div id="hidden_rating_number" style="display: none">3</div>
<script src="../../javascript/jquery-1.11.0.min.js"></script>
<script src="../../javascript/tab_menu.js"></script>
<script src="../../javascript/rating_functions.js"></script>

</body>
</html>