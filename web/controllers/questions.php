<?php
/**
 * Created by PhpStorm.
 * User: Jack
 * Date: 4/23/14
 * Time: 8:04 PM
 */
class controller_questions
{
    function authenticate($form_fields) {
        $ajax = ajax();
       /* if(!$form_fields[username]) {
            return $ajax->err = 'Enter your username';
        }
        if(!$form_fields[password]) {
            return $ajax->err = 'Enter your password';
        }*/
        //$ajax->alert("Server Says....\n\nFields submitted: \n".print_r($form_fields,1));
        //$ajax->alert("Logged in as: " . $form_fields[username]);

        $ajax->location("/php/home.php");


        //$ajax->success("Logged in as: ".$username);
        //header("Location: /php/home.php");
    }
}