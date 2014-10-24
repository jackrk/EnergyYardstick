$(document).ready(function() {



    if (!$.support.transition)
        $.fn.transition = $.fn.animate;

    /*$(".rating_slider").on("slide", function() {
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
    });*/
    // );
});