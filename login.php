<?php
/**
 * Created by PhpStorm.
 * User: jack_ultra
 * Date: 4/1/14
 * Time: 11:04 AM
 */
require_once "../ajax.php";

//$ajax = ajax();

//$ajax->click("ajaxsubmit",$ajax->form('../ajax.php/login/authenticate'));
/*
$ajax->call("../ajax.php?tab/rating");

$ajax->click("tab_history",$ajax->call("../ajax.php?tab/history")); */

$host = "69.195.124.206";
$user = "theciuc0_jdev";
$pass = "tqHzLt6N]h8X";
$db_name = "theciuc0_1";
$tbl_name = "User";

$link = mysql_connect("$host", "$user", "$pass")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$username = $_POST['username'];
$password = $_POST['password'];

$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);


$sql = "SELECT * FROM $tbl_name WHERE username = '$username' AND password = '$password'";
$result = mysql_query($sql, $link) or die ('Unable to run query:'.mysql_error());

$count = mysql_num_rows($result);

$row = mysql_fetch_row($result);
$questions = $row[2];

if($count == 1) {
    if ($questions = 1) {
        header('Location= thecityofames.org/php/rating_main.php');
    }
    else
        header('Location= thecityofames.org/php/questions.php');
}

else {
    $message = 'Wrong Username or Password';
    echo "<script type='text/javascript'> alert('$message'); </script>";

    header("Refresh: 0; URL = thecityofames.org/php/login.php");
}

?>

<!DOCTYPE html>
<head>
    <?php echo $ajax->init(); ?>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
    <link href="../css/login.css" rel="stylesheet" type="text/css">
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

<script src="../javascript/jquery-1.11.0.min.js"></script>
<script src="../javascript/animate/jquery.transit.min.js"></script>
</body>
</html>