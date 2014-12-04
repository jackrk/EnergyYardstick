<?php
/**
 * Created by PhpStorm.
 * User: bilalbesic
 * Date: 12/4/14
 * Time: 12:38 PM
 */

require_once "../ajax.php";

$ajax = ajax();

$username = $_SESSION['username'];

if (isset($_SESSION['username'])) {
    $ajax->click("t_ajaxsubmit",$ajax->form('../ajax.php/submit_tip/create'));
} else {
    header("Location: login.php");
}



?>
<!DOCTYPE html>
<head>
    <?php echo $ajax->init(); ?>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link href="../css/login.css" rel="stylesheet" type="text/css">
    <link href="../css/questions.css" rel="stylesheet" type="text/css">
</head>
<body style="width: 599px; height: 600px; margin: 0 auto;">

<div id="tab_menu">
    <a id="account_button" class="tab_link account-dropdown-button"><?php echo $username ?><span class="glyphicon glyphicon-chevron-down dropdown-arrow"></span></a>
    <div class="account-dropdown">
        <ul>
            <li style="padding-bottom: 10px;"><a href="login.php">Log Out</a></li>
        </ul>
    </div>
</div>
<div id="splash_logo">

</div>
<div id="buttoncontainer">
    <form id="adminform" class="adminform" method="post" action="" onsubmit="return false;"><div class="admintitle">Administrator Page</div>
        <div class="addtip">
            <br>
            <span><b>Add Tip</b></span><br><br>
            <span id="tip" class="tip"></span>
            Tip Text: <input type="text" name="a[tiptext]"><br><br>
            Point Value: <input type="text" name="a[pointvalue]"><br><br>
            Cost: <input type="text" name="a[cost]"><br><br>
        </div>
        <div class="tip-submit"><div id="err"></div><input id="t_ajaxsubmit" name="t_ajaxsubmit" class="tip-submit-button" type="submit" value="Submit"/></div>
        <br><br>
        <div class="dataupdate">
            <span><b>Update Data</b></span><br><br>
            <span id="tip" class="tip"></span>
            <button type="button" >Update</button>
        </div>
    </form>
</div>

<script src="../javascript/jquery-1.11.0.min.js"></script>
<script src="../javascript/animate/jquery.transit.min.js"></script>
<script>
    $(document).ready() {

    }
</script>
</body>
</html>