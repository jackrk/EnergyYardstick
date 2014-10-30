<?php

class controller_house {

    function get($username) {
        $ajax = ajax();

        $user = "theciuc0_jdev";
        $pass = "tqHzLt6N]h8X";

        try {
            $dbh = new PDO('mysql:host=69.195.124.206;dbname=theciuc0_1', $user, $pass);

            $stmt = $dbh->prepare("SELECT uh.house_id, h.address, uh.questions from User u, House h, User_House uh WHERE (u.username) = (:customer_id) and uh.username = u.username and uh.house_id = h.id order by substring(h.address, locate(' ', h.address)), substring_index(h.address, ' ', 1)");
            $stmt->bindParam(':customer_id', $username );
            $stmt->execute();
            if($stmt->rowCount() == 1){
                $row = $stmt->fetch();
                $_SESSION['house_id'] = $row['id'];
                if ($row['questions'] == 1) {
                    return $ajax->location("rating_main.php");
                } else {
                    header("Location: /php/questions.php");
                    die();
                }
            }
            $houses = $stmt->fetchAll();
            $listelements = "<ul id=\"house_list\" class=\"house-list\" >";
            foreach ($houses as $house) {

                $listelements = $listelements."<li class=\"house\">
                        <span class=\"house-id\">$house[0]</span><span class=\"house-address\">$house[1]</span><span class=\"house-questions\">$house[2]</span></li>";

                //$ajax->insert('#tips', "<li class=\"tip tip-unselected\">
                //<span class=\"check_container\"><img src=\"../img/checkmark.png\" /></span><span class=\"tip_text\">$text</span><span class=\"tip-point-val\">$tip[2]</span></li>", true);
            }
            $listelements = $listelements."</ul>";
            $ajax->replace('#house_list',$listelements);

            //echo $house["address"];
            //echo $stmt->rowCount();

            $dbh = null;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function pick($form_fields) {
        $ajax = ajax();

        $host = "69.195.124.206";
        $user = "theciuc0_jdev";
        $pass = "tqHzLt6N]h8X";
        $db_name = "theciuc0_1";
        $tbl_name = "User_Questions";

        if (!$form_fields[selectedhouse]) {
            return $ajax->info = 'No address selected';
        }
        $house_id = $form_fields[selectedhouse];
        $questions = $form_fields[questions];
        $_SESSION['house_id'] = $house_id;

        if ($questions[0] == 1) {
            return $ajax->location("/php/rating_main.php");
        } else {
            return $ajax->location("/php/questions.php");
        }
	}
}