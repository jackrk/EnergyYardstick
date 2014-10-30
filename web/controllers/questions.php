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
    function authenticate($form_fields) {
        session_start();
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
        $lighting = $form_fields[lighting];
        $thermostat = $form_fields[thermostat];
        $water_heater = $form_fields[water_heater];

        $sql = "INSERT INTO $tbl_name (heating, space_heaters, cooling_system, bulb_type, prog_thermostat, water_heater, username, house_id)
                VALUES('$heating', '$space_heaters', '$cooling_system', '$lighting', '$thermostat', '$water_heater', '$username', '$house')";

        $sql2 = "UPDATE User_House SET questions=1 WHERE username = '$username' and house_id = '$house'";

        mysql_query($sql);
        mysql_query($sql2);

        $ajax->location("/php/rating_main.php");
    }
}