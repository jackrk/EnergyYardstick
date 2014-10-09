<?php
/**
 * Created by PhpStorm.
 * User: Jack
 * Date: 4/23/14
 * Time: 7:18 PM
 */
require_once "../ajax.php";

$ajax = ajax();

$ajax->click("q_ajaxsubmit",$ajax->form('../ajax.php/questions/authenticate'));

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
            <span>Do you have an <b>electric water heater</b></span>
            <span id="a_water_heat" class="answertext">NO</span>
            <input id="q_water_heat" type="checkbox" class="answer cb_answer"/>
        </div>
        <div class="question">
            <span>Do you have an <b>electric furnace</b></span>
            <span id="a_furnace" class="answertext">NO</span>
            <input id="q_furnace" type="checkbox" class="answer cb_answer"/>
        </div>
        <div class="question">
            <span>Do you have <b>electric baseboard heating</b></span>
            <span id="a_baseboard" class="answertext">NO</span>
            <input id="q_baseboard" type="checkbox" class="answer cb_answer"/>
        </div>
        <div class="question">
            <span>What <b>type of lighting</b> do you predominately have</span>
            <span id="a_lighting" class="lightimg"></span>
            <select id="q_lighting" class="answer sl_answer">
                <option>Incandescent</option>
                <option>Compact Fluorescent</option>
                <option>LED</option>
            </select>
        </div>
        <div class="question">
            <span>Do you have a <b>fridge older than 1990</b></span>
            <span id="a_fridge" class="answertext">NO</span>
            <input id="q_fridge" type="checkbox" class="answer cb_answer"/>
        </div>
        <div class="question">
            <span><b>How many people</b> live in your household</span>
            <input type="number" name="q_people" class="answer txt_answer" min="1" max="10" />
            <!--<input id="q_people" type="text" class="answer txt_answer"/>-->
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