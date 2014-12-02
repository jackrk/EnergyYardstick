<?php

class controller_rating {

    function get($user_id, $house_id) {
		
		$ajax = ajax();
        $user = "theciuc0_jdev";
        $pass = "tqHzLt6N]h8X";
        $dbh = new PDO('mysql:host=69.195.124.206;dbname=theciuc0_1', $user, $pass);

		$stmt = $dbh->prepare("SELECT AVG(energy_usage) from EnergyUsage WHERE house_id = (:house_id) and (customer_id) = (:username) ORDER BY bill_date DESC LIMIT 12");
		$stmt->bindParam(':house_id', $house_id);
		$stmt->bindParam(':username', $user_id);
		$stmt->execute();

		$usage = $stmt->fetch()[0];
		
		$stmt = $dbh->prepare("SELECT * from House WHERE (house_id) = (:id)");
        $stmt->bindParam(':id', $house_id );
        $stmt->execute();
        $house = $stmt->fetch();
        $this_size = $house["size"];
        $this_area = $house["neighborhood"];
        $this_age = $house["year_built"];
        $this_style = $house["house_style"];
		
		$lowerSizeBound = floor($this_size / 500) * 500 + 1;
		$upperSizeBound = ceil($this_size / 500) * 500;
		if ($this_size == 0) {
			$lowerSizeBound = 0;
			$upperSizeBound = 5000;
		} else if ($this_size > 3000) {
			$lowerSizeBound = 3000;
			$upperSizeBound = 10000;
		}
		
		if($this_age == 0){
			$lowerAgeBound = 0;
			$upperAgeBound = 3000;
		}
		else {
			$range = floor($this_age / 20);
			if($range < 97){
				$lowerAgeBound = 0;
				$upperAgeBound = 1940;
			} else if($range == 97){
				$lowerAgeBound = 1941;
				$upperAgeBound = 1960;
			} else if($range == 98) {
				$lowerAgeBound = 1961;
				$upperAgeBound = 1980;
			} else if($range == 99){
				$lowerAgeBound = 1981;
				$upperAgeBound = 2000;
			} else {
				$lowerAgeBound = 2001;
				$upperAgeBound = 3000;
			}
		}
			
		$stmt = $dbh->prepare("SELECT AVG(energy_usage) from EnergyUsage WHERE house_id IN (SELECT house_id FROM House WHERE size BETWEEN ? AND ? AND year_built BETWEEN ? AND ? ) AND energy_usage != 0");
		$stmt->execute(array($lowerSizeBound, $upperSizeBound, $lowerAgeBound, $upperAgeBound));
		$avg_usage = $stmt->fetch()[0];
		
		$stmt = $dbh->prepare("SELECT MAX(a) FROM (SELECT house_id,  AVG(energy_usage) as a  from EnergyUsage WHERE house_id IN (SELECT house_id FROM House WHERE size BETWEEN ? AND ? AND year_built BETWEEN ? AND ? ) AND energy_usage != 0 GROUP BY house_id) AS T ");
		$stmt->execute(array($lowerSizeBound, $upperSizeBound, $lowerAgeBound, $upperAgeBound));
		$max = $stmt->fetch()[0];

		$stmt = $dbh->prepare("SELECT num_people FROM Initial_Questions WHERE (house_id) = (:house_id) AND (username) = (:username);");
		$stmt->bindParam(':house_id', $house_id);
		$stmt->bindParam(':username', $user_id);
		$stmt->execute();
		$people = $stmt->fetch()[0];
		
		//constants.
		$ppl_per_house = 2.26;
		$plug_load = 0.2;
		$min = 0;

		$usage = ($ppl_per_house/$people)*$plug_load*$usage + ( 1 - $plug_load)*$usage;

        // Rating should be on 1 - 100 scale here because it is converted in the UI
        // Tips have values that are based on 1 - 100 scale so they can be integers less than 10
		$rating = -1;

		if($usage > $avg_usage){
			$rating = 50 - floor(((($usage - $avg_usage) / ($max - $avg_usage)) / 2) * 100);
		} else {
			$rating = 100 - floor((($usage / $avg_usage) / 2) * 100);
		}
		
		/* 1 - 10 rating, keeping this here for safe keeping 
		if($usage > $avg_usage){
			$interval = ($max - $avg_usage) / 5.0;
			$rating = 5 - floor(($usage - $avg_usage) / $interval);
		} else {
			$interval = ($avg_usage - $min) / 5.0;
			$rating = 10 - floor($usage / $interval);
		}
		*/
		
        $ajax->insert('hidden_rating_number', $rating, true);
        $ajax->call("../ajax.php?tips/get/$user_id/$house_id");
    }

}

