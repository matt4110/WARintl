<?php
/**
 * The Template for displaying story posts.
 * by Pj Finger
 * 
 */

get_header(); ?>
<?php get_sidebar('newsmedia'); ?>
		<div id="container">
			<div id="content" role="main" >
				<?php
				/* Run the loop to output the post.
				 * If you want to overload this in a child theme then include a file
				 * called loop-single.php and that will be used instead.
				 */
				//get_template_part( 'loop', 'single' );
				?>
				<div style="text-align: center; font-size: 150%">
					<strong><?php echo the_title(); ?></strong>
				</div>
				</br></br>
				<div style= "font-size: 36px;line-height: 36px;">
					<?php $img_id = get_post_meta($post->ID, 'picture', true);
					$image_attributes = wp_get_attachment_image_src( $img_id ); // returns an array
					?> 
					<img style="float:left; border-color:rgb(208,166,108); margin-right: 20px;" src="<?php echo $image_attributes[0]; ?>" width="<?php //echo $image_attributes[1]; ?>150" height="<?php //echo $image_attributes[2]; ?>150">
				</div>
				<p style="text-align:justify;">
					<?php
					echo get_post_meta($post->ID, 'the_story', true);
					?>
				</p>
				<div style = "float:left; text-align:left">
				
					
					<?php //if there are related stories display some text before showing them.
						$args2 = array( 'numberposts' => 15, 'post_type' => 'risk_story', 'post__not_in' => array($post->ID), 'orderby'=>'rand', 'order'=>'DESC', 'meta_key' => 'risk', 'meta_compare' => 'LIKE', 'meta_value' => get_post_meta($post->ID, 'risk', true));
						$myposts2 = get_posts( $args2 );
						if($myposts2 != null) {
							echo '</br>';
							echo '<b>Other Related Stories'; 
							//echo get_post_meta(array_shift(array_values(get_post_meta($post->ID, 'risk', true))), 'title', true); 
							echo ':</b>';
							echo '</br></br>';
						}
					?>
					<?php
					foreach( $myposts2 as $post ) : setup_postdata($post); ?>
					<div class = "test_div" style = "float:left; text-align: center;">
						<a href="<?php the_permalink(); ?>">
						<?php $img_id = get_post_meta($post->ID, 'picture', true);
							$image_attributes = wp_get_attachment_image_src( $img_id ); // returns an array
							?> 
							<img style="margin-right: 10px; margin-left: 10px;" src="<?php echo $image_attributes[0]; ?>" width="100" height="100"></a>
							</br>
							<a href="<?php the_permalink(); ?>">
							<?php
							if(strlen(get_the_title()) > 15) {
								echo substr(get_the_title(), 0, 14);
								echo '...';
							}
							else {
								echo get_the_title();
							}
							?></a>
					</div>
				<?php endforeach; ?>
				</div>
				</br></br>
				<?php echo sharing_display(); ?>
				</br></br>
				<a href="http://www.warinternational.org/wheel-of-risk" style="font-size:140%; color: #B5985A">&#60;Back</a>
			</div><!-- #content -->
		</div><!-- #container -->		
<?php get_footer(); ?>