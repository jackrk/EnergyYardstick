/**
 * Created by jack_ultra on 4/2/14.
 */

$('.compare_button').bind('mouseenter', function(event) {
    //$(this).transition({backgroundColor: 'darkslategray', color: 'white', queue: false}, 100);
    $(this).bind('mouseleave', function() {
        //$(this).transition({backgroundColor: '', color: '', queue: false}, 100);
        $(this).unbind('mouseleave');
        $(this).unbind('click');
    });
    $(this).bind('click', function() {
        if (!$(this).hasClass('compare_selected')) {
            $(this).parent().children().each(function() {
                $(this).removeClass("compare_selected");
            });
            $(this).addClass("compare_selected");
        }
    });
});