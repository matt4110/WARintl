/**
 * Script Name: Collapsible List
 *
 * @package   PT_Content_Views_Pro
 * @author    PT Guy (http://www.contentviewspro.com/)
 * @license   GPL-2.0+
 * @link      http://www.contentviewspro.com/
 * @copyright 2014 PT Guy
 */

( function ( $ ) {
	"use strict";

	$.PT_CV_Collapsible = $.PT_CV_Collapsible || { };

	PT_CV_PUBLIC = PT_CV_PUBLIC || { };

	$.PT_CV_Collapsible = function ( options ) {
		this.options = options;

		this._toggle_panel( this.options.collapse_box );
	};

	$.PT_CV_Collapsible.prototype = {
		_toggle_panel: function ( $selector ) {
			// On show action
			$( $selector + ' .panel-collapse' ).on( 'shown.bs.collapse', function () {
				$( this ).prev().find( ".glyphicon" ).removeClass( "glyphicon-plus" ).addClass( "glyphicon-minus" );
			} );

			// On hide action
			$( $selector + ' .panel-collapse' ).on( 'hidden.bs.collapse', function () {
				$( this ).prev().find( ".glyphicon" ).removeClass( "glyphicon-minus" ).addClass( "glyphicon-plus" );
			} );

			// Handle toogle when click on +, - button
			$( 'span.panel-collapsed', $selector ).on( 'click', function () {
				$( this ).parent().next().collapse( 'toggle' );
			} );
		}
	};

	$( function () {
		var _prefix = PT_CV_PUBLIC._prefix;

		new $.PT_CV_Collapsible( { _prefix: _prefix, collapse_box: '.' + _prefix + 'collapsible' } );
	} );
}( jQuery ) );