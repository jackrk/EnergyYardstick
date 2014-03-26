/**
 * Created by Jack on 3/25/14.
 */

$("#tips_submit").mouseenter(function(){
    $(this).transition({backgroundColor: '#8EE0FF', queue: false}, 200);
    $(this).bind('mousedown', function(){
        $(this).css('background-color', '#588B9E');
        $(this).bind('mouseup', function(){
            $(this).css('background-color', '#8EE0FF');
            $(this).unbind('mouseup');
            $(this).unbind('mousedown');
        });
    });
    $(this).bind('mouseout', function(){
        $(this).transition({backgroundColor: '#47707F', queue: false}, 200);
        $(this).unbind('mouseout');
    });
});
$(".tips").on('mouseover', ".tip-unselected", function() {
    $(this).transition({backgroundColor: '#8EE0FF', queue: false}, 200);
    $(this).bind('mousedown', function(){
        $(this).css('background-color', '#74B8D1');
        $(this).bind('mouseup', function(){
            $(this).css('background-color', '');
            $(this).addClass('tip-selected');
            $(this).unbind('mouseup');
            $(this).unbind('mousedown');
        });
    });
    $(this).bind('mouseout', function(){
        $(this).transition({backgroundColor: '', queue: false}, 200);
        $(this).unbind('mouseout');
    });
});
$(".tips").on('mouseover', ".tip-selected", function() {
    $(this).transition({backgroundColor: '#74B8D1', queue: false}, 200);
    $(this).bind('mousedown', function(){
        $(this).css('background-color', '#8EE0FF');
        $(this).bind('mouseup', function(){
            $(this).css('background-color', '');
            $(this).removeClass('tip-selected');
            $(this).unbind('mouseup');
            $(this).unbind('mousedown');
        });
    });
    $(this).bind('mouseout', function(){
        $(this).transition({backgroundColor: '', queue: false}, 200);
        $(this).unbind('mouseout');
    });
});
