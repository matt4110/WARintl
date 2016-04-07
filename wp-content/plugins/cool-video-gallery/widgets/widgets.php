<?php
/**
 * cvgShowCaseWidget - Widget to show video gallery as a showcase
 *
 * @package Cool Video Gallery
 * @author Praveen Rajan
 * @copyright 2010 - 2016
 * @access public
 */
class cvgShowCase_Widget extends WP_Widget {

	function cvgShowCase_Widget() {
		
		$widget_ops = array('classname' => 'cvg_widget_showcase', 'description' => __( 'Show a Cool Video Gallery Showcase', 'cool-video-gallery') );
		parent::__construct('cvg_showcase', __('CVG Showcase', 'cool-video-gallery'), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract( $args );
			
		$title = apply_filters('widget_title', empty( $instance['title'] ) ? __('') : $instance['title'], $instance, $this->id_base);
		
		if ( ! $number = (int) $instance['number'] )
 			$number = 5;
 		else if ( $number < 1 )
 			$number = 1;
		
		$cvg_core = new CvgCore();
		$out = $cvg_core->videoShowGallery($instance['galleryid'], false, $number, "sidebar");
		if ( !empty( $out ) ) {
			echo $before_widget;
			if ( $title)
				echo $before_title . $title . $after_title;
		?>
		<div class="cvg_showcase widget">
			<?php echo $out; ?>
		</div>
		<?php
			echo $after_widget;
		}
  
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['galleryid'] = (int) $new_instance['galleryid'];
		$instance['number'] = (int) $new_instance['number'];
		
		return $instance;
	}

	function form( $instance ) {
		
		//Defaults
		$instance = wp_parse_args( (array) $instance, array( 'title' => __('CVG Showcase', 'cool-video-gallery'), 'galleryid' => '0') );
		$title  = esc_attr( $instance['title'] );
		$number = isset($instance['number']) ? absint($instance['number']) : 5;

		$cvg_core = new CvgCore();
		$tables = $cvg_core->cvg_videodb->get_all_gallery_widgets();
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'cool-video-gallery'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
		<p>
			<label for="<?php echo $this->get_field_id('galleryid'); ?>"><?php _e('Select Gallery:', 'cool-video-gallery'); ?></label>
			<select size="1" name="<?php echo $this->get_field_name('galleryid'); ?>" id="<?php echo $this->get_field_id('galleryid'); ?>" class="widefat">
			<?php
			if($tables) {
				foreach($tables as $table) {
				echo '<option value="'.$table->gid.'" ';
				if ($table->gid == $instance['galleryid']) echo "selected='selected' ";
				echo '>'.$table->name.'</option>'."\n\t"; 
				}
			}
			?>
			</select>
		</p>
		
		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of Videos to show:', 'cool-video-gallery'); ?></label>
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
<?php	
	}
}

// register it
add_action('widgets_init', create_function('', 'return register_widget("cvgShowCase_Widget");'));


/**
 * cvgSlideShow - Widget to show video gallery as a slideshow
 *
 * @package Cool Video Gallery
 * @author Praveen Rajan
 * @copyright 2010 - 2016
 * @access public
 */

class cvgSlideShow_Widget extends WP_Widget {

	function cvgSlideShow_Widget() {
		$widget_ops = array('classname' => 'cvg_widget_slideshow', 'description' => __( 'Show a Cool Video Gallery Slideshow', 'cool-video-gallery') );
		parent::__construct('cvg_slideshow', __('CVG Slideshow', 'cool-video-gallery'), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract( $args );
			
		$title = apply_filters('widget_title', empty( $instance['title'] ) ? __('') : $instance['title'], $instance, $this->id_base);
		
		if ( ! $number = (int) $instance['number'] )
 			$number = 5;
 		else if ( $number < 1 )
 			$number = 1;
 			
		$cvg_core = new CvgCore();
		$out = $cvg_core->videoShowGallery($instance['galleryid'], true, $number, "sidebar");
		if ( !empty( $out ) ) {
			echo $before_widget;
			if ( $title)
				echo $before_title . $title . $after_title;
		?>
		<div class="cvg_slideshow widget">
			<?php echo $out; ?>
		</div>
		<?php
			echo $after_widget;
		}
  
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['galleryid'] = (int) $new_instance['galleryid'];
		$instance['number'] = (int) $new_instance['number'];
		
		return $instance;
	}

	function form( $instance ) {
		
		//Defaults
		$instance = wp_parse_args( (array) $instance, array( 'title' => __('CVG Slideshow', 'cool-video-gallery'), 'galleryid' => '0') );
		$title  = esc_attr( $instance['title'] );
		$number = isset($instance['number']) ? absint($instance['number']) : 5;
		
		$cvg_core = new CvgCore();
		$tables = $cvg_core->cvg_videodb->get_all_gallery_widgets();
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'cool-video-gallery'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
		<p>
			<label for="<?php echo $this->get_field_id('galleryid'); ?>"><?php _e('Select Gallery:', 'cool-video-gallery'); ?></label>
			<select size="1" name="<?php echo $this->get_field_name('galleryid'); ?>" id="<?php echo $this->get_field_id('galleryid'); ?>" class="widefat">
			<?php
			if($tables) {
				foreach($tables as $table) {
				echo '<option value="'.$table->gid.'" ';
				if ($table->gid == $instance['galleryid']) echo "selected='selected' ";
				echo '>'.$table->name.'</option>'."\n\t"; 
				}
			}
			?>
			</select>
		</p>
		
		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of Videos to show:', 'cool-video-gallery'); ?></label>
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
<?php	
	}
}

// register it
add_action('widgets_init', create_function('', 'return register_widget("cvgSlideShow_Widget");'));


/**
 * cvgShowCaseWidget($galleryID)
 * Function for templates without widget support
 * 
 * @param integer $galleryID 
 * @return echo the widget content
 * @author Praveen Rajan
 */
function cvgShowCaseWidget($galleryID, $limit) {
	$cvg_core = new CvgCore();
	echo $cvg_core->videoShowGallery($galleryID, false, $limit);
}

/**
 * cvgSlideShowWidget($galleryID)
 * Function for templates without widget support
 * 
 * @param integer $galleryID 
 * @return echo the widget content
 * @author Praveen Rajan
 */
function cvgSlideShowWidget($galleryID, $limit) {
	$cvg_core = new CvgCore();
	echo $cvg_core->videoShowGallery($galleryID, true, $limit);
}
?>