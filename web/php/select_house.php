<?php
require_once "../ajax.php";
//session_start();
$ajax = ajax();

if (isset($_SESSION['username'])) {
$username = $_SESSION['username'];
   
$user = "theciuc0_jdev";
$pass = "tqHzLt6N]h8X";

    try {
        $dbh = new PDO('mysql:host=69.195.124.206;dbname=theciuc0_1', $user, $pass);

        $stmt = $dbh->prepare("SELECT * from User u, House h, User_House uh WHERE (u.username) = (:customer_id) and uh.username = u.username and uh.house_id = h.id");
        $stmt->bindParam(':customer_id', $username );
        $stmt->execute();
		if($stmt->rowCount() == 1){
			$row = $stmt->fetch();
			$_SESSION['house_id'] = $row['house_id'];
			if ($row['questions'] == 1) {
                return $ajax->location("rating_main.php");
            } else {
                header("Location: /php/questions.php");
				die();
            }
		}
        while($house = $stmt->fetch()){
			echo $house["address"] ;
			echo "\n<br/>";
		}
		
		//echo $house["address"];
		//echo $stmt->rowCount();
		
	    $dbh = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
} else {
	header("Location: login.php");
}
?>