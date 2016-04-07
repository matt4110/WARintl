<?php
/*
Plugin Name: Cool Video Gallery
Description: Cool Video Gallery, a video gallery plugin to manage video galleries. Feature to upload videos, attach Youtube videos, media files from library and group them into galleries is available. Option to play videos using Fancybox. Supports '.flv', '.mp4', '.m4v', '.mov' and '.mp3' files playback. 
Version: 2.1
Author: Praveen Rajan
Text Domain: cool-video-gallery
Domain Path: /languages
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
	
	Copyright 2016  Praveen Rajan
	
	Cool Video Gallery is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 2 of the License, or
	any later version.
	 
	Cool Video Gallery is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
	GNU General Public License for more details.
	 
	You should have received a copy of the GNU General Public License
	along with Cool Video Gallery. If not, write to the Free Software Foundation, Inc.,
 	51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA
 	
 	Please see license.txt for the full license.
*/
?>
<?php
global $wp_version;
if (version_compare ( $wp_version, "3.0", "<" )) { 
	wp_die("This plugin requires WordPress version 3.0.1 or higher.");
}

if ( !class_exists('CoolVideoGallery') ) {
	/**
	 * Class declaration for cool video gallery
	 * @author Praveen Rajan
	 */
	class CoolVideoGallery{
		
		var $plugin_url;
		var $table_gallery;
		var $table_videos;
		var $default_gallery_path;
		var $winabspath;
		var $video_player_path;
		var $video_player_url;
		var $video_id;
		var $cvg_version = '2.1';
		
		var $video_type_upload;
		var $video_type_youtube;
		
		var $allowed_extension;
		
		protected static $instance = NULL;
		
		/**
		 * Constructor class for CoolVideoGallery
		 */
		function CoolVideoGallery(){
			
			$this->plugin_url = trailingslashit( WP_PLUGIN_URL . '/' .	dirname( plugin_basename(__FILE__)));
			$this->video_player_url = trailingslashit( WP_PLUGIN_URL . '/' .	dirname( plugin_basename(__FILE__)) . '/cvg-player' );
			$this->video_player_path = trailingslashit( WP_CONTENT_DIR . '/plugins/' .	dirname( plugin_basename(__FILE__)) . '/cvg-player/' );
			
			$this->table_gallery = '';
			$this->table_videos = '';
			$this->video_id = '';
			
			$this->video_type_upload = "upload";
			$this->video_type_youtube = "youtube";
			$this->video_type_media = "media";
			 
			/**
			 * Video file types supported.
			 * 
			 * @Warning: Editing/Adding can cause the plugin to malfunction. Do it at your own risk :)
			 */
			$this->allowed_extension = array('mp4', 'flv', 'MP4', 'FLV', 'mov', 'MOV', 'mp3', 'MP3', 'm4v', 'M4V');
			
			if (function_exists('is_multisite') && is_multisite()) {
				$this->default_gallery_path = get_option('upload_path') . '/video-gallery/' ;
			}else{
				$this->default_gallery_path =  'wp-content/uploads/video-gallery/';
			}
		
			$this->winabspath =  str_replace("\\", "/", ABSPATH);
			
			$this->load_video_files();
			
			//adds scripts and css stylesheets
			add_action('wp_print_scripts', array(&$this, 'gallery_script'));
			
			//adds admin menu options to manage
			add_action('admin_menu', array(&$this, 'admin_menu'));
			
			//adds admin menu options at topbar to manage
			if ( is_admin() ) 
				add_action( 'admin_bar_menu', array(&$this, 'admin_bar_menu_cvg'), 100 );
			
			//adds contextual help for all menus of plugin
			add_action('admin_init',  array(&$this, 'add_gallery_contextual_help'));
			 
			//adds player options to head
			add_action('wp_head', array(&$this, 'addPlayerHeader'));
	 		add_action('admin_head', array(&$this, 'addPlayerHeader'));
	 		
	 		// dashboard widget
	 		add_action('wp_dashboard_setup', array(&$this,'cvg_custom_dashboard_widgets'));
	 		
	 		// add shortcodes
	 		add_shortcode('cvg-gallery', array(&$this,'cvg_gallery_shortcode') );
	 		add_shortcode('cvg-video', array(&$this,'cvg_video_shortcode') );
	 		
	 		// check plugin upgrades
	 		add_action( 'plugins_loaded', array(&$this,'cvg_plugin_loaded'));
	 		
	 		// Additional links on the plugin page
	 		add_filter('plugin_row_meta', array(&$this, 'add_plugin_page_links'), 10, 2);
	 		
		}
		
		/**
		 * Returns an instance of CoolVideoGallery plugin class
		 */
		public static function get_instance() {
		
			// create an object
			NULL === self::$instance and self::$instance = new self;
		
			return self::$instance; // return the object
		}
		
		/**
		 * Function to install cool video gallery plugin
		 */
		function cvg_install(){
			global $wpdb;
			
			if (function_exists('is_multisite') && is_multisite()) {
				// check if it is a network activation - if so, run the activation function for each blog id
				if (isset($_GET['networkwide']) && ($_GET['networkwide'] == 1)) {
					
					$old_blog = $wpdb->blogid;
					// Get all blog ids
					$blogids = $wpdb->get_col($wpdb->prepare("SELECT blog_id FROM $wpdb->blogs", null));
					foreach ($blogids as $blog_id) {
						switch_to_blog($blog_id);
						$this->_cvg_activate();
					}
					switch_to_blog($old_blog);
					return;
				}
			}
			$this->_cvg_activate();
			
		}		
		
		/**
		 * Function to create database for plugin.
		 */
		function _cvg_activate() {
			
			global $wpdb;
			
	        $sub_name_gallery = 'cvg_gallery';
	        $sub_name_videos = 'cvg_videos';
	        
	        $this->table_gallery  = $wpdb->prefix . $sub_name_gallery;
	        $this->table_videos = $wpdb->prefix . $sub_name_videos;
	        
			if($wpdb->get_var("SHOW TABLES LIKE '$this->table_gallery'") != $this->table_gallery) {
			
				$sql = "CREATE TABLE " . $this->table_gallery . " (
						 	  `gid` bigint(20) NOT NULL auto_increment,
							  `name` varchar(255) NOT NULL,
							  `path` mediumtext,
							  `title` mediumtext,
							  `galdesc` mediumtext,
							  `author` bigint(20) NOT NULL default '0',
							  PRIMARY KEY  (`gid`)
						) CHARSET=utf8 COLLATE=utf8_unicode_ci ;";
				require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
				dbDelta($sql);
			}
			
			if($wpdb->get_var("SHOW TABLES LIKE '$this->table_videos'") !=  $this->table_videos) {
				
					$sql_video = "CREATE TABLE " .  $this->table_videos . " (
							 		`pid` bigint( 20  ) NOT NULL AUTO_INCREMENT  ,
									`galleryid` bigint( 20 ) NOT NULL DEFAULT '0',
									`filename` varchar( 255 ) NOT NULL ,
									`thumb_filename` varchar( 255 ) NOT NULL ,
									`video_title` mediumtext NULL,
									`description` mediumtext,
									`sortorder` BIGINT( 20 ) NOT NULL DEFAULT '0',
									`alttext` mediumtext,
									`videodate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
									`meta_data` longtext,
									`video_type` varchar( 20 ) NOT NULL DEFAULT '". $this->video_type_upload ."',
									`exclude` tinyint(5) NOT NULL DEFAULT '0',
									PRIMARY KEY ( `pid` )
							) CHARSET=utf8 COLLATE=utf8_unicode_ci ;";
					require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
					dbDelta($sql_video);
			}
			
			 $installed_ver = get_option( "cvg_version" );
			 
			 // For version 1.2
			 if (version_compare($installed_ver, '1.3', '<')) {
			 	$sql_update = "ALTER TABLE " .  $this->table_videos . " ADD `sortorder` BIGINT( 20 ) NOT NULL DEFAULT '0' AFTER `description`" ;
				require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			 	$wpdb->query($sql_update);
			 }
			 
			//Section to save gallery settings.
			$options = array();
			$options['max_cvg_gallery'] = 10;
			$options['max_vid_gallery'] = 10;
			$options['cvg_preview_height'] = 100;
			$options['cvg_preview_width'] = 100;
			$options['cvg_preview_quality'] = 70;
			$options['cvg_zc'] = 0;
			$options['cvg_slideshow'] = 7000;
			$options['cvg_description'] = 1;
			$options['cvg_gallery_description'] = 1;
			$options['cvg_ffmpegpath']= '/Applications/ffmpegX.app/Contents/Resources/ffmpeg';
			$options['cvg_random_video'] = 0;
			$options['cvg_youtubeapikey'] = '';
			
			update_option('cvg_settings', $options);
			
			//Section to save player settings.
			$options_player = array();
			$options_player['cvgplayer_width'] = 400;
			$options_player['cvgplayer_height'] = 400;
			$options_player['cvgplayer_skin'] = '';
			$options_player['cvgplayer_volume'] = 70;
			$options_player['cvgplayer_fullscreen'] = 1;
			$options_player['cvgplayer_controlbar'] = 'bottom';
			$options_player['cvgplayer_autoplay'] = 1;
			$options_player['cvgplayer_mute'] = 0;
			$options_player['cvgplayer_auto_close_single'] = 1;
			$options_player['cvgplayer_stretching'] = 'fill';
			$options_player['cvgplayer_playlist'] = 'right';
			$options_player['cvgplayer_playlist_width'] = 100;
			$options_player['cvgplayer_playlist_height'] = 100;
			$options_player['cvgplayer_share_option'] = 0;
			
			update_option('cvg_player_settings', $options_player);
			update_option('cvg_version', $this->cvg_version);
		}
		
		/**
		 * Function to deactivate plugin
		 */
		function cvg_deactivate_empty() {
		
		}
		
		/**
		 * Function to uninstall plugin
		 */
		function cvg_uninstall(){
			
			global $wpdb;
			
			if (function_exists('is_multisite') && is_multisite()) {

				$old_blog = $wpdb->blogid;
				// Get all blog ids
				$blogids = $wpdb->get_col($wpdb->prepare("SELECT blog_id FROM $wpdb->blogs", null));
				foreach ($blogids as $blog_id) {
					switch_to_blog($blog_id);
					$this->_cvg_deactivate();
				}
				switch_to_blog($old_blog);
				return;
			}
			
			$this->_cvg_deactivate();
		}
		
		/**
		 * Function to delete tables of plugins
		 */
		function _cvg_deactivate() {
			
			global $wpdb;
			$sub_name_gallery = 'cvg_gallery';
	        $sub_name_videos = 'cvg_videos';
	        
	        $this->table_gallery  = $wpdb->prefix . $sub_name_gallery;
	        $this->table_videos = $wpdb->prefix . $sub_name_videos;
	        
		  	$wpdb->query("DROP TABLE $this->table_gallery");
		  	$wpdb->query("DROP TABLE $this->table_videos");
		  	
		  	if (function_exists('is_multisite') && is_multisite()) {
				$gallery_path = get_option('upload_path') . '/video-gallery/' ;
			}else{
				$gallery_path =  'wp-content/uploads/video-gallery/';
			}
			
			$cvg_core = new CvgCore();
			$cvg_core->deleteDir( ABSPATH . $gallery_path ); 
			
		}
		
		/**
		 * Function to update databse during function upgrade
		 */
		function cvg_plugin_loaded() {
		
			global $wpdb;
				
			$sub_name_gallery = 'cvg_gallery';
			$sub_name_videos = 'cvg_videos';
			 
			$this->table_gallery  = $wpdb->prefix . $sub_name_gallery;
			$this->table_videos = $wpdb->prefix . $sub_name_videos;
			 
			$installed_ver = get_option( "cvg_version" );
			
			if (version_compare($installed_ver, '1.5', '<')) {
					
				$sql_update = "ALTER TABLE " .  $this->table_videos . " ADD `video_type` varchar( 20 ) NOT NULL DEFAULT '". $this->video_type_upload . "' AFTER `meta_data`" ;
				require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
				$wpdb->query($wpdb->prepare($sql_update, null));
			}
				
			if (version_compare($installed_ver, '1.7', '<')) {
					
				$sql_update = "ALTER TABLE " .  $this->table_videos . " ADD `video_title` varchar( 20 ) NULL AFTER `thumb_filename`" ;
				require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
				$wpdb->query($wpdb->prepare($sql_update, null));
			}
				
			if (version_compare($installed_ver, '1.8', '<')) {
					
				$sql_update = "ALTER TABLE " .  $this->table_videos . " ADD `exclude` tinyint(5) NOT NULL DEFAULT '0' AFTER `video_type`" ;
				require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
				$wpdb->query($wpdb->prepare($sql_update, null));
					
				$sql_update_video_text = "ALTER TABLE " .  $this->table_videos . " MODIFY `video_title` mediumtext" ;
				$wpdb->query($wpdb->prepare($sql_update_video_text, null));
			}
				
			$sql_collation_update_videos = "ALTER TABLE " . $this->table_videos . " CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;";
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			$wpdb->query($sql_collation_update_videos);
			
			$sql_collation_update_gallery = "ALTER TABLE " .  $this->table_gallery . " CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;";
			$wpdb->query($sql_collation_update_gallery);
			
			if($installed_ver != $this->cvg_version) {
					
				update_option('cvg_version', $this->cvg_version);
			}

			// Change introduced in 2.1 version
			$options = get_option('cvg_settings');
			// Gallery Settings not available
			if(!isset($options['cvg_gallery_description'])) {
				
				$options['cvg_gallery_description'] = 1;
				update_option('cvg_settings', $options);
			}
			
			// Load text domain
			load_plugin_textdomain('cool-video-gallery', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
		}
		
		/**
		 * Function to add main menu and submenus to admin panel
		 */
		function admin_menu() {
			
			$parent_slug = "cvg-gallery-overview";
			
			add_menu_page(__('Video Gallery Overview', 'cool-video-gallery'), __('Video Gallery', 'cool-video-gallery'), 'manage_options', $parent_slug , array( $this, 'gallery_overview'), $this->plugin_url .'/images/video_small.png');
			
			add_submenu_page( $parent_slug, __('Video Gallery Overview', 'cool-video-gallery'), __('Overview', 'cool-video-gallery'), 'manage_options', 'cvg-gallery-overview',array($this, 'gallery_overview'));
			add_submenu_page( $parent_slug, __('Add Gallery / Upload Videos', 'cool-video-gallery'), __('Add Gallery / Videos', 'cool-video-gallery'), 'manage_options', 'cvg-gallery-add',array($this, 'gallery_add'));
			add_submenu_page( $parent_slug, __('Manage Video Gallery', 'cool-video-gallery'), __('Manage Gallery', 'cool-video-gallery'), 'manage_options', 'cvg-gallery-manage',array($this, 'gallery_manage'));
			add_submenu_page( $parent_slug, __('Gallery Settings', 'cool-video-gallery'), __('Gallery Settings', 'cool-video-gallery'), 'manage_options', 'cvg-gallery-settings',array($this, 'gallery_settings'));
			add_submenu_page( $parent_slug, __('Video Player Settings', 'cool-video-gallery'), __('Video Player Settings', 'cool-video-gallery'), 'manage_options', 'cvg-player-settings',array($this, 'player_settings'));
			add_submenu_page( $parent_slug, __('CVG Video Sitemap', 'cool-video-gallery'), __('Google Video Sitemap', 'cool-video-gallery'), 'manage_options', 'cvg-video-sitemap',array($this, 'video_sitemap'));
			add_submenu_page( $parent_slug, __('CVG Uninstall', 'cool-video-gallery'), __('Uninstall CVG', 'cool-video-gallery'), 'manage_options', 'cvg-plugin-uninstall',array($this, 'uninstall_plugin'));
		}
		
		/**
		 * Function to add admin_bar_menu at top.
		 */
		function admin_bar_menu_cvg() {
		
			global $wp_admin_bar;
		
			$wp_admin_bar->add_menu( array( 'id' => 'cvg-menu', 'title' => __( 'CVG', 'cool-video-gallery'), 'href' => admin_url('admin.php?page=cvg-gallery-overview') ) );
			$wp_admin_bar->add_menu( array( 'parent' => 'cvg-menu', 'id' => 'cvg-menu-add-gallery-video', 'title' => __('Add Gallery / Videos', 'cool-video-gallery'), 'href' => admin_url('admin.php?page=cvg-gallery-add') ) );
			$wp_admin_bar->add_menu( array( 'parent' => 'cvg-menu', 'id' => 'cvg-menu-manage-gallery', 'title' => __('Manage Gallery', 'cool-video-gallery'), 'href' => admin_url('admin.php?page=cvg-gallery-manage') ) );
			$wp_admin_bar->add_menu( array( 'parent' => 'cvg-menu', 'id' => 'cvg-menu-gallery-settings', 'title' => __('Gallery Settings', 'cool-video-gallery'), 'href' => admin_url('admin.php?page=cvg-gallery-settings') ) );
			$wp_admin_bar->add_menu( array( 'parent' => 'cvg-menu', 'id' => 'cvg-menu-player-settings', 'title' => __('Video Player Settings', 'cool-video-gallery'), 'href' => admin_url('admin.php?page=cvg-player-settings') ) );
			$wp_admin_bar->add_menu( array( 'parent' => 'cvg-menu', 'id' => 'cvg-menu-google-sitemap', 'title' => __('Google Video Sitemap', 'cool-video-gallery'), 'href' => admin_url('admin.php?page=cvg-video-sitemap') ) );
			$wp_admin_bar->add_menu( array( 'parent' => 'cvg-menu', 'id' => 'cvg-menu-uninstall', 'title' => __('Uninstall', 'cool-video-gallery'), 'href' => admin_url('admin.php?page=cvg-plugin-uninstall') ) );
		}
		
		function add_plugin_page_links($links, $file) {
			
			if($file == plugin_basename( basename(dirname(__FILE__)).'/'.basename(__FILE__))) {
				$links[] = '<a href="https://wordpress.org/support/plugin/cool-video-gallery/">' . __('Support', 'sitemap') . '</a>';
			}
			return $links;
		}
		
		/**
		 * Function to add contextual help for each menu of plugin page.
		 */
		function add_gallery_contextual_help(){
			
			$help_array = array('toplevel_page_cvg-gallery-overview', 'video-gallery_page_cvg-gallery-add', 'video-gallery_page_cvg-gallery-manage', 'video-gallery_page_cvg-gallery-details', 'video-gallery_page_cvg-gallery-sort', 'video-gallery_page_cvg-gallery-settings', 'video-gallery_page_cvg-player-settings', 'video-gallery_page_cvg-plugin-uninstall', 'video-gallery_page_cvg-video-sitemap' );
			foreach($help_array as $help) {
				
				add_filter( 'contextual_help', array(&$this, 'cvg_contextual_help') , $help, 2);
			}	
		}
		
		/**
		 * Function to add contextual help for each menu
		 * 
		 * @param $contextual_help - Contextual Help
		 * @param $screen_id - Screen Id
		 */
		function cvg_contextual_help( $contextual_help, $screen_id) {
			
			$help_content = "";
			$screen_title = "";
			
			switch($screen_id) {
					case 'toplevel_page_cvg-gallery-overview':
										$help_content = '<p>An overview about the total number of galleries and videos added using this plugin is shown here. Server information is also provided to show the maximum file upload limit of PHP. Inaddition to this it shows whether <b>FFMPEG</b> is installed in the webserver. Preview images are automatically generated for videos added if FFMPEG is installed. Otherwise images should be manually uploaded for videos added.</p>';
										$help_content .= '<p><b>Instructions to use <i>Cool Video Gallery</i>:</b></p>';
										$help_content .= '<p><ol><li> Add a gallery and upload some videos from the admin panel to that gallery.</li>'.
														 '<li>Use either `<b>CVG Slideshow</b>` or `<b>CVG Showcase</b>` widget to play slideshow of uploaded videos in a gallery.</li>'.	
														 '<li>Go to your post/page and enter the tag `<b>[cvg-video videoid=</b>vid<b>]</b>` (where vid is video id) to add video '.
														 'or enter the tag `<b>[cvg-gallery galleryid=</b>gid<b>]</b>` (where gid is gallery id) to add a complete gallery.</li>'.			
														 '<li>Inorder to use slideshow and showcase in custom templates created use the function `<b>cvgShowCaseWidget(</b>gid<b>)</b>` and `<b>cvgSlideShowWidget(</b>gid<b>)</b>` (where gid is gallery id).</li></ol></p>';
										$screen_title = 'Overview';
										
										break;
					case 'video-gallery_page_cvg-gallery-add':
										$help_content = '<p>This page provides three tabs to add gallery, upload videos and add Youtube videos. <ul><li>`Add new gallery` tab provides option to add new video galleries.</li><li>`Upload videos` tab provides option to upload mulitple videos to a selected gallery.</li><li>`Attach Media` tab provides option to attach media from library to video galleries.</li><li>`Youtube Videos` tab lets you add Youtube videos to a gallery.</li></p>';
										$screen_title = 'Add Gallery / Videos';
										
										break;	
					case 'video-gallery_page_cvg-gallery-manage':
					
										if(isset($_GET['gid']) && !isset($_GET['order'])) {
											$help_content = '<p>Displays the details of a particular gallery. <ul><li>Name and description of the gallery can be updated</li><li>Lists all video(s) in a gallery</li><li>Bulk deletion and sorting of videos available</li>';
											$help_content .= '<li>Scan gallery folder for manually uploaded video(s) <i><a onclick="showHelpDialogForScanVideos();">Learn More</a></i></li><li>Upload preview thumbnail for video(s)</li><li>Option to exclude video(s) from gallery</li><li>Publish individual video(s) as post</li><li>Generate shortcode for video(s)</li><li>Move video(s) from one gallery to another</li></ul></p>';
											$screen_title = 'Gallery Details';
											
										}else if(isset($_GET['order'])){
											$help_content = '<p>Options to sort videos in a gallery. <ul><li>Sort by Video ID, Name or Date</li><li>Drag-drop to change video order</li></ul></p>';
											$screen_title = 'Sort Gallery';
											
										}else {
											$help_content = '<p>Lists the different galleries created and provide details like <ul><li>Total number of videos</li><li>Author of gallery</li><li>Description of gallery</li><li>Option to publish a gallery</li><li>Option to delete a gallery</li><li>Generate shortcode for gallery</li></ul>Option provided to perform bulk deletion of galleries.</p>';
											$screen_title = 'Manage Gallery';
											
										}
										
										break;
					case 'video-gallery_page_cvg-gallery-settings':
										$help_content = '<p>Shows the different options available for listing and managing a gallery.</p>';
										$screen_title = 'Gallery Settings';
										
										break;	
					case 'video-gallery_page_cvg-player-settings':
										$help_content = '<p>Options to manage different options of video player is provided here.</p>';
										$screen_title = 'Player Settings';
										
										break;
					case 'video-gallery_page_cvg-video-sitemap':
										$help_content = '<p>Option to generate XML Sitemap for videos.</p>';
										$screen_title = 'Video Sitemap';
										
										break;						
					case 'video-gallery_page_cvg-plugin-uninstall':
										$help_content = '<p>Option to uninstall plugin.</p>';
										$screen_title = 'Plugin Uninstall';
										
										break;	
															
				}

			$screen = get_current_screen();

			$help_array = array('toplevel_page_cvg-gallery-overview', 'video-gallery_page_cvg-gallery-add', 'video-gallery_page_cvg-gallery-manage', 'video-gallery_page_cvg-gallery-details', 'video-gallery_page_cvg-gallery-sort', 'video-gallery_page_cvg-gallery-settings', 'video-gallery_page_cvg-player-settings', 'video-gallery_page_cvg-plugin-uninstall', 'video-gallery_page_cvg-video-sitemap');
			
			if(in_array($screen->base, $help_array)) {
			
				$screen->add_help_tab( array(
			        'id'      => $screen_id,
			        'title'   => __( $screen_title, 'cool-video-gallery' ),
			        'content' => __($help_content, 'cool-video-gallery'),
			    ));
			    return $contextual_help;
			}
		}
		
		/**
		 * Function to include gallery overview page
		 */
		function gallery_overview() {
			include('admin/gallery-overview.php');
		}

		/**
		 * Function to include gallery add page
		 */
		function gallery_add() {
			include('admin/gallery-add.php');
		}
		
		/**
		 * Function to include gallery manage page
		 */
		function gallery_manage() {
			
			if(isset($_GET['gid']) && !isset($_GET['order'])) {
				
				include('admin/gallery-details.php');
				
			}else if(isset($_GET['order'])){
			
				include('admin/gallery-sort.php');
				
			}else {
				
				include('admin/gallery-manage.php');
			}
		}
		
		/**
		 * Function to include gallery settings page
		 */
		function gallery_settings() {
			include('admin/gallery-settings.php');
		}
		
		/**
		 * Function to include player settings page
		 */
		function player_settings() {
			include('admin/player-settings.php');	
		}
		
		/**
		 * Function to include video xml sitemap page
		 */
		function video_sitemap() {
			include('admin/video-sitemap.php');	
		}
		
		/**
		 * Function to include plugin uninstall page
		 */
		function uninstall_plugin(){
			include('admin/plugin-uninstall.php');	
		} 
		
		/**
		 * Function to include plugin description in WordPress Admin dashboard page
		 */
		function cvg_custom_dashboard_widgets(){
			
			wp_add_dashboard_widget( 'cvg_admin_section', __('Cool Video Gallery' , 'cool-video-gallery'), array(&$this, 'CVGGallery_AdminNotices'));
		}
		
		/**
		 * Display CVG overview in WordPress dashboard
		 */
		function CVGGallery_AdminNotices() {
			$cvg_core = new CvgCore();
			$cvg_core->gallery_overview();
		}
		/**
		 * Function to include scripts
		 */
		function gallery_script() {
			
			echo "<!-- Cool Video Gallery Script starts here -->";
			
			wp_enqueue_script('jquery');
			wp_enqueue_script('jquery.slideshow', $this->plugin_url . 'third_party_lib/jquery.utils/jquery.slideshow.js', 'jquery');
			wp_enqueue_script('jquery.stripslashes', $this->plugin_url . 'third_party_lib/jquery.utils/jquery.stripslashes.js', 'jquery');
			wp_enqueue_style('cvg-styles', $this->plugin_url . 'css/cvg-styles.css', '');

			echo "<!-- Cool Video Gallery Script ends here -->";
		}
		
		/**
		 * Function to load required files.
		 */	
		function load_video_files() {
			require_once('lib/video-db.php');
			require_once('lib/core.php');
			require_once('lib/youtube.php');
			require_once('widgets/widgets.php');	
			require_once('tinymce/tinymce.php');
			require_once('cvg-player/core-functions.php');
		}
		
		/**
		 * Shortcode Function to render gallery.
		 * 
		 * @param $arguments - input arguments.
		 * @return Gallery.
		 */
		 function cvg_gallery_shortcode($arguments) {
			
			$output = '';
			
			$gallery_id = $arguments ['galleryid'];
			
			if (isset ( $arguments ['limit'] ))
				$limit = $arguments ['limit'];
			else
				$limit = 0;
			
			if (isset ( $arguments ['mode'] )) {
				$mode = $arguments ['mode'];
				
				if ($mode ==  'playlist') {
					$output = $this->CVG_render_playlist ( $gallery_id );
					return $output;
				}
				if ($mode == 'slideshow')
					$slide = true;
				elseif ($mode == 'showcase')
					$slide = false;
			} else {
				$slide = false;
			}
			
			$cvg_core = new CvgCore();
			$output = $cvg_core->videoShowGallery ( $gallery_id, $slide, $limit );
			
			return $output;
		}
		
		/**
		 * Shotcode Function to render videos
		 * @param $arguments - input arguments.
		 * @return video
		 */
		function cvg_video_shortcode($arguments) {
			
			return $this -> CVGVideo_Render($arguments);
		}
		
		/**
		 * Function to render video player.
		 * 
		 * @param $arguments - input arguments.
		 * @return player code.
		 */
		function CVGVideo_Render($arguments){
			
			$output = '';
			
			$cvg_videodb = new CvgVideoDB();
			$video_details = $cvg_videodb->find_video($arguments['videoid']);
			
			if(!is_array($video_details))
				return __('[Video not found]', 'cool-video-gallery');
			
			$options = get_option('cvg_settings');
				
			$video = array();
			
			if($video_details[0]->video_type == $this->video_type_upload) {
					
				// Upload file type		
				$video['filename'] = site_url()  . '/' . $video_details[0]->path . '/' . $video_details[0]->filename;
				$video['thumb_filename'] =  $video_details[0]->path . '/thumbs/' . $video_details[0]->thumb_filename;
			
				if(!file_exists(ABSPATH . '/' .$video['thumb_filename']))
					$video['thumb_filename']  = WP_CONTENT_URL .  '/plugins/' . dirname( plugin_basename(__FILE__)) . '/images/default_video.png';
				else 
					$video['thumb_filename'] =	site_url() . '/' . $video['thumb_filename'];
			
			}else if($video_details[0]->video_type == $this->video_type_youtube){
				
				// Youtube file type
				$video['filename'] =  $video_details[0]->filename;
				$video['thumb_filename'] =  $video_details[0]->thumb_filename;
				
			}else if($video_details[0]->video_type == $this->video_type_media) {
				
				// Media file type
				$video['filename'] =  $video_details[0]->filename;
				$video['thumb_filename'] =  $video_details[0]->path . '/thumbs/' . $video_details[0]->thumb_filename;
			
				if(!file_exists(ABSPATH . '/' .$video['thumb_filename']))
					$video['thumb_filename']  = WP_CONTENT_URL .  '/plugins/' . dirname( plugin_basename(__FILE__)) . '/images/default_video.png';
				else 
					$video['thumb_filename'] =	site_url() . '/' . $video['thumb_filename'];
			
			}else {
				
				// Upload file type		
				$video['filename'] = site_url()  . '/' . $video_details[0]->path . '/' . $video_details[0]->filename;
				$video['thumb_filename'] =  $video_details[0]->path . '/thumbs/' . $video_details[0]->thumb_filename;
			
				if(!file_exists(ABSPATH . '/' .$video['thumb_filename']))
					$video['thumb_filename']  = WP_CONTENT_URL .  '/plugins/' . dirname( plugin_basename(__FILE__)) . '/images/default_video.png';
				else 
					$video['thumb_filename'] =	site_url() . '/' . $video['thumb_filename'];
			}			
			
			if($options['cvg_description'] == 1)			
				$video['title'] = $video_details[0]->description;
			else 
				$video['title'] = '';
							
			$video['name']	= $video_details[0]->name;
			if ( !array_key_exists('filename', $video) ){
				return __('Error: Required parameter "filename" is missing!', 'cool-video-gallery');
			}
					
			$options_player = get_option('cvg_player_settings');
			
			$thumb_width = $options['cvg_preview_width'];
			$thumb_height = $options['cvg_preview_height'];
			
			if(isset($arguments['width'])) 
				$player_width = $arguments['width'];
			else
				$player_width = $options_player['cvgplayer_width'];

			if(isset($arguments['height'])) 
				$player_height = $arguments['height'];
			else
				$player_height = $options_player['cvgplayer_height'];
				
			if($options_player['cvgplayer_autoplay'] == 1)
				$autoplay = "true";
			else 
				$autoplay = "false";	
			
			if($options_player['cvgplayer_mute'] == 1)
				$mute = "true";
			else 
				$mute = "false";
			
			if($options_player['cvgplayer_share_option'] == 1)
				$player_swf = "player-share.swf";
			else 
				$player_swf = "player.swf";
				
			$skin_url = "";
			if($options_player['cvgplayer_skin'] != "") {
			
				$skin_url = $this->video_player_url . 'skins/' . $options_player['cvgplayer_skin'] . '-skin/' . $options_player['cvgplayer_skin']  . '.xml';
			}
				
			//Embed section for a video
			if(isset($arguments['mode']) && $arguments['mode'] == "playlist") {
				
				$video_display = '<div id="mediaplayer_vid_'.$arguments['videoid'].'">';
				$video_display .= '</div>';
				?>
					<script type="text/javascript">
					jQuery(document).ready(function(){
						
						jwplayer("<?php echo "mediaplayer_vid_".$arguments['videoid']; ?>").setup({
							"autostart" : "<?php echo $autoplay;?>",
							"controlbar" : "<?php echo $options_player['cvgplayer_controlbar']; ?>",
							"file" : "<?php echo $video['filename'];?>",
							"flashplayer" : "<?php echo $this->plugin_url . "cvg-player/" . $player_swf; ?>",
							"volume" : "<?php echo $options_player['cvgplayer_volume']; ?>",
							"width" : "<?php echo $options_player['cvgplayer_width'] ; ?>",
							"height" : "<?php echo $options_player['cvgplayer_height']; ?>",
							"image" : "<?php echo $video['thumb_filename'] ; ?>",
							"mute" : "<?php echo $mute; ?>",
							"stretching" : "<?php echo $options_player['cvgplayer_stretching']; ?>",
							"skin" : "<?php echo $skin_url; ?>"
						});

						<?php if($video_details[0]->video_type == $this->video_type_youtube){ ?>
						
							jwplayer("<?php echo "mediaplayer_vid_".$arguments['videoid']; ?>").onError(function(error) {
								if(error.type == "jwplayerError") {
									
									if(error.message.indexOf("2035") > -1) {
										// Youtube HTML5 Error
										
										var cvg_gallery_video_current_url = "<?php echo $video['filename'];?>";
										
										var cvg_youtube_video_id = cvg_gallery_video_current_url.split('v=')[1];
										var ampersandPosition = cvg_youtube_video_id.indexOf('&');
										if(ampersandPosition != -1) {
											
											  cvg_youtube_video_id = cvg_youtube_video_id.substring(0, ampersandPosition);
										}

										var errorHTML5Text = '<?php _e('Error loading Youtube Video. Web Browser not supporting Flash video playback. Switching to Youtube iFrame Player. Please wait!!!', 'cool-video-gallery'); ?>';
										var errorHTML5PlayerDivContent = '<div class="cvg-html5-youtube-error"><div class="cvg-html5-youtube-error-inner"><img src="<?php echo $this->plugin_url . "cvg-player/cvg-ajax-loader.gif"; ?>" /><p>'+errorHTML5Text+'</p></div></div>';
										
										jQuery('#mediaplayer_vid_<?php echo $arguments['videoid'];?>_wrapper').empty();
										jQuery('#mediaplayer_vid_<?php echo $arguments['videoid'];?>_wrapper').append("<div id='cvg_youtube_player_<?php echo $arguments['videoid'];?>' style='height:100%;'>"+errorHTML5PlayerDivContent+"</div>");
	
										setTimeout(function() {
											var cvg_youtube_iframe_player = new YT.Player('cvg_youtube_player_<?php echo $arguments['videoid'];?>', {
										          height: parseInt("<?php echo $options_player['cvgplayer_height']; ?>") ,
										          width: parseInt("<?php echo $options_player['cvgplayer_width'] ; ?>") ,
												      videoId: cvg_youtube_video_id,
											      events: {
												      	'onReady' : function(event) {
	
												      		cvg_youtube_iframe_player.unMute();
												      		<?php if($options_player['cvgplayer_mute'] == 1)  { ?>
												      			cvg_youtube_iframe_player.mute();
												      		<?php } ?>
	
												      		cvg_youtube_iframe_player.setVolume('<?php echo $options_player['cvgplayer_volume']; ?>');
												      	}
											      },
											      playerVars : {
														'autoplay': 1,
														'color' : 'white',
														'rel': 0,
														'showinfo' : 0
											      }
											});
											
										}, 4000);	
									}
								} 
							});

						<?php }?>
					});
					</script>
				<?php 
				$video_display .= '<div><br clear="all" /> </div>';
				return $video_display;
				
			}else if(isset($arguments['mode']) && $arguments['mode'] == "list_items") {
				
				//List of videos section for a gallery
				$cvg_videodb = new CvgVideoDB();
				$videoDetails = $cvg_videodb->find_video($arguments["videoid"]); 	
				$gallery_id = $videoDetails[0]->galleryid;

				$output .=  '<a href="' . $video['filename'] . '" title="' . stripslashes($video['title']) . '"  rel="fancy_cvg_gallery_'.$gallery_id.'_'. $arguments['placeholder'].'" style="position:relative;float:left;height:'.$thumb_height.'px !important;">' ;
				$output .=  '<img src="' .$video['thumb_filename'] . '" style="width:' . $thumb_width . 'px;height:' . $thumb_height .'px;max-width:100% !important;" ' ;
				$output .=  'alt="' . __('Click to Watch Video', 'cool-video-gallery') . '" /><div style="width:' . $thumb_width . 'px;"></div></a>';
				
			}else if(isset($arguments['mode']) && $arguments['mode'] == "slide_show") {
				
				//List of videos section for a gallery
				$cvg_videodb = new CvgVideoDB();
				$videoDetails = $cvg_videodb->find_video($arguments["videoid"]); 	
				$gallery_id = $videoDetails[0]->galleryid;
				
				$output .=  '<a href="' . $video['filename'] . '" title="' . stripslashes($video['title']) . '"  rel="fancy_cvg_gallery_slide_'.$gallery_id.'_'. $arguments['placeholder'] .'">' ;
				$output .=  '<img  src="' .$video['thumb_filename'] . '" style="width:' . $thumb_width . 'px;height:' . $thumb_height .'px;max-width:100% !important;" ' ;
				$output .=  'alt="' . __('Click to Watch Video', 'cool-video-gallery') . '" /></a>';
				
			}else {
				
				// Single video display
				$output .= '<a href="' . $video ['filename'] . '" title="' . stripslashes ( $video ['title'] ) . '"  rel="fancy_cvg_video_' . $arguments ['videoid'] . '">';
				$output .= '<img src="' . $video ['thumb_filename'] . '" style="width:' . $thumb_width . 'px;height:' . $thumb_height . 'px;" ';
				$output .= 'alt="' . __ ( 'Click to Watch Video', 'cool-video-gallery' ) . '" id="fancy_cvg_video_preview_' . $arguments ["videoid"] . '"  /></a>';
				
				?>
				<script type="text/javascript">
					jQuery(document).ready(function() {
		
						jQuery("a[rel=fancy_cvg_video_<?php echo $arguments['videoid'];?>]").fancybox({
							'titlePosition' : 'outside',
							'transitionIn' : 'fade',
							'transitionOut' : 'fade',
							'autoScale' : false,
							'titleFormat' : function(title, currentArray, currentIndex, currentOpts) {
								
								if(title.length != 0)
									return '<span id="fancybox-title-over">' + (title.length ?  title : '') + '</span>';
								else
									return '';
							},
							'content' : '<div id="video_fancy_cvg_video_<?php echo $arguments['videoid'];?>" style="overflow:hidden;"></div>',
							'autoDimensions' : false,
							'padding' : 0,
							'margin' : 0,
							'scrolling' : 'no',
							'width' : parseInt("<?php echo $options_player['cvgplayer_width']; ?>"),
							'height' : parseInt("<?php echo $options_player['cvgplayer_height']; ?>"),
							'onComplete' : function() {

								var cvg_gallery_video_current_url = this.href;
								
								jwplayer('video_fancy_cvg_video_<?php echo $arguments['videoid'];?>').setup({
									'file' : this.href,
									"autostart" : "<?php echo $autoplay;?>",
									"controlbar" : "<?php echo $options_player['cvgplayer_controlbar']; ?>",
									"flashplayer" : "<?php echo $this->plugin_url . "cvg-player/" . $player_swf; ?>",
									"volume" : "<?php echo $options_player['cvgplayer_volume']; ?>",
									"width" : parseInt("<?php echo $options_player['cvgplayer_width']; ?>"),
									"height" : parseInt("<?php echo $options_player['cvgplayer_height']; ?>"),
									"image" :  jQuery('#fancy_cvg_video_preview_<?php echo $arguments["videoid"];?>').attr('src') ,
									"mute" : "<?php echo $mute; ?>",
									"stretching" : "<?php echo $options_player['cvgplayer_stretching']; ?>",
									"skin" : "<?php echo $skin_url; ?>"
								});
								
								jwplayer('video_fancy_cvg_video_<?php echo $arguments['videoid'];?>').onComplete(function() {
									<?php 
										if ($options_player['cvgplayer_auto_close_single']) {
										?>
											jQuery.fancybox.close();
										<?php 
										}
									?>
								});

								<?php if($video_details[0]->video_type == $this->video_type_youtube){ ?>
								
									jwplayer('video_fancy_cvg_video_<?php echo $arguments['videoid'];?>').onError(function(error) {
										if(error.type == "jwplayerError") {
											
											if(error.message.indexOf("2035") > -1) {
												// Youtube HTML5 Error
												var cvg_youtube_video_id = cvg_gallery_video_current_url.split('v=')[1];
												var ampersandPosition = cvg_youtube_video_id.indexOf('&');
												if(ampersandPosition != -1) {
												  cvg_youtube_video_id = cvg_youtube_video_id.substring(0, ampersandPosition);
												}
												
												var errorHTML5Text = '<?php _e('Error loading Youtube Video. Web Browser not supporting Flash video playback. Switching to Youtube iFrame Player. Please wait!!!', 'cool-video-gallery'); ?>';
												var errorHTML5PlayerDivContent = '<div class="cvg-html5-youtube-error"><div class="cvg-html5-youtube-error-inner"><img src="<?php echo $this->plugin_url . "cvg-player/cvg-ajax-loader.gif"; ?>" /><p>'+errorHTML5Text+'</p></div></div>';
												
												jQuery('#video_fancy_cvg_video_<?php echo $arguments['videoid'];?>_wrapper').empty();
												jQuery('#video_fancy_cvg_video_<?php echo $arguments['videoid'];?>_wrapper').append("<div id='cvg_youtube_player_<?php echo $arguments['videoid'];?>' style='height:100%;'>"+errorHTML5PlayerDivContent+"</div>");
	
												setTimeout(function() {
													var cvg_youtube_iframe_player = new YT.Player('cvg_youtube_player_<?php echo $arguments['videoid'];?>', {
												          height: parseInt("<?php echo $options_player['cvgplayer_height']; ?>") ,
												          width: parseInt("<?php echo $options_player['cvgplayer_width'] ; ?>") ,
														      videoId: cvg_youtube_video_id,
													      events: {
														      	'onReady' : function(event) {
	
														      		cvg_youtube_iframe_player.unMute();
														      		<?php if($options_player['cvgplayer_mute'] == 1)  { ?>
														      			cvg_youtube_iframe_player.mute();
														      		<?php } ?>
	
														      		cvg_youtube_iframe_player.setVolume('<?php echo $options_player['cvgplayer_volume']; ?>');
														      	},
													            'onStateChange': function (event) {
														            if(event.data == YT.PlayerState.ENDED) {
													            		<?php 
																			if ($options_player['cvgplayer_auto_close_single']) {
																			?>
																				jQuery.fancybox.close();
																			<?php 
																			}
																		?>
														            } 
														         }
													      },
													      playerVars : {
																'autoplay': 1,
																'color' : 'white',
																'rel': 0,
																'showinfo' : 0
													      }
													});
													
												}, 4000);	
											}
										} 
									});
								<?php }?>
							}
						});
					});
				</script>
				<?php
			}
			return $output;
		} 
		
		/**
		 * Function to add players files to header.
		 * 
		 * @return script and styles for video player
		 */		
		function addPlayerHeader(){
			
			$options_settings = get_option('cvg_settings');	
			echo "<!-- Cool Video Gallery Script starts here -->";
			wp_enqueue_script('jwplayer', $this->video_player_url . 'jwplayer.js', '');
			wp_enqueue_script('jquery.fancybox', $this->plugin_url . 'third_party_lib/fancybox/jquery.fancybox-1.3.4.pack.js', 'jquery');
			wp_enqueue_style('jquery.fancybox', $this->plugin_url . 'third_party_lib/fancybox/jquery.fancybox-1.3.4.css', 'jquery');
			
			?>
			<script type="text/javascript">
				jQuery(document).ready(function(){
					if(jQuery('.cvg-slideshow-content').length != 0) {
						jQuery('.cvg-slideshow-content').each(function() {
							jQuery(this.id).s3Slider({
						      timeOut: <?php echo $options_settings['cvg_slideshow']; ?>,
							  item_id: this.id 
						   });
						}); 
					}

					// This code loads the IFrame Player API code asynchronously.
					var tag = document.createElement('script');
					tag.src = "https://www.youtube.com/iframe_api";
					var firstScriptTag = document.getElementsByTagName('script')[0];
					firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

					// This function creates an <iframe> (and YouTube player)
					// after the API code downloads.
					function onYouTubeIframeAPIReady() {
					          	
					}	  
				});
			</script>
			<!-- Cool Video Gallery Script ends here -->
			<?php
		}
		
		/**
		 * Function to generate playlist of videos
		 * @param $gallery_id - gallery id
		 * @return embeded playlist
		 */
		function CVG_render_playlist( $gallery_id ) {
			
			$options_player = get_option('cvg_player_settings');
			
			if($options_player['cvgplayer_autoplay'] == 1)
				$autoplay = "true";
			else 
				$autoplay = "false";	
			
			if($options_player['cvgplayer_mute'] == 1)
				$mute = "true";
			else 
				$mute = "false";
			
			if($options_player['cvgplayer_share_option'] == 1)
				$player_swf = "player-share.swf";
			else 
				$player_swf = "player.swf";
			
			$cvg_videodb = new CvgVideoDB();
			$gallery_detail = $cvg_videodb->find_gallery($gallery_id);
			
			$gallery_name = $gallery_detail->name;
			$playlist_xml = site_url() . '/' . $gallery_detail->path . '/' . $gallery_name . '-playlist.xml';
			
			$width = $options_player['cvgplayer_width'];
			
			$skin_url = "";
			if($options_player['cvgplayer_skin'] != "") {
			
				$skin_url = $this->video_player_url . 'skins/' . $options_player['cvgplayer_skin'] . '-skin/' . $options_player['cvgplayer_skin']  . '.xml';
			}
			
			if($options_player['cvgplayer_playlist'] == 'right' || $options_player['cvgplayer_playlist'] == 'left') {
				$panel_width = $options_player['cvgplayer_playlist_width'];
				$full_player_width = $options_player['cvgplayer_width'] + $panel_width;
				$full_player_height = $options_player['cvgplayer_height'];
			}elseif($options_player['cvgplayer_playlist'] == 'top' || $options_player['cvgplayer_playlist'] == 'bottom') {
				$panel_width = $options_player['cvgplayer_playlist_height'];
				$full_player_height = $options_player['cvgplayer_height'] + $panel_width;
				$full_player_width = $options_player['cvgplayer_width'];
			}
			
			$gallery_display = '<div id="mediaplayer_gallery_'.$gallery_id.'"></div>';
			?>
			<script type="text/javascript">
			
			jQuery(document).ready(function(){
				jwplayer("<?php echo 'mediaplayer_gallery_'.$gallery_id; ?>").setup({
					'name' : "<?php echo 'playerID_Gallery'.$gallery_id;?>",
					'flashplayer' : "<?php echo $this->plugin_url . "cvg-player/" . $player_swf; ?>",
    				'id': "<?php echo 'playerID_Gallery'.$gallery_id; ?>",
    				'playlistfile': "<?php echo $playlist_xml; ?>",
    				'height' : "<?php echo $full_player_height; ?>",
					'width' : parseInt(<?php echo $full_player_width; ?>),
					'playlist.position' : "<?php echo $options_player['cvgplayer_playlist']; ?>",
					'playlist.size': parseInt(<?php echo $panel_width; ?>),
					'autostart' : "<?php echo $autoplay; ?>",
					'controlbar' : "<?php echo $options_player['cvgplayer_controlbar']; ?>",
					'volume' : "<?php echo $options_player['cvgplayer_volume']; ?>",
					'mute' : "<?php echo $mute; ?>",
					'stretching' : "<?php echo $options_player['cvgplayer_stretching']; ?>",
					"skin" : "<?php echo $skin_url; ?>"
				});

				jwplayer("<?php echo 'mediaplayer_gallery_'.$gallery_id; ?>").onError(function(error) {
					if(error.type == "jwplayerError") {
						
						if(error.message.indexOf("2035") > -1) {

							alert('<?php _e("Error loading Youtube Video. Web Browser not supporting Flash video playback.", 'cool-video-gallery');?>');		
						}
					} 
				});
			});
			
			</script>
			<?php
			return $gallery_display;
		}
	}

}else {
	exit ("Class CoolVideoGallery already declared!");
}

// create new instance of the class
$CoolVideoGallery = new CoolVideoGallery();

if (isset($CoolVideoGallery)){
	
	register_activation_hook( basename(dirname(__FILE__)).'/'.basename(__FILE__), array(&$CoolVideoGallery,'cvg_install') );
	register_deactivation_hook(basename(dirname(__FILE__)).'/'.basename(__FILE__),  array(&$CoolVideoGallery,'cvg_deactivate_empty'));
			
}
?>