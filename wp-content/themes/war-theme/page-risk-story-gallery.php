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
<script type="text/javascript" src="/scripts/swapper.js"></script>
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
				<div id ="rsgLeft">
					<?php //if there are related stories display some text before showing them.
						$args2 = array( 'numberposts' => 9999, 'post_type' => 'risk_story', 'post__not_in' => array($post->ID), 'orderby'=>'rand', 'order'=>'DESC', 'meta_key' => 'risk', 'meta_compare' => 'LIKE', 'meta_value' => get_post_meta($post->ID, 'risk', true));
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
					<div style = "float: left; text-align: center; margin-bottom: 20px; margin-left: 5px; margin-right: 8px;">
						<?php $txt = get_post_meta($post->ID, 'the_story', true); 
						//$txt = strip_tags($txt);
						$txt = json_encode($txt);
						//$txt = trim($txt);
						$txt = str_replace(Chr(34), " ", $txt);
						
						?>
						<a href="javascript://" onclick="swapper('rsgRight', '<?php echo $txt; ?>');">
						<?php $img_id = get_post_meta($post->ID, 'picture', true);
							$image_attributes = wp_get_attachment_image_src( $img_id ); // returns an array
							?>
							<img style="" src="<?php echo $image_attributes[0]; ?>" width="75" height="75"></a>
							</br>
						<a href="<?php the_permalink(); ?>">
						<?php
						if(strlen(get_the_title()) > 9) {
							echo substr(get_the_title(), 0, 8);
							echo '..';
						}
						else {
							echo get_the_title();
						}
						?></a>
					</div>
					<?php endforeach; wp_reset_postdata();?>
				</div>
				<div id = "rsgRight" style="text-align: justify; overflow: auto; height: 400px; ">
					Click on a portrait to read the story.
				</div>
				<a href="http://www.warinternational.org/wheel-of-risk" style="font-size:140%; color: #B5985A">&#60;Back</a>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>