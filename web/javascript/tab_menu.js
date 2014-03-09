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
            $("#hidden_rating_number").html($(".rating_number").html());
            var curval = parseInt($("#hidden_rating_number").html());
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
                    var $rating_background = $("#rating_container");
                    if (10-offset==0) {
                        $rating_background.transition({backgroundColor: '#81d681', queue: false}, 200);
                    } else if (10-offset==1) {
                        $rating_background.transition({backgroundColor: '#90ee90', queue: false}, 200);
                    } else if (10-offset==2) {
                        $rating_background.transition({backgroundColor: '#a6f1a6', queue: false}, 200);
                    } else if (10-offset==3) {
                        $rating_background.transition({backgroundColor: '#c7f6c7', queue: false}, 200);
                    } else if (10-offset==4) {
                        $rating_background.transition({backgroundColor: '#c7f6c7', queue: false}, 200);
                    } else if (10-offset==5) {
                        $rating_background.transition({backgroundColor: '#c7f6c7', queue: false}, 200);
                    } else if (10-offset==6) {
                        $rating_background.transition({backgroundColor: '#c7f6c7', queue: false}, 200);
                    } else if (10-offset==7) {
                        $rating_background.transition({backgroundColor: '#c7f6c7', queue: false}, 200);
                    } else if (10-offset==8) {
                        $rating_background.transition({backgroundColor: '#c7f6c7', queue: false}, 200);
                    }

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