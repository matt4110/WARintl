<?php
/**
	Template Name: Sweetie Updates
 * The template for displaying Sweetie Update Page
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
<?php get_sidebar(); ?>
		<div id="container">
			<div id="content" role="main">
			<h1 class="entry-title">Sweetie Updates</h1>

			<?php
			/* Run the loop to output the page.
			 * If you want to overload this in a child theme then include a file
			 * called loop-page.php and that will be used instead.
			 */
			//get_template_part( 'loop', 'page' );
			?>
			<?php
			$args = array( 'numberposts' => 999, 'post_type' => 'sweetie', 'order'=>'DESC');
					$myposts = get_posts( $args );
					foreach( $myposts as $post ) : setup_postdata($post); ?>
						<div style="margin-top: 10px;">
							<a href="<?php the_permalink(); ?>">
							<?php $image =wp_get_attachment_url( get_post_thumbnail_id($post->ID) );  ?> 
							<img style="margin: 10px 10px 0px 10px; float: left;" src="<?php echo $image; ?>" width="120" height="120"></a>
							</br>
							<a style = "font-size: 20px;" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							<?php the_excerpt(); ?>
							</br>
						</div>
					<?php endforeach; ?>

			</div><!-- #content -->
		</div><!-- #container -->
<?php get_footer(); ?>

