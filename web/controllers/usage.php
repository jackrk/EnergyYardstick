<?php
/**
 * Created by PhpStorm.
 * User: Jack
 * Date: 9/16/14
 * Time: 5:21 PM
 */
class controller_usage {
    function get() {
        $ajax = ajax();
        $ajax->alert('heyl');
        try {
            $user = "theciuc0_jdev";
            $pass = "tqHzLt6N]h8X";
            $dbh = new PDO('mysql:host=69.195.124.206;dbname=theciuc0_1', $user, $pass);

            $customer_id = 695;
            $stmt = $dbh->prepare("SELECT * from House WHERE (customer_id) = (:customer_id)");
            $stmt->bindParam(':customer_id', $customer_id );
            $stmt->execute();
            $house = $stmt->fetch();

            //$house_id = $house[0];
            $house_id = 2346;
            $stmt = $dbh->prepare("SELECT energy_usage from EnergyUsage WHERE (house_id) =  (:house_id)");
            $stmt->bindParam(':house_id', $house_id);
            $stmt->execute();
            $usage = array();

            while($row = $stmt->fetch()) {
                $usage[] = $row;
            }
            //$session['usage'] = $usage;
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
    }
}