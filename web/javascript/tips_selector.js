/**
 * Created by Jack on 3/25/14.
 */

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
    $(this).removeClass('tip-unselected');
    $(this).addClass('tip-selected');
    updateRating();
});
$(".tips").on('click', ".tip-selected", function() {
    $(this).removeClass('tip-selected');
    $(this).addClass('tip-unselected');
    updateRating();
});

$(".tips").on('click', ".tip-saved", function() {
    $(this).removeClass('tip-saved');
    $(this).addClass('tip-deleted');
    updateRating();
});

$(".tips").on('click', ".tip-deleted", function() {
    $(this).removeClass('tip-deleted');
    $(this).addClass('tip-saved');
    updateRating();
});

$("#tip_toggle").on('click', function() {
    $("#tips_inner").toggle();
    $("#saved_tips_inner").toggle();
    if ($(this).text().indexOf("show") > -1) {
        $(this).html("go<br>back");
    } else {
        $(this).html("show saved");
    }
    return false;
});
