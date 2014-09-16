<?php


$user = "theciuc0_jdev";
$pass = "tqHzLt6N]h8X";


try {
    $dbh = new PDO('mysql:host=69.195.124.206;dbname=theciuc0_1', $user, $pass);

    $customer_id = 695;
    $stmt = $dbh->prepare("SELECT * FROM House WHERE (city_customer_id) = (:customer_id)");
    $stmt->bindParam(':customer_id', $customer_id );
    $stmt->execute();
    $house = $stmt->fetch();
    $year_built = $house["year_built"];
	echo $year_built . "<br/>";
	$averages = [];
	if($year_built == null){
		$averages = getMonthlyAverages(0, 3000);
	}
	else {
		$range = $year_built / 20;
		if($range < 97){
			$averages = getMonthlyAverages(0, 1940);
		} else if($range == 97){
			$averages = getMonthlyAverages(1940, 1960);
		} else if($range == 98) {
			$averages = getMonthlyAverages(1960, 1980);
		} else if($range == 99){
			$averages = getMonthlyAverages(1980, 2000);
		} else {
			$averages = getMonthlyAverages(2000, 3000);
		}
	}
	foreach($averages as $avg){
		echo $avg[1] . "<br/>";
	}
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}


function getMonthlyAverages($lowerbound, $upperbound) {
    try {
        global $user;
        global $pass;
        $dbh = new PDO('mysql:host=69.195.124.206;dbname=theciuc0_1', $user, $pass);

		$stmt = $dbh->prepare("SELECT bill_date, AVG(energy_usage) from EnergyUsage WHERE house_id IN (SELECT id FROM House WHERE year_built BETWEEN ? AND ?) GROUP BY bill_date");
        $stmt->execute(array($lowerbound, $upperbound));
		$avgs = array();
		while($row = $stmt->fetch()) {
			$avgs[] = $row;
		}
        return $avgs;
		
    } catch (PDOException $e)  {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}