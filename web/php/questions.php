<?php
/**
 * Created by PhpStorm.
 * User: Jack
 * Date: 4/23/14
 * Time: 7:18 PM
 */
require_once "../ajax.php";

$ajax = ajax();

if (isset($_SESSION['username'])) {
    $ajax->click("q_ajaxsubmit",$ajax->form('../ajax.php/questions/authenticate'));
} else {
    header("Location: login.php");
}

?>
<!DOCTYPE html>
<head>
    <?php echo $ajax->init(); ?>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600' rel='stylesheet' type='text/css'>
<link href="../css/login.css" rel="stylesheet" type="text/css">
<link href="../css/questions.css" rel="stylesheet" type="text/css">
</head>
<body style="width: 599px; height: 600px; margin: 0 auto;">
<div id="splash_logo">

</div>
<div id="logincontainer">
    <form id="questionform" class="questionform" method="post" action="" onsubmit="return false;"><div class="logintitle">Tell us a little about your home</div>
        <div class="question">
            <span>Is your <b>heating system</b> gas or electric?</span>
            <span id="a_heating_system" class="heating_system"></span>
            <select id="q_heating_system" name="a[heating_system]" class="answer sl_answer">
                <option>Gas</option>
                <option>Electric</option>
            </select>
        </div>
        <div class="question">
            <span>Do you use <b>electric space heaters</b> for supplemental heat?</span>
            <span id="a_space_heater" class="answertext">NO</span>
            <input id="q_space_heater" name="a[space_heater]" type="checkbox" class="answer cb_answer"/>
        </div>
        <div class="question">
            <span>Do you have an <b>insulated attic space?</b></span>
            <span id="a_attic" class="answertext">NO</span>
            <input id="q_attic" name="a[attic]" type="checkbox" class="answer cb_answer"/>
        </div>
        <div class="question">
            <span>Do you have, and use, your <b>cooling system?</b></span>
            <span id="a_cooling_system" class="answertext">NO</span>
            <input id="q_cooling_system" name="a[cooling_system]" type="checkbox" class="answer cb_answer"/>
        </div>
        <div class="question">
            <span>Do you have a <b>functional</b> fireplace?</span>
            <span id="a_fireplace" class="answertext">NO</span>
            <input id="q_fireplace" name="a[fireplace]" type="checkbox" class="answer cb_answer"/>
        </div>
        <div class="question">
            <span>What <b>type of lighting </b>do you predominately have?</span>
            <span id="a_lighting" class="lightimg"></span>
            <select id="q_lighting" name="a[lighting]" class="answer sl_answer">
                <option>Incandescent</option>
                <option>Compact Fluorescent</option>
                <option>LED</option>
            </select>
        </div>
        <div class="question">
            <span>What % of time are lights kept off in <b>unattended </b>rooms?</span>
            <span id="a_lights_off" class="lights_off"></span>
            <select id="q_lights_off" name="a[lights_off]" class="answer sl_answer">
                <option>100%</option>
                <option>75%</option>
                <option>50%</option>
                <option>25%</option>
                <option>0%</option>
            </select>
        </div>
        <div class="question">
            <span>Do you have a <b>programmable thermostat?</b></span>
            <span id="a_thermostat" class="answertext">NO</span>
            <input id="q_thermostat" name="a[thermostat]" type="checkbox" class="answer cb_answer"/>
        </div>
        <div class="question">
            <span>Is your <b>garage </b>heated and/or cooled?</span>
            <span id="a_garage" class="answertext">NO</span>
            <input id="q_garage" name="a[garage]" type="checkbox" class="answer cb_answer"/>
        </div>
        <div class="question">
            <span>Is your <b>water heater</b> gas or electric?</span>
            <span id="a_water_heater" class="water_heater"></span>
            <select id="q_water_heater" name="a[water_heater]" class="answer sl_answer">
                <option>Gas</option>
                <option>Electric</option>
            </select>
        </div>
        <div class="submit"><div id="err"></div><input id="q_ajaxsubmit" name="q_ajaxsubmit" class="submit_button" type="submit" value="Submit"/></div>
    </form>
</div>

<script src="../javascript/jquery-1.11.0.min.js"></script>
<script src="../javascript/animate/jquery.transit.min.js"></script>
<script>
$(document).ready(function() {
    $("input[type='checkbox']").change(function(e) {
        $(this).is(':checked') ? $(this).prev().text('YES') : $(this).prev().text('NO');
    });
});
</script>
</body>
</html>