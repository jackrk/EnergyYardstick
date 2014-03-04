$(document).ready(function() {
    if (!$.support.transition)
        $.fn.transition = $.fn.animate;
    $(".tab_link").mouseenter(function(){
            $(this).transition({backgroundColor: 'lightgreen', queue: false}, 200);
            $(this).bind('mouseout', function(){
                $(this).transition({backgroundColor: 'white', queue: false}, 150);
                $(this).unbind('mouseout');
            });
    });

});