<?php
/**
 * Created by PhpStorm.
 * User: Jack
 * Date: 10/22/14
 * Time: 3:02 PM
 */

class controller_tips {
    function pull_db($username) {
        try {
            $ajax = ajax();
            $user = "theciuc0_jdev";
            $pass = "tqHzLt6N]h8X";
            $dbh = new PDO('mysql:host=69.195.124.206;dbname=theciuc0_1', $user, $pass);
            $stmt = $dbh->prepare("select * from Tips where id not in (select tip_id from User_Tips where username = ?) order by cost");
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
            $stmt = $dbh->prepare("select * from Tips where id in (select tip_id from User_Tips where username = ?) order by cost");
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
                        <span class=\"check_container\"><img src=\"../img/checkmark.png\" /></span><span class=\"tip-text\">$tip[1]</span><span class=\"tip-cost\">$cost</span><span class=\"tip-point-val\">$tip[2]</span></li>";

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

    function get($username) {
        $ajax = ajax();
        $ajax->call("../ajax.php?tips/pull_db/$username");
        $ajax->wait(1.5);
        $ajax->replace('#save-tips-loading', "<span id=\"save-tips\" class=\"glyphicon glyphicon-floppy-disk save-tips-button\"></span>");
        $ajax->click("save-tips",$ajax->call("../ajax.php?tips/save/$username"));
    }


    function save($username) {
        $ajax = ajax();
        $ajax->replace('#save-tips', "<span id=\"save-tips-loading\" class=\"save-tips-loading\"></span>");
        $ajax->grabSelections();
        $ajax->wait(.2);
        $ajax->call("../ajax.php?tips/update_db/$username/|savedtips|");
    }

    function update_db($username, $datastring) {
        try {
            $ajax = ajax();
            $savedtips = explode("--",$datastring);
            $user = "theciuc0_jdev";
            $pass = "tqHzLt6N]h8X";
            $dbh = new PDO('mysql:host=69.195.124.206;dbname=theciuc0_1', $user, $pass);
            $stmt = $dbh->prepare("INSERT INTO User_Tips (username, tip_id) VALUES (?, ?)");
            $stmt->bindParam(1, $username);
            $stmt->bindParam(2, $tipid);
            foreach ($savedtips as $savedtip) {
                if (strlen($savedtip) > 0) {
                    $tipid = $savedtip;
                    $stmt->execute();
                }
            }
            $ajax->call("../ajax.php?tips/pull_db/$username");
            $ajax->wait(1);
            $ajax->replace('#save-tips-loading', "<span id=\"save-tips-done\" class=\"glyphicon glyphicon-floppy-saved save-tips-button save-tips-done\"></span>");
            $ajax->wait(2);
            $ajax->replace('#save-tips-done', "<span id=\"save-tips\" class=\"glyphicon glyphicon-floppy-disk save-tips-button\"></span>");
            $ajax->click("save-tips",$ajax->call("../ajax.php?tips/save/bbesic/"));
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
} 