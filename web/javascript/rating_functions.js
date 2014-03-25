function animateRating($rating_background, $rating_desc, offset, animateTime) {

    if (10-offset==0) {
        $rating_desc.html('great');
        animateRatingTo_10($rating_background, animateTime);
    } else if (10-offset==1) {
        $rating_desc.html('great');
        animateRatingTo_9($rating_background, animateTime);
    } else if (10-offset==2) {
        $rating_desc.html('good');
        animateRatingTo_8($rating_background, animateTime);
    } else if (10-offset==3) {
        $rating_desc.html('good');
        animateRatingTo_7($rating_background, animateTime);
    } else if (10-offset==4) {
        $rating_desc.html('fair');
        animateRatingTo_6($rating_background, animateTime);
    } else if (10-offset==5) {
        $rating_desc.html('average');
        animateRatingTo_5($rating_background, animateTime);
    } else if (10-offset==6) {
        $rating_desc.html('poor');
        animateRatingTo_4($rating_background, animateTime);
    } else if (10-offset==7) {
        $rating_desc.html('poor');
        animateRatingTo_3($rating_background, animateTime);
    } else if (10-offset==8) {
        $rating_desc.html('bad');
        animateRatingTo_2($rating_background, animateTime);
    } else if (10-offset==9) {
        $rating_desc.html('bad');
        animateRatingTo_1($rating_background, animateTime);
    }

}


function animateRatingTo_1(ele, animateTime) {
    if (!$.support.transition) {
        ele.removeClass();
        ele.addClass("rating_container_1");
    }
    else
        ele.transition({backgroundColor: '#ff6458', queue: false}, animateTime);
}

function animateRatingTo_2(ele, animateTime) {
    if (!$.support.transition) {
        ele.removeClass();
        ele.addClass("rating_container_2");
    }
    else
        ele.transition({background: '#ff9911', queue: false}, animateTime);
}

function animateRatingTo_3(ele, animateTime) {
    if (!$.support.transition) {
        ele.removeClass();
        ele.addClass("rating_container_3");
    }
    else
        ele.transition({background: '#ffcc11', queue: false}, animateTime);
}

function animateRatingTo_4(ele, animateTime) {
    if (!$.support.transition) {
        ele.removeClass();
        ele.addClass("rating_container_4");
    }
    else
        ele.transition({background: '#ffdb58', queue: false}, animateTime);
}

function animateRatingTo_5(ele, animateTime) {
    if (!$.support.transition) {
        ele.removeClass();
        ele.addClass("rating_container_5");
    }
    else
        ele.transition({background: '#ffff7f', queue: false}, animateTime);
}

function animateRatingTo_6(ele, animateTime) {
    if (!$.support.transition) {
        ele.removeClass();
        ele.addClass("rating_container_6");
    }
    else
        ele.transition({background: '#e0ff70', queue: false}, animateTime);
}

function animateRatingTo_7(ele, animateTime) {
    if (!$.support.transition) {
        ele.removeClass();
        ele.addClass("rating_container_7");
    }
    else
        ele.transition({background: '#b7f358', queue: false}, animateTime);
}

function animateRatingTo_8(ele, animateTime) {
    if (!$.support.transition) {
        ele.removeClass();
        ele.addClass("rating_container_8");
    }
    else
        ele.transition({background: '#a3ef28', queue: false}, animateTime);
}

function animateRatingTo_9(ele, animateTime) {
    if (!$.support.transition) {
        ele.removeClass();
        ele.addClass("rating_container_9");
    }
    else
        ele.transition({background: '#83ef28', queue: false}, animateTime);
}

function animateRatingTo_10(ele, animateTime) {
    if (!$.support.transition) {
        ele.removeClass();
        ele.addClass("rating_container_10");
    }
    else
        ele.transition({background: '#33ff22', queue: false}, animateTime);
}



