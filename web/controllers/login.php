<?php
/**
 * Created by PhpStorm.
 * User: jack_ultra
 * Date: 4/1/14
 * Time: 7:28 PM
 */

class controller_login
{
    function authenticate($form_fields)
    {
        $ajax = ajax();


        if (!$form_fields[username]) {
            return $ajax->err = 'Enter your username';
        }
        if (!$form_fields[password]) {
            return $ajax->err = 'Enter your password';
        }

        $host = "69.195.124.206";
        $user = "theciuc0_jdev";
        $pass = "tqHzLt6N]h8X";
        $db_name = "theciuc0_1";
        $tbl_name = "User";

        $link = mysql_connect("$host", "$user", "$pass") or die("cannot connect");
        mysql_select_db("$db_name") or die("cannot select DB");

        $username = $form_fields[username];
        $password = $form_fields[password];

        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = mysql_real_escape_string($username);
        $password = mysql_real_escape_string($password);
        $password = md5($password);

        $sql = "select * from $tbl_name where username = '$username' and password = '$password'";
        $result = mysql_query($sql, $link) or die ('Unable to run query:' . mysql_error());

        $count = mysql_num_rows($result);

        $row = mysql_fetch_row($result);
        $questions = $row[2];


        if ($count == 1) {
            if ($questions == 1) {
                return $ajax->location("/php/rating_main.php");
                //$ajax->alert("Logged in as: " . $form_fields[username]);
            } else {
                return $ajax->location("/php/questions.php");
            }
        } else {
            return $ajax->alert("Wrong username or password");
        }


        //$ajax->alert("Server Says....\n\nFields submitted: \n".print_r($form_fields,1));
        //$ajax->alert("Logged in as: " . $form_fields[username]);

        //$ajax->location("/php/questions.php");


        //$ajax->success("Logged in as: ".$username);
        //header("Location: /php/home.php");

    }
}
?>