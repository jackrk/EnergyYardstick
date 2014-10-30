<?php
require_once "../ajax.php";
//session_start();
$ajax = ajax();


if (isset($_SESSION['username'])) {
$username = $_SESSION['username'];
    $ajax->call("../ajax.php?house/get/$username");
    $ajax->click("ajaxsubmit",$ajax->form('../ajax.php/house/pick'));
} else {
	header("Location: login.php");
}
?>
<!DOCTYPE html>
<head>
    <?php echo $ajax->init(); ?>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600' rel='stylesheet' type='text/css'>
    <link href="../css/login.css" rel="stylesheet" type="text/css">
    <link href="../css/house.css" rel="stylesheet" type="text/css">
</head>
<body style="width: 599px; height: 600px; margin: 0 auto;">
<div id="logincontainer">
    <form id="houseform" class="houseform" method="post"><div class="logintitle">Choose an address</div>
        <div class="house-list-container">
            <ul id="house_list" class="house-list"></ul>
        </div>
        <input type="text" style="display: none" id="a[selectedhouse]" name="a[selectedhouse]" class="hidden-house-input" value="" />
        <input type="text" style="display: none" id="a[questions]" name="a[questions]" class="hidden-questions-input" value="" />
        <div style="margin-top: 0 !important" class="house-submit"><div id="info"></div><input id="ajaxsubmit" name="ajaxsubmit" class="house-submit-button" type="submit" value="Submit"/></div>
    </form>
</div>

<script src="../javascript/jquery-1.11.0.min.js"></script>
<script src="../javascript/animate/jquery.transit.min.js"></script>
<script>

    $(document).ready(function() {
        $(".house-list-container").on("click", "li", function() {
            $(".house").each(function() {
               $(this).removeClass("house-selected");
            });
            $(this).addClass("house-selected");
            $("#info").html($(this).find(".house-address").text());
            $(".hidden-house-input").attr("value", $(this).find(".house-id").text());
            $(".hidden-questions-input").attr("value", $(this).find(".house-questions").text());
        });
    });
</script>
</body>
</html>
