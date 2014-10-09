<?php
session_start();
/**
 * Created by PhpStorm.
 * User: jack_ultra
 * Date: 3/3/14
 * Time: 11:01 PM
 */


$user = "theciuc0_jdev";
$pass = "tqHzLt6N]h8X";
    try {
    	
	if (isset($_SESSION['fullusage'])) {
	    $usage = $_SESSION['fullusage'];
	} else {
	        $dbh = new PDO('mysql:host=localhost;dbname=theciuc0_1', $user, $pass);
	
	        $customer_id = 20042;
	        $stmt = $dbh->prepare("SELECT * from House WHERE (city_customer_id) = (:customer_id)");
	        $stmt->bindParam(':customer_id', $customer_id );
	        $stmt->execute();
	        $house = $stmt->fetch();
	
	        //$this_size = $house["size"];
	        $house_id = $house[0];
	        $stmt = $dbh->prepare("SELECT energy_usage from EnergyUsage WHERE (house_id) =  (:house_id)");
	        $stmt->bindParam(':house_id', $house_id);
	        $stmt->execute();
	        $usage = array();
	
	        while($row = $stmt->fetch()) {
	            $usage[] = $row;
	        }
	        $_SESSION['fullusage']=$usage;
	        //$rating =  get_rating($usage);
	
	        /**
	        Sample Query that will get the average for one neighborhood for 1 month.
	        SELECT AVG(energy_usage) from EnergyUsage JOIN House ON
	        (House.id = EnergyUsage.house_id) WHERE
	        (neighborhood) = "Stonebr" AND (bill_date) = "2013-01-01";
	         */
	        $dbh = null;
	}
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
?>
<!DOCTYPE html>
<html>
<head>

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
    <link rel="stylesheet" type="text/css" href="../css/history_tab.css"/>
    <link rel="stylesheet" type="text/css" href="../css/jquery.jqChart.css" />
    <link rel="stylesheet" type="text/css" href="../css/jquery.jqRangeSlider.css" />
    <link rel="stylesheet" type="text/css" href="../css/jquery-ui-1.10.4.css" />
    <!--[if IE 7]>
    <link href="../css/ie7/rating_tab.css" rel="stylesheet" type="text/css"/>
    <script lang="javascript" type="text/javascript" src="../javascript/excanvas.js"></script>
    <![endif]-->



</head>
<body style="width: 599px; height: 560px; margin: 0 auto;">
<div id="tab_menu">
    <a id="tab_rating" href="rating_main.php" class="tab_link">RATING</a>
    <a id="tab_compare" href="compare_main.php" class="tab_link ">COMPARE</a>
    <a id="tab_history" href="#" class="tab_link tab_active tab_link_last">HISTORY</a>
</div>

<div id="tab_container">
<script src="../javascript/jquery-1.11.0.min.js"></script>
<script src="../javascript/jquery-ui-1.10.4.min.js"></script>
<script src="../javascript/jquery.mousewheel.js" type="text/javascript"></script>
<script src="../javascript/jquery.jqChart.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../javascript/range_selector.js"></script>
<div id="history_container">
    <div id="histgraph_container">
        <div id="loader" class="hide_load show_load"><img class="load_gif" src="../css/images/old_loading.gif"/></div>
    </div>
    <div id="range_buttons">
        <div style="width: 199px !important" class="range_button selected">
            12<span class="range_month">months</span></div><span class="range_button">
            24<span class="range_month">months</span></span><span class="range_button">
            36<span class="range_month">months</span></span>
    </div>
</div>
</div>
</body>
</html>
    <script lang="javascript" type="text/javascript">

        var usage_data = [['Jan 13', <?php echo $usage[0]['energy_usage'] ?>],
            ['Feb 13', <?php echo $usage[1]['energy_usage'] ?>], ['Mar 13', <?php echo $usage[2]['energy_usage'] ?>],
            ['Apr 13', <?php echo $usage[3]['energy_usage'] ?>], ['May 13', <?php echo $usage[4]['energy_usage'] ?>],
            ['Jun 13', <?php echo $usage[5]['energy_usage'] ?>], ['Jul 13', <?php echo $usage[6]['energy_usage'] ?>],
            ['Aug 13', <?php echo $usage[7]['energy_usage'] ?>], ['Sep 13', <?php echo $usage[8]['energy_usage'] ?>],
            ['Oct 13', <?php echo $usage[9]['energy_usage'] ?>], ['Nov 13', <?php echo $usage[10]['energy_usage'] ?>],
            ['Dec 13', <?php echo $usage[11]['energy_usage'] ?>],
            ['Jan 12', <?php echo $usage[12]['energy_usage'] ?>],
            ['Feb 12', <?php echo $usage[13]['energy_usage'] ?>], ['Mar 12', <?php echo $usage[14]['energy_usage'] ?>],
            ['Apr 12', <?php echo $usage[15]['energy_usage'] ?>], ['May 12', <?php echo $usage[16]['energy_usage'] ?>],
            ['Jun 12', <?php echo $usage[17]['energy_usage'] ?>], ['Jul 12', <?php echo $usage[18]['energy_usage'] ?>],
            ['Aug 12', <?php echo $usage[19]['energy_usage'] ?>], ['Sep 12', <?php echo $usage[20]['energy_usage'] ?>],
            ['Oct 12', <?php echo $usage[21]['energy_usage'] ?>], ['Nov 12', <?php echo $usage[22]['energy_usage'] ?>],
            ['Dec 12', <?php echo $usage[23]['energy_usage'] ?>],
            ['Jan 11', <?php echo $usage[24]['energy_usage'] ?>],
            ['Feb 11', <?php echo $usage[25]['energy_usage'] ?>], ['Mar 11', <?php echo $usage[26]['energy_usage'] ?>],
            ['Apr 11', <?php echo $usage[27]['energy_usage'] ?>], ['May 11', <?php echo $usage[28]['energy_usage'] ?>],
            ['Jun 11', <?php echo $usage[29]['energy_usage'] ?>], ['Jul 11', <?php echo $usage[30]['energy_usage'] ?>],
            ['Aug 11', <?php echo $usage[31]['energy_usage'] ?>], ['Sep 11', <?php echo $usage[32]['energy_usage'] ?>],
            ['Oct 11', <?php echo $usage[33]['energy_usage'] ?>], ['Nov 11', <?php echo $usage[34]['energy_usage'] ?>],
            ['Dec 11', <?php echo $usage[35]['energy_usage'] ?>]];
        var usage_data_minus_five = usage_data.slice(0);
        for (var i = 0; i < usage_data_minus_five; i++) {
            usage_data_minus_five[i] *= .95;
        }

        $(document).ready(function () {

            $('.range_button').on("click", function() {
                if ($(this).hasClass("selected")) return false;
                $(this).parent().children().each(function() {
                    $(this).removeClass("selected");
                });
                $(this).addClass("selected");
                if ($(this).text().indexOf("12") > -1) {
                    // get current series
                    var series = $('#histgraph_container').jqChart('option', 'series');
                    // get the data from the first series
                    series[0].data = usage_data.slice(0, 12);
                    // update (redraw) the chart
                    $('#histgraph_container').jqChart('update');
                } else if ($(this).text().indexOf("24") > -1) {
                    var series = $('#histgraph_container').jqChart('option', 'series');
                    series[0].data = usage_data.slice(0, 24);
                    $('#histgraph_container').jqChart('update');
                } else {
                    var series = $('#histgraph_container').jqChart('option', 'series');
                    series[0].data = usage_data;
                    $('#histgraph_container').jqChart('update');
                }
            });
            $('#histgraph_container').jqChart({
                title: { text: 'Monthly Electricity Usage (kWh)' },
                legend: { location: 'top' },
                animation: { duration: .5 },
                shadows: {
                    enabled: true
                },
                border: {
	                cornerRadius: 1,
	                strokeStyle: 'gray',
	                padding: {
			      top: 8,
			      left: 8,
			      bottom: 20,
			      right: 8
			  }
	            },
	        series: [
                    {
                        type: 'line',
                        title: 'Your Usage',
                        fillStyle: '',
                        data: usage_data.slice(0,12)
                    }
                ]
            });

        });
    </script>