var $j = jQuery.noConflict();
jQuery( document ).ready(function( $ ){



//////////////////
////////////////// MOBILE MENU

$j( ".cross" ).hide();
$j( ".full-width-nav--mobile" ).hide();
$j( ".hamburger" ).click(function() {
	$j( ".full-width-nav--mobile" ).slideToggle( "slow", function() {
		$j( ".hamburger" ).hide();
		$j( ".cross" ).show();
	});
});

$j( ".cross" ).click(function() {
	$j( ".full-width-nav--mobile" ).slideToggle( "slow", function() {
		$j( ".cross" ).hide();
		$j( ".hamburger" ).show();
	});
});
//////////////////
////////////////// END OF MOBILE MENU

/////////////////
///////////////// CALL TO ACTION HOVER
$j("#cta-donate").mouseenter(function() {
   $j("#cta-give").css('transform', 'scale(1)')
});
$j("#cta-donate").mouseleave(function() {
   $j("#cta-give").css('transform', 'scale(0)')
});
$j("#cta-give").mouseenter(function() {
   $j("#cta-give").css('transform', 'scale(1)')
});
$j("#cta-give").mouseleave(function() {
   $j("#cta-give").css('transform', 'scale(0)')
});


$j("#cta-volunteer").mouseenter(function() {
   $j("#cta-act").css('transform', 'scale(1)')
});
$j("#cta-volunteer").mouseleave(function() {
   $j("#cta-act").css('transform', 'scale(0)')
});
$j("#cta-act").mouseenter(function() {
   $j("#cta-act").css('transform', 'scale(1)')
});
$j("#cta-act").mouseleave(function() {
   $j("#cta-act").css('transform', 'scale(0)')
});


$j("#cta-shop").mouseenter(function() {
   $j("#cta-buy").css('transform', 'scale(1)')
});
$j("#cta-shop").mouseleave(function() {
   $j("#cta-buy").css('transform', 'scale(0)')
});
$j("#cta-buy").mouseenter(function() {
   $j("#cta-buy").css('transform', 'scale(1)')
});
$j("#cta-buy").mouseleave(function() {
   $j("#cta-buy").css('transform', 'scale(0)')
});
//////////////////
////////////////// END OF CALL TO ACTION HOVER






});

////////////
////////////Start Add to Calendar
(function () {
            if (window.addtocalendar)if(typeof window.addtocalendar.start == "function")return;
            if (window.ifaddtocalendar == undefined) { window.ifaddtocalendar = 1;
                var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                s.type = 'text/javascript';s.charset = 'UTF-8';s.async = true;
                s.src = ('https:' == window.location.protocol ? 'https' : 'http')+'://addtocalendar.com/atc/1.5/atc.min.js';
                var h = d[g]('body')[0];h.appendChild(s); }})();


                