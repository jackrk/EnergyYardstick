<?php

class controller_rating {

    function get($datastring) {
		$data = explode("--",$datastring);
        $house_id = $data[0];
        $user_id = $data[1];
		
		$ajax = ajax();
        $user = "theciuc0_jdev";
        $pass = "tqHzLt6N]h8X";
        $dbh = new PDO('mysql:host=69.195.124.206;dbname=theciuc0_1', $user, $pass);
		
		$stmt = $dbh->prepare("SELECT AVG(energy_usage) from EnergyUsage WHERE house_id = (:house_id) and (customer_id) = (:username) ORDER BY bill_date DESC LIMIT 12");
		$stmt->bindParam(':house_id', $house_id);
		$stmt->bindParam(':username', $user_id);
		$stmt->execute();
		
		$usage = $stmt->fetch();
		
		//Hardcoded till I figure out the SQL. 
		$avg_usage = 500;
		$max = 2000;
		$people = 2;
		
		//constants.
		$ppl_per_house = 2.26;
		$plug_load = 0.2;
		$min = 0;
		
		$usage = ($ppl_per_house/$people)*$plug_load*$usage + ( 1 - $plug_load)*$usage;
		
		$rating = -1;
		if($usage > $avg_usage){
			$interval = ($max - $avg_usage) / 5.0;
			$rating = 5 - floor(($usage - $avg_usage) / $interval);
		} else {
			$interval = ($avg_usage - $min) / 5.0;
			$rating = 10 - floor($usage / $interval);
		}
		return $rating;
		
    }

}

?>