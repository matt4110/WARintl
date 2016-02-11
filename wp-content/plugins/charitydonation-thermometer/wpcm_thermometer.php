<?php
/*
Plugin Name: Charity-Thermometer
Plugin URI: http://scoopdesign.com.au
Description: A plugin for Wordpress charity fund raiser, an html5 canvas thermometer. The html5-canvas and JS is a credit to <a href="https://github.com/rheh/HTML5-canvas-projects/tree/master/thermometer">Ray Hammond</a> who implements the canvas very well. I totally recode the script to make it usable to this plugin.   
Version: 1.1.2
Author: Eyouth { rob.panes }
Author URI: 

Copyright YEAR  PLUGIN_AUTHOR_NAME  (email : robpane126@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function my_admin_notice(){
	$id = get_the_ID();
	$post_type = get_post_type( $id );
	if ( $post_type == 'wpch_thermometer'){
	    echo '<div class="error">
	       <p>Please provide value for required fields...</p>
	    </div>';
	}    
}

$wpch_meta_error = get_option('_wpch_meta_error');

if ($wpch_meta_error){
	
	add_action('admin_notices', 'my_admin_notice');
	
}

	class wphc_thermometer_plugin {
		
		const POST_TYPE = 'wpch_thermometer';
		
		public function __construct(){
			add_action ( 'init', array( &$this, 'create_post_type' ) );	
			add_action ( 'admin_init' , array( &$this, 'admin_init' ) );
			add_action ( 'save_post',  array( &$this, 'wphc_save_postdata' ) );
						
			add_filter( 'the_content', array( &$this, 'my_the_content_filter') );
			add_shortcode('wpch_thermometer', array( &$this, 'wpch_do_shortcode') );
				
			load_plugin_textdomain( 'wphc_thermometer_plugin', false, dirname( plugin_basename( __FILE__ ) ) .'/lang/' );
			
			register_activation_hook( __FILE__, array(&$this, 'wphc_rewrite_flush' ) );
		}
		
		public function wphc_rewrite_flush() {
			// First, we "add" the custom post type via the above written function.
			// Note: "add" is written with quotes, as CPTs don't get added to the DB,
			// They are only referenced in the post_type column with a post entry, 
			// when you add a post of this CPT.
			self::create_post_type();
		
			// ATTENTION: This is *only* done during plugin activation hook in this example!
			// You should *NEVER EVER* do this on every page load!!
			flush_rewrite_rules();
		}	

		
		/**
		 * Create the post type
		 */
		public function create_post_type()
		{
					$labels = array(
					'name' => _x( 'Thermometer', 'post type general name' ),
					'singular_name' => _x( 'Thermometer', 'post type singular name' ),
					'add_new' => _x( 'Add New', 'wphc_thermometer_plugin'),
					'add_new_item' => __( 'Add New Thermometer', 'wphc_thermometer_plugin' ),
					'edit_item' => __( 'Edit Thermometer', 'wphc_thermometer_plugin' ),
					'new_item' => __( 'New Thermometer', 'wphc_thermometer_plugin' ),
					'all_items' => __( 'All Thermometers', 'wphc_thermometer_plugin' ),
					'view_item' => __( 'View Thermometers', 'wphc_thermometer_plugin' ),
					'search_items' => __( 'Search Thermometer', 'wphc_thermometer_plugin' ),
					'not_found' =>  __( 'No thermometer found', 'wphc_thermometer_plugin' ),
					'not_found_in_trash' => __( 'No thermometer found in Trash', 'wphc_thermometer_plugin' ), 
					'parent_item_colon' => '',
					'menu_name' => 'Thermometer'
				);
		
				$args = array(
					'labels' => $labels,
					'public' => true,
					'publicly_queryable' => true,
					'show_ui' => true, 
					'show_in_menu' => true, 
					'query_var' => true,
					'rewrite' => array('slug' => self::POST_TYPE, 'with_front' => false),
					'capability_type' => 'post',
					'has_archive' => true, 
					'hierarchical' => false,
					'menu_position' => 100,
					'menu_icon' => plugins_url('css/images/icon.png', __FILE__),
					'supports' => array( 'title', 'editor' )
				);
			
			     register_post_type( self::POST_TYPE, $args );
	       		 self::wpch_enqueue_scipts();
				
		}
		
		public function admin_init(){		
				//Metaboxes
				add_action( 'add_meta_boxes', array( &$this, 'wphc_thermometer_metabox' ) );
						
		}
			
		/**
		 * hook into WP's add_meta_boxes action hook
		 */
		public function wphc_thermometer_metabox(){			
			$screens = array ( self::POST_TYPE );
			foreach ($screens as $screen) {
				add_meta_box( 
					 'wphc_thermometer_upload'
					,__( 'Thermometer Progress Indicator', 'wphc_thermometer_plugin')
					,array( &$this, 'wphc_inner_media_metabox' )
					,$screen
					,'normal'
					,'high'
				);			
			}
		}
		
		public function wphc_inner_media_metabox(){
			global $post;
			//wp_nonce_field( plugin_basename( __FILE__ ), 'wphc_noncename' );
			$nonce = wp_create_nonce('wphc_nonce');
			print '<input type="hidden" name="_wphc_wpnonce_" id="_wphc_wpnonce_" value="'. $nonce .'">';
			require_once(sprintf("%s/templates/wpch_metabox.php", dirname(__FILE__)));		
		}
		
		public function wpch_enqueue_scipts(){
				//Scripts and localize...
				wp_register_script( 'custom_wp_hc_script_admin' , plugins_url ('script/script.js', __FILE__) , array('jquery') );
				wp_localize_script( 'custom_wp_hc_script_admin', 'wphcAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'nonce' => wp_create_nonce( 'ajax-wphc-nonce' ) ));
				wp_register_script( 'custom_wp_hc_thermometer_script' , plugins_url ('script/thermometer.js', __FILE__) , array('jquery') );
				wp_enqueue_script( 'custom_wp_hc_thermometer_script' );
				wp_enqueue_script( 'custom_wp_hc_script_admin' );		
					
				
				//Styles
				wp_register_style( 'wphc_thermometer_style', plugins_url('css/style.css', __FILE__) );
				wp_enqueue_style( 'wphc_thermometer_style' );
		}
		
		
		/**
		 * Add a icon to the beginning of every post page.
		 *
		 * @uses is_single()
		 */
		public function my_the_content_filter( $content ) {
		
		    if ( is_single() )
		        // Add image to the beginning of each page
		        global $post;
		     	$post_type = $post->post_type;
		        if ($post_type == 'wpch_thermometer'){
			        $content = sprintf(
			            '[wpch_thermometer id="%d"]%s',$post->ID,
			            $content
			        );
			
				    // Returns the content.
				    return $content;
			    }else{
			    	return $content;
			    }
		}
			
		public function wphc_save_postdata( $post_id ) {
	
		  // verify if this is an auto save routine. 
		  // If it is our form has not been submitted, so we dont want to do anything
		  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
			  return;
	
	      //verify if saving a revision to prevent duplicate.  
		  if ( wp_is_post_revision( $post_id )  )
		  	  return;		
			  
		  // verify this came from the our screen and with proper authorization,
		  // because save_post can be triggered at other times
		  if ( !wp_verify_nonce( $_POST['_wphc_wpnonce_'], 'wphc_nonce' ) ) 
			  return;
		  
		  
		  // Check permissions
		  if ( 'page' == $_POST['post_type'] ) 
		  {
			if ( !current_user_can( 'edit_page', $post_id ) )
				return;
		  }
		  else
		  {
			if ( !current_user_can( 'edit_post', $post_id ) )
				return;
		  }
		
		  if ( !isset( $_POST['wpch_frm_data_title_txt'] ) && !isset( $_POST['wpch_frm_data_txt_header'] ) && !isset( $_POST['wpch_frm_data_txt_value'] ) )		  	   
		  	   return; 
		  	   
		
		  //if saving in a custom table, get post_ID
		  $post_ID = $_POST['post_ID'];
		  
                  update_option('_wpch_meta_error', 0);                  
                  update_option('_hide_title', $_POST['wpch_frm_data_hide_title']);
                  update_option('_hide_header', $_POST['wpch_frm_data_hide_header']);
                  update_option('_hide_target', $_POST['wpch_frm_data_hide_target']);
                  update_option('_hide_currency', $_POST['wpch_frm_data_hide_currency']);
                  update_option('_hide_total', $_POST['wpch_frm_data_hide_total']);
                  update_option('_hide_footer', $_POST['wpch_frm_data_hide_footer']);
                  
		  if ( empty($_POST['wpch_frm_data_title_txt']) )			
                        update_post_meta($post_ID, '_wpch_meta_title', sanitize_text_field('No Header Title'));
                  else
                        update_post_meta($post_ID, '_wpch_meta_title', sanitize_text_field($_POST['wpch_frm_data_title_txt']));
                        
                  if ( empty($_POST['wpch_frm_data_txt_header']) )
                        update_post_meta($post_ID, '_wpch_meta_header', sanitize_text_field('No Header Text'));
                  else
                        update_post_meta($post_ID, '_wpch_meta_header', sanitize_text_field($_POST['wpch_frm_data_txt_header']));
                  
                  if ( empty($_POST['wpch_frm_data_txt_value']) )      
                        update_post_meta($post_ID, '_wpch_meta_target', 0);
                  else
                        update_post_meta($post_ID, '_wpch_meta_target', sanitize_text_field($_POST['wpch_frm_data_txt_value']));
                  
                  if ( empty($_POST['wpch_cur_data_txt_value']))      
                        update_post_meta($post_ID, '_wpch_meta_current', 0);
                  else
                        update_post_meta($post_ID, '_wpch_meta_current', sanitize_text_field($_POST['wpch_cur_data_txt_value']));
                  
                  if ( empty($_POST['wpch_data_txt_footer']))      
                        update_post_meta($post_ID, '_wpch_meta_footer', sanitize_text_field('No Footer Text'));
                  else
                        update_post_meta($post_ID, '_wpch_meta_footer', sanitize_text_field($_POST['wpch_data_txt_footer']));
                  
                  if ( empty($_POST['wpch_frm_data_currency']))      
                        update_post_meta($post_ID, '_wpch_meta_curr_symbol', sanitize_text_field('No Currency'));
		  else		
                        update_post_meta($post_ID, '_wpch_meta_curr_symbol', sanitize_text_field($_POST['wpch_frm_data_currency']));
		  
                }
		
		
		public function wpch_do_shortcode($atts){
			
			extract( shortcode_atts( array(
            	'id' => 0,
            	'slug' => '',
				'position' => 'right',
				'margin' => '0'
        	), $atts ) );
        
        	if(!$id) return;
        	
                        $wpch_ID = $id;        	     		
                        $wpch_meta_header = get_post_meta($wpch_ID, '_wpch_meta_header', true);
                        $wpch_meta_target = get_post_meta($wpch_ID, '_wpch_meta_target', true);
                        $wpch_meta_current = get_post_meta($wpch_ID, '_wpch_meta_current', true);
                        $wpch_meta_footer = get_post_meta($wpch_ID, '_wpch_meta_footer', true);
                        $wpch_meta_symbol = get_post_meta($wpch_ID, '_wpch_meta_curr_symbol', true);
                        $wpch_meta_title = get_post_meta($wpch_ID, '_wpch_meta_title', true);
                        empty($wpch_meta_target) || $wpch_meta_target == '' ? $wpch_meta_target = 0 : $wpch_meta_target; 
                        empty($wpch_meta_current) || $wpch_meta_current == '' ? $wpch_meta_current = 0 : $wpch_meta_current; 
			
                        
				
        		if ($wpch_meta_symbol === "1"){
        			$dollar = "selected=selected"; 
        			$wpch_symbol = "&#36;";
        		}else if ($wpch_meta_symbol === "2"){
        			$pound = "selected=selected";
        			$wpch_symbol = "&#xa3;";
        		}else if ($wpch_meta_symbol === "3"){
        			$yen = "selected=selected";
        			$wpch_symbol = "&#xa5;";
        		}else if ($wpch_meta_symbol === "4"){
        			$euro = "selected=selected";
        			$wpch_symbol = "&#x20ac;";
        		}
                        
                        $opt_title = get_option('_hide_title');
                        $opt_header = get_option('_hide_header');
                        $opt_target = get_option('_hide_target');
                        $opt_currency = get_option('_hide_currency');
                        $opt_total = get_option('_hide_total');
                        $opt_footer = get_option('_hide_footer');

		?>
        	<input type="hidden" id="wpch_target_data_value" value="<?php _e($wpch_meta_target); ?>">
        	<input type="hidden" id="wpch_current_data_value" value="<?php _e($wpch_meta_current); ?>">
            <?php 
				if ( $position == 'none' ){
					$override = 'float:none,margin:'.$margin; 
				}else{
					$override = 'float:'.$position;
				}			
			?>
        	<div id="wpch_fend_container" style=" <?php echo $override; ?> ">
                        <?php 
                            if ( $opt_title == 1){
                                $hideTitle = 'display:none'; 
                            }else{
                                $hideTitle = '';
                            }
                            
                            if ( $opt_total == 1){
                                $hideTotal = 'display:none'; 
                            }else{
                                $hideTotal = '';
                            }
                            
                            if ( $opt_target == 1){
                                $hideTarget = 'display:none'; 
                            }else{
                                $hideTarget = '';
                            }

                            if ( $opt_currency == 1){
                                $hideCurrency = 'display:none'; 
                                $target = number_format($wpch_meta_target);
                                $current = number_format($wpch_meta_current);
                                $wpch_symbol = '';
                            }else{
                                $hideCurrency = '';   
                                $target = $wpch_symbol.number_format($wpch_meta_target,2);
                                $current = $wpch_symbol.number_format($wpch_meta_current,2);
                            }
                            
                            if ( $opt_header == 1){
                                $hideHeader = 'display:none'; 
                            }else{
                                $hideHeader = '';
                            }
                            
                            if ( $opt_footer == 1){
                                $hideFooter = 'display:none'; 
                            }else{
                                $hideFooter = '';
                            }
                            
                        ?>
                    <h3 style="margin-left:50px;<?php echo $hideTitle; ?>"><?php _e($wpch_meta_title) ?></h3>
				<div id="wpch_image_indicator_fend">   
					<h3 id="wpch_header_txt" style="<?php echo $hideHeader; ?>"><?php _e($wpch_meta_header); ?></h3>
					<p id="wpch_target_value" style="<?php echo $hideTarget; ?>"><?php echo $target; ?></p>								  
					<img id="wpch_therm_img" src="<?php echo plugins_url('/css/images/Thermometer.png', __FILE__); ?>"	 />
					<canvas id="thermometer" class="wpch_thermometer_canvas" width="200" height="416"></canvas> 
					<p id="wpch_cti_img" style="<?php echo $hideTotal; ?>"><?php echo $current; ?></p>
					<p id="wpch_curr-symbol_fend" style="<?php echo $hideCurrency; ?>"><?php _e($wpch_symbol); ?></p>
					<h3 id="wpch_footer_txt" style="clear:both;<?php echo $hideFooter; ?>"><?php _e($wpch_meta_footer); ?></h3>
				</div>
			</div>	
		<?php	
        	
		}
		
		
		public static function activate(){
		
		}
		
		public static function deactivate(){
		
		}
	
	}


	
    //register_activation_hook(__FILE__, array('wphc_thermometer_plugin', 'activate'));
    //register_deactivation_hook(__FILE__, array('wphc_thermometer_plugin', 'deactivate'));

	// instantiate the plugin class
    $wphc_thermometer_plugin = new wphc_thermometer_plugin();


?>