/**
 * Created by jack_ultra on 3/30/14.
 */
$('.range_button').bind('mouseenter', function(event) {
    $(this).transition({backgroundColor: 'darkslategray', color: 'white', queue: false}, 100);
    $(this).bind('mouseleave', function() {
        $(this).transition({backgroundColor: '', color: '', queue: false}, 100);
        $(this).unbind('mouseleave');
        $(this).unbind('click');
    });
    $(this).bind('click', function() {
        if (!$(this).hasClass('selected')) {
            $(this).parent().children().each(function() {
                $(this).removeClass("selected");
            });
            $(this).addClass("selected");
        }
    });
});
