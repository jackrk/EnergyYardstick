<?php
/**
 * Created by PhpStorm.
 * User: jack_ultra
 * Date: 3/6/14
 * Time: 8:27 PM
 */

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="/css/slider/jquery.nouislider.css"/>
<script src="/javascript/jquery-1.11.0.min.js"></script>
<script src="/javascript/animate/jquery.transit.min.js"></script>
<script src="/javascript/slider/jquery.nouislider.js"></script>
<script type="text/javascript">
    $(document).ready(function()
    {
        $('.rating_slider').noUiSlider({
            range: [1, 10],
            start: 5,
            handles: 1,
            step: 1,
            orientation: "horizontal"
        });
    });
</script>
</head>
<body>
<div id="container">
    <div class="rating_slider"></div>
</div>
</body>
</html>