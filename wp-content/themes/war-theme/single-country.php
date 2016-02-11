<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
<?php get_sidebar(); ?>
		<div id="container">
			<div id="content" role="main">

			<?php
			/* Run the loop to output the post.
			 * If you want to overload this in a child theme then include a file
			 * called loop-single.php and that will be used instead.
			 */
			get_template_part( 'loop', 'single' );
			?>
			<?php $img_id = get_post_meta($post->ID, 'picture', true);
					$image_attributes = wp_get_attachment_image_src( $img_id ); // returns an array
					?> 
					<img style="margin-right: 10px; margin-left: 10px;" src="<?php echo $image_attributes[0]; ?>" width="150" height="150"></a>
			</br></br>
			<b>Related Programs:</b>
			</br></br>
			<?php
			global $post;
			$args = array( 'numberposts' => 5, 'post_type' => 'program', 'orderby'=>'meta_value', 'order'=>'DESC', 'meta_key' => 'country', 'meta_value' => $post->ID, 'meta_compare' => 'LIKE');
			$myposts = get_posts( $args );
			foreach( $myposts as $post ) : setup_postdata($post); ?>
				<div class = "test_div" style = "float:left;">
				<a href="<?php the_permalink(); ?>">
				<?php $img_id = get_post_meta($post->ID, 'picture', true);
					$image_attributes = wp_get_attachment_image_src( $img_id ); // returns an array
					?> 
					<img style="margin-right: 10px; margin-left: 10px;" src="<?php echo $image_attributes[0]; ?>" width="100" height="100"></a>
					</br>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</div>
			<?php endforeach; ?>
			
			<div style = "float:left; text-align:left">
			</br>
			<b>Related Stories:</b>
			</br></br>
			<?php
			//global $post;
			wp_reset_postdata();
			$args2 = array( 'numberposts' => 15, 'post_type' => 'story', 'orderby'=>'meta_value', 'order'=>'DESC', 'meta_key' => 'country', 'meta_value' => $post->ID);
			$myposts2 = get_posts( $args2 );
			foreach( $myposts2 as $post ) : setup_postdata($post); ?>
				<div class = "test_div" style = "float:left;">
				<a href="<?php the_permalink(); ?>">
				<?php $img_id = get_post_meta($post->ID, 'picture', true);
					$image_attributes = wp_get_attachment_image_src( $img_id ); // returns an array
					?> 
					<img style="margin-right: 10px; margin-left: 10px;" src="<?php echo $image_attributes[0]; ?>" width="100" height="100"></a>
					</br>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</div>
			<?php endforeach; ?>
			</div>
			</div><!-- #content -->
		</div><!-- #container -->
<?php get_footer(); ?>