$.noConflict();
jQuery( document ).ready(function( $ ){



//////////////////
////////////////// MOBILE MENU

$( ".cross" ).hide();
$( ".full-width-nav--mobile" ).hide();
$( ".hamburger" ).click(function() {
	$( ".full-width-nav--mobile" ).slideToggle( "slow", function() {
		$( ".hamburger" ).hide();
		$( ".cross" ).show();
	});
});

$( ".cross" ).click(function() {
	$( ".full-width-nav--mobile" ).slideToggle( "slow", function() {
		$( ".cross" ).hide();
		$( ".hamburger" ).show();
	});
});
//////////////////
////////////////// END OF MOBILE MENU





});