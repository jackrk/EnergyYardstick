<?php
/**
 * Created by PhpStorm.
 * User: Jack
 * Date: 10/22/14
 * Time: 3:02 PM
 */

if ( !function_exists('sem_get') ) {
    function sem_get($key) { return fopen(__FILE__.'.sem.'.$key, 'w+'); }
    function sem_acquire($sem_id) { return flock($sem_id, LOCK_EX); }
    function sem_release($sem_id) { return flock($sem_id, LOCK_UN); }
}

class controller_tips {
    function pull_db($sem) {
        try {
            sem_acquire($sem);
            $ajax = ajax();
            $username = $_SESSION['username'];
            $house_id = $_SESSION['house_id'];
            $user = "theciuc0_jdev";
            $pass = "tqHzLt6N]h8X";
            $dbh = new PDO('mysql:host=69.195.124.206;dbname=theciuc0_1', $user, $pass);
            $stmt = $dbh->prepare("select * from Initial_Questions where username = ? and house_id = ?");

            $stmt->bindParam(1, $username);
            $stmt->bindParam(2, $house_id);
            $stmt->execute();
            $answers = $stmt->fetch();
            $heating = $answers['heating'];
            $space_heaters = $answers['space_heaters'];
            $cooling = $answers['cooling_system'];
            $bulb_type = $answers['bulb_type'];
            $prog_thermostat = $answers['prog_thermostat'];
            $water_heater = $answers['water_heater'];
            $fireplace = $answers['fireplace'];
            $lights_off = $answers['lights_off'];
            $hidden_tips = array();
            if ($heating == "Gas") {
                array_push($hidden_tips, 3, 16, 18, 19);
            }
            if (!$space_heaters) {
                array_push($hidden_tips, 17, 21);
            }
            if (!$cooling) {
                array_push($hidden_tips, 4, 9);
            }
            if ($bulb_type != "Incandescent") {
                array_push($hidden_tips, 8);
            }
            if ($prog_thermostat) {
                array_push($hidden_tips, 10);
            }
            if ($water_heater == "Gas") {
                array_push($hidden_tips, 15, 20);
            }
            if (!$fireplace) {
                array_push($hidden_tips, 16);
            }
            if ($lights_off == "100%") {
                array_push($hidden_tips, 7);
            }

            $stmt = $dbh->prepare("select * from Tips where id not in (select tip_id from User_Tips where username = ? and house_id = ?) order by cost");
            $stmt->bindParam(1, $username);
            $stmt->bindParam(2, $house_id);
            $stmt->execute();
            $tips = $stmt->fetchAll();
            $listelements = "<div id=\"tips_inner\" >";
            foreach ($tips as $tip) {
                if (!in_array($tip[0], $hidden_tips)) {
                    $cost = "";
                    if ($tip[3] == 0) {
                        $cost = "FREE";
                    } else if ($tip[3] == 1) {
                        $cost = "< $100";
                    } else {
                        $cost = "> $1000";
                    }
                    $listelements = $listelements."<li class=\"tip tip-unselected\">
                        <span class=\"tip-id\">$tip[0]</span><span class=\"check_container glyphicon glyphicon-ok\"></span><span style=\"top: 2px\" class=\"check_container glyphicon glyphicon-remove\"></span><span class=\"tip-text\">$tip[1]</span><span class=\"tip-point-val\">$tip[2]</span><span class=\"tip-cost\">$cost</span></li>";

                    //$ajax->insert('#tips', "<li class=\"tip tip-unselected\">
                    //<span class=\"check_container\"><img src=\"../img/checkmark.png\" /></span><span class=\"tip_text\">$text</span><span class=\"tip-point-val\">$tip[2]</span></li>", true);

                }
            }
            $listelements = $listelements."</div>";
            $ajax->replace('#tips_inner',$listelements);

            // Get saved tips now
            $stmt = $dbh->prepare("select ut.id, t.tip_text, t.point_value, t.cost from Tips t, User_Tips ut where ut.username = ? and ut.house_id = ? and t.id = ut.tip_id order by cost");
            $stmt->bindParam(1, $username);
            $stmt->bindParam(2, $house_id);
            $stmt->execute();
            $tips = $stmt->fetchAll();
            $listelements = "<div id=\"saved_tips_inner\" style=\"display: none\">";
            foreach ($tips as $tip) {
                $cost = "";
                if ($tip[3] == 0) {
                    $cost = "FREE";
                } else if ($tip[3] == 1) {
                    $cost = "< $100";
                } else {
                    $cost = "> $1000";
                }
                $listelements = $listelements."<li class=\"tip tip-saved\">
                        <span class=\"check_container glyphicon glyphicon-ok\"></span><span style=\"top: 2px\" class=\"check_container glyphicon glyphicon-remove\"></span><span class=\"tip-text\">$tip[1]</span><span class=\"tip-cost\">$cost</span><span class=\"tip-point-val\">$tip[2]</span><span class=\"ut-id\">$tip[0]</span></li>";

                //$ajax->insert('#tips', "<li class=\"tip tip-unselected\">
                //<span class=\"check_container\"><img src=\"../img/checkmark.png\" /></span><span class=\"tip_text\">$text</span><span class=\"tip-point-val\">$tip[2]</span></li>", true);
            }
            $listelements = $listelements."</div>";
            $ajax->replace('#saved_tips_inner',$listelements);
            $ajax->updateRating();
            sem_release($sem);

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            sem_release($sem);
            die();
        }
    }

