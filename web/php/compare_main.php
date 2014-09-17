<?php
session_start();
/*require_once "../ajax.php";

$ajax = ajax();

$ajax->click("tjan",$ajax->call("../ajax.php/compare/size/jan"));
$ajax->click("tfeb",$ajax->call("../ajax.php/compare/size/feb"));
$ajax->click("tmar",$ajax->call("../ajax.php/compare/size/mar"));*/
/*$ajax->click("apr",$ajax->call("../ajax.php/compare/size/jan"));
$ajax->click("may",$ajax->call("../ajax.php/compare/size/jan"));
$ajax->click("jun",$ajax->call("../ajax.php/compare/size/jan"));
$ajax->click("jul",$ajax->call("../ajax.php/compare/size/jan"));
$ajax->click("aug",$ajax->call("../ajax.php/compare/size/jan"));
$ajax->click("sep",$ajax->call("../ajax.php/compare/size/jan"));*/

/*function get_rating($data){
	$count = 0;
	$sum = 0;
	foreach($data as $row){
		$sum = $row['energy_usage']/$row['days_in_cycle'];
		$count++;
	}
	if($count > 0)
		return $sum/$count;
}*/
$user = "theciuc0_jdev";
$pass = "tqHzLt6N]h8X";
if (isset($_SESSION['usage'])) {
    $usage = $_SESSION['usage'];
} else {
    try {
        $dbh = new PDO('mysql:host=69.195.124.206;dbname=theciuc0_1', $user, $pass);

        $customer_id = 695;
        $stmt = $dbh->prepare("SELECT * from House WHERE (customer_id) = (:customer_id)");
        $stmt->bindParam(':customer_id', $customer_id );
        $stmt->execute();
        $house = $stmt->fetch();

        $this_size = $house["size"];
        //$house_id = $house[0];
        $house_id = 2346;
        $stmt = $dbh->prepare("SELECT * from EnergyUsage WHERE (house_id) =  (:house_id)");
        $stmt->bindParam(':house_id', $house_id);
        $stmt->execute();
        $usage = array();

        while($row = $stmt->fetch()) {
            $usage[] = $row;
        }
        $_SESSION['usage']=$usage;
        //$rating =  get_rating($usage);

        /**
        Sample Query that will get the average for one neighborhood for 1 month.
        SELECT AVG(energy_usage) from EnergyUsage JOIN House ON
        (House.id = EnergyUsage.house_id) WHERE
        (neighborhood) = "Stonebr" AND (bill_date) = "2013-01-01";
         */
        $dbh = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}


/**
 * Created by PhpStorm.
 * User: jack_ultra
 * Date: 3/3/14
 * Time: 11:27 PM
 */

?>

<!DOCTYPE html>
<html>
<head>
    <?php /*echo $ajax->init();*/?>

    <!--
      Bilal:

      There are getting to be too many references to have different blocks
      for your workspace and the rest of ours. Every img tag would have to be changed
      as well as script tags in other files besides this one.

      I'd recommend that you figure out how to set your root directory in php to the folder
      that contains the php, css, javascript, img etc directories.

      -->

    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:200' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="../css/tab_menu.css"/>
    <link rel="stylesheet" type="text/css" href="../css/home.css"/>
    <link rel="stylesheet" type="text/css" href="../css/compare_tab.css"/>
    <link rel="stylesheet" type="text/css" href="../css/rating_tab.css"/>
    <link rel="stylesheet" type="text/css" href="../css/history_tab.css"/>
    <link rel="stylesheet" type="text/css" href="../css/slider/jquery.nouislider.css"/>
    <link rel="stylesheet" type="text/css" href="../css/jquery.jqChart.css" />
    <link rel="stylesheet" type="text/css" href="../css/jquery-ui-1.10.4.css" />
    <!--[if IE 7]>
    <link href="../css/ie7/rating_tab.css" rel="stylesheet" type="text/css"/>
    <script lang="javascript" type="text/javascript" src="../javascript/excanvas.js"></script>
    <![endif]-->
</head>
<body style="width: 599px; height: 560px; margin: 0 auto;">
<div id="tab_menu">
    <a id="tab_rating" href="rating_main.php" class="tab_link">RATING</a>
    <a id="tab_compare" href="#" class="tab_link tab_active">COMPARE</a>
    <a id="tab_history" href="history_main.php" class="tab_link tab_link_last">HISTORY</a>
</div>

<div id="tab_container">
    <div id="compare_container">
        <div id="compgraph_container">

            <div id="loader" class="hide_load"><img class="load_gif" src="../css/images/loading_spin.gif"/></div>
        </div>
        <div id="compare_selector">
            <div id="reset_similar_button">Reset to <span class="color_text">similar</span></div>
            <div id="compare_buttons">
                <div id="compare_size" class="compare_button">
                    Compare by&nbsp;<span class="color_text">size</span><label class="comp_desc">(sq ft)</label></div><div id="compare_style" class="compare_button">
                    Compare by&nbsp;<span class="color_text">style</span><label class="comp_desc">(ex. number of stories)</label></div><div id="compare_age" class="compare_button compare_button_bottom">
                    Compare by&nbsp;<span class="color_text">age</span></div><div id="compare_area" class="compare_button compare_button_bottom">
                    Compare in your&nbsp;<span class="color_text">neighborhood</span></div>
            </div>
        </div>
    </div>
    <button id="test">Test</button>
    <div id="jan" class="month"></div>
    <div id="feb" class="month"></div>
    <div id="mar" class="month"></div>
    <div id="apr" class="month"></div>
    <div id="may" class="month"></div>
    <div id="jun" class="month"></div>
    <div id="jul" class="month"></div>
    <div id="aug" class="month"></div>
    <div id="sep" class="month"></div>
    <div id="oct" class="month"></div>
    <div id="nov" class="month"></div>
    <div id="dec" class="month"></div>
</div>
<script src="../javascript/jquery-1.11.0.min.js"></script>
<script src="../javascript/jquery-ui-1.10.4.min.js"></script>
<script src="../javascript/jquery.mousewheel.js" type="text/javascript"></script>
<script src="../javascript/jquery.jqChart.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../javascript/compare_selector.js"></script>

<script lang="javascript" type="text/javascript">
    $(document).ready(function () {

        $("#test").on("click", function() {
            $(".month").each(function() {
                $element = $(this);
                $.get("comparison_functions/compare_size.php?m=" + $element.attr("id"),
                    function(data) {
                        $("#jan").append(data);
                    });
            });
        });


        $('#compgraph_container').jqChart({
            title: { text: 'Monthly Electricity Usage (kWh)' },
            legend: { location: 'top' },
            animation: { duration: 1 },
            shadows: {
                enabled: true
            },
            border: {
                cornerRadius: 1,
                strokeStyle: '#212121',
                padding: 16
            },
            series: [
                {
                    type: 'column',
                    title: 'City Average',
                    fillStyle: '#418CF0',
                    data: [['Jan 13', 600], ['Feb 13', 700], ['Mar 13', 800],
                        ['Apr 13', 900], ['May 13', 1000], ['Jun 13', 1100], ['Jul 13', 1200],
                        ['Aug 13', 1100], ['Sep 13', 1000], ['Oct 13', 900], ['Nov 13', 800],
                        ['Dec 13', 700]]
                },
                {
                    type: 'line',
                    title: 'Your Usage',
                    fillStyle: '#FCB441',
                    <?php
                    echo <<<EOHTML

                    data: [['Jan 13', {$usage[0]['energy_usage']}],
                        ['Feb 13', {$usage[1]['energy_usage']}], ['Mar 13', {$usage[2]['energy_usage']}],
                        ['Apr 13', {$usage[3]['energy_usage']}], ['May 13', {$usage[4]['energy_usage']}],
                        ['Jun 13', {$usage[5]['energy_usage']}], ['Jul 13', {$usage[6]['energy_usage']}],
                        ['Aug 13', {$usage[7]['energy_usage']}], ['Sep 13', {$usage[8]['energy_usage']}],
                        ['Oct 13', {$usage[9]['energy_usage']}], ['Nov 13', {$usage[10]['energy_usage']}],
                        ['Dec 13', {$usage[11]['energy_usage']}]]

EOHTML;

                    ?>
                }
            ]
        });
    });
</script>
</body>


