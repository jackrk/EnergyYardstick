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
		session_start();
        $ajax = ajax();


        if (!$form_fields['username']) {
            return $ajax->err = 'Enter your username';
        }
        if (!$form_fields['password']) {
            return $ajax->err = 'Enter your password';
        }

        $host = "69.195.124.206";
        $user = "theciuc0_jdev";
        $pass = "tqHzLt6N]h8X";
        $db_name = "theciuc0_1";
        $tbl_name = "User";

        $dbh = new PDO("mysql:host=$host;dbname=$db_name", $user, $pass);

        $username = $form_fields['username'];
        $password = $form_fields['password'];

        $username = stripslashes($username);
        $password = stripslashes($password);
        /*$username = mysql_real_escape_string($username);
        $password = mysql_real_escape_string($password);*/
        $password = md5($password);


        $stmt = $dbh->prepare("select * from $tbl_name where username = (:username) and password = (:password)");
        $stmt->bindParam("username", $username);
        $stmt->bindParam("password", $password);
        $stmt->execute();


        $count = sizeof($stmt->fetchAll());


        if ($count == 1) {
			$_SESSION['username'] = $username;
            if ($username == 'demo') {
                $stmt = $dbh->prepare("delete from User_Tips where username = 'demo'");
                $stmt->execute();
            }

			$ajax->location("/php/select_house.php");
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