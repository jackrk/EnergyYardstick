
<?php
session_start();
require_once "../ajax.php";

$ajax = ajax();

$user = "theciuc0_jdev";
$pass = "tqHzLt6N]h8X";

    try {
        $dbh = new PDO('mysql:host=69.195.124.206;dbname=theciuc0_1', $user, $pass);
        $username = $_SESSION['username'];
		$house_id = $_SESSION['house_id'];
        /*if ($username == "bilal") {
            $username = 0;
        }*/
        $stmt = $dbh->prepare("SELECT * from House WHERE (id) = (:id)");
        $stmt->bindParam(':id', $house_id );
        $stmt->execute();
        $house = $stmt->fetch();
        $this_size = $house["size"];
        $this_area = $house["neighborhood"];
        $this_age = $house["year_built"];
        $this_style = $house["house_style"];
        if ($this_area == null) {
            $this_area = 0;
        }
        if ($this_style == null) {
            $this_style = 0;
        }
        //$ajax->call("../ajax.php?controller=compare&function=compareAll&this_age=1965&this_size=1524");
        $ajax->call("../ajax.php?compare/compare_all/$this_size--$this_age--$this_area--$this_style");
        //$house_id = $house[0];
        //if (isset($_SESSION['usage'])) {
    	//   $usage = $_SESSION['usage'];
		//} else {
			$stmt = $dbh->prepare("SELECT AVG(energy_usage) from EnergyUsage WHERE (house_id) = (:house_id) and (customer_id) = (:username) GROUP BY MONTH(bill_date)");
	        $stmt->bindParam(':house_id', $house_id);
            $stmt->bindParam(':username', $username);
	        $stmt->execute();
	        $usage = array();
	
	        while($row = $stmt->fetch()) {
	            $usage[] = $row;
	        }
	        $_SESSION['usage']=$usage;
		//}
        
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


//$ajax->call("../ajax.php?controller=compare&function=size&size=$this_size");

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
    <?php echo $ajax->init(); ?>

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
    
            <div id="loadcover" class="show_load"><img class="load_gif" src="../css/images/loading_spin.gif"/></div>
        <div id="compgraph_container">

        </div>
        <div id="compare_selector">
            <div id="reset_similar_button" class="compare_button selected">Compare to <span class="color_text">similar</span> homes</div>
            <div id="compare_buttons">
                <div id="compare_size" class="compare_button">
                    Compare by&nbsp;<span class="color_text">size</span><label class="comp_desc">your size: <span id="yoursize">unknown</span></label></div><div id="compare_style" class="compare_button">
                    Compare by&nbsp;<span class="color_text">style</span><label class="comp_desc">your style: <span id="yourstyle">unknown</span></div><div id="compare_age" class="compare_button compare_button_bottom">
                    Compare by&nbsp;<span class="color_text">age</span><label class="comp_desc">your age: <span id="yourage">unknown</span></label></div><div id="compare_area" class="compare_button compare_button_bottom">
                    Compare in your&nbsp;<span class="color_text">neighborhood</span><label class="comp_desc">your neighborhood: <span id="yourarea">unknown</span></label></div>
            </div>
        </div>
    </div>
    <div style="display: none" id="sizevals" class="month"></div>
    <div style="display: none" id="agevals" class="month"></div>
    <div style="display: none" id="areavals" class="month"></div>
    <div style="display: none" id="stylevals" class="month"></div>
    <div style="display: none" id="allvals" class="month"></div>
</div>
<script src="../javascript/jquery-1.11.0.min.js"></script>
<script src="../javascript/jquery-ui-1.10.4.min.js"></script>
<script src="../javascript/jquery.mousewheel.js" type="text/javascript"></script>
<script src="../javascript/jquery.jqChart.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../javascript/compare_selector.js"></script>

<script lang="javascript" type="text/javascript">

    $.holdReady(true);

    function callReady() {
        $.holdReady(false);
    }


    $(document).ready(function () {



        var month = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
        var allData;
        var sizeData;
        var ageData;
        var areaData;
        var styleData;

        allData = $('#allvals').html();
        sizeData = $('#sizevals').html();
        ageData= $('#agevals').html();
        areaData= $('#areavals').html();
        styleData= $('#stylevals').html();
        allData = allData.split("-").splice(0,12);
        sizeData = sizeData.split("-").splice(0,12);
        ageData= ageData.split("-").splice(0,12);
        areaData= areaData.split("-").splice(0,12);
        styleData= styleData.split("-").splice(0,12);

        for (var i=0;i<12;i++) {
            allData[i] = [month[i], allData[i]];
            sizeData[i] = [month[i], sizeData[i]];
            areaData[i] = [month[i], areaData[i]];
            ageData[i] = [month[i], ageData[i]];
            styleData[i] = [month[i], styleData[i]];
        }

        $('#compgraph_container').jqChart({
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
            }, series: [
                {
                    type: 'column',
                    title: 'City Average',
                    fillStyle: '#418CF0',
                    data: allData
                },
                {
                    type: 'line',
                    title: 'Your Average Usage',
                    fillStyle: '#FCB441',
                    <?php
                echo <<<EOHTML
                data: [['Jan', {$usage[0]['AVG(energy_usage)']}],
                    ['Feb', {$usage[1]['AVG(energy_usage)']}], ['Mar', {$usage[2]['AVG(energy_usage)']}],
                    ['Apr', {$usage[3]['AVG(energy_usage)']}], ['May', {$usage[4]['AVG(energy_usage)']}],
                    ['Jun', {$usage[5]['AVG(energy_usage)']}], ['Jul', {$usage[6]['AVG(energy_usage)']}],
                    ['Aug', {$usage[7]['AVG(energy_usage)']}], ['Sep', {$usage[8]['AVG(energy_usage)']}],
                    ['Oct', {$usage[9]['AVG(energy_usage)']}], ['Nov', {$usage[10]['AVG(energy_usage)']}],
                    ['Dec', {$usage[11]['AVG(energy_usage)']}]]
EOHTML;
                ?>
                }
            ]
        });

        $('#compare_selector').on('click', '.compare_button', function() {
            if ($(this).hasClass("selected")) {
                return false;
            }
            $('.compare_button').each(function() {
                $(this).removeClass("selected");
            });
            $(this).addClass("selected");
            if ($(this).html().indexOf("similar") > -1) {
                // get current series
                // get the data from the first series
                $('#compgraph_container').jqChart('option', 'series')[0].data = allData
                // update (redraw) the chart
                $('#compgraph_container').jqChart('update');
            } else if ($(this).html().indexOf("size") > -1) {
                $('#compgraph_container').jqChart('option', 'series')[0].data = sizeData;
                $('#compgraph_container').jqChart('update');
            } else if ($(this).html().indexOf("age") > -1) {
                $('#compgraph_container').jqChart('option', 'series')[0].data = ageData;
                $('#compgraph_container').jqChart('update');
            } else if ($(this).html().indexOf("style") > -1) {
                $('#compgraph_container').jqChart('option', 'series')[0].data = styleData;
                $('#compgraph_container').jqChart('update');
            } else {
                $('#compgraph_container').jqChart('option', 'series')[0].data = areaData;
                $('#compgraph_container').jqChart('update');
            }
            return false;
        });

        $("#loadcover").addClass("hide_load");

        $("#reset_similar_button").click();
    });
</script>
</body>