/**
 * Script Name: Glossary
 *
 * @package   PT_Content_Views_Pro
 * @author    PT Guy (http://www.contentviewspro.com/)
 * @license   GPL-2.0+
 * @link      http://www.contentviewspro.com/
 * @copyright 2014 PT Guy
 */

( function ( $ ) {
	"use strict";

	$.PT_CV_Glossary = $.PT_CV_Glossary || { };
	PT_CV_PUBLIC = PT_CV_PUBLIC || { };

	$.PT_CV_Glossary = function ( options ) {
		this.options = options;

		this._click();
	};

	$.PT_CV_Glossary.prototype = {
		/**
		 * Handle click action on Menu item of Glossary list
		 * @returns {undefined}
		 */
		_click: function () {
			var _prefix = this.options._prefix;

			$( '.' + _prefix + 'gls-menu a' ).on( 'click', function ( e ) {
				e.preventDefault();

				// Get selected index
				var index_id = this.hash;

				// Toggle active class
				$( this ).closest( '.' + _prefix + 'gls-menu' ).find( '.pt-active' ).removeClass( 'pt-active' );
				$( this ).addClass( 'pt-active' );

				var glossary_list = $( this ).closest( '.' + _prefix + 'gls-menu' ).next( '.' + _prefix + 'glossary' );
				if ( glossary_list.length > 0 ) {
					if ( $( this ).parent().index() > 0 ) {
						// Show selected group
						glossary_list.find( '.' + _prefix + 'gls-group' ).hide();
						glossary_list.find( index_id ).fadeIn();
					} else {
						// Show all groups
						glossary_list.find( '.' + _prefix + 'gls-group' ).show();
					}
				}
			} );
		}
	};

	$( function () {
		var _prefix = PT_CV_PUBLIC._prefix;

		new $.PT_CV_Glossary( { _prefix: _prefix } );
	} );
}( jQuery ) );