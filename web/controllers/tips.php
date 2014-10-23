<?php
/**
 * Created by PhpStorm.
 * User: Jack
 * Date: 10/22/14
 * Time: 3:02 PM
 */

class controller_tips {
    function get($username) {
        try {
            $ajax = ajax();
            $user = "theciuc0_jdev";
            $pass = "tqHzLt6N]h8X";
            $dbh = new PDO('mysql:host=localhost;dbname=theciuc0_1', $user, $pass);
            $stmt = $dbh->prepare("select * from Tips where id not in (select tip_id from User_Tips where username = ?)");
            $stmt->bindParam(1, $username);
            $stmt->execute();
            $tips = $stmt->fetchAll();
            $listelements = "<div id=\"tips_inner\" >";
            foreach ($tips as $tip) {
                $cost = "";
                if ($tip[3] == 0) {
                    $cost = "FREE";
                } else {
                    $cost = "< $100";
                }
                $listelements = $listelements."<li class=\"tip tip-unselected\">
                        <span class=\"tip-id\">$tip[0]</span><span class=\"check_container\"><img src=\"../img/checkmark.png\" /></span><span class=\"tip-text\">$tip[1]</span><span class=\"tip-point-val\">$tip[2]</span><span class=\"tip-cost\">$cost</span></li>";

                //$ajax->insert('#tips', "<li class=\"tip tip-unselected\">
                        //<span class=\"check_container\"><img src=\"../img/checkmark.png\" /></span><span class=\"tip_text\">$text</span><span class=\"tip-point-val\">$tip[2]</span></li>", true);
            }
            $listelements = $listelements."</div>";
            $ajax->replace('#tips_inner',$listelements);

            // Get saved tips now
            $stmt = $dbh->prepare("select * from Tips where id in (select tip_id from User_Tips where username = ?)");
            $stmt->bindParam(1, $username);
            $stmt->execute();
            $tips = $stmt->fetchAll();
            $listelements = "<div id=\"saved_tips_inner\" style=\"display: none\">";
            foreach ($tips as $tip) {
                $cost = "";
                if ($tip[3] == 0) {
                    $cost = "FREE";
                } else {
                    $cost = "< $100";
                }
                $listelements = $listelements."<li class=\"tip tip-saved\">
                        <span class=\"check_container\"><img src=\"../img/checkmark.png\" /></span><span class=\"tip-text\">$tip[1]</span><span class=\"tip-cost\">$cost</span></li>";

                //$ajax->insert('#tips', "<li class=\"tip tip-unselected\">
                //<span class=\"check_container\"><img src=\"../img/checkmark.png\" /></span><span class=\"tip_text\">$text</span><span class=\"tip-point-val\">$tip[2]</span></li>", true);
            }
            $listelements = $listelements."</div>";
            $ajax->replace('#saved_tips_inner',$listelements);


        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function save($username) {
        $ajax = ajax();
        $ajax->grabSelections();
        $ajax->call("../ajax.php?tips/update_db/bbesic/|savedtips|");
    }

    function update_db($username, $datastring) {
        try {
            $ajax = ajax();
            $ajax->replace('#save-tips-original', "<span id=\"save-tips-loading\" class=\"save-tips-loading\"></span>");
            $savedtips = explode("--",$datastring);
            $user = "theciuc0_jdev";
            $pass = "tqHzLt6N]h8X";
            $dbh = new PDO('mysql:host=localhost;dbname=theciuc0_1', $user, $pass);
            $stmt = $dbh->prepare("INSERT INTO User_Tips (username, tip_id) VALUES (?, ?)");
            $stmt->bindParam(1, $username);
            $stmt->bindParam(2, $tipid);
            foreach ($savedtips as $savedtip) {
                if (strlen($savedtip) > 0) {
                    $tipid = $savedtip;
                    $stmt->execute();
                }
            }
            $ajax->call("../ajax.php?tips/get/bbesic");
            $ajax->wait(0.5);
            $ajax->replace('#save-tips-loading', "<span id=\"save-tips-done\" class=\"glyphicon glyphicon-floppy-saved save-tips-button save-tips-done\"></span>");
            $ajax->wait(2);
            $ajax->replace('#save-tips-done', "<span id=\"save-tips-original\" class=\"glyphicon glyphicon-floppy-disk save-tips-button\"></span>");
            $ajax->click("save-tips-original",$ajax->call("../ajax.php?tips/save/bbesic/"));
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
} 