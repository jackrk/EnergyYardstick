/**
 * Created by Jack on 3/25/14.
 */

$("#tips_submit").mouseenter(function(){
    $(this).transition({backgroundColor: '#6AA8BF', queue: false}, 200);
});

$("#tips_submit").mouseleave(function(){
    $(this).transition({backgroundColor: '#E0E5E2', queue: false}, 200);
});

$("#tips_submit").click(function() {

});
/*$(".tips").on('mouseenter', ".tip-unselected", function() {
    $(this).transition({color: 'black', queue: false}, 200);
    $(this).children().first().transition({opacity:.5, queue: false}, 200);
    $(this).bind('mousedown', function(){
        $(this).bind('mouseup', function(){
            $(this).children().first().css('opacity', '1');
            $(this).removeClass('tip-unselected');
            $(this).addClass('tip-selected');
            $(this).unbind('mouseup');
            $(this).unbind('mousedown');
            $(this).bind('mousedown', function(){
                $(this).bind('mouseup', function(){
                    $(this).removeClass('tip-selected');
                    $(this).addClass('tip-unselected');
                    $(this).unbind('mouseup');
                    $(this).unbind('mousedown');
                });
            });
        });
        $(this).bind('mouseleave', function(){
            $(this).transition({color: '', queue: false}, 200);
            $(this).children().first().transition({opacity: 1, queue: false}, 200);
        });
    });
    $(this).bind('mouseleave', function(){
        $(this).transition({color: '', queue: false}, 200);
        $(this).children().first().transition({opacity: 0, queue: false}, 200);
    });
});
$(".tips").on('mouseenter', ".tip-selected", function() {
    $(this).transition({color: '', queue: false}, 200);
    $(this).children().first().transition({opacity:.5, queue: false}, 200);
    $(this).bind('mousedown', function(){
        $(this).children().first().css('opacity', '.5');
        $(this).bind('mouseup', function(){
            $(this).children().first().css('opacity', '.5');
            $(this).removeClass('tip-selected');
            $(this).addClass('tip-unselected');
            $(this).unbind('mouseup');
            $(this).unbind('mousedown');
        });
        $(this).bind('mouseleave', function(){
            $(this).children().first().transition({opacity: 0, queue: false}, 200);
        });
    });
    $(this).bind('mouseleave', function(){
        $(this).transition({color: 'black', queue: false}, 200);
        $(this).children().first().transition({opacity: 1, queue: false}, 200);
    });
});*/
$(".tips").on('click', ".tip-unselected", function() {
    $(this).children().first().transition({opacity:1, queue: false}, 200);
    $(this).removeClass('tip-unselected');
    $(this).addClass('tip-selected');
    var n = $(".tip-selected").length;
    if (n>=0) {
        n += parseInt($("#hidden_rating_number").html());
        $(".rating_slider").val(n, { set: true });
    }
    adjustNewValues();
});
$(".tips").on('click', ".tip-selected", function() {
    $(this).children().first().transition({opacity:0, queue: false}, 200);
    $(this).removeClass('tip-selected');
    $(this).addClass('tip-unselected');
    var n = $(".tip-selected").length;
    if (n>=0) {
        n += parseInt($("#hidden_rating_number").html());
        $(".rating_slider").val(n, { set: true });
    }
    adjustNewValues();
});

function adjustNewValues() {
    var adjustment = 0;
    var kwhele = $("#new_kwh");
    var monthele = $("#new_month_bill");
    var yearele = $("#new_year_bill");
    $(".tip-selected").each(function() {
        var text = $(this).text();
        if (text.indexOf("LED") >= 0)
            adjustment += 0.01;
        else if (text.indexOf("Refrigerator") >= 0)
            adjustment += 0.03;
        else if (text.indexOf("A/C by 3") >= 0)
            adjustment += 0.05;
    });
    var curkwh = parseFloat($("#cur_kwh").text());
    var curmonth = parseFloat($("#cur_month_bill").text());
    var curyear = parseFloat($("#cur_year_bill").text());
    curkwh = curkwh*(1-adjustment);
    curmonth = curmonth*(1-adjustment);
    curyear = curyear*(1-adjustment);
    kwhele.numerator({toValue:curkwh, duration: 2000, rounding:1 });
    monthele.numerator({toValue:curmonth, duration: 2000, rounding:2 });
    yearele.numerator({toValue:curyear, duration: 2000, rounding:2 });
}

$(".metric_button").bind('click', function() {
    var $id = $(this).attr('id');
    var $selector = $("#metric_selector");
    var colortext = $("#rating_container").css("background-color");
    if ($id.indexOf("equiv") >= 0 ) {
        $selector.transition({x: 0, queue: false}, 200, 'snap');
        $('#piechart_button').css('color', '');
        $('#piechart').transition({opacity: 0, queue: false}, 200, 'snap');
        $('.metric_title').transition({opacity: 1, queue: false}, 200, 'snap');
        $('.metric').transition({opacity: 1, queue: false}, 200, 'snap');
        $('#piechart_button').removeClass('metric_selected');
    } else {
        $selector.transition({x: 104, queue: false}, 200, 'snap');
        $('#equiv_button').css('color', '');
        $('#piechart').transition({opacity: 1, queue: false}, 200, 'snap');
        $('.metric_title').transition({opacity: 0, queue: false}, 200, 'snap');
        $('.metric').transition({opacity: 0, queue: false}, 200, 'snap');
        $('#equiv_button').removeClass('metric_selected');
    }
    $(this).transition({color: colortext, queue: false}, 200,'snap');
    $(this).addClass('metric_selected');
});
