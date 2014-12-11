<?php
/**
 * Created by PhpStorm.
 * User: Jack
 * Date: 9/10/14
 * Time: 3:10 PM
 */

class controller_compare {

    function compare_size($size) {

    }

    function compare_age($age) {

    }

    function compare_style($style) {

    }

    function compare_area($area) {

    }


    function compare_all($datastring) {
        $data = explode("--",$datastring);
        $this_size = $data[0];
        $this_age = $data[1];
        $this_area = $data[2];
        $this_style = $data[3];
        try {
            $ajax = ajax();
            $user = "theciuc0_jdev";
            $pass = "tqHzLt6N]h8X";
            $dbh = new PDO('mysql:host=69.195.124.206;dbname=theciuc0_1', $user, $pass);
            $stmt = $dbh->prepare("SELECT MONTH(bill_date), AVG(energy_usage) from EnergyUsage WHERE house_id IN (SELECT house_id FROM House WHERE size BETWEEN ? AND ?) AND energy_usage != 0 GROUP BY MONTH(bill_date)");
            $lowerSizeBound = floor($this_size / 500) * 500 + 1;
            $upperSizeBound = ceil($this_size / 500) * 500;
            if ($this_size == 0) {
                $lowerSizeBound = 0;
                $upperSizeBound = 5000;
            } else {
                $ajax->replace("#yoursize", $this_size);
            }
            if ($this_size > 3000) {
                $lowerSizeBound = 3000;
                $upperSizeBound = 10000;
            }
            $size_avgs = [];
            //$ajax->insert('#apr', "$lowerBound-$upperBound", true);
            $stmt->execute(array($lowerSizeBound, $upperSizeBound));
            while($row = $stmt->fetch()) {
                $size_avgs[] = $row;
            }
            foreach($size_avgs as $avg){
                $ajax->insert('#sizevals', round($avg[1])."-", true);
            }
            $age_avgs = [];
            $stmt = $dbh->prepare("SELECT MONTH(bill_date), AVG(energy_usage) from EnergyUsage WHERE house_id IN (SELECT house_id FROM House WHERE year_built BETWEEN ? AND ?) AND energy_usage != 0 GROUP BY MONTH(bill_date)");
            if($this_age == 0){
                $lowerAgeBound = 0;
                $upperAgeBound = 3000;
                $stmt->execute(array(0, 3000));
            }
            else {
                $ajax->replace("#yourage", $this_age);
                $range = floor($this_age / 20);
                if($range < 97){
               	 	$lowerAgeBound = 0;
                	$upperAgeBound = 1940;
                    $stmt->execute(array(0, 1940));
                } else if($range == 97){
                	$lowerAgeBound = 1941;
                	$upperAgeBound = 1960;
                	    $stmt->execute(array(1941, 1960));
                } else if($range == 98) {
                	$lowerAgeBound = 1961;
                	$upperAgeBound = 1980;
                    $stmt->execute(array(1961, 1980));
                } else if($range == 99){
                	$lowerAgeBound = 1981;
                	$upperAgeBound = 2000;
                    $stmt->execute(array(1981, 2000));
                } else {
                	$lowerAgeBound = 2001;
                	$upperAgeBound = 3000;
                    $stmt->execute(array(2001, 3000));
                }
            }
            while($row = $stmt->fetch()) {
                $age_avgs[] = $row;
            }
            foreach($age_avgs as $avg){
                $ajax->insert('#agevals', round($avg[1])."-", true);
            }
            $area_avgs = [];
            $stmt = $dbh->prepare("SELECT MONTH(bill_date), AVG(energy_usage) from EnergyUsage WHERE house_id IN (SELECT house_id FROM House WHERE neighborhood LIKE ?) AND energy_usage != 0 GROUP BY MONTH(bill_date)");

            if ($this_area) {
                $ajax->replace("#yourarea", $this_area);
            } else {
                $this_area = "%";
            }
            $stmt->execute(array($this_area));
            while($row = $stmt->fetch()) {
                $area_avgs[] = $row;
            }
            foreach($area_avgs as $avg){
                $ajax->insert('#areavals', round($avg[1])."-", true);
            }
            $style_avgs = [];
            $stmt = $dbh->prepare("SELECT MONTH(bill_date), AVG(energy_usage) from EnergyUsage WHERE house_id IN (SELECT house_id FROM House WHERE house_style LIKE ?) AND energy_usage != 0 GROUP BY MONTH(bill_date)");
            if ($this_style) {
                $ajax->replace("#yourstyle", $this_style);
            } else {
                $this_style = "%";
            }
            $stmt->execute(array($this_style));
            while($row = $stmt->fetch()) {
                $style_avgs[] = $row;
            }
            foreach($style_avgs as $avg){
                $ajax->insert('#stylevals', round($avg[1])."-", true);
            }
            $all_avgs = [];
            $stmt = $dbh->prepare("SELECT MONTH(bill_date), AVG(energy_usage) from EnergyUsage WHERE house_id IN (SELECT house_id FROM House WHERE size BETWEEN ? AND ? AND year_built BETWEEN ? AND ? AND neighborhood LIKE ? AND house_style LIKE ?) AND energy_usage != 0 GROUP BY MONTH(bill_date)");
            $stmt->execute(array($lowerSizeBound, $upperSizeBound, $lowerAgeBound, $upperAgeBound, $this_area, $this_style));
            while($row = $stmt->fetch()) {
                $all_avgs[] = $row;
            }
            foreach($all_avgs as $avg){
                $ajax->insert('#allvals', round($avg[1])."-", true);
            }
            $dbh = null;
            $ajax->callReady();
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}