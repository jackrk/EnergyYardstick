<?php
/**
 * Created by PhpStorm.
 * User: jack_ultra
 * Date: 3/3/14
 * Time: 11:05 PM
 */

class controller_tab {
    function rating() {
        $ajax = ajax();
        usleep(400000);
        $ajax->call("../php/tabs/rating_main.php", "tab_container");

    }

    function compare() {
        $ajax = ajax();
        usleep(400000);
        $ajax->call("../php/tabs/compare_main.php", "tab_container");
    }

    function history() {
        $ajax = ajax();
        usleep(400000);
        $ajax->call("../php/tabs/history_main.php", "tab_container");
    }
}
