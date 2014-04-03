<?php
/**
 * Created by PhpStorm.
 * User: jack_ultra
 * Date: 4/1/14
 * Time: 7:28 PM
 */

class controller_login
{
    function authenticate($form_fields) {
        $ajax = ajax();

        //$ajax->alert("Server Says....\n\nFields submitted: \n".print_r($form_fields,1));
        $ajax->alert("Logged in as: " . $form_fields[username]);

        $ajax->location("/php/home.php");

        /*if(!$username) {
            return $ajax->err = 'Enter your username';
        }
        if(!$password) {
            return $ajax->err = 'Enter your password';
        }*/
        //$ajax->success("Logged in as: ".$username);
        //header("Location: /php/home.php");
    }
}
