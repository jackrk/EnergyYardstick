<?php

class controller_rating {

    function get($user_id, $house_id) {
		
		$ajax = ajax();
        $user = "theciuc0_jdev";
        $pass = "tqHzLt6N]h8X";
        $dbh = new PDO('mysql:host=localhost;dbname=theciuc0_1', $user, $pass);

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

        // Temporary UI hook up. once the rating part works then move the second and third lines to the end
        $rating = 56;
        $ajax->insert('hidden_rating_number', $rating, true);
        $ajax->call("../ajax.php?tips/get/$user_id/$house_id");

        // For some reason I think this line is causing an error... Not sure though. When I had the two UI lines at the end it wouldn't work.
		$usage = ($ppl_per_house/$people)*$plug_load*$usage + ( 1 - $plug_load)*$usage;


        // Rating should be on 1 - 100 scale here because it is converted in the UI
        // Tips have values that are based on 1 - 100 scale so they can be integers less than 10
		$rating = -1;
		if($usage > $avg_usage){
			$interval = ($max - $avg_usage) / 5.0;
			$rating = 5 - floor(($usage - $avg_usage) / $interval);
		} else {
			$interval = ($avg_usage - $min) / 5.0;
			$rating = 10 - floor($usage / $interval);
		}


    }

}

