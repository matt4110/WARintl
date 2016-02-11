<?php $img_id = get_post_meta($post->ID, 'picture', true);
					$image_attributes = wp_get_attachment_image_src( $img_id ); // returns an array
					?> 
					<a><img style="margin-right: 10px; float:left" src="<?php echo $image_attributes[0]; ?>" width="150" height="150"></a>
			<p><?php echo get_post_meta($post->ID, 'description', true); ?></p>
			
			
			<?php if(get_post_meta($post->ID, 'card_pdf', true) != "") : ?>
					<?php //echo wp_get_attachment_url(get_post_meta($post->ID, 'card_pdf', true));?>
					<div>
					<a  href="<?php echo wp_get_attachment_url(get_post_meta($post->ID, 'card_pdf', true));?>" target="_blank"><img style="float:left; border: none; margin-top: 4px" src="http://warinternational.org/wp-content/uploads/2014/02/PDF_Download_pdf.png" width="31" height="31">
					<span style = "float:left; margin-top: 11px; margin-left: 6px;">Printable Version</span></a></div>
				</br></br>
			<?php endif; ?> 
			
			<?php //if the_situation has text then display otherwise do nothing
				/* if(get_post_meta($post->ID, 'the_situation', true) != "") { 
					echo '</br><b>The Situation:</b>';
					echo '</br>';
					echo get_post_meta($post->ID, 'the_situation', true);
				}
			?>
			<?php //if the_need has text then display otherwise do nothing
				if(get_post_meta($post->ID, 'the_need', true) != "") { 
					echo '</br>';
					echo '<b>The Need:</b>';
					echo '</br></br>';
					echo get_post_meta($post->ID, 'the_need', true);
				}
			?>
			<?php //if the_goal has text then display otherwise do nothing
				if(get_post_meta($post->ID, 'the_goal', true) != "") { 
					echo '</br></br>';
					echo '<b>The Goal:</b>';
					echo '</br></br>';
					echo get_post_meta($post->ID, 'the_goal', true);
				} */
			?>
			<div style="clear:both;"><a href="http://www.warinternational.org/programs" style="font-weight:bold; float: right; padding-top:20px;">&#60; Programs</a>
			</div>
			<?php
			global $post;
			$args = array( 'numberposts' => 15, 'post_type' => 'story', 'order'=>'ASC', 'meta_key' => 'program', 'meta_value' => $post->ID);
			$myposts = get_posts( $args );
			if($myposts != null) {
				echo '</br></br>';
				echo '<b>Related Stories:</b>';
				echo '</br></br>';
			}
			foreach( $myposts as $post ) : setup_postdata($post); ?>
				<div class = "test_div" style = "float:left; text-align: center;">
				<a href="<?php the_permalink(); ?>">
				<?php $img_id = get_post_meta($post->ID, 'picture', true);
					$image_attributes = wp_get_attachment_image_src( $img_id ); // returns an array
					?> 
					<img style="margin-right: 10px; margin-left: 10px;" src="<?php echo $image_attributes[0]; ?>" width="100" height="100"></a>
					</br>
				<a  href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</div>
			<?php endforeach; ?>
			<div style="clear:both;"><a href="http://www.warinternational.org/story-gallery" style="font-weight:bold; float: right; padding-top:20px;">&#60; Story Gallery</a>
			</div>

			<?php //echo sharing_display(); ?>