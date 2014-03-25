$(document).ready(function() {



    if (!$.support.transition)
        $.fn.transition = $.fn.animate;
    $(".tab_link").mouseenter(function(){
        $(this).transition({backgroundColor: 'lightgray', queue: false}, 100);
        $(this).bind('mouseout', function(){
            $(this).transition({backgroundColor: '#f0f0f0', queue: false}, 100);
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
            var hid = $("#hidden_rating_number").html();
            if (hid == "")
                $("#hidden_rating_number").html($(".rating_number").html());
            else
                $('.rating_number').html(hid);
            var curval = parseInt($("#hidden_rating_number").html());
            animateRating($("#rating_container"), $(".rating_text"), curval, 10);
            $('.rating_slider').noUiSlider({
                range: [curval, 10],
                start: curval,
                handles: 1,
                step: 1,
                orientation: "vertical",
                direction: "rtl",
                behaviour: 'extend-tap',
                serialization: {
                    resolution: 1
                },
                slide: function() {
                    var offset = parseInt($("#slider").val());
                    $(".rating_number").html(offset);
                    $("#hidden_rating_number").html(offset);
                    var $rating_background = $("#rating_container");
                    animateRating($rating_background, $(".rating_text"), offset, 200);

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