    function get() {
        $sem_get = sem_get(111);
        $ajax = ajax();
        $ajax->call("../ajax.php?tips/pull_db/$sem_get");
        sem_acquire($sem_get);
        $ajax->replace('#save-tips-loading', "<span id=\"save-tips\" class=\"glyphicon glyphicon-floppy-disk save-tips-button\"></span>");
        $ajax->click("save-tips",$ajax->call("../ajax.php?tips/save"));
    }


    function save() {
        $sem_save = sem_get(222);
        $ajax = ajax();
        sem_acquire($sem_save);
        $ajax->replace('#save-tips', "<span id=\"save-tips-loading\" class=\"save-tips-loading\"></span>");
        $ajax->grabSelections();
        $ajax->grabDeletions();
        sem_release($sem_save);
        $ajax->call("../ajax.php?tips/update_db/|savedtips|/|deletedtips|/$sem_save");
    }

    function update_db($datastring_save, $datastring_delete, $sem) {
        try {
            $ajax = ajax();
            $username = $_SESSION['username'];
            $house_id = $_SESSION['house_id'];
            $savedtips = explode("--",$datastring_save);
            $deletedtips = explode("--", $datastring_delete);
            $user = "theciuc0_jdev";
            $pass = "tqHzLt6N]h8X";
            $dbh = new PDO('mysql:host=69.195.124.206;dbname=theciuc0_1', $user, $pass);

            $stmt = $dbh->prepare("INSERT INTO User_Tips (username, house_id, tip_id) VALUES (?, ?, ?)");
            $stmt->bindParam(1, $username);
            $stmt->bindParam(2, $house_id);
            $stmt->bindParam(3, $tipid);
            foreach ($savedtips as $savedtip) {
                if (strlen($savedtip) > 0) {
                    $tipid = $savedtip;
                    $stmt->execute();
                }
            }

            $stmt = $dbh->prepare("DELETE FROM User_Tips WHERE id IN (?)");
            $stmt->bindParam(1, implode(',',$deletedtips));
            $stmt->execute();

            sem_acquire($sem);
            $ajax->call("../ajax.php?tips/pull_db/$sem");
            sem_acquire($sem);
            $ajax->replace('#save-tips-loading', "<span id=\"save-tips-done\" class=\"glyphicon glyphicon-floppy-saved save-tips-button save-tips-done\"></span>");
            $ajax->wait(2);
            $ajax->replace('#save-tips-done', "<span id=\"save-tips\" class=\"glyphicon glyphicon-floppy-disk save-tips-button\"></span>");
            $ajax->click("save-tips",$ajax->call("../ajax.php?tips/save"));
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

} 