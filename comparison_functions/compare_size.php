<?php


$user = "theciuc0_jdev";
$pass = "tqHzLt6N]h8X";

$month = $_GET['m'];

$size_zero = 0;
$size_fivehundred = 500;
$size_fivehundredone = 501;
$size_thousand = 1000;
$size_thousandone = 1001;
$size_thousandfivehundred = 1500;
$size_thousandfivehundredone = 1501;
$size_twothousand = 2000;
$size_twothousandone = 2001;
$size_twothousandfivehundred = 2050;
$size_twothousandfivehundredone = 2051;
$size_threethousand = 3000;
$size_threethousandone = 3001;
$size_max = 99999999;

try {

    $dbh = new PDO('mysql:host=69.195.124.206;dbname=theciuc0_1', $user, $pass);

    $customer_id = 49506;
    $stmt = $dbh->prepare("SELECT * FROM House WHERE (city_customer_id) = (:customer_id)");
    $stmt->bindParam(':customer_id', $customer_id );
    $stmt->execute();
    $house = $stmt->fetch();
    $this_size = $house["size"];

/*    $stmt = $dbh->prepare("SELECT id FROM House WHERE size BETWEEN :lowerbound AND :upperbound");
    $lowerBound = getLowerBound($this_size);
    $upperBound = getUpperBound($this_size);
    $stmt->bindParam(':lowerbound', $lowerBound);
    $stmt->bindParam(':upperbound', $upperBound);
    $stmt->execute();
    $dbmatches = $stmt->fetchAll();
    $matches = array_map('current', $dbmatches);*/

    switch ($month) {
        case "jan":
            $val = getMonthAverage(1, $this_size);
            echo $val[0];
            break;
        case "feb":
            $val = getMonthAverage(2, $this_size);
            echo $val[0];
            break;
        case "mar":
            $val = getMonthAverage(3, $this_size);
            echo $val[0];
            break;
        case "apr":
            $val = getMonthAverage(4, $this_size);
            echo $val[0];
            break;
        case "may":
            $val = getMonthAverage(5, $this_size);
            echo $val[0];
            break;
        case "jun":
            $val = getMonthAverage(6, $this_size);
            echo $val[0];
            break;
        case "jul":
            $val = getMonthAverage(7, $this_size);
            echo $val[0];
            break;
        case "aug":
            $val = getMonthAverage(8, $this_size);
            echo $val[0];
            break;
        case "sep":
            $val = getMonthAverage(9, $this_size);
            echo $val[0];
            break;
        case "oct":
            $val = getMonthAverage(10, $this_size);
            echo $val[0];
            break;
        case "nov":
            $val = getMonthAverage(11, $this_size);
            echo $val[0];
            break;
        case "dec":
            $val = getMonthAverage(12, $this_size);
            echo $val[0];
            break;
    }

    /*$jan = getMonthAverage(1, $this_size);
    echo $jan[0];
    echo "-";
    $feb = getMonthAverage(2, $this_size);
    echo $feb[0];
    echo "-";
    $mar = getMonthAverage(3, $this_size);
    echo $mar[0];
    echo "-";
    $apr = getMonthAverage(4, $this_size);
    echo $apr[0];
    echo "-";
    $may = getMonthAverage(5, $this_size);
    echo $may[0];
    echo "-";
    $jun = getMonthAverage(6, $this_size);
    echo $jun[0];
    echo "-";
    $jul = getMonthAverage(7, $this_size);
    echo $jul[0];
    echo "-";
    $aug = getMonthAverage(8, $this_size);
    echo $aug[0];
    echo "-";
    $sep = getMonthAverage(9, $this_size);
    echo $sep[0];
    echo "-";
    $oct = getMonthAverage(10, $this_size);
    echo $oct[0];
    echo "-";
    $nov = getMonthAverage(11, $this_size);
    echo $nov[0];
    echo "-";
    $dec = getMonthAverage(12, $this_size);
    echo $dec[0];*/

    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

function getLowerBound($size) {
    global $size_zero;
    global $size_fivehundred;
    global $size_fivehundredone;
    global $size_thousand;
    global $size_thousandone;
    global $size_thousandfivehundred;
    global $size_thousandfivehundredone;
    global $size_twothousand;
    global $size_twothousandone;
    global $size_twothousandfivehundred;
    global $size_twothousandfivehundredone;
    global $size_threethousand;
    global $size_threethousandone;

    if ($size <= $size_fivehundred) {
        return $size_zero;
    } else if ($size <= $size_thousand) {
        return $size_fivehundredone;
    } else if ($size <= $size_thousandfivehundred) {
        return $size_thousandone;
    } else if ($size <= $size_twothousand) {
        return $size_thousandfivehundredone;
    } else if ($size <= $size_twothousandfivehundred) {
        return $size_twothousandone;
    } else if ($size <= $size_threethousand) {
        return $size_twothousandfivehundredone;
    } else {
        return $size_threethousandone;
    }
}

function getUpperBound($size) {
    global $size_fivehundred;
    global $size_thousand;
    global $size_thousandfivehundred;
    global $size_twothousand;
    global $size_twothousandfivehundred;
    global $size_threethousand;
    global $size_max;

    if ($size <= $size_fivehundred) {
        return $size_fivehundred;
    } else if ($size <= $size_thousand) {
        return $size_thousand;
    } else if ($size <= $size_thousandfivehundred) {
        return $size_thousandfivehundred;
    } else if ($size <= $size_twothousand) {
        return $size_twothousand;
    } else if ($size <= $size_twothousandfivehundred) {
        return $size_twothousandfivehundred;
    } else if ($size <= $size_threethousand) {
        return $size_threethousand;
    } else {
        return $size_max;
    }
}

function getMonthAverage($month, $this_size) {
    try {
        global $user;
        global $pass;
        $dbh = new PDO('mysql:host=69.195.124.206;dbname=theciuc0_1', $user, $pass);

        $stmt = $dbh->prepare("SELECT AVG(energy_usage) from EnergyUsage JOIN House ON (House.id = EnergyUsage.house_id) WHERE MONTH(bill_date) = :bill_date AND House.size BETWEEN :lowerbound AND :upperbound");
        $stmt->bindParam(':bill_date', $month);
        $lowerBound = getLowerBound($this_size);
        $upperBound = getUpperBound($this_size);
        $stmt->bindParam(':lowerbound', $lowerBound);
        $stmt->bindParam(':upperbound', $upperBound);
        $stmt->execute();
        $avg = $stmt->fetch();
        return $avg;
    } catch (PDOException $e)  {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}