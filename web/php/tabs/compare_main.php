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
<script type="text/javascript" src="/javascript/compare_selector.js"></script>
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


