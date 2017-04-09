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


});