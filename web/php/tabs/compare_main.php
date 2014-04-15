<?php

function get_rating($data){
	$count = 0;
	$sum = 0;
	foreach($data as $row){
		$sum = $row['usage']/$row['days_in_cycle'];
		$count++;
	}
	if($count > 0)
		return $sum/$count;
}
$user = "theciuc0_jdev";
$pass = "jripper1138";
try {
    $dbh = new PDO('mysql:host=69.195.124.206;dbname=theciuc0_1', $user, $pass);
	
	$customer_id = 695;
	$stmt = $dbh->prepare("SELECT * from House WHERE (customer_id) = (:customer_id)");
	$stmt->bindParam(':customer_id', $customer_id );
	$stmt->execute();
	$house = $stmt->fetch();

	$house_id = $house[0];
	$stmt = $dbh->prepare("SELECT * from EnergyUsage WHERE (house_id) =  (:house_id)");
	$stmt->bindParam(':house_id', $house_id);
	$stmt->execute();
	$usage = array();
	
	while($row = $stmt->fetch()) {
		$usage[] = $row;
    }
	$rating =  get_rating($usage);
	
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

/**
 * Created by PhpStorm.
 * User: jack_ultra
 * Date: 3/3/14
 * Time: 11:27 PM
 */

?>
<link rel="stylesheet" type="text/css" href="../../css/jquery.jqChart.css" />
<link rel="stylesheet" type="text/css" href="../../css/jquery.jqRangeSlider.css" />
<link rel="stylesheet" type="text/css" href="../../css/jquery-ui-1.10.4.css" />
<script src="../../javascript/jquery-1.11.0.min.js" type="text/javascript"></script>
<script src="../../javascript/jquery.mousewheel.js" type="text/javascript"></script>
<script src="../../javascript/jquery.jqChart.min.js" type="text/javascript"></script>
<script src="../../javascript/jquery.jqRangeSlider.min.js" type="text/javascript"></script>
<!--[if IE]><script lang="javascript" type="text/javascript" src="../../javascript/excanvas.js"></script><![endif]-->

<script lang="javascript" type="text/javascript">
    $(document).ready(function () {
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
                    data: [['Jan. 2013', 32], ['Feb. 2013', 35], ['Mar. 2013', 38],
                        ['Apr. 2013', 30], ['May 2013', 39], ['Jun. 2013', 52], ['Jul. 2013', 79],
                        ['Aug. 2013', 75], ['Sep. 2013', 48], ['Oct. 2013', 28], ['Nov. 2013', 24],
                        ['Dec. 2013', 22]]
                },
                {
                    type: 'column',
                    title: 'Your Usage',
                    fillStyle: '#FCB441',
                    data: [['Jan. 2013', 29], ['Feb. 2013', 37], ['Mar. 2013', 40],
                        ['Apr. 2013', 22], ['May 2013', 41], ['Jun. 2013', 55], ['Jul. 2013', 75],
                        ['Aug. 2013', 76], ['Sep. 2013', 42], ['Oct. 2013', 30], ['Nov. 2013', 29],
                        ['Dec. 2013', 31]]
                }
            ]
        });
    });
</script>

<script type="text/javascript" src="../../javascript/compare_selector.js"></script>
<div id="compare_container">
    <div id="compgraph_container">

    </div>
    <div id="compare_selector">
        <div id="reset_similar_button">Reset to <span class="color_text">similar</span></div>
        <div id="compare_buttons">
            <div class="compare_button compare_selected">
                Compare by&nbsp;<span class="color_text">size</span><label class="comp_desc">(sq ft)</label></div><div class="compare_button">
                Compare by&nbsp;<span class="color_text">style</span><label class="comp_desc">(ex. number of stories)</label></div><div class="compare_button compare_button_bottom">
                Compare by&nbsp;<span class="color_text">age</span></div><div class="compare_button compare_button_bottom">
                Compare in your&nbsp;<span class="color_text">neighborhood</span></div>
        </div>
    </div>
</div>
<?php 
//echo $rating 
?>


