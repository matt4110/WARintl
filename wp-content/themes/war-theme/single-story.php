<?php
/*
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 Template Name: Single Story
*/

get_header('story'); ?>
<?php get_sidebar('newsmedia'); ?>
		<div id="container">
			<div id="content" role="main" >
				<div style= "font-size: 36px;line-height: 36px;">
					<?php $img_id = get_post_meta($post->ID, 'picture', true);
					$image_attributes = wp_get_attachment_image_src( $img_id ); // returns an array
					?> 
					<img id="story-picture" style="float:left; border-color:rgb(208,166,108); margin-right: 20px;" src="<?php echo $image_attributes[0]; ?>" width="<?php //echo $image_attributes[1]; ?>150" height="<?php //echo $image_attributes[2]; ?>150">
					
					<div style="position:absolute; margin-left: 165px;margin-top: 20px;">
						<?php
						//echo '<br />';
						echo get_post_meta($post->ID, 'name', true);
						?>
					</div>
					<br />
					<div style="font-size: 28px;line-height: 32px; position: absolute; margin-left: 175px; margin-top: 20px;">
							<?php echo get_the_title(get_post_meta($post->ID, 'country', true));?>
							<?php $img_id = get_post_meta(get_post_meta($post->ID, 'country', true), flag, true);
							$image_attributes = wp_get_attachment_image_src( $img_id ); // returns an array
							?> 
							<img id="story-flag" style="border: 0px none; margin-right: 1px;" src="<?php echo $image_attributes[0]; ?>" width="32" height="22">
						<br/>
						<a style="color:#F5EDE0" href="<?php echo get_permalink( get_post_meta($post->ID, 'program', true)); ?>"><?php echo get_the_title(get_post_meta($post->ID, 'program', true));?></a>
						
						<?php if(get_post_meta($post->ID, 'card_pdf', true) != "") : ?>
						<div>
						<a  href="<?php echo wp_get_attachment_url(get_post_meta($post->ID, 'card_pdf', true));?>" target="_blank"><img style="float:left; border: none; margin-top: 4px" src="http://warinternational.org/wp-content/uploads/2014/02/PDF_Download_pdf.png" width="31" height="31"></a>
						<div style = "float:left; margin-top: 6px; margin-left: 6px; font-size: 12px;">Printable Version</div></div>
						</br></br>
						<?php endif; ?>
						
						<br/>
					</div>
				</div>
				<p style="margin-top:20px; text-align:justify; float:left;">
					<?php
					echo get_post_meta($post->ID, 'story_text', true);
					?>
				</p>
				<div style="clear:both;"><a href="http://www.warinternational.org/story-gallery" style="font-weight:bold; float: right;">&#60; Story Gallery</a>
				</div>
				<div style = "float:left; text-align:left;">
				
					
					<?php //if there are related stories display some text before showing them.
						$args2 = array( 'numberposts' => 15, 'post_type' => 'story', 'post__not_in' => array($post->ID), 'orderby'=>'rand', 'order'=>'DESC', 'meta_key' => 'program', 'meta_value' => get_post_meta($post->ID, 'program', true));
						$myposts2 = get_posts( $args2 );
						if($myposts2 != null) {
							echo '</br>';
							echo '<b>Other Stories about '; 
							echo get_the_title(get_post_meta($post->ID, 'program', true)); 
							echo ':</b>';
							echo '</br></br>';
						}
					?>
					<?php
					foreach( $myposts2 as $post ) : setup_postdata($post); ?>
					<div class = "test_div" style = "float:left; text-align: center; margin-bottom: 25px;">
						<a href="<?php the_permalink(); ?>">
						<?php $img_id = get_post_meta($post->ID, 'picture', true);
							$image_attributes = wp_get_attachment_image_src( $img_id ); // returns an array
							?> 
							<img style="margin-right: 10px; margin-left: 10px;" src="<?php echo $image_attributes[0]; ?>" width="100" height="100"></a>
							</br>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</div>
				<?php endforeach; ?>
			</div><!-- #content -->
			<?php 
				wp_reset_postdata();
				echo sharing_display(); ?>
		</div><!-- #container -->		
<?php get_footer(); ?>