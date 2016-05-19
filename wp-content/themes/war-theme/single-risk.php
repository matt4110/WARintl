<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
<script type="text/javascript" src="/scripts/toggle2.js"></script>
<?php get_sidebar('newsmedia'); ?>
		<div id="container">
			<div id="content" role="main">

			<?php
			/* Run the loop to output the post.
			 * If you want to overload this in a child theme then include a file
			 * called loop-single.php and that will be used instead.
			 */
			
			//get_template_part( 'loop', 'single' );
			?>
			<h1 style="text-align: center;"><?php the_title(); ?></h1>
				<div id ="risk">
					<?php
					//echo get_post_meta($post->ID, 'the_challenge', true);
					echo  the_field('the_challenge');
					?>
				</div>
				<div style="">
					<strong>Resources<a id = "toggler" style="text-decoration: none;" href="javascript://" onclick="toggle2('DisplayDiv1', 'toggler');">[-]</a></strong>
					</br>
					<div id = "DisplayDiv1" style="display:block; text-decoration: none;">
						</br>
						<p><?php
						//echo get_post_meta($post->ID, 'resources', true);
						echo the_field('resources');
						?></p>
					</div>
					</br>
				</div>
				<div style="">
					<strong>Biblical Response<a id = "toggler2" style="text-decoration: none;" href="javascript://" onclick="toggle2('DisplayDiv2', 'toggler2');">[-]</a></strong>
					</br>
					<div id = "DisplayDiv2" style="display:block; text-decoration: none;">	
						</br>
						<p><?php
						//echo get_post_meta($post->ID, 'biblical_response', true);
						echo the_field('biblical_response');
						?></p>
					</div>
				</div>
				<div style = "float:left; text-align:left; width: 100%;">
					<?php //if there are related stories display some text before showing them.
						$args2 = array( 'numberposts' => 15, 'post_type' => 'risk_story', 'post__not_in' => array($post->ID), 'orderby'=>'rand', 'order'=>'DESC', 'meta_key' => 'risk', 'meta_compare' => 'LIKE', 'meta_value' => get_post_meta($post->ID, 'risk', true));
						$myposts2 = get_posts( $args2 );
						if($myposts2 != null) {
							echo '</br>';
							echo '<b>Stories from the Heart:'; 
							//echo get_post_meta(array_shift(array_values(get_post_meta($post->ID, 'risk', true))), 'title', true); 
							echo '</b>';
							echo '</br></br>';
						}
					?>
					<?php
					foreach( $myposts2 as $post ) : setup_postdata($post); ?>
					<div class = "test_div" style = "float:left; text-align: center; margin-bottom: 20px;">
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
					<?php endforeach; wp_reset_postdata();?>
					
				</div>
				
				</br>
				<?php echo sharing_display(); ?>
				</br>
				<a href="http://www.warinternational.org/wheel-of-risk" style="font-size:140%; color: #B5985A">&#60;Back</a>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>