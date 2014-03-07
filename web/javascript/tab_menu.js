$(document).ready(function() {
    if (!$.support.transition)
        $.fn.transition = $.fn.animate;
    $(".tab_link").mouseenter(function(){
        $(this).transition({backgroundColor: 'lightgreen', queue: false}, 200);
        $(this).bind('mouseout', function(){
            $(this).transition({backgroundColor: 'white', queue: false}, 150);
            $(this).unbind('mouseout');
        });
    });
    /*$(".tab_link").bind('click', function() {
        $("#tab_container").transition({opacity: 0, queue: false}, 200);
        setTimeout(function(){
            $("#tab_container").transition({opacity: 1, queue: false}, 200);
        },520);
    });*/
    $("#tab_rating").click(function(){
        $("#tab_container").load("../php/tabs/rating_main.php", function() {
            $('.rating_slider').noUiSlider({
                range: [1, 10],
                start: 5,
                handles: 1,
                step: 1,
                orientation: "horizontal"
            });
        });
    });
    $("#tab_compare").click(function(){
        $("#tab_container").load("../php/tabs/compare_main.php", function() {

        });
    });
    $("#tab_history").click(function(){
        $("#tab_container").load("../php/tabs/history_main.php", function() {

        });
    });
});