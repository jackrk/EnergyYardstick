<?php

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