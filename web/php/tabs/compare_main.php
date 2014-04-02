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
<div id="compare_container">
	COMPARISONS
</div>
<?php 
//echo $rating 
?>
