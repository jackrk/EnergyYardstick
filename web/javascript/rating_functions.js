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
    ele.transition({backgroundColor: '#ff6458', queue: false}, animateTime);
}

function animateRatingTo_2(ele, animateTime) {
    ele.transition({backgroundColor: '#ff9911', queue: false}, animateTime);
}

function animateRatingTo_3(ele, animateTime) {
    ele.transition({backgroundColor: '#ffcc11', queue: false}, animateTime);
}

function animateRatingTo_4(ele, animateTime) {
    ele.transition({backgroundColor: '#ffdb58', queue: false}, animateTime);
}

function animateRatingTo_5(ele, animateTime) {
    ele.transition({backgroundColor: '#ffff7f', queue: false}, animateTime);
}

function animateRatingTo_6(ele, animateTime) {
    ele.transition({backgroundColor: '#e0ff70', queue: false}, animateTime);
}

function animateRatingTo_7(ele, animateTime) {
    ele.transition({backgroundColor: '#ccff11', queue: false}, animateTime);
}

function animateRatingTo_8(ele, animateTime) {
    ele.transition({backgroundColor: '#b7f358', queue: false}, animateTime);
}

function animateRatingTo_9(ele, animateTime) {
    ele.transition({backgroundColor: '#a3ef28', queue: false}, animateTime);
}

function animateRatingTo_10(ele, animateTime) {
    ele.transition({backgroundColor: '#33ff22', queue: false}, animateTime);
}



