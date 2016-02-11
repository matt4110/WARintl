<?php
/**
	Template Name: Sweetie Updates Dev
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
						<div class="img-left-floater" style="clear: left;">
							<a href="<?php the_permalink(); ?>" style="margin:10px 0px 10px 0px;">
							<?php the_post_thumbnail('thumbnail'); ?> 
							<a style = "font-size: 20px;" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							<?php the_excerpt(); ?>
							</br>
						</div>
					<?php endforeach; ?>

			</div><!-- #content -->
		</div><!-- #container -->
<?php get_footer(); ?>

