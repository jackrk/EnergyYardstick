<?php
/**
 * Created by PhpStorm.
 * User: bilalbesic
 * Date: 12/4/14
 * Time: 1:02 PM
 */

class controller_questions
{
    /**
     * @param $form_fields
     */
    function create($form_fields) {
        $ajax = ajax();

        $host = "69.195.124.206";
        $user = "theciuc0_jdev";
        $pass = "tqHzLt6N]h8X";
        $db_name = "theciuc0_1";
        $tbl_name = "Tips";

        $link = mysql_connect("$host", "$user", "$pass") or die("cannot connect");
        mysql_select_db("$db_name") or die("cannot select DB");

        $tiptext = $form_fields[tiptext];
        $pointvalue = $form_fields[pointvalue];
        $cost = $form_fields[cost];


        $sql = "INSERT INTO $tbl_name (tip_text, point_value, cost)
                VALUES('$tiptext', '$pointvalue', '$cost')";

        mysql_query($sql);

        $ajax->location("/php/admin.php");
    }
}