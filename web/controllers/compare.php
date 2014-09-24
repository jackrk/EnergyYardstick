<?php
/**
 * Created by PhpStorm.
 * User: Jack
 * Date: 9/10/14
 * Time: 3:10 PM
 */
class controller_compare {
    function size($month) {
        $ajax = ajax();
        $ajax->$month = $ajax->call("../php/comparison_functions/compare_size.php?m=$month");

    }
}