

var firstload = true;
function animateRating($rating_background, $rating_desc, offset, animateTime) {

    var $metrictext = $("#equiv_button");
    if ($("#piechart_button").hasClass("metric_selected")) $metrictext = $("#piechart_button");
    if (10-offset==0) {
        $rating_desc.html('great');
        animateRatingTo_10($rating_background, animateTime);
        $metrictext.css('color', '#33ff22');
        animateMetricNumbers(70, 20, 200);
    } else if (10-offset==1) {
        $rating_desc.html('great');
        animateRatingTo_9($rating_background, animateTime);
        $metrictext.css('color', '#83ef28');
        animateMetricNumbers(55, 15, 150);
    } else if (10-offset==2) {
        $rating_desc.html('good');
        animateRatingTo_8($rating_background, animateTime);
        $metrictext.css('color', '#a3ef28');
        animateMetricNumbers(45, 12, 120);
    } else if (10-offset==3) {
        $rating_desc.html('good');
        animateRatingTo_7($rating_background, animateTime);
        $metrictext.css('color', '#b7f358');
        animateMetricNumbers(35, 8, 90);
    } else if (10-offset==4) {
        $rating_desc.html('fair');
        animateRatingTo_6($rating_background, animateTime);
        $metrictext.css('color', '#e0ff70');
        animateMetricNumbers(30, 4, 70);
    } else if (10-offset==5) {
        $rating_desc.html('average');
        animateRatingTo_5($rating_background, animateTime);
        $metrictext.css('color', '#F0E641');
        animateMetricNumbers(25, 2, 20);
    } else if (10-offset==6) {
        $rating_desc.html('poor');
        animateRatingTo_4($rating_background, animateTime);
        $metrictext.css('color', '#ffcc11');
        animateMetricNumbers(20, 0, 0);
    } else if (10-offset==7) {
        $rating_desc.html('poor');
        animateRatingTo_3($rating_background, animateTime);
        $metrictext.css('color', '#ff9911');
        animateMetricNumbers(15, -2, -10);
    } else if (10-offset==8) {
        $rating_desc.html('bad');
        animateRatingTo_2($rating_background, animateTime);
        $metrictext.css('color', '#FF7732');
        animateMetricNumbers(10, -5, -30);
    } else if (10-offset==9) {
        $rating_desc.html('bad');
        animateRatingTo_1($rating_background, animateTime);
        $metrictext.css('color', '#ff6458');
        animateMetricNumbers(6, -10, -60);
    }

}
/*
function animateMetricNumbers(mpg, cars, trees) {
    if (!animatingNumbers)
    {
        animatingNumbers = true;
        $("#mpg_number").prop('number', parseInt($("#mpg_number").text())).animateNumber({
            number: mpg
        });
        $("#cars_number").prop('number', parseInt($("#cars_number").text())).animateNumber({
            number: cars
        });
        $("#trees_number").prop('number', parseInt($("#trees_number").text())).animateNumber({
            number: trees
        });
        animatingNumbers = false;
    }
}*/
function animateMetricNumbers(mpg, cars, trees) {
    if (firstload) {
        setTimeout(function() {
            firstload = false;
            $("#mpg_number").numerator({ duration: 1000, toValue: mpg });
            $("#cars_number").numerator({ duration: 1000, toValue: cars });
            $("#trees_number").numerator({ duration: 1000, toValue: trees });
        }, 500);
    } else {
        $("#mpg_number").numerator({ duration: 1000, toValue: mpg });
        $("#cars_number").numerator({ duration: 1000, toValue: cars });
        $("#trees_number").numerator({ duration: 1000, toValue: trees });
    }
}

function animateRatingTo_1(ele, animateTime) {
    if (!$.support.transition) {
        ele.removeClass();
        ele.addClass("rating_container_1");
    }
    else {
        ele.transition({backgroundColor: '#ff6458', queue: false}, animateTime);
        ele.next().transition({backgroundColor: '#ffc1bc', queue: false}, animateTime);
    }
}

function animateRatingTo_2(ele, animateTime) {
    if (!$.support.transition) {
        ele.removeClass();
        ele.addClass("rating_container_2");
    }
    else {
        ele.transition({background: '#FF7732', queue: false}, animateTime);
        ele.next().transition({backgroundColor: '#ffc8ad', queue: false}, animateTime);
    }
}

function animateRatingTo_3(ele, animateTime) {
    if (!$.support.transition) {
        ele.removeClass();
        ele.addClass("rating_container_3");
    }
    else {
        ele.transition({background: '#ff9911', queue: false}, animateTime);
        ele.next().transition({backgroundColor: '#ffd69f', queue: false}, animateTime);
    }
}

function animateRatingTo_4(ele, animateTime) {
    if (!$.support.transition) {
        ele.removeClass();
        ele.addClass("rating_container_4");
    }
    else {
        ele.transition({background: '#ffcc11', queue: false}, animateTime);
        ele.next().transition({backgroundColor: '#ffea9f', queue: false}, animateTime);
    }
}

function animateRatingTo_5(ele, animateTime) {
    if (!$.support.transition) {
        ele.removeClass();
        ele.addClass("rating_container_5");
    }
    else {
        ele.transition({background: '#F0E641', queue: false}, animateTime);
        ele.next().transition({backgroundColor: '#f9f5b3', queue: false}, animateTime);
    }
}

function animateRatingTo_6(ele, animateTime) {
    if (!$.support.transition) {
        ele.removeClass();
        ele.addClass("rating_container_6");
    }
    else {
        ele.transition({background: '#e0ff70', queue: false}, animateTime);
        ele.next().transition({backgroundColor: '#f2ffc5', queue: false}, animateTime);
    }
}

function animateRatingTo_7(ele, animateTime) {
    if (!$.support.transition) {
        ele.removeClass();
        ele.addClass("rating_container_7");
    }
    else {
        ele.transition({background: '#b7f358', queue: false}, animateTime);
        ele.next().transition({backgroundColor: '#e2fabc', queue: false}, animateTime);
    }
}

function animateRatingTo_8(ele, animateTime) {
    if (!$.support.transition) {
        ele.removeClass();
        ele.addClass("rating_container_8");
    }
    else {
        ele.transition({background: '#a3ef28', queue: false}, animateTime);
        ele.next().transition({backgroundColor: '#daf8a9', queue: false}, animateTime);
    }
}

function animateRatingTo_9(ele, animateTime) {
    if (!$.support.transition) {
        ele.removeClass();
        ele.addClass("rating_container_9");
    }
    else {
        ele.transition({background: '#83ef28', queue: false}, animateTime);
        ele.next().transition({backgroundColor: '#cdf8a9', queue: false}, animateTime);
    }
}

function animateRatingTo_10(ele, animateTime) {
    if (!$.support.transition) {
        ele.removeClass();
        ele.addClass("rating_container_10");
    }
    else {
        ele.transition({background: '#33ff22', queue: false}, animateTime);
        ele.next().transition({backgroundColor: '#adffa6', queue: false}, animateTime);
    }
}



