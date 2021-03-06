var firstLoad = true;

function updateRating() {

    var adjustment = 0;
    var kwhele = $("#new_kwh");
    var monthele = $("#new_month_bill");
    var yearele = $("#new_year_bill");
    $(".tip-saved, .tip-selected").each(function() {
        var value = parseInt($(this).find(".tip-point-val").html());
        adjustment += value;
    });
    var curkwh = parseFloat($("#cur_kwh").text());
    var curmonth = parseFloat($("#cur_month_bill").text());
    var curyear = parseFloat($("#cur_year_bill").text());
    curkwh = curkwh*(1-(adjustment * .01));
    curmonth = curmonth*(1-(adjustment * .01));
    curyear = curyear*(1-(adjustment * .01));
    kwhele.numerator({toValue:curkwh, duration: 2000, rounding:1 });
    monthele.numerator({toValue:curmonth, duration: 2000, rounding:2 });
    yearele.numerator({toValue:curyear, duration: 2000, rounding:2 });

    var hid = $("#hidden_rating_number").html();
    var curval = parseInt($("#hidden_rating_number").html());

    curval += adjustment;

    if (adjustment > 10) {
        curval += 15;
        $("#usage_new").css({
            color: '#198C19',
            fontWeight: 600
        });
    } else {
        $("#usage_new").css({
            color: '',
            fontWeight: ''
        });
    }

    curval = Math.round(curval/10);

    if (hid == "")
        $("#hidden_rating_number").html($(".rating_number").html());
    else
        $('.rating_number').html(curval);
    animateRating($("#rating_container"), $(".rating_text"), curval, 10);
    $.holdReady(false);
}


function animateRating($rating_background, $rating_desc, offset, animateTime) {


    if (10-offset==0) {
        $rating_desc.html('great');
        animateRatingTo_10($rating_background, animateTime);
        animateMetricNumbers(70, offset);
    } else if (10-offset==1) {
        $rating_desc.html('great');
        animateRatingTo_9($rating_background, animateTime);
        animateMetricNumbers(55, offset);
    } else if (10-offset==2) {
        $rating_desc.html('good');
        animateRatingTo_8($rating_background, animateTime);
        animateMetricNumbers(45, offset);
    } else if (10-offset==3) {
        $rating_desc.html('good');
        animateRatingTo_7($rating_background, animateTime);
        animateMetricNumbers(35, offset);
    } else if (10-offset==4) {
        $rating_desc.html('average');
        animateRatingTo_6($rating_background, animateTime);
        animateMetricNumbers(25, offset);
    } else if (10-offset==5) {
        $rating_desc.html('average');
        animateRatingTo_5($rating_background, animateTime);
        animateMetricNumbers(20, offset);
    } else if (10-offset==6) {
        $rating_desc.html('average');
        animateRatingTo_4($rating_background, animateTime);
        animateMetricNumbers(15, offset);
    } else if (10-offset==7) {
        $rating_desc.html('poor');
        animateRatingTo_3($rating_background, animateTime);
        animateMetricNumbers(10, offset);
    } else if (10-offset==8) {
        $rating_desc.html('poor');
        animateRatingTo_2($rating_background, animateTime);
        animateMetricNumbers(8, offset);
    } else if (10-offset==9) {
        $rating_desc.html('bad');
        animateRatingTo_1($rating_background, animateTime);
        animateMetricNumbers(6, offset);
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
function animateMetricNumbers(mpg, offset) {

    var cars = (offset - 5);
    var trees = (8 * offset - 40);

    if (firstLoad) {
        setTimeout(function() {
            firstLoad = false;
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



