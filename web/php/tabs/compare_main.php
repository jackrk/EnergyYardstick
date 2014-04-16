<?php

function get_rating($data){
	$count = 0;
	$sum = 0;
	foreach($data as $row){
		$sum = $row['energy_usage']/$row['days_in_cycle'];
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

	//$house_id = $house[0];
	$house_id = 2346;
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
                    data: [['Jan. 2013', 600], ['Feb. 2013', 700], ['Mar. 2013', 800],
                        ['Apr. 2013', 900], ['May 2013', 1000], ['Jun. 2013', 1100], ['Jul. 2013', 1200],
                        ['Aug. 2013', 1100], ['Sep. 2013', 1000], ['Oct. 2013', 900], ['Nov. 2013', 800],
                        ['Dec. 2013', 700]]
                },
                {
                    type: 'column',
                    title: 'Your Usage',
                    fillStyle: '#FCB441',
					<?php
                    echo <<<EOHTML
					
					data: [['Jan. 2013', {$usage[0]['energy_usage']}], 
						['Feb. 2013', {$usage[1]['energy_usage']}], ['Mar. 2013', {$usage[2]['energy_usage']}],
                        ['Apr. 2013', {$usage[3]['energy_usage']}], ['May 2013', {$usage[4]['energy_usage']}], 
						['Jun. 2013', {$usage[5]['energy_usage']}], ['Jul. 2013', {$usage[6]['energy_usage']}],
                        ['Aug. 2013', {$usage[7]['energy_usage']}], ['Sep. 2013', {$usage[8]['energy_usage']}], 
						['Oct. 2013', {$usage[9]['energy_usage']}], ['Nov. 2013', {$usage[10]['energy_usage']}],
						['Dec. 2013', {$usage[11]['energy_usage']}]]
						
EOHTML;
					
					?>
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


