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
    	
	/*if (!isset($_SESSION['fullusage'])) {
			$usage = $_SESSION['fullusage'];
	} else { */
	        $dbh = new PDO('mysql:host=69.195.124.206;dbname=theciuc0_1', $user, $pass);
	
	        $username = $_SESSION['username'];
			$house_id = $_SESSION['house_id'];
			
	        $stmt = $dbh->prepare("SELECT bill_date, energy_usage from EnergyUsage WHERE house_id = (:house_id) and (customer_id) = (:username) ORDER BY bill_date DESC LIMIT 36");
	        $stmt->bindParam(':house_id', $house_id);
            $stmt->bindParam(':username', $username);
	        $stmt->execute();
	        $usage = array();
	
	        while($row = $stmt->fetch()) {
	            $usage[] = array("bill_date" => date_format(date_create($row["bill_date"]), 'M y'), "energy_usage" => $row["energy_usage"]);
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
	//}
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
    <link rel="stylesheet" type="text/css" href="../css/jquery-ui-1.10.4.css" />
    <link rel="stylesheet" type="text/css" href="../css/glyphicons/css/bootstrap.min.css">
    <!--[if IE 7]>
    <link href="../css/ie7/rating_tab.css" rel="stylesheet" type="text/css"/>
    <script lang="javascript" type="text/javascript" src="../javascript/excanvas.js"></script>
    <![endif]-->



</head>
<body style="width: 599px; height: 560px; margin: 0 auto;">
<div id="tab_menu">
    <a id="tab_rating" href="rating_main.php" class="tab_link">Rating</a>
    <a id="tab_compare" href="compare_main.php" class="tab_link">Compare</a>
    <a id="tab_history" href="#" class="tab_link tab_active">History</a>
    <a id="account_button" class="tab_link account-dropdown-button"><?php echo $username ?><span class="glyphicon glyphicon-chevron-down dropdown-arrow"></span></a>
    <div class="account-dropdown">
        <ul>
            <li><a href="select_house.php">Switch Address</a></li>
            <li><a href=""><a>Update Original Questionnaire</a></li>
            <li style="padding-bottom: 10px;"><a href="login.php">Log Out</a></li>
        </ul>
    </div>
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
		var data = <?php echo json_encode($usage); ?>;

		//var array = Object.keys(data).map(function(k) { return data[k] });
		//var usage_data = []
		var result = [];
		var result2 = [];
		var result3 = [];

		var max = 0;

		for(var i in data.reverse()){

			if( parseInt(data[i]["energy_usage"]) > max) {
				max = parseInt(data[i]["energy_usage"]);
            }
			result.push([data[i]["bill_date"], data[i]["energy_usage"]]);
			if(i % 2 == 0){
				result2.push([data[i]["bill_date"], data[i]["energy_usage"]]);
			} else {
				result2.push(["", data[i]["energy_usage"]]);
			}
			if(i % 3 == 0){
				result3.push([data[i]["bill_date"], data[i]["energy_usage"]]);
			} else {
				result3.push(["", data[i]["energy_usage"]]);
			}
		}
		max += 200;

        $(document).ready(function () {

            $("#account_button").click(function() {
                $(this).find(".glyphicon").toggleClass("glyphicon-chevron-down").toggleClass("glyphicon-chevron-up");
                $(".account-dropdown").toggleClass("show");
            });

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
                    series[0].data = result.reverse().slice(0, 12).reverse();
                    // update (redraw) the chart
                    $('#histgraph_container').jqChart('update');
                } else if ($(this).text().indexOf("24") > -1) {
                    var series = $('#histgraph_container').jqChart('option', 'series');
                    series[0].data = result2.reverse().slice(0, 24).reverse();
                    $('#histgraph_container').jqChart('update');
                } else {
                    var series = $('#histgraph_container').jqChart('option', 'series');
                    series[0].data = result3;
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
                        data: result.reverse().slice(0, 12).reverse()
                    }
                ],
			axes: [
                         {
                             type: 'linear',
                             location: 'left',
                             minimum: 0,
                             maximum: max
                         }
                      ]
            });

        });
    </script>