$(document).ready(function() {



    if (!$.support.transition)
        $.fn.transition = $.fn.animate;
    /*$(".tab_link").mouseenter(function(){
        $(this).transition({color: 'white', backgroundColor: 'darkslategray', queue: false}, 100);
        $(this).bind('mouseleave', function(){
            $(this).transition({color: '', backgroundColor: '', queue: false}, 100);
            $(this).unbind('mouseleave');
        });
    });*/

    $("#tips_submit").mouseenter(function(){
       $(this).transition({backgroundColor: '#6AA8BF', queue: false}, 200);
        $(this).bind('mouseleave', function(){
            $(this).transition({backgroundColor: '#47707F', queue: false}, 200);
            $(this).unbind('mouseleave');
        });
    });

    /*$(".tab_link").bind('click', function() {
        $("#tab_container").transition({opacity: 0, queue: false}, 200);
        setTimeout(function(){
            $("#tab_container").transition({opacity: 1, queue: false}, 200);
        },520);
    });*/
    $("#tab_rating").click(function(){
        $("#loader").removeClass("hide_load");
        if (!$(this).hasClass('tab_active')) {
            $(this).parent().children().each(function() {
                $(this).removeClass("tab_active");
            });
            $(this).addClass("tab_active");
        }
        $("#tab_container").load("../php/tabs/rating_main.php", function() {
            var hid = $("#hidden_rating_number").html();
            if (hid == "")
                $("#hidden_rating_number").html($(".rating_number").html());
            else
                $('.rating_number').html(hid);
            var curval = parseInt($("#hidden_rating_number").html());
            animateRating($("#rating_container"), $(".rating_text"), curval, 10);
            $('.rating_slider').noUiSlider({
                range: {
                    'min': [  curval ],
                    'max': [ 10 ]
                },
                start: curval,
                step: 1,
                orientation: "horizontal",
                direction: "ltr",
                behaviour: 'extend-tap',
                serialization: {
                    resolution: 1
                }/*,
                change: function() {
                    var $ratingnumber = $(".rating_number");
                    var offset = parseInt($("#slider").val());
                    var $rating_background = $("#rating_container");
                    animateRating($rating_background, $(".rating_text"), offset, 600);
                    if (offset > parseInt($ratingnumber.html()))
                        $(".tip-unselected").first().click();
                    else if (offset < parseInt($ratingnumber.html()))
                        $(".tip-selected").last().click();
                    $ratingnumber.html(offset);
                },
                set: function() {
                   alert("set");
                }*/
            });
            /*$(".noUi-vertical .noUi-handle").bind('mouseenter', function() {
                $('.noUi-vertical').transition({boxShadow: '0 0 6px black', queue: false}, 300);
                $(this).bind('mouseleave',function(){
                    $('.noUi-vertical').transition({boxShadow: '', queue: false}, 200);
                });
                $('.noUi-vertical .noUi-handle').bind('mousedown', function(){
                    $(this).bind('mouseup', function(){

                    });
                });
            });*/
            $(".rating_slider").on("slide", function() {
                var $ratingnumber = $(".rating_number");
                var offset = parseInt($("#slider").val());
                var $rating_background = $("#rating_container");
                if (offset > parseInt($ratingnumber.html()))
                    $(".tip-unselected").first().click();
                else if (offset < parseInt($ratingnumber.html()))
                    $(".tip-selected").last().click();
                $ratingnumber.html(offset);
            });
            $(".rating_slider").on("set", function() {
                var $ratingnumber = $(".rating_number");
                var offset = parseInt($("#slider").val());
                var $rating_background = $("#rating_container");
                animateRating($rating_background, $(".rating_text"), offset, 600);
                $ratingnumber.html(offset);
            });
            $("#equiv_button").click();
            $("#loader").addClass("hide_load");
            setTimeout(function() {
                $('#equiv_button').css('color', $("#rating_container").css("background-color"));
            }, 100);
            // );
        });
    });
    $("#tab_compare").click(function(){
        $("#loader").removeClass("hide_load");
        if (!$(this).hasClass('tab_active')) {
            $(this).parent().children().each(function() {
                $(this).removeClass("tab_active");
            });
            $(this).addClass("tab_active");
        }
        $("#tab_container").load("../php/tabs/compare_main.php", function() {
            $("#loader").addClass("hide_load");
        });
    });
    $("#tab_history").click(function(){
        $("#loader").removeClass("hide_load");
        if (!$(this).hasClass('tab_active')) {
            $(this).parent().children().each(function() {
                $(this).removeClass("tab_active");
            });
            $(this).addClass("tab_active");
        }
        $("#tab_container").load("../php/tabs/history_main.php", function() {
            $("#loader").addClass("hide_load");
        });
    });
    $('#tab_rating').click();
});