$(document).ready(function() {




    if (!$.support.transition)
        $.fn.transition = $.fn.animate;
    $(".tab_link").mouseenter(function(){
        $(this).transition({backgroundColor: 'lightgreen', queue: false}, 200);
        $(this).bind('mouseout', function(){
            $(this).transition({backgroundColor: '#f0f0f0', queue: false}, 150);
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
            var curval = parseInt($("#hidden_rating_number").html());
            $('.rating_slider').noUiSlider({
                range: [-3, 3],
                start: 0,
                handles: 1,
                step: 1,
                orientation: "horizontal",
                serialization: {
                    resolution: 1
                },
                slide: function() {
                    var offset = parseInt($("#slider").val());
                    var newval = (curval+offset);
                    $(".rating_number").html(newval);
                }
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