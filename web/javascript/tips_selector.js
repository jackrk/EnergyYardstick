/**
 * Created by Jack on 3/25/14.
 */

$("#tips_submit").mouseenter(function(){
    $(this).transition({backgroundColor: '#8EE0FF', queue: false}, 200);
    $(this).bind('mousedown', function(){
        $(this).css('background-color', '#7fc9e5');
        $(this).bind('mouseup', function(){
            $(this).css('background-color', '#E0E5E2');
            $(this).unbind('mouseup');
            $(this).unbind('mousedown');
        });
    });
    $(this).bind('mouseout', function(){
        $(this).transition({backgroundColor: '#E0E5E2', queue: false}, 200);
        $(this).unbind('mouseout');
    });
});
$(".tips").on('mouseover', ".tip-unselected", function() {
    $(this).transition({color: 'black', queue: false}, 200);
    $(this).children().first().transition({opacity:.5, queue: false}, 200);
    $(this).bind('mousedown', function(){
        $(this).bind('mouseup', function(){
            $(this).children().first().css('opacity', '1');
            $(this).addClass('tip-selected');
            $(this).unbind('mouseup');
            $(this).unbind('mousedown');
            $(this).bind('mousedown', function(){
                $(this).bind('mouseup', function(){
                    $(this).removeClass('tip-selected');
                    $(this).unbind('mouseup');
                    $(this).unbind('mousedown');
                });
            });
        });
        $(this).bind('mouseout', function(){
            $(this).transition({color: '', queue: false}, 200);
            $(this).children().first().transition({opacity: 1, queue: false}, 200);
        });
    });
    $(this).bind('mouseout', function(){
        $(this).transition({color: '', queue: false}, 200);
        $(this).children().first().transition({opacity: 0, queue: false}, 200);
    });
});
$(".tips").on('mouseover', ".tip-selected", function() {
    $(this).transition({color: '', queue: false}, 200);
    $(this).children().first().transition({opacity:.5, queue: false}, 200);
    $(this).bind('mousedown', function(){
        $(this).children().first().css('opacity', '.5');
        $(this).bind('mouseup', function(){
            $(this).children().first().css('opacity', '.5');
            $(this).removeClass('tip-selected');
            $(this).unbind('mouseup');
            $(this).unbind('mousedown');
        });
        $(this).bind('mouseout', function(){
            $(this).children().first().transition({opacity: 0, queue: false}, 200);
        });
    });
    $(this).bind('mouseout', function(){
        $(this).transition({color: 'black', queue: false}, 200);
        $(this).children().first().transition({opacity: 1, queue: false}, 200);
    });
});

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
    } else {
        $selector.transition({x: 104, queue: false}, 200, 'snap');
        $('#equiv_button').css('color', '');
        $('#piechart').transition({opacity: 1, queue: false}, 200, 'snap');
        $('.metric_title').transition({opacity: 0, queue: false}, 200, 'snap');
        $('.metric').transition({opacity: 0, queue: false}, 200, 'snap');
    }
    $(this).transition({color: colortext, queue: false}, 200,'snap');
});
