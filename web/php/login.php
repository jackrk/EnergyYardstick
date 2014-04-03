<?php
/**
 * Created by PhpStorm.
 * User: jack_ultra
 * Date: 4/1/14
 * Time: 11:04 AM
 */
require_once "../ajax.php";

$ajax = ajax();

$ajax->click("ajaxsubmit",$ajax->form('../ajax.php/login/authenticate'));
/*
$ajax->call("../ajax.php?tab/rating");

$ajax->click("tab_history",$ajax->call("../ajax.php?tab/history")); */

?>

<!DOCTYPE html>
<head>
    <?php echo $ajax->init(); ?>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
    <link href="/css/login.css" rel="stylesheet" type="text/css">
</head>
<body style="width: 599px; height: 600px; margin: 0 auto;">
<div id="splash_logo">

</div>
<div id="logincontainer">
    <form id="loginform" class="formlogin" style="background-color:#FFFFFF;font-size:12px;font-family:'Open Sans',sans-serif;font-weight:300;color:#666666;max-width:480px;min-width:150px" method="post" action="" onsubmit="return false;"><div class="logintitle">Welcome to the Ames Energy Yardstick</div>
        <div class="element-input" ><label class="title">User</label><input class="inputbox" type="text" id="a[username]" name="a[username]" placeholder="username" /></div>
        <div class="element-input" ><label class="title">Password</label><input class="inputbox" type="password" id="a[password]" name="a[password]" placeholder="password" /></div>

        <div class="submit"><div id="err"></div><input id="ajaxsubmit" name="ajaxsubmit" class="submit_button" type="submit" value="Submit"/></div>
    </form>
</div>

<script src="/javascript/jquery-1.11.0.min.js"></script>
<script src="/javascript/animate/jquery.transit.min.js"></script>
</body>
</html>