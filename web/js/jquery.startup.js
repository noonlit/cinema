$(document).ready(function () {
    console.info('Hey Robin, You like to look under the Hood?');
    var $this = $(this);


        var scrollPos = $(window).scrollTop();
        var padding = 17;

   //      $(window).scroll(function(){
   //      	if( padding > 7 ) {
   //          	$('.banner').animate({padding: padding +'% 0 '+ padding +'% 0'});
			// 	padding = padding - 4;
			// }
   //      });

        $(window).scroll(function(){
        	if( padding > 7 ) {
            	$('.banner').animate({padding: padding +'% 0 '+ padding +'% 0'});
            	$('.banner h2').animate({opacity: '0'});
				padding = padding - 5;
			}
           $('.wrapper').addClass('moveTop');
        });   


});

var is_empty = function(str) {
	return (!str || 0 === str.length);
};