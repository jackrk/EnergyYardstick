<?php
/**
 * Created by PhpStorm.
 * User: Jack
 * Date: 4/23/14
 * Time: 8:04 PM
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
        $tbl_name = "Initial_Questions";

        $link = mysql_connect("$host", "$user", "$pass") or die("cannot connect");
        mysql_select_db("$db_name") or die("cannot select DB");

        $username = $_SESSION ['username'];
        $house = $_SESSION['house_id'];
        $heating = $form_fields[heating_system];
        $space_heaters = $form_fields[space_heater];
        $cooling_system = $form_fields[cooling_system];
        $fireplace = $form_fields[fireplace];
        $lighting = $form_fields[lighting];
        $lights_off = $form_fields[lights_off];
        $thermostat = $form_fields[thermostat];
        $garage = $form_fields[garage];
        $water_heater = $form_fields[water_heater];
        $num_people = $form_fields[num_people];


        $sql = "INSERT INTO $tbl_name (heating, space_heaters, cooling_system, fireplace, bulb_type, lights_off, prog_thermostat, garage, water_heater, num_people, username, house_id)
                VALUES('$heating', '$space_heaters', '$cooling_system', '$fireplace', '$lighting', '$lights_off', '$thermostat', '$garage', '$water_heater', $num_people, '$username', '$house')";

        $sql2 = "UPDATE User_House SET questions=1 WHERE username = '$username' and house_id = '$house'";

        mysql_query($sql);
        mysql_query($sql2);

        $ajax->location("/php/rating_main.php");
    }
}