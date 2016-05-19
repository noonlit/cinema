$(document).ready(function () {
    console.info('Hey Robin, You like to look under the Hood?');
    var $this = $(this);


    if ($('#homepage').length == 0) {
        var scrollPos = $(window).scrollTop();
        
        $(window).scroll(function(){
            if(scrollPos == 0) {
                var target = ".wrapperArea";
                var $target = $(target);
                var offset = $target.offset();
                offset.top = offset.top - 150;

                $('html, body').stop().animate({
                    'scrollTop': offset.top
                }, 800, 'swing');
            }

            scrollPos = $(window).scrollTop();
        });
    }

});

var is_empty = function(str) {
	return (!str || 0 === str.length);
};