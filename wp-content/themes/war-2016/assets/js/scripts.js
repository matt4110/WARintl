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


//////////////////
////////////////// START OF AMBASADORS HOVER
$j("#bennett-img").mouseenter(function() {
   $j("#bennett-hover").css('visibility', 'visible').fadeIn('3000')
});
$j("#bennett-img").mouseleave(function() {
   $j("#bennett-hover").css('visibility', 'hidden').fadeIn('3000')
});
$j("#bennett-hover").mouseenter(function() {
   $j("#bennett-hover").css('visibility', 'visible').fadeIn('700')
});
$j("#bennett-hover").mouseleave(function() {
   $j("#bennett-hover").css('visibility', 'hidden').fadeOut('700')
});





});