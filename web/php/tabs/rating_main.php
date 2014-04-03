<?php
/**
 * Created by PhpStorm.
 * User: jack_ultra
 * Date: 3/3/14
 * Time: 11:27 PM
 */

?>
<script type="text/javascript" src="../javascript/tips_selector.js"></script>
<div id="rating_tab">
    <div class="slider_cont"><div class="rating_slider" id="slider"></div></div>
    <div id="rating_container">
        <div class="rating_info"><span class="rating_number">1</span><span class="rating_text">good</span></div>
        <div id="rating_metrics">
            <div class="metric" id="mpg_metric"><img style="padding-left: 8px;" src="../img/gas_mid.png" class="icon_img"/><img src="../img/x_mid.png" class="x_img" />
                <div class="metric_number"><span id="mpg_number">21</span><span class="metric_text">&nbsp;&nbsp;mpg&nbsp;&nbsp;</span></div></div>
            <div class="metric" id="cars_metric"><img src="../img/car_mid.png" class="icon_img"/><img src="../img/x_mid.png" class="x_img"/>
                <div class="metric_number"><span id="cars_number">5</span><span class="metric_text">&nbsp;&nbsp;removed</span></div></div>
            <div class="metric" id="trees_metric"><img src="../img/tree_mid.png" class="icon_img" /><img src="../img/x_mid.png" class="x_img"/>
                <div class="metric_number"><span id="trees_number">20</span><span class="metric_text">&nbsp;&nbsp;planted</span></div></div>
        </div>
        <div class="rating_breakdown">
            <span class="rating_breakdown_desc" >
                average monthly use: <br>
                average cost per month:  <br>
                total billed last 12 months: <br>
            </span>
            <span class="rating_breakdown_numbers" >
                548.3 kWh<br>
                $40.67<br>
                $621.54<br>
            </span>
        </div>
    </div>
    <div id="tips_container">
        <div id="tips_title">Select all that apply</div>
        <div id="tips_list">
            <ul class="tips">
                <li class="tip-unselected">
                    <span class="check_container"><img src="../img/checkmark.png" /></span><span class="tip_text">Electric Range</span></li><li class="tip-unselected">
                    <span class="check_container"><img src="../img/checkmark.png" /></span><span class="tip_text">Electric Water Heater</span></li><li class="tip-unselected">
                    <span class="check_container"><img src="../img/checkmark.png" /></span><span class="tip_text">LED Lights</span></li><li class="tip-unselected">
                    <span class="check_container"><img src="../img/checkmark.png" /></span><span class="tip_text">Electric Range</span></li><li class="tip-unselected">
                    <span class="check_container"><img src="../img/checkmark.png" /></span><span class="tip_text">Electric Water Heater</span></li><li class="tip-unselected">
                    <span class="check_container"><img src="../img/checkmark.png" /></span><span class="tip_text">LED Lights</span></li><li class="tip-unselected">
                    <span class="check_container"><img src="../img/checkmark.png" /></span><span class="tip_text">Electric Water Heater</span></li><li class="tip-unselected">
                    <span class="check_container"><img src="../img/checkmark.png" /></span><span class="tip_text">LED Lights</span></li><li class="tip-unselected">
                    <span class="check_container"><img src="../img/checkmark.png" /></span><span class="tip_text">Electric Range</span></li><li class="tip-unselected">
                    <span class="check_container"><img src="../img/checkmark.png" /></span><span class="tip_text">Electric Range</span></li>
            </ul>
            <div id="tips_submit">RECALCULATE</div>
        </div>
    </div>
</div>
