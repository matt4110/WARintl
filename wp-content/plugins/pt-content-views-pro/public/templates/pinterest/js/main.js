/**
 * Script Name: Pinterest
 *
 * @package   PT_Content_Views_Pro
 * @author    PT Guy (http://www.contentviewspro.com/)
 * @license   GPL-2.0+
 * @link      http://www.contentviewspro.com/
 * @copyright 2014 PT Guy
 */

( function ( $ ) {

	$.PT_CV_Pinterest = $.PT_CV_Pinterest || { };
	PT_CV_PUBLIC = PT_CV_PUBLIC || { };
	var _prefix = PT_CV_PUBLIC._prefix;

	$.PT_CV_Pinterest = function ( options ) {
		this.options = $.extend( {
			_prefix: _prefix,
			offset: 20,
			container: '.' + _prefix + 'pinterest',
			item: '.' + _prefix + 'content-item',
			page: '.' + _prefix + 'page',
			is_masonry: false
		}, options );

		this.init();
	};

	$.PT_CV_Pinterest.prototype = {
		/**
		 * Render Pinterest layout
		 *
		 * @returns {undefined}
		 */
		init: function () {
			var $self = this;

			$( $self.options.container ).each( function () {
				var _this = $( this );
				$self.options.is_masonry = _this.hasClass( _prefix + 'masonry' );

				// Add overlay box
				_this.prepend( $self.overlay_box() );

				if ( !_this.is( ':visible' ) || _this.is( ':hidden' ) ) {
					var foo = window.setInterval( function () {
						if ( _this.width() > 0 ) {
							window.clearInterval( foo );
							$self.call_render( _this );
						}
					}, 250 );
				} else {
					$self.call_render( _this );
				}
			} );
		},
		/**
		 * Render layout for each Pinterest container
		 *
		 * @param {type} _this
		 * @returns {undefined}
		 */
		call_render: function ( _this ) {
			var $self = this;
			var $container = _this.find( $self.options.page ).length ? _this.find( $self.options.page + ':visible' ) : _this;

			$container.each( function () {
				var container_width = parseInt( $container.width() );
				if ( !container_width ) {
					console.log( 'container_width = 0' );
					return;
				}

				var $pself = $( this );

				// For PC
				var item_per_row = parseInt( $pself.attr( 'data-col-md' ) );

				// For mobile, tablet devices & small screens
				var window_width = $( window ).width();
				var res_width = 0;

				if ( window_width < 768 ) {
					res_width = parseInt( $pself.attr( 'data-col-xs' ) );
				}
				else if ( window_width < 992 ) {
					res_width = parseInt( $pself.attr( 'data-col-sm' ) );
				}

				if ( res_width ) {
					item_per_row = res_width;
				}

				if ( item_per_row < 1 ) {
					console.log( 'Items per row is invalid. Please check!' );
					return;
				}

				// In case container_width is invalid (caused by hardcode width in theme CSS)
				if ( container_width > window_width ) {
					container_width = window_width;
				}

				// Do render
				var item_width = $self.calculate_item_width( container_width, item_per_row );

				if ( $pself.find( 'img' ).length <= 0 ) {
					$self.do_render( $pself, item_width );
				} else {
					$pself.cvp_imagesLoaded( function () {
						$self.do_render( $pself, item_width );
					} );
				}
				$pself.find( 'iframe' ).each( function () {
					$( this ).load( function () {
						$self.do_render( $pself, item_width );
					} );
				} );
			} );
		},
		/**
		 * Render layout function
		 *
		 * @param {type} _this
		 * @param {type} item_width
		 * @returns {undefined}
		 */
		do_render: function ( _this, item_width ) {
			var $self = this;

			// Prevent duplication
			if ( _this.hasClass( 'cvp-doing' ) ) {
				console.log( 'cvp-doing' );
				return;
			}
			_this.addClass( 'cvp-doing' );

			// Start rendering
			if ( $self.options.is_masonry ) {
				$self.do_masonry( _this );
			} else {
				var pin_finish = function () {
					$self.do_finished( _this );
				};

				//console.log( item_width, $self.options.offset );
				var wookmark = new Wookmark( _this[0], {
					autoResize: false,
					flexibleWidth: true,
					itemWidth: item_width,
					offset: $self.options.offset,
					align: PT_CV_PUBLIC.is_mobile ? 'center' : 'left',
					onLayoutChanged: function () {
						pin_finish();
					}
				} );

				_this.on( 'cvp-paginated', function ( e, $loaded_content ) {
					wookmark.initItems();

					$loaded_content.cvp_imagesLoaded( function () {
						wookmark.layout( true );
					} );
				} );

				// Manually do finish
				var trigger_finish = [ ];
				$( '.' + _prefix + 'view' ).trigger( 'pin-trigger-finish', [ trigger_finish ] );
				if ( trigger_finish[0] === 1 ) {
					var imsr = window.setInterval( function () {
						if ( $( '.cvp-doing' ).length > 0 ) {
							window.clearInterval( imsr );
							pin_finish();
						}
					}, 3000 );
				}
			}
		},
		do_masonry: function ( _this ) {
			var $self = this;
			var item = $self.options.item;

			// Define width
			var window_width = $( window ).width();
			var width_small = '24%';
			var small_per_row = 2;

			if ( window_width <= 320 ) {
				width_small = '100%';
				small_per_row = 1;
			}
			else if ( window_width < 600 ) {
				width_small = '48%';
				small_per_row = 1;
			}

			var max_small = parseInt( 100 / parseInt( width_small ) );
			var width_gutter = parseInt( ( 100 - max_small * parseInt( width_small ) ) / max_small ) + '%';
			var width_big = 100 - small_per_row * ( parseInt( width_small ) + parseInt( width_gutter ) ) - parseInt( width_gutter ) + '%';

			var count_big, count_seq_small, width, prev_width_big;
			count_big = count_seq_small = width = prev_width_big = 0;

			var cur_idx = 0, big_items = [ ];
			/**
			 * Able to set which items are big
			 * Custom JS: $(".pt-cv-masonry").on("set_big_item",function(n,s){s.push(1),s.push(5)});
			 */
			$( '.' + _prefix + 'masonry' ).trigger( 'set_big_item', [ big_items ] );

			// Calculate width
			var _cal_width = function () {
				var width;
				if ( !PT_CV_PUBLIC.is_mobile ) {
					var rand = Math.round( Math.random() );

					if ( big_items.indexOf( cur_idx ) >= 0 || ( ( rand || ( count_seq_small > 3 && count_big ) || ( count_big === 0 && count_seq_small === 2 ) ) && count_seq_small > 1 && !prev_width_big ) ) {
						count_big++;
						count_seq_small = 0;
						prev_width_big = true;
						width = width_big;
					} else {
						prev_width_big = false;
						count_seq_small++;
						width = width_small;
					}
				}

				if ( !parseInt( width ) ) {
					width = '100%';
				}

				return width;
			};

			// Set width
			var _set_width = function ( $this ) {
				$this.css( 'width', _cal_width() );
			};

			// Set width for each item
			var idx = 0;
			_this.find( item ).each( function () {
				idx++;
				cur_idx = idx;
				_set_width( $( this ) );
			} );

			var class_sizer = _prefix + 'grid-sizer', class_gutter = _prefix + 'grid-gutter';
			_this.find( '.' + class_sizer ).remove();
			_this.find( '.' + class_gutter ).remove();
			_this.find( item ).first().before( '<div class="' + class_sizer + '" style="width: ' + width_small + '"></div><div class="' + class_gutter + '" style="width: ' + width_gutter + '"></div>' );

			var msnry = _this.cvp_masonry( {
				percentPosition: true,
				itemSelector: item,
				columnWidth: '.' + class_sizer,
				gutter: '.' + class_gutter
			} );

			_this.on( 'cvp-paginated', function ( e, $loaded_content ) {
				$loaded_content.cvp_imagesLoaded( function () {
					var new_ids = [ ], new_items;

					// Get new posts ID
					$loaded_content.each( function () {
						var pid = $( this ).data( 'pid' );
						if ( pid ) {
							new_ids.push( pid );
						}
					} );

					_this.find( item ).each( function () {
						var pid = $( this ).data( 'pid' );

						if ( $.inArray( pid, new_ids ) >= 0 ) {
							if ( typeof new_items === 'undefined' ) {
								new_items = $( this );
							} else {
								new_items = new_items.add( $( this ) );
							}

							// Set width for this item
							_set_width( $( this ) );
						}
					} );

					_this.cvp_masonry( 'appended', new_items );
				} );
			} );

			// On finish
			msnry.on( 'layoutComplete', masonry_refresh );
			function masonry_refresh() {
				$self.do_finished( _this );
			}
			_this.cvp_masonry();

			// Manually do finish
			var trigger_finish = [ ];
			$( '.' + _prefix + 'view' ).trigger( 'ms-trigger-finish', [ trigger_finish ] );
			if ( trigger_finish[0] === 1 ) {
				var imsr = window.setInterval( function () {
					if ( $( '.cvp-doing' ).length > 0 ) {
						window.clearInterval( imsr );
						masonry_refresh();
					}
				}, 3000 );
			}
		},
		/**
		 * Calcuate width of item
		 *
		 * @param {type} container_width
		 * @param {type} item_per_row
		 */
		calculate_item_width: function ( container_width, item_per_row ) {
			item_per_row = Math.abs( item_per_row );

			// Calculate with % of each item
			var item_width_percent = 99 / item_per_row;
			var expect_width = ( container_width - this.options.offset * ( item_per_row - 1 ) ) * item_width_percent / 100;

			return expect_width;
		},
		/*
		 * Do somethings on layout finished
		 */
		do_finished: function ( _this ) {
			_this.removeClass( 'cvp-doing' );
			// Remove overlay
			$( '.' + _prefix + 'overlay-box' ).remove();
			// Show content
			_this.css( 'opacity', 1 );
		},
		/* Overlay box with loading icon */
		overlay_box: function () {
			var loading_image_src = typeof PT_CV_PUBLIC.loading_image_src !== 'undefined' ? PT_CV_PUBLIC.loading_image_src : 'data:image/gif;base64,R0lGODlhDwAPALMPAMrKygwMDJOTkz09PZWVla+vr3p6euTk5M7OzuXl5TMzMwAAAJmZmWZmZszMzP///yH/C05FVFNDQVBFMi4wAwEAAAAh+QQFCgAPACwAAAAADwAPAAAEQvDJaZaZOIcV8iQK8VRX4iTYoAwZ4iCYoAjZ4RxejhVNoT+mRGP4cyF4Pp0N98sBGIBMEMOotl6YZ3S61Bmbkm4mAgAh+QQFCgAPACwAAAAADQANAAAENPDJSRSZeA418itN8QiK8BiLITVsFiyBBIoYqnoewAD4xPw9iY4XLGYSjkQR4UAUD45DLwIAIfkEBQoADwAsAAAAAA8ACQAABC/wyVlamTi3nSdgwFNdhEJgTJoNyoB9ISYoQmdjiZPcj7EYCAeCF1gEDo4Dz2eIAAAh+QQFCgAPACwCAAAADQANAAAEM/DJBxiYeLKdX3IJZT1FU0iIg2RNKx3OkZVnZ98ToRD4MyiDnkAh6BkNC0MvsAj0kMpHBAAh+QQFCgAPACwGAAAACQAPAAAEMDC59KpFDll73HkAA2wVY5KgiK5b0RRoI6MuzG6EQqCDMlSGheEhUAgqgUUAFRySIgAh+QQFCgAPACwCAAIADQANAAAEM/DJKZNLND/kkKaHc3xk+QAMYDKsiaqmZCxGVjSFFCxB1vwy2oOgIDxuucxAMTAJFAJNBAAh+QQFCgAPACwAAAYADwAJAAAEMNAs86q1yaWwwv2Ig0jUZx3OYa4XoRAfwADXoAwfo1+CIjyFRuEho60aSNYlOPxEAAAh+QQFCgAPACwAAAIADQANAAAENPA9s4y8+IUVcqaWJ4qEQozSoAzoIyhCK2NFU2SJk0hNnyEOhKR2AzAAj4Pj4GE4W0bkJQIAOw==';
			return '<div class="' + _prefix + 'overlay-box"><img alt="loading" src="' + loading_image_src + '"></div>';
		}
	};

	$( function () {
		new $.PT_CV_Pinterest( { container: $( '.' + _prefix + 'pinterest' ) } );

		// When preview/pagination finished
		$( 'body' ).on( _prefix + 'pagination-finished', function ( e, pages_holder, $loaded_content ) {
			if ( !pages_holder ) {
				return;
			}

			var $view = pages_holder.is( '.' + _prefix + 'view' ) ? pages_holder : pages_holder.parent();

			if ( !$view.hasClass( _prefix + 'pinterest' ) ) {
				return;
			}

			if ( $view.hasClass( _prefix + 'pgregular' ) ) {
				new $.PT_CV_Pinterest( { container: pages_holder } );
			} else {
				pages_holder.trigger( 'cvp-paginated', [ $loaded_content ] );
			}
		} );

		// When resize window
		var ww = $( window ).width();
		$( window ).on( 'orientationchange resize', function () {
			var nww = $( window ).width();
			if ( Math.abs( nww - ww ) > 10 ) {
				ww = nww;
				new $.PT_CV_Pinterest();
			}
		} );
	} );
}( jQuery ) );