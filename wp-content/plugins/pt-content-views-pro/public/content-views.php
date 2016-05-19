<?php

/**
 * Content Views for Public
 *
 * @package   PT_Content_Views_Pro
 * @author    PT Guy <http://www.contentviewspro.com/>
 * @license   GPL-2.0+
 * @link      http://www.contentviewspro.com/
 * @copyright 2014 PT Guy
 */
class PT_Content_Views_Pro {

	/**
	 * The variable name is used as the text domain when internationalizing strings
	 * of text. Its value should match the Text Domain file header in the main
	 * plugin file.
	 *
	 * @since    1.0.0
	 *
	 * @var      string
	 */
	protected $plugin_slug = 'content-views-pro';

	/**
	 * Instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */
	protected static $instance = null;

	/**
	 * Initialize the plugin by setting localization and loading public scripts
	 * and styles.
	 *
	 * @since     1.0.0
	 */
	private function __construct() {
		// Load plugin text domain
		add_action( 'plugins_loaded', array( $this, 'load_plugin_textdomain' ), 30 );

		// Activate plugin when new blog is added
		add_action( 'wpmu_new_blog', array( $this, 'activate_new_site' ) );

		// Load public-facing style sheet and JavaScript.
		add_action( PT_CV_PREFIX_ . 'frontend_styles', array( $this, 'enqueue_styles' ) );
		add_action( PT_CV_PREFIX_ . 'frontend_scripts', array( $this, 'enqueue_scripts' ) );

		// Output assets content at footer of page
		add_action( 'wp_head', array( __CLASS__, 'print_custom_css' ), 100 );
		add_action( 'wp_footer', array( __CLASS__, 'print_custom_js' ), 100 );

		add_action( 'admin_init', array( __CLASS__, 'action_ck_lcs' ) );

		// Ajax action
		$action = 'share_count';
		add_action( 'wp_ajax_' . $action, array( 'PT_CV_Functions_Pro', 'ajax_callback_' . $action ) );
		add_action( 'wp_ajax_nopriv_' . $action, array( 'PT_CV_Functions_Pro', 'ajax_callback_' . $action ) );

		// Custom hooks for both preview & frontend
		PT_CV_Hooks_Pro::init();
	}

	/**
	 * Return the plugin slug.
	 *
	 * @since    1.0.0
	 *
	 * @return    Plugin slug variable.
	 */
	public function get_plugin_slug() {
		return $this->plugin_slug;
	}

	/**
	 * Return an instance of this class.
	 *
	 * @since     1.0.0
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * Fired when a new site is activated with a WPMU environment.
	 *
	 * @since    1.0.0
	 *
	 * @param    int $blog_id ID of the new blog.
	 */
	public function activate_new_site( $blog_id ) {
		if ( 1 !== did_action( 'wpmu_new_blog' ) ) {
			return;
		}

		switch_to_blog( $blog_id );
		PT_CV_Plugin_Pro_Actions::single_activate();
		restore_current_blog();
	}

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {
		$domain	 = 'content-views-pro';
		// WPLANG is no longer needed since 4.0
		$locale	 = get_locale();

		// Load mo file from sub-folder /languages of this plugin
		load_plugin_textdomain( $domain, FALSE, dirname( plugin_basename( PT_CV_FILE ) ) . '/languages/' );

		// Load mo file from wp-content/languages/content-views-pro/
		load_textdomain( $domain, WP_LANG_DIR . "/{$domain}/{$domain}-{$locale}.mo" );
	}

	/**
	 * Register and enqueue public-facing style sheet.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		PT_CV_Html_Pro::frontend_styles();
	}

	/**
	 * Register and enqueues public-facing JavaScript files.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		PT_CV_Html_Pro::frontend_scripts();
	}

	/**
	 * Print custom CSS
	 *
	 * @return void
	 */
	public static function print_custom_css() {
		$custom_css = PT_CV_Functions::get_option_value( 'custom_css' );
		if ( $custom_css ) {
			echo PT_CV_Html::inline_style( $custom_css, 'custom' );
		}
	}

	/**
	 * Print custom JS
	 *
	 * @return void
	 */
	public static function print_custom_js() {
		// Print custom JS
		$custom_js = PT_CV_Functions::get_option_value( 'custom_js' );
		if ( $custom_js ) {
			echo PT_CV_Html::inline_script( $custom_js, true, 'custom' );
		}

		// Print View JS if it is not printed before
		if ( !empty( $_SESSION[ PT_CV_PREFIX . 'view-css' ] ) ) {
			foreach ( (array) $_SESSION[ PT_CV_PREFIX . 'view-css' ] as $css ) {
				print $css;
			}
		}
	}

	public static function action_ck_lcs() {
		if ( !get_option( 'pt_cv_pro_activate' ) && get_option( 'pt_cv_action_fail' ) < 4 ) {
			PT_CV_Plugin_Pro_Actions::request_cvpsys( 'activate' );
		}
	}

}
