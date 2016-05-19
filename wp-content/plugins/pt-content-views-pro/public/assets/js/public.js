/**
 * Main scripts for Front-end
 *
 * @package   PT_Content_Views_Pro
 * @author    PT Guy <http://www.contentviewspro.com/>
 * @license   GPL-2.0+
 * @link      http://www.contentviewspro.com/
 * @copyright 2014 PT Guy
 */

( function ( $ ) {
	"use strict";

	$.PT_CV_Public_Pro = $.PT_CV_Public_Pro || { };
	PT_CV_PUBLIC = PT_CV_PUBLIC || { };
	var _prefix = PT_CV_PUBLIC._prefix;
	var pt_cv_data = {
		sf_term: null,
		sf_solved_term: [ ],
		separator: ' ',
		selectors: {
			view: '.' + _prefix + 'view',
			item: '.' + _prefix + 'content-item',
			pagination: '.' + _prefix + 'pagination-wrapper',
			sfilter: '.' + _prefix + 'filter-bar',
			foption: '.' + _prefix + 'filter-option'
		}
	};

	$.PT_CV_Public_Pro = function ( options ) {
		this.options = $.extend( {
			_prefix: _prefix,
			_autoload: 1
		}, options );

		// Autoload all registered functions
		if ( this.options._autoload !== 0 ) {
			this.animation();
			this.pagination();
			this.openin_window();
			this.openin_lightbox();
			this.open_in();
			this.grid_same_height();
			this.iframe_dimension();
			this.quicksand_filter();

			// Run when window resizes
			var $self = this;
			$( window ).on( 'orientationchange resize', function () {
				$self.grid_same_height( 1 );
			} );
		}

		this.reset_before();
	};
	$.PT_CV_Public_Pro.prototype = {
		// Reset before start View/Preview
		reset_before: function ( ) {
			// Reset data
			$.extend( pt_cv_data, {
				sf_term: null,
				sf_solved_term: [ ]
			} );

			this._set_cookie( 'cvp_sf_term', '', 'delete' );
		},
		// Reset after Preview finish
		reset_after: function ( skip ) {
			this.view_init( skip );
			this.animation();
			this.grid_same_height();

			// For Preview only
			if ( skip === undefined ) {
				this.quicksand_filter();
			}

			// Modules
			new $.PT_CV_Share_Count();
		},
		_set_cookie: function ( name, value, action ) {
			document.cookie = name + '=' + value + '; path=/' + ( action === 'delete' ? '; expires=Thu, 01 Jan 1970 00:00:00 GMT' : '' );
		},
		view_init: function ( skip ) {
			new $.PT_CV_Collapsible( { _prefix: _prefix, collapse_box: '.' + _prefix + 'collapsible' } );
			new $.PT_CV_Glossary( { _prefix: _prefix } );

			// For Preview only
			if ( skip === undefined ) {
				new $.PT_CV_Pinterest( { container: $( '.' + _prefix + 'pinterest' ) } );
			}
		},
		/**
		 * Iframe is distorted in Tablet
		 * @returns {undefined}
		 */
		iframe_dimension: function () {
			if ( PT_CV_PUBLIC.is_mobile ) {
				$( '.' + _prefix + 'view iframe' ).each( function () {
					var fn = function ( $this ) {
						var real_width = $this.width();
						var width = parseInt( $this.attr( 'width' ) );
						var height = parseInt( $this.attr( 'height' ) );
						$this.attr( 'width', real_width );
						$this.attr( 'height', real_width * height / width );
					};
					$( this ).load( function () {
						fn( $( this ) );
					} );
				} );
			}
		},
		/**
		 * Open in
		 *
		 * @returns {undefined}
		 */
		open_in: function () {
			// No link, no action
			$( '.' + _prefix + 'none' ).each( function () {
				$( this ).removeAttr( 'href' );
			} );
			$( '.' + _prefix + 'none' ).click( function ( e ) {
				e.preventDefault();
			} );
		},
		/**
		 * Line up fields (Title, Content...) across items
		 * @param {type} resized
		 * @returns {Number}
		 */
		grid_same_height: function ( resized ) {
			if ( PT_CV_PUBLIC.is_mobile ) {
				return 1;
			}

			var grid_ = '.' + _prefix + 'same-height';
			var grid_page = '.' + _prefix + 'page';
			var grid_title = '.' + _prefix + 'title';
			var grid_content = '.' + _prefix + 'content';
			var grid_readmore = '.' + _prefix + 'readmore' + ':not(.' + _prefix + 'textlink)';

			// Run when images have loaded
			var fn_process_container = function ( $pself ) {
				$pself.cvp_imagesLoaded( function () {
					$pself.each( function () {
						var $titles = $( this ).find( grid_title );
						var $contents = $( this ).find( grid_content );
						var $readmores = $( this ).find( grid_readmore );

						// Reset when resize
						if ( resized ) {
							$titles.height( 'auto' );
							$contents.height( 'auto' );
							$readmores.css( 'position', 'relative' );
						}

						// Height of Title
						var heights_title = $titles.map( function () {
							return $( this ).height();
						} ).get(),
							// Height of Content
							heights_content = $contents.map( function () {
								return $( this ).height();
							} ).get();

						// Get max Height
						var maxHeightTitle = Math.max.apply( null, heights_title ),
							maxHeightContent = Math.max.apply( null, heights_content );

						// Set max Height
						if ( parseInt( maxHeightTitle ) ) {
							$titles.height( maxHeightTitle );
						}
						if ( parseInt( maxHeightContent ) ) {
							$contents.height( maxHeightContent );
						}

						// Stick Readmore button to bottom of Grid
						$readmores.css( { 'position': 'absolute', 'bottom': '0px' } );
					} );
				} );
			};

			// Process each Page
			$( grid_ ).children( grid_page ).each( function () {
				var $pself = $( this );
				if ( $pself.is( ':hidden' ) )
					return;

				fn_process_container( $pself );
			} );
		},
		/**
		 * Animation actions
		 * @returns {undefined}
		 */
		animation: function () {
			// Onmobile, no hover => use click
			if ( PT_CV_PUBLIC.is_mobile ) {
				// Click thumbnail => activate hover state
				$( '.' + _prefix + 'thumbnail', '.' + _prefix + 'content-hover' ).on( 'click', function ( e ) {
					e.preventDefault();
					// Deactivate hover state of other items
					$( this ).closest( pt_cv_data.selectors.view ).find( '.' + _prefix + 'hover' ).removeClass( _prefix + 'hover' );

					// Activate hover state of this item
					$( this ).closest( pt_cv_data.selectors.item ).addClass( _prefix + 'hover' );
				} );

				// Click hover block => deactivate hover state
				$( '.' + _prefix + 'mask' ).on( 'click', function () {
					$( this ).closest( pt_cv_data.selectors.item ).removeClass( _prefix + 'hover' );
				} );
			}
		},
		/**
		 * Load more pagination
		 * @returns {undefined}
		 */
		pagination: function () {
			this._pagination_loadmore();
			this._pagination_infinite();
		},
		/**
		 * Pagination handle
		 *
		 * @param {type} this_
		 * @returns {undefined}
		 */
		_pagination_handle: function ( this_ ) {
			// Reset status
			var _fn_reset = function () {
				PT_CV_PUBLIC.paging = 0;
			};

			// Get next page
			var selected_page = parseInt( this_.attr( 'data-nextpages' ) );
			if ( !selected_page ) {
				_fn_reset();
				return;
			}

			var $pt_cv_public_js = new $.PT_CV_Public();
			$pt_cv_public_js._setup_pagination( this_, selected_page, function () {
				_fn_reset();

				if ( !( this_.parent().prev().prev( pt_cv_data.selectors.sfilter ).length ) ) {
					var nextpage = selected_page + 1;
					if ( nextpage <= parseInt( this_.attr( 'data-totalpages' ) ) ) {
						this_.attr( 'data-nextpages', nextpage );
					} else {
						this_.remove();
					}
				}
			} );
		},
		_pagination_toggle: function ( $itemsHolder, show ) {
			var $pagination = $itemsHolder.closest( pt_cv_data.selectors.view ).next( pt_cv_data.selectors.pagination );
			if ( show ) {
				$pagination.show();
			} else {
				$pagination.hide();
			}
		},
		/**
		 * Loadmore button pagination
		 */
		_pagination_loadmore: function () {
			var $self = this;

			// Load more button
			$( 'body' ).on( 'click', '.' + _prefix + 'more', function () {
				var this_ = $( this );
				$self._pagination_handle( this_ );
			} );
		},
		/**
		 * Infinite loading
		 */
		_pagination_infinite: function () {
			var $self = this;
			var timer;

			var _infinite = function ( condition ) {
				$( pt_cv_data.selectors.pagination ).each( function () {
					condition = condition ? condition : $self._scrollTo( $( this ), 300 );

					if ( $( this ).prev().hasClass( _prefix + 'pginfinite' ) && condition ) {
						var this_ = $( this ).find( '.' + _prefix + 'more' );
						$self._pagination_handle( this_ );
					}
				} );
			};

			var _timer = function ( $el, callback ) {
				$el.scroll( function () {
					if ( timer ) {
						clearTimeout( timer );
					}

					timer = setTimeout( callback, 200 );
				} );
			};

			_timer( $( window ), function () {
				_infinite();
			} );

			_timer( $( '#pt-cv-preview-box' ), function () {
				_infinite( $( this ).scrollTop() + $( this ).innerHeight() >= $( this )[0].scrollHeight );
			} );
		},
		/**
		 * Is scroll to this element
		 *
		 * @param {type} elem
		 * @param {type} padding
		 * @returns {Boolean}
		 */
		_scrollTo: function ( elem, padding ) {
			if ( $( elem ).length === 0 || $( elem ).is( ':hidden' ) ) {
				return false;
			}

			var docViewTop = $( window ).scrollTop();
			var docViewBottom = docViewTop + $( window ).height();
			var elemTop = $( elem ).offset().top;
			var elemBottom = elemTop + $( elem ).height();

			return ( ( elemBottom - ( padding ? padding : 0 ) <= docViewBottom ) && ( elemTop >= docViewTop ) );
		},
		/**
		 * Open in New window
		 *
		 * @returns {undefined}
		 */
		openin_window: function () {
			$( 'body' ).on( 'click', '.' + _prefix + 'window', function ( e ) {
				e.preventDefault();
				var this_ = $( this );
				var href = this_.attr( 'href' );
				var width = parseInt( this_.attr( 'data-width' ) );
				var height = parseInt( this_.attr( 'data-height' ) );
				var left = ( window.screen.width / 2 ) - ( width / 2 );
				var top = ( window.screen.height / 2 ) - ( height / 2 );
				var settings = 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=1, resizable=no, copyhistory=no, ';

				window.open( href, "_blank", settings + ' top=' + top + ', left=' + left + ', width=' + width + ', height=' + height );
			} );
		},
		/**
		 * Open in Lightbox
		 *
		 * @returns {undefined}
		 */
		openin_lightbox: function () {
			// Lightbox of full image
			$( 'body' ).off( 'click', '.' + _prefix + 'lightbox-image' ).on( 'click', '.' + _prefix + 'lightbox-image', function ( e ) {
				e.preventDefault();
				$( this ).cvpcolorbox( { maxWidth: '95%', maxHeight: '90%' } );
			} );

			// Lightbox of content
			$( 'body' ).on( 'click', '.' + _prefix + 'lightbox', function ( e ) {
				e.preventDefault();
				var this_ = $( this );
				var width = parseInt( this_.attr( 'data-width' ) );
				var height = parseInt( this_.attr( 'data-height' ) );
				var content_selector = this_.attr( 'data-content-selector' );
				// If Mobile, fix width, height
				if ( PT_CV_PUBLIC.is_mobile ) {
					width = 90;
					height = 75;
				}

				// If has not set Content selector, get default Lightbox
				if ( !content_selector ) {
					$( this ).cvpcolorbox( { iframe: true, width: width + "%", height: height + "%" } );
				} else {
					// Create/Get custom overlay object
					var overlay_id = _prefix + 'overlay';
					var $overlay = $( '#' + overlay_id ).length ? $( '#' + overlay_id ) : $( "<div/>", { id: _prefix + 'overlay' } ).css( {
						background: "#000",
						opacity: 0.9,
						position: "fixed",
						width: "100%",
						height: "100%",
						left: 0,
						top: 0,
						zIndex: 1000000
					} ).appendTo( 'body' );
					// Show custom overlay
					$overlay.show();
					$( 'body' ).css( 'cursor', 'progress' );
					// Create/Get object to hold content of post
					var content_id = _prefix + 'lightbox-content';
					var $container = $( '#' + content_id ).length ? $( '#' + content_id ) : $( "<div/>", { id: content_id } ).hide().appendTo( 'body' );
					// Load content of post to $container
					$container.load( this_.attr( 'href' ) + ' ' + content_selector, function ( response, status, xhr ) {
						// Hide custom overlay
						$overlay.hide();
						$( 'body' ).css( 'cursor', 'default' );
						if ( status !== "error" ) {
							$( this ).cvpcolorbox( {
								open: true,
								fixed: true,
								className: _prefix + 'lightbox-dialog',
								width: width + "%",
								height: height + "%",
								html: $container.html(),
								onComplete: function () {
									$( 'body' ).trigger( _prefix + 'lightbox-loaded' );
								}
							} );
						}
					} );
				}
			} );
		},
		/**
		 * Script to filter item when click on filter option
		 * @returns {undefined}
		 */
		quicksand_filter: function () {
			var $self = this;

			$( pt_cv_data.selectors.sfilter ).each( function () {
				var $filter_bar = $( this );
				var $itemsHolder = $self._shuffle_get_items( $filter_bar );

				$itemsHolder.cvp_imagesLoaded( function () {
					pt_cv_data.sf_term = 'all';

					if ( $filter_bar.hasClass( _prefix + 'filter-group' ) ) {
						$self._shuffle_filter_multi( $filter_bar, $itemsHolder );
					} else {
						$self._shuffle_filter_single( $filter_bar, $itemsHolder );
					}

					$self._shuffle_actions( $itemsHolder );
				} );
			} );

			$self._shuffle_filter_style();
		},
		// Init shuffle
		_shuffle_init: function ( $itemsHolder ) {
			$itemsHolder.cvp_shuffle( {
				itemSelector: pt_cv_data.selectors.item,
				delimeter: pt_cv_data.separator
			} );
		},
		// Get items holder
		_shuffle_get_items: function ( $filter_bar ) {
			if ( $filter_bar === null ) {
				$filter_bar = $( pt_cv_data.selectors.sfilter );
			}

			var $itemsHolder_ = $filter_bar.next();
			if ( !$itemsHolder_.is( pt_cv_data.selectors.view ) ) {
				$itemsHolder_ = $filter_bar.nextUntil( pt_cv_data.selectors.view ).next();
			}

			return $itemsHolder_.find( '.' + _prefix + 'page' ).length ? $itemsHolder_.find( '.' + _prefix + 'page:visible' ) : $itemsHolder_;
		},
		// Get next/prev filters in multi filters
		_get_sibling_filter: function ( $filter_bar ) {
			var $next_filter, $prev_filter, other_options = [ ];

			var fn_get_selected_option = function ( $els ) {
				$els.each( function () {
					if ( $( this ).is( pt_cv_data.selectors.sfilter ) ) {
						var $option = $( this ).find( '.active' );
						if ( !$option.is( pt_cv_data.selectors.foption ) ) {
							$option = $option.children();
						}

						var oval = $option.data( 'value' );
						if ( oval && oval !== 'all' ) {
							other_options.push( oval );
						}
					}
				} );
			};

			$next_filter = $filter_bar.nextUntil( pt_cv_data.selectors.view );
			$prev_filter = $filter_bar.prevUntil( pt_cv_data.selectors.view );

			fn_get_selected_option( $next_filter );
			fn_get_selected_option( $prev_filter );

			return other_options;
		},
		// Check if this post has all selected terms
		_filter_this_item: function ( $el, selected_terms ) {
			var self_groups = $el.data( 'groups' );
			self_groups = self_groups.toString().split( pt_cv_data.separator );

			var matched_groups = $.map( selected_terms, function ( a ) {
				return $.inArray( a, self_groups ) < 0 ? null : a;
			} );

			// If groups of this item contains all selected terms
			return ( matched_groups.length === selected_terms.length );
		},
		// Do shuffle
		_do_shuffle: function ( selected_terms, $itemsHolder ) {
			var $self = this;
			var lgh = selected_terms.length;
			if ( lgh > 0 ) {
				if ( lgh === 1 ) {
					$itemsHolder.cvp_shuffle( 'shuffle', '' + selected_terms[0] + '' );
				} else {
					$itemsHolder.cvp_shuffle( 'shuffle', function ( $el ) {
						return $self._filter_this_item( $el, selected_terms );
					} );
				}
			} else {
				$itemsHolder.cvp_shuffle( 'shuffle', 'all' );
			}
		},
		// Filter by single Taxonomy
		_shuffle_filter_single: function ( $filter_bar, $itemsHolder ) {
			var $self = this;

			// Init shuffle
			$self._shuffle_init( $itemsHolder );

			$( pt_cv_data.selectors.foption, $filter_bar ).off( 'click' ).on( 'click', function ( e ) {
				e.preventDefault();

				// Get selected terms
				var group = $( this ).data( 'value' );
				var selected_terms = $self._get_sibling_filter( $filter_bar );
				if ( group !== 'all' ) {
					selected_terms.push( group );
				}
				// Do shuffle
				$self._do_shuffle( selected_terms, $itemsHolder );

				// Other stuff
				if ( group !== 'all' ) {
					$( 'body' ).trigger( _prefix + 'shuffle-clicked', [ $itemsHolder ] );
				}

				// Hide pagination for solved term
				if ( pt_cv_data.sf_solved_term.length > 0 && $.inArray( group, pt_cv_data.sf_solved_term ) >= 0 ) {
					pt_cv_data.sf_term = null;
					$self._pagination_toggle( $itemsHolder );
				} else {
					pt_cv_data.sf_term = group;
					$self._pagination_toggle( $itemsHolder, 1 );
				}
			} );
		},
		// Filter by multiple Taxonomies
		_shuffle_filter_multi: function ( $filter_bar, $itemsHolder ) {
			var $self = this;

			// Init shuffle
			$self._shuffle_init( $itemsHolder );

			// On click filter option
			$( 'li a', $filter_bar ).off( 'click' ).on( 'click', function ( e ) {
				e.preventDefault();

				$( this ).toggleClass( 'selected' );

				// Get selected terms
				var selected_terms = [ ];
				$( '.' + _prefix + 'filter-group' ).find( '.selected' ).each( function () {
					var group = $( this ).data( 'value' );
					if ( group !== 'all' ) {
						selected_terms.push( group );
					}
				} );
				// Do shuffle
				$self._do_shuffle( selected_terms, $itemsHolder );
			} );
		},
		// Shuffle actions
		_shuffle_actions: function ( $itemsHolder ) {
			var $self = this;

			// Finish shuffle
			$itemsHolder.on( 'layout.shuffle', function ( evt, $collection, shuffle ) {
				if ( pt_cv_data.sf_term === null ) {
					return;
				}

				// Get shown posts
				var pids = [ ];
				$collection.$items.each( function () {
					if ( $( this ).hasClass( 'filtered' ) ) {
						pids.push( $( this ).data( 'pid' ) );
					}
				} );
				//console.log( pt_cv_data.sf_term + '#' + JSON.stringify( pids ) );

				// Update current term & shown posts
				$self._set_cookie( 'cvp_sf_term', pt_cv_data.sf_term + '#' + JSON.stringify( pids ) );

				if ( pt_cv_data.sf_term !== 'all' ) {
					$( 'body' ).trigger( _prefix + 'shuffle-finished', [ $itemsHolder ] );
				}
			} );

			// After pagination
			$itemsHolder.on( 'cvp-paginated', function ( e, $loaded_content ) {
				var new_ids = [ ], current_ids = [ ], new_items;

				// Get new posts ID
				$loaded_content.each( function () {
					var pid = $( this ).data( 'pid' );
					if ( pid ) {
						new_ids.push( pid );
					}
				} );

				$itemsHolder.find( pt_cv_data.selectors.item ).each( function () {
					var pid = $( this ).data( 'pid' );
					if ( pid ) {
						current_ids.push( pid );
					}

					if ( $.inArray( pid, new_ids ) >= 0 ) {
						if ( typeof new_items === 'undefined' ) {
							new_items = $( this );
						} else {
							new_items = new_items.add( $( this ) );
						}
					}
				} );

				// Trigger here to work for both cases (have items & no post found)
				$( 'body' ).trigger( _prefix + 'shuffle-appended', [ $itemsHolder ] );

				//console.log( 'new_ids', new_ids );
				if ( new_ids.length ) {
					$itemsHolder.cvp_imagesLoaded( function () {
						$itemsHolder.cvp_shuffle( 'appended', new_items );
					} );
				}

				$itemsHolder.trigger( 'cvp-term-solved', [ new_ids.length ] );
			} );

			// Solve this term
			$itemsHolder.on( 'cvp-term-solved', function ( e, new_items ) {
				if ( pt_cv_data.sf_term === null ) {
					return;
				}

				if ( pt_cv_data.sf_term !== 'all' || !new_items ) {
					//console.log( pt_cv_data.sf_term, 'solved' );

					// Add this term to solved list
					pt_cv_data.sf_solved_term.push( pt_cv_data.sf_term );

					// Hide pagination
					$self._pagination_toggle( $itemsHolder );
				}
			} );
		},
		/**
		 * Style handle when click on filter options
		 *
		 * @returns {undefined}
		 */
		_shuffle_filter_style: function () {
			// Add active class
			var fn_this = function ( $parent, $this ) {
				$parent.children( '.active' ).removeClass( 'active' );
				$this.addClass( 'active' );
			};

			// Button
			$( 'body' ).on( 'click', 'button' + pt_cv_data.selectors.foption, function ( e ) {
				fn_this( $( this ).parent(), $( this ) );
			} );

			// Dropdown
			$( 'body' ).on( 'click', '.dropdown-menu ' + pt_cv_data.selectors.foption, function ( e ) {
				fn_this( $( this ).closest( '.dropdown-menu' ), $( this ).parent() );
				// Update Text
				var selText = $( this ).text();
				$( this ).parents( '.btn-group' ).find( '.dropdown-toggle' ).html( selText + ' <span class="caret"></span>' );
			} );

			// Breadcrumb
			$( 'body' ).on( 'click', '.breadcrumb ' + pt_cv_data.selectors.foption, function ( e ) {
				fn_this( $( this ).closest( '.breadcrumb' ), $( this ).parent() );
			} );
		}
	};

	$( function () {
		// Run at page load
		var $pt_cv_public_js_pro = new $.PT_CV_Public_Pro();

		// Recall when preview/pagination finished
		$( 'body' ).on( _prefix + 'pagination-finished' + ' ' + _prefix + 'pagination-finished-simple', function ( e, pages_holder, $loaded_content ) {
			if ( !pages_holder ) {
				return;
			}

			$pt_cv_public_js_pro.reset_after( 1 );

			// Shuffle filter
			var $filter_bar = pages_holder.closest( pt_cv_data.selectors.view ).prev();
			if ( $filter_bar.is( pt_cv_data.selectors.sfilter ) ) {
				var $itemsHolder = $pt_cv_public_js_pro._shuffle_get_items( $filter_bar );
				$itemsHolder.trigger( 'cvp-paginated', [ $loaded_content ] );
			}
		} );
	} );
}( jQuery ) );