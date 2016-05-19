/**
 * Share count script
 *
 * @package   PT_Content_Views_Pro
 * @author    PT Guy <http://www.contentviewspro.com/>
 * @license   GPL-2.0+
 * @link      http://www.contentviewspro.com/
 * @copyright 2014 PT Guy
 */

( function ( $ ) {
	"use strict";

	$.PT_CV_Share_Count = $.PT_CV_Share_Count || { };
	PT_CV_PUBLIC = PT_CV_PUBLIC || { };
	var _prefix = PT_CV_PUBLIC._prefix;
	var cvp_sc_selectors = {
		scclass: _prefix + 'socialsc',
		view: '.' + _prefix + 'view',
		item: '.' + _prefix + 'content-item',
		buttons: '.' + _prefix + 'social-buttons',
		sprefix: _prefix + 'social-'
	};

	$.PT_CV_Share_Count = function () {
		this.do_count();
	};

	$.PT_CV_Share_Count.prototype = {
		do_count: function ( ) {
			$( cvp_sc_selectors.view ).each( function () {
				if ( $( this ).hasClass( cvp_sc_selectors.scclass ) ) {
					var $view = $( this );
					var services = [ ];
					var posts = $.map( $view.find( cvp_sc_selectors.item ), function ( $post, index ) {
						if ( index === 0 ) {
							services = $.map( $( $post ).find( cvp_sc_selectors.buttons ).find( 'a' ), function ( $social, index ) {
								var _class = $( $social ).attr( 'class' );
								return _class.replace( cvp_sc_selectors.sprefix, '' );
							} );
						}
						return $( $post ).data( 'pid' );
					} );

					$.ajax( {
						type: "POST",
						url: PT_CV_PUBLIC.ajaxurl,
						data: {
							action: 'share_count',
							posts: posts,
							services: services,
							ajax_nonce: PT_CV_PUBLIC._nonce
						}
					} ).done( function ( response ) {
						var data = $.parseJSON( response );
						$.each( data, function ( pid, services ) {
							var $post = $view.find( cvp_sc_selectors.item + '[data-pid="' + pid + '"]' );
							$.each( services, function ( sname, scount ) {
								$post.find( '.' + cvp_sc_selectors.sprefix + sname ).html( scount );
							} );
						} );
					} );
				}
			} );
		}
	};

	$( function () {
		new $.PT_CV_Share_Count();
	} );
}( jQuery ) );