<?php

$user = "theciuc0_jdev";
$pass = "tqHzLt6N]h8X";

try{
    $dbh = new PDO('mysql:host=69.195.124.206;dbname=theciuc0_1', $user, $pass);

    $customer_id = 49506;
    $stmt = $dbh->prepare("SELECT * FROM House WHERE (city_customer_id) = (:customer_id)");
    $stmt->bindParam(':customer_id', $customer_id );
    $stmt->execute();
    $house = $stmt->fetch();
    $this_neighborhood = $house["neighborhood"];

    $jan = getMonthAverage(1, $this_neighborhood);
    echo $jan[0];
    echo "-";
    $feb = getMonthAverage(2, $this_neighborhood);
    echo $feb[0];
    echo "-";
    $mar = getMonthAverage(3, $this_neighborhood);
    echo $mar[0];
    echo "-";
    $apr = getMonthAverage(4, $this_neighborhood);
    echo $apr[0];
    echo "-";
    $may = getMonthAverage(5, $this_neighborhood);
    echo $may[0];
    echo "-";
    $jun = getMonthAverage(6, $this_neighborhood);
    echo $jun[0];
    echo "-";
    $jul = getMonthAverage(7, $this_neighborhood);
    echo $jul[0];
    echo "-";
    $aug = getMonthAverage(8, $this_neighborhood);
    echo $aug[0];
    echo "-";
    $sep = getMonthAverage(9, $this_neighborhood);
    echo $sep[0];
    echo "-";
    $oct = getMonthAverage(10, $this_neighborhood);
    echo $oct[0];
    echo "-";
    $nov = getMonthAverage(11, $this_neighborhood);
    echo $nov[0];
    echo "-";
    $dec = getMonthAverage(12, $this_neighborhood);
    echo $dec[0];

    $dbh = null;

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

function getMonthAverage($month, $this_neighborhood) {
    try {
        global $user;
        global $pass;
        $dbh = new PDO('mysql:host=69.195.124.206;dbname=theciuc0_1', $user, $pass);

        $stmt = $dbh->prepare("SELECT AVG(energy_usage) from EnergyUsage WHERE MONTH(bill_date) = :bill_date AND house_id IN (SELECT id FROM House WHERE neighborhood = :neighbor");
        $stmt->bindParam(':bill_date', $month);
        $stmt->bindParam(':neighbor', $this_neighborhood);
        $stmt->execute();
        $avg = $stmt->fetch();
        return $avg;

    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}